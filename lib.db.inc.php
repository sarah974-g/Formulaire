<?php
// ====================================
// Fonctions de base de donnée (MySQLI)
// ====================================

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($db["sqlserver"], $db["sqlusername"], $db["sqlpassword"], $db["defaultdb"], $db["sqlport"]);

// Forcer MySQL à utiliser l'UTF-8
$mysqli->set_charset('utf8');

// Fonction de retour du dernier id
function lastId()
{
	global $mysqli;

	return $mysqli->insert_id;
}


// Fonction d'envoie de requete au serveur de BD
function dbquery( $sql_query )
{
	global $mysqli;

	try {
		return $mysqli->query($sql_query);
	}
	catch (Exception $e) {
		echo "<div class='alert alert-danger' role='alert'>";
		echo "<span style='font-weight:bold;color:red'>Il s'est produit une erreur SQL.</span>";
		echo "<ul><li><b>Requête:</b> ".$sql_query."</li>";
		echo "<li><b>Date & Heure :</b> ".date("d/m/Y H:i")."</li>";
		echo "<li><b>Erreur : </b>".$mysqli->error."</li>";
		echo "<li><b>Adresse IP : </b>".$_SERVER['REMOTE_ADDR']."</li>";
		echo "<li><b>Fichier : </b>".$_SERVER["REQUEST_URI"]."<li></ul>";
		echo "<span style='font-weight:bold;color:green'>Veuillez contacter votre informaticien.</span></div>";

		return "";
	}
}

// Fonction de comptage du nombre de lignes résultat
function dbnumrows( $result )
{
	if ($result <> "")
		return $result->num_rows;
}

// from https://www.php.net/manual/fr/class.mysqli-result.php
function dbresult($result,$row,$field)
{
	global $mysqli;

	if ($result===false)
		return "";

	if ($result->num_rows <= $row)
	{

		echo "<div class='alert alert-danger' role='alert'>";
		echo "<span style='font-weight:bold;color:red'>Il s'est produit une Erreur SQL : Acces a une ligne non existante.</span>";
		echo "<li><b>Date & Heure :</b> ".date("d/m/Y H:i")."</li>";
		echo "<li><b>Erreur : </b> Accès à une ligne non existante</li>";
		echo "<li><b>Ligne : </b> ".$row."</li>";
		echo "<li><b>Champs : </b> ".$field."</li>";
		echo "<li><b>Adresse IP :</b> ".$_SERVER['REMOTE_ADDR']."</li>";
		echo "<li><b>Fichier : </b>".$_SERVER["REQUEST_URI"]."</li></ul>";
		echo "<span style='font-weight:bold;color:green'>Veuillez contacter votre informaticien.</span></div>";

		return "";
	}
	if (!(strpos($field,".")===false))
	{

		$t_field=explode(".",$field);
		$field=-1;
		$t_field=$result->fetch_field();
		for ($id=0;$id<$result->field_count;$id++)
		{
			if ($t_field[$id]->table==$t_field[0] && $t_field[$id]->name==$t_field[1])
			{
				$field=$id;
				break;
			}
		}
		if ($field==-1)
			return "";
	}
	$result->data_seek($row);
	$line=$result->fetch_array();
	return isset($line[$field])?$line[$field]:"";
}

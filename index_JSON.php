<?php
require($_SERVER['DOCUMENT_ROOT']."/formulaire_avis/config/dbconfig.inc.php");
require($_SERVER['DOCUMENT_ROOT']."/formulaire_avis/lib/lib.db.inc.php");
$table=array();

$sql_formulaire = dbquery("SELECT * FROM `formulaire`" );

for ($i=0;$i<dbnumrows($sql_formulaire);$i++)
{
	$tab[$i]['id_formulaire_avis'] = dbresult($sql_formulaire,$i,"id_formulaire_avis");
	$tab[$i]['email'] = dbresult($sql_formulaire,$i,"email");
	$tab[$i]['text'] = dbresult($sql_formulaire,$i,"text");
	$tab[$i]['comment'] = dbresult($sql_formulaire,$i,"comment");

}

echo json_encode($tab);
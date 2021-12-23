<?php 

// ==================
// CONTENU FORMULAIRE
// ==================

session_start();

require($_SERVER['DOCUMENT_ROOT']."/formulaire_avis/config/dbconfig.inc.php");
require($_SERVER['DOCUMENT_ROOT']."/formulaire_avis/lib/lib.db.inc.php");
?>

<script>
	tinymce.init({
		selector: "textarea#comment",
		height: 500,
		menubar: false,
		plugins: "link image code",
		toolbar: 'undo redo | styleselct | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code'
	});

	$(document).ready(function()

		$ ("#comment").css("z-index", "1000");

		// --------------------------------------------------
		// Permet de valider le formulaire avant de l'envoyer
		// --------------------------------------------------

		$("#form_upd").submit(function()
		{
			$.ajax({
			type: "POST",
			url: "/formulaire_avis/base/update.php",
			data: $(this).serialize(),
			beforeSend: function(){
				$('#submit').html("Modifier cette fiche <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");
			},
			complete: function(){
			},
			success: function (response){
				if (response == "ok")
					$('#submit').html("Modifier cette fiche <i class='bi bi-check-lg' aria-hidden='true'></i>");
			}
			else 
				$('#form_upd').html("Erreur : " +response);
		}
	});
			return false;

	//-->
</script>

<?php
$sql_formulaire = dbquery("SELECT *
	FROM formulaire
	WHERE id_formulaire_avis='".$_GET['id_formulaire_avis']."'");

if (dbnumrows($sql_formulaire) == 0)
	$contenu 			= dbresult($sql_formulaire,0,"comment");
?>

<form id="form_upd">
	<div class='title'>Formulaire</div>
	<input type="hidden" name="id_formulaire_avis" value="<?php echo $_GET['id_formulaire_avis']?>">

<table border='0' cellpadding='0' cellspacing='5' align='center'>
	<tr>
		<td style='text-align: center;color: black;width: 400px;'>Email :</td>
		<td><textarea id='email' name='email' style='text-align: center;color: black;width: 400px;'><?php echo $email ?></textarea></td>
	</tr>
	<tr>
		<td style='text-align: center;color: black;width: 400px;'>Quels articles avez vous pris :</td>
		<td><textarea id='text' name='text' style='text-align: center;color: black;width: 400px;'><?php echo $text ?></textarea></td>
	</tr>
	<tr>
		<td style='text-align: center;color: black;width: 400px;'>Commentaire :</td>
		<td><textarea id='comment' name='comment' style='z-index: 1000; width: 800px;'><?php echo $comment ?></textarea></td>
	</tr>
	<tr>
		<td style='text-align: center;' colspan="2"><button class="btn btn-background" type="submit" id="submit" name="envoyer" style="color: #FFFFFF; background-color: #149279; text-align: center;">Envoyer</button></td>
	</tr>
</table>
</form>
<?php
require($_SERVER['DOCUMENT_ROOT']."/formulaire_avis/config/dbconfig.inc.php");
require($_SERVER['DOCUMENT_ROOT']."/formulaire_avis/lib/lib.db.inc.php");



dbquery("INSERT INTO formulaire
	VALUES (NULL,
	'".$_POST['email']."',
	'".$_POST['text']."',
	'".$_POST['comment']."')");

Header('Location:/formulaire_avis/formulaire/formulaire.php');
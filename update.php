<?php

// ============
// Contenu Page
// ============

require($_SERVER['DOCUMENT_ROOT']."/formulaire_avis/config/dbconfig.inc.php");
require($_SERVER['DOCUMENT_ROOT']."/formulaire_avis/lib/lib.db.inc.php");

dbquery("UPADATE pages SET comment = '".addslashes($_POST['comment'])."'
		WHERE id_formulaire_avis = '".$_POST['id_formulaire_avis']."'");

echo "ok";

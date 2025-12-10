<h3> Gestion des habitations </h3>

<?php

$lesHabitations = $unControleur->selectAllHabitation();
$lesclients = $unControleur->selectAllClient();
$lesProprietaires = $unControleur->selectAllProprietaire();

if(isset($_GET['action']) && isset($_GET['ref_hab'])){
	$action = $_GET['action'];
	$ref_hab = $_GET['ref_hab'];

	switch($action){
		case "sup" : $unControleur->deleteHabitation($ref_hab);break;
		case "edit" : $unControleur->selectWhereHabitation($ref_hab);break;
	}
}

require_once("vue/vue_insert_hab.php");
if(isset($_POST['Valider'])){
	$unControleur->insertHabitation($_POST);
	echo"<br> Insertion réussie de l'habitation.";
}

if(isset($_POST['Modifier'])){
	$unControleur->updateHabitation($_POST);
	//recharger la page
	header("Location : index.php?page=4");
}

if(isset($_POST['Filtrer'])){
	$fimtre = $_POST['filtre'];
	$lesHabitations = $unControleur->selectLikeHabitation($filtre);
}else{
	$lesHabitations = $unControleur->selectAllHabitation();
}


require_once ("vue/vue_insert_hab.php");
?>

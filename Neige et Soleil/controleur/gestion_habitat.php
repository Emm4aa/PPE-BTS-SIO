<section>

<h1> Gestion des habitations </h1>

<div class="conteneurGestion">
<?php
$lesHabitations = $unControleur->selectAllHabitation();
$lesclients = $unControleur->selectAllClient();
$lesProprietaires = $unControleur->selectAllProprietaire();



if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
	$habitation = null;
	if(isset($_GET['action']) && isset($_GET['ref_hab'])){
		$action = $_GET['action'];
		$ref_hab = $_GET['ref_hab'];

		switch($action){
			case "sup" : $unControleur->deleteHabitation($ref_hab);break;
			case "edit" : $habitation = $unControleur->selectWhereHabitation($ref_hab);break;
		}
	}
}


if(isset($_POST['valider'])){
	$unControleur->insertHabitation($_POST);
}
if(isset($_POST['modifier'])){
	$unControleur->updateHabitation($_POST);
	//recharger la page
	header("Location:index.php?page=4");
	exit;
}
if(isset($_POST['annuler']) || isset($_POST['effacer'])){
	header("Location:index.php?page=4");
	exit;
}

if(isset($_POST['filtrer'])){
	$filtre = $_POST['filtre'];
	$lesHabitations = $unControleur->selectLikeHabitation($filtre);
}else{
	$lesHabitations = $unControleur->selectAllHabitation();
}
	require_once("vue/vue_insert_hab.php");
	require_once ("vue/vue_select_hab.php");
?>

</div>
</section>

<h3> Gestion des reservation </h3>


<?php

$lesReservations = $unControleur->selectAllReservation();
$lesClients = $unControleur->selectAllClient();
$lesProprietaires = $unControleur->selectAllProprietaire();
$lesHabitations = $unControleur->selectAllHabitation();

if(isset($_GET['action']) && isset($_GET['ref_res'])){
	$action = $_GET['action'];
	$ref_res = $_GET['ref_res'];

	switch($action){
		case "sup" : $unControleur->deleteReservation($ref_res);break;
		case "edit" : $unControleur->selectWhereReservation($ref_res);break;
	}
}

require_once("vue/vue_insert_reservation.php");
if(isset($_POST['Valider'])){
	$unControleur->insertReservation($_POST);
	echo"<br> Insertion réussi de la réservation.";
}

if(isset($_POST['Modifier'])){
	$unControleur->updateReservation($_POST);
	//recharger la page
	header("Location : index.php?page=5");
}

if(isset($_POST['Filtrer'])){
	$filtre = $_POST['filtre'];
	$lesReservations = $unControleur->selectLikeReservation($filtre);
}else{
	$lesReservations = $unControleur->selectAllReservation();
}


	require_once ("vue/vue_select_reservation.php");
?>

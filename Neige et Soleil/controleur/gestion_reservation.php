<section>

<h1> Gestion des reservation </h1>

<div class="conteneurGestion">

<?php
$lesReservations = $unControleur->selectAllReservation();
$lesClients = $unControleur->selectAllClient();
$lesProprietaires = $unControleur->selectAllProprietaire();
$lesHabitations = $unControleur->selectAllHabitation();

if(isset($_SESSION['email']) && $_SESSION['role']== 'admin'){
	$reservation = null;

	if(isset($_GET['action']) && isset($_GET['ref_res'])){
		$action = $_GET['action'];
		$ref_res = $_GET['ref_res'];

		switch($action){
			case "sup" : $unControleur->deleteReservation($ref_res);break;
			case "edit" : $reservation = $unControleur->selectWhereReservation($ref_res);break;
		}
	}
}


if(isset($_POST['valider'])){
	$unControleur->insertReservation($_POST);
	header("Location:index.php?page=5");
	exit;
}

if(isset($_POST['modifier'])){
	$unControleur->updateReservation($_POST);
	header("Location:index.php?page=5");
	exit;
}

if(isset($_POST['effacer']) || isset($_POST['annuler'])){
	header("Location:index.php?page=5");
	exit;
}

if(isset($_POST['filtrer'])){
	$filtre = $_POST['filtre'];
	$lesReservations = $unControleur->selectLikeReservation($filtre);
}else{
	$lesReservations = $unControleur->selectAllReservation();
}

require_once("vue/vue_insert_reservation.php");
require_once ("vue/vue_select_reservation.php");
?>

</div>
</section>

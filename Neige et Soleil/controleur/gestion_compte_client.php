<?php 

$idClient = $_SESSION['id'];
$leClient = $unControleur->selectWhereIdClient($idClient);

if(isset($_GET['action']) && isset($_GET['ref_res'])){
    $refRes = $_GET['ref_res'];
    $unControleur->deleteReservation($refRes);
    $_SESSION['msg-annul-reservation'] = "Votre réservation a été annulée avec succés✅";
}

$resaClient = $unControleur->selectReservationWhereClient($_SESSION['id']);

require_once("vue/vue_compte_client.php");

?>

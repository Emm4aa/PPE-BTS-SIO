<?php 
if(isset($_GET['action']) && isset($_GET['ref_res'])){
    $refRes = $_GET['ref_res'];
    $unControleur->deleteReservation($refRes);
}

$resaClient = $unControleur->selectReservationWhereClient($_SESSION['id']);

require_once("vue/vue_compte_client.php");

?>

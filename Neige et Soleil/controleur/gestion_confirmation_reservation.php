<?php
    if(!isset($_SESSION['reservation'])){
        header("Location: index.php?page=1");
        exit;
    }

    $data = $_SESSION['reservation'];

    require_once("vue/vue_confirmation_reservation.php");

    if(isset($_POST['confirmer'])){
        header("Location: index.php?page=12");
        exit;
    }
    
?>
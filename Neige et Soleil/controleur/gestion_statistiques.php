<?php

    $lesReservations = $unControleur->selectCountReservationValidee();
    $lesContrats = $unControleur->selectCountContratByProprio();


    require_once("vue/vue_statistiques.php");
?>
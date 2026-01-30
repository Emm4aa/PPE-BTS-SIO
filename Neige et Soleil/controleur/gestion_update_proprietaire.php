<?php
    $idProprietaire = $_SESSION['id'];
    $leProprietaire = $unControleur->selectWhereIdProprietaire($idProprietaire);


    if(isset($_POST['annuler'])){
        header("Location: index.php?page=7");
        exit;
    }
    if (isset($_POST['valider'])) {
        $unControleur->updateProprietaire($idProprietaire);
        $_SESSION['msg-update'] = "Vos informations ont bien été mises à jour ✅";
        header("Location: index.php?page=7");
        exit;
    }

    require_once("vue/vue_update_proprietaire.php");
?>
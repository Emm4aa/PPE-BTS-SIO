<?php 
    $idClient = $_SESSION['id'];
    $leClient = $unControleur->selectWhereIdClient($idClient);

    if(isset($_POST['annuler'])){
        header("Location: index.php?page=6");
        exit;
    }
    if (isset($_POST['valider'])) {
        $unControleur->updateClient($_POST['id_c']);
        $_SESSION['msg-update'] = "Vos informations ont bien été mises à jour ✅";
        header("Location: index.php?page=6");
        exit;
    }

    require_once("vue/vue_update_client.php");
?>
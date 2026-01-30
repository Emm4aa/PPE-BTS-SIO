<?php 
    if(isset($_POST['ajouter'])){
            $habitation = null;
            require_once("vue/vue_insert_hab.php");
        }

    if(isset($_GET['action']) && isset($_GET['ref_hab'])){
        $refHab = $_GET['ref_hab'];
        $unControleur->deleteHabitation($refHab);
    }
    
    $habProprio = $unControleur->selectHabitationWhereProprietaire($_SESSION['id']);
    
    require_once("vue/vue_compte_proprietaire.php");
?>
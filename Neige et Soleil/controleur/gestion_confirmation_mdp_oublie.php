<?php 
    require_once("vue/vue_confirmation_mdp_oublie.php");

    if(isset($_POST['verifier'])){
        header("Location:index.php?page=19");
    }
?>
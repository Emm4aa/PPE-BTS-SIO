<?php 
require_once("vue/vue_connexion.php");
//recup infos formulaire
    if(isset($_POST['Connexion'])){
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $statut = $_POST['statut'];

        if($statut == 'client'){
            $unClient = $unControleur->selectWhereClient($email,$mdp);
            if($unClient == null){
                echo"<br>Veuillez vérifier vos identifiants.";
            }else{
                $_SESSION['email'] = $unClient['email_c'];
                $_SESSION['nom'] = $unClient['nom_c'];
                $_SESSION['prenom'] = $unClient['prenom_c'];
                $_SESSION['role'] = 'client';
                $_SESSION['adresse'] = $unClient['adr_c'];
                $_SESSION['cp'] = $unClient['cp_c'];
                $_SESSION['ville'] = $unClient['ville_c'];
                $_SESSION['tel'] = $unClient['tel_c'];
                $_SESSION['id'] = $unClient['id_c'];

                //on recharge la page
                header("Location: index.php?page=1");
                exit; 
            }
        }
        if($statut == 'proprietaire'){
                $unProprietaire = $unControleur->selectWhereProprietaire($email,$mdp);
            if($unProprietaire == null){
                echo"<br>Veuillez vérifier vos identifiants.";
            }else{
                //sauvegarder les infos dans la session
                $_SESSION['email'] = $unProprietaire['email_p'];
                $_SESSION['nom'] = $unProprietaire['nom_p'];
                $_SESSION['prenom'] = $unProprietaire['prenom_p'];
                $_SESSION['role'] = 'proprietaire';
                $_SESSION['adresse'] = $unProprietaire['adr_p'];
                $_SESSION['cp'] = $unProprietaire['cp_p'];
                $_SESSION['ville'] = $unProprietaire['ville_p'];
                $_SESSION['tel'] = $unProprietaire['tel_p'];
                $_SESSION['id'] = $unProprietaire['id_p'];
                //on recharge la page
                header("Location: index.php?page=1");
                exit;
            }
        }
        if($statut == 'admin'){
            $unAdmin = $unControleur->selectWhereAdmin($email,$mdp);
            if($unAdmin == null){
                echo '<br>Veuillez vérifier vos identifiants';
            }else{
                $_SESSION['email'] = $unAdmin['email_a'];
                $_SESSION['mdp'] = $unAdmin['mdp_a'];
                $_SESSION['nom'] = $unAdmin['nom_a'];
                $_SESSION['prenom'] = $unAdmin['prenom_a'];
                $_SESSION['role'] = 'admin';

                header("Location: index.php?page=1");
                exit;
            }
        }
    }
?>
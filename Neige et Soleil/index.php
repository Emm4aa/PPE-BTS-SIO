<?php
    session_start();
    require_once("controleur/controleur.class.php");
    $unControleur = new Controleur();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Neige et Soleil</title>
    <meta charset="utf-8">
</head>
<body>
<center>
    <?php
    if (! isset($_SESSION['email'])){
        require_once('vue/vue_connexion.php');
    }
    require_once("vue/vue_connexion.php");
    if(isset($_POST['Connexion'])){
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $statut = $_POST['statut'];
            if($statut == 'client'){
                $unClient = $unControleur->selectWhereClient($email,$mdp);
            if($unClient == null){
                echo"<br>Veuillez vérifier vos identifiants.";
            }else{
                //sauvegarder les infos dans la session
                $_SESSION['email'] = $unClient['email'];
                $_SESSION['nom'] = $unClient['nom'];
                $_SESSION['prenom'] = $unClient['prenom'];
                $_SESSION['role'] = 'client';
            
                //on recharge la page
                header("Location: index.php?page=1");
            }
        }
        if($statut == 'proprietaire'){
                $unProprietaire = $unControleur->selectWhereProprietaire($email,$mdp);
            if($unProprietaire == null){
                echo"<br>Veuillez vérifier vos identifiants.";
            }else{
                //sauvegarder les infos dans la session
                $_SESSION['email'] = $unProprietaire['email'];
                $_SESSION['nom'] = $unProprietaire['nom'];
                $_SESSION['prenom'] = $unProprietaire['prenom'];
                $_SESSION['role'] = 'proprietaire';
            
                //on recharge la page
                header("Location: index.php?page=1");
            }
        }
    }
    if (isset($_SESSION['email'])){
    echo'
    <h1> Neige et Soleil </h1>
    <a href="index.php?page=1"> <img src="images/maison.png" width="90" height="70"></a>
    <a href="index.php?page=2"> <img src="images/clients.png" width="70" height="70"></a>
    <a href="index.php?page=3"> <img src="images/proprietaire.png" width="70" height="70"></a>
    <a href="index.php?page=4"> <img src="images/habitation.png" width="70" height="70"></a>
    <a href="index.php?page=5"> <img src="images/reservation.png" width="70" height="70"></a>
    <a href="index.php?page=6"> <img src="images/deconnexion.png" width="70" height="70"></a>';
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    switch($page){
        case 1 : require_once ("controleur/home.php"); break;
        case 2 : require_once ("controleur/gestion_client.php"); break;
        case 3 : require_once ("controleur/gestion_proprietaire.php"); break;
        case 4 : require_once ("controleur/gestion_habitation.php"); break;
        case 5 : require_once ("controleur/gestion_reservation.php"); break;
        case 6 : session_destroy(); unset($_SESSION['email']);
        //recharger la page index pour aller au formulaire
        header("Location: index.php");
         break;
        default : require_once ("controleur/erreur.php"); break;
    }
}
    ?>
</center>
</body>
</html>
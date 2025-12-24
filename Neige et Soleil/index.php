<?php
    session_start();
    require_once __DIR__ . "/parametres.php";
    require_once("controleur/controleur.class.php");
    $unControleur = new Controleur();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neige et Soleil</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <script src="scripts.js" defer></script>
</head>
<body>
<!-- Header -->
<?php require_once __DIR__ . "/header.php";?>

<!-- Main -->
<?php
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

 <main>
    <?php

    //protection accés pages sensibles
    $pageProtege = [
        2 => 'admin',
        3 => 'admin',
        4 => 'admin',
        5 => 'admin',
        6 => 'client',
        7 => 'proprietaire'
    ];

    $page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;

    if(isset($pageProtege[$page])){
        if(!isset($_SESSION['email']) && !isset($_SESSION['role'])){
            header("Location: index.php?page=1");
            exit;
        }
        if($_SESSION['role'] !== $pageProtege[$page]){
            header("Location: index.php?page=1");
            exit;
        }
    }

    //routeur accés pages 
    switch($page){
        case 1 : require_once ("controleur/home.php"); break;
        case 2 : require_once ("controleur/gestion_client.php"); break;
        case 3 : require_once ("controleur/gestion_proprietaire.php"); break;
        case 4 : require_once ("controleur/gestion_habitat.php"); break;
        case 5 : require_once ("controleur/gestion_reservation.php"); break;
        case 6 : require_once("controleur/gestion_compte_client.php");break;
        case 7 : require_once("controleur/gestion_compte_proprietaire.php");break;
        case 8 : require_once("controleur/gestion_connexion.php");break;
        case 9 : 
            session_destroy(); 
            header("Location: index.php");
            exit;
        break;
        default : require_once ("controleur/erreur.php"); break;
    }
?>
</main>

<!-- Footer -->
<?php require_once __DIR__ . "/footer.php";?>

</body>
</html>
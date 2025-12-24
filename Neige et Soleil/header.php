<?php require_once __DIR__ . "/parametres.php";?>

<header>
    <img id="logo" src= "<?php echo BASE_URL?>/images/logo-neige-soleil.png" alt="logo">
    <ul>
      

        <?php if(isset($_SESSION['email']) && $_SESSION['role'] == 'client'):?>
            <li><a href="<?php echo BASE_URL?>/index.php">Accueil</a> </li>
            <li><a href="<?php echo BASE_URL?>/index.php?page=6">Client</a></li>
            <li><a href="<?php echo BASE_URL?>/index.php?page=9">Déconnexion</a></li>
        <?php endif; ?>
        <?php if(isset($_SESSION['email']) && $_SESSION['role'] == 'proprietaire'):?>
            <li><a href="<?php echo BASE_URL?>/index.php">Accueil</a> </li>
            <li><a href="<?php echo BASE_URL?>/index.php?page=7">Propriétaire</a></li>
            <li><a href="<?php echo BASE_URL?>/index.php?page=9">Déconnexion</a></li>
        <?php endif;?>
        <?php if(isset($_SESSION['email']) && $_SESSION['role'] == 'admin'):?>
            <li><a href="<?php echo BASE_URL?>/index.php">Accueil</a> </li>
            <li><a href="<?php echo BASE_URL?>/index.php?page=2">Clients</a></li>
            <li><a href="<?php echo BASE_URL?>/index.php?page=3">Propriétaires</a></li>
            <li><a href="<?php echo BASE_URL?>/index.php?page=4">Habitations</a></li>
            <li><a href="<?php echo BASE_URL?>/index.php?page=5">Réservations</a></li>
            <li><a href="<?php echo BASE_URL?>/index.php?page=9">Déconnexion</a></li>
        <?php endif;?>
        <?php if(!isset($_SESSION['email'])):?>
            <li><a href="<?php echo BASE_URL?>/index.php">Accueil</a> </li>
            <li><a href="<?php echo BASE_URL?>/index.php?page=8">Connexion</a></li>
        <?php endif;?>
    </ul>
</header>
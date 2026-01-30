<section class="sectionMsgResaValidee">
    <div class="conteneurMsgResaConfirmee">
        <h1>Merci <span class="prenomMsgResaConfirmee"><?= $_SESSION['prenom'];?></span></h1>
        <img src="images/approved.png" alt="pouce" width="200rem" height="auto">
        <h4>Votre réservation a bien été prise en compte</h4>
        <p>
            Vous recevrez un email de confirmation sous 2H afin de procéder au réglement de
            votre réservation.
        </p>
        <div class="liensRetoursResaConfirmee">
            <a href="index.php?page=1" id="retourAccueil">Revenir à l'accueil</a>
            <a href="index.php?page=6" id="retourEspacePerso">Revenir sur mon espace</a>
        </div>
    </div>
</section>
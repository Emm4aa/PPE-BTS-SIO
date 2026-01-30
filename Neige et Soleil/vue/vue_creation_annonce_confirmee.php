<section class="sectionMsgResaValidee">
    <div class="conteneurMsgResaConfirmee">
        <h2>Merci <span class="prenomMsgResaConfirmee"><?= $_SESSION['prenom'];?></span></h2>
        <h4>Votre habitation a bien été ajoutée</h4>
        <img src="images/approved.png" alt="pouce" width="200rem" height="auto">
        <p>
            Vous recevrez un email de confirmation sous 24H afin de valider définitivement 
            l'ajout de votre habitation.
        </p>
        <div class="liensRetoursResaConfirmee">
            <a href="index.php?page=1" id="retourAccueil">Revenir à l'accueil</a>
            <a href="index.php?page=7" id="retourEspacePerso">Revenir sur mon espace</a>
        </div>
    </div>
</section>
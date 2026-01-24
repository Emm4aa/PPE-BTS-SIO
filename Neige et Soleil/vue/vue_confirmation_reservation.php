<section>
<h1 id="titreConfirmationResa">Confirmez votre réservation !</h1>
<div class="conteneurPrincipalConfirmationResa">
    <div class="cardTeteConfirmationResa">
        <div class="conteneurImgConfirmationResa"><img class="imgConfirmationResa" src="images/test1.jpg" alt=""></div>
        <div class="conteneurTitreDataHabitation">
            <h4><?= htmlspecialchars($data['titreHabitation']) ?></h4>
            <p><?= htmlspecialchars($data['typeHabitation']) ?></p>
            <p><?= htmlspecialchars($data['adresseHabitation']) ?></p>
            <p><?= htmlspecialchars($data['codePostalHabitation']) ?></p>
            <p><?= htmlspecialchars($data['villeHabitation']) ?></p>
        </div>
    </div>
    <div class="dataAnnulationResa">
        <h4>Annulation gratuite</h4>
        <p>Annulez maximum 24h avant afin de recevoir un remboursement intégral</p>
    </div>
    <div class="dataConfirmationResa">
        <h4>Nom</h4>
        <p><?= $_SESSION['nom'] ?></p>
    </div>
    <div class="dataConfirmationResa">
        <h4>Prénom</h4>
        <p><?= $_SESSION['prenom'] ?></p>
    </div>
    <div class="dataConfirmationResa">
        <h4>Email</h4>
        <p><?= $_SESSION['email'] ?></p>
    </div>
    <div class="dataConfirmationResa">
        <h4>Tel</h4>
        <p><?= $_SESSION['tel'] ?></p>
    </div>
    <div class="dataConfirmationResa">
        <h4>Dates</h4>
        <p>Arrivée : <?= htmlspecialchars($data['arrivee'])?> / Départ : <?= htmlspecialchars($data['depart'])?></p>
    </div>
    <div class="dataConfirmationResa">
        <h4>Voyageurs</h4>
        <p><?= htmlspecialchars($data['voyageurs']) ?></p>
    </div>
    <div class="dataConfirmationResa">
        <h4>Détail du prix</h4>
        <p><?= htmlspecialchars($data['nbJours']) ?> nuits x <?= htmlspecialchars($data['prixParNuit']) ?>€</p>
    </div>
    <div class="dataConfirmationResa">
        <h4>Total</h4>
        <p><?= htmlspecialchars($data['prixTotalHidden']) ?>€</p>
    </div>
    <form action="" method="post" id="formBtConfirmationResa">
        <button type="submit" name="confirmer" id="btConfirmationResa">
            <span class="material-symbols-outlined">check</span>
        </button>
    </form>
</div>
</section>

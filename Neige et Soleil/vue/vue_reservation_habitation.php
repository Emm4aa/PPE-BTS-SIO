<section>
<h2><?= $habitation['titre_hab'] ?></h2>
<div class="galleryReservation">
    <img class="imgReservation big" src="images/test1.jpg" alt="">
    <img class="imgReservation small" src="images/test2.jpg" alt="">
    <img class="imgReservation small" src="images/test3.jpg" alt="">
</div>
<div class="typeVilleDescHabitation">
    <h3><?= $habitation['type_hab'] ?>, <?= $habitation['ville_hab'] ?> - <?= $habitation['cp_hab'] ?></h3>
    <p>Description habitation</p>
    <p><?= $habitation['description_hab'] ?></p>
</div>

<div class="resa">
    <form id="formResa" action="index.php?page=10&ref_hab=<?= $habitation['ref_hab'];?>#formResa" method="post">
        <div class="capacitePrixHab">
            <p>Capacité : <?= $habitation['capacite_hab'] ?> voyageurs</p>
            <p id="prixTotal"></p>
        </div>
        <div class="formResaInputs">
            <div class="f">
                <label for="arrivee">Arrivée</label>
                <input type="date" name="arrivee" id="arrivee">
            </div>
            <div class="f">
                <label for="depart">Départ</label>
                <input type="date" name="depart" id="depart"></a>
            </div>
            <div class="f">
                <label for="voyageurs">Voyageurs</label>
                <input type="number" name="voyageurs" min="1" max="<?= $habitation['capacite_hab'];?>" value="1">
            </div>
        </div>

        <input type="hidden" name="typeHabitation" value="<?= $habitation['type_hab'] ?>">
        <input type="hidden" name="titreHabitation" value="<?= $habitation['titre_hab']?>">
        <input type="hidden" name="adresseHabitation" value="<?= $habitation['adr_hab'] ?>">
        <input type="hidden" name="codePostalHabitation" value="<?= $habitation['cp_hab'] ?>">
        <input type="hidden" name="villeHabitation" value="<?= $habitation['ville_hab'] ?>">
        <input type="hidden" name="prixTotalHidden" id="prixTotalHidden">
        <input type="hidden" name="nbJours" id="nbJours">
        <input type="hidden" name="prixParNuit" id="prixParNuit">

        <button type="submit" name="reserver" id="reserver">
            <span class="material-symbols-outlined">event_available</span>
        </button>
    </form>
</div>
</section>




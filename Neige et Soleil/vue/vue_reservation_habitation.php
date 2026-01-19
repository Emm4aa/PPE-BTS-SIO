<section>
<h2><?= $habitation['titre_hab'] ?></h2>
<div class="galleryReservation">
    <img class="imgReservation big" src="images/test1.jpg" alt="">
    <img class="imgReservation small" src="images/test2.jpg" alt="">
    <img class="imgReservation small" src="images/test3.jpg" alt="">
</div>
<p><?= $habitation['description_hab'] ?></p>
<div class="resa">
    <form id="formResa" action="" method="post">
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
                <label for="depart">Depart</label>
                <input type="date" name="depart" id="depart"></a>
            </div>
            <div class="f">
                <label for="voyageurs">Voyageurs</label>
                <input type="number" name="voyageurs" min="0" max="<?= $habitation['capacite_hab'];?>">
            </div>
        </div>
        <button>Reserver</button>
    </form>
</div>
</section>



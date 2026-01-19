<section id="sectionSlider">
    <div class="slider">
        <img src="images/neige&soleil2.jpg" alt="" class="imgSlide active">
        <img src="images/neige&soleil1.png" alt="" class="imgSlide">
        <img src="images/neige&soleil3.jpg" alt="" class="imgSlide">
    </div>
</section>
<section id="sectionAnnonces">
    <div id="conteneurRechercheAnnonces">
        <form id="formRecherheAnnonces" action="" method="post">
            <div class="r">
                <label for="type">Type</label>
                <select name="type">
                    <option value="">Tout</option>
                    <option value="Appartement">Appartement</option>
                    <option value="Maison">Maison</option>
                </select>
            </div>
            <div class="r">
                <label for="prixMax">Prix max :</label>
                <input type="number" name="prixMax">
            </div>
            <div class="r">
                <label for="prixMin">Prix min :</label>
                <input type="number" name="prixMin">
            </div>
            <button type="submit" class="btnRechercheAnnonces" name="rechercher">
                <span class="material-symbols-outlined icon-search" translate="no">search</span>
            </button>
        </form>
    </div>
    <div class="conteneurCardAnnonceHabitation">
        <?php if(isset($lesHabitations)): ?>
            <?php foreach ($lesHabitations as $uneHabitation):?>
                <?php 
                    $refHab = $uneHabitation['ref_hab'];
                    $photoPcpl = $unControleur->selectPhotoPrincipalHabitation($refHab);
                ?>
                <div class="cardAnnonceHabitation">
                    <img class="imgHabitation" src="<?= $photoPcpl['url_photo'] ?>" alt="">
                    <p><?= $uneHabitation['type_hab'];?></p>
                    <p>Proprietaire <?= $uneHabitation['id_p']; ?> </p>
                    <p><?= $uneHabitation['tarif_hab_moy'] ?>€ la nuit</p>
                    <a id="btReserver" href="index.php?page=10&ref_hab=<?= $uneHabitation['ref_hab']?>"  target="_blank">
                        <span class="material-symbols-outlined">event_available</span>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if(empty($lesHabitations)):?>
            <h3>Aucune habitation disponible pour ces critéres</h3>
        <?php endif; ?>
    </div>
</section>

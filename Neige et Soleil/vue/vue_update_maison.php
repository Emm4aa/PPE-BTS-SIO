<section>
    <h1>Modifiez votre Maison !</h1>

    <form class="insert" action="" method="post" enctype="multipart/form-data" id="formInsertHabitation">
        <table>
            <tr>
                <td><label for="tarif_hab_bas">Tarif saison basse</label></td>
                <td><input type="number" name="tarif_hab_bas" value="<?= htmlspecialchars($habitation['tarif_hab_bas']) ?>"></td>
            </tr>
            <tr>
                <td><label for="tarif_hab_moy">Tarif saison moyenne</label></td>
                <td><input type="number" name="tarif_hab_moy" value="<?= htmlspecialchars($habitation['tarif_hab_moy']) ?>"></td>
            </tr>
            <tr>
                <td><label for="tarif_hab_haut">Tarif saison haute</label></td>
                <td><input type="number" name="tarif_hab_hau" value="<?= htmlspecialchars($habitation['tarif_hab_hau']) ?>"></td>
            </tr>
            <tr>
                <td>Photos</td>
                <td><input type="file" name="photos[]" id="photos" multiple></td>
            </tr>
            <script>
                photos = document.getElementById('photos');

                photos.addEventListener("change",()=>{
                    if(photos.files.length > 3){
                        photos.value = "";
                        alert("Veuillez choisir 3 photos");
                    }
                })
            </script>
            <tr>
                <td>Description</td>
                <td><textarea name="description_hab" id="" cols="30" rows="5"><?= htmlspecialchars($habitation['description_hab']) ?></textarea></td>
            </tr>
            <tr>
                <td>Titre</td>
                <td><input type="text" name="titre_hab" value="<?= htmlspecialchars($habitation['titre_hab']) ?>"></td>
            </tr>
            <tr>
                <td>Capacité</td>
                <td><input type="number" name="capacite_hab" value="<?= htmlspecialchars($habitation['capacite_hab']) ?>" min="1"></td>
            </tr>
            <tr>
                <td>Caractéristiques</td>
                <td><input type="text" name="carac_m" value="<?= htmlspecialchars($habitation['carac_m']) ?>"></td>
            </tr>
        </table>
        <?php if(!empty($_SESSION['erreurs'])): ?>
                <?php foreach($_SESSION['erreurs'] as $uneErreur): ?>
                <h4 style="color : red"><?= $uneErreur ?></h4> 
            <?php endforeach; ?>
        <?php unset($_SESSION['erreurs']); ?>
        <?php endif; ?>
        <input type="hidden" name="ref_hab" value="<?= $habitation['ref_hab'] ?>">
        <div class="conteneurBtAjouterAnnulerCreationAnnonce">
            <button type="submit" name="annuler" id="annuler">
                <span class="material-symbols-outlined">close</span>
            </button>
            <button type="submit" name="ajouter" id="ajouter">
                <span class="material-symbols-outlined">check</span>
            </button>

        </div>
    </form>
</section>
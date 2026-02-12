<section>
    
    <h1>Ajoutez un appartement !</h1>

    <form class="insert" action="" method="post" enctype="multipart/form-data" id="formInsertHabitation">
        <table>
            <tr>
                <td><label for="adr_hab">Adresse</label></td>
                <td><input type="text" name="adr_hab" required></td>
            </tr>
            <tr>
                <td><label for="cp_hab">Code postal</label></td>
                <td><input type="number" name="cp_hab" required></td>
            </tr>
            <tr>
                <td><label for="ville_hab">Ville</label></td>
                <td><input type="text" name="ville_hab" required></td>
            </tr>
            <tr>
                <td><label for="tarif_hab_bas">Tarif bas</label></td>
                <td><input type="number" min="1" name="tarif_hab_bas" required></td>
            </tr>
            <tr>
                <td><label for="tarif_hab_moy">Tarif moy</label></td>
                <td><input type="number" min="1" name="tarif_hab_moy" required></td>
            </tr>
            <tr>
                <td><label for="tarif_hab_haut">Tarif haut</label></td>
                <td><input type="number" min="1" name="tarif_hab_hau" required></td>
            </tr>
            <tr>
                <td><label for="surface">Surface</label></td>
                <td><input type="number" min="1" name="surface" required></td>
            </tr>
            <tr>
                <td>Photos</td>
                <td><input type="file" name="photos[]" id="photos" multiple required></td>
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
                <td><textarea name="description_hab" id="" cols="30" rows="5" required></textarea></td>
            </tr>
            <tr>
                <td>Titre</td>
                <td><input type="text" name="titre_hab" required></td>
            </tr>
            <tr>
                <td>Capacité</td>
                <td><input type="number" min="1" name="capacite_hab" required></td>
            </tr>
            <tr>
                <td>Etage</td>
                <td><input type="number" min="1" name="etage_ap" required></td>
            </tr>
            <tr>
                <td>Type d'appartement</td>
                <td><input type="text" min="1" name="type_ap" required></td>
            </tr>
        </table>
        <?php if(!empty($_SESSION['erreurs'])): ?>
                <?php foreach($_SESSION['erreurs'] as $uneErreur): ?>
                <h4 style="color : red"><?= $uneErreur ?></h4> 
            <?php endforeach; ?>
        <?php unset($_SESSION['erreurs']); ?>
        <?php endif; ?>
        <input type="hidden" name="id_p" value="<?= $leProprietaire['id_p'] ?>">
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



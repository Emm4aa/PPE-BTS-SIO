<section>
    <h1>Ajoutez une habitation !</h1>

    <form class="insert" action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Type</td>
                <td>
                    <select name="choixTypeHabitation" id="">
                        <option value="">selectionner un type</option>
                        <option value="maison">Maison</option>
                        <option value="appartement">Appartement</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="adresse">Adresse</label></td>
                <td><input type="text" name="adresse"></td>
            </tr>
            <tr>
                <td><label for="cp">Code postal</label></td>
                <td><input type="text" name="cp"></td>
            </tr>
            <tr>
                <td><label for="ville">Ville</label></td>
                <td><input type="text" name="ville"></td>
            </tr>
            <tr>
                <td><label for="tarifBas">tarif bas</label></td>
                <td><input type="text" name="tarifBas"></td>
            </tr>
            <tr>
                <td><label for="tarifMoy">tarif moy</label></td>
                <td><input type="text" name="tarifMoy"></td>
            </tr>
            <tr>
                <td><label for="tarifHaut">tarif haut</label></td>
                <td><input type="text" name="tarifHaut"></td>
            </tr>
            <tr>
                <td><label for="surface">Surface</label></td>
                <td><input type="text" name="surface"></td>
            </tr>
            <tr>
                <td>Propriétaire</td>
                <td>
                    <select name="choixProprietaire" id="">
                        <option value="">selectionner un propriétaire</option>
                        <option value="">xxx</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Photos</td>
                <td><input type="file" name="photos[]" multiple></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="descriptionAnnonce" id="" cols="30" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>Titre</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Capacité</td>
                <td><input type="number"></td>
            </tr>
        </table>
        <button type="submit" name="ajouter" id="ajouter">
            <span class="material-symbols-outlined">check</span>
        </button>
    </form>
</section>
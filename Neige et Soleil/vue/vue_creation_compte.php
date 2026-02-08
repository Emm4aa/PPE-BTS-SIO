<section>
    <h1>Créez votre compte !</h1>
    <form class="insert" action="" method="post">
        <table>
            <tr>
                <td>Type de compte</td>
                <td>
                    <select name="type" id="" required>
                        <option value="">sélectionner un type</option>
                        <option value="proprietaire">Propriétaire</option>
                        <option value="client">Client</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom" required></td>
            </tr>
            <tr>
                <td>Prenom</td>
                <td><input type="text" name="prenom" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Mot de passe</td>
                <td><input type="text" name="mdp" required></td>
            </tr>
            <tr>
                <td>Tél</td>
                <td><input type="text" name="tel" required></td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td><input type="text" name="adresse" required></td>
            </tr>
            <tr>
                <td>Code postal</td>
                <td><input type="text" name="cp" required></td>
            </tr>
            <tr>
                <td>Ville</td>
                <td><input type="text" name="ville" required></td>
            </tr>
            <tr>
                <td>RIB</td>
                <td><input type="text" name="rib" required></td>
            </tr>
        </table>
        <?php if(!empty($_SESSION['msg-erreurs'])): ?>
            <?php foreach($_SESSION['msg-erreurs'] as $uneErreur) :?>
            <h4 style="color:red"><?= $uneErreur ?></h4>
            <?php endforeach; ?>
            <?php unset($_SESSION['msg-erreurs']); ?>
        <?php endif; ?>
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
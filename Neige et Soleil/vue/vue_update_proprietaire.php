<section>

    <div class="vueInsert">
    <h1>Modifiez vos informations !</h1>
    <form class="insert" method="post">
	    <table>
		    <tr>
			    <td>Nom</td>
			    <td><input type="text" name="nom" value="<?= ($utilisateur == null)?"":$utilisateur['nom'];?>" required></td>
		    </tr>
		    <tr>
			    <td>Prénom</td>
			    <td><input type="text" name="prenom" value="<?= ($utilisateur == null)?"":$utilisateur['prenom'];?>" required></td>
		    </tr>
		    <tr>
			    <td>Email</td>
			    <td><input type="text" name="email" value="<?= ($utilisateur == null)?"":$utilisateur['email'];?>" required></td>
		    </tr>
		    <tr>
			    <td>Mdp</td>
			    <td><input type="text" name="mdp" value="<?= ($utilisateur == null)?"":$utilisateur['mdp'];?>" required></td>
		    </tr>
		    <tr>
			    <td>Adresse postale</td>
			    <td><input type="text" name="adresse" value="<?= ($leProprietaire == null)?"":$leProprietaire['adresse'];?>" required></td>
		    </tr>
		    <tr>
			    <td>Code postal</td>
			    <td><input type="text" name="cp" value="<?= ($leProprietaire == null)?"":$leProprietaire['cp'];?>" required></td>
		    </tr>
		    <tr>
			    <td>Ville</td>
			    <td><input type="text" name="ville" value="<?= ($leProprietaire == null)?"":$leProprietaire['ville'];?>" required></td>
		    </tr>
		    <tr>
			    <td>Téléphone</td>
			    <td><input type="text" name="tel" value="<?= ($utilisateur == null)?"":$utilisateur['tel'];?>" required></td>
		    </tr>
		    <tr>
			    <td>RIB</td>
			    <td><input type="text" name="rib" value="<?= ($leProprietaire == null)?"":$leProprietaire['RIB'];?>" required></td>
		    </tr>
	    </table><br>
		<?php if(isset($_SESSION['msg-erreurs'])): ?>
			<?php foreach($_SESSION['msg-erreurs'] as $uneErreur) :?>
            <h4 style="color:red"><?= $uneErreur ?></h4>
            <?php endforeach; ?>
		<?php unset($_SESSION['msg-erreurs']);?>
		<?php endif;?>
        <div>
            <button name="annuler" class="btAnnulerSupprimer">
                <span class="material-symbols-outlined">close</span>
            </button>
            <button name="valider" class="btValider">
                <span class="material-symbols-outlined">check</span>
            </button>
	    </div>
	    <?= ($utilisateur==null)? '' : ' <input type="hidden" name="id_user" value="'.$utilisateur['id_user'].'">' ?>
    </form>
</div>
</section>
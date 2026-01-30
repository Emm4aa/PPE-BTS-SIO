<section>
    <div class="vueInsert">
    <h1>Modifiez vos informations !</h1>
    <form class="insert" method="post">
	    <table>
		    <tr>
			    <td>Nom</td>
			    <td><input type="text" name="nom_p" value="<?= ($leProprietaire == null)?"":$leProprietaire['nom_p'];?>"></td>
		    </tr>
		    <tr>
			    <td>Prénom</td>
			    <td><input type="text" name="prenom_p" value="<?= ($leProprietaire == null)?"":$leProprietaire['prenom_p'];?>"></td>
		    </tr>
		    <tr>
			    <td>Email</td>
			    <td><input type="text" name="email_p" value="<?= ($leProprietaire == null)?"":$leProprietaire['email_p'];?>"></td>
		    </tr>
		    <tr>
			    <td>Mdp</td>
			    <td><input type="text" name="mdp_p" value="<?= ($leProprietaire == null)?"":$leProprietaire['mdp_p'];?>"></td>
		    </tr>
		    <tr>
			    <td>Adresse postale</td>
			    <td><input type="text" name="adr_p" value="<?= ($leProprietaire == null)?"":$leProprietaire['adr_p'];?>"></td>
		    </tr>
		    <tr>
			    <td>Code postal</td>
			    <td><input type="text" name="cp_p" value="<?= ($leProprietaire == null)?"":$leProprietaire['cp_p'];?>"></td>
		    </tr>
		    <tr>
			    <td>Ville</td>
			    <td><input type="text" name="ville_p" value="<?= ($leProprietaire == null)?"":$leProprietaire['ville_p'];?>"></td>
		    </tr>
		    <tr>
			    <td>Téléphone</td>
			    <td><input type="text" name="tel_p" value="<?= ($leProprietaire == null)?"":$leProprietaire['tel_p'];?>"></td>
		    </tr>
		    <tr>
			    <td>RIB</td>
			    <td><input type="text" name="rib_p" value="<?= ($leProprietaire == null)?"":$leProprietaire['rib_p'];?>"></td>
		    </tr>
	    </table><br>
        <div>
            <button name="annuler" class="btAnnulerSupprimer">
                <span class="material-symbols-outlined">close</span>
            </button>
            <button name="valider" class="btValider">
                <span class="material-symbols-outlined">check</span>
            </button>
	    </div>
	    <?= ($leProprietaire==null)? '' : ' <input type="hidden" name="id_p" value="'.$leProprietaire['id_p'].'">' ?>
    </form>
</div>
</section>
<div class="vueInsert">
<h3>Ajout/Modification client</h3>
<form class="insert" method="post">
	<table>
		<tr>
			<td>Nom</td>
			<td><input type="text" name="nom_c" value="<?= ($leClient == null)?"":$leClient['nom_c'];?>"></td>
		</tr>
		<tr>
			<td>Prénom</td>
			<td><input type="text" name="prenom_c" value="<?= ($leClient == null)?"":$leClient['prenom_c'];?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email_c" value="<?= ($leClient == null)?"":$leClient['email_c'];?>"></td>
		</tr>
		<tr>
			<td>Mot de passe</td>
			<td><input type="text" name="mdp_c" value="<?= ($leClient == null)?"":$leClient['mdp_c'];?>"></td>
		</tr>
		<tr>
			<td>Adresse</td>
			<td><input type="text" name="adr_c" value="<?= ($leClient == null)?"":$leClient['adr_c'];?>"></td>
		</tr>
		<tr>
			<td>Code postal</td>
			<td><input type="text" name="cp_c" value="<?= ($leClient == null)?"":$leClient['cp_c'];?>"></td>
		</tr>
		<tr>
			<td>Ville</td>
			<td><input type="text" name="ville_c" value="<?= ($leClient == null)?"":$leClient['ville_c'];?>"></td>
		</tr>
		<tr>
			<td>Téléphone</td>
			<td><input type="text" name="tel_c" value="<?= ($leClient == null)?"":$leClient['ville_c'];?>"></td>
		</tr>
		<tr>
			<td>RIB</td>
			<td><input type="text" name="rib_c" value="<?= ($leClient == null)?"":$leClient['rib_c'];?>"></td>
		</tr>
	</table><br>
	<div>
		<input class="btnForm" type="submit" name="annuler" value="annuler">
		<input class="btnForm" type="submit" <?= ($leClient==null)?'name="valider" id="valider" 
		value="valider"' : 'name="modifier" id="modifier" value="modifier"'?>>
	</div> 
	<?= ($leClient==null)? '' : ' <input type="hidden" name="id_c" value="'.$leClient['id_c'].'">'; ?>
</form>
</div>








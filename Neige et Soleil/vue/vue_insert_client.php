<div class="vueInsert">
<h3>Ajout/Modification client</h3>
<form class="insert" method="post">
	<table>
		<tr>
			<td>Nom</td>
			<td><input type="text" name="nom_c"></td>
		</tr>
		<tr>
			<td>Prénom</td>
			<td><input type="text" name="prenom_c"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email_c"></td>
		</tr>
		<tr>
			<td>Mot de passe</td>
			<td><input type="text" name="mdp_c"></td>
		</tr>
		<tr>
			<td>Adresse</td>
			<td><input type="text" name="adr_c"></td>
		</tr>
		<tr>
			<td>Code postal</td>
			<td><input type="text" name="cp_c"></td>
		</tr>
		<tr>
			<td>Ville</td>
			<td><input type="text" name="ville_c"></td>
		</tr>
		<tr>
			<td>Téléphone</td>
			<td><input type="text" name="tel_c"></td>
		</tr>
	</table><br>
	<div>
		<button type="reset" name="Annuler" value="Annuler">Annuler</button>
		<button type="submit" name="Valider" value="Valider">Valider</button>
	</div> 
	<!-- <?= ($leClient==null)? '' : ' <input type="hidden" name="id_c" value="'.$leClient['id_c'].'">' ?> -->
</form>
</div>








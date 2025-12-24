<div class="vueInsert">

<h3> Ajout d'un propriétaire </h3>
<form class="insert" method="post">
	<table>
		<tr>
			<td>Nom</td>
			<td><input type="text" name="nom_p"></td>
		</tr>
		<tr>
			<td>Prénom</td>
			<td><input type="text" name="prenom_p"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email_p"></td>
		</tr>
		<tr>
			<td>Adresse postale</td>
			<td><input type="text" name="adr_p"></td>
		</tr>
		<tr>
			<td>Code postal</td>
			<td><input type="text" name="cp_p"></td>
		</tr>
		<tr>
			<td>Ville</td>
			<td><input type="text" name="ville_p"></td>
		</tr>
		<tr>
			<td>Téléphone</td>
			<td><input type="text" name="tel_p"></td>
		</tr>
		<tr>
			<td>RIB</td>
			<td><input type="text" name="rib_p"></td>
		</tr>
	</table><br>
	<div>
		<button type="reset" name="Annuler" value="Annuler">Annuler</button>
		<button type="submit" name="Valider" value="Valider">Valider</button>
	</div> 
	<!-- <?= ($leProprietaire==null)? '' : ' <input type="hidden" name="id_p" value="'.$leProprietaire['id_p'].'">' ?> -->
</form>

</div>







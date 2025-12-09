<h3> Ajout d'un proprietaire </h3>

<form method="post">
	<table border="0">
		<tr>
			<td> Nom du Proprietaire</td>
			<td><input type="text" name="nom_p" 
		value="<?= ($leProprietaire==null)? '':$leProprietaire['nom_p'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Prénom du Proprietaire</td>
			<td><input type="text" name="prenom_p"
		value="<?= ($leProprietaire==null)? '':$leProprietaire['prenom_p'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Email Contact</td>
			<td><input type="text" name="email_p"
		value="<?= ($leProprietaire==null)? '':$leProprietaire['email_p'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Adresse postale</td>
			<td><input type="text" name="adr_p"
		value="<?= ($leProprietaire==null)? '':$leProprietaire['adr_p'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Code postal</td>
			<td><input type="text" name="cp_p"
		value="<?= ($leProprietaire==null)? '':$leProprietaire['cp_p'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Ville</td>
			<td><input type="text" name="ville_p"
		value="<?= ($leProprietaire==null)? '':$leProprietaire['ville_p'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Téléphone</td>
			<td><input type="text" name="tel_p"
		value="<?= ($leProprietaire==null)? '':$leProprietaire['tel_p'] ?>" 
				></td>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"></td>
			<td><input type="submit" 
		<?= ($leProprietaire==null)? ' name="Valider" value="Valider" ' : 
			' name="Modifier" value="Modifier" ' ?>
				></td>
		</tr>
	</table>
	<?= ($leProprietaire==null)? '' : ' <input type="hidden" name="id_p" value="'.$leProprietaire['id_p'].'">' ?>
</form>







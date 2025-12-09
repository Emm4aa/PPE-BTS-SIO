<h3> Ajout d'un proprietaire </h3>

<form method="post">
	<table border="0">
		<tr>
			<td> Nom du Proprietaire</td>
			<td><input type="text" name="nom" 
		value="<?= ($leProprietaire==null)? '':$leProprietaire['nom'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Prénom du Proprietaire</td>
			<td><input type="text" name="prenom"
		value="<?= ($leProprietaire==null)? '':$leProprietaire['prenom'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Email Contact</td>
			<td><input type="text" name="email"
		value="<?= ($leProprietaire==null)? '':$leProprietaire['email'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Adresse postale</td>
			<td><input type="text" name="adresse"
		value="<?= ($leProprietaire==null)? '':$leProprietaire['adresse'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Téléphone</td>
			<td><input type="text" name="tel"
		value="<?= ($leProprietaire==null)? '':$leProprietaire['tel'] ?>" 
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
	<?= ($leProprietaire==null)? '' : ' <input type="hidden" name="idProprietaire" value="'.$leProprietaire['idProprietaire'].'">' ?>
</form>







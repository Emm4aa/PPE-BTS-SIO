<h3> Ajout d'un client </h3>

<form method="post">
	<table border="0">
		<tr>
			<td> Nom du client</td>
			<td><input type="text" name="nom_c" 
		value="<?= ($leClient==null)? '':$leClient['nom_c'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Prénom du client</td>
			<td><input type="text" name="prenom_c"
		value="<?= ($leClient==null)? '':$leClient['prenom_c'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Email Contact</td>
			<td><input type="text" name="email_c"
		value="<?= ($leClient==null)? '':$leClient['email_c'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Adresse postale</td>
			<td><input type="text" name="adr_c"
		value="<?= ($leClient==null)? '':$leClient['adr_c'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Code postal</td>
			<td><input type="text" name="cp_c"
		value="<?= ($leClient==null)? '':$leClient['cp_c'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Ville</td>
			<td><input type="text" name="ville_c"
		value="<?= ($leClient==null)? '':$leClient['ville_c'] ?>" 
				></td>
		</tr>
		<tr>
			<td> Téléphone</td>
			<td><input type="text" name="tel_c"
		value="<?= ($leClient==null)? '':$leClient['tel_c'] ?>" 
				></td>
		</tr>
		<tr>
			<td> RIB</td>
			<td><input type="text" name="rib_c"
		value="<?= ($leClient==null)? '':$leClient['rib_c'] ?>" 
				></td>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"></td>
			<td><input type="submit" 
		<?= ($leClient==null)? ' name="Valider" value="Valider" ' : 
			' name="Modifier" value="Modifier" ' ?>
				></td>
		</tr>
	</table>
	<?= ($leClient==null)? '' : ' <input type="hidden" name="id_c" value="'.$leClient['id_c'].'">' ?>
</form>







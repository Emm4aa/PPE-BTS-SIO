<h3> Ajout d'une habitation </h3>

<form method="post">
	<table border="0">
		<tr>
			<td> Désignation habitation</td>
			<td><input type="text" name="designation"></td>
		</tr>
		<tr>
			<td> Etat de l'habitation</td>
			<td><select name="etat">
				<option value="Excellent"> Excellent </option>
				<option value="Moyen"> Moyen </option>
				<option value="Mauvais"> Mauvais </option>
				<option value="inconnu"> inconnu </option>
				</select>	
				</td>
		</tr>
		<tr>
			<td> Date d'achat</td>
			<td><input type="date" name="dateAchat"></td>
		</tr>
		<tr>
			<td> Le Client  </td>
			<td><select name="id_client">
				<option value=""> Sélectionner un client </option>
				<?php
				foreach ($lesClients as $unClient) {
					echo "<option value='".$unClient['id_client']."'>";
					echo $unClient['id_client']."-".$unClient['nom']." ".$unClient['prenom'];
					echo "</option>";
				}
				
				?>
				</select>
				</td>
		</tr>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"></td>
			<td><input type="submit" name="Valider" value="Valider"></td>
		</tr>
	</table>
</form>
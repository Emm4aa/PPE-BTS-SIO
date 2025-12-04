<h3> Ajout d'une réservation </h3>

<form method="post">
	<table border="0">
		<tr>
			<td> Désignation réservation</td>
			<td><input type="text" name="designation"></td>
		</tr>
		 
		<tr>
			<td> Date réservation</td>
			<td><input type="date" name="dateres"></td>
		</tr>
		<tr>
			<td> Prix réservation</td>
			<td><input type="float" name="prixres"></td>
		</tr>
		<tr>
			<td> Le Propriétaire </td>
			<td><select name="id_proprio">
				<option value=""> Sélectionner un Propriétaire </option>
				<?php

				?>
				</select>
				</td>
		</tr>
		<tr>
			<td> L'habitation du client </td>
			<td><select name="ref">
				<option value=""> Sélectionner une habitation </option>
				<?php

				?>
				</select>
				</td>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"></td>
			<td><input type="submit" name="Valider" value="Valider"></td>
		</tr>
	</table>
</form>
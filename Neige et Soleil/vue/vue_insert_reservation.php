<h3> Ajout d'une réservation </h3>

<form class="insert" method="post">
	<table>
		<tr>
			<td> Désignation réservation</td>
			<td><input type="text" name="designation"></td>
		</tr>
		 
		<tr>
			<td> Date début de séjour</td>
			<td><input type="date" name="date_debut"></td>
		</tr>
		<tr>
			<td> Date fin de séjour</td>
			<td><input type="date" name="date_fin"></td>
		</tr>
		
		<tr>
			<td> Le Propriétaire </td>
			<td><select name="id_p">
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
	</table><br>
	<div>
		<button type="reset" name="Annuler" value="Annuler">Annuler</button>
		<button type="submit" name="Valider" value="Valider">Valider</button>
	</div>
</form>
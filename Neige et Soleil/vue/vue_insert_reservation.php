<div class="vueInsert">

<h3> Ajout d'une réservation </h3>
<form class="insert" method="post">
	<table>
		<tr>
			<td> Nombre de personne</td>
			<td><input type="number" name="nb_perso"></td>
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
			<td> Etat de la réservation</td>
			<td><select name="etat_res">
				<option value=""> Choisir un état </option>
				<option value="en demande"> En demande </option>
				<option value="acceptee"> Acceptée </option>
				<option value="expiree"> Expirée </option>
				<option value="refusee"> Refusée </option>
				<option value="confirmee"> Confirmée </option>
				<option value="annulee"> Annulée </option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td> Le client </td>
			<td><select name="id_c">
				<option value=""> Sélectionner un client </option>
				<?php
					foreach ($lesClients as $unClient) {
					echo "<option value='".$unClient['id_c']."'>";
					echo $unClient['id_c']."-".$unClient['nom_c']." ".$unClient['prenom_c'];
					echo "</option>";
				}
				?>
				</select>
				</td>
		</tr>
		<tr>
			<td> L'habitation à réserver </td>
			<td><select name="ref_hab">
				<option value=""> Sélectionner une habitation </option>
				<?php
					foreach ($lesHabitations as $uneHabitation) {
					echo "<option value='".$uneHabitation['ref_hab']."'>";
					echo $uneHabitation['ref_hab']."-".$uneHabitation['type_hab']."-".$uneHabitation['ville_hab'];
					echo "</option>";
				}
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

</div>
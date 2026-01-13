<div class="vueInsert">

<h3> Ajout d'une réservation </h3>
<form class="insert" method="post">
	<table>
		<tr>
			<td> Nombre de personnes</td>
			<td><input type="number" name="nb_perso" value="<?= ($reservation==null)?"":$reservation['nb_perso'] ?>"></td>
		</tr>
		<tr>
			<td> Date début séjour</td>
			<td><input type="date" name="date_debut" value="<?= ($reservation==null)?"":$reservation['date_debut'] ?>"></td>
		</tr>
		<tr>
			<td> Date fin séjour</td>
			<td><input type="date" name="date_fin" value="<?= ($reservation==null)?"":$reservation['date_fin'] ?>"></td>
		</tr>

		<tr>
			<td> Etat de la réservation</td>
			<td><select name="etat_res">
				<option value="<?= ($reservation==null)?"Choisir un etat":$reservation['etat_res'];?>"><?= ($reservation==null)?"Choisir un etat":$reservation['etat_res'];?></option>
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
				<option value="<?= ($reservation==null)?"Selectionner un client":$reservation['id_c'] ?>"><?= ($reservation==null)?"Selectionner un client":$reservation['id_c'] ?></option>
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
			<td> L'habitation à réserver</td>
			<td><select name="ref_hab">
				<option value="<?= ($reservation==null)?"Selectionner un habitation":$reservation['ref_hab'] ?>"><?= ($reservation==null)?"Selectionner un habitation":$reservation['ref_hab'] ?></option>
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
		<input class="btnForm" type="submit" name="annuler" value="annuler">		
		<input class="btnForm" type="submit" <?= ($reservation==null)?'name="valider" 
		id="valider" value="valider"' : 'name="modifier" id="modifier" value="modifier"';?>
		>
	</div>
	<?= ($reservation==null)?"":'<input type="hidden" name="ref_res" value="'.$reservation['ref_res'].'">';?>
</form>

</div>
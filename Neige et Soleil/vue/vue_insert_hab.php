<div class="vueInsert">

<h3> Ajout d'une habitation </h3>
<form class="insert" method="post">
	<table>
		<tr>
			<td> Type </td>
			<td><input type="text" name="type_hab" value="<?= ($habitation==null)?"":$habitation['type_hab']; ?>"></td>
		</tr>
		<tr>
			<td> Adresse </td>
			<td><input type="text" name="adr_hab" value="<?= ($habitation==null)?"":$habitation['adr_hab']; ?>"></td>
		</tr>
		<tr>
			<td> Code postal </td>
			<td><input type="text" name="cp_hab" value="<?= ($habitation==null)?"":$habitation['cp_hab']; ?>"></td>
		</tr>
		<tr>
			<td> Ville </td>
			<td><input type="text" name="ville_hab" value="<?= ($habitation==null)?"":$habitation['ville_hab']; ?>"></td>
		</tr>
		<tr>
			<td> Tarif min </td>
			<td><input type="text" name="tarif_hab_bas" value="<?= ($habitation==null)?"":$habitation['tarif_hab_bas']; ?>"></td>
		</tr>
		<tr>
			<td> Tarif moyen </td>
			<td><input type="text" name="tarif_hab_moy" value="<?= ($habitation==null)?"":$habitation['tarif_hab_moy']; ?>"></td>
		</tr>
		<tr>
			<td> Tarif max </td>
			<td><input type="text" name="tarif_hab_hau" value="<?= ($habitation==null)?"":$habitation['tarif_hab_hau']; ?>"></td>
		</tr>
		<tr>
			<td> Surface </td>
			<td><input type="text" name="surface" value="<?= ($habitation==null)?"":$habitation['surface']; ?>"></td>
		</tr>
		<tr>
			<td> Proprietaire </td>
			<td><select name="id_p">
				<option value="<?= ($habitation==null)?"":$habitation['id_p']; ?>"> <?= ($habitation==null)?"":$habitation['id_p']; ?> </option>
				<?php
				foreach ($lesProprietaires as $unProprietaire) {
					echo "<option value='".$unProprietaire['id_p']."'>";
					echo $unProprietaire['id_p']."-".$unProprietaire['nom_p']." ".$unProprietaire['prenom_p'];
					echo "</option>";
				}
				?>
				</select>
			</td>
		</tr>
	</table><br>
	<div>
		<input class="btnForm" type="submit" name="annuler" value="annuler">
		<input class="btnForm" type="submit" <?= ($habitation==null)?'name="valider" id="valider" 
		value="valider"' : 'name="modifier" id="modifier" value="modifier"'?>>
	</div>
	<?= ($habitation==null)?"":'<input type="hidden" name="ref_hab" value="'.$habitation['ref_hab'].'">';?>
</form>
</div>
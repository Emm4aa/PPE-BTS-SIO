<div class="vueInsert">

<h3> Ajout d'une habitation </h3>
<form class="insert" method="post">
	<table>
		<tr>
			<td> Type d'habitation </td>
			<td><input type="text" name="type_hab"></td>
		</tr>
		<tr>
			<td> Adresse postale</td>
			<td><input type="text" name="adr_hab"></td>
		</tr>
		<tr>
			<td> Code postal</td>
			<td><input type="text" name="cp_hab"></td>
		</tr>
		<tr>
			<td> Ville</td>
			<td><input type="text" name="ville_hab"></td>
		</tr>
		<tr>
			<td> Tarif le plus bas </td>
			<td><input type="text" name="tarif_hab_bas"></td>
		</tr>
		<tr>
			<td> Tarif moyen </td>
			<td><input type="text" name="tarif_hab_moy"></td>
		</tr>
		<tr>
			<td> Tarif le plus haut </td>
			<td><input type="text" name="tarif_hab_hau"></td>
		</tr>
		<tr>
			<td> Surface </td>
			<td><input type="text" name="surface"></td>
		</tr>
		<tr>
			<td> Proprietaire </td>
			<td><select name="id_p">
				<option value=""> Sélectionner un proprietaire </option>
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
		<button type="reset" name="Annuler" value="Annuler">Annuler</button>
		<button type="submit" name="Valider" value="Valider">Valider</button>
	</div>
</form>

</div>
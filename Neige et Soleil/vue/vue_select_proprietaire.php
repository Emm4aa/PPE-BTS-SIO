<div class="vueSelect">

<h3>Liste des Propriétaires</h3>
<form class="listes" method="post">
	<label for="filtre">Filtrer par : </label>
	<input type="text" name="filtre">
	<input class="btnForm" type="submit" name="filtrer" value="filtrer">
	<input class="btnForm" type="submit" name="effacer" value="effacer">
</form><br>

<table>
	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Email</th> 
		<th>Adresse</th>
		<th>Code Postal</th>
		<th>Ville</th>
		<th>Téléphone</th>
		<th>RIB</th>
		<?php 
			if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				echo "<th> Opérations </th>";
			}
		?>
	</tr>
<?php 
	if (isset($lesProprietaires)){
		foreach ($lesProprietaires as $unProprietaire) {
			echo "<tr>"; 
			echo "<td>".$unProprietaire['id_p']."</td>";
			echo "<td>".$unProprietaire['nom_p']."</td>";
			echo "<td>".$unProprietaire['prenom_p']."</td>";
			echo "<td>".$unProprietaire['email_p']."</td>";
			echo "<td>".$unProprietaire['adr_p']."</td>";
			echo "<td>".$unProprietaire['cp_p']."</td>";
			echo "<td>".$unProprietaire['ville_p']."</td>";
			echo "<td>".$unProprietaire['tel_p']."</td>";
			echo "<td>".$unProprietaire['rib_p']."</td>";  
			
				echo "<td>"; 
				echo "<a href='index.php?page=3&action=sup&id_p=".$unProprietaire['id_p']."'>"; 
				echo "<img src='images/supprimer.png' width='30' height='30' > </a>";

				echo "<a href='index.php?page=3&action=edit&id_p=".$unProprietaire['id_p']."'>"; 
				echo "<img src='images/modifier.png' width='30' height='30' > </a>";

				echo "</td>";
			}
			echo "</tr>";
		}
?>
</table>
<br>
<?= (isset($lesProprietaires)) ? "Nombre de Proprietaires : " . count($lesProprietaires) : "" ?>

</div>









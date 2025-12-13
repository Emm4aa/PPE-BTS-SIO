<h3> Liste des clients </h3>

<form class="listes" method="post">
	<label for="filtre">Filtrer par :</label> 
	<input type="text" name="filtre">
	<button type="submit" name="Filtrer" value="Filtrer">Filtrer</button>
</form>
<br>
<table>
	<tr>
		<th>Id Client</th>
		<th>Nom Client</th>
		<th>Prénom Client</th>
		<th>Email Contact</th> 
		<th>Adresse</th>
		<th>Code postale</th>
		<th>Ville</th>
		<th>Téléphone</th>
		<?php 
			if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				echo "<td> Opérations </td>";
			}
		?>
	</tr>
<?php 
	if (isset($lesClients)){
		foreach ($lesClients as $unClient) {
			echo "<tr>"; 
			echo "<td>".$unClient['id_c']."</td>";
			echo "<td>".$unClient['nom_c']     ."</td>";
			echo "<td>".$unClient['prenom_c']  ."</td>";
			echo "<td>".$unClient['email_c']   ."</td>";
			echo "<td>".$unClient['adr_c'] ."</td>";
			echo "<td>".$unClient['cp_c'] ."</td>";
			echo "<td>".$unClient['ville_c'] ."</td>";
			echo "<td>".$unClient['tel_c']     ."</td>"; 
			/*if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')*/
				echo "<td>"; 
				echo "<a href='index.php?page=2&action=sup&id_c=".$unClient['id_c']."'>"; 
				echo "<img src='images/supprimer.png' width='30' height='30' > </a>";

				echo "<a href='index.php?page=2&action=edit&id_c=".$unClient['id_c']."'>"; 
				echo "<img src='images/modifier.png' width='30' height='30' > </a>";

				echo "</td>";
			}
			echo "</tr>";
		}
	/*}*/
?>
</table>
<br>
<?= (isset($lesClients)) ? "Nombre de clients : " . count($lesClients) : "" ?>











<h3> Liste des clients </h3>

<form method="post">
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
	<tr>
		<td> Id Client </td>
		<td> Nom Client </td>
		<td> Prénom Client </td>
		<td> Email Contact </td> 
		<td> Adresse </td>
		<td> Code postal </td>
		<td> Ville </td>
		<td> Téléphone </td>
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
			if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				echo "<td>"; 
				echo "<a href='index.php?page=2&action=sup&id_c=".$unClient['id_c']."'>"; 
				echo "<img src='images/supprimer.png' width='30' height='30' > </a>";

				echo "<a href='index.php?page=2&action=edit&id_c=".$unClient['id_c']."'>"; 
				echo "<img src='images/modifier.png' width='30' height='30' > </a>";

				echo "</td>";
			}
			echo "</tr>";
		}
	}
?>
</table>
<br>
<?= (isset($lesClients)) ? "Nombre de clients : " . count($lesClients) : "" ?>











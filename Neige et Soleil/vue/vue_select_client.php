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
		<td> Adresse Postale </td>
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
			echo "<td>".$unClient['idclient']."</td>";
			echo "<td>".$unClient['nom']     ."</td>";
			echo "<td>".$unClient['prenom']  ."</td>";
			echo "<td>".$unClient['email']   ."</td>";
			echo "<td>".$unClient['adresse'] ."</td>";
			echo "<td>".$unClient['tel']     ."</td>"; 
			if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				echo "<td>"; 
				echo "<a href='index.php?page=2&action=sup&idclient=".$unClient['idclient']."'>"; 
				echo "<img src='images/supprimer.png' width='30' height='30' > </a>";

				echo "<a href='index.php?page=2&action=edit&idclient=".$unClient['idclient']."'>"; 
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











<h3> Liste des Proprietaires </h3>

<form method="post">
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
	<tr>
		<td> Id Proprietaire </td>
		<td> Nom Proprietaire </td>
		<td> Prénom Proprietaire </td>
		<td> Email Contact </td> 
		<td> Adresse </td>
		<td> Code Postal </td>
		<td> Ville </td>
		<td> Téléphone </td>
		<?php 
			if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				echo "<td> Opérations </td>";
			}
		?>
	</tr>
<?php 
	if (isset($lesProprietaires)){
		foreach ($lesProprietaires as $unProprietaire) {
			echo "<tr>"; 
			echo "<td>".$unProprietaire['id_p']."</td>";
			echo "<td>".$unProprietaire['nom_p']     ."</td>";
			echo "<td>".$unProprietaire['prenom_p']  ."</td>";
			echo "<td>".$unProprietaire['email_p']   ."</td>";
			echo "<td>".$unProprietaire['adr_p'] ."</td>";
			echo "<td>".$unProprietaire['cp_p'] ."</td>";
			echo "<td>".$unProprietaire['ville_p'] ."</td>";
			echo "<td>".$unProprietaire['tel_p']     ."</td>"; 
			if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				echo "<td>"; 
				echo "<a href='index.php?page=2&action=sup&id_p=".$unProprietaire['id_p']."'>"; 
				echo "<img src='images/supprimer.png' width='30' height='30' > </a>";

				echo "<a href='index.php?page=2&action=edit&id_p=".$unProprietaire['id_p']."'>"; 
				echo "<img src='images/modifier.png' width='30' height='30' > </a>";

				echo "</td>";
			}
			echo "</tr>";
		}
	}
?>
</table>
<br>
<?= (isset($lesProprietaires)) ? "Nombre de Proprietaires : " . count($lesProprietaires) : "" ?>











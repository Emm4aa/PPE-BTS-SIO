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
		<td> Adresse Postale </td>
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
			echo "<td>".$unProprietaire['idProprietaire']."</td>";
			echo "<td>".$unProprietaire['nom']     ."</td>";
			echo "<td>".$unProprietaire['prenom']  ."</td>";
			echo "<td>".$unProprietaire['email']   ."</td>";
			echo "<td>".$unProprietaire['adresse'] ."</td>";
			echo "<td>".$unProprietaire['tel']     ."</td>"; 
			if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				echo "<td>"; 
				echo "<a href='index.php?page=2&action=sup&idProprietaire=".$unProprietaire['idProprietaire']."'>"; 
				echo "<img src='images/supprimer.png' width='30' height='30' > </a>";

				echo "<a href='index.php?page=2&action=edit&idProprietaire=".$unProprietaire['idProprietaire']."'>"; 
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











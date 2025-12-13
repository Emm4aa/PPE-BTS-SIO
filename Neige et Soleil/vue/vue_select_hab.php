<h3>Liste des habitations</h3>
<form class="listes" method="post">
    <label for="filtre">Filtrer par :</label> 
    <input type="text" name="filtre">
    <button type="submit" name="Filtrer" value="Filtrer">Filtrer</button>
</form><br>

<table>
    <tr>
        <th>Référence</th>
        <th>Type d'habitation</th>
        <th>Adresse</th>
        <th>Code postal</th>
        <th>Ville</th>
        <th>Tarif + bas</th>
        <th>Tarif moyen</th>
        <th>Tarif + haut</th>
        <th>Surface</th>
        <?php 
			if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				echo "<td> Opération </td>";
			}
		?>
    </tr>

    <?php
    if (isset($unehab)) {
        foreach ($unehab as $hab) {
            echo "<tr>";
                echo "<td>" . $hab['ref_hab'] . "</td>";
                echo "<td>" . $hab['type_hab'] . "</td>";
                echo "<td>" . $hab['adr_hab'] . "</td>";
                echo "<td>" . $hab['cp_hab'] . "</td>";
                echo "<td>" . $hab['ville_hab'] . "</td>";
                echo "<td>" . $hab['tarif_hab_bas'] . "</td>";
                echo "<td>" . $hab['tarif_hab_moy'] . "</td>";
                echo "<td>" . $hab['tarif_hab_hau'] . "</td>";
                echo "<td>" . $hab['surface'] . "</td>";
                echo "<td>" . $hab['id_p'] . "</td>";
                if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				echo "<td>"; 
				echo "<a href='index.php?page=2&action=sup&ref_hab=".$hab['ref_hab']."'>"; 
				echo "<img src='images/supprimer.png' width='30' height='30' > </a>";

				echo "<a href='index.php?page=2&action=edit&ref_hab=".$hab['ref_hab']."'>"; 
				echo "<img src='images/modifier.png' width='30' height='30' > </a>";

				echo "</td>";
			}
			echo "</tr>";
        }
    }
    ?>
</table>
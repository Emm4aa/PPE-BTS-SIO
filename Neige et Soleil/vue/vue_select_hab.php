<div class="vueSelect">

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
        <th>ID du proprietaire </th>
        <?php 
			if(isset($_SESSION['role']) && $_SESSION['role'] == 'proprietaire'){
				echo "<td> Opération </td>";
			}
		?>
    </tr>

    <?php
    if (isset($lesHabitations)) {
        foreach ($lesHabitations as $uneHabitation) {
            echo "<tr>";
                echo "<td>" . $uneHabitation['ref_hab'] . "</td>";
                echo "<td>" . $uneHabitation['type_hab'] . "</td>";
                echo "<td>" . $uneHabitation['adr_hab'] . "</td>";
                echo "<td>" . $uneHabitation['cp_hab'] . "</td>";
                echo "<td>" . $uneHabitation['ville_hab'] . "</td>";
                echo "<td>" . $uneHabitation['tarif_hab_bas'] . "</td>";
                echo "<td>" . $uneHabitation['tarif_hab_moy'] . "</td>";
                echo "<td>" . $uneHabitation['tarif_hab_hau'] . "</td>";
                echo "<td>" . $uneHabitation['surface'] . "</td>";
                echo "<td>" . $uneHabitation['id_p'] . "</td>";
                /*if(isset($_SESSION['role']) && $_SESSION['role'] == 'proprietaire'){*/
				echo "<td>"; 
				echo "<a href='index.php?page=4&action=sup&ref_hab=".$uneHabitation['ref_hab']."'>"; 
				echo "<img src='images/supprimer.png' width='30' height='30' > </a>";

				echo "<a href='index.php?page=4&action=edit&ref_hab=".$uneHabitation['ref_hab']."'>"; 
				echo "<img src='images/modifier.png' width='30' height='30' > </a>";

				echo "</td>";
			}
			echo "</tr>";
        }
    /*}*/
    ?>
</table>
<br>
<?= (isset($lesHabitations)) ? "Nombre de d'habitation : " . count($lesHabitations) : "" ?>

</div>
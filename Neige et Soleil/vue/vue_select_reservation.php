<h3>Liste des réservations</h3>

<form class="listes" method="post">
    <label for="filtre">Filtrer par : </label>
    <input type="text" name="filtre">
    <button type="submit" name="Filtrer" value="Filtrer">Filter</button>
</form>
<br>
<table>
    <tr>
        <th>id_resa</th>
        <th>date_resa</th>
        <th>capacite</th>
        <th>date_deb</th>
        <th>date_fin</th>
        <th>état</th>
        <th>id_client</th>
    </tr>
<?php
if (isset($unereservation)){
    foreach ($unereservation as $unereservation){
        echo "<tr>";
        echo "<td>".$unereservation['ref_res']."</td>";
        echo "<td>".$unereservation['date_res']."</td>";
        echo "<td>".$unereservation['nb_perso']."</td>";
        echo "<td>".$unereservation['date_debut']."</td>";
        echo "<td>".$unereservation['date_fin']."</td>";
        echo "<td>".$unereservation['etat_res']."</td>";
        echo "<td>".$unereservation['id_client']."</td>";
        echo "<td>";
        echo "<a href='index.php?page=2&action=sip&id_ref_resresa=".$unereservation['ref_res']."'>";
        echo "<img src='image/supprimer.png' width='30' height='30'> </a>";

        echo "<a href='index.php?page=2&action=sup&ref_res=".$unereservation['ref_res']."'>";
        echo "<img src='image/supprimer.png' width='30' height='30'> </a>";

        echo "<a href='index.php?page=2&action=edit&ref_res=".$unereservation['ref_res']."'>";
        echo "<img src='image/modifier.png' width='30' height='30'> </a>";

        echo "</td>";
        echo "</tr>";
    }
}
?>
</table>
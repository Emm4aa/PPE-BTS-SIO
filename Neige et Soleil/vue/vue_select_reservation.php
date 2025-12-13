<h3>Liste des réservations</h3>

<form class="listes" method="post">
    <label for="filtre">Filtrer par : </label>
    <input type="text" name="filtre">
    <button type="submit" name="Filtrer" value="Filtrer">Filter</button>
</form>
<br>
<table>
    <tr>
        <th>ID de la réservation</th>
        <th>Date de la réservation</th>
        <th>Nombre de personne</th>
        <th>Date du début</th>
        <th>Date de la fin</th>
        <th>Etat</th>
        <th>ID du client</th>
        <th>ID l'habitation</th>
    </tr>
<?php
if (isset($lesReservations)){
    foreach ($lesReservations as $uneReservation){
        echo "<tr>";
        echo "<td>".$uneReservation['ref_res']."</td>";
        echo "<td>".$uneReservation['date_res']."</td>";
        echo "<td>".$uneReservation['nb_perso']."</td>";
        echo "<td>".$uneReservation['date_debut']."</td>";
        echo "<td>".$uneReservation['date_fin']."</td>";
        echo "<td>".$uneReservation['etat_res']."</td>";
        echo "<td>".$uneReservation['id_c']."</td>";
        echo "<td>".$uneReservation['ref_hab']."</td>";
        echo "<td>";

        echo "<a href='index.php?page=5&action=sup&ref_res=".$uneReservation['ref_res']."'>";
        echo "<img src='images/supprimer.png' width='30' height='30'> </a>";

        echo "<a href='index.php?page=5&action=edit&ref_res=".$uneReservation['ref_res']."'>";
        echo "<img src='images/modifier.png' width='30' height='30'> </a>";

        echo "</td>";
        echo "</tr>";
    }
}
?>
</table>
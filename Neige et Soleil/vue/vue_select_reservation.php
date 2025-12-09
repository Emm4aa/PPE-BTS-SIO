<h3>Liste des réservations</h3>

<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
    <tr>
        <td> id_resa </td>
        <td> date_resa </td>
        <td> capacite </td>
        <td> date_deb </td>
        <td> date_fin </td>
        <td> etat </td>
        <td> id_client </td>
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
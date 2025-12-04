<h3>Liste des habitations</h3>
<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>

<table border="1">
    <tr>
        <th>ref</th>
        <th>adresse</th>
        <th>type_hab</th>
        <th>tarif</th>
        <th>surface</th>
        <th>id_proprio</th>
        <th>Actions</th>
    </tr>

    <?php
    if (isset($unehab)) {
        foreach ($unehab as $hab) {
            echo "<tr>";
                echo "<td>" . $hab['ref'] . "</td>";
                echo "<td>" . $hab['adresse'] . "</td>";
                echo "<td>" . $hab['type_hab'] . "</td>";
                echo "<td>" . $hab['tarif'] . "</td>";
                echo "<td>" . $hab['surface'] . "</td>";
                echo "<td>" . $hab['id_proprio'] . "</td>";
                echo "<td>";

                    echo "<a href='index.php?page=2&action=sip&ref=" . $hab['ref'] . "'>";
                    echo "<img src='image/supprimer.png' width='30' height='30'></a> ";

                    echo "<a href='index.php?page=2&action=sup&ref=" . $hab['ref'] . "'>";
                    echo "<img src='image/supprimer.png' width='30' height='30'></a> ";

                    echo "<a href='index.php?page=2&action=edit&ref=" . $hab['ref'] . "'>";
                    echo "<img src='image/modifier.png' width='30' height='30'></a>";

                echo "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
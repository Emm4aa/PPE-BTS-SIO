<section>
    <div class="vueSelect">
    <h3> Contrats Validés </h3>
	    <table>
            <tr>
                <th>ID client</th>
                <th>Nombre de contrats validées</th>
            </tr>
            <?php foreach($lesReservations as $laReservation):?>
            <tr>
                <td><?= $laReservation['id_c'] ?></td>
                <td><?= $laReservation['nb_validee'] ?></td>
            </tr>
            <?php endforeach; ?>
	    </table><br>
    </div>
    <div class="vueSelect">
    <h3> Contrats propriétaires </h3>
	    <table>
            <tr>
                <th>ID propriétaire</th>
                <th>Nombre de contrats</th>
            </tr>
            <?php foreach($lesContrats as $leContrat):?>
            <tr>
                <td><?= $leContrat['id_p'] ?></td>
                <td><?= $leContrat['nb_contrats'] ?></td>
            </tr>
            <?php endforeach; ?>
	    </table><br>
    </div>
</section>
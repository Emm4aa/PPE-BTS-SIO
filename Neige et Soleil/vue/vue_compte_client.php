<section>
    <h1>Mon compte</h1>
<div class="vue_compte">
<div class="infos_perso">
    <h4>Mes informations</h4>
    <table>
        <tr>
            <th id="top">Nom</th>
            <td id="top"><?= htmlspecialchars($_SESSION['nom']) ?></td>
        </tr>
        <tr>
            <th>Prenom</th>
            <td><?= htmlspecialchars($_SESSION['prenom']) ?></td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td> <?=  htmlspecialchars($_SESSION['adresse']) ?> </td>
        </tr>
        <tr>
            <th>Code postal</th>
            <td><?=  htmlspecialchars($_SESSION['cp']) ?></td>
        </tr>
        <tr>
            <th>Ville</th>
            <td> <?= htmlspecialchars($_SESSION['ville']) ?> </td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($_SESSION['email']) ?></td>
        </tr>
        <tr>
            <th id="bottom">Téléphone</th>
            <td id="bottom"><?= htmlspecialchars($_SESSION['tel']) ?></td>
        </tr>
    </table>
</div>
<div class="infos_activites">
    <h4>Mes réservations</h4>
        <?php if(!empty($resaClient)): ?>
            <table>
                <tr>
                    <th>Réf</th>
                    <th>ID habitation</th>
                    <th>Nombre personnes</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Etat</th>
                    <th>Option</th>
                </tr>
            <?php foreach($resaClient as $resa): ?>
                <tr>
                    <td><?= htmlspecialchars($resa['ref_res']);?></td>
                    <td><?= htmlspecialchars($resa['ref_hab']);?></td>
                    <td><?= htmlspecialchars($resa['nb_perso']);?></td>
                    <td><?= htmlspecialchars($resa['date_debut']);?></td>
                    <td><?= htmlspecialchars($resa['date_fin']);?></td>
                    <td><?= htmlspecialchars($resa['etat_res']) ?></td>
                    <td>
                        <?php if ($resa['etat_res'] == 'en demande'):?>
                        <a href="index.php?page=6&action=sup&ref_res=<?= $resa['ref_res'] ?>" id="btAnnulerReservation"
                        onclick="return confirm('Voulez vous annuler cette réservation ?')">
                            <span class="material-symbols-outlined">close</span>
                        </a>
                        <?php else: ?>
                            <span class="material-symbols-outlined" id="btReservationValidee">check</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
                <p>Aucune résérvation à ce jour</p>
        <?php endif; ?>
    </table>
</div>
</div>
</section>
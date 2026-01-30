<section>
    <h1>Mon compte</h1>
<div class="vue_compte">
<div class="infos_perso">
    <?php if(isset($_SESSION['msg-update'])):?>
        <h2 style="color:green"><?= $_SESSION['msg-update'] ?></h2>
    <?php unset($_SESSION['msg-update']);?>
    <?php endif; ?>
    <h4>Mes informations</h4>
    <table>
        <tr>
            <th id="top">Nom</th>
            <td id="top"><?= ($leClient == null)?"":$leClient['nom_c'];?></td>
        </tr>
        <tr>
            <th>Prenom</th>
            <td><?= ($leClient == null)?"":$leClient['prenom_c'];?></td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td><?= ($leClient == null)?"":$leClient['adr_c'];?></td>
        </tr>
        <tr>
            <th>Code postal</th>
            <td><?= ($leClient == null)?"":$leClient['cp_c'];?></td>
        </tr>
        <tr>
            <th>Ville</th>
            <td><?= ($leClient == null)?"":$leClient['ville_c'];?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= ($leClient == null)?"":$leClient['email_c'];?></td>
        </tr>
        <tr>
            <th id="bottom">Téléphone</th>
            <td id="bottom"><?= ($leClient == null)?"":$leClient['tel_c'];?></td>
        </tr>
    </table>
    <a href="index.php?page=20" id="btModifierInfosPersoClient">modifier</a>
</div>
<div class="infos_activites">
    <?php if(isset($_SESSION['msg-annul-reservation'])):?>
        <h2 style="color:green"><?= $_SESSION['msg-annul-reservation'] ?></h2>
    <?php unset($_SESSION['msg-annul-reservation']);?>
    <?php endif; ?>
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
                        <?php if ($resa['etat_res'] == 'en demande' || $resa['date_debut'] >= date('Y-m-d')):?>
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
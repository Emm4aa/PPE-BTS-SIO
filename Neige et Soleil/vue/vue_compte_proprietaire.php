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
            <td><?= htmlspecialchars($_SESSION['adresse']) ?></td>
        </tr>
        <tr>
            <th>Code postal</th>
            <td><?= htmlspecialchars($_SESSION['cp']) ?></td>
        </tr>
        <tr>
            <th>Ville</th>
            <td><?= htmlspecialchars($_SESSION['ville']) ?></td>
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
    <h4>Mes habitations</h4>
    <?php if(!empty($habProprio)): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Adresse</th>
                <th>CP</th>
                <th>Ville</th>
                <th>Surface</th>
                <th>Option</th>
            </tr>
    <?php foreach($habProprio as $hab): ?>
        <tr>
            <td><?= htmlspecialchars($hab['ref_hab']);?></td>
            <td><?= htmlspecialchars($hab['type_hab']);?></td>
            <td><?= htmlspecialchars($hab['adr_hab']);?></td>
            <td><?= htmlspecialchars($hab['cp_hab']);?></td>
            <td><?= htmlspecialchars($hab['ville_hab']);?></td>
            <td><?= htmlspecialchars($hab['surface']."m2");?></td>
            <td>
                <a href="index.php?page=7&action=sup&ref_hab=<?= $hab['ref_hab'] ?>" id="btAnnulerReservation"
                    onclick="return confirm('Voulez vous supprimer cette habitation ?')">
                    <span class="material-symbols-outlined" translate="no">close</span>
                </a>

            </td>
        </tr>
    <?php endforeach; ?>
    <?php else :?>
        <p>Aucune habitation enregistré</p>
    <?php endif; ?>
    </table>
    <a href="index.php?page=13" id="btAjouterHabitation" translate="no">
        <span class="material-symbols-outlined">add</span>
    </a>
</div>
</div>
</section>
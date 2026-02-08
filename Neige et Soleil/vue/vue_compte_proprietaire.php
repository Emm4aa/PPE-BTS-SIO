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
            <td id="top"><?= ($utilisateur == null)?"":$utilisateur['nom'];?></td>
        </tr>
        <tr>
            <th>Prenom</th>
            <td><?= ($utilisateur == null)?"":$utilisateur['prenom'];?></td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td><?= ($leProprietaire == null)?"":$leProprietaire['adresse'];?></td>
        </tr>
        <tr>
            <th>Code postal</th>
            <td><?= ($leProprietaire == null)?"":$leProprietaire['cp'];?></td>
        </tr>
        <tr>
            <th>Ville</th>
            <td><?= ($leProprietaire == null)?"":$leProprietaire['ville'];?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= ($utilisateur == null)?"":$utilisateur['email'];?></td>
        </tr>
        <tr>
            <th id="bottom">Téléphone</th>
            <td id="bottom"><?= ($utilisateur == null)?"":$utilisateur['tel'];?></td>
        </tr>
    </table>
    <a href="index.php?page=21" class="btModifier">
        <span class="material-symbols-outlined" translate="no">edit</span>
    </a>
</div>
<div class="infos_activites">
    <?php if(isset($_SESSION['msg-update-habitation'])):?>
        <h2 style="color:green"><?= $_SESSION['msg-update-habitation'] ?></h2>
    <?php unset($_SESSION['msg-update-habitation']);?>
    <?php endif; ?>
    <?php if(isset($_SESSION['msg-supp-habitation'])):?>
        <h2 style="color:green"><?= $_SESSION['msg-supp-habitation'] ?></h2>
    <?php unset($_SESSION['msg-supp-habitation']);?>
    <?php endif; ?>
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
                <th>Contrat</th>
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
                <a href="index.php?page=7&action=sup&ref_hab=<?= $hab['ref_hab'] ?>" id="btSupprimerHabitation"
                    onclick="return confirm('Voulez vous supprimer cette habitation ?')">
                    <span class="material-symbols-outlined" translate="no">close</span>
                </a>
                <a href="index.php?page=22&action=modif&ref_hab=<?= $hab['ref_hab'] ?>" id="btModifierHabitation">
                    <span class="material-symbols-outlined" translate="no">edit</span>
                </a>

            </td>
            <td>
                <a href="generateurContratProprietaire.php?ref_hab=<?= $hab['ref_hab'] ?>" class="btVoirContrat" target="_blank">
                    <span class="material-symbols-outlined" translate="no">visibility</span>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php else :?>
        <p>Aucune habitation enregistrée</p>
    <?php endif; ?>
    </table>
    <a href="index.php?page=13" id="btAjouterHabitation" translate="no">
        <span class="material-symbols-outlined">add</span>
    </a>
</div>
</div>
</section>
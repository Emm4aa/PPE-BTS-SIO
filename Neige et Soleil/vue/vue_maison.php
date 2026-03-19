 
<head>
    <meta charset="UTF-8">
    <title>Gestion des habitations</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>
 

<div class="container mt-4">
    <h1 class="mb-4">Gestion des habitations</h1>

    <div class="row">

        <!-- ================= FORMULAIRE (GAUCHE) ================= -->
        <div class="col-md-4">
            <div class="card p-3">
                <h3>Ajouter / Modifier maison</h3>

                <form method="post" enctype="multipart/form-data">
                    <table class="table table-borderless">

                        <tr>
                            <td>Adresse</td>
                            <td><input class="form-control" type="text" name="adr_hab"
                                value="<?= ($maison==null)?"":$maison['adr_hab']; ?>" required></td>
                        </tr>

                        <tr>
                            <td>Code postal</td>
                            <td><input class="form-control" type="number" name="cp_hab"
                                value="<?= ($maison==null)?"":$maison['cp_hab']; ?>" required></td>
                        </tr>

                        <tr>
                            <td>Ville</td>
                            <td><input class="form-control" type="text" name="ville_hab"
                                value="<?= ($maison==null)?"":$maison['ville_hab']; ?>" required></td>
                        </tr>

                        <tr>
                            <td>Tarif bas</td>
                            <td><input class="form-control" type="number" name="tarif_hab_bas"
                                value="<?= ($maison==null)?"":$maison['tarif_hab_bas']; ?>" required></td>
                        </tr>

                        <tr>
                            <td>Tarif moyen</td>
                            <td><input class="form-control" type="number" name="tarif_hab_moy"
                                value="<?= ($maison==null)?"":$maison['tarif_hab_moy']; ?>" required></td>
                        </tr>

                        <tr>
                            <td>Tarif haut</td>
                            <td><input class="form-control" type="number" name="tarif_hab_hau"
                                value="<?= ($maison==null)?"":$maison['tarif_hab_hau']; ?>" required></td>
                        </tr>

                        <tr>
                            <td>Surface</td>
                            <td><input class="form-control" type="number" name="surface"
                                value="<?= ($maison==null)?"":$maison['surface']; ?>" required></td>
                        </tr>

                        <tr>
                            <td>Proprietaire</td>
                            <td>
                                <select class="form-select" name="id_p" id="id_p" required>
                                    <?php
                                    if  ($maison!=null){
                                     foreach ($lesProprietaires as $unProrprietaire)
                                        if ($unProrprietaire['id_p'] == $maison['id_p']){
                                            echo '<option value="'.$unProrprietaire['id_p'].'">'.$unProrprietaire['nom'].' - '.$unProrprietaire['prenom'].' </option>';
                                            break;
                                        }
                                    }else {
                                    echo '<option value=""> Sélectionner un propriétaire  </option>';
                                    }

                                     foreach ($lesProprietaires as $unProrprietaire){
                                        if ($unProrprietaire['id_p'] != $maison['id_p']){
                                        ?>
                                        <option value="<?= $unProrprietaire['id_p']?>">
                                            <?= $unProrprietaire['id_p']." - ".$unProrprietaire['nom']." - ".$unProrprietaire['prenom'];?>
                                        </option>
                                    <?php } } ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Photos</td>
                            <td><input class="form-control" type="file" name="photos[]" id="photos" multiple></td>
                        </tr>

                        <tr>
                            <td>Description</td>
                            <td>
                                <textarea class="form-control" name="description_hab" rows="3" required><?= ($maison==null)?"":$maison['description_hab']; ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>Titre</td>
                            <td><input class="form-control" type="text" name="titre_hab"
                                value="<?= ($maison==null)?"":$maison['titre_hab']; ?>" required></td>
                        </tr>

                        <tr>
                            <td>Capacité</td>
                            <td><input class="form-control" type="number" name="capacite_hab"
                                value="<?= ($maison==null)?"":$maison['capacite_hab']; ?>" required></td>
                        </tr>

                        <tr>
                            <td>Caractéristique</td>
                            <td><input class="form-control" type="text" name="carac_m"
                                value="<?= ($maison==null)?"":$maison['carac_m']; ?>" required></td>
                        </tr>

                    </table>

                    <!-- Erreurs -->
                    <?php if(!empty($_SESSION['erreurs'])): ?>
                        <?php foreach($_SESSION['erreurs'] as $uneErreur): ?>
                            <div class="alert alert-danger p-2"><?= $uneErreur ?></div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['erreurs']); ?>
                    <?php endif; ?>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="index.php?page=28" class="btn btn-danger">✖</a>

                        <button class="btn btn-success"
                            type="submit"
                            <?= ($maison==null)
                                ? 'name="valider"'
                                : 'name="modifier"' ?>>
                            ✔
                        </button>
                    </div>

                    <?= ($maison==null)?"":'<input type="hidden" name="ref_hab" value="'.$maison['ref_hab'].'">';?>
                </form>
            </div>
        </div>

        <!-- ================= TABLE (DROITE) ================= -->
        <div class="col-md-8">
            <div class="card p-3">
                <h3>Liste des maisons</h3>

                <!-- Filtre -->
                <form method="post" class="d-flex gap-2 mb-3">
                    <input class="form-control" type="text" name="filtre" placeholder="Filtrer...">
                    <button class="btn btn-primary" type="submit" name="filtrer">🔍</button>
                </form>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Réf</th>
                                <th>Type</th>
                                <th>Adresse</th>
                                <th>CP</th>
                                <th>Ville</th>
                                <th>Tarif min</th>
                                <th>Tarif moy</th>
                                <th>Tarif max</th>
                                <th>Surface</th>
                                <th>Proprio</th>
                                <th>Titre</th>
                                <th>Capacité</th>

                                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                                    echo "<th>Actions</th>";
                                } ?>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if (isset($lesMaisons)): ?>
                            <?php foreach($lesMaisons as $uneMaison): ?>
                                <tr>
                                    <td><?= $uneMaison['ref_hab'] ?></td>
                                    <td><?= $uneMaison['type_hab'] ?></td>
                                    <td><?= $uneMaison['adr_hab'] ?></td>
                                    <td><?= $uneMaison['cp_hab'] ?></td>
                                    <td><?= $uneMaison['ville_hab'] ?></td>
                                    <td><?= $uneMaison['tarif_hab_bas'] ?></td>
                                    <td><?= $uneMaison['tarif_hab_moy'] ?></td>
                                    <td><?= $uneMaison['tarif_hab_hau'] ?></td>
                                    <td><?= $uneMaison['surface'] ?></td>
                                    <td><?= $uneMaison['id_p'] ?></td>
                                    <td><?= $uneMaison['titre_hab'] ?></td>
                                    <td><?= $uneMaison['capacite_hab'] ?></td>

                                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                                        <td>
                                            <a class="btn btn-sm btn-danger me-1"
                                               href="index.php?page=28&action=sup&ref_hab=<?= $uneMaison['ref_hab'] ?>"
                                               onclick="return confirm('Supprimer cette habitation ?')">🗑</a>

                                            <a class="btn btn-sm btn-warning"
                                               href="index.php?page=28&action=edit&ref_hab=<?= $uneMaison['ref_hab'] ?>">✏</a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <p>
                    <?= (isset($lesMaisons)) ? "Nombre de maison : " . count($lesMaisons) : "" ?>
                </p>

            </div>
        </div>

    </div>
</div>

<!-- Script limite photos -->
<script>
    const photos = document.getElementById('photos');

    photos.addEventListener("change", () => {
        if (photos.files.length > 3) {
            photos.value = "";
            alert("Maximum 3 photos autorisées");
        }
    });
</script>


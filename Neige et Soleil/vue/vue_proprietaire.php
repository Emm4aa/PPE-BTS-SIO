 
<head>
    <meta charset="UTF-8">
    <title>Gestion des propriétaires</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>

 

<div class="container mt-4">
    <h1 class="mb-4">Gestion des propriétaires</h1>

    <div class="row">

        <!-- ================= FORMULAIRE (GAUCHE) ================= -->
        <div class="col-md-4">
            <div class="card p-3">
                <h3>Ajouter / Modifier propriétaire</h3>

                <form method="post">
                    <table class="table table-borderless">

                        <tr>
                            <td>Nom</td>
                            <td><input class="form-control" type="text" name="nom"
                                value="<?= ($leProprietaire == null)?"":$leProprietaire['nom'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Prénom</td>
                            <td><input class="form-control" type="text" name="prenom"
                                value="<?= ($leProprietaire == null)?"":$leProprietaire['prenom'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><input class="form-control" type="email" name="email"
                                value="<?= ($leProprietaire == null)?"":$leProprietaire['email'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Mot de passe</td>
                            <td><input class="form-control" type="text" name="mdp"
                                value="<?= ($leProprietaire == null)?"":$leProprietaire['mdp'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Adresse</td>
                            <td><input class="form-control" type="text" name="adresse"
                                value="<?= ($leProprietaire == null)?"":$leProprietaire['adresse'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Code postal</td>
                            <td><input class="form-control" type="text" name="cp"
                                value="<?= ($leProprietaire == null)?"":$leProprietaire['cp'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Ville</td>
                            <td><input class="form-control" type="text" name="ville"
                                value="<?= ($leProprietaire == null)?"":$leProprietaire['ville'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Téléphone</td>
                            <td><input class="form-control" type="text" name="tel"
                                value="<?= ($leProprietaire == null)?"":$leProprietaire['tel'];?>" required></td>
                        </tr>

                        <tr>
                            <td>RIB</td>
                            <td><input class="form-control" type="text" name="rib"
                                value="<?= ($leProprietaire == null)?"":$leProprietaire['RIB'];?>" required></td>
                        </tr>

                    </table>

                    <!-- Erreurs -->
                    <?php if(!empty($_SESSION['msg-erreurs'])): ?>
                        <?php foreach($_SESSION['msg-erreurs'] as $uneErreur): ?>
                            <div class="alert alert-danger p-2"><?= $uneErreur ?></div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['msg-erreurs']); ?>
                    <?php endif; ?>

                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-danger" type="submit" name="annuler">✖</button>

                        <button class="btn btn-success"
                            type="submit"
                            <?= ($leProprietaire==null)
                                ? 'name="valider"'
                                : 'name="modifier"' ?>>
                            ✔
                        </button>
                    </div>

                    <?= ($leProprietaire==null)? '' : '<input type="hidden" name="id_user" value="'.$leProprietaire['id_p'].'">' ?>
                </form>
            </div>
        </div>

        <!-- ================= TABLE (DROITE) ================= -->
        <div class="col-md-8">
            <div class="card p-3">
                <h3>Liste des propriétaires</h3>

                <!-- Filtre -->
                <form method="post" action="index.php?page=3#tabListeProprio" class="d-flex gap-2 mb-3">
                    <input class="form-control" type="text" name="filtre" placeholder="Filtrer...">
                    <button class="btn btn-primary" type="submit" name="filtrer">🔍</button>
                </form>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tabListeProprio">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Mdp</th>
                                <th>Adresse</th>
                                <th>CP</th>
                                <th>Ville</th>
                                <th>Tel</th>
                                <th>RIB</th>

                                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                                    echo "<th>Actions</th>";
                                } ?>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if (isset($lesProprietaires)): ?>
                            <?php foreach ($lesProprietaires as $unProprietaire): ?>
                                <tr>
                                    <td><?= $unProprietaire['id_p'] ?></td>
                                    <td><?= $unProprietaire['nom'] ?></td>
                                    <td><?= $unProprietaire['prenom'] ?></td>
                                    <td><?= $unProprietaire['email'] ?></td>
                                    <td><?= $unProprietaire['mdp'] ?></td>
                                    <td><?= $unProprietaire['adresse'] ?></td>
                                    <td><?= $unProprietaire['cp'] ?></td>
                                    <td><?= $unProprietaire['ville'] ?></td>
                                    <td><?= $unProprietaire['tel'] ?></td>
                                    <td><?= $unProprietaire['RIB'] ?></td>

                                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                                        <td>
                                            <a class="btn btn-sm btn-danger me-1"
                                               href="index.php?page=3&action=sup&id_p=<?= $unProprietaire['id_p'] ?>"
                                               onclick="return confirm('Supprimer ce propriétaire ?')">🗑</a>

                                            <a class="btn btn-sm btn-warning"
                                               href="index.php?page=3&action=edit&id_p=<?= $unProprietaire['id_p'] ?>">✏</a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <p>
                    <?= (isset($lesProprietaires)) ? "Nombre de propriétaires : " . count($lesProprietaires) : "" ?>
                </p>

            </div>
        </div>

    </div>
</div>


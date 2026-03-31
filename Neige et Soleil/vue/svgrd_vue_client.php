<head>
    <meta charset="UTF-8">
    <title>Gestion des clients</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>
 

<div class="container mt-4">
    <h1 class="mb-4">Gestion des clients</h1>

    <div class="row">

        <!-- ================= FORMULAIRE (GAUCHE) ================= -->
        <div class="col-md-4">
            <div class="card p-3">
                <h3>Ajouter / Modifier client</h3>

                <form method="post" action="index.php?page=2">
                    <table class="table table-borderless">

                        <tr>
                            <td>Nom</td>
                            <td><input class="form-control" type="text" name="nom"
                                value="<?= ($leClient == null)?"":$leClient['nom'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Prénom</td>
                            <td><input class="form-control" type="text" name="prenom"
                                value="<?= ($leClient == null)?"":$leClient['prenom'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><input class="form-control" type="email" name="email"
                                value="<?= ($leClient == null)?"":$leClient['email'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Mot de passe</td>
                            <td><input class="form-control" type="text" name="mdp"
                                value="<?= ($leClient == null)?"":$leClient['mdp'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Adresse</td>
                            <td><input class="form-control" type="text" name="adresse"
                                value="<?= ($leClient == null)?"":$leClient['adresse'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Code postal</td>
                            <td><input class="form-control" type="text" name="cp"
                                value="<?= ($leClient == null)?"":$leClient['cp'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Ville</td>
                            <td><input class="form-control" type="text" name="ville"
                                value="<?= ($leClient == null)?"":$leClient['ville'];?>" required></td>
                        </tr>

                        <tr>
                            <td>Téléphone</td>
                            <td><input class="form-control" type="text" name="tel"
                                value="<?= ($leClient == null)?"":$leClient['tel'];?>" required></td>
                        </tr>

                        <tr>
                            <td>RIB</td>
                            <td><input class="form-control" type="text" name="rib"
                                value="<?= ($leClient == null)?"":$leClient['RIB'];?>" required></td>
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
                            <?= ($leClient==null)
                                ? 'name="valider"'
                                : 'name="modifier"' ?>>
                            ✔
                        </button>
                    </div>

                    <?= ($leClient==null)? '' : '<input type="hidden" name="id_user" value="'.$leClient['id_c'].'">'; ?>
                </form>
            </div>
        </div>

        <!-- ================= TABLE (DROITE) ================= -->
        <div class="col-md-8">
            <div class="card p-3">
                <h3>Liste des clients</h3>

                <!-- Filtre -->
                <form method="post" action="index.php?page=2#tabListeClients" class="d-flex gap-2 mb-3">
                    <input class="form-control" type="text" name="filtre" placeholder="Filtrer...">
                    <button class="btn btn-primary" type="submit" name="filtrer">🔍</button>
                </form>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tabListeClients">
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
                        <?php if (isset($lesClients)): ?>
                            <?php foreach ($lesClients as $unClient): ?>
                                <tr>
                                    <td><?= $unClient['id_c']; ?></td>
                                    <td><?= $unClient['nom']; ?></td>
                                    <td><?= $unClient['prenom']; ?></td>
                                    <td><?= $unClient['email']; ?></td>
                                    <td><?= $unClient['mdp']; ?></td>
                                    <td><?= $unClient['adresse']; ?></td>
                                    <td><?= $unClient['cp']; ?></td>
                                    <td><?= $unClient['ville']; ?></td>
                                    <td><?= $unClient['tel']; ?></td>
                                    <td><?= $unClient['RIB']; ?></td>

                                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                                        <td>
                                            <a class="btn btn-sm btn-danger me-1"
                                               href="index.php?page=2&action=sup&id_c=<?= $unClient['id_c'] ?>"
                                               onclick="return confirm('Supprimer ce client ?')">🗑</a>

                                            <a class="btn btn-sm btn-warning"
                                               href="index.php?page=2&action=edit&id_c=<?= $unClient['id_c'] ?>">✏</a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <p>
                    <?= (isset($lesClients)) ? "Nombre de clients : " . count($lesClients) : "" ?>
                </p>

            </div>
        </div>

    </div>
</div>

<head>
    <meta charset="UTF-8">
    <title>Gestion des réservations</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons (optionnel) -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>

 

<div class="container mt-4">
    <h1 class="mb-4">Gestion des réservations</h1>

    <div class="row">

        <!-- ================= FORMULAIRE (GAUCHE) ================= -->
        <div class="col-md-4">
            <div class="card p-3">
                <h3>Ajouter / Modifier</h3>

                <form method="post">
                    <table class="table table-borderless">
                        <tr>
                            <td>Nombre personnes</td>
                            <td>
                                <input class="form-control" type="number" name="nb_perso" id="nb_perso"
                                    min="1"
                                    max="<?= (!$habitation)?"":$habitation['capacite_hab']?>"
                                    value="<?= ($reservation==null)?"1":$reservation['nb_perso']?>"
                                    required>
                            </td>
                        </tr>

                        <tr>
                            <td>Début séjour</td>
                            <td>
                                <input class="form-control" type="date" name="date_debut"
                                    value="<?= ($reservation==null)?"":$reservation['date_debut'] ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>Fin séjour</td>
                            <td>
                                <input class="form-control" type="date" name="date_fin"
                                    value="<?= ($reservation==null)?"":$reservation['date_fin'] ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>Etat</td>
                            <td>
                                <select class="form-select" name="etat_res" required>
                                    <option value="<?= ($reservation==null)?"":$reservation['etat_res'];?>">
                                        <?= ($reservation==null)?"Choisir état":$reservation['etat_res'];?>
                                    </option>
                                    <option value="Validee">Validée</option>
                                    <option value="En attente">En attente</option>
                                    <option value="Annulee">Annulée</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Client</td>
                            <td>
                                <select class="form-select" name="id_c" id="id_c" required>
                                    <?php
                                    if  ($reservation!=null){
                                     foreach ($lesClients as $unClient)
                                        if ($unClient['id_c'] == $reservation['id_c']){
                                            echo '<option value="'.$unClient['id_c'].'">'.$unClient['nom'].' - '.$unClient['prenom'].' </option>';
                                            break;
                                        }
                                    }else {
                                    echo '<option value=""> Sélectionner un client  </option>';
                                    }

                                     foreach ($lesClients as $unClient){
                                        if ($unClient['id_c'] != $reservation['id_c']){
                                        ?>
                                        <option value="<?= $unClient['id_c']?>">
                                            <?= $unClient['id_c']." - ".$unClient['nom']." - ".$unClient['prenom'];?>
                                        </option>
                                    <?php } } ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Habitation</td>
                            <td>
                                <select class="form-select" name="ref_hab" id="ref_hab" required>
                                    <?php
                                    if  ($reservation!=null){
                                     foreach ($lesHabitations as $uneHabitation)
                                        if ($uneHabitation['ref_hab'] == $reservation['ref_hab']){
                                            echo '<option value="'.$uneHabitation['ref_hab'].'">'.$uneHabitation['ref_hab'].' - '.$uneHabitation['type_hab'].' - '.$uneHabitation['ville_hab'].' </option>';
                                            break;
                                        }
                                    }else {
                                    echo '<option value=""> Sélectionner habitation  </option>';
                                    }

                                     foreach ($lesHabitations as $uneHabitation){
                                        if ($uneHabitation['ref_hab'] != $reservation['ref_hab']){
                                        ?>
                                        <option value="<?= $uneHabitation['ref_hab']?>"
                                                capa-max="<?= $uneHabitation['capacite_hab']?>">
                                            <?= $uneHabitation['ref_hab']." - ".$uneHabitation['type_hab']." - ".$uneHabitation['ville_hab'];?>
                                        </option>
                                    <?php } } ?>
                                </select>
                            </td>
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
                        <button class="btn btn-danger" type="submit" name="annuler">
                            ✖
                        </button>

                        <button class="btn btn-success"
                            type="submit"
                            <?= ($reservation==null)
                                ? 'name="valider"'
                                : 'name="modifier"' ?>>
                            ✔
                        </button>
                    </div>

                    <?= ($reservation==null)?"":'<input type="hidden" name="ref_res" value="'.$reservation['ref_res'].'">';?>
                </form>
            </div>
        </div>

        <!-- ================= TABLE (DROITE) ================= -->
        <div class="col-md-8">
            <div class="card p-3">
                <h3>Liste des réservations</h3>

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
                                <th>ID</th>
                                <th>Date réservation</th>
                                <th>Nb pers</th>
                                <th>Début</th>
                                <th>Fin</th>
                                <th>Etat</th>
                                <th>Client</th>
                                <th>Habitation</th>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                                    echo "<th>Actions</th>";
                                } ?>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if (isset($lesReservations)){
                            foreach ($lesReservations as $uneReservation){
                                echo "<tr>";
                                echo "<td>".$uneReservation['ref_res']."</td>";
                                echo "<td>".$uneReservation['date_res']."</td>";
                                echo "<td>".$uneReservation['nb_perso']."</td>";
                                echo "<td>".$uneReservation['date_debut']."</td>";
                                echo "<td>".$uneReservation['date_fin']."</td>";
                                echo "<td>".$uneReservation['etat_res']."</td>";
                                echo "<td>".$uneReservation['id_c']."</td>";
                                echo "<td>".$uneReservation['ref_hab']."</td>";

                                if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                                    echo "<td>";
                                    echo "<a class='btn btn-sm btn-danger me-1' href='index.php?page=5&action=sup&ref_res=".$uneReservation['ref_res']."'>🗑</a>";
                                    echo "<a class='btn btn-sm btn-warning' href='index.php?page=5&action=edit&ref_res=".$uneReservation['ref_res']."'>✏</a>";
                                    echo "</td>";
                                }

                                echo "</tr>";
                            }
                        } ?>
                        </tbody>
                    </table>
                </div>

                <p>
                    <?= (isset($lesReservations)) ? "Nombre de réservations : " . count($lesReservations) : "" ?>
                </p>

            </div>
        </div>

    </div>
</div>
 
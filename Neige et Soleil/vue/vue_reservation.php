<section>
    <h1> Gestion des réservation </h1>
    <div class="conteneurGestion">

        <div class="vueInsert">
            <h3>Ajouter/Modifier réservation</h3>
            <form class="insert" method="post">
                <table>
                    <tr>
                        <td>Nombre personnes</td>
                        <td><input type="number" name="nb_perso" id="nb_perso" min="1" max="<?= (!$habitation)?"":$habitation['capacite_hab']?>" value="<?= ($reservation==null)?"1":$reservation['nb_perso']?>" required></td>
		            </tr>
		            <tr>
			            <td>Début séjour</td>
			            <td><input type="date" name="date_debut" id="arrivee" value="<?= ($reservation==null)?"":$reservation['date_debut'] ?>" required></td>
		            </tr>
		            <tr>
			            <td>Fin séjour</td>
			            <td><input type="date" name="date_fin" id="depart" value="<?= ($reservation==null)?"":$reservation['date_fin'] ?>" required></td>
		            </tr>
                    <tr>
                        <td>Etat réservation</td>
			            <td><select name="etat_res" required>
                                <option value="<?= ($reservation==null)?"":$reservation['etat_res'];?>" required><?= ($reservation==null)?"Choisir état":$reservation['etat_res'];?></option>
				                <option value="Validee">Validée</option>
				                <option value="En attente">En attente</option>
				                <option value="Annulee">Annulée</option>
				            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Client</td>
                        <td><select name="id_c" required>
                                <option value="<?= ($reservation==null)?"":$reservation['id_c'] ?>" required><?= ($reservation==null)?"Sélectionner client":$reservation['id_c'] ?></option>
                                <?php foreach ($lesClients as $unClient):?> 
					                <option value="<?= $unClient['id_c']; ?>">
					                    <?= $unClient['id_c']."-".$unClient['nom']." ".$unClient['prenom']; ?>
					                </option>
                                <?php endforeach; ?>
				            </select>
				        </td>
		            </tr>
		            <tr>
                        <td>Habitation</td>
			            <td><select name="ref_hab" id="ref_hab" required>
				                <option value="<?= ($reservation==null)?"":$reservation['ref_hab'] ?>"><?= ($reservation==null)?"Sélectionner habitation":$reservation['ref_hab'] ?></option>
				                <?php foreach ($lesHabitations as $uneHabitation): ?>
                                    <option value= "<?= $uneHabitation['ref_hab']?>" capa-max ="<?= $uneHabitation['capacite_hab']?>">
					                    <?= $uneHabitation['ref_hab']." - ".$uneHabitation['type_hab']."-".$uneHabitation['ville_hab'];?>
					                </option>
                                <?php endforeach; ?> 
				            </select>
				        </td>
		            </tr>
	            </table><br>
                <?php if(!empty($_SESSION['erreurs'])): ?>
                    <?php foreach($_SESSION['erreurs'] as $uneErreur): ?>
                        <h4 style="color : red"><?= $uneErreur ?></h4> 
                    <?php endforeach; ?>
                <?php unset($_SESSION['erreurs']); ?>
                <?php endif; ?>
	            <div>
		            <button class="btAnnulerSupprimer" type="submit" name="annuler">
			            <span class="material-symbols-outlined">close</span>
		            </button>
		            <button class="btValider" type="submit" <?= ($reservation==null)?'name="valider" id="valider" 
		                    value="valider"' : 'name="modifier" id="modifier" value="modifier"'?>>
			            <span class="material-symbols-outlined">check</span>
		            </button>
	            </div>

	            <?= ($reservation==null)?"":'<input type="hidden" name="ref_res" value="'.$reservation['ref_res'].'">';?>
            </form>
        </div>


        <div class="vueSelect">
            <h3>Liste des réservations</h3>
            <form class="listes" method="post">
                <label for="filtre">Filtrer par : </label>
                <input type="text" name="filtre">
                <button class="btValider" type="submit" name="filtrer">
		            <span class="material-symbols-outlined">search</span>
	            </button>
            </form><br>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Date réservation</th>
                    <th>Nombre personnes</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Etat</th>
                    <th>ID client</th>
                    <th>ID habitation</th>
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                        echo "<th> Opérations </th>";
                        }
                    ?>
                </tr>
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
                        echo "<td>";

                        echo "<a href='index.php?page=5&action=sup&ref_res=".$uneReservation['ref_res']."'>";
                        echo "<img src='images/supprimer.png' width='30' height='30'> </a>";

                        echo "<a href='index.php?page=5&action=edit&ref_res=".$uneReservation['ref_res']."'>";
                        echo "<img src='images/modifier.png' width='30' height='30'> </a>";

                        echo "</td>";
                        echo "</tr>";
                    }
                }?>
            </table><br>
            <?= (isset($lesReservations)) ? "Nombre de réservations : " . count($lesReservations) : "" ?>
        </div>
    </div>
</section>



<script>
    let nb_perso = document.getElementById('nb_perso');
    let ref_hab = document.getElementById('ref_hab');



</script>
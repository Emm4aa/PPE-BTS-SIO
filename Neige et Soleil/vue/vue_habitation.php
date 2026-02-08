<section>
    <h1> Gestion des habitations </h1>
    <div class="conteneurGestion">
        
    
    
        <div class="vueInsert">
            <h3> Ajouter/Modifier habitation </h3>
            <form class="insert" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td> Type </td>
			            <td>
                            <select name="type_hab" required>
                                <?php if($habitation==null):?>
                                    <option value="">Sélectionner type</option>
					                <option value="Appartement">Appartement</option>
					                <option value="Maison">Maison</option>
				                <?php else: ?>
					                <option value="<?=$habitation['type_hab'];?>"><?=$habitation['type_hab'];?></option>
				                <?php endif; ?>
			                </select>
			            </td>
		            </tr>
		            <tr>
			            <td> Adresse </td>
			            <td><input type="text" name="adr_hab" value="<?= ($habitation==null)?"":$habitation['adr_hab']; ?>" required></td>
		            </tr>
		            <tr>
			            <td> Code postal </td>
			            <td><input type="number" name="cp_hab" value="<?= ($habitation==null)?"":$habitation['cp_hab']; ?>" required></td>
		            </tr>
		            <tr>
			            <td> Ville </td>
			            <td><input type="text" name="ville_hab" value="<?= ($habitation==null)?"":$habitation['ville_hab']; ?>" required></td>
		            </tr>
		            <tr>
			            <td> Tarif min </td>
			            <td><input type="number" name="tarif_hab_bas" value="<?= ($habitation==null)?"":$habitation['tarif_hab_bas']; ?>" required></td>
		            </tr>
		            <tr>
			            <td> Tarif moyen </td>
			            <td><input type="number" name="tarif_hab_moy" value="<?= ($habitation==null)?"":$habitation['tarif_hab_moy']; ?>" required></td>
		            </tr>
		            <tr>
			            <td> Tarif max </td>
			            <td><input type="number" name="tarif_hab_hau" value="<?= ($habitation==null)?"":$habitation['tarif_hab_hau']; ?>" required></td>
		            </tr>
		            <tr>
			            <td> Surface </td>
			            <td><input type="number" name="surface" value="<?= ($habitation==null)?"":$habitation['surface']; ?>" required></td>
		            </tr>
		            <tr>
			            <td> Proprietaire </td>
			            <td><select name="id_p" required>
                            <option value="<?= ($habitation==null)?"":$habitation['id_p']; ?>"> <?= ($habitation==null)?"Sélectionner propriétaire":$habitation['id_p']; ?> </option>
				            <?php foreach ($lesProprietaires as $unProprietaire) {
					              echo "<option value='".$unProprietaire['id_p']."'>";
					              echo $unProprietaire['id_p']." - ".$unProprietaire['nom']." ".$unProprietaire['prenom'];
					              echo "</option>";
				                }
				            ?>
				            </select>
			            </td>
		            </tr>
		            <tr>
			            <td>Photos</td>
                        <td><input type="file" name="photos[]" id="photos" multiple></td>
                    </tr>
                    <script>
                        photos = document.getElementById('photos');

                        photos.addEventListener("change",()=>{
                            if(photos.files.length > 3){
                                photos.value = "";
                                alert("Veuillez choisir 3 photos");
                            }
                        })
                    </script>
		            <tr>
			            <td>Description</td>
			            <td>
				            <textarea name="description_hab" required>
					            <?= ($habitation==null)?"":$habitation['description_hab']; ?>
				            </textarea>
			            </td>
		            </tr>
		            <tr>
			            <td>Titre</td>
			            <td><input type="text" name="titre_hab" value="<?= ($habitation==null)?"":$habitation['titre_hab']; ?>" required></td>
		            </tr>
		            <tr>
			            <td>Capacité</td>
			            <td><input type="number" name="capacite_hab" value="<?= ($habitation==null)?"":$habitation['capacite_hab']; ?>" required></td>
		            </tr>
	            </table><br>
                <?php if(!empty($_SESSION['erreurs'])): ?>
                    <?php foreach($_SESSION['erreurs'] as $uneErreur): ?>
                        <h4 style="color : red"><?= $uneErreur ?></h4> 
                    <?php endforeach; ?>
                <?php unset($_SESSION['erreurs']); ?>
                <?php endif; ?>
	            <div>
                    <a href="index.php?page=4" class="btAnnulerSupprimer" type="submit" name="annuler"> 
			            <span class="material-symbols-outlined">close</span>
                    </a>
		            <button class="btValider" type="submit" <?= ($habitation==null)?'name="valider" id="valider" 
		                    value="valider"' : 'name="modifier" id="modifier" value="modifier"'?>>
			            <span class="material-symbols-outlined">check</span>
		            </button>
	            </div> 
                <?= ($habitation==null)?"":'<input type="hidden" name="ref_hab" value="'.$habitation['ref_hab'].'">';?>
            </form>
        </div>


        <div class="vueSelect">
            <h3>Liste des habitations</h3>
            <form class="listes" method="post">
                <label for="filtre">Filtrer par :</label> 
                <input type="text" name="filtre">
                <button class="btValider" type="submit" name="filtrer">
		            <span class="material-symbols-outlined">search</span>
	            </button>
            </form><br>
            <table>
                <tr>
                    <th>Référence</th>
                    <th>Type</th>
                    <th>Adresse</th>
                    <th>Code postal</th>
                    <th>Ville</th>
                    <th>Tarif bas</th>
                    <th>Tarif moyen</th>
                    <th>Tarif haut</th>
                    <th>Surface</th>
                    <th>ID propriétaire</th>
                    <th>Description</th>
                    <th>Titre</th>
                    <th>Capacité</th>
                    <?php 
			            if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				            echo "<th> Opération </th>";
			            }
		            ?>
                </tr>
                <?php if (isset($lesHabitations)): ?>
                    <?php foreach($lesHabitations as $uneHabitation): ?>
                        <tr>
                            <td><?=$uneHabitation['ref_hab'] ?></td>
                            <td><?= $uneHabitation['type_hab']  ?></td>
                            <td><?= $uneHabitation['adr_hab'] ?></td>
                            <td><?= $uneHabitation['cp_hab'] ?></td>
                            <td><?= $uneHabitation['ville_hab'] ?></td>
                            <td><?= $uneHabitation['tarif_hab_bas'] ?></td>
                            <td><?= $uneHabitation['tarif_hab_moy'] ?></td>
                            <td><?= $uneHabitation['tarif_hab_hau'] ?></td>
                            <td><?= $uneHabitation['surface'] ?></td>
                            <td><?= $uneHabitation['id_p']  ?></td>
                            <td><?= $uneHabitation['description_hab']  ?></td>
                            <td><?= $uneHabitation['titre_hab'] ?></td>
                            <td><?= $uneHabitation['capacite_hab'] ?></td>
                            <td>
                                <a href="index.php?page=4&action=sup&ref_hab=<?=$uneHabitation['ref_hab'] ?>"
                                    onclick="return confirm('Supprimer cette habitation ?')">
                                    <img src='images/supprimer.png' width='30' height='30' >
                                </a>
                                <a href="index.php?page=4&action=edit&ref_hab=<?=$uneHabitation['ref_hab'] ?>">
                                    <img src='images/modifier.png' width='30' height='30' >
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table><br>
            <?= (isset($lesHabitations)) ? "Nombre d'habitation(s) : " . count($lesHabitations) : "" ?>
        </div>
    </div>
</section>

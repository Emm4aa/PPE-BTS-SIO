<section>
    <h1> Gestion des Propriétaires </h1>
    <div class="conteneurGestion">
        
    
        <div class="vueInsert">
            <h3> Ajouter/Modifier propriétaire </h3>
            <form class="insert" method="post">
                <table>
                    <tr>
                        <td>Nom</td>
			            <td><input type="text" name="nom" value="<?= ($leProprietaire == null)?"":$leProprietaire['nom'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Prénom</td>
			            <td><input type="text" name="prenom" value="<?= ($leProprietaire == null)?"":$leProprietaire['prenom'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Email</td>
			            <td><input type="text" name="email" value="<?= ($leProprietaire == null)?"":$leProprietaire['email'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Mdp</td>
			            <td><input type="text" name="mdp" value="<?= ($leProprietaire == null)?"":$leProprietaire['mdp'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Adresse postale</td>
			            <td><input type="text" name="adresse" value="<?= ($leProprietaire == null)?"":$leProprietaire['adresse'];?>" required></td>
	    	        </tr>
		            <tr>
			            <td>Code postal</td>
			            <td><input type="text" name="cp" value="<?= ($leProprietaire == null)?"":$leProprietaire['cp'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Ville</td>
			            <td><input type="text" name="ville" value="<?= ($leProprietaire == null)?"":$leProprietaire['ville'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Téléphone</td>
			            <td><input type="text" name="tel" value="<?= ($leProprietaire == null)?"":$leProprietaire['tel'];?>" required></td>
		            </tr>
		            <tr>
			            <td>RIB</td>
			            <td><input type="text" name="rib" value="<?= ($leProprietaire == null)?"":$leProprietaire['RIB'];?>" required></td>
		            </tr>
	            </table><br>
                <?php if(!empty($_SESSION['msg-erreurs'])): ?>
                    <?php foreach($_SESSION['msg-erreurs'] as $uneErreur) :?>
                        <h4 style="color:red"><?= $uneErreur ?></h4>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['msg-erreurs']); ?>
                <?php endif; ?>
	            <div>
                    <button class="btAnnulerSupprimer" type="submit" name="annuler">
                        <span class="material-symbols-outlined">close</span>
                    </button>
		            <button class="btValider" type="submit" <?= ($leProprietaire==null)?'name="valider" id="valider" 
		                    value="valider"' : 'name="modifier" id="modifier" value="modifier"'?>>
			            <span class="material-symbols-outlined">check</span>
		            </button>
	            </div> 
                <?= ($leProprietaire==null)? '' : ' <input type="hidden" name="id_user" value="'.$leProprietaire['id_p'].'">' ?>
            </form>
        </div>
        
        
        <div class="vueSelect">
            <h3>Liste des Propriétaires</h3>
            <form class="listes" method="post" action="index.php?page=3#tabListeProprio">
                <label for="filtre">Filtrer par : </label>
	            <input type="text" name="filtre">
	            <button class="btValider" type="submit" name="filtrer">
		            <span class="material-symbols-outlined">search</span>
	            </button>
            </form><br>
            <table id="tabListeProprio">
                <tr>
                    <th>ID</th>
		            <th>Nom</th>
		            <th>Prenom</th>
		            <th>Email</th>
		            <th>Mdp</th>
		            <th>Adresse</th>
		            <th>Code Postal</th>
		            <th>Ville</th>
		            <th>Tel</th>
		            <th>RIB</th>
		            <?php 
			            if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				        echo "<th> Opérations </th>";
			            }
		            ?>
	            </tr>
                <?php if (isset($lesProprietaires)):?>
	                <?php foreach ($lesProprietaires as $unProprietaire):?>
                        <tr>
                            <td><?= $unProprietaire['id_p'] ?></td>
			                <td><?= $unProprietaire['nom'] ?></td>
			                <td><?= $unProprietaire['prenom']  ?></td>
			                <td><?= $unProprietaire['email'] ?></td>
			                <td><?= $unProprietaire['mdp']  ?></td>
			                <td><?= $unProprietaire['adresse']  ?></td>
			                <td><?= $unProprietaire['cp'] ?></td>
			                <td><?= $unProprietaire['ville'] ?></td>
			                <td><?= $unProprietaire['tel'] ?></td>
			                <td><?= $unProprietaire['RIB'] ?></td>
			                <td>
				                <a href="index.php?page=3&action=sup&id_p=<?=$unProprietaire['id_p']?>"
                                onclick="return confirm('Supprimer ce propriétaire ?')">
				   	                <img src='images/supprimer.png' width='30' height='30' > 
				                </a>
				                <a href="index.php?page=3&action=edit&id_p=<?=$unProprietaire['id_p']?>">
				   	                <img src='images/modifier.png' width='30' height='30' > 
				                </a>
			                </td>
		                </tr>
	                <?php endforeach; ?>
                <?php endif;?>
            </table><br>

            <?= (isset($lesProprietaires)) ? "Nombre de Proprietaires : " . count($lesProprietaires) : "" ?>
        </div>
    </div>
</section>

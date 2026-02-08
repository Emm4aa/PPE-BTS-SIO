<section>
    <h1> Gestion des clients </h1>
    <div class="conteneurGestion">

        <div class="vueInsert">
            <h3>Ajouter/Modifier client</h3>
            <form class="insert" method="post" action="index.php?page=2">
                <table>
                    <tr>
                        <td>Nom</td>
			            <td><input type="text" name="nom" value="<?= ($leClient == null)?"":$leClient['nom'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Prénom</td>
			            <td><input type="text" name="prenom" value="<?= ($leClient == null)?"":$leClient['prenom'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Email</td>
			            <td><input type="text" name="email" value="<?= ($leClient == null)?"":$leClient['email'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Mot de passe</td>
			            <td><input type="text" name="mdp" value="<?= ($leClient == null)?"":$leClient['mdp'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Adresse</td>
			            <td><input type="text" name="adresse" value="<?= ($leClient == null)?"":$leClient['adresse'];?>" required></td>
		            </tr>
	    	        <tr>
			            <td>Code postal</td>
			            <td><input type="text" name="cp" value="<?= ($leClient == null)?"":$leClient['cp'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Ville</td>
			            <td><input type="text" name="ville" value="<?= ($leClient == null)?"":$leClient['ville'];?>" required></td>
		            </tr>
		            <tr>
			            <td>Téléphone</td>
			            <td><input type="text" name="tel" value="<?= ($leClient == null)?"":$leClient['tel'];?>" required></td>
		            </tr>
		            <tr>
			            <td>RIB</td>
			            <td><input type="text" name="rib" value="<?= ($leClient == null)?"":$leClient['RIB'];?>" required></td>
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
		            <button class="btValider" type="submit" <?= ($leClient==null)?'name="valider" id="valider" 
		            value="valider"' : 'name="modifier" id="modifier" value="modifier"'?>>
			            <span class="material-symbols-outlined">check</span>
		            </button>
	            </div> 
	            <?= ($leClient==null)? '' : ' <input type="hidden" name="id_user" value="'.$leClient['id_c'].'">'; ?>
            </form>
        </div>
        
        


        <div class="vueSelect">
            <h3> Liste des clients </h3>

            <form class="listes" method="post" action="index.php?page=2#tabListeClients">
                <label for="filtre">Filtrer par :</label> 
	            <input type="text" name="filtre">
	            <button class="btValider" type="submit" name="filtrer" id="">
		            <span class="material-symbols-outlined" translate="no">search</span>
	            </button>
            </form><br>

            <table id="tabListeClients">
                <tr>
                    <th>ID</th>
		            <th>Nom</th>
		            <th>Prenom</th>
		            <th>Email</th>
		            <th>Mdp</th>
		            <th>Adresse</th>
		            <th>Code postal</th>
		            <th>Ville</th>
		            <th>Tel</th>
		            <th>RIB</th>
		            <?php
                        if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
				        echo "<th> Opérations </th>";
			            }
		            ?>
	            </tr>
            <?php if (isset($lesClients)):?>
                <?php foreach ($lesClients as $unClient):?>
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
			            <td><?= $unClient['RIB'] ?></td>
			            <td>
                            <a href="index.php?page=2&action=sup&id_c=<?= $unClient['id_c'] ?>"
				               onclick = "return confirm('Supprimer ce client ?')">
                                <img src='images/supprimer.png' width='30' height='30' >
				            </a>
				            <a href="index.php?page=2&action=edit&id_c=<?= $unClient['id_c'] ?>">
					            <img src='images/modifier.png' width='30' height='30' >
				            </a>
			            </td>
		            </tr>
	            <?php endforeach; ?>
            <?php endif; ?>
            </table><br>
            
            <?= (isset($lesClients)) ? "Nombre de clients : " . count($lesClients) : "" ?>
        </div>
    </div>
</section>
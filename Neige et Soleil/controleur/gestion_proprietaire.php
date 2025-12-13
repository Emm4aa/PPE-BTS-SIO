<h3> Gestion des Proprietaires </h3>

<?php
	/*if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){*/
		$leProprietaire = null;
		if(isset($_GET['action']) && isset($_GET['id_p']))
		{
			$action = $_GET['action']; 
			$id_p = $_GET['id_p'];

			switch($action){
				case "sup"  : $unControleur->deleteProprietaire($id_p); break;
				case "edit" : $leProprietaire = $unControleur->selectWhereProprietaire($id_p);break;
			}
		}
	/*}*/

		require_once ("vue/vue_insert_Proprietaire.php");
		
		if(isset($_POST['Valider'])){
			$unControleur->insertProprietaire($_POST); 
			echo "<br> Insertion réussie du Proprietaire.";
		}

		if(isset($_POST['Modifier'])){
			$unControleur->updateProprietaire($_POST); 
			
			//recharger la page 
			header("Location: index.php?page=2");
		}

	if (isset($_POST['Filtrer'])){
		$filtre = $_POST['filtre']; 
		$lesProprietaires = $unControleur->selectLikeProprietaire($filtre); 
	} else {
		$lesProprietaires = $unControleur->selectAllProprietaire(); 
	}

	require_once("vue/vue_select_Proprietaire.php");
?>
<h3> Gestion des Proprietaires </h3>

<?php
	if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
		$leProprietaire = null;
		if(isset($_GET['action']) && isset($_GET['idProprietaire']))
		{
			$action = $_GET['action']; 
			$idProprietaire = $_GET['idProprietaire'];

			switch($action){
				case "sup"  : $unControleur->deleteProprietaire($idProprietaire); break;
				case "edit" : $leProprietaire = $unControleur->selectWhereProprietaire($idProprietaire);break;
			}
		}

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
	}

	if (isset($_POST['Filtrer'])){
		$filtre = $_POST['filtre']; 
		$lesProprietaires = $unControleur->selectLikeProprietaires($filtre); 
	} else {
		$lesProprietaires = $unControleur->selectAllProprietaires(); 
	}

	require_once("vue/vue_select_Proprietaires.php");
?>
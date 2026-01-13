<section>

<h1> Gestion des Propriétaires </h1>

<div class="conteneurGestion">
<?php
	if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
		$leProprietaire = null;
		if(isset($_GET['action']) && isset($_GET['id_p'])){
			$action = $_GET['action']; 
			$id_p = $_GET['id_p'];

			switch($action){
				case "sup"  : $unControleur->deleteProprietaire($id_p); break;
				case "edit" : $leProprietaire = $unControleur->selectWhereIdProprietaire($id_p);break;
			}
		}
	}
		
		if(isset($_POST['valider'])){
			$unControleur->insertProprietaire($_POST); 
		}
		if(isset($_POST['modifier'])){
			$unControleur->updateProprietaire($_POST); 
			header("Location: index.php?page=3");
		}
		if(isset($_POST['annuler']) || isset($_POST['effacer'])){
			header("Location: index.php?page=3");
		}

	if (isset($_POST['filtrer'])){
		$filtre = $_POST['filtre']; 
		$lesProprietaires = $unControleur->selectLikeProprietaire($filtre); 
	} else {
		$lesProprietaires = $unControleur->selectAllProprietaire(); 
	}

	require_once ("vue/vue_insert_Proprietaire.php");
	require_once("vue/vue_select_Proprietaire.php");
?>

</div>

</section>
<h3> Gestion des clients </h3>

<?php
	if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
		$leClient = null;
		if(isset($_GET['action']) && isset($_GET['idclient']))
		{
			$action = $_GET['action']; 
			$idclient = $_GET['idclient'];

			switch($action){
				case "sup"  : $unControleur->deleteClient($idclient); break;
				case "edit" : $leClient = $unControleur->selectWhereClient($idclient);break;
			}
		}

		require_once ("vue/vue_insert_client.php");
		
		if(isset($_POST['Valider'])){
			$unControleur->insertClient($_POST); 
			echo "<br> Insertion réussie du client.";
		}

		if(isset($_POST['Modifier'])){
			$unControleur->updateClient($_POST); 
			
			//recharger la page 
			header("Location: index.php?page=2");
		}
	}

	if (isset($_POST['Filtrer'])){
		$filtre = $_POST['filtre']; 
		$lesClients = $unControleur->selectLikeClient($filtre); 
	} else {
		$lesClients = $unControleur->selectAllClient(); 
	}

	require_once("vue/vue_select_client.php");
?>
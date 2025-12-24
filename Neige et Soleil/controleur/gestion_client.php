<section>

<h1> Gestion des clients </h1>

<div class="conteneurGestion">
<?php
$lesHabitations = $unControleur->selectAllHabitation();
$lesclients = $unControleur->selectAllClient();
$lesProprietaires = $unControleur->selectAllProprietaire();

	/*if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){*/
		$leClient = null;
		if(isset($_GET['action']) && isset($_GET['id_c']))
		{
			$action = $_GET['action']; 
			$id_c = $_GET['id_c'];

			switch($action){
				case "sup"  : $unControleur->deleteClient($id_c); break;
				case "edit" : $leClient = $unControleur->selectWhereClient($id_c);break;
			}
		}
	/*}*/

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
	

	if (isset($_POST['Filtrer'])){
		$filtre = $_POST['filtre']; 
		$lesClients = $unControleur->selectLikeClient($filtre); 
	} else {
		$lesClients = $unControleur->selectAllClient(); 
	}

	require_once("vue/vue_select_client.php");
?>
</div>

</section>
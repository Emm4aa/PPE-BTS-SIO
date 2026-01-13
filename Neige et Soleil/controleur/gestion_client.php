<section>

<h1> Gestion des clients </h1>

<div class="conteneurGestion">
<?php
$lesHabitations = $unControleur->selectAllHabitation();
$lesclients = $unControleur->selectAllClient();
$lesProprietaires = $unControleur->selectAllProprietaire();

if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
	$leClient = null;

	if(isset($_GET['action']) && isset($_GET['id_c'])){
			$action = $_GET['action']; 
			$id_c = $_GET['id_c'];

			switch($action){
				case "sup"  : $unControleur->deleteClient($id_c); break;
				case "edit" : $leClient = $unControleur->selectWhereIdClient($id_c);break;
			}
		}
}
		
if(isset($_POST['valider'])){
	$unControleur->insertClient($_POST); 
}
if(isset($_POST['modifier'])){
	$unControleur->updateClient($_POST); 
	//recharger la page 
	header("Location: index.php?page=2");
}
if(isset($_POST['annuler']) || isset($_POST['effacer'])){
	header("Location: index.php?page=2");
	exit;
}
if (isset($_POST['filtrer'])){
	$filtre = $_POST['filtre']; 
	$lesClients = $unControleur->selectLikeClient($filtre); 
} else {
		$lesClients = $unControleur->selectAllClient(); 
}

require_once ("vue/vue_insert_client.php");
require_once("vue/vue_select_client.php");
?>
</div>
</section>
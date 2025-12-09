<h3> Gestion des habitations </h3>

<?php

$lesclients = $unControleur->selectAllClient();
	require_once ("vue_insert_hab.php");
?>

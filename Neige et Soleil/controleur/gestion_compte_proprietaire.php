<?php $habProprio = $unControleur->selectHabitationWhereProprietaire($_SESSION['id'])?>
<section>
<h1>Mon compte</h1>
<?php require_once("vue/vue_compte_proprietaire.php");?>
</section>
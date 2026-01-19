<?php 
    if(isset($_GET['ref_hab'])){
        $refHab = $_GET['ref_hab'];

        $habitation = $unControleur->selectWhereHabitation($refHab);
    }
    require_once("vue/vue_reservation_habitation.php");
?>

 <script>
    function calculPrix() { 
        const prixParNuit = <?= $habitation['tarif_hab_moy'] ?>; 
        const debut = new Date(document.getElementById('arrivee').value); 
        const fin = new Date(document.getElementById('depart').value); 
                        
        if (!isNaN(debut.getTime()) && !isNaN(fin.getTime()) && fin > debut) { 
            const diffTime = fin - debut; 
            const nbJours = diffTime / (1000 * 60 * 60 * 24); 
            
            document.getElementById('prixTotal').textContent = `${nbJours} nuits — ${nbJours * prixParNuit} €`;
        } else {
            document.getElementById('prixTotal').textContent = prixParNuit+"€ la nuit";
        } 
    } 
    document.addEventListener("DOMContentLoaded", ()=>{
        document.getElementById('arrivee').addEventListener('change', calculPrix); 
        document.getElementById('depart').addEventListener('change', calculPrix);

        calculPrix();
    })
</script>
<?php 
    $lesHabitations = $unControleur->selectAllHabitation(); 

    if(isset($_POST['rechercher'])){
        $type = $_POST['type'];
        $prixMin = $_POST['prixMin'];
        $prixMax = $_POST['prixMax'];

        if($type == null){
            if($prixMin == null && $prixMax == null){
                $lesHabitations = $unControleur->selectAllHabitation();
            }elseif($prixMin != null && $prixMax == null){
                $lesHabitations = $unControleur->selectAllHabitationPrixMin($prixMin);
            }elseif($prixMin == null && $prixMax != null){
                $lesHabitations = $unControleur->selectAllHabitationPrixMax($prixMax);
            }elseif($prixMin != null && $prixMax != null){
                $lesHabitations = $unControleur->selectAllHabitationPrixMinMax($prixMin,$prixMax);
            }
        }
        if($type != null){
            if($prixMin == null && $prixMax == null){
                $lesHabitations = $unControleur->selectAllHabitationType($type);
            }elseif($prixMin != null && $prixMax == null){
                $lesHabitations = $unControleur->selectAllHabitationTypePrixMin($type,$prixMin);
            }elseif($prixMin == null && $prixMax != null){
                $lesHabitations = $unControleur->selectAllHabitationTypePrixMax($type,$prixMax);
            }elseif($prixMin != null && $prixMax != null){
                $lesHabitations = $unControleur->selectAllHabitationTypePrixMinMax($type,$prixMin,$prixMax);
            }
        }
    }    

    require_once("vue/vue_home.php");
?>

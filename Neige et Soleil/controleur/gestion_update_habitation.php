<?php 

$idProprietaire = $_SESSION['id'];
$leProprietaire = $unControleur->selectWhereIdProprietaire($idProprietaire);
$erreurs = [];

if(isset($_GET['action']) && isset($_GET['ref_hab'])){
        $refHab = $_GET['ref_hab'];
        $action = $_GET['action'];
        
        if($action == "modif"){
                $habitation = $unControleur->selectWhereHabitation($refHab);
                $photosHabitation = $unControleur->selectAllPhotosWhere($refHab);
        }
}
        
if (isset($_POST['ajouter'])){

        $photos = $_FILES['photos'];
        $formats = array("jpg","jpeg","png","avif");
        $tailleMax = 4 * 1024 * 1024;

        $tarif_hab_bas = $_POST['tarif_hab_bas'];
        $tarif_hab_moyen = $_POST['tarif_hab_moy'];
        $tarif_hab_haut = $_POST['tarif_hab_hau'];  
        $description_hab = $_POST['description_hab'];
        $titre_hab = $_POST['titre_hab'];
        $capacite_hab = $_POST['capacite_hab'];

        $champs = [$tarif_hab_bas, $tarif_hab_moyen, $tarif_hab_haut,
                   $description_hab, $titre_hab, $capacite_hab
                  ];

        foreach ($champs as $champ) {
                if ($champ === "") {
                        $erreurs[] = "Veuillez remplir tous les champs";break;
                }
        }

        $nbPhotos = count(array_filter($photos['name']));

        if (($nbPhotos > 0 && $nbPhotos < 3) || $nbPhotos > 3) {
                $erreurs[] = "Veuillez sélectionner exactement 3 photos 
                             si vous souhaitez les modifier.";      
        }else{ 
                if($nbPhotos == 3){
                        foreach ($photos['name'] as $i => $name) {
                        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                                if (!in_array($extension, $formats)) {
                                        $erreurs[] = "Format non autorisé pour la photo : $name";
                                }
                                if($photos['size'][$i] > $tailleMax){
                                        $erreurs[] = "Taille de la photo non autorisé : $name";
                                }
                                if ($photos['error'][$i] !== UPLOAD_ERR_OK) {
                                        $erreurs[] = "Erreur lors de l'upload de la photo : $name";
                                }
                        }
                }
        }
        


        if (!empty($erreurs)) { 
                $_SESSION['erreurs'] = $erreurs; 
                header("Location:index.php?page=22&action=modif&ref_hab=".$refHab); 
                exit; 
        }else{
                //update habitations
                $unControleur->updateHabitationAnnonce([
                        "tarif_hab_bas" => $tarif_hab_bas,
                        "tarif_hab_moy" => $tarif_hab_moyen,
                        "tarif_hab_hau" => $tarif_hab_haut,
                        "description_hab" => $description_hab,
                        "titre_hab" => $titre_hab,
                        "capacite_hab" => $capacite_hab,
                        "ref_hab" => $refHab
                ]);

                if($nbPhotos == 3){
 
                    $unControleur->deletePhotos($refHab);
                    
                        foreach ($photos['name'] as $i => $name) {

                        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                        $newName = uniqid("photo_") . "." . $extension;

                        move_uploaded_file($photos['tmp_name'][$i], "images/habitations/" . $newName);

                        $isPrincipal = ($i === 0) ? 1 : 0;

                        $unControleur->insertPhoto([
                                "ref_hab" => $refHab,
                                "url_photo" => $newName,
                                "is_principal" => $isPrincipal
                                ]);
                        }
                }

                $_SESSION['msg-update-habitation'] = "Vôtre habitation a bien été mise à jour ✅";
                header("Location: index.php?page=7");
                exit;
        }
}

if(isset($_POST['annuler'])){
        header("Location: index.php?page=7");
        exit;
}

        require_once("vue/vue_update_habitation.php");
 
?>
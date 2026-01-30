<?php 

$idProprietaire = $_SESSION['id'];
$leProprietaire = $unControleur->selectWhereIdProprietaire($idProprietaire);
$erreurs = [];
        
if (isset($_POST['ajouter'])){


        $photos = $_FILES['photos'];
        $formats = array("jpg","jpeg","png","avif");
        $tailleMax = 4 * 1024 * 1024;

        $id_p = $_POST['id_p'];
        $type_hab = $_POST['type_hab'];
        $adr_hab = $_POST['adr_hab'];
        $cp_hab = $_POST['cp_hab'];
        $ville_hab = $_POST['ville_hab'];
        $tarif_hab_bas = $_POST['tarif_hab_bas'];
        $tarif_hab_moyen = $_POST['tarif_hab_moy'];
        $tarif_hab_haut = $_POST['tarif_hab_hau'];
        $surface = $_POST['surface'];   
        $description_hab = $_POST['description_hab'];
        $titre_hab = $_POST['titre_hab'];
        $capacite_hab = $_POST['capacite_hab'];

        $champs = [$type_hab, $adr_hab, $cp_hab, $ville_hab,
                   $tarif_hab_bas, $tarif_hab_moyen, $tarif_hab_haut,
                   $surface, $description_hab, $titre_hab, $capacite_hab
                  ];

        foreach ($champs as $champ) {
                if ($champ === "") {
                        $erreurs[] = "Veuillez remplir tous les champs";break;
                }
        }

        $nbPhotos = count(array_filter($photos['name']));

        if ($nbPhotos !== 3) {
                $erreurs[] = "Veuillez sélectionner exactement 3 photos.";      
        }else{
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
        


        if (!empty($erreurs)) { 
                $_SESSION['erreurs'] = $erreurs; 
                header("Location:index.php?page=13"); 
                exit; 
        }else{
                //ajouter les insert dans photos et habitations
                $refHab = $unControleur->insertHabitation([
                        "type_hab" => $type_hab,
                        "adr_hab" => $adr_hab,
                        "cp_hab" => $cp_hab,
                        "ville_hab" => $ville_hab,
                        "tarif_hab_bas" => $tarif_hab_bas,
                        "tarif_hab_moy" => $tarif_hab_moyen,
                        "tarif_hab_hau" => $tarif_hab_haut,
                        "surface" => $surface,
                        "id_p" => $id_p,
                        "description_hab" => $description_hab,
                        "titre_hab" => $titre_hab,
                        "capacite_hab" => $capacite_hab
                ]);

                
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

                header("Location: index.php?page=14");
                exit;
        }

}

if(isset($_POST['annuler'])){
        header("Location: index.php?page=7");
        exit;
}

        require_once("vue/vue_creation_annonce.php");
 
?>
<?php 

    if(isset($_POST['ajouter'])){

        $type = $_POST['type'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $tel = $_POST['tel'];
        $rib = $_POST['RIB'];

        $champs = [$type,$nom,$prenom,$email,$mdp,$adresse,$cp,$ville,$tel,$rib];

        foreach($champs as $champ){
                if($champ == ""){
                        $erreurs[] = "Vueillez remplir touts les champs";break;
                }
        }

        if(!empty($erreurs)){
                $_SESSION['msg-erreurs'] = $erreurs;
        }else{
                if($type == 'client'){
                        $unControleur->insertClient([
                                "nom_c" => $nom,
                                "prenom_c" => $prenom,
                                "email_c" => $email,
                                "mdp_c" => $mdp,
                                "adr_c" => $adresse,
                                "cp_c" => $cp,
                                "ville_c" => $ville,
                                "tel_c" => $tel,
                                "rib_c" => $rib
                                ]);
                        header("Location: index.php?page=16");
                        exit;
                }
                if($type == 'proprietaire'){
                        $unControleur->insertProprietaire([
                                "nom_p" => $nom,
                                "prenom_p" => $prenom,
                                "email_p" => $email,
                                "mdp_p" => $mdp,
                                "adr_p" => $adresse,
                                "cp_p" => $cp,
                                "ville_p" => $ville,
                                "tel_p" => $tel,
                                "rib_p" => $rib
                                ]);
                        header("Location: index.php?page=16");
                        exit;
                }
        }

}

if(isset($_POST['annuler'])){
        header("Location: index.php?page=8");
        exit;
}

        require_once("vue/vue_creation_compte.php");
?>
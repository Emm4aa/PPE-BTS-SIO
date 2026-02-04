<?php 
    $idClient = $_SESSION['id'];
    $leClient = $unControleur->selectWhereIdClient($idClient);

    if(isset($_POST['annuler'])){
        header("Location: index.php?page=6");
        exit;
    }
    if (isset($_POST['valider'])) {

        $nom = $_POST['nom_c'];
        $prenom = $_POST['prenom_c'];
        $email = $_POST['email_c'];
        $mdp = $_POST['mdp_c'];
        $adresse = $_POST['adr_c'];
        $cp = $_POST['cp_c'];
        $ville = $_POST['ville_c'];
        $tel = $_POST['tel_c'];
        $rib = $_POST['rib_c'];

        $regexNom = '/^[A-Za-zÀ-ÖØ-öø-ÿ\' -]{2,}$/u';
        $regexPrenom = '/^[A-Za-zÀ-ÖØ-öø-ÿ\' -]{2,}$/u';
        $regexEmail = '/^[A-Za-zÀ-ÖØ-öø-ÿ0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}/u';
        $regexMdp = '/^[^ ]{3,}$/u';
        $regexAdresse = '/^[0-9]{1,5} [A-Za-zÀ-ÖØ-öø-ÿ\' .-]{3,}$/u';
        $regexCp = '/^[0-9]{5}$/';
        $regexVille = '/^[A-Za-zÀ-ÖØ-öø-ÿ\' -]{2,}$/u';
        $regexTel = '/^[0-9]{10}$/';
        $regexRib = '/^[0-9A-Z]{27}$/';


        $champs = [$nom,$prenom,$email,$mdp,$adresse,$cp,$ville,$tel,$rib];

        foreach($champs as $champ){
                if($champ == ""){
                        $erreurs[] = "Veuillez remplir touts les champs";
                        break;
                }
        }

        $regles = [
                        "nom_c" => [$regexNom,     "Veuillez rentrer un nom valide"],
                        "prenom_c" => [$regexPrenom,  "Veuillez rentrer un prénom valide"],
                        "email_c" => [$regexEmail,   "Veuillez rentrer un email valide"],
                        "mdp_c" => [$regexMdp,     "Veuillez rentrer un mot de passe valide"],
                        "adr_c" => [$regexAdresse, "Veuillez rentrer une adresse valide"],
                        "cp_c" => [$regexCp,      "Veuillez rentrer un code postal valide"],
                        "ville_c" => [$regexVille,   "Veuillez rentrer un nom de ville valide"],
                        "tel_c" => [$regexTel,     "Veuillez rentrer un numéro de téléphone valide"],
                        "rib_c" => [$regexRib,     "Veuillez rentrer un RIB valide"]
        ];

        foreach($regles as $champ => [$regex, $msg]){
                if(!preg_match($regex, trim($_POST[$champ]))){
                        $erreurs[] = $msg;
                        break;
                }
        }


        if(!empty($erreurs)){
            $_SESSION['msg-erreurs'] = $erreurs;
        }else{
                $unControleur->updateClient($_POST['id_c']);
                $_SESSION['msg-update'] = "Vos informations ont bien été mises à jour ✅";
                header("Location: index.php?page=6");
                exit;
        }
}
    require_once("vue/vue_update_client.php");
?>
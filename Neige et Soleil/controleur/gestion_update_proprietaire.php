<?php
    $idProprietaire = $_SESSION['id'];
    $leProprietaire = $unControleur->selectWhereIdProprietaire($idProprietaire);


    if(isset($_POST['annuler'])){
        header("Location: index.php?page=7");
        exit;
    }
    if (isset($_POST['valider'])) {

        $nom = $_POST['nom_p'];
        $prenom = $_POST['prenom_p'];
        $email = $_POST['email_p'];
        $mdp = $_POST['mdp_p'];
        $adresse = $_POST['adr_p'];
        $cp = $_POST['cp_p'];
        $ville = $_POST['ville_p'];
        $tel = $_POST['tel_p'];
        $rib = $_POST['rib_p'];

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
                        "nom_p" => [$regexNom,     "Veuillez rentrer un nom valide"],
                        "prenom_p" => [$regexPrenom,  "Veuillez rentrer un prénom valide"],
                        "email_p" => [$regexEmail,   "Veuillez rentrer un email valide"],
                        "mdp_p" => [$regexMdp,     "Veuillez rentrer un mot de passe valide"],
                        "adr_p" => [$regexAdresse, "Veuillez rentrer une adresse valide"],
                        "cp_p" => [$regexCp,      "Veuillez rentrer un code postal valide"],
                        "ville_p" => [$regexVille,   "Veuillez rentrer un nom de ville valide"],
                        "tel_p" => [$regexTel,     "Veuillez rentrer un numéro de téléphone valide"],
                        "rib_p" => [$regexRib,     "Veuillez rentrer un RIB valide"]
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
            $unControleur->updateProprietaire($idProprietaire);
            $_SESSION['msg-update'] = "Vos informations ont bien été mises à jour ✅";
            header("Location: index.php?page=7");
            exit;
        }
    }

    require_once("vue/vue_update_proprietaire.php");
?>
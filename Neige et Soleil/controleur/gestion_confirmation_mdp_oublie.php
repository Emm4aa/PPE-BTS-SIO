<?php 
    
    if(isset($_POST['verifier'])){

        $erreurs = [];

        $nvMdp = trim($_POST['nvMdp']);
        $code = trim($_POST['code']);
        $email = $_SESSION['email_reset'];

        $regexMdp = '/^[^ ]{3,}$/u';
        $regexCode = '/^[0-9]{6}$/';

        $regles = [
                        "nvMdp" => [$regexMdp,     "Veuillez rentrer un mot de passe valide"],
                        "code" => [$regexCode,  "Veuillez rentrer un code valide"],
        ];

        $champs = [$nvMdp,$code];

        foreach($champs as $champ){
                if($champ == ""){
                        $erreurs[] = "Veuillez remplir touts les champs";
                        break;
                }
        }

        if(empty($erreurs)){
            foreach($regles as $champ => [$regex, $msg]){
                if(!preg_match($regex, trim($_POST[$champ]))){
                        $erreurs[] = $msg;
                        break;
                }
            }
        }
        
        if(empty($erreurs)){
            $verifCode = $unControleur->verifCode($email,$code);
            
            if($verifCode == null){
                $erreurs[] = "Code incorrect !";
            }
        }
        
        
        if(!empty($erreurs)){
            $_SESSION['msg-erreur'] = $erreurs;
        }else{
            $unControleur->updateMdp($email,$nvMdp);
            header("Location:index.php?page=19");
            exit;
        }
    }
    
    
    require_once("vue/vue_confirmation_mdp_oublie.php");
?>
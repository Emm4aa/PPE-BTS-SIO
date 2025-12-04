<?php 

class Modele{
    private $unPdo;

    public function __construct(){
        $url = "mysql:host=localhost;dbname=neigeSoleilTP";
        $user = "root";
        $mdp = "";

        try {
            $this->unPdo = new PDO($url,$user,$mdp);
        } catch (PDOException $e) {
            echo "connexion a la base de données impossible";
            echo $e->getMessage();
        }
    }


    //Clients
    public function selectAllClient(){
        $requete = "SELECT * FROM client;";
        $exe = $this->unPdo->prepare($requete);
        $exe->execute();
        return $exe->fetchAll();
    }
    public function selectWhereClient($id_client){
        $requete = "SELECT * FROM client where id_c = :id_c;";
        $data = array(":id_c"=>$id_client);
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
        return $exe->fetch();
    }
    public function insertClient($tab){
        $requete = "INSERT into cliens values (null,:nom_c,:prenom_c,:email_c,null,:adr_c,:cp_c,:ville_c,:tel_c,:rib_c);";
        $exe = $this->unPdo->prepare($requete);
        $data = array(":nom"=>$tab['nom'],":prenom"=>$tab['prenom'],":email_c"=>$tab['email_c'],":adr_c"=>$tab['adr_c'],":cp_c"=>$tab['cp_c'],":ville_c"=>$tab['ville_c'],":tel_c"=>$tab['tel_c'],":rib_c"=>$tab['rib_c']);
        $exe->execute($data);
    }
    public function updateClient($tab){
        $requete = "UPDATE client SET nom_c = :nom_c, prenom_c = :prenom_c, email_c = :email_c, mdp_c = :mdp_c, adr_c = :adr_c, cp_c = :cp_c, ville_c = :ville_c mdp = :mdp, tel = :tel where id_c = :id_c ";
        $data = array(":nom_c"=>$tab['nom_c'],":prenom_c"=>$tab['prenom_c'],":email_c"=>$tab['email_c'],":mdp_c"=>$tab['mdp_c'],":adr_c"=>$tab['adr_c'],":cp_c"=>$tab['cp_c'], ":ville_c"=>$tab['ville_c'], ":tel_c"=>$tab['tel_c'] ":rib_c"=>$tab['rib_c'], ":id_c"=>$tab['id_c']);
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
    }
    public function deleteClient($id_client){
        $requete = "DELETE FROM client where id_c = :id_c;";
        $exe = $this->unPdo->prepare($requete);
        $data = array(":id_c"=>$id_client);
        $exe->execute($data);    
    }
    public function selectLikeClient($filtre){
        $requete = "select * from client where nom_c like :filtre or prenom_c like :filtre or email_c like :filtre or tel_c like :filtre;";
        $data = array(":filtre"=>"%".$filtre."%");
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
        return $exe->fetchAll();
    }




    //Propriétaires
        public function selectAllProprio(){
        $requete = "SELECT * FROM proprietaire;";
        $exe = $this->unPdo->prepare($requete);
        $exe->execute();
        return $exe->fetchAll();
    }
    public function selectWhereProprio($id_proprio){
        $requete = "SELECT * FROM proprietaire where id_p = :id_p;";
        $data = array(":id_p"=>$id_proprio);
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
        return $exe->fetch();
    }
    public function insertProprio($tab){
        $requete = "INSERT into proprietaire values (null,:nom_p,:prenom_p,:email_p,null,:adr_p,:cp_p,:ville_p,:tel_p,:rib_p);";
        $exe = $this->unPdo->prepare($requete);
        $data = array(":nom_p"=>$tab['nom_p'],":prenom_p"=>$tab['prenom_p'],":email_p"=>$tab['email_p'],":adr_p"=>$tab['adr_p'],":cp_p"=>$tab['cp_p'],":ville_p"=>$tab['ville_p'],":tel_p"=>$tab['tel_p'],":rib_p"=>$tab['rib_p']);
        $exe->execute($data);
    }
    public function updateProprio($tab){
        $requete = "UPDATE proprietaire SET nom_p = :nom_p, prenom_p = :prenom_p, email_p = :email_p, mdp_p = :mdp_p, adr_p = :adr_p, cp_p = :cp_p, ville_p = :ville_p, tel_p = :tel_p, rib_p = :rib_p where id_p = :id_p;";
        $data = array(":nom_p"=>$tab['nom_p'],":prenom_p"=>$tab['prenom_p'],":email_p"=>$tab['email_p'],":mdp_p"=>$tab['mdp_p'],":adr_p"=>$tab['adr_p'],":cp_p"=>$tab['cp_p'],":ville_p"=>$tab['ville_p'],":tel_p"=>$tab['tel_p'],":rib_p"=>$tab['rib_p'],":id_p"=>$tab['id_p']);
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
    }
    public function deleteProprio($id_proprio){
        $requete = "DELETE FROM proprietaire where id_p = :id_p;";
        $exe = $this->unPdo->prepare($requete);
        $data = array(":id_p"=>$id_proprio);
        $exe->execute($data);    
    }
    public function selectLikeProprio($filtre){
        $requete = "select * from proprietaire where nom_p like :filtre or prenom_p like :filtre or email_p like :filtre or tel_p like :filtre;";
        $data = array(":filtre"=>"%".$filtre."%");
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
        return $exe->fetchAll();
    }



    //Habitations
    public function selectAllHabitation(){
        $requete = "SELECT * FROM habitation;";
        $exe = $this->unPdo->prepare($requete);
        $exe->execute();
        return $exe->fetchAll();
    }
    public function selectWhereHabitation($ref){
        $requete = "SELECT * FROM habitation where ref_hab = :ref_hab;";
        $data = array(":ref_hab"=>$ref_hab);
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
        return $exe->fetch();
    }
    public function insertHabitation($tab){
        $requete = "INSERT into habitation values (null,:type_hab,:adr_hab,:cp_hab,:ville_hab;tarif_hab_bas,:tarif_hab_moy,:tarif_hab_hau);";
        $exe = $this->unPdo->prepare($requete);
        $data = array(":type_hab"=>$tab['type_hab'],":adr_hab"=>$tab['adr_hab'],":cp_hab"=>$tab['cp_hab'],":ville_hab"=>$tab['ville_hab'],":tarif_hab_bas"=>$tab['tarif_hab_bas'],":tarif_hab_moy"=>$tab['tarif_hab_moy'],":tarif_hab_hau"=>$tab['tarif_hab_hau']);
        $exe->execute($data);
    }
    public function updateHabitation($tab){
        $requete = "UPDATE habitation SET type_hab = :type_hab, adr_hab = :adr_hab, cp_hab = :cp_hab, ville_hab = :ville_hab, tarif_hab_bas = :tarif_hab_bas, tarif_hab_moy = :tarif_hab_moy, tarif_hab_hau = :tarif_hab_hau where ref_hab = :ref_hab;";
        $data = array(":adresse"=>$tab['adresse'],":type_hab"=>$tab['type_hab'],":tarif"=>$tab['tarif'],":surface"=>$tab['surface'],":ref"=>$tab['ref']);
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
    }
    public function deleteHabitation($ref){
        $requete = "DELETE FROM habitation where ref_hab = :ref_hab;";
        $exe = $this->unPdo->prepare($requete);
        $data = array(":ref_hab"=>$ref_hab);
        $exe->execute($data);    
    }
    public function selectLikeHabitation($filtre){
        $requete = "select * from habitation where type_hab like :filtre or adr_hab like :filtre or cp_hab like :filtre or ville_hab like :filtre or tarif_hab_bas like :filtre or tarif_hab_moy like :filtre or tarif_hab_hau like :filtre;";
        $data = array(":filtre"=>"%".$filtre."%");
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
        return $exe->fetchAll();
    }


    //Reservations
    public function selectAllReservation(){
        $requete = "SELECT * FROM reservation;";
        $exe = $this->unPdo->prepare($requete);
        $exe->execute();
        return $exe->fetchAll();
    }
    public function selectWhereReservation($id_resa){
        $requete = "SELECT * FROM reservation where ref_res = :ref_res;";
        $data = array(":ref_res"=>$ref_res);
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
        return $exe->fetch();
    }
    public function insertReservation($tab){
        $requete = "INSERT into reservation values (null,curdate(),:nb_perso,:date_deb,:date_fin,:etat_res);";
        $exe = $this->unPdo->prepare($requete);
        $data = array(":nb_perso"=>$tab['nb_perso'],":date_deb"=>$tab['date_deb'],":date_fin"=>$tab['date_fin'],":etat_res"=>$tab['etat_res']);
        $exe->execute($data);
    }
    public function updateReservation($tab){
        $requete = "UPDATE reservation SET date_res = curdate(), nb_perso = :nb_perso, date_deb = :date_deb, date_fin = :date_fin, etat_res = :etat_res where ref_res = :ref_res;";
        $data = array(":nb_perso"=>$tab['nb_perso'],":date_deb"=>$tab['date_deb'],":date_fin"=>$tab['date_fin'],":etat_res"=>$tab['etat_res'], ":ref_res"=>$tab['ref_res']);
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
    }
    public function deleteReservation($id_resa){
        $requete = "DELETE FROM reservation where ref_res = :ref_res;";
        $exe = $this->unPdo->prepare($requete);
        $data = array(":ref_res"=>$ref_res);
        $exe->execute($data);    
    }
    public function selectLikeReservation($filtre){
        $requete = "select * from reservation where date_res like :filtre or nb_perso like :filtre or etat_res like :filtre or date_deb like :filtre or date_fin like :filtre;";
        $data = array(":filtre"=>"%".$filtre."%");
        $exe = $this->unPdo->prepare($requete);
        $exe->execute($data);
        return $exe->fetchAll();
    }
}
?>
<?php
require_once("modele/modele.class.php"); 
class Controleur {
    private $unModele ;

    public function __construct (){
        $this->unModele= new Modele();

    }
    //gestion des clients
    public function insertClient($tab){
        //controle des donnees du clients

        //appel du modele pour realiser l'insertion
        $this->unModele->insertClient($tab);
    }
    public function selectAllClient(){
        return $this->unModele->selectAllClient();
    }
    public function selectLikeClient($filtre){
    return $this->unModele->selectLikeClient($filtre);
    }

    public function deleteClient($id_c){
        $this->unModele->deleteClient($id_c);
    }

    public function selectWhereClient($id_c){
    return $this->unModele->selectWhereClient($id_c);
    }

     

    public function updateClient($id_c) {
        return $this->unModele->updateClient($id_c);
    }


         public function insertProprietaire($tab){
            //contrôle des données des proprio

            //appel du modele pour realiser l'insertion
            $this->unModele->insertProprietaire($tab);
        }

        public function selectAllProprietaire(){
            return $this->unModele->selectAllProprietaire();
        }

        public function selectLikeProprietaire($filtre){
            return $this->unModele->selectLikeProprietaire($filtre);
        }

        public function deleteProprietaire($id_p){
            $this->unModele->deleteProprietaire($id_p);
        }
        public function selectWhereProprietaire($id_p){
            return $this->unModele->selectWhereProprietaire($id_p);
        }
        //public function selectWhereProprietaire($email, $mdp){
            //controler l'email et le mdp
           // return $this->unModele->selectWhereProprietaire($email, $mdp);
        //}
        public function updateProprietaire($tab){
            $this->unModele->updateProprietaire($tab);
        }

    //gestion des habitations
    public function insertHabitation($tab){
        //controle des donnees du clients

        //appel du modele pour realiser l'insertion
        $this->unModele->insertHabitation($tab);
    }
    public function selectAllHabitation(){
        return $this->unModele->selectAllHabitation();
    }
    public function selectLikeHabitation($filtre){
    return $this->unModele->selectLikeHabitation($filtre);
    }

    public function deleteHabitation($id_c){
        $this->unModele->deleteHabitation($id_c);
    }

    public function selectWhereHabitation($id_c){
    return $this->unModele->selectWhselectWhereHabitationereClient($id_c);
    }

     

    public function updateHabitation($id_c) {
        return $this->unModele->updateHabitation($id_c);
    }

}
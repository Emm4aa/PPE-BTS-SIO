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

    public function deleteClient($id_client){
        $this->unModele->deleteClient($id_client);
    }

    public function selectWhereClient($id_client){
    return $this->unModele->selectWhereClient($id_client);
    }

     

    public function updateClient($id_client) {
        return $this->unModele->updateClient($id_client);
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

        public function deleteProprietaire($id_client){
            $this->unModele->deleteProprietaire($id_client);
        }
        public function selectWhereIDProprietaire($id_client){
            return $this->unModele->selectWhereIDProprietaire($id_client);
        }
        //public function selectWhereIDProprietaire($email, $mdp){
            //controler l'email et le mdp
           // return $this->unModele->selectWhereIDProprietaire($email, $mdp);
        //}
        public function updateProprietaire($tab){
            $this->unModele->updateProprietaire($tab);
        }

}
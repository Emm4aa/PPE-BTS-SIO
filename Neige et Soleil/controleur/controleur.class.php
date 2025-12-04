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
    public function selectAllClients(){
        return $this->unModele->selectAllClients();
    }
    public function selectLikeClients($filtre){
    return $this->unModele->selectLikeClients($filtre);
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


         public function insertProprio($tab){
            //contrôle des données des proprio

            //appel du modele pour realiser l'insertion
            $this->unModele->insertProprio($tab);
        }

        public function selectAllProprio(){
            return $this->unModele->selectAllProprio();
        }

        public function selectLikeProprio($filtre){
            return $this->unModele->selectLikeProprio($filtre);
        }

        public function deleteProprio($id_client){
            $this->unModele->deleteProprio($id_client);
        }
        public function selectWhereIDProprio($id_client){
            return $this->unModele->selectWhereIDProprio($id_client);
        }
        //public function selectWhereIDProprio($email, $mdp){
            //controler l'email et le mdp
           // return $this->unModele->selectWhereIDProprio($email, $mdp);
        //}
        public function updateProprio($tab){
            $this->unModele->updateProprio($tab);
        }

}
<?php
require_once("modele/modele.class.php"); 
class Controleur {
    private $unModele ;

    public function __construct (){
        $this->unModele= new Modele();

    }


    //Clients
    public function insertClient($tab){
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
    public function selectWhereClient($email,$mdp){
    return $this->unModele->selectWhereClient($email,$mdp);
    }
    public function selectWhereIdClient($id_c){
    return $this->unModele->selectWhereIdClient($id_c);
    }
    public function updateClient($id_c) {
        return $this->unModele->updateClient($id_c);
    }   


    //Proprietaires
    public function insertProprietaire($tab){
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
    public function selectWhereProprietaire($email,$mdp){
        return $this->unModele->selectWhereProprietaire($email,$mdp);
    }
    public function selectWhereIdProprietaire($id_p){
         return $this->unModele->selectWhereIdProprietaire($id_p);
    }
    //public function selectWhereProprietaire($email, $mdp){
        //controler l'email et le mdp
        // return $this->unModele->selectWhereProprietaire($email, $mdp);
    //}
    public function updateProprietaire($tab){
        $this->unModele->updateProprietaire($tab);
    }


    //Habitations
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
    public function deleteHabitation($ref_hab){
        $this->unModele->deleteHabitation($ref_hab);
    }
    public function selectWhereHabitation($ref_hab){
    return $this->unModele->selectWhereHabitation($ref_hab);
    }
    public function selectHabitationWhereProprietaire($id_p){
        return $this->unModele->selectHabitationWhereProprietaire($id_p);
    }
    public function updateHabitation($ref_hab) {
        return $this->unModele->updateHabitation($ref_hab);
    }


    //Reservations
    public function insertReservation($tab){
        //controle des donnees du clients

        //appel du modele pour realiser l'insertion
        $this->unModele->insertReservation($tab);
    }
    public function selectAllReservation(){
        return $this->unModele->selectAllReservation();
    }
    public function selectLikeReservation($filtre){
    return $this->unModele->selectLikeReservation($filtre);
    }
    public function deleteReservation($ref_res){
        $this->unModele->deleteReservation($ref_res);
    }
    public function selectWhereReservation($ref_res){
    return $this->unModele->selectWhereReservation($ref_res);
    }
    public function selectReservationWhereClient($id_c){
        return $this->unModele->selectReservationWhereClient($id_c);
    }
    public function updateReservation($tab) {
        $this->unModele->updateReservation($tab);
    }




    //admins
    public function selectWhereAdmin($email,$mdp){
        return $this->unModele->selectWhereAdmin($email,$mdp);
    }

}
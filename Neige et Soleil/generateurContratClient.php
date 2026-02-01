<?php
session_start();
require_once("./fpdf/fpdf.php");
require_once("controleur/controleur.class.php");



class PDF extends FPDF{
    
    function header(){
        $this->SetFont("Arial","B",12);
        $this->Cell(0,10,"CONTRAT DE RESERVATION",1,1,"C");
    }

    function body(){
        $unControleur = new Controleur();
            
        $refRes = isset($_GET['ref_res']) ? $_GET['ref_res'] : null;
        $reservationClient = $unControleur->selectWhereReservation($refRes);

        $this->SetFont("Arial","B",12);
        $this->Cell(0,15,iconv('UTF-8', 'ISO-8859-1',"Identité du client (ou de son représentant légal)"),0,1,"C");
        $this->MultiCell(0,10,iconv('UTF-8', 'ISO-8859-1',"Nom : ".($_SESSION['nom']).
                                "\nPrenom : ".($_SESSION['prenom']).
                                "\nAdresse : ".($_SESSION['adresse']).
                                "\nCode postal : ".($_SESSION['cp']).
                                "\nVille : ".($_SESSION['ville']).
                                "\nTéléphone : ".($_SESSION['tel']).
                                "\nColler ici un RIB : ".($_SESSION['rib'])),1,"L");

        $this->Cell(0,15,iconv('UTF-8', 'ISO-8859-1',"Réservation"),0,1,"C");

        if (!empty($reservationClient)) {
            foreach ($reservationClient as $res){
                $this->MultiCell(0,10,iconv('UTF-8', 'ISO-8859-1',"Numéro de la réservation : ".($res['ref_res']).
                                "\nDate de la réservation : ".($res['date_res']).
                                "\nNombre de personne : ".($res['nb_perso']).
                                "\nDate de début du séjour : ".($res['date_debut']).
                                "\nDate de la fin du séjour : ".($res['date_fin']).
                                "\nIdentifant de l'habitation : ".($res['ref_hab'])),1,"L");
            }
        }   
        else {
            $this->Cell(0, 10,iconv('UTF-8','ISO-8859-1', "Aucune information trouvée pour la réservation : " . $refRes), 1, 1);
        } 
          
    }

    function footer(){
        $this->SetFont("Arial","B",12);
        $this->Cell(0,15,iconv('UTF-8', 'ISO-8859-1',"Signature des deux parties"),0,1,"C");
        $this->Cell(0,30,iconv('UTF-8', 'ISO-8859-1',"Le Client"),1,1,"L");
        $this->Cell(0,30,iconv('UTF-8', 'ISO-8859-1',"Neige & Soleil"),1,1,"L");
    }
    
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->body();
$pdf->Output();
?>
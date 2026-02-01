<?php
session_start();
require_once("./fpdf/fpdf.php");
require_once("controleur/controleur.class.php");



class PDF extends FPDF{
    
    function header(){
        $this->SetFont("Arial","B",12);
        $this->Cell(0,10,"CONTRAT DE MANDAT LOCATIF",1,1,"C");
    }

    function body(){
        $unControleur = new Controleur();
            
        $refHab = isset($_GET['ref_hab']) ? $_GET['ref_hab'] : null;

        $maisonProprio = $unControleur->selectWhereMaison($refHab);
        $appartementProprio = $unControleur->selectWhereAppartement($refHab);

        $this->SetFont("Arial","B",12);
        $this->Cell(0,15,iconv('UTF-8', 'ISO-8859-1',"Identité du propriétaire (ou de son représentant légal)"),0,1,"C");
        $this->MultiCell(0,10,iconv('UTF-8', 'ISO-8859-1',"Nom : ".($_SESSION['nom']).
                                "\nPrenom : ".($_SESSION['prenom']).
                                "\nAdresse : ".($_SESSION['adresse']).
                                "\nCode postal : ".($_SESSION['cp']).
                                "\nVille : ".($_SESSION['ville']).
                                "\nTéléphone : ".($_SESSION['tel']).
                                "\nColler ici un RIB : ".($_SESSION['rib'])),1,"L");

        $this->Cell(0,15,iconv('UTF-8', 'ISO-8859-1',"Adresse de l'habitation"),0,1,"C");

        if (!empty($maisonProprio)) {
            foreach ($maisonProprio as $maison){
                $this->MultiCell(0,10,iconv('UTF-8', 'ISO-8859-1',"Type : ".($maison['type_hab']).
                                "\nAdresse : ".($maison['adr_hab']).
                                "\nCode postal : ".($maison['cp_hab']).
                                "\nVille : ".($maison['ville_hab']).
                                "\nMontant de location hebdomadaire saison basse : ".($maison['tarif_hab_bas']).
                                "\nMontant de location hebdomadaire saison moyenne : ".($maison['tarif_hab_moy']).
                                "\nMontant de location hebdomadaire saison haute : ".($maison['tarif_hab_hau']).
                                "\nSurface : ".($maison['surface']."m2").
                                "\nCaractéristiques : ".($maison['carac_m'])),1,"L");
            }    
        }
        elseif (!empty($appartementProprio)) {
            foreach ($appartementProprio as $appartement){
                $this->MultiCell(0,10,iconv('UTF-8', 'ISO-8859-1',"Type : ".($appartement['type_hab']).
                                "\nAdresse : ".($appartement['adr_hab']).
                                "\nCode postal : ".($appartement['cp_hab']).
                                "\nVille : ".($appartement['ville_hab']).
                                "\nMontant de location hebdomadaire saison basse : ".($appartement['tarif_hab_bas']).
                                "\nMontant de location hebdomadaire saison moyenne : ".($appartement['tarif_hab_moy']).
                                "\nMontant de location hebdomadaire saison haute : ".($appartement['tarif_hab_hau']).
                                "\nSurface : ".($appartement['surface']."m2").
                                "\nEtage : ".($appartement['etage_ap']).
                                "\nType d'appartement : ".($appartement['type_ap'])),1,"L");
            }
        } 
        else {
            $this->Cell(0, 10, "Aucune information trouvee pour l'habitation ref : " . $refHab, 1, 1);
        } 
    }

    function footer(){
        $this->SetFont("Arial","B",12);
        $this->Cell(0,15,iconv('UTF-8', 'ISO-8859-1',"Signature des deux parties"),0,1,"C");
        $this->Cell(0,30,iconv('UTF-8', 'ISO-8859-1',"Le propriétaire"),1,1,"L");
        $this->Cell(0,30,iconv('UTF-8', 'ISO-8859-1',"Neige & Soleil"),1,1,"L");
    }
    
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->body();
$pdf->Output();
?>
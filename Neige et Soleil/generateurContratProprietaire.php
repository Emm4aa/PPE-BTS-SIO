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

        $habitationProprio = $unControleur->selectWhereHabitation($refHab);
        $id = $_SESSION['id'];
        $leProprietaire = $unControleur->selectWhereIdProprietaire($id);

        $this->SetFont("Arial","B",12);
        $this->Cell(0,15,iconv('UTF-8', 'ISO-8859-1',"Identité du propriétaire (ou de son représentant légal)"),0,1,"C");
        $this->MultiCell(0,10,iconv('UTF-8', 'ISO-8859-1',"Nom : ".($leProprietaire['nom']).
                                "\nPrenom : ".($leProprietaire['prenom']).
                                "\nAdresse : ".($leProprietaire['adresse']).
                                "\nCode postal : ".($leProprietaire['cp']).
                                "\nVille : ".($leProprietaire['ville']).
                                "\nTéléphone : ".($leProprietaire['tel']).
                                "\nRIB : ".($leProprietaire['RIB'])
                                ),1,"L");

        $this->Cell(0,15,iconv('UTF-8', 'ISO-8859-1',"Informations habitation"),0,1,"C");

        if (!empty($habitationProprio)) {
                $this->MultiCell(0,10,iconv('UTF-8', 'ISO-8859-1',"Type : ".($habitationProprio['type_hab']).
                                "\nAdresse : ".($habitationProprio['adr_hab']).
                                "\nCode postal : ".($habitationProprio['cp_hab']).
                                "\nVille : ".($habitationProprio['ville_hab']).
                                "\nMontant saison basse : ".($habitationProprio['tarif_hab_bas']).
                                "\nMontant saison moyenne : ".($habitationProprio['tarif_hab_moy']).
                                "\nMontant saison haute : ".($habitationProprio['tarif_hab_hau']).
                                "\nSurface : ".($habitationProprio['surface']."m2").
                                "\nCapacité : ".($habitationProprio['capacite_hab'])
                                ),1,"L"); 
        }else {
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
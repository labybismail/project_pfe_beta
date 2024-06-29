  
<?php
require('fpdf.php');
class PDF extends FPDF
{
/* Page header */
function Header()
{
    
  $this->SetFont('Arial','B',14);
  $this->Cell(80,10,"Dr.Asmaa Hamdouni",0,0,'L');
  $this->Ln(7);
  
  $this->SetFont('Arial','',12);
  $this->Cell(80,8,iconv('UTF-8', 'windows-1252', "Mèdecine Gènèrale"),0,0,'L');
  

  $this->Ln(5);
  
  $this->Cell(45,8,"Newyork, United States",0,1,'L');
  $this->SetFont('Arial','B',14);
  $this->SetTextColor(0);
  $this->Cell(45,0,"",'B',0,'C');  
  $this->Ln(20);
  $this->Cell(160,10,"Boujdour Le : 10/12/2021 ",0,0,'R');
  $this->Ln(7);
  $this->SetFont('Arial','',14,);
  $this->Cell(180,40,iconv('UTF-8', 'windows-1252', "Certificat d'aptitude physique"),0,1,'C');
  $this->Cell(90,0,iconv('UTF-8', 'windows-1252', " • Je soussigne , Docteur en Mèdecine, Certifie avoir examinè"),0,1,'L');
  $this->Cell(80,25,iconv('UTF-8', 'windows-1252', "Ce jour ....."),0,1,'L');
  $this->Cell(80,0,iconv('UTF-8', 'windows-1252', "l'examen clinique donc il est apte-inapte : ...."),0,1,'L');
  $this->Cell(80,25,iconv('UTF-8', 'windows-1252', "Certificat remis à l'intèressè,à sa demande , pour servir et  ...."),0,1,'L');
  $this->Cell(180,20,iconv('UTF-8', 'windows-1252', "Valoir ce que de droit."),0,1,'C');

    
}

/* Page footer */

}
function footer($pdf)
{
    /* Position at 1.5 cm from bottom */
    $pdf->SetY(-41);
    /* Arial italic 8 */
    $pdf->SetFont('Arial','I',14);
    /* Page number */
    $pdf->Cell(0,20,iconv('UTF-8', 'windows-1252', "Adresse :28 Immeuble 798 Massira I B,maroc,201020,Casablanca"),'T',1,'C');
    $pdf->Cell(0,0,iconv('UTF-8', 'windows-1252', "Numéro De Téléphone  :+212666666666"),0,1,'C');
}

/* Instanciation of inherited class */
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
footer($pdf);
$pdf->SetFont('Times','',12);


$pdf->Output();
?>
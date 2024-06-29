  
<?php
require('fpdf/fpdf.php');
include_once("config.php");



$iddoc=$_POST["iddoc"];
$idus=$_POST["idus"];
$date=date('j F Y');
$time =date("H:i a");
$sql_doc = mysqli_query($conn,"select * from `users` where `IDusers`='$iddoc'");
$row_doc = mysqli_fetch_assoc($sql_doc);
$sql_user = mysqli_query($conn,"select * from `users` where `IDusers`='$idus'");
$row_user = mysqli_fetch_assoc($sql_user);



function validateForm($form){
  $form = json_decode($form);
  $obj = array();
  


  if (!is_array($form->name)) {
      array_push($obj, array(
          "type" => iconv('UTF-8', 'windows-1252', $form->type),
          "nbrday" => $form->nbrday,
          "description" => iconv('UTF-8', 'windows-1252', $form->description),
          "date3" => iconv('UTF-8', 'windows-1252', $form->date3),
          "date4" => iconv('UTF-8', 'windows-1252', $form->date4),
          "nbrdayP" => iconv('UTF-8', 'windows-1252', $form->nbrdayP),
          "date5" => iconv('UTF-8', 'windows-1252', $form->date5),
          "date6" => iconv('UTF-8', 'windows-1252', $form->date6),
          "date7" => iconv('UTF-8', 'windows-1252', $form->date7),
          "transport" => iconv('UTF-8', 'windows-1252', $form->transport),



      ));
  }else{
      foreach ($form->name as $key => $value) {
          array_push($obj, array(
              "Type" => iconv('UTF-8', 'windows-1252', $value),
              "nbrday" => $form->nbrday[$key],
              "description" => iconv('UTF-8', 'windows-1252', $form->description),
              "date3" => iconv('UTF-8', 'windows-1252', $form->date3),
              "date4" => iconv('UTF-8', 'windows-1252', $form->date4),
              "nbrdayP" => iconv('UTF-8', 'windows-1252', $form->nbrdayP),
              "date5" => iconv('UTF-8', 'windows-1252', $form->date5),
              "date6" => iconv('UTF-8', 'windows-1252', $form->date6),
              "date7" => iconv('UTF-8', 'windows-1252', $form->date7),
              "transport" => iconv('UTF-8', 'windows-1252', $form->transport),
              
          ));
      }
  }

  return $obj;
}

if (isset($_POST["type"]) && $_POST["type"] === "medicalcertificate") {



/* Page footer */


function footer($pdf,$row_doc)
{
    $pdf->SetY(-41);
    $pdf->SetFont('Arial','I',14);
    $pdf->Cell(0,20,iconv('UTF-8', 'windows-1252', "Adresse :".$row_doc['searchaddress']),'T',1,'C');
    $pdf->Cell(0,0,iconv('UTF-8', 'windows-1252', "Numéro De Téléphone  : ".$row_doc['phone']),0,1,'C');
}

/* Instanciation of inherited class */
$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
if (isset($_POST["formData"])) {
  $validateForm = validateForm($_POST["formData"]);

  foreach ($validateForm as $key => $value) {

  $pdf->SetFont('Arial','B',14);
  $pdf->Cell(80,10,"Dr ".ucfirst($row_doc['name'])." ".ucfirst($row_doc['surname']) ,0,0,'L');
  $pdf->Ln(7);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(80,8,iconv('UTF-8', 'windows-1252', "Mèdecine Gènèrale"),0,0,'L');
  $pdf->Ln(5);
  $pdf->Cell(45,8,"Newyork, United States",0,1,'L');
  $pdf->SetFont('Arial','B',14);
  $pdf->SetTextColor(0);
  $pdf->Cell(45,0,"",'B',0,'C');  
  $pdf->Ln(20);
  $pdf->Cell(160,10,$row_doc['city']." Le : ".$date,0,0,'R');
  $pdf->Ln(7);

  
  $pdf->SetFont('Arial','',14);
  $pdf->Cell(180,40,iconv('UTF-8', 'windows-1252', "Certificat Mèdical"),0,1,'C');
  $pdf->Cell(80,0,iconv('UTF-8', 'windows-1252', " • Je soussigne , Docteur en Mèdecine ".ucfirst($row_doc['name'])." ".ucfirst($row_doc['surname'])),0,1,'L');
  $pdf->Cell(80,25,iconv('UTF-8', 'windows-1252', "Certifier que l'ètat de santè de "."Mr/Mdme ".ucfirst($row_user['name'])." ".ucfirst($row_user['surname'])),0,1,'L');
  $pdf->Cell(80,0,iconv('UTF-8', 'windows-1252', "C.I.N :  ".$row_user['cin']),0,1,'L');
  $pdf->Cell(80,25,iconv('UTF-8', 'windows-1252', "Adresse : " .$row_user['address']),0,1,'L');
  $pdf->Cell(80,0,iconv('UTF-8', 'windows-1252', "=> Nècessite un traitement avec arrêt de travail de ".$value['nbrday']."  Jours sauf Complication"),0,1,'L');
  $pdf->Cell(80,25,iconv('UTF-8', 'windows-1252', "Du : ".$value['date3']."  Au : ".$value['date4']),0,1,'C');
  if(!empty($value['nbrdayP'])){
  $pdf->Cell(80,0,iconv('UTF-8', 'windows-1252', "=> Nècessite une prolongation d'arrêt de travail de ".$value['nbrdayP']."  Jours sauf Complication"),0,1,'L');
  $pdf->Cell(80,25,iconv('UTF-8', 'windows-1252', "Du : ".$value['date5']."  Au : ".$value['date6']),0,1,'C');
}elseif(empty($value['nbrdayP'])){
  $pdf->Cell(80,0,iconv('UTF-8', 'windows-1252', "=> Nècessite une prolongation d'arrêt de travail de ..........  Jours sauf Complication"),0,1,'L');
  $pdf->Cell(96,25,iconv('UTF-8', 'windows-1252', "Du : .......................  Au :  ....................... "),0,1,'C');
}
  $pdf->Cell(80,0,iconv('UTF-8', 'windows-1252', "=> Lui permet de reprendre son travail à dater du  ".$value['date7'].""),0,1,'L');
  $pdf->Cell(80,25,iconv('UTF-8', 'windows-1252', "=> Nècessite le transport d'urgence en ambulance à l'hopital ".$value['transport']),0,1,'L');

  }
  /*header image */
  $checkimg = mysqli_query($conn, "Select * FROM `docinfo` WHERE  `id_doc_din`= '$iddoc' and `type_din`= 'header' ");
  $row_docH = mysqli_fetch_assoc($checkimg);
  
  if(mysqli_num_rows($checkimg)!= 0)
  {
    $filepath = $row_docH['file_din'];
    $pdf->setXY(0,0);
    $pdf->Cell( 0, 0, $pdf->Image($filepath, $pdf->GetX(), $pdf->GetY(), 216,40,$header[1]), 0, 0, 'C', false );
    $pdf->Ln(50);
  }
  /*header image */

  /*footer image */

  $checkimgF = mysqli_query($conn, "Select * FROM `docinfo` WHERE  `id_doc_din`= '$iddoc' and `type_din`= 'footer' ");  
  $row_docF = mysqli_fetch_assoc($checkimgF);
  
  if(mysqli_num_rows($checkimgF)!= 0)
  {
    $filepath = $row_docF['file_din'];
    $pdf->setXY(0,-38);
    $pdf->SetFont('Arial','I',14);
    $pdf->Cell(0,0, $pdf->Image($filepath, $pdf->GetX(), $pdf->GetY(), 220,40,$header[1]), 0, 0, 'C', false );
  }
  else{
    footer($pdf,$row_doc);
  }
  /*footer image */

  
}
 

  
$pdf->SetFont('Times','',12);
$fileNewName = "CM".uniqid('',false).".pdf";
$fileDestination = 'assets/Medicalr/'.$fileNewName;

$pdf->Output($fileDestination,'F'); 
/*------------||------------------------------------------------------------------------||---------------- */
/*------------||------------------------------------- Certificat d'aptitude ------------||---------------- */
/*------------\/------------------------------------------------------------------------\/---------------- */

}elseif (isset($_POST["type"]) && $_POST["type"] === "certificate"){

/* Page footer */


function footer($pdf,$row_doc)
{
    $pdf->SetY(-41);
    $pdf->SetFont('Arial','I',14);
    $pdf->Cell(0,20,iconv('UTF-8', 'windows-1252', "Adresse :".$row_doc['searchaddress']),'T',1,'C');
    $pdf->Cell(0,0,iconv('UTF-8', 'windows-1252', "Numéro De Téléphone  : ".$row_doc['phone']),0,1,'C');
}

/* Instanciation of inherited class */
$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
if (isset($_POST["formData"])) {
  $validateForm = validateForm($_POST["formData"]);

  foreach ($validateForm as $key => $value) {

  $pdf->SetFont('Arial','B',14);
  $pdf->Cell(80,10,"Dr ".ucfirst($row_doc['name'])." ".ucfirst($row_doc['surname']) ,0,0,'L');
  $pdf->Ln(7);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(80,8,iconv('UTF-8', 'windows-1252', "Mèdecine Gènèrale"),0,0,'L');
  $pdf->Ln(5);
  $pdf->Cell(45,8,"Newyork, United States",0,1,'L');
  $pdf->SetFont('Arial','B',14);
  $pdf->SetTextColor(0);
  $pdf->Cell(45,0,"",'B',0,'C');  
  $pdf->Ln(20);
  $pdf->Cell(160,10,$row_doc['city']." Le : ".$date,0,0,'R');
  $pdf->Ln(7);

  
  $pdf->SetFont('Arial','',14);
  $pdf->Cell(180,40,iconv('UTF-8', 'windows-1252', "Certificat Mèdical d'aptitude physique"),0,1,'C');
  $pdf->Cell(80,0,iconv('UTF-8', 'windows-1252', " • Je soussigne , Docteur en Mèdecine ".ucfirst($row_doc['name'])." ".ucfirst($row_doc['surname'])),0,1,'L');
  $pdf->Cell(80,25,iconv('UTF-8', 'windows-1252', "Certifier vaoir examiné ce jour  ".$date),0,1,'L');
  $pdf->Cell(80,0,iconv('UTF-8', 'windows-1252', "Mr/Mdme ".ucfirst($row_user['name'])." ".ucfirst($row_user['surname'])),0,1,'L');
  $pdf->Cell(80,25,iconv('UTF-8', 'windows-1252', "C.I.N :  ".$row_user['cin']),0,1,'L');
  $pdf->Cell(80,0,iconv('UTF-8', 'windows-1252', "Adresse : " .$row_user['address']),0,1,'L');
  $pdf->Cell(80,25,iconv('UTF-8', 'windows-1252', "Date de Naissance : " .$row_user['dateBirth']),0,1,'L');
  $pdf->Cell(80,0,iconv('UTF-8', 'windows-1252', "et le dèclare indemme de toute affectation contre-indiquant"),0,1,'L');
  $pdf->Cell(80,25,iconv('UTF-8', 'windows-1252', "son emploi ou son activitè physique sportive "),0,1,'L');
  $pdf->Cell(80,0,iconv('UTF-8', 'windows-1252', "Ce document est dèlivrè à l'interessè pour servir et vouloir ce que de droit "),0,1,'L');

  }
  /*header image */
  $checkimg = mysqli_query($conn, "Select * FROM `docinfo` WHERE  `id_doc_din`= '$iddoc' and `type_din`= 'header' ");
  $row_docH = mysqli_fetch_assoc($checkimg);
  
  if(mysqli_num_rows($checkimg)!= 0)
  {
    $filepath = $row_docH['file_din'];
    $pdf->setXY(0,0);
    $pdf->Cell( 0, 0, $pdf->Image($filepath, $pdf->GetX(), $pdf->GetY(), 216,40,$header[1]), 0, 0, 'C', false );
    $pdf->Ln(50);
  }
  /*header image */

  /*footer image */

  $checkimgF = mysqli_query($conn, "Select * FROM `docinfo` WHERE  `id_doc_din`= '$iddoc' and `type_din`= 'footer' ");  
  $row_docF = mysqli_fetch_assoc($checkimgF);
  
  if(mysqli_num_rows($checkimgF)!= 0)
  {
    $filepath = $row_docF['file_din'];
    $pdf->setXY(0,-38);
    $pdf->SetFont('Arial','I',14);
    $pdf->Cell(0,10, $pdf->Image($filepath, $pdf->GetX(), $pdf->GetY(), 220,40,$header[1]), 0, 0, 'R', false );
  }
  else{
    footer($pdf,$row_doc);
  }
  /*footer image */

  
}
 

  
$pdf->SetFont('Times','',12);
$fileNewName = "CMA".uniqid('',false).".pdf";
$fileDestination = 'assets/Medicalr/'.$fileNewName;

$pdf->Output($fileDestination,'F'); 


}

?>
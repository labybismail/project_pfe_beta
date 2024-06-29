<?php 

require('../../fpdf/fpdf.php');
include_once("../../config.php");

$iduser=$_GET['idpat'];
$sql = mysqli_query($conn,"select * from `users` where `IDusers`='$iduser'");
$row = mysqli_fetch_assoc($sql);



$location = dirname(__FILE__)."/form/";
$pdf = new FPDF();


$pdf->AddPage('L');
$pdf->Image($location."3.jpg",0,0,300);
$pdf->SetFont('Arial','B',10);

    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(31,73,125);

    $pdf->setXY(180,51.5);
    $pdf->Cell(30,8, $row["name"]." ". $row["surname"],0,0,'L');
    $pdf->SetFont('Arial','B',9);

    $pdf->setXY(207,66.5);
    $pdf->Cell(30,8, $row["cin"],0,0,'L');
    $pdf->setXY(208,61.5);
    $pdf->Cell(30,8,"12 85 85 63 66 ",0,0,'L');

$pdf->AddPage('L');
$pdf->Image($location."4.jpg",0,0,300);


$pdf->Output("index.pdf",'I');
<?php 


require('./fpdf/fpdf.php');
include_once("config.php");

$iddoc=$_POST["iddoc"];
$idus=$_POST["idus"];
$date=date('j F Y');
$time =date("H:i a");
$sql = mysqli_query($conn,"select * from `users` where `IDusers`='$iddoc'");
$row = mysqli_fetch_assoc($sql);

function default_header($pdf,$row,$date){
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(80,10,"Dr. ".$row['name']." ".$row['surname']."",0,0,'L');
    $pdf->Cell(110,10,"$date",0,0,'R');
    $pdf->Ln(7);
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,8,"Dentist",0,0,'L');
    
    $pdf->Ln(5);
    $pdf->Cell(16,8,"Newyork, United States",0,0,'L');

    $pdf->Ln(20);
}

function default_signature($pdf,$row){
    $pdf->Ln(20);
    $pdf->SetFont('Arial','',13);
    $pdf->Cell(145,10,"",0,0,'R');
    $pdf->Cell(1,10,"( Dr. ".$row['name']." ".$row['surname']." )",0,0,'C');
    $pdf->Cell(5,20,"Signature",0,0,'C');
    $pdf->Ln(7);

}

function showImg($file){
    $file_size=$file['size'];
    $file_name=explode(".", $file['name']);
    $file_tmp=$file['tmp_name'];
    $ext = end($file_name);
    $data = file_get_contents($file_tmp);
    $base64 = base64_encode($data);
    $pic = 'data://text/plain;base64,'. $base64;
    return [$pic,$ext];
}

function img_header($pdf){
    $header = showImg($_FILES["header"]);
    $pdf->setXY(0,0);
    $pdf->Cell( 0, 0, $pdf->Image($header[0], $pdf->GetX(), $pdf->GetY(), 206,40,$header[1]), 0, 0, 'L', false );
    $pdf->Ln(50);
}

function img_signature($pdf){
    $signature = showImg($_FILES["signature"]);
    $pdf->Ln(20);
    $pdf->Cell(135,10,"",0,0,'R');
    $pdf->Cell( 40, 20, $pdf->Image($signature[0], $pdf->GetX(), $pdf->GetY(), 60,50,$signature[1]), 0, 0, 'R', false );
    $pdf->Ln(7);
}

function validateForm($form){
    $form = json_decode($form);
    $obj = array();


    if (!is_array($form->name)) {
        array_push($obj, array(
            "name" => iconv('UTF-8', 'windows-1252', $form->name),
            "qty" => $form->qty,
            "days" => $form->days,
            "time" => (!is_array($form->{"time[0]"})) ? array($form->{"time[0]"}):$form->{"time[0]"},
        ));
    }else{
        foreach ($form->name as $key => $value) {
            array_push($obj, array(
                "name" => iconv('UTF-8', 'windows-1252', $value),
                "qty" => $form->qty[$key],
                "days" => $form->days[$key],
                "time" => (!is_array($form->{"time[".$key."]"})) ? array($form->{"time[".$key."]"}):$form->{"time[".$key."]"},
            ));
        }
    }

    return $obj;
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

$pdf->setXY(10,10);

    if (isset($_POST["header_default"]) && $_POST["header_default"] === "YES") {
        default_header($pdf,$row,$date);
    }else{
        img_header($pdf);
    }

$pdf->SetFont('Arial','B',12);
	        
    $pdf->Cell(16,10,"No.",1,0,'C');
    $pdf->Cell(60,10,"NAME",1,0,'C');
    $pdf->Cell(25,10,"QTY",1,0,'C');
    $pdf->Cell(25,10,"DAYS",1,0,'C'); 
    $pdf->Cell(60,10,"TIME",1,0,'C');
    $pdf->Ln();


    $pdf->SetFont('Arial','',10);

        if (isset($_POST["formData"])) {
            $validateForm = validateForm($_POST["formData"]);
           
            foreach ($validateForm as $key => $value) {
                $pdf->Cell(16,5,($key+1),1,0,'C');
                $pdf->Cell(60,5,$value['name'],1,0,'L');
                $pdf->Cell(25,5,$value['qty'],1,0,'C');
                $pdf->Cell(25,5,$value['days'],1,0,'C'); 
                $pdf->Cell(60,5,implode(", ", $value['time']),1,0,'C');
                
            $pdf->Ln();
            }

        }else{
            $pdf->Ln();
            $pdf->Cell(184,8,"No data available.",1,0,'C');
            
        }

        if (isset($_POST["signature_default"]) && $_POST["signature_default"] === "YES") {
            default_signature($pdf,$row);
        }else{
            img_signature($pdf);
        }


//This file name, make it dynamic and send to db.
$fileNewName = uniqid('',false).".pdf";
$fileDestination = 'prescription/'.$fileNewName;


$sqql = "INSERT INTO `prescriptions`(`date`, `idus`, `iddoc`, `file` , `time`) VALUES ('$date','$idus','$iddoc','$fileDestination','$time')";
$result = mysqli_query($conn, $sqql);



// $pdf->Output();
$pdf->Output($fileDestination,'F'); 




  
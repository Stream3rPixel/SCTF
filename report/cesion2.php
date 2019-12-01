<?php
date_default_timezone_set('America/Cancun');

setlocale(LC_TIME, 'es_MX.UTF-8');

include "core/controller/Core.php";
include "core/controller/Database.php";
include "core/controller/Executor.php";
include "core/controller/Model.php";

include "core/app/model/PacientData.php";
include "fpdf/fpdf.php";

session_start();

$pacient = PacientData::getById($_GET["id"]);

$pdf = new FPDF($orientation='P');

$pdf->AddPage();
$pdf->SetFont('Arial','B',8);    //Letra Arial, negrita (Bold), tam. 20
//$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);

//$pdf->SetFont('DejaVu','',8);

// $textypos = 11+$plusforimage;
$pdf->setY(2);
$pdf->setX(10);
$pdf->SetFont('Arial','B',20);    //Letra Arial, negrita (Bold), tam. 20
$pdf->Cell(5,20,strtoupper("SISTEMA DE CITAS DE TERAPIA FISICA"));
$pdf->SetFont('Arial','B',14);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(2);
$pdf->setX(10);
$pdf->Cell(5,40,'UNIVERSIDAD POLITECNICA DE BACALAR' );
$pdf->SetFont('Arial','B',12);    //Letra Arial, negrita (Bold), tam. 20

$pdf->setY(2);
$pdf->setX(10);
$pdf->Cell(5,76,'DATOS:' );

$pdf->setY(2);
$pdf->setX(10);
$pdf->Cell(5,100,'NOMBRE: '.strtoupper($pacient->name." ".$pacient->lastname) );
$pdf->setY(2);
$pdf->setX(10);
$pdf->Cell(5,100+15,'DIRECCIÓN: '.strtoupper($pacient->address) );

$pdf->setY(2);
$pdf->setX(10);
$pdf->Cell(5,100+30,'CÓDIGO POSTAL: '.strtoupper($pacient->cp)."               MUNICIPIO: ".strtoupper($pacient->pob) );

$pdf->setY(2);
$pdf->setX(10);
$pdf->Cell(5,100+45,'FECHA DE NACIMIENTO: '.date("d/m/Y",strtotime($pacient->day_of_birth))."               CURP: ".$pacient->no );

$pdf->setY(2);
$pdf->setX(10);
$pdf->Cell(5,100+60,'TELÉFONO MOVIL: '.strtoupper($pacient->phone) );

$pdf->setY(2);
$pdf->setX(10);
$pdf->Cell(5,100+75,'CORREO ELECTRONICO : '.strtoupper($pacient->email) );


$pdf->setY(2);
$pdf->setX(10);
$pdf->Cell(5,110+110,'Acepto que la Universidad Politecnica de Bacalar registre mis datos de caracter personal' );

$pdf->setY(2);
$pdf->setX(10);
$pdf->Cell(5,110+120,'para el tratamiento y seguimiento de salud, asi mismo doy el consentimiento' );

$pdf->setY(2);
$pdf->setX(10);
$pdf->Cell(5,110+130,'para que me puedan informar sobre productos y servicios que puedan ser de mi interes.' );

$pdf->setY(140);
$pdf->setX(10);
$pdf->Cell(5,0,'FIRMADO EL DIA __ / __ / ____  POR __________________________________________________.' );



$pdf->output();

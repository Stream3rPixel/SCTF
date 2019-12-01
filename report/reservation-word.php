<?php
setlocale(LC_CTYPE, 'es_MX');
include "../core/autoload.php";
include "../core/app/model/ReservationData.php";
include "../core/app/model/PacientData.php";
include "../core/app/model/MedicData.php";
include "../core/app/model/StatusData.php";
include "../core/app/model/PaymentData.php";
session_start();

require_once '../PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

Autoloader::register();

$word = new  PhpOffice\PhpWord\PhpWord();

$reservation = ReservationData::getById($_GET["id"]);
$pacient = $reservation->getPacient();
$medic = $reservation->getMedic();

$section1 = $word->AddSection();

$section1->addText("UNIVERSIDAD POLITÉCNICA DE BACALAR", array('bold' => true, "size"=>20), array('align' => 'center'));
$section1->addText("SISTEMA DE CITAS DE TERAPIA FÍSICA", array('bold' => true, "size"=>20), array('align' => 'center'));

$section1->addText("REPORTE DE CITA MEDICA", array('bold' => true, "size"=>18), array('align' => 'center'));



$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40);

$table1 = $section1->addTable("table1");
$table1->addRow();
$table1->addCell(4000)->addText("Folio",array("bold"=>true));
$table1->addCell(8000)->addText($reservation->no);
$table1->addRow();
$table1->addCell(4000)->addText("Servicio",array("bold"=>true));
$table1->addCell(8000)->addText($reservation->title);
$table1->addRow();
$table1->addCell()->addText("Paciente",array("bold"=>true));
$table1->addCell()->addText($pacient->name." ".$pacient->lastname);
$table1->addRow();
$table1->addCell()->addText("Fisioterapeuta",array("bold"=>true));
$table1->addCell()->addText($medic->name." ".$medic->lastname);
$table1->addRow();
$table1->addCell()->addText("Fecha y hora de la cita",array("bold"=>true));
$table1->addCell()->addText($reservation->date_at." - ".$reservation->time_at);

$table1->addRow();
$table1->addCell(4000)->addText("Diagnóstico",array("bold"=>true));
$table1->addCell(8000)->addText($reservation->note);
$table1->addRow();

$table1->addCell(4000)->addText("Tratamiento",array("bold"=>true));
$table1->addCell(8000)->addText($reservation->symtoms);
$table1->addRow();

$table1->addCell(4000)->addText("Observaciones",array("bold"=>true));
$table1->addCell(8000)->addText($reservation->sick);
$table1->addRow();

$table1->addCell(4000)->addText("Nota",array("bold"=>true));
$table1->addCell(8000)->addText($reservation->medicaments);

$table1->addRow();
$table1->addCell()->addText("Estado e la cita",array("bold"=>true));
$table1->addCell()->addText($reservation->getStatus()->name);
$table1->addRow();
$table1->addCell()->addText("Pago",array("bold"=>true));
$table1->addCell()->addText($reservation->getPayment()->name);


$word->addTableStyle('table1', $styleTable);

$section1->addText("", array());
$section1->addField('DATE', array('dateformat' => 'dd/MM/yyyy'), array());

$filename = "ReportCita-".time().".docx";

$word->save($filename,"Word2007");

header("Content-Disposition: attachment; filename='$filename'");
readfile($filename); // or echo file_get_contents($filename);
unlink($filename);  // remove temp file
?>
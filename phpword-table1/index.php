<?php
require_once 'vendor/autoload.php';

$word = new \PhpOffice\PhpWord\PhpWord();

$section1 = $word->AddSection();
$section1->addText("TABLA EN WORD",array("size"=>22,"bold"=>true,"align"=>"right")); // Agregamos un titulo al documento con tamaño 22 y en negritas

$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40); // el borde de la tabla de 6px, color de borde = #888 , ...
$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
$word->addTableStyle('table1', $styleTable,$styleFirstRow);

$table1 = $section1->addTable("table1"); // creamos la tabla
$table1->addRow(); // agregamos una fila a la tabla
$table1->addCell()->addText("Nombre"); // agregamos la columna 1
$table1->addCell()->addText("Dirección"); // agregamos la columna 2
$table1->addCell()->addText("Email"); // agregamos la columna 3
$table1->addCell()->addText("Teléfono"); // agregamos la columna 4

$table1->addRow(); // agregamos otra fila pra los datos
$table1->addCell()->addText(""); // fila 2, columna 1, debe coincidir con la columna de la fila anterior
$table1->addCell()->addText(""); // fila 2, columna 2, debe coincidir con la columna de la fila anterior
$table1->addCell()->addText(""); // fila 2, columna 3, debe coincidir con la columna de la fila anterior
$table1->addCell()->addText(""); // fila 2, columna 4, debe coincidir con la columna de la fila anterior

$table1->addRow();
$table1->addCell()->addText("");
$table1->addCell()->addText("");
$table1->addCell()->addText("");
$table1->addCell()->addText("");

$table1->addRow();
$table1->addCell()->addText("HH");
$table1->addCell()->addText("");
$table1->addCell()->addText("HH");
$table1->addCell()->addText("");

$filename = "myfile.docx";
$word->save($filename,"Word2007");

header("Content-Disposition: attachment; filename=$filename");
readfile($filename); 
unlink($filename); 
?>
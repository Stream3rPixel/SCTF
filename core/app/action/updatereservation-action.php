<?php

if(count($_POST)>0){
	$user = ReservationData::getById($_POST["id"]);
	$user->no = $_POST["no"];
	$user->title = $_POST["title"];
	$user->pacient_id = $_POST["pacient_id"];
	$user->medic_id = $_POST["medic_id"];
	$user->date_at = $_POST["date_at"];
	$user->time_at = $_POST["time_at"];
	$user->note = $_POST["note"];

	$user->status_id = $_POST["status_id"];
	$user->payment_id = $_POST["payment_id"];
	$user->price = $_POST["price"];
	$user->sick = $_POST["sick"];
	$user->symtoms = $_POST["symtoms"];
	$user->medicaments = $_POST["medicaments"];

	$user->update();

Core::alert("Actualizado exitosamente!");

if(isset($_SESSION["medic_id"])){
print "<script>window.location='index.php?view=medicreservations';</script>";

}else if(isset($_SESSION["user_id"])){
print "<script>window.location='index.php?view=CitasHome';</script>";

}



}


?>
<?php

if(count($_POST)>0){
	$user = new MedicData();

	$img = new Upload($_FILES["image"]);
	if($img->uploaded){
		$img->Process("storage/");
		if($img->processed){
			$user->image=$img->file_dst_name;
		}
	}


	$category_id = "NULL";
	if($_POST["category_id"]!=""){ $category_id = $_POST["category_id"]; }
	$user->no = $_POST["no"];
	$user->name = $_POST["name"];
	$user->category_id = $category_id;
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
$data = array(1=>"Lunes",2=>"Martes",3=>"Miercoles",4=>"Jueves",5=>"Viernes");
foreach($data as $k=>$v){
	$dx[$k]["time_active"] = isset($_POST["time_active_".$k])?1:0;
	$dx[$k]["time1_start"] = $_POST["time1_start_".$k];
	$dx[$k]["time1_finish"] = $_POST["time1_finish_".$k];
	$dx[$k]["duration"] = $_POST["duration_".$k];

}

$user->time1_data = htmlspecialchars(serialize($dx[1]));
$user->time2_data = htmlspecialchars(serialize($dx[2]));
$user->time3_data = htmlspecialchars(serialize($dx[3]));
$user->time4_data = htmlspecialchars(serialize($dx[4]));
$user->time5_data = htmlspecialchars(serialize($dx[5]));

//print_r(serialize($dx[7]));

	$user->password = $_POST["password"];
	$user->is_active = isset($_POST["is_active"])?1:0;

	$user->add();

print "<script>window.location='index.php?view=FisioHome';</script>";


}


?>
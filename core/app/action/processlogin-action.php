<?php

if (!isset($_SESSION["user_id"])) {
	$user = $_POST['username'];
	$pass = sha1(md5($_POST['password']));

	$base = new Database();
	$con = $base->connect();
	$sql = "select * from user where (email= \"" . $user . "\" or username= \"" . $user . "\") and password= \"" . $pass . "\" and is_active=1";
	$query = $con->query($sql);
	$found = false;
	$userid = null;
	while ($r = $query->fetch_array()) {
		$found = true;
		$userid = $r['id'];
	}

	if ($found == true) {
		$token= $userid;
		$_SESSION['user_id'] = $userid;
		$_SESSION['user_token'] = $token;
		setcookie("user_token", $token, time() + 24 * 3600);  
		setcookie("user_id", $userid, time() + 24 * 3600);  
		
		//print "Cargando...$user";
		print "<script>window.location='index.php?view=Inicio';</script>";
	} else {
		print "<script>window.location='index.php?view=login';</script>";
	}
} else {
	print "<script>window.location='index.php?view=Inicio';</script>";
}
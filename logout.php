<?php
// Inicializar la sesión.
// Si está usando session_name("start"), ¡no lo olvide ahora!

session_start();

// la tarea de este archivo es eliminar todo rastro de cookie
$is_pacient = false;
if(isset($_SESSION["pacient_id"])){ $is_pacient=true; }

	unset($_SESSION['user_id']); // Destruye una variable especificada
	unset($_SESSION['pacient_id']); // Destruye una variable especificada
	setcookie("user_id", "", time() - 24 * 3600);
	setcookie("user_token", "", time() - 24* 3600);  

session_destroy();
// Finalmente, destruir la sesión.
//estemos donde estemos nos redirije al index
if($is_pacient){
print "<script>window.location='./?view=pacientlogin';</script>";	
}
print "<script>window.location='./';</script>";
?>
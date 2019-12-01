<?php
// print_r($_POST);
if(isset($_SESSION["user_id"]) && !empty($_POST)){
foreach ($_POST as $p => $k) {
	ConfigurationData::updateValFromName($p,$k);
}
Core::redir("./?view=settings");
}else{
Core::redir("./");

}

?>
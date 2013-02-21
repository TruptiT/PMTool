<?php
include_once("header_files.php");

if ($_REQUEST["q"] == "user_registration"){
// 	$user = new User();
	$user_data = $user->user_registration($_POST);
}

?>
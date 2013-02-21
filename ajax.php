<?php
include_once('config.php');
include_once("/user/User.php");
session_start();

if ($_REQUEST["q"] == "user_registration"){
// 	$user = new User();
	$user_data = $user->user_registration($_POST);
}

if ($_REQUEST["q"] == "user_signin"){
	$user_signin_data = $user->user_signin($_POST["username"],$_POST["password"]);
	if($user_signin_data){
		echo "1";
	}else{
		echo "0";
	}
}
?>
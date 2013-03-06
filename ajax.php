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

if ($_REQUEST["q"] == "new_user_registration"){
	//print_r($_POST["username"]);
	$newuser_signin_data = $user->newuser_signin($_POST["username"],$_POST["password"],$_POST["email"],$_POST["role_id"]);
	if($newuser_signin_data){
		echo "1";
	}else{
		echo "0";
	}
}

if ($_REQUEST["q"] == "add_new_role"){
	$new_role = $user->add_new_role($_POST["new_title"]);
	if($new_role){
		echo "1";
	}else{
		echo "0";
	}
}

if ($_REQUEST["q"] == "edit_user_info"){
	$edited_user_data = $user->edit_company_user($_REQUEST["id"],$_POST["username"],$_POST["password"],$_POST["email"],$_POST["role_id"]);
	if($edited_user_data){
		echo "1";
	}else{
		echo "0";
	}
}

if ($_REQUEST["q"] == "delete_user"){
	$delete_user_data = $user->delete_company_user($_REQUEST["id"]);
	if($delete_user_data){
		echo "1";
	}else{
		echo "0";
	}
}

?>
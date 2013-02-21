<?php
class User{
	
	//Created By: Trupti Tumsare
	//Created Date: 19/02/2013
	//Purpose: This method is used for user registration process.	
	
	function user_registration($data){
		$password = md5($data["User"]["password"]);
		$name = $data["User"]["username"];
		$email = $data["User"]["email"];
		$company_name =  $data["Company"]["name"];
		$company_email =  $data["Company"]["email"];
		$company_address =  $data["Company"]["address"];
		$company_phone =  $data["Company"]["phone"];	
		$company_mobile =  $data["Company"]["mobile"];
		$check_user = mysql_query("SELECT * FROM users where name='$name' and password = '$password'") or die(mysql_error());
		if(mysql_num_rows($check_user) != 0){
			echo "Sorry! User already exists";
		}else{
			$_SESSION["registration_done"] = true ;
			$company = mysql_query("Insert into companies(name,email,address,phone,mobile) values ('$company_name','$company_email','$company_address','$company_phone','$company_mobile')") or die(mysql_error());
			$q = mysql_query("SELECT * FROM `companies` ORDER BY created_at DESC LIMIT 1 ");
			$c = mysql_fetch_array($q);
			$result = mysql_query("Insert into users(name,email,password,company_id) values ('$name','$email','$password','$c[0]')") or die(mysql_error());
		}
	}

}
$user = new User();
?>

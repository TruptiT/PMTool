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

	function user_signin($username,$password){
		$password = md5($password);
		$query = mysql_query("SELECT * FROM users where name='$username' and password = '$password'") or die(mysql_error());
		$get_user = mysql_fetch_row($query);
		if(mysql_num_rows($query) == 0){
			$_SESSION["user"] = "";
			return false;
		}else{
			$_SESSION["user"] = $get_user ;
			return true;
		}
	}

	function newuser_signin($name, $password, $email,$role_id){
		$password = md5($password);
		$check_user = mysql_query("SELECT * FROM users where name='$name' and password = '$password'") or die(mysql_error());
		print_r(mysql_fetch_row($check_user));
		if(mysql_num_rows($check_user) != 0){
			echo "Sorry! User already exists";
			return false;
		}else{
			$_SESSION["newuser_registration_done"] = true ;
			$session_user = $_SESSION["user"];
			$result = mysql_query("Insert into users(name,email,password,user_role_id,company_id) values ('$name','$email','$password','$role_id','$session_user[6]')") or die(mysql_error());
			return true;
		}
	}

	function get_company(){
		$session_user = $_SESSION["user"];
		$q = mysql_query("SELECT * FROM `companies` where id = '$session_user[6]' ");
		$company_details = mysql_fetch_array($q);
		return $company_details;
	}

	function list_all_users(){
		$session_user = $_SESSION["user"];
		$q = mysql_query("SELECT * FROM `users` where company_id = '$session_user[6]' ");
		$users = array();
		$i = 0;
		while($result = mysql_fetch_array($q)){
			$users[$i] = $result;
			$i += 1;
		}
		return $users;
	}

	function add_new_role($title){
		$check_role = mysql_query("SELECT * FROM roles where title='$title'") or die(mysql_error());
		print_r(mysql_fetch_row($check_role));
		if(mysql_num_rows($check_role) != 0){
			echo "Sorry! Role already exists";
			return false;
		}else{
			$_SESSION["new_role"] = true ;
			$session_user = $_SESSION["user"];
			$result = mysql_query("Insert into roles(title) values ('$title')") or die(mysql_error());
			return true;
		}
	}

	function fetch_all_roles(){
		$q = mysql_query("Select title,id from roles") or die(mysql_error());
		$role_arr = array();
		$i = 0;
		while($result = mysql_fetch_array($q)){
			$role_arr[$i] = $result;
			$i += 1;
		}
		return $role_arr;
	}

	function fetch_user_details($user_id){
		$q = mysql_query("SELECT * FROM `users` where id = '$user_id' ");
		$user = mysql_fetch_array($q);
		$company_q = mysql_query("SELECT * FROM `companies` where id = '$user[company_id]' ") or die(mysql_error());
		$company_details = mysql_fetch_array($company_q);
		$role_q = mysql_query("SELECT * FROM `roles` where id = '$user[user_role_id]' ") or die(mysql_error());
		$role_details = mysql_fetch_array($role_q);
		$details = array_merge($company_details,$role_details);
		return $details;
	}

	function edit_company_user($user_id,$name, $password, $email,$role_id){
		$q = mysql_query("SELECT * FROM `users` where id = '$user_id' ");
		$existing_user = mysql_fetch_array($q);
		if(mysql_num_rows($q) != 0){
			if($existing_user["password"]==$password){
				$update_user = mysql_query("UPDATE users SET name='$name', email='$email' WHERE id = '$user_id' ") or die(mysql_error());
			}else{
				$new_password=md5($password);
				$update_user = mysql_query("UPDATE users SET name='$name', email='$email', password='$new_password' WHERE id = '$user_id' ") or die(mysql_error());
			}
			$_SESSION["edited_user"] = true ;
			return true;
		}else{
			return false;		
		}
	}

	function delete_company_user($user_id){
		$q = mysql_query("SELECT * FROM `users` where id = '$user_id' ");
		$existing_user = mysql_fetch_array($q);		
		if($existing_user){
			mysql_query("Delete FROM `users` where id = '$user_id' ") or die(mysql_error());
			return true;
		}else{
			return false;
		}
	}
}

$user = new User();
?>

<?php
include("header_files.php");
?>

<script type="text/javascript">
function Signin(formId){
	var flag = false;
	var user_name = $("#signin_user_name").val();	
	var user_password = $("#signin_user_password").val();			
	//your validation code
	if(user_name != "" && user_password != ""){
		flag = true;
		}else{
		if (user_name == "" && user_password == ""){
			$(".show_err").popover('show');
		}else if(user_name == ""){
			$("#user_name").popover('show');
		}else if(user_password == ""){
			$("#user_password").popover('show');
		}
		flag = false;
			}
	if(flag){	
		$.ajax( {
	        type: 'POST',
	        url: "ajax.php?q=user_signin",
	        data: $("#"+formId).serialize(), 
	        success: function(response) {
	            if(response==0){
	            	alert("Invalid Username");
	                }else{
	                	location.href =response;
	                    } 
	        }
	    });
				return flag;
		}else{
			return flag;
			}

}

</script>
<div id="sign_in_modal" class="modal hide fade" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
	style="width: 500px;">
	<form class="form-signin" style="padding-left: 20px;" method="post"
		id="signin">
		<h2 class="form-signin-heading modal-header">Please sign in</h2>
		<div style="width: 200px;" class="modal-body">
			<input type="text" name="username" id="signin_user_name" class="input-block-level show_err" placeholder="Email address" data-content="Please enter userneame." data-placement="bottom"><br />
			<input type="password" name="password" id="signin_user_password" class="input-block-level show_err" placeholder="Password" data-content="Please enter password." data-placement="bottom"> <label
				class="checkbox"><input type="checkbox" value="remember-me">
				Remember me </label>
			<button class="btn btn-large btn-primary" type="button"
				onclick="Signin('signin');">Sign in</button>
		</div>
	</form>
</div>

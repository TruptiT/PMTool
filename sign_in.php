<?php
include("header_files.php");
?>

<script type="text/javascript">
function Signin(formId){
	$.ajax( {
        type: 'POST',
        url: "ajax.php?q=user_signin",
        data: $("#"+formId).serialize(), 
        success: function(response) {
            if(response==1){
            	location.href =<?php echo APP_ROOT?>+"user/user_dashboard.php";
                }else{
				alert("Invalid Username");
                    } 
        }
    });

}

</script>
<div id="sign_in_modal" class="modal hide fade" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
	style="width: 300px;">
	<form class="form-signin" style="padding-left: 20px;" method="post"
		id="signin">
		<h2 class="form-signin-heading modal-header">Please sign in</h2>
		<div style="width: 250px;" class="modal-body">
			<input type="text" name="username" id="user_name"
				class="input-block-level" placeholder="Email address"><br /> <input
				type="password" name="password" id="user_password"
				class="input-block-level" placeholder="Password"> <label
				class="checkbox"><input type="checkbox" value="remember-me">
				Remember me </label>
			<button class="btn btn-large btn-primary" type="button"
				onclick="Signin('signin');">Sign in</button>
		</div>
	</form>
</div>

<?php
include("../header_files.php");
$get_all_roles = $user->fetch_all_roles();
?>

<script type="text/javascript">

$(document).ready(function()
		{
		var options = {
	        success: function(res) {
	        	if(res==1){
		            location.href ="user_dashboard.php";
	        	 }else{
					$("#mesg").html("");
	                    }
	        }
	   	 };
		    $('#newuser_reg').on('submit', function(e)
		    {
		        e.preventDefault();
		        if(processForm('newuser_reg')){
		        $(this).ajaxSubmit(options);
		        }
		    });
		});

function processForm(formId) { 
	var flag = false;
	var user_name = $("#username").val();	
	var user_email = $("#useremail").val();	
	var user_password = $("#userpassword").val();	
	var user_confirm_pass = $("#user_confirmpass").val();
	var role_id = $("#role_id").val();	
	//your validation code
	//alert(role_id);
	if(user_name != "" && user_email != "" && user_password != "" && user_confirm_pass != "" && role_id != "0" ){
		flag = true;
		}else{
		if (user_name == "" && user_email == "" && user_password == "" && user_confirm_pass == "" && role_id == "0"  ){
			$(".show_err").popover('show');
		}else if(user_name == ""){
			$("#username").popover('show');
		}else if(user_email == ""){
			$("#useremail").popover('show');
		}else if(user_password == ""){
			$("#userpassword").popover('show');
		}else if(user_confirm_pass == ""){
			$("#user_confirmpass").popover('show');
		}else if(role_id=="0"){
			$("#role_id").popover('show');
			}
		flag = false;
			}
	return flag;

	}

</script>
<div id="newuser_sign_up_modal" class="modal hide fade" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
	style="width: auto; height: auto;">

	<form class="navbar-form pull-left" method="POST" id="newuser_reg"
		enctype="multipart/form-data"
		action="../ajax.php?q=new_user_registration">
		<h2 class="form-signin-heading modal-header">Please Register</h2>


		<div class="modal-body" style="width: 650px; height: auto;">
			<div class="container-fluid">
				<div style="text-align: center; color: red;" id="mesg"></div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Name:</label>
					</div>
					<div class="span8">
						<input type="text" name="username" id="username" class="show_err"
							placeholder="Username.." data-content="Please enter userneame." />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Email:</label>
					</div>
					<div class="span8">
						<input type="text" name="email" id="useremail" class="show_err"
							placeholder="Email address.." data-content="Please enter email." />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Password:</label>
					</div>
					<div class="span8">
						<input type="password" name="password" id="userpassword"
							class="show_err" placeholder="Password.."
							data-content="Please enter Password." />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Confirm Password:</label>
					</div>
					<div class="span8">
						<input type="password" name="confirm_password" class="show_err"
							id="user_confirmpass" placeholder="Retype Password.."
							data-content="Please retype confirm password." />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Assign Role:</label>
					</div>
					<div class="span8">
						<select name="role_id" id="role_id"
							data-content="Please select the role." class="show_err">
							<option value="0">Please Select..</option>
							<?php foreach ($get_all_roles as $role) : ?>
							<option value="<?php echo $role['id'] ?>">
								<?php echo $role['title'] ?>
							</option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
<!-- 				<div class="row-fluid"> -->
<!-- 					<div class="span4"> -->
<!-- 						<label class="checkbox">Upload an Image:</label> -->
<!-- 					</div> -->
<!-- 					<div class="span8"> -->
<!-- 						<input type="file" name="image" id="avatar"> -->
<!-- 					</div> -->
<!-- 				</div> -->
			</div>
		</div>

		<div class="modal-footer" style="text-align: center;">
			<button type="submit" class="btn" id="uploadButton" name="reg_submit">Submit</button>
		</div>

	</form>
</div>


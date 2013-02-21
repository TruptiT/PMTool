<?php
include("header_files.php");
?>

<script type="text/javascript">
function processForm(formId) { 
	var flag = false;
	var user_name = $("#user_name").val();	
	var user_email = $("#user_email").val();	
	var user_password = $("#user_password").val();	
	var user_confirm_pass = $("#user_confirm_pass").val();
	var company_name = $("#company_name").val();
	var company_email = $("#company_email").val();
	var company_address = $("#company_address").val();
	var company_phone = $("#company_phone").val();
	var company_mob_phone = $("#company_mob_phone").val();		
	//your validation code
	if(user_name != "" && user_email != "" && user_password != "" && user_confirm_pass != "" && company_name != "" && company_email !="" && company_address != "" && company_phone != "" && company_mob_phone != "" ){
		flag = true;
		}else{
		if (user_name == "" && user_email == "" && user_password == "" && user_confirm_pass == "" && company_name == "" && company_email =="" && company_address == "" && company_phone == "" && company_mob_phone == "" ){
			$(".show_err").popover('show');
		}else if(user_name == ""){
			$("#user_name").popover('show');
		}else if(user_email == ""){
			$("#user_email").popover('show');
		}else if(user_password == ""){
			$("#user_password").popover('show');
		}else if(user_confirm_pass == ""){
			$("#user_confirm_pass").popover('show');
		}else if(company_name == ""){
			$("#company_name").popover('show');
		}else if(company_email == ""){
			$("#company_email").popover('show');
		}else if(company_address == ""){
			$("#company_address").popover('show');
		}else if(company_phone == ""){
			$("#company_phone").popover('show');
		}else if(company_mob_phone == ""){
			$("#company_mob_phone").popover('show');
		}
		flag = false;
			}
	if(flag){
		$.ajax( {
	        type: 'POST',
	        url: "ajax.php?q=user_registration",
	        data: $("#"+formId).serialize(), 
	        success: function(data) {
	            location.href ="index.php";
	            
	        }
	    } );
			return flag;
		}else{
			return flag;
			}

	}

</script>
<div id="sign_up_modal" class="modal hide fade" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
	style="width: auto; height: auto;">

	<form class="navbar-form pull-left" method="POST" id="reg">
		<h2 class="form-signin-heading modal-header">Please Register</h2>
		<div id="messages"></div>

		<div class="modal-body" style="width: 650px; height: auto;">
			<div class="container-fluid">
				<h3 class="modal-header">Personal Details</h3>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Name:</label>
					</div>
					<div class="span8">
						<input type="text" name="User[username]" id="user_name"
							class="show_err" placeholder="Username.."
							data-content="Please enter userneame." />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Email:</label>
					</div>
					<div class="span8">
						<input type="text" name="User[email]" id="user_email"
							class="show_err" placeholder="Email address.."
							data-content="Please enter email." />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Password:</label>
					</div>
					<div class="span8">
						<input type="password" name="User[password]" id="user_password"
							class="show_err" placeholder="Password.."
							data-content="Please enter Password." />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Confirm Password:</label>
					</div>
					<div class="span8">
						<input type="password" name="User[confirm_password]"
							class="show_err" id="user_confirm_pass"
							placeholder="Retype Password.."
							data-content="Please retype confirm password." />
					</div>
				</div>

				<h3 class="modal-header">Company Details</h3>

				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Company Name:</label>
					</div>
					<div class="span8">
						<input type="text" name="Company[name]" id="company_name"
							class="show_err" placeholder="Enter Company name.."
							data-content="Please enter Company name." />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Company Email:</label>
					</div>
					<div class="span8">
						<input type="text" name="Company[email]" id="company_email"
							class="show_err" placeholder="Enter Company email.."
							data-content="Please enter Company email." />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Company Address :</label>
					</div>
					<div class="span8">
						<input type="text" name="Company[address]" id="company_address"
							class="show_err" placeholder="Enter Company address.."
							data-content="Please enter Company Address." />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Company Phone:</label>
					</div>
					<div class="span8">
						<input type="text" name="Company[phone]" id="company_phone"
							class="show_err" placeholder="Enter Company phone.."
							data-content="Please enter Company Phone." />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Company Mobile :</label>
					</div>
					<div class="span8">
						<input type="text" name="Company[mobile]" id="company_mob_phone"
							class="show_err" placeholder="Enter Company mobile.."
							data-content="Please enter Company mobile number." />
					</div>
				</div>
			</div>
		</div>

		<div class="modal-footer" style="text-align: center;">
			<button type="button" class="btn" name="reg_submit"
				onclick="processForm('reg');">Submit</button>
		</div>

	</form>
</div>

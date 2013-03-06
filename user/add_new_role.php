<?php
include("../header_files.php");
?>

<script type="text/javascript">
function validate_role(formId) { 
	
	var flag = false;
	var role_title = $("#new_title").val();	
	if(role_title != "" ){
		flag = true;
		}else{
		if (role_title == ""){
			$("#new_title").popover('show');
		}
		flag = false;
			}
	if(flag){
		$.ajax( {
	        type: 'POST',
	        url: "../ajax.php?q=add_new_role",
	        data: $("#"+formId).serialize(), 
	        success: function(res) {
	        	if(res==1){ 	
		            location.href ="user_dashboard.php";
	        	 }else{
					$("#role_mesg").html("Sorry! Try again....");
	                    }
	        }
	    } );
			return flag;
		}else{
			return flag;
			}

	}

</script>
<div id="add_new_role" class="modal hide fade" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
	style="width: auto; height: auto;">

	<form class="navbar-form pull-left" method="POST" id="new_role">
		<div class="modal-body" style="width: 650px; height: auto;">
			<div class="container-fluid">
				<div style="text-align: center; color: red;" id="role_mesg"></div>
				<div class="row-fluid">
					<div class="span4">
						<label class="checkbox">Role name:</label>
					</div>
					<div class="span8">
						<input type="text" name="new_title" id="new_title" class="show_err"
							placeholder="Enter role title..." data-content="Please enter Title." />
					</div>
				</div>
			</div>
		</div>

		<div class="modal-footer" style="text-align: center;">
			<button type="button" class="btn" name="role_submit"
				onclick="validate_role('new_role');">Save</button>
		</div>
	</form>
</div>

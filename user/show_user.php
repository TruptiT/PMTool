<?php 
include_once("User.php");
include_once('../config.php');
$user_id= $_GET["id"];
$q = mysql_query("SELECT * FROM `users` where id = '$user_id' ");
$single_user = mysql_fetch_array($q);
$user_details = $user->fetch_user_details($_GET["id"]);
$get_all_roles = $user->fetch_all_roles();
session_start();
?>

<script type="text/javascript">
$(function() {
	disable_edit_form();

	$("ul.nav-pills li").click(function(e) {
		  $("li").removeClass("active");
		  $(this).addClass("active");
		});
	});
	
function disable_edit_form(){
	$('#edit_user :input').attr('readonly','readonly');
	$("#edited_role_id option").not(":selected").attr("disabled", "disabled");
	$('#edit_user :input').css('background-color','white');
	$("#show").attr('class','active');
	$("#edit_save").hide();
}

function enable_edit_form(){
	$('#edit_user :input').removeAttr("readonly");
	$("#edited_role_id option").not(":selected").removeAttr("disabled");
	$('#edit_user :input').css('background-color','white');
	$("#edit_save").show();
}

function show_delete_form(){
	$(".span9").load("delete_user.php?id="+<?php echo $single_user["id"] ?>);
}
function validate_edit_info(formId) { 
	var flag = false;
	var user_name = $("#edited_username").val();	
	var user_email = $("#edited_useremail").val();	
	var user_password = $("#edited_userpassword").val();	
	var role_id = $("#edited_role_id").val();	
	//your validation code
	//alert(role_id);
	if(user_name != "" && user_email != "" && user_password != "" && role_id != "0" ){
		flag = true;
		}else{
		if (user_name == "" && user_email == "" && user_password == "" && role_id == "0"  ){
			$(".edited_show_err").popover('show');
		}else if(user_name == ""){
			$("#edited_username").popover('show');
		}else if(user_email == ""){
			$("#edited_useremail").popover('show');
		}else if(user_password == ""){
			$("#edited_userpassword").popover('show');
		}else if(role_id=="0"){
			$("#edited_role_id").popover('show');
			}
		flag = false;
			}
	if(flag){
		$.ajax( {
	        type: 'POST',
	        url: "../ajax.php?q=edit_user_info&id=<?php echo $single_user["id"] ?>",
	        data: $("#"+formId).serialize(), 
	        success: function(res) {
	        	if(res==1){
	        		$(".span9").load("show_user.php?id="+<?php echo $_REQUEST["id"]?>);
	        	 }else{
					$("#mesg").html("Sorry! User already exists");
	                    }
	        }
	    } );
			return flag;
		}else{
			return flag;
			}

	}

</script>
<div class="hero-unit"
	style="height: 294px;" id="<?php echo $single_user["id"] ?>">

	<!-- Show success messages -->
	<?php if(isset($_SESSION["edited_user"]) && $_SESSION["edited_user"]) :?>
	<div class="alert alert-success">
		<a href="javascript:void(0);" onclick="$('.alert-success').hide();"
			class="close" data-dismiss="alert">&times;</a> User saved
		successfully!!!
	</div>
	<?php 
	unset($_SESSION["edited_user"]);
	endif;
	?>
	<ul class="nav nav-pills">
		<li id="show"><a href="javascript:void(0);"
			onclick="disable_edit_form()">Show &raquo;</a>
		</li>
		<li><a href="javascript:void(0);" onclick="enable_edit_form()">Edit
				&raquo;</a>
		</li>
		<li><a href="javascript:void(0);" onclick="show_delete_form()">Delete
				&raquo;</a>
		</li>
	</ul>
	<form class="navbar-form pull-left" method="POST" id="edit_user">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span4">
					<label class="checkbox">Name:</label>
				</div>
				<div class="span8">
					<input type="text" name="username" id="edited_username"
						class="edited_show_err" placeholder="Username.."
						data-content="Please enter userneame."
						value="<?php echo $single_user["name"] ?>" />
				</div>
			</div>

			<div class="row-fluid">
				<div class="span4">
					<label class="checkbox">Email:</label>
				</div>
				<div class="span8">
					<input type="text" name="email" id="edited_useremail"
						class="edited_show_err" placeholder="Email address.."
						value="<?php echo $single_user["email"] ?>"
						data-content="Please enter email." />
				</div>
			</div>

			<div class="row-fluid">
				<div class="span4">
					<label class="checkbox">Password:</label>
				</div>
				<div class="span8">
					<input type="password" name="password" id="edited_userpassword"
						class="edited_show_err" placeholder="Password.."
						value="<?php echo $single_user["password"] ?>"
						data-content="Please enter Password." />
				</div>
			</div>

			<div class="row-fluid">
				<div class="span4">
					<label class="checkbox">Assigned Role:</label>
				</div>
				<div class="span8">
					<select name="role_id" id="edited_role_id"
						data-content="Please select the role." class="edited_show_err">
						<option value="0">Please Select..</option>
						<?php foreach ($get_all_roles as $role) :
						$selected = ($single_user["user_role_id"] == $role['id']) ? 'selected' : '';
						echo "<option value=\"".$role['id']."\" {$selected} >".$role['title']."</option>";
						endforeach;
						?>
					</select>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span4"></div>
				<div class="span8">
					<button type="button" class="btn" name="reg_submit" id="edit_save"
						onclick="validate_edit_info('edit_user');">Save</button>
				</div>
			</div>
		</div>
	</form>
</div>








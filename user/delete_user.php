
<?php 
include_once("User.php");
include_once('../config.php');
$user_id= $_GET["id"];
$q = mysql_query("SELECT * FROM `users` where id = '$user_id' ");
$single_user = mysql_fetch_array($q);
session_start();
?>
<script type="text/javascript">
function delete_user(opt){
	if(opt=="yes"){
	$.ajax( {
        type: 'POST',
        url: "../ajax.php?q=delete_user&id=<?php echo $single_user["id"] ?>",
        success: function(res) {
        	if(res==1){
        		 location.href ="index.php";
        	 }else{
				$("#mesg").html("Sorry! User does not exists");
                    }
        }
    } );
	}else{
		$(".span9").load("show_user.php?id="+<?php echo $_REQUEST["id"]?>);
		}
}
</script>
<div class="hero-unit" style="height: 294px; width: 300px;"
	id="<?php echo $single_user["id"] ?>">
	<span id="mesg"></span>
	<form class="navbar-form pull-left" method="POST" id="delete_user">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12" style="text-align: center;">
					<label class="checkbox"><b>Are you sure you want to delete an user?</b>
					</label>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12" style="text-align: center;"></div>
			</div>
			<div class="row-fluid">
				<div class="span12" style="text-align: center;">
					<img alt="delete.png" src="../assets/images/delete.png">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12" style="text-align: center;"></div>
			</div>
			<div class="row-fluid">
				<div class="span5" style="text-align: right;">
					<button type="button" class="btn btn-primary btn-large" name="yes"
						id="yes" onclick="delete_user('yes');">Yes</button>
				</div>
				<div class="span2"></div>
				<div class="span5">
					<button type="button" class="btn btn-primary btn-large" name="no"
						id="yes" onclick="delete_user('no');">No</button>
				</div>
			</div>
		</div>
	</form>
</div>

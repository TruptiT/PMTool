
<?php 
include_once('header_for_logged_in_users.php');
//include_once('show_user.php');
$all_users = $user->list_all_users();
?>
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script
	src="http://malsup.github.com/jquery.form.js"></script>
<script type="text/javascript">
function get_user(id){
	var loadPHP = "show_user.php?id="+id;
	$(".span9").html("");
	$.ajax({
	      success: function(){
	           $(".span9").append( $('<div/>').load(loadPHP));
	      }
	  });
}

</script>

<div class="container-fluid" style="padding-top: 50px;">
	<div class="row-fluid">
		<?php if (empty($all_users) != 1) :?>
		<div class="span3">
			<div class="well sidebar-nav">
				<ul class="nav nav-list">
					<li><h3>Select any user...</h3></li>
					<?php foreach ($all_users as $single_user) :?>
					<li><a href="javascript:void(0);"
						onclick="get_user(<?php echo $single_user["id"] ?>);"><?php echo $single_user["name"]?>
					</a></li>
					<?php endforeach;?>
				</ul>
			</div>
			<!--/.well -->
		</div>
		<?php else :?>
		<div class="alert alert-block"
			style="margin-top: 60px; margin-left: 90px; margin-right: 90px;">
			<strong>Sorry!!!</strong> Not a single user exists. Please create Users for your Comapany.
		</div>
		<?php endif;?>
		<!--/span-->
		<div class="span9"></div>

		<!--/span-->
	</div>
	<!--/row-->
</div>

<?php include_once('../footer.php') ?>

<?php 
include_once('header_for_logged_in_users.php');
//include_once('show_user.php');
$all_users = $user->list_all_users();
?>
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
		<!--/span-->
		<div class="span9"></div>

		<!--/span-->
	</div>
	<!--/row-->
</div>

<?php include_once('../footer.php') ?>
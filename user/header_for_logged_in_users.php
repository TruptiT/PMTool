<?php
include_once("../header_files.php");
include_once('../authorize.php');
include_once('new_user_signup.php');
include_once('add_new_role.php');
$company_details = $user->get_company();
?>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse"
				data-target=".nav-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="brand" href="#">Welcome <?php echo $company_details['name'] ?>!!!!!!!!!!!!!
			</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown">Role Management <b class="caret"></b>
					</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<li><a href="#add_new_role" role="button" data-toggle="modal">Add
									new role</a></li>
							<li><a href="#">List all Roles</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown">User Management <b class="caret"></b>
					</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<li><a href="#newuser_sign_up_modal" role="button"
								data-toggle="modal">Create new User</a></li>
							<li><a href="index.php">List all Users</a></li>
						</ul>
					</li>
				</ul>
				<div style="float: right;">
					<a href="<?php echo APP_ROOT ?>index.php?q=logout" role="button"
						class="btn">Log out</a> <span
						style="color: white; vertical-align: middle;"></span>
				</div>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>
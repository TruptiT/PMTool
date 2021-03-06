<?php
include_once("header_files.php");
?>

<?php if(isset($_SESSION["registration_done"]) && $_SESSION["registration_done"]) :?>
<div class="alert alert-success" style="margin-top: 60px;margin-left: 90px;margin-right: 90px;">
	<a href="javascript:void(0);" onclick="$('.alert-success').hide();" class="close" data-dismiss="alert">&times;</a>
	<strong>Well done!</strong> Your registration has been completed successfully!!!
</div>
<?php 
unset($_SESSION["registration_done"]);
endif; 
?>
<?php if(isset($_GET["q"]) && $_GET["q"] == "logout") {
	echo $_GET["q"];
	session_destroy();
	header("Location:index.php");
}
?>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse"
				data-target=".nav-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="brand" href="#">Project Management Tool</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li class="nav-header">Nav header</li>
							<li><a href="#">Separated link</a></li>
							<li><a href="#">One more separated link</a></li>
							</ul>
					</li>
				</ul>
				<div style="float: right;">
					<a href="#sign_in_modal" role="button" class="btn"
						data-toggle="modal">Sign in</a> <span
						style="color: white; vertical-align: middle;">Or</span> <a
						href="#sign_up_modal" role="button" class="btn"
						data-toggle="modal">Register</a>
				</div>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>

<div class="container">

	<!-- Main hero unit for a primary marketing message or call to action -->
	<div class="hero-unit">
		<h1>Hello, world!</h1>
		<p>This is a template for a simple marketing or informational website.
			It includes a large callout called the hero unit and three supporting
			pieces of content. Use it as a starting point to create something
			more unique.</p>
		<p>
			<a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a>
		</p>
	</div>

	<!-- Example row of columns -->
	<div class="row">
		<div class="span4">
			<h2>Heading</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus,
				tellus ac cursus commodo, tortor mauris condimentum nibh, ut
				fermentum massa justo sit amet risus. Etiam porta sem malesuada
				magna mollis euismod. Donec sed odio dui.</p>
			<p>
				<a class="btn" href="#">View details &raquo;</a>
			</p>
		</div>
		<div class="span4">
			<h2>Heading</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus,
				tellus ac cursus commodo, tortor mauris condimentum nibh, ut
				fermentum massa justo sit amet risus. Etiam porta sem malesuada
				magna mollis euismod. Donec sed odio dui.</p>
			<p>
				<a class="btn" href="#">View details &raquo;</a>
			</p>
		</div>
		<div class="span4">
			<h2>Heading</h2>
			<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in,
				egestas eget quam. Vestibulum id ligula porta felis euismod semper.
				Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum
				nibh, ut fermentum massa justo sit amet risus.</p>
			<p>
				<a class="btn" href="#">View details &raquo;</a>
			</p>
		</div>
	</div>
</div>
<!--/container -->

<?php include_once("footer.php"); ?>

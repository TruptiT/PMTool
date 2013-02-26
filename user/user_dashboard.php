<?php
include_once("../header_files.php");
include_once('../authorize.php');
$company_details = $user->get_company();
?>
<!--  Array ( [0] => 28 [1] => trupti [2] => trupti@fwfwe.com [3] => 202cb962ac59075b964b07152d234b70 [4] => 0 [5] => 0 [6] => 29 [7] => 2013-02-21 10:41:24 [8] => 0000-00-00 00:00:00 ) -->

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse"
				data-target=".nav-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="brand" href="#">Welcome <?php echo $company_details['name'] ?>!!!!!!!!!!!!!</a>
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
					<a href="<?php echo APP_ROOT ?>index.php?q=logout" role="button" class="btn">Log out</a>
					<span style="color: white; vertical-align: middle;"></span>
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
<!-- /container -->

<?php include_once("../footer.php"); ?>

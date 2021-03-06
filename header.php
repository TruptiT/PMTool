<?php include_once('config.php') ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PMTool</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<script src='<?= APP_ROOT.'assets/jquery/jquery-1.7.2.min.js' ?>'> </script>
   
<!-- Le styles -->
<link href='<?= APP_ROOT.'assets/bootstrap/css/bootstrap.css' ?>'
	rel="stylesheet">
<link href='<?= APP_ROOT.'assets/bootstrap/css/custom.css' ?>'
	rel="stylesheet">
<link
	href='<?= APP_ROOT.'assets/bootstrap/css/bootstrap-responsive.css' ?>'
	rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="./assets/bootstrap/js/html5shiv.js"></script>
    <![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="assets/bootstrap/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="assets/bootstrap/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="assets/bootstrap/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed"
	href="assets/bootstrap/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/bootstrap/ico/favicon.png">
</head>

<body>
	<?php session_start(); ?>
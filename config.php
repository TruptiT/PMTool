<?php 
define('APP_ROOT', '/PMTool/');
define('DB_HOST','localhost');
define('DB_NAME','project_management');
define('DB_USERNAME','root');
define('DB_PASSWORD','');

$con = mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD) or die(mysql_error());

$select_db = mysql_select_db(DB_NAME) or die(mysql_error());

?> 
<?php
if(!isset($_SESSION["user"])){
	header("Location:".APP_ROOT."index.php");	
}
?>
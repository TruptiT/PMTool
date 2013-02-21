<?php
include_once('../config.php');
class Project{

  private $table_name = 'project';
  
  function __construct(){
  	
  }
  
  //this method returns all rows from project table.
  function all() {
  	$query = mysql_query( "SELECT * FROM  projects");
  	$arr = array();
  	$i = 0;
  	while($result = mysql_fetch_array($query)){
  		$arr[$i] = $result;
  		$i += 1; 
  	}
  	return $arr;
  }
} 
$Project = new Project;

?>
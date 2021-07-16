<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// error_reporting(0);
$set =2; //1=localhost , 2 = server
if($set==1)
{
	
	$dbhost = 'localhost';
	$dbuser = 'axon';
	$dbpass = 'axondev';
	$dbname = 'axonsg_dev';
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die  ('Error connecting to mysql');
	
	// @mysql_select_db("$dbname") or die( "Unable to select database");
}
else
{
			
	$dbhost = 'localhost';
	// $dbuser = 'facility_ardmore';
	// $dbpass = '29zpTYRHgJV8';
	
	//for localhost
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'facility_ardmorepark';
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die  ('Error connecting to mysql');
	
	// @mysql_select_db("$dbname") or die( "Unable to select database");
} 

$scriptName = basename($_SERVER['SCRIPT_NAME']);
switch($scriptName){
	case 'login.php':
	break;

	case 'main.php':
	break;

	case 'index.php':
	break;
	
	default:
	if($_SESSION['basic_is_logged_in'] ==''){
//	header('Location:../login.php');
//	exit;
	}
}




?>
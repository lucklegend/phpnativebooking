<?php 
session_start();
include_once("includes/config.php");
$s_id = $_SESSION['basic_is_logged_in'];
$query = "select * from user_account  where crypted  = '$_GET[crypted]' and id = '$s_id' limit 1";
	$result= mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
			 $id = $row[id];
			 $user_type = $row[user_type];
			 
	}
	
	if($_SESSION['basic_is_logged_in'] != $id or $_SESSION['basic_is_logged_in'] =='' or $_SESSION['admin'] == '')
	{

	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; </script> ";
			exit;
	}	
	

	$code = $_GET['code'] +0;
//	$code = explode(',', $code);
//	$code = implode(',', $code);
	$catsql = "SELECT attachment FROM circular WHERE id = '$code'";
	$catresult = mysql_query($catsql);
	$catrow = mysql_fetch_array($catresult);
	unlink($catrow['attachment']);
	$query = "DELETE FROM circular WHERE id = '$code'";
	$result = mysql_query($query) or die(mysql_error()) ; 
	
	echo "<script type=text/javascript language=javascript> window.location.href = 'circular.php?crypted=" . $_GET['crypted'] . "'; </script> ";


 ?>
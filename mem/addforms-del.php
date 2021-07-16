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
	

	$code = $_GET['code'];
	$morecode = explode(",", $code);
	
	
	if (substr_count($code, ",") == 1)
	{
	$catsql = "SELECT attachment FROM forms WHERE id = '$morecode[0]'";
	$catresult = mysql_query($catsql);
	$catrow = mysql_fetch_array($catresult);
	unlink($catrow['attachment']);
	$query = "DELETE FROM forms WHERE id = '$morecode[0]'";
	$result = mysql_query($query) or die(mysql_error()) ; 
	}
	else
	{
		$i = 0;
		$j = substr_count($code, ",");
		
		while ($i < $j)
		{
	
	$catsql = "SELECT attachment FROM forms WHERE id = '$morecode[$i]'";
	$catresult = mysql_query($catsql);
	$catrow = mysql_fetch_array($catresult);
	unlink($catrow['attachment']);
	
	$query = "DELETE FROM forms WHERE id = '$morecode[$i]'";
	$result = mysql_query($query) or die(mysql_error()) ; 
		$i++;
		}
	}


	echo "<script type=text/javascript language=javascript> window.location.href = 'addforms.php?crypted=" . $_GET['crypted'] . "'; </script> ";


 ?>
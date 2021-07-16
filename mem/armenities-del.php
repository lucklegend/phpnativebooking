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
	
	$catsql = "SELECT category FROM armenities WHERE id = '$morecode[0]'";
	$catresult = mysql_query($catsql);
	$catrow = mysql_fetch_array($catresult);
	$categorytogo = $catrow['category'];
	
	if (substr_count($code, ",") == 1)
	{
	$query = "DELETE FROM armenities WHERE id = '$morecode[0]'";
	$result = mysql_query($query) or die(mysql_error()) ; 
	}
	else
	{
		$i = 0;
		$j = substr_count($code, ",");
		
		while ($i < $j)
		{
	$query = "DELETE FROM armenities WHERE id = '$morecode[$i]'";
	$result = mysql_query($query) or die(mysql_error()) ; 
		$i++;
		}
	}

	// find out if thecategory is empty, if empty, delete it also
	
	$armsql = "SELECT * FROM armenities WHERE category = '$categorytogo'";
	$armresult = mysql_query($armsql);
	$armnum = mysql_num_rows($armresult);
	if ($armnum == 0)
	{
		$query = "DELETE FROM categories WHERE title = '$categorytogo'";
		$result = mysql_query($query) or die(mysql_error()) ; 
	}	
	
	echo "<script type=text/javascript language=javascript> window.location.href = 'armenities.php?crypted=" . $_GET['crypted'] . "'; </script> ";

?>
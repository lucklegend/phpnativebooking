<?php 
session_start();
include_once("mem/includes/config.php");
if(isset($_POST["szID"]))
{
	
	//if(strpos($_POST['szID'], '=')) exit;
	//if(strpos($_POST['szPassword'], '=')) exit;
	$query  = "SELECT * FROM user_account  where 
					username = '" . mysqli_real_escape_string($conn, $_POST['szID']) . "' and 
					password = '" . mysqli_real_escape_string($conn, $_POST['szPassword']) . "' and active = '1'";
					
	if($_SERVER['REMOTE_ADDR'] == '182.65.83.90'){ 
		//echo $query; exit;
	}
	
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
	
	$count = mysqli_num_rows($result);
	
	if($count != '0' )
	{
 		$row = mysqli_fetch_array($result);
 			
			$id = $row['id'];
			$crypted = $row['crypt'];
		 	$_SESSION['basic_is_logged_in'] = "$id";
			include_once('mem/random_char.php');
			$query = "update user_account set crypted = '$pwd' where id = '$id' limit 1";
			$result = mysqli_query($conn, $query) or die(mysql_error($conn)) ; 
			if ($row['user_type'] == '0')
			{
				$_SESSION['admin'] = '0';
				echo "<script type=text/javascript language=javascript> window.location.href = 'mem/community.php?crypted=$pwd'; </script> ";
			}
			else
			if ($row['user_type'] == 1)
			{
				$_SESSION['admin'] = 1;
				$date_set = date("D, jS F Y @ H:i:s");
				$query = "update user_account set last_logged_in = '$date_set' where id = '$id' limit 1";
				$result = mysqli_query($conn, $query) or die(mysqli_error($conn)) ; 
				echo "<script type=text/javascript language=javascript> window.location.href = 'mem/admin.php?crypted=$pwd'; </script> ";
			}
			else
			{
				$_SESSION['admin'] = '0';
				
				$getmonth = date("m");
				$getyear = date("Y");
				$getdate = date("d");
				$numdays = date("t");
				$startmonth = "-$getmonth-$getyear";
				echo "<script type=text/javascript language=javascript> window.location.href = 'mem/booking.php?crypted=$pwd&page=all&date_sel_all=01$startmonth&date_sel_all_end=$numdays$startmonth&select=7&menu2=0&user_sel=0'; </script> ";
			
			}
		
	}
	else
	{
			//die ();
			echo "<script type=text/javascript language=javascript> window.location.href = 'login.php?ops=1'; </script> ";
			exit;
	}


}




 ?>

<? include ("header.php"); ?>
<link rel=stylesheet type="text/css" href="textset.css">
	<table cellSpacing="0" cellPadding="0" width="649" align="center" border="0" id="table4">
<script language="javascript"><!-- hide from old browsers
function validate()
{
	if (document.form1.szID.value.length == 0)
	{
		alert("Please enter your user ID.");
		document.form1.szID.focus();
		return false;
	}
	else if (document.form1.szPassword.value.length == 0)
	{
		alert("Please enter your password.");
		document.form1.szPassword.focus();
		return false;
	}
	return true;
}
// done hiding -->
</script>
	<form name="form1" method="post" action="" onSubmit="return validate()">
	<input type="hidden" name="c" value="1">
		<tr>
			<td vAlign="top" align="left">&nbsp;</td>
		</tr>
		<tr>
			<td vAlign="top" align="left" background="img/intro.jpg" height="395">
			<table cellSpacing="0" cellPadding="0" width="649" border="0" id="table5">
				<tr>
					<td width="97" height="132">&nbsp;</td>
					<td vAlign="bottom" colSpan="3"><span class="t4">Have you 
					received your User ID and Password?</span><br>
					Please contact
					<a href="mailto:ardmorepark@ardmorepark.com.sg">Management 
					staff</a> for User ID and password.
					<p>&nbsp;</td>
					<td width="27">&nbsp;</td>
				</tr>
                <tr>
					<td>&nbsp;</td>
					<td width="22">&nbsp;</td>
					<td class="login" colSpan="2">Please enter your User ID and 
					Password</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td class="login" width="99">User ID:</td>
					<td class="t1" width="404">
					<input class="login" id="szID" style="WIDTH: 10em" accessKey="u" maxLength="20" size="14" name="szID"></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td class="login">Password:</td>
					<td>
					<input class="login" id="szPassword" style="WIDTH: 10em" accessKey="p" type="password" maxLength="20" size="15" value="" name="szPassword"></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td height="74">&nbsp;</td>
					<td height="74">&nbsp;</td>
					<td align="middle">&nbsp;</td>
					<td class="login" vAlign="top"><br>
					<input onmouseover="this.src='img/but_leftlogin_4.gif'" onmouseout="this.src='img/but_leftlogin_3.gif'" type="image" height="23" width="47" src="img/but_leftlogin_3.gif" name="I1"> 
					</td>
					<td>&nbsp;</td>
				</tr>
                <? if ((isset($_GET['ops'])) && ($_GET['ops'] == 1)) { ?>
                <tr>
					<td>&nbsp;</td>
					<td width="22">&nbsp;</td>
					<td colSpan="2" class="login fontitle" style="font-weight: bold;; color: #990000">User ID and Password does not match. <br>
				    Please re-enter.</td>
				  <td>&nbsp;</td>
				</tr>
                <? } ?>
			</table>
			</td>
		</tr>
</form>
</table>

<? include ("footer.php"); ?>
<?php 
session_start();
include_once("mem/includes/config.php");
$s_id = $_SESSION['basic_is_logged_in'];
$query = "SELECT * FROM user_account WHERE crypted  = '$_GET[crypted]' AND id = '$s_id' LIMIT 1";
	$result= mysqli_query($conn, $query) or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result))
	{
			 $id = $row['id'];
			 $user_type = $row['user_type'];
			 
	}
	
	if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{

	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=1'; </script> ";
			exit;
	}
	else
		if ($_SESSION['admin'] != '' && $_SESSION['basic_is_logged_in'] == $id)
		{
	 echo "<script type=text/javascript language=javascript> window.location.href = 'admin.php?crypted=$_GET[crypted]'; </script> ";
			exit;
		}	
if(isset($_POST['szID']))
{
	$query  = "SELECT * FROM user_account  WHERE username = '".$_POST['szID']."' AND password = '".$_POST['szPassword']."' AND active = '1'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
	
	$count = mysqli_num_rows($result);
	
	if($count != '0' )
	{
 		while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
 		{
    		
			$id = $row['id'];
			$crypted = $row['crypt'];
		 	$_SESSION['basic_is_logged_in'] = $id;

			include_once('mem/random_char.php');
			$query = "UPDATE user_account SET crypted = '$pwd' WHERE id = '$id' LIMIT 1";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn)) ; 
			echo "<script type=text/javascript language=javascript> window.location.href = 'mem/index.php?crypted=$pwd'; </script> ";
		}
	}
	else
	{
			//die ();
			echo "<script type=text/javascript language=javascript> window.location.href = 'home.php?ops=1'; </script> ";
			exit;
	}


}




 ?>
<?php include ("header.php"); ?>
<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table4">
	<tr>
		<td vAlign="top" align="left" width="8" rowSpan="3">&nbsp;</td>
		<td class="topspace" vAlign="top" align="left" colSpan="4"><SPACER 
type="block"></SPACER></td>
	</tr>
	<tr>
		<td class="left" vAlign="top" align="left" width="150" background="img/leftctrbg2.gif">
		<link href="textset.css" type="text/css" rel="stylesheet">
		<table cellSpacing="0" cellPadding="0" width="150" border="0" id="table5">
			<tr vAlign="top">
				<td class="lefttop" height="93">&nbsp;</td>
			</tr>
			<tr>
				<td>
				<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table6">
					<tr>
						<td vAlign="top" align="middle"><br>
						&nbsp;
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.jsp')" onmouseout="this.src='img/but_logout_1.gif'" type="image" src="img/t/but_logout_2.gif" name="I1">
						<br>
						&nbsp;</td>
					</tr>
					<tr>
						<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td class="leftcontent" height="3">
				<img height="7" src="img/leftdot.gif" width="9">
				<a class="copy" href="profile.php">
				Change Password</a></td>
			</tr>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr>
			<tr>
				<td class="leftcontent">
				<img height="7" src="img/leftdot.gif" width="9">
				<a class="copy" href="profile.php?mode=information">
				Updates of Information</a> </td>
			</tr>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr>
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top" align="left">
        <?php if ($mode == '') { ?>
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="37" src="img/t/changepassword.gif" width="198"></td>
			</tr>
			<tr>
				<td class="content" vAlign="top" style="padding-top: 20px;">
				To change new password, please enter your current password, your 
				new password and re-enter your new password again under 'Confirm 
				New Password'. Click 'OK' to proceed.</p>
				<form name="form1" onsubmit="return validate()" method="post" action="#">
					<input type="hidden" value="AP090201" name="code">
					<table cellSpacing="0" cellPadding="0" width="50%" border="0" id="table8">
						<tr>
							<td class="bk">Current Password </td>
							<td class="bk2"><font class="txtsz">
							<input class="txt1" id="cpassword" type="password" maxLength="20" size="18" value name="cpassword">
							</font></td>
						</tr>
						<tr>
							<td class="bk" width="48%">New Password </td>
							<td class="bk2" width="52%"><font class="txtsz">
							<input class="txt1" id="password" type="password" maxLength="20" size="18" value name="password">
							</font></td>
						</tr>
						<tr vAlign="top" align="left">
							<td class="bk">Confirm New Password</td>
							<td class="bk2"><font class="txtsz">
							<input class="txt1" id="password1" type="password" maxLength="20" size="18" value name="password1">
							</font></td>
						</tr>
						<tr vAlign="top" align="middle">
							<td colSpan="2"><br>
							<input type="image" src="img/t/but_ok1.gif" name="I2"></td>
						</tr>
					</table>
				</form>
				<p>&nbsp;</td>
			</tr>
		</table>
        <?php } else { ?>
        <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table2">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="34" src="img/t/updatesinfo.gif" width="236"></td>
			</tr>
		</table>
		Please tell us what you think about our web site, service, technical 
		problems or others. Please provide us with your contact information to 
		allow us to reach you in case we have any questions.<br>
		&nbsp;<br>
&nbsp;<form name="form1" onsubmit="return validate()" method="post" action="http://axonsg.com/projects/ardmorepark/feedback_sub.jsp">
			<table cellSpacing="0" cellPadding="2" align="left" border="0" id="table3">
				<tr>
					<td class="bk3" vAlign="top" colSpan="2"><span class="bold">
					Contact Informaion</span></td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Name : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="name" title="Your Google Toolbar can fill this in for you. Select AutoFill" style="BACKGROUND-COLOR: #ffffa0" maxLength="100" size="30" name="name">
					<span class="boldred">x</span></td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Title : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="title" maxLength="100" size="30" name="title"></td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Company : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="company" maxLength="100" size="30" name="company"> 
					</td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Address : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="address" maxLength="200" size="30" name="address">
					<span class="boldred">x</span> </td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Telephone : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="telephone" title="Your Google Toolbar can fill this in for you. Select AutoFill" style="BACKGROUND-COLOR: #ffffa0" maxLength="30" size="30" name="telephone">
					<span class="boldred">x</span> </td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">FAX : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="fax" maxLength="30" size="30" name="fax"> 
					</td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">E-mail : </td>
					<td class="bk2" vAlign="top">
					<input id="email" title="Your Google Toolbar can fill this in for you. Select AutoFill" style="BACKGROUND-COLOR: #ffffa0" maxLength="100" size="30" name="email">
					<span class="boldred">x</span> </td>
				</tr>
				<tr align="right" height="10">
					<td vAlign="top" colSpan="2"><span class="boldred">x</span> 
					Mandatory fields</td>
				</tr>
				<tr align="middle">
					<td vAlign="top" colSpan="2"><br>
					<input type="image" src="http://axonsg.com/projects/ardmorepark/img/but_submit1.gif" name="I1">
					<a href="javascript:document.form1.reset()">
					<img height="30" src="http://axonsg.com/projects/ardmorepark/img/but_reset1.gif" width="65" border="0"></a> 
					</td>
				</tr>
			</table>
		</form>
        <?php } ?>
        </td>
		<td class="ctrrgt" vAlign="top" align="right" width="29">
		<img height="82" src="img/ctrrighttop.gif" width="29"></td>
	</tr>
	<tr>
		<td background="img/leftbotbg.gif"><SPACER type="block" height="20">
		</td>
		<td vAlign="top" align="left" background="img/ctrbotctr.gif">
		<img height="20" src="img/ctrleftbot.gif" width="29"></td>
		<td class="ctrbot" vAlign="top">&nbsp;</td>
		<td vAlign="top" align="right" background="img/ctrbotctr.gif">
		<img height="20" src="img/ctrrgtbot.gif" width="29"></td>
	</tr>
</table>
<?php include ("footer.php"); ?>
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
			 $name = $row['name'];
			 $title = $row['title'];
			 $company = $row['company'];
			 $address = $row['address'];
			 $telephone = $row['contact_no'];
			 $fax = $row['fax'];
			 $email = $row['email'];
	}
	
	if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{

	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; </script> ";
			exit;
	}	
	else
		if ($_SESSION['admin'] == 1)
		{
	 echo "<script type=text/javascript language=javascript> window.location.href = 'admin.php?crypted=$_GET[crypted]'; </script> ";
			exit;
		}
//	echo "here";
//	exit;
if(isset($_POST['submit']))
{
	
	$cpassword = $_POST['cpassword'];
	$password = $_POST['password'];
	$query = "select * from user_account where crypted  = '$_GET[crypted]' and id = '$s_id' limit 1";
	$result= mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		if ($row['password'] != $cpassword)
		{
			echo "<script type=text/javascript language=javascript> window.location.href = 'profile.php?crypted=$_GET[crypted]&msg=1'; </script> ";
		}
		else
		{
			$query = "update user_account set password = '$password' where id = '$s_id'";
			$result = mysql_query($query) or die(mysql_error()) ; 
			echo "<script type=text/javascript language=javascript> window.location.href = 'profile.php?crypted=$_GET[crypted]&msg=2'; </script> ";
		}
	}
	
}
else
if(isset($_POST['I1']))
{
	
	$name = $_POST['name'];
	$title = $_POST['title'];
	$company = $_POST['company'];
	$address = $_POST['address'];
	$telephone = $_POST['telephone'];
	$fax = $_POST['fax'];
	$email = $_POST['email'];
	
	$query = "update user_account set name= '$name', title = '$title', company = '$company', address = '$address', contact_no = '$telephone', fax = '$fax', email = '$email' where id = '$s_id'";
	$result = mysql_query($query) or die(mysql_error()) ; 
	echo "<script type=text/javascript language=javascript> window.location.href = 'profile.php?crypted=$_GET[crypted]&mode=information&msg=1'; </script> ";
	
}
else
{



 ?>
<? include ("../headermem.php"); ?>
<script language="javascript"><!-- hide from old browsers
function validate(whichform)
{
	if (whichform == 'form1')
	{
	if (document.form1.cpassword.value.length == 0)
	{
		alert("Please enter your current password.");
		document.form1.cpassword.focus();
		return false;
	}
	else if (document.form1.password.value.length == 0)
	{
		alert("Please enter your new password.");
		document.form1.password.focus();
		return false;
	}
	else if (document.form1.password1.value.length == 0)
	{
		alert("Please confirm your new password.");
		document.form1.password1.focus();
		return false;
	}
	else if (document.form1.password1.value != document.form1.password.value)
	{
		alert("Please confirm your new password.");
		document.form1.password.focus();
		return false;
	}
	return true;
	}
	else
	{
	if (document.form2.name.value.length == 0)
	{
		alert("Please enter your name.");
		document.form2.name.focus();
		return false;
	}
	else if (document.form2.address.value.length == 0)
	{
		alert("Please enter your address.");
		document.form2.address.focus();
		return false;
	}
	else if (document.form2.telephone.value.length == 0)
	{
		alert("Please enter your telephone.");
		document.form2.telephone.focus();
		return false;
	}
	else if (document.form2.email.value.length == 0)
	{
		alert("Please enter your email.");
		document.form2.email.focus();
		return false;
	}
	return true;
	}
}
// done hiding -->
</script>
<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table4">
	<tr>
		<td vAlign="top" align="left" width="8" rowSpan="3">&nbsp;</td>
		<td class="topspace" vAlign="top" align="left" colSpan="4"><SPACER 
type="block"></SPACER></td>
	</tr>
	<tr>
		<td class="left" vAlign="top" align="left" width="150" background="http://axonprojects.com/ardmorepark/v2/mem/img/leftctrbg2.gif">
		<link href="http://axonprojects.com/ardmorepark/v2/textset.css" type="text/css" rel="stylesheet">
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
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.php')" onmouseout="this.src='img/t/but_logout_2.gif'" type="image" src="http://axonprojects.com/ardmorepark/v2/mem/img/t/but_logout_2.gif" name="I1">
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
				<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot.gif" width="9">
				<a class="copy" href="http://axonprojects.com/ardmorepark/v2/mem/profile.php?crypted=<? echo $_GET['crypted']; ?>">
				Change Password</a></td>
			</tr>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr>
			<tr>
				<td class="leftcontent">
				<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot.gif" width="9">
				<a class="copy" href="http://axonprojects.com/ardmorepark/v2/mem/profile.php?crypted=<? echo $_GET['crypted']; ?>&mode=information">
				Updates of Information</a> </td>
			</tr>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr>
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="http://axonprojects.com/ardmorepark/v2/mem/img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top" align="left">
        <? if ($mode == '') { ?>
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="37" src="http://axonprojects.com/ardmorepark/v2/mem/img/t/changepassword.gif" width="198"></td>
			</tr>
			<tr>
				<td class="content" vAlign="top" style="padding-top: 20px;"><? if ($msg == '') {?>
				To change new password, please enter your current password, your 
				new password and re-enter your new password again under 'Confirm 
				New Password'. Click 'OK' to proceed.</p> <? } else if ($msg == '1') {?>
   				Please ensure your current password is correct. Please re-enter and click 'OK' to proceed.</p><? } else if ($msg == '2') {?>Your new password has been successfully changed.</p> <? } ?>
				<form name="form1" onsubmit="return validate()" method="post" action="http://www.axonprojects.com/ardmorepark/v2/mem/profile.php?crypted=<? echo $_GET['crypted']; ?>">
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
							<input type="submit" style="cursor:hand;width:55px;height:30px;border:0;background-image: url(img/t/but_ok1.gif);background-color:#FDF5E1;" name="submit" value=""></td>
						</tr>
					</table>
				</form>
				<p>&nbsp;</td>
			</tr>
		</table>
        <? } else { ?>
        <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table2">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="34" src="http://axonprojects.com/ardmorepark/v2/mem/img/t/updatesinfo.gif" width="236"></td>
			</tr>
		</table>
		Please tell us what you think about our web site, service, technical 
		problems or others. Please provide us with your contact information to 
		allow us to reach you in case we have any questions.<br>
		&nbsp;<br>
&nbsp;<? if ($msg == '1') { ?>Your contact information has been updated successfully.<br><? } ?><form name="form2" onsubmit="return validate()" method="post" action="http://axonprojects.com/ardmorepark/v2/mem/profile.php?crypted=<? echo $_GET['crypted']; ?>">
			<table cellSpacing="0" cellPadding="2" align="left" border="0" id="table3">
				<tr>
					<td class="bk3" vAlign="top" colSpan="2"><span class="bold">
					Contact Informaion</span></td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Name : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="name" title="Your Google Toolbar can fill this in for you. Select AutoFill" style="BACKGROUND-COLOR: #ffffa0" maxLength="100" size="30" name="name" value="<? echo $name; ?>">
					<span class="boldred">x</span></td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Title : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="title" maxLength="100" size="30" name="title" value="<? echo $title; ?>"></td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Company : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="company" maxLength="100" size="30" name="company" value="<? echo $company; ?>"> 
					</td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Address : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="address" maxLength="200" size="30" name="address" value="<? echo $address; ?>">
					<span class="boldred">x</span> </td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Telephone : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="telephone" title="Your Google Toolbar can fill this in for you. Select AutoFill" style="BACKGROUND-COLOR: #ffffa0" maxLength="30" size="30" name="telephone" value="<? echo $telephone; ?>">
					<span class="boldred">x</span> </td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">FAX : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="fax" maxLength="30" size="30" name="fax" value="<? echo $fax; ?>"> 
					</td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">E-mail : </td>
					<td class="bk2" vAlign="top">
					<input id="email" title="Your Google Toolbar can fill this in for you. Select AutoFill" style="BACKGROUND-COLOR: #ffffa0" maxLength="100" size="30" name="email" value="<? echo $email; ?>">
					<span class="boldred">x</span> </td>
				</tr>
				<tr align="right" height="10">
					<td vAlign="top" colSpan="2"><span class="boldred">x</span> 
					Mandatory fields</td>
				</tr>
				<tr align="middle">
					<td vAlign="top" colSpan="2"><br>
					<input type="submit" style="cursor:hand;width:65px;height:30px;border:0;background-image: url(img/but_submit1.gif);background-color:#FDF5E1;" name="I1" value="">
					<input type="reset" style="cursor:hand;width:65px;height:30px;border:0;background-image: url(img/but_reset1.gif);background-color:#FDF5E1;" name="reset" value="">
					</td>
				</tr>
			</table>
		</form>
        <? } ?>
        </td>
		<td class="ctrrgt" vAlign="top" align="right" width="29">
		<img height="82" src="http://axonprojects.com/ardmorepark/v2/mem/img/ctrrighttop.gif" width="29"></td>
	</tr>
	<tr>
		<td background="http://axonprojects.com/ardmorepark/v2/mem/img/leftbotbg.gif"><SPACER type="block" height="20">
		</td>
		<td vAlign="top" align="left" background="http://axonprojects.com/ardmorepark/v2/mem/img/ctrbotctr.gif">
		<img height="20" src="http://axonprojects.com/ardmorepark/v2/mem/img/ctrleftbot.gif" width="29"></td>
		<td class="ctrbot" vAlign="top">&nbsp;</td>
		<td vAlign="top" align="right" background="http://axonprojects.com/ardmorepark/v2/mem/img/ctrbotctr.gif">
		<img height="20" src="http://axonprojects.com/ardmorepark/v2/mem/img/ctrrgtbot.gif" width="29"></td>
	</tr>
</table>
<? include ("../footer.php"); ?>
<? } ?>
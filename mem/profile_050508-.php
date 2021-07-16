<?php 
session_start();
include_once("includes/config.php");
$mode = $_GET['mode'];
if (preg_match ('/[^a-z]/i', $mode)) { 

if(stristr($mode, '_') == TRUE) {
    //echo '"earth" not found in string';
  }
else
{
echo '<script language=JavaScript>';
echo 'alert("Invalid Entry!");';
echo 'self.location.href="profile.php?crypted='.$_GET['crypted'].'";';
echo '</script>';
}
}
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
			 $handphone = $row['handphone'];
			 $officephone = $row['officephone'];
			 $fax = $row['fax'];
			 $email = $row['email'];
			 $username = $row['username'];
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
	$username = $_POST['username'];
	$handphone = $_POST['handphone'];
	$officephone = $_POST['officephone'];
	
	$query = "update user_account set name= '$name', title = '$title', company = '$company', address = '$address', contact_no = '$telephone', fax = '$fax', email = '$email', handphone = '$handphone', officephone = '$officephone' where id = '$s_id'";
	//exit;
	$result = mysql_query($query) or die(mysql_error()) ; 
	
	
	
			//$username	 	= 'AsiaTechQC Administrator';
		//$email_address	= 'noreply@asiatechqc.com';


		$Fromname 		= $_POST['name'];
		if ($_POST['email'] != '')
		{
		$Fromaddress 	= $_POST['email'];
		}
		else
		{
		$Fromaddress 	= "ardmorepark@ardmorepark.com.sg";
		}
		$mailsubject = 'Profile Update from Website - ' . $username; 
		


//GET PARAMETER FROM URL..
		$email = 'ardmorepark@ardmorepark.com.sg';
		//$email = 'shah@axon.com.sg';
		//$message = 'test';
 		//$message = '<center><img height="70" hspace="14" src="http://axonprojects.com/maxime-dev/images/logo.jpg" width="175"><br><br></center>';
		$message1 = '<b><font color="#690708" face="Tahoma" size="2">Dear Condo Manager, <br><br></b>The following resident has updated their profile through the Facility Booking System:</font>';
		$message1 .= '<hr color="#690708">';
		$message1 .= '<table width="100%" border="0" cellspacing="0" cellpadding="5">';
  		$message1 .= '<tr>';
    	$message1 .= '<td width="15%" style="border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2"><strong>Name</strong></font></td>';
    	$message1 .= '<td width="85%" style="border-left: 1px solid #999999; border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2">' . $name . '</font></td>';
    	$message1 .= '</tr>';
    	$message1 .= '<tr>';
    	$message1 .= '<td style="border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2"><strong>Title</strong></font></td>';
    	$message1 .= '<td style="border-left: 1px solid #999999; border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2">' . $title . '</font></td>';
    	$message1 .= '</tr>';
		$message1 .= '<tr>';
    	$message1 .= '<td style="border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2"><strong>Company</strong></font></td>';
    	$message1 .= '<td style="border-left: 1px solid #999999; border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2">' . $company . '</font></td>';
    	$message1 .= '</tr>';
		$message1 .= '<tr>';
    	$message1 .= '<td style="border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2"><strong>Mailing Address</strong></font></td>';
    	$message1 .= '<td style="border-left: 1px solid #999999; border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2">' . $address . '</font></td>';
    	$message1 .= '</tr>';
		$message1 .= '<tr>';
    	$message1 .= '<td style="border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2"><strong>Contact No</strong></font></td>';
    	$message1 .= '<td style="border-left: 1px solid #999999; border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2">' . $telephone . '</font></td>';
    	$message1 .= '</tr>';
		$message1 .= '<tr>';
    	$message1 .= '<td style="border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2"><strong>Fax</strong></font></td>';
    	$message1 .= '<td style="border-left: 1px solid #999999; border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2">' . $fax . '</font></td>';
    	$message1 .= '</tr>';
		$message1 .= '<tr>';
    	$message1 .= '<td style="border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2"><strong>Email</strong></font></td>';
    	$message1 .= '<td style="border-left: 1px solid #999999; border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2">' . $email . '</font></td>';
    	$message1 .= '</tr>';
		$message1 .= '</table>';
		$message1 .= '<hr color="#690708"><br>';
		$message1 .= '<font face="Tahoma" size="1">Ardmore Park, 13 Ardmore Park #01-01 Singapore 259961</font>';

//		$headers = "From: $Fromname info@asiatechqc.com\nBcc: shah@axon.com.sg\nContent-Type: text/html; charset=iso-8859-1";
		$headers = "From: $Fromname <$Fromaddress>\nReply-To: $Fromaddress\nBcc: shah@axon.com.sg\nContent-Type: text/html; charset=iso-8859-1";
//$header = 'From: dinesh.kumar@siliconbiztech.com'."\r\n".'Reply-To: dinesh.kumar@siliconbiztech.com\nBcc: shah@axon.com.sg';

		$mail_sent = mail($email, $mailsubject, $message1, $headers);
		echo "<script type=text/javascript language=javascript> window.location.href = 'profile.php?crypted=$_GET[crypted]&mode=information&msg=1'; </script> ";
		exit;
	
	
	
	
	
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
		<td class="left" vAlign="top" align="left" width="150" background="img/leftctrbg2.gif">
		<link href="../textset.css" type="text/css" rel="stylesheet">
		<table cellSpacing="0" cellPadding="0" width="150" border="0" id="table5">
			<tr vAlign="top">
				<td class="lefttop" height="93">&nbsp;</td>
			</tr>
			<tr>
				<td>
				<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table6">
					<tr>
						<td vAlign="top" align="center" style="padding-top:10px;"><?php 
				 if($user_type=='1')
				 {
				 
				   echo "Welcome <i><b>Admin [$username]</b></i><br>";
				}else
				 if($user_type=='2')
				 {
				 
				   echo "Welcome <i><b>Club [$username]</b></i><br>";
				}else
				{
					 echo "Welcome <i><b>Resident [$username]</b></i><br>";
				
				}
				?>
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.php')" onmouseout="this.src='img/t/but_logout_2.gif'" type="image" src="img/t/but_logout_2.gif" name="I1">
						<br>
						&nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
			<? include ("internal-memmenu.php"); ?>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr>
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top" align="left">
        <? if ($mode == '') { ?>
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="37" src="img/t/changepassword.gif" width="198"></td>
			</tr>
			<tr>
				<td class="content" vAlign="top" style="padding-top: 20px;"><? if ($user_type == 2) { ?>Please request change of password from the Management Office.<? } else  if ($msg == '') {?>
				To change new password, please enter your current password, your 
				new password and re-enter your new password again under 'Confirm 
				New Password'. Click 'OK' to proceed.</p> <? } else if ($msg == '1') {?>
   				Please ensure your current password is correct. Please re-enter and click 'OK' to proceed.</p><? } else if ($msg == '2') {?>Your new password has been successfully changed.</p> <? } ?>
                <? if ($user_type == 0) { ?>
				<form name="form1" onsubmit="return validate()" method="post" action="http://www.axonprojects.com/ardmorepark/v3/mem/profile.php?crypted=<? echo $_GET['crypted']; ?>">
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
				<p>&nbsp;<? } ?></td>
			</tr>
		</table>
        <? } else { ?>
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
&nbsp;<? if ($msg == '1') { ?>Your contact information has been updated successfully.<br><? } ?><form name="form2" onsubmit="return validate()" method="post" action="profile.php?crypted=<? echo $_GET['crypted']; ?>">
			<table cellSpacing="0" cellPadding="2" align="left" border="0" id="table3">
				<tr>
					<td class="bk3" vAlign="top" colSpan="2"><span class="bold">
					Contact Information</span></td>
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
					<td class="bk" vAlign="top">Mailing Address : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="address" maxLength="200" size="30" name="address" value="<? echo $address; ?>">
					<span class="boldred">x</span> </td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">House No: </td>
				  <td class="bk2rbdr" vAlign="top">
					<input id="telephone" title="Your Google Toolbar can fill this in for you. Select AutoFill" style="BACKGROUND-COLOR: #ffffa0" maxLength="30" size="30" name="telephone" value="<? echo $telephone; ?>">
					<span class="boldred">x</span> </td>
				</tr>
                <tr>
					<td class="bk" vAlign="top">Handphone No: </td>
				    <td class="bk2rbdr" vAlign="top">
					<input id="handphone" title="Your Google Toolbar can fill this in for you. Select AutoFill" style="BACKGROUND-COLOR: #ffffa0" maxLength="30" size="30" name="handphone" value="<? echo $handphone; ?>">
					<span class="boldred">x</span> </td>
				</tr>
                <tr>
					<td class="bk" vAlign="top">Office No: </td>
				    <td class="bk2rbdr" vAlign="top">
					<input id="officephone" title="Your Google Toolbar can fill this in for you. Select AutoFill" style="BACKGROUND-COLOR: #ffffa0" maxLength="30" size="30" name="officephone" value="<? echo $officephone; ?>">
					<span class="boldred">x</span> </td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Fax : </td>
					<td class="bk2rbdr" vAlign="top">
					<input id="fax" maxLength="30" size="30" name="fax" value="<? echo $fax; ?>"> 
					</td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">E-mail : </td>
					<td class="bk2" vAlign="top">
					<input id="email" title="Your Google Toolbar can fill this in for you. Select AutoFill" style="BACKGROUND-COLOR: #ffffa0" maxLength="100" size="30" name="email" value="<? echo $email; ?>"></td>
				</tr>
				<tr align="right" height="10">
					<td vAlign="top" colSpan="2"><span class="boldred">x</span> 
					Mandatory fields</td>
				</tr>
				<tr align="middle">
					<td vAlign="top" colSpan="2"><br>
					<input type="hidden" name="username" value="<? echo $username; ?>">
                    <input type="submit" style="cursor:hand;width:65px;height:30px;border:0;background-image: url(img/but_submit1.gif);background-color:#FDF5E1;" name="I1" value="">
					<input type="reset" style="cursor:hand;width:65px;height:30px;border:0;background-image: url(img/but_reset1.gif);background-color:#FDF5E1;" name="reset" value="">
					</td>
				</tr>
			</table>
		</form>
        <? } ?>
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
<? include ("../footer.php"); ?>
<? } ?>
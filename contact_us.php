<?
session_start();
include_once("mem/includes/config.php");
$s_id = $_SESSION['basic_is_logged_in'];
$query = "select * from user_account  where crypted  = '$_GET[crypted]' and id = '$s_id' limit 1";
	$result= mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
			 $id = $row[id];
			 $user_type = $row[user_type];
			 $username = $row[username];
			 
	}
	
	if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{

//	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; <//script> ";
		//	exit;
	}	
?>	
<?
if (isset($_POST['Submit']) && $_POST['email'] != '')
{
		//$username	 	= 'AsiaTechQC Administrator';
		//$email_address	= 'noreply@asiatechqc.com';


		$Fromname 		= $_POST['name'];
		$Fromaddress 	= $_POST['email'];
		$contact		= $_POST['contact'];
		$message		= $_POST['message'];
		$title			= $_POST['title'];
		
		$mailsubject = 'Ardmore Park Website Submission - ' . $title; 
		


//GET PARAMETER FROM URL..
		$email = 'ardmorepark@ardmorepark.com.sg';
		//$message = 'test';
 		//$message = '<center><img height="70" hspace="14" src="http://axonprojects.com/maxime-dev/images/logo.jpg" width="175"><br><br></center>';
		$message1 = '<b><font color="#690708" face="Tahoma" size="2">Dear Condo Manager, <br><br></b></font>';
		$message1 .= '<hr color="#690708">';
		$message1 .= '<table width="100%" border="0" cellspacing="0" cellpadding="5">';
  		$message1 .= '<tr>';
    	$message1 .= '<td width="15%" style="border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2"><strong>Name</strong></font></td>';
    	$message1 .= '<td width="85%" style="border-left: 1px solid #999999; border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2">' . $name . '</font></td>';
    	$message1 .= '</tr>';
    	$message1 .= '<tr>';
    	$message1 .= '<td style="border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2"><strong>Contact No</strong></font></td>';
    	$message1 .= '<td style="border-left: 1px solid #999999; border-bottom:1px solid #999999;"><font color="#690708" face="Tahoma" size="2">' . $contact . '</font></td>';
    	$message1 .= '</tr>';
    	$message1 .= '<tr>';
    	$message1 .= '<td><font color="#690708" face="Tahoma" size="2"><strong>Message</strong></font></td>';
    	$message1 .= '<td style="border-left: 1px solid #999999;"><font color="#690708" face="Tahoma" size="2">' . $message . '</font></td>';
    	$message1 .= '</tr>';
    	$message1 .= '</table>';
		$message1 .= '<hr color="#690708"><br>';
		$message1 .= '<font face="Tahoma" size="1">Ardmore Park, 13 Ardmore Park #01-01 Singapore 259961</font>';

//		$headers = "From: $Fromname info@asiatechqc.com\nBcc: shah@axon.com.sg\nContent-Type: text/html; charset=iso-8859-1";
		$headers = "From: $Fromname <$Fromaddress>\nReply-To: $Fromaddress\nBcc: shah@axon.com.sg\nContent-Type: text/html; charset=iso-8859-1";
//$header = 'From: dinesh.kumar@siliconbiztech.com'."\r\n".'Reply-To: dinesh.kumar@siliconbiztech.com\nBcc: shah@axon.com.sg';

		$mail_sent = mail($email, $mailsubject, $message1, $headers);
		echo "<script type=text/javascript language=javascript> window.location.href = 'contact_us.php?done=1'; </script> ";
		exit;
}
else
{
?>
<SCRIPT LANGUAGE="JavaScript1.1" SRC="FormCheck.js"></SCRIPT>
<SCRIPT>
function ltrim (s)
{
	return s.replace( /^\s*/, "" )
}

function rtrim (s)
{
	return s.replace( /\s*$/, "" );
}

function qtrim (s)
{
	return s.replace( /'/gi, "\\'" );
}

function trim (s)
{
	return rtrim(ltrim(s));
}

function validateForm(form)
{   
	email = trim(form.email.value);
	if(email == ""){
		alert("Please enter your email address.");
		form.email.focus();
		return false;
	}
	
	return ( 
	  checkString(form.elements["name"],sName) &&
	  checkEmail(form.elements["email"], true) &&
      checkString(form.elements["message"],sMessage)
    )	
}

function submitform()
{
  document.form1.submit();
}
</SCRIPT>

<? include ("header.php"); ?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="8" rowspan="3" align="left" valign="top">&nbsp;</td>
    <td colspan="4" align="left" valign="top" class="topspace"><spacer type="block"></spacer></td>
  </tr>
  <tr>
    <td width="150" align="left" valign="top" background="img/leftctrbg2.gif" class="left"><link rel=stylesheet type="text/css" href="textset.css">

<table width="150"  border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td height="93" class="lefttop">&nbsp;</td>
  </tr>
   <? if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{

	}
	else
	{
	 ?>
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
						<input onMouseOver="this.src='img/but_logout_2.gif'" onClick="location.replace('mem/logout.php')" onMouseOut="this.src='img/but_logout_2.gif'" type="image" src="img/but_logout_2.gif" name="I1">
						<br>
						&nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
             <?
		if($user_type=='1')
		{
			include ("mem/internal-adminmenu-fromoutside.php");
        }
		else
		{ 
			include ("mem/internal-memmenu-fromoutside.php");
		}
		?>
            <? } ?>
  <tr>
    <td></td>
  </tr>
</table>
</td>
    <td width="29" height="20" align="left" valign="top" class="ctrleft"><img src="img/ctrrgttop.gif" width="29" height="82"></td>
    <td align="left" valign="top" class="ctr"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="50" valign="bottom" class="ctrtop">
</td>
        </tr>
      </table>

<!--
<b>The Management Corporation Strata Title Plan No. 2645 - Ardmore Park</b><br>
13 Ardmore Park #01-01 Singapore 259961<br>

<br>-->
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td align="left">
<strong><font style="font-size:18px;">Management Office</font></strong>
<p align="justify">
In order to provide a high standard of Management to the condominium, professional staff and contractors have been engaged to discharge the duties of the Management. 
</p>
<p align="justify">
An Estate Management team on site, with the support from Knight Frank Property Asset Management Pte Ltd; consist of four office staff, General Manager, the Maintenance Executive, the Condominium Executive and the Admin/Resident Relations officer and four technicians. Each is given various duties and responsibilities in order to manage and maintain the “common property” within the Ardmore Park as well as answer queries and to provide prompt and efficient service. 
</p>
<p align="justify">
The Management office is located at the clubhouse and is open from 0830 hours – 1730 hours on weekdays and from 0830 hours to 1230 hours on Saturdays. The office is close on Sundays and Public Holidays.
</p>
<p align="justify">
If you have any feedback or suggestions, please contact the site staff or write to:
</p>
<p align="justify">
13 Ardmore Park #01-01 Singapore 259961<br>
Tel: (65) 6733 0862, Fax: (65) 6733 0872 <br>
Email: <a href="mailto:ardmorepark@ardmorepark.com.sg">ardmorepark@ardmorepark.com.sg</a>
</td>
</tr>
</table>
<?
if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{
	
	}
	else
	{

//	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; <//script> ";
		//	exit;
?>
	<br>
<table width="100%" cellpadding="5" cellspacing="0" border="0">
<tr>
<td colspan="2">Alternatively, you can use the online feedback form as well.<br><br></td>
</tr>
<? if ($_GET['done'] == 1) { ?>
<tr>
<td colspan="2"><font color="#990000"><strong>Thank you for your submission. We will get in touch with you shortly.</strong></font></td>
</tr>
<? } ?>
<form name="form1" id="form1" action="contact_us.php" method="post">
<tr>
<td height="29" align="left">
			<div align="left">
				Name <font color="#ff0000">*</font></div>
			</td>
			<td>
			<input class="textbox" id="name" onFocus="promptEntry(sName)" onChange="checkString(this,sName)" name="name"></td>
		</tr>
		<tr>
			<td height="29" align="left">
			<div align="left">
				Email Address <font color="#ff0000">*</font></div>
			</td>
			<td>
			<input class="textbox" id="email" onFocus="promptEntry(pEmail)" onChange="checkEmail(this, true)" name="email"></td>
		</tr>
		<tr>
			<td height="29" align="left">
			<div align="left">
				Contact No</div>
			</td>
			<td><input class="textbox" id="contact" name="contact"></td>
		</tr>
		<tr>
			<td width="13%" height="29" align="left">
			<div align="left">
			  Message Type <font color="#ff0000">*</font></div>
			</td>
			<td width="87%"><select class="textbox" id="type" name="title">
			<option value="Enquiry">Enquiry</option>
			<option value="Work Request" selected>Work Request</option>
			<option value="Feedback">Feedback</option>
			<option value="Others">Others</option>
			</select></td>
		</tr>
		<tr>
			<td rowSpan="2" align="left" vAlign="top">
			<div align="left">
			  Message Body <font color="#ff0000">*</font>			</div>
			</td>
			<td height="106">
			<textarea class="textbox" onFocus="promptEntry(sMessage)" name="message" rows="5" wrap="VIRTUAL" cols="40" onChange="checkString(this,sMessage)"></textarea></td>
		</tr>
		<tr>
			<td align="middle" height="29">
			<div align="left">
				<input type="hidden" value="Submit" name="Submit">
				<input class="textbutton" onClick="if (validateForm(this.form)) submitform();" type="button" value="Submit" name="Submit1"> 
				&nbsp; &nbsp;
				<input class="textbutton" type="reset" value="Reset" name="Submit2"> 
			</div>
			</td>
</tr>
</form>					
</table>
<?
}
?>
    </td>
    <td width="29" align="right" valign="top" class="ctrrgt"><img src="img/ctrrighttop.gif" width="29" height="82"></td>
  </tr>
  <tr>
    <td background="img/leftbotbg.gif"><spacer type="block" height="20"></td>
    <td align="left" valign="top" background="img/ctrbotctr.gif"><img src="img/ctrleftbot.gif" width="29" height="20"></td>
    <td valign="top" class="ctrbot">&nbsp;</td>
    <td align="right" valign="top" background="img/ctrbotctr.gif"><img src="img/ctrrgtbot.gif" width="29" height="20"></td>
  </tr>
</table>
<? include ("footer.php"); ?>
<?
}
?>
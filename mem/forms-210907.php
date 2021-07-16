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
	
	if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{

	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; </script> ";
			exit;
	}	
if(isset($_POST[szID]))
{
	$query  = "SELECT * FROM user_account  where username = '$_POST[szID]' and password = '$_POST[szPassword]' and active = '1'";
	$result = mysql_query($query) or die(mysql_error()) ;
	
	$count = mysql_num_rows($result);
	
	if($count != '0' )
	{
 		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
 		{
    		
			$id = $row['id'];
			$crypted = $row['crypt'];
		 	$_SESSION['basic_is_logged_in'] = "$id";
			include_once('random_char.php');
			$query = "update user_account set crypted = '$pwd' where id = '$id' limit 1";
			$result = mysql_query($query) or die(mysql_error()) ; 
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
<? include ("../headermem.php"); ?>
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
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.php')" onmouseout="this.src='img/but_logout_2.gif'" type="image" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_logout_2.gif" name="I1">
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
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="http://axonprojects.com/ardmorepark/v2/mem/img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top">
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="34" src="http://axonprojects.com/ardmorepark/v2/mem/img/t/applciationforms.gif" width="198"></td>
			</tr>
			<tr>
				<td class="content" vAlign="top"><span class="graypad">
				<span class="copyright2">To download a form, click on
				<img height="25" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" align="absMiddle"> 
				next to the form you wish to download and you will be prompted 
				to save the file.</span></span> <br>
				<br>
&nbsp;<hr><br>
&nbsp;<table cellSpacing="0" cellPadding="0" width="65%" border="0" id="table8">
					<tr>
						<td class="bk" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot2.gif" width="9"> 
						Away Instruction form</td>
						<td class="bk" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/away%20instruction.doc">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk3" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot3.gif" width="9"> 
						Bulk Delivery and House Removal</td>
						<td class="bk3" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/Microsoft%20Word%20-%20removals%20application.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot2.gif" width="9"> 
						Change in Correspondence Address</td>
						<td class="bk" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/change_in_correspondence_address.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk3" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot3.gif" width="9"> 
						Dog Record Form</td>
						<td class="bk3" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/dog_reg_form.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot2.gif" width="9"> 
						Emergency Contact Numbers</td>
						<td class="bk" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/emergency_contact_numbers.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk3" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot3.gif" width="9"> 
						Feedback Form</td>
						<td class="bk3" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/feedback_form.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot2.gif" width="9"> 
						Permission to Carry Out Renovation Work</td>
						<td class="bk" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/application_for_permission_to_carry_out_renovation_work.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk3" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot3.gif" width="9"> 
						Proximity Card</td>
						<td class="bk3" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/application_for_proximity_card.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot2.gif" width="9"> 
						Registration of Coaches/Trainers</td>
						<td class="bk" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/Microsoft%20Word%20-%20REGISTRATION%20OF%20COACHES.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk3" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot3.gif" width="9"> 
						Registration of Drivers</td>
						<td class="bk3" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/Drivers_registration_form.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot2.gif" width="9"> 
						Report of Loss</td>
						<td class="bk" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/report_of_loss.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk3" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot3.gif" width="9"> 
						Reservation of Function Room</td>
						<td class="bk3" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/reservation_of_function_room.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot2.gif" width="9"> 
						Resident Card/Supplementary Card</td>
						<td class="bk" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/application_for_resident_card_or_supplementary_card.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
					<tr>
						<td class="bk3" width="83%">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/mem/img/leftdot3.gif" width="9"> 
						Vehicle Registration Form</td>
						<td class="bk3" align="middle" width="17%">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/forms/vehicle_reg_form.pdf">
						<img title="download" height="25" alt="download" src="http://axonprojects.com/ardmorepark/v2/mem/img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
				</table>
				<p>&nbsp;</td>
			</tr>
		</table>
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
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
		<td class="left" vAlign="top" align="left" width="150" background="http://axonsg.com/projects/ardmorepark/v2/mem/img/leftctrbg2.gif">
		<link href="http://axonsg.com/projects/ardmorepark/v2/textset.css" type="text/css" rel="stylesheet">
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
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.php')" onmouseout="this.src='img/but_logout_2.gif'" type="image" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/but_logout_2.gif" name="I1">
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
				<td class="leftcontent">
				<img height="7" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/leftdot.gif" width="9">
				<a class="copy" href="http://axonsg.com/projects/ardmorepark/v2/mem/admin.php?mode=password">
				Change Password </a></td>
			</tr>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr>
			<tr>
				<td class="leftcontent" height="3">
				<img height="7" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/leftdot.gif" width="9">
				<a class="copy" href="http://axonsg.com/projects/ardmorepark/v2/mem/admin.php">
				Masters</a> </td>
			</tr>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr>
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top" align="left">
        <? if ($mode == '') { ?>
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="37" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/t/managementoffice.gif" width="218"></td>
			</tr>
		</table>
		<br>
&nbsp;
      <table cellSpacing="0" cellPadding="0" width="300" align="left" border="0" id="table8">
        <tr> 
          <td class="bk3" colSpan="3"><span class="t1">Masters</span></td>
          <td rowSpan="20">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk">&nbsp;</td>
          <td class="bk2"> <a href="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=user">Users 
            Managment (Residents/Admin/Club)</a></td>
          <td class="bk">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk">&nbsp;</td>
          <td class="bk2"> <a href="booking.php?crypted=<?php echo $_GET[crypted]; ?>&cr=1">Facility 
            Management (Add/Edit/Delete)</a><span class="txtgrey"></span></td>
          <td class="bk">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk">&nbsp;</td>
          <td class="bk2"><a href="comm.php?crypted=<? echo $_GET['crypted']; ?>&calender">Manage 
            Calendar Events</a></td>
          <td class="bk">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk" width="20">&nbsp;</td>
          <td class="bk2" width="263">&nbsp;</td>
          <td class="bk" width="17">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk3" colSpan="3"><span class="t1">Content Management </span></td>
        </tr>
        <tr> 
          <td class="bk">&nbsp;</td>
          <td class="bk2"> <a href="http://axonsg.com/projects/ardmorepark/v2/mem/hmsvcmgmt.jsp?ty=amenity"> 
            Amenities</a><span class="txtgrey"></span></td>
          <td class="bk">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk">&nbsp;</td>
          <td class="bk2"> <a href="http://axonsg.com/projects/ardmorepark/v2/mem/formgmt.jsp"> 
            Application Forms </a><span class="txtgrey"></span></td>
          <td class="bk">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk">&nbsp;</td>
          <td class="bk2"> <a href="http://axonsg.com/projects/ardmorepark/v2/mem/newsmgmt.jsp">Community 
            News </a><span class="txtgrey"></span></td>
          <td class="bk">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk">&nbsp;</td>
          <td class="bk2"> <a href="http://axonsg.com/projects/ardmorepark/v2/mem/hmsvcmgmt.jsp?ty=useful info"> 
            Useful Info</a><span class="txtgrey"></span></td>
          <td class="bk">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk3" colSpan="3"><span class="t1">Booking Management </span></td>
        </tr>
        <tr> 
          <td class="bk">&nbsp;</td>
          <td class="bk2"> <a href="booking.php?crypted=<?php echo $_GET[crypted]; ?>&page=all"> 
            View / Search Bookings</a><span class="txtgrey"></span></td>
          <td class="bk">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk">&nbsp;</td>
          <td class="bk2"> <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&page=all&date_sel_all=1$start_month&date_sel_all_end=30$start_month&select=2&menu2=0&user_sel=0"; ?>"> 
            View / Search Cancelled Bookings</a><span class="txtgrey"></span></td>
          <td class="bk">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk">&nbsp;</td>
          <td class="bk2">&nbsp; </td>
          <td class="bk">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk">&nbsp;</td>
          <td class="bk2">&nbsp; </td>
          <td class="bk">&nbsp;</td>
        </tr>
        <tr> 
          <td class="bk3" colSpan="3">&nbsp;</td>
        </tr>
        <tr align="middle"> 
          <td colSpan="3"> <a onmouseover="MM_swapImage('Image81','','img/but_back2.gif',1)" onmouseout="MM_swapImgRestore()" href="javascript:history.back(1)"> 
            <br>
            </a><a href="javascript:history.back(1)"> <img height="30" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/but_back1.gif" width="55" vspace="5" border="0"></a></td>
        </tr>
      </table>
        <? } else { ?>
        <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="37" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/t/changepassword.gif" width="198"></td>
			</tr>
			<tr>
				<td class="content" vAlign="top">&nbsp;<p><span class="t4">
				</span><br>
				To change new password, please enter your current password, your 
				new password and re-enter your new password again under 'Confirm 
				New Password'. Click 'OK' to proceed.</p>
				<form name="form1" onsubmit="return validate()" method="post" action="http://axonsg.com/projects/ardmorepark/v2/mem/chngpwd.jsp">
					<input type="hidden" value="manager" name="code">
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
							<input type="image" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/but_ok1.gif" name="I2"></td>
						</tr>
					</table>
				</form>
				<p>&nbsp;</td>
			</tr>
		</table>
        <? } ?>
		<p>&nbsp;</td>
		<td class="ctrrgt" vAlign="top" align="right" width="29">
		<img height="82" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/ctrrighttop.gif" width="29"></td>
	</tr>
	<tr>
		<td background="http://axonsg.com/projects/ardmorepark/v2/mem/img/leftbotbg.gif"><SPACER type="block" height="20">
		</td>
		<td vAlign="top" align="left" background="http://axonsg.com/projects/ardmorepark/v2/mem/img/ctrbotctr.gif">
		<img height="20" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/ctrleftbot.gif" width="29"></td>
		<td class="ctrbot" vAlign="top">&nbsp;</td>
		<td vAlign="top" align="right" background="http://axonsg.com/projects/ardmorepark/v2/mem/img/ctrbotctr.gif">
		<img height="20" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/ctrrgtbot.gif" width="29"></td>
	</tr>
</table>
<? include ("../footer.php"); ?>
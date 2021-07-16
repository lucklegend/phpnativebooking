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
	
	if($_SESSION['basic_is_logged_in'] != $id or $_SESSION['basic_is_logged_in'] =='')
	{
	
	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; </script> ";
			exit;
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
		<td class="left" vAlign="top" align="left" width="150" background="http://axonprojects.com/ardmorepark/v2/img/leftctrbg2.gif">
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
		<img height="82" src="http://axonprojects.com/ardmorepark/v2/img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top">
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="36" src="http://axonprojects.com/ardmorepark/v2/mem/img/t/bylaws.gif" width="97"></td>
			</tr>
			<tr>
				<td class="content" vAlign="top"><br>
&nbsp;<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table8">
					<tr>
						<td class="houserules">
						<p align="justify">
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>">
						Introduction</a></p>
						<p align="justify">

						1.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#definitions">
						Definitions</a><br>

						2.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#occupancy">
						Occupancy</a><br>

						3.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#common">
						Common Areas</a><br>

						4.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#resident">
						Resident Cards</a><br>

						5.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#proximity">
						Resident Proximity Cards</a><br>

						6.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#supplementary">
						Supplementary Cards</a><br>

						7.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#renovation">
						Renovation</a><br>

						8.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#bulk">
						Bulk Delivery And House Removal</a><br>

						9.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#carparking">
						Car Parking</a><br>

						10.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#pet">
						Pet Owners</a><br>

						11.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#employees">
						Employees/ Domestic Helpers/ Drivers</a><br>

						12.
						<a class="bold1" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#refuse">
						Refuse Disposal</a><br>

						13.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#general">
						General Rules &amp; Regulation Governing the use of 
						Recreational Facilities</a><br>

						14.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#swimmingpool">
						Swimming Pool / Jacuzzi Pool / Children’s Pool</a><br>

						15.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#sauna">
						Saunas</a><br>

						16.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#tennis">
						Tennis Courts</a><br>

						17.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#function">
						Function Rooms</a><br>

						18.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#gym">
						Gymnasium</a><br>

						19.
						<a class="bold1" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#jogging">
						Jogging Track And Fitness Corner</a><br>

						20.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#children">
						Children’s Playground</a><br>

						21.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#koi">
						Koi Pond</a><br>
<SCRIPT language=javascript>nextDot();endSub();</SCRIPT>
						22.
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#multi">
						Multi-Purpose Court (Mpc)</a></p>
						<p class="bold" align="justify">
						<a href="http://axonprojects.com/ardmorepark/v2/mem/general.php?crypted=<? echo $_GET['crypted']; ?>#hr">
						House rules for kitchen at the north room</a></td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
		<td class="ctrrgt" vAlign="top" align="right" width="29">
		<img height="82" src="http://axonprojects.com/ardmorepark/v2/img/ctrrighttop.gif" width="29"></td>
	</tr>
	<tr>
		<td background="http://axonprojects.com/ardmorepark/v2/img/leftbotbg.gif"><SPACER type="block" height="20">
		</td>
		<td vAlign="top" align="left" background="http://axonprojects.com/ardmorepark/v2/img/ctrbotctr.gif">
		<img height="20" src="http://axonprojects.com/ardmorepark/v2/img/ctrleftbot.gif" width="29"></td>
		<td class="ctrbot" vAlign="top">&nbsp;</td>
		<td vAlign="top" align="right" background="http://axonprojects.com/ardmorepark/v2/img/ctrbotctr.gif">
		<img height="20" src="http://axonprojects.com/ardmorepark/v2/img/ctrrgtbot.gif" width="29"></td>
	</tr>
</table>
<? include ("../footer.php"); ?>
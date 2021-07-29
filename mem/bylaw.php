<?php 
	session_start();
	include_once("includes/config.php");
	
	$s_id = $_SESSION['basic_is_logged_in'];
	$query = "SELECT * FROM user_account  where crypted  = '".$_GET['crypted']."' and id = '".$s_id."' limit 1";
	$result= mysqli_query($conn, $query) or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result))
	{
			 $id = $row['id'];
			  $user_type = $row['user_type'];
	}
	
	if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{
	
	 echo "<script type=text/javascript language=javascript> window.location.href = '../home.php?ops=1'; </script> ";
			exit;
	}



 ?>
 <?php include ("../headermem.php"); ?>
<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table4">
	<tr>
		<td vAlign="top" align="left" width="8" rowSpan="3">&nbsp;</td>
		<td class="topspace" vAlign="top" align="left" colSpan="4"><SPACER 
type="block"></SPACER></td>
	</tr>
	<tr>
		<td class="left" vAlign="top" align="left" width="150" background="http://ascengen.com/ardmorepark/img/leftctrbg2.gif">
		<link href="http://ascengen.com/ardmorepark/textset.css" type="text/css" rel="stylesheet">
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
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.jsp')" onmouseout="this.src='img/but_logout_1.gif'" type="image" src="http://ascengen.com/ardmorepark/img/but_logout_1.gif" name="I1">
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
		<img height="82" src="http://ascengen.com/ardmorepark/img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top">
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="36" src="http://ascengen.com/ardmorepark/img/t/bylaws.gif" width="97"></td>
			</tr>
			<tr>
				<td class="content" vAlign="top"><br>
&nbsp;<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table8">
					<tr>
						<td class="houserules">
						<p align="justify">
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp">
						Introduction</a></p>
						<p align="justify">
<SCRIPT language=javascript>nextDot();</SCRIPT>
						1.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#definitions">
						Definitions</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						2.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#occupancy">
						Occupancy</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						3.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#common">
						Common Areas</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						4.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#resident">
						Resident Cards</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						5.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#proximity">
						Resident Proximity Cards</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						6.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#supplementary">
						Supplementary Cards</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						7.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#renovation">
						Renovation</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						8.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#bulk">
						Bulk Delivery And House Removal</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						9.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#carparking">
						Car Parking</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						10.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#pet">
						Pet Owners</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						11.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#employees">
						Employees/ Domestic Helpers/ Drivers</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						12.
						<a class="bold1" href="http://ascengen.com/ardmorepark/general.jsp#refuse">
						Refuse Disposal</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						13.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#general">
						General Rules &amp; Regulation Governing the use of 
						Recreational Facilities</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						14.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#swimmingpool">
						Swimming Pool / Jacuzzi Pool / Children’s Pool</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						15.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#sauna">
						Saunas</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						16.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#tennis">
						Tennis Courts</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						17.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#function">
						Function Rooms</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						18.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#gym">
						Gymnasium</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						19.
						<a class="bold1" href="http://ascengen.com/ardmorepark/general.jsp#jogging">
						Jogging Track And Fitness Corner</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						20.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#children">
						Children’s Playground</a><br>
<SCRIPT language=javascript>nextDot();</SCRIPT>
						21.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#koi">
						Koi Pond</a><br>
<SCRIPT language=javascript>nextDot();endSub();</SCRIPT>
						22.
						<a class="bold" href="http://ascengen.com/ardmorepark/general.jsp#multi">
						Multi-Purpose Court (Mpc)</a></p>
						<p class="bold" align="justify">
						<a href="http://ascengen.com/ardmorepark/general.jsp#hr">
						House rules for kitchen at the north room</a></td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
		<td class="ctrrgt" vAlign="top" align="right" width="29">
		<img height="82" src="http://ascengen.com/ardmorepark/img/ctrrighttop.gif" width="29"></td>
	</tr>
	<tr>
		<td background="http://ascengen.com/ardmorepark/img/leftbotbg.gif"><SPACER type="block" height="20">
		</td>
		<td vAlign="top" align="left" background="http://ascengen.com/ardmorepark/img/ctrbotctr.gif">
		<img height="20" src="http://ascengen.com/ardmorepark/img/ctrleftbot.gif" width="29"></td>
		<td class="ctrbot" vAlign="top">&nbsp;</td>
		<td vAlign="top" align="right" background="http://ascengen.com/ardmorepark/img/ctrbotctr.gif">
		<img height="20" src="http://ascengen.com/ardmorepark/img/ctrrgtbot.gif" width="29"></td>
	</tr>
</table>
<?php include ("../footer.php"); ?>
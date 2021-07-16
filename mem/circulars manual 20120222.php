<?php 
session_start();
include_once("includes/config.php");

function change_format ($date) {

$new_date = explode("-", $date);
return $better_date = $new_date[2] . "-" . $new_date[1] . "-" . $new_date[0];

}

$s_id = $_SESSION['basic_is_logged_in'];
$query = "select * from user_account  where crypted  = '$_GET[crypted]' and id = '$s_id' limit 1";

//exit;
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
						  
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.php')" onmouseout="this.src='img/but_logout_2.gif'" type="image" src="img/but_logout_2.gif" name="I1">
						<br>
					  &nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
            <? if($user_type=='1')
				 {
				include ("internal-adminmenu.php"); 
				}
				else
				{
				include ("internal-memmenu.php"); 
				}
				?>
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top" align="left">
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">&nbsp;</td>
			</tr>
			<tr>
				<td class="content" vAlign="top">
				<a name="circular">

				<img height="26" src="img/t/circulars.gif" width="97" border="0"></a></p>
				<hr>


<!--temp banner !-->
				<p><a target="_blank" href="ard-notice2010.pdf" >
				<img border="0" src="painting1.jpg" width="340" height="112" style="border: 1px solid #800000"></a></p>
<!--end !-->




				<table id="table9">
					                    <tbody><tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/March servicing schedule_Closure of swimming pool_inspection by SCDF.doc" class="bold">
						01-03-2011</a></td>
						<td valign="top" align="left">Servicing Schedule for March 2011/Closure of swimming pool maintenance/inspection by SCDF</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Application for Fire Certificate for Ardmore Park.pdf" class="bold">
						22-02-2011</a></td>
						<td valign="top" align="left">Application for Fire Certificate for Ardmore Park</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Feb 2011 servicing schedule_Repainting Excercise_Uniform Appearance_Lion Dance.pdf" class="bold">
						01-02-2011</a></td>
						<td valign="top" align="left">February 2011 servicing schedule/ Repainting Excercise/ Uniform Appearance/ Lion Dance performance</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Closure of Playground &amp; Koi Bridge for Repairs and Repainting.pdf" class="bold">
						13-01-2011</a></td>
						<td valign="top" align="left">Closure of Playground &amp; Koi Bridge for Repairs and Repainting </td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Repainting works to car porch areas.pdf" class="bold">
						05-01-2011</a></td>
						<td valign="top" align="left">Repainting works to car porch areas, main lobbies and private lift lobbies of Blks 9, 11 &amp; 15</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/January 2011 servicing schedule.doc" class="bold">
						01-01-2011</a></td>
						<td valign="top" align="left">January 2011 servicing schedule/ Disposal of Bulky waste/ Chokage in Male Clubhouse toilet</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Repainting works at Blk 9_02-01 to 29-01 Ardmore Park.pdf" class="bold">
						22-12-2010</a></td>
						<td valign="top" align="left">Repainting works at Blk 9_02-01 to 29-01 Ardmore Park</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Repainting works to Blk 15 B2 carpark.pdf" class="bold">
						13-12-2010</a></td>
						<td valign="top" align="left">Repainting works to Blk 15 B2 carpark </td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Repainting of the Balcony railings.pdf" class="bold">
						13-12-2010</a></td>
						<td valign="top" align="left">Repainting of the Balcony railings</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Repainting works to ramps at Basement car park.pdf" class="bold">
						13-12-2010</a></td>
						<td valign="top" align="left">Repainting works to ramps at Basement car park </td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Repainting of Balcony Areas at Blk 11, Unit 03 &amp; 04.pdf" class="bold">
						06-12-2010</a></td>
						<td valign="top" align="left">Repainting of Balcony Areas at Blk 11, Unit #-03 &amp; Unit #-04</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Schedule of repainting works at Blk 9_02 Ardmore Park.pdf" class="bold">
						02-12-2010</a></td>
						<td valign="top" align="left">Schedule of Repainting works at Blk 9_02 Ardmore Park</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/December 10.doc" class="bold">
						01-12-2010</a></td>
						<td valign="top" align="left">December 2010 servicing schedule/ Closure of Clubhouse for repainting/ Disposal of bulky waste</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Schedule of repainting works at Blk 15 _04.pdf" class="bold">
						26-11-2010</a></td>
						<td valign="top" align="left">Schedule of repainting works at Blk 15 #04 Ardmore Park </td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Repainting works for Function rooms_Pool and Ent_ Gym.pdf" class="bold">
						26-11-2010</a></td>
						<td valign="top" align="left">Repainting works for Function rooms, Pool and Gymnasium</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/22_ScheduleofrepaintingworksatBlk1102units.pdf" class="bold">
						25-11-2010</a></td>
						<td valign="top" align="left">Schedule of repainting works at Blk 11, Unit No. #02 Ardmore Park </td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/21_RepaintingofBalconyAreaatBlk11UnitNo.02.pdf" class="bold">
						22-11-2010</a></td>
						<td valign="top" align="left">Repainting of balcony area at Blk 11, Unit No. #02</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/20_RepaintingofBalconyAreaatBlk9unitno.02-04to28-04.pdf" class="bold">
						16-11-2010</a></td>
						<td valign="top" align="left">Repainting of balcony area at Blk 9 Unit No. #02-04 to #28-04</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/19_RepaintingofBalconyareaatBlk15unitno.02-03to28-03.pdf" class="bold">
						12-11-2010</a></td>
						<td valign="top" align="left">Repainting of balcony area at Blk 15, unit no. 02-03 to 28-03 Ardmore Park </td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/18_RepaintingworkstoBlk15B1carpark.pdf" class="bold">
						02-11-2010</a></td>
						<td valign="top" align="left">Repainting works to Blk 15 B1 carpark</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/ServicingScheduleforNov2010_Petownership_Magazines.doc" class="bold">
						01-11-2010</a></td>
						<td valign="top" align="left">Servicing Schedule for Nov 2010/ Pet ownership/ Magazines</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/17_RepaintingofBalconyAreaatBlk11UnitNo.01.pdf" class="bold">
						27-10-2010</a></td>
						<td valign="top" align="left">Repainting of Balcony area at Blk 11 Unit No. #01</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/16_RepairtoHollowPlasteratServiceLiftLobbiesofBlk9and11.pdf" class="bold">
						21-10-2010</a></td>
						<td valign="top" align="left">Repair to hollow plaster at service lift lobbies of Blk 9 and 11</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Repainting works of Balcony area at Blk 15, Unit _02-02 to _28-02.pdf" class="bold">
						11-10-2010</a></td>
						<td valign="top" align="left">Repainting works of balcony area at Blk 15, unit No. #02-02 to #28-02</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/14_RepaintingworksofBalconyareaaBlk 11Unit02-04to28-04.pdf" class="bold">
						11-10-2010</a></td>
						<td valign="top" align="left">Repainting works of Balcony area at Blk 11, unit No. #02-04 to #28-04</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/ServicingScheduleforOctober2010_Repainting_Road Safety.pdf" class="bold">
						01-10-2010</a></td>
						<td valign="top" align="left">Servicing Schedule for October 2010/Repainting/Road Safety</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/13_ProposedGeneralRepairsandRedecorationworks_VoidAreasatBasement1ofBlock11.pdf" class="bold">
						30-09-2010</a></td>
						<td valign="top" align="left">Proposed general repairs and redecoration works - void areas at Basement 1 of Blk 11</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Proposed General repairs &amp; redecoration works to the common property of Ardmore Park - Void areas at Basement 1 of Block 11.pdf" class="bold">
						30-09-2010</a></td>
						<td valign="top" align="left">Proposed General Repairs and Redecoration works - Void Areas at Basement 1 of Block 11</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/12_RepaintingofBalconyAreaatBlk9Unit03units.pdf" class="bold">
						29-09-2010</a></td>
						<td valign="top" align="left">Repainting of Balcony area at Blk 9, unit #-03</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Repainting works at Blk 11_02-01 to 29-01 Ardmore Park.pdf" class="bold">
						28-09-2010</a></td>
						<td valign="top" align="left">Repainting works at Blk 11 #02-01 to #29-01 Ardmore Park</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Schedule of repainting works at Blk 15_02.pdf" class="bold">
						13-09-2010</a></td>
						<td valign="top" align="left">Schedule of repainting works at Blk 15 #02 Ardmore Park</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Repainting of Balcony area at Blk 15, Unit_01.pdf" class="bold">
						13-09-2010</a></td>
						<td valign="top" align="left">Repainting of balcony area at Blk 15, Unit #-01</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/8_Restorationworksinprivateliftsandcarporchareas.pdf" class="bold">
						06-09-2010</a></td>
						<td valign="top" align="left">Restoration works in private lifts and car porch areas</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/7_ScheduleofRepaintingworksatBlk903ArdmorePark.pdf" class="bold">
						03-09-2010</a></td>
						<td valign="top" align="left">Schedule of repainting works at Blk 9#03 Ardmore Park</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/ServicingScheduleforSept 2010_RecyclingProgramme.pdf" class="bold">
						01-09-2010</a></td>
						<td valign="top" align="left">Servicing Schedule for Sept 2010/ Recycling Programme</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/6_RepaintingofBalconyAreaatBlk11,Unit03.pdf" class="bold">
						27-08-2010</a></td>
						<td valign="top" align="left">Repainting of Balcony area at Blk 11, Unit #-03</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Repair to Hollow Plaster at Staircases No 4 and 5.pdf" class="bold">
						19-08-2010</a></td>
						<td valign="top" align="left">Repair to Hollow plaster at staircases No. 4 and 5</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/5_RepairtoHollowPlasteratStaircasesNo.7and8andvoidareasatB1ofBlk15.pdf" class="bold">
						19-08-2010</a></td>
						<td valign="top" align="left">Repair to Hollow plaster at staircases No. 7 and 8 and void areas at B1 of Blk 15</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/ServicingSchedul forAugust2010PreventionofMosquitoBreeding.pdf" class="bold">
						01-08-2010</a></td>
						<td valign="top" align="left">Servicing Schedule for August 2010/ Prevention of Mosquito Breeding</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Blk11_PowerShutdownforservicingofsubstationbyPowerGrid.pdf" class="bold">
						16-07-2010</a></td>
						<td valign="top" align="left">Blk 11 - Power Shutdown for servicing of substation by Power Grid</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Blk 9_Powershutdownforservicingofsubstation.pdf" class="bold">
						16-07-2010</a></td>
						<td valign="top" align="left">Blk 9 - Power Shutdown for servicing of substation by Power Grid  </td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Blk15_Powershutdownforservicingofsubstation.pdf" class="bold">
						16-07-2010</a></td>
						<td valign="top" align="left">Blk 15 - Power Shutdown for servicing of substation by Power Grid</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/ServicingScheduleforJuly2010VandalisminMPCarea.doc" class="bold">
						01-07-2010</a></td>
						<td valign="top" align="left">Servicing Schedule for July 2010/ Vandalism in MPC area</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/Schedule of repainting works 11_03 units.pdf" class="bold">
						23-06-2010</a></td>
						<td valign="top" align="left">Schedule of repainting works at Blk 11 #-03 Ardmore Park</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/2_Schedule of repainting works at Blk 15.pdf" class="bold">
						21-06-2010</a></td>
						<td valign="top" align="left">Schedule of repainting works at Blk 15 #01 Ardmore Park</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/RepairsandRepainting,HangingofLaundryandCarParking.pdf" class="bold">
						01-06-2010</a></td>
						<td valign="top" align="left">Repairs and Repainting, Hanging of Laundry and Car Parking</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="" class="bold">
						01-06-2010</a></td>
						<td valign="top" align="left">Repairs and repainting, Hanging of laundry and car parking</td>
					</tr>
                                        <tr>
						<td>&nbsp;</td>
						<td valign="top" align="middle">
						<img width="9" vspace="4" height="7" src="img/leftdot.gif"></td>
						<td valign="top" align="left">
						<a href="bulletin/ServicingScheduleforJune2010.doc" class="bold">
						29-05-2010</a></td>
						<td valign="top" align="left">Servicing Schedule for June 2010</td>
					</tr>
                    				</tbody></table>
                
                </td>
			</tr>
		</table>
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
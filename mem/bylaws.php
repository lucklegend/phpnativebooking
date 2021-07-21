<?php 
	session_start();
	include_once("includes/config.php");
	
	$s_id = $_SESSION['basic_is_logged_in'];
	$query = "SELECT * FROM user_account  WHERE crypted  = '$_GET[crypted]' and id = '$s_id' limit 1";
	$result= mysqli_query($conn, $query) or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result))
	{
			 $id = $row['id'];
			  $user_type = $row['user_type'];
			  $username = $row['username'];
	}
	
	if($_SESSION['basic_is_logged_in'] != $id or $_SESSION['basic_is_logged_in'] =='')
	{
	
	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; </script> ";
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
		<td class="left" vAlign="top" align="left" width="150" background="../img/leftctrbg2.gif">
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
			</tr><?php 
            if($user_type=='1')
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
		<img height="82" src="../img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top">
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="36" src="img/t/bylaws.gif" width="97"></td>
			</tr>
			<tr>
				<td class="content" vAlign="top"><br>
&nbsp;<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table8">
					<tr>
					  <td class="houserules">
						<ol>
                        <li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>">Introduction</a></li>
                        <li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#definitions">Definitions</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#occupancy">Occupancy</a></li>
                        <li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#common">Common Areas</a></li>
                        <li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#resident">Resident Cards</a></li>
                        <li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#proximity">Resident Proximity Card</a></li>
                        <li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#supplementary">Supplementary Card</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#renovation">Renovation</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#bulk">Bulk Delivery and House Removal</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#carparking">Car Parking</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#pet">Pet Owners</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#employees">Employees/ Domestic Helpers/ Drivers</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold1" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#refuse">Refuse Disposal</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#general">General Rules and Regulations Governing the use of 
						Recreational Facilities</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#swimmingpool">Swimming Pool / Jacuzzi / Children&acute;s Pool</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#sauna">Saunas</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#tennis">Tennis Courts</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#function">Function Rooms</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#gym">Gymnasium</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#jogging">Jogging Track and Fitness Corner</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#children">Children&acute;s Playground</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#koi">Koi Pond</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#multi">Multi-Purpose Court (MPC)</a></li>
						<li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#hr">Kitchen at The North Function Room</a></li>
                        <li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#StorageL">Storage Lockers</a></li>
                        <li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#BBQF">BBQ Facilities</a></li>
                        <li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#UNIFORM">Uniform Appearance of Building Facade</a></li>
                        <li style="text-indent:-5px;">&nbsp;&nbsp;&nbsp;<a class="bold" href="general.php?crypted=<?php echo $_GET['crypted']; ?>#POOLTABLE">Pool &amp; Entertainment Room</a></li>
                        </ol>			
                        <p>&nbsp;&nbsp;<a href="BYLAW-Yr-2018.pdf" target="_blank"><img border="0" src="images/d-pdf_02.gif"></a><br/>&nbsp;&nbsp;<span style="font:Arial, Helvetica, sans-serif; font-size:10px">Download the complete by-laws in pdf format.</span>
                                                    
						 <SCRIPT language=javascript>nextDot();endSub();</SCRIPT>
						</p>
                      </td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
		<td class="ctrrgt" vAlign="top" align="right" width="29">
		<img height="82" src="../img/ctrrighttop.gif" width="29"></td>
	</tr>
	<tr>
		<td background="../img/leftbotbg.gif"><SPACER type="block" height="20">
		</td>
		<td vAlign="top" align="left" background="../img/ctrbotctr.gif">
		<img height="20" src="../img/ctrleftbot.gif" width="29"></td>
		<td class="ctrbot" vAlign="top">&nbsp;</td>
		<td vAlign="top" align="right" background="../img/ctrbotctr.gif">
		<img height="20" src="../img/ctrrgtbot.gif" width="29"></td>
	</tr>
</table>
<?php include ("../footer.php"); ?>
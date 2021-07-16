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
		<td class="left" vAlign="top" align="left" width="150" background="http://axonsg.com/projects/ardmorepark/v2/img/leftctrbg2.gif">
		<link href="http://axonsg.com/projects/ardmorepark/v2/textset.css" type="text/css" rel="stylesheet">
		<table cellSpacing="0" cellPadding="0" width="150" border="0" id="table5">
			<tr vAlign="top">
				<td class="lefttop" height="93">&nbsp;</td>
			</tr>
			<tr>
				<td>
				<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table6">
					<tr>
						<td vAlign="top" align="middle"><?php 
				 if($user_type=='1')
				 {
				 
				   echo " &nbsp;&nbsp; Welcome <i><b>Admin [$username]</b></i><br>";
				}else
				{
					 echo " &nbsp;&nbsp; Welcome <i><b>User [$username]</b></i><br>";
				
				}	
				?>
						  <br>
						&nbsp;
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.php')" onmouseout="this.src='img/but_logout_2.gif'" type="image" src="img/but_logout_2.gif" name="I1">
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
				<img height="7" src="http://axonsg.com/projects/ardmorepark/v2/img/leftdot.gif" width="9">
				<a class="copy" href="community.php?crypted=<? echo $_GET['crypted']; ?>#community">Community News</a></td>
			</tr>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr>
			<tr>
				<td class="leftcontent">
				<img height="7" src="http://axonsg.com/projects/ardmorepark/v2/img/leftdot.gif" width="9">
				<a class="copy" href="community.php?crypted=<? echo $_GET['crypted']; ?>#circulars">Circulars</a></td>
			</tr>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr><tr>
				<td class="leftcontent">
				<img height="7" src="http://axonsg.com/projects/ardmorepark/v2/img/leftdot.gif" width="9">
				<a class="copy" href="comm.php?crypted=<? echo $_GET['crypted']; ?>&calender">Calendar Of Events  </a></td>
			</tr>
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="http://axonsg.com/projects/ardmorepark/v2/img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top" align="left">
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<a name="community"><img height="37" src="img/t/communitynews.gif" width="193"></a></td>
			</tr>
			<tr>
				<td class="content" vAlign="top"><hr>
				<table id="table8">
					<tr>
						<td>&nbsp;</td>
						<td vAlign="top" align="middle">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/img/leftdot.gif" width="9" vspace="4"></td>
						<td vAlign="top" align="left">
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/bulletin/t14972.pdf">
						17-04-2007</a></td>
						<td vAlign="top" align="left">GYMNASIUM</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td vAlign="top" align="middle">
						<img height="7" src="http://axonprojects.com/ardmorepark/v2/img/leftdot.gif" width="9" vspace="4"></td>
						<td vAlign="top" align="left">
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/bulletin/Microsoft%20Word%20-%20Sept2006.pdf">
						07-09-2006</a></td>
						<td vAlign="top" align="left">Servicing Schedule for 
						September</td>
					</tr>
				</table>
				<p>&nbsp;</p>
				<p>
                <a name="circular">
				<img height="26" src="img/t/circulars.gif" width="97" border="0"></a></p>
				<hr>
				<table id="table9">
					<tr>
						<td>&nbsp;</td>
						<td vAlign="top" align="middle">
						<img height="7" src="http://axonsg.com/projects/ardmorepark/v2/img/leftdot.gif" width="9" vspace="4"></td>
						<td vAlign="top" align="left">
						<a class="bold" href="http://axonprojects.com/ardmorepark/v2/bulletin/Microsoft%20Word%20-%20external%20parapet%20wall%20repair%20250806.pdf">
						07-09-2006</a></td>
						<td vAlign="top" align="left">Extenal parapet wall 
						repair</td>
					</tr>
				</table>
                </td>
			</tr>
		</table>
		</td>
		<td class="ctrrgt" vAlign="top" align="right" width="29">
		<img height="82" src="http://axonsg.com/projects/ardmorepark/v2/img/ctrrighttop.gif" width="29"></td>
	</tr>
	<tr>
		<td background="http://axonsg.com/projects/ardmorepark/v2/img/leftbotbg.gif"><SPACER type="block" height="20">
		</td>
		<td vAlign="top" align="left" background="http://axonsg.com/projects/ardmorepark/v2/img/ctrbotctr.gif">
		<img height="20" src="http://axonsg.com/projects/ardmorepark/v2/img/ctrleftbot.gif" width="29"></td>
		<td class="ctrbot" vAlign="top">&nbsp;</td>
		<td vAlign="top" align="right" background="http://axonsg.com/projects/ardmorepark/v2/img/ctrbotctr.gif">
		<img height="20" src="http://axonsg.com/projects/ardmorepark/v2/img/ctrrgtbot.gif" width="29"></td>
	</tr>
</table>
<? include ("../footer.php"); ?>
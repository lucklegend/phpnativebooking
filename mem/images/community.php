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
				<td class="ctrtop" vAlign="bottom" height="82">
				<a name="community"><img height="37" src="img/t/communitynews.gif" width="193"></a></td>
			</tr>
			<tr>
				<td class="content" vAlign="top"><hr>
				<table id="table8">
					<?
                    $sql = "SELECT * FROM circular WHERE section = 'Community News' ORDER BY date_start DESC";
					$result = mysql_query($sql);
					while ($row = mysql_fetch_array($result))
					{
					?>
                    <tr>
						<td>&nbsp;</td>
						<td vAlign="top" align="middle">
						  <a href="CLEANING OF OVERHEAD PIPES-FLOOR SCRUBBING AT BLOCK 9and11 (BASEMENT 1).pdf"><img height="7" src="img/leftdot.gif" width="9" vspace="4"></a></td>
						<td vAlign="top" align="left">
						  <a href="CLEANING OF OVERHEAD PIPES-FLOOR SCRUBBING AT BLOCK 9and11 (BASEMENT 1).pdf">
						  <? echo change_format($row['date_start']); ?></a></td>
						<td vAlign="top" align="left"><a href="CLEANING OF OVERHEAD PIPES-FLOOR SCRUBBING AT BLOCK 9and11 (BASEMENT 1).pdf"><? echo $row['title']; ?></a></td>
					</tr>
                    <?
					}
					?>
				</table>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<a name="circular">

				<img height="26" src="img/t/circulars.gif" width="97" border="0"></a><a href="CLEANING OF OVERHEAD PIPES-FLOOR SCRUBBING AT BLOCK 9and11 (BASEMENT 1).pdf">
				</p>
				</a>
				<hr>


                <a href="CLEANING OF OVERHEAD PIPES-FLOOR SCRUBBING AT BLOCK 9and11 (BASEMENT 1).pdf">
<!--temp banner !-->
<!--Car Park Resurfacing Works Phase 11.pdf-->
				</a>
                <p><a href="mem/bulletin/CLEANING OF OVERHEAD PIPES-FLOOR SCRUBBING AT BLOCK 9and11 (BASEMENT 1).pdf" target="_blank"><img border="0" src="painting1_new.jpg" width="340" height="112" style="border: 1px solid #800000" /></a></p>
                <a href="CLEANING OF OVERHEAD PIPES-FLOOR SCRUBBING AT BLOCK 9and11 (BASEMENT 1).pdf">
                <!--end !-->
				</a>
                <table id="table9">
					<?
                    $sql = "SELECT * FROM circular WHERE section = 'Circulars' ORDER BY date_start DESC";
					$result = mysql_query($sql);
					while ($row = mysql_fetch_array($result))
					{
					?>
                    <tr>
						<td>&nbsp;</td>
						<td vAlign="top" align="middle">
						  <a href="CLEANING OF OVERHEAD PIPES-FLOOR SCRUBBING AT BLOCK 9and11 (BASEMENT 1).pdf"><img height="7" src="img/leftdot.gif" width="9" vspace="4"></a></td>
						<td vAlign="top" align="left">
						  <a href="CLEANING OF OVERHEAD PIPES-FLOOR SCRUBBING AT BLOCK 9and11 (BASEMENT 1).pdf">
						  <? echo change_format($row['date_start']); ?></a></td>
						<td vAlign="top" align="left"><a href="CLEANING OF OVERHEAD PIPES-FLOOR SCRUBBING AT BLOCK 9and11 (BASEMENT 1).pdf"><? echo $row['title']; ?></a></td>
					</tr>
                    <?
					}
					?>
				</table>              </td>
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
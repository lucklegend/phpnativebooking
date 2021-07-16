<?php 
session_start();
include_once("includes/config.php");

function change_format ($date) {

$new_date = explode("-", $date);
return $better_date = $new_date[2] . "-" . $new_date[1] . "-" . $new_date[0];

}

$s_id = $_SESSION['basic_is_logged_in'];
$query = "SELECT * FROM user_account  WHERE crypted  = '".$_GET['crypted']."' AND id = '".$s_id."' LIMIT 1";

//exit;
	$result= mysqli_query($conn, $query) or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result))
	{
			 $id = $row['id'];
			 $user_type = $row['user_type'];
			 $username = $row['username'];
			 
	}
	
	if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{

	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; </script> ";
			exit;
	}	
if(isset($_POST['szID']))
{
	$query  = "SELECT * FROM user_account  WHERE username = '".$_POST['szID']."' AND password = '".$_POST['szPassword']."' AND active = '1'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
	
	$count = mysqli_num_rows($result);
	
	if($count != '0' )
	{
 		while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
 		{
			$id = $row['id'];
			$crypted = $row['crypt'];
		 	$_SESSION['basic_is_logged_in'] = $id;
			
			include_once('random_char.php');
			$query = "UPDATE user_account SET crypted = '".$pwd."' WHERE id = '".$id."' LIMIT 1";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn)) ; 
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
<?php include ("../headermem.php"); ?>
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
            <?php if($user_type=='1')
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
					<?php
                    $sql = "SELECT * FROM circular WHERE section = 'Community News' ORDER BY date_start DESC";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($result))
					{
					?>
                    <tr>
						<td>&nbsp;</td>
						<td vAlign="top" align="middle">
						<img height="7" src="img/leftdot.gif" width="9" vspace="4"></td>
						<td vAlign="top" align="left">
						<a class="bold" href="<?php echo $row['attachment']; ?>" target="_blank">
						<?php echo change_format($row['date_start']); ?></a></td>
						<td vAlign="top" align="left"><?php echo $row['title']; ?></td>
					</tr>
                    <?php
					}
					?>
				</table>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<a name="circular">

				<img height="26" src="img/t/circulars.gif" width="97" border="0"></a></p>
				<hr>


<!--temp banner !-->
				<!--<p><a target="_blank" href="bulletin/CLEANINGOFOVERHEADPIPES-FLOORSCRUBBINGATBLOCK9and11BASEMENT-1.pdf" >
				<img border="0" src="painting1_new.jpg" width="340" height="112" style="border: 1px solid #800000"></a></p>-->
<!--end !-->




				<table id="table9">
					<?php
                    $sql = "SELECT * FROM circular WHERE section = 'Circulars' ORDER BY date_start DESC";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($result))
					{
					?>
                    <tr>
						<td>&nbsp;</td>
						<td vAlign="top" align="middle">
						<img height="7" src="img/leftdot.gif" width="9" vspace="4"></td>
						<td vAlign="top" align="left">
						<a class="bold" href="<?php echo $row['attachment']; ?>"  target="_blank">
						<?php echo change_format($row['date_start']); ?></a></td>
						<td vAlign="top" align="left"><?php echo $row['title']; ?></td>
					</tr>
                    <?php
					}
					?>
				</table>
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
<?php include ("../footer.php"); ?>
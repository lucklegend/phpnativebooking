<?php 
session_start();
include_once("includes/config.php");
$s_id = $_SESSION['basic_is_logged_in'];
$query = "SELECT * FROM user_account  WHERE crypted  = '".$_GET['crypted']."' AND id = '".$s_id."' limit 1";
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
	$query  = "SELECT * FROM user_account  where username = '".$_POST['szID']."' and password = '".$_POST['szPassword']."' and active = '1'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
	$count = mysqli_num_rows($result);
	if($count != '0' )
	{
 		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
 		{
    		
			$id = $row['id'];
			$crypted = $row['crypt'];
		 	$_SESSION['basic_is_logged_in'] = "$id";
			include_once('random_char.php');
			$query = "UPDATE user_account SET crypted = '$pwd' where id = '$id' limit 1";
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
		<td class="topspace" vAlign="top" align="left" colSpan="4"><SPACER type="block"></SPACER></td>
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
						<td vAlign="top" align="center" style="padding-top:10px;">
                        <?php 
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
                } ?>
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top">
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="34" src="img/t/applciationforms.gif" width="198"></td>
			</tr>
			<tr>
				<td class="content" vAlign="top"><span class="graypad">
				<span class="copyright2">To download a form, click on
				<img height="25" src="img/but_dwld.gif" width="40" align="absMiddle"> 
				next to the form you wish to download and you will be prompted 
				to save the file.</span></span> <br>
				<br>
&nbsp;<hr><br>
&nbsp;<table cellSpacing="0" cellPadding="0" width="65%" border="0" id="table8">
					<?php
					$sqlforms = "SELECT * FROM forms ORDER BY description ASC";
					$resultforms = mysqli_query($conn,$sqlforms);
					$counter = 0;
					while ($rowforms = mysqli_fetch_array($resultforms))
					{
					?>
                    <tr>
						<td class="<?php if ($counter==0) { $counter++; ?>bk<?php } else { $counter--; ?>bk3<?php } ?>" width="83%">
						<?php if ($counter==1) { $counter--; ?>
                        <img height="7" src="img/leftdot2.gif" width="9"> 
						<?php } else { $counter++; ?>
                        <img height="7" src="img/leftdot3.gif" width="9"> 
						<?php } ?>
						<?php echo $rowforms['description']; ?></td>
						<td class="<?php if ($counter==0) { $counter++; ?>bk<?php } else { $counter--; ?>bk3<?php } ?>" align="middle" width="17%">
						<a href="<?php echo $rowforms['attachment']; ?>" target="_blank">
						<img title="download" height="25" alt="download" src="img/but_dwld.gif" width="40" border="0"></a></td>
					</tr>
                    <?php } ?>
				</table>
				<p>&nbsp;</td>
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
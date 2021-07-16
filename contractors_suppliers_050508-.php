<?
session_start();
include_once("mem/includes/config.php");
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

//	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; <//script> ";
		//	exit;
	}	
?>	
<? include ("header.php"); ?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="8" rowspan="3" align="left" valign="top">&nbsp;</td>
    <td colspan="4" align="left" valign="top" class="topspace"><spacer type="block"></spacer></td>
  </tr>
  <tr>
    <td width="150" align="left" valign="top" background="img/leftctrbg2.gif" class="left"><link rel=stylesheet type="text/css" href="textset.css">
<table width="150"  border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td height="93" class="lefttop">&nbsp;</td>
  </tr>
  <tr>
    <td></td>
  </tr>
   <? if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{

	}
	else
	{
	 ?>
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
						&nbsp;
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('mem/logout.php')" onmouseout="this.src='img/t/but_logout_2.gif'" type="image" src="http://axonprojects.com/ardmorepark/v2/img/t/but_logout_2.gif" name="I1">
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
            <? } ?>
            <?
  if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{
	
	}
	else
	{
	?>
  
            <? } ?>
            <tr>
    <td height="3" class="leftcontent">

    <img src="img/leftdot.gif" width="9" height="7"> 

    <a href="gettingthere.php<? if (isset($_GET['crypted'])) { ?>?crypted=<? echo $_GET['crypted']; } ?>" class="copy">Getting There </a>

  </td>
  </tr>
  <tr>
    <td height="3" class="leftdecline"><spacer type="block" height="3"></spacer></td>
  </tr>
  <tr>
    <td class="leftcontent"><img src="img/leftdot.gif" width="9" height="7"> 

      <a href="contractors_suppliers.php<? if (isset($_GET['crypted'])) { ?>?crypted=<? echo $_GET['crypted']; } ?>" class="copy">Contractor / Supplier
        <br> 
      &nbsp;&nbsp;&nbsp; Guidelines</a>


  </td>
  </tr>
  <?
		 if($_SESSION['basic_is_logged_in'] == $id && isset($_GET['crypted']))
		{
		if($user_type=='1')
		{
			include ("mem/internal-adminmenu-fromoutside.php");
        }
		else
		{ 
			include ("mem/internal-memmenu-fromoutside.php");
		}
		}
		else
		{
	?>
    <tr>
    <td height="3" class="leftdecline"><spacer type="block" height="3"></spacer></td>
  </tr>
    <?
	}
	?>
</table>
</td>
    <td width="29" height="20" align="left" valign="top" class="ctrleft"><img src="img/ctrrgttop.gif" width="29" height="82"></td>
    <td align="left" valign="top" class="ctr"><table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table6">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">&nbsp;</td>
			</tr>
		</table>
		<table cellSpacing="0" cellPadding="10" width="100%" id="table7">
			<tr>
			  <td vAlign="top" width="82%">
				<h3>Contractors / Suppliers</h3>
				<hr><br>
&nbsp;
<table cellspacing="0" cellpadding="5" width="100%" border="0" id="table8">
  <tr>
  <td class="bk3" height="20" style="padding: 5px; font-weight: bold;">Sno
  </td>
  <td class="bk3" height="20" style="padding: 5px; font-weight: bold;">Name of Contractor</td>
  <td class="bk3" height="20" style="padding: 5px; font-weight: bold;">Type of Services</td>
  <td class="bk3" height="20" style="padding: 5px; font-weight: bold;">Contact Details</td>
  </tr>
  <?
					$sqlcontractors = "SELECT * FROM useful_info ORDER BY display_name ASC"; 
					$resultcontractors = mysql_query($sqlcontractors);
					$i = 1;
					while ($rowcontractors = mysql_fetch_array($resultcontractors))
					{
					?>
  <tr>
    <td class="bk" valign="top" width="3%" height="20" style="padding: 5px;"><? echo $i++; ?>
	</td>
	<td class="bk" valign="top" width="30%" height="20" style="padding: 5px;"> <strong><? echo $rowcontractors['display_name']; ?></strong> <br />
        <? //echo $rowcontractors['address']; ?> </td>
    <td class="bk" valign="top" width="35%" height="20" style="padding: 5px;"> <? echo $rowcontractors['category']; ?> </td>
    <td class="bk" valign="top" width="32%" style="padding: 5px;">
      <? if ($rowcontractors['contact']) { ?>
      <? echo $rowcontractors['contact']; ?>
      <? } ?>
      <? if ($rowcontractors['telephone']) { ?>
      <br>
      <strong>Office Tel No:</strong> <? echo $rowcontractors['telephone']; ?>
      <? } ?>
      <? if ($rowcontractors['fax']) { ?>
      <br>
      <strong>Fax:</strong> <? echo $rowcontractors['fax']; ?>
      <? } ?>
      <? if ($rowcontractors['mobile']) { ?>
      <br />
      <strong>Mobile:</strong> <? echo $rowcontractors['mobile']; ?>
      <? } ?>
	  <? if ($rowcontractors['url']) { ?>
      <br />
      <strong>Website:</strong> <? echo $rowcontractors['url']; ?>
      <? } ?></td>
  </tr>
  <? } ?>
</table></td>
			</tr>
		</table>
</td>
    <td width="29" align="right" valign="top" class="ctrrgt"><img src="img/ctrrighttop.gif" width="29" height="82"></td>
  </tr>
  <tr>
    <td background="img/leftbotbg.gif"><spacer type="block" height="20"></td>
    <td align="left" valign="top" background="img/ctrbotctr.gif"><img src="img/ctrleftbot.gif" width="29" height="20"></td>
    <td valign="top" class="ctrbot">&nbsp;</td>
    <td align="right" valign="top" background="img/ctrbotctr.gif"><img src="img/ctrrgtbot.gif" width="29" height="20"></td>
  </tr>
</table>
<? include ("footer.php"); ?>

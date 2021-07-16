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
						<td vAlign="top" align="middle"><br>
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
  <tr>
    <td></td>
  </tr>
</table>
</td>
    <td width="29" height="20" align="left" valign="top" class="ctrleft"><img src="img/ctrrgttop.gif" width="29" height="82"></td>
    <td align="left" valign="top" class="ctr"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="82" valign="bottom" class="ctrtop">
</td>
        </tr>
      </table>


<b>The Management Corporation Strata Title Plan No. 2645 - Ardmore Park</b><br>
13 Ardmore Park #01-01 Singapore 259961<br>

<br>    
Telephone:&nbsp;&nbsp;&nbsp; 6733 0862  <br>
Facsimile:&nbsp;&nbsp;&nbsp;&nbsp; 6733 0872 <br>
Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ardmorepark@ardmorepark.com.sg 
<br>
<br>					
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
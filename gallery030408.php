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
</table>
</td>
    <td width="29" height="20" align="left" valign="top" class="ctrleft"><img src="img/ctrrgttop.gif" width="29" height="82"></td>
    <td align="left" valign="top" class="ctr"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="82" valign="bottom" class="ctrtop"><img src="img/t/residences.gif" width="274" height="26"><a name="residences"></a></td>
        </tr>
      </table>
        <table width="649"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><p><br><span class="t4">Pool Area</span><hr style="border: solid 1px #990000;" />
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
            <td><span class="t4">Swimming Pool</span><br><br />
              <img src="img/photos/1.jpg" width="487" height="329">
            </td>
            <td style="padding-left:10px;"><span class="t4">Children Pool</span><br><br />
              <img src="img/photos/2.jpg" width="487" height="329">
            </td>
            </tr>
            </table>
            
                <p><br><span class="t4">Outdoor Facilities</span><hr style="border: solid 1px #990000;" />
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
            <td><span class="t4">Tennis Courts</span><br><br />
              <img src="img/photos/3.jpg" width="487" height="329">
            </td>
            <td style="padding-left:10px;"><span class="t4">Fitness Corner</span><br><br />
              <img src="img/photos/4.jpg" width="487" height="329">
            </td>
            </tr>
            <tr>
            <td style="padding-top:10px;"><span class="t4">BBQ Pit</span><br><br />
              <img src="img/photos/16.jpg" width="487" height="329">
            </td>
            <td style="padding-left:10px;padding-top:10px;"><span class="t4">Multi Purpose Courts</span><br><br />
              <img src="img/photos/18.jpg" width="487" height="329">
            </td>
            </tr>
            </table>
			
            <p><br><span class="t4">Indoor Facilities</span><hr style="border: solid 1px #990000;" />
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
            <td><span class="t4">Gymnasium</span><br><br />
              <img src="img/photos/12.jpg" width="487" height="329">
            </td>
            <td style="padding-left:10px;"><span class="t4">Function Room</span><br><br />
              <img src="img/photos/13.jpg" width="487" height="329">
            </td>
            </tr>
            <tr>
            <td style="padding-top:10px;"><span class="t4">Storage Lockers</span><br><br />
              <img src="img/photos/17.jpg" width="487" height="329">
            </td>
            <td style="padding-left:10px;">&nbsp;
            </td>
            </tr>
            </table>
            
			<p><br><span class="t4">Koi Area</span><hr style="border: solid 1px #990000;" />
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
            <td><span class="t4">Koi Bridge</span><br><br />
              <img src="img/photos/5.jpg" width="487" height="329">
            </td>
            <td style="padding-left:10px;"><span class="t4">Koi Pond</span><br><br />
              <img src="img/photos/6.jpg" width="487" height="329">
            </td>
            </tr>
            </table>
            
            <p><br><span class="t4">Landscaping</span><hr style="border: solid 1px #990000;" />
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
            <td><span class="t4">Water Feature</span><br><br />
              <img src="img/photos/8.jpg" width="487" height="329">
            </td>
            <td style="padding-left:10px;"><span class="t4">Aerial View</span><br><br />
              <img src="img/photos/9.jpg" width="487" height="329">
            </td>
            </tr>
            </table>  
              
            <p><br><span class="t4">Clubhouse Vicinity</span><hr style="border: solid 1px #990000;" />
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
            <td><span class="t4">Clubhouse</span><br><br />
              <img src="img/photos/10.jpg" width="487" height="329">
            </td>
            <td style="padding-left:10px;"><span class="t4">Clubhouse</span><br><br />
              <img src="img/photos/11.jpg" width="487" height="329">
            </td>
            </tr>
            <tr>
            <td style="padding-top:10px;" colspan="2"><span class="t4">Clubhouse</span><br><br />
              <img src="img/photos/14.jpg" width="608" height="247">
            </td>
            </tr>
            </table>  
              
            <p><br><span class="t4">Basement Facility</span><hr style="border: solid 1px #990000;" />
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
            <td><span class="t4">Basement Carpark</span><br><br />
              <img src="img/photos/15.jpg" width="608" height="247">
            </td>
            <td style="padding-left:10px;">&nbsp;
            </td>
            </tr>
            </table>    
             
            <p align="right"><a href="javascript:history.back(-1)"><img src="img/but_previousgen1.gif" width="25" height="23" border="0" align="right" onMouseOver="this.src='img/but_previousgen2.gif'" onMouseOut="this.src='img/but_previousgen1.gif'"></a></p></td>
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
<link rel=stylesheet type="text/css" href="textset.css">
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="copyright2">
  <tr>
    <td align="left">&nbsp;&nbsp;&copy; copyright Ascengen Solution. Managed by <a href="http://www.kfem.com.sg/" class="copy" target="new">Knight Frank Estate Management Pte Ltd</a></td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;Best viewed with 1024 x 768 resolution by IE 5.5, Netscape 6.0 or above.</td>
  </tr>
</table>

</body>

<!-- Mirrored from www.ascengen.com/ardmorepark/gallery.jsp by HTTrack Website Copier/3.x [XR&CO'2006], Fri, 20 Jul 2007 08:01:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
</html>

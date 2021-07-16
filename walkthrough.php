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
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

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
          <td height="82" valign="bottom" class="ctrtop"><img src="img/t/video.gif" width="204" height="39"></td>
        </tr>
      </table>
        <table width="649"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="376" height="395" valign="top" background="img/video_bg1.jpg"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="39" height="42">&nbsp;</td>
                  <td width="345">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td valign="top" style="padding-left:7px; padding-top:15px;"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','315','height','252','title','walkthrough','src','walkthrough-new','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','walkthrough-new' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="315" height="252" title="walkthrough">
                    <param name="movie" value="walkthrough-new.swf">
                    <param name="quality" value="high">
                    <embed src="walkthrough-new.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="315" height="252"></embed>
                  </object></noscript></td>
                </tr>
            </table></td>
            <td width="273" valign="bottom" background="img/video_bg2.gif"><table width="90%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="img/video_title.gif" width="225" height="51" hspace="8"></td>
                </tr>
                <tr>
                  <td><a href="floorplan.html"><img src="img/video_red1.gif" width="217" height="26" hspace="8" vspace="4" border="0" onMouseOver="this.src='img/video_red2.gif'" onMouseOut="this.src='img/video_red1.gif'"></a></td>
                </tr>
                <tr>
                  <td><a href="floorplan.html#penthouses"><img src="img/video_pent1.gif" width="217" height="26" hspace="8" vspace="4" border="0" onMouseOver="this.src='img/video_pent2.gif'" onMouseOut="this.src='img/video_pent1.gif'"></a></td>
                </tr>
                <tr>
                  <td height="80">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
        </table></td>
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
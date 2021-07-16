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
  <?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>
  <tr>
  <td colspan="3" align="center" style="padding-top:10px;">
  <?
  
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
                <input onMouseOver="this.src='img/but_logout_2.gif'" onClick="location.replace('mem/logout.php')" onMouseOut="this.src='img/but_logout_2.gif'" type="image" src="img/but_logout_2.gif" name="I1">
                <br>&nbsp;
                </td>
                </tr>
                <?
		if($user_type=='1')
		{
			include ("mem/internal-adminmenu-fromoutside.php");
        }
		else
		{ 
			include ("mem/internal-memmenu-fromoutside.php");
		}
		?>
			   <?
			   }
			   ?>
</table>
</td>
    <td width="29" height="20" align="left" valign="top" class="ctrleft"><img src="img/ctrrgttop.gif" width="29" height="82"></td>
    <td align="left" valign="top" class="ctr"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="82" valign="bottom" class="ctrtop"><img src="img/t/sitemap.gif" width="108" height="35"></td>
        </tr>
      </table>
	        <p><span class="t4 fontitle"><img src="img/leftdot2.gif" width="9" height="7" hspace="6" vspace="1"><a style="color:#CC6600;" href="home.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>">Main</a></span><br>
		<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>
        <img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a style="color:#666666;"  href="login.php" class="copy">login</a><br>
        <? } ?>
	  <img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a style="color:#666666;"  href="walkthrough.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>">Virtual Walk-Through of Ardmore Park</a><br>
	  <img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a style="color:#666666;"  href="gallery.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>">Photo Gallery </a><br>
	  <img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a style="color:#666666;"  href="facsiteplan.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>">Site Plan</a> 





	        <p><span class="t4 fontitle"><img src="img/leftdot2.gif" width="9" height="7" hspace="6" vspace="1"></span><span class="t4"><a style="color:#CC6600;" href="#">My Profile </a></span><br>
              <img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a style="color:#666666;" href="mem/profile.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>" class="copy">Change Password </a><br>
              <!--img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a href="login.php" class="copy">Masters</a><br-->
              <img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a style="color:#666666;"  href="mem/profile.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>" class="copy">Update Of Information </a>      









	        <p><span class="t4 fontitle"><img src="img/leftdot2.gif" width="9" height="7" hspace="6" vspace="1"></span><span class="t4"><a style="color:#CC6600;" href="#">Facility Booking </a></span><br>
              <img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a style="color:#666666;"  href="mem/booking.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>" class="copy">Facilities Booking</a><br>
              <img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a style="color:#666666;"  href="mem/booking.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; ?>&page=all<? } ?>" class="copy">View / Cancel Bookings</a>                       
	        <p><span class="t4 fontitle"><img src="img/leftdot2.gif" width="9" height="7" hspace="6" vspace="1"></span><span class="t4"><a style="color:#CC6600;" href="#">Our Community</a></span><br>
        <img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a style="color:#666666;"  href="mem/community.php?<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>" class="copy">Community News</a><br>
      <img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a style="color:#666666;"  href="mem/community.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>" class="copy">Circulars </a><br>
      <img src="img/leftdot2.gif" width="9" height="7" hspace="6" class="leftmargin1"><a style="color:#666666;"  href="mem/comm.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; ?>&calender<? } ?>" class="copy">Calendar of Events </a>           
	        <p><span class="t4 fontitle"><img src="img/leftdot2.gif" width="9" height="7" hspace="6" vspace="1"></span><span class="t4"><a style="color:#CC6600;" href="gettingthere.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>">Useful Infomation </a></span>            
	        <p><img src="img/leftdot2.gif" width="9" height="7" hspace="6" vspace="1"><span class="t4"><a style="color:#CC6600;" href="mem/forms.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>">Application Forms </a></span>            
	        <p><img src="img/leftdot2.gif" width="9" height="7" hspace="6" vspace="1"><span class="t4"><a style="color:#CC6600;" href="mem/bylaws.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>">By-laws</a></span>
	                          <p><img src="img/leftdot2.gif" width="9" height="7" hspace="6" vspace="1"><span class="t4"><a style="color:#CC6600;" href="contact_us.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>">Contact Us</a></span><br>
      
  <p>&nbsp;</p>
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

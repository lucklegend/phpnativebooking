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
	}
	
	if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{
	
	 echo "<script type=text/javascript language=javascript> window.location.href = '../home.php?ops=1'; </script> ";
			exit;
	}



 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>

<!-- Mirrored from www.ascengen.com/ardmorepark/home.jsp by HTTrack Website Copier/3.x [XR&CO'2006], Fri, 20 Jul 2007 07:59:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>:: Welcome to Ardmore Park ::</title>
<link rel=stylesheet type="text/css" href="../textset.css">

</head>

<body>
<link rel=stylesheet type="text/css" href="../textset.css">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="122" valign="top" background="../img/top_bg.gif"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="57%" height="88" align="left" valign="top"><img src="../img/sub_logo.gif" width="428" height="46" hspace="10" vspace="10"></td>
        <td width="37%" align="right" valign="top"><a href="../index.html"><img src="../img/but_hm.gif" width="23" height="26" vspace="12" border="0"></a></td>
        <td width="6%" align="center" valign="top"><a href="../sitemap.html"><img src="../img/but_sitemap.gif" width="35" height="28" vspace="12" border="0"></a></td>
      </tr>
		</table>
		<?php
		
		
		include_once("menu.php");
		
		?></td>
  </tr>
</table>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="8" rowspan="3" align="left" valign="top">&nbsp;</td>
    <td colspan="5" align="left" valign="top" class="topspace"><spacer type="block"></spacer></td>
  </tr>
  <tr>
    
    <td width="29" height="20" align="left" valign="top" class="ctrleft"><img src="../img/ctrrgttop.gif" width="29" height="82"></td>
    <td valign="top" class="ctr"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="82" valign="bottom" class="ctrtop"><img src="images/header.gif" width="360" height="82"></td>
        <td valign="bottom" class="ctrtop">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="content"><table width="85%" border="0" align="center">
          <tr>
            <td>Welcome Stuff Goes Here................................. </td>
          </tr>
        </table>
          <p>
		  
		  
		  
		  <?php 
		  
		  
		  if($user_type = '1')
		  {
		  include_once("iner_menu.php");
		  
		  }elseif($user_type = '0')
		  {
		  
		  include_once("iner_menu_resident.php");
		  
		  }elseif($user_type = '2')
		  {
		  
		  include_once("iner_menu_club.php");
		  
		  }
		  
		   ?></p>          </td>
      </tr>
    </table></td>
    <td width="29" align="right" valign="top" class="ctrrgt"><img src="../img/ctrrighttop.gif" width="29" height="82"></td>
  
  </tr>
  <tr>
    <td background="../img/ctrleftbot.gif"><spacer type="block" height="20"></td>
  <td align="left" valign="top" background="../img/ctrbotctr.gif">&nbsp;</td>
  <td valign="top" class="ctrbot"><img src="../img/ctrrgtbot.gif" width="29" height="20"></td>

  </tr>
</table>

<link rel=stylesheet type="text/css" href="../textset.css"><?php include_once("footer.php"); ?>
</body>

<!-- Mirrored from www.ascengen.com/ardmorepark/home.jsp by HTTrack Website Copier/3.x [XR&CO'2006], Fri, 20 Jul 2007 08:00:03 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
</html>

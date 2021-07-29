<?php
session_start();
if(isset($_GET['more'])){
  $more = $_GET['more'];
  $newGet = str_replace('%20', ' ', $_GET['more']);	
}else{
  $more ='';
  $newGet ='';
}

// if (preg_match ('/[^a-z]/i', $more)) { 
//   if(stristr($more, '_') == TRUE) {
//       //echo '"earth" not found in string';
//   }else{
//     echo '<script language=JavaScript>';
//     // echo 'alert("Invalid Entry!");';
//     // echo 'alert("'.$newGet.'");';
//     echo 'self.location.href="gettingthere.php?crypted='.$_GET['crypted'].'";';
//     echo '</script>';
//   }
// }
include_once("mem/includes/config.php");



$s_id = $_SESSION['basic_is_logged_in'];
$query = "SELECT * FROM user_account  WHERE crypted  = '".$_GET['crypted']."' and id = '".$s_id."' limit 1";
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

//	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; <//script> ";
		//	exit;
	}
$_SESSION['more'] = $newGet;
?>	
<?php include ("header.php"); ?>
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
  <?php if($_SESSION['basic_is_logged_in'] != $id or $_SESSION['basic_is_logged_in'] =='')
	{
    //nothing happens? ahha
	}
	else
	{
	 ?>
  <tr>
				<td>
				<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table6">
					<tr>
						<td vAlign="top" align="center" style="padding-top:10px;">
            <?php 
              if($user_type=='1'){
                echo "Welcome <i><b>Admin [$username]</b></i><br>";
              }else if($user_type=='2'){ 
                echo "Welcome <i><b>Club [$username]</b></i><br>";
              }else {
                echo "Welcome <i><b>Resident [$username]</b></i><br>";
              }	
				    ?>
						&nbsp;
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('mem/logout.php')" onmouseout="this.src='img/t/but_logout_2.gif'" type="image" src="img/t/but_logout_2.gif" name="I1">
						<br>
						&nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
            <?php } 

  if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] ==''){
	
	}else{
	  if ($user_type != 0){
	?>
      <tr>
        <td height="3" class="leftcontent">
          <img src="img/leftdot.gif" width="9" height="7"> 
          <a href="gettingthere.php<?php if (isset($_GET['crypted'])) { ?>?crypted=<?php echo $_GET['crypted']; } ?>" class="copy">Getting There </a>
        </td>
      </tr>
      <tr>
        <td height="3" class="leftdecline"><spacer type="block" height="3"></spacer></td>
      </tr>
      <tr>
        <td class="leftcontent"><img src="img/leftdot.gif" width="9" height="7"> 
          <a href="contractors_suppliers.php<?php if (isset($_GET['crypted'])) { ?>?crypted=<?php echo $_GET['crypted']; } ?>" class="copy">Contractor / Supplier
            <br> 
          &nbsp;&nbsp;&nbsp; Guidelines</a>
        </td>
      </tr>
  <?php
  }
  }
  ?>
   <?php
		if($_SESSION['basic_is_logged_in'] == $id && isset($_GET['crypted'])){
      if($user_type=='1')	{
        include ("mem/internal-adminmenu-fromoutside.php");
      }else{ 
        include ("mem/internal-memmenu-fromoutside.php");
      }
		}else{
	?>
    <tr>
    <td height="3" class="leftdecline"><spacer type="block" height="3"></spacer></td>
  </tr>
    <?php
	  }
	?>
	
</table>
</td>
    <td width="29" height="20" align="left" valign="top" class="ctrleft"><img src="img/ctrrgttop.gif" width="29" height="82"></td>
    <td align="left" valign="top" class="ctr"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="82" valign="bottom" class="ctrtop"><img src="img/t/gettingthere.gif" width="148" height="38"></td>
        </tr>
      </table>
        <table cellpadding="10" cellspacing="0" width="100%">
          <tr>
            <td valign="top" align="left" width="18%"><fieldset>
              <legend><font class="bold" color="#333333">Amenities </font></legend>
              <table>
                <tr>
                  <td>&nbsp;</td>
                  <td>
                  <?php 
                    $sqlarmenity = "SELECT * FROM categories ORDER BY title ASC";
                    $resultarmenity = mysqli_query($conn, $sqlarmenity);
                    while ($rowarmenity = mysqli_fetch_array($resultarmenity))
                    {
                    ?>
                      <li><a href="gettingthere.php?more=<?php echo $rowarmenity['title']; ?><?php if (isset($_GET['crypted'])) { ?>&crypted=<?php echo $_GET['crypted']; } ?>"><?php echo $rowarmenity['title']; ?></a></li>
                    <?php 
                    }
                    ?>                      
                  </td>
                </tr>
              </table>
              </fieldset>
                <p>13 Ardmore Park #01-01<br>
        Singapore 259961 <br>
        Tel: +65 6733 0862<br>
        Fax: +65 6733 0872</p></td>
            <td valign="top" width="82%" align="left"><?php if ($more == '') { ?><table width="431" cellpadding="0" cellspacing="0"><tr><td align="center"><img src="img/map.gif" width="431" height="430">
                
<br><div style="visibility:hidden;">
<a href="http://www.streetdirectory.com/asia_travel/travel/travel.php?travel_site=27639&amp;travel_id=10579&amp;star=1" target="_blank">Please click for more information and detailed map of the location</a></div></td></tr></table><?php } else {

include ("armenitycontent.php");
}
?>
            </td>
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
<?php include ("footer.php"); ?>

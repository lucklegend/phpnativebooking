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
	 $username = $row[username];
}
	
if($_SESSION['basic_is_logged_in'] != $id or $_SESSION['basic_is_logged_in'] =='')
{
	echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; </script> ";
	exit;
}

if (isset($_GET['remove']) && $_GET['remove'] != '')
{
	$query  = "DELETE FROM table_barred WHERE id = '$_GET[remove]'";
	$result = mysql_query($query) or die(mysql_error()) ;
	echo "<script type=text/javascript language=javascript> window.location.href = 'barring.php?crypted=$_GET[crypted]'; </script>"; 

}	

if(isset($_POST[submit]))
{
	$sqlfacility = "SELECT * FROM facility WHERE unique_no = " . $_POST['facility_id'];
	$resultfacility = mysql_query($sqlfacility);
	$rowfacility = mysql_fetch_array($resultfacility);
	$month_blocked = $rowfacility['month_blocked'];
	$dates     = explode("-", $_POST['last_booking']);
	$day     = $dates['0'];
	$month    = $dates['1'];
	$year     = $dates['2'];
	$expiry = mktime(0,0,0,$month+$month_blocked,$day,$year);
	$bar_expiry = date("Y-m-d", $expiry);
	$_user_id		=	$_POST['user_id'];
	$_facility_id	=	$_POST['facility_id'];
	$_last_booking	=	$_POST['last_booking'];
	$query  = "INSERT INTO table_barred (user_id, facility_id, last_booking, bar_expiry) VALUES ('$_user_id', '$_facility_id', '$_last_booking', '$bar_expiry')";
	$result = mysql_query($query) or die(mysql_error()) ;
	echo "<script type=text/javascript language=javascript> window.location.href = 'barring.php?crypted=$_GET[crypted]'; </script>"; 
}

$month = array('01' => 'January','02' => 'February','03' => 'March','04' => 'April','05' => 'May','06' => 'June','07' => 'July','08' => 'August','09' => 'September','10' => 'October','11' => 'November','12' => 'December')
?>
<style type="text/css">

#dhtmltooltip{
position: absolute;
width: 150px;
border: 2px solid black;
padding: 2px;
background-color: lightyellow;
visibility: hidden;
z-index: 100;
/*Remove below line to remove shadow. Below line should always appear last within this CSS*/
filter: progid:DXImageTransform.Microsoft.Shadow(color=gray,direction=135);
}
.style2 {font-weight: bold}
</style>
<div id="dhtmltooltip"></div>


 
 
 </html>
<html>
<head>
<script src="includes/FormManager.js">

</script>


<link type="text/css" rel="stylesheet" href="../dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="../dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>:: Welcome to Ardmore Park ::</title>
<link rel=stylesheet type="text/css" href="../textset.css">
<link rel="stylesheet" href="css/form-field-tooltip.css" media="screen" type="text/css">
	<script type="text/javascript" src="js/rounded-corners.js"></script>
	<script type="text/javascript" src="js/form-field-tooltip.js"></script>
	<script>
<!--


var winheight=50
var winsize=50
var x=5





function openwindow(thelocation){
temploc=thelocation
if (!(window.resizeTo&&document.all)&&!(window.resizeTo&&document.getElementById)){
window.open(thelocation)
return
}
win2=window.open("","","scrollbars")
win2.moveTo(0,0)
win2.resizeTo(100,100)
go2()
}
function go2(){
if (winheight>=screen.availHeight-3)
x=0
win2.resizeBy(5,x)
winheight+=5
winsize+=5
if (winsize>=screen.width-5){
win2.location=temploc
winheight=100
winsize=100
x=5
return
}
setTimeout("go2()",50)
}
//-->
</script>
</head>
<? include ("../headermem.php"); ?>
<script type="text/javascript">
var offsetxpoint=-60 //Customize x offset of tooltip
var offsetypoint=20 //Customize y offset of tooltip
var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thecolor, thewidth){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20

var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth)
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"
else if (curX<leftedge)
tipobj.style.left="5px"
else
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetxpoint+"px"

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight)
tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
else
tipobj.style.top=curY+offsetypoint+"px"
tipobj.style.visibility="visible"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

document.onmousemove=positiontip

</script>
 
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
            	<td vAlign="top" align="middle" style="padding-top:10px;">
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
                <input onMouseOver="this.src='img/but_logout_2.gif'" onClick="location.replace('logout.php')" onMouseOut="this.src='img/but_logout_2.gif'" type="image" src="img/but_logout_2.gif" name="I1">
                <br>&nbsp;
                </td>
            </tr>
            </table>
          	</td>
        </tr>
        <? 
		if($user_type=='1')
		{
			include ("internal-adminmenu.php");
        }
		else
		{ 
			include ("internal-memmenu.php");
		}
		?>
        <tr>
			<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
		</tr>
		<?php
		/* 
		if($user_type =='1')
		{
		?>
        <tr>   
        	<td class="leftcontent"><img height="7" src="img/leftdot.gif" width="9"><a class="copy" href="booking.php?crypted=<?php echo $_GET[crypted]; ?>&cr=1"> Create Facilities</a> </td>
        </tr>
		<tr>
			<td class="leftdecline" height="3"><SPACER type="block" height="3"></SPACER></td>
		</tr>
        <?php
		}
		else
		{
			echo "";
		}
		*/
		$start_month = date('-m-Y');
		?>
        <tr>
			<td class="leftdecline" height="3"><SPACER type="block" height="3"></SPACER></td>
		</tr>
	  </table>
	</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20"><img height="82" src="img/ctrrgttop.gif" width="29"></td>		
		<td class="ctr" vAlign="top">
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
		<tr>
			<td height="82" colspan="5" vAlign="bottom" class="ctrtop"><img height="37" src="img/t/managementoffice.gif" width="218"></td>
		</tr>
        <tr>
		  <td colspan="5" vAlign="top" class="content">The following users has been barred from using the booking system on the designated facility listed.</td>
		  </tr>
          <tr>
		  <td colspan="5" vAlign="top" class="content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="5%" bgcolor="#944542" style="border-left:0px solid #b09852;border-left:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><span class="style2">No</span></td>
    <td width="17%" bgcolor="#944542" style="border-left:1px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><strong>User</strong></td>
    <td width="17%" bgcolor="#944542" style="border-left:0px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><strong>Facility</strong></td>
    <td width="30%" bgcolor="#944542" style="border-left:0px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><strong>Date Last Booked</strong></td>
    <td width="24%" bgcolor="#944542" style="border-left:0px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><strong>Bar Expiry</strong></td>
    <td width="31%" bgcolor="#944542" style="border-left:0px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><strong>&nbsp;</strong></td>
  </tr>
  <?
  $current_date = date('Y-m-d');
  $sqlsearch = "SELECT * FROM table_barred WHERE bar_expiry >= '$new_current_date'";
  $resultsearch = mysql_query($sqlsearch);
  $countsearch = mysql_num_rows($resultsearch);
  if ($countsearch == 0)
  {
  ?>
  <tr>
    <td colspan="6" style="border-left:1px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;">No user was found misusing the booking system.</td>
  </tr>
  <? } else { $foundsearch = 1; ?>
  <tr>
    <td colspan="6" style="border-left:1px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><b><? echo $countsearch; ?></b> user was found misusing the booking system.</td>
  </tr>
  <? while ($rowsearch = mysql_fetch_array($resultsearch)) { ?>
  <? 
  $sqluser = "SELECT * FROM user_account WHERE id = " . $rowsearch['user_id'];
  $resultuser = mysql_query($sqluser);
  $rowuser = mysql_fetch_array($resultuser);
  
  $sqlfacility = "SELECT * FROM facility WHERE unique_no = " . $rowsearch['facility_id'];
  $resultfacility = mysql_query($sqlfacility);
  $rowfacility = mysql_fetch_array($resultfacility);
  $lastbooked = explode("-", $rowsearch['last_booking']);
  $last_booking = $lastbooked[0] . " " . $month[$lastbooked[1]] . " " . $lastbooked[2]; 
  $barexpiry = explode("-", $rowsearch['bar_expiry']);
  $bar_expiry = $barexpiry[2] . " " . $month[$barexpiry[1]] . " " . $barexpiry[0];
   
  ?>
  <tr>
    <td style="border-left:1px solid #b09852; <? if ($foundsearch == 1) { ?>border-top:1px solid #b09852;<? } ?>border-right:1px solid #b09852; border-bottom:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><? echo $foundsearch; ?></td>
    <td style="border-left:0px solid #b09852; <? if ($foundsearch == 1) { ?>border-top:1px solid #b09852;<? } ?>border-right:1px solid #b09852; border-bottom:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><? echo $rowuser['name']; ?></td>
    <td style="border-left:0px solid #b09852; <? if ($foundsearch == 1) { ?>border-top:1px solid #b09852;<? } ?>border-right:1px solid #b09852; border-bottom:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><? echo $rowfacility['name']; ?></td>
    <td style="border-left:0px solid #b09852; <? if ($foundsearch == 1) { ?>border-top:1px solid #b09852;<? } ?>border-right:1px solid #b09852; border-bottom:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><? echo $last_booking; ?></td>
    <td style="border-left:0px solid #b09852; <? if ($foundsearch == 1) { ?>border-top:1px solid #b09852;<? } ?>border-right:1px solid #b09852; border-bottom:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><? echo $bar_expiry; ?></td>
    <td style="border-left:0px solid #b09852; <? if ($foundsearch == 1) { ?>border-top:1px solid #b09852;<? } ?>border-right:1px solid #b09852; border-bottom:1px solid #b09852; padding-left:0px; padding-top:5px; padding-bottom:5px;" align="center">[ <a href="barring.php?remove=<? echo $rowsearch['id']; ?>&crypted=<? echo $_GET[crypted]; ?>">remove</a> ] </td>
  </tr>
  <? $foundsearch++; } ?>
  <? } ?>
</table>          </td>
		  </tr>
        <tr>
		  <td colspan="4" vAlign="top" class="content">Use the form below to bar the user from making any booking on a facility.</td>
		  </tr>
          <form name="barring" method="post" action="?crypted=<? echo $_GET['crypted']; ?>">
          <tr>
		  <td width="200" vAlign="top" class="content">User :&nbsp;&nbsp;
		    <select name="user_id">
          <option value="">Please select user</option>
		  <? 
		  $sqlusers = "SELECT * FROM user_account ORDER BY username ASC";
		  $resultusers = mysql_query($sqlusers);
		  while ($rowusers = mysql_fetch_array($resultusers))
		  {
		  ?>
          		<option value="<? echo $rowusers['id']; ?>"><? echo $rowusers['username']; ?></option>
		  <?
		  }
		  ?>
          </select></td>
		  <td width="210" vAlign="top" class="content">Facility : &nbsp;&nbsp;
		    <select name="facility_id">
          <option value="">Please select facility</option>
		  <? 
		  $sqlfacility = "SELECT * FROM facility ORDER BY name ASC";
		  $resultfacility = mysql_query($sqlfacility);
		  while ($rowfacility = mysql_fetch_array($resultfacility))
		  {
		  ?>
          <option value="<? echo $rowfacility['unique_no']; ?>"><? echo $rowfacility['name']; ?></option>
		  <?
		  }
		  ?>
          </select></td>
		  <td width="250" vAlign="top" class="content">Date Last Booked : &nbsp;&nbsp;
		    <input name="last_booking" type="text" size="8" maxlength="10" readonly="">
       		<img src="images/icon-calender.gif" alt="View Calender" width="19" height="18"  onclick="displayCalendar(document.forms[0].last_booking,'dd-mm-yyyy',this)" value="Cal"></td>
          <td width="300" align="left" vAlign="top" class="content"><input type="submit" name="submit" value="submit"></td>
          </tr>
          <tr>
		  <td colspan="4" vAlign="top" class="content">&nbsp;</td>
		  </tr>
          <tr>
		  <td colspan="4" vAlign="top" class="content">&nbsp;</td>
		  </tr>
          <tr>
		  <td colspan="4" vAlign="top" class="content">&nbsp;</td>
		  </tr>
          </form>
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
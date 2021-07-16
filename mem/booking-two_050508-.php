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

if(isset($_POST[szID]))
{
	$query  = "SELECT * FROM user_account  where username = '$_POST[szID]' and password = '$_POST[szPassword]' and active = '1'";
	$result = mysql_query($query) or die(mysql_error()) ;
	
	$count = mysql_num_rows($result);
	
	if($count != '0' )
	{
 		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
 		{
    		
			$id = $row['id'];
			$crypted = $row['crypt'];
		 	$_SESSION['basic_is_logged_in'] = "$id";
			include_once('random_char.php');
			$query = "update user_account set crypted = '$pwd' where id = '$id' limit 1";
			$result = mysql_query($query) or die(mysql_error()) ; 
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

 .style1 {font-weight: bold}
 </style>
<div id="dhtmltooltip"></div>


 
 
 <style type="text/css">
<!--
.style1 {font-size: 16px}
-->
 </style>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
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
			<td class="ctrtop" vAlign="bottom" height="82"><img height="36" src="img/t/online.gif" width="263"></td>
		</tr>
		<tr>
			<td class="content" vAlign="top"><p>
			<?php
	   		if($_GET[cr] =='1' and $_GET[pr] =='')
			{
	   			unset($_SESSION[facility]);
				$_SESSION[track] = time();
			 	echo "<script type=text/javascript language=javascript> window.location.href = 'booking.php?crypted=$_GET[crypted]&cr=1&pr=1'; </script> ";
				exit;
			}
		   	if($user_type =='1' and $_GET[cr] =='1' and $_GET[pr] =='1' and $_SESSION[track] !='')
		   	{
			?>
            <script type="text/javascript">
			window.onload = function() {
			setupDependencies('form'); //name of form(s). Seperate each with a comma (ie: 'weboptions', 'myotherform' )
	 		};
            </script>
            <?
	  	 	if(isset($_POST[Submit]))
		   	{
				$_SESSION[facility] = $_POST;
			   	$from_date = explode('.',$_POST[from_date]);
			   	$from_date_start_day = $from_date[0];
			   	$from_date_start_month = $from_date[1];
			   	$from_date_start_year = $from_date[2];
			   	$to_date = explode('.',$_POST[to_date]);
			   	$to_date_day = $to_date[0];
			   	$to_date_month = $to_date[1];
			   	$to_date_year = $to_date[2];
				
				// print_r($_SESSION[facility]);
		 		$query = "insert into facility (unique_no,created_by,created_on,name,deposite,auto_apporve,max_booking_per_day,rule1_1,rule1_2,rule1_3,relation_rule_1,rule2_1,rule2_2,rule2_3,relation_rule_2,rule3_1,rule3_2,rule3_3,open_from,closed_at,os,from_time,max_time,hours,auto_close_date,auto_close_start_day,auto_close_start_month,auto_close_start_year,auto_close_end_day,auto_close_end_month,auto_close_end_year,from_date,to_date,frame,message,auto_cal,type,month_blocked,absent_amount,month_period) values ('$_SESSION[track]','$id','$_POST[creation_date]','$_POST[name]','$_POST[deposite]','$_POST[auto]','$_POST[booking_per_day]','$_POST[rule1_1]','$_POST[rule1_2]','$_POST[rule1_3]','$_POST[logic_one]','$_POST[rule2_1]','$_POST[rule2_2]','$_POST[rule2_3]','$_POST[logic_two]','$_POST[rule3_1]','$_POST[rule3_2]','$_POST[rule3_3]','$_POST[open_from]','$_POST[closed_at]','$_POST[os]','$_POST[from]','$_POST[max]','$_POST[hrs]','$from_date_start_day','$from_date_start_month','$from_date_start_year','$to_date_day','$to_date_month','$to_date_year','$_POST[auto_close]','$_POST[from_date]','$_POST[to_date]','$_POST[frame]','$_POST[message]','$_POST[auto_cal]','$_POST[type]','$_POST[month_blocked]','$_POST[absent_amount]','$_POST[month_period]')";
			   	mysql_query($query) or die(mysql_error());
				unset($_SESSION[facility]);
				echo "<script type=text/javascript language=javascript> window.location.href = 'booking.php?crypted=$_GET[crypted]&page=view'; </script> ";
				exit;
		   	}
	 		if(isset($_POST[down]))
			{
				if($_POST[from_time] > $_POST[to_time])
				{
					$er =1;
				}
				else
				{
					$query = "select * from track_time where track = '$_SESSION[track]'";
					$result  = mysql_query($query) or die(mysql_error());
					while($row=mysql_fetch_array($result))
					{
						if(($_POST[from_time] < $row[to_time]) and ($_POST[week] =='0' or $_POST[week] ==$row[weak]))
						{
							$er =1;
						}
					}
				}

				//print_r($_POST);
		
				if($er !='1')
				{
			 		$query = "insert into track_time (track,from_time,to_time,peak,weak) values ('$_SESSION[track]','$_POST[from_time]','$_POST[to_time]','$_POST[peak]','$_POST[week]')";
					mysql_query($query);
				}
				else
				{
					echo "<div align=center><font color=red>Either The time range is already in use or the time range is not right</font></div>";
				}
			}
	  		?>
            </p>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
            	<td style="background-repeat:no-repeat"><div align="right"><img src="images/left_win_10.gif" width="21" height="30" border="0"></div></td>
                <td width="100%%" background="images/middle_win_11.gif">&nbsp;</td>
                <td><img src="images/right_win_14.gif" width="17" height="30"></td>
            </tr>
            <tr>
                <td colspan="3"><form name="form" method="post" action="">
                <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                	<td colspan="13" bgcolor="#944542" class="fontitle txtgrey" style="border-left:0px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><span class="fontitle">&nbsp;<strong>Basic Details </strong></span></td>
                </tr>
                <tr>
                	<td width="136" style="padding-left:15px; padding-top:5px; padding-bottom:5px; border-left:1px solid #990011;"> Name </td>
                    <td width="22" style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><strong>:</strong></td>
                    <td colspan="5" style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><label>
                    <input name="name" type="text" value="<?php echo $_POST[name]; ?>" tooltiptext="Type In Facilite Name Here (e.g: Tennies Court)" >
                    </label></td>
                    <td width="144" style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><div align="right">Creation Date </div></td>
                    <td width="22" style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><strong>:</strong></td>
                    <td width="143" style="padding-left:15px; padding-top:5px; padding-bottom:5px; border-right:0px solid #990011;"><b> &nbsp;
                    <?php
					$date = date("l dS  F Y h:i:s A");
					echo $date;
					
					
					?>
                    </b>&nbsp;
                    <input type="hidden" name="creation_date" value="<?php echo $date; ?>"></td>
				    <td width="54" style="padding-left:15px; padding-top:5px; padding-bottom:5px; border-right:0px solid #990011;">Type</td>
                    <td width="26" style="padding-left:15px; padding-top:5px; padding-bottom:5px; border-right:0px solid #990011;"><strong>:</strong></td>
                    <td width="144" style="padding-left:15px; padding-top:5px; padding-bottom:5px; border-right:1px solid #990011;"><select name="type">
                    <option value="0" selected>Indoor</option>
                    <option value="1">Outdoor</option>
                    </select></td>
                </tr>
                <tr>
                	<td colspan="13" bgcolor="#944542" style="border-left:1px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><span class="fontitle"><strong>&nbsp;Booking Time Range </strong></span></td>
                </tr>
                <tr>
                	<td colspan="13" style="border-left:1px solid #990011; border-right:1px solid #990011;">
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                    	<td>
                        <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                        <tr>
                        	<td width="8%" style="padding-left:10px;">From</td>
							<td width="1%"><strong>:</strong></td>
                            <td width="9%"><label>
                            <select name="from_time" tooltipText="Select the start timing of the facility. (e.g: if the faility is open from morning 10:00 AM then select 10:00 from drop down option)">
                            <?php
							$query = "select * from time_slot ";
							$result = mysql_query($query);
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[id]>$row[time_slot]</option>";
							}
							?>
                            </select>
                            </label></td>
                            <td width="4%">To </td>
                            <td width="1%"><strong>:</strong></td>
                            <td width="12%"><label>
                            <select name="to_time" tooltipText="Select the closing timing of the facility. (e.g: if the faility closes at evening 10:00 PM then select 22:00 from drop down option)">
                            <?php
							$query = "select * from time_slot ";
							$result = mysql_query($query);
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[id]>$row[time_slot]</option>";
							}
							?>
                            </select>
                            </label></td>
                            <td width="7%"><label>Type</label></td>
                            <td width="2%"><strong>:</strong></td>
                            <td width="16%">
                            <select name="peak" tooltipText="Do you want to take this time range as Peak Time or Non-Peak Time, Tip : Remmber you can enter more then one open and close time of a facilities and decalre any time range as Peak Time or Non-Peak Time. ">
                            	<option value="1">Peak Time</option>
                            	<option value="0" selected>Non-Peak Time</option>
                            </select></td>
                            <td width="17%"><div align="right">
                            <select name="week" tooltiptext="After you have selected the time range, you can define this range to specify day of week or all week. Please note that system will verify the range and mis-conflict of time range for you.">
                            	<option value="0" selected>All Week</option>
                                <option value="1">Sunday</option>
                                <option value="2">Monday</option>
                                <option value="3">Tuesday</option>
                                <option value="4">Wednesday</option>
                                <option value="5">Thursday</option>
                                <option value="6">Friday</option>
                                <option value="7">Saturday</option>
                            </select></div>                            </td>
                            <td width="23%"><div align="left">
                            <input type="submit" name="down" value="V">
                            </div></td>
						</tr>
                        </table>                        </td>
					</tr>
                    </table>
                    <?php
					if(isset($_POST[Delete]))
					{
						$delete = explode('x',$_POST[Delete]);
						//print_r($delete);
						mysql_query("delete from track_time where sno = '$delete[1]' limit 1") or die(mysql_error());
					}					
					$query = "select * from track_time where track = '$_SESSION[track]'";
					$result = mysql_query($query);
					$count = mysql_num_rows($result);
					if($count =='0')
					{
						$disabled = "disabled = disabled";
					}
					if($count >='1')
					{
					?>
                    <table width="100%" border="0" align="center" class="sk_bok" cellpadding="5" cellspacing="0">
                    <tr>
                    	<td width="4%" bgcolor="#FCECC7"><div align="center"><strong>Sno</strong></div></td>
                        <td width="23%" bgcolor="#FCECC7" style="border-left:1px solid #990011;"><div align="center"><strong>From</strong></div></td>
                        <td width="23%" bgcolor="#FCECC7" style="border-left:1px solid #990011;"><div align="center"><strong>To</strong></div></td>
                        <td width="21%" bgcolor="#FCECC7" style="border-left:1px solid #990011;"><div align="center"><strong>Peak / Non Peak</strong> </div></td>
                        <td width="21%" bgcolor="#FCECC7" style="border-left:1px solid #990011;"><div align="center"><strong>Week</strong></div></td>
                        <td width="8%" bgcolor="#FCECC7" style="border-left:1px solid #990011;"><div align="center"><strong>Action</strong></div></td>
					</tr>
                    <?php 
					$sr = 1;
					while($row=mysql_fetch_array($result))
					{
						$query1 = "select * from time_slot where id ='$row[from_time]' limit 1";
						$result1 = mysql_query($query1);
						while($row1=mysql_fetch_array($result1))
						{
							$from_time = $row1[time_slot];
						}
						$query1 = "select * from time_slot where id ='$row[to_time]' limit 1";
						$result1 = mysql_query($query1);
						while($row1=mysql_fetch_array($result1))
						{
							$to_time = $row1[time_slot];
						}
					?>
                    <tr align="center">
                    	<td style="border-top:1px solid #990011;"><?php echo $sr; ?></td>
                        <td style="border-left:1px solid #990011; border-top:1px solid #990011;"><?php echo "$from_time"; ?></td>
                        <td style="border-left:1px solid #990011; border-top:1px solid #990011;"><?php echo "$to_time "; ?></td>
                        <td style="border-left:1px solid #990011; border-top:1px solid #990011;">
						<?php 
						if($row[peak] =='1')
						{
							echo "Peak Hour";
						}
						else
						{
							echo "Non - Peak Hour";
						}
						?></td>
                        <td style="border-left:1px solid #990011; border-top:1px solid #990011;"><?php 
						if($row[weak] =='0')
						{
							echo "All Weak";
						}
						elseif($row[weak] =='1')
						{
							echo "Sunday";
						}
						elseif($row[weak] =='2')
						{
							echo "Monday";
						}
						elseif($row[weak] =='3')
						{
							echo "Tuesday";
						}
						elseif($row[weak] =='4')
						{
							echo "Wendesday";
						}
						elseif($row[weak] =='5')
						{
							echo "Thersday";
						}
						elseif($row[weak] =='6')
						{
							echo "Friday";
						}
						elseif($row[weak] =='7')
						{
							echo "Saterday";
						}
						?>                        </td>
                        <td style="border-left:1px solid #990011; border-top:1px solid #990011;"><div align="center">
                        <label><input type="submit" name="Delete" value="Delete x<?php echo $row[sno]; ?>"></label>
                        </div></td>
					</tr>
                    <?php
					$sr++;
					}
					?>
                    </table>
                    <?php
					}
					?>
                	<br>                	</td>
				</tr>
                <tr>
                	<td colspan="13" bgcolor="#944542" style="border-left:1px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><span class="fontitle"><strong>&nbsp;Advance Rules </strong></span></td>
                </tr>
                <tr>
                	<td colspan="13" style="border-left:1px solid #990011; border-right:1px solid #990011; border-bottom:1px solid #990011;">
                    <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr>
                    	<td>Deposit(SGD)</td>
                        <td><strong>:</strong></td>
                        <td><input name="deposite" type="text" value="<?php echo $_SESSION[facility][deposite]; ?>" size="5" maxlength="5" tooltipText="Enter the amount which will be displayed to user while booking the facilities and recipt of same will be issued, If the amount is ZERO then it will be consider as NO CHARGES" <?php echo $disabled; ?>></td>
                        <td><div align="right">Auto Approve </div></td>
                        <td><strong>:</strong></td>
                        <td colspan="8">
						<?php
						if($_SESSION[facility][auto] =='1')
						{
							$checked = "checked";
						}
						else
						{
							$checked = "";
						}
						?>
                        <input name="auto" type="checkbox" value="1" <?php echo $checked; ?> tooltipText="Do you want system to auto aprove the booking as soon as it is requested" <?php echo $disabled; ?>></td>
                        </tr>
                    <tr>
                    	<td colspan="13" bgcolor="#FCECC7">Limit : </td>
                    </tr>
                    <tr>
                    	<td colspan="13"><label>
                        <table width="100%" border="0" align="center" class="sk_bok" cellpadding="5" cellspacing="0">
                        <tr>
                        	<td width="31%">Maximum Booking Allowed Per Day </td>
                            <td width="39%">
							<?php
							if($_SESSION[facility][booking_per_day] =='1')
							{
								$sel1 = "selected = selected";
							}
							elseif($_SESSION[facility][booking_per_day] =='2')
							{
								$sel2 = "selected = selected";
							}
							elseif($_SESSION[facility][booking_per_day] =='3')
							{
							  	$sel3 = "selected = selected";
							}
							elseif($_SESSION[facility][booking_per_day] =='4')
							{
							  	$sel4 = "selected = selected";
							}
							elseif($_SESSION[facility][booking_per_day] =='5')
							{
							  	$sel5 = "selected = selected";
							}
							elseif($_SESSION[facility][booking_per_day] =='6')
							{
							  	$sel6 = "selected = selected";
							}
							?>
                            <select name="booking_per_day" <?php echo $disabled; ?>>
                            	<option value="1" <?php echo $sel1; ?>>1 Booking Per Day</option>
                                <option value="2" <?php echo $sel2; ?>>2 Booking Per Day</option>
                                <option value="3" <?php echo $sel3; ?>>3 Booking Per Day</option>
                                <option value="4" <?php echo $sel4; ?>>4 Booking Per Day</option>
                                <option value="5" <?php echo $sel5; ?>>5 Booking Per Day</option>
                                <option value="6" <?php echo $sel6; ?>>6 Booking Per Day</option>
                            </select></td>
                            <td width="30%" rowspan="6" valign="top"><div align="left">Note : <br>
                            All rules and limit will be ignored below the step where N/A is selected. For example if you have selected Rule 1 as N/A in first drop down box then Rule 2 and rule 3 will be ignored. </div></td>
						</tr>
                        <tr>
                        	<td>Rule 1 </td>
                            <td>
							<?php
							if($_SESSION[facility][rule1_1] =='0')
							{
								$selrule1_0 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='1')
							{
							  	$selrule1_1 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='2')
							{
								$selrule1_2 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='3')
							{
							  	$selrule1_3 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='4')
							{
								$selrule1_4 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='5')
							{
							 	$selrule1_5 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='6')
							{
							 	$selrule1_6 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='6')
							{
							 	$selrule1_6 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='7')
							{
							  	$selrule1_7 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='8')
							{
							 	$selrule1_8 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='9')
							{
							 	$selrule1_9 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='9')
							{
							 	$selrule1_9 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='10')
							{
							 	$selrule1_10 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='11')
							{
							  	$selrule1_11 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='12')
							{
							  	$selrule1_12 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='13')
							{
							  	$selrule1_13 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='14')
							{
							  	$selrule1_14 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='15')
							{
							  	$selrule1_15 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='16')
							{
							  	$selrule1_16 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='17')
							{
							  	$selrule1_17 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='18')
							{
							  	$selrule1_18 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='19')
							{
							  	$selrule1_19 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='20')
							{
							  	$selrule1_20 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='21')
							{
							  	$selrule1_21 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='22')
							{
							  	$selrule1_22 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='23')
							{
							  	$selrule1_23 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='24')
							{
							  	$selrule1_24 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='25')
							{
							  	$selrule1_25 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='26')
							{
							  	$selrule1_26 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='27')
							{
							  	$selrule1_27 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='28')
							{
							  	$selrule1_28 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='29')
							{
							  	$selrule1_29 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_1] =='30')
							{
							  	$selrule1_30 = "selected = selected";
							}
							?>
                            <select name="rule1_1" <?php echo $disabled; ?>>
                            	<option value="0" <?php echo $selrule1_0; ?>>N/A</option>
								<option value="1" <?php echo $selrule1_1; ?>>1</option>
                                <option value="2" <?php echo $selrule1_2; ?>>2</option>
                                <option value="3" <?php echo $selrule1_3; ?>>3</option>
                                <option value="4" <?php echo $selrule1_4; ?>>4</option>
                                <option value="5" <?php echo $selrule1_5; ?>>5</option>
                                <option value="6" <?php echo $selrule1_6; ?>>6</option>
                                <option value="7" <?php echo $selrule1_7; ?>>7</option>
                                <option value="8" <?php echo $selrule1_8; ?>>8</option>
                                <option value="9" <?php echo $selrule1_9; ?>>9</option>
                                <option value="10" <?php echo $selrule1_10; ?>>10</option>
                                <option value="11" <?php echo $selrule1_11; ?>>11</option>
                                <option value="12" <?php echo $selrule1_12; ?>>12</option>
                                <option value="13" <?php echo $selrule1_13; ?>>13</option>
                                <option value="14" <?php echo $selrule1_14; ?>>14</option>
                                <option value="15" <?php echo $selrule1_15; ?>>15</option>
                                <option value="16" <?php echo $selrule1_16; ?>>16</option>
                                <option value="17" <?php echo $selrule1_17; ?>>17</option>
                                <option value="19" <?php echo $selrule1_18; ?>>18</option>
                                <option value="20" <?php echo $selrule1_19; ?>>19</option>
                                <option value="21" <?php echo $selrule1_20; ?>>20</option>
                                <option value="22" <?php echo $selrule1_21; ?>>21</option>
                                <option value="23" <?php echo $selrule1_22; ?>>22</option>
                                <option value="24" <?php echo $selrule1_24; ?>>24</option>
                                <option value="25" <?php echo $selrule1_25; ?>>25</option>
                                <option value="26" <?php echo $selrule1_26; ?>>26</option>
                                <option value="27" <?php echo $selrule1_27; ?>>27</option>
                                <option value="28" <?php echo $selrule1_28; ?>>28</option>
                                <option value="29" <?php echo $selrule1_29; ?>>29</option>
                                <option value="30" <?php echo $selrule1_30; ?>>30</option>
							</select>
                            <select name="rule1_2" <?php echo $disabled; ?>>
                            <?php 
							if($_SESSION[facility][rule1_2]=='0')
							{
								$sel_rule2_1 = "selected = selected";
							}
							else
							{
								$sel_rule2_2 = "selected = selected";
							}
							?>
                            	<option value="0" <?php echo $sel_rule2_1; ?>>Week</option>
                                <option value="1" <?php echo $sel_rule2_2; ?>>Month</option>
                            </select>
                            <?php 
							if($_SESSION[facility][rule1_3]=='0')
							{
								$rule1_3_1 = "selected = selected";
							}
							elseif($_SESSION[facility][rule1_3]=='1')
							{
								$rule1_3_2 = "selected = selected";
							}
							else
							{
								$rule1_3_3 = "selected = selected";
							}
							?>
                            <select name="rule1_3" <?php echo $disabled; ?>>
                            	<option value="0"  <?php echo $rule1_3_1; ?>>Peak Time</option>
                                <option value="1" <?php echo $rule1_3_2; ?>>Non-Peak Time</option>
                                <option value="2" <?php echo $rule1_3_3; ?>>Any Time</option>
                            </select>                            </td>
						</tr>
                        <tr>
                        	<td>Relation with Rule 1 </td>
                            <td><?php 
							if($_SESSION[facility][logic_one]=='0')
							{
								$logic_one_1 = "selected = selected";
							}
							else
							{
								$logic_one_2 = "selected = selected";
							}
							?>
                            <select name="logic_one" <?php echo $disabled; ?>>
                            	<option value="0" <?php echo  $logic_one_1 ; ?>>and</option>
                                <option value="1" <?php echo  $logic_one_2 ; ?>>or</option>
							</select>                            </td>
						</tr>
                        <tr>
                        	<td>Rule 2 </td>
                            <td><?php
							if($_SESSION[facility][rule2_1] =='0')
							{
								$rule2_1_0 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='1')
							{
							 	$rule2_1_1 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='2')
							{
							  	$rule2_1_2 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='3')
							{
							  	$rule2_1_3 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='4')
							{
							  	$rule2_1_4 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='5')
							{
							  	$rule2_1_5 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='6')
							{
							  	$rule2_1_6 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='6')
							{
							  	$rule2_1_6 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='7')
							{
							  	$rule2_1_7 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='8')
							{
							  	$rule2_1_8 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='9')
							{
							  	$rule2_1_9 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='9')
							{
							  	$rule2_1_9 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='10')
							{
							  	$rule2_1_10 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='11')
							{
							  	$rule2_1_11 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='12')
							{
							  	$rule2_1_12 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='13')
							{
							  	$rule2_1_13 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='14')
							{
							  	$rule2_1_14 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='15')
							{
							  	$rule2_1_15 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='16')
							{
							  	$rule2_1_16 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='17')
							{
							  	$rule2_1_17 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='18')
							{
							  	$rule2_1_18 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='19')
							{
							  	$rule2_1_19 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='20')
							{
							  	$rule2_1_20 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='21')
							{
							  	$rule2_1_21 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='22')
							{
							  	$rule2_1_22 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='23')
							{
							  	$rule2_1_23 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='24')
							{
							  	$rule2_1_24 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='25')
							{
							  	$rule2_1_25 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='26')
							{
							  	$rule2_1_26 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='27')
							{
							  	$rule2_1_27 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='28')
							{
							  	$rule2_1_28 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='29')
							{
							  	$rule2_1_29 = "selected = selected";
							}
							elseif($_SESSION[facility][rule2_1] =='30')
							{
							  	$rule2_1_30 = "selected = selected";
							}
							?>
                            <select name="rule2_1" <?php echo $disabled; ?>>
                            	<option value="0" <?php echo $rule2_1_0; ?>>N/A</option>
                                <option value="1" <?php echo $rule2_1_1; ?>>1</option>
                                <option value="2" <?php echo $rule2_1_2; ?>>2</option>
                                <option value="3" <?php echo $rule2_1_3; ?>>3</option>
                                <option value="4" <?php echo $rule2_1_4; ?>>4</option>
                                <option value="5" <?php echo $rule2_1_5; ?>>5</option>
                                <option value="6" <?php echo $rule2_1_6; ?>>6</option>
                                <option value="7" <?php echo $rule2_1_7; ?>>7</option>
                                <option value="8" <?php echo $rule2_1_8; ?>>8</option>
                                <option value="9" <?php echo $rule2_1_9; ?>>9</option>
                                <option value="10" <?php echo $rule2_1_10; ?>>10</option>
                                <option value="11" <?php echo $rule2_1_11; ?>>11</option>
                                <option value="12" <?php echo $rule2_1_12; ?>>12</option>
                                <option value="13" <?php echo $rule2_1_13; ?>>13</option>
                                <option value="14" <?php echo $rule2_1_14; ?>>14</option>
                                <option value="15" <?php echo $rule2_1_15; ?>>15</option>
                                <option value="16" <?php echo $rule2_1_16; ?>>16</option>
                                <option value="17" <?php echo $rule2_1_17; ?>>17</option>
                                <option value="19" <?php echo $rule2_1_18; ?>>18</option>
                                <option value="20" <?php echo $rule2_1_19; ?>>19</option>
                                <option value="21" <?php echo $rule2_1_20; ?>>20</option>
                                <option value="22" <?php echo $rule2_1_21; ?>>21</option>
                                <option value="23" <?php echo $rule2_1_22; ?>>22</option>
                                <option value="24" <?php echo $rule2_1_24; ?>>24</option>
                                <option value="25" <?php echo $rule2_1_25; ?>>25</option>
                                <option value="26" <?php echo $rule2_1_26; ?>>26</option>
                                <option value="27" <?php echo $rule2_1_27; ?>>27</option>
                                <option value="28" <?php echo $rule2_1_28; ?>>28</option>
                                <option value="29" <?php echo $rule2_1_29; ?>>29</option>
                                <option value="30" <?php echo $rule2_1_30; ?>>30</option>
							</select>
                            <? // why there is 2 of this?? Comes to think if shashi know what hes doing? ?>
                            </select>
                            <?php 
							if($_SESSION[facility][rule2_2]=='0')
							{
								$rule2_2_1 = "selected = selected";
							}
							else
							{
								$rule2_2_2 = "selected = selected";
							}
							?>
                            <select name="rule2_2" <?php echo $disabled; ?>>
                            	<option value="0" <?php echo $rule2_2_1; ?>>Week</option>
                                <option value="1" <?php echo $rule2_2_2; ?>>Month</option>
                            </select>
                            <?php 
							if($_SESSION[facility][rule2_3]=='0')
							{
								$rule2_3_1 = "selected = selected";
							}
							else
							{
								$rule2_3_2 = "selected = selected";
							}
							?>
                            <select name="rule2_3" <?php echo $disabled; ?>>
                            	<option value="0" <?php echo $rule2_3_1; ?>>Peak Time</option>
                                <option value="1" <?php echo $rule2_3_2; ?>>Non-Peak Time</option>
							</select>                            </td>
						</tr>
                        <tr>
                        	<td>Relation with rule 2 </td>
                            <td><?php 
							if($_SESSION[facility][logic_two]=='0')
							{
								$logic_two_1 = "selected = selected";
							}
							else
							{
								$logic_two_2 = "selected = selected";
							}
							?>
                            <select name="logic_two" <?php echo $disabled; ?>>
                            	<option value="0" <?php echo  $logic_two_1; ?>>and</option>
                                <option value="1" <?php echo  $logic_two_2; ?>>or</option>
                            </select>                            </td>
						</tr>
                        <tr>
                        	<td>Rule 3 </td>
                            <td><?php
							if($_SESSION[facility][rule3_1] =='0')
							{
								$rule3_1_0 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='1')
							{
							  	$rule3_1_1 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='2')
							{
							  	$rule3_1_2 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='3')
							{
							  	$rule3_1_3 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='4')
							{
							  	$rule3_1_4 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='5')
							{
							  	$rule3_1_5 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='6')
							{
							  	$rule3_1_6 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='6')
							{
							  	$rule3_1_6 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='7')
							{
							  	$rule3_1_7 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='8')
							{
							  	$rule3_1_8 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='9')
							{
							  	$rule3_1_9 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='9')
							{
							  	$rule3_1_9 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='10')
							{
							  	$rule3_1_10 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='11')
							{
							  	$rule3_1_11 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='12')
							{
							  	$rule3_1_12 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='13')
							{
							  	$rule3_1_13 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='14')
							{
							  	$rule3_1_14 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='15')
							{
							  	$rule3_1_15 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='16')
							{
							  	$rule3_1_16 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='17')
							{
							  	$rule3_1_17 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='18')
							{
							  	$rule3_1_18 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='19')
							{
							  	$rule3_1_19 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='20')
							{
							  	$rule3_1_20 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='21')
							{
							 	$rule3_1_21 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='22')
							{
							  	$rule3_1_22 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='23')
							{
							  	$rule3_1_23 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='24')
							{
							  	$rule3_1_24 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='25')
							{
							  	$rule3_1_25 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='26')
							{
							  	$rule3_1_26 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='27')
							{
							  	$rule3_1_27 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='28')
							{
							  	$rule3_1_28 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='29')
							{
							  	$rule3_1_29 = "selected = selected";
							}
							elseif($_SESSION[facility][rule3_1] =='30')
							{
							  	$rule3_1_30 = "selected = selected";
							}
							?>
                            <select name="rule3_1" <?php echo $disabled; ?>>
                            	<option value="0" <?php echo $rule3_1_0; ?>>N/A</option>
                                <option value="1" <?php echo $rule3_1_1; ?>>1</option>
                                <option value="2" <?php echo $rule3_1_2; ?>>2</option>
                                <option value="3" <?php echo $rule3_1_3; ?>>3</option>
                                <option value="4" <?php echo $rule3_1_4; ?>>4</option>
                                <option value="5" <?php echo $rule3_1_5; ?>>5</option>
                                <option value="6" <?php echo $rule3_1_6; ?>>6</option>
                                <option value="7" <?php echo $rule3_1_7; ?>>7</option>
                                <option value="8" <?php echo $rule3_1_8; ?>>8</option>
                                <option value="9" <?php echo $rule3_1_9; ?>>9</option>
                                <option value="10" <?php echo $rule3_1_10; ?>>10</option>
                                <option value="11" <?php echo $rule3_1_11; ?>>11</option>
                                <option value="12" <?php echo $rule3_1_12; ?>>12</option>
                                <option value="13" <?php echo $rule3_1_13; ?>>13</option>
                                <option value="14" <?php echo $rule3_1_14; ?>>14</option>
                                <option value="15" <?php echo $rule3_1_15; ?>>15</option>
                                <option value="16" <?php echo $rule3_1_16; ?>>16</option>
                                <option value="17" <?php echo $rule3_1_17; ?>>17</option>
                                <option value="19" <?php echo $rule3_1_18; ?>>18</option>
                                <option value="20" <?php echo $rule3_1_19; ?>>19</option>
                                <option value="21" <?php echo $rule3_1_20; ?>>20</option>
                                <option value="22" <?php echo $rule3_1_21; ?>>21</option>
                                <option value="23" <?php echo $rule3_1_22; ?>>22</option>
                                <option value="24" <?php echo $rule3_1_24; ?>>24</option>
                                <option value="25" <?php echo $rule3_1_25; ?>>25</option>
                                <option value="26" <?php echo $rule3_1_26; ?>>26</option>
                                <option value="27" <?php echo $rule3_1_27; ?>>27</option>
                                <option value="28" <?php echo $rule3_1_28; ?>>28</option>
                                <option value="29" <?php echo $rule3_1_29; ?>>29</option>
                                <option value="30" <?php echo $rule3_1_30; ?>>30</option>
							</select>
                            <?php 
							if($_SESSION[facility][rule3_2]=='0')
							{
								$rule3_2_1 = "selected = selected";
							}
							else
							{
								$rule3_2_2 = "selected = selected";
							}
							?>
                            <select name="rule3_2" <?php echo $disabled; ?>>
                            	<option value="0" <?php echo $rule3_2_1; ?>>Week</option>
                                <option value="1" <?php echo $rule3_2_2; ?>>Month</option>
                            </select>
                            <?php 
							if($_SESSION[facility][rule3_3]=='0')
							{
								$rule3_3_1 = "selected = selected";
							}
							else
							{
								$rule3_3_2 = "selected = selected";
							}
							?>
                            <select name="rule3_3" <?php echo $disabled; ?>>
                            	<option value="0" <?php echo $rule3_3_1; ?>>Peak Time</option>
                                <option value="1" <?php echo $rule3_3_2; ?>>Non-Peak Time</option>
                            </select>                            </td>
						</tr>
                        </table>
                        <? // somebody tell me why is this empty. Next time, if want to use dreamweaver, make sure you understand the code also. Dont be too dependent on the easy drag and drop features. ?>
                        <div align="center">
                                          <label></label>
                                </div>
                                      </label>						</td>
					</tr>
                    <tr>
                    	<td colspan="3" bgcolor="#FDF5E1">&nbsp;</td>
                        <td colspan="5" bgcolor="#FDF5E1">&nbsp;</td>
                        <td colspan="3" bgcolor="#FDF5E1">&nbsp;</td>
                        <td colspan="2" bgcolor="#FDF5E1">&nbsp;</td>
                    </tr>
                    <tr>
                    	<td colspan="8" bgcolor="#FDF5E1">Booking Open From
                        <label></label>
                        <?php
						if($_SESSION[facility][open_from] =='0')
						{
							$open_from_0 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='1')
						{
							$open_from_1 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='2')
						{
							$open_from_2 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='3')
						{
							$open_from_3 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='4')
						{
							$open_from_4 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='5')
						{
							$open_from_5 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='6')
						{
							$open_from_6 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='6')
						{
							$open_from_6 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='7')
						{
							$open_from_7 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='8')
						{
							$open_from_8 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='9')
						{
							$open_from_9 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='9')
						{
							$open_from_9 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='10')
						{
							$open_from_10 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='11')
						{
							$open_from_11 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='12')
						{
							$open_from_12 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='13')
						{
							$open_from_13 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='14')
						{
							$open_from_14 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='15')
						{
							$open_from_15 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='16')
						{
							$open_from_16 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='17')
						{
							$open_from_17 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='18')
						{
							$open_from_18 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='19')
						{
							$open_from_19 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='20')
						{
							$open_from_20 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='21')
						{
							$open_from_21 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='22')
						{
							$open_from_22 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='23')
						{
							$open_from_23 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='24')
						{
							$open_from_24 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='25')
						{
							$open_from_25 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='26')
						{
							$open_from_26 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='27')
						{
							$open_from_27 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='28')
						{
							$open_from_28 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='29')
						{
							$open_from_29 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='30')
						{
							$open_from_30 = "selected = selected";
						}
						elseif($_SESSION[facility][open_from] =='60')
						{
							$open_from_60 = "selected = selected";
						}
						?>
                        <select name="open_from" <?php echo $disabled; ?>>
                        	<option value="0" <?php echo $open_from_0; ?>>N/A</option>
                            <option value="1" <?php echo $open_from_1; ?>>1</option>
                            <option value="2" <?php echo $open_from_2; ?>>2</option>
                            <option value="3" <?php echo $open_from_3; ?>>3</option>
                            <option value="4" <?php echo $open_from_4; ?>>4</option>
                            <option value="5" <?php echo $open_from_5; ?>>5</option>
                            <option value="6" <?php echo $open_from_6; ?>>6</option>
                            <option value="7" <?php echo $open_from_7; ?>>7</option>
                            <option value="8" <?php echo $open_from_8; ?>>8</option>
                            <option value="9" <?php echo $open_from_9; ?>>9</option>
                            <option value="10" <?php echo $open_from_10; ?>>10</option>
                            <option value="11" <?php echo $open_from_11; ?>>11</option>
                            <option value="12" <?php echo $open_from_12; ?>>12</option>
                            <option value="13" <?php echo $open_from_13; ?>>13</option>
                            <option value="14" <?php echo $open_from_14; ?>>14</option>
                            <option value="15" <?php echo $open_from_15; ?>>15</option>
                            <option value="16" <?php echo $open_from_16; ?>>16</option>
                            <option value="17" <?php echo $open_from_17; ?>>17</option>
                            <option value="19" <?php echo $open_from_18; ?>>18</option>
                            <option value="20" <?php echo $open_from_19; ?>>19</option>
                            <option value="21" <?php echo $open_from_20; ?>>20</option>
                            <option value="22" <?php echo $open_from_21; ?>>21</option>
                            <option value="23" <?php echo $open_from_22; ?>>22</option>
                            <option value="24" <?php echo $open_from_24; ?>>24</option>
                            <option value="25" <?php echo $open_from_25; ?>>25</option>
                            <option value="26" <?php echo $open_from_26; ?>>26</option>
                            <option value="27" <?php echo $open_from_27; ?>>27</option>
                            <option value="28" <?php echo $open_from_28; ?>>28</option>
                            <option value="29" <?php echo $open_from_29; ?>>29</option>
                            <option value="30" <?php echo $open_from_30; ?>>30</option>
						    <option value="60" <?php echo $open_from_60; ?>>60</option>
						</select>
                        Days and will be cancelled before
                        <?php
						if($_SESSION[facility][closed_at] =='0')
						{
						  	$closed_at_0 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='1')
						{
							$closed_at_1 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='2')
						{
							$closed_at_2 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='3')
						{
							$closed_at_3 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='4')
						{
						  	$closed_at_4 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='5')
						{
						  	$closed_at_5 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='6')
						{
						  	$closed_at_6 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='6')
						{
						 	$closed_at_6 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='7')
						{
						  	$closed_at_7 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='8')
						{
						  	$closed_at_8 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='9')
						{
						 	$closed_at_9 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='9')
						{
						 	$closed_at_9 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='10')
						{
						 	$closed_at_10 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='11')
						{
						 	$closed_at_11 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='12')
						{
						 	$closed_at_12 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='13')
						{
						 	$closed_at_13 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='14')
						{
							$closed_at_14 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='15')
						{
							$closed_at_15 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='16')
						{
							$closed_at_16 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='17')
						{
						  	$closed_at_17 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='18')
						{
						  	$closed_at_18 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='19')
						{
						  	$closed_at_19 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='20')
						{
						 	$closed_at_20 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='21')
						{
						  	$closed_at_21 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='22')
						{
						  	$closed_at_22 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='23')
						{
						  	$closed_at_23 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='24')
						{
						  	$closed_at_24 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='25')
						{
						  	$closed_at_25 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='26')
						{
						  	$closed_at_26 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='27')
						{
						  	$closed_at_27 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='28')
						{
						  	$closed_at_28 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='29')
						{
						  	$closed_at_29 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='30')
						{
						 	$closed_at_30 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='48')
						{
						 	$closed_at_48 = "selected = selected";
						}
						elseif($_SESSION[facility][closed_at] =='72')
						{
						 	$closed_at_72 = "selected = selected";
						}
						?>
                        <select name="closed_at" <?php echo $disabled; ?>>
                        	<option value="0" <?php echo $closed_at_0; ?>>N/A</option>
                            <option value="1" <?php echo $closed_at_1; ?>>1</option>
                            <option value="2" <?php echo $closed_at_2; ?>>2</option>
                            <option value="3" <?php echo $closed_at_3; ?>>3</option>
                            <option value="4" <?php echo $closed_at_4; ?>>4</option>
                            <option value="5" <?php echo $closed_at_5; ?>>5</option>
                            <option value="6" <?php echo $closed_at_6; ?>>6</option>
                            <option value="7" <?php echo $closed_at_7; ?>>7</option>
                            <option value="8" <?php echo $closed_at_8; ?>>8</option>
                            <option value="9" <?php echo $closed_at_9; ?>>9</option>
                            <option value="10" <?php echo $closed_at_10; ?>>10</option>
                            <option value="11" <?php echo $closed_at_11; ?>>11</option>
                            <option value="12" <?php echo $closed_at_12; ?>>12</option>
                            <option value="13" <?php echo $closed_at_13; ?>>13</option>
                            <option value="14" <?php echo $closed_at_14; ?>>14</option>
                            <option value="15" <?php echo $closed_at_15; ?>>15</option>
                            <option value="16" <?php echo $closed_at_16; ?>>16</option>
                            <option value="17" <?php echo $closed_at_17; ?>>17</option>
                            <option value="19" <?php echo $closed_at_18; ?>>18</option>
                            <option value="20" <?php echo $closed_at_19; ?>>19</option>
                            <option value="21" <?php echo $closed_at_20; ?>>20</option>
                            <option value="22" <?php echo $closed_at_21; ?>>21</option>
                            <option value="23" <?php echo $closed_at_22; ?>>22</option>
                            <option value="24" <?php echo $closed_at_24; ?>>24</option>
                            <option value="25" <?php echo $closed_at_25; ?>>25</option>
                            <option value="26" <?php echo $closed_at_26; ?>>26</option>
                            <option value="27" <?php echo $closed_at_27; ?>>27</option>
                            <option value="28" <?php echo $closed_at_28; ?>>28</option>
                            <option value="29" <?php echo $closed_at_29; ?>>29</option>
                            <option value="30" <?php echo $closed_at_30; ?>>30</option>
                            <option value="48" <?php echo $closed_at_48; ?>>48</option>
                            <option value="72" <?php echo $closed_at_72; ?>>72</option>
						</select>
                        Hrs if not confirmed                        </td>
                        <td colspan="3" bgcolor="#FDF5E1">&nbsp;</td>
                        <td colspan="2" bgcolor="#FDF5E1">&nbsp;</td>
					</tr>
                    <tr>
                        <td colspan="13" bgcolor="#FDF5E1">&nbsp;</td>
					</tr>
              		<tr>
                    	<td colspan="10" bgcolor="#FDF5E1"><p>
                        <?php 
						if($_SESSION[facility][os]=='time_based')
						{
							$os_2 = "checked=checked";
						}
						else
						{
							$os_1 = "checked=checked";
						}
						?>
                        <label>Session Based
                        <input type="radio" name="os" value="sess" <?php echo $os_1; ?>  <?php echo $disabled; ?>>
                        </label>
                        <label>Time Based
                        <input type="radio" name="os" value="time_based" <?php echo $os_2; ?> <?php echo $disabled; ?>>
                        </label>
                        <label style="margin-bottom: 1em; padding-bottom: 1em; border-bottom: 3px silver groove;">
                        <input name="hidden" type="hidden" class="DEPENDS ON os BEING time_based OR os BEING sess">
                        </label>
                        <label>Hrs
                        <input type="hrs" name="hrs" class="CONFLICTS WITH apache AND DEPENDS ON os BEING time_based" maxlength="5" size="5"  tooltiptext="Define how many hours will be defined as one session. (e.g 4 , if you enter 4 then system will take one booking for 4 hour)" <?php echo $disabled; ?> value="<?php echo $_SESSION[facility][hrs];?>">
                        </label>
                        <label style="margin-bottom: 1em; padding-bottom: 1em; border-bottom: 3px silver groove;">
                        <input name="hidden" type="hidden" class="CONFLICTS WITH pass BEING EMPTY">
                        </label>
                        </p>                        </td>
                        <td width="4%" bgcolor="#FDF5E1">&nbsp;</td>
                        <td width="1%" bgcolor="#FDF5E1">&nbsp;</td>
                        <td width="9%" bgcolor="#FDF5E1">&nbsp;</td>
					</tr>
                    <tr>
                    	<td colspan="13" bgcolor="#FCECC7">Auto Close Date
                    	<label>
                        <?php 
						if($_SESSION[facility][auto_close]=='1')
						{
							$auto_close_1 = "checked=checked";
						}
						else
						{
							$auto_close_1 = "";
						}
						?>
                        <input type="checkbox" name="auto_close" value="1" <?php echo $disabled; ?> tooltiptext="Check this box if you want system to close the booking of this facilitie at given data on either every mont or year." <?php echo $auto_close_1; ?>>
                        </label>                        </td>
					</tr>
                    <tr>
                    	<td width="11%">From</td>
                        <td width="7%"><strong>:</strong></td>
                        <td width="20%"><label>
                        <input name="from_date" type="text" size="10" maxlength="10" readonly="" <?php echo $disabled; ?> value="<?php echo $_SESSION[facility][from_date]; ?>">
                        <img src="images/icon-calender.gif" width="19" height="18"  onclick="displayCalendar(document.forms[0].from_date,'dd.mm.yyyy',this)" value="Cal"></label></td>
                        <td width="13%">&nbsp;</td>
                        <td width="7%">To</td>
                        <td width="3%"><strong>:</strong></td>
                        <td width="15%"><input name="to_date" type="text" size="10" maxlength="10" readonly="" <?php echo $disabled; ?> value="<?php echo $_SESSION[facility][to_date]; ?>">
                        <img src="images/icon-calender.gif" width="19" height="18"  onclick="displayCalendar(document.forms[0].to_date,'dd.mm.yyyy',this)" value="Cal"></td>
                        <td width="6%"><div align="right">Frame</div></td>
                        <td width="1%"><strong>:</strong></td>
                        <td colspan="4"><label>
                        <?php 
						if($_SESSION[facility][frame]=='0')
						{
							$frame_1 = "selected = selected";
						}
						else
						{
							$frame_2 = "selected = selected";
						}
						?>
                        <select name="frame" <?php echo $disabled; ?> tooltiptext="You want to disable this facilities on every month or every year of specified dates ?">
                        	<option value="0" <?php echo  $frame_1; ?>>Month</option>
                            <option value="1" <?php echo  $frame_2; ?>>Year</option>
                        </select>
                        </label>                        </td>
					</tr>
                    <tr>
                    	<td colspan="2">Message</td>
                        <td><label>
                        <input type="text" name="message" <?php echo $disabled; ?> value="<?php echo $_SESSION[facility][message]; ?>" >
                        </label>                        </td>
                        <td colspan="2"><div align="right">Add to Calender </div></td>
                        <td><strong>:</strong></td>
                        <td><label>
                        <?php 
						if($_SESSION[facility][auto_cal]=='1')
						{
							$auto_cal = "checked=checked";
						}
						else
						{
							$auto_cal = "";
						}
						?>
                        <input type="checkbox" name="auto_cal" value="1" <?php echo $disabled; ?> <?php echo $auto_cal; ?> tooltiptext="Check this box if you want system to display this event on calander.">
                        </label>                        </td>
                        <td colspan="6">&nbsp;</td>
                    </tr>
                    <tr>
                    	<td colspan="13" bgcolor="#944542" style="border-left:1px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><span class="fontitle"><strong>&nbsp;Barring Rules </strong></span></td>
					</tr>
                    <tr>
                    	<td colspan="13" style="border-left:0px solid #b09852;border-right:0px solid #b09852; padding-left:5px; padding-top:5px; padding-bottom:5px;">User will be barred from booking this facility for <select name="month_blocked">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select> month(s) if they are absent <select name="absent_amount"> 
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option></select> times over a period of <select name="month_period"> <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select> month(s).</td>
					</tr>
                    <tr>
                        <td colspan="13">&nbsp;</td>
                    </tr>
					</table>                    </td>
				</tr>
                <tr>
                	<td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="11"><div align="right">
                    <label></label>
                    <input type="submit" name="Submit" value="Submit" <?php echo $disabled; ?>>
                    </div>                    </td>
				</tr>
                <tr>
                	<td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="11"><label></label></td>
                </tr>
                </table>
                </form>
                </td>
			</tr>
            <tr>
            	<td colspan="3">&nbsp;</td>
            </tr>
            </table>
            <p> 
            <?php
			}
			elseif($_GET[page] == 'view' and $user_type =='1' )
			{
				if(isset($_GET[dele]))
				{
					$query = "update facility  set enable ='0' where sno = '$_GET[dele]' limit 1";
					mysql_query($query);
				}
				?>
				<br>
              	<b>To place online bookings, please select the respective facility and click on [ Book Now ] Button. </b> </p>
		        <p><b><font color="#FF0000">Note:</font></b><br>
        		<font size="2">All online bookings made are subject to approval 
              	from management office and it would be lapsed if not confirmed as 
              	per the booking regulations. Please refer to <a href="#" target="_blank">By-Laws</a> 
              	for facilities terms and booking restrictions per unit/per facility.</font><br>
            	</p>
            	<table width="100%" border="0" align="center" class="sk_bok_green" cellpadding="5" cellspacing="0">
              	<tr bgcolor="#FCECC7"> 
               		<td> 
                  	<div align="center"><strong>Sno.</strong></div>                </td>
                	<td style="border-left:1px solid #990011;"> 
                  	<div align="center"><strong>Facilities</strong></div>                </td>
                	<td style="border-left:1px solid #990011;"> 
                  	<div align="center"><strong>Type</strong></div>                </td>
                	<td style="border-left:1px solid #990011;"> 
                  	<div align="center"><strong>Booking Fee </strong></div>                </td>
                	<td colspan="2" style="border-left:1px solid #990011;"> 
                  	<div align="center"><strong>Action</strong></div>                </td>
              	</tr>
              	<?php
			   $sr=1;
			   $query = "select * from facility  where enable ='1'";
			   $result  = mysql_query($query);
			   while($row=mysql_fetch_array($result))
			   {
				   	$indooroutdoor = $row['type'];
					if($row[deposite] > 0)
				   	{
						$deposite = $row[deposite];
						$deposite = "<font color=bue >SGD $deposite </font>";
					}
				   	else
				   	{
			  			$deposite = "<font color=green>Free</font>";
		  			}
		    		if($row[os] == 'sess')
		   			{
		  				$type = "Session based";
		  			}
					else
		   			{
		   				$type = "Time Based";
		  			}
		   			?>
              		<tr> 
                		<td width="4%" style="border-top:1px solid #990011;"> 
                  		<div align="center"> 
                    	<?php echo $sr; ?></div>                
                        </td>
                		<td width="31%" align="center" style="border-left:1px solid #990011; border-top:1px solid #990011;"><a href="booking.php?crypted=<?php echo $_GET[crypted]; ?>&page=edit&facility=<?php echo $row[sno]; ?>"> 
                  		<?php echo $row[name]; ?>
                  		</a>
                        </td>
                		<td width="20%" align="center" style="border-left:1px solid #990011; border-top:1px solid #990011;"> 
                  		<?php echo $type; ?>                </td>
                		<td width="19%" align="center" style="border-left:1px solid #990011; border-top:1px solid #990011;"> 
                  		<?php echo $deposite; ?>                </td>
                		<!--td style="border-left:1px solid #990011; border-top:1px solid #990011;"> 
                			<div align="center"><a href="booking.php?crypted=<?php// echo "$_GET[crypted]&page=group&group=$row[sno]"; ?>">Grouping</a></div></td-->
                		<td width="5%" style="border-left:1px solid #990011; border-top:1px solid #990011;"> 
                  		<div align="center"> <a href=booking.php?crypted=<?php echo "$_GET[crypted]&page=view&dele=$row[sno]"; ?> onClick="return confirm('Deleting this facility will affect the booking report. Are you sure you want to delete this facility?');"><font color="#993300">Delete</font></a></div>                		</td>
                		<td width="10%" style="border-left:1px solid #990011; border-top:1px solid #990011;"> 
                  		<div align="center"><a href="booking.php?crypted=<?php echo "$_GET[crypted]&id=$row[sno]&page=book_now"; ?>">				
	                    <img border="0" src="images/buttons/booknow.jpg" width="105" height="23"></a></div>                </td>
    				</tr>
              		<?
					$sr++;
					}
					?>
       		  </table>
            		<?
			 	}
				elseif($_GET[page] == 'view' and ($user_type =='0' || $user_type == '2'))
				{
				?>
            	<p><b>To place online bookings, please select the respective facility and 
              	click on [ Book Now ] Button. </b> </p>
            	<p><b><font color="#FF0000">Note:</font></b><br>
              	<font size="2">All online bookings made are subject to approval 
              	from management office and it would be lapsed if not confirmed as 
              	per the booking regulations. Please refer to <a href="#" target="_blank">By-Laws</a> 
              	for facilities terms and booking restrictions per unit/per facility.</font></p>
            	<table width="100%" border="0" align="center" class="sk_bok_green" height="100%" cellpadding="5" cellspacing="0">
              	<tr bgcolor="#FCECC7"> 
                	<td> 
                  	<div align="center"><strong>#</strong></div>
                	</td>
                	<td style="border-left:1px solid #990011;"> 
                  	<div align="center"><strong>Facilities</strong></div>
                	</td>
                	<td style="border-left:1px solid #990011;"> 
                  	<div align="center"><strong>Type</strong></div>
                	</td>
                	<td style="border-left:1px solid #990011;"> 
                  	<div align="center"><strong>Booking Fee </strong></div>
                	</td>
                	<td style="border-left:1px solid #990011;"> 
                  	<div align="center"><strong>Action</strong></div>
                	</td>
              	</tr>
              	<?php
		   		$sr=1;
		   		$query = "select * from facility  where enable ='1'";
			   	$result  = mysql_query($query);
			   	while($row=mysql_fetch_array($result))
			   	{
				   	$indooroutdoor = $row['type'];
					if($row[deposite] > 0)
				   	{
						$deposite = $row[deposite];
						$deposite = "<font color=bue >SGD $deposite </font>";
				   	}
				   	else
			   		{
		   				$deposite = "<font color=green>Free</font>";
		  			}
		   			if($row[os] == 'sess')
		   			{
		   				$type = "Session based";
		   			}
					else
		   			{
		   				$type = "Time Based";
		  			}
		 			?>
              	<tr> 
                	<td width="4%" style="border-top:1px solid #990011;"> 
                  	<div align="center"> 
                    <?php echo $sr; ?>
                  	</div>
                </td>
                <td width="31%" align="center" style="border-left:1px solid #990011; border-top:1px solid #990011;"> 
                  <?php echo $row[name]; ?>
                </td>
                <td width="20%" align="center" style="border-left:1px solid #990011; border-top:1px solid #990011;"> 
                  <?php echo $type; ?>
                </td>
                <td width="19%" align="center" style="border-left:1px solid #990011; border-top:1px solid #990011;"> 
                  <?php echo $deposite; ?>
                </td>
                <td style="border-left:1px solid #990011; border-top:1px solid #990011;"> 
                  <div align="center"><a href="booking.php?crypted=<?php echo "$_GET[crypted]&id=$row[sno]&page=book_now&user_id=$id"; ?>"><img border="0" src="images/buttons/booknow.jpg" width="105" height="23"></a></div>
                </td>
			</tr>
            <?
			$sr++;
			}
			?>
            </table>
            <?php 
			}
			elseif($_GET[page] =='edit'  and $user_type =='1'  )
			{
			// print_r($_POST);
				$query = "select * from facility where  sno = '$_GET[facility]' and enable ='1' limit 1";
			 	$result = mysql_query($query) or die(mysql_error());
			 	while($row=mysql_fetch_array($result))
			 	{
			 		if(isset($_POST[name2]))
					{
						$_SESSION[facility] = $_POST;
					}
					else
					{
						$_SESSION[facility][name2] = $row[name];
						$_SESSION[facility][type] = $row[type];
						$_SESSION[facility][month_blocked] = $row[month_blocked];
						$_SESSION[facility][absent_amount] = $row[absent_amount];
						$_SESSION[facility][month_period] = $row[month_period];
						$_SESSION[facility][deposite2] = $row[deposite];
						$_SESSION[facility][auto2] = $row[auto_apporve];
						//booking_per_day
						$_SESSION[facility][booking_per_day] = $row[max_booking_per_day];
						$_SESSION[facility][rule1_1] = $row[rule1_1];
						$_SESSION[facility][rule1_2] = $row[rule1_2];
						$_SESSION[facility][rule1_3] = $row[rule1_3];
						$_SESSION[facility][logic_one] = $row[logic_one];
						$_SESSION[facility][rule2_1] = $row[rule2_1];
						$_SESSION[facility][rule2_2] = $row[rule2_2];
						$_SESSION[facility][rule2_3] = $row[rule2_3];
						$_SESSION[facility][rule3_1] = $row[rule3_1];
						$_SESSION[facility][rule3_2] = $row[rule3_2];
						$_SESSION[facility][rule3_3] = $row[rule3_3];
						$_SESSION[facility][os] = $row[os];
						$_SESSION[facility][from] = $row[from_time];
						$_SESSION[facility]['max'] = $row[max_time];
						$_SESSION[facility][hrs] = $row[hours];
						$_SESSION[facility][open_from] = $row[open_from];
						$_SESSION[facility][closed_at] = $row[closed_at];
						$_SESSION[facility][auto_close] = $row[auto_close_date];
						
						$_SESSION[facility][from_date] = $row[from_date];
						$_SESSION[facility][to_date] = $row[to_date];
						$_SESSION[facility][frame] = $row[frame];
						$_SESSION[facility][auto_cal] = $row[auto_cal];
						$_SESSION[facility][message] = $row[message];
					}
					$date = $row[created_on];
					$unique_no = $row[unique_no];
					$type = $row[type];
					$month_blocked = $row[month_blocked];
					$absent_amount = $row[absent_amount];
					$month_period = $row[month_period];
			 	}
			 	if(isset($_POST[Submit2]))
			 	{
					$query = "update facility set name ='$_POST[name2]',deposite ='$_POST[deposite2]',auto_apporve  = '$_POST[auto2]',max_booking_per_day ='$_POST[booking_per_day]',rule1_1 ='$_POST[rule1_1]',rule1_2 ='$_POST[rule1_2]',rule1_3 ='$_POST[rule1_3]',relation_rule_1='$_POST[logic_one]',rule2_1 = '$_POST[rule2_1]',rule2_2 ='$_POST[rule2_2]',rule2_3 = '$_POST[rule2_3]',relation_rule_2='$_POST[logic_two]',rule3_1 ='$_POST[rule3_1]', rule3_2 ='$_POST[rule3_2]',rule3_3 ='$_POST[rule3_3]',open_from ='$_POST[open_from]',closed_at ='$_POST[closed_at]',os ='$_POST[os]',from_time ='$_POST[from]',max_time ='$_POST[max]',hours ='$_POST[hrs]',auto_close_date ='$_POST[auto_close]',auto_close_start_day ='$_POST[hrs]',auto_close_date  = '$_POST[auto_close]',auto_close_start_day  ='',auto_close_start_month ='',auto_close_start_year ='',auto_close_end_day ='',auto_close_end_month ='',auto_close_end_year ='',from_date ='$_POST[from_date]',to_date ='$_POST[to_date]',frame='$_POST[frame]',message ='$_POST[message]',auto_cal ='$_POST[auto_cal]',type ='$_POST[type]',month_blocked ='$_POST[month_blocked]',absent_amount ='$_POST[absent_amount]',month_period ='$_POST[month_period]' where unique_no = '$unique_no' limit 1";
					mysql_query($query) or die(mysql_error());
			 	}
			 	if(isset($_POST[down2]))
				{
					if($_POST[from_time2] > $_POST[to_time2])
					{
						$er =1;
					}
					else
					{
						$query = "select * from track_time where track = '$unique_no'";
						$result  = mysql_query($query) or die(mysql_error());
						while($row=mysql_fetch_array($result))
						{
							if(($_POST[from_time2] < $row[to_time]) and ($_POST[week2] =='0' or $_POST[week2] ==$row[weak]))
							{
								echo $er =1;
							}
						}
					}

					//print_r($_POST);
					if($er !='1')
					{
						$query = "insert into track_time (track,from_time,to_time,peak,weak) values ('$unique_no','$_POST[from_time2]','$_POST[to_time2]','$_POST[peak2]','$_POST[week2]')";
						mysql_query($query);
					}
					else
					{
						echo "<div align=center><font color=red>Either The time range is already in use or the time range is not right</font></div>";
					}
				}
	  			?>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                	<td style="background-repeat:no-repeat"><div align="right"><img src="images/left_win_10.gif" width="21" height="30" border="0"></div></td>
                    <td width="100%" background="images/middle_win_11.gif"><span class="fontitle style1"><strong>Edit Facilities</strong></span></td>
                    <td><img src="images/right_win_14.gif" width="17" height="30"></td>
                </tr>
                <tr>
                	<td colspan="3"><form name="form" method="post" action="">
                    <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                    <tr>
                    	<td colspan="13" bgcolor="#944542" class="fontitle txtgrey" style="border-left:1px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><span class="fontitle">&nbsp;<strong>Basic Details </strong></span></td>
                    </tr>
                    <tr>
                    	<td style="padding-left:15px; padding-top:5px; padding-bottom:5px; border-left:1px solid #990011;"> Name </td>
                        <td style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><strong>:</strong></td>
                        <td colspan="5" style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><label>
                        <input name="name2" type="text" value="<?php echo $_SESSION[facility][name2]; ?>" tooltipText="Type In Facilite Name Here (e.g: Tennies Court)" >
                        </label></td>
                        <td style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><div align="right">Creation Date </div></td>
                        <td width="6"><strong>:</strong></td>
                        <td width="247" style="border-right:0px solid #990011;"><b> <?php echo $date; ?></td>
					    <td width="46" style="border-right:0px solid #990011;">Type</td>
					    <td width="5" style="border-right:0px solid #990011;"><strong>:</strong></td>
                        <td width="121" style="border-right:1px solid #990011;"><select name="type">
                    <option value="0" <? if ($_SESSION[facility][type] == '0') { echo "selected"; } ?>>Indoor</option>
                    <option value="1" <? if ($_SESSION[facility][type] == '1') { echo "selected"; } ?>>Outdoor</option>
                    </select></td>
                    </tr>
                    <tr>
                    	<td colspan="13" bgcolor="#944542" style="border-left:1px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><span class="fontitle"><strong>&nbsp;Booking Time Range </strong></span></td>
					</tr>
                    <tr>
                    	<td colspan="13" style="border-left:1px solid #990011; border-right:1px solid #990011;">
                        <table width="100%" border="0" align="center">
                    	<tr>
                        	<td>
                            <table width="100%" border="0" align="center">
                            <tr>
                            <td width="8%" style="padding-left:10px;">From </td>
                            <td width="1%"><strong>:</strong></td>
                            <td width="9%"><label></label>
                            <label>
                            <select name="from_time2" tooltipText="Select the start timing of the facility. (e.g: if the faility is open from morning 10:00 AM then select 10:00 from drop down option)">
                            <?php
							$query = "select * from time_slot ";
							$result = mysql_query($query);
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[id]>$row[time_slot]</option>";
							}
							?>
                            </select>
                            </label></td>
                            <td width="4%">To </td>
                            <td width="1%"><strong>:</strong></td>
                            <td width="12%"><label>
                            <select name="to_time2" tooltipText="Select the closing timing of the facility. (e.g: if the faility closes at evening 10:00 PM then select 22:00 from drop down option)">
                            <?php
							$query = "select * from time_slot ";
							$result = mysql_query($query);
							while($row=mysql_fetch_array($result))
							{
								echo "<option value=$row[id]>$row[time_slot]</option>";
							}
							?>
                            </select>
                            </label></td>
                            <td width="7%"><label>Type</label></td>
                            <td width="2%"><strong>:</strong></td>
                            <td width="16%">
                            <select name="peak2" tooltipText="Do you want to take this time range as Peak Time or Non-Peak Time, Tip : Remmber you can enter more then one open and close time of a facilities and decalre any time range as Peak Time or Non-Peak Time. ">
                            	<option value="1">Peak Time</option>
                                <option value="0" selected>Non-Peak Time</option>
                            </select></td>
                            <td width="17%"><div align="right">
                            <select name="week2" tooltiptext="After you have selected the time range, you can define this range to specify day of week or all week. Please note that system will verify the range and mis-conflict of time range for you.">
                            	<option value="0" selected>All Week</option>
                                <option value="1">Sunday</option>
                                <option value="2">Monday</option>
                                <option value="3">Tuesday</option>
                                <option value="4">Wednesday</option>
                                <option value="5">Thursday</option>
                                <option value="6">Friday</option>
                                <option value="7">Saturday</option>
                            </select>
                            </div></td>
                            <td width="23%"><div align="left">
                            <input type="submit" name="down2" value="V">
                            </div></td>
						</tr>
                        </table>                        </td>
					</tr>
                    </table>
                    <?php
					//	 print_r($_POST);
					if(isset($_POST[Delete2]))
					{
						$delete = explode('x',$_POST[Delete2]);
					//	print_r($delete);
						mysql_query("delete from track_time where sno = '$delete[1]' limit 1") or die(mysql_error());
					}					
					$query = "select * from track_time where track = '$unique_no'";
					$result = mysql_query($query);
					$count = mysql_num_rows($result);
					if($count =='0')
					{
						$disabled = "disabled = disabled";
					}
					if($count =='1')
					{
						$dis ="disabled = disabled";
					}
					if($count >='1')
					{
					?>
                    <table width="100%" border="0" align="center" class="sk_bok" cellspacing="0" cellpadding="5">
                    <tr>
                        <td width="4%" bgcolor="#FCECC7"><div align="center"><strong>#</strong></div></td>
                        <td width="23%" bgcolor="#FCECC7" style="border-left:1px solid #990011;"><div align="center"><strong>From</strong></div></td>
                        <td width="23%" bgcolor="#FCECC7" style="border-left:1px solid #990011;"><div align="center"><strong>To</strong></div></td>
                        <td width="21%" bgcolor="#FCECC7" style="border-left:1px solid #990011;"><div align="center"><strong>Peak / Non Peak</strong> </div></td>
                        <td width="21%" bgcolor="#FCECC7" style="border-left:1px solid #990011;"><div align="center"><strong>Week</strong></div></td>
                        <td width="8%" bgcolor="#FCECC7" style="border-left:1px solid #990011;"><div align="center"><strong>Action</strong></div></td>
                    </tr>
                    <?php 
					$sr = 1;
					while($row=mysql_fetch_array($result))
					{
						$query1 = "select * from time_slot where id ='$row[from_time]' limit 1";
						$result1 = mysql_query($query1);
						while($row1=mysql_fetch_array($result1))
						{
							$from_time = $row1[time_slot];
						}
						$query1 = "select * from time_slot where id ='$row[to_time]' limit 1";
						$result1 = mysql_query($query1);
						while($row1=mysql_fetch_array($result1))
						{
							$to_time = $row1[time_slot];
						}
						?>
                        <tr align="center">
                        	<td style="border-top:1px solid #990011;"><?php echo $sr; ?></td>
                            <td style="border-left:1px solid #990011; border-top:1px solid #990011;"><?php echo "$from_time"; ?></td>
                            <td style="border-left:1px solid #990011; border-top:1px solid #990011;"><?php echo "$to_time "; ?></td>
                            <td style="border-left:1px solid #990011; border-top:1px solid #990011;"><?php 
							if($row[peak] =='1')
							{
								echo "Peak Hour";
							}
							else
							{
								echo "Non - Peak Hour";
							}
							?>                            </td>
                            <td style="border-left:1px solid #990011; border-top:1px solid #990011;"><?php 
							if($row[weak] =='0')
							{
								echo "All Weak";
							}
							elseif($row[weak] =='1')
							{
								echo "Sunday";
							}
							elseif($row[weak] =='2')
							{
								echo "Monday";
							}
							elseif($row[weak] =='3')
							{
								echo "Tuesday";
							}
							elseif($row[weak] =='4')
							{
								echo "Wendesday";
							}
							elseif($row[weak] =='5')
							{
								echo "Thersday";
							}
							elseif($row[weak] =='6')
							{
								echo "Friday";
							}
							elseif($row[weak] =='7')
							{
								echo "Saterday";
							}
							?>                            </td>
                            <td style="border-left:1px solid #990011; border-top:1px solid #990011;"><div align="center">
                            <label>
                            <input type="submit" name="Delete2" value="Delete x<?php echo $row[sno]; ?>" <?php echo $dis; ?>>
                            </label>
                            </div></td>
						</tr>
                        <?php
					 	$sr++;
					 	}
					 	?>
                        </table>
                        <?php
						}
						?>
						<script type="text/javascript">
                            window.onload = function() {
                            setupDependencies('form'); //name of form(s). Seperate each with a comma (ie: 'weboptions', 'myotherform' )
      };
                        </script>
                        <br>						</td>
					</tr>
                    <tr>
                    	<td colspan="13" bgcolor="#944542" style="border-left:1px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><span class="fontitle"><strong>&nbsp;Advance Rules </strong></span></td>
					</tr>
                    <tr>
                    	<td colspan="13" style="border-left:1px solid #990011; border-right:1px solid #990011; border-bottom:1px solid #990011;">
                        <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                        <tr>
                        	<td>Deposit(SGD)</td>
                            <td><strong>:</strong></td>
                            <td><input name="deposite2" type="text" value="<?php echo $_SESSION[facility][deposite2]; ?>" size="5" maxlength="5" tooltipText="Enter the amount which will be displayed to user while booking the facilities and recipt of same will be issued, If the amount is ZERO then it will be consider as NO CHARGES" <?php echo $disabled; ?>></td>
                            <td><div align="right">Auto Approve </div></td>
                            <td><strong>:</strong></td>
                            <td colspan="8"><?php
							if($_SESSION[facility][auto2] =='1')
							{
								$checked = "checked";
							}
							else
							{
								$checked = "";
							}
							?>
                            <input name="auto2" type="checkbox" value="1" <?php echo $checked; ?> tooltipText="Do you want system to auto aprove the booking as soon as it is requested" <?php echo $disabled; ?>></td>
                            </tr>
                        <tr>
                        	<td colspan="13" bgcolor="#FCECC7">Limit : </td>
						</tr>
                        <tr>
                        	<td colspan="13">
                            <table width="100%" border="0" class="sk_bok" cellpadding="5" cellspacing="0">
                            <tr>
                            	<td width="31%">Maximum Booking Allowed Per Day </td>
                                <td width="39%"><?php
							  	if($_SESSION[facility][booking_per_day] =='1')
							  	{
							  		$sel1 = "selected = selected";
							  	}
								elseif($_SESSION[facility][booking_per_day] =='2')
							  	{
							  		$sel2 = "selected = selected";
							    }
								elseif($_SESSION[facility][booking_per_day] =='3')
							  	{
							  		$sel3 = "selected = selected";
							  	}
								elseif($_SESSION[facility][booking_per_day] =='4')
							  	{
							  		$sel4 = "selected = selected";
							 	}
								elseif($_SESSION[facility][booking_per_day] =='5')
							  	{
							  		$sel5 = "selected = selected";
							  	}
								elseif($_SESSION[facility][booking_per_day] =='6')
							  	{
							  		$sel6 = "selected = selected";
							  	}
							  	?>
                                <select name="booking_per_day" <?php echo $disabled; ?>>
                                	<option value="1" <?php echo $sel1; ?>>1 Booking Per Day</option>
                                    <option value="2" <?php echo $sel2; ?>>2 Booking Per Day</option>
                                    <option value="3" <?php echo $sel3; ?>>3 Booking Per Day</option>
                                    <option value="4" <?php echo $sel4; ?>>4 Booking Per Day</option>
                                    <option value="5" <?php echo $sel5; ?>>5 Booking Per Day</option>
                                    <option value="6" <?php echo $sel6; ?>>6 Booking Per Day</option>
								</select></td>
                                <td width="30%" rowspan="6" valign="top"><div align="left">Note : <br>
                                              All rules and limit will be ignored below the step where N/A is selected. For example if you have selected Rule 1 as N/A in first drop down box then Rule 2 and rule 3 will be ignored. </div></td>
							</tr>
                            <tr>
                            	<td>Rule 1 </td>
                                <td><?php
							  	if($_SESSION[facility][rule1_1] =='0')
							  	{
							  		$selrule1_0 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='1')
							  	{
							  		$selrule1_1 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='2')
							  	{
							  		$selrule1_2 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='3')
							  	{
							  		$selrule1_3 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='4')
							  	{
							  		$selrule1_4 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='5')
							  	{
							  		$selrule1_5 = "selected = selected";
								}
								elseif($_SESSION[facility][rule1_1] =='6')
							  	{
							  		$selrule1_6 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='6')
							  	{
							  		$selrule1_6 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='7')
							  	{
							  		$selrule1_7 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='8')
							  	{
							  		$selrule1_8 = "selected = selected";
								}
								elseif($_SESSION[facility][rule1_1] =='9')
							  	{
							  		$selrule1_9 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='9')
							  	{
							  		$selrule1_9 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='10')
							  	{
							  		$selrule1_10 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='11')
							  	{
							  		$selrule1_11 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='12')
							  	{
							  		$selrule1_12 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='13')
							  	{
							  		$selrule1_13 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='14')
							  	{
							  		$selrule1_14 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='15')
							  	{
							  		$selrule1_15 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='16')
							  	{
							  		$selrule1_16 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='17')
							  	{
							  		$selrule1_17 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='18')
							  	{
							  		$selrule1_18 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='19')
							  	{
							  		$selrule1_19 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='20')
							  	{
							  		$selrule1_20 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='21')
							  	{
							  		$selrule1_21 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='22')
							  	{
							  		$selrule1_22 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='23')
							  	{
							  		$selrule1_23 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='24')
							  	{
							  		$selrule1_24 = "selected = selected";
							    }
								elseif($_SESSION[facility][rule1_1] =='25')
							  	{
							  		$selrule1_25 = "selected = selected";
							  
							  	}
								elseif($_SESSION[facility][rule1_1] =='26')
							  	{
							  		$selrule1_26 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='27')
							  	{
							  		$selrule1_27 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='28')
							  	{
							  		$selrule1_28 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='29')
							  	{
							  		$selrule1_29 = "selected = selected";
							  	}
								elseif($_SESSION[facility][rule1_1] =='30')
							  	{
							  		$selrule1_30 = "selected = selected";
							  	}
							  	?>
                                <select name="rule1_1" <?php echo $disabled; ?>>
                                      <option value="0" <?php echo $selrule1_0; ?>>N/A</option>
                                      <option value="1" <?php echo $selrule1_1; ?>>1</option>
                                      <option value="2" <?php echo $selrule1_2; ?>>2</option>
                                      <option value="3" <?php echo $selrule1_3; ?>>3</option>
                                      <option value="4" <?php echo $selrule1_4; ?>>4</option>
                                      <option value="5" <?php echo $selrule1_5; ?>>5</option>
                                      <option value="6" <?php echo $selrule1_6; ?>>6</option>
                                      <option value="7" <?php echo $selrule1_7; ?>>7</option>
                                      <option value="8" <?php echo $selrule1_8; ?>>8</option>
                                      <option value="9" <?php echo $selrule1_9; ?>>9</option>
                                      <option value="10" <?php echo $selrule1_10; ?>>10</option>
                                      <option value="11" <?php echo $selrule1_11; ?>>11</option>
                                      <option value="12" <?php echo $selrule1_12; ?>>12</option>
                                      <option value="13" <?php echo $selrule1_13; ?>>13</option>
                                      <option value="14" <?php echo $selrule1_14; ?>>14</option>
                                      <option value="15" <?php echo $selrule1_15; ?>>15</option>
                                      <option value="16" <?php echo $selrule1_16; ?>>16</option>
                                      <option value="17" <?php echo $selrule1_17; ?>>17</option>
                                      <option value="19" <?php echo $selrule1_18; ?>>18</option>
                                      <option value="20" <?php echo $selrule1_19; ?>>19</option>
                                      <option value="21" <?php echo $selrule1_20; ?>>20</option>
                                      <option value="22" <?php echo $selrule1_21; ?>>21</option>
                                      <option value="23" <?php echo $selrule1_22; ?>>22</option>
                                      <option value="24" <?php echo $selrule1_24; ?>>24</option>
                                      <option value="25" <?php echo $selrule1_25; ?>>25</option>
                                      <option value="26" <?php echo $selrule1_26; ?>>26</option>
                                      <option value="27" <?php echo $selrule1_27; ?>>27</option>
                                      <option value="28" <?php echo $selrule1_28; ?>>28</option>
                                      <option value="29" <?php echo $selrule1_29; ?>>29</option>
                                      <option value="30" <?php echo $selrule1_30; ?>>30</option>
									</select>
                                    <select name="rule1_2" <?php echo $disabled; ?>>
                                    <?php 
							  		if($_SESSION[facility][rule1_2]=='0')
							  		{
							 			$sel_rule2_1 = "selected = selected";
							  		}
									else
							  		{
							  			$sel_rule2_2 = "selected = selected";
							  		}
							  		?>
                                    	<option value="0" <?php echo $sel_rule2_1; ?>>Week</option>
                                        <option value="1" <?php echo $sel_rule2_2; ?>>Month</option>
									</select>
                                    <?php 
							  		if($_SESSION[facility][rule1_3]=='0')
							  		{
							  			$rule1_3_1 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule1_3]=='1')
							  		{
							  			$rule1_3_2 = "selected = selected";
							  		}
									else
							  		{
							  			$rule1_3_3 = "selected = selected";
							  		}
							  		?>
                                    <select name="rule1_3" <?php echo $disabled; ?>>
										<option value="0"  <?php echo $rule1_3_1; ?>>Peak Time</option>
                                        <option value="1" <?php echo $rule1_3_2; ?>>Non-Peak Time</option>
                                        <option value="2" <?php echo $rule1_3_3; ?>>Any Time</option>
                                    </select></td>
                                </tr>
                                <tr>
	                                <td>Relation with Rule 1 </td>
                                    <td><?php 
							  		if($_SESSION[facility][logic_one]=='0')
							  		{
							  			$logic_one_1 = "selected = selected";
							  		}
									else
							  		{
										$logic_one_2 = "selected = selected";
							  		}
							  		?>
                                    <select name="logic_one" <?php echo $disabled; ?>>
                                        <option value="0" <?php echo  $logic_one_1 ; ?>>and</option>
                                        <option value="1" <?php echo  $logic_one_2 ; ?>>or</option>
                                    </select></td>
								</tr>
                                <tr>
                                	<td>Rule 2 </td>
                                    <td><?php
							  		if($_SESSION[facility][rule2_1] =='0')
							  		{
							  			$rule2_1_0 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule2_1] =='1')
							  		{
							  			$rule2_1_1 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='2')
								  	{
										$rule2_1_2 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='3')
								  	{
										$rule2_1_3 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='4')
								  	{
										$rule2_1_4 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='5')
								  	{
										$rule2_1_5 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='6')
								  	{
										$rule2_1_6 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='6')
								  	{
										$rule2_1_6 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='7')
								  	{
										$rule2_1_7 = "selected = selected";
									}
									elseif($_SESSION[facility][rule2_1] =='8')
								  	{
										$rule2_1_8 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='9')
								  	{
										$rule2_1_9 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='9')
								  	{
										$rule2_1_9 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='10')
								  	{
										$rule2_1_10 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='11')
								  	{
										$rule2_1_11 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='12')
								  	{
										$rule2_1_12 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='13')
								  	{
										$rule2_1_13 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='14')
								  	{
										$rule2_1_14 = "selected = selected";
								 	}
									elseif($_SESSION[facility][rule2_1] =='15')
								  	{
										$rule2_1_15 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='16')
								  	{
										$rule2_1_16 = "selected = selected";
								 	}
									elseif($_SESSION[facility][rule2_1] =='17')
								  	{
										$rule2_1_17 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='18')
								  	{
										$rule2_1_18 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='19')
								  	{
										$rule2_1_19 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='20')
								  	{
										$rule2_1_20 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='21')
								  	{
										$rule2_1_21 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='22')
								  	{
										$rule2_1_22 = "selected = selected";
								 	}
									elseif($_SESSION[facility][rule2_1] =='23')
								  	{
										$rule2_1_23 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='24')
								  	{
										$rule2_1_24 = "selected = selected";
								 	}
									elseif($_SESSION[facility][rule2_1] =='25')
								  	{
										$rule2_1_25 = "selected = selected";
								 	}
									elseif($_SESSION[facility][rule2_1] =='26')
								  	{
										$rule2_1_26 = "selected = selected";
								  	}
									elseif($_SESSION[facility][rule2_1] =='27')
								  	{
										$rule2_1_27 = "selected = selected";
								 	}
									elseif($_SESSION[facility][rule2_1] =='28')
								  	{
										$rule2_1_28 = "selected = selected";
								 	}
									elseif($_SESSION[facility][rule2_1] =='29')
								  	{
										$rule2_1_29 = "selected = selected";
								 	}
									elseif($_SESSION[facility][rule2_1] =='30')
									{
										$rule2_1_30 = "selected = selected";
								  	}
									?>
                                    <select name="rule2_1" <?php echo $disabled; ?>>
                                    	<option value="0" <?php echo $rule2_1_0; ?>>N/A</option>
                                        <option value="1" <?php echo $rule2_1_1; ?>>1</option>
										<option value="2" <?php echo $rule2_1_2; ?>>2</option>
                                        <option value="3" <?php echo $rule2_1_3; ?>>3</option>
                                        <option value="4" <?php echo $rule2_1_4; ?>>4</option>
                                        <option value="5" <?php echo $rule2_1_5; ?>>5</option>
                                        <option value="6" <?php echo $rule2_1_6; ?>>6</option>
                                        <option value="7" <?php echo $rule2_1_7; ?>>7</option>
                                        <option value="8" <?php echo $rule2_1_8; ?>>8</option>
                                        <option value="9" <?php echo $rule2_1_9; ?>>9</option>
                                        <option value="10" <?php echo $rule2_1_10; ?>>10</option>
                                        <option value="11" <?php echo $rule2_1_11; ?>>11</option>
                                        <option value="12" <?php echo $rule2_1_12; ?>>12</option>
                                        <option value="13" <?php echo $rule2_1_13; ?>>13</option>
                                       	<option value="14" <?php echo $rule2_1_14; ?>>14</option>
                                       	<option value="15" <?php echo $rule2_1_15; ?>>15</option>
                                       	<option value="16" <?php echo $rule2_1_16; ?>>16</option>
                                       	<option value="17" <?php echo $rule2_1_17; ?>>17</option>
                                       	<option value="19" <?php echo $rule2_1_18; ?>>18</option>
                                       	<option value="20" <?php echo $rule2_1_19; ?>>19</option>
                                       	<option value="21" <?php echo $rule2_1_20; ?>>20</option>
                                       	<option value="22" <?php echo $rule2_1_21; ?>>21</option>
                                       	<option value="23" <?php echo $rule2_1_22; ?>>22</option>
                                       	<option value="24" <?php echo $rule2_1_24; ?>>24</option>
                                       	<option value="25" <?php echo $rule2_1_25; ?>>25</option>
                                       	<option value="26" <?php echo $rule2_1_26; ?>>26</option>
                                       	<option value="27" <?php echo $rule2_1_27; ?>>27</option>
                                       	<option value="28" <?php echo $rule2_1_28; ?>>28</option>
                                       	<option value="29" <?php echo $rule2_1_29; ?>>29</option>
                                       	<option value="30" <?php echo $rule2_1_30; ?>>30</option>
									</select>
                                    <?php 
							  		if($_SESSION[facility][rule2_2]=='0')
							  		{
							 			$rule2_2_1 = "selected = selected";
							  		}
									else
							  		{
							  			$rule2_2_2 = "selected = selected";
							  		}
							  		?>
                                    <select name="rule2_2" <?php echo $disabled; ?>>
                                    	<option value="0" <?php echo $rule2_2_1; ?>>Week</option>
                                        <option value="1" <?php echo $rule2_2_2; ?>>Month</option>
                                    </select>
                                    <?php 
							  		if($_SESSION[facility][rule2_3]=='0')
							  		{
										$rule2_3_1 = "selected = selected";
							  		}
									else
							  		{
							  			$rule2_3_2 = "selected = selected";
							  		}
							  		?>
                                    <select name="rule2_3" <?php echo $disabled; ?>>
                                    	<option value="0" <?php echo $rule2_3_1; ?>>Peak Time</option>
                                        <option value="1" <?php echo $rule2_3_2; ?>>Non-Peak Time</option>
                                    </select>                                    </td>
								</tr>
                                <tr>
                                	<td>Relation with rule 2 </td>
                                    <td><?php 
							  		if($_SESSION[facility][logic_two]=='0')
							  		{
										  	$logic_two_1 = "selected = selected";
									}
									else
							  		{	
							  				$logic_two_2 = "selected = selected";
							  		}
							  		?>
                                    <select name="logic_two" <?php echo $disabled; ?>>
                                    	<option value="0" <?php echo  $logic_two_1; ?>>and</option>
										<option value="1" <?php echo  $logic_two_2; ?>>or</option>
                                    </select></td>
                                </tr>
                                <tr>
	                                <td>Rule 3 </td>
                                    <td><?php
							  		if($_SESSION[facility][rule3_1] =='0')
							  		{
							  			$rule3_1_0 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='1')
							  		{
							  			$rule3_1_1 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='2')
							  		{
							  			$rule3_1_2 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='3')
							  		{
							  			$rule3_1_3 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='4')
							  		{
							  			$rule3_1_4 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='5')
							  		{
							  			$rule3_1_5 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='6')
							  		{
							  			$rule3_1_6 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='6')
							  		{
							  			$rule3_1_6 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='7')
							  		{
							  			$rule3_1_7 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='8')
							  		{
							  			$rule3_1_8 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='9')
							  		{
							  			$rule3_1_9 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='9')
							  		{
							  			$rule3_1_9 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='10')
							  		{
							  			$rule3_1_10 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='11')
							  		{
							  			$rule3_1_11 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='12')
							  		{
							  			$rule3_1_12 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='13')
							  		{
							  			$rule3_1_13 = "selected = selected";
							 		}
									elseif($_SESSION[facility][rule3_1] =='14')
							  		{
							  			$rule3_1_14 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='15')
							  		{
							  			$rule3_1_15 = "selected = selected";
							 		}
									elseif($_SESSION[facility][rule3_1] =='16')
							  		{
							  			$rule3_1_16 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='17')
							  		{
							  			$rule3_1_17 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='18')
							  		{
							  			$rule3_1_18 = "selected = selected";
									}
									elseif($_SESSION[facility][rule3_1] =='19')
							  		{
							  			$rule3_1_19 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='20')
							  		{
							  			$rule3_1_20 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='21')
							  		{
							  			$rule3_1_21 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='22')
							  		{
							  			$rule3_1_22 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='23')
							  		{
							  			$rule3_1_23 = "selected = selected";
									}
									elseif($_SESSION[facility][rule3_1] =='24')
							  		{
							  			$rule3_1_24 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='25')
							  		{
							  			$rule3_1_25 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='26')
							  		{
							  			$rule3_1_26 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='27')
							  		{
							  			$rule3_1_27 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='28')
							  		{
							  			$rule3_1_28 = "selected = selected";
							  		}
									elseif($_SESSION[facility][rule3_1] =='29')
							  		{
							  			$rule3_1_29 = "selected = selected";
							 		}
									elseif($_SESSION[facility][rule3_1] =='30')
							  		{
							  			$rule3_1_30 = "selected = selected";
							  		}
							  		?>
                                    <select name="rule3_1" <?php echo $disabled; ?>>
                                    	<option value="0" <?php echo $rule3_1_0; ?>>N/A</option>
                                        <option value="1" <?php echo $rule3_1_1; ?>>1</option>
                                        <option value="2" <?php echo $rule3_1_2; ?>>2</option>
                                        <option value="3" <?php echo $rule3_1_3; ?>>3</option>
                                        <option value="4" <?php echo $rule3_1_4; ?>>4</option>
                                        <option value="5" <?php echo $rule3_1_5; ?>>5</option>
                                        <option value="6" <?php echo $rule3_1_6; ?>>6</option>
                                        <option value="7" <?php echo $rule3_1_7; ?>>7</option>
                                        <option value="8" <?php echo $rule3_1_8; ?>>8</option>
                                        <option value="9" <?php echo $rule3_1_9; ?>>9</option>
                                        <option value="10" <?php echo $rule3_1_10; ?>>10</option>
                                        <option value="11" <?php echo $rule3_1_11; ?>>11</option>
                                        <option value="12" <?php echo $rule3_1_12; ?>>12</option>
                                        <option value="13" <?php echo $rule3_1_13; ?>>13</option>
                                        <option value="14" <?php echo $rule3_1_14; ?>>14</option>
                                        <option value="15" <?php echo $rule3_1_15; ?>>15</option>
                                        <option value="16" <?php echo $rule3_1_16; ?>>16</option>
                                        <option value="17" <?php echo $rule3_1_17; ?>>17</option>
                                        <option value="19" <?php echo $rule3_1_18; ?>>18</option>
                                        <option value="20" <?php echo $rule3_1_19; ?>>19</option>
                                        <option value="21" <?php echo $rule3_1_20; ?>>20</option>
                                        <option value="22" <?php echo $rule3_1_21; ?>>21</option>
                                        <option value="23" <?php echo $rule3_1_22; ?>>22</option>
                                        <option value="24" <?php echo $rule3_1_24; ?>>24</option>
                                        <option value="25" <?php echo $rule3_1_25; ?>>25</option>
										<option value="26" <?php echo $rule3_1_26; ?>>26</option>
                                        <option value="27" <?php echo $rule3_1_27; ?>>27</option>
                                        <option value="28" <?php echo $rule3_1_28; ?>>28</option>
                                        <option value="29" <?php echo $rule3_1_29; ?>>29</option>
                                        <option value="30" <?php echo $rule3_1_30; ?>>30</option>
									</select>
                                    <?php 
									if($_SESSION[facility][rule3_2]=='0')
									{
										$rule3_2_1 = "selected = selected";
							  		}
									else
							  		{
							  			$rule3_2_2 = "selected = selected";
							  		}
							  		?>
                                    <select name="rule3_2" <?php echo $disabled; ?>>
                                    	<option value="0" <?php echo $rule3_2_1; ?>>Week</option>
                                        <option value="1" <?php echo $rule3_2_2; ?>>Month</option>
                                    </select>
                                    <?php 
							  		if($_SESSION[facility][rule3_3]=='0')
							 		{
							  			$rule3_3_1 = "selected = selected";
							 		}
									else
							  		{
							  			$rule3_3_2 = "selected = selected";
							  		}
							  		?>
                                    <select name="rule3_3" <?php echo $disabled; ?>>
                                    	<option value="0" <?php echo $rule3_3_1; ?>>Peak Time</option>
										<option value="1" <?php echo $rule3_3_2; ?>>Non-Peak Time</option>
                                    </select></td>
								</tr>
                                </table>                                </td>
							</tr>
                            <tr>
                            	<td colspan="3" bgcolor="#FDF5E1">&nbsp;</td>
                                <td colspan="5" bgcolor="#FDF5E1">&nbsp;</td>
                                <td colspan="3" bgcolor="#FDF5E1">&nbsp;</td>
							    <td colspan="2" bgcolor="#FDF5E1">&nbsp;</td>
                            </tr>
                            <tr>
                            	<td colspan="8" bgcolor="#FDF5E1">Booking Open From
                                <label></label>
                                <?php
							  	if($_SESSION[facility][open_from] =='0')
							  	{
							  		$open_from_0 = "selected = selected";
								}
								elseif($_SESSION[facility][open_from] =='1')
							  	{
							  		$open_from_1 = "selected = selected";
							    }
								elseif($_SESSION[facility][open_from] =='2')
							  	{
							  		$open_from_2 = "selected = selected";
							    }
								elseif($_SESSION[facility][open_from] =='3')
							  	{
							  		$open_from_3 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='4')
							  	{
							  		$open_from_4 = "selected = selected";
							    }
								elseif($_SESSION[facility][open_from] =='5')
							  	{
							  		$open_from_5 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='6')
							  	{
							  		$open_from_6 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='6')
							  	{
							  		$open_from_6 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='7')
							  	{
							  		$open_from_7 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='8')
							  	{
							  		$open_from_8 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='9')
							  	{
							  		$open_from_9 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='9')
							  	{
							  		$open_from_9 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='10')
							  	{
							  		$open_from_10 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='11')
							  	{	
							  		$open_from_11 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='12')
							  	{
							  		$open_from_12 = "selected = selected";
							 	}
								elseif($_SESSION[facility][open_from] =='13')
							  	{
							  		$open_from_13 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='14')
							  	{
							  		$open_from_14 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='15')
							  	{
							  		$open_from_15 = "selected = selected";
								}
								elseif($_SESSION[facility][open_from] =='16')
							  	{
							  		$open_from_16 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='17')
							  	{
							  		$open_from_17 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='18')
							  	{
							  		$open_from_18 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='19')
							  	{
							  		$open_from_19 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='20')
							  	{
							  		$open_from_20 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='21')
							  	{
							  		$open_from_21 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='22')
							  	{
							  		$open_from_22 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='23')
							  	{
							  		$open_from_23 = "selected = selected";
							 	}
								elseif($_SESSION[facility][open_from] =='24')
							  	{
							  		$open_from_24 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='25')
							  	{
							  		$open_from_25 = "selected = selected";
							 	}
								elseif($_SESSION[facility][open_from] =='26')
							  	{
							  		$open_from_26 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='27')
							  	{
							  		$open_from_27 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='28')
							  	{
							  		$open_from_28 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='29')
							  	{
							  		$open_from_29 = "selected = selected";
							  	}
								elseif($_SESSION[facility][open_from] =='30')
							  	{
							  		$open_from_30 = "selected = selected";
							  	}
							  	elseif($_SESSION[facility][open_from] =='60')
							  	{
							  		$open_from_60 = "selected = selected";
							  	}
							  	?>
                                <select name="open_from" <?php echo $disabled; ?>>
                                	<option value="0" <?php echo $open_from_0; ?>>N/A</option>
                                    <option value="1" <?php echo $open_from_1; ?>>1</option>
                                    <option value="2" <?php echo $open_from_2; ?>>2</option>
                                    <option value="3" <?php echo $open_from_3; ?>>3</option>
                                    <option value="4" <?php echo $open_from_4; ?>>4</option>
                                    <option value="5" <?php echo $open_from_5; ?>>5</option>
                                    <option value="6" <?php echo $open_from_6; ?>>6</option>
                                    <option value="7" <?php echo $open_from_7; ?>>7</option>
                                    <option value="8" <?php echo $open_from_8; ?>>8</option>
                                    <option value="9" <?php echo $open_from_9; ?>>9</option>
                                    <option value="10" <?php echo $open_from_10; ?>>10</option>
                                    <option value="11" <?php echo $open_from_11; ?>>11</option>
                                  	<option value="12" <?php echo $open_from_12; ?>>12</option>
                                  	<option value="13" <?php echo $open_from_13; ?>>13</option>
                                  	<option value="14" <?php echo $open_from_14; ?>>14</option>
                                  	<option value="15" <?php echo $open_from_15; ?>>15</option>
                                  	<option value="16" <?php echo $open_from_16; ?>>16</option>
                                  	<option value="17" <?php echo $open_from_17; ?>>17</option>
                                  	<option value="19" <?php echo $open_from_18; ?>>18</option>
                                  	<option value="20" <?php echo $open_from_19; ?>>19</option>
                                  	<option value="21" <?php echo $open_from_20; ?>>20</option>
                                  	<option value="22" <?php echo $open_from_21; ?>>21</option>
                                  	<option value="23" <?php echo $open_from_22; ?>>22</option>
                                  	<option value="24" <?php echo $open_from_24; ?>>24</option>
                                  	<option value="25" <?php echo $open_from_25; ?>>25</option>
                                  	<option value="26" <?php echo $open_from_26; ?>>26</option>
                                  	<option value="27" <?php echo $open_from_27; ?>>27</option>
                                  	<option value="28" <?php echo $open_from_28; ?>>28</option>
                                  	<option value="29" <?php echo $open_from_29; ?>>29</option>
                                  	<option value="30" <?php echo $open_from_30; ?>>30</option>
								  	<option value="60" <?php echo $open_from_60; ?>>60</option>
								</select>
                                Days and will be cancelled before
                                <?php
							  	if($_SESSION[facility][closed_at] =='0')
							  	{
							  		$closed_at_0 = "selected = selected";
							  	}
								elseif($_SESSION[facility][closed_at] =='1')
							  	{
							  		$closed_at_1 = "selected = selected";
							  	}
								elseif($_SESSION[facility][closed_at] =='2')
							  	{
							  		$closed_at_2 = "selected = selected";
							  	}
								elseif($_SESSION[facility][closed_at] =='3')
							  	{
							  		$closed_at_3 = "selected = selected";
							  	}
								elseif($_SESSION[facility][closed_at] =='4')
							  	{
							  		$closed_at_4 = "selected = selected";
							  	}
								elseif($_SESSION[facility][closed_at] =='5')
							  	{
							  		$closed_at_5 = "selected = selected";
							  	}
								elseif($_SESSION[facility][closed_at] =='6')
							  	{
							  		$closed_at_6 = "selected = selected";
							  	}
								elseif($_SESSION[facility][closed_at] =='6')
							  	{
							  		$closed_at_6 = "selected = selected";
							  	}
								elseif($_SESSION[facility][closed_at] =='7')
							  	{
							  		$closed_at_7 = "selected = selected";
							  	}
								elseif($_SESSION[facility][closed_at] =='8')
							  	{
							  		$closed_at_8 = "selected = selected";
							  	}
								elseif($_SESSION[facility][closed_at] =='9')
							  	{
							  		$closed_at_9 = "selected = selected";
							  	}
								elseif($_SESSION[facility][closed_at] =='9')
							  	{
							  		$closed_at_9 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='10')
								{
									$closed_at_10 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='11')
								{
									$closed_at_11 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='12')
								{
									$closed_at_12 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='13')
								{
									$closed_at_13 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='14')
								{
									$closed_at_14 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='15')
								{
									$closed_at_15 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='16')
								{
									$closed_at_16 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='17')
								{
									$closed_at_17 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='18')
								{
									$closed_at_18 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='19')
								{
									$closed_at_19 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='20')
								{
									$closed_at_20 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='21')
								{
									$closed_at_21 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='22')
								{
									$closed_at_22 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='23')
								{
									$closed_at_23 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='24')
								{
									$closed_at_24 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='25')
								{
									$closed_at_25 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='26')
								{
									$closed_at_26 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='27')
								{
									$closed_at_27 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='28')
								{
									$closed_at_28 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='29')
								{
									$closed_at_29 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='30')
								{
									$closed_at_30 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='48')
								{
									$closed_at_48 = "selected = selected";
								}
								elseif($_SESSION[facility][closed_at] =='72')
								{
									$closed_at_72 = "selected = selected";
								}
								?>
                                <select name="closed_at" <?php echo $disabled; ?>>
                                	<option value="0" <?php echo $closed_at_0; ?>>N/A</option>
                                    <option value="1" <?php echo $closed_at_1; ?>>1</option>
                                    <option value="2" <?php echo $closed_at_2; ?>>2</option>
                                    <option value="3" <?php echo $closed_at_3; ?>>3</option>
                                    <option value="4" <?php echo $closed_at_4; ?>>4</option>
                                    <option value="5" <?php echo $closed_at_5; ?>>5</option>
                                    <option value="6" <?php echo $closed_at_6; ?>>6</option>
                                    <option value="7" <?php echo $closed_at_7; ?>>7</option>
                                    <option value="8" <?php echo $closed_at_8; ?>>8</option>
                                    <option value="9" <?php echo $closed_at_9; ?>>9</option>
                                    <option value="10" <?php echo $closed_at_10; ?>>10</option>
                                    <option value="11" <?php echo $closed_at_11; ?>>11</option>
                                    <option value="12" <?php echo $closed_at_12; ?>>12</option>
                                    <option value="13" <?php echo $closed_at_13; ?>>13</option>
                                    <option value="14" <?php echo $closed_at_14; ?>>14</option>
                                    <option value="15" <?php echo $closed_at_15; ?>>15</option>
                                    <option value="16" <?php echo $closed_at_16; ?>>16</option>
                                    <option value="17" <?php echo $closed_at_17; ?>>17</option>
                                    <option value="19" <?php echo $closed_at_18; ?>>18</option>
                                    <option value="20" <?php echo $closed_at_19; ?>>19</option>
                                    <option value="21" <?php echo $closed_at_20; ?>>20</option>
                                    <option value="22" <?php echo $closed_at_21; ?>>21</option>
                                    <option value="23" <?php echo $closed_at_22; ?>>22</option>
                                    <option value="24" <?php echo $closed_at_24; ?>>24</option>
                                    <option value="25" <?php echo $closed_at_25; ?>>25</option>
                                    <option value="26" <?php echo $closed_at_26; ?>>26</option>
                                    <option value="27" <?php echo $closed_at_27; ?>>27</option>
                                    <option value="28" <?php echo $closed_at_28; ?>>28</option>
                                    <option value="29" <?php echo $closed_at_29; ?>>29</option>
                                    <option value="30" <?php echo $closed_at_30; ?>>30</option>
								    <option value="48" <?php echo $closed_at_48; ?>>48</option>
								    <option value="72" <?php echo $closed_at_72; ?>>72</option>
								</select>
                                Hrs if not confirmed </td>
                                <td colspan="3" bgcolor="#FDF5E1">&nbsp;</td>
                                <td colspan="2" bgcolor="#FDF5E1">&nbsp;</td>
							</tr>
                            <tr>
                            	<td colspan="13" bgcolor="#FDF5E1">&nbsp;</td>
                            </tr>
                            <tr>
                            	<td colspan="10" bgcolor="#FDF5E1"><p>
                                <?php 
							  	if($_SESSION[facility][os]=='time_based')
							  	{
									$os_2 = "checked=checked";
							  	}
								else
							  	{
									$os_1 = "checked=checked";
							  	}
							  	?>
                                <label>Session Based
                                <input type="radio" name="os" value="sess" <?php echo $os_1; ?>  <?php echo $disabled; ?>>
                                </label>
                                <label>Time Based
                                <input type="radio" name="os" value="time_based" <?php echo $os_2; ?> <?php echo $disabled; ?>>
                                </label>
                                <label style="margin-bottom: 1em; padding-bottom: 1em; border-bottom: 3px silver groove;">
                                <input name="hidden" type="hidden" class="DEPENDS ON os BEING time_based OR os BEING sess">
                                </label>
                                <label></label>
                                <label></label>
                                <label>Hrs
                                <input type="hrs" name="hrs" class="CONFLICTS WITH apache AND DEPENDS ON os BEING time_based" maxlength="5" size="5"  tooltiptext="Define how many hours will be defined as one session. (e.g 4 , if you enter 4 then system will take one booking for 4 hour)" <?php echo $disabled; ?> value="<?php echo $_SESSION[facility][hrs];?>">
                                </label>
                                <label style="margin-bottom: 1em; padding-bottom: 1em; border-bottom: 3px silver groove;">
                                <input name="hidden" type="hidden" class="CONFLICTS WITH pass BEING EMPTY">
                                </label>
                                </p></td>
                                <td width="5%" bgcolor="#FDF5E1">&nbsp;</td>
                                <td width="1%" bgcolor="#FDF5E1">&nbsp;</td>
                                <td width="9%" bgcolor="#FDF5E1">&nbsp;</td>
							</tr>
                            <tr>
                            	<td colspan="13" bgcolor="#FCECC7">Auto Close Date
                                <label>
                                <?php 
							  	if($_SESSION[facility][auto_close]=='1')
							  	{
							  		$auto_close_1 = "checked=checked";
							  	}
								else
							  	{
							  		$auto_close_1 = "";
							  	}
							  	?>
                                <input type="checkbox" name="auto_close" value="1" <?php echo $disabled; ?> tooltiptext="Check this box if you want system to close the booking of this facilitie at given data on either every mont or year." <?php echo $auto_close_1; ?>>
                                </label>                                </td>
							</tr>
                            <tr>
                            	<td width="11%">From</td>
                                <td width="7%"><strong>:</strong></td>
                                <td width="20%"><label>
                                <input name="from_date" type="text" size="10" maxlength="10" readonly="" <?php echo $disabled; ?> value="<?php echo $_SESSION[facility][from_date]; ?>">
                                <img src="images/icon-calender.gif" width="19" height="18"  onclick="displayCalendar(document.forms[0].from_date,'dd.mm.yyyy',this)" value="Cal"></label></td>
                                <td width="15%">&nbsp;</td>
                                <td width="2%">To</td>
                                <td width="5%"><strong>:</strong></td>
                                <td width="15%"><input name="to_date" type="text" size="10" maxlength="10" readonly="" <?php echo $disabled; ?> value="<?php echo $_SESSION[facility][to_date]; ?>">
                                <img src="images/icon-calender.gif" width="19" height="18"  onclick="displayCalendar(document.forms[0].to_date,'dd.mm.yyyy',this)" value="Cal"></td>
                                <td width="6%"><div align="right">Frame</div></td>
                                <td width="1%"><strong>:</strong></td>
                                <td colspan="4"><label>
                                <?php 
							  	if($_SESSION[facility][frame]=='0')
							  	{
									$frame_1 = "selected = selected";
							  	}
								else
							  	{
							  		$frame_2 = "selected = selected";
							  	}
							  	?>
                                <select name="frame" <?php echo $disabled; ?> tooltiptext="You want to disable this facilities on every month or every year of specified dates ?">
                                	<option value="0" <?php echo  $frame_1; ?>>Month</option>
                                    <option value="1" <?php echo  $frame_2; ?>>Year</option>
                                </select>
                                </label>                                </td>
							</tr>
                            <tr>
                            	<td colspan="2">Message</td>
                                <td><label>
                                <input type="text" name="message" <?php echo $disabled; ?> value="<?php echo $_SESSION[facility][message]; ?>" >
                                </label></td>
                                <td colspan="2"><div align="right">Add to Calender </div></td>
                                <td><strong>:</strong></td>
                                <td><label>
                              	<?php 
							  	if($_SESSION[facility][auto_cal]=='1')
							  	{
							  		$auto_cal = "checked=checked";
							  	}
								else
							  	{
							 		$auto_cal = "";
							  	}
							  	?>
                                <input type="checkbox" name="auto_cal" value="1" <?php echo $disabled; ?> <?php echo $auto_cal; ?> tooltiptext="Check this box if you want system to display this event on calander.">
                                </label></td>
                                <td colspan="6">&nbsp;</td>
							</tr>
                            <tr>
                    	<td colspan="13" bgcolor="#944542" style="border-left:1px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><span class="fontitle"><strong>&nbsp;Barring Rules </strong></span></td>
					</tr>
                    <tr>
                    	<td colspan="13" style="border-left:0px solid #b09852;border-right:0px solid #b09852; padding-left:5px; padding-top:5px; padding-bottom:5px;">User will be barred from booking this facility for <select name="month_blocked">
                        <option value="0" <? if ($_SESSION[facility][month_blocked] == 0) { echo "selected"; } ?>>0</option>
                        <option value="1" <? if ($_SESSION[facility][month_blocked] == 1) { echo "selected"; } ?>>1</option>
                        <option value="2" <? if ($_SESSION[facility][month_blocked] == 2) { echo "selected"; } ?>>2</option>
                        <option value="3" <? if ($_SESSION[facility][month_blocked] == 3) { echo "selected"; } ?>>3</option>
                        <option value="4" <? if ($_SESSION[facility][month_blocked] == 4) { echo "selected"; } ?>>4</option>
                        <option value="5" <? if ($_SESSION[facility][month_blocked] == 5) { echo "selected"; } ?>>5</option>
                        </select> month(s) if they are absent <select name="absent_amount"> 
                        <option value="0" <? if ($_SESSION[facility][absent_amount] == 0) { echo "selected"; } ?>>0</option>
                        <option value="1" <? if ($_SESSION[facility][absent_amount] == 1) { echo "selected"; } ?>>1</option>
                        <option value="2" <? if ($_SESSION[facility][absent_amount] == 2) { echo "selected"; } ?>>2</option>
                        <option value="3" <? if ($_SESSION[facility][absent_amount] == 3) { echo "selected"; } ?>>3</option>
                        <option value="4" <? if ($_SESSION[facility][absent_amount] == 4) { echo "selected"; } ?>>4</option>
                        <option value="5" <? if ($_SESSION[facility][absent_amount] == 5) { echo "selected"; } ?>>5</option>
                        </select> times over a period of <select name="month_period"> <option value="0" <? if ($_SESSION[facility][month_period] == 0) { echo "selected"; } ?>>0</option>
                        <option value="1" <? if ($_SESSION[facility][month_period] == 1) { echo "selected"; } ?>>1</option>
                        <option value="2" <? if ($_SESSION[facility][month_period] == 2) { echo "selected"; } ?>>2</option>
                        <option value="3" <? if ($_SESSION[facility][month_period] == 3) { echo "selected"; } ?>>3</option>
                        <option value="4" <? if ($_SESSION[facility][month_period] == 4) { echo "selected"; } ?>>4</option>
                        <option value="5" <? if ($_SESSION[facility][month_period] == 5) { echo "selected"; } ?>>5</option>
                        
                        </select> month(s).</td>
					</tr>
                            <tr>
                            	<td colspan="13">&nbsp;</td>
                            </tr>
                          </table>                        </td>
					  </tr>
                        <tr>
                        	<td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td colspan="11"><div align="right">
                            <label></label>
                            <input type="submit" name="Submit2" value="Update" <?php echo $disabled; ?>>
                            </div></td>
                        </tr>
                        <tr>
                        	<td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td colspan="11"><label></label></td>
                        </tr>
                      </table>
                      	</form>
                  </td>
                  </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
           	  </table>
                  	<?php
					}
			 		?>
                  	<?php //print_r($_POST);
			 		if(isset($_POST[type]) && $_POST[type] == 'cancle')
			 		{
						$can_date = date('d-m-Y H:i:s');
						$query = "update my_booking set status ='2',cancle_reson ='$_POST[reason]',amount_returned ='$_POST[refund_amount]',cancle_booking_date_time='$can_date' where sno = '$_POST[booking_no]' limit 1";
						mysql_query($query) or die(mysql_error());
					}
					else
					if(isset($_POST[type]) && $_POST[type] == 'approve')
					{
						$a_date = date('d-m-Y H:i:s');
			 			$query = "update my_booking set status ='1',cancle_reson ='$_POST[reason]',amount_recived ='$_POST[refund_amount2]',date_of_conf='$a_date' where sno = '$_POST[booking_no]' limit 1";
						mysql_query($query) or die(mysql_error());
			 		}
			 				   
				   		?>
            			<?
			 			if($_GET[page]=='book_now')
			 			{
			 				$curent_date = date('d-m-Y');
			 				if($_GET[st]=='1')
			 				{
			 					echo "<div align=center>Booking placed </div>";
			 				}
			 				?>
            				<br>
                            <b>To place online bookings, please select the respective facility 
                            and date. <br>
                            Click [ Search ] to view available timeslots for bookings. </b>
                            <p><font color="#FF0000" size="2">Note:</font><font size="2"><br>
                              All online bookings made are subject to approval from management 
                              office and it would be lapsed if not confirmed as per the booking 
                              regulations. Please refer to <a href="#">By-Laws</a> for facilities 
                              terms and booking restrictions per unit/per facility.</font><br>
                            </p>
                            <form name="form1" method="post" action="booking.php?crypted=<?php echo $_GET[crypted]; ?>&id=<?php echo $_GET[id]; ?>&page=<?php echo $_GET[page]; ?>&user_id=<?php echo $_GET[user_id]; ?>&fac=<?php echo $_GET[fac]; ?>">
                            <table width="100%" border="0" align="center" class="sk_bok_green">
                            <tr>
                       		  <td colspan="10" bgcolor="#994947"><span class="fontitle"><strong> &nbsp;Place Booking</strong></span> </td>
                      		</tr>
                            <tr>
                        		<td colspan="10"><?php 
				   				$query = "select * from facility where sno = '$_GET[fac]' limit 1";
							   	$result = mysql_query($query);
							   	while($row=mysql_fetch_array($result))
							   	{
							   		$open_from  = $row[open_from];
				   					$os = $row[os];
									$hours = $row[hours];
									$indooroutdoor = $row[type];
									$unique_no  = $row[unique_no];
									$deposite  = $row[deposite];
									$auto_apporve = $row[auto_apporve];
									$closed_at = $row[closed_at];
									$max_booking_per_day = $row[max_booking_per_day];
									$rule1_1  = $row[rule1_1];
									$rule1_2 = $row[rule1_2];
									$rule1_3 = $row[rule1_3];
									$relation_rule_1 = $row[relation_rule_1];
									$rule2_1  = $row[rule2_1];
									$rule2_2 = $row[rule2_2];
									$rule2_3  = $row[rule2_3];
									$relation_rule_2 = $row[relation_rule_2];
									$rule3_1 = $row[rule3_1];
					 				$rule3_2 = $row[rule3_2];
					 				$rule3_3  = $row[rule3_3];
								}
								
								// to check if facility has peak hour or not
								
								if ($rule1_3 == '0' || $rule2_3 == '0' || $rule3_3 == '0')
								{
									$display_legend = 1;	
								}
								else
								{
									$display_legend = 0;	
								}
								
				   				if($_POST[date_sel] !='')
				   				{
									//print_r($_POST);
									if(isset($_POST[Submit4]))
									{
										$date_explode = explode('-',$_POST[date_sel]);
										// since cant change the date_of_booking using normal date functions, have to get the day, month and year individually because the date of booking is referring to the date of the booking, not date of entry.
										//$day = $date_explode[0];
										//$month = $date_explode[1];
										//$year = $date_explode[2];
										$day = date("d");
										$month = date("m");
										$year = date("Y");
										$time_explode = explode('-',$_POST[time_fram]);
										$from_time_sel = "$time_explode[0]";
										$peak_time_exp = explode('&',$time_explode[1]);
										$to_time_sel = "$peak_time_exp[0]";
										$time_type = $peak_time_exp[1];
										if($auto_apporve =='1')
										{
											$status = '1';
										}
										else
										{		
											$status = '0';
										}
										if($deposite =='' or $deposite <= '0')
										{
											$payment_status = "3";
										}
										else
										{
											$payment_status = "0";
										}
										$query = "select * from my_booking where unique_no = '$unique_no' and uid ='$_GET[user_id]' and status !='2' and from_time ='$from_time_sel' and to_time ='$to_time_sel' and date_of_booking ='$_POST[date_sel]'";
										$result = mysql_query($query);
										$is_there = mysql_num_rows($result);
										if($is_there =='0')
										{
											$time_of_booking = date('H:i:s');
											//$date_of_booking = date('d-m-Y');
											// date of booking was taken as date selected. Not sure why when he has exploded the date selected and put into correct column. So, in this case, $date_0f_booking is derived used date functions and inserted into my_booking (ignore this because it doesnt work)
											//$query = "insert into my_booking (uid,unique_no,status,payment_status,date_of_booking,time_of_booking,day,month,year,from_time,to_time,time_type)values('$_GET[user_id]','$unique_no','$status','$payment_status','$date_of_booking','$time_of_booking','$day','$month','$year','$from_time_sel','$to_time_sel','$time_type')  ";
											$spot  = time() + (1 * $closed_at * 60 * 60);
											$lapsed_date = date("YmdHis", $spot);
											
											$query = "insert into my_booking (uid,rid,unique_no,status,payment_status,date_of_booking,time_of_booking,day,month,year,from_time,to_time,time_type,lapsed_date)values('$_GET[user_id]','$id','$unique_no','$status','$payment_status','$_POST[date_sel]','$time_of_booking','$day','$month','$year','$from_time_sel','$to_time_sel','$time_type','$lapsed_date')  ";
											mysql_query($query);
										}
									}
									//start Date
									$exp_date = $_POST[date_sel];
									$curent_date = $exp_date ;
									//start of day funcation
									$exp1_date = explode("-",$exp_date);
									//print_r($exp1_date);
									$day = $exp1_date[0];
									$month = $exp1_date[1];
									$year = $exp1_date[2];
									$opening = mktime(0, 0, 0, $month, $day, $year);
									$now = time();
									$starting_date_choose = floor($closed_at / 24);
									$dayselepsed = ceil(($opening - $now) / (1 * 24 * 60 * 60));
									//echo "((" . $dayselepsed . "<" . $starting_date_choose . "||" . $dayselepsed . "< 0) &&" . $starting_date_choose . "> 1)";
									
									if($dayselepsed  < 0)				   
									{
										echo "<div align=center><font color=red>Please choose date from today onwards</font></div>";
										$curent_date = date('d-m-Y');
										$error =1;
									}
									elseif($dayselepsed >= $open_from)
									{
										echo "<div align=center><font color=red>Please choose date not more than $open_from days from today </font></div>";
										$curent_date = date('d-m-Y');
										$error =1;
									}
									else
									{
										$error =0;
						
									}
				   				}
								else
				   				{
				   					$error =1;
								}
				   				?>                                </td>
                      		</tr>
                      		<tr>
                              <td width="7%">User</td>
                                <td width="1%"><strong>:</strong></td>
                                <td width="20%"><?php
								  if($user_type=='0')
								  {
									$funcation_dis = "disabled = disabled";
								  }				   
								?>
                            	<select name="menu1" onChange="MM_jumpMenu('parent',this,0)" <?php echo $funcation_dis ; ?> >
                              		<option value="booking.php?crypted=<?php echo "$_GET[crypted]&id=$_GET[id]&page=book_now"; ?>">Select User</option>
                              		<?php
									$query = "select * from user_account where active ='1'";
									$result = mysql_query($query);
									while($row=mysql_fetch_array($result))
									{
										if($_GET[user_id] == $row[id])
										{
										
											$sel = "selected = selected";
										}else
										{
											$sel = "";
										
										}
										echo " <option value=booking.php?crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$row[id] $sel>$row[username]</option>";
									}
									?>
								</select>                              </td>
                        		<td width="13%">Select Facilites </td>
                        		<td width="1%"><strong>:</strong></td>
                        		<td width="14%"><?php
				   				if($_GET[user_id]=='')
				   				{
								   $dis  = "disabled";
								   $msg  = "Please Select User";
								}
								else
							   	{
							   		$msg  = "Select Facilites";
									$dis  = "";
							   	}
								?>
                            	<select name="menu2" onChange="MM_jumpMenu('parent',this,0)" <?php echo $dis; ?>>
                              		<option value="booking.php?crypted=<?php echo "$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]"; ?>"><?php echo $msg; ?></option>
                              		<?php
					 				$query = "select * from facility where enable ='1' ";
									$result = mysql_query($query);
									while($row=mysql_fetch_array($result))
					  				{
					 			 		if($_GET[fac] == $row[sno])
										{
											$sel_fac = "selected = selected";
										}
										else
										{
											$sel_fac = "";
										}
										echo " <option value=booking.php?crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$row[sno] $sel_fac>$row[name]</option>";
					  				}
					  				?>
                          		</select>                              </td>
                        		<td width="8%">
               				  <div align="right"> Date </div>                  </td>
                        		<td width="1%"><strong>:</strong></td>
                        		<td width="17%"><label>
                          		<input name="date_sel" type="text" value="<?php echo $curent_date; ?>" size="8" maxlength="10" readonly="">
                          		</label>
                            	<img src="images/icon-calender.gif" alt="View Calender" width="19" height="18"  onclick="displayCalendar(document.forms[0].date_sel,'dd-mm-yyyy',this)" value="Cal">
                           	  <label></label></td>
                                <td width="18%">
<INPUT TYPE="image" SRC="images/buttons/searchbutton.jpg" <?php echo $dis; ?>>                  </td>
                      		</tr>
                      		<tr>
                              <td colspan="10"><?php
				  				if($error!='1')
								{
									$time_of_booking = '';
									$query_my_booking = "select * from my_booking where unique_no = '$unique_no' and date_of_booking = '$_POST[date_sel]' and uid = '$_GET[user_id]' and status !='2'";
									$result_my_query = mysql_query($query_my_booking);
							 		$count_booking_for_day = mysql_num_rows($result_my_query);
									if($count_booking_for_day==$max_booking_per_day)
									{
										$all_system_disabled = "1";
										$all_system_msg = "only $max_booking_per_day booking allowed in a day";
									}
									$query_facility = "select * from facility where unique_no ='$unique_no' limit 1";
									$result_facility = mysql_query($query_facility);
									while($row_facility=mysql_fetch_array($result_facility))
									{
										$name_fac = $row_facility[name];
										$auto_apporve = $row_facility['auto_apporve'];
									}
							 		$today_week = date(w);
							 		$date_exp_sel = explode('-', $_POST[date_sel]);
									$mon_sel_sel = $date_exp_sel[1];
									$day_sel_sel = $date_exp_sel[0];
									$year_sel_sel = $date_exp_sel[2];
									$stamp = mktime(0,0,0,$mon_sel_sel,$day_sel_sel,$year_sel_sel);
									$weak = date('w',$stamp);
									$today_week =$weak; 
									$week_starting_date = mktime(0, 0, 0, $mon_sel_sel ,$day_sel_sel-$today_week,   $year_sel_sel);
									$week_starting_date =  date("d-m-Y", $week_starting_date);
									$week_starting_date =  explode('-',$week_starting_date);
									$no_of_days_in_curent_month = date('t');
									
									
									$start_day_week = $week_starting_date[0];
									$start_month_week = $week_starting_date[1];
									$start_year_week = $week_starting_date[2];
									(int)$tottal_booking_in_week = 0;
									(int)$tottal_booking_in_week_peek_time = 0;
									(int)$tottal_booking_in_week_nonpeek_time = 0;
									(int)$tottal_booking_in_curent_month =0;
									(int)$tottal_booking_in_curent_month_in_peak_time =0;
									(int)$tottal_booking_in_curent_month_in_nonpeak_time =0;
									for($i=0;$i<=6;$i++) //find week details
									{
										$week_days = mktime(0, 0, 0, $start_month_week  , $start_day_week+$i,$start_year_week);
										$week_days = date("d-m-Y", $week_days);
										$query_count = "select * from my_booking where date_of_booking = '$week_days' and unique_no = '$unique_no' and uid = '$_GET[user_id]' and `status`  != '2'";
										$result_count = mysql_query($query_count);
										while($row_count= mysql_fetch_array($result_count))
										{
											$tottal_booking_in_week = $tottal_booking_in_week +1;
											if($row_count[time_type] =='1')
											{
												$tottal_booking_in_week_peek_time = $tottal_booking_in_week_peek_time +1;
											}
											else
											{
												$tottal_booking_in_week_nonpeek_time = $tottal_booking_in_week_nonpeek_time +1;
											}
										}
									}
									$start_month_month =  date(m);
									$start_year_month =  date(Y);
									$start_day_month = 0;
									for($i=1;$i<=$no_of_days_in_curent_month ;$i++) //find month details
									{
										$month_days = mktime(0, 0, 0, $start_month_month  , $start_day_month+$i , $start_year_month);
								 		$month_days = date("d-m-Y", $month_days);
										$query_count = "select * from my_booking where date_of_booking = '$month_days' and unique_no = '$unique_no' and uid = '$_GET[user_id]' and status  !=2";
										$result_count = mysql_query($query_count);
										while($row_count= mysql_fetch_array($result_count))
										{
											$tottal_booking_in_curent_month = $tottal_booking_in_curent_month +1;
											if($row_count[time_type] =='1')
											{
												$tottal_booking_in_curent_month_in_peak_time = $tottal_booking_in_curent_month_in_peak_time +1;									
											}
											else
											{
												$tottal_booking_in_curent_month_in_nonpeak_time = $tottal_booking_in_curent_month_in_nonpeak_time +1;
											}
										}
									}
									//echo "You have " . $bar_counter . " in the system.";
									/* echo "
									Tottal Booking in a day : $count_booking_for_day ;<br>
									Booking in Curent Month :	$tottal_booking_in_curent_month , 
									<br> 
									Booking in Curent Month Peak Time: $tottal_booking_in_curent_month_in_peak_time,<br>
									Booking in Curent Month Non Peak Time: $tottal_booking_in_curent_month_in_nonpeak_time<br>
									Total Booking in this week :  $tottal_booking_in_week<br>
									Total Booking in this Peak Time week :  $tottal_booking_in_week_peek_time<br>
									Total Booking in this Non Peak Time week :  $tottal_booking_in_week_nonpeek_time<br>
									------------<br>
								
									------------<br>$rule1_2d
									";		 */	
										
									if($rule1_2 == '1')// seeing if the first rule is upon month or week
									{
					
						
									if($rule1_3 =='0')// seeing no of booking allowed in peak time
									{
									
										if(  $tottal_booking_in_curent_month_in_peak_time >= $rule1_1  and $all_system_disabled =='' )
										{
											
												$all_system_disabled_peak = "1";
											$all_system_msg_peak = "only $rule1_1 booking allowed in a month at peak time you have already booked  $tottal_booking_in_curent_month_in_peak_time in this month";
											$rule1 = 1;
										
										}
										else
										{
										//	$all_system_disabled_peak ='';
										//	$all_system_msg_peak ='';
											$rule1 = 0;
										}
									}
									elseif($rule1_3 =='1') // non peak time
									{
										if($rule1_1  >= $tottal_booking_in_curent_month_in_nonpeak_time and $all_system_disabled =='')										{
											$all_system_disabled_nonpeak= "1";
											$all_system_msg_nonpeak = "only $rule1_1 booking allowed in a month at Non-Peak time you have already booked  $tottal_booking_in_curent_month_in_nonpeak_time in this month";
											$rule1 = 1;
										}
										else
										{
										//	$all_system_disabled ='';
										//	$all_system_msg ='';
											$rule1 = 0;
										}
									}
									else // any time
									{
										if($rule1_1  <= $tottal_booking_in_curent_month and $all_system_disabled =='')
										{
											$all_system_disabled = "1";
											$all_system_msg = "only $rule1_1 booking allowed in a month  you have already booked  $tottal_booking_in_curent_month in this month";
											$rule1 = 1;
										}
										else
										{
											//	$all_system_disabled ='';
											//$all_system_msg ='';
											$rule1 = 0;
										}
									}
								}
								else
								{// if rule 1 is weak
									if($rule1_3 =='0')// seeing no of booking allowed in peak time
									{
										if($rule1_1  <= $tottal_booking_in_week_peek_time and $all_system_disabled =='' )
										{
											$all_system_disabled_peak = "1";
											$all_system_msg_peak = "only $rule1_1 booking allowed in a week at peak time you have already booked  $tottal_booking_in_week_peek_time in this week";
											$rule1 = 1;
										}
										else
										{
										//	$all_system_disabled_peak ='';
										//	$all_system_msg_peak ='';
											$rule1 = 0;
										}
									}
									elseif($rule1_3 =='1') // non peak time
									{
										if($rule1_1  <= $tottal_booking_in_week_nonpeek_time and $all_system_disabled =='')
										{
											$all_system_disabled_nonpeak= "1";
											$all_system_msg_nonpeak = "only $rule1_1 booking allowed in a week at Non-Peak time you have already booked  $tottal_booking_in_week_nonpeek_time in this week";
											$rule1 = 1;
										}
										else
										{
										//	$all_system_disabled ='';
										//	$all_system_msg ='';
											$rule1 = 0;
										}
									}
									else // any time
									{
										if($rule1_1  <= $tottal_booking_in_week and $all_system_disabled =='')
										{
											$all_system_disabled = "1";
											$all_system_msg = "only $rule1_1 booking allowed in a weak  you have already booked  $tottal_booking_in_week in this weak";
											$rule1 = 1;
										}
										else
										{
										//	$all_system_disabled ='';
										//	$all_system_msg ='';
											$rule1 = 0;
										}
									}
								}
								//end of rule 1
								
								if($relation_rule_1 =='0') // if its and
								{
									if($rule2_2 == '1'  )// seeing if the secound rule is upon month or week
									{
					
										if($rule2_3 =='0')// seeing no of booking allowed in peak time
										{
											if($rule2_1  <= $tottal_booking_in_curent_month_in_peak_time and $all_system_disabled =='' )
											{
												$all_system_disabled_peak = "1";
												$all_system_msg_peak = "only $rule2_1 booking allowed in a month at peak time you have already booked  $tottal_booking_in_curent_month_in_peak_time in this month";
												$rule2 = 1;
											}
											else
											{
											//	$all_system_disabled_peak ='';
											//	$all_system_msg_peak ='';
												$rule2 = 0;
											}
										}
										elseif($rule2_3 =='1') // non peak time
										{
											if($rule2_1  <= $tottal_booking_in_curent_month_in_nonpeak_time and $all_system_disabled =='')
											{	
												$all_system_disabled_nonpeak= "1";
												$all_system_msg_nonpeak = "only $rule2_1 booking allowed in a month at Non-Peak time you have already booked  $tottal_booking_in_curent_month_in_nonpeak_time in this month";
												$rule2 = 1;
												
											}
											else
											{
											//	$all_system_disabled ='';
											//	$all_system_msg ='';
												$rule2 = 0;
											}
										}
										else // any time
										{
											if($rule2_1  <= $tottal_booking_in_curent_month and $all_system_disabled =='')
											{
												$all_system_disabled = "1";
												$all_system_msg = "only $rule2_1 booking allowed in a month  you have already booked  $tottal_booking_in_curent_month in this month";
												$rule2 = 1;
											}
											else
											{
										//		$all_system_disabled ='';
										//		$all_system_msg ='';
												$rule2 = 0;
											}
										}
									}
									else
									{// if rule 2 is weak
										if($rule2_3 =='0')// seeing no of booking allowed in peak time
										{
											if($rule2_1  >= $tottal_booking_in_week_peek_time and $all_system_disabled =='' )
											{
												$all_system_disabled_peak = "1";
												$all_system_msg_peak = "only $max_booking_per_day booking allowed in a week at peak time you have already booked  $tottal_booking_in_week_peek_time in this week";
												$rule2 = 1;
											}
											else
											{
											//	$all_system_disabled_peak ='';
											//	$all_system_msg_peak ='';
												$rule2 = 0;
											}
										}
										elseif($rule2_3 =='1') // non peak time
										{
											if($rule2_1  <= $tottal_booking_in_week_nonpeek_time and $all_system_disabled =='')
											{
												$all_system_disabled_nonpeak= "1";
												$all_system_msg_nonpeak = "only $rule2_1 booking allowed in a week at Non-Peak time you have already booked  $tottal_booking_in_week_nonpeek_time in this week";
												$rule2 = 1;
											}
											else
											{
											//	$all_system_disabled ='';
											//	$all_system_msg ='';
												$rule2 = 0;
											}
										}
										else // any time
										{
											if($rule2_1  <= $tottal_booking_in_week and $all_system_disabled =='')
											{
												$all_system_disabled = "1";
												$all_system_msg = "only $rule2_1 booking allowed in a weak  you have already booked  $tottal_booking_in_week in this weak";
												$rule2 = 1;
											}
											else
											{
											//	$all_system_disabled ='';
											//	$all_system_msg ='';
												$rule2 = 0;
											}
										}
									}	//end of rule 2
								}
								elseif($relation_rule_2 == 1 and $rule2 == '1')// if and is not there mean there is or
								{
									$all_system_disabled = "1";
								}
								// end of relation 2
								if($relation_rule_2 =='0' or ($relation_rule_2 == '1' and $relation_rule_1 =='0' and $rule2 =='1' and $rule2_1 !='0') ) // if its and
								{
									if($rule3_2 == '1'  )// seeing if the secound rule is upon month or week
									{
										if($rule3_3 =='0')// seeing no of booking allowed in peak time
										{
											if($rule3_1  <= $tottal_booking_in_curent_month_in_peak_time and $all_system_disabled =='' )
											{
												$all_system_disabled_peak = "1";
												$all_system_msg_peak = "only $rule3_1 booking allowed in a month at peak time you have already booked  $tottal_booking_in_curent_month_in_peak_time in this month";
												$rule3 = 1;
											}
											else
											{
											//	$all_system_disabled_peak ='';
												//$all_system_msg_peak ='';
												$rule3 = 0;
											}
										}
										elseif($rule3_3 =='1') // non peak time
										{
											if($rule2_1  <= $tottal_booking_in_curent_month_in_nonpeak_time and $all_system_disabled =='')
											{
												$all_system_disabled_nonpeak= "1";
												$all_system_msg_nonpeak = "only $rule3_1 booking allowed in a month at Non-Peak time you have already booked  $tottal_booking_in_curent_month_in_nonpeak_time in this month";
												$rule3 = 1;
											}
											else
											{
								//				$all_system_disabled ='';
									//			$all_system_msg ='';
												$rule3 = 0;
											}
										}
										else // any time
										{
											if($rule3_1  <= $tottal_booking_in_curent_month and $all_system_disabled =='')
											{
								
												$all_system_disabled = "1";
												$all_system_msg = "only $rule3_1 booking allowed in a month  you have already booked  $tottal_booking_in_curent_month in this month";
												$rule3 = 1;
											}
											else
											{
									//			$all_system_disabled ='';
									//			$all_system_msg ='';
												$rule3 = 0;
											}
										}
									}
									else
									{// if rule 2 is weak
										if($rule3_3 =='0')// seeing no of booking allowed in peak time
										{
											if($rule3_1  >= $tottal_booking_in_week_peek_time and $all_system_disabled =='' )
											{
												$all_system_disabled_peak = "1";
												$all_system_msg_peak = "only $rule3_1 booking allowed in a week at peak time you have already booked  $tottal_booking_in_week_peek_time in this week";
												$rule3 = 1;
											}
											else
											{	
												$all_system_disabled_peak ='';
												$all_system_msg_peak ='';
												$rule3 = 0;
											}
										}
										elseif($rule3_3 =='1') // non peak time
										{
											if($rule3_1  <= $tottal_booking_in_week_nonpeek_time and $all_system_disabled =='')
											{
												$all_system_disabled_nonpeak= "1";
												$all_system_msg_nonpeak = "only $rule3_1 booking allowed in a week at Non-Peak time you have already booked  $tottal_booking_in_week_nonpeek_time in this week";
												$rule3 = 1;
											}
											else
											{
												//	$all_system_disabled ='';
										//		$all_system_msg ='';
												$rule3 = 0;
											}
										}
										else // any time
										{
											if($rule3_1  <= $tottal_booking_in_week and $all_system_disabled =='')
											{
												$all_system_disabled = "1";
												$all_system_msg = "only $rule3_1 booking allowed in a weak  you have already booked  $tottal_booking_in_week in this weak";
												$rule3 = 1;
											}
											else
											{
										//		$all_system_disabled ='';
										//		$all_system_msg ='';
												$rule3 = 0;
											}
										}
									}
									//end of rule 2
								}
								if($relation_rule_2 == 1 and $rule2_1 !='0' )// if and is not there mean there is or
								{
									if($rule2 =='1' and $all_system_disabled_nonpeak =='1' and $tottal_booking_in_week_peek_time =='0' )
									{
										//echo "$rule2 =='1' and $all_system_disabled_nonpeak =='1' and $tottal_booking_in_week_peek_time =='0' ";
								//		$all_system_disabled_nonpeak ='';
								//		$all_system_disabled_peak ='';
									}
																		
									if($tottal_booking_in_week_nonpeek_time > $rule2_1)
									{
										$all_system_disabled_peak ='1';
									//	$all_system_disabled_peak ='1';
									}
									if($tottal_booking_in_week_nonpeek_time == $rule3_1)
									{
										$all_system_disabled_peak ='1';
										$all_system_disabled_nonpeak ='1';
									}
								}
								// end of relation 3 
							}		
							$query_my_booking = "select * from my_booking where unique_no = '$unique_no' and date_of_booking = '$_POST[date_sel]' and uid = '$_GET[user_id]' and status !='2'";
							$result_my_query = mysql_query($query_my_booking);
							$count_booking_for_day = mysql_num_rows($result_my_query);
							if($count_booking_for_day==$max_booking_per_day)
							{
								$all_system_disabled = "1";
								$all_system_msg = "only $max_booking_per_day booking allowed in a day";
							}			
							// if time-based facility
						   	if($error!='1' and $os== 'time_based')
						   	{
						   	$selected_date = $_POST[date_sel];
						   	$today_date = date('d-m-Y');
						   
						   	?>
							<br>
							<table width="100%" border="0" align="center">
                      		<tr> 
                        		<td colspan="9">
                          		<?php
								
								
						 		$currentdatetocheck = explode("-", $curent_date);
									$new_current_date = $currentdatetocheck[2] . $currentdatetocheck[1] . $currentdatetocheck[0];
									$sqlbar = "SELECT * FROM table_barred WHERE user_id = '$_GET[user_id]' AND facility_id = '$unique_no' AND bar_expiry >= '$new_current_date'";
									$resultbar = mysql_query($sqlbar) or mysql_error();
									$bar_counter = mysql_num_rows($resultbar);
									//echo "<br>You have " . $bar_counter . " barred.";
									if ($bar_counter > 0)
									{
									//$all_system_disabled = '1';
									$facility_bar = '1';
									$all_system_msg = 'Please contact Management for further details';
									}
									
								///	echo $facility_bar;
								//echo "hello";
								if($all_system_disabled == "1" && $facility_bar != "1")
						 		{
						  			echo "<div align=center>   <img src=images/buttons/warning-button.jpg width=580 height=53 > </div>";
						   			$msg = "You Exteeded Limit For this facility";
						  		}
								else
								if($facility_bar == '1')
						 		{
									$all_system_disabled = '1';
									$all_system_msg = 'Please contact Management for further details';

						  			echo "<div align=center>   <img src=images/buttons/barred.jpg width=580 height=53 > </div>";
						   		}
						  		?>
                          		</td>
                      		</tr>
                            <tr>
                            <td colspan="9">
                            <table width="100%" cellpadding="5" cellspacing="0" style="border:1px solid #333333;">
                            <tr> 
                        		<td bgcolor="#994947" style="border-right:1px solid #333333;"> 
                          		<div align="center" class="fontitle">#1</div></td>
                        		<td bgcolor="#994947" style="border-right:1px solid #333333;"> 
                          		<div align="center"><span class="fontitle">Select</span></div></td>
                        		<td bgcolor="#994947" style="border-right:1px solid #333333;"> 
                          		<div align="center" class="fontitle">From Time</div>                        </td>
                        		<td bgcolor="#994947" style="border-right:1px solid #333333;"> 
                          		<div align="center" class="fontitle">To Time</div>                        </td>
                        		<td bgcolor="#994947" style="border-right:1px solid #333333;"> 
                          		<div align="center" class="fontitle">Resident</div>                        </td>
                        		<td bgcolor="#994947" style="border-right:1px solid #333333;"> 
                          		<div align="center"><span class="fontitle">Paid</span></div>                        </td>
                       		  <td bgcolor="#994947"> 
                       	      <div align="center" class="fontitle">Remarks</div></td>
                              <? if ($user_type == '1') { ?>
                   			  <td bgcolor="#994947" style="border-left:1px solid #333333;"> 
                       	      <div align="center" class="fontitle">Receipt</div></td>
                                <? } ?>
                      		</tr>
                      		
                      	<?php 
				   		$sr =1;
				   		$count_dont_sel =1;
				   		//$weak = date(w);
						$date_exp = explode('-', $selected_date);
						$mon_sel = $date_exp[1];
						$day_sel = $date_exp[0];
						$year_sel = $date_exp[2];
						$stamp = mktime(0,0,0,$mon_sel,$day_sel,$year_sel);
						$weak = date('w',$stamp);
						$weak = $weak +1;
						
					   	$query = "select * from track_time where track = '$unique_no' and (weak = '0' or weak='$weak') order by peak, from_time ASC";
					   	$result = mysql_query($query);
					   	while($row=mysql_fetch_array($result))
					   	{
				   
							$query1 = "select * from time_slot  where id = '$row[from_time]' limit 1";
							$result1 = mysql_query($query1);
							while($row1=mysql_fetch_array($result1))
							{
								$from_time = $row1[time_slot];	
								$from_time_div = $from_time /60;
								$from_min_div_exp = explode(':',$from_time);
								$extra_min = $from_min_div_exp[1];
								$from_time_min =  (int)$extra_min + $from_min_div ;
							}
							$query1 = "select * from time_slot  where id = '$row[to_time]' limit 1";
							$result1 = mysql_query($query1);
							while($row1=mysql_fetch_array($result1))
							{
								$to_time = $row1[time_slot];	
								$to_time_div = $to_time /60;
								$to_time_min_div_exp = explode(':',$to_time);
								$from_min_div = $to_time_min_div_exp[1] +$from_min_div ;
							}
							$hrs = ($to_time_div -$from_time_div )*60;
							if($hrs >= $hours)
							{
								$hrs = round($hrs /$hours);
								for($i=1;$i<=$hrs;$i++)
					 			{
									
									$from_time_exp = explode(':',$from_time);
									//print_r($from_time_exp);
									$to_time = $from_time_exp[0]+$hours;
									$from_time = "$from_time_exp[0]:$from_time_exp[1]";
									if ($display_legend != 1)
									{
										$color= '#fdf5e2';
									}
									else
									if($row[peak] =='0')
									{
										$color= '#cbe8c6';
									}
									else
									if($row[peak] =='1')
									{
										$color= '#ffdcd8';
									}
									else
									if($row[peak] =='2')
									{
										$color= '#fdf5e2';
									}
									if($to_time ==24 and $from_time_exp[1] > '00')
									{
										$skip =1;
									}
									else
									{
										$skip =0;
									}
									if($skip !=1)
									{
										//	$today_date = 
										//	echo "$selected_date != $today_date";
										//	$selected_date = $_POST[date_sel];
										$now_hrs = date('G');
										$now_min = date('i');
										
										if($selected_date == $today_date )
										{
											if($now_hrs >= $from_time_exp[0] and $now_min >= $from_time_exp[1])
											{
												$dont_sel = "disabled = disabled";
												$msg = "Time frame has lapsed";
											}
										}
										$to_time = "$to_time:$from_time_exp[1]";
										if($dont_sel =='' || $dont_sel !='')
										{
											//if ($user_type != '0') {
											$query_my_booking = "select * from my_booking where unique_no = '$unique_no' and date_of_booking = '$selected_date' and status !='2' ";
											//}
											//else
											//{
											//$query_my_booking = "select * from my_booking where unique_no = '$unique_no' and date_of_booking = '$selected_date' and uid = $_GET[user_id] and status !='2' ";
											//}
											$result_my_query = mysql_query($query_my_booking);
											while($row_my = mysql_fetch_array($result_my_query))
											{
												$fram_user_from_time = $row_my[from_time];
												$fram_user_to_time = $row_my[to_time];
												$explode_fram_user_to_time = explode(':',$fram_user_to_time);
												//	echo "$fram_user_from_time == $from_time";
							   					if($fram_user_from_time == $from_time)
												{
													$my_booking_no = $row_my[sno];
													$dont_sel = "disabled = disabled";
													$msg = "Slot used by other user";
													$registered_by_id = $row_my[uid];
													$rid = $row_my[rid];
													$checked = "";
													$order_status  =  $row_my[status];
													$amount_recived  = $row_my[amount_recived];
													$time_of_booking = $row_my[time_of_booking];
													$date_of_booking = $row_my[date_of_booking];
													$greybar_info = $row_my[day] . "-" . $row_my[month] . "-" . $row_my[year];
													$cancle_booking_date_time  = $row_my[cancle_booking_date_time];
													$query_user = "select * from user_account where id = '$registered_by_id'";
													$query_result = mysql_query($query_user);
													while($row_user = mysql_fetch_array($query_result))
													{
														$registered_by = $row_user[username];
								
								
													}
								
												}
											}
						
										}
							if (strlen($from_time) == 1){
							$from_time = str_pad($from_time, 2, "0", STR_PAD_LEFT);
							}
							else
							{
							$from_time = $from_time;
							}
							if (strlen($to_time) == 1){
							$to_time = str_pad($to_time, 2, "0", STR_PAD_LEFT);
							}
							else
							{
							$to_time = $to_time;
							}
										//if($closed_at)
										if($selected_date == $today_date)
										{
											$from_time_exp = explode(':',$from_time);
								
										 	(int)$mod = $from_time_exp[0]-$now_hrs;
											// echo "$mod <= $closed_at";
										 	$timenow = date("G:s");
											if (strlen($timenow) == 4){
							$timenow = str_pad($timenow, 5, "0", STR_PAD_LEFT);
							}
							else
							{
							$timenow = $timenow;
							}
											if($mod <= $closed_at and $dont_sel =='')
										 	{
										 		$dont_sel = "disabled = disabled";
										 		$msg = "Time Slot Under Buffer";
											}
										}
										if($dont_sel =='' and $dont_sel != "disabled = disabled")
										{
											$msg = "You can book this slot ";
											$checked = "checked";
										}
										$time_fram = "$from_time-$to_time&$row[peak]";
						 				if (($order_status =='1' or $order_status =='0'))
										// if($order_status =='1' or $order_status =='0')
						 				{
						 					$dont_sel = "disabled = disabled";
											$all_system_msg = "Slot In Use ";
						 
						 				}
										else
										if ($timenow >= $from_time)
										{
											$dont_sel = "disabled = disabled";
											$msg = "Time frame has lapsed";
											$checked = "";
										}
										else
										{
											$dont_sel = "";
											$all_system_msg = "";
							 			}
									 	if($all_system_disabled =='1')
									 	{
									  		$dont_sel = "disabled = disabled";
									 		$msg = "$all_system_msg";
									 		$checked = "";
									 	}
										elseif($row[peak] =='1' and $all_system_disabled_peak =='1')
									 	{
									 		$dont_sel = "disabled = disabled";
									 		$msg = "You Exteeded Limit For Peak Time";
									 		$checked = "";
										}
										elseif($row[peak] =='0' and $all_system_disabled_nonpeak =='1' )
									 	{
									 		$dont_sel = "disabled = disabled";
											$msg = "You Exteeded Limit For Non-Peak Time";
											$checked = "";
										}
									   	?>
                      	<tr bgcolor="<?php echo $color; ?>" onMouseover="ddrivetip('<?php echo " $msg "; ?>')";
 onMouseout="hideddrivetip()" > 
                        <td align="center" valign="top" style="border-right:1px solid #333333;border-top:1px solid #333333;"> 
                        <div align="center"> 
                        <?php echo $sr; ?>                          </div>                        </td>
                        <td valign="top" style="border-right:1px solid #333333;border-top:1px solid #333333;"><label> 
                        <div align="center"> 
                        <?php
						if($dont_sel !='')
						{
							$count_dont_sel++;
						}
						?>
                        <input name="time_fram" type="radio" value="<?php echo $time_fram; ?>" <?php echo "$checked"; ?> <?php echo $dont_sel; ?> title="<?php echo $msg; ?>" onclick="alert('<?php echo "You have selected  $name_fac  for date  $selected_date from $from_time hrs to $to_time hrs";?> ');"   >
                        </div>
                        </label></td>
                        <td valign="top" style="border-right:1px solid #333333;border-top:1px solid #333333;"> 
                        <div align="center"> <?php
                        if (strlen($from_time) == 4){
							$from_time = str_pad($from_time, 5, "0", STR_PAD_LEFT);
							}
							else
							{
							$from_time = $from_time;
							}
							if (strlen($to_time) == 4){
							$to_time = str_pad($to_time, 5, "0", STR_PAD_LEFT);
							}
							else
							{
							$to_time = $to_time;
							}
							 echo $from_time; 
							 $from_time_recorded = $from_time; ?>                          </div>                        </td>
                        <?php 
						$from_time =$to_time;
					    ?>
                        <td valign="top" style="border-right:1px solid #333333;border-top:1px solid #333333;"> 
                        <div align="center"> 
                        <?php echo $to_time; ?>                          </div>                        </td>
                        <td valign="top" align="center" style="border-right:1px solid #333333;border-top:1px solid #333333;"> 
                        <?php if ($registered_by_id == $id || $user_type == '1' || $rid == $id || $user_type == '2') { echo $registered_by; }
						echo "&nbsp;"; ?>                                               </td>
                        <td valign="top" align="center" style="border-right:1px solid #333333;border-top:1px solid #333333;"> 
                <?php
				$dont_sel ='';
				if($order_status == '1' && $auto_apporve != '1')
				{
					echo $icon = "Yes";
				}
				elseif($order_status == '0' && $auto_apporve != '1')
				{
					echo $icon = "No";
				}
				elseif($order_status == '2')
				{
					echo $icon = "&nbsp;";
				}
				elseif($dont_sel != '')
				{
					echo $icon = "&nbsp;";
				}
				else
				{
					if($row[peak] =='1')
					{
						echo $icon = "&nbsp;";
					}
					else
					{
						echo $icon = "&nbsp;";
					}
				}
				?>
                                       </td>
                        <td valign="top" align="center" style="border-top:1px solid #333333;"> 
                          	  <?php
						 	if($order_status =='0' && ($registered_by_id == $id || $user_type !='0'))
						 	{
						 		?>
                          	  <strong>Pending</strong><br />
                          	  [ 
                              <? if ($user_type == '1') { ?><a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=approve"; ?>">Approve</a> | <? } ?>
                              <? if ($user_type == '1') { 
							  ?>
                              <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Admin"; ?>">Cancel</a> ] 
                              <? } else if ($user_type == '2') { 
							  ?>
                              <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Club"; ?>">Cancel</a> ] 
                              <? } else if ($user_type == '0') { 
							  ?>
                              <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=User"; ?>">Cancel</a> ] 
                              <? } ?>
                          	  <?php
						 	$show =1;
						 	}
							else
						 		if($order_status =='1' && ($registered_by_id == $id || $user_type !='0'))
						 		{
								$today = date("d-m-Y");
								$hour = date("G");
								$min = date("i");
								$newfrom_time = explode(":", $from_time_recorded);
								$from_timehour = $newfrom_time[0];
								$from_timemin = $newfrom_time[1];
								if ($from_timemin < $min)
								{
									$from_timemin += 60;
									$from_timehour -= 1;
								}
								//$from_timehour;
								//$from_timemin;
								$newmin = $from_timemin - $min;
								if (strlen($newmin) == 1){
								$newmin = str_pad($newmin, 2, "0", STR_PAD_LEFT);
								}
								else
								{
								$newmin = $newmin;
								}
								if (strlen($hour) == 1){
								$hour = str_pad($hour, 2, "0", STR_PAD_LEFT);
								}
								else
								{
								$hour = $hour;
								}	
								if (strlen($min) == 1){
								$min = str_pad($min, 2, "0", STR_PAD_LEFT);
								}
								else
								{
								$min = $min;
								}	
								$difference = ($from_timehour - $hour) . ":" . $newmin . "<br>";
								$check_absent_time = $hour . ":" . $min;
							
								if (strlen($closed_at) == 1){
								$closed_at = str_pad($closed_at, 2, "0", STR_PAD_LEFT);
								}
								else
								{
								$closed_at = $closed_at;
								}
								if (strlen($closed_at) == 2){
								$closed_at = str_pad($closed_at, 5, ":00", STR_PAD_RIGHT);
								}
								else
								{
								$closed_at = $closed_at;
								}
								//echo strlen($difference);
								if (strlen($difference) == 8){
								$difference = str_pad($difference, 9, "0", STR_PAD_LEFT);
								}
								else
								{
								$difference = $difference;
								}
								//$closed_at = $closed_at . ":00";
								$from_time_new = $from_timehour . ":" . $from_timemin;
								?>
                          	  <strong>Approved</strong><br />
                          	  <? 
							  //echo $difference . ">" . $closed_at . "&&" . $user_type . "== 0"; 
							  ?>
							  <? if ($difference > $closed_at && $user_type == 0) { ?> [ <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=User"; ?>">Cancel</a> ] <? } 
							  else if ($user_type != '0') 
							  { 
							  	if ($difference > $closed_at && $user_type == 2) { ?> [ <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Club"; ?>">Cancel</a> ] <? } 
								$in = 0;
							  	
								//echo $check_absent_time . " < " . $from_time_recorded . " && " . $today . " <= " . $curent_date; 
								?>
                                
                                <? if (((($check_absent_time < $from_time_recorded) && $today == $curent_date) || (($today != $curent_date) && $today <= $curent_date)) && $user_type == '1') { $in = 1; ?>
                                [ <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Admin"; ?>">Cancel</a> <? } ?> 
                                <? 
								//echo $difference . "<= 00:30 && " . $today . " == " . $curent_date . " && " . $check_absent_time . " < " . $to_time . " && " . $indooroutdoor . " == 1";
								?>
								<? if ($difference <= "00:30" && $today == $curent_date && $check_absent_time < $to_time && $indooroutdoor == 1) { if ($in != 1) { echo "[ "; $in = 1; } else { echo " | "; } ?><a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Rain"; ?>">Rain</a> 
							<? } ?>
							<? if ($today == $curent_date && ($check_absent_time >= $from_time_recorded && $check_absent_time < $to_time)) { if ($in != 1) { echo "[ "; $in = 1; } else { echo " | "; } ?><a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Absent"; ?>">Absent</a>
							<? } ?><? if ($in == 1) { echo " ]"; } ?><? } ?> 
                          	  <?php
							  	$show =1;
						 		}
								else
						 		{
						 			echo "&nbsp;";	
						 			$show =0;
						 		}
						
								?>
                        	  </td>
                        	<?php
					   		if($user_type =='1')
				  			{
					   		?>
                        		<td valign="top" style="border-left:1px solid #333333;border-top:1px solid #333333;"> 
                          		<div align="center"> 
                            	<?php 
					   			if($order_status =='0' or $order_status =='1' and  $amount_recived =='')
					   			{
					    			//echo "<img src=images/dollar_icon_gray.jpg>";
									echo "&nbsp;";
					  			}
								elseif(($order_status =='0' || $order_status =='1') && $user_type == 1)
					   			{
					   				echo "<a href=javascript:openwindow('receipt.php?id=$my_booking_no')><strong>View</strong></a>";
					   			}
								else
								{
								echo "&nbsp;";
								}
					    		$show ='';
					   			$order_status = "";	
					    		?>
                          		</div>                                </td>
                                <? } ?>
                      		</tr>
                            <? if ($user_type != '0' && $time_of_booking !='') {?>
                            <tr bgcolor="#CCCCCC">
                            <td colspan="10" style="font-size: 11px;"><i><?php
					  		if($time_of_booking !='')
					   			echo "<b>Booked on </b>$greybar_info at $time_of_booking";
					   		$time_of_booking ='';
					   		?>&nbsp;&nbsp; 
							<?php 
							if($date_of_conf !='')
							{ 
							echo " | <b>Approved on </b>$date_of_conf";
							}
							if($cancle_booking_date_time !='')
							{ 
								echo " | <b>Cancelled on </b>$row[cancle_booking_date_time]";
							} 
							
							?> </i></td>
                      	</tr>
                        <? } ?>
                      	<?
						$dont_sel = "";
						$msg = "";
						$registered_by_id ='';
						$registered_by ='';
						$greybar_info = '';
						$order_status = "";
						$icon = "";
						$sr++;
					 	}
					}
				}
			}
			?>
                            </table>
                            </td>
                            </tr>
                      		
            <tr> 
                <td colspan="2"><label> 
                <?php
				if($count_dont_sel == $sr)
				{
					$dis = "disabled=disabled";
				}
				?>
                <input type="submit" name="Submit4" value="Book Now"  <?php echo $dis; ?>>
                </label></td>
                <td colspan="7">
                <? if ($display_legend == 1) { ?> 
                <table width="100%" border="0">
                <tr> 
                	<td>
                    <div align="right">Legend: <img src="images/legend.jpg" width="510" height="17" align="absmiddle"></div>                    </td>
                </tr>
                </table>
                <? } else { echo "&nbsp;"; } ?></td>
			</tr>
            </table>
            <?php
			}
			// if session based
			elseif($error!='1' and $os== 'sess')
			{
			$selected_date = $_POST[date_sel];
			$today_date = date('d-m-Y');
			
			?>
            <table width="100%" border="0" align="center">
            <tr> 
            <td colspan="9">
            <?
            $currentdatetocheck = explode("-", $curent_date);
									$new_current_date = $currentdatetocheck[2] . $currentdatetocheck[1] . $currentdatetocheck[0];
									$sqlbar = "SELECT * FROM table_barred WHERE user_id = '$_GET[user_id]' AND facility_id = '$unique_no' AND bar_expiry >= '$new_current_date'";
									$resultbar = mysql_query($sqlbar) or mysql_error();
									$bar_counter = mysql_num_rows($resultbar);
									//echo "<br>You have " . $bar_counter . " barred.";
									if ($bar_counter > 0)
									{
									//$all_system_disabled = '1';
									$facility_bar = '1';
									$all_system_msg = 'Please contact Management for further details';
									}
									?>
									<?php
			if($all_system_disabled == "1" && $facility_bar != "1")
						 		{
						  			echo "<div align=center>   <img src=images/buttons/warning-button.jpg width=580 height=53 > </div>";
						   			$msg = "You Exteeded Limit For this facility";
						  		}
								else
								if($facility_bar == '1')
						 		{
									$all_system_disabled = '1';
									$all_system_msg = 'Please contact Management for further details';

						  			echo "<div align=center>   <img src=images/buttons/barred.jpg width=580 height=53 > </div>";
						   		}
						  		?>
            </td>
		</tr>
        <tr>
        	<td colspan="9">
            <table width="100%" cellpadding="5" cellspacing="0" border="0" style="border:1px solid #333333;">
            <tr> 
        	<td bgcolor="#994947" style="border-right:1px solid #333333;"> 
            <div align="center" class="fontitle">#2</div>                        </td>
            <td bgcolor="#994947" style="border-right:1px solid #333333;"> 
            <div align="center"><span class="fontitle">Select</span></div>                        </td>
            <td bgcolor="#994947" style="border-right:1px solid #333333;"> 
            <div align="center" class="fontitle">From Time</div>                        </td>
            <td bgcolor="#994947" style="border-right:1px solid #333333;"> 
            <div align="center" class="fontitle">To Time</div>                        </td>
            <td bgcolor="#994947" style="border-right:1px solid #333333;"> 
            <div align="center" class="fontitle">Resident</div>                        </td>
            <td bgcolor="#994947" style="border-right:1px solid #333333;"> 
            <div align="center"><span class="fontitle">Paid</span></div>                        </td>
            <td bgcolor="#994947"> 
              <div align="center" class="fontitle">Remarks</div></td>
              <? if ($user_type == '1') { ?>
		    <td bgcolor="#994947" style="border-left:1px solid #333333;"> 
              <div align="center" class="fontitle">Receipt</div></td> <? } ?>
        </tr>
        
        <?php 
		$sr =1;
		$count_dont_sel =1;
		//$weak = date(w);
		$date_exp = explode('-', $selected_date);
		$mon_sel = $date_exp[1];
		$day_sel = $date_exp[0];
		$year_sel = $date_exp[2];
		$stamp = mktime(0,0,0,$mon_sel,$day_sel,$year_sel);
		$weak = date('w',$stamp);

		$weak = $weak +1;
				
		$query = "select * from track_time where track = '$unique_no' and (weak = '0' or weak='$weak') order by peak, from_time ASC";
		$result = mysql_query($query);
		while($row=mysql_fetch_array($result))
		{
			$query1 = "select * from time_slot  where id = '$row[from_time]' limit 1";
			$result1 = mysql_query($query1);
			while($row1=mysql_fetch_array($result1))
			{
				$from_time = $row1[time_slot];	
			}
			$query1 = "select * from time_slot  where id = '$row[to_time]' limit 1";
			$result1 = mysql_query($query1);
			while($row1=mysql_fetch_array($result1))
			{
				$to_time = $row1[time_slot];	
			}
			if ($display_legend != 1)
			{
				$color= '#fdf5e2';
			}
			else
			if($row[peak] =='0')
			{
				$color= '#cbe8c6';
			}
			else
			if($row[peak] =='1')
			{
				$color= '#ffdcd8';
			}
			else
			if($row[peak] =='2')
			{
				$color= '#fdf5e2';
			}
			
			if($selected_date == $today_date)
			{
				(int)$mod = $from_time_exp[0]-$now_hrs;
				if($mod <= $closed_at)
				{
					$dont_sel = "disabled = disabled";
					$msg = "Time Slot Under Buffer";
				}
			}
			
			$query_my_booking = "select * from my_booking where unique_no = '$unique_no' and date_of_booking = '$selected_date' and status != '2' ";
			$result_my_query = mysql_query($query_my_booking);
			while($row_my = mysql_fetch_array($result_my_query))
			{
				$fram_user_from_time = $row_my[from_time];
			 	$fram_user_to_time = $row_my[to_time];
			 	$status  =  $row_my[status];
			 	if($status == '1')
			 	{
		//	echo 	$icon = "<img src=images/3.jpg>";
				}
				$date_of_booking =$row_my[date_of_booking];
				$explode_fram_user_to_time = explode(':',$fram_user_to_time);
				//echo "$fram_user_from_time == $from_time";
				if($fram_user_from_time == $from_time and $row_my[status] !='2')
				{
					$dont_sel = "disabled = disabled";
					$msg = "Time from used by other user";
					$registered_by_id = $row_my[uid];
					$rid = $roy_my[rid];
					$checked = "";
					$order_status  =  $row_my[status];
					$amount_recived  = $row_my[amount_recived];
					$my_booking_no = $row_my[sno];
					$date_of_conf = $row_my[date_of_conf];
					$time_of_booking = $row_my[time_of_booking];
					$date_of_booking = $row_my[date_of_booking];
					$cancle_booking_date_time  = $row_my[cancle_booking_date_time];
					$greybar_info = $row_my[day] . "-" . $row_my[month] . "-" . $row_my[year];
					$query_user = "select * from user_account where id = '$registered_by_id'";
					$query_result = mysql_query($query_user);
					while($row_user = mysql_fetch_array($query_result))
					{
						$registered_by = $row_user[username];
					}
				}
			}
			if (strlen($from_time) == 1){
							$from_time = str_pad($from_time, 2, "0", STR_PAD_LEFT);
							}
							else
							{
							$from_time = $from_time;
							}
							if (strlen($to_time) == 1){
							$to_time = str_pad($to_time, 2, "0", STR_PAD_LEFT);
							}
							else
							{
							$to_time = $to_time;
							}
							if (strlen($timenow) == 4){
							$timenow = str_pad($timenow, 5, "0", STR_PAD_LEFT);
							}
							else
							{
							$timenow = $timenow;
							}
			//if($closed_at)
			if($selected_date == $today_date)
			{
				(int)$mod = $from_time_exp[0]-$now_hrs;
				$timenow = date("G:s");
				if (strlen($timenow) == 4){
							$timenow = str_pad($timenow, 5, "0", STR_PAD_LEFT);
							}
							else
							{
							$timenow = $timenow;
							}
				if($mod <= $closed_at)
				{
					$dont_sel = "disabled = disabled";
					$msg = "Time Slot Under Buffer";
					$checked = "";
				}
			}
			if($dont_sel =='' and $dont_sel != "disabled = disabled")
										{
											$msg = "You can book this slot ";
											$checked = "checked";
										}
			if(($order_status =='1' or $order_status =='0'))
			//if(($order_status =='1' or $order_status =='0') and ($user_type =='1' or $registered_by_id  ==$id))
			{
				$dont_sel = "disabled = disabled";
				$msg =  "Slot In Use ";
			}
			else
			if ($timenow >= $from_time)
				{
					$dont_sel = "disabled = disabled";
					$msg = "Time frame has lapsed";
					$checked = "";
				}
				else
				{
				$dont_sel = "";
				$msg = "";
		 	}
			
			if($all_system_disabled =='1')
			{
				$checked = "";
				$dont_sel = "disabled = disabled";
				$msg = "$all_system_msg";
			}
			elseif($row[peak] =='1' and $all_system_disabled_peak =='1')
			{
				$checked = "";
				$dont_sel = "disabled = disabled";
				$msg = "$all_system_msg_peak";
			}
			elseif($row[peak] =='0' and $all_system_disabled_nonpeak =='1')
			{
				$checked = "";
				$dont_sel = "disabled = disabled";
				$msg = "$all_system_msg_nonpeak";
			}
			if($dont_sel =='')
			{
				$checked = "checked";
			}
			$time_fram = "$from_time-$to_time&$row[peak]";
			?>
            <tr bgcolor="<?php echo $color; ?>"  onMouseover="ddrivetip('<?php echo " $msg "; ?>')";
 onMouseout="hideddrivetip()"> 
            	<td align="center" valign="top" style="border-right:1px solid #333333;border-top:1px solid #333333;"> 
                <div align="center"> 
                <?php echo $sr; ?>                          </div>                        </td>
                <td valign="top" style="border-right:1px solid #333333;border-top:1px solid #333333;"><label> 
                <div align="center"> 
                <?php
				if($dont_sel !='')
				{
					$count_dont_sel++;
				}
				?>
                <input name="time_fram" type="radio" value="<?php echo $time_fram; ?>" <?php echo "$checked"; ?> <?php echo $dont_sel; ?> title="<?php echo $msg; ?>" onclick="alert('<?php echo "You have selected  $name_fac  for date  $selected_date from $from_time hrs to $to_time hrs";?> ');"   >
                </div>
                </label>                </td>
                <td valign="top" style="border-right:1px solid #333333;border-top:1px solid #333333;"> 
                <div align="center"> 
                <?php echo $from_time; 
				$from_time_recorded = $from_time;
				?>                          </div>                        </td>
                <td valign="top" style="border-right:1px solid #333333;border-top:1px solid #333333;"> 
                <div align="center"> 
                <?php echo $to_time; ?>                          </div>                        </td>
                <td valign="top" style="border-right:1px solid #333333;border-top:1px solid #333333;"> 
                <div align="center"> 
                <?php if ($registered_by_id == $id || $user_type == '1' || $rid == $id || $user_type == '2') { echo $registered_by; } ?>                          &nbsp;</div>                        </td>
				<td valign="top" style="border-right:1px solid #333333;border-top:1px solid #333333;"> 
                <div align="center">
                  <?php
				$dont_sel ='';
				if($order_status == '1' && $auto_apporve != '1')
				{
					echo $icon = "Yes";
				}
				elseif($order_status == '0' && $auto_apporve != '1')
				{
					echo $icon = "No";
				}
				elseif($order_status == '2')
				{
					echo $icon = "&nbsp;";
				}
				elseif($dont_sel != '')
				{
					echo $icon = "&nbsp;";
				}
				else
				{
					if($row[peak] =='1')
					{
						echo $icon = "&nbsp;";
					}
					else
					{
						echo $icon = "&nbsp;";
					}
				}
				?>
                </div>                        </td>
                <td valign="top" style="border-top:1px solid #333333;"> 
                                
                        	<div align="center"> 
                        	  <?php
						 	if($order_status =='0' && ($registered_by_id == $id || $user_type !='0'))
						 	{
						 	?>
                        	  <strong>Pending</strong><br />
                              [ <?
							  if ($user_type == '1') { 
							  ?>
                        	  <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=approve"; ?>">Approve</a> |<? } ?>
                              <? if ($user_type == '1') { 
							  ?>
                              <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Admin"; ?>">Cancel</a> ] 
                              <? } else if ($user_type == '2') { 
							  ?>
                              <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Club"; ?>">Cancel</a> ] 
                              <? } else if ($user_type == '0') { 
							  ?>
                              <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=User"; ?>">Cancel</a> ] 
                              <? } ?>
                        	  <?php
						 	$show =1;
						 	}
							else
								if($order_status =='1' && ($registered_by_id == $id || $user_type !='0'))
						 		{
								$today = date("d-m-Y");
								$hour = date("G");
								$min = date("i");
								$newfrom_time = explode(":", $from_time_recorded);
								$from_timehour = $newfrom_time[0];
								$from_timemin = $newfrom_time[1];
								if ($from_timemin < $min)
								{
									$from_timemin += 60;
									$from_timehour -= 1;
								}
								//$from_timehour;
								//$from_timemin;
								$newmin = $from_timemin - $min;
								if (strlen($newmin) == 1){
								$newmin = str_pad($newmin, 2, "0", STR_PAD_LEFT);
								}
								else
								{
								$newmin = $newmin;
								}
								if (strlen($hour) == 1){
								$hour = str_pad($hour, 2, "0", STR_PAD_LEFT);
								}
								else
								{
								$hour = $hour;
								}	
								if (strlen($min) == 1){
								$min = str_pad($min, 2, "0", STR_PAD_LEFT);
								}
								else
								{
								$min = $min;
								}
								$difference = ($from_timehour - $hour) . ":" . $newmin . "<br>";
								$check_absent_time = $hour . ":" . $min;
							
								if (strlen($closed_at) == 1){
								$closed_at = str_pad($closed_at, 2, "0", STR_PAD_LEFT);
								}
								else
								{
								$closed_at = $closed_at;
								}
								if (strlen($closed_at) == 2){
								$closed_at = str_pad($closed_at, 5, ":00", STR_PAD_RIGHT);
								}
								else
								{
								$closed_at = $closed_at;
								}
								//echo strlen($difference);
								if (strlen($difference) == 8){
								$difference = str_pad($difference, 9, "0", STR_PAD_LEFT);
								}
								else
								{
								$difference = $difference;
								}
								//$closed_at = $closed_at . ":00";
						 		$from_time_new = $from_timehour . ":" . $from_timemin;
								?>
                        	  <strong>Approved</strong><br />
                        	  <? 
							  //echo $difference . ">" . $closed_at . "&&" . $user_type . "== 0"; 
							  ?>
							  <? if ($difference > $closed_at && $user_type == 0) { ?> 
                        	  [ <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=User"; ?>">Cancel</a> ] <? } 
							  else if ($user_type != '0') 
							  { 
							  	if ($difference > $closed_at && $user_type == 2) { ?> [ <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Club"; ?>">Cancel</a> ] <? } 
							  	$in = 0;
							  	
								//echo $check_absent_time . " < " . $from_time_recorded . " && " . $today . " <= " . $curent_date; 
								?>
                                
                                <? if (((($check_absent_time < $from_time_recorded) && $today == $curent_date) || (($today != $curent_date) && $today <= $curent_date)) && $user_type == '1') { $in = 1; ?>
                                [ <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Admin"; ?>">Cancel</a> <? } ?> 
                                <? 
								//echo $difference . "<= 0:30 && " . $today . " == " . $curent_date . " && " . $check_absent_time . " < " . $to_time . " && " . $indooroutdoor . " == 1";
								?>
								<? if ($difference <= "00:30" && $today == $curent_date && $check_absent_time < $to_time && $indooroutdoor == 1) { if ($in != 1) { echo "[ "; $in = 1; } else { echo " | "; } ?><a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Rain"; ?>">Rain</a> 
							<? } ?>
							<? if ($today == $curent_date && ($check_absent_time >= $from_time_recorded && $check_absent_time < $to_time)) { if ($in != 1) { echo "[ "; $in = 1; } else { echo " | "; } ?><a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$_GET[id]&page=book_now&user_id=$_GET[user_id]&fac=$_GET[fac]&date_sel=$curent_date&booking_no=$my_booking_no&type=cancle&reason=Absent"; ?>">Absent</a>
							<? } ?><? if ($in == 1) { echo " ]"; } ?><? } ?> 
                              <?php
						 			$show =1;
						 		}
								else
								{
						 			echo "&nbsp;";
									$show =0;
						 		}
								?>
                      	    </div></td>
                        <?php
					   	if($user_type =='1')
				  		{
					   	?>
                        	<td valign="top" style="border-left:1px solid #333333;border-top:1px solid #333333;"> 
                          	<div align="center"> 
                            <?php 
					   		//if((($order_status =='0' or $order_status =='1') and  $amount_recived =='')   and ($user_type =='1' or $uid =='$id'))
					   		if($order_status =='0' or $order_status =='1' and $amount_recived =='')
					   		{
					    		//echo "<img src=images/dollar_icon_gray.jpg>";
					   			
					   			//}elseif($order_status =='1' and $amount_recived !='' and ($user_type =='1' or $uid =='$id'))
					   		}
							elseif(($order_status =='0' || $order_status =='1') && $user_type == 1)
					   		{
					   			    echo "<a href=javascript:openwindow('receipt.php?id=$my_booking_no')><strong>View</strong></a>";
					   		}
					    	echo "&nbsp;";
					  		$show ='';
					   		$order_status = "";	
							?>
                          	</div>                            </td>
                            <? } ?>
                   	  </tr>
                      <? if ($user_type != '0' && $time_of_booking != '') {?>
                        <tr bgcolor="#CCCCCC">
                        <td colspan="10" style="font-size: 11px;"><i><?php
					  		if($time_of_booking !='')
					   		echo "<b>Booked on </b>$greybar_info at $time_of_booking";
					   	   $time_of_booking ='';
					   		?>&nbsp;&nbsp; 
							<?php 
							if($date_of_conf !='')
							{ 
								echo " | <b>Approved on </b>$date_of_conf";
							}
							if($cancle_booking_date_time !='')
							{ 
								echo " | <b>Cancelled on </b>$row[cancle_booking_date_time]";
							} 
							
							?> </i></td>
					</tr>
                    <? } ?>
                    <?
					$dont_sel = "";
					$msg = "";
					$registered_by_id ='';
					$registered_by ='';
					$greybar_info = '';
					$order_status = '';
					$icon = "";
					$sr++;
					}
					?>
            </table>
            </td>
        </tr>
                    <tr> 
                    	<td colspan="2"><label> 
                        <?php
					   	if($count_dont_sel == $sr)
					   	{
					   		$dis = "disabled=disabled";
					   	}
					   	?>
                        <input type="submit" name="Submit4" value="Book Now"  <?php echo $dis; ?>>
                        </label></td>
                        <td colspan="7"> 
                        <? if ($display_legend == 1) { ?> 
                		<table width="100%" border="0">
                        <tr> 
                        	<td>
                            <div align="right">Legend: <img src="images/legend.jpg" width="510" height="17" align="absmiddle"></div>                            </td>
                        </tr>
                        </table>
                        <? } else { echo "&nbsp;"; } ?>
                        </td>
                    </tr>
                    </table>
                    <?php
				   	}
				   	?>                    </td>
				</tr>
                <tr>
                	<td colspan="10">&nbsp;</td>
                </tr>
                </table>
              </form>
                <?php
			 	}
			 	if($_GET[page]=='all' )
			 	{
					// print_r($_POST);
			 		if(isset($_POST[date_sel_all]))
					{
			 	
			 			if($_POST[date_sel_all] =='' or $_POST[date_sel_all_end] =='')
			 			{
			 				echo "<div align=center><font color=red> <b>Please provide proper date range</b> </font></div>";
			 				$er =1;
			 			}
						else
						if (isset($_GET['sort']))
			 			{
							$date_sel_all = $_GET[date_sel_all];
							$date_sel_all_end = $_GET[date_sel_all_end];
							$menu2 = $_GET[menu2];
							$user_sel = $_GET[user_sel];
							$select = $_GET[select];
				 		}
						else
			 			{
							$date_sel_all = $_POST[date_sel_all];
							$date_sel_all_end = $_POST[date_sel_all_end];
							$menu2 = $_POST[menu2];
							$user_sel = $_POST[user_sel];
							$select = $_POST[select];
				 		}
			 		}
			 		?>
                  	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                    	<td style="background-repeat:no-repeat"><div align="right"><img src="images/left_win_10.gif" width="21" height="30" border="0"></div></td>
                      	<td width="100%" background="images/middle_win_11.gif"><span class="fontitle style1"><strong>View Booking </strong></span></td>
                      	<td><img src="images/right_win_14.gif" width="17" height="30"></td>
                    </tr>
                    <tr>
                    	<td colspan="3">
                        <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                        <form name="form_1" method="post" action="?page=all&crypted=<? echo $_GET[crypted]; ?>">
                        <tr>
                        <td colspan="4" bgcolor="#944542" class="fontitle txtgrey" style="border-left:1px solid #b09852;border-right:1px solid #b09852; padding-left:15px; padding-top:5px; padding-bottom:5px;"><span class="fontitle">&nbsp;<strong>Booking  Details <?php echo  date("l dS M Y h:i:s A"); ?></strong></span></td>
                        </tr>
                        <tr>
                        <td width="19%" style="padding-left:15px; padding-top:5px; padding-bottom:5px;">Start Date </td>
                        <td width="31%" style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><label>
                            <input name="date_sel_all" type="text" value="<?php echo  $date_sel_all; ?>" size="8" maxlength="10" readonly="">
                            </label>
                            <img src="images/icon-calender.gif" width="19" height="18"  onclick="displayCalendar(document.forms[0].date_sel_all,'dd-mm-yyyy',this)" value="Cal">
                          <label></label></td>
                        <td width="15%" style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><label>End Date</label></td>
                        <td width="35%" style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><label>
                            <input name="date_sel_all_end" type="text" value="<?php echo $date_sel_all_end; ?>" size="8" maxlength="10" readonly="">
                            </label>
                            <img src="images/icon-calender.gif" width="19" height="18"  onclick="displayCalendar(document.forms[0].date_sel_all_end,'dd-mm-yyyy',this)" value="Cal">
                            <label></label></td>
                        </tr>
                        <tr>
                          <td style="padding-left:15px; padding-top:5px; padding-bottom:5px;">Facility</td>
                          <td style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><select name="menu2" >
                            	<option value="0">See All</option>
                                <?php
								$query = "select * from facility where enable ='1' ";
								$result = mysql_query($query);
								while($row=mysql_fetch_array($result))
								{
									$unique_no =  $row[unique_no];
									if($menu2 == $row[unique_no])
									{
										$sel_fac = "selected = selected";
									}
									else
									{
										$sel_fac = "";
									}
									echo " <option value=$row[unique_no] $sel_fac>$row[name]</option>";
					  			}
					  			?>
                       	  </select></td>
                          <td style="padding-left:15px; padding-top:5px; padding-bottom:5px;">User</td>
                          <td style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><select name="user_sel"  >
                                <?php
						 		if($user_type =='0')
						 		{
						 			$sel_user_dis = " and id = '$id' limit 1";
						 			$user_sel = $id;
						 		}
								else
						 		{
						 			echo "   <option value=0>All User</option>";
						 		}
						 		?>
                                <?php
								$query = "select * from user_account where active ='1' $sel_user_dis";
								$result = mysql_query($query);
								while($row=mysql_fetch_array($result))
								{
									if($user_sel == $row[id])
									{
						
										$sel = "selected = selected";
									}
									else
									{
										$sel = "";
									}
									echo " <option value=$row[id] $sel>$row[username]</option>";
								}
								?>
                              	</select></td>
                          </tr>
                        <tr>
                          <td style="padding-left:15px; padding-top:5px; padding-bottom:5px;">Status</td>
                          <td style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><select name="select">
                                <?php 
						 		if($select =='0')
						 		{
						 			$sel_sel_1 = "selected";
						 		}
								elseif($select =='1')
						 		{
						 			$sel_sel_2 = "selected";
						 		}
								elseif($select =='2')
						 		{
						 			$sel_sel_3 = "selected";
						 		}
								elseif($select =='5')
						 		{
						 			$sel_sel_0 = "selected";
						 		}
						 		?>
                                	<option value="5" <?php echo $sel_sel_0; ?>>All Status</option>
                                	<option value="0" <?php echo $sel_sel_1; ?>>Waiting Approval</option>
                                	<option value="1" <?php echo $sel_sel_2; ?>>Approved</option>
                                	<option value="2" <?php echo $sel_sel_3; ?>>Cancelled</option>
                              	</select></td>
                          <td>&nbsp;</td>
                          <td style="padding-left:15px; padding-top:5px; padding-bottom:5px;"><input type="submit" name="Submit7" value="Submit"></td>
                          </tr>
                        </form>
                        </table>
                      </td>
                   	  </tr>
                    	<tr>
                      		<td colspan="3">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                          	<tr>
                            	<td bgcolor="#FFFFFF"><?php
							//	echo "$_POST[date_sel_all] !='' and $er !='1'";
								if(($_POST[date_sel_all] !='' || $_GET[date_sel_all] !='') and $er !='1')
								{
								
			 		?>
                                <table width="100%" border="0" cellpadding="5" cellspacing="0" style="border:1px solid #333333;">
                                <form>
                                <tr>
                                  <td colspan="12"><SCRIPT Language="Javascript">

/*
This script is written by Eric (Webcrawl@usa.net)
For full source code, installation instructions,
100's more DHTML scripts, and Terms Of
Use, visit dynamicdrive.com
*/

function printit(){  
if (window.print) {
    window.print() ;  
} else {
    var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
    WebBrowser1.ExecWB(6, 2);//Use a 1 vs. a 2 for a prompting dialog box    WebBrowser1.outerHTML = "";  
}
}
</script>

<SCRIPT Language="Javascript">  
var NS = (navigator.appName == "Netscape");
var VERSION = parseInt(navigator.appVersion);
if (VERSION > 3) {
    document.write('<input type=button value="Print" name="Print" onClick="printit()">');        
}
</script></td>
                                  </tr>
                                  </form>
                                <tr>
                                	<td width="3%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">#</div></td>
                                  <td width="6%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle"><? if ($user_type != '0') { ?><a href="booking.php?page=all&select=<? if (isset($_POST[select])) { echo $_POST[select]; } else { echo $_GET[select]; } ?>&user_sel=<? if (isset($_POST[user_sel])) { echo $_POST[user_sel]; } else { echo $_GET[user_sel]; } ?>&menu2=<? if (isset($_POST[menu2])) { echo $_POST[menu2]; } else { echo $_GET[menu2]; } ?>&crypted=<? echo $_GET[crypted]; ?>&sort=facility&date_sel_all=<? if (isset($_POST[date_sel_all])) { echo $_POST[date_sel_all]; } else { echo $_GET[date_sel_all]; } ?>&date_sel_all_end=<? if (isset($_POST[date_sel_all_end])) { echo $_POST[date_sel_all_end]; } else { echo $_GET[date_sel_all_end]; } ?>"><font color="#FFFFFF">Facility</font></a><? } else { ?>Facility<? } ?></div></td>
                                  <td width="7%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">From Time</div></td>
                                  <td width="6%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">To Time </div></td>
                                  <td width="8%" bgcolor="#944542" style="border-right:1px solid #333333;">
                           		  <div align="center" class="fontitle">Resident</div>                                        </td>
                                  <td width="7%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">By Who</div></td>
                                  <td width="24%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">Restrictions On Cancellation </div></td>
                                  <td width="8%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle"><? if ($user_type != '0') { ?><a href="booking.php?page=all&select=<? if (isset($_POST[select])) { echo $_POST[select]; } else { echo $_GET[select]; } ?>&user_sel=<? if (isset($_POST[user_sel])) { echo $_POST[user_sel]; } else { echo $_GET[user_sel]; } ?>&menu2=<? if (isset($_POST[menu2])) { echo $_POST[menu2]; } else { echo $_GET[menu2]; } ?>&crypted=<? echo $_GET[crypted]; ?>&sort=date&date_sel_all=<? if (isset($_POST[date_sel_all])) { echo $_POST[date_sel_all]; } else { echo $_GET[date_sel_all]; } ?>&date_sel_all_end=<? if (isset($_POST[date_sel_all_end])) { echo $_POST[date_sel_all_end]; } else { echo $_GET[date_sel_all_end]; } ?>"><font color="#FFFFFF">Date</font></a><? } else { ?>Date<? } ?></div></td>
                                  <td width="4%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">Paid</div></td> <? if ($user_type == '0') { ?>
                                  <td width="7%" bgcolor="#944542"><div align="center" class="fontitle">Remarks</div></td> <? } ?><? if ($user_type != '0') { ?>
								  <td width="8%" bgcolor="#944542">
                           		  <div align="center" class="fontitle">Mode</div></td>
								  <td width="12%" bgcolor="#944542" style="border-left:1px solid #333333;"><div align="center" class="fontitle">Receipt</div></td><? } ?>
                                </tr>
                                
                                <?php 
								// print_r($_POST);
					  			if($user_sel !='0')
					  			{
					  
					  				$my_query .= "uid = '$_POST[user_sel]' and ";
					  			}
					  			if($menu2 !='0')
					  			{
					  				$my_query .= "unique_no  = '$_POST[menu2]' and ";
					  			}
					  
					   			if($select =='5')
								{
						 			$my_query .= "";
								}
								else
								{
					   				$my_query .= "status   = '$_POST[select]' and ";
					  			}
								$from_date = explode('-',$date_sel_all);
								$from_day = $from_date[0];
								$from_month = $from_date[1];
								$from_year = $from_date[2];
								$to_date = explode('-',$date_sel_all_end);
								$to_day = $to_date[0];
								$to_month = $to_date[1];
								$to_year = $to_date[2];
								$sr =1;
						 		if (isset($_GET[sort]) && $_GET[sort] == 'facility')
								{
								$query = "select * from my_booking where $my_query `day`  >='$from_day' and `month` >='$from_month' and `year`  >='$from_year' and `day`  <= '$to_day' and `month` <= '$to_month' and `year` <='$to_year' ORDER BY unique_no,date_of_booking,from_time ASC" ;
								}
								else
								if (isset($_GET[sort]) && $_GET[sort] == 'date')
								{
								$query = "select * from my_booking where $my_query `day`  >='$from_day' and `month` >='$from_month' and `year`  >='$from_year' and `day`  <= '$to_day' and `month` <= '$to_month' and `year` <='$to_year' ORDER BY date_of_booking,from_time,unique_no ASC" ;
								}
								else
								{
								$query = "select * from my_booking where $my_query `day`  >='$from_day' and `month` >='$from_month' and `year`  >='$from_year' and `day`  <= '$to_day' and `month` <= '$to_month' and `year` <='$to_year' ORDER BY date_of_booking,from_time ASC" ;
								}
							  	$result = mysql_query($query) or die(mysql_error());
							  	while($row=mysql_fetch_array($result))
							  	{
							  		$date_of_booking = $row[date_of_booking];
							  		$time_of_booking = $row[time_of_booking];
							  		$greybar_info = $row[day] . "-" . $row[month] . "-" . $row[year];
									$order_status = $row[status];
									$reason = $row[cancle_reson];
							  		$uid = $row[uid];
									$rid = $row[rid];
									if ($rid == '')
									{
									$rid = "&nbsp;";
									}
							  		$amount_recived = $row[amount_recived];
							  		if ($display_legend != 1)
									{
										$color= '#fdf5e2';
									}
									else
									if($row[peak] =='0')
									{
										$color= '#cbe8c6';
									}
									else
									if($row[peak] =='1')
									{
										$color= '#ffdcd8';
									}
									else
									if($row[peak] =='2')
									{
										$color= '#fdf5e2';
									}
					  				if($amount_recived =='')
					  				{
					  					$amount_recived = "NO";
									}
			  						$query_facility = "select * from facility where unique_no ='$row[unique_no]' limit 1";
									$result_facility = mysql_query($query_facility);
									while($row_facility=mysql_fetch_array($result_facility))
									{
										$name_fac = $row_facility[name];
										$closed_at  = $row_facility[closed_at];
										$fac= $row_facility[sno];
										$closed_at = $row_facility[closed_at];
									}
									$query_user = "select * from user_account where id ='$uid' limit 1";
									$result_user = mysql_query($query_user);
									while($row_user = mysql_fetch_array($result_user))
									{
										$username = $row_user[username];
									}
									$query_user = "select * from user_account where id ='$rid' limit 1";
									$result_user = mysql_query($query_user);
									while($row_user = mysql_fetch_array($result_user))
									{
										$rid = $row_user[username];
										$rid2 = $row_user[id];
									}
									$my_booking_no = $row[sno];
					
									$from_time = explode(':',$row[from_time]);
									$from_time_hrs = $from_time[0];
									$from_time_min = $from_time[1];
									$today_date = date("d-m-Y");
									$hour = date("G");
									$min = date("i");
									$jan = mktime($from_time_hrs,$from_time_min,0,$row[month],$row[day],$row[year]);
									$hrs = ((($jan - $today)/60)/60);
									if($closed_at >= $hrs and $row[status] =='0')
									{
						 			//	$order_status ='5';
						 			}
									$newfrom_time = explode(":", $from_time_recorded);
								$from_timehour = $newfrom_time[0];
								$from_timemin = $newfrom_time[1];
								if ($from_timemin < $min)
								{
									$from_timemin += 60;
									$from_timehour -= 1;
								}
								//$from_timehour;
								//$from_timemin;
								$newmin = $from_timemin - $min;
								if (strlen($newmin) == 1){
								$newmin = str_pad($newmin, 2, "0", STR_PAD_LEFT);
								}
								else
								{
								$newmin = $newmin;
								}
								if (strlen($hour) == 1){
								$hour = str_pad($hour, 2, "0", STR_PAD_LEFT);
								}
								else
								{
								$hour = $hour;
								}
								if (strlen($min) == 1){
								$min = str_pad($min, 2, "0", STR_PAD_LEFT);
								}
								else
								{
								$min = $min;
								}	
								$difference = ($from_timehour - $hour) . ":" . $newmin . "<br>";
								$check_absent_time = $hour . ":" . $min;
							
								$closed_at_new = $closed_at;
								$closed_at = $closed_at . ":00";
								$from_time_new = $from_timehour . ":" . $from_timemin;
									$d = date('d');
						  			$today = time();
					  				?>
                                  	<tr align="center" bgcolor="<?php echo $color; ?>">
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo $sr; ?></td>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo $name_fac; ?></td>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo $row[from_time]; $from_time_recorded = $row[from_time]; ?></td>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo $row[to_time];?></td>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo $username; ?></td>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php if ($user_type == '1' || $rid2 == $id) { echo $rid; } else { echo "&nbsp;"; } ?></td>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo  "$closed_at_new hr(s) before playtime or usage time"; ?></td>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo "$row[date_of_booking]"; ?></td>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo "$amount_recived"; ?></td><? if ($user_type == '0') { ?>
                                    	<td style="border-top:1px solid #333333;"><div align="center">
                                        <label></label>
                                        <label>
                                        <?php
										if($order_status =='5')
						 				{
											echo "<strong>Cancelled (L)</strong> ";
										}
										elseif($order_status =='2')
										{
											echo "<strong>Cancelled</strong><br>($reason)";
										}
										elseif($order_status =='1')
						 				{
						 					echo " <strong>Approved</strong> ";
						 				}
										elseif($order_status =='0')
						 				{
						 					echo " <strong>Pending</strong> ";
						 				}
										echo "&nbsp;";
										if($order_status =='1' and ($user_type =='1' or $uid =='$id'))
						 				{
											$date_of_can = date('d-m-Y');
						 				?>
                                        </label>
                                        <br>
                                        <? 
										if ($user_type == '0') { ?>[ <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$fac&page=$_GET[page]&user_id=$uid&fac=$fac&date_sel=$date_of_can&booking_no=$my_booking_no&type=cancle&date_sel_all=$_POST[date_sel_all]&date_sel_all_end=$_POST[date_sel_all_end]&menu2=$_POST[menu2]&user_sel=$_POST[user_sel]&select=$_POST[select]&reason=User"; ?>">Cancel</a> ] <? } else { ?> [ <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$fac&page=$_GET[page]&user_id=$uid&fac=$fac&date_sel=$date_of_can&booking_no=$my_booking_no&type=cancle&date_sel_all=$_POST[date_sel_all]&date_sel_all_end=$_POST[date_sel_all_end]&menu2=$_POST[menu2]&user_sel=$_POST[user_sel]&select=$_POST[select]&reason=Club"; ?>">Cancel</a> ] <? } ?>
                                        <?php
						 				}
						 				else
						 					if($order_status =='0' and ($user_type =='1' or $uid =='$id'))
						 					{
												$date_of_can = date('d-m-Y');
						 						?>
                                        		</label>
                                        		<br>
                                        		<?php
						 					}
						 
											// $order_status = "";	 
						 					?>
                                    		</div>                                      </td>
                                            <? } ?>
                                    		<?php
					  						if($user_type !='0')
					 						{
					  $in = 0;
							  	
								//echo $check_absent_time . " < " . $from_time_recorded . " && " . $today_date . " <= " . $date_of_booking; 
					  						?>
                                    		<td style="border-top:1px solid #333333;">
                                            <div align="center">
                                        	<?php
											//echo $order_status."<br>";
						 					if($order_status =='0')
						 					{
						 					?>
                                        	<strong>Pending</strong><br>
                                        	<?
                                            if($user_type =='1')
						 					{
											?>
                                            [ <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$fac&page=$_GET[page]&user_id=$uid&fac=$fac&date_sel=$date_of_can&booking_no=$my_booking_no&type=approve&date_sel_all=$_POST[date_sel_all]&date_sel_all_end=$_POST[date_sel_all_end]&menu2=$_POST[menu2]&user_sel=$_POST[user_sel]&select=$_POST[select]"; ?>">Approve</a> ]
                                            <?
											}
											?>
                                        	<?php
						 					//$show =1;
						 					}
											else
						 						if ($order_status =='1')
						 						{
						 						?>
                                        			<strong>Approved</strong><br>
                                        			<? if ((($check_absent_time < $from_time_recorded) && $today_date == $date_of_booking) || (($today_date != $date_of_booking) && $today_date <= $date_of_booking) && $user_type == '1') { $in = 1; ?> [ <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$fac&page=$_GET[page]&user_id=$uid&fac=$fac&date_sel=$date_of_can&booking_no=$my_booking_no&type=cancle&date_sel_all=$_POST[date_sel_all]&date_sel_all_end=$_POST[date_sel_all_end]&menu2=$_POST[menu2]&user_sel=$_POST[user_sel]&select=$_POST[select]&reason=Admin"; ?>">Cancel</a><? } ?><? if ($difference <= "0:30" && $today_date == $date_of_booking && $check_absent_time < $to_time) { if ($in != 1) { echo "[ "; $in = 1; } else { echo " | "; } ?><a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$fac&page=$_GET[page]&user_id=$uid&fac=$fac&date_sel=$date_of_can&booking_no=$my_booking_no&type=cancle&date_sel_all=$_POST[date_sel_all]&date_sel_all_end=$_POST[date_sel_all_end]&menu2=$_POST[menu2]&user_sel=$_POST[user_sel]&select=$_POST[select]&reason=Rain"; ?>">Rain</a><? } ?>
							<? if ($today_date == $date_of_booking && ($check_absent_time >= $from_time_recorded && $check_absent_time < $to_time)) { if ($in != 1) { echo "[ "; $in = 1; } else { echo " | "; } ?><a href="redirect.php?<?php echo "crypted=$_GET[crypted]&id=$fac&page=$_GET[page]&user_id=$uid&fac=$fac&date_sel=$date_of_can&booking_no=$my_booking_no&type=cancle&date_sel_all=$_POST[date_sel_all]&date_sel_all_end=$_POST[date_sel_all_end]&menu2=$_POST[menu2]&user_sel=$_POST[user_sel]&select=$_POST[select]&reason=Absent"; ?>">Absent</a><? } ?><? if ($in == 1) { echo " ]"; } ?>
						 						<?
                         						}
						 						else if ($order_status =='2')
						 						{
						 							echo "<strong>Cancelled</strong><br>($reason)";
						 						}
												else
												{
													echo "&nbsp;";
													$show =0;
                                                }
						 						?>
                                   			  </div>                                      </td>
                                    		<td style="border-left:1px solid #333333;border-top:1px solid #333333;">
											<?php 
					 					   	// if($order_status =='0' or $order_status =='1' and  $amount_recived =='')
					    					if($order_status =='0' and  $amount_recived =='')
					   						{
					    						//echo "<img src=images/dollar_icon_gray.jpg>";
					   						}
											elseif($order_status =='1' and $amount_recived =='')
					   						//}elseif($order_status =='1' and $amount_recived !='')
					   						{
					   							echo "<a href=javascript:openwindow('receipt.php?id=$my_booking_no')><strong>View</strong></a>";
					   						}
					    					?>&nbsp; </td>
                                            	<?php
						 					}
						 					?>
                           		  </tr>
                                  <? if ($user_type == '1') { ?>
                                        <tr bgcolor="#CCCCCC">
                                        	<td colspan="11" style="font-size: 11px;"><i>
											<?php
								 			if($time_of_booking !='')
								   			echo "<b>Date & Time of booking :</b>$greybar_info at $time_of_booking" ;?>                                    		&nbsp;&nbsp; 
								  			<?php 
								  				  
								  			if($row[cancle_booking_date_time] !='')
								  			{ 
								  				echo "| <b> Cancelation Date & Time : </b>$row[cancle_booking_date_time]";
								  			} 
								  			if($row[date_of_conf] !='')
								  			{ 
								  				echo "| <b> Confirmation Date & Time : </b>$row[date_of_conf]";
								  			}
											?>   </i>                                         </td>
                                  		</tr>
                                        <? } ?>
                                  		<?php
										$dont_sel = "";
										$msg = "";
										$registered_by_id ='';
										$registered_by ='';
					   					$sr++;
										$greybar_info = '';
					   					}
					   					?>
                                  </table>
                           		  <?php
					 				}
					 				?>
                              </td>
                       		  </tr>
                   			  </table>
                          </td>
               		  </tr>
   			  </table>
                			<?php
			 				}
			 				?>
                			</p>
                  			<?php 
		 					if($_GET[page]=='group' and $user_type =='1')
							{
							?>
                            <table width="75%" border="0" align="center">
                            <tr>
                            	<td>Group With </td>
                              	<td><strong>:</strong></td>
                              	<td><label>
                                <select name="select3">
                                      <option value="0" selected>---&gt;</option>
                                      <option value="1">&lt;---</option>
                                      <option value="2">&lt;---&gt;</option>
                        		</select>
                        		<select name="select2">
						  		<?php
								$query = "select * from facility where enable ='1' ";
								$result = mysql_query($query);
								while($row=mysql_fetch_array($result))
								{
								 
									if($_GET[fac] == $row[sno])
									{
										$sel_fac = "selected = selected";
									}
									else
									{
										$sel_fac = "";
									}
									echo " <option value=fac=$row[sno] $sel_fac>$row[name]</option>";
					  			}
					  			?>
                        	</select>
                      		</label>
                            </td>
                      		<td>&nbsp;</td>
                    	</tr>
                    	<tr>
                      		<td>Bond With </td>
                      		<td><strong>:</strong></td>
                      		<td>
                            <select name="select4">
                                <option value="0" selected>---&gt;</option>
                                <option value="1">&lt;---</option>
                                <option value="2">&lt;---&gt;</option>
                      		</select>
                        	<select name="select5">
						  	<?php
							$query = "select * from facility where enable ='1' ";
							$result = mysql_query($query);
							while($row=mysql_fetch_array($result))
							{
								if($_GET[fac] == $row[sno])
								{
									$sel_fac = "selected = selected";
								}
								else
								{
									$sel_fac = "";
								}
								echo " <option value=fac=$row[sno] $sel_fac>$row[name]</option>";
					  	  	}
					  		?>
                        	</select>
                        	</td>
                      		<td>&nbsp;</td>
                    	</tr>
                    	<tr>
                      		<td width="15%">&nbsp;</td>
                      		<td width="1%">&nbsp;</td>
                      		<td width="73%">&nbsp;</td>
                      		<td width="11%">&nbsp;</td>
                    	</tr>
                  		</table>
                  		<?
						}
		  				?>
                		</p>
          </td>
		  </tr>
		  </table>
	</td>
					<td class="ctrrgt" vAlign="top" align="right" width="29">
					<img height="82" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/ctrrighttop.gif" width="29"></td>
  </tr>
				<tr>
					<td background="http://axonsg.com/projects/ardmorepark/v2/mem/img/leftbotbg.gif"><SPACER type="block" height="20">
					</td>
					<td vAlign="top" align="left" background="http://axonsg.com/projects/ardmorepark/v2/mem/img/ctrbotctr.gif">
					<img height="20" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/ctrleftbot.gif" width="29"></td>
					<td class="ctrbot" vAlign="top">&nbsp;</td>
					<td vAlign="top" align="right" background="http://axonsg.com/projects/ardmorepark/v2/mem/img/ctrbotctr.gif">
					<img height="20" src="http://axonsg.com/projects/ardmorepark/v2/mem/img/ctrrgtbot.gif" width="29"></td>
				</tr>
</table>
<? include ("../footer.php"); ?>
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
			  $name = $row[name];
			  $username = $row[name];
	}
	
	if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{
	
	 echo "<script type=text/javascript language=javascript> window.location.href = '../home.php?ops=1'; </script> ";
			exit;
	}



 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<style type="text/css">
	/* YOU CAN REMOVE THIS PART */
	
	h1{
		line-height:130%;
	}
	a{
		color: #D60808;
		text-decoration:none;
		font-weight:normal;
	}
	a:hover{
		text-decoration:underline;
		
		/* border-bottom:1px solid #317082; */
		color: #307082;
	}
   		
	/* END PART YOU CAN REMOVE */
	
	
	#dhtmlgoodies_tooltip{
		background-color:#EEE;
		border:1px solid #000;
		position:absolute;
		display:none;
		z-index:20000;
		padding:2px;
		font-size:0.9em;
		-moz-border-radius:6px;	/* Rounded edges in Firefox */
		font-family: "Trebuchet MS", "Lucida Sans Unicode", Arial, sans-serif;
		
	}
	#dhtmlgoodies_tooltipShadow{
		position:absolute;
		background-color:#555;
		display:none;
		z-index:10000;
		opacity:0.7;
		filter:alpha(opacity=70);
		-khtml-opacity: 0.7;
		-moz-opacity: 0.7;
		-moz-border-radius:6px;	/* Rounded edges in Firefox */
	}
	</style>
	<SCRIPT type="text/javascript">

	var dhtmlgoodies_tooltip = false;
	var dhtmlgoodies_tooltipShadow = false;
	var dhtmlgoodies_shadowSize = 4;
	var dhtmlgoodies_tooltipMaxWidth = 200;
	var dhtmlgoodies_tooltipMinWidth = 100;
	var dhtmlgoodies_iframe = false;
	var tooltip_is_msie = (navigator.userAgent.indexOf('MSIE')>=0 && navigator.userAgent.indexOf('opera')==-1 && document.all)?true:false;
	function showTooltip(e,tooltipTxt)
	{
		
		var bodyWidth = Math.max(document.body.clientWidth,document.documentElement.clientWidth) - 20;
	
		if(!dhtmlgoodies_tooltip){
			dhtmlgoodies_tooltip = document.createElement('DIV');
			dhtmlgoodies_tooltip.id = 'dhtmlgoodies_tooltip';
			dhtmlgoodies_tooltipShadow = document.createElement('DIV');
			dhtmlgoodies_tooltipShadow.id = 'dhtmlgoodies_tooltipShadow';
			
			document.body.appendChild(dhtmlgoodies_tooltip);
			document.body.appendChild(dhtmlgoodies_tooltipShadow);	
			
			if(tooltip_is_msie){
				dhtmlgoodies_iframe = document.createElement('IFRAME');
				dhtmlgoodies_iframe.frameborder='5';
				dhtmlgoodies_iframe.style.backgroundColor='#FFFFFF';
				dhtmlgoodies_iframe.src = '#'; 	
				dhtmlgoodies_iframe.style.zIndex = 100;
				dhtmlgoodies_iframe.style.position = 'absolute';
				document.body.appendChild(dhtmlgoodies_iframe);
			}
			
		}
		
		dhtmlgoodies_tooltip.style.display='block';
		dhtmlgoodies_tooltipShadow.style.display='block';
		if(tooltip_is_msie)dhtmlgoodies_iframe.style.display='block';
		
		var st = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
		if(navigator.userAgent.toLowerCase().indexOf('safari')>=0)st=0; 
		var leftPos = e.clientX + 10;
		
		dhtmlgoodies_tooltip.style.width = null;	// Reset style width if it's set 
		dhtmlgoodies_tooltip.innerHTML = tooltipTxt;
		dhtmlgoodies_tooltip.style.left = leftPos + 'px';
		dhtmlgoodies_tooltip.style.top = e.clientY + 10 + st + 'px';

		
		dhtmlgoodies_tooltipShadow.style.left =  leftPos + dhtmlgoodies_shadowSize + 'px';
		dhtmlgoodies_tooltipShadow.style.top = e.clientY + 10 + st + dhtmlgoodies_shadowSize + 'px';
		
		if(dhtmlgoodies_tooltip.offsetWidth>dhtmlgoodies_tooltipMaxWidth){	/* Exceeding max width of tooltip ? */
			dhtmlgoodies_tooltip.style.width = dhtmlgoodies_tooltipMaxWidth + 'px';
		}
		
		var tooltipWidth = dhtmlgoodies_tooltip.offsetWidth;		
		if(tooltipWidth<dhtmlgoodies_tooltipMinWidth)tooltipWidth = dhtmlgoodies_tooltipMinWidth;
		
		
		dhtmlgoodies_tooltip.style.width = tooltipWidth + 'px';
		dhtmlgoodies_tooltipShadow.style.width = dhtmlgoodies_tooltip.offsetWidth + 'px';
		dhtmlgoodies_tooltipShadow.style.height = dhtmlgoodies_tooltip.offsetHeight + 'px';		
		
		if((leftPos + tooltipWidth)>bodyWidth){
			dhtmlgoodies_tooltip.style.left = (dhtmlgoodies_tooltipShadow.style.left.replace('px','') - ((leftPos + tooltipWidth)-bodyWidth)) + 'px';
			dhtmlgoodies_tooltipShadow.style.left = (dhtmlgoodies_tooltipShadow.style.left.replace('px','') - ((leftPos + tooltipWidth)-bodyWidth) + dhtmlgoodies_shadowSize) + 'px';
		}
		
		if(tooltip_is_msie){
			dhtmlgoodies_iframe.style.left = dhtmlgoodies_tooltip.style.left;
			dhtmlgoodies_iframe.style.top = dhtmlgoodies_tooltip.style.top;
			dhtmlgoodies_iframe.style.width = dhtmlgoodies_tooltip.offsetWidth + 'px';
			dhtmlgoodies_iframe.style.height = dhtmlgoodies_tooltip.offsetHeight + 'px';
		
		}
				
	}
	
	function hideTooltip()
	{
		dhtmlgoodies_tooltip.style.display='none';
		dhtmlgoodies_tooltipShadow.style.display='none';		
		if(tooltip_is_msie)dhtmlgoodies_iframe.style.display='none';		
	}
	
	</SCRIPT>	

<? include ("../headermem.php"); ?>
<style type="text/css">
<!--
.style1 {
	color: #CCCCCC;
	font-weight: bold;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #999999;
}
.style4 {font-size: 10}
-->
</style>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="8" rowspan="3" align="left" valign="top">&nbsp;</td>
    <td colspan="4" align="left" valign="top" class="topspace"><spacer type="block"></spacer></td>
  </tr>
   <tr>
  <td align="left" class="left" vAlign="top" bgcolor="#FFFFFF" width="150" background="img/leftctrbg2.gif">
  <link href="../textset.css" type="text/css" rel="stylesheet">
  <table width="150" border="0" cellPadding="0" cellSpacing="0" bgcolor="#FFFFFF" id="table5">
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
				{
					 echo "Welcome <i><b>User [$username]</b></i><br>";
				
				}	
				?>
				<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.php')" onmouseout="this.src='img/but_logout_2.gif'" type="image" src="img/but_logout_2.gif" name="I1">
              <br>
			   &nbsp;
              </td>
          </tr>
      </table>
	  </td>
    </tr>
    <tr>
      <td class="leftcontent" height="3"><img height="7" src="http://axonsg.com/projects/ardmorepark/v2/img/leftdot.gif" width="9"> <a class="copy" href="community.php?crypted=<? echo $_GET['crypted']; ?>#community">Community News</a></td>
    </tr>
    <tr>
      <td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
    </tr>
    <tr>
      <td class="leftcontent"><img height="7" src="http://axonsg.com/projects/ardmorepark/v2/img/leftdot.gif" width="9"> <a class="copy" href="community.php?crypted=<? echo $_GET['crypted']; ?>#circulars">Circulars</a></td>
    </tr>
    <tr>
      <td class="leftdecline" height="3"><SPACER type="block" height="3"></SPACER></td>
    </tr>
    <tr>
      <td class="leftcontent"><img height="7" src="http://axonsg.com/projects/ardmorepark/v2/img/leftdot.gif" width="9"> <a class="copy" href="comm.php?crypted=<? echo $_GET['crypted']; ?>&calender">Calendar Of Events </a></td>
    </tr>
	<? 
		include ("internal-adminmenu.php");
		?>
  </table>
</td>
    <td width="29" height="20" align="left" valign="top" class="ctrleft"><img src="../img/ctrrgttop.gif" width="29" height="82"></td>
    <td valign="top" class="ctr"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="82" valign="bottom" class="ctrtop">&nbsp;</td>
        <td valign="bottom" class="ctrtop">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="content"><?php
		   		
 		 	if(isset($_GET[last]))
			{	
				if($_GET[last]>=1) // start of last month calclulation
				{			 	 
					 $year = $_GET[year] ;
					  $month = $_GET[last];
					 $month_caption=date("M $year");		 
					 $lastmonth = mktime(0, 0, 0, $month, date("d"), $year);
					 $month_caption = date('M - Y',$lastmonth);
			 	}
			 	else
				{
					 $year = $_GET[year] - '1';
					 $month = 12;
					 $month_caption=date("M $year");
					 $lastmonth = mktime(0, 0, 0, $month, date("d"),  $year);
					 $month_caption = date('M - Y',$lastmonth);
			 	}
			 }
			 elseif(isset($_GET[next]))
			{	
				if($_GET[next]<=12) // start of last month calclulation
				{			 	 
					 $year = $_GET[year] ;
					  $month = $_GET[next];
					 $month_caption=date("M $year");		 
					 $lastmonth = mktime(0, 0, 0, $month, date("d"), $year);
					 $month_caption = date('M - Y',$lastmonth);
			 	}
			 	else
				{
					 $year = $_GET[year] + '1';
					 $month = 1;
					 $month_caption=date("M $year");
					 $lastmonth = mktime(0, 0, 0, $month, date("d"),  $year);
					 $month_caption = date('M - Y',$lastmonth);
			 	}
			 }
			 else
			 {
			 	if(isset($_GET[lastyear]))
				{
					 $year = $_GET[lastyear];
			 		$month = date("n");
			 		$month_caption=date("M $year");
			 	}
				
				else
				{
					$year = date("Y");
			 		$month = date("n");
			 		$month_caption=date("M $year");
				
				}
				
			}
		  ?>
              <script language="JavaScript1.2">
function changeto(highlightcolor){
source=event.srcElement
if (source.tagName=="TR"||source.tagName=="TABLE")
return
while(source.tagName!="TD")
source=source.parentElement
if (source.style.backgroundColor!=highlightcolor&&source.id!="ignore")
source.style.backgroundColor=highlightcolor
}

function changeback(originalcolor){
if (event.fromElement.contains(event.toElement)||source.contains(event.toElement)||source.id=="ignore")
return
if (event.toElement!=source)
source.style.backgroundColor=originalcolor
}
              </script>
          <?php
		
		
		if(isset($_GET[calender]))
		{
			
			
			
			if(isset($_POST[day]))
			{
			
					if($_POST[popup] =='')
					{
					$popup =0;
					
					}else
					{
					$popup =1;
					
					}
				$query = "insert into calender_event (uid,heading,details,popup,pop_msg,day,month_no,year) values ('$id','$_POST[heading]','$_POST[textfield]','$popup','$_POST[pop_msg]','$_POST[day]','$_POST[month_no]','$_POST[year]')";
			mysql_query($query);
			echo "<script type=text/javascript language=javascript> window.location.href = 'comm.php?crypted=$_GET[crypted]&last=$_GET[last]&year=$_GET[year]&calender'; </script> ";
				exit;
			
			}
			
			if(isset($_POST[heading2]))
			{
			
					
					if($_POST[popup2] =='')
					{
					$popup =0;
					
					}else
					{
					$popup =1;
					
					}
				$query = "update calender_event set uid='$id',heading = '$_POST[heading2]',details='$_POST[textfield2]',popup = '$popup',pop_msg = '$_POST[pop_msg2]' where sno ='$_GET[edit_done]' ";
			mysql_query($query);
			 echo "<script type=text/javascript language=javascript> window.location.href = 'comm.php?crypted=$_GET[crypted]&last=$_GET[last]&year=$_GET[year]&calender'; </script> ";
				exit; 
			
			}
			if(isset($_GET[delete])and $user_type =='1')
			{
			
					
					
				$query = "update calender_event set active ='0' where sno ='$_GET[delete]' limit 1 ";
			mysql_query($query);
			 echo "<script type=text/javascript language=javascript> window.location.href = 'comm.php?crypted=$_GET[crypted]&last=$_GET[last]&year=$_GET[year]&calender'; </script> ";
				exit; 
			
			}
		
		
		
		?>
          <table width="95%" border="0"  id=ignore>
                <tr>
                  <td id=ignore><div align="center">
                      <?php
	
function displayCurrentMonthCalenderAsTable()
{
// Find the first day of the current month
global $year; // this year
global $month; // this month
global $id;
$day=1; // start from first of month
global $crypted;
global $month_caption; // caption to table
$lastmonth = $month - 1;
$nextmonth = $month +1;
$lastyear = $year - 1;
$nextyear = $year + 1;
echo "<table summary=\"Monthly calendar\"  onMouseover= changeto('#CCCCCC') onMouseout= changeback('white')  width = 757 cellspacing= 2 cellpadding= 2 id= ignore class=\"sk_bok_green\">
<caption ><a href=comm.php?crypted=$_GET[crypted]&calender&lastyear=$lastyear ><font color=green>Last Year</font></a>&nbsp;&nbsp;&nbsp;<a href=comm.php?crypted=$_GET[crypted]&calender&last=$lastmonth&year=$year><font color=green>Last Month</a>&nbsp;&nbsp;&nbsp; <b>[$month_caption ]</b> &nbsp;&nbsp;&nbsp;<a href=comm.php?crypted=$_GET[crypted]&calender&next=$nextmonth&year=$year><font color= green>Next Month</font></a> &nbsp;<a href=comm.php?crypted=$_GET[crypted]&calender&lastyear=$nextyear><font color= green>Next Year<font></a></caption>
<tr align=center id=ignore>
<th width =308 id=ignore bgcolor=#FFC56C ><font color =Red>Sun</font></th>
<th width =308 id=ignore bgcolor=#FFC56C><font color =Green>Mon</font></th>
<th width =308 id=ignore bgcolor=#FFC56C><font color =Green>Tue</font></th>
<th width =308 id=ignore bgcolor=#FFC56C><font color =Green>Wed</font></th>
<th width =308 id=ignore bgcolor=#FFC56C><font color =Green>Thu</font></th>
<th width =308 id=ignore bgcolor=#FFC56C><font color =Green>Fri</font></th> 
<th width =308 id=ignore bgcolor=#FFC56C><font color =blue>Sat</font></th> 
</tr>\n"; 

$ts = mktime(0,0,0,$month,$day,$year); // unix timestamp of the first day of current month
$weekday_first_day = date("w",$ts); // which is the weekday of the first day of week 0-Sunday 6-Saturday
//$my_format = date("d-m-Y");
$slot=0;

print "<tr align=center  >\n"; // First row starts
for($i=0;$i<$weekday_first_day;$i++) // Pad the first few rows(slots)
{
print "     <td id=ignore width =308></td>";  // Empty slots 
$slot++;
}
	if($day == '')
	{
		$ig = 'ignore';
		echo ">>";
	}

while(checkdate($month,$day,$year) && $date<32) // till there are valid days in current month
{
if($slot == 7)  // if we moved past saturday
{
$slot = 0;  // reset and move back to sunday
print "</tr>\n"; // end of this row
print "<tr align=center width =50>\n"; // move on to next row

}
	//$system_date = '$day-$month-$year';
	//$db_date = date('d-m-Y',$day $month $year);
	$system_date = mktime(0, 0, 0, $month, $day, $year);
	$db_date = date('d-m-Y',$system_date);
	$db_date_search = explode('-',$db_date);
	//print_r($db_date_search);
	$search_date = mktime(0, 0, 0, $month, $day);
	$search_date = sprintf(date('d-m-',$search_date));
	$month_no =  $db_date_search[1];
	 $query ="select * from calender_event  where active = '1' and day  = '$db_date_search[0]' and `month_no` = '$month_no' and year = '$db_date_search[2]' ";
	
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
	/* echo $query;
	echo $count; */
	$tr = 0;
	
	if($count != '0')
	{	$msg .= "<table id=ignore width=100%>";
		while($row=mysql_fetch_array($result))
		{
		
		if($row[popup] =='1')
		{
			$popup_link = " onmouseout=\"hideTooltip()\" onmouseover=\"showTooltip(event,'$row[pop_msg]'";
		
		}else
		{
			$popup_link  ="";
		}
		
		$msg .= "<tr ><td id=ignore bgcolor=green>$row[heading]</td></tr><tr><td id=ignore bgcolor=white><a href=\"comm.php?crypted=$_GET[crypted]&last=$month_no&year=$db_date_search[2]&calender&edit_event=$row[sno]\" $popup_link);return false\">$row[details]</a></td></tr>";
		}
		$msg .= "</table>";
	}else
	{
		$msg ='';
	
	}
	//chking all db
	$color = "bgcolor = white";
	echo "<td  $color id=$idd width =308 hight=308><DIV align=center id= tips><a href = #><font color=black><a href=comm.php?crypted=$_GET[crypted]&last=$month_no&year=$db_date_search[2]&calender&add_event=$db_date_search[0]-$db_date_search[1]-$db_date_search[2]>$day</a> </font>
		
		 ";
	
	
		echo "</div ></a>$msg</div ></td>";
$msg ='';
	

$day++;
$slot++;
}

if($slot>0) // have we started off a new last row 
{
while($slot<7)  // padding at the end to complete the last row table
{
print "     <td id=ignore></td>"; // empty slots
$slot++;
}
print "\n</tr>\n"; // close out last row
}
print '</table>';  //end of table
}
displayCurrentMonthCalenderAsTable();

	
	
	
	
	
	?>
                  </div></td>
                </tr>
            </table>
          <?php
		}
		if(isset($_GET[add_event]) and $user_type =='1')
		{
		?>
              <form name="form1" method="post" action="comm.php?crypted=<?php echo "$_GET[crypted]&last=$_GET[last]&year=$_GET[year]&calender&"; ?>">
                <table width="40%" border="0" align="center" class="sk_bok">
                  <tr>
                    <td colspan="3" align="center"><?php echo "<b>Add Event For : $_GET[add_event]</b>"; 
			  $add_event = explode('-',$_GET[add_event]);
			  
			  
			  
			  ?>
                        <input type="hidden" name="day" value="<?php echo $add_event[0]; ?>">
                        <input type="hidden" name="month_no" value="<?php echo $add_event[1]; ?>">
                        <input type="hidden" name="year" value="<?php echo $add_event[2]; ?>"></td>
                  </tr>
                  <tr>
                    <td width="33%">From </td>
                    <td width="2%"><strong>:</strong></td>
                    <td width="65%"><?php echo $name; ?></td>
                  </tr>
                  <tr>
                    <td>Heading </td>
                    <td><strong>:</strong></td>
                    <td><label>
                      <input name="heading" type="text">
                    </label></td>
                  </tr>
                  <tr>
                    <td>Details</td>
                    <td><strong>:</strong></td>
                    <td><label>
                      <input type="details" name="textfield">
                    </label></td>
                  </tr>
                  <tr>
                    <td>Tip</td>
                    <td><strong>:</strong></td>
                    <td><label>
                      <input type="checkbox" name="popup" value="1">
                    </label></td>
                  </tr>
                  <tr>
                    <td>Tip Message </td>
                    <td><strong>:</strong></td>
                    <td><label>
                      <input type="text" name="pop_msg">
                    </label></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><label>
                      <input type="reset" name="Submit2" value="Reset">
                      <input type="submit" name="Submit" value="Submit">
                    </label></td>
                  </tr>
                </table>
              </form>
          <?php
		 }
		 if(isset($_GET[edit_event]) and $user_type =='1')
		 {

			$query = "select * from calender_event where sno = '$_GET[edit_event]' limit 1";
			$result = mysql_query($query);
			while($row=mysql_fetch_array($result))
			{
				$heading = $row[heading];
				$details  = $row[details];
				$popup = $row[popup];
				if($popup =='1')
				{
				$ch = "checked=checked";
				
				}else
				{
				
				$ch = '';
				}
				$pop_msg  = $row[pop_msg];
				$day = $row[day];
				$month_no = $row[month_no];
				$year = $row[year];
			
			}
			
		 ?>
              <form name="form1" method="post" action="comm.php?crypted=<?php echo "$_GET[crypted]&last=$_GET[last]&year=$_GET[year]&calender&edit_done=$_GET[edit_event]"; ?>">
                <table width="40%" border="0" align="center" class="sk_bok">
                  <tr>
                    <td colspan="3" align="center"><?php echo "<b>Edit Event For : $day-$month-$year</b>"; 
			  
			  
			  
			  
			  ?> [<a href=comm.php?crypted=<?php echo"$_GET[crypted]&last=$_GET[last]&year=$_GET[year]&calender&delete=$_GET[edit_event]"; ?>><font color="#990000">Delete</font></a>] </td>
                  </tr>
                  <tr>
                    <td width="33%">From </td>
                    <td width="2%"><strong>:</strong></td>
                    <td width="65%"><?php echo $name; ?></td>
                  </tr>
                  <tr>
                    <td>Heading </td>
                    <td><strong>:</strong></td>
                    <td><label>
                      <input name="heading2" type="text" value="<?php echo $heading ; ?>">
                    </label></td>
                  </tr>
                  <tr>
                    <td>Details</td>
                    <td><strong>:</strong></td>
                    <td><label>
                      <input type="details" name="textfield2" value="<?php echo $details ; ?>">
                    </label></td>
                  </tr>
                  <tr>
                    <td>Tip</td>
                    <td><strong>:</strong></td>
                    <td><label>
                      <input type="checkbox" name="popup2" value="1" <?php echo $ch; ?>>
                    </label></td>
                  </tr>
                  <tr>
                    <td>Tip Message </td>
                    <td><strong>:</strong></td>
                    <td><label>
                      <input type="text" name="pop_msg2" value="<?php echo $pop_msg ; ?>">
                    </label></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><label>
                      <input type="reset" name="Submit22" value="Reset">
                      <input type="submit" name="Submit3" value="Update">
                    </label></td>
                  </tr>
                </table>
              </form>
          <?php
		 
		 }
		 
		 ?>
          <p></p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>
                <?php 
		  
		  
		/*   if($user_type = '1')
		  {
		  include_once("iner_menu.php");
		  
		  }elseif($user_type = '0')
		  {
		  
		  include_once("iner_menu_resident.php");
		  
		  }elseif($user_type = '2')
		  {
		  
		  include_once("iner_menu_club.php");
		  
		  } */
		  
		   ?>
          </p></td>
      </tr>
    </table></td>
    <td width="29" align="right" valign="top" class="ctrrgt"><img src="../img/ctrrighttop.gif" width="29" height="82"></td>
  </tr>
  <tr>
 <td background="http://axonsg.com/projects/ardmorepark/v2/img/leftbotbg.gif"><SPACER type="block" height="20">
		</td>   <td background="../img/ctrleftbot.gif"><spacer type="block" height="20"></td>
    <td align="left" valign="top" background="../img/ctrbotctr.gif">&nbsp;</td>
    <td valign="top" class="ctrbot"><img src="../img/ctrrgtbot.gif" width="29" height="20"></td>
  </tr>
</table>
<link rel=stylesheet type="text/css" href="../textset.css"><?php include_once("footer.php"); ?>
</body>

<!-- Mirrored from www.ascengen.com/ardmorepark/home.jsp by HTTrack Website Copier/3.x [XR&CO'2006], Fri, 20 Jul 2007 08:00:03 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
</html>


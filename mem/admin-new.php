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
	
	if($_SESSION['basic_is_logged_in'] != $id or $_SESSION['basic_is_logged_in'] =='' or $_SESSION['admin'] == '')
	{

	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; </script> ";
			exit;
	}	
?>
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
				{
					 echo "Welcome <i><b>User [$username]</b></i><br>";
				
				}	
				?>
                    &nbsp;&nbsp; 
                    <input onMouseOver="this.src='img/but_logout_2.gif'" onClick="location.replace('logout.php')" onMouseOut="this.src='img/but_logout_2.gif'" type="image" src="img/but_logout_2.gif" name="I1">
                    <br>
                    &nbsp;
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <? 
		include ("internal-adminmenu.php");
		?>
      </table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top" align="left">
        <? if ($mode == '') { ?>
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				
          <td class="ctrtop" vAlign="bottom" height="82"> 
            <p><img height="37" src="img/t/managementoffice.gif" width="218"></p>
            </td>
			</tr>
		</table>
		
      <p><br>
	<?php
	if($user_type=='1')
	{
	
	$query = "select * from user_account  where active ='1' limit 1";
		$result = mysql_query($query);
		$user_acount= mysql_num_rows($result); //count no of user
		$query = "select * from user_account  where user_type = '0' and active ='1' limit 1";
		$result = mysql_query($query);
		$user_resident= mysql_num_rows($result); // count no of resident
		$query = "select * from user_account  where user_type = '1' and active ='1' limit 1";
		$result = mysql_query($query);
		$user_admin= mysql_num_rows($result); // count no of administrator
		$query = "select * from user_account  where user_type = '2' and active ='1' limit 1";
		$result = mysql_query($query);
		$user_club= mysql_num_rows($result); // count no of club
	?>
      </p>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
       <tr>
         <td style="background-repeat:no-repeat"><img src="images/left_win_10.gif" width="21" height="30" border="0" align="right"></td>
         <td colspan="3" background="images/middle_win_11.gif"> <span class="style1">Booking Management Statistics</span> </td>
         <td><img src="images/right_win_14.gif" width="17" height="30"></td>
       </tr>
       <tr>
         <td style="background-repeat:no-repeat">&nbsp;</td>
         <td colspan="3" style="background-repeat:no-repeat"><div align="left"><span class="style3"><br>
           Members Statistics for Ardmorepark Booking System<br>
           <br>
</span><br>
         </div></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td style="background-repeat:no-repeat">&nbsp;</td>
         <td width="32%"><div align="center">Administrators [ <?php echo $user_admin; ?> ] </div></td>
         <td width="37%"><div align="center">Residents [ <?php echo $user_resident; ?> ] </div></td>
         <td width="24%"><div align="center">Club [ <?php echo $user_club; ?> ] </div></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td style="background-repeat:no-repeat">&nbsp;</td>
         <td colspan="3">&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td colspan="5" style="background-repeat:no-repeat"> <table width="98%" border="0" align="center">
           <tr>
             <td colspan="7" bgcolor="#944542"><p style="font-weight: bold; color: #FFFFFF"> &nbsp;<span class="style1">Residents Booking Statistics for the current month </span> </p>
               <p style="font-weight: bold; color: #FFFFFF">Total Pending Confirmation   [<a href='redirect.php?<?php echo "crypted=$_GET[crypted]&page=all&date_sel_all=1-01-2007&date_sel_all_end=1-01-3007&select=0&menu2=$row[unique_no]&user_sel=0"; ?>'> <b><font color="#FFFFFF"><?php echo $count_waiting; ?></font></b></a> ] </p></td>
             </tr>
           <tr>
             <td colspan="5" bgcolor="#CCCC99" style=padding-bottom:4px ><div align="center">
               <?php
		   		
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
echo "<a href=admin.php?crypted=$_GET[crypted]&lastyear=$lastyear&&id=$fac&page=$_GET[page]&user_id=$uid&fac=$fac&date_sel=$date_of_can&booking_no=$my_booking_no&type=cancle&date_sel_all=1-$month-$lastyear&date_sel_all_end=30-$month-$lastyear&menu2=$_POST[menu2]&user_sel=$_POST[user_sel]&select=$_POST[select]><font color=green>[ Last Year ]</font></a>&nbsp;&nbsp;&nbsp;<a href=admin.php?crypted=$_GET[crypted]&calender&last=$lastmonth&year=$year><font color=green>&laquo; Previous Month</a>&nbsp;&nbsp;&nbsp; <b>[$month_caption ]</b> &nbsp;&nbsp;&nbsp;<a href=admin.php?crypted=$_GET[crypted]&calender&next=$nextmonth&year=$year><font color= green>Next Month &raquo;</font></a> &nbsp;<a href=admin.php?crypted=$_GET[crypted]&calender&lastyear=$nextyear><font color= green>[ Next Year ]<font></a>";
		
		  ?>
              </div></td>
           </tr>
        <?php 
		$query = "select * from facility WHERE enable = '1'";
		$result = mysql_query($query);
		while($row=mysql_fetch_array($result))
		{
		if($set =='1')
		{
		$color = "white";
		$set =0;
		}else
		{
		$color = "#CCCCCC";
		$set=1;
		
		}
		$closed_at = $row[closed_at];
		$t = date('t',mktime(0, 0, 0, date("$month")  , date("d"), date("Y")));
		$m = date('m',mktime(0, 0, 0, date("$month")  , date("d"), date("Y")));
		
		
		 $d = date('d');
		  $today = time();
		 

		
		 $count_lapsed ='0';
		$query1 = "select * from my_booking where day >= '01' and month >= '$m' and year >='$year'  and day <= '$t' and month <= '$m'  and year <= '$year' and status ='0' and unique_no ='$row[unique_no]'";
		$result1 = mysql_query($query1);
		while($row1 = mysql_fetch_array($result1))
		{
			$from_time = explode(':',$row1[from_time]);
			$from_time_hrs = $from_time[0];
			$from_time_min = $from_time[1];
			 $jan = mktime($from_time_hrs,$from_time_min,0,$row1[month],$row1[day],$row1[year]);
			$hrs = ((($jan - $today)/60)/60);
			 if($closed_at >= $hrs)
			 {
			 
			 $count_lapsed++;
			 
			 }
		
		}
	
		//mktime(0, 0, 0, date("$month")  , date("d"), date("Y"));
			$t = date('t',mktime(0, 0, 0, date("$month")  , date("d"), date("Y")));
		$m = date('m',mktime(0, 0, 0, date("$month")  , date("d"), date("Y")));
	$query1 = "select * from my_booking where day >= '01' and month >= '$m' and year >='$year'  and day <= '$t' and month <= '$m'  and year <= '$year' and status ='0' and unique_no ='$row[unique_no]'";
		$result1 = mysql_query($query1);
		$count_waiting = mysql_num_rows($result1);
		$query1 = "select * from my_booking where day >= '01' and month >= '$m' and year >='$year'  and day <= '$t' and month <= '$m'  and year <= '$year' and status ='1' and unique_no ='$row[unique_no]'";
		$result1 = mysql_query($query1);
		$app_waiting = mysql_num_rows($result1);
		$query1 = "select * from my_booking where day >= '01' and month >= '$m' and year >='$year'  and day <= '$t' and month <= '$m'  and year <= '$year' and status ='2' and unique_no ='$row[unique_no]'";
		$result1 = mysql_query($query1);
		$can_waiting = mysql_num_rows($result1);
		 $start_month = "-$m-$year";
		?>
		   <tr bgcolor="<?php echo $color; ?>">
             <td width="23%"><span class="style4"><span class="style3">FACILITY - </span></span> <b><?php echo $row[name]; ?></b></td>
             <td width="21%"><div align="center">Pending Confirmation   [<a href="redirect.php?<?php echo "crypted=$_GET[crypted]&page=all&date_sel_all=1$start_month&date_sel_all_end=$t$start_month&select=0&menu2=$row[unique_no]&user_sel=0"; ?>"> <b><?php echo $count_waiting; ?></b> ] </a></div></td>
             <td width="24%"><div align="center">Confirmed [<a href="redirect.php?<?php echo "crypted=$_GET[crypted]&page=all&date_sel_all=1$start_month&date_sel_all_end=$t$start_month&select=1&menu2=$row[unique_no]&user_sel=0"; ?>"> <b><?php echo $app_waiting; ?></b> </a>] </div></td>
             <td width="17%"><div align="center">Cancelled [<a href="redirect.php?<?php echo "crypted=$_GET[crypted]&page=all&date_sel_all=1$start_month&date_sel_all_end=$t$start_month&select=2&menu2=$row[unique_no]&user_sel=0"; ?>"> <b><?php echo $can_waiting; ?></b></a> ] </div></td>
             <td width="15%"><div align="center">Lapsed [ <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&page=all&date_sel_all=1$start_month&date_sel_all_end=$t$start_month&select=0&menu2=$row[unique_no]&user_sel=0"; ?>"> <?php 	echo	 $count_lapsed; ?> </a>] </div></td>
           </tr>
		  <?php
		  }
		  ?>
           <tr><td colspan="5">&nbsp;</td></tr>
           
         </table></td>
        </tr>
       <tr>
          <td width="4%" style="background-repeat:no-repeat"><div align="right"></div></td>
                      <td colspan="3">&nbsp;</td>
                      <td width="3%">&nbsp;</td>
        </tr>
      </table>
      <p>        &nbsp;
        <?
		}
		
		 } else { ?>
        <br>
        <br>
      </p>
      <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="37" src="img/t/changepassword.gif" width="198"></td>
			</tr>
			<tr>
				
          <td class="content" vAlign="top">
<p><br>
              To change new password, please enter your current password, your 
              new password and re-enter your new password again under 'Confirm 
              New Password'. Click 'OK' to proceed.</p>
				<form name="form1" onSubmit="return validate()" method="post" action="chngpwd.jsp">
					<input type="hidden" value="manager" name="code">
					<table cellSpacing="0" cellPadding="0" width="50%" border="0" id="table8">
						<tr>
							<td class="bk">Current Password </td>
							<td class="bk2"><font class="txtsz">
							<input class="txt1" id="cpassword" type="password" maxLength="20" size="18" value name="cpassword">
							</font></td>
						</tr>
						<tr>
							<td class="bk" width="48%">New Password </td>
							<td class="bk2" width="52%"><font class="txtsz">
							<input class="txt1" id="password" type="password" maxLength="20" size="18" value name="password">
							</font></td>
						</tr>
						<tr vAlign="top" align="left">
							<td class="bk">Confirm New Password</td>
							<td class="bk2"><font class="txtsz">
							<input class="txt1" id="password1" type="password" maxLength="20" size="18" value name="password1">
							</font></td>
						</tr>
						<tr vAlign="top" align="middle">
							<td colSpan="2"><br>
							<input type="image" src="img/but_ok1.gif" name="I2"></td>
						</tr>
					</table>
				</form>
				<p></td>
			</tr>
		</table>
        <? } ?>
		<p></td>
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
<?
include_once("includes/config.php");
?>
   <link href="../textset.css" type="text/css" rel="stylesheet">
   <?
$sqlbooking = "SELECT * FROM my_booking WHERE";

if ($_GET['menu2'] != '0')
{
	$sqlbooking .= " unique_no = '$_GET[menu2]' AND";
}

//if ($_GET['date_sel_all'] != '')
//{
	

//}

if ($_GET['user_sel'] != '0')
{
	$sqlbooking .= " uid = '$_GET[user_sel]' AND";
}

if ($_GET['select'] != '7')
{
	$sqlbooking .= " status = '$_GET[select]' AND";
}
	$datenew = explode("-", $_GET['date_sel_all']);
	$datestartfrom = $datenew[2] . "-" . $datenew[1] . "-" . $datenew[0];

//}

//if ($_GET['date_sel_all_end'] != '')
//{
	
	$datenew = explode("-", $_GET['date_sel_all_end']);
	$dateendto = $datenew[2] . "-" . $datenew[1] . "-" . $datenew[0];
	$sqlbooking .= " date_of_booking >= '$datestartfrom' AND date_of_booking <= '$dateendto'";

$sqlbooking .= " ORDER BY date_of_booking DESC,from_time DESC";
//echo $sqlbooking;
$resultbooking = mysql_query($sqlbooking);
$user_type = $_GET['user_type'];

//crypted=$_GET[crypted]&page=$_GET[page]&date_sel_all=$_GET[date_sel_all]&date_sel_all_end=$_GET[date_sel_all_end]


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellpadding="5" cellspacing="0" style="border:1px solid #333333;">
                                <form>
                                <tr>
                                  <td colspan="12">
								  <SCRIPT Language="Javascript">

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
                                  <td width="6%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">Facility</div></td>
                                  <td width="8%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">Date</div></td>
                                  <td width="7%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">From Time</div></td>
                                  <td width="6%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">To Time </div></td>
                                  <? if ($user_type != '0') { ?> 
                                  <td width="8%" bgcolor="#944542" style="border-right:1px solid #333333;">
                           		  <div align="center" class="fontitle">Resident</div>                                        </td>
                                  <td width="7%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">By Who</div></td>
                                  <? } ?>
                                  <td width="24%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">Restrictions On Cancellation </div></td>
                                  <td width="4%" bgcolor="#944542" style="border-right:1px solid #333333;"><div align="center" class="fontitle">Remarks</div></td> 
                                </tr>
                                
                                <?php 
								$from_date = explode('-',$date_sel_all);
								$from_day = $from_date[0];
								$from_month = $from_date[1];
								$from_year = $from_date[2];
								$to_date = explode('-',$date_sel_all_end);
								$to_day = $to_date[0];
								$to_month = $to_date[1];
								$to_year = $to_date[2];
								$sr =1;
								$date_to_start = $from_year . "-" . $from_month . "-" . $from_day;
								$date_to_end = $to_year . "-" . $to_month . "-" . $to_day;
								while($rowbooking=mysql_fetch_array($resultbooking))
							  	{
							  		$date_of_booking = $rowbooking[date_of_booking];
							  		$time_of_booking = $rowbooking[time_of_booking];
							  		//$newdate = explode("-", $date_of_booking);
									//$date_of_booking = $newdate[2] . "-" . $newdate[1] . "-" . $newdate[0];
									if ($date_to_start <= $date_of_booking && $date_of_booking <= $date_to_end)
									{
										$greybar_info = $rowbooking[day] . "-" . $rowbooking[month] . "-" . $rowbooking[year];
										$order_status = $rowbooking[status];
										$reason = $rowbooking[cancle_reson];
										$uid = $rowbooking[uid];
										$rid = $rowbooking[rid];
										if ($rid == '')
										{
										$rid = "";
										}
										$amount_recived = $rowbooking[amount_recived];
										if($amount_recived =='')
										{
											$amount_recived = "NO";
										}
										$query_facility = "select * from facility where unique_no ='$rowbooking[unique_no]' limit 1";
										$result_facility = mysql_query($query_facility);
										while($row_facility=mysql_fetch_array($result_facility))
										{
											$name_fac = $row_facility[name];
											$closed_at  = $row_facility[closed_at];
											$fac= $row_facility[sno];
											$closed_at = $row_facility[closed_at];
										}
										if ($fac != '12' && $fac != '14')
										{
											$text = "usage time";
										}
										else
										{
											$text = "playtime";
										}
										$query_user = "select * from user_account where id ='$rowbooking[uid]' limit 1";
										$result_user = mysql_query($query_user);
										while($row_user = mysql_fetch_array($result_user))
										{
											$username = $row_user[username];
											//$user_type = $row_user[user_type];
											$id = $row_user[id];
										}
										$query_user = "select * from user_account where id ='$rowbooking[rid]' limit 1";
										$result_user = mysql_query($query_user);
										while($row_user = mysql_fetch_array($result_user))
										{
											$rid1 = $row_user[username];
											$rid2 = $row_user[id];
										}
										$my_booking_no = $rowbooking[sno];
						
										$from_time = explode(':',$rowbooking[from_time]);
										$from_time_hrs = $from_time[0];
										$from_time_min = $from_time[1];
										$today_date = date("d-m-Y");
										$hour = date("G");
										$min = date("i");
										$jan = mktime($from_time_hrs,$from_time_min,0,$rowbooking[month],$rowbooking[day],$rowbooking[year]);
										$hrs = ((($jan - $today)/60)/60);
										if($closed_at >= $hrs and $rowbooking[status] =='0')
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
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo "$rowbooking[date_of_booking]"; ?></td>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo $rowbooking[from_time]; $from_time_recorded = $rowbooking[from_time]; ?></td>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo $rowbooking[to_time];?></td>
                                    	<? if ($user_type != '0') { ?>
                                        <td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo $username; ?></td>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php if ($user_type == '1' || $rid2 == $id) { echo $rid1; } else { echo "&nbsp;"; } ?></td>
                                        <? } ?>
                                    	<td style="border-right:1px solid #333333;border-top:1px solid #333333;"><?php echo  "$closed_at_new hr(s) before $text"; ?></td>
                                    	<td style="border-right:0px solid #333333;border-top:1px solid #333333;"><? if ($order_status == 2) { echo "Cancelled"; } else if ($order_status == 1) { echo "Approved"; } else if ($order_status == 0) { echo "Pending"; } else if ($order_status == 3) { echo "Rain"; } else if ($order_status == 4) { echo "Absent"; } else if ($order_status == 5) { echo "Illegal Cancellation"; } ?></td>
                                  </tr>
                                  <? if ($user_type == '1') { ?>
                                        <tr bgcolor="#CCCCCC">
                                        	<td colspan="11" style="font-size: 11px;"><i>
											<?php
								 			if($time_of_booking !='')
								   			echo "<b>Date & Time of booking :</b>$greybar_info at $time_of_booking" ;?>                                    		&nbsp;&nbsp; 
								  			<?php 
								  				  
								  			if($rowbooking[cancle_booking_date_time] !='')
								  			{ 
								  				echo "| <b> Cancelation Date & Time : </b>$rowbooking[cancle_booking_date_time]";
								  			} 
								  			if($rowbooking[date_of_conf] !='')
								  			{ 
								  				echo "| <b> Confirmation Date & Time : </b>$rowbooking[date_of_conf]";
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
								}
					   					?>
                                  </table>
                                  
</body>
</html>
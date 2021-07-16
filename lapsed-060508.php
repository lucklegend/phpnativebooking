<?
// looking for lapsed on booking
//include_once("mem/includes/config.php");
// first draw out the booking which is still pending 

$sql = "SELECT * FROM my_booking WHERE status = '0'";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);
if ($num_rows != 0)
{
while ($row = mysql_fetch_array($result))
{
//	echo "Booking ID: " . $row['sno'] . "<br>";
	// now check for the lapsed period for the facility
//	$sql2 = "SELECT * FROM facility WHERE unique_no = " . $row['unique_no'];
//	$result2 = mysql_query($sql2);
//	$row2 = mysql_fetch_array($result2);
//	echo "Facility Name: " . $row2['name'] . "<br>";
//	echo ">> Lasped period is " . $row2['closed_at'] . " hours before confirmation so by ";
	//$spot  = time() + (1 * 19 * 48 * 22);
	$yes = date("YmdHis");
	$newdate = date ("d-m-Y H:i:s");
	$gettdatebooked = explode("-", $row['date_of_booking']);
	$getttimebooked = explode(":", $row['from_time']);
	$checkifpassed = $gettdatebooked[0] . $gettdatebooked[1] . $gettdatebooked[2] . $getttimebooked[0] . "0000";
	
//	echo " should revert to cancel due to non payment<br>";
//	echo "Date of booking made: " . $row['day'] . "-" . $row['month'] . "-" . $row['year'] . "<br>";
//	echo "Time of booking made: " . $row['time_of_booking'] . "<br>";
//	echo "Lapsed on: " . $yes . "<br>";
//	echo "Lapsed noted: " . $row['lapsed_date'] . "<br>";
	if (($yes >= $row[lapsed_date]) or ($yes >= $checkifpassed))
	{
		$sql2 = "UPDATE my_booking SET status = '5', cancle_reson = '12', cancle_booking_date_time = '$newdate' WHERE sno = '$row[sno]'";
		$result2 = mysql_query($sql2);
	}
//	else
//	{
//		$yes = "0";
//	}
//	echo "Should lapsed: $yes";
//	echo "<hr>";
}
}

?>
<?php
session_start();
	include_once("includes/config.php");
$query = "select * from my_booking where sno = '$_GET[id]'";
$result = mysql_query($query);
while($row=mysql_fetch_array($result))
{
	$uid = $row[uid];
	$unique_no = $row[unique_no];
	$payment_status = $row[payment_status]; 
	$date_of_booking  = $row[date_of_booking];
	$from_time  = $row[from_time];
	$to_time  = $row[to_time];
	$time_type  = $row[time_type];
	$amount_recived  = $row[amount_recived];



}
$query = "select * from facility  where unique_no = '$unique_no' limit 1";
$result = mysql_query($query);
while($row=mysql_fetch_array($result))
{
	$name  = $row[name];




}
$query = "select * from user_account where id = '$uid' limit 1";
$result = mysql_query($query);
while($row=mysql_fetch_array($result))
{
$userid = $row[username];
$username = $row[name];
$email  = $row[email];
$contact_no = $row[contact_no];

}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0082)http://axonsg.com/projects/summerhill/libraries/facilities/receipt.php?bookid=1459 -->
<HTML><HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1252"><LINK 
href="../raw/receipt_files/globaladmin.css" type=text/css rel=stylesheet>
<STYLE type=text/css>BODY {
	MARGIN-LEFT: 10px
}
</STYLE>

<META content="MSHTML 6.00.2900.3157" name=GENERATOR></HEAD>
<BODY><BR>
<TABLE 
style="BORDER-RIGHT: #333333 1px solid; BORDER-TOP: #333333 1px solid; BORDER-LEFT: #333333 1px solid; BORDER-BOTTOM: #333333 1px solid" 
cellSpacing=0 cellPadding=5 width=600 align=center bgColor=#ffffff border=0>
  <TBODY>
  <TR bgColor=#770000>
    <TD 
    style="BORDER-RIGHT: 0px solid; BORDER-TOP: 0px solid; BORDER-LEFT: 0px solid; BORDER-BOTTOM: 1px solid" 
    bgColor=#770000 height=28><B><FONT color=#ffffff>Facility Booking 
      Receipt</FONT></B></TD>
    <TD 
    style="BORDER-RIGHT: 0px solid; BORDER-TOP: 0px solid; BORDER-LEFT: 0px solid; BORDER-BOTTOM: 1px solid" 
    align=right height=28><A href="javascript:window.print();"><IMG 
      src="../raw/receipt_files/printer-001.gif" border=0></A> </TD></TR>
  <TR>
    <TD colSpan=2 height=28>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD width="50%">&nbsp;</TD>
          <TD width="50%">&nbsp;</TD></TR>
        <TR vAlign=top>
          <TD width="50%" height=28>
            <TABLE cellSpacing=0 cellPadding=2 width="100%" border=0>
              <TBODY>
              <TR>
                <TD width=150><B>Reference No:</B> </TD>
                <TD><?php echo $_GET[id]; ?> </TD></TR>
              <TR>
                <TD width=150><B>Facility:</B> </TD>
                <TD><?php echo $name; ?></TD>
              </TR>
              <TR>
                <TD width=150><B>Facility Fee / Deposit:</B> </TD>
                <TD><?php 
				if($deposite =='0')
				{
					echo "N/A";
				
				}
				
				echo "SGD .$deposite"; ?> </TD></TR></TBODY></TABLE></TD>
          <TD width="50%" height=28>
            <TABLE cellSpacing=0 cellPadding=2 width="100%" border=0>
              <TBODY>
              <TR>
                <TD width=150><B>Date Booked:</B> </TD>
                <TD><?php echo $date_of_booking ; ?></TD>
              </TR>
              <TR>
                <TD width=150><B>Start Time: </B></TD>
                <TD><?php echo $from_time ; ?></TD>
              </TR>
              <TR>
                <TD width=150><B>End Time: </B></TD>
                <TD><?php echo $to_time ; ?></TD>
              </TR></TBODY></TABLE></TD></TR>
        <TR vAlign=top>
          <TD height=28><FONT color=#ff0000 size=1><BR>**</FONT><FONT size=1> 
            Facility booked via online on <?php echo $date_of_booking ; ?> </FONT></TD>
          <TD vAlign=bottom height=28>&nbsp;</TD>
        </TR></TBODY></TABLE></TD></TR>
  <TR bgColor=#770000>
    <TD 
    style="BORDER-RIGHT: 0px solid; BORDER-TOP: 0px solid; BORDER-LEFT: 0px solid; BORDER-BOTTOM: 1px solid" 
    colSpan=2 height=28><B><FONT color=#ffffff>Resident 
    Particulars</FONT></B></TD></TR>
  <TR>
    <TD colSpan=2 height=28>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD width="50%">&nbsp;</TD>
          <TD width="50%">&nbsp;</TD></TR>
        <TR vAlign=top>
          <TD width="50%" height=28>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD width=80><B>Name:</B></TD>
                <TD><?php echo $username; ?> </TD></TR>
              <TR>
                <TD width=80><B>Unit:</B></TD>
                <TD><?php echo $userid; ?></TD>
              </TR></TBODY></TABLE></TD>
          <TD width="50%" height=28>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD width=100><B>Phone/Mobile:</B></TD>
                <TD><?php echo $contact_no ; ?></TD></TR>
              <TR>
                <TD width=100><B>Email:</B></TD>
                <TD><?php echo $email ; ?></TD>
              </TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD colSpan=2>
      <TABLE 
      style="BORDER-RIGHT: 1px solid; BORDER-TOP: 1px solid; BORDER-LEFT: 1px solid; BORDER-BOTTOM: 0px solid" 
      cellSpacing=5 cellPadding=5 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=top>I confirm that I have read and understood the Rules 
            and Regulation for the use of <?php echo $name; ?> . I agreed 
            to abide by the Rules and Regulations, and am responsible for the 
            behaviour of my guest. I also understand that I will print a copy of 
            this receipt and submit to the Management Office upon booking 
            payment.<BR>
            <FONT size=1><BR>Booking will be cancelled on 
            non-payment/non-confirmation within 72 hours.<BR>For Rules and 
            Regulations, please refer to House Rules. 
</FONT></TD></TR></TBODY></TABLE>
      <TABLE 
      style="BORDER-RIGHT: 1px solid; BORDER-TOP: 0px solid; BORDER-LEFT: 1px solid; BORDER-BOTTOM: 1px solid" 
      height=100 cellSpacing=5 cellPadding=5 width="100%" border=0>
        <TBODY>
        <TR vAlign=center>
          <TD vAlign=top width="50%">Name / Signature:</TD>
          <TD vAlign=top width="50%">Date:</TD></TR></TBODY></TABLE></TD></TR>
  <TR bgColor=#770000>
    <TD 
    style="BORDER-RIGHT: 0px solid; BORDER-TOP: 0px solid; BORDER-LEFT: 0px solid; BORDER-BOTTOM: 1px solid" 
    colSpan=2 height=28><B><FONT color=#ffffff>FOR OFFICIAL USE 
    ONLY</FONT></B></TD></TR>
  <TR>
    <TD colSpan=2 height=28>
      <TABLE 
      style="BORDER-RIGHT: 1px solid; BORDER-TOP: 1px solid; BORDER-LEFT: 1px solid; BORDER-BOTTOM: 1px solid" 
      height=314 cellSpacing=5 cellPadding=5 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=top width="50%">
            <TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
              <TBODY>
              <TR vAlign=top>
                <TD width=10>(1)</TD>
                <TD>Application handed to security 
          officer</TD></TR></TBODY></TABLE></TD>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
              <TBODY>
              <TR vAlign=top>
                <TD>Name / Signature: </TD></TR>
              <TR vAlign=top>
                <TD>Date: <BR><BR></TD></TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD vAlign=top width="50%" height=81>
            <TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
              <TBODY>
              <TR vAlign=top>
                <TD width=10>(2)</TD>
                <TD>Management Staff </TD></TR></TBODY></TABLE></TD>
          <TD vAlign=top width="50%" height=81>
            <TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
              <TBODY>
              <TR vAlign=top>
                <TD>Name / Signature:</TD></TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD vAlign=top width="50%" height=50>
            <TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
              <TBODY>
              <TR vAlign=top>
                <TD width=10>(3)</TD>
                <TD>Cheque No:</TD></TR></TBODY></TABLE></TD>
          <TD vAlign=top height=50>
            <TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
              <TBODY>
              <TR vAlign=top>
                <TD width=100>Date:</TD>
                <TD>&nbsp;</TD></TR>
              <TR vAlign=top>
                <TD width=100>Issued By: <BR></TD>
                <TD>&nbsp;</TD></TR></TBODY></TABLE>
            <P>&nbsp;</P></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD align=middle colSpan=2 height=40><FONT size=1><BR>
    </FONT></TD></TR></TBODY></TABLE><BR><BR></BODY></HTML>

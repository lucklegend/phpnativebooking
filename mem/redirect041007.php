<?php
session_start();
	include_once("includes/config.php");

?>
<body onLoad="setTimeout('document.forms[0].submit();',0)">
<form action="booking.php?crypted=<?php echo "$_GET[crypted]&id=$_GET[id]&page=$_GET[page]&user_id=$_GET[user_id]&fac=$_GET[fac]" ;?>" method="POST" > 

<input type="hidden" name="date_sel" value="<?php echo $_GET[date_sel]; ?>">

<input type="hidden" name="booking_no" value="<?php echo $_GET[booking_no]; ?>">
<input type="hidden" name="type" value="<?php echo $_GET[type]; ?>">
<input type="hidden" name="date_sel_all" value="<?php echo $_GET[date_sel_all]; ?>">
<input type="hidden" name="date_sel_all_end" value="<?php echo $_GET[date_sel_all_end]; ?>">
<input type="hidden" name="menu2" value="<?php echo $_GET[menu2]; ?>">
<input type="hidden" name="user_sel" value="<?php echo $_GET[user_sel]; ?>">
<input type="hidden" name="select" value="<?php echo $_GET[select]; ?>">
</form>
</body>
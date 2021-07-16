<strong>Server: host.axonserver.com</strong>
<br>Server Date and Time <Mbr><br>
<hr>
<?php
date_default_timezone_set('Asia/Singapore');//TimeZone Set
echo date("d-m-Y H:i:s");
echo "<br/>".date("H:i:s",strtotime('now'));
?>
 <?php $start_month = date("-m-Y");?>
        <?php if ($user_type == '0') { ?>
        <tr> 
          <td class="leftdecline" height="3"><spacer type="block" 
height="3"><br /><b>&nbsp;&nbsp; My Profile</b></spacer></td>
        </tr>
        <tr> 
          <td class="leftcontent" height="69">&nbsp;&nbsp;<a href="http://helpdesk.axonhq.net" target="_blank"><img height="7" src="img/leftdot.gif" width="9" border="0"></a><a href="profile.php?crypted=<?php echo $_GET['crypted']; ?>"> 
            Change Password</a><br>
            &nbsp;&nbsp;<a href="http://helpdesk.axonhq.net" target="_blank"><img height="7" src="img/leftdot.gif" width="9" border="0"> 
            </a><a class="copy" href="profile.php?mode=information&crypted=<?php echo $_GET['crypted']; ?>">Update Information </a><br>
          </td>
        </tr>
        <?php } ?>
        <tr> 
          <td class="leftdecline" height="3"><spacer type="block" 
height="3"><b><br>
            &nbsp;&nbsp; Facility Booking</b></spacer><br><br />
            &nbsp;&nbsp; <a href="http://helpdesk.axonhq.net" target="_blank"><img height="7" src="img/leftdot.gif" width="9" border="0"></a><a href="booking.php?crypted=<?php echo $_GET[crypted]; ?>&page=book_now&user_id=<?php echo $_SESSION['basic_is_logged_in']; ?>"> 
            Place Booking</a><br>
            &nbsp;&nbsp; <a href="http://helpdesk.axonhq.net" target="_blank"><img height="7" src="img/leftdot.gif" width="9" border="0"></a>
            
            <?php
			if ($user_type == '0') {
			$day = date("d"); 
			$start_month = "-" . date("m") . "-" . date("Y");
			$nextyear  = date("d-m-Y", mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1));
			?>
            <a href="redirect.php?<?php echo "crypted=$_GET[crypted]&page=all&date_sel_all=$day$start_month&date_sel_all_end=$nextyear&select=7&menu2=0&user_sel=$_SESSION[basic_is_logged_in]"; ?>">View Booking</a><br />
            <?php
			}
			else
			{
				$getmonth1 = date("m");
				$getyear1 = date("Y");
				$getdate1 = date("d");
				$numdays1 = date("t");
				$startmonth1 = "-$getmonth1-$getyear1";
			?>
            <a href="redirect.php?crypted=<?php echo $_GET[crypted]; ?>&page=all&date_sel_all=01<?php echo $startmonth1; ?>&date_sel_all_end=<?php echo $numdays1 . $startmonth1; ?>&select=7&menu2=0&user_sel=0"> 
            View Bookings</a>
            <?php
            }
			?><!--br>
            &nbsp;&nbsp; <a href="http://helpdesk.axonhq.net" target="_blank"><img height="7" src="img/leftdot.gif" width="9" border="0"></a><a href="redirect.php?<?php// echo "crypted=$_GET[crypted]&page=all&date_sel_all=1$start_month&date_sel_all_end=30$start_month&select=2&menu2=0&user_sel=0"; ?>"> 
            Cancelled Booking</a-->
          </td>
        </tr><tr><td class="leftcontent" height="3">&nbsp;</td>
        </tr>
        <tr> 
          <td class="leftdecline" height="3"><spacer type="block" 
height="3"><b><br>
            &nbsp;&nbsp; Our Community</b></spacer>
            <br><br />
            &nbsp;&nbsp; <a href="http://helpdesk.axonhq.net" target="_blank"><img height="7" src="img/leftdot.gif" width="9" border="0"></a> <a href="community.php?crypted=<?php echo $_GET['crypted']; ?>">Community News</a><br>
            &nbsp;&nbsp; <a href="http://helpdesk.axonhq.net" target="_blank"><img height="7" src="img/leftdot.gif" width="9" border="0"></a> <a href="circulars.php?crypted=<?php echo $_GET['crypted']; ?>">Circulars</a><br>
            &nbsp;&nbsp; <a href="http://helpdesk.axonhq.net" target="_blank"><img height="7" src="img/leftdot.gif" width="9" border="0"></a> <a href="comm.php?crypted=<?php echo $_GET['crypted']; ?>&calender"> 
            Calendar of Events</a><br><br />
          </td>
        </tr>
        <tr> 
          <td class="leftdecline" height="3"><spacer type="block" 
height="3"><b><br>
            &nbsp;&nbsp; Useful Links</b></spacer>
            <br><br />
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
            <td width="2%" style="padding-left:5px; padding-bottom:0px; padding-top:5px;"><a href="http://helpdesk.axonhq.net" target="_blank"><img height="7" src="img/leftdot.gif" width="9" border="0"></a></td>
            <td width="98%" style="padding-left:5px; padding-bottom:0px; padding-top:5px;"><a href="../gettingthere.php?crypted=<?php echo $_GET['crypted']; ?>">Getting There</a></td>
            </tr>
            <tr>
            <td valign="top" style="padding-left:5px; padding-bottom:15px; padding-top:10px;"><a href="http://helpdesk.axonhq.net" target="_blank"><img height="7" src="img/leftdot.gif" width="9" border="0"></a></td>
            <td valign="top" style="padding-left:5px; padding-bottom:15px; padding-top:5px;"><a href="../contractors_suppliers.php?crypted=<?php echo $_GET['crypted']; ?>">Contractor / Supplier<br />Guildelines</a><br /></td></tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td class="leftdecline" height="3"><SPACER type="block" 
height="3"><br />
            <b>&nbsp;&nbsp; Application Forms</b></spacer>
            <br />
            <br>&nbsp;&nbsp; <a href="http://helpdesk.axonhq.net" target="_blank"><img height="7" src="img/leftdot.gif" width="9" border="0" /></a><a href="forms.php?crypted=<?php echo $_GET[crypted]; ?>"> Forms</a>
            <br>&nbsp;
          </td>
        </tr>
        <tr> 
          <td class="leftdecline" height="3"><SPACER type="block" 
height="3"><br />
            <b>&nbsp;&nbsp; By-Laws</b></spacer>
            <br /><br />&nbsp;&nbsp; <a href="http://helpdesk.axonhq.net" target="_blank"><img src="img/leftdot.gif" alt="" width="9" height="7" border="0" /></a> <a href="bylaws.php?crypted=<?php echo $_GET[crypted]; ?>">By-Laws</a><br />
&nbsp;
              </td>
        </tr>
        <tr> 
          <td class="leftdecline" height="3" style="padding-top:10px;">
          <div align="center"><font size="2"><b> Axon Booking Ver 3.0</b></font></div>
            <div align="center"><font size="2">
              Developed by<br>
              Axon Consulting<br>
              www.axon.com.sg<br>
              <br>
              Tel: +65 6344 9618<br>
              Fax: +65 6344 9766<br>
              e: info@axon.com.sg</font></div>
          </td>
        </tr>
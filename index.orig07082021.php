<?php 
session_start();
include_once("mem/includes/config.php");
include("lapsed.php");
include ("sanitize.php");
sanitizeit();
if ($_SESSION['basic_is_logged_in'])
{
$s_id = $_SESSION['basic_is_logged_in'];
$query = "select * from user_account  where crypted  = '$_GET[crypted]' and id = '$s_id' limit 1";
$result= mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$username = $row[username];
$user_type = $row[user_type];
}


if(isset($_POST[szID]))
{
	$query  = "SELECT * FROM user_account  where username = '". mysql_real_escape_string($_POST[szID])."' and password = '". mysql_real_escape_string($_POST[szPassword])."' and active = '1'";
	$result = mysql_query($query) or die(mysql_error()) ;
	
	$count = mysql_num_rows($result);
	
	if($count != '0' )
	{
 		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
 		{
    		
			$_SESSION['usernameremember'] = $row['username'];
			$_SESSION['passwordremember'] = $row['password'];
			if(isset($_POST['remember'])){
    		  setcookie("cookname", $_SESSION['usernameremember'], time()+60*60*24*100, "/");
      		  setcookie("cookpass", $_SESSION['passwordremember'], time()+60*60*24*100, "/");
   			}
			$id = $row['id'];
			$crypted = $row['crypt'];
			$username = $row['username'];
		 	$_SESSION['basic_is_logged_in'] = "$id";
			include_once('mem/random_char.php');
			$query = "update user_account set crypted = '$pwd' where id = '$id' limit 1";
			$result = mysql_query($query) or die(mysql_error()) ; 
			if ($row['user_type'] == '0')
			{
				$_SESSION['admin'] = 0;
				echo "<script type=text/javascript language=javascript> window.location.href = 'mem/community.php?crypted=$pwd'; </script> ";
			}
			else
				if ($row['user_type'] == '1')
			{
				$_SESSION['admin'] = 1;
				$date_set = date("D, jS F Y @ H:i:s");
				$query = "update user_account set last_logged_in = '$date_set' where id = '$id' limit 1";
				$result = mysql_query($query) or die(mysql_error()) ; 
				echo "<script type=text/javascript language=javascript> window.location.href = 'mem/admin.php?crypted=$pwd'; </script> ";
			}
			else
			{
				$_SESSION['admin'] = '0';
				
				$getmonth = date("m");
				$getyear = date("Y");
				$getdate = date("d");
				$numdays = date("t");
				$startmonth = "-$getmonth-$getyear";
				echo "<script type=text/javascript language=javascript> window.location.href = 'mem/booking.php?crypted=$pwd&page=all&date_sel_all=01$startmonth&date_sel_all_end=$numdays$startmonth&select=7&menu2=0&user_sel=0'; </script> ";
			
			}
			
		
		}
	}
	else
	{
			//die ();
			echo "<script type=text/javascript language=javascript> window.location.href = 'login.php?ops=1'; </script> ";
			exit;
	}
}
 include ("header.php"); ?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="8" rowspan="3" align="left" valign="top">&nbsp;</td>
    <td colspan="5" align="left" valign="top" class="topspace"><spacer type="block"></spacer></td>
  </tr>
  <tr>
    <td width="150" align="left" valign="top" background="img/leftctrbg2.gif" class="left"><link rel=stylesheet type="text/css" href="textset.css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script language="javascript"><!-- hide from old browsers
function validate()
{
	if (document.form1.szID.value.length == 0)
	{
		alert("Please enter your user ID.");
		document.form1.szID.focus();
		return false;
	}
	else if (document.form1.szPassword.value.length == 0)
	{
		alert("Please enter your password.");
		document.form1.szPassword.focus();
		return false;
	}
	return true;
}
// done hiding -->
</script>
	<table width="150"  border="0" cellpadding="0" cellspacing="0">
	<tr valign="top">
		<td height="93" colspan="3" class="lefttop">&nbsp;	  </td>
	</tr>
	<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>
  <tr>
  <td colspan="3" align="center" style="padding-top:10px;">
  <?
  
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
                <input onMouseOver="this.src='img/but_logout_2.gif'" onClick="location.replace('mem/logout.php')" onMouseOut="this.src='img/but_logout_2.gif'" type="image" src="img/but_logout_2.gif" name="I1">
                <br>&nbsp;
                </td>
                </tr>
               <?
		if($user_type=='1')
		{
			include ("mem/internal-adminmenu-fromoutside.php");
        }
		else
		{ 
			include ("mem/internal-memmenu-fromoutside.php");
		}
			   }
			   else
			   {
			   ?>
               <form name="form1" method="post" action="" onSubmit="return validate()">
	<input type="hidden" name="c" value="1">
	<tr>
	  <td width="15" align="left">&nbsp;</td>
	  <td width="116" align="left" valign="top" class="leftlogin1"><img src="img/t/leftlogin.gif" width="37" height="13" vspace="10"></td>
	  <td width="19">&nbsp;</td>
	</tr>
	<tr>
		<td align="left">&nbsp; </td>
		<td align="left" valign="top">			User ID: <br>
	  <input name="szID" type="text" id="szID" size="14" maxlength="20" accesskey="u" style="width:8em;"></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" align="left">&nbsp;</td>
	</tr>
	<tr>
		<td align="left">&nbsp;</td>
		<td align="left" valign="top">Password:<br>
		<input name="szPassword" type="password" id="szPassword" size="15" maxlength="20" accesskey="p" style="width:8em;"></td>
		<td>&nbsp;</td>
	</tr>
    <tr>
		<td colspan="3" align="left">&nbsp;</td>
	</tr>
	<tr>
		<td align="left">&nbsp;</td>
		<td align="left" valign="top"><input type="checkbox" name="remember"> Remember me</td>
		<td>&nbsp;</td>
	</tr>
    <!--tr>
		<td colspan="3" align="left">&nbsp;</td>
	</tr>
    <tr>
		<td align="left">&nbsp;</td>
		<td align="left" valign="top"><input type="checkbox" name="remember"> Remember me</td>
		<td>&nbsp;</td>
	</tr-->
	<tr>
		<td colspan="3" align="left">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="center" valign="top"><!--a href="javascript:Login()" onMouseOver="MM_swapImage('login','','img/but_leftlogin_2.gif',0)" onMouseOut="MM_swapImgRestore()"><img src="img/but_leftlogin_1.gif" name="login" width="56" height="18" border="0" id="login"></a-->
		<input type="image" src="img/but_leftlogin_1.gif" onMouseOver="this.src='img/but_leftlogin_2.gif'" onMouseOut="this.src='img/but_leftlogin_1.gif'">
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
	  <td colspan="3"><p>&nbsp;</p>
      </td>
	</tr>
	<tr>
	  <td colspan="3" height="3" class="leftdecline"><spacer type="block" height="3"></spacer></td>
	  </tr>
	</form>
    <?
	}
	?>
    </table>
	


	<table width="150"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="150" colspan="3" valign="top">      

<!-- Web counter - begin -->
        <center> 
<!-- counterdata Code START -->
<img style="padding-top:10px" src="/cgi-sys/Count.cgi?df=ardmorep.dat|display=Counter|ft=2|md=6|frgb=100;139;216|dd=B"> 
        </center>
        <!-- Web counter - end -->


		<br>
</td>
      </tr>
      <tr>
        <td colspan="3" height="3" class="leftdecline"><spacer type="block" height="3"></spacer></td>
      </tr>
      <tr>
        <td colspan="3" height="3" class="leftdecline" align="center"><br><br> 
The Management Corporation Strata Title Plan No. 2645<br><br><strong>Ardmore Park</strong><br><br>
13 Ardmore Park #01-01<br>Singapore 259961<br><br>Tel: 6733 0862<br>Fax: 6733 0872
</td>
      </tr>
       
    </table>
	</td>
    <td width="29" height="20" align="left" valign="top" class="ctrleft"><img src="img/ctrrgttop.gif" width="29" height="82"></td>
    <td valign="top" class="ctr"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="82" valign="bottom" class="ctrtop"><img src="img/t/sg.gif" width="398" height="37"></td>
      </tr>
      <tr>
        <td class="content"><p><img src="img/home2.jpg" width="137" height="344" hspace="10" vspace="12" align="left"><br>
Ardmore Park redefines modern luxury living with a stylish lavishness and exclusive address that is the definitive residence for the well established. The sprawling 8 acres make Ardmore Park one of the largest freehold sites in a prime residential location in Singapore and it is set on high land enjoying island wide views.</p>
            <p>Located at the most prestigious address in Singapore, Ardmore Park is designed to have a classic and enduring quality with three elegant 30-storey towers and a separate 2-storey grand clubhouse. </p>
            <p>Designed in contemporary style, each tower block comprises 28 floors of 4 identical apartments of 268 sq m each on every level and 2 penthouses on the 29th floor, all served internally by a private lift. All residences have an exceptionally high floor to ceiling height and are designed with full height windows to maximize enjoyment of the peaceful and revitalizing landscape grounds and island wide views.</p>
            <p>The main entrance and private lift lobbies have been designed on a grand scale complete with exquisite marble finishing. The beauty of the lobbies is further enhanced by an extensive collection of original art pieces, both paintings and ceramic works by renowned artists and sculptors. </p>
            <p>The two basement car parks are designed to provide generous and ample parking spaces for residents and visitors. </p>
            <p>The luscious and matured landscaping areas create a welcome tropical ambience for the estate. All parts of the gardens are well lit at night using attractively designed light fittings that are discretely positioned. Many sculptures and ornamental pots are scattered at strategic locations making the landscape gardens a special art piece by itself. </p>
            <p>A full range of facilities - large swimming pool, open Jacuzzi and children pool lined with light coloured mosaic patterns, giving a clear aquamarine colour with a generous deck area all paved in warm-toned sandstones, a fully equipped gymnasium, two function rooms with a fully equipped kitchen, two tennis courts, saunas, multi-purpose court, fitness corner, 3-tier koi pond, fully equipped BBQ facility, a children’s playground and storage lockers complete the epitome of a well designed development such as Ardmore Park. </p>
          <p>High priority is placed on security at Ardmore Park. Over 35 highly trained in-house security officers are employed in addition to strategically located cameras to provide round the clock surveillance ensure a safe and secure environment for the residents in Ardmore Park. </p>
</td>
      </tr>
    </table></td>
    <td width="29" align="right" valign="top" class="ctrrgt"><img src="img/ctrrighttop.gif" width="29" height="82"></td>
  <td width="163" valign="top"><p>&nbsp;</p>
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><a href="walkthrough.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>"><img src="img/rgtvirtual.jpg" width="163" height="132" border="0"></a></td>
        </tr>
        <tr>
          <td><a href="gallery.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>"><img src="img/rgtphotol.jpg" width="163" height="141" border="0"></a></td>
        </tr>
        <tr>
          <td><a href="facsiteplan.php<?php 
  if (isset($_SESSION['basic_is_logged_in']) && isset($_GET['crypted']))
  {
  ?>?crypted=<? echo $_GET['crypted']; } ?>"><img src="img/rgtplan.jpg" width="163" height="137" border="0"></a></td>
        </tr>
    </table>
  <img src="img/BCAGreenMarkLogoEDIT.jpg" alt="" width="163" height="132" border="0" /></td>
  </tr>
  <tr>
    <td background="img/leftbotbg.gif"><spacer type="block" height="20"></td>
  <td align="left" valign="top" background="img/ctrbotctr.gif"><img src="img/ctrleftbot.gif" width="29" height="20"></td>
  <td valign="top" class="ctrbot">&nbsp;</td>
  <td align="right" valign="top" background="img/ctrbotctr.gif"><img src="img/ctrrgtbot.gif" width="29" height="20"></td>
  <td valign="top">&nbsp;</td>
  </tr>
</table>
<?php include("footer.php"); ?>
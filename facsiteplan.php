<?
session_start();
include_once("mem/includes/config.php");
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
	
	if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
	{

//	 echo "<script type=text/javascript language=javascript> window.location.href = '../login.php?ops=2'; <//script> ";
		//	exit;
	}	
?>	
<? include ("header.php"); ?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="8" rowspan="3" align="left" valign="top">&nbsp;</td>
    <td colspan="4" align="left" valign="top" class="topspace"><spacer type="block"></spacer></td>
  </tr>
  <tr>
    <td width="150" align="left" valign="top" background="img/leftctrbg2.gif" class="left"><link rel=stylesheet type="text/css" href="textset.css">
<table width="150"  border="0" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td height="93" class="lefttop">&nbsp;</td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
</td>
    <td width="29" height="20" align="left" valign="top" class="ctrleft"><img src="img/ctrrgttop.gif" width="29" height="82"></td>
    <td align="left" valign="top" class="ctr"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="82" valign="bottom" class="ctrtop"><img src="img/t/siteplan.gif" width="355" height="33"></td>
        </tr>
      </table>
        <span class="copyright2">Click on the text of the picture to show the facilities picture.</span><br>
        <link rel=stylesheet type="text/css" href="textset.css">
<table width="470" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="470" colspan="2" valign="bottom"><img src="img/sitemap.jpg" width="470" height="380" border="0" usemap="#fac2"></td>
  </tr>
</table>
<p>
  <map name="fac2">
    <area shape="rect" coords="116,142,213,157" href="javascript:void(0);" alt="North Function Room" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','show','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="223,173,263,189" href="javascript:void(0);" alt="Swimming Pool" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','show','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="69,213,140,243" href="javascript:void(0);" alt="Multi-purpose Facility" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','show','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="120,183,217,198" href="javascript:void(0);" alt="South Function Room" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','show','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="375,168,426,199" href="javascript:void(0);" alt="Fitness Corner" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','show','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="283,124,354,148" href="javascript:void(0);" alt="Tennis Court" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','show','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="201,116,250,141" href="javascript:void(0);" alt="Koi Pond" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','show','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="263,177,319,202" href="javascript:void(0);" alt="Children Pool" onClick="MM_showHideLayers('children','','show','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="103,160,169,174" href="javascript:void(0);" alt="Club House" onClick="MM_showHideLayers('children','','hide','clubhouse','','show','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="173,161,200,176" href="javascript:void(0);" alt="Gym" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','show','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="144,78,214,105" href="javascript:void(0);" alt="Play Area" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','show','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="212,247,283,266" href="javascript:void(0);" alt="Water Feature" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','show','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
    <area shape="rect" coords="214,157,280,174" href="javascript:void(0);" alt="Swimming Pool" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','show','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')">
          <area shape="rect" coords="172,57,237,72" href="javascript:void(0);" alt="Barbeque Pit" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','show')" />
  </map>
  <script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->
  </script></p>
<div id="children" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/children.jpg); layer-background-image: url(img/fac/children.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="clubhouse" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/clubhouse.jpg); layer-background-image: url(img/fac/clubhouse.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="fitness" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/fitness.jpg); layer-background-image: url(img/fac/fitness.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="gym" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/gym.jpg); layer-background-image: url(img/fac/gym.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="function" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/function.jpg); layer-background-image: url(img/fac/function.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="koipond" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/koi.jpg); layer-background-image: url(img/fac/koi.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="multi" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/multi.jpg); layer-background-image: url(img/fac/multi.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="playarea" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/playarea.jpg); layer-background-image: url(img/fac/playarea.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="swim" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/swimming.jpg); layer-background-image: url(img/fac/swimming.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="tennis" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/tennis.jpg); layer-background-image: url(img/fac/tennis.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="waterfeature" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/water.jpg); layer-background-image: url(img/fac/water.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="locfunction" style="position:absolute; width:333px; height:250px; z-index:2; left: 250px; top: 250px; visibility: hidden; background-image: url(img/fac/loc_function.jpg); layer-background-image: url(img/fac/loc_function.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="loctennis1" style="position:absolute; width:333px; height:250px; z-index:2; left: 250px; top: 250px; visibility: hidden; background-image: url(img/fac/loc_tennis1.jpg); layer-background-image: url(img/fac/loc_tennis1.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="loctennis2" style="position:absolute; width:333px; height:250px; z-index:2; left: 250px; top: 250px; visibility: hidden; background-image: url(img/fac/loc_tennis2.jpg); layer-background-image: url(img/fac/loc_tennis2.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

<div id="northfunction" style="position:absolute; width:333px; height:250px; z-index:2; left: 250px; top: 250px; visibility: hidden; background-image: url(img/fac/loc_northfunction.jpg); layer-background-image: url(img/fac/loc_northfunction.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>
<div id="southfunction" style="position:absolute; width:333px; height:250px; z-index:2; left: 250px; top: 250px; visibility: hidden; background-image: url(img/fac/loc_southfunction.jpg); layer-background-image: url(img/fac/loc_southfunction.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>
<div id="barbeque" style="position:absolute; width:333px; height:250px; z-index:2; left: 620px; top: 340px; visibility: hidden; background-image: url(img/fac/barbeque.jpg); layer-background-image: url(img/fac/barbeque.jpg); border: 1px none #000000;">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="right"><a href="javascript:void(0);" onClick="MM_showHideLayers('children','','hide','clubhouse','','hide','fitness','','hide','gym','','hide','function','','hide','koipond','','hide','multi','','hide','playarea','','hide','swim','','hide','tennis','','hide','waterfeature','','hide','locfunction','','hide','loctennis1','','hide','loctennis2','','hide','northfunction','','hide','southfunction','','hide','barbeque','','hide')"><img src="img/fac/close.gif" width="58" height="24" hspace="1" vspace="1" border="0"></a></td>
    </tr>
  </table>
</div>

  
</td>
    <td width="29" align="right" valign="top" class="ctrrgt"><img src="img/ctrrighttop.gif" width="29" height="82"></td>
  </tr>
  <tr>
    <td background="img/leftbotbg.gif"><spacer type="block" height="20"></td>
    <td align="left" valign="top" background="img/ctrbotctr.gif"><img src="img/ctrleftbot.gif" width="29" height="20"></td>
    <td valign="top" class="ctrbot">&nbsp;</td>
    <td align="right" valign="top" background="img/ctrbotctr.gif"><img src="img/ctrrgtbot.gif" width="29" height="20"></td>
  </tr>
</table>
<? include ("footer.php"); ?>
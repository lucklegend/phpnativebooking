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
<script language="javascript"><!-- hide from old browers

function add()
{
	location.href = "circular-new.php?crypted=<? echo $_GET['crypted']; ?>";
}

function update(x)
{
	location.href = "circular-edit.php?crypted=<? echo $_GET['crypted']; ?>&code=" + x;
}

function del()
{
	var code = "";
	var elements = document.form1.getElementsByTagName("input");
	for (i = 0; i < elements.length; i ++)
	{
		if (elements[i].type == "checkbox" && 
			elements[i].name != "xAll" &&
			elements[i].checked)
		{
			//if (code != "")	code += ",";
			code += elements[i].value + ",";
		}
	}

	if (code.length == 0)
	{
		alert("Please select a bulletin to delete.");
		return;
	}
	
	if (confirm("Do you really want to delete the bulletins?"))
	{
		document.form1.action = "circular-del.php?crypted=<? echo $_GET['crypted']; ?>&code=" + code;
		document.form1.code.value = code;
		document.form1.submit();
	}
}

function selectAll()
{
	bState = document.form1.xAll.checked;
	var elements = document.form1.getElementsByTagName("input");
	for(i = 0; i < elements.length; i++)
	{
		if (elements[i].type == "checkbox")
			elements[i].checked = bState;
	}
}

function toggleAll( checkbox )
{
	if (!checkbox.checked)
		document.form1.xAll.checked = checkbox.checked;
}

function ChangeSection()
{
	location.href = "circular.php?crypted=<? echo $_GET['crypted']; ?>&section=" + document.form1.section.options[document.form1.section.selectedIndex].value;
}
// done hiding -->
</script>
<? 

$category = $_GET['section'];
?>

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
						<td vAlign="top" align="middle"> <?php 
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
                    &nbsp;</td>
					</tr>
                     <? include ("internal-adminmenu.php"); ?>
		
					<tr>
						<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top" align="left">
        <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="25" src="img/t/bulletin.gif" width="91"></td>
			</tr>
		</table>
		<form name="form1" method="post">
			<!-- id code for news --><input type="hidden" name="code">
			<table cellSpacing="0" cellPadding="5" width="100%" border="0" id="table8">
				<tr>
					<td class="bk3" align="right" colSpan="6">
					<table cellSpacing="0" cellPadding="0" width="100%" id="table9">
						<tr>
							<td align="right" width="20%">
							<select onchange="ChangeSection()" name="section">
							<option value="" <? if ($category == "") echo "selected"; ?>>All</option>
							<option value="Circulars" <? if ($category == "Circulars") echo "selected"; ?>>Circulars</option>
							<option value="Community News" <? if ($category == "Community News") echo "selected"; ?>>Community News
							</option>
							</select> &nbsp; </td>
							<td align="left" width="30%">
							<a href="javascript:ChangeSection()">
							<img height="23" alt="go" src="img/but_gotitle1.gif" width="25" border="0"></a></td>
							<td align="right" width="50%">
							<a accessKey="a" href="javascript:add()">
							<img height="23" alt="add" src="img/but_addtitle1.gif" width="47" border="0"></a>
							<a accessKey="d" href="javascript:del()">
							<img height="23" alt="delete" src="img/but_deletetitle1.gif" width="47" border="0"></a>
							<a accessKey="m" href="admin.php?crypted=<? echo $_GET['crypted']; ?>">
							<img height="21" alt="main page" src="img/but_main1.gif" width="62" border="0"></a> 
							</td>
						</tr>
					</table>
					</td>
				</tr>
				<tr>
					<td class="bk" width="4%">
					<input onclick="selectAll()" type="checkbox" name="xAll"></td>
					<td class="bk" width="2%">
					<img height="16" src="img/clip.gif" width="16"></td>
					<td class="bk" width="10%"><span class="bold">Date</span></td>
					<td class="bk" width="15%"><span class="bold">Section</span></td>
					<td class="bk" width="24%"><span class="bold">Heading</span></td>
				  <td class="bk" width="45%"><span class="bold">Contents</span></td>
				</tr>
                <?
					if (($_GET['section'] != ""))
					{
						$categorysql = "SELECT * FROM circular WHERE section = '$_GET[section]' ORDER BY date_start ASC";
					}
					else
					{
						$categorysql = "SELECT * FROM circular ORDER BY date_start ASC";
					}
					$catresult = mysql_query($categorysql);
					
					$catresultamt = mysql_num_rows($catresult);
					if ($catresultamt == 0)
					{
					?>
				<tr vAlign="top">
					<td class="bk2" colspan="6">
					No bulletin at this time.</td>
				</tr>
                <? } 
				$i = 1;
					while ($catrow = mysql_fetch_assoc($catresult))
					{
					if ($i%2 == 0)
					{
						$bk = "bk2";
					}
					else
					{
						$bk = "bk4";
					}?>
				<tr vAlign="top">
					<td class="<? echo $bk; ?>">
					<input onclick="toggleAll(this)" type="checkbox" value="<? echo $catrow['id']; ?>" name="C<? echo $i; ?>"></td>
					<td class="<? echo $bk; ?>"><a href="<? echo $catrow['attachment']; ?>" target="_blank"><img src="img/clip.gif" border="0"></a></td>
					<td class="<? echo $bk; ?>"><? echo $catrow['date_start']; ?></td>
					<td class="<? echo $bk; ?>"><? echo $catrow['section']; ?></td>
					<td class="<? echo $bk; ?>"><a href="javascript:update('<? echo $catrow['id']; ?>')">
					<? echo $catrow['title']; ?></a></td>
					<td class="<? echo $bk; ?>"><? if ($catrow['contents'] != '') { echo $catrow['contents']; } else { echo "&nbsp;"; } ?></td>
				</tr>
                <? $i++;
					}
					 ?>
			</table>
			<br>
&nbsp;</form>
		<p>&nbsp;</td>
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
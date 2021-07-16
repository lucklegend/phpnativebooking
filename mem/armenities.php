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
if(isset($_POST[szID]))
{
	$query  = "SELECT * FROM user_account  where username = '$_POST[szID]' and password = '$_POST[szPassword]' and active = '1'";
	$result = mysql_query($query) or die(mysql_error()) ;
	
	$count = mysql_num_rows($result);
	
	if($count != '0' )
	{
 		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
 		{
    		
			$id = $row['id'];
			$crypted = $row['crypt'];
		 	$_SESSION['basic_is_logged_in'] = "$id";
			include_once('random_char.php');
			$query = "update user_account set crypted = '$pwd' where id = '$id' limit 1";
			$result = mysql_query($query) or die(mysql_error()) ; 
			echo "<script type=text/javascript language=javascript> window.location.href = 'mem/index.php?crypted=$pwd'; </script> ";
			
		
		}
	}
	else
	{
			//die ();
			echo "<script type=text/javascript language=javascript> window.location.href = 'login.php?ops=1'; </script> ";
			exit;
	}


}




 ?>
<? include ("../headermem.php"); ?>
<script language="javascript"><!-- hide from old browsers
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
function ChangeCat()
{
	location.href = "armenities.php?crypted=<? echo $_GET['crypted']; ?>&cat=" + document.form1.cat.options[document.form1.cat.selectedIndex].value;
}


function edit(x)
{
	location.href = "armenities-edit.php?crypted=<? echo $_GET['crypted']; ?>&code="+x;
}

function add()
{
	document.form1.action = "armenities-new.php?crypted=<? echo $_GET['crypted']; ?>";
	document.form1.code.value = "";
	document.form1.submit();
}

function update(x)
{
	document.form1.action = "armenities-edit.php?crypted=<? echo $_GET['crypted']; ?>&code="+x;
	document.form1.code.value = x;
	document.form1.submit();
}

function del()
{
	code = "";
	var elements = document.form1.getElementsByTagName("input");
	for (i = 0; i < elements.length; i ++)
	{
		if (elements[i].type == "checkbox" && 
			elements[i].name != "xAll" &&
			elements[i].checked)
		{
			//if (code != "")
			//	code += ",";
			code += elements[i].name += ",";
		}
	}

	if (code.length == 0)
	{
		alert("Please select an item to delete.");
		return;
	}
	
	document.form1.action = "armenities-del.php?crypted=<? echo $_GET['crypted']; ?>&code="+code;
	document.form1.code.value = code;
	if (confirm("Do you really want to delete the item(s)?"))
	{
		document.form1.submit();
	}
}

// end hiding -->
</script>
<? $cat = $_GET['cat']; ?>

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
                   <input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.php')" onmouseout="this.src='img/but_logout_2.gif'" type="image" src="img/but_logout_2.gif" name="I1">
                    <br>
                    &nbsp;
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <? include ("internal-adminmenu.php"); ?>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr>
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top" align="left">
        <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img src="img/t/amenities.gif"></td>
			</tr>
		</table>
		<form name="form1" method="post">
			<input type="hidden" name="code">
			<input type="hidden" value="amenity" name="ty">
			<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table8">
				<tr vAlign="bottom">
					<td class="bk3" vAlign="bottom" colSpan="4">
					<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table9">
						<tr>
							<td align="right" width="17%"><select onChange="ChangeCat()" name="cat">
                            <option value="-1" selected>View All</option>
                              <? $categorysql = "SELECT title FROM categories ORDER BY title ASC";
							  	 $catresult = mysql_query($categorysql);
								 while ($catrow = mysql_fetch_array($catresult))
								 {
							   ?>
                              <option value="<? echo $catrow['title']; ?>" <? if ($catrow['title'] == $cat) { echo "selected"; } ?>><? echo $catrow['title']; ?></option>
                              <? } ?>
                            </select></td>
					    <td width="33%"><a href="armenities.php?crypted=<? echo $_GET['crypted']; ?>">
							<img height="23" alt="go" src="img/but_gotitle1.gif" width="25" border="0"></a></td>
							<td align="right">
							<a accessKey="a" href="armenities-new.php?crypted=<? echo $_GET['crypted']; ?>">
							<img height="23" alt="add" src="img/but_addtitle1.gif" width="47" border="0"></a>
							<a accessKey="d" href="javascript:del();">
							<img height="23" alt="delete" src="img/but_deletetitle1.gif" width="47" border="0"></a>
							<a accessKey="m" href="admin.php?crypted=<? echo $_GET['crypted']; ?>">
							<img height="21" alt="main page" src="img/but_main1.gif" width="62" border="0"></a>							</td>
						</tr>
					</table>
				  </td>
				</tr>
				<tr align="left">
					<td class="bk" vAlign="top" width="3%">
					<input onclick="selectAll()" type="checkbox" name="xAll"></td>
					<td class="bk" vAlign="top" width="32%"><span class="bold">
					Name</span></td>
					<td class="bk" vAlign="top" width="12%"><span class="bold">
					Tel</span></td>
					<td class="bk" vAlign="top" width="53%"><span class="bold">
					Address</span></td>
				</tr>
				<?
					$categorysql = "SELECT title FROM categories ORDER BY title ASC LIMIT 1";
					$catresult = mysql_query($categorysql);
					$catrow = mysql_fetch_array($catresult);
					
					$showcatsql = "SELECT id, display_name, telephone, address FROM armenities";
					if ($cat == '' || $cat == '-1')
					{
						//$cat = $catrow['title'];
					}
					else
					{
						$cat = $_GET['cat'];
						$showcatsql .= " WHERE category = '$cat'";
					}
					$showcatsql .= " ORDER BY display_name ASC";

					$catresult = mysql_query($showcatsql);
					$catresultamt = mysql_num_rows($catresult);
					if ($catresultamt == 0)
					{
					?>
				<tr align="left">
					<td class="bk2" colspan="4" vAlign="top">No amenities found under this category</td>
				</tr>                    
                    <?
					}
					$i = 1;
					while ($catrow = mysql_fetch_array($catresult))
					{	  
					if ($i%2 == 0)
					{
						$bk = "bk2";
					}
					else
					{
						$bk = "bk4";
					}
					
				?><tr align="left">
					<td class="<? echo $bk; ?>" vAlign="top">
					<input type="checkbox" name="<? echo $catrow['id']; ?>"></td>
					<td class="<? echo $bk; ?>" vAlign="top">
					<a href="javascript:update('<? echo $catrow['id']; ?>')"><? echo $catrow['display_name']; ?></a></td>
					<td class="<? echo $bk; ?>" vAlign="top"><? echo $catrow['telephone']; ?></td>
					<td class="<? echo $bk; ?>" vAlign="top"><? echo $catrow['address']; ?></td>
				</tr>
                <? 
					$i++;
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
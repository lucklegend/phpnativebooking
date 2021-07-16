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
if(isset($_POST['addnew']))
{
	
	$description = $_POST['description'];
	//$morecategory = explode(",", $category);
	$tel = $_POST['tel'];
	$fax = $_POST['fax'];
	$mobile = $_POST['mobile'];
	$contact = $_POST['contact'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$url = $_POST['url'];
	
	$query = "INSERT INTO useful_info(category, telephone, mobile, fax, display_name, address, url,contact) VALUES ('$description', '$tel', '$mobile', '$fax', '$name', '$address', '$url','$contact')";
	$result = mysql_query($query) or die(mysql_error()) ; 
		
	echo "<script type=text/javascript language=javascript> window.location.href = 'useful-new.php?crypted=" . $_GET['crypted'] . "'; </script> ";

}




 ?>
<? include ("../headermem.php"); ?>
<script language="javascript"><!-- hide from old browsers
function enable()
{
	// enable update button if applicable
}

function addCat(x)
{
	y = document.form1.category.options.length;
	z = "";
	if (x.options)
		z = x.options[x.selectedIndex].value;
	else
	{
		z = document.form1.newcategory.value;
		if (z == "")
		{
			alert("Please provide a cateogry name.");
			document.form1.newcategory.focus();
			return;
		}
	}
	for(i=0; i < y; i++)
	{
		if (document.form1.category.options[i].value == z)
			return;
	}
	document.form1.category.options[y] = new Option(z,z);

	if (!x.options)
	{
		document.form1.newcategory.value = "";
		document.form1.newcategory.focus();
	}
	enable();
}

function delSelected(x)
{
	x.options[x.selectedIndex] = null;
	enable();
}

function validate()
{
	if (document.form1.category)
	{
		if (document.form1.category.options.length == 0)
		{
			alert("Please indicate a cateogry.");
			document.form1.newcategory.focus();
			return false;
		}
		// consolidate categories
		var temp = "";
		for(i = 0; i < document.form1.category.options.length; i++)
		{
			temp += document.form1.category.options[i].value + ",";
		}
		document.form1.cat.value = temp;
	}

	if (document.form1.display_name.value.length == 0)
	{
		alert("Please provide a name.");
		document.form1.display_name.focus();
		return false;
	}

	return true;
}

function count(x,maxLength)
{
	var count = x.value.length;
	if (count > maxLength)
	{
		x.value = x.value.substring(0,maxLength);
		count = maxLength;
	}
	enable();
}
// done hiding-->
</script>
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
				<img src="http://www.axonprojects.com/ardmorepark/v2/mem/img/t/usefulinfo.gif"></td>
			</tr>
		</table>
		<form name="form1" onSubmit="return validate()" method="post" action="useful-new.php?crypted=<? echo $_GET['crypted']; ?>">
			<input type="hidden" name="code">
			<input type="hidden" value="useful info" name="ty">
			<input type="hidden" name="cat">
			<table cellSpacing="0" cellPadding="0" align="left" border="0" id="table8">
				<tr>
					<td class="bk" vAlign="top" width="125">Type of Services: </td>
					<td class="bk2rbdr" vAlign="top" colSpan="2">
					<textarea onkeyup="count(this,200)" style="WIDTH: 27.6em" name="description" rows="3" cols="15"></textarea>
					<br>
					<span class="copyright2">max 200 characters</span> </td>
				</tr>
				<tr>
					<td class="bk">Office Tel No:</td>
					<td class="bk2rbdr">
					<input class="txt1" id="tel" onkeydown="enable()" maxLength="20" name="tel"></td>
				</tr>
				<tr>
					<td class="bk">Fax:</td>
					<td class="bk2rbdr">
					<input class="txt1" id="fax" onkeydown="enable()" maxLength="20" name="fax"></td>
				</tr>
				<tr>
					<td class="bk">Mobile No: </td>
					<td class="bk2rbdr">
					<input class="txt1" id="mobile" onkeydown="enable()" maxLength="200" name="mobile"></td>
				</tr>
				<tr>
					<td class="bk">Person In-charge : </td>
					<td class="bk2rbdr">
					<input class="txt1" id="contact" onkeydown="enable()" style="WIDTH: 29em" maxLength="200" name="contact"></td>
				</tr>
				<tr>
					<td class="bk">Name of Contractor:</td>
					<td class="bk2rbdr" colSpan="2">
					<input id="name" onkeydown="enable()" style="WIDTH: 29em" maxLength="50" name="name"></td>
				</tr>
				<tr>
					<td class="bk" vAlign="top">Address:</td>
					<td class="bk2" colSpan="2">
					<textarea onkeydown="enable()" style="WIDTH: 27.6em" name="address" rows="3" cols="20"></textarea></td>
				</tr>
				<tr>
					<td class="bk">Website:</td>
					<td class="bk2" colSpan="2">
					<input class="txt1" id="url" onkeydown="enable()" maxLength="200" name="url"></td>
				</tr>
				<tr align="middle">
					<td class="b3" colSpan="3"><br>
					<input type="submit" style="cursor:hand;width:55px;height:34px;border:0;background-image: url(img/but_add1.gif);background-color:#FDF5E1; background-repeat:no-repeat;" name="addnew" value="">
					<a href="javascript:location.replace('useful.php?crypted=<? echo $_GET['crypted']; ?>');">
					<img height="30" src="img/but_cancel1.gif" width="65" border="0"></a><br>
&nbsp;</td>
				</tr>
			</table>
			<br>
&nbsp;</form></td>
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
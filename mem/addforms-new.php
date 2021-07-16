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
	
	$description = $_POST['title'];
	$uploaddir = "forms";
	//$max_size = "500000";
	//$max_width = "227";
	//$max_height = "72";

	//	$user_id 	= $userdata['user_id'];
	//	$user_name	= $userdata['username'];
		$allowed_ext = "doc, pdf";
			//This kills spaces in user name
	//	$killme			= array(" ");
	//		$user_name = str_replace($killme, "", $user_name);
	//		$new_name	= $user_id . $user_name . "." . $allowed_ext;
		
		// UPLOAD CODE BEGINS
		$extension = pathinfo($_FILES['attachment']['name']);
		$extension = $extension[extension];
		$allowed_paths = explode(", ", $allowed_ext);

		for($i = 0; $i < count($allowed_paths); $i++)
		{
			if ($allowed_paths[$i] == "$extension")
			{
			$ok = "1";
			}
		}

		// IF EXTENSION IS GIF
		if ($ok == "1")
		{
			// CHECK FILESIZE
		//	if($_FILES['attachment']['size'] > $max_size)
		//	{
		//	print "File size is too big!";
		//	}

			//echo "here";
			//exit;
			// CHECK W + H
	//		if ($max_width && $max_height)
		//	{
		//	list($width, $height, $type, $w) = getimagesize($_FILES['file']['tmp_name']);

//				if($width > $max_width || $height > $max_height)
	//			{
	//			print "File height and/or width are too big!";
	//			}
		//	}

			// THIS WHERE UPLOAD BEGINS
			if(is_uploaded_file($_FILES['attachment']['tmp_name']))
			{
				//MOVE TO DIR
				move_uploaded_file($_FILES['attachment']['tmp_name'],$uploaddir.'/'.$_FILES['attachment']['name']);
				//FILE RENAME
				
				$new_name = $_FILES['attachment']['name'];
				rename($uploaddir.'/'.$_FILES['attachment']['name'], $uploaddir.'/'.$new_name );
			}
			// to check if the file has been uploaded successfully
			//print "Your file has been uploaded successfully! Yay!";
			$new_name = "forms/" . $new_name;
			$date_updated = date("d-m-Y");
			
			// UPDATE DB
	$query = "INSERT INTO forms (description, attachment, date_updated) VALUES ('$description', '$new_name', '$date_updated')";
	mysql_query($query);
	
	echo "<script type=text/javascript language=javascript> window.location.href = 'addforms.php?crypted=" . $_GET['crypted'] . "'; </script> ";

	}
}



 ?>
<? include ("../headermem.php"); ?>
<script language="javascript"><!-- hide from old browsers
function enable()
{
	//document.form1.but1.disabled = false;
}
function removeFile()
{
	document.form1.remove.value = "1";
	
	if (document.getElementById)
	{
		var layer1 = document.getElementById("layer1");
		var layer2 = document.getElementById("layer2");
		layer1.style.visibility = "hidden";
		layer1.style.display = "none";
		layer2.style.visibility = "visible";
		layer2.style.display = "block";
		
		enable();
	}
}
function validate()
{
	if (document.form1.title.value == "")
	{
		alert("Please provide a description for the application form.");
		document.form1.title.focus();
		return false;
	}
	return true;
}
// done hiding -->
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
						<td vAlign="top" align="middle" style="padding-top:10px;"><?php 
				 if($user_type=='1')
				 {
				 
				   echo "Welcome <i><b>Admin [$username]</b></i><br>";
				}else
				{
					 echo "Welcome <i><b>User [$username]</b></i><br>";
				
				}	
				?>	<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.php')" onmouseout="this.src='img/but_logout_2.gif'" type="image" src="img/but_logout_2.gif" name="I1">
						<br>
						&nbsp;</td>
					</tr>
					<tr>
						<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
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
				<img height="34" src="img/t/applciationforms.gif" width="198"></td>
			</tr>
		</table>
		<form name="form1" onSubmit="return validate()" method="post" encType="multipart/form-data" action="addforms-new.php?crypted=<? echo $_GET['crypted']; ?>">
			<table cellSpacing="0" cellPadding="0" align="left" border="0" id="table8">
				<tr>
					<td class="bk" width="100">Description</td>
					<td class="bk2">
					<input onKeyUp="enable()" style="width: 30.8em" maxLength="100" name="title"></td>
				</tr>
				<tr vAlign="top">
					<td class="bk">Attachment</td>
					<td class="bk2">
					<div id="layer1" style="display: none; visibility: hidden">
						<a href="http://www.ascengen.com/ardmorepark/forms/">
						<img align="absMiddle" border="0"></a>
						<input onClick="removeFile()" type="button" value="Remove">
						<input type="hidden" value="0" name="remove"></div>
					<div id="layer2">
						<input class="file" onClick="enable()" type="file" name="attachment">
						<span class="copyright2">Max file size 500KB.</span> 
					</div>
					</td>
				</tr>
				<tr vAlign="top" align="middle">
					<td colSpan="2" valign="top"><br><input type="submit" style="cursor:hand;width:55px;height:34px;border:0;background-image: url(img/but_add1.gif);background-color:#FDF5E1; background-repeat:no-repeat;" name="addnew" value="">
                    <a href="javascript:location.replace('addforms.php?crypted=<? echo $_GET['crypted']; ?>');">
					<img height="30" src="img/but_cancel1.gif" width="65" border="0"></a></td>
				</tr>
			</table>
			<p align="center">&nbsp;</p>
		</form>
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
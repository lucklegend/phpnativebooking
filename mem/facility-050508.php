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
			echo "<script type=text/javascript language=javascript> window.location.href = 'index.php?crypted=$pwd'; </script> ";
			
		
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
      </table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top" align="left"><table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				
          <td class="ctrtop" vAlign="bottom" height="82"> 
            <p><img height="37" src="img/t/managementoffice.gif" width="218"></p>
            </td>
			</tr>
		</table>
		
      <p><br>
      </p>
      <p>
        <?php
		$query = "select * from user_account  where active ='1' limit 1";
		$result = mysql_query($query);
		$user_acount= mysql_num_rows($result); //count no of user
		$query = "select * from user_account  where user_type = '0' and active ='1' limit 1";
		$result = mysql_query($query);
		$user_resident= mysql_num_rows($result); // count no of resident
		$query = "select * from user_account  where user_type = '1' and active ='1' limit 1";
		$result = mysql_query($query);
		$user_admin= mysql_num_rows($result); // count no of administrator
		$query = "select * from user_account  where user_type = '2' and active ='1' limit 1";
		$result = mysql_query($query);
		$user_club= mysql_num_rows($result); // count no of club
		
		
		if($_GET[page] =='')
		{
		?>
      <table width="28%" border="0" align="center">
        <tr>
          <td nowrap background="images/top_bar_17.gif" class="txtgrey" style="background-repeat:no-repeat">&nbsp;USERS LISTING</td>
        </tr>
        <tr>
          <td><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#F8E8A7">
              <tr>
                <td width="34%" class="lalpha">All User </td>
                <td width="17%">&nbsp;<?php echo $user_acount; ?></td>
                <td width="30%">Residents</td>
                <td width="19%">&nbsp;<?php echo $user_resident; ?></td>
              </tr>
              <tr>
                <td>Administrators</td>
                <td>&nbsp;<?php echo $user_admin; ?></td>
                <td>Club House</td>
                <td>&nbsp;<?php echo $user_club; ?></td>
              </tr>
            </table>
              <br>
              <br></td>
        </tr>
      </table>
      <?php
		
		}elseif((($_GET[page] =='user') || ($_GET[page] == 'manager')) and $user_type =='1')
		{
		?>
      <script type="text/javascript">
		<!--
		function toggle_visibility(id) {
		var e = document.getElementById(id);
		if(e.style.display == 'none')
		e.style.display = 'block';
		else
		e.style.display = 'none';
		}
		//-->
		</script>
      <?php 
		
		
		
		if(isset($_GET[dele]))
		{
		mysql_query("update user_account set active ='0' where id ='$_GET[dele]' limit 1");
		
		}
		
		
		$search_user_div = "display:none;";
			if(isset($_POST[user_type]))
			{
				if($_POST[username] =='')
				{
					$er = "<font color=red>Error : Username Can Not Be Blank</font>";
				
				}else
				{
				
					$query = "select username from user_account where username = '$_POST[username]' limit 1";
					$result = mysql_query($query);
					$count = mysql_num_rows($result);
					if($count =='1')
					{
					$er = "<font color=red>Error : Username Already Taken</font>";
					}
				
				}
				if($_POST[password] != $_POST[confpassword] or $_POST[password] =='' )
				{
				
				$er = "<font color=red>Error :Password Not Matching</font>";
				
				}
				
				if($er =='')
				{
			//	$style = "display:none;";
			mysql_query("insert into user_account (username,password,user_type,name,email,contact_no) value ('$_POST[username]','$_POST[password]','$_POST[user_type]','$_POST[name]','$_POST[email]','$_POST[contact]')") or die(mysql_error());
				
				}
			
			
			}else
			{
			
			$style = "display:none;";
			}
		
		if(isset($_GET[search]))
		{
		
		 $search_user_div = "";
		 $search_option = "and (username like '%$_GET[search]%' or name like '%$_GET[search]%' or email like '%$_GET[search]%')";
		}else
		{
			$search_option = "";
		
		}
		
		
		?>
      <DIV ID="PersonalInfo1" style="display:none">
        <table>
          <tr>
            <td>Street</td>
            <td>123 sr</td>
          </tr>
          <tr>
            <td>City</td>
            <td>LA</td>
          </tr>
          <tr>
            <td>State</td>
            <td>CA</td>
          </tr>
        </table>
      </DIV>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="3%" style="background-repeat:no-repeat"><div align="right"><img src="images/left_win_10.gif" width="21" height="30" border="0"></div></td>
          <td width="95%" background="images/middle_win_11.gif"><A href="#" onclick="toggle_visibility('add_user');"><font color="#FFFFFF">Add New   User</font></A> <span class="style1"> | </span> <A href="#" onclick="toggle_visibility('search_user');"> <font color="#FFFFFF">Search User</font> </A><span class="style1"> | </span></td>
          <td width="2%"><img src="images/right_win_14.gif" width="17" height="30"></td>
        </tr>
        <tr>
          <td colspan="3"><?php
	
	if(isset($_POST[edit_user]))
	{
	
		mysql_query("update user_account set username='$_POST[username]', password = '$_POST[password]', user_type ='$_POST[user_type_edit]', name = '$_POST[name]', email ='$_POST[email]',contact_no ='$_POST[contact]' where id = '$_POST[edit_user]' limit 1");
	
	
	}
	if(isset($_GET[edit]))
	{
		$query = "select * from user_account  where id = '$_GET[edit]' limit 1";
		$result = mysql_query($query);
		while($row=mysql_fetch_array($result))
		{
			$edit_username = $row[username];
			$edit_user_type = $row[user_type];
			$edit_name  = $row[name];
			$edit_email  = $row[email];
			$edit_contact_no = $row[contact_no];
			
		
		}
		
	
	?>
              <form name="form_edit" method="post" action="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=user" >
                <div align="center">
                  <input name="edit_user" type="hidden" value="<?php echo $_GET[edit]; ?>">
                </div>
                <table width="45%" border="1" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="100%" border="0" align="center">
                        <tr>
                          <td width="46%">User Type </td>
                          <td width="2%">:</td>
                          <td width="52%"><label>
                              <div align="left">
                                <select name="user_type_edit">
                                  <?php
					if($edit_user_type =='0')
					{
						$sel1 = "selected = selected";
					
					}elseif($edit_user_type =='1')
					{
					
					$sel2 = "selected = selected";
					
					}elseif($edit_user_type =='2')
					{
					
					$sel3 = "selected = selected";
					
					}
					
					?>
                                  <option value="0" <?php echo $sel1; ?>>Resident</option>
                                  <option value="1" <?php echo $sel2; ?>>Manager</option>
                                  <option value="2" <?php echo $sel3; ?>>Club</option>
                                </select>
                              </div>
                            </label></td>
                        </tr>
                        <tr>
                          <td>Username</td>
                          <td>&nbsp;</td>
                          <td><label>
                              <div align="left">
                                <input name="username" type="text" value="<?php echo $edit_username; ?>">
                              </div>
                            </label></td>
                        </tr>
                        <tr>
                          <td>Name </td>
                          <td>:</td>
                          <td><label>
                              <div align="left">
                                <input name="name" type="text" value="<?php echo $edit_name; ?>">
                              </div>
                            </label></td>
                        </tr>
                        <tr>
                          <td>Password</td>
                          <td>:</td>
                          <td><label>
                              <div align="left">
                                <input type="password" name="password">
                              </div>
                            </label></td>
                        </tr>
                        <tr>
                          <td>Confirmed Password </td>
                          <td>:</td>
                          <td><label>
                              <div align="left">
                                <input type="password" name="confpassword">
                              </div>
                            </label></td>
                        </tr>
                        <tr>
                          <td>Contact No. </td>
                          <td>:</td>
                          <td><label>
                              <div align="left">
                                <input type="text" name="contact" value="<?php echo $edit_contact_no ; ?>">
                              </div>
                            </label></td>
                        </tr>
                        <tr>
                          <td>E-mail</td>
                          <td>:</td>
                          <td><label>
                              <div align="left">
                                <input name="email" type="text" value="<?php echo $edit_email  ; ?>">
                              </div>
                            </label></td>
                        </tr>
                        <tr>
                          <td colspan="3"><label>
                              <div align="right">
                                <input type="reset" name="Submit2" value="Reset">
                                <input type="submit" name="Submit" value="update">
                              </div>
                            </label></td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
              </form>
            <?php
	}
	
	?>
              <div id="search_user" style=" <?php echo $search_user_div; ?>">
                <form name="form2" method="get" action="facility.php?crypted=<?php echo $_GET[crypted]; ?>">
                  <input name="crypted" type="hidden" value="<?php echo $_GET[crypted]; ?>">
                  <table width="45%" border="0" align="center">
                    <input name="page" type="hidden" value="user">
                    <tr>
                      <td width="47%">Search (Username / E-mail / Name) </td>
                      <td width="2%">:</td>
                      <td width="51%"><label>
                        <input name="search" type="text" value="<?php echo $_POST[search]; ?>">
                      </label></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="2"><label>
                        <input type="submit" name="Submit3" value="Search User">
                      </label></td>
                    </tr>
                  </table>
                </form>
              </div>
            <div id="add_user" align="right"  style=' <?php echo $style; ?> '>
              <table width="99%" border="0">
                  <tr>
                    <td bgcolor="#944542"><div align="left" ><span class="fontitle"><strong>Add New User </strong></span></div></td>
                  </tr>
                  <tr>
                    <td><form name="form1" method="post" action="" >
                        <div align="center">
                          <?php
	 
	 echo "$er";
	 
	 ?>
                        </div>
                      <table width="45%" border="1" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><table width="100%" border="0" align="center">
                                <tr>
                                  <td width="46%">User Type </td>
                                  <td width="2%">:</td>
                                  <td width="52%"><label>
                                      <div align="left">
                                        <select name="user_type">
                                          <option value="0" selected>Resident</option>
                                          <option value="1">Manager</option>
                                          <option value="2">Club</option>
                                        </select>
                                      </div>
                                    </label></td>
                                </tr>
                                <tr>
                                  <td>Username</td>
                                  <td>&nbsp;</td>
                                  <td><label>
                                      <div align="left">
                                        <input name="username" type="text" value="<?php echo $_POST[username]; ?>">
                                      </div>
                                    </label></td>
                                </tr>
                                <tr>
                                  <td>Name </td>
                                  <td>:</td>
                                  <td><label>
                                      <div align="left">
                                        <input name="name" type="text" value="<?php echo $_POST[name]; ?>">
                                      </div>
                                    </label></td>
                                </tr>
                                <tr>
                                  <td>Password</td>
                                  <td>:</td>
                                  <td><label>
                                      <div align="left">
                                        <input type="password" name="password">
                                      </div>
                                    </label></td>
                                </tr>
                                <tr>
                                  <td>Confirmed Password </td>
                                  <td>:</td>
                                  <td><label>
                                      <div align="left">
                                        <input type="password" name="confpassword">
                                      </div>
                                    </label></td>
                                </tr>
                                <tr>
                                  <td>Contact No. </td>
                                  <td>:</td>
                                  <td><label>
                                      <div align="left">
                                        <input type="text" name="contact">
                                      </div>
                                    </label></td>
                                </tr>
                                <tr>
                                  <td>E-mail</td>
                                  <td>:</td>
                                  <td><label>
                                      <div align="left">
                                        <input name="email" type="text" value="<?php echo $_POST[email]; ?>">
                                      </div>
                                    </label></td>
                                </tr>
                                <tr>
                                  <td colspan="3"><label>
                                      <div align="right">
                                        <input type="reset" name="Submit2" value="Reset">
                                        <input type="submit" name="Submit" value="Submit">
                                      </div>
                                    </label></td>
                                </tr>
                            </table></td>
                          </tr>
                        </table>
                    </form></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
            </div>
            <?php
			
			if(isset($_GET[sort_by]))
			{
			
			
			$more  = "order by $_GET[sort_by] $_GET[mode]";
			
			}
			if($_GET[mode] =='ASC' and $_GET[sort_by] == 'user_type')
			{
			
			$mode = "DESC";
			$user_type_image = "<img src=\"images/sort_up.jpg\" border=\"0\">";
			}elseif($_GET[mode] =='DESC' and $_GET[sort_by] == 'user_type')
			{
			$mode = "ASC";
			$user_type_image = "<img src=\"images/sort_down.jpg\" border=\"0\">";
			
			}else
			{
			$mode = "ASC";
			$user_type_image = "<img src=\"images/sort_down.jpg\" border=\"0\">";
			
			}
			if($_GET[mode] =='ASC' and $_GET[sort_by] == 'username')
			{
			
			$mode = "DESC";
			$username_image = "<img src=\"images/sort_up.jpg\" border=\"0\">";
			}elseif($_GET[mode] =='DESC' and $_GET[sort_by] == 'username')
			{
			$mode = "ASC";
			$username_image = "<img src=\"images/sort_down.jpg\" border=\"0\">";
			
			}else
			{
			$mode = "ASC";
			$username_image = "<img src=\"images/sort_down.jpg\" border=\"0\">";
			
			}
			if($_GET[mode] =='ASC' and $_GET[sort_by] == 'name')
			{
			
			$mode = "DESC";
			$name_image = "<img src=\"images/sort_up.jpg\" border=\"0\">";
			}elseif($_GET[mode] =='DESC' and $_GET[sort_by] == 'name')
			{
			$mode = "ASC";
			$name_image = "<img src=\"images/sort_down.jpg\" border=\"0\">";
			
			}else
			{
			$mode = "ASC";
			$name_image = "<img src=\"images/sort_down.jpg\" border=\"0\">";
			
			}
			if($_GET[mode] =='ASC' and $_GET[sort_by] == 'email')
			{
			
			$mode = "DESC";
			$email_image = "<img src=\"images/sort_up.jpg\" border=\"0\">";
			}elseif($_GET[mode] =='DESC' and $_GET[sort_by] == 'email')
			{
			$mode = "ASC";
			$email_image = "<img src=\"images/sort_down.jpg\" border=\"0\">";
			
			}else
			{
			$mode = "ASC";
			$email_image = "<img src=\"images/sort_down.jpg\" border=\"0\">";
			
			}
			if($_GET[mode] =='ASC' and $_GET[sort_by] == 'contact_no')
			{
			
			$mode = "DESC";
			$contact_no_image = "<img src=\"images/sort_up.jpg\" border=\"0\">";
			}elseif($_GET[mode] =='DESC' and $_GET[sort_by] == 'contact_no')
			{
			$mode = "ASC";
			$contact_no_image = "<img src=\"images/sort_down.jpg\" border=\"0\">";
			
			}else
			{
			$mode = "ASC";
			$contact_no_image = "<img src=\"images/sort_down.jpg\" border=\"0\">";
			
			}
			?>
            <?
			if ($_GET['page'] != 'manager')
			{
			?>
              <table width="99%" border="0" align="right" cellpadding="0" cellspacing="1">
                <tr>
                  <td bgcolor="#944542" class="txtgrey">&nbsp;User Listing </td>
                </tr>
                <tr>
                  <td><table width="99%" border="0" align="center">
                      <tr>
                        <td width="5%" bgcolor="#FFFFFF"><div align="center">Sno.</div></td>
                        <td width="10%" bgcolor="#FFFFFF"><div align="center">UserType</div></td>
                        <td width="2%" bgcolor="#FFFFFF"><div align="center"><a href="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=user&sort_by=user_type&mode=<?php echo $mode; ?>"><?php echo $user_type_image; ?></a></div></td>
                        <td width="10%" bgcolor="#FFFFFF"><div align="center">Username</div></td>
                        <td width="2%" bgcolor="#FFFFFF"><a href="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=user&sort_by=username&mode=<?php echo $mode; ?>"><?php echo $username_image; ?></a></td>
                        <td width="8%" bgcolor="#FFFFFF"><div align="center">Name</div></td>
                        <td width="2%" bgcolor="#FFFFFF"><a href="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=user&sort_by=name&mode=<?php echo $mode; ?>"><?php echo $name_image; ?></a></td>
                        <td width="20%" bgcolor="#FFFFFF"><div align="center">E-mail</div></td>
                        <td width="2%" bgcolor="#FFFFFF"><a href="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=user&sort_by=email&mode=<?php echo $mode; ?>"><?php echo $email_image; ?></a></td>
                        <td width="23%" bgcolor="#FFFFFF"><div align="center">Contact</div></td>
                        <td width="2%" bgcolor="#FFFFFF"><a href="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=user&sort_by=contact_no&mode=<?php echo $mode; ?>"><?php echo $contact_no_image; ?></a></td>
                        <td width="14%" bgcolor="#FFFFFF" ><div align="center">Action</div></td>
                      </tr>
                      <?php 
				 $query = "select * from user_account where active ='1' $search_option $more";
				  $result = mysql_query($query) or die(mysql_error());
				 $sr=1;
				  while($row=mysql_fetch_array($result))
				  {
				  if($row[user_type] =='0')
				  {
				  
				  	$user_type_show = "Residents";
				  
				  }elseif($row[user_type] =='1')
				  {
				  
				  	$user_type_show = "Managers";
				  
				  }elseif($row[user_type] =='2')
				  {
				  
				  	$user_type_show = "Club";
				  
				  }
				  echo "<tr align=center>
                    <td>$sr</td>
                    <td colspan=\"2\">$user_type_show</td>
					<td colspan=\"2\">$row[username]</td>
                    <td colspan=\"2\">$row[name]</td>
                    <td colspan=\"2\">$row[email]</td>
					 <td colspan=\"2\">$row[contact_no]</td>
                    <td align=center> <a href=facility.php?crypted=$_GET[crypted]&page=user&edit=$row[id]>Edit</a> | <a href=facility.php?crypted=$_GET[crypted]&page=user&dele=$row[id] onClick=\"return confirm('This will delete the user from System, Are you sure ?');\">Delete</a> </td>
                  </tr>
				 
				  
				  
				  ";
				  $sr++;
				  }
				  
				  ?>
                  </table>
                  
                 </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
            </table>
            <?
			}
			 else
			 {
			 ?>
                 <table width="99%" border="0" align="right" cellpadding="0" cellspacing="1">
                <tr>
                  <td bgcolor="#944542" class="txtgrey">&nbsp;Manager Listing </td>
                </tr>
                <tr>
                  <td><table width="99%" border="0" align="center">
                      <tr>
                        <td width="5%" bgcolor="#FFFFFF"><div align="center">Sno.</div></td>
                        <td width="10%" bgcolor="#FFFFFF"><div align="center">Last Logged In</div></td>
                        <td width="2%" bgcolor="#FFFFFF"><div align="center"><a href="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=manager&sort_by=user_type&mode=<?php echo $mode; ?>"><?php echo $user_type_image; ?></a></div></td>
                        <td width="10%" bgcolor="#FFFFFF"><div align="center">Username</div></td>
                        <td width="2%" bgcolor="#FFFFFF"><a href="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=manager&sort_by=username&mode=<?php echo $mode; ?>"><?php echo $username_image; ?></a></td>
                        <td width="8%" bgcolor="#FFFFFF"><div align="center">Name</div></td>
                        <td width="2%" bgcolor="#FFFFFF"><a href="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=manager&sort_by=name&mode=<?php echo $mode; ?>"><?php echo $name_image; ?></a></td>
                        <td width="20%" bgcolor="#FFFFFF"><div align="center">E-mail</div></td>
                        <td width="2%" bgcolor="#FFFFFF"><a href="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=manager&sort_by=email&mode=<?php echo $mode; ?>"><?php echo $email_image; ?></a></td>
                        <td width="23%" bgcolor="#FFFFFF"><div align="center">Contact</div></td>
                        <td width="2%" bgcolor="#FFFFFF"><a href="facility.php?crypted=<?php echo $_GET[crypted]; ?>&page=manager&sort_by=contact_no&mode=<?php echo $mode; ?>"><?php echo $contact_no_image; ?></a></td>
                        <td width="14%" bgcolor="#FFFFFF" ><div align="center">Action</div></td>
                      </tr>
                      <?php 
				 $query = "select * from user_account where active ='1' AND user_type = '1' $search_option $more";
				  $result = mysql_query($query) or die(mysql_error());
				 $sr=1;
				  while($row=mysql_fetch_array($result))
				  {
				  if($row[user_type] =='0')
				  {
				  
				  	$user_type_show = "Residents";
				  
				  }elseif($row[user_type] =='1')
				  {
				  
				  	$user_type_show = "Managers";
				  
				  }elseif($row[user_type] =='2')
				  {
				  
				  	$user_type_show = "Club";
				  
				  }
				  echo "<tr align=center>
                    <td>$sr</td>
                    <td colspan=\"2\">$row[last_logged_in]</td>
					<td colspan=\"2\">$row[username]</td>
                    <td colspan=\"2\">$row[name]</td>
                    <td colspan=\"2\">$row[email]</td>
					 <td colspan=\"2\">$row[contact_no]</td>
                    <td align=center> <a href=facility.php?crypted=$_GET[crypted]&page=user&edit=$row[id]>Edit</a> | <a href=facility.php?crypted=$_GET[crypted]&page=user&dele=$row[id] onClick=\"return confirm('This will delete the user from System, Are you sure ?');\">Delete</a> </td>
                  </tr>
				 
				  
				  
				  ";
				  $sr++;
				  }
				  
				  ?>
                  </table>
                  
                 </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
            </table>
			 <?
			 }
			 ?></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
      </table>
      <?php
		
		}
		?></td>
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
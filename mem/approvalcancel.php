<? if(isset($_POST[booking_no]) )
				   	{
				 		if($_POST[type] == 'cancle')
					   		{
					  			$query_my_booking = "select * from my_booking where sno ='$_POST[booking_no]' ";
								$result_my_query = mysql_query($query_my_booking);
								while($row_my = mysql_fetch_array($result_my_query))
								{
									$date_of_booking  = $row_my[date_of_booking];
									$from_time = $row_my[from_time];
									$to_time = $row_my[to_time];
									$amount_recived  = $row_my[amount_recived];
									$registered_by_id = $row_my[uid];
									$order_status_sel = $row_my[status];
									$amount_recived = $row_my[amount_recived];
									if($amount_recived =='' or $amount_recived =='0')
									{
										$my_dis = "readonly";
									}
								}
								$query_user = "select * from user_account where id = '$registered_by_id'";
								$query_result = mysql_query($query_user);
								while($row_user = mysql_fetch_array($query_result))
								{
									$registered_by = $row_user[username];
								}
					  			?>
                  				<table width="75%" border="0" align="center" class="sk_bok">
                                <form name="form2" method="post" action="">
                                <input name="date_sel" type="hidden" value="<?php echo $_POST[date_sel] ; ?>">
                                <input name="date_sel_all" type="hidden" value="<?php echo $_POST[date_sel_all] ; ?>">
                                <input name="date_sel_all_end" type="hidden" value="<?php echo $_POST[date_sel_all_end] ; ?>">
                                <input name="menu2" type="hidden" value="<?php echo $_POST[menu2] ; ?>">
                                <input name="user_sel" type="hidden" value="<?php echo $_POST[user_sel] ; ?>">
                                <input name="select" type="hidden" value="<?php echo $_POST[select] ; ?>">
                                <tr bgcolor="#993300">
                                	<td colspan="6"><span class="fontitle"><strong>Cancle Booking </strong></span></td>
                                </tr>
                                <tr>
                                   	<td width="13%">Time slot </td>
                        			<td width="2%"><strong>:</strong></td>
                        			<td width="37%"><?php echo "$from_time to $to_time"; ?>
                            		<input type="hidden" name="date_sel2" value="<?php echo $_POST[date_sel]; ?>"></td>
                        			<td width="18%">Date </td>
                        			<td width="2%"><div align="left">:<strong>:</strong></div></td>
                        			<td width="28%"><?php echo $_POST[date_sel]; ?></td>
                     			</tr>
                      			<tr>
                        			<td>Resident </td>
                        			<td><strong>:</strong></td>
                                    <td><?php
									   echo $registered_by; 
									   $registered_by = '';
									   ?>
                            		<input type="hidden" name="sno" value="<?php echo $_POST[booking_no]; ?>"></td>
                                    <td>Curent Status </td>
                                    <td><strong>:</strong></td>
                                    <td><?php
                                  	if($order_status_sel == '1')
								 	{
										echo $icon = "<img src=images/3.jpg>";
								 	}
									elseif($order_status_sel == '0')
								 	{
								 		echo $icon_sel = "<img src=images/4.jpg>";
								 	}
									?>
                                    </td>
                      			</tr>
                      			<?php
					   			if($user_type =='1')
				  				{
					   			?>
                      			<tr>
                                    <td>Reason </td>
                                    <td><strong>
                                      <label>:</label>
                                    </strong></td>
                                    <td><select name="reason">
                                        <option value="Others" selected>Others</option>
                                        <option value="Rain">Rain</option>
                                        <option value="Mentainance">Mentainance</option>
                                    </select></td>
                                    <td>Amount Refund </td>
                                    <td><strong>:</strong></td>
                                    <td><label>
                                      <input name="refund_amount" type="text" value="<?php echo $amount_recived ; ?>" size="5" maxlength="5" <?php echo $my_dis ; ?>>
                                      SGD</label></td>
                                 </tr>
                                 <?php
                             	}
								else
                             	{
                             		echo " <input name=reason type=hidden value=`User Requested`>";
                             	}
                             	?>
                      			<tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td colspan="2"><label>
                                      <input type="submit" name="Submit5" value="Go Back">
                           		    </label></td>
                        			<td><label>
                          			<input type="submit" name="Submit6" value="Cancle Booking">
                        			</label></td>
                      			</tr>
                    			</form>
                                </table>
                  				<?
					   			}
								elseif($_POST[type]=='approve')	
					   			{
					  				$query_my_booking = "select * from my_booking where sno ='$_POST[booking_no]' ";
									$result_my_query = mysql_query($query_my_booking);
									while($row_my = mysql_fetch_array($result_my_query))
									{
										$date_of_booking  = $row_my[date_of_booking];
										$from_time = $row_my[from_time];
										$to_time = $row_my[to_time];
										$amount_recived  = $row_my[amount_recived];
										$registered_by_id = $row_my[uid];
										$order_status_sel = $row_my[status];
									}
									$query_user = "select * from user_account where id = '$registered_by_id'";
									$query_result = mysql_query($query_user);
									while($row_user = mysql_fetch_array($query_result))
									{
										$registered_by = $row_user[username];
									}
					   			?>
                  				<table width="75%" border="0" align="center" class="sk_bok_green">
                                <form name="form2" method="post" action="">
                                <input name="date_sel" type="hidden" value="<?php echo $_POST[date_sel] ; ?>">
                                <input name="date_sel_all" type="hidden" value="<?php echo $_POST[date_sel_all] ; ?>">
                                <input name="date_sel_all_end" type="hidden" value="<?php echo $_POST[date_sel_all_end] ; ?>">
                                <input name="menu2" type="hidden" value="<?php echo $_POST[menu2] ; ?>">
                                <input name="user_sel" type="hidden" value="<?php echo $_POST[user_sel] ; ?>">
                                <input name="select" type="hidden" value="<?php echo $_POST[select] ; ?>">
                                <tr bgcolor="#993300">
                                	<td colspan="6" bgcolor="#009900"><span class="fontitle"><strong>Approve Booking </strong></span></td>
                                </tr>
                                <tr>
                                    <td width="13%">Time slot </td>
                                    <td width="2%"><strong>:</strong></td>
                                    <td width="37%"><?php echo "$from_time to $to_time"; ?>
                                    <input type="hidden" name="date_sel2" value="<?php echo $_POST[date_sel]; ?>"></td>
                        			<td width="18%">Date </td>
                        			<td width="2%"><div align="left">:<strong>:</strong></div></td>
                        			<td width="28%"><?php echo $_POST[date_sel]; ?></td>
                      			</tr>
                      			<tr>
                        			<td>Resident </td>
                        			<td><strong>:</strong></td>
                        			<td><?php
				   					echo $registered_by; 
				   					$registered_by = '';
				   					?>
                            		<input type="hidden" name="sno" value="<?php echo $_POST[booking_no]; ?>"></td>
                                    <td>Curent Status </td>
                                    <td><strong>:</strong></td>
                                    <td><?php
									if($order_status_sel == '1')
								 	{
										echo $icon = "<img src=images/3.jpg>";
								 	}
									elseif($order_status_sel == '0')
								 	{
								 		echo $icon_sel = "<img src=images/4.jpg>";
								 	}
									?>
                                    </td>
                      			</tr>
                      			<tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>Amount Deposited</td>
                                    <td><strong>:</strong></td>
                                    <td><label>
                                    <input name="refund_amount2" type="text" value="<?php echo $amount_recived; ?>" size="5" maxlength="5" <?php echo $my_dis ; ?>>SGD</label></td>
                      			</tr>
                      			<tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td colspan="2"><label>
                                      <input type="submit" name="Submit52" value="Go Back">
                                  </label></td>
                                    <td><label>
                                      <input type="submit" name="Submit62" value="Approve Booking">
                                    </label></td>
                                </tr>
                                </form>
                  				</table>
                              	<?
					   			}
								}
								?>
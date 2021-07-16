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
			 
	}
	
	if($_SESSION['basic_is_logged_in'] != $id or	 $_SESSION['basic_is_logged_in'] =='')
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
			echo "<script type=text/javascript language=javascript> window.location.href = 'home.php?ops=1'; </script> ";
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
		<link href="textset.css" type="text/css" rel="stylesheet">
		<table cellSpacing="0" cellPadding="0" width="150" border="0" id="table5">
			<tr vAlign="top">
				<td class="lefttop" height="93">&nbsp;</td>
			</tr>
			<tr>
				<td>
				<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table6">
					<tr>
						<td vAlign="top" align="middle"><br>
						&nbsp;
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.php')" onmouseout="this.src='img/but_logout_2.gif'" type="image" src="img/but_logout_2.gif" name="I1">
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
			<tr>
				<td class="leftcontent" height="3">
				<img height="7" src="img/leftdot.gif" width="9">
				<a class="copy" href="mem/facilitynew.php?crypted=<? echo $_GET['crypted']; ?>">
				Facilities Booking </a></td>
			</tr>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr>
			<tr>
				<td class="leftcontent">
				<img height="7" src="img/leftdot.gif" width="9">
				<a class="copy" href="mem/facilitynew.php?crypted=<? echo $_GET['crypted']; ?>&mode=view">
				View/Cancel Bookings</a> </td>
			</tr>
			<tr>
				<td class="leftdecline" height="3"><SPACER type="block" 
height="3"></SPACER></td>
			</tr>
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top">
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="36" src="img/t/online.gif" width="263"></td>
			</tr>
			<tr>
				<td class="content" vAlign="top">
                <? if ($mode == '') { ?>
				 <table cellSpacing="0" cellPadding="0" width="98%" align="center" border="0" id="table1">
	<tr>
		<td width="21" height="30">
		<img height="30" src="http://www.ardmorepark.com.sg/images/left_win_10.gif" width="21"></td>
		<td width="98%" background="http://www.ardmorepark.com.sg/images/middle_win_11.gif">
		<strong><span class="time14">Place New Booking</span></strong></td>
		<td width="17">
		<img height="30" src="http://www.ardmorepark.com.sg/images/right_win_14.gif" width="17"></td>
	</tr>
	<tr>
		<td class="tableborder" style="FILTER: progid:DXImageTransform.Microsoft.Gradient(GradientType=1, StartColorStr='#EFE7D6', EndColorStr='#FFFFFF')" colSpan="3">
		<table cellSpacing="1" cellPadding="2" width="100%" align="center" border="0" id="table2">
			<tr vAlign="bottom" bgColor="#984946">
				<td class="arial12" width="72%" bgColor="#984946" height="23">
				<div class="time14cream" align="left">
					<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table3">
						<tr>
							<form name="demoform" method="get" action="http://www.ardmorepark.com.sg/place_info.php">
								<td>
								<table cellSpacing="5" cellPadding="0" border="0" id="table4">
									<tr>
										<td>
										<div align="left">
											<strong><font size="3">
											<select class="textbox" id="facility" name="facility">
											<option value selected>Select a 
											Facility</option>
											<option value="Tennis Court 1">
											Tennis Court 1</option>
											<option value="Tennis Court 2">
											Tennis Court 2</option>
											<option value="North Room">North 
											Function Room</option>
											<option value="South Room">South 
											Function Room</option>
											</select> </font></strong></div>
										</td>
										<td>
										<div align="left">
											<select class="textbox" name="user_id">
											<option value selected>Select a User
											</option>
											<option value="375">Siew Hoon
											</option>
											<option value="18">sohhoon</option>
											<option value="369">Hon Yoong
											</option>
											<option value="359">ClubA</option>
											<option value="358">AP090201
											</option>
											<option value="26">AP090202</option>
											<option value="27">AP090203</option>
											<option value="28">AP090204</option>
											<option value="29">AP090301</option>
											<option value="30">AP090302</option>
											<option value="31">AP090303</option>
											<option value="32">AP090304</option>
											<option value="33">APblk09unit
											</option>
											<option value="34">AP090402</option>
											<option value="35">AP090403</option>
											<option value="36">AP090404</option>
											<option value="37">AP090501</option>
											<option value="38">AP090502</option>
											<option value="39">AP090503</option>
											<option value="40">AP090504</option>
											<option value="41">AP090601</option>
											<option value="42">AP090602</option>
											<option value="43">AP090603</option>
											<option value="44">AP090604</option>
											<option value="45">AP090701</option>
											<option value="46">AP090702</option>
											<option value="47">AP090703</option>
											<option value="48">AP090704</option>
											<option value="49">AP090801</option>
											<option value="50">AP090802</option>
											<option value="51">AP090803</option>
											<option value="52">AP090804</option>
											<option value="53">AP090901</option>
											<option value="54">AP090902</option>
											<option value="55">AP090903</option>
											<option value="56">AP090904</option>
											<option value="57">AP091001</option>
											<option value="58">AP091002</option>
											<option value="59">AP091003</option>
											<option value="60">AP091004</option>
											<option value="61">AP091101</option>
											<option value="62">AP091102</option>
											<option value="63">AP091103</option>
											<option value="64">AP091104</option>
											<option value="65">AP091201</option>
											<option value="66">AP091202</option>
											<option value="67">AP091203</option>
											<option value="68">AP091204</option>
											<option value="69">AP091301</option>
											<option value="70">AP091302</option>
											<option value="71">AP091303</option>
											<option value="72">AP091304</option>
											<option value="73">AP091401</option>
											<option value="74">AP091402</option>
											<option value="75">AP091403</option>
											<option value="76">AP091404</option>
											<option value="77">AP091501</option>
											<option value="78">AP091502</option>
											<option value="79">AP091503</option>
											<option value="80">AP091504</option>
											<option value="81">AP091601</option>
											<option value="82">AP091602</option>
											<option value="83">AP091603</option>
											<option value="84">AP091604</option>
											<option value="85">AP091701</option>
											<option value="86">AP091702</option>
											<option value="87">AP091703</option>
											<option value="88">AP091704</option>
											<option value="89">AP091801</option>
											<option value="90">AP091802</option>
											<option value="91">AP091803</option>
											<option value="92">AP091804</option>
											<option value="93">AP091901</option>
											<option value="94">AP091902</option>
											<option value="95">AP091903</option>
											<option value="96">AP091904</option>
											<option value="97">AP092001</option>
											<option value="98">AP092002</option>
											<option value="99">AP092003</option>
											<option value="100">AP092004
											</option>
											<option value="101">AP092101
											</option>
											<option value="102">AP092102
											</option>
											<option value="103">AP092103
											</option>
											<option value="104">AP092104
											</option>
											<option value="105">AP092201
											</option>
											<option value="106">AP092202
											</option>
											<option value="107">AP092203
											</option>
											<option value="108">AP092204
											</option>
											<option value="109">AP092301
											</option>
											<option value="110">AP092302
											</option>
											<option value="111">AP092303
											</option>
											<option value="112">AP092304
											</option>
											<option value="113">AP092401
											</option>
											<option value="114">AP092402
											</option>
											<option value="115">AP092403
											</option>
											<option value="116">AP092404
											</option>
											<option value="117">AP092501
											</option>
											<option value="118">AP092502
											</option>
											<option value="119">AP092503
											</option>
											<option value="120">AP092504
											</option>
											<option value="121">AP092601
											</option>
											<option value="122">AP092602
											</option>
											<option value="123">AP092603
											</option>
											<option value="125">AP092701
											</option>
											<option value="126">AP092702
											</option>
											<option value="127">AP092703
											</option>
											<option value="128">AP092704
											</option>
											<option value="129">AP092801
											</option>
											<option value="130">AP092802
											</option>
											<option value="131">AP092803
											</option>
											<option value="132">AP092804
											</option>
											<option value="133">AP092901
											</option>
											<option value="134">AP092903
											</option>
											<option value="135">AP110201
											</option>
											<option value="136">AP110202
											</option>
											<option value="137">AP110203
											</option>
											<option value="138">AP110204
											</option>
											<option value="139">AP110301
											</option>
											<option value="141">AP110303
											</option>
											<option value="142">AP110304
											</option>
											<option value="143">AP110401
											</option>
											<option value="144">AP110402
											</option>
											<option value="145">AP110403
											</option>
											<option value="146">AP110404
											</option>
											<option value="147">AP110501
											</option>
											<option value="148">AP110502
											</option>
											<option value="149">AP110503
											</option>
											<option value="150">AP110504
											</option>
											<option value="151">AP110601
											</option>
											<option value="152">AP110602
											</option>
											<option value="153">AP110603
											</option>
											<option value="154">AP110604
											</option>
											<option value="155">AP110701
											</option>
											<option value="156">AP110702
											</option>
											<option value="157">AP110703
											</option>
											<option value="158">AP110704
											</option>
											<option value="159">AP110801
											</option>
											<option value="160">AP110802
											</option>
											<option value="161">AP110803
											</option>
											<option value="162">AP110804
											</option>
											<option value="163">AP110901
											</option>
											<option value="164">AP110902
											</option>
											<option value="165">AP110903
											</option>
											<option value="166">AP110904
											</option>
											<option value="167">AP111001
											</option>
											<option value="168">AP111002
											</option>
											<option value="169">AP111003
											</option>
											<option value="170">AP111004
											</option>
											<option value="171">AP111101
											</option>
											<option value="172">AP111102
											</option>
											<option value="173">AP111103
											</option>
											<option value="174">AP111104
											</option>
											<option value="175">AP111201
											</option>
											<option value="176">AP111202
											</option>
											<option value="177">AP111203
											</option>
											<option value="178">AP111204
											</option>
											<option value="179">AP111301
											</option>
											<option value="180">AP111302
											</option>
											<option value="181">AP111303
											</option>
											<option value="182">AP111304
											</option>
											<option value="183">AP111401
											</option>
											<option value="184">AP111402
											</option>
											<option value="185">AP111403
											</option>
											<option value="186">AP111404
											</option>
											<option value="187">AP111501
											</option>
											<option value="188">AP111502
											</option>
											<option value="189">AP111503
											</option>
											<option value="190">AP111504
											</option>
											<option value="191">AP111601
											</option>
											<option value="192">AP111602
											</option>
											<option value="193">AP111603
											</option>
											<option value="194">AP111604
											</option>
											<option value="195">AP111701
											</option>
											<option value="196">AP111702
											</option>
											<option value="197">AP111703
											</option>
											<option value="198">AP111704
											</option>
											<option value="199">AP111801
											</option>
											<option value="200">AP111802
											</option>
											<option value="201">AP111803
											</option>
											<option value="202">AP111804
											</option>

											<option value="203">AP111901
											</option>
											<option value="204">AP111902
											</option>
											<option value="205">AP111903
											</option>
											<option value="206">AP111904
											</option>
											<option value="207">AP112001
											</option>
											<option value="208">AP112002
											</option>
											<option value="209">AP112003
											</option>
											<option value="210">AP112004
											</option>
											<option value="211">AP112101
											</option>
											<option value="212">AP112102
											</option>
											<option value="213">AP112103
											</option>
											<option value="214">AP112104
											</option>
											<option value="215">AP112201
											</option>
											<option value="216">AP112202
											</option>
											<option value="217">AP112203
											</option>
											<option value="218">AP112204
											</option>
											<option value="219">AP112301
											</option>
											<option value="220">AP112303
											</option>
											<option value="221">AP112302
											</option>
											<option value="222">AP112304
											</option>
											<option value="223">AP112401
											</option>
											<option value="224">AP112402
											</option>
											<option value="225">AP112403
											</option>
											<option value="226">AP112404
											</option>
											<option value="227">AP112501
											</option>
											<option value="228">AP112502
											</option>
											<option value="229">AP112503
											</option>
											<option value="230">AP112504
											</option>
											<option value="231">AP112601
											</option>
											<option value="232">AP112602
											</option>
											<option value="233">AP112603
											</option>
											<option value="234">AP112604
											</option>
											<option value="235">AP112701
											</option>
											<option value="236">AP112702
											</option>
											<option value="237">AP112703
											</option>
											<option value="238">AP112704
											</option>
											<option value="239">AP112801
											</option>
											<option value="240">AP112802
											</option>
											<option value="241">AP112803
											</option>
											<option value="242">AP112804
											</option>
											<option value="243">AP112901
											</option>
											<option value="244">AP112903
											</option>
											<option value="245">AP150201
											</option>
											<option value="246">AP150202
											</option>
											<option value="247">AP150203
											</option>
											<option value="248">AP150204
											</option>
											<option value="249">AP150301
											</option>
											<option value="250">AP150302
											</option>
											<option value="251">AP150303
											</option>
											<option value="252">AP150304
											</option>
											<option value="253">AP150401
											</option>
											<option value="254">AP150402
											</option>
											<option value="255">AP150403
											</option>
											<option value="256">AP150404
											</option>
											<option value="257">AP150501
											</option>
											<option value="258">AP150502
											</option>
											<option value="259">AP150503
											</option>
											<option value="260">AP150504
											</option>
											<option value="261">AP150601
											</option>
											<option value="262">AP150602
											</option>
											<option value="263">AP150603
											</option>
											<option value="264">AP150604
											</option>
											<option value="265">AP150701
											</option>
											<option value="266">AP150702
											</option>
											<option value="267">AP150703
											</option>
											<option value="268">AP150704
											</option>
											<option value="269">AP150801
											</option>
											<option value="270">AP150802
											</option>
											<option value="271">AP150803
											</option>
											<option value="272">AP150804
											</option>
											<option value="273">AP150901
											</option>
											<option value="274">AP150902
											</option>
											<option value="275">AP150903
											</option>
											<option value="276">AP150904
											</option>
											<option value="277">AP151001
											</option>
											<option value="278">AP151002
											</option>
											<option value="279">AP151003
											</option>
											<option value="280">AP151004
											</option>
											<option value="281">AP151101
											</option>
											<option value="282">AP151102
											</option>
											<option value="283">AP151103
											</option>
											<option value="284">AP151104
											</option>
											<option value="285">AP151201
											</option>
											<option value="286">AP151202
											</option>
											<option value="287">AP151203
											</option>
											<option value="288">AP151204
											</option>
											<option value="289">AP151301
											</option>
											<option value="290">AP151302
											</option>
											<option value="291">AP151303
											</option>
											<option value="292">AP151304
											</option>
											<option value="293">AP151401
											</option>
											<option value="294">AP151402
											</option>
											<option value="295">AP151403
											</option>
											<option value="296">AP151404
											</option>
											<option value="297">AP151501
											</option>
											<option value="298">AP151502
											</option>
											<option value="299">AP151503
											</option>
											<option value="300">AP151504
											</option>
											<option value="301">AP151601
											</option>
											<option value="302">AP151602
											</option>
											<option value="377">AP151603
											</option>
											<option value="304">AP151604
											</option>
											<option value="305">AP151701
											</option>
											<option value="306">AP151702
											</option>
											<option value="307">AP151703
											</option>
											<option value="308">AP151704
											</option>
											<option value="309">AP151801
											</option>
											<option value="310">AP151802
											</option>
											<option value="311">AP151803
											</option>
											<option value="312">AP151804
											</option>
											<option value="313">AP151901
											</option>
											<option value="314">AP151902
											</option>
											<option value="315">AP151903
											</option>
											<option value="316">AP151904
											</option>
											<option value="317">AP152001
											</option>
											<option value="318">AP152002
											</option>
											<option value="319">AP152003
											</option>
											<option value="320">AP152004
											</option>
											<option value="321">AP152101
											</option>
											<option value="322">AP152102
											</option>
											<option value="323">AP152103
											</option>
											<option value="324">AP152104
											</option>
											<option value="325">AP152201
											</option>
											<option value="326">AP152202
											</option>
											<option value="327">AP152203
											</option>
											<option value="328">AP152204
											</option>
											<option value="329">AP152301
											</option>
											<option value="330">AP152302
											</option>
											<option value="331">AP152303
											</option>
											<option value="332">AP152304
											</option>
											<option value="333">AP152401
											</option>
											<option value="334">AP152402
											</option>
											<option value="335">AP152403
											</option>
											<option value="336">AP152404
											</option>
											<option value="337">AP152501
											</option>
											<option value="338">AP152502
											</option>
											<option value="339">AP152503
											</option>
											<option value="340">AP152504
											</option>
											<option value="341">AP152601
											</option>
											<option value="342">AP152602
											</option>
											<option value="343">AP152603
											</option>
											<option value="344">AP152604
											</option>
											<option value="345">AP152701
											</option>
											<option value="346">AP152702
											</option>
											<option value="347">AP152703
											</option>
											<option value="348">AP152704
											</option>
											<option value="349">AP152801
											</option>
											<option value="350">AP152802
											</option>
											<option value="351">AP152803
											</option>
											<option value="352">AP152804
											</option>
											<option value="353">AP152901
											</option>
											<option value="354">AP152903
											</option>
											<option value="360">ClubB</option>
											<option value="379">AP092604
											</option>
											<option value="361">ClubC</option>
											<option value="378">Lia</option>
											<option value="381">ADI</option>
											<option value="371">MuLiani</option>
											<option value="373">dennis</option>
											<option value="374">JANICE</option>
											<option value="380">amit</option>
											<option value="382">ADICLUB</option>
											<option value="384">danielle
											</option>
											</select> 
										</div>
										</td>
										<td>
										<div align="left">
											<input class="textbox" size="12" value="Select a Date" name="dc">
											<a hideFocus onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.dc);return false;" href="javascript:void(0)">
											<img height="22" alt="" src="http://www.ardmorepark.com.sg/calbtn.gif" width="34" align="absMiddle" border="0" name="popcal"></a> 
										</div>
										</td>
										<td>
										<div align="left">
											&nbsp;
											<input type="hidden" value="Submit" name="Submit_Cri">
											<input onclick="if (validateForm(this.form)) submitform();" type="button" value="Go" name="Submit"> 
										</div>
										</td>
									</tr>
								</table>
								</td>
							</form>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</table>
				</div>
				</td>
			</tr>
			<tr class="arial10white" bgColor="#b19952">
				<td bgColor="#b19952">
				<table cellSpacing="1" cellPadding="0" width="100%" border="0" id="table5">
					<form name="form1" method="post" action="http://www.ardmorepark.com.sg/place_info.php?facility=&user_id=380&dc=&Submit_Cri=submit">
						<tr>
							<td colSpan="2" height="35">
							<input type="submit" value="Book Now" name="Submit3"> 
							<div align="right">
&nbsp;</div>
							</td>
							<td class="arial10white" colSpan="4" height="35">
							<div align="right">
&nbsp;</div>
							</td>
						</tr>
						<tr class="arial10white" bgColor="#993333">
							<td width="11%">
							<div align="center">
								Select</div>
							</td>
							<td width="13%" bgColor="#993333">
							<div align="center">
								From Time</div>
							</td>
							<td width="11%">
							<div align="center">
								To Time</div>
							</td>
							<td width="13%">
							<div align="center">
								Resident</div>
							</td>
							<td width="15%">
							<div align="center">
								Cancel Booking</div>
							</td>
							<td width="37%">
							<div align="center">
								Cancel for rain</div>
							</td>
						</tr>
						<tr>
							<td colSpan="6" height="35">
							<input type="submit" value="Book Now" name="Submit2"> 
							</td>
						</tr>
					</form>
				</table>
				<table class="tableborder" cellSpacing="0" cellPadding="3" width="100%" bgColor="#984946" border="0" id="table6">
					<tr class="arial10white">
						<td width="19%">Non-Peak Hour Slot</td>
						<td width="17%">
						<img height="13" src="http://www.ardmorepark.com.sg/images/normal.gif" width="13"></td>
						<td width="21%">Already Booked</td>
						<td width="17%">
						<img height="13" src="http://www.ardmorepark.com.sg/images/cross.gif" width="13" align="absMiddle"></td>
					</tr>
					<tr class="arial10white">
						<td>Peak Hour Slot</td>
						<td>
						<img height="13" src="http://www.ardmorepark.com.sg/images/prime.gif" width="13"></td>
						<td>Your Current Booking</td>
						<td>
						<img height="13" src="http://www.ardmorepark.com.sg/images/tick.gif" width="13"></td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table><? } else {?>
 <table cellSpacing="0" cellPadding="0" width="98%" align="center" border="0" id="table1">
	<tr>
		<td width="21" height="30">
		<img height="30" src="http://www.ardmorepark.com.sg/images/left_win_10.gif" width="21"></td>
		<td class="time14" width="98%" background="http://www.ardmorepark.com.sg/images/middle_win_11.gif" height="30">
		<strong>VIEW BOOKINGS</strong></td>
		<td width="17" height="30">
		<img height="30" src="http://www.ardmorepark.com.sg/images/right_win_14.gif" width="17"></td>
	</tr>
	<tr>
		<td class="tableborder" style="FILTER: progid:DXImageTransform.Microsoft.Gradient(GradientType=1, StartColorStr='#EFE7D6', EndColorStr='#FFFFFF')" colSpan="3">
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table2">
			<tr class="arial10white">
				<form name="demoform" method="get" action="http://www.ardmorepark.com.sg/view_info.php">
					<td>
					<table cellSpacing="0" cellPadding="5" width="90%" align="center" border="0" id="table3">
						<tr>
							<td class="arial12" width="14%">
							<div align="right">
								Start Date </div>
							</td>
							<td width="36%">
							<input class="plain" onfocus="this.blur()" readOnly size="12" name="dc1">
							<a hideFocus onclick="if(self.gfPop)gfPop.fStartPop(document.demoform.dc1,document.demoform.dc2);return false;" href="javascript:void(0)">
							<img height="22" alt="" src="http://www.ardmorepark.com.sg/DateRange/calbtn.gif" width="34" align="absMiddle" border="0" name="popcal"></a></td>
							<td width="14%">
							<div align="right">
								<span class="arial12">End Date</span> </div>
							</td>
							<td width="36%">
							<input class="plain" onfocus="this.blur()" readOnly size="12" name="dc2">
							<a hideFocus onclick="if(self.gfPop)gfPop.fEndPop(document.demoform.dc1,document.demoform.dc2);return false;" href="javascript:void(0)">
							<img height="22" alt="" src="http://www.ardmorepark.com.sg/DateRange/calbtn.gif" width="34" align="absMiddle" border="0" name="popcal"></a></td>
						</tr>
						<tr>
							<td class="arial12">
							<div align="right">
								Facility</div>
							</td>
							<td>
							<select class="textbox" id="select" name="facility">
							<option value selected>All Facilities</option>
							<option value="Tennis Court 1">Tennis Court 1
							</option>
							<option value="Tennis Court 2">Tennis Court 2
							</option>
							<option value="North Room">North Function Room
							</option>
							<option value="South Room">South Function Room
							</option>
							</select></td>
							<td class="arial12">
							<div align="right">
								User </div>
							</td>
							<td><select class="textbox" name="user_id">
							<option value selected>All Users</option>
							<option value="375">Siew Hoon</option>
							<option value="18">sohhoon</option>
							<option value="369">Hon Yoong</option>
							<option value="359">ClubA</option>
							<option value="358">AP090201</option>
							<option value="26">AP090202</option>
							<option value="27">AP090203</option>
							<option value="28">AP090204</option>
							<option value="29">AP090301</option>
							<option value="30">AP090302</option>
							<option value="31">AP090303</option>
							<option value="32">AP090304</option>
							<option value="33">APblk09unit</option>
							<option value="34">AP090402</option>
							<option value="35">AP090403</option>
							<option value="36">AP090404</option>
							<option value="37">AP090501</option>
							<option value="38">AP090502</option>
							<option value="39">AP090503</option>
							<option value="40">AP090504</option>
							<option value="41">AP090601</option>
							<option value="42">AP090602</option>
							<option value="43">AP090603</option>
							<option value="44">AP090604</option>
							<option value="45">AP090701</option>
							<option value="46">AP090702</option>
							<option value="47">AP090703</option>
							<option value="48">AP090704</option>
							<option value="49">AP090801</option>
							<option value="50">AP090802</option>
							<option value="51">AP090803</option>
							<option value="52">AP090804</option>
							<option value="53">AP090901</option>
							<option value="54">AP090902</option>
							<option value="55">AP090903</option>
							<option value="56">AP090904</option>
							<option value="57">AP091001</option>
							<option value="58">AP091002</option>
							<option value="59">AP091003</option>
							<option value="60">AP091004</option>
							<option value="61">AP091101</option>
							<option value="62">AP091102</option>
							<option value="63">AP091103</option>
							<option value="64">AP091104</option>
							<option value="65">AP091201</option>
							<option value="66">AP091202</option>
							<option value="67">AP091203</option>
							<option value="68">AP091204</option>
							<option value="69">AP091301</option>
							<option value="70">AP091302</option>
							<option value="71">AP091303</option>
							<option value="72">AP091304</option>
							<option value="73">AP091401</option>
							<option value="74">AP091402</option>
							<option value="75">AP091403</option>
							<option value="76">AP091404</option>
							<option value="77">AP091501</option>
							<option value="78">AP091502</option>
							<option value="79">AP091503</option>
							<option value="80">AP091504</option>
							<option value="81">AP091601</option>
							<option value="82">AP091602</option>
							<option value="83">AP091603</option>
							<option value="84">AP091604</option>
							<option value="85">AP091701</option>
							<option value="86">AP091702</option>
							<option value="87">AP091703</option>
							<option value="88">AP091704</option>
							<option value="89">AP091801</option>
							<option value="90">AP091802</option>
							<option value="91">AP091803</option>
							<option value="92">AP091804</option>
							<option value="93">AP091901</option>
							<option value="94">AP091902</option>
							<option value="95">AP091903</option>
							<option value="96">AP091904</option>
							<option value="97">AP092001</option>
							<option value="98">AP092002</option>
							<option value="99">AP092003</option>
							<option value="100">AP092004</option>
							<option value="101">AP092101</option>
							<option value="102">AP092102</option>
							<option value="103">AP092103</option>
							<option value="104">AP092104</option>
							<option value="105">AP092201</option>
							<option value="106">AP092202</option>
							<option value="107">AP092203</option>
							<option value="108">AP092204</option>
							<option value="109">AP092301</option>
							<option value="110">AP092302</option>
							<option value="111">AP092303</option>
							<option value="112">AP092304</option>
							<option value="113">AP092401</option>
							<option value="114">AP092402</option>
							<option value="115">AP092403</option>
							<option value="116">AP092404</option>
							<option value="117">AP092501</option>
							<option value="118">AP092502</option>
							<option value="119">AP092503</option>
							<option value="120">AP092504</option>
							<option value="121">AP092601</option>
							<option value="122">AP092602</option>
							<option value="123">AP092603</option>
							<option value="125">AP092701</option>
							<option value="126">AP092702</option>
							<option value="127">AP092703</option>
							<option value="128">AP092704</option>
							<option value="129">AP092801</option>
							<option value="130">AP092802</option>
							<option value="131">AP092803</option>
							<option value="132">AP092804</option>
							<option value="133">AP092901</option>
							<option value="134">AP092903</option>
							<option value="135">AP110201</option>
							<option value="136">AP110202</option>
							<option value="137">AP110203</option>
							<option value="138">AP110204</option>
							<option value="139">AP110301</option>
							<option value="141">AP110303</option>
							<option value="142">AP110304</option>
							<option value="143">AP110401</option>
							<option value="144">AP110402</option>
							<option value="145">AP110403</option>
							<option value="146">AP110404</option>
							<option value="147">AP110501</option>
							<option value="148">AP110502</option>
							<option value="149">AP110503</option>
							<option value="150">AP110504</option>
							<option value="151">AP110601</option>
							<option value="152">AP110602</option>
							<option value="153">AP110603</option>
							<option value="154">AP110604</option>
							<option value="155">AP110701</option>
							<option value="156">AP110702</option>
							<option value="157">AP110703</option>
							<option value="158">AP110704</option>
							<option value="159">AP110801</option>
							<option value="160">AP110802</option>
							<option value="161">AP110803</option>
							<option value="162">AP110804</option>
							<option value="163">AP110901</option>
							<option value="164">AP110902</option>
							<option value="165">AP110903</option>
							<option value="166">AP110904</option>
							<option value="167">AP111001</option>
							<option value="168">AP111002</option>
							<option value="169">AP111003</option>
							<option value="170">AP111004</option>
							<option value="171">AP111101</option>
							<option value="172">AP111102</option>
							<option value="173">AP111103</option>
							<option value="174">AP111104</option>
							<option value="175">AP111201</option>
							<option value="176">AP111202</option>
							<option value="177">AP111203</option>
							<option value="178">AP111204</option>
							<option value="179">AP111301</option>
							<option value="180">AP111302</option>
							<option value="181">AP111303</option>
							<option value="182">AP111304</option>
							<option value="183">AP111401</option>
							<option value="184">AP111402</option>
							<option value="185">AP111403</option>
							<option value="186">AP111404</option>
							<option value="187">AP111501</option>
							<option value="188">AP111502</option>
							<option value="189">AP111503</option>
							<option value="190">AP111504</option>
							<option value="191">AP111601</option>
							<option value="192">AP111602</option>
							<option value="193">AP111603</option>
							<option value="194">AP111604</option>
							<option value="195">AP111701</option>
							<option value="196">AP111702</option>
							<option value="197">AP111703</option>
							<option value="198">AP111704</option>
							<option value="199">AP111801</option>
							<option value="200">AP111802</option>
							<option value="201">AP111803</option>
							<option value="202">AP111804</option>
							<option value="203">AP111901</option>
							<option value="204">AP111902</option>
							<option value="205">AP111903</option>
							<option value="206">AP111904</option>
							<option value="207">AP112001</option>
							<option value="208">AP112002</option>
							<option value="209">AP112003</option>
							<option value="210">AP112004</option>
							<option value="211">AP112101</option>
							<option value="212">AP112102</option>
							<option value="213">AP112103</option>
							<option value="214">AP112104</option>
							<option value="215">AP112201</option>
							<option value="216">AP112202</option>
							<option value="217">AP112203</option>
							<option value="218">AP112204</option>
							<option value="219">AP112301</option>
							<option value="220">AP112303</option>
							<option value="221">AP112302</option>
							<option value="222">AP112304</option>
							<option value="223">AP112401</option>
							<option value="224">AP112402</option>
							<option value="225">AP112403</option>
							<option value="226">AP112404</option>
							<option value="227">AP112501</option>
							<option value="228">AP112502</option>
							<option value="229">AP112503</option>
							<option value="230">AP112504</option>
							<option value="231">AP112601</option>
							<option value="232">AP112602</option>
							<option value="233">AP112603</option>
							<option value="234">AP112604</option>
							<option value="235">AP112701</option>
							<option value="236">AP112702</option>
							<option value="237">AP112703</option>
							<option value="238">AP112704</option>
							<option value="239">AP112801</option>
							<option value="240">AP112802</option>
							<option value="241">AP112803</option>
							<option value="242">AP112804</option>
							<option value="243">AP112901</option>
							<option value="244">AP112903</option>
							<option value="245">AP150201</option>
							<option value="246">AP150202</option>
							<option value="247">AP150203</option>
							<option value="248">AP150204</option>
							<option value="249">AP150301</option>
							<option value="250">AP150302</option>
							<option value="251">AP150303</option>
							<option value="252">AP150304</option>
							<option value="253">AP150401</option>
							<option value="254">AP150402</option>
							<option value="255">AP150403</option>
							<option value="256">AP150404</option>
							<option value="257">AP150501</option>
							<option value="258">AP150502</option>
							<option value="259">AP150503</option>
							<option value="260">AP150504</option>
							<option value="261">AP150601</option>
							<option value="262">AP150602</option>
							<option value="263">AP150603</option>
							<option value="264">AP150604</option>
							<option value="265">AP150701</option>
							<option value="266">AP150702</option>
							<option value="267">AP150703</option>
							<option value="268">AP150704</option>
							<option value="269">AP150801</option>
							<option value="270">AP150802</option>
							<option value="271">AP150803</option>
							<option value="272">AP150804</option>
							<option value="273">AP150901</option>
							<option value="274">AP150902</option>
							<option value="275">AP150903</option>
							<option value="276">AP150904</option>
							<option value="277">AP151001</option>
							<option value="278">AP151002</option>
							<option value="279">AP151003</option>
							<option value="280">AP151004</option>
							<option value="281">AP151101</option>
							<option value="282">AP151102</option>
							<option value="283">AP151103</option>
							<option value="284">AP151104</option>
							<option value="285">AP151201</option>
							<option value="286">AP151202</option>
							<option value="287">AP151203</option>
							<option value="288">AP151204</option>
							<option value="289">AP151301</option>
							<option value="290">AP151302</option>
							<option value="291">AP151303</option>
							<option value="292">AP151304</option>
							<option value="293">AP151401</option>
							<option value="294">AP151402</option>
							<option value="295">AP151403</option>
							<option value="296">AP151404</option>
							<option value="297">AP151501</option>
							<option value="298">AP151502</option>
							<option value="299">AP151503</option>
							<option value="300">AP151504</option>
							<option value="301">AP151601</option>
							<option value="302">AP151602</option>
							<option value="377">AP151603</option>
							<option value="304">AP151604</option>
							<option value="305">AP151701</option>
							<option value="306">AP151702</option>
							<option value="307">AP151703</option>
							<option value="308">AP151704</option>
							<option value="309">AP151801</option>
							<option value="310">AP151802</option>
							<option value="311">AP151803</option>
							<option value="312">AP151804</option>
							<option value="313">AP151901</option>
							<option value="314">AP151902</option>
							<option value="315">AP151903</option>
							<option value="316">AP151904</option>
							<option value="317">AP152001</option>
							<option value="318">AP152002</option>
							<option value="319">AP152003</option>
							<option value="320">AP152004</option>
							<option value="321">AP152101</option>
							<option value="322">AP152102</option>
							<option value="323">AP152103</option>
							<option value="324">AP152104</option>
							<option value="325">AP152201</option>
							<option value="326">AP152202</option>
							<option value="327">AP152203</option>
							<option value="328">AP152204</option>
							<option value="329">AP152301</option>
							<option value="330">AP152302</option>
							<option value="331">AP152303</option>
							<option value="332">AP152304</option>
							<option value="333">AP152401</option>
							<option value="334">AP152402</option>
							<option value="335">AP152403</option>
							<option value="336">AP152404</option>
							<option value="337">AP152501</option>
							<option value="338">AP152502</option>
							<option value="339">AP152503</option>
							<option value="340">AP152504</option>
							<option value="341">AP152601</option>
							<option value="342">AP152602</option>
							<option value="343">AP152603</option>
							<option value="344">AP152604</option>
							<option value="345">AP152701</option>
							<option value="346">AP152702</option>
							<option value="347">AP152703</option>
							<option value="348">AP152704</option>
							<option value="349">AP152801</option>
							<option value="350">AP152802</option>
							<option value="351">AP152803</option>
							<option value="352">AP152804</option>
							<option value="353">AP152901</option>
							<option value="354">AP152903</option>
							<option value="360">ClubB</option>
							<option value="379">AP092604</option>
							<option value="361">ClubC</option>
							<option value="378">Lia</option>
							<option value="381">ADI</option>
							<option value="371">MuLiani</option>
							<option value="373">dennis</option>
							<option value="374">JANICE</option>
							<option value="380">amit</option>
							<option value="382">ADICLUB</option>
							<option value="384">danielle</option>
							</select> 
							</td>
						</tr>
						<tr>
							<td colSpan="4">
							<div align="center">
								<input type="hidden" value="Submit" name="Submit_Cri">
								<input class="textbutton" onclick="if (validateForm(this.form)) submitform();" type="button" value="View" name="Submit">
								<br>
								<br>
&nbsp;</div>
							</td>
						</tr>
					</table>
					</td>
				</form>
			</tr>
			<tr bgColor="#b19952">
				<td bgColor="#b19952">
				<div align="left">
					<table cellSpacing="1" cellPadding="2" width="100%" border="0" id="table4">
						<form name="form1" method="post" action="http://www.ardmorepark.com.sg/view_info.php?facility=&facility_type=&user_id=380&dc1=&dc2=&Submit_Cri=submit">
							<tr class="arial10white" bgColor="#993333">
								<td colSpan="12" height="20">
								<input id="cancel" type="submit" value="Cancel Booking" name="cancel1"> 
								&nbsp;&nbsp;
								<input onclick="displayPopup(1,'print_view.php?facility=&amp;user_id=380&amp;dc1=&amp;dc2=','Booking_Listing',600,740,(version4 ? event : null));" type="button" value="Print" name="print"> 
								</td>
							</tr>
							<tr class="arial10" bgColor="#993333">
								<td width="6%" height="20">
								<div class="arial10" align="center">
									Cancel </div>
								</td>
								<td width="14%">
								<div align="center">
									Facility </div>
								</td>
								<td width="8%">
								<div align="center">
									Date</div>
								</td>
								<td width="5%">
								<div align="center">
									From Time</div>
								</td>
								<td width="5%">
								<div align="center">
									To Time</div>
								</td>
								<td width="9%">
								<div align="center">
									Resident</div>
								</td>
								<td width="8%">
								<div align="center">
									By Who</div>
								</td>
								<td width="8%">
								<div align="center">
									Entry Date</div>
								</td>
								<td width="13%">
								<div align="center">
									Restriction On Cancellation</div>
								</td>
								<td width="5%">
								<div align="center">
									Paid</div>
								</td>
								<td width="9%">
								<div align="center">
									<div align="center">
										cancel for rain</div>
								</div>
								</td>
								<td width="10%">
								<div align="center">
									<div align="center">
										cancel for absent</div>
								</div>
								</td>
							</tr>
							<tr bgColor="#993333">
								<td class="arial10white" colSpan="12" height="28">
								<input id="cancel" type="submit" value="Cancel Booking" name="cancel"> 
								&nbsp;&nbsp;
								<input onclick="displayPopup(1,'print_view.php?facility=&amp;user_id=380&amp;dc1=&amp;dc2=','Booking_Listing',600,740,(version4 ? event : null));" type="button" value="Print" name="print2">
								<strong>Total : </strong></td>
							</tr>
						</form>
					</table>
					<table cellSpacing="0" cellPadding="3" width="100%" border="0" id="table5">
						<tr class="arial10white">
							<td class="arial12black" width="12%">Non-Peak Hour 
							Slot</td>
							<td width="12%">
							<img height="13" src="http://www.ardmorepark.com.sg/images/normal.gif" width="13"></td>
							<td class="arial12black" width="19%">Not Paid </td>
							<td width="17%">
							<img height="21" src="http://www.ardmorepark.com.sg/images/dollar.gif" width="34"> 
							</td>
							<td width="21%">&nbsp;</td>
							<td width="17%">&nbsp;</td>
						</tr>
						<tr class="arial10white">
							<td class="arial12black">Peak Hour Slot</td>
							<td>
							<img height="13" src="http://www.ardmorepark.com.sg/images/prime.gif" width="13"></td>
							<td class="arial12black">&nbsp;</td>
							<td>&nbsp;</td>
							<td class="arial12black">&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</table>
				</div>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	</table>

<? } ?>
				</td>
			</tr>
		</table>
		</td>
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
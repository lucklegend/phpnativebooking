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
		<td class="left" vAlign="top" align="left" width="150" background="http://www.axonprojects.com/ardmorepark/v2/mem/img/leftctrbg2.gif">
		<link href="http://www.axonprojects.com/ardmorepark/v2/textset.css" type="text/css" rel="stylesheet">
		<table cellSpacing="0" cellPadding="0" width="150" border="0" id="table5">
			<tr vAlign="top">
				<td class="lefttop" height="93">&nbsp;</td>
			</tr>
			<tr>
				<td>
				<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table6">
					<tr>
						<td vAlign="top" align="center" style="padding-top:10px;"><?php 
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
						<input onmouseover="this.src='img/but_logout_2.gif'" onclick="location.replace('logout.php')" onmouseout="this.src='img/but_logout_2.gif'" type="image" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_logout_2.gif" name="I1">
						<br>
						&nbsp;</td>
					</tr>
				</table>
				</td>
			</tr>
            <? if($user_type=='1')
				 {
				 include ("internal-adminmenu.php"); 
				}
				else
				{
				include ("internal-memmenu.php");
                } ?>
		</table>
		</td>
		<td class="ctrleft" vAlign="top" align="left" width="29" height="20">
		<img height="82" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/ctrrgttop.gif" width="29"></td>
		<td class="ctr" vAlign="top" align="left">
		<table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table7">
			<tr>
				<td class="ctrtop" vAlign="bottom" height="82">
				<img height="36" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/t/bylaws.gif" width="97"></td>
			</tr>
		</table>
		<!-- 1 -->
		<ol>
        <li style="list-style:upper-roman;"><strong>Introduction</strong><br /><br />
        <ol>
        <li style="list-style:lower-alpha;">The By-laws are compiled by the Management Corporation Strata Title Plan No. 2645 (MC) and are to be<!--<span class="ctrrgt"><img height="82" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/ctrrighttop.gif" width="29"></span>--> read in conjunction with the First Schedule of the Land Titles (Strata) Act Cap. 158. However, the MC shall not be held responsible for any injury or damages arising from compliance with the said By-laws.</li>
        <li style="list-style:lower-alpha;">The By-laws serve to regulate activities as well as the usage of facilities and common areas. As such they should not be viewed as restrictions but a means of promoting harmonious living within the condominium.</li>
        <li style="list-style:lower-alpha;">Your co-operation in observing the By-laws set out in the following pages will help to make the condominium a better place to live in. They have legal binding effect on all owners, tenants and visitors.</li>
        </ol></li>
        &nbsp;<p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="definitions" name="definitions"></a><strong>Definitions</strong>
		<p class="leftmargin1">In these By-laws, unless the context otherwise requires:</p>
		<ol class="lalpha">
			<li>&quot;Management&quot; means the Council as defined in item (i).</li>
			<li>&quot;Subsidiary Proprietor&quot; means the owner or joint owner of a unit 
			by legal title.</li>
			<li>&quot;Tenant&quot; means the legal occupier of a unit by virtue of a lease 
			granted by the Subsidiary Proprietor.</li>
			<li>&quot;Guest&quot; means a person other than the Resident but does not 
			include maids or employees as may be determined by the Management 
			from time to time who is on the premises at the invitation of the 
			Resident.</li>
			<li>&quot;Unit&quot; means an apartment or strata lot within the condominium.</li>
			<li>&quot;Condominium&quot; means Ardmore Park.</li>
			<li>&quot;Common Areas&quot; means all the area in the condominium with the 
			exception of the strata lots.</li>
			<li>&quot;Common Property&quot; is as defined in the Land Titles (Strata) Act.</li>
			<li>&quot;Council&quot; means the Council as defined in the Land Titles (Strata) Act.</li>
			<li>&quot;The Act&quot; means the Land Titles (Strata) Act Cap. 158.</li>
			<li>&quot;Resident&quot; means a subsidiary proprietor and his / her family members or a tenant and his / her family members legally staying at the unit excluding his/her employee.</li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="occupancy" name="occupancy"></a><strong>Occupancy</strong>
		  <br /><br />
		<ol>
        <li style="list-style:lower-alpha;">The unit shall be used only for residential purpose and not for 
		business or any other purpose unless written approval has been obtained 
		from the relevant governing authorities.</li>
		<li style="list-style:lower-alpha;">A resident shall be responsible for the conduct of his family 
		members and guests at all times, ensuring that their behaviour is 
		neither offensive to other occupants of the building nor cause damage to 
		any portion of the private/common property.</li>
		<li style="list-style:lower-alpha;">Residents shall not permit their children or invitees/guests to play 
		in the lifts/lift lobbies, stairways, roads and car porches or in the 
		front areas of the building. Ball games, skate boarding and any activity 
		that would deface or cause damage to the walls of common areas are 
		strictly prohibited.</li>
        <li style="list-style:lower-alpha;">Residents shall at all times ensure that their social 
		activities/games, volumes of their music and any other activities will 
		not cause disturbance and nuisance to other residents. The Management 
		reserves the right and discretion to take whatever action that is 
		necessary to resolve/eliminate such disturbance or nuisance.</li>
		<li style="list-style:lower-alpha;">Owners/residents shall not, without the written consent from the 
		Management carry out any alterations or install any fittings or fixtures 
		that deviate from the approved plans and specifications.<br /> 
		Owners/residents will be responsible for, and shall pay all fines or 
		penalties imposed by any government department for any unauthorised 
		additions and/or alterations found within their apartments.</li>
		<li style="list-style:lower-alpha;">Residents shall ensure that all air-condition equipment, including 
		pipes and hoses are properly maintained. All discharge pipes shall be 
		directed to the nearest floor trap. Any stains arising from poorly 
		maintained air-condition equipment to the common areas shall be 
		cleared/removed by the Management, any costs and expenses thereby 
		incurred shall be recovered from the person(s) concerned.</li>
		<li style="list-style:lower-alpha;">An owner who is not residing in Singapore shall at his own expense 
		have an authorised agent or representative registered with the 
		Management to conduct periodic inspection of his apartment and assume 
		responsibility for the contents therein. Such owners shall file the 
		names, addresses and telephone numbers of their guests with the 
		Management prior to allowing them access to the apartment.</li>
		<li style="list-style:lower-alpha;">The owner or his appointed agent shall be responsible for the 
		conduct of his tenant/s or guest/s and shall upon notice given by the 
		Management, immediately remove, at his own expense, any unauthorised 
		structure/equipment/property placed in the common area.</li>
		<li style="list-style:lower-alpha;">Residents shall not hang any washing, towel, bedding, clothing or 
		other article within their residences in such a way as to be visible 
		from outside the subdivided building.</li>
		<li style="list-style:lower-alpha;">Once an apartment is leased out, the entitlement to the use of the 
		common areas and all the other facilities is automatically transferred 
		to the tenant, and the owner is no longer entitled to use these 
		facilities. All car park labels must be returned to the Management.</li>
		<li style="list-style:lower-alpha;">Residents are not allowed to use any employee of the Management for 
		any business or private errands or to accept any delivery of packages, 
		parcels etc of any kind on behalf of the residents.</li>
		<li style="list-style:lower-alpha;">Solicitation of goods and services, and the holding of religious or 
		political activities shall not be permitted in the premises. </li>
		</ol>
        </li>
<p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="common" name="common"></a><strong>Common Areas</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">The sidewalks, passages, lobbies, stairways and corridors must not 
		be obstructed at any time, or used for any purposes other than their 
		designated usage.</li>
		<li style="list-style:lower-alpha;">Personal property of any kind shall not be placed on or stored in 
		the common areas. The Management shall not accept any liability 
		whatsoever, for loss/damage to any goods or items left at the common 
		areas and it reserves the full right to remove any goods/items left at 
		the common areas.</li>
		<li style="list-style:lower-alpha;">All furniture and equipment placed or installed in the common areas 
		have been provided for the safety, comfort and convenience of all 
		occupants and therefore shall not be damaged or removed without the 
		permission of the Management. Any damage or loss shall be made good by 
		the resident concerned. He shall also be responsible for the acts of his 
		servants, licensee or invitee who caused such damage or loss.</li>
		<li style="list-style:lower-alpha;">Smoking and eating and pets are not allowed in air-conditioned 
		enclosures such as lifts, lobbies and the main lobby of the Clubhouse.
		</li>
		<li style="list-style:lower-alpha;">The private lifts are for the use of the residents and their 
		invitees only and shall not be used to transport bicycles and bulky 
		items. Residents shall use the service lifts for such purpose.</li>
		<li style="list-style:lower-alpha;">All household pets are not permitted to enter the private passenger 
		lifts. They are to be accompanied by their owners/handlers at all times 
		when using the service lifts and in the permitted common areas.</li>
		<li style="list-style:lower-alpha;">In the event of power failure, fire or other emergencies, residents 
		must not use the lifts but should use the stairways to vacate the 
		building.</li>
		<li style="list-style:lower-alpha;">No potted plants or any other objects are to be placed on or near 
		the perimeter of the premises whereby they can fall and cause bodily 
		harm to person(s) below.</li>
		<li style="list-style:lower-alpha;">All potted plants shall be placed in containers so as to prevent the 
		dripping of water or soil onto other apartments or common areas. 
		Residents are advised to take preventive measures to prevent stagnation 
		of water and mosquitoes breeding.</li>
		<li style="list-style:lower-alpha;">Care should be taken when cleaning areas adjoining the external 
		walls so as to prevent water from running down the exterior of the 
		building or into other apartments.</li>
		<li style="list-style:lower-alpha;">Residents and their guests/invitees shall not damage the grass, 
		hedges, footpaths, or any part of the subdivided building or property by 
		the use of vehicles, machines, tools or objects of any description. The 
		resident who is or whose servant, agent, licensee or invitee is 
		responsible for such damage shall make good any damage to the 
		satisfaction of the Management. </li>
		<li style="list-style:lower-alpha;">Any damage caused to the common property shall be assessed by the 
		Management and all cost of repair and/ or replacement of broken or 
		damaged parts shall be borne by the person(s) responsible. </li>
		<li style="list-style:lower-alpha;">In the event that the damage is caused by a wilful act of mischief 
		or vandalism, the Management reserves the full right to file a police 
		report and take all necessary and appropriate actions against the person 
		(s) responsible. </li>
		<li style="list-style:lower-alpha;">It is intended that the exterior facade of the building shall 
		represent a uniform appearance. As such, residents shall not allow any 
		projections to extend through any door, window openings or any erections 
		by the windows that will affect the exterior facade of the building. </li>
		<li style="list-style:lower-alpha;">The Management reserves the full right and authority to demolish or 
		remove all unauthorised additions, alterations, structures or any part 
		thereof after 7 days written notice is given to the Owners/residents to 
		remove the same. All costs and expenses incurred including all legal 
		fees in respect of such removal or demolition shall be borne by the 
		owners/ residents concerned. </li>
		<li style="list-style:lower-alpha;">Private functions held at common areas are restricted to the 
		Clubhouse function rooms.</li>
		<li style="list-style:lower-alpha;">Holding of customary or traditional rites (e.g. funeral wakes) is 
		not allowed within the condominium compound. </li>
		<li style="list-style:lower-alpha;">Solicitation of goods and services in any manner within Ardmore 
		Park is not permitted. </li>
		<li style="list-style:lower-alpha;">Bicycles should be parked at the designated areas provided in 
		basement 1. </li>
		<li style="list-style:lower-alpha;">The Management shall not be liable for any injuries, accidents or 
		loss incurred in any part of the common areas by the residents/ 
		invitees. </li>
		</ol>
        </li>
        <a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="resident" name="resident"></a><strong>Resident Cards</strong>
		<br /><br />
        <ol>
        <li style="list-style:lower-alpha;">To be eligible for the issuance of a Resident Card, the applicant 
		must be residing in the Condominium on a permanent basis and his/her 
		identification card must show the Ardmore Park address.</li>
		<li style="list-style:lower-alpha;">Each residence shall be entitled to 4 Resident Cards free of charge 
		at every change of tenancy or ownership. </li>
		<li style="list-style:lower-alpha;">Resident Card will be issued to residents aged 12 years and above.</li>
		<li style="list-style:lower-alpha;">To replace a lost Resident Card a letter declaring the loss of the 
		Resident Card is required.</li>
		<li style="list-style:lower-alpha;">Any application of a new or replacement of Resident Card shall be 
		subject to a charge to be determined by the Management.</li>
		<li style="list-style:lower-alpha;">When an owner sells his unit, he must inform the Management and 
		return all the Residents Cards issued to him and his family members so 
		that new cards can be issued to the new owner.</li>
		<li style="list-style:lower-alpha;">If an owner subsequently leases out his unit, he has to surrender 
		his resident cards to the Management. New Resident Cards can be issued 
		to his tenants on production of a letter of authorisation from the 
		owner, or alternatively, a copy of the lease/tenancy agreement. The 
		Cards issued to the tenants must be returned to the Management upon 
		termination of the lease.</li>
		<li style="list-style:lower-alpha;">For company owned units or company tenanted properties, the 
		authorisation letter must bear the registered company members or the 
		nominees who will be eligible for the Resident Cards.</li>
		<li style="list-style:lower-alpha;">Applicants must submit two (2) recent I/C size colour photographs 
		and a copy of any legal document to prove their ownership/tenancy of the 
		relevant apartment. </li>
		<li style="list-style:lower-alpha;">The Resident Card is not transferable.</li>
		<li style="list-style:lower-alpha;">Only a valid Resident Card will entitle the resident to the use and 
		booking of condominium facilities. Owners who have leased out their 
		apartments will not be entitled to use the facilities as their rights 
		have been transferred to the tenants.</li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="proximity" name="proximity"></a><strong>Resident Proximity Cards</strong>
		<br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Each residence shall be entitled to 4 Resident Proximity Cards free 
		of charge. </li>
		<li style="list-style:lower-alpha;">To replace a lost Resident Proximity Card a letter declaring the 
		loss of the Resident Proximity Card is required. </li>
		<li style="list-style:lower-alpha;">Any application of a new or replacement of Resident Proximity Card 
		shall be subject to a charge to be determined by the Management.</li>
		<li style="list-style:lower-alpha;">Residents are required to carry their Resident Proximity Cards with 
		them for access to their respective blocks and units.</li>
		<li style="list-style:lower-alpha;">Care must be taken not to bend or expose their cards to sunlight for 
		extended period as this will damage the cards.</li>
        </ol>
        </li>
		<p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="supplementary" name="supplementary"></a><strong>Supplementary Cards</strong>
		<br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Supplementary Cards shall be issued to Residents&acute; employees such as 
		domestic servants / helpers and drivers for authorized access into 
		Ardmore Park and for identification purposes. Management reserves the 
		right to refuse entry into Ardmore Park for employees without valid 
		Supplementary Cards. </li>
		<li style="list-style:lower-alpha;">Such application shall be made on their employees&acute; behalf by the 
		residents. Applicants must submit two (2) I/C size photographs of their 
		employees upon application and submit all information as required by the 
		Management in the application form. </li>
		<li style="list-style:lower-alpha;">To replace a lost Supplementary Card a letter declaring the loss of 
		the Supplementary Card is required.</li>
		<li style="list-style:lower-alpha;">Replacement/renewal of any Supplementary Cards shall be subject to a 
		fee to be decided by Management from time to time.</li>
		<li style="list-style:lower-alpha;">Supplementary Cards are not transferable.</li>
		<li style="list-style:lower-alpha;">Holders of Supplementary Cards will not be entitled to the use and 
		booking of the condominium facilities and not allowed to bring in 
		guests.</li>
		<li style="list-style:lower-alpha;">Holders of Supplementary Cards are required to show their cards to 
		the Management staff or security officer as and when required for 
		security reasons and identification purposes. The Management reserves 
		the right to refuse entry into Ardmore Park to Residents&acute; employees 
		without valid Supplementary Cards.</li>
		<li style="list-style:lower-alpha;">Resident shall inform the Management when the service of the 
		employee is terminated and return the said Supplementary Card to 
		Management for cancellation.</li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="renovation" name="renovation"></a><strong>Renovation</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Owners shall not erect in their apartments any additional structures 
		or make any alteration without the prior written approval of the 
		Management. The Management shall have the authority to demolish or 
		remove any such unauthorised additions or alterations after giving seven 
		(7) days written notice to the owner concerned, requesting him to remove 
		the same. All costs and expenses incurred in respect of such demolition 
		or removal shall be borne by the owner, who shall fully indemnify the 
		Management against all such costs and expenses, and against all loss or 
		damage in respect of such demolition or removal including legal costs 
		incurred by the Management. </li>
		<li style="list-style:lower-alpha;">Owners shall not carry out any work, which may affect the external 
		facade of the building without the prior written approval of the 
		Management. Facade shall include windows, balcony, compartments for 
		air-con condensing units, common areas, open areas and all other visible 
		parts of the building which constitute or form part of the external 
		appearance of the building. </li>
		<li style="list-style:lower-alpha;">Owners shall not install any television or radio antenna on the 
		rooftop or at any external part of the subdivided building.</li>
		<li style="list-style:lower-alpha;">Before carrying out any renovations, alterations or additions to an 
		apartment, the owner is required to apply for the Management consent at 
		least 7 days in advance and to place a $2,000.00 deposit. All renovation 
		work to be carried out shall not exceed a period of more than Three (3) 
		months from the date approval is given. Such deposit will be refunded 
		free of interest, to the owner when the Management is satisfied that the 
		owner or his renovation contractors have not carried out any 
		unauthorised work, damaged any common areas, left debris or caused any 
		inconvenience at the building for which the Management would have to 
		incur cost to rectify. Such rectification cost shall be borne by the 
		owner and the deposit shall be forfeited accordingly.</li>
		<li style="list-style:lower-alpha;">The owners can authorise a representative to endorse on his behalf 
		by forwarding an authorisation letter to the Management. Applications 
		for approval of renovation works and payment of the deposit should be 
		made at the Management Office during office hours. Applications must be 
		submitted in the prescribed form obtainable from the Management Office. 
		All application must be accompanied by copies of all relevant plans, 
		designs and approvals obtained from the relevant authorities in respect 
		of the intended renovations.</li>
		<li style="list-style:lower-alpha;">Owners shall also be required to arrange with the Management for a 
		joint inspection of the apartment at the commencement and on completion 
		of the renovation.</li>
		<li style="list-style:lower-alpha;">The endorsement of the Management does not constitute an approval of 
		the Building Authorities. The owner must bear full responsibility to 
		ensure compliance with the building by-laws and other regulations as may 
		be introduced and applicable from time to time.</li>
		<li style="list-style:lower-alpha;">Renovation works shall only be carried out on the following days and 
		hours:<br />
		<table style="padding-left:20px" cellSpacing="0" cellPadding="0" width="70%" border="0" id="table8">
			<tr>
				<td width="30%">Monday &ndash; Friday :</td>
				<td width="70%">9.00am - 6.00pm</td>
			</tr>
			<tr>
				<td>Saturday :</td>
				<td>9.00am - 1.00pm</td>
			</tr>
		</table>
		<span class="leftmargin1"> (No work shall be carried out on Sundays &amp; Public Holidays) </span>
		</li>
        <li style="list-style:lower-alpha;">Owners and their contractors must inform the Management of their 
		work schedule.</li>
		<li style="list-style:lower-alpha;">All renovation contractors must report at the security check-point 
		before they proceed to carry out work, failing which the Management 
		reserves the right to refuse entry to any unknown person which cannot be 
		verified there and then.</li>
		<li style="list-style:lower-alpha;">All renovation workmen must report at the security check-point to 
		obtain identification passes and must wear their passes at all times 
		whilst in the condominium. Security personnel have the right to question 
		any person in the condominium found without an identification pass.</li>
		<li style="list-style:lower-alpha;">All renovation workmen should only use designated lifts and 
		staircases so as not to cause inconvenience to owners. Packing and 
		crating materials must be removed and disposed of by the 
		residents/contractors on the same day as they are being brought in.</li>
		<li style="list-style:lower-alpha;">Owners shall be responsible for the conduct and behaviour of their 
		appointed contractors. Any worker found misbehaving or refusing to 
		comply with the security procedures will be removed from Ardmore Park 
		and barred from further entry.</li>
		<li style="list-style:lower-alpha;">All owners are not allowed to tap water/electricity supply from the 
		common areas for their special use.</li>
		<li style="list-style:lower-alpha;">No storage space will be provided on site. All articles/materials 
		must be stored within the owner's apartment.</li>
		<li style="list-style:lower-alpha;">Unwanted materials, debris etc. should not be left in the 
		corridors, lift lobbies, fire escape staircases or any other common 
		areas of the condominium. Otherwise they will be removed and the cost 
		charged to the owner concerned.</li>
		<li style="list-style:lower-alpha;">All renovation works should be confined to the boundaries of an 
		apartment. Hacking of structural slabs, columns and beams are strictly 
		prohibited. </li>
		<li style="list-style:lower-alpha;">Owners must ensure that adequate measures are taken to protect the 
		common property during the delivery or removal of materials by their 
		contractors. A door mat must be provided by the contractor at the door 
		entrance of the apartment to prevent worker in that unit form dirtying 
		the common area. The common property affected during the delivery or 
		removal of materials must be left in a clean and tidy condition on the 
		completion of work each day. Any damages to the building and its 
		equipment caused by the moving of furniture or other effects shall be 
		replaced or repaired at the expenses of the owners concerned.</li>
		<li style="list-style:lower-alpha;">The Management reserves the right to stop any works which interfere 
		with the quiet and peaceful enjoyment of any of the owners/ residents.</li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="bulk" name="bulk"></a><strong>Bulk Delivery And House Removal</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Bulk deliveries and house removal should be carried out during the 
		following hours: <br>
		<table style="padding-left:20px" cellSpacing="0" cellPadding="0" width="70%" border="0" id="table9">
			<tr>
				<td width="39%">Monday &ndash; Saturday :</td>
				<td width="61%">9.00am - 1.30pm/1.30pm - 6.00pm</td>
			</tr>
			<tr>
				<td>Sunday &amp; Public Holiday :</td>
				<td>10.00am - 2.00pm/2.00pm - 5.00pm</td>
			</tr>
		</table>
		</li>
        <li style="list-style:lower-alpha;">Before carrying out any bulk delivery and house removal, the owner 
		is required to apply for the Management consent at least 7 days in 
		advance and to place a $2,000.00 deposit. Such deposit will be refunded 
		free of interest, to the owner when the Management is satisfied that the 
		owner or his contractors have not damaged any of the common areas, left 
		behind boxes, rubbish or undesired materials or caused any inconvenience 
		at the building for which the Management would have to incur cost to 
		rectify. Such rectification cost shall be borne by the owner and the 
		deposit shall be forfeited accordingly. </li>
		<li style="list-style:lower-alpha;">The residents can authorise a representative on his behalf by 
		forwarding an authorisation letter to the Management. Applications for 
		approval of bulk removal and house removal together with the deposit 
		should be made at the Management Office during office hours. 
		Applications must be submitted in the prescribed form obtainable from 
		the Management Office. </li><li style="list-style:lower-alpha;">Upon approval, owner/his representative will be informed of the 
		allocated time slot for bulk delivery and house removal. Such allocation 
		of time slot is on a first-come-first-serve basis.</li>
		<li style="list-style:lower-alpha;">All deliveries and removals must be reported at the security 
		checkpoint prior to the work being carried out. Otherwise, the 
		Management reserves the right to refuse entry of any unknown personnel 
		for purpose, which cannot be verified.</li>
		<li style="list-style:lower-alpha;">All contractors and their workmen must report at the security 
		check-point to obtain identification passes, and must wear their passes 
		at all times.</li>
		<li style="list-style:lower-alpha;">Workmen carrying out deliveries/removals should use only designated 
		lifts and staircases so as not to inconvenience residents. Packing and 
		crating materials must be disposed of and removed from the condominium 
		by the residents on the same day that they are brought in. </li>
		<li style="list-style:lower-alpha;">Residents are not allowed to tap water/electricity supply from the 
		common areas for their personal use without authorisation from the 
		Management Office. </li>
		<li style="list-style:lower-alpha;">Unwanted materials, debris, etc., should not be left in the 
		corridors, lift lobbies, fire escape staircase or any other common areas 
		in the building. Otherwise, they will be removed and the cost will be 
		charged to the resident concerned.</li>
		<li style="list-style:lower-alpha;">Residents must ensure that adequate measures are taken to protect 
		the common property during any bulk deliveries or house removal work.
		</li>
		<li style="list-style:lower-alpha;">Resident shall be responsible for the conduct and behaviour of 
		their appointed contractors. Any worker found misbehaving or refusing to 
		comply with the security procedures will be removed from Ardmore Park 
		and barred from further entry.</li>
		<li style="list-style:lower-alpha;">No container is allowed to park overnight in Ardmore Park.</li>
		<li style="list-style:lower-alpha;">Any damages to the building and equipment caused by the moving of 
		furniture or other effects shall be replaced or repaired at the expense 
		of the residents concerned.</li>
		<li style="list-style:lower-alpha;">Insurance<br><br />
		The Management, at its sole discretion, reserves the right to require 
		the contractor to take up the following insurance policies: 
		<ol class="lalpha">
			<li>Workmen&acute;s Compensation </li>
			<li>Third Party Liability up to a minimum cover of $1 million for 
			any one accident. </li>
			<li>Any other insurance which the Management may deem necessary. 
			</li>
		</ol>
		<span class="leftmargin1">Copies of the above insurance policies shall be lodged with the 
		Management before the commencement of Renovation Works, Bulk Delivery 
		and House Removal. </span>
		</li>
        </ol>
        </li>
		<p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="carparking" name="carparking"></a><strong>Car Parking</strong>
		<br /><br />
        <ol>
        <li style="list-style:lower-alpha;">All cars must be parked only at proper car park lots. </li>
		<li style="list-style:lower-alpha;">Taxis are not allowed at the basement car parks at all. Management 
		might allow taxis to enter the basement car parks for the purpose of 
		dropping off passengers only. Such activities are confined only to the 
		pick-up/drop-off point at the Basement 1 car park of each block and may 
		be reviewed from time to time in view of security considerations. </li>
		<li style="list-style:lower-alpha;">Residents are required to register their vehicles with the 
		Management for the Electronic Parking System and car park labels will be 
		issued for authorized access and parking in Ardmore Park or any other 
		ancillary equipment/identification of alternative access system which 
		the Management may upgrade and/or implement from time to time. Car park 
		labels shall only be issued to owners/tenants who are residing at the 
		condominium.</li>
		<li style="list-style:lower-alpha;">Each apartment is entitled to two (2) green car park labels and two 
		(2) grey car park labels for cars and motorcycles. Commercial vehicles 
		(including those owned by residents) are not entitled to any car park 
		labels. Car park labels are issued free of charge. For residents of 
		penthouses, they are entitled to four (4) green car park labels and four 
		(4) grey car park labels. The car park labels must be returned to the 
		Management Office for the purpose of subsequent issues.</li>
		<li style="list-style:lower-alpha;">A car park label issued is not transferable for use on another 
		vehicle.</li>
		<li style="list-style:lower-alpha;">Documentary proof of vehicle ownership should be presented to the 
		Management for the purpose of issuing a car park label.</li>
		<li style="list-style:lower-alpha;">Only vehicles with valid green car park labels will be entitled to 
		car park lots at Basement 1. Vehicles with valid grey car park labels 
		are only allowed to park at Basement 2.</li>
		<li style="list-style:lower-alpha;">Loss of car park labels must be reported to the Management Office 
		as soon as possible. </li>
		<li style="list-style:lower-alpha;">To replace a lost car park label, a letter declaring the loss of 
		the items is required. Any application of a new or replacement of car 
		park label shall be subject to a charge to be determined by the 
		Management.</li>
		<li style="list-style:lower-alpha;">The car park label shall be displayed prominently on the front 
		windscreen of the vehicle for easy identification by security personnel.</li>
		<li style="list-style:lower-alpha;">Taxis are not allowed to park in the car park lots. </li>
		<li style="list-style:lower-alpha;">Parking areas are not to be used for washing of cars, recreation, 
		storage or repair works by residents or their visitors. </li>
		<li style="list-style:lower-alpha;">Visitors&acute; vehicles are only permitted to park at the designated 
		visitors' car park lots in Basement 2.</li>
		<li style="list-style:lower-alpha;">Washing of vehicles should be carried out only at designated 
		washing bays provided. Vehicles shall be removed immediately after 
		washing is completed.</li>
		<li style="list-style:lower-alpha;">No reservation of any parking lot is allowed except for those 
		labeled &quot;Handicapped&quot; where applicable.</li>
		<li style="list-style:lower-alpha;">Handicapped parking lots are strictly to be used by vehicles 
		displaying a valid National Council of Social Services Carpark label or 
		&quot;Handicapped&quot; labels issued by the Management.</li>
		<li style="list-style:lower-alpha;">Upon the sale and/or commencement of new lease or termination of 
		the lease of the apartment, residents have to surrender all their car 
		park labels to the Management.</li>
		<li style="list-style:lower-alpha;">All commercial vehicles are only allowed to park at designated car 
		park lots at Basement 2 or as directed by the security personnel.</li>
		<li style="list-style:lower-alpha;">Motorcycle lots are available at Basement 1 and 2 and all 
		motorcycles are to be parked at these designated lots only. Motorcycles 
		are not allowed to be parked at car park lots.</li>
		<li style="list-style:lower-alpha;">If a vehicle or motorcycle is parked in a lot not designated for 
		its use, the Management reserves the right to proceed to wheel-clamp the 
		vehicle/ motorcycle. All costs and expenses incurred by the Management 
		in respect of such action undertaken shall be completely recovered from 
		the owner of the vehicle/motorcycle who shall also indemnify the 
		Management against all loss or damage to the vehicle/ motorcycle 
		including legal costs incurred by the Management.</li>
		<li style="list-style:lower-alpha;">All vehicles must have their engines switched off as soon as they 
		are parked in the Basement car parks. This applies to all waiting 
		vehicles and those loading and unloading goods and passengers.</li>
		<li style="list-style:lower-alpha;">All vehicles parked in the condominium will be at the owner's 
		risk. The Management shall not be held liable for any theft, damage or 
		other misdemeanour caused to the vehicles and/or their contents.</li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="pet" name="pet"></a><strong>Pet Owners</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">All dogs belonging to the Residents must be registered with the 
		Management. </li>
		<li style="list-style:lower-alpha;">Animals not belonging to the Residents are not permitted in the 
		common areas. </li>
		<li style="list-style:lower-alpha;">Pet owners / carers are to ensure that their pet(s) do not cause 
		nuisance or disturbance to other residents.</li>
		<li style="list-style:lower-alpha;">For the safety of other residents, especially children, the pet 
		owner shall always keep their dog(s) leashed and or muzzled (as 
		specified by Agri-Food &amp; Veterinary Authority of Singapore) at all times 
		whilst in the common areas.</li>
		<li style="list-style:lower-alpha;">Pets shall not be left unattended at any time.</li>
		<li style="list-style:lower-alpha;">Pet owners are responsible for cleaning up all litters and 
		droppings from their pets whilst walking them in the common areas. A 
		fine of S$200.00 shall be imposed upon the owners/ residents for not 
		cleaning up the areas littered by their pets.</li>
		<li style="list-style:lower-alpha;">Residents shall also be held accountable for the cost of repairing 
		any damage caused by their pets including damage to the grass caused by 
		pets and their excrement.</li>
		<li style="list-style:lower-alpha;">Pets classified under Category A or B by the Agri-Food &amp; Veterinary 
		Authority of Singapore (AVA) are not permitted in the condominium. </li>
		<li style="list-style:lower-alpha;">All pets must be registered with Agri-Food &amp; Veterinary Authority 
		of Singapore (AVA). Pet owners shall observe the rules and regulations 
		set forth by Agri-Food &amp; Veterinary Authority of Singapore (AVA).</li>
		<li style="list-style:lower-alpha;">The Management shall be at liberty to remove any pet found without 
		a registration tag on them to either the AVA or Society for the 
		Prevention of Cruelty to Animals.</li>
		<li style="list-style:lower-alpha;">Pets shall not be allowed in or about the recreational facilities 
		such as swimming pool, gymnasium, sauna, tennis courts, children&acute;s 
		playground, toilets, clubhouse, multi-purpose court, etc.</li>
		<li style="list-style:lower-alpha;">The maximum number of household pets shall be determined by the 
		Management from time to time.</li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="employees" name="employees"></a><strong>Employees/ Domestic Helpers/ 
		Drivers</strong>
		<br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Resident shall be responsible for the conduct and behaviour of 
		their employees/domestic helpers/drivers or any appointed persons 
		providing services to them. Any of the aforesaid persons found 
		misbehaving or non-compliance with the By-laws and security and other 
		procedures of Ardmore Park will be removed from Ardmore Park and barred 
		from further entry. </li>
		<li style="list-style:lower-alpha;">All employees/ domestic helpers/ drivers are not permitted to bring 
		guests into the condominium and shall not be entitled to use the 
		facilities of the condominium. </li>
		<li style="list-style:lower-alpha;">All employees/domestic helpers/drivers must be properly attired and 
		observe proper behaviour at all times.</li>
		<li style="list-style:lower-alpha;">Drivers must be at the drivers&acute; rest areas in the Basement 1 car 
		parks when they are taking their breaks, meals, doing their prayers, or 
		on call. They shall not loiter in and around the common areas of the 
		condominium.</li>
		<li style="list-style:lower-alpha;">The rest areas are strictly for the use by drivers with valid 
		supplementary passes.</li>
		<li style="list-style:lower-alpha;">Drivers shall be responsible for the cleanliness of the rest areas. 
		All electrical outlets, tables, chairs and lockers are provided for the 
		use of the drivers and therefore shall not be damaged, removed or moved 
		outside the drivers&acute; rest areas. No personal furniture of drivers or of 
		others is allowed in the rest areas and in the common areas of Ardmore 
		Park.</li>
		<li style="list-style:lower-alpha;">The Management reserves the right to require that the drivers 
		and/or their employers shall make good any damage or loss including a 
		reasonable amount to replace and rectify for such damage or loss caused 
		by them. </li>
		<li style="list-style:lower-alpha;">Pets, alcohol, smoking and any other activities not related to the 
		drivers&acute; rest areas are strictly prohibited in the rest areas. </li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="refuse" name="refuse"></a><strong>Refuse Disposal</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Loose or wet kitchen waste should be sealed in plastic bags before 
		disposing into the refuse chutes. </li>
		<li style="list-style:lower-alpha;">To prevent choking of the refuse chutes and for safety reasons, any 
		bulky refuse, old newspapers, used paper cartons, unwanted clothing and 
		breakable items such as glass bottles should be properly tied up. They 
		should be placed near to the refuse chute at Basement 2 for the cleaners 
		to clear in the morning. </li>
		<li style="list-style:lower-alpha;">Residents shall arrange for unwanted furniture or bulky items to be 
		disposed out of Ardmore Park at their own costs. </li>
		<li style="list-style:lower-alpha;">Flammable items, wet cement and other adhesive materials are not to 
		be disposed into the refuse chutes. Offenders of such act shall be 
		liable for the cost of replacement or repair to the damages caused to 
		the refuse chutes.</li>
		<li style="list-style:lower-alpha;">Residents shall not dispose of rubbish, rags or other refuse or 
		permit the same to be thrown into sinks, lavatory cisterns or water 
		pipes or soil pipes in the building or residences.</li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="general" name="general"></a><strong>General Rules &amp; Regulation 
		Governing <br />
		</strong><br />
		The Use of Recreational Facilities
        <br /><br />
        <ol>
		<li style="list-style:lower-alpha;">Ball games are not allowed to be played within the compounds of the 
		condominium except at areas designated for such games. </li>
		<li style="list-style:lower-alpha;">The recreational facilities are for the exclusive use of residents 
		and their guests. Non-resident owners are deemed to have assigned their 
		rights to their tenants to use the recreational facilities. </li>
		<li style="list-style:lower-alpha;">Only residents with valid Resident Cards may use/book the 
		recreational facilities. </li>
		<li style="list-style:lower-alpha;">Guests of residents must sign in at the Reception Counter location 
		at the Club House and shall be accompanied by the resident when using 
		the specific facility.</li>
		<li style="list-style:lower-alpha;">Children under 12 years should not use any of the recreational 
		facilities unless accompanied by their parents or supervisory adults, 
		who shall be responsible for their safety and proper behaviour. Maids 
		and employees of the residents likewise are not permitted to use the 
		recreational facilities.</li>
		<li style="list-style:lower-alpha;">Residents are responsible for the behaviour of their guests and 
		their compliance of the rules.</li>
		<li style="list-style:lower-alpha;">Residents shall be responsible for any damage caused by themselves 
		or their guests to the recreational facilities. Residents must inform 
		the security or management staff of any existing damage to the facility 
		or equipment that they or their guests are about to use, failing which 
		they may be held responsible for such damage.</li>
		<li style="list-style:lower-alpha;">Residents/guests must be properly attired when using the 
		facilities.</li>
		<li style="list-style:lower-alpha;">The Management will not be held responsible for any loss or damage 
		to any personal property, injury or death arising from the use of the 
		recreational facilities.</li>
		<li style="list-style:lower-alpha;">The Management, security personnel or any appointed 
		representatives of the Managing Agent may require any person using 
		recreational facilities to identify themselves. The Management reserves 
		the right to deny the usage of the recreational facilities to anyone 
		refusing to identify themselves.</li>
		<li style="list-style:lower-alpha;">Except for those games and activities for which the facilities 
		were especially intended for, no other games or activities (such as 
		football, roller- skating, skate boarding and horse-play of any sort) 
		will be allowed in or about the recreational facilities and the 
		surrounding common areas.</li>
		<li style="list-style:lower-alpha;">The Management reserves the right to change or impose any 
		additional rules and regulations for the use and operations of the 
		recreational facilities. .</li>
		<li style="list-style:lower-alpha;">Residents and their guests must abide by all the rules when they 
		utilise the recreational facilities. Each facility has its own set of 
		rules. The Management reserves the right to deny usage to anyone for 
		failure to comply with the rules and regulations set out.</li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="swimmingpool" name="swimmingpool"></a><strong>Swimming Pool / Jacuzzi 
		Pool / Children&acute;s Pool</strong>
        <p class="leftmargin1">Swimming hours: </p>
		<table style="padding-left:20px" cellSpacing="0" cellPadding="0" width="70%" border="0" id="table10">
			<tr>
				<td width="38%">Monday &ndash; Sunday : </td>
				<td width="62%">7.00 am &ndash; 10.00 pm </td>
			</tr>
			<tr>
				<td colSpan="2">(Except when it is being cleaned or serviced):</td>
			</tr>
		</table>
		<br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Strictly no diving is permitted. </li>
		<li style="list-style:lower-alpha;">Only residents and their guests are permitted to use the pools. 
		Invitees must be accompanied by the Residents, who shall ensure that 
		their invitees comply with the rules and regulations contained therein. 
		Each Resident is permitted to bring not more than 3 invitees at any one 
		time. </li>
		<li style="list-style:lower-alpha;">Children under the age of 12 must be accompanied and supervised by 
		their parent or an adult when using the pool. Domestic helpers may be at 
		the pool areas for the purpose of minding young children but shall be 
		restricted from using the pool.</li>
		<li style="list-style:lower-alpha;">Persons suffering from any infectious disease or with bandages or 
		open wound of any type are not permitted to use the pool.</li>
		<li style="list-style:lower-alpha;">Glassware and other breakable or sharp objects are forbidden in the 
		pool or its surrounding areas. All existing pool deck furniture, tables 
		and chairs are not to be shifted or moved from their positions.</li>
		<li style="list-style:lower-alpha;">Portable radios and cassette players are permitted at the pool 
		areas, provided there are no complaints from other users and residents; 
		and Management reserves the right to request the removal of any of these 
		equipment should it deem fit.</li>
		<li style="list-style:lower-alpha;">Footwear, food and drinks are not permitted within a perimeter of 
		two (2) metres from the edge of the pool.</li>
		<li style="list-style:lower-alpha;">All swimmers must put on proper swimming attire when swimming. 
		(T-shirt and shorts are not allowed). Suitable cover-ups or bath ropes 
		must be used while going to and away from the pools.</li>
		<li style="list-style:lower-alpha;">All swimmers must dry themselves and cannot enter the common 
		corridors and private lifts while dripping wet.</li>
		<li style="list-style:lower-alpha;">All swimmers must take a shower before they enter the pool.</li>
		<li style="list-style:lower-alpha;">During thunderstorms, all swimmers are to leave the pool 
		immediately.</li>
		<li style="list-style:lower-alpha;">The Filtration Plant and Pump Rooms of the swimming pools are 
		strictly out of bounds to all persons.</li>
		<li style="list-style:lower-alpha;">Only swimming coaches accredited/sanctioned by the Management are 
		permitted to use the pools for coaching lessons. Only residents are 
		allowed to take coaching lessons in the pool. Invitees and 
		non-residents, even accompanied by residents, are not allowed to 
		participate in coaching sessions. Management reserves the right to bar 
		coaches and residents from usage of the pool for non-compliance.</li>
		<li style="list-style:lower-alpha;">The life buoys are strictly for emergency use only and MUST NOT be 
		removed except for saving lives.</li>
		<li style="list-style:lower-alpha;">Ball sports, Frisbee playing, roller-skating, bicycle riding, 
		skate-boarding, horse playing, pets, large mats or bulky inflatable 
		toys/floats or other forms of activities which are likely to cause 
		nuisance to other users, will not be permitted in the swimming pool or 
		pool area.</li>
		<li style="list-style:lower-alpha;">The Management reserves the right to close the pool for 
		maintenance and repair purpose or other reasons as it may deem fit.</li>
		<li style="list-style:lower-alpha;">Swimmers are not allowed in the pools when cleaning is in 
		progress.</li>
		<li style="list-style:lower-alpha;">The Management will not be held responsible for any injuries, 
		damages or loss of life, limb or property sustained by residents and 
		their guests, howsoever caused when using the pool and its facilities.</li>
		<li style="list-style:lower-alpha;">All swimmers must sign in and sign out for swimming pool towels at 
		the Clubhouse Reception. All towels must be returned within the day of 
		use. The Management reserves the right to recover the costs of lost 
		towels from the residents and such costs shall include all 
		administrative and other ancillary costs related to the recovery of the 
		towels and such costs will be determined by Management. Management 
		further reserves the right to withdraw towel privileges to residents who 
		have not returned towels after use.</li>
        </ol>
        </li>
		<p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="sauna" name="sauna"></a><strong>Saunas</strong>
		<p class="leftmargin1">Opening Time: </p>
		<table style="padding-left:20px" cellSpacing="0" cellPadding="0" width="70%" border="0" id="table11">
			<tr>
				<td width="34%">Monday &ndash; Sunday :</td>
				<td width="66%">8.00 am &ndash; 9.00 pm</td>
			</tr>
		</table>
		<br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Elderly residents should consult a medical practitioner before 
		using the saunas. </li>
		<li style="list-style:lower-alpha;">Children below 18 years of age are not allowed to use the saunas.
		</li>
        <li style="list-style:lower-alpha;">Residents are advised not to take alcohol, tranquilizers, 
		stimulants or other kinds of prescribed drugs prior to using the 
		facility.</li>
		<li style="list-style:lower-alpha;">Eating, drinking and smoking is strictly prohibited.</li>
		<li style="list-style:lower-alpha;">People with hypertension or heart ailments should not use these 
		facilities.</li>
		<li style="list-style:lower-alpha;">Drying of clothes in the saunas are prohibited.</li>
		<li style="list-style:lower-alpha;">The Management will not be held responsible for any injuries, 
		damages or loss of life, limb or property sustained by residents and 
		their guests, however caused when using the facilities. </li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="tennis" name="tennis"></a><strong>Tennis Courts</strong><br /><br />
		<table style="padding-left:20px" cellSpacing="0" cellPadding="0" width="70%" border="0" id="table12">
			<tr>
				<td><span>Playing time: </span></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td width="55%">Monday &ndash; Sunday:</td>
				<td width="45%">7.00am &ndash; 10.00pm </td>
			</tr>
			<tr colspan="2">
				<td>&nbsp;</td>
			</tr>
			<tr colspan="2">
				<td>Peak hours:</td>
			</tr>
			<tr>
				<td width="55%">Monday &ndash; Fridays:</td>
				<td width="45%">6.00pm &ndash; 10.00pm </td>
			</tr>
			<tr>
				<td>Saturday, Sundays &amp; Public Holidays:</td>
				<td>7.00am &ndash; 10.00pm</td>
			</tr>
		</table>
		<span class="leftmargin1">Bookings: </span>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Only residents with valid Resident Cards are permitted to book 
		tennis courts. The tennis courts are strictly for tennis only and any 
		other activities besides tennis are strictly prohibited. Residents are 
		responsible for the usage of the tennis courts and must ensure strict 
		compliance by their guests. Residents will be barred from booking the 
		tennis courts for 2 months for failure to comply with its use. Repeated 
		infringements might result in the cessation of booking privilege. </li>
		<li style="list-style:lower-alpha;">Bookings can be made in person, through fax or telephone or on-line 
		e-booking. All bookings will be accepted on a first-come-first-serve 
		basis. </li>
		<li style="list-style:lower-alpha;">All bookings are not transferable.</li>
		<li style="list-style:lower-alpha;">Each residence is entitled to a maximum of 2 one-hour sessions per 
		week during peak hours and 2 one-hour sessions per week during off-peak 
		hours OR a maximum of 4 one-hour sessions per week during off-peak 
		hours.</li>
		<li style="list-style:lower-alpha;">Booking of 2 courts for the same hour is not permitted and the 
		booking of more than 2 hours per day is not permitted.</li>
		<li style="list-style:lower-alpha;">After a resident&acute;s entitlement for the week has been used up, 
		current bookings of up to 2 consecutive one-hour sessions are permitted 
		within 2 hours before playing time. Such bookings to play are not to be 
		included in the quota referred to in 17.4.</li>
		<li style="list-style:lower-alpha;">Advanced bookings are permitted for up to 3 days, inclusive of the 
		day of booking. </li>
		<li style="list-style:lower-alpha;">Residents who are unable to turn up for their session of play must 
		inform the Management or Clubhouse not less than one hour before the 
		play time. </li>
		<li style="list-style:lower-alpha;">In the case of no turn-ups, the booked hours will automatically be 
		forfeited after a grace of 10 minutes. The court may then be allocated 
		to another resident on a first-come-first-serve basis. </li>
		<li style="list-style:lower-alpha;">Residents who fail to turn up for 2 bookings and without making 
		proper cancellation over a period of 1 month will be barred from making 
		any further bookings for a period of two (2) months commencing from the 
		last booking. </li>
		<li style="list-style:lower-alpha;">In the event of rain, items (17.9) and (17.10) will not apply to 
		tennis bookings. </li>
		<li style="list-style:lower-alpha;">Smoking, drinking (other than water), eating, gambling and other 
		activities not related to tennis are not permitted in the courts. </li>
		<li style="list-style:lower-alpha;">All players must be properly attired for the game. Shoes and balls 
		used must be of the non-marking type. </li>
		<li style="list-style:lower-alpha;">Residents must produce their Resident Cards for identification 
		before the Management personnel switch on the lights for the courts. </li>
		<li style="list-style:lower-alpha;">At least one resident from the apartment who booked the court must 
		be on the court with their guests when their guests are playing. </li>
		<li style="list-style:lower-alpha;">A maximum of 4 persons is allowed on any one court and/or in the 
		tennis facility at any time. Non players are not allowed on the courts 
		and in the tennis facility. </li>
		<li style="list-style:lower-alpha;">Residents will be held responsible for any damages caused by their 
		guests or themselves. Any damages caused by the previous players of the 
		court must be reported to the Clubhouse immediately before the 
		commencement of use. </li>
		<li style="list-style:lower-alpha;">Players must vacate the court when their session of play ends. </li>
		<li style="list-style:lower-alpha;">Only coaches accredited/sanctioned by the Management are permitted 
		to conduct coaching lessons on the courts. Only residents are permitted 
		to take coaching lessons. Invitees and non-residents are not allowed to 
		participate in coaching sessions with residents. Courts booked for 
		coaching lessons are to be used by the residents only, and not for 
		another resident. Management reserves the right to bar coaches and 
		residents from usage of the tennis facility for non-compliance. </li>
		<li style="list-style:lower-alpha;">Coaching lessons are to be conducted in such a manner so as not to 
		cause nuisance or annoyance to the other players on the other court. </li>
		<li style="list-style:lower-alpha;">The Management reserves the right to allocate specific times and 
		tennis courts where coaching is permitted to be conducted. </li>
		<li style="list-style:lower-alpha;">The Management shall not be held responsible for any injuries, 
		damages or loss of life, limb or property sustained by residents and 
		their guests howsoever caused when using the facilities.</li>
        </ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="function" name="function"></a><strong>Function Rooms</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">The function rooms are opened daily from 9.00am &ndash; 10.00pm. The two 
		booking sessions are: 
		<table style="padding-left:20px" cellSpacing="0" cellPadding="0" width="70%" border="0" id="table13">
			<tr>
				<td width="23%">Session 1</td>
				<td width="77%">9.00am &ndash; 3.00pm</td>
			</tr>
			<tr>
				<td width="23%">Session 2</td>
				<td width="77%">4.00pm &ndash; 10.00pm</td>
			</tr>
		</table>
		<span class="leftmargin1">
		Management reserves the right to amend the opening and closing times for 
		the use of function rooms. 
		</span>
		</li>
        <li style="list-style:lower-alpha;">Only residents above the age of 18 with valid Resident Cards are 
		permitted to make bookings. </li>
		<li style="list-style:lower-alpha;">Bookings can be made in person, through fax or telephone or 
		online e-booking. All bookings will be accepted on a 
		first-come-first-serve basis.</li>
		<li style="list-style:lower-alpha;">Each residence is entitled to book 1 session per week.</li>
		<li style="list-style:lower-alpha;">Advance bookings are permitted for up to 2 months inclusive of the 
		day of booking. However, no structured or continuous booking over a 
		period of time is allowed. The Management reserves the right to reject 
		any booking. All bookings are not transferable.</li>
		<li style="list-style:lower-alpha;">A deposit of S$ 200.00 is required when making a booking. This is 
		to ensure that the facility used is left cleaned and in a satisfactory 
		condition as determined by Management. The cost of cleaning and 
		additional charges, if any, will be deducted from the deposit and the 
		balance will be refunded free of interest to the Residents who made the 
		booking. However, in the event that the cost of cleaning or repairs to 
		the damage exceeds the deposited amount, the Residents will be required 
		to pay the difference.</li>
		<li style="list-style:lower-alpha;">Residents must make payment of the deposit at the Management Office 
		within 3 days of the booking, failing which the function room will be 
		made open for booking again. </li>
		<li style="list-style:lower-alpha;">Cancellation of bookings shall be made at least 3 days before the 
		date booked. </li>
		<li style="list-style:lower-alpha;">Residents who fail to turn up after 2 bookings without making 
		proper cancellation will be barred from the use of the function rooms 
		for the next four months commencing from the last date of the booking.
		</li>
		<li style="list-style:lower-alpha;">The facility is only for birthday parties and activities of a 
		social nature by residents and is not permitted to be used for 
		commercial, religious, political, company gatherings, workshops, 
		training sessions, rehearsals, or any functions organised by residents 
		for Voluntary Welfare Organizations (VWOs), community functions, 
		gambling or other illegal activities or any other activities that the 
		Management may determine from time to time. </li>
		<li style="list-style:lower-alpha;">Smoking is strictly prohibited in the function rooms. </li>
		<li style="list-style:lower-alpha;">Resident who made the booking will be held responsible for the 
		cleanliness of the facility and its surroundings. All waste or other 
		refuse must be disposed into watertight plastic bags and deposited into 
		litterbins provided. The resident concerned must remove bulk refuse from 
		Ardmore Park at his/her own costs. </li>
		<li style="list-style:lower-alpha;">Inspection of the function rooms shall be carried out by the 
		Management to determine whether there has been any damage caused to the 
		common property. All additional costs incurred in rectifying any damage 
		shall be borne by the resident concerned. </li>
		<li style="list-style:lower-alpha;">The number of invitees is limited to 50 persons. An invitee list 
		must be given to the Management in order to facilitate security control 
		and the invitee&acute;s easy entry into Ardmore Park. </li>
		<li style="list-style:lower-alpha;">No live band or disco is permitted. Portable radios and sound 
		systems are permitted at the function rooms area provided there are no 
		complaints from others users and residents. The Management reserves the 
		right to request the removal of any of these equipment should it deem 
		fit. </li>
		<li style="list-style:lower-alpha;">The resident host shall ensure that there should not be excessive 
		noise or nuisance caused to other residents. </li>
		<li style="list-style:lower-alpha;">The Management will not be held responsible for any injuries, 
		damage or loss of life, limb or property sustained by residents and 
		their guests, however caused when using the facilities. </li>
		</ol>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="gym" name="gym"></a><strong>Gymnasium</strong><br />
		<br />Opening time: <br>
		7.00am &ndash; 10.00pm daily<br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Only residents with valid Resident Cards are permitted to use the 
		gymnasium. </li>
		<li style="list-style:lower-alpha;">Each resident is permitted to bring in a maximum of 2 invitees at 
		any one time. </li>
		<li style="list-style:lower-alpha;">Residents should read the instructions provided before using the 
		equipment. Due care must be exercised when using the equipment to avoid 
		accidents and damage. </li>
		<li style="list-style:lower-alpha;">Residents are to sign in at the Clubhouse before entering the 
		gymnasium.</li>
		<li style="list-style:lower-alpha;">Proper gym attire and footwear must be worn at all times. Street 
		shoes and slippers and all other marking footwear are strictly 
		prohibited. The Management reserves the right to deny usage for failure 
		to comply with the rules and regulations set out.</li>
		<li style="list-style:lower-alpha;">Eating, smoking, pets and activities not related to the gymnasium 
		are strictly prohibited.</li>
		<li style="list-style:lower-alpha;">Children under 12 years of age are not permitted in the gymnasium.
		</li>
		<li style="list-style:lower-alpha;">Residents are requested to place all equipment back in its proper 
		place after use. </li>
		<li style="list-style:lower-alpha;">Equipment shall not be shifted or removed from their positions or 
		from the gymnasium by the residents. </li>
		<li style="list-style:lower-alpha;">Residents shall be responsible for any loss or damage caused to 
		the equipment and furniture by their children or themselves. </li>
		<li style="list-style:lower-alpha;">Only coaches accredited/sanctioned by the Management are permitted 
		to conduct training sessions in the gymnasium. Only residents are 
		permitted to take training sessions. Invitees and non-residents are not 
		allowed to participate in training sessions with residents. Management 
		reserves the right to bar coaches and residents from usage of the tennis 
		facility for non-compliance. </li>
		<li style="list-style:lower-alpha;">The Management shall not be held responsible for any injuries, 
		damages or loss of life, limb or property sustained by residents and 
		their guests/invitees however caused when using the facilities. </li>
		<li style="list-style:lower-alpha;">All residents must sign in and sign out for the gym towels at the 
		Clubhouse Reception. All towels must be returned within the day of use. 
		The Management reserves the right to recover the costs of towels, 
		including all administrative costs and other ancillary costs related to 
		the recovery of the towels and such costs will be decided by the 
		Management. Management further reserves the right to withdraw towel 
		privileges to residents who have not returned towels after use. </li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="jogging" name="jogging"></a><strong>Jogging Track And Fitness Corner</strong>
		  <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Residents using the jogging track and fitness corner early in the 
		morning and late at night should refrain from creating any disturbance 
		or nuisance to other residents.</li>
		<li style="list-style:lower-alpha;">Children under 8 years old must be accompanied and supervised by 
		their parent or a supervising adult, who shall be responsible for the 
		children&acute;s behaviour when using the fitness corner. Parents or 
		supervising adults are required to stop their children from engaging in 
		noisy, rough or dangerous play at the fitness corner. Domestic helpers 
		may be at the court areas for the purpose of minding young children but 
		shall be restricted from using the fitness corner. </li>
		<li style="list-style:lower-alpha;">Glassware and other breakable or sharp objects are forbidden in the 
		fitness corner or its surrounding areas. </li>
		<li style="list-style:lower-alpha;">Portable radios and cassette players, smoking, drinking (other than 
		water), eating, gambling, pets or other activities not related to the 
		fitness corner are not permitted. </li>
		<li style="list-style:lower-alpha;">Residents shall be responsible for any loss or damage caused to the 
		fitness equipment by their children or themselves and shall be required 
		to bear the costs of repairs for the damage caused. </li>
		<li style="list-style:lower-alpha;">The Management shall not be held responsible for any injuries, 
		damages or loss of life, limb or property sustained by residents and 
		their guests/invitees however caused when using the facilities. </li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="children" name="children"></a><strong>Children&acute;s Playground</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Children less than 8 years old must be accompanied by their parents 
		or supervising adults who shall be responsible for the children&acute;s 
		behaviour.</li>
		<li style="list-style:lower-alpha;">Parents or supervising adults should stop their children from 
		engaging in noisy, rough or dangerous play at the playground. </li>
		<li style="list-style:lower-alpha;">All persons are to leave the playground during heavy rain and 
		thunderstorms. </li>
		<li style="list-style:lower-alpha;">Eating, drinking (other than water), pets, smoking and activities 
		not related to the playground are not permitted. </li>
		<li style="list-style:lower-alpha;">Residents shall be responsible for any loss or damage caused to the 
		equipment at the playground by their children or themselves and shall be 
		required to bear the costs of repairs for the damage caused. </li>
		<li style="list-style:lower-alpha;">The Management shall not be held responsible for any injuries, 
		damages or loss of life, limb or property sustained by residents and 
		their guests/invitees however caused when using the facilities. </li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="koi" name="koi"></a><strong>Koi Pond</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">No feeding of fish is allowed at the koi pond.</li>
		<li style="list-style:lower-alpha;">Parents and supervising adults should stop their children from 
		engaging in rough or dangerous play near the koi pond. </li>
		<li style="list-style:lower-alpha;">No releasing of fish is allowed into the koi pond. </li>
		<li style="list-style:lower-alpha;">The Management shall not be held responsible for any injuries, 
		damages or loss of life, limb or property sustained by residents and 
		their guests/ invitees however caused when using the facilities. </li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="multi" name="multi"></a><strong>Multi-Purpose Court (Mpc)</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">Permitted activities: <br>
		<br>
		Badminton-Basketball area: <br>
		Basketball: Mondays, Wednesdays, Thursdays, Fridays and Sundays <br>
		Badminton: Tuesdays and Saturdays <br>
		<br>
		Other Areas: <br>
		Only ball games, Tai Chi and general exercise are permitted in the other 
		areas. No roller-blading, scootering, cycling and skate boarding are 
		allowed. <br>
		<br>
		Operating hours: <br>
		Monday -Friday: 8.00am -7.00pm <br>
		Saturday / Sunday &amp; Public Holidays: 9.00am -7.00pm<br>
		<br>
		Activities of a quiet nature that do not disturb the quiet environment 
		are allowed outside the operating hours. </li>
		<li style="list-style:lower-alpha;">For the consideration of other residents, residents and invited 
		guests using the MPC should avoid making excessive noise and 
		disturbance. Management reserves the right to stop the activities and 
		evict from the MPC anyone considered to be making excessive noise or 
		causing disturbance. </li>
		<li style="list-style:lower-alpha;">Only residents and their invited guests are permitted to use the 
		MPC. </li>
		<li style="list-style:lower-alpha;">Invited guests must be accompanied by the Resident, who shall 
		ensure that their invitees comply with all the rules and regulations 
		contained herein. </li>
		<li style="list-style:lower-alpha;">Each Resident is permitted to bring not more than 2 invited guests 
		at anyone time. For badminton, a maximum of 4 persons is allowed at any 
		time on the court. </li>
		<li style="list-style:lower-alpha;">Activity at the MPC will be on a first-come-first serve basis. 
		Residents and invited guests are to yield their activities to other 
		residents and invited guests who are waiting if they are on the MPC for 
		more than an hour. </li>
		<li style="list-style:lower-alpha;">Only rubber shoes of a non-marking type are permitted. </li>
		<li style="list-style:lower-alpha;">Residents must produce their Resident Cards for identification when 
		required. </li>
		<li style="list-style:lower-alpha;">Smoking, drinking (other than water) eating, gambling and PETS are 
		not allowed in the MPC. </li>
		<li style="list-style:lower-alpha;">Residents will be held responsible for any damages caused by their 
		invited guests or themselves. Any damages caused by the previous users 
		must be reported to the Clubhouse immediately before the commencement of 
		use. </li>
		<li style="list-style:lower-alpha;">The MPC shall not be used for commercial, religious, political, 
		company gatherings, workshops, training sessions of any nature, 
		rehearsals, or any functions organised by residents for Voluntary 
		Welfare Organisations (VWOs), community functions or other illegal 
		activities or any other activities that the Management may determine 
		from time to time. </li>
		<li style="list-style:lower-alpha;">The Management shall not be held responsible for any injuries, 
		damages or loss of life, limb or property sustained by residents and 
		their guests howsoever caused when using the facilities. </li>
		<li style="list-style:lower-alpha;">The Management reserves the right to change the permitted 
		activities or to allocate specific times for activities if deem 
		necessary. The rules and regulations are subject to change at the 
		Management's sole discretion. </li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a></p>
		<li><a id="hr" name="hr"></a><strong>House Rules for Kitchen at the North Room</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">The kitchen is opened daily from 9 a.m. to 10 p.m.. The two booking 
		sessions are<br>
		<table style="padding-left:20px" cellSpacing="0" cellPadding="0" width="70%" border="0" id="table14">
			<tr>
				<td width="25%">Session 1 </td>
				<td width="75%">9.00 a.m. - 3.00 p.m.</td>
			</tr>
			<tr>
				<td>Session 2</td>
				<td>4.00 p.m. - 10.00 p.m.</td>
			</tr>
		</table>
		</li>
        <li style="list-style:lower-alpha;">The Resident may make a request for extension of time to Management for 
		the use of the kitchen ( and North function room ) for Session 2 up to 
		12 a.m., and approval for such an extension of time will be at the sole 
		discretion of Management and on a case-by-case basis.</li> 
		<li style="list-style:lower-alpha;">The kitchen is for the exclusive use of residents and their guests 
		and only residents with valid Resident Cards may use or book the 
		kitchen. The Resident must be present at all times in the North function 
		room or the kitchen when the kitchen is in use and all guests must be 
		accompanied by the Resident when using the kitchen. The Resident must 
		get prior approval from Management when engaging a Caterer to cook at 
		the kitchen without the presence of the Resident, and such approval is 
		solely at the discretion of Management and on a case-by-case basis. </li>
		<li style="list-style:lower-alpha;">The Resident will be governed by all the By-Laws for Function Rooms 
		when using the kitchen. </li>
		<li style="list-style:lower-alpha;">The deposit of S$200/- made by the Resident for the booking of the 
		North Function Room includes the use of the kitchen.</li>
		<li style="list-style:lower-alpha;">The Resident must sign in at the Reception Counter at the Club House. 
		The Resident is required to complete a Checklist for the Kitchen/ 
		Function Room before and after using the facility. The Resident must 
		inform the security or management staff of any existing damage to the 
		kitchen or equipment that they or their guests are about to use, failing 
		which they will be held responsible for such damage.</li>
		<li style="list-style:lower-alpha;">All equipment in the kitchen should not be moved from their original 
		position.</li>
		<li style="list-style:lower-alpha;">Only light cooking as approved by the Management is permitted in the 
		kitchen. Heavy cooking or any cooking methods involving open fires (for 
		example, flambé, wok stir frying and others) which pose a fire hazard 
		and danger to Ardmore Park are strictly prohibited. </li>
		<li style="list-style:lower-alpha;">Disposal of all left over food and cleaning of the kitchen must be 
		completed before closing time and the Resident must ensure that all 
		appliances are in good working order after their use.</li>
		<li style="list-style:lower-alpha;">In the event that any left-over food are not cleared and/ or the 
		kitchen has not been cleaned to the original condition, the Management 
		will engage a cleaning contractor to clear and clean the kitchen and 
		such costs plus any administrative charges shall be borne by the 
		resident and will be deducted from the deposit of $200/- and the balance 
		of the deposit will be refunded free of interest to the Resident who 
		made the booking. </li>
		<li style="list-style:lower-alpha;">In the event that there is damage to any part of the kitchen and / 
		or appliances including missing parts to appliances, the costs of such 
		repairs and or replacement shall be borne by the Resident, such costs 
		plus any administrative charges will be deducted from the deposit. The 
		Resident will be required to pay the difference should the costs of 
		repairs and or replacement plus administrative fee exceed $200/-.</li>
		<li style="list-style:lower-alpha;">Children under the age of 12 years old are not allowed in the 
		kitchen unless accompanied by an adult.</li>
		<li style="list-style:lower-alpha;">Smoking and pets are not permitted in the kitchen and or function 
		room.</li>
		<li style="list-style:lower-alpha;">The Resident host shall ensure that there should not be excessive 
		noise or nuisance caused to other residents and the Resident is 
		responsible for the behaviour of their guests and their compliance of 
		all the house rules and By-Laws. The Management reserves the right to 
		deny usage to anyone for failure to comply with the rules and 
		regulations set out.</li>
		<li style="list-style:lower-alpha;">The Resident and their guests must be properly attired when using 
		the facilities. </li>
		<li style="list-style:lower-alpha;">The Management will not be held responsible for any injuries, damage 
		or loss of life, limb or property sustained by residents and their 
		guests, however caused when using the equipment and or the kitchen. </li>
		<li style="list-style:lower-alpha;">The Management reserves the right to reject any application and 
		revoke any booking. The Management shall not be liable for any damages 
		or losses arising from the rejection of the application or revocation of 
		the booking of the function room and or kitchen.</li>
		<li style="list-style:lower-alpha;">The Management reserves the right to change or impose any additional 
		rules and regulations for the use and operations of the kitchen. </li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a>
		
		<li><a id="StorageL" name="StorageL"></a><strong>Storage Lockers</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">The rental for lockers is S$180.00 per annum per locker.</li>
        <li style="list-style:lower-alpha;">There will be a refundable deposit of S$100.00 per locker. 
		This deposit will be refunded to the resident upon expiration of the one-year period. </li>
		<li style="list-style:lower-alpha;">Bookings must be made in the appropriate form in person or by fax.<br /> 
		The form is available from the Management office or downloadable from the website. All bookings will be accepted on a first-come-first-serve basis.  </li>
		<li style="list-style:lower-alpha;">Allocation of the locker will be at the absolute discretion of the Management.	</li>
		<li style="list-style:lower-alpha;">In the event that the Resident moves out of Ardmore Park before the expiration of the 
		one (1) year period, the rental for the locker will be refunded to him/her based on a pro-rata basis, 
		working to the nearest complete month of use. Such refund will be made after deductions for 
		costs of repairs to damages, if any, made to the locker during the term when the Resident used the locker.	</li>
		<li style="list-style:lower-alpha;">Renewal for the locker is available at the prevailing rate or any other rate that the Management may decide 
		from time to time.	</li>
		<li style="list-style:lower-alpha;">Each residence is only entitled to 1 locker.	</li>
		<li style="list-style:lower-alpha;">Storage of any items that would cause or likely to cause security risk, physical danger or nuisance 
		to the environment or any other person, are prohibited. Storage of inflammable items is strictly prohibited 
		in the lockers. 	</li>
		<li style="list-style:lower-alpha;">Storage of valuable items inside the locker is to be avoided.	</li>	
		<li style="list-style:lower-alpha;">The Resident stores their items at their own risk and Management is not responsible for any items 
		lost or damaged.	</li>
		<li style="list-style:lower-alpha;">Lockers allocated are non-transferable. 	</li>
		<li style="list-style:lower-alpha;">Lockers are the property of MCST 2645. Residents are not allowed to use their own padlock or make 
		any alteration to the locker.	</li>
		<li style="list-style:lower-alpha;">The Resident should clear their locker and remove all belongings from the locker immediately upon 
		expiry of the rental period or upon moving out of Ardmore Park.	</li>
		<li style="list-style:lower-alpha;">After the expiry date of the rental period, all left behind belongings would be removed and disposed of 
		by the Management at its discretion. The Management should not be held responsible for any loss of or damage 
		to properties so found and/or disposed of.	</li>
		<li style="list-style:lower-alpha;">The Management reserves the right to, without notifying the user in advance, open any locker in case 
		of emergency or any violation of the above regulations.</li>
		<li style="list-style:lower-alpha;">Any violation of these regulations by the Resident will result in termination of the use of locker without 
		any refund of the rental charges.	</li>
		</ol>
        </li>
        <p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a>

		<li><a id="BBQF" name="BBQF"></a><strong>BBQ Facilities</strong>
        <br /><br />
        <ol>
        <li style="list-style:lower-alpha;">The BBQ pits are opened daily from 9.00am &ndash; 10.00pm. The two booking sessions are:<br>
		<table style="padding-left:20px"  cellSpacing="0" cellPadding="0" width="70%" border="0" id="table15">
			<tr>
				<td width="25%">Session 1 </td>
				<td width="75%">9.00 a.m. - 3.00 p.m.</td>
			</tr>
			<tr>
				<td>Session 2</td>
				<td>4.00 p.m. - 10.00 p.m.</td>
			</tr>
		</table>
        </li>
        <li style="list-style:lower-alpha;">Only residents above the age of 18 with valid Resident Cards are permitted to make bookings.  </li>
		<li style="list-style:lower-alpha;">Bookings can be made in person, through fax or telephone or online e-booking.<br /> 
		All bookings will be accepted on a first-come-first-serve basis.  </li>
		<li style="list-style:lower-alpha;">Advance bookings are permitted for up to 2 months inclusive of the day of booking.  However, 
		no structured or continuous booking over a period of time is allowed.  The Management reserves the 
		right to reject any booking.  All bookings are not transferable.</li>
		<li style="list-style:lower-alpha;">Each residence is entitled to book 1 session per week subject to a maximum of 2 bookings for Fridays,
		Saturdays, Sundays, Eve of Public Holiday and Public Holiday over a 2 month-period.	</li>
		<li style="list-style:lower-alpha;">The resident or family members must be present at the function.	</li>
		<li style="list-style:lower-alpha;">The number of people allowed in the BBQ facility is limited to 40 persons. An invitee list must be 
		given to the Management or security staff in order to facilitate security control access into Ardmore Park.</li>
		<li style="list-style:lower-alpha;">A <b>refundable deposit of S$ 200.00</b> is required when making a booking.</li>
		<li style="list-style:lower-alpha;">The Resident must make payment of the deposit at the Management Office within 3 days of the booking, 
		failing which the BBQ facility will be made open for booking again.</li>	
		<li style="list-style:lower-alpha;">Cancellation of bookings shall be made at least 3 days before the date booked.</li>
		<li style="list-style:lower-alpha;">Residents who fail to turn up after 2 bookings without making proper cancellation over a period of 2 
		months will be barred from the use of the BBQ facility for the next four months commencing from the last 
		date of the booking.</li>
		<li style="list-style:lower-alpha;">The Resident must sign in at the Reception Counter at the Club House. The Resident is required to complete 
		a Checklist for the BBQ facility before and after using the facility. The Management or security staff together 
		with the Resident shall carry out an inspection of the BBQ facility before and after the use of the BBQ facility 
		to determine whether there has been any damage caused to the equipment, appliances and/or furniture of the 
		BBQ facility. The Resident must inform the security of management staff of any existing damage to the equipment 
		and furniture that they or their guests are about to use, failing which they will be held responsible for such 
		damage. </li>
		<li style="list-style:lower-alpha;">All equipment, appliances and/or furniture should not be moved from their original position.</li>
		<li style="list-style:lower-alpha;">Disposal of all left over food and cleaning of the BBQ facility, equipment, appliances and furniture 
		must be completed before closing time and the Resident must ensure that all appliances are in good working 
		order after their use.</li>
		<li style="list-style:lower-alpha;">The Resident who made the booking will be held responsible for the cleanliness of the BBQ facility and 
		its surroundings. All waste and/or other refuse must be disposed into watertight plastic bags and only be 
		deposited into the litterbins provided. Littering beyond the BBQ facility and along the slopes of the 
		facility is strictly prohibited. The Resident must remove bulk refuse from Ardmore Park at his/her own costs.</li>
		<li style="list-style:lower-alpha;">In the event that any left-over food are not cleared and the BBQ facility cleaned to the original 
		condition, the Management will engage a cleaning contractor to clear and clean the BBQ facility and such 
		costs plus any administrative charges shall be borne by the Resident and will be deducted from the 
		deposit of S$200.00 and the balance, if any, will be refunded free of interest to the Resident who made the 
		booking. The Resident will be liable to pay the difference should the costs of cleaning plus administrative 
		fee exceeds the deposit of S$200.00.</li>
		<li style="list-style:lower-alpha;">In the event that there is damage to any part of the BBQ equipment, appliances and/or furniture 
		including missing parts to equipment, appliances and/or furniture, the costs of such repairs and/or 
		replacement shall be borne by the Resident, such costs plus any administrative charges will be deducted from 
		the deposit. The Resident will be liable to pay the difference should the costs of repairs and/or 
		replacement plus administrative fee exceed S$200.00.</li>
		<li style="list-style:lower-alpha;">The facility is only for activities of a social nature by residents and is not permitted to be 
		used for commercial, religious, political, company gatherings, workshops, training sessions, rehearsals, or 
		any functions organised by residents for Voluntary Welfare Organizations (VWOs), community functions, gambling 
		or other illegal activities or any other activities that the Management may determine from time to time.</li>	
		<li style="list-style:lower-alpha;">No setting up of tents or overnight camping is permitted.</li>
		<li style="list-style:lower-alpha;">No flammable equipment and portable barbecue burners are permitted at the BBQ facility. </li>
		<li style="list-style:lower-alpha;">Permission must be obtained from the Management prior to hiring of additional tables and chairs to be 
		used at the BBQ facility. </li>
		<li style="list-style:lower-alpha;">Live band, mobile discos and/or any sound systems are strictly prohibited.</li>
		<li style="list-style:lower-alpha;">The Resident shall ensure that there should be no excessive noise or nuisance caused to other residents 
		and the Resident is responsible for the behaviour of their guests and their compliance of all the house 
		rules and By-Laws. The Management reserves the right to deny usage to anyone for failure to comply with the 
		rules and regulations set out.</li>
		<li style="list-style:lower-alpha;">Pets are not permitted into the BBQ facility.</li>
		<li style="list-style:lower-alpha;">Entry into and usage of the BBQ facility are strictly by booking only. No entry is permitted without 
		proper booking and approval from the Management for the use of the BBQ facility.</li>		
		<li style="list-style:lower-alpha;">The Management will not be held responsible for any injuries, damage or loss of life, limb or
		 property sustained by residents and their guests, however caused when using the BBQ facility.</li>
		<li style="list-style:lower-alpha;">The Management in its absolute discretion reserves the right to reject any application and or booking. 
		The Management shall not be liable for any damages arising from the rejection of the application and/or booking.</li>
		<li style="list-style:lower-alpha;">The Management reserves the right to change or impose any additional rules and regulations for the use of 
		the BBQ facility. </li>		
		<p><a href="javascript:history.back(-1)">
		<img onmouseover="this.src='img/but_previousgen2.gif'" onmouseout="this.src='img/but_previousgen1.gif'" height="23" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/but_previousgen1.gif" width="25" align="right" border="0"></a>
		</p>
        </ol>
        </li>
        </ol>
		</td>
		
		<td class="ctrrgt" vAlign="top" align="right" width="29">&nbsp;		</td>
	</tr>
	<tr>
		<td background="http://www.axonprojects.com/ardmorepark/v2/mem/img/leftbotbg.gif"><SPACER type="block" height="20">
		</td>
		<td vAlign="top" align="left" background="http://www.axonprojects.com/ardmorepark/v2/mem/img/ctrbotctr.gif">
		<img height="20" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/ctrleftbot.gif" width="29"></td>
		<td class="ctrbot" vAlign="top">&nbsp;</td>
		<td vAlign="top" align="right" background="http://www.axonprojects.com/ardmorepark/v2/mem/img/ctrbotctr.gif">
		<img height="20" src="http://www.axonprojects.com/ardmorepark/v2/mem/img/ctrrgtbot.gif" width="29"></td>
	</tr>
</table>
<? include ("../footer.php"); ?>
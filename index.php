<?php

	/****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************
	 **** SARAH PLEASE NOTE
	 **** 
	 **** Don't change this PHP code. It is responsible for generating the list of events on today from 
	 **** the 'groups' table in the MySQL database in your web hosting account.
	 ****
	 ****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************/
	 
	require_once "common.php";

	DoRecordPageHitOrBlock();	

	function DoGenerateEventsToday()
	{
		global $g_dbMillhouse;
		$nCount = 0;
		$nDOW = -1;
		$strDayName = date("l");
		if ($strDayName === "Sunday")
			$nDOW = 0;
		else if ($strDayName === "Monday")
			$nDOW = 1;
		else if ($strDayName === "Tuesday")
			$nDOW = 2;
		else if ($strDayName === "Wednesday")
			$nDOW = 3;
		else if ($strDayName === "Thursday")
			$nDOW = 4;
		else if ($strDayName === "Friday")
			$nDOW = 5;
		else if ($strDayName === "Saturday")
			$nDOW = 6;
		$nWOM = intval(date("W"));
		$strFridayFeastMenu = "";
			
		if ($result = DoFindAllQuery($g_dbMillhouse, "millhouse_db.groups"))
		{
			if ($result->num_rows > 0)
			{
				echo "<ul>";
				while ($row = $result->fetch_assoc())
				{
					$nDOW1 = -1;
					if (!is_null($row["dow1"]))
						$nDOW1 = intval($row["dow1"]);
					$nDOW2 = -1;
					if (!is_null($row["dow2"]))
						$nDOW2 = intval($row["dow2"]);
						
					$nWOMRow = -1;
					if (!is_null($row["wom"]))
						$nWOMRow = intval($row["wom"]);
		
					if ((($nDOW1 == $nDOW) || ($nDOW2 == $nDOW) || (($nDOW1 == -1) && ($nDOW2 == -1) && ($nDOW != 0) && ($nDOW != 6))) && 
						(($nWOMRow == $nWOM) || (($nWOMRow == 0) && ($nDOW != -1))))
					{
						if ($row["exclude_xmas_new_year"] && IsXmasNewYear())
						{
							// Do nothing - exclude this event.
						}
						else if ($row["exclude_easter"] && IsEaster())
						{
							// Do nothing - exclude this event.
						}
						else if ($row["exclude_school_holidays"] && IsSchoolHoliday())
						{
							// Do nothing - exclude this event.
						}
						else if (!$row["display"])
						{
							// Do nothing - exclude this event.
						}
						else
						{
							echo "<li>" . $row["description"];
							
							$strTimes = "";

							if (SQLTimeGreaterNow($row["time1"]))
							{
								$strTimes = " at " . $time1->format("h:i a");
							}
							if (SQLTimeGreaterNow($row["time2"]))
							{
								if (strlen($strTimes) > 0)
									$strTimes .= " and ";
								$strTimes .= $time2->format("h:i a");
							}
							if ($strTimes == "")
								$strTimes = " - you missed it...";
								
							echo $strTimes . "</li>";
							$nCount++;
						}
						if ($row["name"] == "feast")
						{
							$strFridayFeastMenu = $row["purpose"];
						}
					}
				}
				echo "</ul>";
				if ($nCount == 0)
					echo "<p>No events today...</p><br/>\n";
			}
			else
				echo "<p>No events at this time.</p>\n";
		}
		if ($strFridayFeastMenu != "")
		{
			echo "<h2>Friday Feast Menu</h2>\n";
			echo "<p>" . $strFridayFeastMenu . "</p>";
		}
	}
?>

<!-- #BeginTemplate "master.dwt" -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Mill House - Neighborhood House. Providing assistance and social engagement to residents of Maryborough and the central goldfields region." />
		<meta name="keywords" content="Maryborough, central goldfields, NIL, no interest loans, employment services, clubs, hobbies, Friday feast, Thursday cafe, volunteering, membership, market days, free food." />
		<meta name="author" content="Sarah McLean" />
		<link rel="canonical" href="https://www.millhouse.org.au/" />

		<link id="style_sheet" href="styles/style4PC.css" rel="stylesheet" type="text/css" />
		<link rel="icon" sizes="128x128" href="./favicon.jpg" />
		<script type="text/javascript" src="common.js"></script>
		<!-- #BeginEditable "CustomTitle" -->
		<title>Home</title>
		
		<style type="text/css">


			
			.popup_photo_name
			{
				display: block;
				z-index: 1;
				color: var(--start_color);
				font-weight: bold;
			}
			
		</style>
		
		<script type="text/javascript">
		
			function DoOnPageLoadComplete()
			{
			}
			
		</script>
		<!-- #EndEditable -->
		<script type="text/javascript">
			
			// mozilla/5.0 (windows nt 10.0; win64; x64) applewebkit/537.36 (khtml, like gecko) chrome/147.0.0.0 safari/537.36
			// Mozilla/5.0 (iPhone; CPU iPhone OS 17_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Mobile/15E148 Safari/604.1
			// Mozilla/5.0 (iPod; CPU iPhone OS 17_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Mobile/15E148 Safari/604.1
			// Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Safari/605.1.15
			// Mozilla/5.0 (Linux; Android 13; SM-S901B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36
			// Mozilla/5.0 (Linux; Android 13; SM-X906B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 (Note the absence of the "Mobile" tag)
			// Mozilla/5.0 (Linux; Android 13; SM-S901B Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/110.0.5481.153 Mobile Safari/537.36
			if (navigator.userAgent.includes("iPhone") ||
				navigator.userAgent.includes("iPod") ||
				navigator.userAgent.includes("Android"))
			{
				document.getElementById("style_sheet").setAttribute("href", <?php echo "\"" . DoGetParentOrCurrentDir() . "\""; ?> + "styles/style4Mobile.css");
			}
			
		</script>
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Gluten:wght@100..900&family=Permanent+Marker&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+J:ital,wght@0,100..400;1,100..400&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet" />
	</head>
	<body onload="DoOnPageLoadComplete()">

		<!-- Begin Container -->
		<div id="container">
			<!-- Begin Masthead -->
			<div class="masthead">
				<table border="0" cellspacing="0" cellpadding="0" class="masthead_table">
					<tr>
						<td class="masthead_cell_image_left">
							<a href="images/MillHouse.jpg"><img src="images/MillHouse.jpg" alt="" class="masthead_image" /></a>
						</td>
						<td class="masthead_cell_heading">
							<table border="0" cellpadding="0" cellspacing="0" class="title_table">
								<tr>
									<td>
										<h1 class="gluten">Mill House</h1>
									</td>
								</tr>
								<tr>
									<td>
										<h3 class="gluten">Neighbourhood House &#128522;</h3>
									</td>
								</tr>
							</table>
						</td>
						<td class="masthead_cell_image_right">
							<a href="images/MillHouseNeighborhoodHouse1.jpg"><img src="images/MillHouseNeighborhoodHouse1.jpg" alt="MillHouseNeighborhoodHouse1.jpg" class="masthead_image" /></a>
						</td>
						<td class="masthead_cell_image_right">
							<a href="images/MillHouseNeighborhoodHouse2.jpg"><img src="images/MillHouseNeighborhoodHouse2.jpg" alt="MillHouseNeighborhoodHouse.jpg" class="masthead_image" /></a>
						</td>
						<!--
						<td class="masthead_cell_image_right">
							<a href="images/Mural.jpg.jpg"><img src="images/Mural.jpg" alt="Mural.jpg" class="masthead_image" /></a>
						</td>
						-->
						<td class="masthead_cell_sponsors">
<div class="sponsors_container">					
	<img src="sponsors/images/NHHV.png" alt="NHHV.png" id="img_NHHV" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/VicStateGov.jpg" alt="VicStateGov.jpg" id="img_VSG" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/CentralGoldfields.png" alt="CentralGoldfields.png" id="img_CGSC" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/FRRR.png" alt="FRRR.png" id="img_FRRR" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/BendigoBank.jpg" alt="BendigoBank.jpg" id="img_BB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/JWR.png" alt="JWR.png" id="img_JWR" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/WattleOffice.jpg" alt="WattleOffice.jpg" id="img_WOS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/FoodBank.png" alt="FoodBank.png" id="img_FB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/FoodShare.png" alt="FoodShare.png" id="img_FS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/Aldi.png" alt="Aldi.png" id="img_ALD" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/ParkviewBakery.jpg" alt="ParkviewBakery.jpg" id="img_PVB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/MaryboroughFloorCoverings.jpg" alt="MaryboroughFloorCoverings.jpg" id="img_MFC" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/SilverService.png" alt="SilverService.png" id="img_SS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="sponsors/images/GoldfieldsScreens.png" alt="GoldfieldsScreens.png" id="img_GSAB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
</div>
						</td>
					</tr>
				</table>				
			</div>
			<!-- End Masthead -->
			<div class="below_masthead">
				<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="vertical-align:top;">
							<!-- Begin Navigation -->
							<div class="navigation" id="navigation">
							
								<table border="0" cellpadding="0" cellspacing="0" style="height:var(--nav_height);">
									<tr>
										<td>
<div id="navigation_menu" class="navigation_menu" ontransitionend="DoOnNavMenuTransitioned()">
	
	<?php echo DoGetDontationHTML(); ?>

	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="about/about.php">About Mill House</a></li>
		<li><a href="Calendar/Calendar.php">Events Calendar</a></li>
		<li><a href="room/room.php">Hire a room</a></li>
		<li><a href="sponsors/sponsors.php">Our Collaborators</a></li>
		<li>
			<a href="contribute/contribute.php" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item"><a href="contribute/join.php"><b>Become a member</b></a></li>
				<li class="submenu_item"><a href="contribute/volunteering.php"><b>Become a volunteer</b></a></li>
				<li class="submenu_item"><a href="request_sponsorship.php"><b>Become a sponsor</b></a></li>
				<li class="submenu_item"><a href="contribute/donation.php"><b>Make a donation</b></a></li>
			</ul>
		</li>
		<!--<li><a href="people/people.php">Mill House People</a></li>-->
		<!--<li><a href="milestones/milestones.php">Milestones</a></li>-->
		<li><a href="contact/Contact.php">Contact</a></li>
		<li><a href="site_history/site_history.php">Site History</a></li>
		<li>
			<a href="governance/governance.php" onclick="DoClickNavLinkWithSubmenu('governance')">Governance</a> 
			<ul style="display:<?php echo DoShowHideSubmenu("governance"); ?>;" id="governance">
				<li class="submenu_item"><a href="https://www.acnc.gov.au/charity/charities/a49d2dd7-2daf-e811-a960-000d3ad24282/profile"><b>ACNC Listing</b></a></li>
				<li class="submenu_item"><a href="governance/rules/rules.php"><b>Rules</b></a></li>
				<li class="submenu_item"><a href="governance/reports/reports.php"><b>Annual Reports</b></a></li>
				<li class="submenu_item"><a href="governance/policies/policies.php"><b>Policies</b></a></li>
				<li class="submenu_item"><a href="governance/plan/plan.php"><b>Strategic Plan</b></a></li>
			</ul>
		</li>
		<li>
			<a href="admin/administration.php" onclick="<?php if (IsLoggedIn()) echo "DoClickNavLinkWithSubmenu('admin')"; ?>">Administration</a>
			<ul style="display:<?php if (isLoggedIn()) echo DoShowHideSubmenu("admin"); else echo "none"; ?>;" id="admin">
				<li class="submenu_item"><a href="admin/edit_groups.php"><b>Add &amp; Edit Groups</b></a></li>
				<li class="submenu_item"><a href="admin/approve_sponsorship.php"><b>Approve a sponsor</b></a></li>
				<li class="submenu_item"><a href="admin/renew_sponsorship.php"><b>Renew a sponsor</b></a></li>
				<li class="submenu_item"><a href="admin/friday_feast_menu.php"><b>Update Friday feast menu</b></a></li>
				<li class="submenu_item"><a href="admin/governance.php"><b>Upload governance documents</b></a></li>
				<li class="submenu_item"><a href="governance/forms/forms.php"><b>Blank Forms</b></a></li>
				<li class="submenu_item"><a href="admin/web_diagnostics.php"><b>Website diagnostics</b></a></li>
				<li class="submenu_item"><a href="admin/html_4_beginners.php"><b>HTML 4 Beginners</b></a></li>
				<li class="submenu_item"><a href="admin/css_4_beginners.php"><b>CSS 4 Beginners</b></a></li>
				<li class="submenu_item"><a href="admin/javascript_4_beginners.php"><b>JavaScript 4 Beginners</b></a></li>
				<li class="submenu_item"><a href="admin/expression_web_4_beginners.php"><b>Expression Web 4 Beginners</b></a></li>
			</ul>
		</li>
	</ul>
</div>
										</td>
										<td>
<div id="navigation_arrow" class="navigation_arrow">
	<span id="span_menu_text" class="span_menu_text" onclick="DoOpenCloseMenu(true)">
		XXXXX	
	</span>
</div>
										</td>												
									</tr>
								</table>
							</div>
							<!-- End Navigation -->
						</td>
						<td style="vertical-align:top;">
							<!-- Begin Content -->
							<div class="content" id="content">
								<br/>						
								<div class="page_heading"><u><script type="text/javascript">document.write(document.title);</script></u></div>

								<!-- #BeginEditable "CustomContent" -->

<h1>Who We Are</h1>

<p>Mill House Neighbourhood House is a welcoming and inclusive community space in the heart of Maryborough.</p>

<p>Click on a face to see their name.</p>

<p><img src="images/MillHouseTeam.jpg" alt="MillHouseTeam.jpg" usemap="#mill_house_team" id="img_mill_house_team" height="250" /></p>

<map name="mill_house_team">
  <area shape="rect" coords="89,93,121,139" alt="Reyne Canning" href="javascript:void(0)" onclick="DoPopupName('p_photo_name', 'Reyne Canning (Vice president of managament committee)')" />
  <area shape="rect" coords="149,101,181,152" alt="Cathy Schwager" href="javascript:void(0)" onclick="DoPopupName('p_photo_name', 'Cathy Schwager (Volunteer & management committee member)')" />
  <area shape="rect" coords="239,72,275,120" alt="John Howden" href="javascript:void(0)" onclick="DoPopupName('p_photo_name', 'John Howden (Mill House administration Assistant)')" />
  <area shape="rect" coords="121,80,151,128" alt="Patrica Rainbow" href="javascript:void(0)" onclick="DoPopupName('p_photo_name', 'Patrica Rainbow (Volunteer)')" />
  <area shape="rect" coords="174,79,207,122" alt="Sarah McLean" href="javascript:void(0)" onclick="DoPopupName('p_photo_name', 'Sarah McLean (Mill House Manager)')" />
  <area shape="rect" coords="202,106,240,161" alt="Kay Cameron" href="javascript:void(0)" onclick="DoPopupName('p_photo_name', 'Kay Cameron (Volunteer)')" />
</map>
<p id="p_photo_name" class="popup_photo_name">&nbsp;</p>

<p>We bring people together, create opportunities to connect and provide practical support for individuals and families across the Central 
Goldfields. Everyone is welcome at Mill House, regardless of age, ability, background or circumstances.</p>

<p>Our aim is to help people feel connected, supported and involved in their local community.</p>

<h1>What We Do</h1>

<p>Mill House offers a wide range of affordable programs, activities and services that respond to the needs of our community.</p>

<p>Our programs include community meals, food relief, social groups, youth activities, creative programs, digital support, volunteering 
opportunities and access to welcoming spaces where people can meet, learn and connect.</p>

<p>We also work closely with local organisations, businesses and community groups to improve access to services and create new opportunities 
for residents.</p>

<p>Whether you are looking for support, wanting to learn something new, hoping to meet people or interested in giving back to the community, 
there is a place for you at Mill House.</p>

<h1>Join the Mill House family</h1>
<p>Come in, get involved and discover what is happening at Mill House.</p>
	
<h1>What's on at Mill House today?</h1>
	<?php
		/****************************************************************************************************
		 ****************************************************************************************************
		 ****************************************************************************************************
		 ****************************************************************************************************
		 **** SARAH PLEASE NOTE
		 **** 
		 **** Don't change this PHP code. It is responsible for generating the list of events on today from 
		 **** the 'groups' table in the MySQL database in your web hosting account.
		 ****
		 ****************************************************************************************************
		 ****************************************************************************************************
		 ****************************************************************************************************
		 ****************************************************************************************************/
		 
		DoGenerateEventsToday(); 
	?>
	
<h1>Everyone is welcome at Mill House &#128522;</h1>
<h2>Mill House Activities</h2>
<?php require "MillHouseActivities.html"; ?>
<h2>Service Providers</h2>
<?php require "MillHouseServiceProviders.html"; ?>
<h2>Mill House Services</h2>
<?php require "MillHouseServices.html"; ?>

<div class="acknowledgment">
	<h1>Acknowledgement</h1>
	<p>We acknowledge the Dja Dja Wurrung of the Kulin Nation, the traditional Custodians of the land on which we work, 
	live and play. We wish to acknowledge and show respect to their elders, past, present and emerging, for their 
	continuing culture and the contributions they make to the life of our community. We also recognize their continuing 
	connection to the land, water and Country."</p>
	<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
		<tr>
			<td style="text-align:center;"><img src="images/IndigenousFlag.jpg" width="150" /></td>
			<td style="text-align:center;"><img src="images/DjaDjaWarrung.png" width="150" /></td>
			<td style="text-align:center;"><img src="images/ToresStraitIslandFlag.jpg" width="150" /></td>
		</tr>
	</table>
</div>

								<!-- #EndEditable -->
							</div>
							<!-- End Content -->
						</td>
					</tr>
				</table>
			</div>
			<script type="text/javascript">
				/* See nav_menu.js */			
				DoOpenCloseMenu(false/* Do not toggle the flag */);
			</script>
			<!-- Begin Footer -->
			<div class="footer">
				<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr class="footer_pc_row">
						<td class="footer_table_cell">&copy;Mill House, Maryborough, VIC</td>
						
						<td class="footer_table_cell footer_middle_cell">COME ALONG AND JOIN THE MILL HOUSE COMMUNITY <h2 style="display:inline;">&#128522;</h2></td>
						
						<td class="footer_table_cell">Web site by: Gregary Boyles 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)</td>
					</tr>
					<tr class="footer_mobile_row">
						<td class="footer_table_cell">&copy;Mill House, Maryborough, VIC</td>
					</tr>
					<tr class="footer_mobile_row">
						<td class="footer_table_cell footer_web_admin" colspan="6">Web site by: Gregary Boyles, 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)</td>
					</tr>
				</table>
			</div>
			<!-- End Footer --></div>
		<!-- End Container -->
	</body>
	
</html>

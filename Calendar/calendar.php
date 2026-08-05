<!--****************************************************************************************************
    ****************************************************************************************************
    ****************************************************************************************************
    ****************************************************************************************************
    **** SARAH PLEASE NOTE
    **** 
    **** There is no need to edit any of the code on thos page, unless you want to alter the look  
    **** of the calendar.
    ****
    **** The contents of the calendar is generated from the 'groups' table in the MySQL database in your 
    **** web hosting account.
    ****
    ****
    ****************************************************************************************************
    ****************************************************************************************************
    ****************************************************************************************************
    ****************************************************************************************************-->

<?php 
	
	require "..\common.php"; 
	
	DoRecordPageHitOrBlock();

?>
<!-- #BeginTemplate "../master.dwt" -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Mill House - Neighborhood House. Providing assistance and social engagement to residents of Maryborough and the central goldfields region." />
		<meta name="keywords" content="Maryborough, central goldfields, NIL, no interest loans, employment services, clubs, hobbies, Friday feast, Thursday cafe, volunteering, membership, market days, free food." />
		<meta name="author" content="Sarah McLean" />
		<link rel="canonical" href="https://www.millhouse.org.au/" />

		<link id="style_sheet" href="../styles/style4PC.css" rel="stylesheet" type="text/css" />
		<link rel="icon" sizes="128x128" href="../favicon.jpg" />
		<script type="text/javascript" src="../common.js"></script>
		<!-- #BeginEditable "CustomTitle" -->
		<title>Events Calendar</title>
		
		<style type="text/css">

			:root
			{
				--border: 1px solid #ccc;
				--background_color: color-mix(in srgb, var(--end_color), white 40%);
				--font_family: "Playwrite GB J", cursive;
				--font_sizing: auto;
				--font_weight: 800;/*100 - 900*/;
				--font_style: normal;
			}
			.calendar
			{
		        border-collapse: collapse; /* Merges borders for a cleaner look */
		        width: 1250px;
		        margin: 20px;
		        border-style: solid;
		        border-width: thin;
		        border-color: var(--end_color);
				font-family: var(--font_family);
				font-optical-sizing: var(--font_sizing);
				font-weight: var(--font_weight);
				font-style: var(--font_style);
			}
			.calendar th
			{
				text-align: center;
				height: 40px;
				color: var(--start_color);
				font-size: large;
			}
			.calendar td
			{
				text-align: left;
				height: 100px; /* Gives cells a consistent height */
			}
		    .calendar th, .calendar td 
		    {
		    	font-size: large;
		        border: var(--border);
		        padding: 5px;
		        width: 14.29%;
		        overflow: hidden;
		        border-style: solid;
		        border-width: thin;
		        border-color: var(--end_color);
		    }
		    .heading_cell
		    {
				font-weight: bold;
				vertical-align: top;
				text-align: right;
				width: 150px;
			}
		    .calendar caption 
		    {
		        font-size: x-large;
		        font-weight: bold;
				margin-bottom: 0px;
				height: 64px;
		        border-style: solid;
		        border-width: thin;
		        border-color: var(--end_color);
		        color: var(--start_color);
				font-size: 30px;
		    }
		    .calendar th, .calendar caption
		    {
		        background-color: var(--background_color);
		    }
			.date_div
			{
				position: relative;
				top: -4px;
				height:20%;
				width: 100%;
				background-color: white;
				border-style: none;
				border-width: thin;
				border-color: green;
				font-family: var(--font_family);
				font-optical-sizing: var(--font_sizing);
				font-weight: var(--font_weight);
				font-style: var(--font_style);
				color: var(--end_color);
				font-size: small;
			}
			.events_div
			{
				position: relative;
				top: 0px;
				height:78%;
				width: 100%;
				background-color: white;
				border-style: none;
				border-width: thin;
				border-color: blue;
				overflow: auto;
			}
			.events_div a
			{
				display: block;
				margin-top: 2px;
				color: var(--start_color);
				font-family: var(--font_family);
				font-optical-sizing: var(--font_sizing);
				font-style: var(--font_style);
				font-weight: 500; /*100 - 900*/
				font-size: x-small;
			}
					    						
			.events_div a:hover
			{
				color: color-mix(in srgb, var(--start_color), white 40%);
			}
			
			input[type=button]
			{
				background-color: color-mix(in srgb, var(--start_color), white 40%);
				color: white;
				border-radius: var(--border_radius);
				border-style: solid;
				border-width: thin;
				border-color: white;
				padding: 10px;
				font-family: var(--font_family);
				font-optical-sizing: var(--font_sizing);
				font-weight: var(--font_weight);
				font-style: var(--font_style);
				font-size: small;
				cursor: pointer;
			}
		
			.event_popup_container
			{
				display: none;
				position: fixed; /* Positions the element relative to the browser window */
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%); /* Centers the popup */
				z-index: 1000; /* Ensures it is above other elements */
			
				background-color: var(--background_color);
				border-style: solid;
				border-width: medium;
				border-color: var(--start_color);
				border-radius: var(--border_radius);
				padding: 10px;
				width: 750px;
				max-height: 400px;
				overflow: auto;
			};
			
			.event_popup_container p
			{
				font-family: "Playwrite GB J", cursive;
				font-optical-sizing: auto;
				font-weight: 300;/*100 - 900*/;
				font-style: normal;
				font-size: small;
		
			}
				
			.event_popup_heading
			{
				text-decoration-color: var(--start_color);
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
							<a href="../images/MillHouse.jpg">
							<img src="../images/MillHouse.jpg" alt="" class="masthead_image" /></a>
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
							<a href="../images/MillHouseNeighborhoodHouse1.jpg">
							<img src="../images/MillHouseNeighborhoodHouse1.jpg" alt="MillHouseNeighborhoodHouse1.jpg" class="masthead_image" /></a>
						</td>
						<td class="masthead_cell_image_right">
							<a href="../images/MillHouseNeighborhoodHouse2.jpg">
							<img src="../images/MillHouseNeighborhoodHouse2.jpg" alt="MillHouseNeighborhoodHouse.jpg" class="masthead_image" /></a>
						</td>
						<!--
						<td class="masthead_cell_image_right">
							<a href="images/Mural.jpg.jpg"><img src="images/Mural.jpg" alt="Mural.jpg" class="masthead_image" /></a>
						</td>
						-->
						<td class="masthead_cell_sponsors">
<div class="sponsors_container">					
	<img src="../sponsors/images/NHHV.png" alt="NHHV.png" id="img_NHHV" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/VicStateGov.jpg" alt="VicStateGov.jpg" id="img_VSG" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/CentralGoldfields.png" alt="CentralGoldfields.png" id="img_CGSC" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/FRRR.png" alt="FRRR.png" id="img_FRRR" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/BendigoBank.jpg" alt="BendigoBank.jpg" id="img_BB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/JWR.png" alt="JWR.png" id="img_JWR" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/WattleOffice.jpg" alt="WattleOffice.jpg" id="img_WOS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/FoodBank.png" alt="FoodBank.png" id="img_FB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/FoodShare.png" alt="FoodShare.png" id="img_FS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/Aldi.png" alt="Aldi.png" id="img_ALD" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/ParkviewBakery.jpg" alt="ParkviewBakery.jpg" id="img_PVB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/MaryboroughFloorCoverings.jpg" alt="MaryboroughFloorCoverings.jpg" id="img_MFC" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/SilverService.png" alt="SilverService.png" id="img_SS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/GoldfieldsScreens.png" alt="GoldfieldsScreens.png" id="img_GSAB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
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
		<li><a href="../index.php">Home</a></li>
		<li><a href="../about/about.php">About Mill House</a></li>
		<li><a href="Calendar.php">Events Calendar</a></li>
		<li><a href="../room/room.php">Hire a room</a></li>
		<li><a href="../sponsors/sponsors.php">Our Collaborators</a></li>
		<li>
			<a href="../contribute/contribute.php" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item"><a href="../contribute/join.php"><b>Become a member</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/volunteering.php"><b>Become a volunteer</b></a></li>
				<li class="submenu_item"><a href="../request_sponsorship.php"><b>Become a sponsor</b></a></li>
				<li class="submenu_item"><a href="../contribute/donation.php"><b>Make a donation</b></a></li>
			</ul>
		</li>
		<!--<li><a href="people/people.php">Mill House People</a></li>-->
		<!--<li><a href="milestones/milestones.php">Milestones</a></li>-->
		<li><a href="../contact/Contact.php">Contact</a></li>
		<li><a href="../site_history/site_history.php">Site History</a></li>
		<li>
			<a href="../governance/governance.php" onclick="DoClickNavLinkWithSubmenu('governance')">Governance</a> 
			<ul style="display:<?php echo DoShowHideSubmenu("governance"); ?>;" id="governance">
				<li class="submenu_item"><a href="https://www.acnc.gov.au/charity/charities/a49d2dd7-2daf-e811-a960-000d3ad24282/profile"><b>ACNC Listing</b></a></li>
				<li class="submenu_item">
				<a href="../governance/rules/rules.php"><b>Rules</b></a></li>
				<li class="submenu_item">
				<a href="../governance/reports/reports.php"><b>Annual Reports</b></a></li>
				<li class="submenu_item">
				<a href="../governance/policies/policies.php"><b>Policies</b></a></li>
				<li class="submenu_item"><a href="../governance/plan/plan.php"><b>Strategic Plan</b></a></li>
			</ul>
		</li>
		<li>
			<a href="../admin/administration.php" onclick="<?php if (IsLoggedIn()) echo "DoClickNavLinkWithSubmenu('admin')"; ?>">Administration</a>
			<ul style="display:<?php if (isLoggedIn()) echo DoShowHideSubmenu("admin"); else echo "none"; ?>;" id="admin">
				<li class="submenu_item"><a href="../admin/edit_groups.php"><b>Add &amp; Edit Groups</b></a></li>
				<li class="submenu_item">
				<a href="../admin/approve_sponsorship.php"><b>Approve a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="../admin/renew_sponsorship.php"><b>Renew a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="../admin/friday_feast_menu.php"><b>Update Friday feast menu</b></a></li>
				<li class="submenu_item"><a href="../admin/governance.php"><b>Upload governance documents</b></a></li>
				<li class="submenu_item">
				<a href="../governance/forms/forms.php"><b>Blank Forms</b></a></li>
				<li class="submenu_item"><a href="../admin/web_diagnostics.php"><b>Website diagnostics</b></a></li>
				<li class="submenu_item">
				<a href="../admin/html_4_beginners.php"><b>HTML 4 Beginners</b></a></li>
				<li class="submenu_item"><a href="../admin/css_4_beginners.php"><b>CSS 4 Beginners</b></a></li>
				<li class="submenu_item">
				<a href="../admin/javascript_4_beginners.php"><b>JavaScript 4 Beginners</b></a></li>
				<li class="submenu_item">
				<a href="../admin/expression_web_4_beginners.php"><b>Expression Web 4 Beginners</b></a></li>
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

<!--****************************************************************************************************
    ****************************************************************************************************
    ****************************************************************************************************
    ****************************************************************************************************
    **** SARAH PLEASE NOTE
    **** 
    **** There is no need to edit any of the code on thos page, unless you want to alter the look  
    **** of the calendar.
    ****
    **** The contents of the calendar is generated from the 'groups' table in the MySQL database in your 
    **** web hosting account.
    ****
    ****
    ****************************************************************************************************
    ****************************************************************************************************
    ****************************************************************************************************
    ****************************************************************************************************-->

<script type="text/javascript">

<?php
		
	function DoObfuscateText($strText)
	{
	    $strEncoded = "";
	    
	    if ($strText !== null)
	    {
		    for ($nI = 0; $nI < strlen($strText); $nI++) 
		    {
		        $strEncoded .= '\\x' . dechex(ord($strText[$nI]));
		    }
		}
		else
			$strEncoded = "";
			
	    return $strEncoded;
	}
	
	$arrayGroups = [];
	if ($result = DoFindAllQuery($g_dbMillhouse, "millhouse_db.groups", "", "description"))
	{
		while ($row = $result->fetch_assoc())
		{
			$arrayGroups[] = $row;
			$nI = count($arrayGroups) - 1;
	
			if ($arrayGroups[$nI]["dow1"] != null)
				$arrayGroups[$nI]["dow1"] = (int)$arrayGroups[$nI]["dow1"];
			else
				$arrayGroups[$nI]["dow1"] = -1;

			if ($arrayGroups[$nI]["dow2"] != null)
				$arrayGroups[$nI]["dow2"] = (int)$arrayGroups[$nI]["dow2"];
			else
				$arrayGroups[$nI]["dow2"] = -1;
				
			if ($arrayGroups[$nI]["wom"] != null)
				$arrayGroups[$nI]["wom"] = (int)$arrayGroups[$nI]["wom"];
			else
				$arrayGroups[$nI]["wom"] = -1;

			if ($arrayGroups[$nI]["display"] != null)
				$arrayGroups[$nI]["display"] = (bool)$arrayGroups[$nI]["display"];
			else
				$arrayGroups[$nI]["display"] = false;

			if ($arrayGroups[$nI]["time1"] == null)
				$arrayGroups[$nI]["time1"] = "";

			if ($arrayGroups[$nI]["time2"] == null)
				$arrayGroups[$nI]["time2"] = "";
		}
	}
	$dateCurrent = new DateTime();
	$nMonhtDays = 0;
	$nYear = intval($dateCurrent->format("Y"));
	
	echo "let arrayYearGroupEvents = [\n";
	
	for ($nMonth = 1; $nMonth <= 12; $nMonth++)
	{
		$nMonthDays = cal_days_in_month(CAL_GREGORIAN, $nMonth, $nYear);
		for ($nDay = 1; $nDay <= $nMonthDays; $nDay++)
		{
			$dateCurrent->setDate($nYear, $nMonth, $nDay);
			$nWOM = (int)(($nDay + 6) / 7);
			$nDOW = intval($dateCurrent->format("w"));
		
			echo "\n    /********** EVENTS FOR " . $dateCurrent->format("d/m/Y") . " Day of week: " . $nDOW . "**********/\n";
			echo "    [";
			$nCount = 0;
			
			for ($nI = 0; $nI < count($arrayGroups); $nI++)
			{
				/***************************************************************************
				 ***************************************************************************
				 ***************************************************************************
				 ***************************************************************************/					 
				$bDebug = false;

				if ($bDebug)
				{
					if (($nDay == 7) || ($nMonth == 3))
					{
						//DumpVar($strVarName, $var, $bNewLine = false, $bIsJavascript, $bDisplayTop, $bDisplayBottom)

						DumpVar("GROUP NAME", $arrayGroups[$nI]["name"], true, true, true, false);

						DumpVar("nDay", $nDay, false, true, false, false);
						DumpVar("nMonth", $nMonth, false, true, false, false);
						DumpVar("nYear", $nYear, false, true, false, false);
						DumpVar("date", $dateCurrent->format("d/M/Y"), false, true, false, false);
						DumpVar("nDOW", $nDOW, false, true, false, false);
						DumpVar("arrayGroups[nI]['dow1']", $arrayGroups[$nI]["dow1"], false, true, false, false);
						DumpVar("arrayGroups[nI]['dow2']", $arrayGroups[$nI]["dow2"], false, true, false, false);
					
						DumpVar("nWOM", $nDOW, false, true, false, false);
						DumpVar("arrayGroups[$nI]['wom']", $arrayGroups[$nI]["wom"], true, true, false, false);
					
						DumpBoolVar("TEST1",
									(($arrayGroups[$nI]["dow1"] == -1) && ($arrayGroups[$nI]["dow2"] == -1) && ($nDOW != 0) && ($nDOW != 6)), 
									false, true, false, false);
						
						DumpBoolVar("TEST2",
									(($arrayGroups[$nI]["dow1"] == $nDOW) || ($arrayGroups[$nI]["dow2"] == $nDOW)), 
									false, true, false, true);							
					}
				}
			 
				if ((($arrayGroups[$nI]["dow1"] == $nDOW) || ($arrayGroups[$nI]["dow2"] == $nDOW)) || 
					(($arrayGroups[$nI]["dow1"] == -1) && ($arrayGroups[$nI]["dow2"] == -1) && ($nDOW != 0) && ($nDOW != 6)))
				{
					$strTime1 = "";
					$strTime2 = "";
					if (($arrayGroups[$nI]["dow1"] == $nDOW) || ($arrayGroups[$nI]["dow1"] == -1))
						$strTime1 = $arrayGroups[$nI]["time1"];
					if (($arrayGroups[$nI]["dow2"] == $nDOW) || ($arrayGroups[$nI]["dow2"] == -1))
						$strTime2 = $arrayGroups[$nI]["time2"];
						
					if (($arrayGroups[$nI]["wom"] == 0) || ($arrayGroups[$nI]["wom"] == $nWOM))
					{
						if ($arrayGroups[$nI]["exclude_school_holidays"] && IsSchoolHoliday($dateCurrent))
						{
							// Do nothing - exclude this group.
						}
						else if ($arrayGroups[$nI]["exclude_xmas_new_year"] && IsXmasNewYear($dateCurrent))
						{
							// Do nothing - exclude this group.
						}
						else if ($arrayGroups[$nI]["exclude_easter"] && IsEaster($dateCurrent))
						{
							// Do nothing - exclude this group.
						}
						else
						{
							$nCount++;
							if ($nCount > 1)
								echo ",\n     ";
							
							$bDebug = true;
							if (!$bDebug)
							{				
								echo "{strGroupName: \"" . DoObfuscateText($arrayGroups[$nI]["description"]) . 
										"\", strGroupID: \"" .  DoObfuscateText($arrayGroups[$nI]["name"]) . 
										"\", nDOW: \"" .  $nDOW .  
										"\", nWOM: \"" .  $arrayGroups[$nI]["wom"] . 
										"\", strTime1: \"" .  $strTime1 . 
										"\", strTime3: \"" .  $strTime2 . 
										 "\", strDuration: \"" . DoObfuscateText($arrayGroups[$nI]["duration"]) . 
									 	"\", strCost: \"" . DoObfuscateText($arrayGroups[$nI]["cost"]) . 
									 	"\", strDonation: \"" . $arrayGroups[$nI]["donation"] . 
									 	"\", strFacebook: \"" . DoObfuscateText($arrayGroups[$nI]["facebook"]) . 
									 	"\", strContact: \"" . DoObfuscateText($arrayGroups[$nI]["contact"]) . 
									 	"\", strEmail: \"" . DoObfuscateText($arrayGroups[$nI]["email"]) . 
									 	"\", strPhone: \"" . DoObfuscateText($arrayGroups[$nI]["phone"]) . 
									 	"\", strPurpose: \"" . DoObfuscateText($arrayGroups[$nI]["purpose"]) . "\"}";
							}
							else
							{
								echo "{strGroupName: \"" . $arrayGroups[$nI]["description"] . 
										"\", strGroupID: \"" .  $arrayGroups[$nI]["name"] . 
										"\", nDOW: \"" .  $nDOW .  
										"\", nWOM: \"" .  (int)$arrayGroups[$nI]["wom"] . 
										"\", strTime1: \"" .  $strTime1 . 
										"\", strTime2: \"" .  $strTime2 . 
										 "\", strDuration: \"" . $arrayGroups[$nI]["duration"] . 
									 	"\", strCost: \"" . $arrayGroups[$nI]["cost"] . 
									 	"\", strDonation: \"" . (bool)$arrayGroups[$nI]["donation"] . 
									 	"\", strFacebook: \"" . $arrayGroups[$nI]["facebook"] . 
									 	"\", strContact: \"" . $arrayGroups[$nI]["contact"] . 
									 	"\", strEmail: \"" . $arrayGroups[$nI]["email"] . 
									 	"\", strPhone: \"" . $arrayGroups[$nI]["phone"] . 
									 	"\", strPurpose: \"" . $arrayGroups[$nI]["purpose"] . "\"}";
							}
						}
					}
				}
			}
			if (($nMonth == 12) && ($nDay == 31))
				echo "]\n";
			else
				echo "],\n";
		}
	}
	echo "];\n"

?>
	function DoGetNumDaysInMonth(nMonth) 
	{
  		const dateNow = new Date();
  		dateNow.setMonth(nMonth);
  		// getMonth() is 0-based (0 for Jan), so adding 1 gives the next month's index
  		return new Date(dateNow.getFullYear(), dateNow.getMonth() + 1, 0).getDate();	
  	}
	
	function DoClearAllDays()
	{
		let strColID = "";
		let colDOM = null;
		
		for (let nCell = 1; nCell <= 35; nCell++)
		{
			strColID = "Cell" + nCell.toString();
			colDOM = document.getElementById(strColID);
			if (colDOM)
			{
				colDOM.innerText = "";
			}
		}
	}

	function DoGetDayOfYear(nDay, nMonth, nYear = new Date().getFullYear()) 
	{
	    // JavaScript months are 0-indexed (January is 0).
	    const dateTarget = new Date(nYear, nMonth - 1, nDay);
	    
	    // Setting day to 0 gets the last day of the previous year.
	    const dateStartOfYear = new Date(nYear, 0, 0);
	
	    // Calculate the difference in milliseconds and convert to days
	    const nDiffMillis = dateTarget - dateStartOfYear;
	    const mMillisPerDay = 1000 * 60 * 60 * 24;
	
	    const nDayOfYear = Math.floor(nDiffMillis / mMillisPerDay);
	
	    return nDayOfYear;
	}
	
	function DoGetEventsForDay(nDOM, nMonth)
	{
		/*
			let arrayYearGroupEvents = [

		    ********** EVENTS FOR 01/01/2026 **********
		    [],
		
		    ********** EVENTS FOR 02/01/2026 **********
		    [],
		
		    ********** EVENTS FOR 03/01/2026 **********
		    [],
		
		    ********** EVENTS FOR 04/01/2026 **********
		    [{strGroupName: "U3A Writers", strTime1: "0000-01-01 10:00:00", strTime2: "", strDuration: "2.00", 
		    	strCost: "0.00", strDonation: "000", strFacebook: "", strContact: "Fred Smith", strEmail: "deb.sealey@hotmail.com", strPhone: "0491105356"}],
		
		    ********** EVENTS FOR 05/01/2026 **********
		    [{strGroupName: "U3A Writers", strTime1: "0000-01-01 10:00:00", strTime2: "", strDuration: "2.00", 
		    	strCost: "0.00", strDonation: "000", strFacebook: "", strEmail: "deb.sealey@hotmail.com", strPhone: "0491105356"}],
		*/
		let nDayOfYear = DoGetDayOfYear(nDOM, nMonth);
		let arrayEvents = arrayYearGroupEvents[nDayOfYear];
		
		return arrayEvents;
	}
		
	function DoClickEvent(event, strGroupName, strTime1, strTime2, strDuration, strCost, strDonation, strFacebook, 
							strContact, strEmail, strPhone, strPurpose)
	{
		event.preventDefault();
		let bDonation = Boolean(strDonation),
			strTimes ="";
		
		if (bDonation)
			strDonation = "yes (optional)";
		else
			strDonation = "no";
		
		let strMessage = "<table border='0' cellpadding='2' cellspacing='0'>";
		strMessage += "<tr><td class='heading_cell'><b>GROUP LEADER:</b></td><td>" + strContact + "</td></tr>";
		if (strPhone != "")
			strMessage += "<tr><td class='heading_cell'><b>PHONE:</b></td><td>" + strPhone + "</td></tr>";
		if (strEmail != "")
			strMessage += "<tr><td class='heading_cell'><b>EMAIL:</b></td><td>" + strEmail + "</td></tr>";
		if (strFacebook != "")
			strMessage += "<tr><td class='heading_cell'><b>FACEBOOK:</b></td><td>" + strFacebook + "</td></tr>";
		
		if (strDuration.includes("hrs"))
			strDuration = strDuration.replace("hrs", "");
		else if (strDuration.includes("hr"))
			strDuration = strDuration.replace("hr", "");	
				
		strTimes = DoGetStartTime(strTime1) + " to " + DoGetEndTime(strTime1, strDuration);

		if (strTime2 != "")
		{
			strTimes += " and " + DoGetStartTime(strTime2) + " to " + DoGetEndTime(strTime2, strDuration);
		}
		strMessage += "<tr><td class='heading_cell'><b>TIME(S):</b></td><td>" + strTimes + "</td></tr>";
		
		if (strCost != "$0.00")
		{
			if (strDonation == "yes")
				strMessage += "<tr><td class='heading_cell'><b>DONATION:</b></td><td>" + strCost + "</td></tr>";
			else
				strMessage += "<tr><td class='heading_cell'><b>COST:</b></td><td>" + strCost + "</td></tr>";
		}
		strMessage += "<tr><td class='heading_cell'><b>DESCRIPTION</b>:</td><td>" + strPurpose + "</td></tr>";
		DoOpenPopup(strGroupName, strMessage);
	}
	
	function DoSetDays(nMonthNum)
	{
		let nDOW = -1;
		let nDayCount = -1;
		let strColID = "";
		let colDOM = null;
		let dateCurrent = new Date();
		let arrayEvents = [];
		let strTime1 = "", strTime2 = "", strTimes = "", strHTML = "";

		nDayCount = DoGetNumDaysInMonth(nMonthNum);
		DoClearAllDays();
		dateCurrent.setDate(1);
		dateCurrent.setMonth(nMonthNum);
		nDOW = dateCurrent.getDay() + 1;
		
		for (let nDOM = 0, nCellNum = nDOW; nDOM < nDayCount; nDOM++, nCellNum++)
		{
			arrayEvents = DoGetEventsForDay(nDOM, nMonthNum + 1);
			strColID = "Cell" + nCellNum.toString();
			colDOM = document.getElementById(strColID);
			if (colDOM)
			{
				//**********************************************************************************
				//* String concatenation directly on colDOM.innerHTML yields unpredictable results!
				//**********************************************************************************			
				strHTML = "<div class=\"date_div\">" + (nDOM + 1).toString() + "</div>";
				strHTML  += "<div class=\"events_div\">";

				for (let nI = 0; nI < arrayEvents.length; nI++)
				{
					// 00-00-0000 00:00:00
					strTime1 = arrayEvents[nI].strTime1.slice(11, 16);
					strTimes = DoGetStartTime(strTime1)  + " to " + DoGetEndTime(strTime1, arrayEvents[nI].strDuration);

					if (arrayEvents[nI].strTime2 != "")
					{
						strTime2 = arrayEvents[nI].strTime2.slice(11, 16);
						strTimes += " and " + DoGetStartTime(strTime2)  + " to " + DoGetEndTime(strTime2, arrayEvents[nI].strDuration);
					}
					else
					{
						strTime2 = "";
					}
					//********** EVENTS FOR 04/01/2026 **********
					// [{strGroupName: "U3A Writers", strTime1: "0000-01-01 10:00:00", strTime2: "", strDuration: "2.00", 
					// strCost: "0.00", strDonation: "000", strFacebook: "", strConact: "Fred Smith", strEmail: "deb.sealey@hotmail.com", strPhone: "0491105356"}],
					//*******************************************				
					strHTML += "<a href=\"#\" title=\"TIME: " + strTimes +  
					"\" onclick=\"DoClickEvent(event, '" + arrayEvents[nI].strGroupName + "', '" + strTime1 + "', '" +  
					strTime2 + "', '" + arrayEvents[nI].strDuration + "hrs', '$" + arrayEvents[nI].strCost + "', '" + 
					arrayEvents[nI].strDonation + "', '" + arrayEvents[nI].strFacebook + "', '" + 
					arrayEvents[nI].strContact + "', '" + arrayEvents[nI].strEmail + "', '" + arrayEvents[nI].strPhone + 
					"', '" + arrayEvents[nI].strPurpose + "') \">" + arrayEvents[nI].strGroupName + "</a>";
				}
				strHTML += "</div>";
				colDOM.innerHTML = strHTML;
			}
		}
	}

	function DoPrevMonth()
	{
		let labelMonth = document.getElementById("month");
		let nMonthNum = -1;
		
		if (labelMonth)
		{
			labelMonth.textContent = labelMonth.textContent.trim();
			if (labelMonth.textContent == "January")
			{
				labelMonth.textContent = " December ";
				nMonthNum = 11;
			}
			else if (labelMonth.textContent == "Febuary")
			{
				labelMonth.textContent = " January ";
				nMonthNum = 0;
			}
			else if (labelMonth.textContent == "March")
			{
				labelMonth.textContent = " Febuary ";
				nMonthNum = 1;
			}
			else if (labelMonth.textContent == "April")
			{
				labelMonth.textContent = " March ";
				nMonthNum = 2;
			}
			else if (labelMonth.textContent == "May")
			{
				labelMonth.textContent = " April ";
				nMonthNum = 3;
			}
			else if (labelMonth.textContent == "June")
			{
				labelMonth.textContent = " May ";
				nMonthNum = 4;
			}
			else if (labelMonth.textContent == "July")
			{
				labelMonth.textContent = " June ";
				nMonthNum = 5;
			}
			else if (labelMonth.textContent == "August")
			{
				labelMonth.textContent = " July ";
				nMonthNum = 6;
			}
			else if (labelMonth.textContent == "September")
			{
				labelMonth.textContent = " August ";
				nMonthNum = 7;
			}
			else if (labelMonth.textContent == "October")
			{
				labelMonth.textContent = " September ";
				nMonthNum = 8;
			}
			else if (labelMonth.textContent == "November")
			{
				labelMonth.textContent = " October ";
				nMonthNum = 9;
			}
			else if (labelMonth.textContent == "December")
			{
				labelMonth.textContent = " November ";
				nMonthNum = 10;
			}
			DoSetDays(nMonthNum);
		}
	}
	
	function DoNextMonth()
	{
		let labelMonth = document.getElementById("month");
		let nMonthNum = -1;
		
		if (labelMonth)
		{
			labelMonth.textContent = labelMonth.textContent.trim();
			if (labelMonth.textContent == "January")
			{
				labelMonth.textContent = " Febuary ";
				nMonthNum = 1;
			}
			else if (labelMonth.textContent == "Febuary")
			{
				labelMonth.textContent = " March ";
				nMonthNum = 2;
			}
			else if (labelMonth.textContent == "March")
			{
				labelMonth.textContent = " April ";
				nMonthNum = 3;
			}
			else if (labelMonth.textContent == "April")
			{
				labelMonth.textContent = " May ";
				nMonthNum = 4;
			}
			else if (labelMonth.textContent == "May")
			{
				labelMonth.textContent = " June ";
				nMonthNum = 5;
			}
			else if (labelMonth.textContent == "June")
			{
				labelMonth.textContent = " July ";
				nMonthNum = 6;
			}
			else if (labelMonth.textContent == "July")
			{
				labelMonth.textContent = " August ";
				nMonthNum = 7;
			}
			else if (labelMonth.textContent == "August")
			{
				labelMonth.textContent = " September ";
				nMonthNum = 8;
			}
			else if (labelMonth.textContent == "September")
			{
				labelMonth.textContent = " October ";
				nMonthNum = 9;
			}
			else if (labelMonth.textContent == "October")
			{
				labelMonth.textContent = " November ";
				nMonthNum = 10;
			}
			else if (labelMonth.textContent == "November")
			{
				labelMonth.textContent = " December ";
				nMonthNum = 11;
			}
			else if (labelMonth.textContent == "December")
			{
				labelMonth.textContent = " January ";
				nMonthNum = 0;
			}
			DoSetDays(nMonthNum);
		}
	}
	
	function DoInitMonth()
	{
		let labelMonth = document.getElementById("month");
		
		if (labelMonth)
		{
			const dateToday = new Date();
			const nMonth = dateToday.getMonth();
			
			switch (nMonth)
			{
				case 0: labelMonth.innerText = "January"; break;
				case 1: labelMonth.innerText = "Febuary"; break;
				case 2: labelMonth.innerText = "March"; break;
				case 3: labelMonth.innerText = "April"; break;
				case 4: labelMonth.innerText = "May"; break;
				case 5: labelMonth.innerText = "June"; break;
				case 6: labelMonth.innerText = "July"; break;
				case 7: labelMonth.innerText = "August"; break;
				case 8: labelMonth.innerText = "September"; break;
				case 9: labelMonth.innerText = "October"; break;
				case 10: labelMonth.innerText = "November"; break;
				case 11: labelMonth.innerText = "December"; break;
			}
			DoSetDays(nMonth);
		}
	}
		
</script>
<h1>Disclaimer</h1>
<p>
	While we endeavour to have the correct times and days they are subject to change without prior notice.
</p>
<table class="calendar" border="1" cellpadding="5" cellspacing="0">
    <caption>
    	<input type="button" id="left" onclick="DoPrevMonth()" value="◄" /> 
    	<label id="month" style="display:inline-block;width:155px;text-align:center;"></label>
    	<input type="button" id="right" onclick="DoNextMonth()" value="►" />
    </caption>
    <thead>
        <tr>
            <th>Sunday</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td id="Cell1"></td>
            <td id="Cell2"></td>
            <td id="Cell3"></td>
            <td id="Cell4"></td>
            <td id="Cell5"></td>
            <td id="Cell6"></td>
            <td id="Cell7"></td>
        </tr>
        <tr>
            <td id="Cell8"></td>
            <td id="Cell9"></td>
            <td id="Cell10"></td>
            <td id="Cell11"></td>
            <td id="Cell12"></td>
            <td id="Cell13"></td>
            <td id="Cell14"></td>
        </tr>
        <tr>
            <td id="Cell15"></td>
            <td id="Cell16"></td>
            <td id="Cell17"></td>
            <td id="Cell18"></td>
            <td id="Cell19"></td>
            <td id="Cell20"></td>
            <td id="Cell21"></td>
        </tr>
        <tr>
            <td id="Cell22"></td>
            <td id="Cell23"></td>
            <td id="Cell24"></td>
            <td id="Cell25"></td>
            <td id="Cell26"></td>
            <td id="Cell27"></td>
            <td id="Cell28"></td>
        </tr>
        <tr>
            <td id="Cell29"></td>
            <td id="Cell30"></td>
            <td id="Cell31"></td>
            <td id="Cell32"></td>
            <td id="Cell33"></td>
            <td id="Cell34"></td>
            <td id="Cell35"></td>
        </tr>
    </tbody>
</table>

<script type="text/javascript">	DoInitMonth(); </script>

<div class="event_popup_container" id="div_event_popup_container">
	<h1 id="event_popup_heading" class="event_popup_heading">EVENT DETAILS</h1>
	<p id="event_details_element"></p>
	<p style="text-align:center;"><input type="button" value="CLOSE" onclick="DoClosePopup()" /></p>
</div>

<script type="text/javascript">

	const div_popup = document.getElementById("div_event_popup_container");
	const p_details = document.getElementById("event_details_element");
	const h1_heading = document.getElementById("event_popup_heading");
	
	function DoOpenPopup(strHeadingHTML, strMessageHTML) 
	{
	  div_popup.style.display = "block";
	  p_details.innerHTML = strMessageHTML;
	  h1_heading.innerHTML = strHeadingHTML;
	}
	
	function DoClosePopup() 
	{
	  div_popup.style.display = "none";
	}

</script>

<!--
<p>If the Google calendar below is not displayed correctly in your web browser then click on this link instead: 
<a href="https://calendar.google.com/calendar/embed?src=reception%40millhousenh.org.au&ctz=Australia%2FMelbourne">MillHouse Calendar</a></p>

<div style="overflow:auto;width:99.8%;height:30%;border-style:solid;border-width:thin;border-color:var(--start_color);">
	<iframe src="https://calendar.google.com/calendar/embed?src=reception%40millhousenh.org.au&ctz=Australia%2FMelbourne" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
</div>
-->



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

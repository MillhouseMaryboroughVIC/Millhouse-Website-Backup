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

	function DoGetTimeRemaining($dateTime1, $dateTime2)
	{
		$strTimeRemaining = "";
		$nHourTime1 = (int)$dateTime1->format("H");
		$nMinuteTime1 = (int)$dateTime1->format("i");
		$nHourTime2 = (int)$dateTime2->format("H");
		$nMinuteTime2 = (int)$dateTime2->format("i");
		
		// 17:30 - 15:30
		// 1050 - 930
		// 120
		$nTotalMinutesTime1 = ($nHourTime1 * 60) + $nMinuteTime1;
		$nTotalMinutesTime2 = ($nHourTime2 * 60) + $nMinuteTime2;
		$nDiffMinutes = $nTotalMinutesTime2 - $nTotalMinutesTime1;

		if ($nDiffMinutes < 0)
		{
			$strTimeRemaining = "0 minutes";
		}
		else if ($nDiffMinutes > 60)
		{
			$nHours = floor($nDiffMinutes / 60);
			$nDiffMinutes -= $nHours * 60;
			if ($nHours == 1)
				$strTimeRemaining = sprintf("%.0f hour", $nHours);
			else
				$strTimeRemaining = sprintf("%.0f hours", $nHours);
			
		}
		if ($nDiffMinutes > 0)
		{
			if ($strTimeRemaining != "")
				$strTimeRemaining .= " and ";
			$strTimeRemaining .= sprintf("%.0f minutes", $nDiffMinutes);
		}
		return $strTimeRemaining;
	}
	
	function DoGetTimeRange($strDateTime, $strDuration)
	{
		$strTime = "";
		
		if (!is_null($strDateTime))
		{
			$datetimeStart = new DateTime($strDateTime);
			$datetimeEnd = new DateTime($strDateTime);
			$datetimeEnd->modify("+ " . ((float)$strDuration * 60) . "minutes");
			$datetimeNow = DoGetMelbourneTimeNow();
			
			$strTime = $datetimeStart->format("g:ia") . " to " . $datetimeEnd->format("g:ia");

			// Has not started yet.
			if (strcmp($datetimeNow->format("H:i"), $datetimeStart->format("H:i")) <= 0)
			{	
			}
			// Has finished.
			else if (strcmp($datetimeNow->format("H:i"), $datetimeEnd->format("H:i")) >= 0)
			{
				$strTime .= " (finished for today)";
			}
			// Is in progress.
			else if (strcmp($datetimeNow->format("H:i"), $datetimeEnd->format("H:i")) < 0)
			{
				$strTime .= " (" . DoGetTimeRemaining($datetimeNow, $datetimeEnd) . " remaining)";
			}
		}
		return $strTime;
	}
	
	function DoFormatDateToday()
	{
		$datetimeNow = DoGetMelbourneTimeNow();
		
		return $datetimeNow->format("l j F Y");
	}
	
	function DoGetGroupLogo($strGroupName)
	{
		$strImgHTML = "";
		$strLogoFilename = DoGetParentOrCurrentDir() . "images/" . $strGroupName;	
	
		if (file_exists($strLogoFilename . ".jpg"))
		{
			$strLogoFilename = $strLogoFilename . ".jpg";
		}
		else if (file_exists($strLogoFilename . ".png"))
		{
			$strLogoFilename = $strLogoFilename . ".png";
		}
		if ($strLogoFilename != "")
		{
			$strImgHTML = "<img src=\"" . $strLogoFilename . "\" alt=\"LOGO\" height=\"50\" />";
		}
		return $strImgHTML;
	}
	
	function DoGenerateEventsToday()
	{
		global $g_dbMillhouse;
		global $g_strQuery;
		$nCount = 0;
		$nDOWToday = -1;
		$nWOMToday = -1;
		$datetimeNow = DoGetMelbourneTimeNow();		
		$strDayName = $datetimeNow->format("l");
		$strTime1 = "";
		$strTime2 = "";
		
		if ($strDayName === "Sunday")
			$nDOWToday = 0;
		else if ($strDayName === "Monday")
			$nDOWToday = 1;
		else if ($strDayName === "Tuesday")
			$nDOWToday = 2;
		else if ($strDayName === "Wednesday")
			$nDOWToday = 3;
		else if ($strDayName === "Thursday")
			$nDOWToday = 4;
		else if ($strDayName === "Friday")
			$nDOWToday = 5;
		else if ($strDayName === "Saturday")
			$nDOWToday = 6;
			
		$nWOMToday = ceil(intval($datetimeNow->format("j")) / 7);
		$strFridayFeastMenu = "";

		$result = DoFindAllQuery($g_dbMillhouse, "groups");
		if ($result)
		{		
			if ($result->num_rows > 0)
			{
				echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"5\" style=\"width:95%;\">\n";
				while ($row = $result->fetch_assoc())
				{
					$nDOWRow1 = -1;
					if (!is_null($row["dow1"]))
						$nDOWRow1 = intval($row["dow1"]);
					$nDOWRow2 = -1;
					if (!is_null($row["dow2"]))
						$nDOWRow2 = intval($row["dow2"]);
						
					$nWOMRow = -1;
					if (!is_null($row["wom"]))
						$nWOMRow = intval($row["wom"]);

					// Less confusing this way...
					$bGo = false;
	
					// Either day of week for the group match the day of the week for today.
					if (($nDOWRow1 == $nDOWToday) || ($nDOWRow2 == $nDOWToday))
					{
						$bGo = true;
					}
					// Both days of the week for this row are -1, which means the group meeting takes place on every
					// day of the week.  
					else if  (($nDOWRow1 == -1)  && ($nDOWRow2 == -1))
					{
						// But exclude Saturday and Sunday.
						if (($nDOWToday == 0) || ($nDOWToday == 6))
						{
							$bGo = false;
						}
						// The group meets today.
						else
						{
							$bGo = true;
						}
					}
					if ($bGo)
					{
						// The week of the month for the row is not 0 and it matches the week of the month for today.
						if (($nWOMToday == $nWOMRow) || ($nWOMRow == 0) || ($nWOMRow == -1))
						{
							$bGo = true;
						}
						// Not the right week of the month for this group.
						else
						{
							$bGo = false;
						}
					}		
					if ($bGo)
					{
						if ($row["exclude_xmas_new_year"] && IsXmasNewYear())
						{
							// Do nothing - exclude this group.
						}
						else if ($row["exclude_easter"] && IsEaster())
						{
							// Do nothing - exclude this group.
						}
						else if ($row["exclude_school_holidays"] && IsSchoolHoliday())
						{
							// Do nothing - exclude this group.
						}
						else if ($row["name"] == "admin")
						{
							// Do nothing - exclude this group.
						}
						else
						{
							echo "    <tr><td style=\"width:30px;vertical-align:middle;text-align:right;\">" . DoGetGroupLogo($row["name"]) . "</td><td style=\"vertical-align:middle;\"><b>" . $row["description"] . "</b> at ";
/*
if ($row["name"] == "axis_employment")
{
	DoDisplayTop(false);
	DumpVar("nDOWToday", $nDOWToday, true);
	DumpVar("nDOWRow1", $nDOWRow1, true);
	DumpVar("nDOWRow2 ", $nDOWRow2, true);
	DumpVar("time1", $row["time1"], true);
	DumpVar("time2", $row["time2"], true);
	DoDisplayBottom(false);
}
*/
							
							// If only $row["dow1"] is set but both $row["time1"] and $row["time2"] are set then 
							// display both times.
							if (($nDOWRow1 > -1) && ($nDOWRow2 == -1) && !is_null($row["time1"]) && !is_null($row["time2"]))
							{
								$strTime1 = DoGetTimeRange($row["time1"], $row["duration"]);
								$strTime2 = DoGetTimeRange($row["time2"], $row["duration"]);
							}
							// If both $row["dow1"] and $row["dow1"] are -1 and only $row["time1"] is set then the group meets 
							// every day of the week at the same time so display only $row["time1"].
							else if (($nDOWRow1 == -1) && ($nDOWRow2 == -1) && !is_null($row["time1"]) && is_null($row["time2"]))
							{
								$strTime1 = DoGetTimeRange($row["time1"], $row["duration"]);
								$strTime2 = "";
							}
							// If both $row["dow1"] and $row["dow1"] are set and only $row["time1"] is set then the group meets 
							// two days of the week at the same time so display only $row["time1"].
							// display both times.
							else if (($nDOWRow1 > -1) && ($nDOWRow2 > -1) && !is_null($row["time1"]) && is_null($row["time2"]))
							{
								$strTime1 = DoGetTimeRange($row["time1"], $row["duration"]);
								$strTime2 = "";
							}
							// If both $row["dow1"] and $row["dow2"] are set and only $row["dow1"] matches the day of 
							// the week today then display $row["time1"] only.
							else if (($nDOWRow1 == $nDOWToday) && (!is_null($row["time1"])))
							{
								$strTime1 = DoGetTimeRange($row["time1"], $row["duration"]);
								$strTime2 = "";
								
							}
							// If both $row["dow1"] and $row["dow2"] are set and only $row["dow2"] matches the day of 
							// the week today then display $row["time2"] only.
							else if (($nDOWRow1 > -1) && ($nDOWRow2 > -1) && ($nDOWRow2 == $nDOWToday))
							{
								$strTime1 = DoGetTimeRange($row["time2"], $row["duration"]);
								$strTime2 = "";
							}								
							echo $strTime1 . (($strTime2 == "") ? "" : " and " . $strTime2) . "</td><tr>\n";
							$nCount++;
						}
						if ($row["name"] == "feast")
						{
							$strFridayFeastMenu = $row["comments"];
						}
					}
				}
				echo "</table>\n";
				if ($nCount == 0)
					echo "<p>No events today...</p><br/>\n";
			}
		}
		if ($strFridayFeastMenu != "")
		{
			echo "<h2>Friday Feast Menu</h2>\n";
			echo "<p>" . $strFridayFeastMenu . "</p>";
		}
	}

	if (isset($_POST["submit_email_github_password"]))
	{
		mail($g_strEmailManager, "GitHub account password", "Pulsar112358#");
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
		<title>HOME</title>
		<style type="text/css">
		</style>
		<script type="text/javascript">
		
			function DoOnPageLoadComplete()
			{
			}
			
		</script>
		<!-- #EndEditable -->
		<script type="text/javascript">
			
			DoDetectDevice(<?php echo "\"" . DoGetParentOrCurrentDir() . "\""; ?>);
			
		</script>
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Gluten:wght@100..900&family=Permanent+Marker&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+J:ital,wght@0,100..400;1,100..400&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet" />

	</head>
	<body onload="DoOnPageLoadComplete()">

		<!-- Begin Container -->
		<div id="div_container">
			<!-- Begin Masthead -->
			<div class="masthead" id="div_masthead">
				<table border="0" cellspacing="0" cellpadding="0" class="masthead_table">
					<tr>
						<td class="masthead_cell_image_left">
							<a href="images/MillHouse.jpg"><img src="images/MillHouse.jpg" alt="" class="masthead_image" /></a>
						</td>
						<td class="masthead_cell_heading">
							<table border="0" cellpadding="0" cellspacing="0" class="title_table">
								<tr>
									<td>
										<h1 class="gluten" id="h1_title">Mill House</h1>
									</td>
								</tr>
								<tr>
									<td>
										<h3 class="gluten" id="h3_title">Neighbourhood House &#128522;</h3>
									</td>
								</tr>
							</table>
						</td>
						<td class="masthead_cell_image_right1">
							<a href="images/MillHouseNeighborhoodHouse1.jpg"><img src="images/MillHouseNeighborhoodHouse1.jpg" alt="MillHouseNeighborhoodHouse1.jpg" class="masthead_image" /></a>
						</td>
<script type="text/javascript">

	DoDisplayMastheadEnd(`<?php echo DoGenerateSponsors(true); ?>`, "<?php echo DoGetParentOrCurrentDir(); ?>");
	
</script>
					</tr>
				</table>				
			</div>
			<!-- End Masthead -->
			<div class="below_masthead" id="div_below_masthead">
				<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="vertical-align:top;">
							<!-- Begin Navigation -->
							<div class="navigation" id="div_navigation">
							
								<table border="0" cellpadding="0" cellspacing="0" style="height:var(--nav_height);">
									<tr>
										<td>
<div id="div_navigation_menu" class="navigation_menu">
	
	<?php echo DoGetDontationHTML(); ?>

	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="about/about.php">About Mill House</a></li>
		<li><a href="calendar/calendar.php">Events Calendar</a></li>
		<li><a href="room/room.php">Hire a room</a></li>
		<li><a href="sponsors/sponsors.php">Our Collaborators</a></li>
		<li>
			<a href="contribute/contribute.php" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item"><a href="contribute/join.php"><b>Become a member</b></a></li>
				<li class="submenu_item"><a href="contribute/volunteering.php"><b>Become a volunteer</b></a></li>
				<li class="submenu_item"><a href="contribute/request_sponsorship.php"><b>Become a sponsor</b></a></li>
				<li class="submenu_item"><a href="contribute/donation.php"><b>Make a donation</b></a></li>
			</ul>
		</li>
		<!--<li><a href="people/people.php">Mill House People</a></li>-->
		<!--<li><a href="milestones/milestones.php">Milestones</a></li>-->
		<li><a href="contact/contact.php">Contact</a></li>
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
		<!--<li><a href="group_events/group_events.php">Group Events</a></li>-->
		<li>
			<a href="administration/administration.php" onclick="DoClickNavLinkWithSubmenu('administration')">Administration</a>
			<ul style="display:<?php echo DoShowHideSubmenu("administration"); ?>;" id="administration">
			
			<?php DoDisplayAdministrationSubmenu(); ?>
			
			</ul>
		</li>
	</ul>
</div>
										</td>
										<td>
<div id="div_navigation_arrow" class="navigation_arrow" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onmouseleave="DoStopSpeaking()" onclick="DoOpenCloseMenu(true)" onkeyup="DoKeyPress(event)">
	<span id="span_menu_text" class="span_menu_text blink">
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
							<div class="content" id="div_content">
								<br/>
								
								<?php require_once DoGetParentOrCurrentDir() . "VoiceAssistForm.html"; ?>
								
								<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td>
											<div class="page_heading" id="div_page_heading" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onmouseleave="DoStopSpeaking()"><u><script type="text/javascript">document.write(document.title);</script></u></div>
										</td>
										<td style="text-align:right;">
											<?php
											
												if (isLoggedIn())
												{
													echo "<button title=\"Page editing instructions.\" class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";

													if (basename($_SERVER["PHP_SELF"]) == "index.php")
													{
														echo "<button title=\"Website and app source code.\" class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_source_code', true)\">SOURCE CODE</button>\n";
													}
												}

											?>
										</td>
									</tr>
								</table>			
								<form class="form_voice_assist_button"><button type="button" title="Show the voice assist settings." onclick="DoDisplayHidePopup('form_voice_assist', true)"><img src="images/LoudSpeaker.png" alt="LoudSpeaker.png" height="70" /></button></form>

								<!-- #BeginEditable "CustomContent" -->

<h1>Welcome Mill House</h1>
<p>A welcoming community space in the heart of Maryborough.</p>

<h1 id="whats_on">What's on at Mill House today <?php echo DoFormatDateToday(); ?>?</h1>
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

<?php
	if (IsAdminLoggedIn())
	{
		echo "<h1>Mill House App</h1>\n";
		echo "<p>The mobile app is available for administration staff to try and review. Click the link below to go to the mobile app page...</p>\n";
		echo "<p><a href=\"MobileApp/MobileApp.php\"><img src=\"MobileApp/images/MillHouseApp.png\" alt=\"MillHouseApp.png\" title=\"Go to the mobile app page.\" height=\"100\" /></a></p>\n";
	}
	else
	{
		echo "<h1>The Mill House App</h1>\n";
		echo "<p>It is coming soon, so watch this space!</p>\n";
		echo "<p><img src=\"MobileApp/images/MillHouseApp.png\" alt=\"MillHouseApp.png\" height=\"100\" /></p>\n";
	}
?>

<h1>Who We Are</h1>

<p>Mill House Neighbourhood House is a welcoming and inclusive community space in the heart of Maryborough.</p>

<p>We bring people together, provide practical support and create opportunities for people of all ages and backgrounds 
to connect, learn and participate.</p>

<p>Our staff and volunteers</p>

<p>Click a face to learn their name.</p>

<p>Or turn on 'voice assist' and hover over a face to hear their name.</p>

<!--
<p><img src="images/MillHouseTeam.jpg" alt="MillHouseTeam.jpg" usemap="#mill_house_team" id="img_mill_house_team" height="250" /></p>

<map name="mill_house_team">
  <area shape="rect" coords="89,93,121,139" alt="Rayne Canning - Vice president of the management committee)" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('Reyne Canning (Vice president of the management committee)')" />
  <area shape="rect" coords="149,101,181,152" alt="Cathy Shwogger - Volunteer & member of the management committee" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('Cathy Schwager (Volunteer & member of the management committee)')" />
  <area shape="rect" coords="239,72,275,120" alt="John Howden - Mill House administration Assistant" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('John Howden (Mill House administration Assistant)')" />
  <area shape="rect" coords="121,80,151,128" alt="Patrisha Rainbow - Volunteer" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('Patrica Rainbow (Volunteer)')" />
  <area shape="rect" coords="174,79,207,122" alt="Sarah McLean - Mill House Manager" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('Sarah McLean (Mill House Manager)')" />
  <area shape="rect" coords="202,106,240,161" alt="Kay Cameron - Volunteer" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('Kay Cameron (Volunteer)')" />
</map>
-->

<?php
	
	/***************************************************************************************************
	 ***************************************************************************************************
	 ***************************************************************************************************
	 ***************************************************************************************************
	 ****** 
	 ****** THIS PHP CODE GENERATES THE CLICKABLE MILLHOUSE TEAM PHOTO
	 ******
	 ****** Refer ti the database table 'group_image_areas'
	 ******
	 ****** Use the 'GROUP PHOTO' administration form to replace the group photo with a new ones and 
	 ****** create the clickable areas for the photo.
	 ******
	 ***************************************************************************************************
	 ***************************************************************************************************
	 ***************************************************************************************************
	 ***************************************************************************************************/
	
	$nImageHeight = 250;
	$results = DoQuery($g_dbMillhouse, "SELECT * FROM group_photo_areas LIMIT 1");
	if ($results && ($results->num_rows > 0))
	{
		if ($row = $results->fetch_assoc())
			$nImageHeight = (int)$row["image_height"];
	}
	echo "<p><img src=\"images/MillHouseTeam.jpg\" alt=\"MillHouseTeam.jpg\" usemap=\"#mill_house_team\" id=\"img_mill_house_team\" height=\"" . $nImageHeight . "\" /></p>";
	
	echo "<map name=\"mill_house_team\">\n";
	$results = DoFindAllQuery($g_dbMillhouse, "group_photo_areas");
	if ($results && ($results->num_rows > 0))
	{
		while ($row = $results->fetch_assoc())
		{
			echo $row["area_tag"];
		}
	}
	echo "</map>\n";
	
?>

<p>We bring people together, create opportunities to connect and provide practical support for individuals and families across the Central 
Goldfields. Everyone is welcome at Mill House, regardless of age, ability, background or circumstances.</p>

<p>Our aim is to help people feel connected, supported and involved in their local community.</p>

<h1>What We Do</h1>

<table border="0" cellpadding="0" cellspacing="0" style="width:99%;">
	<tr>
		<td style="width:33.3%;vertical-align:top;">
			<h2>&#x1F34E; Food &amp; Support</h2>
			<p><a href="about/about.php#food">Meals, food relief and affordable food</a>.</p>
			<p>&nbsp;</p>
		</td>
		<td style="width:33.3%;vertical-align:top;">
			<h2>&#x1F3A8; Activities &amp; Groups</h2>
			<p><a href="about/about.php#acitivities">Social, creative and community activities</a>.</p>
		</td>
		<td style="width:33.3%;vertical-align:top;">
			<h2>&#x1F3AE; Youth Hub</h2>
			<p><a href="about/about.php#youth">Programs and activities for young people</a>.</p>
		</td>
	</tr>
	<tr>
		<td style="width:33.3%;vertical-align:top;">
			<h2>&#x1F4BB; Digital Access Hub</h2>
			<a href="about/about.php#hub">Computers, internet access and digital support</a>.
		</td>
		<td style="width:33.3%;vertical-align:top;">
			<h2>&#x1F3E0; Room Hire</h2>
			<p><a href="room/room.php">Affordable community and meeting spaces</a>.</p>
		</td>
		<td style="width:33.3%;vertical-align:top;">
			<h2>&#x1F496; Volunteer</h2>
			<p><a href="contribute/volunteering.php">Get involved and make a difference</a>.</p>
		</td>
	</tr>
</table>

<h1>Join the Mill House family</h1>
<p>Come in, get involved and discover what is happening at Mill House.</p>
	
<h1>Grant from Elders</h1>
<p>The Mill House Committee, management and the community would like to thank Elders for their generous grant to our organisation.</p>
<p><a href="images/EldersGrant.jpg"><img src="images/EldersGrant.jpg" alt="EldersGrant.jpg" width="300"/></a></p>
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

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>Within the editable content of thos page there a 3 sections that are automated in different ways.</p>
	
	<h2 style="display:inline;">What's on at Mill House today?</h2> &amp; 
	<h2 style="display:inline;">Mill House Activities</h2> &amp; 
	<h2  style="display:inline;">Service Providers</h2>
	
	<p>These sections are fully automated via PHP code. You can add additional HTML if you want to, but please 
	leave the PHP code alone. The latter two sections use CSS animation in the files style4PC.css and style4Mobile.css. 
	So be very careful if you attempt to edit these files. Make sure you know what your are doing.</p>
	
	<h2>REMAINING PAGE CONTENT</h2>
	<p>The remaining page content is just regular HTML. You can edit this HTML code freely if you are confident with 
	HTML. Make sure you confine your editing to only that code that IS NOT highlighed by a yellow background.</p>
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_page_edit_instructions', false)">CLOSE</button></p>		
	
</div>

<div id="div_source_code" class="instruction_popup">

	<h1>WHERE IS THE SOURCE LOCATED CODE?</h1>
	
	<h2>WEBSITE</h2>
	
		<p>The source code for the website is located on <a href="https://github.com/">GitHub</a>.</p>
		
		<p><b>ACCOUNT NAME: </b>MillhouseMaryboroughVIC</p>
		<p><b>PASSWORD: </b>Click the button and the password will be emailed to the Mill House manager.</p>
		<form method="post" action="index.php" target="_self">
			<input class="email_button" type="submit" name="submit_email_github_password" value="EMAIL GITHUB ACCOUNT PASSWORD" />
		</form>

		<p><b>REPOSTORY NAME: </b>Millhouse-Website</p>
		
		<p>This repository is intended as the working repository.</p>
		
		<p>The latest website code should be kept in this repository.</p>
		
		<p><b>BACKUP REPOSTORY NAME: </b>Millhouse-Website-Backup</p>
		
		<p>The backup respository is intended as a fall back in case any future web administrators muck up the website 
		code and cannot recover.</p>
		
		<p>It should ONLY be updated from <i>Millhouse-Website</i> if the future web adminstrator is ABSOLUTELY sure 
		that their code changes are SOUND.</p>
		
	<h3>GitHub Desktop</h3>
	
	<p>Don't bother trying to do all the this directly in through the GitHub website - it is a pain in the arse.</p>
	
	<p>Instead download and install <a href="https://desktop.github.com/download/">GitHub Desktop</a></p>
	
	<p>This software allows you to connect to your GitHub account and the respositories in it. It automatically detects 
	changes in your source code and allows you to update your respository source code. It is quite easy to use.</p>
	
	<p>Follow this <a href="https://docs.github.com/en/desktop/installing-and-authenticating-to-github-desktop/authenticating-to-github-in-github-desktop">guide</a> 
	to connect GitHub Desktop to the above GitHub account.</p>
	
	<p>Follow this <a href="https://docs.github.com/en/desktop/adding-and-cloning-repositories/cloning-a-repository-from-github-to-github-desktop">guide</a> 
	to clone the GitHub 'Millhouse-Website' respository to your hard drive.</p>
	
	<p>Follow this <a href="">guide</a> to sychronise the GitHub 'Millhouse-Website' respository with code changes you have made on your hard drive.</p>
	
	<p>GitHub Desktop is quite intuituve to use.</p>
	
	<h2>MILL HOUSE APP</h2>
	
	<p>The app was created with <a href="https://appinventor.mit.edu/">MIT App Inventor</a>. Click 'Create Apps!' and 
	register your own account.</p>
	
	<p>The screens are designed via a drag and drop system.<br/>
	<a href="images/MITAppInventorScreenDesign.jpg"><img src="images/MITAppInventorScreenDesign.jpg" alt="MITAppInventorScreenDesign.jpg" height="300" /></a></p>
	
	<p>The coding is block based and easy to get the hang of than text coding with its syntax errors.<br/>
	<a href="images/MITAppInventorBlockCoding.jp"><img src="images/MITAppInventorBlockCoding.jpg" alt="MITAppInventorBlockCoding.jpg" height="300" /></a></p>
	
	<p>The source code is contained in the file <a href="MobileApp/Mill_House.aia">Mill_House.aia</a>, which is located in 
	the website folder 'MobileApp'.</p>
	
	<p>This is a binary file so you can't red the code in a text editor. You import this file into your MIT App Inventor account as 
	a new project. Then you will be able to edit the screens and the blocks.</p>
	
	<p>You will probably find that Chrome or Firefox web browsers will 'choke' on the Mill House app project when you 
	try to load it in your MIT App Inventor account. Instead use Opera web browser.</p>
	
	<p>The APK Android installation package is the file <a href="MobileApp/Mill_house.apk">Mill_house.apk</a>. The website contains a hyperlink to this file to 
	allow users to download and install the app on their Android phone.</p>
	
	<h2>THE DATABASE</h2>
	
	<p>The database was created with <a href="https://dev.mysql.com/downloads/workbench/">MySQL Workbench</a></p>
	
	<p>Follow this <a href="https://dev.mysql.com/doc/workbench/en/wb-getting-started-tutorial-create-connection.html">
	guide</a> to connect MySQL Workbench running on your PC to the database at millhouse.org.au.</p>
	
	<p>If you ever need to re-build the database then there are self contained SQL files located in the website folder 
	'MySQL'. You can import these files into MySQL Workbenech and phpMyAdmin in cPanel of web hosting acctoung, and 
	re-generate the entire database - both tables and their contents. These files should be kept up to date with the 
	rest of the source code.</p>
	
	<p>There are two files in this folder:</p>
	
	<ul>
		<li>
			<b>millhouse_db.sql</b><br/>
			This file was generated from MySQL Workbench.
		</li>
		<li>
			<b>millhous_db.sql</b><br/>
			This file was generated from phpMyAdmin the cPanel for the current web hosting account 
			(<a href="https://woodroffe.myhost.nz:2083/">cPanel Login</a>).
		</li>
	</ul>
	
	<p>There is a problem in that the current web hosting account uses an older version of MariaDB that is not completely 
	compatible with SQL files exported from the latest version of MySQL Workbench. However it is possible to do some fairly 
	minor edits to 'millhouse_db.sql' to make it compatible. Instructions on how to do this are detailed below.</p>
	
	<p>This is why there is a MariaDB version of the SQL file -  'millhous_db.sql'. This will make re-generating the database 
	in the web hosting account more convenient.</p>
	
	<p>You can use the MySQL version to re-generate the database in MySQL Workbench for testing and debugging purposes on 
	Windows 'localhost'.</p>
	
	<h3>How do you make 'millhouse_db.sql' compatible with MariaDB?</h3>
	
	<p>
		Try and import 'millhouse_db.sql' (generated by MySQL Workbench) into cPanel phpMyAdmin like this:<br/>
		<a href="images/phpMyAdminImportDatabase.jpg"><img src="images/phpMyAdminImportDatabase.jpg" alt="phpMyAdminImportDatabase.jpg" height="300" /></a>
	</p>
	
	<p>
		Scroll down and click the 'Import' button.<br/>
		<a href="images/phpMyAdminImportButton.jpg"><img src="images/phpMyAdminImportButton.jpg" alt="phpMyAdminImportButton.jpg" height="300" /></a>
	</p>
	
	<p>
		You will find that you will get this error:<br/>
		<a href="images/phpMyAdminImportError.jpg"><img src="images/phpMyAdminImportError.jpg" alt="phpMyAdminImportError.jpg" height="300" /></a><br/>
		<b>NOTE: </b>#1273 - Unknown collation: 'utf8mb4_0900_ai_ci'.<br/>
		Paste this error message into Google and search and you will get the following...
	</p>
	<hr/>
	<p><i>
		The #1273 - Unknown collation: 'utf8mb4_0900_ai_ci' error occurs because you are trying to import a database 
		backup from a newer version of MySQL (like MySQL 8.0) into a server running an older version of MySQL (5.7 or 
		lower) or MariaDB. The target server does not recognize the utf8mb4_0900_ai_ci collation, which became the default starting in 
		MySQL 8.0. How to fix it...
	</i><p>
	<p><i>
		<b><u>Method 1: Find and Replace (Quickest)</u></b><br/>
		If you have the database backup as a .sql file, you can edit it directly in a text editor (like Visual Studio 
		Code, Notepad++, or Sublime Text). Open your .sql file in your preferred text editor. Use the Find and Replace 
		feature (usually Ctrl + H or Cmd + H). 
	</i><p>
	<p><i>
		Find: utf8mb4_0900_ai_ci and replace it based on your target database version.<br/><br/> 
		<b>If importing to MariaDB: </b>Replace with utf8mb4_unicode_520_ci.<br/><br/>
		<b>If importing to MySQL 5.7: </b>Replace with utf8mb4_unicode_ci or utf8mb4_general_ci.<br/>
		Notepad++ is an ideal text editor to do this with.<br/><br/>
		<a href="images/phpMyAdminSearchAndReplace.jpg"><img src="images/phpMyAdminSearchAndReplace.jpg" alt="AdminSearchAndReplace.jpg" height="300" /></a>	
	</i><p>
	<hr/>
	<p>
		Save the edited SQL file with a different name and try importing it again.
	</p>
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_source_code', false)">CLOSE</button></p>		
	
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
				
				/* See common.js*/
				DoSetAudioAssist();
				
			</script>
			<!-- Begin Footer -->
			<div class="footer">
				<table border="0" cellpadding="0" cellspacing="0" class="footer_table">
					<tr>
						<td class="footer_table_cell footer_left_cell">&copy;Mill House, Maryborough, VIC</td>
						
						<td class="footer_table_cell footer_middle_cell">COME ALONG AND JOIN THE MILL HOUSE COMMUNITY <h2 style="display:inline;">&#128522;</h2></td>
						
						<td class="footer_table_cell footer_right_cell">Web site by: Gregary Boyles 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)</td>
					</tr>
				</table>
			</div>
			<!-- End Footer --></div>
		<!-- End Container -->
	</body>
	
	<script type="text/javascript">
	
		DoSetAudioAssistCheckbox();
		DoSetVoiceAssistInputs();
		DoAllAttachListeners("div_content");
		DoAllAttachListeners("div_navigation_menu");
		
		if (JSON.parse(sessionStorage.getItem("bAudioAssistOn")))
		{
			alert("The audio assist feature requires user interaction to 'activate'.\n\nYou will need to click a blank part of the page after you close this message box.\n\nIt is annoying, but it is web browser requirement.");
		}
		
	</script>
	
</html>
<!-- #BeginEditable "End" -->

<?php DoShowMessage(); ?>

<!-- #EndEditable -->

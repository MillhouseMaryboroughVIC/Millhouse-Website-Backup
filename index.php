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
				$strTime .= " (you missed it)";
			}
			// Is in progress.
			else if (strcmp($datetimeNow->format("H:i"), $datetimeEnd->format("H:i")) < 0)
			{
				$strTime .= " (" . DoGetTimeRemaining($datetimeNow, $datetimeEnd) . " remaining)";
			}
		}
		return $strTime;
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
				echo "<ul>\n";
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
						if (($nDOWToday == 0) && ($nDOWToday!= 6))
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
/*
if ($row["name"] == "canasta")
{
	echo "<!--###################################\n";
	echo "nDOWRow1 = " . $nDOWRow1 . "<br>\n";
	echo "nDOWRow2 = " . $nDOWRow2 . "<br>\n";
	echo "nDOWToday = " . $nDOWToday . "<br>\n";
	echo "nWOMRow = " . $nWOMRow . "<br>\n";
	echo "    ###################################-->\n";
}
*/
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
						else
						{
							echo "    <li><b>" . $row["description"] . "</b> at ";
							
							// If only $row["dow1"] is set but both $row["time1"] and $row["time2"] are set then 
							// display both times.
							if (($nDOWRow1 > -1) && ($nDOWRow2 == -1) && !is_null($row["time1"]) && !is_null($row["time2"]))
							{
								$strTime1 = DoGetTimeRange($row["time1"], $row["duration"]);
								$strTime2 = DoGetTimeRange($row["time2"], $row["duration"]);
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
							echo $strTime1 . (($strTime2 == "") ? "" : " and " . $strTime2) . "</li>\n";
							$nCount++;
						}
						if ($row["name"] == "feast")
						{
							$strFridayFeastMenu = $row["comments"];
						}
					}
				}
				echo "</ul>\n";
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
						<td class="masthead_cell_image_right2">
							<a href="images/MillHouseNeighborhoodHouse2.jpg"><img src="images/MillHouseNeighborhoodHouse2.jpg" alt="MillHouseNeighborhoodHouse.jpg" class="masthead_image" /></a>
						</td>
						<td class="masthead_cell_sponsors">
<div class="sponsors_container">	
	<?php DoGenerateSponsors(); ?>				
</div>
						</td>
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
		<li><a href="index.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Home</a></li>
		<li><a href="about/about.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">About Mill House</a></li>
		<li><a href="calendar/calendar.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Events Calendar</a></li>
		<li><a href="room/room.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Hire a room</a></li>
		<li><a href="sponsors/sponsors.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Our Collaborators</a></li>
		<li>
			<a href="contribute/contribute.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item"><a href="contribute/join.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a member</b></a></li>
				<li class="submenu_item"><a href="contribute/volunteering.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a volunteer</b></a></li>
				<li class="submenu_item"><a href="contribute/request_sponsorship.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a sponsor</b></a></li>
				<li class="submenu_item"><a href="contribute/donation.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Make a donation</b></a></li>
			</ul>
		</li>
		<!--<li><a href="people/people.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Mill House People</a></li>-->
		<!--<li><a href="milestones/milestones.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Milestones</a></li>-->
		<li><a href="contact/contact.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Contact</a></li>
		<li><a href="site_history/site_history.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Site History</a></li>
		<li>
			<a href="governance/governance.php" onclick="DoClickNavLinkWithSubmenu('governance')" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Governance</a> 
			<ul style="display:<?php echo DoShowHideSubmenu("governance"); ?>;" id="governance">
				<li class="submenu_item"><a href="https://www.acnc.gov.au/charity/charities/a49d2dd7-2daf-e811-a960-000d3ad24282/profile" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>ACNC Listing</b></a></li>
				<li class="submenu_item"><a href="governance/rules/rules.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Rules</b></a></li>
				<li class="submenu_item"><a href="governance/reports/reports.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Annual Reports</b></a></li>
				<li class="submenu_item"><a href="governance/policies/policies.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Policies</b></a></li>
				<li class="submenu_item"><a href="governance/plan/plan.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Strategic Plan</b></a></li>
			</ul>
		</li>
		<li><a href="group_events/group_events.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Group Events</a></li>
		<li>
			<a href="administration/administration.php" onclick="DoClickNavLinkWithSubmenu('administration')" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Administration</a>
			<ul style="display:<?php echo DoShowHideSubmenu("administration"); ?>;" id="administration">
			
			<?php DoDisplayAdministrationSubmenu(); ?>
			
			</ul>
		</li>
	</ul>
</div>
										</td>
										<td>
<div id="div_navigation_arrow" class="navigation_arrow" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="DoOpenCloseMenu(true)" onkeyup="DoKeyPress(event)">
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
								
								<form id="form_voice_assist" class="form form_voice_assist">
									<table border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td style="text-align:right;">
												<label for="checkbox_audio_assist"><b>AUDIO ASSIST ON/OFF</b></label>
											</td>
											<td>
												<input type="checkbox" id="checkbox_audio_assist" tabindex="0" onclick="DoClickAudioAssistCheckbox(this)" />
											</td>
										</tr>
										<tr>
											<td style="text-align:right;">
											    <label for="select_voice">Choose Voice:</label>
											</td>
											<td>
											    <select id="select_voice">
											    </select>
											</td>
										</tr>
										<tr>
											<td style="text-align:right;">
												<label for="text_to_speak">Text to speak</label>
											</td>
											<td>
												<input type="text" id="text_to_speak" size="100%" maxlength="50" value="Hello world!"/>
											</td>
										</tr>
										<tr>
											<td style="text-align:center;">
												<button type="button" onclick="DoTestVoice('text_to_speak')">TEST</button>
											</td>
											<td style="text-align:center;">
												<button type="button" onclick="DoDisplayHidePopup('form_voice_assist', false)">CLOSE</button>
											</td>
										</tr>
										<tr>
											<td>
											</td>
											<td>
											</td>
										</tr>
									</table>
								</form>
								
								<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td>
											<div class="page_heading"><u><script type="text/javascript">document.write(document.title);</script></u></div>
										</td>
										<td style="text-align:right;">
											<?php
											
												if (isLoggedIn())
													echo "<button class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";
													
											?>
										</td>
									</tr>
								</table>			
								<form><button type="button" onclick="DoDisplayHidePopup('form_voice_assist', true)" class="audio_assist_button">VOICE ASSIST</button></form>

								<!-- #BeginEditable "CustomContent" -->

<h1>Welcome to the new and ever improving Mill House Neighbourhood House website</h1>
<p>For best viewing results, use the most up to date version of your favorite web browser.</p>
<p>If you have questions, comments, or suggestions, please click 'Contact' and get in touch with us via your preferred 
method (contact form, email or phone number).</p>
<p>Enjoy!</p>

<h2>Download the Mill House App</h2>
<p><b>PLEASE NOTE: </b>This is a sneak peak only and the app is far from complete. You can have a say as to what, if any, 
additional features you would like to see in the Mill House app. To install open this page on your mobile device a click 
the link below. You will be asked if you want to trust this app - just say 'yes'.</p>

<p><a href="MobileApp/Mill_House.apk" download><img src="images/MillHouseApp.png" alt="MillHouseApp.png" width="150" /></a></p>

<h1>Who We Are</h1>

<p>Mill House Neighbourhood House is a welcoming and inclusive community space in the heart of Maryborough.</p>

<p>Click on a face to see their name.</p>

<p><img src="images/MillHouseTeam.jpg" alt="MillHouseTeam.jpg" usemap="#mill_house_team" id="img_mill_house_team" height="250" /></p>

<map name="mill_house_team">
  <area shape="rect" coords="89,93,121,139" alt="Rayne Canning - Vice president of the management committee)" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('Reyne Canning (Vice president of the management committee)')" />
  <area shape="rect" coords="149,101,181,152" alt="Cathy Shwogger - Volunteer & member of the management committee" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('Cathy Schwager (Volunteer & member of the management committee)')" />
  <area shape="rect" coords="239,72,275,120" alt="John Howden - Mill House administration Assistant" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('John Howden (Mill House administration Assistant)')" />
  <area shape="rect" coords="121,80,151,128" alt="Patrisha Rainbow - Volunteer" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('Patrica Rainbow (Volunteer)')" />
  <area shape="rect" coords="174,79,207,122" alt="Sarah McLean - Mill House Manager" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('Sarah McLean (Mill House Manager)')" />
  <area shape="rect" coords="202,106,240,161" alt="Kay Cameron - Volunteer" href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="alert('Kay Cameron (Volunteer)')" />
</map>

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
		
		let selectVoices = document.getElementById("select_voice");
		if (selectVoices)
		{
			selectVoices.innerHTML = g_strVoiceOptions;
		}
		
		DoAllAttachListeners("div_content");
		
	</script>
	
</html>
<!-- #BeginEditable "End" -->

<?php DoShowMessage(); ?>

<!-- #EndEditable -->

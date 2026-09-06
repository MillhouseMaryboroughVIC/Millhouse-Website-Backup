<?php 

/*
	****************************************************************************************************************
	****************************************************************************************************************
	****************************************************************************************************************
	****************************************************************************************************************
	****
	**** SARAH PLEASE NOTE
	**** ------------------
	****
	**** Please leave this PHP code alone.
	****
	****
	****************************************************************************************************************
	****************************************************************************************************************
	****************************************************************************************************************
	****************************************************************************************************************
*/
	require_once "../common.php";

	DoRecordPageHitOrBlock();
	
				
	//******************************************************************************
	//******************************************************************************
	//** 
	//** GROUP DIV FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoGetGroupShortkey($strGroupName)
	{
		global $g_dbMillhouse;
		global $g_strQuery;
		$nShortkey = -1;
		
		$results = DoFindQuery1($g_dbMillhouse, "groups", "name", $strGroupName);
		if ($results && ($results->num_rows))
		{
			if ($row = $results->fetch_assoc())
				$nShortkey = $row["shortkey"];
		}
		return $nShortkey;
	}
	
	function DoGetEvents($strGroupName)
	{
		global $g_dbMillhouse;
		global $g_strImageWidth;
		$nGroupShortkey = DoGetGroupShortkey($strGroupName);
		$strHTML = "";

		if ($nGroupShortkey > 0)
		{
			if ($result = DoFindQuery1($g_dbMillhouse, "events", "group_shortkey", $nGroupShortkey, "", "date", false))
			{
				if ($result->num_rows > 0)
				{
					while ($row = $results->fetch_assoc())
					{
						$timestamp = strtotime($row["date"]);
						$strHTML .= "<h3>" . date("l, F j, Y", $timestamp) . "</h3>\n";
						$strHTML .= "<p>" . $row["description"] . "</p>\n";
						if (strlen($row["photo"]) > 0)
						{
							$strPhotoFilePath = "images/" . $strGroupName . "/" . $row["photo"];
							$strHTML .= "<a href=\"" . $strPhotoFilePath . "\" alt=\"\"><img src=\"" . $strPhotoFilePath . "\" alt=\"\" width=\"" . $g_strImageWidth . "\" /></a>\n";
						}
					}							
				}
				else
				{
					$strHTML .= "<h3>" . date("l, F j, Y") . "</h3>\n";
					$strHTML .= "<p>NO EVENTS AVAILABLE YET</p>";
					$strHTML .= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut " . 
					"labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris " . 
					"nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit " . 
					"esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt " . 
					"in culpa qui officia deserunt mollit anim id est laborum.</p>\n";
				}
			}
		}
		return $strHTML;
	}
							
	function DoDisplayGroupDivs()
	{
		global $g_dbMillhouse;
		global $g_strQuery;
									
		if ($result = DoFindQuery1($g_dbMillhouse, "groups", "display", "1"))
		{
			if ($result->num_rows > 0)
			{
				while ($row = $result->fetch_assoc())
				{												
					echo "<div id=\"div_" . $row["name"] . "\" style=\"display:none;\">\n";
					
					$strDisplay = "none";
					
					echo "<h1>" . $row["description"] . "</h1>\n";

					echo "<p><b>CONTACT PERSON: </b>" . $row["contact"] . "<br/>\n";
					echo "<b>EMAIL: </b><a href=\"mailto:" . $row["email"] . "\">" . $row["email"] . "</a><br/>\n";
				
					if (!is_null($row["phone"]) && (strlen($row["phone"]) > 0))
						echo "<b>PHONE: </b>" . $row["phone"] . "<br/>\n";

					$strFrequency = "NOT SET";
					if (($row["dow1"] !== NULL) && ($row["dow1"] !== 0))
					{
						$strFrequency = DoGetDayName($row["dow1"]);
						if (($row["dow2"] !== NULL) && ($row["dow2"] !== 0))
						{
							$strFrequency .= " and " . DoGetDayName($row["dow2"]);
						}
					}
					if (($row["wom"] === NULL) || ($row["wom"] == 0))
					{
						$strFrequency = "Weekly on " . $strFrequency;
					}
					else
					{
						switch ($row["wom"])
						{
							case 1: $strFrequency .= "First " . $strFrequency . " of the month"; break;
							case 2: $strFrequency .= "Second " . $strFrequency . " of the month"; break;
							case 3: $strFrequency .= "Third " . $strFrequency . " of the month"; break;
							case 4: $strFrequency .= "Fourth " . $strFrequency . " of the month"; break;
						}
					}
					echo "<b>WHEN: </b>" . $strFrequency . "<br/>\n";
					
					$strTime = "NOT SET";
					if ($row["time1"] !== NULL)
					{
						$time = new DateTime($row["time1"]);
						$strTime = $time->format("H:i");
						if ($row["time2"] !== NULL)
						{
							$time = new DateTime($row["time2"]);
							$strTime .= " and " . $time->format("H:i");
						}
					}
					echo "<b>TIME(S): </b>" . $strTime . "<br/>\n";
					
					$strHours = "NOT SET";
					if (($row["duration"] !== NULL) && ($row["duration"] != 0))
						$strHours = (string)$row["duration"] . " hours";
					echo "<b>DURATION(s): </b>" . $strHours . "<br/>\n";
					
					$strCost = "FREE";
					if (($row["cost"] !== NULL) && ($row["cost"] != 0))
					{
						$strCost = "$" . number_format($row["cost"], 2);
						if ($row["donation"] > 0)
							$strCost .= "(donation)";
					}
					echo "<b>COST: </b>" . $strCost . "<br/>\n";
					
					if (($row["facebook"] != NULL) && (strlen($row["facebook"]) > 0))
						echo "<b>SOCIAL MEDIA: </b><a href=\"" . $row["facebook"] . "\">" . $row["facebook"] . "</a><br/>\n";
					
					echo "<b><u>PURPOSE</u></b><br/>\n";
					echo "<p>" . $row["purpose"] . "</p>\n";

					echo DoGetEvents($row["name"]);
					echo "</div>\n";
				}
			}
		}
	}
	
	function DoGenerateGroupHyperlinks()
	{
		global $g_dbMillhouse;
		global $g_strQuery;
									
		if ($result = DoFindQuery1($g_dbMillhouse, "groups", "display", "1", "", "description"))
		{
			if ($result->num_rows > 0)
			{
				$nRowCount = 0;
				$nMaxRowCount = 3;
				echo "<table border=\"0\" cellpadding=\"5\" cellaspacing=\"0\">\n";
				echo "    <tr>\n";
				while ($row = $result->fetch_assoc())
				{
					echo "        <td>\n";
					echo "            <a class=\"group_hyperlink\" href=\"group_events.php#" . $row["name"] . "\" onclick=\"DoClickGroupHyperlink('" . $row["name"] . "')\">" . $row["description"] . "</a>";
					echo "        </td>\n";
					$nRowCount++;
					if ($nRowCount == $nMaxRowCount)
					{
						echo "    </tr>\n";
						echo "    <tr>\n";
						$nRowCount = 0;
					}
				}
				echo "    </tr>\n";
				echo "</table>\n";
			}
		}
	}

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
		<title>Group Events</title>
		<style type="text/css">







































































































































































		
			.group_hyperlink
			{
				display: inline-block;
				width: 280px;
				height: 20px;
				background-color: var(--start_color);
				border-radius: var(--border_radius);
				color: white;
				text-align: center;
				vertical-align: middle;
				padding: 5px;
				font-family: var(--font_family);
				font-weight: var(--font_weight);
				font-style: var(--font_style);
				font-size: medium;
				text-decoration: none;
			}
			
			.group_hyperlink:hover
			{
				background-color: var(--end_color);
			}
			
		</style>

<script type="text/javascript">

	if (sessionStorage.getItem("current_group_div") === null)
		sessionStorage.setItem("current_group_div", "");
	

	function DoClickGroupHyperlink(strGroupName)
	{
		let divGroupCurrent = document.getElementById(sessionStorage.getItem("current_group_div")),
			divGroupNew = document.getElementById("div_" + strGroupName);
		
		if (divGroupCurrent)
		{
			divGroupCurrent.style.display = "none";
		}
		if (divGroupNew)
		{
			divGroupNew.style.display = "block";
			sessionStorage.setItem("current_group_div", "div_" + strGroupName);
		}
	}
	
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

		<div class="image_popup" id="div_image_popup">
			<div class="image_popup_scroll">
				<img src="" alt="" id="img_in_popup" />
			</div>
			<p><button type="button" onclick="DoDisplayHidePopup('div_image_popup', false)">CLOSE</button></p>		
		</div>
		
		<!-- Begin Container -->
		<div id="div_container">
			<!-- Begin Masthead -->
			<div class="masthead" id="div_masthead">
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
							<a href="../images/MillHouseNeighborhoodHouse1.jpg">
							<img src="../images/MillHouseNeighborhoodHouse1.jpg" alt="MillHouseNeighborhoodHouse1.jpg" class="masthead_image" /></a>
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
		<li><a href="../index.php">Home</a></li>
		<li><a href="../about/about.php">About Mill House</a></li>
		<li><a href="../calendar/calendar.php">Events Calendar</a></li>
		<li><a href="../room/room.php">Hire a room</a></li>
		<li><a href="../sponsors/sponsors.php">Our Collaborators</a></li>
		<li>
			<a href="../contribute/contribute.php" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item"><a href="../contribute/join.php"><b>Become a member</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/volunteering.php"><b>Become a volunteer</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/request_sponsorship.php"><b>Become a sponsor</b></a></li>
				<li class="submenu_item"><a href="../contribute/donation.php"><b>Make a donation</b></a></li>
			</ul>
		</li>
		<!--<li><a href="people/people.php">Mill House People</a></li>-->
		<!--<li><a href="milestones/milestones.php">Milestones</a></li>-->
		<li><a href="../contact/contact.php">Contact</a></li>
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
		<!--<li><a href="group_events/group_events.php">Group Events</a></li>-->
		<li>
			<a href="../administration/administration.php" onclick="DoClickNavLinkWithSubmenu('administration')">Administration</a>
			<ul style="display:<?php echo DoShowHideSubmenu("administration"); ?>;" id="administration">
			
			<?php DoDisplayAdministrationSubmenu(); ?>
			
			</ul>
		</li>
	</ul>
	<p>&nbsp;</p>
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
													echo "<button aria-label=\"Page editing instructions.\" class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";

													if (basename($_SERVER["PHP_SELF"]) == "index.php")
													{
														echo "<button aria-label=\"Website and app source code.\" class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_source_code', true)\">SOURCE CODE</button>\n";
													}
												}

											?>
										</td>
									</tr>
								</table>			
								<form class="form_voice_assist_button"><button type="button" aria-label="Show the voice assist settings." onclick="DoDisplayHidePopup('form_voice_assist', true)">
									<img src="../images/LoudSpeaker.png" alt="LoudSpeaker.png" height="70" aria-label="Click this button to show the voice assist settings." /></button></form>

								<!-- #BeginEditable "CustomContent" -->
			
<?php 
											
/*
	****************************************************************************************************************
	****************************************************************************************************************
	****************************************************************************************************************
	****************************************************************************************************************
	****
	**** SARAH PLEASE NOTE
	**** ------------------
	****
	**** This PHP code generates the group submenu link in the navigation menu. Please leave it alone.
	****
	****
	****************************************************************************************************************
	****************************************************************************************************************
	****************************************************************************************************************
	****************************************************************************************************************
*/
	DoGenerateGroupHyperlinks(); 

	DoDisplayGroupDivs();
	
?>

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>All of the contents of this page are generated via PHP code, JavaScript code and the database. So you can ignore 
	this web page.</p>
	
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
			<div class="footer" id="div_footer">
				<table border="0" cellpadding="0" cellspacing="0" class="footer_table">
					<tr>
						<td class="footer_table_cell footer_left_cell" aria-label="Copy right Mill House Maryburrough Victoria">&copy;Mill House, Maryborough, VIC</td>
						
						<td class="footer_table_cell footer_middle_cell">COME ALONG AND JOIN THE MILL HOUSE COMMUNITY <h2 style="display:inline;">&#128522;</h2></td>
						
						<td class="footer_table_cell footer_right_cell" aria-label="Web site by: Gregry Boyles 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)">Web site by: Gregary Boyles 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)</td>
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
		DoAllAttachListeners("div_footer");
		DoAllAttachListeners("div_masthead");
		DoAttachClickListenersToImageLinks();
		
		if (JSON.parse(sessionStorage.getItem("bAudioAssistOn")))
		{
			alert("The audio assist feature requires user interaction to 'activate'.\n\nYou will need to click a blank part of the page after you close this message box.\n\nIt is annoying, but it is web browser requirement.");
		}
		
	</script>
	
</html>
<!-- #BeginEditable "End" -->

<?php DoShowMessage(); ?>

<!-- #EndEditable -->

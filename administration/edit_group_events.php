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
	//** FORM DATA PERSISTANCE
	//** 
	//******************************************************************************
	//******************************************************************************
	
	if (!isset($_SESSION["date_event"]))
		$_SESSION["date_event"] = "";
	
	if (!isset($_SESSION["textarea_description"]))
		$_SESSION["textarea_description"] = "";
		
	if (!isset($_SESSION["hidden_event_shortkey"]))
		$_SESSION["hidden_event_shortkey"] = "";

	function DoResetSessionVars()
	{
		$_SESSION["date_event"];
		$_SESSION["textarea_description"] = "";
		$_SESSION["hidden_event_shortkey"] = "";
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** EVENT PHOTO PROCESSING FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoSaveNewPhoto($nShortkey)
	{
		global $g_dbMillhouse;
		$strDestPath = "";
		$strGroupName = "";
		$result = DoFindQuery1($g_dbMillhouse, "events", "shortkey", $nShortkey);

		if ($result->num_rows > 0)
		{
			if ($row = $result->fetch_assoc())
			{
				$result = DoFindQuery1($g_dbMillhouse, "groups", "shortkey", $row["group_shortkey"]);
				if ($result->num_rows > 0)
				{
					if ($row = $result->fetch_assoc())
					{
						$strGroupName = $row["name"];
						
						if (!is_dir("images/" . $strGroupName))
							mkdir("images/" . $strGroupName);
							
						$strDestPath = "images/" . $strGroupName . "/";

						if (isset($_FILES["photo"]["name"]) && (strlen($_FILES["photo"]["name"]) > 0) && 
							($_FILES["photo"]["error"] === UPLOAD_ERR_OK))
						{
							move_uploaded_file($_FILES["photo"]["tmp_name"], $strDestPath);
						}
					}
				}
			}
		}
	}
	
	function DoDeleteOldPhoto($nShortkey)
	{
		global $g_dbMillhouse;
		$strFilename = "";
		$strGroupName = "";
		$result = DoFindQuery1($g_dbMillhouse, "events", "shortkey", $nShortkey);

		if ($result->num_rows > 0)
		{
			if ($row = $result->fetch_assoc())
			{
				$strFilename = $row["photo"];
				$result = DoFindQuery1($g_dbMillhouse, "groups", "shortkey", $row["group_shortkey"]);
				if ($result->num_rows > 0)
				{
					if ($row = $result->fetch_assoc())
					{
						$strGroupName = $row["name"];
						$strFilePath = "images/" . $strGroupName . "/" . $strFilename;
						if (file_exists($strFilePath)) 
    						unlink($strFilePath);
    				}
    			}
			}
		}
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** EVENT FORM PROCESSING FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoGetGroupShortkey($strGroupName)
	{
		global $g_dbMillhouse;
		$nGroupShortkey = 0;

		if ($result = DoFindQuery1($g_dbMillhouse, "groups", "name", $strGroupName))
		{
			if ($result->num_rows > 0)
			{
				if ($row = $result->fetch_assoc())
				{
					$nGroupShortkey = $row["shortkey"];
				}
			}
		}
		return $nGroupShortkey;
	}
	
	function DoGetGroupEmailFromEventShortkey($nEventShortkey)
	{
		global $g_dbMillhouse;
		$strEmail = "";

		if ($result = DoFindQuery1($g_dbMillhouse, "events", $nEventShortkey))
		{
			if ($result->num_rows > 0)
			{
				if ($row = $result->fetch_assoc())
				{
					if ($result = DoFindQuery1($g_dbMillhouse, "groups", $row["group_shortkey"]))
					{
						if ($row = $result->fetch_assoc())
						{
							$strEmail = $row["email"];
						}
					}
				}
			}
		}
		return $strEmail;
	}

	function DoProcessEventForm()
	{
		global $g_dbMillhouse;

		if (isset($_POST["button_load_event"]))
		{
			if (isset($_POST["select_event"]))
			{
				if ($result = DoFindQuery1($g_dbMillhouse, "events", "shortkey", $_POST["select_event"]))
				{
					if ($result->num_rows > 0)
					{
						if ($row = $results->fetch_assoc())
						{
							$_SESSION["hidden_shortkey"] = $row("shortkey");
							$_SESSION["date_event"] = $row["date"];
							$_SESSION["textarea_description"] = $row["description"];
							$_SESSION["file_photo"] = $row["photo"];
						}
					}
				}
			}
		}		
		else if (isset($_POST["button_upload_event"]))
		{
			if ($_SESSION["hidden_shortkey"] == 0)
			{
				if (DoCheckValidSessionPassword())
				{
					$nGroupShortkey = -1;
					if (isset($_SESSION["username"]) && ($_SESSION["username"] == "admin"))
						$nGroupShortkey = $_POST["select_group"];
					else
						$nGroupShortkey = DoGetGroupShortkey($_SESSION["username"]);
						
					if ($result = DoInsertQuery5($g_dbMillhousem, "events", 
													"group_shortkey", $nGroupShortkey, 
													"date", $_POST["date_event"], "description", 
													$_POST["textarea_description"], "photo", $_POST["photo_"]))
					{
					}
					DoSaveNewPhoto($_POST["event_shortkey"]);
				}
			}
			else
			{
				if (DoCheckValidSessionPassword())
				{
					if ($result = DoUpdateQuery3($g_dbMillhousem, "events", "date", $_POST["date_event"], "description", $_POST["description_" . $strGroupName], "photo", $_POST["photo_" . $strGroupName], "shortkey", $_POST["shortkey_" . $strGroupName]))
						DoDeleteOldPhoto($_POST["hidden_shortkey"]);
					DoSaveNewPhoto($_POST["hidden_shortkey"]);
				}
			}
			DoResetSessionVars();
		}
		else if (isset($_POST["button_delete_event"]))
		{
			if (DoCheckValidSessionPassword())
			{
				if ($result = DoDeleteQuery($g_dbMillhouse, "events", "shortkey", $_POST["hidden_shortkey"]))
				{
				}
			}
			DoResetSessionVars();
		}
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** SELECT OPTION GENERATION FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoGetEventOptions($strGroupName)
	{
		global $g_dbMillhouse;
		$strEventOptionsHTML = "";
		$nGroupShortkey = DoGetGroupShortkey($strGroupName);
		
		if ($result = DoFindQuery1($g_dbMillhouse, "events", "group_shortkey", $nGroupShortkey))
		{
			if ($result->num_rows > 0)
			{
				$nCount = 0;
				while ($row = $result->fetch_assoc())
				{
					$timestamp = strtotime($row["date"]);
					if ((isset($_POST["event_list"]) && ($_POST["event_list"] == $row["shortkey"])) || ($nCount == 0))
						$strEventOptionsHTML .= "<option selected ";
					else
						$strEventOptionsHTML .= "<option ";
					$strEventOptionsHTML .= "value=\"" . $row["shortkey"] . "\">" . date("l, F j, Y", $timestamp) . "</option>\n";
					$nCount++;
				}
			}
			else
			{
				$strEventOptionsHTML .= "<option value=\"\" selected disabled>No events available to edit...</option>\n";
			}
		}
		return $strEventOptionsHTML;
	}
		
	//******************************************************************************
	//******************************************************************************
	//** 
	//** FORM DISPLAY FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoDisplayGroupEventForm()
	{
		echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"form_event\">\n";
		echo "  <h1>Add, Edit & Delete Events For This Group</h1>\n";
		echo "	<table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		if (IsAdminLoggedIn())
		{
			echo "		<tr>\n";
			echo "			<td style=\"text-align: right;\"><label for=\"select_group\">Group: </label></td>\n";
			echo "          <td>\n";
			echo "                <select name=\"select_group_name\" id=\"select_group_name\" required autocomplete=\"on\" />\n";
			echo DoGetUsernameSelectOptions(false);
			echo "                </select>\n";
			echo "          </td>\n";
			echo "		</tr>\n";
		}
		echo "		<tr>\n";
		echo "			<td style=\"text-align: right;\"><label for=\"date_event\">Event Date: </label></td>\n";
		echo "			<td><input name=\"date_event\" id=\"date_event\" type=\"date\" value=\"" . $_SESSION["date_event"] . "\" autocomplete=\"on\" placeholder=\"A future ot past date...\" /></td>\n";
		echo "		</tr>\n";
		echo "		<tr>\n";
		echo "			<td style=\"text-align: right;\"><label for=\"textarea_description\">Event Description: </label></td>\n";
		echo "			<td><textarea name=\"textarea_description\" id=\"textarea_description\" cols=\"40\" rows=\"20\" onkeydown=\"OnKeyPressComment(event)\" autocomplete=\"on\" minlength=\"160\" maxlength=\"8192\" placeholder=\"A detailed description of the event...\">" . $_SESSION["textarea_description"] . "</textarea></td>\n";
		echo "		</tr>\n";
		echo "		<tr>\n";
		echo "			<td style=\"text-align: right;\"><label for=\"file_photo\">Photo: </label></td>\n";
		echo "			<td><input name=\"file_photo\" id=\"file_photo\" type=\"file\" accept=\"image/*\" placeholder=\"An optional photo for the event...\" onchange=\"OnChangeCheckFileSize(this.files[0].size)\" /></td>\n";
		echo "		</tr>\n";
		echo "		<tr>\n";
		echo "			<td style=\"text-align: right;\"><label for=\"select_event\">Current events:</label></td>\n";
		echo "			<td>\n";
		echo "				<select id=\"select_event\" name=\"select_event\" autocomplete=\"on\">\n";
		echo DoGetEventOptions($_SESSION["username"]);
		echo "				</select>\n";
		echo "				<br/><br/>\n";
		echo "				<input type=\"button\" name=\"button_load_event\" id=\"button_load_event\" value=\"LOAD\" onclick=\"OnClickLoadEvent('" . $_SESSION["username"] . "')\" />\n";
		echo "				&nbsp;\n";
		echo "				<input type=\"button\" name=\"button_reset_event\" id=\"button_reset_event\" value=\"RESET\" onclick=\"OnClickResetEventForm('" . $_SESSION["username"] . "')\" />\n";
		echo "			</td>\n";
		echo "		</tr>\n";
		echo "		<tr>\n";
		echo "			<td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "				<input type=\"hidden\" id=\"hidden_event_shortkey\" name=\"hidden_event_shortkey\" value=\"" . $_SESSION["hidden_event_shortkey"] . "\" />\n";
		echo "				<input type=\"button\" name=\"ubutton_pload_event\" id=\"button_upload_event\" value=\"UPLOAD\" onclick=\"DoValidateEvent('" . $_SESSION["username"] . "')\"/>\n";
		echo "				&nbsp;\n";
		echo "				<input type=\"button\" name=\"button_delete_event\" id=\"button_delete_event\" value=\"DELETE\" ";
		if ($_SESSION["hidden_event_shortkey"] == 0) 
			echo "disabled ";
		echo "onclick=\"OnClickDeleteEvent()\" />\n";
		echo "			</td>\n";
		echo "		</tr>\n";
		echo "	</table>\n";
		echo "</form>\n";
	}
	
	function DoDisplayForm()
	{
		if (!IsLoggedIn())
		{
			DoDisplayLoginForm();
		}
		else
		{
			DoDisplayLogoutForm();			
			DoDisplayGroupEventForm();
		}
		DoDisplayLoginFormInstrunctions();
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
</style>
		<script type="text/javascript">
		
			function DoOnPageLoadComplete()
			{
			}
			
			function OnChangeCheckFileSize(nFileSize)
			{
				if (nFileSize > 500000)
					alert("The size (in bytes) of the photo image file must be less than 500,000 KBytes");
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
			<a href="administration.php" onclick="DoClickNavLinkWithSubmenu('administration')">Administration</a>
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
								<form class="form_voice_assist_button"><button type="button" title="Show the voice assist settings." onclick="DoDisplayHidePopup('form_voice_assist', true)">
									<img src="../images/LoudSpeaker.png" alt="LoudSpeaker.png" height="70" /></button></form>

								<!-- #BeginEditable "CustomContent" -->

<p>&nbsp;</p>

<?php 

	DoDisplayForm();
	
?>

<p>&nbsp;</p>

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

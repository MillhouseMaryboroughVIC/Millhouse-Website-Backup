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
	require_once "admin_login.php";

	DoRecordPageHitOrBlock();
	
	function DoProcessFormData()
	{
		global $g_dbMillhouse;
		
		if (isset($_POST["save_menu"]))
		{
			$strMenu = "<table border=\"1\" cellspacing=\"0\" cellpadding=\"5\">\n";
			
			if ($_POST["text_appetiser"] != "")
				$strMenu .= "<tr><td><b>APPETISER</b></td><td>" . $_POST["text_appetiser"] . "</td></tr>\n";
			if ($_POST["text_main"] != "")
				$strMenu .= "<tr><td><b>MAIN</b></td><td>" . $_POST["text_main"] . "</td></tr>\n";
			if ($_POST["text_dessert"] != "")
				$strMenu .= "<tr><td><b>DESSERT</b></td><td>" . $_POST["text_dessert"] . "</td></tr>\n";
				
			$strMenu .= "</table>\n";
			
			if (DoUpdateQuery1($g_dbMillhouse, "groups", "name", "feast", "comments", $strMenu))
			{
				DoShowMessage("The Friday feats menu was updated...");
			}
			else
			{
				DoShowMessage("Could not update Friday feast menu!", true);
			}
		}
	}
	
	function DoDisplayUploadMenuForm()
	{
		global $g_strPatternComment;

		echo "<form class=\"form update_menu_form\" target=\"_self\" method=\"post\" id=\"form_group_details\" style=\"width:850px;\" >\n";
		echo "    <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		echo "        <tr>\n";
		echo "           <td style=\"text-align:center;\" colspan=\"2\"><label><h1>Update Friday Feast Menu</h1></label><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td  style=\"text-align:center;\" colspan=\"2\">\n";
		echo "                	<button type=\"button\" onclick=\"DoDisplayHidePopup('div_friday_feast_form_instructions', true)\">INSTRUCTIONS</button><br/><br/>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr><td>&nbsp;</td></tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;width:48ch;\"><label for=\"name\">Appetiser: </label></td>\n";
		echo "	          <td><input name=\"text_appetiser\" id=\"text_appetiser\" type=\"text\" pattern=\"" . $g_strPatternComment. "\" autocomplete=\"on\" onkeydown=\"OnKeyPressComment(event)\" /></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;width:48ch;\"><label for=\"name\">Main: </label></td>\n";
		echo "	          <td><input name=\"text_main\" id=\"text_main\" type=\"text\" required pattern=\"" . $g_strPatternComment. "\" autocomplete=\"on\" onkeydown=\"OnKeyPressComment(event)\" /></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;width:48ch;\"><label for=\"name\">Dessert: </label></td>\n";
		echo "	          <td><input name=\"text_dessert\" id=\"text_dessert\" type=\"text\" pattern=\"" . $g_strPatternComment. "\" autocomplete=\"on\" onkeydown=\"OnKeyPressComment(event)\" /></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "                <input type=\"button\" name=\"save_menu\" id=\"save_menu\" value=\"SAVE\" />\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "    </table>\n";
		echo "</form>\n";	
	}
	
	function DoDisplayForm()
	{
		if (!IsLoggedIn())
		{
			DoDisplayLoginForm();
		}
		else if (IsAdminLoggedIn())
		{
			echo "<p>Use these forms to upload your various governance documents. They will be uploaded to the correct folders and renamed to the \n"; 
			echo "expected file names.</p>\n";
			DoDisplayLogoutForm();			
			DoDisplayUploadMenuForm();
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
		<title></title>
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
									<img src="../images/LoudSpeaker.png" alt="LoudSpeaker.png" height="70" /></button></form>

								<!-- #BeginEditable "CustomContent" -->
				
<?php 

	DoDisplayForm(); 
	
?>
<div id="div_friday_feast_form_instructions" class="instruction_popup">
	
	<h1>INSTRUCTIONS FOR FRIDAY FEAST MENU FORM</h1>
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_add_sponsor_instructions', false)">CLOSE</button></p>
	
	<h2>STEP 1</h2>
	
	<p>Simply enter the optional appetiser, main course and destern into the form.</p>
	
	<h2>STEP 2</h2>
	
	<p>Click the save button.</p>
	
	<p>The menu will saved in the 'comments' column of a 'groups' table in the database. When Friday Feast comes up in 
	'What is on today at Mill House' the menu (if not empty) will be displayed under it. However, if you do not change 
	the menu, then the same one will be displayed the next time Friday feast comes up.</p>

	<p><button type="button" onclick="DoDisplayHidePopup('div_add_sponsor_instructions', false)">CLOSE</button></p>
	
</div>

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>The form in contents of this page are automatically generated by PHP code and the onlu purpose of this page is 
	to provide you with access to the database. So you can ignore this page entirely.</p>
	
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

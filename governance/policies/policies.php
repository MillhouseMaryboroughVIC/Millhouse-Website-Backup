<?php

	require_once "../../common.php";
	
	DoRecordPageHitOrBlock();
		
?>
<!-- #BeginTemplate "../../master.dwt" -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Mill House - Neighborhood House. Providing assistance and social engagement to residents of Maryborough and the central goldfields region." />
		<meta name="keywords" content="Maryborough, central goldfields, NIL, no interest loans, employment services, clubs, hobbies, Friday feast, Thursday cafe, volunteering, membership, market days, free food." />
		<meta name="author" content="Sarah McLean" />
		<link rel="canonical" href="https://www.millhouse.org.au/" />

		<link id="style_sheet" href="../../styles/style4PC.css" rel="stylesheet" type="text/css" />
		<link rel="icon" sizes="128x128" href="../../favicon.jpg" />
		<script type="text/javascript" src="../../common.js"></script>
		<!-- #BeginEditable "CustomTitle" -->
		<title>Policies</title>
		
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
							<a href="../../images/MillHouse.jpg">
							<img src="../../images/MillHouse.jpg" alt="" class="masthead_image" /></a>
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
							<a href="../../images/MillHouseNeighborhoodHouse1.jpg">
							<img src="../../images/MillHouseNeighborhoodHouse1.jpg" alt="MillHouseNeighborhoodHouse1.jpg" class="masthead_image" /></a>
						</td>
						<td class="masthead_cell_image_right2">
							<a href="../../images/MillHouseNeighborhoodHouse2.jpg">
							<img src="../../images/MillHouseNeighborhoodHouse2.jpg" alt="MillHouseNeighborhoodHouse.jpg" class="masthead_image" /></a>
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
		<li>
		<a href="../../index.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Home</a></li>
		<li>
		<a href="../../about/about.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">About Mill House</a></li>
		<li>
		<a href="../../calendar/calendar.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Events Calendar</a></li>
		<li>
		<a href="../../room/room.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Hire a room</a></li>
		<li>
		<a href="../../sponsors/sponsors.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Our Collaborators</a></li>
		<li>
			<a href="../../contribute/contribute.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item">
				<a href="../../contribute/join.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a member</b></a></li>
				<li class="submenu_item">
				<a href="../../contribute/volunteering.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a volunteer</b></a></li>
				<li class="submenu_item">
				<a href="../../contribute/request_sponsorship.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="../../contribute/donation.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Make a donation</b></a></li>
			</ul>
		</li>
		<!--<li><a href="people/people.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Mill House People</a></li>-->
		<!--<li><a href="milestones/milestones.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Milestones</a></li>-->
		<li>
		<a href="../../contact/contact.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Contact</a></li>
		<li>
		<a href="../../site_history/site_history.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Site History</a></li>
		<li>
			<a href="../governance.php" onclick="DoClickNavLinkWithSubmenu('governance')" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Governance</a> 
			<ul style="display:<?php echo DoShowHideSubmenu("governance"); ?>;" id="governance">
				<li class="submenu_item"><a href="https://www.acnc.gov.au/charity/charities/a49d2dd7-2daf-e811-a960-000d3ad24282/profile" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>ACNC Listing</b></a></li>
				<li class="submenu_item">
				<a href="../rules/rules.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Rules</b></a></li>
				<li class="submenu_item">
				<a href="../reports/reports.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Annual Reports</b></a></li>
				<li class="submenu_item">
				<a href="policies.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Policies</b></a></li>
				<li class="submenu_item">
				<a href="../plan/plan.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Strategic Plan</b></a></li>
			</ul>
		</li>
		<li>
		<a href="../../group_events/group_events.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Group Events</a></li>
		<li>
			<a href="../../administration/administration.php" onclick="DoClickNavLinkWithSubmenu('administration')" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Administration</a>
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
											<div class="page_heading" id="div_page_heading" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><u><script type="text/javascript">document.write(document.title);</script></u></div>
										</td>
										<td style="text-align:right;">
											<?php
											
												if (isLoggedIn())
													echo "<button class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";
													
											?>
										</td>
									</tr>
								</table>			
								<form class="form_voice_assist_button"><button type="button" onclick="DoDisplayHidePopup('form_voice_assist', true)">VOICE ASSIST</button></form>

								<!-- #BeginEditable "CustomContent" -->

<h1>Technology &amp; Communications Policy</h1>
<iframe src="MHTechnologyAndCommunicationPolicy.pdf" width="100%" height="500px" style="border:none;"></iframe>

<h1>Banking Policy</h1>
<iframe src="MHBankingPolicy.pdf" width="100%" height="500px" style="border:none;"></iframe>

<h1>Purchasing &amp; Procurement Policy</h1>
<iframe src="MHPurchasingndProcurementPolicy.pdf" width="100%" height="500px" style="border:none;"></iframe>

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>ALL the contents of this page are automatically generated so please ignore th1s page. If you need to update the 
	displayed document then please do so via the approriate form on the <a href="../admin/governance.php">governance</a> admin web page.</p>
	
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
		
		if (JSON.parse(sessionStorage.getItem("bAudioAssistOn")))
		{
			alert("The audio assist feature requires user interaction to 'activate'.\n\nYou will need to click a blank part of the page after you close this message box.\n\nIt is annoying, but it is web browser requirement.");
		}
		
	</script>
	
</html>
<!-- #BeginEditable "End" -->

<?php DoShowMessage(); ?>

<!-- #EndEditable -->

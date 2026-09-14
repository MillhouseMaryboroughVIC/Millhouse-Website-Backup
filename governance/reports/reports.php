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
		<title>Annual Reports</title>
		
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
							<img src="../../images/MillHouseNeighborhoodHouse2.jpg" alt="MillHouseNeighborhoodHouse2.jpg" class="masthead_image" /></a>
						</td>
						<td class="masthead_cell_voice_assist">
							<form class="form_voice_assist_button"><button type="button" aria-label="Click this button to show the voice assist settings." onclick="DoDisplayHidePopup('form_voice_assist', true)">
								<img src="../../images/LoudSpeaker.png" alt="LoudSpeaker.png" height="70" aria-label="Click this button to show the voice assist settings." /></button></form>
						</td class="masthead_donation">
						<td>
							<a href="../../contribute/donation.php">
							<img src="../../MobileApp/images/Donate.png" alt="Donate.png" class="donate_image" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" aria-label="Make a donation to Mill House now." /></a>
						</td>
						<td class="masthead_cell_hamburger">
							<div id="div_hamburger" class="masthead_hamburger" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="DoClickHamburger()" aria-label="Open the main menu.">≡</div>
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

	<ul>
		<li><a href="../../index.php">&#x1F3E0; Home</a></li>
		<li>
			<a href="../../about/about.php" onclick="DoClickNavLinkWithSubmenu('about')">&#x1F50D; About Mill House</a>
			<ul style="display:<?php echo DoShowHideSubmenu("about"); ?>;" id="about">
				<li class="submenu_item"><a href="../../people/people.php">&#x1F469; Mill House People</a></li>
				<li class="submenu_item">
				<a href="../../milestones/milestones.php">&#x1F3C6; Milestones</a></li>
				<li class="submenu_item">
				<a href="../../site_history/site_history.php">&#x1F3ED; Site History</a></li>
			</ul>
		</li>
		<li style="display:<?php echo (IsAdminLoggedIn() ? "block" : "none"); ?>;">
			<a href="../../what/what.php" onclick="DoClickNavLinkWithSubmenu('what')">&#x1F481; What we do</a>
			<ul style="display:<?php echo DoShowHideSubmenu("what"); ?>;" id="contribute">
				<li class="submenu_item"><a href="../../digital/digital.php">&#x1F4BB; Digital access hub</a></li>
				<li class="submenu_item"><a href="../../youth/youth.php">&#x1F3AE; Youth</a></li>
				<li class="submenu_item">
				<a href="../../activities/activities.php">&#x1F3A8; Groups &amp; acitivites</a></li>
				<li class="submenu_item"><a href="../../support/support.php">&#x1F49D; Support</a></li>
				<li class="submenu_item"><a href="../../food/food.php">&#x1F34E; Food relief</a></li>
			</ul>
		</li>
		<li><a href="../../calendar/calendar.php">&#x1F4C5; Events Calendar</a></li>
		<li><a href="../../room/room.php">&#x1F3E8; Room hire</a></li>
		<li><a href="../../sponsors/sponsors.php">&#x1F4B0; Our Collaborators</a></li>
		<li>
			<a href="../../contribute/contribute.php" onclick="DoClickNavLinkWithSubmenu('contribute')">&#x1F381; Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item"><a href="../../contribute/join.php"><b>&#x1F4DD; Become a member</b></a></li>
				<li class="submenu_item">
				<a href="../../contribute/volunteering.php"><b>&#x1F64B; Become a volunteer</b></a></li>
				<li class="submenu_item">
				<a href="../../contribute/request_sponsorship.php"><b>&#x1F4B0; Become a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="../../contribute/donation.php"><b>&#x1F4B5; Make a donation</b></a></li>
			</ul>
		</li>
		<li><a href="../../contact/contact.php">&#x1F4DE; Contact</a></li>
		<li>
			<a href="../governance.php" onclick="DoClickNavLinkWithSubmenu('governance')">&#x1F4DA; Governance</a> 
			<ul style="display:<?php echo DoShowHideSubmenu("governance"); ?>;" id="governance">
				<li class="submenu_item"><a href="https://www.acnc.gov.au/charity/charities/a49d2dd7-2daf-e811-a960-000d3ad24282/profile"><b>&#x1F4DA; ACNC Listing</b></a></li>
				<li class="submenu_item"><a href="../rules/rules.php"><b>&#x1F4D5; Rules</b></a></li>
				<li class="submenu_item"><a href="reports.php"><b>&#x1F4D7; Annual Reports</b></a></li>
				<li class="submenu_item"><a href="../policies/policies.php"><b>&#x1F4D8; Policies</b></a></li>
				<li class="submenu_item"><a href="../plan/plan.php"><b>&#x1F4D9; Strategic Plan</b></a></li>
			</ul>
		</li>
		<!--<li><a href="group_events/group_events.php">Group Events</a></li>-->
		<li>
			<a href="../../administration/administration.php" onclick="DoClickNavLinkWithSubmenu('administration')">&#x1F510; Administration</a>
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
								
<form id="form_voice_assist" class="form form_voice_assist" style="width:720px;">
	<h1 style="font-weight:800;">VOICE ASSIST SETTINGS</h1>
	<hr/>
	<p class="sight_impaired" >
		The voice assist feature works on Android mobile devices if you hold your finger down on a parapgraph or 
		heading etc. This is the Android equivalent of hovering your PC mouse cursor over them. But it seems as 
		though there is no way to make this feature work on iPhones or iPads unfortunately.
	</p>
	<hr/><br/>
	<table border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;">
		<tr>
			<td style="width:40px;text-align:right;">
				<img src="../../images/AudioOnOff.png" alt="AudioOnOff.png" height="20" />
			</td>
			<td style="text-align:right;width:190px;">
				<label class="sight_impaired" for="checkbox_audio_assist"><b>AUDIO ASSIST ON/OFF</b></label>
			</td>
			<td>
				<input class="sight_impaired" type="checkbox" id="checkbox_audio_assist" tabindex="0" onclick="DoClickAudioAssistCheckbox(this)" />
			</td>
		</tr>
		<tr>
			<td style="width:40px;text-align:right;">
				<img src="../../images/ChooseVoice.png" alt="ChooseVoice.png" height="30" />
			</td>
			<td style="text-align:right;">
			    <label class="sight_impaired" for="select_voice">Choose Voice:</label>
			</td>
			<td>
			    <select class="sight_impaired" id="select_voice">
			    </select>
			</td>
		</tr>
		<tr>
			<td style="width:40px;text-align:right;">
				<img src="../../images/Speaker.png" alt="Speaker.png" height="20" />
			</td>
			<td style="text-align:right;">
			    <label class="sight_impaired" for="select_voice">Set volume:</label>
			</td>
			<td>
			    <input type="range" id="range_volume" min="0" max="100" value="100" style="width:470px;" onchange="DoChangeRange('range_volume')"/>
			</td>
		</tr>
		<tr>
			<td style="width:40px;text-align:right;">
				<img src="../../images/StopWatch.png" alt="StopWatch.png" height="25" />
			</td>
			<td style="text-align:right;">
			    <label class="sight_impaired" for="select_voice">Set voice speed:</label>
			</td>
			<td>
			    <input type="range" id="range_speed" min="0" max="100" value="100" style="width:470px;" onchange="DoChangeRange('range_speed')"/>
			</td>
		</tr>
		<tr>
			<td style="width:40px;text-align:right;">
				<img src="../../images/TuningFork.png" alt="TuningFork.png" height="25" />
			</td>
			<td style="text-align:right;">
			    <label class="sight_impaired" for="select_voice">Set voice pitch:</label>
			</td>
			<td>
			    <input type="range" id="range_pitch" min="0" max="100" value="100" style="width:470px;" onchange="DoChangeRange('range_pitch')"/>
			</td>
		</tr>
		<tr>
			<td style="width:40px;text-align:right;">
				<img src="../../images/ReadText.png" alt="ReadText.png" height="30" />
			</td>
			<td style="text-align:right;">
				<label class="sight_impaired" for="text_to_speak">Text to speak</label>
			</td>
			<td>
				<input class="sight_impaired" type="text" id="text_to_speak" size="100%" maxlength="50" value="Hello world!" />&nbsp;
				<button class="sight_impaired" type="button" onclick="DoTestVoice('text_to_speak')" aria-label="Click this button to test your voice settings.">TEST</button>
				<br/>
			</td>
		</tr>
		<tr>
			<td colspan="3"style="text-align:right;">
				<button class="sight_impaired" type="button" onclick="DoDisplayHidePopup('form_voice_assist', false)" aria-label="Close the voice assist settings form.">CLOSE</button>
				<br/>
			</td>
		</tr>
	</table>
</form>

								<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td>
											<div class="page_heading" id="div_page_heading" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onmouseleave="DoStopSpeaking()"><u><script type="text/javascript">document.write(document.title);</script></u></div>
										</td>
										<td style="text-align:right;" aria-label=" ">
											<?php
											
												if (isLoggedIn())
												{
													echo "<button aria-label=\"Click this button to show page editing instructions.\" class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";

													if (basename($_SERVER["PHP_SELF"]) == "index.php")
													{
														echo "<button aria-label=\"Click this button to show website and app source code information.\" class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_source_code', true)\">SOURCE CODE</button>\n";
													}
												}

											?>
										</td>
									</tr>
								</table>			

								<!-- #BeginEditable "CustomContent" -->

<h1><img src="images/FinancialReport.png" alt="FinancialReport.png" width="30 "/>&nbsp;&nbsp;Financial Statements</h1>
<?php
										
	if ($folder = opendir("."))
	{
		$arrayFiles = [];
		while (($file = readdir($folder)) !== false)
		{
			if (($file != ".") && ($file != "..") && ($file != "images") && !str_contains($file, "financial") && 
				!str_contains($file, "vti") && !str_contains($file, "php")) 
				$arrayFiles[] = $file;
		}
	    closedir($folder);
	    
	    if (count($arrayFiles) > 0)
	    {
	    	echo "<ul>\n";

			for ($nI = count($arrayFiles) - 1; $nI >= 0; $nI--)
			{		
				if (str_contains($arrayFiles[$nI], "FinancialStatements") && str_contains($arrayFiles[$nI], ".pdf"))
				{
					$strYear = substr($arrayFiles[$nI], 19, 4);
					echo "<li>For <a href=\"" . $arrayFiles[$nI] . "\">" . $strYear . "</a></li>";
				}
		    }
		    echo "</ul>\n";
		}
		else
		{
			echo "<p>None found...</p>\n";
		}
	}									
?>

<h1><img src="images/AGM.png" alt="AGM.png" width="40 "/>&nbsp;&nbsp;Annual Reports</h1>
<?php
									
	if ($folder = opendir("."))
	{
		$arrayFiles = [];
		while (($file = readdir($folder)) !== false)
		{
			if (($file != ".") && ($file != "..") && ($file != "images") && !str_contains($file, "Financial") && 
				!str_contains($file, "financial") && !str_contains($file, "vti") && !str_contains($file, "php"))
				$arrayFiles[] = $file;
		}
	    closedir($folder);
	    if (count($arrayFiles) > 0)
	    {
	    	echo "<ul>\n";
	
			for ($nI = count($arrayFiles) - 1; $nI >= 0; $nI--)
			{		
				if (str_contains($arrayFiles[$nI], "AnnualReport") && str_contains($arrayFiles[$nI], ".pdf"))
				{
					$strYear = substr($arrayFiles[$nI], 12, 4);
					echo "<li>For <a href=\"" . $arrayFiles[$nI] . "\">" . $strYear . "</a></li>";
				}
		    }
			    echo "</ul>\n";
		}
		else
		{
			echo "<p>None found...</p>\n";
		}
	}									
?>

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>ALL the contents of this page are automatically generated so please ignore this page. If you need to update the 
	displayed documents then please do so via the approriate form on the <a href="../admin/governance.php">governance</a> admin web page.</p>
	
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

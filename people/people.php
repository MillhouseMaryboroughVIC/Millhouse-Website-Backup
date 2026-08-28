<?php 

	require_once "../common.php" 

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
		<title>Millhouse People</title>
		
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

		<audio id="audio_main_menu" src="/voices/MainMenu.mp3" preload="auto"></audio>

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
						<td class="masthead_cell_image_right2">
							<a href="../images/MillHouseNeighborhoodHouse2.jpg">
							<img src="../images/MillHouseNeighborhoodHouse2.jpg" alt="MillHouseNeighborhoodHouse.jpg" class="masthead_image" /></a>
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
		<li><a href="../group_events/group_events.php">Group Events</a></li>
		<li>
			<a href="../administration/administration.php" onclick="DoClickNavLinkWithSubmenu('administration')">Administration</a>
			<ul style="display:<?php echo DoShowHideSubmenu("administration"); ?>;" id="administration">
			
			<?php DoDisplayAdministrationSubmenu(); ?>
			
			</ul>
		</li>
	</ul>
</div>
										</td>
										<td>
<div id="div_navigation_arrow" class="navigation_arrow">
	<span id="span_menu_text" class="span_menu_text blink" tabindex="0" onfocus="DoPlayAudio('audio_main_menu')" onmouseenter="DoPlayAudio('audio_main_menu')" onclick="DoOpenCloseMenu(true)" onkeyup="DoKeyPress(event)">
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
								<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td>
											<div class="page_heading"><u><script type="text/javascript">document.write(document.title);</script></u></div>
										</td>
										<td style="text-align:right;">
											<form><input type="checkbox" id="checkbox_audio_assist" tabindex="0" onclick="DoClickAudioAssist(this)" /><label for="checkbox_audio_assist"><b>AUDIO ASSIST</b></label></form>
										</td>
										<td style="text-align:right;">
											<?php
											
												if (isLoggedIn())
													echo "<button class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";
													
											?>
										</td>
									</tr>
								</table>			

								<!-- #BeginEditable "CustomContent" -->
<h1>The Current Board</h1>
<h2>Board Office Bearers</h2>
<p>
	<b>PRESIDENT: </b>John Williamson<br/><br/>
	<b>TREASURER: </b>John Warner<br/><br/>
	<b>SECRETARY: </b>Belinda Farby
</p>
<h2>Board Members</h2>
<p>
	Cathy Schwagger<br/><br/>
	Dianne Parsons<br/><br/>
	Louise Hanby D'Wynn<br/><br/>
	Shaun Kerr-Talbot<br/><br/>
	Susie Patterson<br/><br/>
	Mollie Mason<br/><br/>
	Reyne Canning<br/><br/>
</p>
<h2>Management</h2>
<p>
	<b>MANAGER: </b>Sarah McLean<br/><br/>
	<b>ASSISTANT MANAGER: John Howden</b><br/><br/>
</p>

<h1>Past &amp; Present Presidents</h1>
<h2>John Warner</h2>
<p><img src="images/JohnWarner.png" alt="" width="100"/></p>
<p><b>Served: </b>November, 2024 to present</p>
<p>
	<b>Acheivements: </b> John designed Millhouse's original web site.<br/>
	
	<a href="millhouse.htm"><img src="images/OldMillhouseWebSite.jpg" alt="" width="400" /></a><br/>
	
	Millhouse has not had the benefit of any current or former web site programmers among its volunteers.
	So John disigned a simple home page using MS Word and saved that as a HTML file. His thinking was that 
	any one who knows how to use MS Word could potentially make changes to the home page.
</p>

<h1>Past &amp; Present Managers</h1>
<h2>Sarah McLean</h2>
<p><img src="images/SarahMcLean.jpg" alt="" width="100"/></p>
<p><b>Served: </b>September, 2025 to present</p>
<p><b>Acheivements: </b>as soon as she took the lead from Michelle, Sarah was fast off the mark in:</p>
<ul>
	<li>Ensuring the strategic plan for the organisation was up to date.</li>
	<li>Ensuring that the premisis was up to date with the <b>N</b>ational <b>C</b>onstruction <b>C</b>ode saftey standard requirements.</li>
</ul>
<p>Sarah is also the current group leader and mentor for 'Parent Pathways. This is program that 
allows parents, with the help of a mentor, to select from a range of Services Australia support options:</p>
<ul>
	<li>Financial support, for example to help with the cost of getting a licence, training courses, textbooks or to buy a computer.</li>
	<li>Referral to support services such as health family and domestic violence or financial information services.</li>
	<li>Support to find a childcare centre and help with childcare costs.</li>
	<li>Training, such as a short course at the local TAFE.</li>
	<li>Career guidance.</li>
	<li>Language or literacy programs.</li>				
</ul>
<h2>Michelle Baker</h2>
<p><img src="images/MichelleBaker.jpg" alt="" width="100"/></p>
<p><b>Served: </b>November, 2022 to September, 2025...(under the organisation name 'Millhouse')</p>
<p><b>Acheivements: </b>Michelle has always been focused on improving the social engagement of residents 
of Maryborough and other Central Goldfields towns. She was very successful at winning grants from various 
community minded companies. Michell was the primary instigator for a number of Millhouse's popular 
programs:</p>
<ul>
	<li>Fiday Feast</li>
	<li>Food with Friends</li>
	<li>Millhouse Market</li>
	<li>Millhouse Cafe</li>
</ul>

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>All the contents of this page are just plain HTML. You are free to edit the contents but always confine your 
	editing to only that part of the code that does not have a yellow background color.</p>
	
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
	
</html>
<!-- #BeginEditable "End" -->

<?php DoShowMessage(); ?>

<!-- #EndEditable -->

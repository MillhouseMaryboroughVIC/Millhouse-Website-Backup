<?php
	
	require_once "../common.php";
	
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
		<title>Site History</title>
		
		<style type="text/css">





























































































































































			.content img
			{
				height: 250px;
			}
			
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
		<li><a href="site_history.php">Site History</a></li>
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
													echo "<button title=\"Page editing instructions.\" class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";
													
											?>
										</td>
									</tr>
								</table>			
								<form class="form_voice_assist_button"><button type="button" title="Show the voice assist settings." onclick="DoDisplayHidePopup('form_voice_assist', true)">
									<img src="../images/LoudSpeaker.png" alt="LoudSpeaker.png" height="70" /></button></form>

								<!-- #BeginEditable "CustomContent" -->

<h1>The Maryborough Knitting Mill</h1>
<table border="0" cellspacing="10" cellpadding="0">
	<tr>
		<td><a href="images/OldKnittingMillAerial.jpg"><img alt="" src="images/OldKnittingMillAerial.jpg" /></a></td>
		<td><a href="images/DyeHousePlaque.jpg"><img src="images/DyeHousePlaque.jpg" alt="" /></a></td>
	</tr>
	<tr>
		<td><a href="images/Church.jpg"><img src="images/Church.jpg" alt="" /></a></td>
		<td><a href="images/ChurchPlaque.jpg"><img src="images/ChurchPlaque.jpg" alt="" style="width:auto;height:150px;!important"/></a></td>
	</tr>
</table>
<p>The Maryborough Knitting Mill, originally known as the Cuttle Knitting Mill, was a significant 
industrial establishment in Maryborough, Victoria. The Cuttle knitting mill became a major employer 
and contributing to the town's industrial diversification after the gold rush.</p>

<p>The mill eventually closed in the early 1990s due to overseas competition and dismantling of import tariffs.</p>

<p>Here's a more detailed look at the mill's history...</p>

<h2>Post-Gold Rush Industrialization</h2>
<p>Following the decline of gold mining, Maryborough actively sought to attract industries to 
maintain its prosperity. The Maryborough Progress Association played a key role in this effort.</p>

<h2>Relocation and Growth</h2>
<p>The Cuttle Knitting Mill, previously located in Clunes. The owner, George Cuttle, was persuaded to relocate to 
Maryborough in 1923. And he did so with his investment partner and principal buyer Swiss born buyer Marta Tobler.</p>

<p>George and Marta initially imported Swiss lace but soon the knitting mill pioneered the manufacture 'whitewear', 
and other initimate apparel, selling it along the south east and east coasts of Australia for many years. Prior to 
this the vast majority if whitewear was imported from Britain and Europe.</p>

<p>By 1929 the mill employed over 300 workers and was turning over £100,000 annually</p>

<p>During the 1930’s depression, the mill soldiered on and then, during World War II, it supplied uniforms to the 
Commonwealth Government.</p>

<p>After WW2 there was a decline in sales that required the mill to raise additional capital in order to survive. 
Marta Tobler became an associate director of the company and was one of the few women involved in running industrial 
businesses in post war Australia.</p>


<table border="0" cellspacing="10" cellpadding="0">
	<tr>
		<td><img src="images/ChimneyConstruction.jpg" alt="" /></td>
		<td><img src="images/KnittingMill.jpg" alt="" /></td>
	</tr>
</table>

<h2>Major Employer</h2>
<p>The mill became a significant employer in the region, providing jobs for many residents and 
contributing to the local economy. MKM reached its peak employment, of over 800 people, in 1970. 
The knitting mill became part of Jockey Australia.</p>

<table border="0" cellspacing="10" cellpadding="0">
	<tr>
		<td><img src="images/Workers1.jpg" alt="" /></td>
		<td><img src="images/Workers2.jpg" alt="" /></td>
	</tr>
	<tr>
		<td><img src="images/Workers3.jpg" alt="" /></td>
		<td><img src="images/Workers4.jpg" alt="" /></td>
	</tr>
</table>
<h2>Product Range</h2>
<p>Initially focused on "whitewear", or cotton underwear, the mill expanded its production to include 
a wider range of cotton, woollen, and artificial fiber garments.</p>

<h2>Town Power Supplier</h2>
<p>The Maryborough knitting mill, formerly Cuttles, was also the source of town electricity before 
supply came from Yallourn, Gippsland.</p>

<h2>Bonds Australia</h2>

<p>In 1966, the Bonds group purchased a 25% financial stake in the Maryborough Knitting Mills through 
one of its subsidiary companies.</p>

<p>By 1982, Bonds increased its ownership to 100%, fully absorbing the Maryborough Knitting Mills into 
its national manufacturing network.</p>

<p>The Maryborough factory used its heavy-duty machinery to mass-produce private-label underwear, 
singlets, and knitwear for Australia's major department stores and supermarkets, complementing Bonds' 
own branded products.</p>

<h2>Holeproof</h2>

<p>On 1st July 1989, Maryborough Knitting Mills Pty Ltd was taken over by Holeproof, which was a division 
of Pacific Dunlop.</p>

<h2>Closure</h2>
<p>The Maryborough Knitting Mill closed in the early 1990s due to increased competition from 
cheaper imported clothing.</p>

<h2>Legacy</h2>
<p>The mill's 82-foot-high chimney remains as a preserved landmark, now located in the Goldfields 
Shopping Centre. The building now occupied by MillHouse evolved from an office block for the 
knitting mill, to the home of SkillShare, and now to the home of MillHouse - Neighborhood 
House.</p>

<h1>The years since closure of the knitting mill</h1>
<p>The owners of the former knitting mill the distinctive residential-style mill office building and dye house, 
at 88-90 Burke Street, transitioned the premisis into a community asset.</p>

<p>The Central Goldfields Shire Council re-purposed the building as a community retraining organisation, named 
SkillShare, for the purpose of re-training former mill workers and transisitioning them to other industries such 
as agribusiness and hopsitality.</p>

<p>Over the years the organisation has had several names, including SkillShare, Maryborough Learning Centre, 
Goldfields Employment and Learning Centre and now Mill House Neighbourhood House.</p>

<p>The organisation's original mission has been expanded by Mill House to include help for those struggling with 
cost of living, mental health, loneliness, isolation and parenting. We host a wide variety of groups and projects, 
in partnership with community organsiations. And we provide spaces for hire.</p>

<p>Mill Houses's philosophy is that the Maryborough and central goldfields communities can
make a difference together. Strong communities grow from connection, learning and inclusion. 
Mill House is your local community hub. A place to learn, share, volunteer and connect. You 
will find it is a welcoming, inclusive, and empowering place to 'hang out'</p>

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

<?php 

	/*********************************************************************************************
	 ********************************************************************************************
	 ********************************************************************************************
	 ********************************************************************************************
	 **** SARAH PLEASE NOTE
	 **** ------------------
	 **** Don't change this PHP code, between the < ? php and ? > tags. 
	 **** 
	 ********************************************************************************************
	 ********************************************************************************************
	 ********************************************************************************************
	 ********************************************************************************************/
	
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
		<title>Why Donate?</title>
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
		<li>
		<a href="../index.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Home</a></li>
		<li>
		<a href="../about/about.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">About Mill House</a></li>
		<li>
		<a href="../calendar/calendar.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Events Calendar</a></li>
		<li>
		<a href="../room/room.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Hire a room</a></li>
		<li>
		<a href="../sponsors/sponsors.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Our Collaborators</a></li>
		<li>
			<a href="contribute.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item">
				<a href="join.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a member</b></a></li>
				<li class="submenu_item">
				<a href="volunteering.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a volunteer</b></a></li>
				<li class="submenu_item">
				<a href="request_sponsorship.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="donation.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Make a donation</b></a></li>
			</ul>
		</li>
		<!--<li><a href="people/people.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Mill House People</a></li>-->
		<!--<li><a href="milestones/milestones.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Milestones</a></li>-->
		<li>
		<a href="../contact/contact.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Contact</a></li>
		<li>
		<a href="../site_history/site_history.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Site History</a></li>
		<li>
			<a href="../governance/governance.php" onclick="DoClickNavLinkWithSubmenu('governance')" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Governance</a> 
			<ul style="display:<?php echo DoShowHideSubmenu("governance"); ?>;" id="governance">
				<li class="submenu_item"><a href="https://www.acnc.gov.au/charity/charities/a49d2dd7-2daf-e811-a960-000d3ad24282/profile" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>ACNC Listing</b></a></li>
				<li class="submenu_item">
				<a href="../governance/rules/rules.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Rules</b></a></li>
				<li class="submenu_item">
				<a href="../governance/reports/reports.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Annual Reports</b></a></li>
				<li class="submenu_item">
				<a href="../governance/policies/policies.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Policies</b></a></li>
				<li class="submenu_item">
				<a href="../governance/plan/plan.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Strategic Plan</b></a></li>
			</ul>
		</li>
		<li>
		<a href="../group_events/group_events.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Group Events</a></li>
		<li>
			<a href="../administration/administration.php" onclick="DoClickNavLinkWithSubmenu('administration')" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Administration</a>
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
								
								<?php require_once "VoiceAssistForm.html"; ?>
								
								<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td>
											<div class="page_heading" id="div_page_heading" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onmouseleave="DoStopSpeaking()"><u><script type="text/javascript">document.write(document.title);</script></u></div>
										</td>
										<td style="text-align:right;">
											<?php
											
												if (isLoggedIn())
													echo "<button class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";
													
											?>
										</td>
									</tr>
								</table>			
								<form class="form_voice_assist_button"><button type="button" class="sight_impaired" onclick="DoDisplayHidePopup('form_voice_assist', true)">VOICE ASSIST</button></form>

								<!-- #BeginEditable "CustomContent" -->

<h1>Why Donate?</h1>

<p>Across the Central Goldfields, many individuals and families experience financial hardship, social isolation and 
limited access to services and opportunities.</p>

<p>Mill House Neighbourhood House is a community-based, not-for-profit organisation governed by a volunteer Committee 
of Management and supported by dedicated staff and volunteers. We provide a welcoming place where people of all ages 
and backgrounds can connect, participate, learn new skills and access practical support.</p>

<h1>Your Donation Supports Our Community</h1>

<p>Donations help us continue offering affordable and inclusive programs such as:</p>
<ul>
    <li>Friday Feast community lunches</li>
    <li>The Mill House Café</li>
    <li>Yarn craft and creative groups</li>
    <li>Painting, drawing and scrapbooking</li>
    <li>Book clubs and social activities</li>
    <li>Playgroups and family activities</li>
    <li>Youth and community programs</li>
</ul>

<p>Donations also support services and activities that help people experiencing hardship, including:</p>
<ul>
    <li>The Thursday Food Share Market</li>
    <li>The 24/7 Community Pantry</li>
    <li>Fresh produce and grocery relief</li>
    <li>Affordable frozen meals</li>
    <li>No-interest loan information and support</li>
    <li>Programs for parents and families</li>
    <li>Opportunities for volunteering, connection and participation</li>
    <li>Access to visiting community, employment and support services</li>
</ul>
<p>For many people, Mill House is more than a community centre. It is a place where they can feel welcomed, accepted, 
supported and connected.</p>

<h1>Every Donation Makes a Difference</h1>

<p>Your donation helps us provide food relief, community meals, essential items, welcoming spaces and activities that 
reduce isolation and build stronger community connections.</p>

<p>Financial donations of any amount are greatly appreciated. We may also be able to accept suitable donations of:</p>
<ul>
    <li>Unopened, in-date food and pantry items</li>
    <li>Clean clothing in good condition</li>
    <li>Clean bedding in good condition</li>
    <li>Small, non-electrical kitchen items</li>
    <li>Unopened toiletries and bathroom products</li>
    <li>Unopened haircare and personal-care products</li>
    <li>Unopened Cleaning products</li>
</ul>

<p>Our storage space and community needs can change, so please contact the Mill House Manager before bringing in 
donated goods. For health and safety reasons, we cannot accept expired, opened, damaged or unsafe items.</p>

<p>Please consider making a donation and helping Mill House continue making a real difference in the Central 
Goldfields community.</p>

<!--
*********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 **** SARAH PLEASE NOTE
 **** ------------------
 **** Don't change this Javascript code between the <script> and </script> tags. 
 **** Nor the HTML form between the <form> and </form> tags.
 **** Forms, and accessing the form data through PHP, are one of the more harder concepts 
 **** to master in web coding.
 **** 
 ********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 -->

<script type="text/javascript">

	function OnClickDonationRadio(strAmount)
	{
		let textAmount = document.getElementById("amount");
		if (textAmount)
		{
			textAmount.value = strAmount;
			textAmount.focus();
		}
	}
	
</script>
<form method="post" target="_self" class="form" action="../donation_receipt.php" style="width:850px;">

	<table border="0" cellspacing="5" cellpadding="0">
		<tr>
			<td colspan="8"><h2>DONATION FORM</h2></td>
		</tr>
		<tr>
			<td colspan="8">
				<br/><b>Please note that Millhouse will contact you via a phone call to confirm your donation &amp; 
				obtain your credit card details or provide you with Millhouse's bank account details..
				</b><br/><br/>
			</td>
		</tr>
		<tr>
			<td colspan="4"><label for="given_names">GIVEN NAMES</label></td>
			<td colspan="4"><label for="surname">SURNAME</label></td>
		</tr>
		<tr>
			<td colspan="4"><input type="text" name="text_given_names" id="text_given_names" required onkeypress="OnKeyPressName(event)"/></td>
			<td colspan="4"><input type="text" name="text_surname" id="text_surname" required onkeypress="OnKeyPressName(event)"/></td>
		</tr>
		<tr>
			<td colspan="4"><label for="email">EMAIL ADDRESS</label></td>
			<td colspan="4"><label for="phone">PHONE NUMBER</label></td>
		</tr>
		<tr>
			<td colspan="4"><input type="text" name="text_email" id="text_email" required onkeypress="OnKeyPressEmailAddress(event)"/></td>
			<td colspan="4"><input type="text" name="text_phone" id="text_phone" required onkeypress="OnKeyPressPhone(event)"/></td>
		</tr>
		<tr>
			<td colspan="8"><br/><label><b>DONATION AMOUNT</b></label></td>
		</tr>
		<tr>
			<td><input type="radio" id="radio_amount5" checked name="radio_amount" onclick="OnClickDonationRadio('5')" />&nbsp;<label for="Amount5">$5</label></td>
			<td><input type="radio" id="radio_amount10" name="radio_amount" onclick="OnClickDonationRadio('10')" />&nbsp;<label for="Amount5">$10</label></td>
			<td><input type="radio" id="radio_amount20" name="radio_amount" onclick="OnClickDonationRadio('20')" />&nbsp;<label for="Amount5">$20</label></td>
			<td><input type="radio" id="radio_amount50" name="radio_amount" onclick="OnClickDonationRadio('50')" />&nbsp;<label for="Amount5">$50</label></td>
			<td>
			<input type="radio" id="radio_amount100" name="radio_amount" onclick="OnClickDonationRadio('100')" />&nbsp;<label for="Amount5">$100</label></td>
			<td><input type="radio" id="radio_amount200" name="radio_amount" onclick="OnClickDonationRadio('200')" />&nbsp;<label for="Amount5">$200</label></td>
			<td><input type="radio" id="radio_amount500" name="radio_amount" onclick="OnClickDonationRadio('500')" />&nbsp;<label for="Amount5">$500</label></td>
			<td><input type="radio" id="radio_amount1000" name="radio_amount" onclick="OnClickDonationRadio('')" />&nbsp;<label for="Amount5">Other</label></td>
		</tr>
		<tr>
			<td colspan="8">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<label for="amount">$&nbsp;</label>
						</td>
						<td>
							<input type="text" name="text_amount" id="text_amount" required onkeypress="OnKeyPressDigitsOnly(event)" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="8"><label><b>PAYMENT METHOD</b></label></td>
		</tr>
		<tr>
			<td colspan="8">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<input type="radio" name="radio_method" id="radio_card" value="Credit card"checked /><label for="card">Credit card</label>
						</td>
						<td>
							<input type="radio" name="radio_method" id="radio_bank" value ="Bank transfer" /><label for="bank">Bank transfer</label>
						</td>
						<td>
							<input type="radio" name="radio_method" id="radio_cash" value ="Cash" /><label for="bank">Cash</label>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:right;">
				<input type="submit" name="submit" />
			</td>
		</tr>
	</table>
</form>

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
		
		if (JSON.parse(sessionStorage.getItem("bAudioAssistOn")))
		{
			alert("The audio assist feature requires user interaction to 'activate'.\n\nYou will need to click a blank part of the page after you close this message box.\n\nIt is annoying, but it is web browser requirement.");
		}
		
	</script>
	
</html>
<!-- #BeginEditable "End" -->

<?php DoShowMessage(); ?>

<!-- #EndEditable -->

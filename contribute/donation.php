<?php 

	/********************************************************************************************
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
 
 	if (isset($_POST["submit"]))
 	{
 		mail($g_strEmailManager, "I'd like to make a donation to Mill House.",
				"<b>GIVEN NAMES: </b>". $_POST["given_names"] . "\n" .
				"<b>SURNAME: </b>". $_POST["surname"] . "\n" .
				"<b>EMAIL: </b>". $_POST["email"] . "\n" .
				"<b>PHONE: </b>". $_POST["phone"] . "\n" .
				"<b>AMOUNT: </b>". $_POST["amount"] . "\n" .
				"<b>METHOD: </b>". $_POST["method"] . "\n",
				"From: <" . $_POST["given_names"] . " " . $_POST["surname"] . ">" . $_POST["email"]);
			
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
		<title>Make a Donation</title>
		
		<style type="text/css">



































































































































































































































































			.contents_cell			
			{
				background-color: var(--end_color);
				border-radius: 10px;
				vertical-align: middle;
				width: 100px;
			}	

			.contents_cell a
			{
				color: var(--start_color);
			}
			
			.table_cell
			{
				vertical-align: top;
				padding-left: 10px;
				padding-right: 10px;
				width: 50%;
			}
			
			.table_cell a
			{
				text-decoration-color: var(--start_color);
			}
			
			.table_cell a:hover
			{
				text-decoration-color: var(--start_color);
				color: inherit;
			}
			
			.link_image
			{
				width: 500px;
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
			<a href="contribute.php" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item"><a href="join.php"><b>Become a member</b></a></li>
				<li class="submenu_item"><a href="volunteering.php"><b>Become a volunteer</b></a></li>
				<li class="submenu_item"><a href="request_sponsorship.php"><b>Become a sponsor</b></a></li>
				<li class="submenu_item"><a href="donation.php"><b>Make a donation</b></a></li>
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
									<img src="../images/LoudSpeaker.png" alt="LoudSpeaker.png" height="70" /></button></form>

								<!-- #BeginEditable "CustomContent" -->
								
<!--
*********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 **** SARAH PLEASE NOTE
 **** ------------------
 **** Don't change this Javascript code, between the <script> and </script> tags. 
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
<form method="post" target="_self" class="donation_form" action="\donation_receipt.php" id="donate_form">

	<table border="0" cellspacing="5" cellpadding="0">
		<tr>
			<td colspan="8"><h1>DONATION FORM</h1></td>
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
			<td colspan="4"><input type="text" name="given_names" id="given_names" required pattern="<?php echo $g_strPatternPersonName; ?>" onkeypress="OnKeyPressName(event)"/></td>
			<td colspan="4"><input type="text" name="surname" id="surname" required pattern="<?php echo $g_strPatternPersonName; ?>" onkeypress="OnKeyPressName(event)"/></td>
		</tr>
		<tr>
			<td colspan="4"><label for="email">EMAIL ADDRESS</label></td>
			<td colspan="4"><label for="phone">PHONE NUMBER</label></td>
		</tr>
		<tr>
			<td colspan="4"><input type="text" name="email" id="email" required pattern="<?php echo $g_strPatternEmail; ?>" onkeypress="OnKeyPressEmailAddress(event)"/></td>
			<td colspan="4"><input type="text" name="phone" id="phone" required pattern="<?php echo $g_strPatternPhoneNumber; ?>" onkeypress="OnKeyPressPhone(event)"/></td>
		</tr>
		<tr>
			<td colspan="8"><br/><label>DONATION AMOUNT</label></td>
		</tr>
		<tr>
			<td><input type="radio" id="Amount5" checked name="amount" onclick="OnClickDonationRadio('5')" />&nbsp;<label for="Amount5">$5</label></td>
			<td><input type="radio" id="Amount10" onclick="OnClickDonationRadio('10')" />&nbsp;<label for="Amount5">$10</label></td>
			<td><input type="radio" id="Amount20" onclick="OnClickDonationRadio('20')" />&nbsp;<label for="Amount5">$20</label></td>
			<td><input type="radio" id="Amount50" onclick="OnClickDonationRadio('50')" />&nbsp;<label for="Amount5">$50</label></td>
			<td>
			<input type="radio" id="Amount1001" onclick="OnClickDonationRadio('100')" />&nbsp;<label for="Amount5">$100</label></td>
			<td><input type="radio" id="Amount200" onclick="OnClickDonationRadio('200')" />&nbsp;<label for="Amount5">$200</label></td>
			<td><input type="radio" id="Amount500" onclick="OnClickDonationRadio('500')" />&nbsp;<label for="Amount5">$500</label></td>
			<td><input type="radio" id="AmountCustom" onclick="OnClickDonationRadio('')" />&nbsp;<label for="Amount5">Other</label></td>
		</tr>
		<tr>
			<td colspan="8">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<label for="amount">$&nbsp;</label>
						</td>
						<td>
							<input type="text" name="amount" id="amount" required onkeypress="OnKeyPressDigitsOnly(event)" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="8"><label>PAYMENT METHOD</label></td>
		</tr>
		<tr>
			<td colspan="4"><input type="radio" name="method" id="card" checked /><label for="card">CREDIT CARD</label></td>
			<td colspan="4"><input type="radio" name="method" id="bank" /><label for="bank">BANK TRANSFER</label></td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:right;">
				<input type="submit" name="submit" value="SUBMIT" />
			</td>
		</tr>
	</table>
</form>

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>ALL the contents of this page is just plain HTML and CSS, except for some PHP code that processes the contents of 
	the form when you click the button. But please do not edit the contents of this page unless you are an expert.</p>
	
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

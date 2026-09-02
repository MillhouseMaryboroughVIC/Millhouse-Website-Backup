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
	require "../common.php";
	require "admin_login.php";

	DoRecordPageHitOrBlock();

	//******************************************************************************
	//******************************************************************************
	//** 
	//** DISPLAY LOGIN FORM OR APPROVE SPONSOR FORM
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoDisplayForm()
	{
		if (!IsLoggedIn())
		{
			DoDisplayLoginForm();
		}
		else if (IsAdminLoggedIn())
		{
			DoDisplayLogoutForm();			
			DoDisplayApproveSponsorForm();
		}
		DoDisplayLoginFormInstrunctions();
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** POST DATA PROCESSING
	//** 
	//******************************************************************************
	//******************************************************************************							
		
	if (isset($_POST["button_add_sponsor"]))
	{
		$dateExpiry = new DateTime($_POST["date_expiry"]);
		$nNextAutoIncVal = (int)DoGetNextAutoIncVal($g_dbMillhouse, "sponsors");
/*		
echo "####################<br>\n";
echo $_FILES["file_logo_image"]["name"] . "<br>\n";
print_r($_FILES);
echo "####################<br>\n";
*/
		$results = DoInsertQuery10($g_dbMillhouse, "sponsors", "business_name", $_POST["text_business_name"], 
									"type", $_POST["select_sponsor_type"], "contact_name", $_POST["text_contact_name"], 
									"email_address", $_POST["text_contact_email"], "phone_number", $_POST["text_contact_email"], 
									"website", $_POST["text_website"], "description", DoRemoveScriptTags($_POST["textarea_description"]),
									"logo_image",  $_FILES["file_logo_image"]["name"],
									"expiry_date", $dateExpiry->format("Y-m-d"), "amount_paid", $_POST["text_payment_amount"]);
		
		if ($results)
		{
			DoFlagMessage("The sponsor has been added to the database successfully...", false, $g_dbMillhouse->error);
			DoSaveFile("file_logo_image", "../sponsors/images/");
			
			$results = DoFindMaxQuery1($g_dbMillhouse, "sponsors", "ranking", "type", $_POST["select_sponsor_type"]);
			if ($results && ($results->num_rows > 0))
			{
				if ($row = $results->fetch_assoc())
				{
					$results = DoUpdateQuery1($g_dbMillhouse, "sponsors", "ranking", $row["MAX(ranking)"] + 1, "shortkey", (string)$nNextAutoIncVal);
					if (!$results)
						DoFlagMessage("Failed to set ranking for added sponsor...", true, $g_dbMillhouse->error);
				}
			}
			else
			{
				DoFlagMessage("Failed to find maximum ranking...", true, $g_dbMillhouse->error);
			}
		} 
		else
		{
			DoFlagMessage("Could not add this sponsor to the database...", true, $g_dbMillhouse->error);
		}
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** ADD SPONSOR FORM FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************

	function DoDisplayApproveSponsorForm()
	{
		global $g_strPatternPhoneNumber;
		global $g_strPatternEmail;
		global $g_strPatternURL;
		global $g_strPatternPersonName;
		global $g_strPatternCurrency;
		
		echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"form_add_sponsor\" enctype=\"multipart/form-data\" style=\"width:900px;\" >\n";
		echo "    <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		echo "        <tr>\n";
		echo "           <td style=\"text-align:center;\" colspan=\"2\"><label><h1>Approve an sponsor</h1></label><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "           <td style=\"text-align:center;\" colspan=\"2\"><button type=\"button\" onclick=\"DoDisplayHidePopup('div_add_sponsor_instructions', true)\">INSTRUCTIONS</button><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr><td colspan=\"2\"><hr/></td></tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_business_name\">Business name: </label></td>\n";
		echo "	          <td><input name=\"text_business_name\" id=\"text_business_name\" type=\"text\" required pattern=\"" . $g_strPatternPersonName ."\" autocomplete=\"on\" placeholder=\"Business name...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;\" >\n";
		echo "                <label for=\"select_type\">Type of sponsor: </label>\n";
		echo "            </td>\n";
		echo "            <td>\n";
		echo "                <select id=\"select_type\" id=\"select_sponsor_type\" name=\"select_sponsor_type\" onchange=\"DoChangeSponsors()\">\n";
		echo DoGenerateSponsorTypeSelectOptions("");
		echo "                </select>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_contact_name\">Contact name: </label></td>\n";
		echo "	          <td><input name=\"text_contact_name\" id=\"text_contact_name\" type=\"text\" pattern=\"" . $g_strPatternPersonName ."\" autocomplete=\"on\" placeholder=\"Contact name...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_contact_phone\">Phone number: </label></td>\n";
		echo "	          <td><input name=\"text_contact_phone\" id=\"text_contact_phone\" type=\"text\" pattern=\"" . $g_strPatternPhoneNumber ."\" autocomplete=\"on\" placeholder=\"Contact phone number...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_contact_email\">Email number: </label></td>\n";
		echo "	          <td><input name=\"text_contact_email\" id=\"text_contact_email\" type=\"text\" pattern=\"" . $g_strPatternEmail ."\" autocomplete=\"on\" placeholder=\"Contact email address...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_website\">Website URL: </label></td>\n";
		echo "	          <td><input name=\"text_website\" id=\"text_website\" type=\"text\" required pattern=\"" . $g_strPatternURL ."\" autocomplete=\"on\" placeholder=\"Website URL...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_logo_image\">Logo image: </label></td>\n";
		echo "	          <td>\n";
		echo "                <input type=\"file\" id=\"file_logo_image\" name=\"file_logo_image\" accept=\".png, .jpg, .jpeg\" required autocomplete=\"on\" placeholder=\"Logo image file name URL...\" />";
		echo "                <label>You can drag and drop files...</label>\n";
		echo "            </td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "             <td style=\"text-align: right;\"><label for=\"textarea_description\">What is this sponsor providing?</label></td>";
		echo "             <td>\n";
		echo "                 <textarea id=\"textarea_description\" name=\"textarea_description\" rows=\"10\" required></textarea><br/><br/>\n";
		echo "             </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_payment_amount\">Payment amount: </label></td>\n";
		echo "	          <td><input name=\"text_payment_amount\" id=\"text_payment_amount\" type=\"text\" required value=\"0\" pattern=\"" . $g_strPatternCurrency . "\" autocomplete=\"on\" placeholder=\"How much was paid?\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"date_expiry\">Expiry date: $</label></td>\n";
		echo "	          <td><input id=\"date_expiry\" name=\"date_expiry\" type=\"date\" required /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td colspan=\"2\" style=\"text-align: center;\">\n";
		echo "                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
		echo "                    <tr>\n";
		echo "                        <td>\n";
		echo "                            <input type=\"radio\" name=\"radio_number_months\" onclick=\"DoClickNumMonthsRadio(24)\">\n";
		echo "                            <label for=\"radio_24_months\">24 months from today</label>\n";
		echo "                        </td>\n";
		echo "                        <td>\n";
		echo "                            <input type=\"radio\" name=\"radio_number_months\" onclick=\"DoClickNumMonthsRadio(18)\">\n";
		echo "                            <label for=\"radio_18_months\">18 months from today</label>\n";
		echo "                        </td>\n";
		echo "                        <td>\n";
		echo "                            <input type=\"radio\" checked name=\"radio_number_months\" onclick=\"DoClickNumMonthsRadio(12)\">\n";
		echo "                            <label for=\"radio_12_months\">12 months from today</label>\n";
		echo "                        </td>\n";
		echo "                        <td>\n";
		echo "                            <input type=\"radio\" name=\"radio_number_months\" onclick=\"DoClickNumMonthsRadio(6)\">\n";
		echo "                            <label for=\"radio_6_months\">6 months from today</label>\n";
		echo "                        </td>\n";
		echo "                        <td>\n";
		echo "                            <input type=\"radio\" name=\"radio_number_months\" onclick=\"DoClickNumMonthsRadio(1)\">\n";
		echo "                            <label for=\"radio_1_month\">1 month from today</label>\n";
		echo "                        </td>\n";
		echo "                    </tr>\n";
		echo "                </table>\n";
		echo "            </td>\n";	
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "                <input type=\"submit\" name=\"button_add_sponsor\" id=\"button_add_sponsor\" value=\"ADD SPONSOR\"/>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "    </table>\n";
		echo "</form>\n";	
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
		<title>Add a Sponsor</title>
		<style type="text/css">
</style>
		<script type="text/javascript">
		
			function DoOnPageLoadComplete()
			{
			}
			
		</script>
		<script type="text/javascript" src="admin_login.js"></script>
		
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
			<a href="../contribute/contribute.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item">
				<a href="../contribute/join.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a member</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/volunteering.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a volunteer</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/request_sponsorship.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/donation.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Make a donation</b></a></li>
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
			<a href="administration.php" onclick="DoClickNavLinkWithSubmenu('administration')" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Administration</a>
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
<script type="text/javascript">

	function DoClickNumMonthsRadio(nNumMonths)
	{
		let dateExpiry = document.getElementById("date_expiry"),
			datetimeExpiry = null;
		
		if (dateExpiry)
		{
			datetimeExpiry = new Date(dateExpiry.value);
			
			switch (nNumMonths)
			{
				case 24:
					datetimeExpiry.setFullYear(datetimeExpiry.getFullYear + 2);
					break;
				case 18:
					datetimeExpiry.setFullYear(datetimeExpiry.getFullYear + 1);
					datetimeExpiry.setMonth(datetimeExpiry.getMonth + 6);
					break;
				case 12:
					datetimeExpiry.setFullYear(datetimeExpiry.getFullYear + 1);
					break;
				case 6:
					datetimeExpiry.setMonth(datetimeExpiry.getMonth + 6);
					break;
				case 1:
					datetimeExpiry.setMonth(datetimeExpiry.getMonth + 1);
					break;
			}
			dateExpiry.valueAsDate = datetimeExpiry;
		}
	}
	
</script>
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
	DoDisplayForm(); 
	
?>

<div id="div_add_sponsor_instructions" class="instruction_popup">
	
	<h1>INSTRUCTIONS FOR THE ADD SPONSOR FORM</h1>
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_add_sponsor_instructions', false)">CLOSE</button></p>
	
	<h3>STEP 1</h3>
	
	<p>Edit the sponsors details as you see fit.</p>
	
	<h3>SPONSOR TYPE</h3>
	
	<p>There are currently 3 types of sponsors:</p>
	<ul>
		<li>Businesses that provide grants or other forms of funding for Mill House.</li>
		<li>Businesses that donate food, clothes and other household items for re-distributuon among the community.</li>
		<li>Businesses that provide free services to Mill House.</li>
	</ul>
	
	<p>These categories are stored in the database and can be expanded if ever needed.</p>
	
	<h3>LOGO IMAGE</h3>
	
	<p>You can upload a new company logo image with this input: <input type="file" accept=".png, .jpg, .jpeg" placeholder="Logo image file name URL..." /></p>
	
	<p>You can click the button and browse for a new image file or you can drag and drop and image file onto this input.</p>
	
	<p>This new image file will REPLACE the existing image file, with the old file name, for the sponsor.</p>
	
	<h3>REQUIRED</h3>
	
	<ul>
		<li>Business name</li>
		<li>Type of sponsor</li>
		<li>Website</li>
		<li>Logo image</li>
		<li>New expiry date</li>
	</ul>
	
	<h3>OPTIONAL</h3>
	
	<ul>
		<li>Contact name</li>
		<li>Contact phone</li>
		<li>Contact email</li>
		<li>Payment amount</li>
	</ul>
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_add_sponsor_instructions', false)">CLOSE</button></p>
	
	<h3>EXPIRY DATE</h3>
	
	<p>If today's date is after the expiry date for the selected sponsor, then that sponsor will n longer appear in the 
	sponsor . our collaborators page and nor in the sponsor marquee in the page mastheads.</p>
	
	<p>
		To set the expiry date, at some point in the future, with this date input:<br/><br/>
	
		<label>Expiry date: </label><input type="date" />.
	</p>
	
	<h4>RADIO BUTTONS</h4>
	
	<p>You can use these radio buttons to set a future date int the expiry date input. For example, if you click 
	the '12 months' radio button then a date 12 months from today's date will be set in the expiry date field.</p>
	
	<input type="radio" name="radio_number_months" /><label>24 months from today</label><br/><br/>
	<input type="radio" name="radio_number_months" /><label>18 months from today</label><br/><br/>
	<input type="radio" checked name="radio_number_months" /><label>12 months from today</label><br/><br/>
	<input type="radio" name="radio_number_months" /><label for="radio_6_months">6 months from today</label><br/><br/>
	<input type="radio" name="radio_number_months" /><label>1 month from today</label><br/><br/>

	<p><button type="button" onclick="DoDisplayHidePopup('div_add_sponsor_instructions', false)">CLOSE</button></p>
	
	<h2>STEP 2</h2>
	
	<p>Once you are satisfied with the sponsor's details click this button: <input type="button" value="ADD SPONSOR" /></p>
	
	<p>This will result in the new sponsor's details being saved to the databse.</p>
	
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

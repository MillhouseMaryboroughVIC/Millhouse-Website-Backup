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
	//** FORM DATA PERSISTENCE
	//** 
	//******************************************************************************
	//******************************************************************************							
		
	if (!isset($_POST["button_renew_advert"]) && !isset($_POST["button_load_advert"]))
	{
		$_SESSION["text_sort_business_name"] = "";
		$_SESSION["text_days"] = "";
		$_SESSION["radio_sortby"] = "";

		$_SESSION["text_business_name"] = "";
		$_SESSION["text_contact_name"] = "";
		$_SESSION["text_contact_email"] = "";
		$_SESSION["text_contact_phone"] = "";
		$_SESSION["text_website"] = "";
		$_SESSION["textarea_advert_html"] = "";
		$_SESSION["date_expiry"] = "";
		$_SESSION["text_payment_amount"] = "";
		$_SESSION["date_new_expiry"] = "";
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** POST & GET DATA PROCESSING
	//** 
	//******************************************************************************
	//******************************************************************************							
		
	if (isset($_POST["button_sort_adverts"]))
	{
		$_SESSION["text_sort_business_name"] = $_POST["text_sort_business_name"];
		$_SESSION["text_days"] = $_POST["text_days"];
		$_SESSION["radio_sortby"] = $_POST["radio_sortby"];
	}
	else if (isset($_POST["button_renew_advert"]))
	{
		$_SESSION["text_business_name"] = $_POST["text_business_name"];
		$_SESSION["text_contact_name"] = $_POST["text_contact_name"];
		$_SESSION["text_contactemail"] = $_POST["text_contact_email"];
		$_SESSION["text_contact_phone"] = $_POST["text_contact_phone"];
		$_SESSION["text_website"] = $_POST["text_website"];
		$_SESSION["textarea_advert_html"] = $_POST["textarea_advert_html"];
		$_SESSION["date_expiry"] = $_POST["date_expiry"];
		$_SESSION["text_payment_amount"] = $_POST["text_payment_amount"];
		$_SESSION["date_new_expiry"] = $_POST["date_new_expiry"];
		$_SESSION["text_sort_business_name"] = $_POST["text_sort_business_name"];
		$_SESSION["text_days"] = $_POST["text_days"];
		$_SESSION["radio_sortby"] = $_POST["radio_sortby"];

		$dateNow = new DateTime();
		$results = DoFindQuery1($g_dbMillhouse, "adverts", "shortkey", $_POST["select_advert"]);

		if ($results && ($results->num_rows > 0))
		{
			if ($row = $results->fetch_assoc())
			{
				// Is this an already expired advert and, if so, is it already taken?
				$dateExpiry = new DateTime($row["expiry_date"]);
				$strExpiryDate = "";
				if (($dateExpiry < $dateNow) && IsAdvertSlotTaken($strAdvertSlotID, $stExpiryDate) && 
					($_POST["text_sort_business_name"] != $row["business_name"]))
				{
					// Yes the advert slot is taken.
					PrintJavascriptLine("alert('This advert slot is currently taken - please select a different one...')", 1, true);
				}
				else
				{
					// Make the current advert expire now.
					$dateNow->modify("-1 day");

					$results = DoUpdateQuery1($g_dbMillhouse, "adverts", "advert_slot_id", $_POST["select_advert"], 
												"expiry_date", $dateNow->format("Y-m-d"));
					if ($results)
					{
						// Insert a new advert into the database.
						$results = DoInsertQuery8($g_dbMillhouse, "adverts",
													"business_name", $_POST["text_business_name"],
													"contact_name", $_POST["text_contact_name"],
													"contact_email", $_POST["text_contact_email"], 
													"contact_phone", $_POST["text_contact_phone"], 
													"website", $_POST["text_website"], 
													"advert_html", $_POST["textarea_advert_html"], 
													"expiry_date", $_POST["new_expiry_date"],
													"payment_amount", $_POST["text_payment_amount"]);
						if ($results)
						{
							PrintJavascriptLine("alert('The sponsorship was renewed successfully...')", 1, true);
						}
						else
						{
							PrintJavascriptLine("alert('The sponsorship could not be renewed...')", 1, true);
						}
					}
				}
			}
		}
	}
	else if (isset($_POST["button_load_advert"]))
	{
		$results = DoFindQuery1($g_dbMillhouse, "adverts", "shortkey", $_POST["select_advert"]);

		if ($results && ($results->num_rows > 0))
		{
			if ($row = $results->fetch_assoc())
			{
				$_SESSION["text_business_name"] = $row["business_name"];
				$_SESSION["text_contact_name"] = $row["contact_name"];
				$_SESSION["text_contact_email"] = $row["email_address"];
				$_SESSION["text_contact_phone"] = $row["phone_number"];
				$_SESSION["text_website"] = $row["website"];
				$_SESSION["textarea_advert_html"] = $row["advert_html"];
				$_SESSION["date_expiry"] = $row["expiry_date"];
				$_SESSION["text_payment_amount"] = (int)$row["amount_paid"];
			}
		}
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** DISPLAY LOGIN FORM OR RENEW SPONSORSHIP FORM
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoDisplayForm()
	{
		if (IsLoggedIn())
		{
			DoDisplayLogoutForm();			
			DoDisplayRenewSponsorForm();
		}
		else
		{
			DoDisplayLoginForm();
		}
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** RENEW SPONSORSHIP FORM FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoGetAdvertSlotDesc($strAdvertSlotID)
	{
		global $g_dbMillhouse;
		$strDesc = "";

		$results = DoFindQuery1($g_dbMillhouse, "advert_slots", "id", $strAdvertSlotID);
		if ($results && ($results->num_rows > 0))
		{
			if ($row = $results->fetch_assoc())
			{
				$strDesc = $row["desc"];
			}
		}
		return $strDesc;
	}
	
	function DoGenerateAdvertOptions()
	{	
		global $g_dbMillhouse;
		$strHTML = "";
		$results = NULL;

		if (isset($_POST["button_sort_adverts"]))
		{
			if ($_POST["radio_sortby"] == "all")
			{
				$results = DoFindAllQuery($g_dbMillhouse, "adverts");
			}
			else if ($_POST["radio_sortby"] == "expires_in")
			{
				$dateNow = new DateTime();
				$dateExpiry = new DateTime();
				dateExpiry->modify("+" . $_POST["text_days"] . " days");
				
				$results = DoFindAllQuery($g_dbMillhouse, "adverts", "(expiry_date >= '" . 
																		dateNow->format("Y-m-d") . "') AND " . 
																		"(expiry_date <= '" . dateExpiry->format("Y-m-d") . 
																		"')");
			}
			else if ($_POST["radio_sortby"] == "expired_by")
			{
				$dateNow = new DateTime();
				$dateExpiry = new DateTime();
				dateExpiry->modify("-" . $_POST["text_days"] . " days");
				
				$results = DoFindAllQuery($g_dbMillhouse, "adverts", "(expiry_date >= '" . 
																		dateExpiry->format("Y-m-d") . "') AND " . 
																		"(expiry_date <= '" . dateNow->format("Y-m-d") . 
																		"')");
			}
			else if ($_POST["radio_sortby"] == "business_name")
			{
				$results = DoFindAllQuery($g_dbMillhouse, "adverts", "business_name = '" . $_POST["text_sort_business_name"] . "'");
			}
		}
		else
			$results = DoFindAllQuery($g_dbMillhouse, "adverts");

		if ($results && ($results->num_rows > 0))
		{
			while ($row = $results->fetch_assoc())
			{
				$dateExpiry = new DateTime($row["expiry_date"]);
				$strHTML .= "    <option value=\"" .  $row["shortkey"] . "\">" . 
								DoGetAdvertSlotDesc($row["advert_slot_id"]) . ", " . $row["business_name"] . 
								" ,expiry date: " . $dateExpiry->format("d/m/Y") . "</option>\n";
			}
		}
		return $strHTML;
	}

	function DoGetDataField($strFieldKey)
	{
		$strValue = "";
		
		if (isset($_POST[$strFieldKey]))
			$strValue = $_POST[$strFieldKey];
			
		return $strValue;
	}
	
	function DoDisplayRenewSponsorForm()
	{
		global $g_strPatternPhoneNumber;
		global $g_strPatternEmail;
		global $g_strPatternURL;
		global $g_strPatternPersonName;
		global $g_strPatternCurrency;
		
		echo "<p>Use the renew a sponsorship. You can sort sponsorsips based on:</p>\n";
		echo "<ul>\n";
		echo "    <li>Those about to expire between today and a specified number of days in the future.</li>\n";
		echo "    <li>Those that have expired between today and a specified number of days in the past.</li>\n";
		echo "    <li>Those belonging to a particular business name.</li>\n";
		echo "</ul>\n";
		echo "<p>Once you find and select the sponsorship instance you are looking for, yYou can then re-call the \n";
		echo "details of that instance, make any needed modifications and then renew it with the amount paid by the \n";
		echo "sponsor and a new expiry date.</p>\n";
		echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"form_advert\" style=\"width:1000px;\" >\n";
		echo "    <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		echo "        <tr>\n";
		echo "           <td style=\"text-align:center;\" colspan=\"2\"><label for=\"\"><h3Extend an existing advert</h3></label><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr><td colspan=\"2\"><hr/></td></tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\">\n";
		echo "                <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		echo "                    <tr><td colspan=\"8\"><label for=\"\"><u>Sorting adverts</u></label></td></tr>\n";
		echo "                    <tr>\n";				
		echo "                        <td><input type=\"radio\" " . ((($_SESSION["radio_sortby"] == "all") || ($_SESSION["radio_sortby"] == "")) ? "checked" : "") . " name=\"radio_sortby\" id=\"radio_sortby_all\" value=\"all\"></td>\n";
		echo "                        <td><label for=\"radio_sortby_all\">All adverts </label></td>\n";
		echo "                        <td><input type=\"radio\" " . (($_SESSION["radio_sortby"] == "expires_in") ? "checked" : "")  . " name=\"radio_sortby\" id=\"radio_sortby_expires_in\" value=\"expires_in\"></td>\n";
		echo "                        <td><label for=\"radio_sortby_expires_in\">Expires in up to</label></td>\n";
		echo "                        <td><input type=\"radio\" " . (($_SESSION["radio_sortby"] == "expired_by") ? "checked" : "")  . " name=\"radio_sortby\" id=\"radio_sortby_expired_by\" value=\"expired_by\"></td>\n";
		echo "                        <td><label for=\"radio_sortby_expired_by\">Expired by up to</label></td>\n";
		echo "                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"number\" id=\"text_days\" name=\"text_days\"  value=\"" . $_SESSION["text_days"] . "\" min=\"0\" max=\"7\" style=\"width:4ch;\" onchange=\"DoOnChangeActiveAdvertSlot()\" /></td>\n";
		echo "                        <td><label for=\"\"> days</label></td>\n";
		echo "                    </tr>\n";
		echo "                    <tr>\n";
		echo "                        <td><input type=\"radio\" " . (($_SESSION["radio_sortby"] == "business_name") ? "checked" : "") . " name=\"radio_sortby\" id=\"radio_sortby_business_name\" value=\"business_name\"></td>\n";
		echo "                        <td><label for=\"text_sortby_business_name\">Business name</label></td>\n";
		echo "                        <td colspan=\"6\">&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" id=\"text_sort_business_name\" name=\"text_sort_business_name\" value=\"" . $_SESSION["text_sort_business_name"] . "\" /></td>\n";
		echo "                    </tr>\n";
		echo "        			  <tr>\n";
		echo "                        <td colspan=\"8\"><button type=\"submit\" id=\"button_sort_adverts\" name=\"button_sort_adverts\">SORT SPONSORSHIPS<//button></td>\n";
		echo "                    </tr>\n";
		echo "                </table>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr><td colspan=\"2\"><hr/></td></tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"select_advert\">Select the advert to extend</label></td>\n";
		echo "	          <td>\n";
		echo "                <select id=\"select_advert\" name=\"select_advert\" onchange=\"DoOnChangeActiveAdvertSlot()\" style=\"width:100%;\">\n";
		echo DoGenerateAdvertOptions(DoGetDataField("select_advert"));
		echo "                </select>\n";
		echo "            </td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"8\"><button type=\"submit\" id=\"button_load_advert\" name=\"button_load_advert\">LOAD SPONSORSHIP DETAILS<//button></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_business_name\">Contact name: </label></td>\n";
		echo "	          <td><input id=\"text_business_name\" name=\"text_business_name\" type=\"text\" value=\"" . $_SESSION["text_business_name"] . "\" pattern=\"" . $g_strPatternPersonName ."\" autocomplete=\"on\" placeholder=\"Contact name...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_contact_name\">Contact name: </label></td>\n";
		echo "	          <td><input id=\"text_contact_name\" name=\"text_contact_name\" type=\"text\" value=\"" . $_SESSION["text_contact_name"] . "\" pattern=\"" . $g_strPatternPersonName ."\" autocomplete=\"on\" placeholder=\"Contact name...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_contact_phone\">Phone number: </label></td>\n";
		echo "	          <td><input id=\"text_contact_phone\" name=\"text_contact_phone\" name=\"text_contact_phone\" type=\"text\" value=\"" . $_SESSION["text_contact_phone"] . "\" pattern=\"" . $g_strPatternPhoneNumber ."\" autocomplete=\"on\" placeholder=\"Contact phone number...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_contact_email\">Email address: </label></td>\n";
		echo "	          <td><input id=\"text_contact_email\" name=\"text_contact_email\" name=\"text_contact_email\" type=\"text\" value=\"" . $_SESSION["text_contact_email"] . "\" pattern=\"" . $g_strPatternEmail ."\" autocomplete=\"on\" placeholder=\"Contact email address...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_website\">Website URL: </label></td>\n";
		echo "	          <td><input id=\"text_website\" name=\"text_website\" name=\"text_website\" type=\"text\" value=\"" . $_SESSION["text_website"] . "\" pattern=\"" . $g_strPatternURL ."\" autocomplete=\"on\" placeholder=\"Website URL...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "             <td><label for=\"textarea_advert_html\">Advert HTML</label></td>\n";
		echo "            <td>\n";
		echo "                <textarea id=\"textarea_advert_html\" name=\"textarea_advert_html\" class=\"textarea_design\" rows=\"10\">" . $_SESSION["textarea_advert_html"] . "</textarea><br/><br/>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_payment_amount\">Payment amount: $</label></td>\n";
		echo "	          <td><input id=\"text_payment_amount\" type=\"text\" value=\"" . $_SESSION["text_payment_amount"] . "\" pattern=\"" . $g_strPatternCurrency . "\" autocomplete=\"on\" placeholder=\"How much was paid?\" onchange=\"OnChangeTextPaymentAmount()\" style=\"width:16ch;\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_expiry_date\">Current expiry_date: </label></td>\n";
		echo "	          <td><input id=\"text_expiry_date\" type=\"date\" value=\"" . $_SESSION["date_expiry"] . "\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"date_new_expiry\">New expiry_date: </label></td>\n";
		echo "	          <td><input id=\"date_new_expiry\" name=\"date_new_expiry\" type=\"date\" value=\"" . $_SESSION["date_new_expiry"] . "\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "                <input type=\"submit\" name=\"button_renw_advert\" id=\"button_renew_advert\" value=\"RENEW SPONSORSHIP\"/>\n";
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
		<title>Renew a sponsor</title>
		<style type="text/css">
		</style>
		<script type="text/javascript" src="admin_login.js">
		<script type="text/javascript">

			function DoOnPageLoadComplete()
			{
				<?php
					if ($g_bLoginError)
						DoPrintJSAlertPasswordError($_POST["password_group_login"], false);
				?>
			}

		</script>

		<!-- #EndEditable -->
		<script type="text/javascript">
			
			// mozilla/5.0 (windows nt 10.0; win64; x64) applewebkit/537.36 (khtml, like gecko) chrome/147.0.0.0 safari/537.36
			// Mozilla/5.0 (iPhone; CPU iPhone OS 17_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Mobile/15E148 Safari/604.1
			// Mozilla/5.0 (iPod; CPU iPhone OS 17_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Mobile/15E148 Safari/604.1
			// Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Safari/605.1.15
			// Mozilla/5.0 (Linux; Android 13; SM-S901B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36
			// Mozilla/5.0 (Linux; Android 13; SM-X906B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 (Note the absence of the "Mobile" tag)
			// Mozilla/5.0 (Linux; Android 13; SM-S901B Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/110.0.5481.153 Mobile Safari/537.36
			if (navigator.userAgent.includes("iPhone") ||
				navigator.userAgent.includes("iPod") ||
				navigator.userAgent.includes("Android"))
			{
				document.getElementById("style_sheet").setAttribute("href", <?php echo "\"" . DoGetParentOrCurrentDir() . "\""; ?> + "styles/style4Mobile.css");
			}
			
		</script>
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Gluten:wght@100..900&family=Permanent+Marker&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+J:ital,wght@0,100..400;1,100..400&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet" />
	</head>
	<body onload="DoOnPageLoadComplete()">

		<!-- Begin Container -->
		<div id="container">
			<!-- Begin Masthead -->
			<div class="masthead">
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
										<h1 class="gluten">Mill House</h1>
									</td>
								</tr>
								<tr>
									<td>
										<h3 class="gluten">Neighbourhood House &#128522;</h3>
									</td>
								</tr>
							</table>
						</td>
						<td class="masthead_cell_image_right">
							<a href="../images/MillHouseNeighborhoodHouse1.jpg">
							<img src="../images/MillHouseNeighborhoodHouse1.jpg" alt="MillHouseNeighborhoodHouse1.jpg" class="masthead_image" /></a>
						</td>
						<td class="masthead_cell_image_right">
							<a href="../images/MillHouseNeighborhoodHouse2.jpg">
							<img src="../images/MillHouseNeighborhoodHouse2.jpg" alt="MillHouseNeighborhoodHouse.jpg" class="masthead_image" /></a>
						</td>
						<!--
						<td class="masthead_cell_image_right">
							<a href="images/Mural.jpg.jpg"><img src="images/Mural.jpg" alt="Mural.jpg" class="masthead_image" /></a>
						</td>
						-->
						<td class="masthead_cell_sponsors">
<div class="sponsors_container">					
	<img src="../sponsors/images/NHHV.png" alt="NHHV.png" id="img_NHHV" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/VicStateGov.jpg" alt="VicStateGov.jpg" id="img_VSG" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/CentralGoldfields.png" alt="CentralGoldfields.png" id="img_CGSC" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/FRRR.png" alt="FRRR.png" id="img_FRRR" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/BendigoBank.jpg" alt="BendigoBank.jpg" id="img_BB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/JWR.png" alt="JWR.png" id="img_JWR" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/WattleOffice.jpg" alt="WattleOffice.jpg" id="img_WOS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/FoodBank.png" alt="FoodBank.png" id="img_FB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/FoodShare.png" alt="FoodShare.png" id="img_FS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/Aldi.png" alt="Aldi.png" id="img_ALD" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/ParkviewBakery.jpg" alt="ParkviewBakery.jpg" id="img_PVB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/MaryboroughFloorCoverings.jpg" alt="MaryboroughFloorCoverings.jpg" id="img_MFC" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/SilverService.png" alt="SilverService.png" id="img_SS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/GoldfieldsScreens.png" alt="GoldfieldsScreens.png" id="img_GSAB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
</div>
						</td>
					</tr>
				</table>				
			</div>
			<!-- End Masthead -->
			<div class="below_masthead">
				<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="vertical-align:top;">
							<!-- Begin Navigation -->
							<div class="navigation" id="navigation">
							
								<table border="0" cellpadding="0" cellspacing="0" style="height:var(--nav_height);">
									<tr>
										<td>
<div id="navigation_menu" class="navigation_menu" ontransitionend="DoOnNavMenuTransitioned()">
	
	<?php echo DoGetDontationHTML(); ?>

	<ul>
		<li><a href="../index.php">Home</a></li>
		<li><a href="../about/about.php">About Mill House</a></li>
		<li><a href="../Calendar/Calendar.php">Events Calendar</a></li>
		<li><a href="../room/room.php">Hire a room</a></li>
		<li><a href="../sponsors/sponsors.php">Our Collaborators</a></li>
		<li>
			<a href="../contribute/contribute.php" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item"><a href="../contribute/join.php"><b>Become a member</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/volunteering.php"><b>Become a volunteer</b></a></li>
				<li class="submenu_item"><a href="../request_sponsorship.php"><b>Become a sponsor</b></a></li>
				<li class="submenu_item"><a href="../contribute/donation.php"><b>Make a donation</b></a></li>
			</ul>
		</li>
		<!--<li><a href="people/people.php">Mill House People</a></li>-->
		<!--<li><a href="milestones/milestones.php">Milestones</a></li>-->
		<li><a href="../contact/Contact.php">Contact</a></li>
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
		<li>
			<a href="administration.php" onclick="<?php if (IsLoggedIn()) echo "DoClickNavLinkWithSubmenu('admin')"; ?>">Administration</a>
			<ul style="display:<?php if (isLoggedIn()) echo DoShowHideSubmenu("admin"); else echo "none"; ?>;" id="admin">
				<li class="submenu_item"><a href="edit_groups.php"><b>Add &amp; Edit Groups</b></a></li>
				<li class="submenu_item"><a href="approve_sponsorship.php"><b>Approve a sponsor</b></a></li>
				<li class="submenu_item"><a href="renew_sponsorship.php"><b>Renew a sponsor</b></a></li>
				<li class="submenu_item"><a href="friday_feast_menu.php"><b>Update Friday feast menu</b></a></li>
				<li class="submenu_item"><a href="governance.php"><b>Upload governance documents</b></a></li>
				<li class="submenu_item">
				<a href="../governance/forms/forms.php"><b>Blank Forms</b></a></li>
				<li class="submenu_item"><a href="web_diagnostics.php"><b>Website diagnostics</b></a></li>
				<li class="submenu_item"><a href="html_4_beginners.php"><b>HTML 4 Beginners</b></a></li>
				<li class="submenu_item"><a href="css_4_beginners.php"><b>CSS 4 Beginners</b></a></li>
				<li class="submenu_item"><a href="javascript_4_beginners.php"><b>JavaScript 4 Beginners</b></a></li>
				<li class="submenu_item">
				<a href="expression_web_4_beginners.php"><b>Expression Web 4 Beginners</b></a></li>
			</ul>
		</li>
	</ul>
</div>
										</td>
										<td>
<div id="navigation_arrow" class="navigation_arrow">
	<span id="span_menu_text" class="span_menu_text" onclick="DoOpenCloseMenu(true)">
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
							<div class="content" id="content">
								<br/>						
								<div class="page_heading"><u><script type="text/javascript">document.write(document.title);</script></u></div>

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
			</script>
			<!-- Begin Footer -->
			<div class="footer">
				<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr class="footer_pc_row">
						<td class="footer_table_cell">&copy;Mill House, Maryborough, VIC</td>
						
						<td class="footer_table_cell footer_middle_cell">COME ALONG AND JOIN THE MILL HOUSE COMMUNITY <h2 style="display:inline;">&#128522;</h2></td>
						
						<td class="footer_table_cell">Web site by: Gregary Boyles 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)</td>
					</tr>
					<tr class="footer_mobile_row">
						<td class="footer_table_cell">&copy;Mill House, Maryborough, VIC</td>
					</tr>
					<tr class="footer_mobile_row">
						<td class="footer_table_cell footer_web_admin" colspan="6">Web site by: Gregary Boyles, 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)</td>
					</tr>
				</table>
			</div>
			<!-- End Footer --></div>
		<!-- End Container -->
	</body>
	
</html>

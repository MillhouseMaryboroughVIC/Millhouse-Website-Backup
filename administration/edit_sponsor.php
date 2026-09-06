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
	//** POST & GET DATA PROCESSING
	//** 
	//******************************************************************************
	//******************************************************************************							
	
	function DoGetRequired()
	{
		return ($_SESSION["hidden_shortkey"] == "") ? "" : "required";
	}
	
	function DoResetSessionVars()
	{
		$_SESSION["select_sponsors"] = "";
		$_SESSION["select_sponsor_type"] = "";
		$_SESSION["text_business_name"] = "";
		$_SESSION["text_contact_name"] = "";
		$_SESSION["text_contact_email"] = "";
		$_SESSION["text_contact_email"] = "";
		$_SESSION["text_contact_phone"] = "";
		$_SESSION["text_website"] = "";
		$_SESSION["file_logo_filename"] = "";
		$_SESSION["file_logo_filename_original"] = "";
		$_SESSION["textarea_description"] = "";
		$_SESSION["text_payment_amount"] = "";
		$_SESSION["date_expiry"] = "";
		$_SESSION["date_new_expiry"] = "";
		$_SESSION["hidden_shortkey"] = "";
		$_SESSION["text_days"] = 0;
		$_SESSION["text_sort_business_name"] = "";
		$_SESSION["sponsor_ranking"] = "";
	}
	//DoResetSessionVars();
	
	if (!isset($_SESSION["select_sponsors"]))
		$_SESSION["select_sponsors"] = "";
		
	if (!isset($_SESSION["select_sponsor_type"]))
		$_SESSION["select_sponsor_type"] = "";
				
	if (!isset($_SESSION["sponsor_ranking"]))
		$_SESSION["sponsor_ranking"] = "";
		
	if (!isset($_SESSION["text_business_name"]))
		$_SESSION["text_business_name"] = "";
		
	if (!isset($_SESSION[""]))
		$_SESSION["text_contact_name"] = "";
		
	if (!isset($_SESSION["text_contact_name"]))
		$_SESSION["text_contact_email"] = "";
		
	if (!isset($_SESSION["text_contact_email"]))
		$_SESSION["text_contact_email"] = "";
		
	if (!isset($_SESSION["text_contact_phone"]))
		$_SESSION["text_contact_phone"] = "";
		
	if (!isset($_SESSION["text_website"]))
		$_SESSION["text_website"] = "";
		
	if (!isset($_SESSION["file_logo_filename"]))
		$_SESSION["file_logo_filename"] = "";
		
	if (!isset($_SESSION["file_logo_filename_original"]))
		$_SESSION["file_logo_filename_original"] = "";
		
	if (!isset($_SESSION["textarea_description"]))
		$_SESSION["textarea_description"] = "";
		
	if (!isset($_SESSION["text_payment_amount"]))
		$_SESSION["text_payment_amount"] = "";
		
	if (!isset($_SESSION["date_expiry"]))
		$_SESSION["date_expiry"] = "";
		
	if (!isset($_SESSION["date_new_expiry"]))
		$_SESSION["date_new_expiry"] = "";

	if (!isset($_SESSION["hidden_shortkey"]))
		$_SESSION["hidden_shortkey"] = "";
		
	if (!isset($_SESSION["radio_sortby"]))
		$_SESSION["radio_sortby"] = "all";
		
	if (!isset($_SESSION["text_days"]))
		$_SESSION["text_days"] = 0;
		
	if (!isset($_SESSION["text_sort_business_name"]))
		$_SESSION["text_sort_business_name"] = "";

	if (isset($_POST["button_sort_sponsors"]))
	{
		$_SESSION["text_sort_business_name"] = $_POST["text_sort_business_name"];
		$_SESSION["text_days"] = $_POST["text_days"];
		$_SESSION["radio_sortby"] = $_POST["radio_sortby"];
	}
	else if (isset($_POST["button_edit_sponsor"]))
	{
		if ($_SESSION["hidden_shortkey"] == "")
		{
			DoFlagMessage("Please load a sponsor's details first...", true, $g_dbMillhouse->error);
		}
		else
		{
			$dateNow = new DateTime();
			$results = DoFindQuery1($g_dbMillhouse, "sponsors", "shortkey", $_POST["hidden_shortkey"]);
			
			if ($results && ($results->num_rows > 0))
			{
				if ($row = $results->fetch_assoc())
				{
					$dateFuture = new DateTime();
					$dateFuture->setDate(2050, $dateFuture->format('m'), $dateFuture->format('d'));
				
					if (isset($_FILES["file_logo_image"]))
					{
						$results = DoUpdateQuery10($g_dbMillhouse, "sponsors",
													"business_name", $_POST["text_business_name"],
													"type", $_POST["select_sponsor_type"],
													"contact_name", $_POST["text_contact_name"],
													"email_address", $_POST["text_contact_email"], 
													"phone_number", $_POST["text_contact_phone"], 
													"website", $_POST["text_website"], 
													"description", $_POST["textarea_description"], 
													"logo_image", $_POST["file_logo_image"], 
													"expiry_date", ($_POST["date_new_expiry"] !== "" ? $_POST["date_new_expiry"] : $dateFuture->format("Y-m-d H:i:s")),
													"amount_paid", $_POST["text_payment_amount"],
													"shortkey", $_POST["select_sponsors"]);
					}
					else
					{
/*
Array ( 
		[radio_sortby] => all 
		[text_days] => 0 
		[text_sort_business_name] => 
		[select_sponsors] => 1 
		[text_business_name] => Silver Chef 
		[select_sponsor_type] => funding 
		[text_contact_name] => 
		[text_contact_phone] => 1800337153 
		[text_contact_email] => 
		[text_website] => https://www.silverchef.com.au/ 
		[file_logo_image] => 
		[textarea_description] => Through the SilverChef Community Grants Program, Mill House received funding to purchase much-needed equipment for our commercial kitchen. This included a new bain-marie, induction cooktops, a sandwich press and stainless-steel benches. 
		[text_payment_amount] => 0 
		[date_new_expiry] => 
		[button_edit_sponsor] => EDIT SPONSOR 
		[hidden_shortkey] => 14 )
*/	
						$results = DoUpdateQuery9($g_dbMillhouse, "sponsors",
													"business_name", $_POST["text_business_name"],
													"type", $_POST["select_sponsor_type"],
													"contact_name", trim($_POST["text_contact_name"] ?? ""),
													"email_address", trim($_POST["text_contact_email"] ?? ""), 
													"phone_number", trim($_POST["text_contact_phone"] ?? ""), 
													"website", $_POST["text_website"], 
													"description", $_POST["textarea_description"], 
													"expiry_date", ($_POST["date_new_expiry"] !== "" ? $_POST["date_new_expiry"] : $dateFuture->format("Y-m-d H:i:s")),
													"amount_paid", trim($_POST["text_payment_amount"] ?? ""),
													"shortkey", $_POST["hidden_shortkey"]);
/*													
echo "######################<br>\n";
echo "g_strQuery = " . $g_strQuery . "<br>\n";
echo "######################<br>\n";
*/					
					}
					if ($results)
					{
						DoFlagMessage("The sponsorship was edited successfully...");
						DoSaveFile("file_logo_image", "../sponsors/images/", $_SESSION["file_logo_filename_original"]);
					}
					else
					{
						DoFlagMessage("The sponsorship could not be edited...", true, $g_dbMillhouse->error);
					}
					DoResetSessionVars();
				}
			}
		}
	}
	else if (isset($_POST["button_load_sponsor"]))
	{
		$results = DoFindQuery1($g_dbMillhouse, "sponsors", "shortkey", $_POST["select_sponsors"]);

		if ($results && ($results->num_rows > 0))
		{
			if ($row = $results->fetch_assoc())
			{
				$_SESSION["select_sponsor"] = $row["shortkey"];
				$_SESSION["select_sponsor_type"] = $row["type"];
				$_SESSION["text_business_name"] = $row["business_name"];
				$_SESSION["text_contact_name"] = $row["contact_name"];
				$_SESSION["text_contact_email"] = $row["email_address"];
				$_SESSION["text_contact_phone"] = $row["phone_number"];
				$_SESSION["text_website"] = $row["website"];
				$_SESSION["file_logo_filename"] = $row["logo_image"];
				$_SESSION["file_logo_filename_original"] = $row["logo_image"];
				$_SESSION["textarea_description"] = $row["description"];
				$_SESSION["text_payment_amount"] = (int)$row["amount_paid"];
				$_SESSION["date_expiry"] = $row["expiry_date"];
				$_SESSION["date_new_expiry"] = "";
				$_SESSION["hidden_shortkey"] = $row["shortkey"];
				$_SESSION["sponsor_ranking"] = $row["ranking"];
			}
		}
	}
	else if (isset($_POST["button_delete_sponsor"]))
	{
		$resultFind = DoFindQuery1($g_dbMillhouse, "sponsors", "type", $_POST["select_sponsorType"], "", "ranking");
		if (!$resultFind && ($resultFind->num_rows > 0))
		{
			$nNextRankingValue = 0;
			$bError = false;
			while ($row = $resultFind->fetch_assoc())
			{
				if ($row["shortkey"] == $_POST["hidden_shortkey"])
				{
					$nNextRankingValue = $row["ranking"];
				}
				else
				{
					$resultUpdate = DoUpdateQuery1($g_dbMillhouse, "sponsors", "ranking", $nNextRankingValue, "shortkey", $row["shortkey"]);
					$nNextRankingValue++;
					if (!$resultUpdate)
					{
						DoFlagMessage("Re-ordering of sponsor rankings has failed...", true, $g_dbMillhouse->error);
						$bError = true;
						break;
					}
				}
			}
			if (!bError)
			{
				$resultDelete = DoDeleteQuery($g_dbMillhouse, "sponsors", "shortkey", $_POST["hidden_shortkey"]);
				DoResetSessionVars();
			}
		}
	}
	else if (isset($_POST["button_submit_rankings"]))
	{	
			// [select_sponsors] => Array ( [0] => 1 [1] => 4 [2] => 3 [3] => 2 [4] => 7 [5] => 16 [6] => 18 )
		for ($nI = 0; $nI < count($_POST["select_sponsors_rankings"]); $nI++)
		{
			$result = DoUpdateQuery1($g_dbMillhouse, "sponsors", "ranking", (string)($nI + 1), "shortkey", $_POST["select_sponsors_rankings"][$nI]);
			if (!$result)
			{
				DoFlagMessage("Could not update sponsor's ranking...", true, $g_dbMillhouse->error);
				break;
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
			DoDisplayEditSponsorForm();
		}
		else if (IsAdminLoggedIn())
		{
			DoDisplayLoginForm();
		}
		DoDisplayLoginFormInstrunctions();
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** SPONSORSHIP FORM FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
		
	function DoPad($strText, $nMaxWidth)
	{
		for ($nI = strlen($strText); $nI < $nMaxWidth; $nI++)
		{
			$strText .= "&nbsp;";
		}
		return $strText;
	}
	
	function DoGenerateSponsorRankSelectOptions($strType)
	{
		global $g_dbMillhouse;
		global $g_strQuery;
		$datetimeNow = DoGetMelbourneTimeNow();
		$strOptions = "";
		
		$results = DoFindQuery1($g_dbMillhouse, "sponsors", "type", $strType, "", "ranking");
		if ($results && ($results->num_rows > 0))
		{
			while ($row = $results->fetch_assoc())
			{
				$strOptions .= "<option>" . DoPad(sprintf("%d", $row["ranking"]), 20) . $row["business_name"] . "</option>\n";
			}
		}
		return $strOptions;
	}

	function DoGenerateSponsorSelectOptions($nSelectedShortkey)
	{
		global $g_dbMillhouse;
		$strHTML = "";
		$results = NULL;

		if (isset($_POST["button_sort_sponsors"]))
		{
			if ($_POST["radio_sortby"] == "all")
			{
				$results = DoFindAllQuery($g_dbMillhouse, "sponsors");
			}
			else if ($_POST["radio_sortby"] == "expires_in")
			{
				$dateNow = new DateTime();
				$dateExpiry = new DateTime();
				dateExpiry->modify("+" . $_POST["text_days"] . " days");
				
				$results = DoFindAllQuery($g_dbMillhouse, "sponsors", "(expiry_date >= '" . 
																		dateNow->format("Y-m-d") . "') AND " . 
																		"(expiry_date <= '" . dateExpiry->format("Y-m-d") . 
																		"')");
			}
			else if ($_POST["radio_sortby"] == "expired_by")
			{
				$dateNow = new DateTime();
				$dateExpiry = new DateTime();
				dateExpiry->modify("-" . $_POST["text_days"] . " days");
				
				$results = DoFindAllQuery($g_dbMillhouse, "sponsors", "(expiry_date >= '" . 
																		dateExpiry->format("Y-m-d") . "') AND " . 
																		"(expiry_date <= '" . dateNow->format("Y-m-d") . 
																		"')");
			}
			else if ($_POST["radio_sortby"] == "business_name")
			{
				$results = DoFindAllQuery($g_dbMillhouse, "sponsors", "business_name = '" . $_POST["text_sort_business_name"] . "'");
			}
		}
		else
		{
			$results = DoFindAllQuery($g_dbMillhouse, "sponsors");
		}
		if ($results && ($results->num_rows > 0))
		{
			while ($row = $results->fetch_assoc())
			{
				$dateExpiry = new DateTime($row["expiry_date"]);
				$strSelected = ($nSelectedShortkey == $row["shortkey"]) ? "selected" : "";
				$strHTML .= "    <option " . $strSelected . " value=\"" .  $row["shortkey"] . "\">" . $row["business_name"] . 
								", expiry date: " . $dateExpiry->format("d/m/Y") . "</option>\n";
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
	
	function DoDisplayEditSponsorForm()
	{
		global $g_strPatternPhoneNumber;
		global $g_strPatternEmail;
		global $g_strPatternURL;
		global $g_strPatternPersonName;
		global $g_strPatternCurrency;
		
		echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"form_edit_sponsor\" style=\"width:1000px;\" >\n";
		echo "    <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		echo "        <tr>\n";
		echo "           <td style=\"text-align:center;\" colspan=\"2\"><h1>Edit an existing sponsor</h1></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "           <td style=\"text-align:center;\" colspan=\"2\"><button type=\"button\" onclick=\"DoDisplayHidePopup('div_edit_sponsor_instructions', true)\">INSTRUCTIONS</button><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr><td colspan=\"2\"><hr/></td></tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\">\n";
		echo "                <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		echo "                    <tr><td colspan=\"8\"><label for=\"\"><u>Sorting sponsors</u></label></td></tr>\n";
		echo "                    <tr>\n";				
		echo "                        <td><input type=\"radio\" " . ((($_SESSION["radio_sortby"] == "all") || ($_SESSION["radio_sortby"] == "")) ? "checked" : "") . " name=\"radio_sortby\" id=\"radio_sortby_all\" value=\"all\"></td>\n";
		echo "                        <td><label for=\"radio_sortby_all\">All adverts </label></td>\n";
		echo "                        <td><input type=\"radio\" " . (($_SESSION["radio_sortby"] == "expires_in") ? "checked" : "")  . " name=\"radio_sortby\" id=\"radio_sortby_expires_in\" value=\"expires_in\"></td>\n";
		echo "                        <td><label for=\"radio_sortby_expires_in\">Expires in up to</label></td>\n";
		echo "                        <td><input type=\"radio\" " . (($_SESSION["radio_sortby"] == "expired_by") ? "checked" : "")  . " name=\"radio_sortby\" id=\"radio_sortby_expired_by\" value=\"expired_by\"></td>\n";
		echo "                        <td><label for=\"radio_sortby_expired_by\">Expired by up to</label></td>\n";
		echo "                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"number\" id=\"text_days\" name=\"text_days\" value=\"" . $_SESSION["text_days"] . "\" min=\"0\" max=\"7\" style=\"width:4ch;\" onchange=\"DoOnChangeSponsor()\" /></td>\n";
		echo "                        <td><label for=\"\"> days</label></td>\n";
		echo "                    </tr>\n";
		echo "                    <tr>\n";
		echo "                        <td><input type=\"radio\" " . (($_SESSION["radio_sortby"] == "business_name") ? "checked" : "") . " name=\"radio_sortby\" id=\"radio_sortby_business_name\" value=\"business_name\"></td>\n";
		echo "                        <td><label for=\"text_sortby_business_name\">Business name</label></td>\n";
		echo "                        <td colspan=\"6\">&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" id=\"text_sort_business_name\" name=\"text_sort_business_name\" value=\"" . $_SESSION["text_sort_business_name"] . "\" /></td>\n";
		echo "                    </tr>\n";
		echo "        			  <tr>\n";
		echo "                        <td colspan=\"8\"><button type=\"submit\" id=\"button_sort_sponsors\" name=\"button_sort_sponsors\">SORT SPONSORS<//button></td>\n";
		echo "                    </tr>\n";
		echo "                </table>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr><td colspan=\"2\"><hr/></td></tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"select_sponsors\">Select the sponsor to edit</label></td>\n";
		echo "	          <td>\n";
		echo "                <select id=\"select_sponsors\" name=\"select_sponsors\" onchange=\"DoOnChangeSponsor()\" style=\"width:600px;\">\n";
		echo DoGenerateSponsorSelectOptions($_SESSION["select_sponsors"]);
		echo "                </select>\n";
		echo "            </td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"8\"><button type=\"submit\" id=\"button_load_sponsor\" name=\"button_load_sponsor\" onclick=\"DoClickLoadSponsorDetails()\">LOAD SPONSORSHIP DETAILS<//button></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_business_name\">Business name: </label></td>\n";
		echo "	          <td><input id=\"text_business_name\" name=\"text_business_name\" type=\"text\" " . DoGetRequired() . " value=\"" . $_SESSION["text_business_name"] . "\" pattern=\"" . $g_strPatternPersonName ."\" autocomplete=\"on\" placeholder=\"Contact name...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;\" >\n";
		echo "                <label for=\"select_type\">Type of sponsor: </label>\n";
		echo "            </td>\n";
		echo "            <td>\n";
		echo "                <select id=\"select_type\" id=\"select_sponsor_type\" name=\"select_sponsor_type\" required>\n";
		echo DoGenerateSponsorTypeSelectOptions($_SESSION["select_sponsor_type"]);
		echo "                </select>\n";
		echo "            </td>\n";
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
		echo "	          <td><input id=\"text_website\" name=\"text_website\" name=\"text_website\" type=\"text\" " . DoGetRequired() . " value=\"" . $_SESSION["text_website"] . "\" pattern=\"" . $g_strPatternURL ."\" autocomplete=\"on\" placeholder=\"Website URL...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_logo_image\">Logo image: </label></td>\n";
		echo "	          <td>\n";
		echo "                <input type=\"file\" id=\"file_logo_image\" name=\"file_logo_image\" accept=\".png, .jpg, .jpeg\" autocomplete=\"on\" placeholder=\"Logo image file name URL...\" />";
		echo "                <label>You can drag and drop files...</label>\n";
		echo "            </td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "             <td style=\"text-align: right;\"><label for=\"textarea_description\">What is this sponsor providing?</label></td>";
		echo "             <td>\n";
		echo "                 <textarea id=\"textarea_description\" name=\"textarea_description\" " . DoGetRequired() . " rows=\"10\">" . $_SESSION["textarea_description"] . "</textarea><br/><br/>\n";
		echo "             </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_payment_amount\">Payment amount: $</label></td>\n";
		echo "	          <td><input id=\"text_payment_amount\" name=\"text_payment_amount\" type=\"text\" value=\"" . $_SESSION["text_payment_amount"] . "\" pattern=\"" . $g_strPatternCurrency . "\" autocomplete=\"on\" placeholder=\"How much was paid?\" style=\"width:16ch;\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_expiry_date\">Current expiry date: </label></td>\n";
		echo "	          <td><input id=\"text_expiry_date\" type=\"date\" value=\"" . $_SESSION["date_expiry"] . "\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"date_new_expiry\">New expiry date: </label></td>\n";
		echo "	          <td><input id=\"date_new_expiry\" name=\"date_new_expiry\" type=\"date\" value=\"" . $_SESSION["date_new_expiry"] . "\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "                <input type=\"submit\" name=\"button_edit_sponsor\" id=\"button_edit_sponsor\" value=\"EDIT SPONSOR\"/>&nbsp;\n";
		echo "                <input type=\"button\" name=\"button_delete_sponsor\" id=\"button_delete_sponsor\" onclick=\"DoDeleteSponsor()\" value=\"DELETE SPONSOR\"/>\n";
		echo "                <input type=\"hidden\" value=\"" . $_SESSION["hidden_shortkey"] . "\" id=\"hidden_shortkey\" name=\"hidden_shortkey\" />\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "    </table>\n";
		echo "</form>\n";
		
		
		echo "<p>&nbsp;</p>\n";
		
		
		echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"form_edit_rankings\" style=\"width:635px;\" >\n";
		echo "    <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		echo "        <tr>\n";
		echo "           <td style=\"text-align:center;width:200px;\" colspan=\"2\"><h1>Re-order sponsor rankings</h1></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "           <td style=\"text-align:center;\" colspan=\"2\"><button type=\"button\" onclick=\"DoDisplayHidePopup('div_reorder_rankings_instructions', true)\">INSTRUCTIONS</button><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr><td colspan=\"2\"><hr/></td></tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;\" >\n";
		echo "                <label for=\"select_type\">Type of sponsor: </label>\n";
		echo "            </td>\n";
		echo "            <td>\n";
		echo "                <select id=\"select_type_rankings\" onchange=\"DoOnChangeSponsorsType()\">\n";
		echo DoGenerateSponsorTypeSelectOptions("");
		echo "                </select>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;\" >\n";
		echo "                <label for=\"select_sponsors_rankings\">List of sponsors: </label>\n";
		echo "            </td>\n";
		echo "            <td>\n";
		echo "                <select id=\"select_sponsors_rankings\" name=\"select_sponsors_rankings[]\" size=\"15\" style=\"width:520px;\">\n";
		echo "                    <option disabled selected hidden>RANK&nbsp;&nbsp;&nbsp;&nbsp;BUSINESS NAME</option>\n";
		echo "                </select>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;\">\n";
		echo "            </td>\n";		
		echo "            <td style=\"text-align:right;\" >\n";
		echo "                 <button type=\"button\" onclick=\"DoMoveUp()\">MOVE UP</button>\n";
		echo "                 &nbsp;\n";
		echo "                 <button type=\"button\" onclick=\"DoMoveDown()\">MOVE DOWN</button>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "                <button type=\"button\" id=\"button_submit_rankings\" name=\"button_submit_rankings\" onclick=\"DoSaveRankings()\">SAVE RANKINGS</button>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "    </table>\n";
		echo "</form>\n";
	}
	
	function DoGenerateSponsorRankingJSArray($strType)
	{
		global $g_dbMillhouse;
		global $g_strQuery;
		$strArray = "[";
		$nI = 0;
		
		$results = DoFindQuery1($g_dbMillhouse, "sponsors", "type", $strType, "", "ranking");

		if ($results && ($results->num_rows > 0))
		{
			while ($row = $results->fetch_assoc())
			{
				$nI++;
				$strArray .= "{nShortkey: " . (int)$row["shortkey"] . ", strBusinessName: \"" . $row["business_name"] . 
								"\", nRanking: " . (int)$row["ranking"] . "}";

				if ($nI < $results->num_rows)
					$strArray .= ",\n";
				else
					$strArray .= "\n";
			}
		}
		$strArray .= "]";
		
		return $strArray;
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
		<title>Edit a Sponsor</title>
		<style type="text/css">
</style>
		<script type="text/javascript">
		
			function DoOnPageLoadComplete()
			{
			}
			
			function DoPad(strText, nMaxWidth)
			{
				for (let nI = strText.length; nI < nMaxWidth; nI++)
				{
					strText += "\u00A0";
				}
				return strText;
			}
			
			function DoOnChangeSponsorsType()
			{
				let selectSponsors = document.getElementById("select_sponsors_rankings"),
					selectType = document.getElementById("select_type_rankings"),
					arrayFundingSponsors = <?php echo DoGenerateSponsorRankingJSArray("funding"); ?>,
					arrayFoodSponsors = <?php echo DoGenerateSponsorRankingJSArray("food"); ?>,
					arrayServiceSponsors = <?php echo DoGenerateSponsorRankingJSArray("service"); ?>,
					arraySponsors = [],
					optionNew = null;
				
				if (selectSponsors && selectType)
				{
					if (selectType.options[selectType.selectedIndex].value == "funding")
						arraySponsors = arrayFundingSponsors;
					else if (selectType.options[selectType.selectedIndex].value == "service")
						arraySponsors = arrayServiceSponsors;
					else if (selectType.options[selectType.selectedIndex].value == "food")
						arraySponsors = arrayFoodSponsors;
					
					selectSponsors .options.length = 0;
					optionNew = new Option("RANKING\u00A0\u00A0\u00A0\u00A0\u00A0BUSINESS NAME", "");
					optionNew.disabled = true;
					selectSponsors.add(optionNew);
					
					for (let nI = 0; nI < arraySponsors.length; nI++)
					{
						optionNew = new Option(DoPad(arraySponsors[nI].nRanking.toString(), 20) +  
												arraySponsors[nI].strBusinessName, arraySponsors[nI].nShortkey.toString());
						selectSponsors.add(optionNew);
					}
				}
			}
			
			function DoMoveSelectedOption(selectInput, bDown)
			{
				let arraySelectOptions = new Array();
				for (let nI = 0; nI < selectInput.options.length; nI++)
					arraySelectOptions.push(selectInput.options[nI]);
				
				if (bDown)
				{
					[arraySelectOptions[selectInput.selectedIndex - 1], arraySelectOptions[selectInput.selectedIndex]] = 
					[arraySelectOptions[selectInput.selectedIndex], arraySelectOptions[selectInput.selectedIndex - 1]];
				}
				else
				{
					[arraySelectOptions[selectInput.selectedIndex + 1], arraySelectOptions[selectInput.selectedIndex]] = 
					[arraySelectOptions[selectInput.selectedIndex], arraySelectOptions[selectInput.selectedIndex + 1]];
				}
				selectInput.options.length = 0;
				
				for (let nI = 0; nI < arraySelectOptions.length; nI++)
					selectInput.add(arraySelectOptions[nI]);
			}
						
			function DoMoveUp()
			{
				let selectSponsors = document.getElementById("select_sponsors_rankings");
				
				if (selectSponsors)
				{
					if (selectSponsors.selectedIndex == -1)
						alert("Please select a sponsor to move up...");
					else if (selectSponsors.selectedIndex == 1)
						alert("This sponsor is already at the top...");
					else
						DoMoveSelectedOption(selectSponsors, true);
				}
			}
			
			function DoMoveDown()
			{
				let selectSponsors = document.getElementById("select_sponsors_rankings");
				
				if (selectSponsors)
				{
					if (selectSponsors.selectedIndex == -1)
						alert("Please select a sponsor to move down...");
					else if (selectSponsors.selectedIndex == (selectSponsors.options.length -1))
						alert("This sponsor is already at the bottom...");
					else
					{
						DoMoveSelectedOption(selectSponsors, false);
					}
				}
			}
			
			function DoSaveRankings()
			{
				let selectSponsors = document.getElementById("select_sponsors_rankings"),
					buttonSaveRankings = document.getElementById("button_submit_rankings");
				
				if (selectSponsors && buttonSaveRankings)
				{
					selectSponsors.multiple = true;
					for (let nI = 0; nI < selectSponsors.options.length; nI++)
					{
						if (!selectSponsors.options[nI].disabled)
							selectSponsors.options[nI].selected = true;
					}
					buttonSaveRankings.type = "submit";
					buttonSaveRankings.click();
				}
			}
			
			function DoDeleteSponsor()
			{
				let buttonDeleteSponsor = document.getElementById("button_delete_sponsor"),
					hiddenShortkey = document.getElementById("hidden_shortkey");
				
				
				if (buttonDeleteSponsor && hiddenShortkey)
				{
					if (hiddenShortkey.value == "")
					{
						alert("Please load a sponsor's details first...");
					}
					else if (confirm("Are you absolutely sure?"))
					{
						buttonDeleteSponsor.type = "submit";
						buttonDeleteSponsor.click();
					}
				}
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

<div id="div_edit_sponsor_instructions" class="instruction_popup">
	
	<h1>INSTRUCTIONS FOR THE EDIT SPONSOR FORM</h1>
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_edit_sponsor_instructions', false)">CLOSE</button></p>
	
	<h2>SORTING RADIO BUTTONS</h2>
	
	<p>These are based on the assumption, that at some point in the future, you might have a quite long list sponsors to 
	sort through. It gives you a number of options with which to sort and restrict the list of sponsors in the list box 
	below.</p>
	
	<p>You can click a different sorting radio button and then click <button type="button">SORT SPONSORS</button>, and 
	the list of sponsors available in the list box below will change accordingly. In the case of a longer list of sponsors 
	this feature will make it easier to find a specific sponsor.</p>
	
	<p>By default all sponsors are displayed in the list box.</p>
	
	<h2>EDITING A SPONSOR</h2>
	
	<h3>STEP 1</h3>
	
	<p>
		Select the sponsor that you want to edit from this combo box: 
		<select style="width:600px;">
			<?php echo DoGenerateSponsorSelectOptions($_SESSION["select_sponsor"]); ?>
		</select>
	</p>
	<p>
		Then click this button: <button type="button">LOAD SPONSORSHIP DETAILS</button>
	</p>
	<p>The details of the selected sponsor will be loaded into the inputs below.</p> 
	
	<h3>STEP 2</h3>
	
	<p>Edit the sponsors details as you see fit.</p>
	
	<h4>SPONSOR TYPE</h4>
	
	<p>There are currently 3 types of sponsors:</p>
	<ul>
		<li>Businesses that provide grants or other forms of funding for Mill House.</li>
		<li>Businesses that donate food, clothes and other household items for re-distributuon among the community.</li>
		<li>Businesses that provide free services to Mill House.</li>
	</ul>
	
	<p>These categories are stored in the database and can be expanded if ever needed.</p>
	
	<h4>LOGO IMAGE</h4>
	
	<p>You can upload a new company logo image with this input: <input type="file" accept=".png, .jpg, .jpeg" placeholder="Logo image file name URL..." /></p>
	
	<p>You can click the button and browse for a new image file or you can drag and drop and image file onto this input.</p>
	
	<p>This new image file will REPLACE the existing image file, with the old file name, for the sponsor.</p>
	
	<h4>REQUIRED</h4>
	
	<ul>
		<li>Business name</li>
		<li>Type of sponsor</li>
		<li>Website</li>
		<li>New expiry date</li>
	</ul>
	
	<h4>OPTIONAL</h4>
	
	<ul>
		<li>Contact name</li>
		<li>Contact phone</li>
		<li>Contact email</li>
		<li>Logo image</li>
		<li>Payment amount</li>
	</ul>
	
	<h4>EXPIRY DATE</h4>
	
	<p>If today's date is after the expiry date for the selected sponsor, then that sponsor will n longer appear in the 
	sponsor . our collaborators page and nor in the sponsor marquee in the page mastheads.</p>
	
	<p>You can extend the expiry date for the sponsor as you see fit.</p>
	<p>
		<b>NOTE: </b>This date input is not editable:<br/><br/>
	
		<label>Current expiry date: </label><input type="date" value="<?php echo $_SESSION["date_expiry"]; ?>" /><br/><br/>
		
		To change the expiry date for a sponsor you must do so in this date input instead:<br/><br/>
	
		<label>New expiry date: </label><input type="date" value="<?php echo $_SESSION["date_new_expiry"]; ?>" />.
	</p>
	
	<h5>RADIO BUTTONS</h5>
	
	<p>You can use these radio buttons to set a future date int the expiry date input. For example, if you click 
	the '12 months' radio button then a date 12 months from today's date will be set in the new expiry date field.</p>
	
	<input type="radio" name="radio_number_months" /><label>24 months from today</label><br/><br/>
	<input type="radio" name="radio_number_months" /><label>18 months from today</label><br/><br/>
	<input type="radio" checked name="radio_number_months" /><label>12 months from today</label><br/><br/>
	<input type="radio" name="radio_number_months" /><label for="radio_6_months">6 months from today</label><br/><br/>
	<input type="radio" name="radio_number_months" /><label>1 month from today</label><br/><br/>

	<h3>STEP 3</h3>
	
	<p>Once you are satisfied with your changes click this button: <input type="button" value="EDIT SPONSOR" /></p>
	
	<p>This will result in all your changes to this sponsor's details being saved to the databse.</p>
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_edit_sponsor_instructions', false)">CLOSE</button></p>
	
	<h2>DELETING A SPONSOR</h2>
	
	<h3>STEP 1</h3>

	<p>
		Select the sponsor that you want to edit from this combo box: 
		<select style="width:600px;">
			<?php echo DoGenerateSponsorSelectOptions($_SESSION["select_sponsor"]); ?>
		</select>
	</p>
	<p>
		Then click this button: <button type="button">LOAD SPONSORSHIP DETAILS</button>
	</p>
	<p>The details of the selected sponsor will be loaded into the inputs below.</p> 
	
	<h3>STEP 2</h3>	
		
	<p>Click this button: <input type="button" onclick="confirm('Are you absolutely sure?')" value="DELETE SPONSOR" /></p>
	
	<p>In this case you will get a message box asking you if you to confirm that you absolutely sure you want to delete 
	this sponsor. Try it on the 'pretend' delete button here. If you click 'OK' then the currently selected sponsor will 
	be deleted from the database, and there is no 'undo'.</p>
	
	<p>If you try and click this button without first carrying out STEP 1 then you will get a popup message box asking 
	to load a sponsor's details first: <input type="button" onclick="alert('Please load a sponsor\'s details first...')" value="DELETE SPONSOR" />.</p>

	<p><button type="button" onclick="DoDisplayHidePopup('div_edit_sponsor_instructions', false)">CLOSE</button></p>
	
</div>

<div id="div_reorder_rankings_instructions" class="instruction_popup">

	<h1>INSTRUCTIONS FOR THE RE-ORDER SPONSOR RANKINGS FORM</h1>
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_reorder_rankings_instructions')">CLOSE</button></p>

	<p>The 'ranking' of each sponsor determines the order in which they are displayed <a href="../sponsors/sponsor.php">here</a>.</p>

	<p>The ranking of sponsors in each type (funding, food, service) are indendant of each other. I.E. You can have sponsors 
	with the same ranking as long as one has a type of 'funding' and the other has a type of 'food', for example.</p>
	
	<h2>STEP 1</h2>
	
	<p>
		Select the sponsor type with this combo box: 

		<select style="width:520px;">
			<option disabled selected hidden>RANK&nbsp;&nbsp;&nbsp;&nbsp;BUSINESS NAME</option>
			<?php echo DoGenerateSponsorTypeSelectOptions("funding"); ?>
		</select>
	</p>
	
	<p>The list box below will then be filled with all the sponsors that have that 'type'.</p>

	<p><button type="button" onclick="DoDisplayHidePopup('div_reorder_rankings_instructions')">CLOSE</button></p>

	<h2>STEP 2</h2>

	<p>
		This list box display each sponsor's ranking and business name in labelled columns.<br/><br/>
		<select size="15" style="width:520px;">
			<option disabled>RANKING&nbsp;&nbsp;&nbsp;&nbsp;BUSINESS NAME</option>
			<?php echo DoGenerateSponsorRankSelectOptions("funding"); ?>
		</select>
	</p>
	
	<p>
		Use these buttons to re-order the sponsor: 
		<button type="button">MOVE UP</button>&nbsp;
		<button type="button">MOVE DOWN</button>
		to move the selected sponsor up or down in the heirarchy. The ranking numbers will be out of order, however the 
		new ranking number for each sponsor will be determined by its position in the list.
	</p>
	
	<p>If click either of these buttons without first selecting a sponsor then you will get a popup error message. Try it: 
	<button onclick="alert('Please select a sponsor to move up...')" type="button">MOVE UP</button></p>
	
	<p>
		If you click either of these buttons when the last or first sponsor in the list is selected then you will also
		get popup error messages. Try it: 
		<button onclick="alert('This sponsor is already at the top...')" type="button">MOVE UP</button>&nbsp;
		<button onclick="alert('This sponsor is already at the bottom...')" type="button">MOVE DOWN</button>
	</p>	
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_reorder_rankings_instructions')">CLOSE</button></p>

	<h2>STEP 3</h2>
	
	<p>
		Once you are happy with the new ranking order then click this button: <button type="button" >SAVE RANKINGS</button>
	</p>
	
	<p>The databasse will be update with the new ranking nubers for each sponsor. In terms of this list, the business names 
	will remain in the new order that you have arranged. But the ranking numbers (only) will re-ordered from 1 to 'n'.</p>
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_reorder_rankings_instructions')">CLOSE</button></p>

</div>

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>The forms in contents of this page are automatically generated by PHP code and the only purpose of this page is 
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

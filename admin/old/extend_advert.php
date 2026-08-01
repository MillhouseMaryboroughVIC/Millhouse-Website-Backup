<?php 

	//******************************************************************************
	//******************************************************************************
	//** 
	//** POST & GET DATA PROCESSING
	//** 
	//******************************************************************************
	//******************************************************************************							
	
	if (isset($_POST["button_extend_advert"]))
	{
		$dateNow = new DateTime();
		$results = DoFindQuery1($g_dbMillhouse, "adverts", "advert_slot_id", $_POST["select_active_advert"], "", 
								"expiry_date", false);

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
					if ($_POST["text_business_name"] === "")
						$_POST["text_business_name"] = $row["business_name"];
						
					if ($_POST["text_contact_name"] === "")
						$_POST["text_contact_name"] = $row["contact_name"];
						
					if ($_POST["text_contact_email"] === "")
						$_POST["text_contact_email"] = $row["email_address"];
						
					if ($_POST["text_contact_phone"] === "")
						$_POST["text_contact_phone"] = $row["phone_number"];
						
					if ($_POST["text_website"] === "")
						$_POST["text_website"] = $row["website"];
						
					if ($_POST["textarea_advert_html"] === "")
						$_POST["textarea_advert_html"] = $row["advert_html"];
						
					if ($_POST["text_number_months"] === "")
						$_POST["text_number_months"] = 0;
						
					// Add the number of months based on the payment amount.
					$dateExpiry->modify(" +" . $_POST["text_number_months"] . " months");
					
					// Make the current advert expire now.
					$dateNow->modify("-1 day");

					$results = DoUpdateQuery1($g_dbMillhouse, "adverts", "advert_slot_id", $_POST["select_active_advert"], 
												"expiry_date", $dateNow->format("Y-m-d"));
					if ($results)
					{
						// Insert a new advert into the database.
						$results = DoInsertQuery1($g_dbMillhouse, "adverts",
													"advert_slot_id", $_POST["hidden_advert_slot_id"],
													"business_name", $_POST["text_business_name"],
													"contact_name", $_POST["text_contact_name"],
													"contact_email", $_POST["text_contact_email"], 
													"contact_phone", $_POST["text_contact_phone"], 
													"website", $_POST["text_website"], 
													"advert_html", $_POST["textarea_advert_html"], 
													"expiry_date", $dateExpiry->format("Y-m-d"));
						if ($results)
						{
						}
					}
				}
			}
		}
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** EXTEND ADVERT FORM FUNCTIONS
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
	
	function DoGenerateActiveAdvertOptions()
	{	
		global $g_dbMillhouse;
		$strHTML = "";
		$results = NULL;
		
		$results = DoFindAllQuery($g_dbMillhouse, "adverts");
		if ($results && ($results->num_rows > 0))
		{
			while ($row = $results->fetch_assoc())
			{
				$strHTML .= "    <option value=\"" .  $row["shortkey"] . "\">" . 
								DoGetAdvertSlotDesc($row["advert_slot_id"]) . "</option>\n";
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
	
	function DoDisplayExtendAdvertForm()
	{
		global $g_strPatternPhoneNumber;
		global $g_strPatternEmail;
		global $g_strPatternURL;
		global $g_strPatternPersonName;
		global $g_strPatternCurrency;
		
		
		
		echo "<h1>Extend Adverts</h1>\n";
		echo "<p>Use the extend advert form below to extend the expiry date of active adverts.</p>\n";
		echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"form_extend_advert\" style=\"width:580px;\" >\n";
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
		echo "                        <td><input type=\"radio\" checked name=\"radio_sortby\" id=\"radio_sortby_all\" value=\"all\" onclick=\"DoChangeSort()\"></td>\n";
		echo "                        <td><label for=\"radio_sortby_all\">All adverts </label></td>\n";
		echo "                        <td><input type=\"radio\" name=\"radio_sortby\" id=\"radio_sortby_expires_in\" value=\"expires_in\" onclick=\"DoChangeSort()\"></td>\n";
		echo "                        <td><label for=\"radio_sortby_expires_in\">Expires in up to</label></td>\n";
		echo "                        <td><input type=\"radio\" name=\"radio_sortby\" id=\"radio_sortby_expired_by\" value=\"expired_by\" onclick=\"DoChangeSort()\"></td>\n";
		echo "                        <td><label for=\"radio_sortby_expired_by\">Expired by up to</label></td>\n";
		echo "                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"number\" id=\"text_days\" min=\"0\" max=\"7\" style=\"width:4ch;\" onchange=\"DoOnChangeActiveAdvertSlot()\"></td>\n";
		echo "                        <td><label for=\"\"> days</label></td>\n";
		echo "                    </tr>\n";
		echo "                    <tr>\n";
		echo "                        <td><input type=\"radio\" name=\"radio_sortby\" id=\"radio_sortby_business_name\" value=\"business_name\" onclick=\"DoChangeSort()\"></td>\n";
		echo "                        <td><label for=\"radio_sortby_business_name\">Business name</label></td>\n";
		echo "                        <td colspan=\"6\">&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" id=\"text_sort_business_name\" onchange=\"DoOnChangeActiveAdvertSlot()\"></td>\n";
		echo "                    </tr>\n";
		echo "                </table>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr><td colspan=\"2\"><hr/></td></tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"select_active_advert\">Select the advert to extend</label></td>\n";
		echo "	          <td>\n";
		echo "                <select id=\"select_active_advert\" onchange=\"DoOnChangeActiveAdvertSlot()\">\n";
		echo DoGenerateActiveAdvertOptions(DoGetDataField("select_active_advert"));
		echo "                </select>\n";
		echo "                <input type=\"hidden\" id=\"hidden_advert_slot_id\" name=\"hidden_advert_slot_id\">\n";
		echo "            </td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_extend_business_name\">Contact name: </label></td>\n";
		echo "	          <td><input id=\"text_extend_business_name\" name=\"text_extendbusiness_name\" type=\"text\" value=\"" . DoGetDataField("text_business_name") . "\" pattern=\"" . $g_strPatternPersonName ."\" autocomplete=\"on\" placeholder=\"Contact name...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_extend_contact_name\">Contact name: </label></td>\n";
		echo "	          <td><input id=\"text_extend_contact_name\" name=\"text_contact_name\" type=\"text\" value=\"" . DoGetDataField("text_contact_name") . "\" pattern=\"" . $g_strPatternPersonName ."\" autocomplete=\"on\" placeholder=\"Contact name...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_extend_contact_phone\">Phone number: </label></td>\n";
		echo "	          <td><input id=\"text_extend_contact_phone\" name=\"text_contact_phone\" name=\"text_contact_phone\" type=\"text\" value=\"" . DoGetDataField("text_contact_phone") . "\" pattern=\"" . $g_strPatternPhoneNumber ."\" autocomplete=\"on\" placeholder=\"Contact phone number...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_extend_contact_email\">Email address: </label></td>\n";
		echo "	          <td><input id=\"text_extend_contact_email\" name=\"text_contact_email\" name=\"text_contact_email\" type=\"text\" value=\"" . DoGetDataField("text_contact_email") . "\" pattern=\"" . $g_strPatternEmail ."\" autocomplete=\"on\" placeholder=\"Contact email address...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_extend_website\">Website URL: </label></td>\n";
		echo "	          <td><input id=\"text_extend_website\" name=\"text_website\" name=\"text_website\" type=\"text\" value=\"" . DoGetDataField("text_website") . "\" pattern=\"" . $g_strPatternURL ."\" autocomplete=\"on\" placeholder=\"Website URL...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "             <td><label for=\"textarea_advert_html\">Advert HTML</label></td>\n";
		echo "            <td>\n";
		echo "                <textarea id=\"textarea_extend_advert_html\" name=\"textarea_advert_html\" class=\"textarea_design\" rows=\"10\">" .DoGetDataField("textarea_advert_html") . "</textarea><br/><br/>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_extend_cost_per_month\">Cost per month: $</label></td>\n";
		echo "	          <td><input id=\"text_extend_cost_per_month\" type=\"text\" value=\"" . DoGetDataField("text_cost_per_month") . "\" readonly style=\"width:16ch;\" /><label for=\"\">Readonly</label></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_extend_expiry_date\">Current expiry_date: </label></td>\n";
		echo "	          <td><input id=\"text_extend_expiry_date\" type=\"date\" value=\"" . DoGetDataField("text_expiry_date") . "\" readonly /><label for=\"\">Readonly</label></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_extend_payment_amount\">Payment amount: </label></td>\n";
		echo "	          <td><input id=\"text_extend_payment_amount\" type=\"text\" value=\"" . DoGetDataField("text_payment_amount") . "\" pattern=\"" . $g_strPatternCurrency . "\" autocomplete=\"on\" placeholder=\"How much was paid?\" onchange=\"OnChangeTextPaymentAmount()\" style=\"width:16ch;\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_extend_number_months\">Number of months: </label></td>\n";
		echo "	          <td><input id=\"text_extend_number_months\" name=\"text_number_months\" type=\"text\" value=\"" . DoGetDataField("text_number_months") . "\" readonly style=\"width:16ch;\" /><label for=\"\">Calculated &amp; readonly</label></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_new_expiry_date\">New expiry_date: </label></td>\n";
		echo "	          <td><input id=\"text_new_expiry_date\" type=\"date\" value=\"\" readonly /><label for=\"\">Readonly &amp; calculated</label></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "                <input type=\"submit\" name=\"button_extend_advert\" id=\"button_extend_advert\" value=\"EXTEND THE ADVERT\"/>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "    </table>\n";
		echo "</form>\n";	
	}

?>

<?php

	//******************************************************************************
	//******************************************************************************
	//** 
	//** POST DATA PROCESSING
	//** 
	//******************************************************************************
	//******************************************************************************							
	
	if (isset($_POST["button_approve_advert"]))
	{
		$results = DoInsertQuery1($g_dbMillhouse, "adverts", "advert_slot_id", $_POST["select_advert_slot"]);
		if ($results && ($results->num_rows > 0))
		{
			$dateNow = new DateTime();
			$dateExpiry = new DateTime();
			$bAdvertActiveAlready = false;
			
			while ($row = $results->fetch_assoc())
			{
				$dateExpiry = new DateTime($row["expiry_date"]);
				if ($dateExpiry > $dateNow)
				{
					$bAdvertActiveAlready = true;
					PrintJavascriptLine("alert(\"'There is already an active advert for this slot - please choose another slot...'\");", 2, true);
				}
			}
			if (!$bAdvertActiveAlready)
			{
				$dateExpiry = new DateTime();
				$dateExpiry->modify("+" . $_POST["text_number_months"] . " months");
				$results = DoInsertQueryb($g_dbMillhouse, "adverts", "advert_slot_id", $_POST["select_advert_slot"], 
											"business_name", $_POST["text_business_name"], "contact_name", $_POST["text_contact_name"], 
											"email_address", $_POST["text_contact_email"], "phone_number", $_POST["text_contact_email"], 
											"website", $_POST["text_website"], "advert_html", $strAdvertHTML = DoRemoveScriptTags($_POST["textarea_advert_html"]), 
											"expiry_date", $dateExpiry->format("Y-m-d"));
				
				if ($results)
				{
					PrintJavascriptLine("alert(\"'The advert has been added to the database successfully...'\");", 2, true);
				}
				else
				{
					PrintJavascriptLine("alert(\"'The could not be added to the database...'\");", 2, true);
				}
			}
		}
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** APPROVE ADVERT FORM FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************

	function DoDisplayApproveAdvertForm()
	{
		global $g_strPatternPhoneNumber;
		global $g_strPatternEmail;
		global $g_strPatternURL;
		global $g_strPatternPersonName;
		global $g_strPatternCurrency;
		
		echo "<h1>Approve Adverts</h1>\n";
		echo "<p>Use the approve advert form below to add and activate new adverts that have been paid for. You can paste \n";
		echo "details from the request email into the text fields here.</p>\n";

		echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"form_activate_advert\" style=\"width:540px;\" >\n";
		echo "    <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		echo "        <tr>\n";
		echo "           <td style=\"text-align:center;\" colspan=\"2\"><label><h3>Approve an advert</h3></label><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_business_name\">Business name: </label></td>\n";
		echo "	          <td><input name=\"text_business_name\" id=\"text_business_name\" type=\"text\" required pattern=\"" . $g_strPatternPersonName ."\" autocomplete=\"on\" placeholder=\"Business name...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_contact_name\">Contact name: </label></td>\n";
		echo "	          <td><input name=\"text_contact_name\" id=\"text_contact_name\" type=\"text\" required pattern=\"" . $g_strPatternPersonName ."\" autocomplete=\"on\" placeholder=\"Contact name...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_contact_phone\">Phone number: </label></td>\n";
		echo "	          <td><input name=\"text_contact_phone\" id=\"text_contact_phone\" type=\"text\" required pattern=\"" . $g_strPatternPhoneNumber ."\" autocomplete=\"on\" placeholder=\"Contact phone number...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_contact_email\">Email number: </label></td>\n";
		echo "	          <td><input name=\"text_contact_email\" id=\"text_contact_email\" type=\"text\" required pattern=\"" . $g_strPatternEmail ."\" autocomplete=\"on\" placeholder=\"Contact email address...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_website\">Website URL: </label></td>\n";
		echo "	          <td><input name=\"text_website\" id=\"text_website\" type=\"text\" required pattern=\"" . $g_strPatternURL ."\" autocomplete=\"on\" placeholder=\"Website URL...\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"select_advert_slot\">Advert slot: </label></td>\n";
		echo "	          <td>\n";
		echo "                <select name=\"select_advert_slot\" id=\"select_advert_slot\" autocomplete=\"on\" onchange=\"DoOnChangeAdvertSlot()\"/>\n";
		echo DoGetAdvertSlotOptions("");
		echo "                </select>\n";
		echo "            </td>\n";		
		echo "        </tr>\n";
		echo "         <tr>\n";
		echo "             <td><label for=\"textarea_advert_html\">Advert HTML</label></td>";
		echo "             <td>\n";
		echo "                 <textarea id=\"textarea_advert_html\" name=\"textarea_advert_html\" class=\"textarea_design\" rows=\"10\" required></textarea><br/><br/>\n";
		echo "             </td>\n";
		echo "         </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_cost_per_month\">Cost per month: $</label></td>\n";
		echo "	          <td><input id=\"text_cost_per_month\" name=\"text_cost_per_month\" type=\"text\" readonly style=\"width:10ch;\" /><label>Readonly</label></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_payment_amount\">Payment amount: </label></td>\n";
		echo "	          <td><input name=\"text_payment_amount\" id=\"text_payment_amount\" type=\"text\" required value=\"0\" pattern=\"" . $g_strPatternCurrency . "\" autocomplete=\"on\" placeholder=\"How much was paid?\" onchange=\"OnChangeTextPaymentAmount()\" /></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"text_number_months\">Number of months: </label></td>\n";
		echo "	          <td><input id=\"text_number_months\" name=\"text_number_months\" type=\"text\" readonly style=\"width:10ch;\" /><label>Calculated &amp; readonly</label></td>\n";		
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "                <input type=\"submit\" name=\"button_approve_advert\" id=\"button_approve_advert\" value=\"APPROVE THE ADVERT\"/>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "    </table>\n";
		echo "</form>\n";	
	}

?>

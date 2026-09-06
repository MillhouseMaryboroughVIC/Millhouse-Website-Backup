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
	require_once "../common.php";
	require_once "admin_login.php";

	DoRecordPageHitOrBlock();

	//******************************************************************************
	//******************************************************************************
	//** 
	//** FORM INPUT DATA PERSISTENCE
	//** 
	//******************************************************************************
	//******************************************************************************
	function ResetSessionVars()
	{
		$_SESSION["group_shortkey"] = 0;
		$_SESSION["date"] = "";
		$_SESSION["name"] = "";
		$_SESSION["description"] = "";
		$_SESSION["photo"] = "";
		$_SESSION["contact"] = "";
		$_SESSION["email"] = "";
		$_SESSION["phone"] = "";
		$_SESSION["dow1"] = -1;
		$_SESSION["dow2"] = -1;
		$_SESSION["wom"] = 0;
		$_SESSION["time1"] = "08:00";
		$_SESSION["time2"] = "22:00";
		$_SESSION["duration"] = 0;
		$_SESSION["cost"] = 0;
		$_SESSION["donation"] = false;
		$_SESSION["purpose"] = "";
		$_SESSION["facebook"] = "";
		$_SESSION["display"] = false;
		$_SESSION["exclude_school_holidays"] = false;
		$_SESSION["exclude_xmas_new_year"] = false;
		$_SESSION["exclude_easter"] = false;
		$_SESSION["password_group"] = "";
	}
	if (!isset($_SESSION["group_shortkey"]))
		ResetSessionVars();

	//******************************************************************************
	//******************************************************************************
	//** 
	//** GROUP FORM DISPLAY FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoDisplayGroupEditForm()
	{
		global $g_strPatternPhoneNumber;
		global $g_strPatternEmail;
		global $g_strPatternURL;
		global $g_strPatternPersonName;
		global $g_strPatternGroupName;
		global $g_strPatternGroupDesc;
		global $g_strPatternComment;
		global $g_strPatternPassword;

		echo "<p>Use the group edit form below to add new groups and edit the details of existing groups. Any new groups \n"; 
		echo "or group name changes will automatically appear in the navigation submenu and in the page contents. If new \n";
		echo "groups are added, or if existing groups undergo a name change, then the navigation submenu to the left will \n";
		echo "be automatically updated.</p>\n";

		echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"form_group_details\" style=\"width:850px;\" >\n";
		echo "    <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		echo "        <tr>\n";
		echo "           <td style=\"text-align:center;\" colspan=\"2\"><label><h3>Add a group or edit group details</h3></label><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td colspan=\"2\">Please note if you hit a key and nothing happens then it is because certain keys have been disabled in order to ensure valid text input.\n";
		echo "        </tr>\n";
		echo "        <tr><td>&nbsp;</td></tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;width:48ch;\"><label for=\"name\">Group Name (short): </label></td>\n";
		echo "	          <td><input name=\"name\" id=\"name\" type=\"text\" pattern=\"" . $g_strPatternGroupName . "\" autocomplete=\"on\" value=\"" . $_SESSION["name"] ."\" minlength=\"5\" maxlength=\"30\" placeholder=\"A short name for internal use (_ instead of space)...\" onkeydown=\"OnKeyPressUsername(event)\" /></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"description\">Group Description (for display): </label></td>\n";
		echo "	          <td><input name=\"description\" id=\"description\" type=\"text\" pattern=\"" . $g_strPatternGroupDesc ."\" autocomplete=\"on\" minlength=\"5\" maxlength=\"30\" value=\"" . $_SESSION["description"] ."\" placeholder=\"Display name for the group...\" /></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"contact\">Group leader: </label></td>\n";
		echo "	          <td><input name=\"contact\" id=\"contact\" type=\"text\" pattern=\"" . $g_strPatternPersonName . ">\" autocomplete=\"on\" value=\"" . $_SESSION["contact"] . "\" placeholder=\"Group leader's name...\"onkeydown=\"OnKeyPressName(event)\" /></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;vertical-align:top;\">\n";
		echo "                <label for=\"email\">Group leader's email address: </label><br/>\n";
		echo "	          </td>\n";
		echo "	          <td>\n";
		echo "                <input name=\"email\" id=\"email\" type=\"text\" autocomplete=\"on\" value=\"" . $_SESSION["email"] . "\" placeholder=\"Email address...\" pattern=\"" . $g_strPatternPassword . "\" onkeydown=\"OnKeyPressEmailAddress(event) \"/><br/>\n";
		echo "                <label>Also used for password recovery...</label>\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"phone\">Group Phone: </label></td>\n";
		echo "	          <td><input name=\"phone\" id=\"phone\" type=\"text\" pattern=\"" . $g_strPatternPhoneNumber . "\" autocomplete=\"on\" value=\"" . $_SESSION["phone"]  . "\" placeholder=\"Phone or mobile number...\" minlength=\"8\" maxlength=\"10\" onkeydown=\"OnKeyPressPhone(event)\" /></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\">\n";
		echo "                <label for=\"password_group\">Group Password: </label></td>\n";
		echo "	          <td>\n";
		echo "                <input name=\"password_group\" id=\"password_group\" type=\"password\" pattern=\"" . $g_strPatternPassword . "\" autocomplete=\"on\" value=\"" . $_SESSION["password_group"]  . "\" minlength=\"8\" maxlength=\"30\" placeholder=\"The group's password...\" onkeydown=\"OnKeyDownPassword(event)\" />\n";
		echo "                <input type=\"checkbox\" id=\"toggle_password_group\" onclick=\"OnClickTogglePassword('toggle_password_group', 'password_group')\" />\n";
		echo "                <label for=\"toggle_password_group\">Show password</label>\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "        <tr><td colspan=\"2\"><h4>Meeting day(s) of week &amp; frequency</h4></td></tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"dow1\">Day</label></td>\n";
		echo "	          <td>\n";
		echo "                <select id=\"dow1\" name=\"dow1\" autocomplete=\"on\">\n";
		echo "	                  <option " . (($_SESSION["dow1"] == 0) ? "selected" : "") . " value=\"0\">Sunday</option>\n";
		echo "	                  <option " . ((($_SESSION["dow1"] == 1) || ($_SESSION["dow1"] == NULL)) ? "selected" : "") . " value=\"1\">Monday</option>\n";
		echo "	                  <option " . (($_SESSION["dow1"] == 2) ? "selected" : "") . " value=\"2\">Tuesday</option>\n";
		echo "	                  <option " . (($_SESSION["dow1"] == 3) ? "selected" : "") . " value=\"3\">Wednesday</option>\n";
		echo "	                  <option " . (($_SESSION["dow1"] == 4) ? "selected" : "") . " value=\"4\">Thursday</option>\n";
		echo "	                  <option " . (($_SESSION["dow1"] == 5) ? "selected" : "") . " value=\"5\">Friday</option>\n";
		echo "	                  <option " . (($_SESSION["dow1"] == 6) ? "selected" : "") . " value=\"6\">Saturday</option>\n";
		echo "	                  <option " . (($_SESSION["dow1"] == -1) ? "selected" : "") . " value=\"-1\">Monday to Friday</option>\n";
		echo "                </select>\n";
		echo "           </td>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align: right;\"><label for=\"dow2\">Additional day (optional)</label></td>\n";
		echo "	          <td>\n";
		echo "                <select id=\"dow2\" name=\"dow2\" autocomplete=\"on\">\n";
		echo "	                  <option value=\"0\">Not set</option>\n";
		echo "	                  <option " .  (($_SESSION["dow2"] == 0) ? "selected" : "") . " value=\"0\">Sunday</option>\n";
		echo "	                  <option " .  ((($_SESSION["dow2"] == 1)  || ($_SESSION["dow2"] == NULL)) ? "selected" : "") . " value=\"1\">Monday</option>\n";
		echo "	                  <option " .  (($_SESSION["dow2"] == 2) ? "selected" : "") . " value=\"2\">Tuesday</option>\n";
		echo "	                  <option " .  (($_SESSION["dow2"] == 3) ? "selected" : "") . " value=\"3\">Wednesday</option>\n";
		echo "	                  <option " .  (($_SESSION["dow2"] == 4) ? "selected" : "") . " value=\"4\">Thursday</option>\n";
		echo "	                  <option " .  (($_SESSION["dow2"] == 5) ? "selected" : "") . " value=\"5\">Friday</option>\n";
		echo "	                  <option " .  (($_SESSION["dow2"] == 6) ? "selected" : "") . " value=\"6\">Saturday</option>\n";
		echo "	                  <option " .  (($_SESSION["dow2"] == -1) ? "selected" : "") . " value=\"-1\">Monday to Friday</option>\n";
		echo "                </select>\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\">\n";
		echo "                <label for=\"wom\">Week of month</label>\n";
		echo "	          </td>\n";
		echo "	          <td>\n";
		echo "                <select id=\"wom\" name=\"wom\" autocomplete=\"on\">\n";
		echo "	                  <option " . ($_SESSION["wom"] == 1) ? "selected" : "" . "value=\"1\">First</option>\n";
		echo "	                  <option " . ($_SESSION["wom"] == 2) ? "selected" : "" . "value=\"2\">Second</option>\n";
		echo "	                  <option " . ($_SESSION["wom"] == 3) ? "selected" : "" . "value=\"3\">Third</option>\n";
		echo "	                  <option " . ($_SESSION["wom"] == 4) ? "selected" : "" . "value=\"4\">Fourth</option>\n";
		echo "                </select>\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align: right;\"><label for=\"time1\">Time - 08:00am to 10:00pm</label></td>\n";
		echo "            <td><input type=\"time\" id=\"time1\" name=\"time1\" autocomplete=\"on\" min=\"08:00\" max=\"22:00\" value=\"" . $_SESSION["time1"] ."\" /></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align: right;\"><label for=\"time2\">Additional time (optional) - 08:00am to 10:00pm</label></td>\n";
		echo "            <td><input type=\"time\" id=\"time2\" name=\"time2\" autocomplete=\"on\" min=\"08:00\" max=\"22:00\" value=\"" . $_SESSION["time2"] ."\" /></td>\n";
		echo "	      </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\">\n";
		echo "                <label for=\"duration\">Duration</label>\n";
		echo "	          </td>\n";
		echo "	          <td>\n";
		echo "                <input type=\"number\" id=\"duration\" name=\"duration\" autocomplete=\"on\" min=\"0\" max=\"8\" value=\"" . $_SESSION["duration"] ."\" />&nbsp;<label>hrs</label>\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\">\n";
		echo "                <label for=\"cost\">Cost $</label>\n";
		echo "	          </td>\n";
		echo "	          <td>\n";
		echo "                <input type=\"number\" id=\"cost\" name=\"cost\" autocomplete=\"on\" min=\"0\" value=\"" . $_SESSION["cost"] ."\" />\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\">\n";
		echo "                <label for=\"cost\">Is a donation</label>\n";
		echo "	          </td>\n";
		echo "	          <td>\n";
		echo "                <input type=\"checkbox\" id=\"donation\" name=\"donation\" autocomplete=\"on\" " . (($_SESSION["donation"]) ? "checked" : "") ." />\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td colspan=\"2\">\n";
		echo "                <table border=\"0\" cellpadding=\"5\" cellspacing=\"0\">\n";
		echo "	                  <tr>\n";
		echo "                        <td>\n";
		echo "	                          <input type=\"checkbox\" id=\"exclude_xmas_new_year\" name=\"exclude_xmas_new_year\" autocomplete=\"on\"" . (($_SESSION["exclude_xmas_new_year"]) ? "checked" : "") . " />\n";
		echo "                        </td>\n";
		echo "                        <td>\n";
		echo "	                          <label for=\"exclude_xmas_new_year\">Exclude Christmas/new year?</label>\n";
		echo "                        </td>\n";
		echo "                        <td>\n";
		echo "	                          <input type=\"checkbox\" id=\"exclude_easter\" name=\"exclude_easter\" autocomplete=\"on\"" . (($_SESSION["exclude_easter"]) ? "checked" : "") ." />\n";
		echo "                        </td>\n";
		echo "                        <td>\n";
		echo "	                          <label for=\"exclude_xmas\">Exclude Easter?</label>\n";
		echo "                        </td>\n";
		echo "                        <td>\n";
		echo "	                          <input type=\"checkbox\" id=\"exclude_school_holidays\" name=\"exclude_school_holidays\" autocomplete=\"on\"" . (($_SESSION["exclude_school_holidays"]) ? "checked" : "") . " />\n";
		echo "                        </td>\n";
		echo "                        <td>\n";
		echo "	                          <label for=\"exclude_xmas\">Exclude school holidays?</label>\n";
		echo "                        </td>\n";
		echo "	                  </tr>\n";
		echo "                </table>\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\">\n";
		echo "                <label for=\"cost\">The group's purpose:</label>\n";
		echo "	          </td>\n";
		echo "	          <td>\n";
		echo "                <textarea name=\"purpose\" id=\"purpose\" cols=\"40\" rows=\"10\" pattern=\"" . $g_strPatternComment . "\" autocomplete=\"on\" minlength=\"128\" maxlength=\"256\" placeholder=\"A description of group's purpose and what it offers participants...\" onkeypress=\"OnKeyPressComment(event)\">" . $_SESSION["purpose"] . "</textarea>\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	           <td style=\"text-align: right;\">\n";
		echo "                 <label for=\"facebook\">Social Media:</label>\n";
		echo "	           </td>\n";
		echo "	           <td>\n";
		echo "                 <input type=\"text\" name=\"facebook\" id=\"facebook\" value=\"" . $_SESSION["facebook"] ."\" pattern=\"" . $g_strPatternURL . "\" autocomplete=\"on\" maxlength=\"256\" placeholder=\"URL of any Facebook group...\" onkeypress=\"OnKeyPressURL(event)\" />\n";
		echo "	           </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\">\n";
		echo "                <label for=\"cost\">Display this group in the 'Groups' submenu?</label>\n";
		echo "	          </td>\n";
		echo "	          <td>\n";
		echo "                <input type=\"checkbox\" id=\"display\" name=\"display\" autocomplete=\"on\"" . (($_SESSION["display"] == 1) ? "checked" : "") . " />\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td colspan=\"2\"><h4>Load the details of a group for editing</h4></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td style=\"text-align: right;\"><label for=\"group_list\">Current groups:</label></td>\n";
		echo "	          <td>\n";
		echo "                <select id=\"group_list\" name=\"group_list\" autocomplete=\"on\">\n";
		echo DoGetGroupOptions();
		echo "                </select>\n";
		echo "                <input type=\"button\" name=\"load_group\" id=\"load_group\" value=\"LOAD\" onclick=\"OnClickLoadGroup()\"/>\n";
		echo "                &nbsp;\n";
		echo "                <input type=\"button\" value=\"RESET\" onclick=\"OnClickResetGroupForm()\" />\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td colspan=\"2\">&nbsp;</td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "	          <td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "                <input type=\"hidden\" id=\"group_shortkey\" name=\"group_shortkey\" value=\"" . $_SESSION["group_shortkey"] ."\" />\n";
		echo "                <input type=\"button\" name=\"upload_group\" id=\"upload_group\" value=\"SAVE\" onclick=\"DoValidateGroup()\" />\n";
		echo "                 &nbsp;";
		echo "                <input type=\"button\" name=\"delete_group\" id=\"delete_group\" value=\"DELETE\"" . (($_SESSION["group_shortkey"] == 0) ? "disabled" : "") . " onclick=\"OnClickDeleteGroup()\" />\n";
		echo "                &nbsp;";
		echo "                <input type=\"submit\" value=\"LOGOUT\" id=\"logout_group\" name=\"logout_group\" />\n";
		echo "	          </td>\n";
		echo "        </tr>\n";
		echo "    </table>\n";
		echo "</form>\n";	
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** GROUP FORM PROCESSING FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
			
	function DoProcessGroupForm()
	{
		global $g_dbMillhouse;
		global $g_strQuery;

		if (isset($_POST["load_group"]))
		{
			if (isset($_POST["group_list"]))
				$result = DoLoadGroup($_POST["group_list"]);
		}
		else if (isset($_POST["upload_group"]))
		{
			if (DoCheckValidSessionPassword())
			{
				if ($_POST["group_shortkey"] == 0)
				{
					if ($result = DoInsertQuery19($g_dbMillhouse, "groups", "name", $_POST["name"], "description", $_POST["description"], "password", $_POST["password_group"], "contact", $_POST["contact"], "email", $_POST["email"], "phone", $_POST["phone"], "dow1", $_POST["dow1"], "dow2", $_POST["dow2"], "wom", $_POST["wom"], "time1", $_POST["time1"], "time2", $_POST["time2"], "hours", $_POST["duration"], "cost", $_POST["cost"], "donation", $_POST["donation"], "purpose", $_POST["purpose"], "facebook", $_POST["facebook"], "exclude_xmas_new_year", $_POST["exclude_xmas_new_year"], "exclude_easter", $_POST["exclude_easter"], "exclude_school_holidays", $_POST["exclude_school_holidays"]))
					{
					}
				}
				else
				{
					if ($result = DoUpdateQuery19($g_dbMillhouse, "groups", "name", $_POST["name"], "description", $_POST["description"], "password", $_POST["password_group"], "contact", $_POST["contact"], "email", $_POST["email"], "phone", $_POST["phone"], "dow1", $_POST["dow1"], "dow2", $_POST["dow2"], "wom", $_POST["wom"], "time1", $_POST["time1"], "time2", $_POST["time2"], "hours", $_POST["duration"], "cost", $_POST["cost"], "donation", $_POST["donation"], "purpose", $_POST["purpose"], "facebook", $_POST["facebook"], "exclude_xmas_new_year", $_POST["exclude_xmas_new_year"], "exclude_easter", $_POST["exclude_easter"], "exclude_school_holidays", $_POST["exclude_school_holidays"], "shortkey", $_POST["group_shortkey"]))
					{
					}
				}
				ResetSessionVars();
			}
		}
		else if (isset($_POST["delete_group"]))
		{
			if (DoCheckValidSessionPassword())
			{
				if ($result = DoDeleteQuery($g_dbMillhouse, "groups", "shortkey", $_POST["group_shortkey"]))
				{
					rmdir("images/" . $_POST["name"]);
				}
				ResetSessionVars();
			}
		}
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** SELECT OPTION GENERATION FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoGetGroupOptions()
	{
		global $g_dbMillhouse;
		global $g_strQuery;
		$strEventOptionsHTML = "";

		if ($result = DoFindAllQuery($g_dbMillhouse, "groups"))
		{
			if ($result->num_rows > 0)
			{
				$nCount = 0;
				while ($row = $result->fetch_assoc())
				{
					if ((isset($_POST["group_list"]) && ($_POST["group_list"] == $row["shortkey"])) || ($nCount == 0))
						$strEventOptionsHTML .= "<option selected ";
					else
						$strEventOptionsHTML .= "<option ";
					$strEventOptionsHTML .= "value=\"" . $row["shortkey"] . "\">" . $row["description"] . "</option>\n";
					$nCount++;
				}
			}
			else
			{
				$strEventOptionsHTML .= "<option value=\"\" selected disabled>No groups available to edit...</option>\n";
			}
		}
		return $strEventOptionsHTML;
	}

	function DoLoadGroup($nShortkey)
	{
		global $g_dbMillhouse;
		global $g_strQuery;
		$result = "";

		if ($result = DoFindQuery1($g_dbMillhouse, "groups", "shortkey", $nShortkey))
		{
			if ($result->num_rows > 0)
			{
				if ($row = $result->fetch_assoc())
				{
					ResetSessionVars();
					$_SESSION["group_shortkey"] = $nShortkey;
					$_SESSION["name"] = $row["name"];
					$_SESSION["description"] = $row["description"];
					$_SESSION["contact"] = $row["contact"];
					$_SESSION["email"] = $row["email"];
					$_SESSION["phone"] = $row["phone"];
					$_SESSION["dow1"] = $row["dow1"];
					$_SESSION["dow2"] = $row["dow2"];
					$_SESSION["wom"] = $row["wom"];
					
					$dateTime = new DateTime($row["time1"]);
					$_SESSION["time1"] = $dateTime->format("H:i:s");
					
					$dateTime = new DateTime($row["time2"]);
					$_SESSION["time2"] = $dateTime->format("H:i:s");
					
					$_SESSION["duration"] = $row["duration"];
					$_SESSION["cost"] = $row["cost"];
					$_SESSION["donation"] = $row["donation"];
					$_SESSION["purpose"] = $row["purpose"];
					$_SESSION["facebook"] = $row["facebook"];
					$_SESSION["display"] = $row["display"];
					$_SESSION["exclude_xmas_new_year"] = $row["exclude_xmas_new_year"];
					$_SESSION["exclude_easter"] = $row["exclude_easter"];
					$_SESSION["exclude_school_holidays"] = $row["exclude_school_holidays"];
					$_SESSION["password_group"] = $row["password"];
				}
			}
		}
		return $result;
	}

	function DoDisplayForm()
	{
		if (!IsLoggedIn())
		{
			DoDisplayLoginForm();
		}
		else if (IsAdminLoggedIn())
		{
			DoDisplayLogoutForm();			
			DoDisplayGroupEditForm();
		}
		DoDisplayLoginFormInstrunctions();
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
		<title></title>
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

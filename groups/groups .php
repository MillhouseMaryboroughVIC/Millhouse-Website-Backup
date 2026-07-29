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

	DoRecordPageHitOrBlock();
		
	//******************************************************************************
	//******************************************************************************
	//** 
	//** GENERATES THE LST OF GROUP HYPERLNKS IN THE GROUPS SUBMENU
	//** 
	//******************************************************************************
	//******************************************************************************

	function DoGenerateGroupHyperlinks()
	{
		global $g_dbMillhouse;
		global $g_strQuery;
		$strHTML = "";

		if ($result = DoFindAllQuery($g_dbMillhouse, "millhouse_db.groups", "", "description", true))
		{
			if ($result->num_rows > 0)
			{
				while ($row = $result->fetch_assoc())
				{
					if ((int)$row["display"] == 1)
					{
						$strHTML .= "<li class=\"submenu_item\"><a href=\"#" . $row["name"] ."\" onclick=\"DoClickEventHyperlink('div_" . $row["name"] . "')\"><b>";
						$strHTML .= $row["description"] . "</b></a></li>\n								";
					}
				}
			}
		}
		return $strHTML;
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** GENERATES AN ARRAY OF GROUP NAMES
	//** 
	//******************************************************************************
	//******************************************************************************

	function DoGetGroupNameList()
	{
		global $g_dbMillhouse;
		global $g_strQuery;
		$arrayGroupName = [];
		$strEventOptionsHTML = "";
		
		if ($result = DoFindAllQuery($g_dbMillhouse, "millhouse_db.groups"))
		{
			if ($result->num_rows > 0)
			{
				$nCount = 0;
				while ($row = $result->fetch_assoc())
				{
					$arrayGroupName[] = $row["name"];
				}
			}
		}
		return $arrayGroupName;
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** SESSION VARIABLE PROCESSING
	//** 
	//******************************************************************************
	//******************************************************************************

	function ResetSessionVars()
	{	
		$_SESSION["group_name"] = "";
		$_SESSION["group_password"] = "";
	}
	
	function CheckSessionGroupPassword()
	{
		$bResult = false;
		global $g_dbMillhouse;
		
		if (!DoFindQuery1($g_dbMillhouse, "millhouse_db.groups", "name", $_SESSION["group_name"], "password", $_SESSION["group_password"]))
			DoPrintJSAlertError("SESSION stored password ('" . $_SESSION["admin_password"] . "') does not match the password for the group '" . $_SESSION["group_name"] . "'!");
		else
			$bResult = true;
			
		return $bResult;
	}
	
	function CheckSessionVarsSet()
	{
		if (!isset($_SESSION["group_name"]))
			$_SESSION["group_name"] = "";
		if (!isset($_SESSION["group_password"]))
			$_SESSION["group_password"] = "";		
	}
	CheckSessionVarsSet();
	
	// Universal width for all group event images
	$g_strImageWidth = 400;

		
	//******************************************************************************
	//******************************************************************************
	//** 
	//** EVENT PHOTO PROCESSING FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoSaveNewPhoto($nShortkey)
	{
		global $g_dbMillhouse;
		$strDestPath = "";
		$strGroupName = "";
		$result = DoFindQuery1($g_dbMillhouse, "millhouse_db.events", "shortkey", $nShortkey);

		if ($result->num_rows > 0)
		{
			if ($row = $result->fetch_assoc())
			{
				$result = DoFindQuery1($g_dbMillhouse, "millhouse_db.groups", "shortkey", $row["group_shortkey"]);
				if ($result->num_rows > 0)
				{
					if ($row = $result->fetch_assoc())
					{
						$strGroupName = $row["name"];
						
						if (!is_dir("images/" . $strGroupName))
							mkdir("images/" . $strGroupName);
							
						$strDestPath = "images/" . $strGroupName . "/";

						if (isset($_FILES["photo"]["name"]) && (strlen($_FILES["photo"]["name"]) > 0) && 
							($_FILES["photo"]["error"] === UPLOAD_ERR_OK))
						{
							move_uploaded_file($_FILES["photo"]["tmp_name"], $strDestPath);
						}
					}
				}
			}
		}
	}
	
	function DoDeleteOldPhoto($nShortkey)
	{
		global $g_dbMillhouse;
		$strFilename = "";
		$strGroupName = "";
		$result = DoFindQuery1($g_dbMillhouse, "millhouse_db.events", "shortkey", $nShortkey);

		if ($result->num_rows > 0)
		{
			if ($row = $result->fetch_assoc())
			{
				$strFilename = $row["photo"];
				$result = DoFindQuery1($g_dbMillhouse, "millhouse_db.groups", "shortkey", $row["group_shortkey"]);
				if ($result->num_rows > 0)
				{
					if ($row = $result->fetch_assoc())
					{
						$strGroupName = $row["name"];
						$strFilePath = "images/" . $strGroupName . "/" . $strFilename;
						if (file_exists($strFilePath)) 
    						unlink($strFilePath);
    				}
    			}
			}
		}
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** DATABASE SECURITY
	//** 
	//******************************************************************************
	//******************************************************************************
	function DoCheckValidSessionPassword()
	{
		global $g_dbMillhouse;
		$bResult = false;

		if (!DoFindQuery2($g_dbMillhouse, "millhouse_db.groups", "name", $_SESSION["group_name"], "password", $_SESSION["group_password"]))
			DoPrintJSAlertError("SESSION stored password ('" . $_SESSION["group_password"] . "') does not match the password for this group!");
		else
			$bResult = true;
			
		return $bResult;
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** EVENT FORM PROCESSING FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoGetGroupShortkey($strGroupName)
	{
		global $g_dbMillhouse;
		$nGroupShortkey = 0;

		if ($result = DoFindQuery1($g_dbMillhouse, "millhouse_db.groups", "name", $strGroupName))
		{
			if ($result->num_rows > 0)
			{
				if ($row = $result->fetch_assoc())
				{
					$nGroupShortkey = $row["shortkey"];
				}
			}
		}
		return $nGroupShortkey;
	}
	
	function DoGetGroupEmailFromEventShortkey($nEventShortkey)
	{
		global $g_dbMillhouse;
		$strEmail = "";

		if ($result = DoFindQuery1($g_dbMillhouse, "millhouse_db.events", $nEventShortkey))
		{
			if ($result->num_rows > 0)
			{
				if ($row = $result->fetch_assoc())
				{
					if ($result = DoFindQuery1($g_dbMillhouse, "millhouse_db.groups", $row["group_shortkey"]))
					{
						if ($row = $result->fetch_assoc())
						{
							$strEmail = $row["email"];
						}
					}
				}
			}
		}
		return $strEmail;
	}

	function DoProcessEventForm($strGroupName)
	{
		global $g_dbMillhouse;

		if (isset($_POST["load_event_" . $strGroupName]))
		{
			if (isset($_POST["event_list_" . $strGroupName]))
			{
				if ($result = DoFindQuery1($g_dbMillhouse, "events", "shortkey", $_POST["event_list_" . $strGroupName]))
				{
					if ($result->num_rows > 0)
					{
						if ($row = $results->fetch_assoc())
						{
							$_SESSION["shortkey_" . $strGroupName] = $row("shortkey");
							$_SESSION["date_" . $strGroupName] = $row["date"];
							$_SESSION["description_" . $strGroupName] = $row["description"];
							$_SESSION["photo_" . $strGroupName] = $row["photo"];
						}
					}
				}
			}
		}		
		else if (isset($_POST["upload_event_" . $strGroupName]))
		{
			if ($_SESSION["shortkey_" . $strGroupName] == 0)
			{
				if (DoCheckValidSessionPassword())
				{
					if ($result = DoInsertQuery4($g_dbMillhousem, "millhouse_db.events", "date", $_POST["date_" . $strGroupName], "description", $_POST["description_" . $strGroupName], "photo", $_POST["photo_"]))
					{
					}
					DoSaveNewPhoto($_POST["event_shortkey"]);
				}
			}
			else
			{
				if (DoCheckValidSessionPassword())
				{
					if ($result = DoUpdateQuery3($g_dbMillhousem, "millhouse_db.ievents", "date", $_POST["date_" . $strGroupName], "description", $_POST["description_" . $strGroupName], "photo", $_POST["photo_" . $strGroupName], "shortkey", $_POST["shortkey_" . $strGroupName]))
						DoDeleteOldPhoto($_POST["shortkey_" . $strGroupName]);
					DoSaveNewPhoto($_POST["event_shortkey"]);
				}
			}
			
			$_SESSION["shortkey_" . $strGroupName] = 0;
			$_SESSION["date_" . $strGroupName] = "";
			$_SESSION["description_" . $strGroupName] = "";
			$_SESSION["photo_" . $strGroupName] = "";
		}
		else if (isset($_POST["delete_event_" . $strGroupName]))
		{
			if (DoCheckValidSessionPassword())
			{
				if ($result = DoDeleteQuery($g_dbMillhouse, "millhouse_db.events", "shortkey", $_POST["shortkey_" . $strGroupName]))
				{
				}
			}
			$_SESSION["shortkey_" . $strGroupName] = 0;
			$_SESSION["date_" . $strGroupName] = "";
			$_SESSION["description_" . $strGroupName] = "";
			$_SESSION["photo_" . $strGroupName] = "";								
		}
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** GROUP DIV FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoGetEvents($strGroupName)
	{
		global $g_dbMillhouse;
		global $g_strImageWidth;
		$nGroupShortkey = DoGetGroupShortkey($strGroupName);
		$strHTML = "";

		if ($nGroupShortkey > 0)
		{
			if ($result = DoFindQuery1($g_dbMillhouse, "millhouse_db.events", "group_shortkey", $nGroupShortkey, "", "date", false))
			{
				if ($result->num_rows > 0)
				{
					while ($row = $results->fetch_assoc())
					{
						$timestamp = strtotime($row["date"]);
						$strHTML .= "<h3>" . date("l, F j, Y", $timestamp) . "</h3>\n";
						$strHTML .= "<p>" . $row["description"] . "</p>\n";
						if (strlen($row["photo"]) > 0)
						{
							$strPhotoFilePath = "images/" . $strGroupName . "/" . $row["photo"];
							$strHTML .= "<a href=\"" . $strPhotoFilePath . "\" alt=\"\"><img src=\"" . $strPhotoFilePath . "\" alt=\"\" width=\"" . $g_strImageWidth . "\" /></a>\n";
						}
					}							
				}
				else
				{
					$strHTML .= "<h3>" . date("l, F j, Y") . "</h3>\n";
					$strHTML .= "<p>NO EVENTS AVAILABLE YET</p>";
					$strHTML .= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut " . 
					"labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris " . 
					"nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit " . 
					"esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt " . 
					"in culpa qui officia deserunt mollit anim id est laborum.</p>\n";
				}
			}
		}
		return $strHTML;
	}
							
	function DoDisplayGroupDivs($strCurrentVisibleDiv)
	{
		global $g_dbMillhouse;
		global $g_strQuery;
									
		if ($result = DoFindAllQuery($g_dbMillhouse, "millhouse_db.groups"))
		{
			if ($result->num_rows > 0)
			{
				while ($row = $result->fetch_assoc())
				{
					if (((int)$row["display"]) == 1)
					{													
						// Event form data persistance
						if (!isset($_SESSION["date_" . $row["name"]]))
						{
							$_SESSION["date_" . $row["name"]] = "";
							$_SESSION["shortkey_" . $row["name"]] = "";
							$_SESSION["description_" . $row["name"]] = "";
							$_SESSION["photo_" . $row["name"]] = "none";
						}
						$strDisplay = "none";
						if (strcmp($row["name"], $_SESSION["group_name"]) == 0)
							$strDisplay = "block";

						echo "<div id=\"div_" . $row["name"] . "\" style=\"display:" . $strDisplay . ";\">\n";
						echo "<h1>" . $row["description"] . "</h1>\n";
						
						if (($_SESSION["group_name"] == $row["name"]) && ($_SESSION["group_password"] == $row["password"]))
						{
							echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"event_form_" . $row["name"] . "\">\n";
							echo "  <h1>Add, Edit & Delete Events For This Group</h1>\n";
							echo "	<table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
							echo "		<tr>\n";
							echo "			<td style=\"text-align: right;\"><label for=\"date_" . $row["name"] . "\">Event Date: </label></td>\n";
							echo "			<td><input name=\"date_" . $row["name"] . "\" id=\"date_" . $row["name"] . "\" type=\"date\" value=\"" . $_SESSION["date_" . $row["name"]] ."\" autocomplete=\"on\" placeholder=\"A future ot past date...\" /></td>\n";
							echo "		</tr>\n";
							echo "		<tr>\n";
							echo "			<td style=\"text-align: right;\"><label for=\"description_" . $row["name"] . "\">Event Description: </label></td>\n";
							echo "			<td><textarea name=\"description_" . $row["name"] . "\" id=\"description_" . $row["name"] . "\" cols=\"40\" rows=\"20\" onkeydown=\"OnKeyPressComment(event)\" autocomplete=\"on\" minlength=\"160\" maxlength=\"8192\" placeholder=\"A detailed description of the event...\">" . $_SESSION["description_" . $row["name"]] . "</textarea></td>\n";
							echo "		</tr>\n";
							echo "		<tr>\n";
							echo "			<td style=\"text-align: right;\"><label for=\"photo_" . $row["name"] . "\">Photo: </label></td>\n";
							echo "			<td><input name=\"photo_" . $row["name"] . "\" id=\"photo_" . $row["name"] . "\" type=\"file\" accept=\"image/*\" value=\"" . $_SESSION["photo_" . $row["name"]] . "\" placeholder=\"An optional photo for the event...\" onchange=\"OnChangeCheckFileSize(this.files[0].size)\" /></td>\n";
							echo "		</tr>\n";
							echo "		<tr>\n";
							echo "			<td style=\"text-align: right;\"><label for=\"event_list_" . $row["name"] . "\">Current events:</label></td>\n";
							echo "			<td>\n";
							echo "				<select id=\"event_list_" . $row["name"] . "\" name=\"event_list_" . $row["name"] . "\" autocomplete=\"on\">\n";
							echo DoGetEventOptions($row["name"]);
							echo "				</select>\n";
							echo "				<br/><br/>\n";
							echo "				<input type=\"button\" name=\"load_event_" . $row["name"] . "\" id=\"load_event_" . $row["name"] . "\" value=\"LOAD\" onclick=\"OnClickLoadEvent('" . $row["name"] . "')\" />\n";
							echo "				&nbsp;\n";
							echo "				<input type=\"button\" name=\"reset_event_" . $row["name"] . "\" id=\"reset_event_" . $row["name"] . "\" value=\"RESET\" onclick=\"OnClickResetEventForm('" . $row["name"] . "')\" />\n";
							echo "			</td>\n";
							echo "		</tr>\n";
							echo "		<tr>\n";
							echo "			<td colspan=\"2\" style=\"text-align:right;\">\n";
							echo "				<input type=\"hidden\" id=\"shortkey_" . $row["name"] . "\" name=\"shortkey_" . $row["name"] . "\" value=\"" . $_SESSION["shortkey_" . $row["name"]] . "\" />\n";
							echo "				<input type=\"button\" name=\"upload_event_" . $row["name"] . "\" id=\"upload_event_" . $row["name"] . "\" value=\"UPLOAD\" onclick=\"DoValidateEvent('" . $row["name"] . "')\"/>\n";
							echo "				&nbsp;\n";
							echo "				<input type=\"button\" name=\"delete_event_" . $row["name"] . "\" id=\"delete_event_" . $row["name"] . "\" value=\"DELETE\" ";
							if ($_SESSION["event_shortkey"] == 0) 
								echo "disabled ";
							echo "onclick=\"OnClickDeleteEvent()\" />\n";
							echo "				&nbsp;\n";
							echo "				<input type=\"submit\" value=\"LOGOUT\" id=\"logout_event_" . $row["name"] . "\" name=\"logout_event_" . $row["name"] . "\" />\n";
							echo "			</td>\n";
							echo "		</tr>\n";
							echo "	</table>\n";
							echo "</form>\n";
						}
						else
						{
							echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"login_form_" . $row["name"] . "\">\n";
							echo "    <h1>Login To This Group</h1>\n";
							echo "    <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
							echo "        <tr>\n";
							echo "            <td style=\"text-align: right;\"><label for=\"password_event_" . $row["name"] . "\">Password: </label></td>\n";
							echo "            <td>\n";
							echo "                <input name=\"password_event_" . $row["name"] . "\" id=\"password_event_" . $row["name"] . "\" type=\"password\" autocomplete=\"on\" placeholder=\"The group's password...\" onkeydown=\"OnKeyPressPassword(event)\" />\n";
							echo "                <input type=\"hidden\" value=\"" . $row["name"] . "\" name=\"group_name\" />\n";
							echo "                <br/>\n";
							echo "                <input type=\"checkbox\" id=\"toggle_password_" . $row["name"] . "\" onclick=\"OnClickTogglePassword('toggle_password_" . $row["name"] . "', 'password_event_" . $row["name"] . "')\" />\n";
							echo "                <label for=\"toggle_password_" . $row["name"] . "\">Show password</label>\n";
							echo "           </td>\n";
							echo "        </tr>\n";
							echo "        <tr>\n";
							echo "            <td colspan=\"2\" style=\"text-align:right;\">\n";
							echo "                <input type=\"submit\" name=\"forgot_password_event_" . $row["name"] . "\" id=\"forgot_password_event_" . $row["name"] . "\" value=\"I FORGET THE PASSWORD\" />&nbsp;\n";
							echo "                <input type=\"submit\" name=\"login_event_" . $row["name"] . "\" id=\"login_event_" . $row["name"] . "\" value=\"LOGIN\"/>\n";
							echo "            </td>\n";
							echo "        </tr>\n";
							echo "    </table>\n";
							echo "</form>\n";
						}
						echo "<p><b>CONTACT PERSON: </b>" . $row["contact"] . "<br/>\n";
						echo "<b>EMAIL: </b><a href=\"mailto:" . $row["email"] . "\">" . $row["email"] . "</a><br/>\n";
					
						if (!is_null($row["phone"]) && (strlen($row["phone"]) > 0))
							echo "<b>PHONE: </b>" . $row["phone"] . "<br/>\n";

						$strFrequency = "NOT SET";
						if (($row["dow1"] !== NULL) && ($row["dow1"] !== 0))
						{
							$strFrequency = DoGetDayName($row["dow1"]);
							if (($row["dow2"] !== NULL) && ($row["dow2"] !== 0))
							{
								$strFrequency .= " and " . DoGetDayName($row["dow2"]);
							}
						}
						if (($row["wom"] === NULL) || ($row["wom"] == 0))
						{
							$strFrequency = "Weekly on " . $strFrequency;
						}
						else
						{
							switch ($row["wom"])
							{
								case 1: $strFrequency .= "First " . $strFrequency . " of the month"; break;
								case 2: $strFrequency .= "Second " . $strFrequency . " of the month"; break;
								case 3: $strFrequency .= "Third " . $strFrequency . " of the month"; break;
								case 4: $strFrequency .= "Fourth " . $strFrequency . " of the month"; break;
							}
						}
						echo "<b>WHEN: </b>" . $strFrequency . "<br/>\n";
						
						$strTime = "NOT SET";
						if ($row["time1"] !== NULL)
						{
							$time = new DateTime($row["time1"]);
							$strTime = $time->format("H:i");
							if ($row["time2"] !== NULL)
							{
								$time = new DateTime($row["time2"]);
								$strTime .= " and " . $time->format("H:i");
							}
						}
						echo "<b>TIME(S): </b>" . $strTime . "<br/>\n";
						
						$strHours = "NOT SET";
						if (($row["duration"] !== NULL) && ($row["duration"] != 0))
							$strHours = (string)$row["duration"] . " hours";
						echo "<b>DURATION(s): </b>" . $strHours . "<br/>\n";
						
						$strCost = "FREE";
						if (($row["cost"] !== NULL) && ($row["cost"] != 0))
						{
							$strCost = "$" . number_format($row["cost"], 2);
							if ($row["donation"] > 0)
								$strCost .= "(donation)";
						}
						echo "<b>COST: </b>" . $strCost . "<br/>\n";
						
						if (($row["facebook"] != NULL) && (strlen($row["facebook"]) > 0))
							echo "<b>SOCIAL MEDIA: </b><a href=\"" . $row["facebook"] . "\">" . $row["facebook"] . "</a><br/>\n";
						
						echo "<b><u>PURPOSE</u></b><br/>\n";
						echo "<p>" . $row["purpose"] . "</p>\n";

						echo DoGetEvents($row["name"]);
						echo "</div>\n";
					}
				}
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
	
	function DoGetEventOptions($strGroupName)
	{
		global $g_dbMillhouse;
		$strEventOptionsHTML = "";
		$nGroupShortkey = DoGetGroupShortkey($strGroupName);
		
		if ($result = DoFindQuery1($g_dbMillhouse, "millhouse_db.events", "group_shortkey", $nGroupShortkey))
		{
			if ($result->num_rows > 0)
			{
				$nCount = 0;
				while ($row = $result->fetch_assoc())
				{
					$timestamp = strtotime($row["date"]);
					if ((isset($_POST["event_list"]) && ($_POST["event_list"] == $row["shortkey"])) || ($nCount == 0))
						$strEventOptionsHTML .= "<option selected ";
					else
						$strEventOptionsHTML .= "<option ";
					$strEventOptionsHTML .= "value=\"" . $row["shortkey"] . "\">" . date("l, F j, Y", $timestamp) . "</option>\n";
					$nCount++;
				}
			}
			else
			{
				$strEventOptionsHTML .= "<option value=\"\" selected disabled>No events available to edit...</option>\n";
			}
		}
		return $strEventOptionsHTML;
	}
		
	//******************************************************************************
	//******************************************************************************
	//** 
	//** LOGIN FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoEventLogin($strGroupName)
	{
		global $g_dbMillhouse;
		$bResult = false;

		if ($result = DoFindQuery2($g_dbMillhouse, "millhouse_db.groups", "name", $strGroupName, "password", $_POST["password_event_" . $strGroupName]))
		{
			if (($result->num_rows > 0) && ($row = $result->fetch_assoc()))
			{
				$_SESSION["group_name"] = $strGroupName;
				$_SESSION["group_password"] = "";
				$_SESSION["group_password"] = $row["password"];
				$bResult = true;
			}
		}
		return $bResult;
	}
		
	//******************************************************************************
	//******************************************************************************
	//** 
	//** POST DATA PROCESSING
	//** 
	//******************************************************************************
	//******************************************************************************							
	$g_bLoginError = false;
	
	if (isset($_POST["reset_session"]))
	{
		ResetSessionVars();
	}
	else if (isset($_POST["forgot_password"]))
	{
		foreach ($_POST as $strKey => $strValue)
		{
			if (strpos($strKey, "shortkey") !== false)
			{
				$strEmail = DoGetGroupEmailFromEventShortkey($_POST[$strKey]);
				$bResult = mail($strEmail, "", "From: Millhouse Website");	
		
				if ($bResult == FALSE)
				{
					$ErrorInfo = error_get_last();
					if ($ErrorInfo)
					{
						echo "<script type=\"text/javascript\">alert(\"An error occurred while sending the password (" . $ErrorInfo["message"] . ").\");</script>\n";
					}
				}
				else
				{
					echo "<script type=\"text/javascript\">alert(\"The password was sent to " . $strEmail . "\");</script>\n";
				}
				break;
			}
		}
	}
	else if (isset($_POST["text_current_div"]))
	{
		$_SESSION["current_div"] = $_POST["text_current_div"];
	}
	else
	{
		foreach ($_POST as $strKey => $strValue)
		{
			if (strpos($strKey, "login_event") !== false)
			{
				if (!DoEventLogin($_POST["group_name"]))
					$g_bLoginError = true;
				break;
			}
			else if (strpos($strKey, "upload_event") !== false)
			{
				DoProcessEventForm($_POST["group_name"]);
				break;
			}
			else if (strpos($strKey, "load_event") !== false)
			{
				DoProcessEventForm($_POST["group_name"]);
				break;
			}
			else if (strpos($strKey, "logout_event") !== false)
			{
				$_SESSION["group_password"] = "";
				break;
			}
		}
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
		<title>Groups</title>
		<style type="text/css">
</style>

<script type="text/javascript">

	if (sessionStorage.getItem("current_group_div") === null)
		sessionStorage.setItem("current_group_div", "");
		
	function OnClickTogglePassword(strTogglePasswordID, strPasswordID)
	{
		var checkboxTogglePassword = document.getElementById(strTogglePasswordID),
			textPassword = document.getElementById(strPasswordID);

		if (checkboxTogglePassword && textPassword)
		{
			if (checkboxTogglePassword.checked)
				textPassword.type = "text";
			else
				textPassword.type = "password";
		}
	}
			
	function OnClickResetEventForm(strGroupName)
	{
		var dateEvent = document.getElementById("date_" + strGroupName),
			textDescription = document.getElementById("description_" + strGroupName),
			filePhoto = document.getElementById("photo_" + strGroupName);
		
		if (textDescription && filePhoto && dateEvent)
		{
			dateEvent .value = "";
			textDescription .value = "";
			filePhoto .value = "";
		}
	}
	
	function DoValidateEvent(strGroupName)
	{
		var dateEvent = document.getElementById("date_" + strGroupName),
			textDescription = document.getElementById("description_" + strGroupName),
			filePhoto = document.getElementById("photo_" + strGroupName);
		
		if (dateEvent && textDescription && filePhoto)
		{
			if (dateEvent.reportValidity() && 
				textDescription.reportValidity() && 
				filePhoto.reportValidity())
				document.submit();
		}
	}
	
	function OnClickLoadEvent(strGroupName)
	{
		let EventList = document.getElementById("event_list_" + strGroupName);
		
		if (EventList)
		{
			if (EventList.length > 1)
			{
				if (EventList.selectedIndex > -1)
				{
					document.getElementById("delete_event").disabled = false;
					document.getElementById("load_event").type = "submit";
					document.getElementById("details_form_event").submit();
				}
				else
				{
					AlertError("You have not selected an event to load!");
				}
			}
			else
			{
				alert("There are no events in the list to load!");
			}
		}
	}
	
	function OnClickDeleteEvent()
	{
		if (confirm("Are you ABSOLUTELY sure you want to delete this event? It will be unrecoverable!"))
		{
			document.getElementById("delete_event").type = "submit";
			document.getElementById("details_form_event").submit();
		}
		else
		{
			alert("Event was not deleted!");
		}
	}
	
	function DoClickEventHyperlink(strIDNewEventDiv)
	{
		let strCurrentGroupDivID = sessionStorage.getItem("current_group_div");
		
		if ((strCurrentGroupDivID !== null) && (strCurrentGroupDivID != ""))
			document.getElementById(strCurrentGroupDivID).style.display = "none";
		document.getElementById(strIDNewEventDiv).style.display = "block";
		sessionStorage.setItem("current_group_div", strIDNewEventDiv);
	}

	function OnChangeCheckFileSize(nFileSize)
	{
		if (nFileSize > 500000)
			alert("The size (in bytes) of the photo image file must be less than 500,000 KBytes");
	}
	
	function DoClickResetSessionVars()
	{
		sessionStorage.setItem("current_group_div", "");
	}

	function DoOnPageLoadComplete()
	{
		<?php
			if ($g_bLoginError)
				DoPrintJSAlertPasswordError($_POST["password_event_" . $_POST["group_name"]], false);
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
			<a href="../admin/administration.php" onclick="<?php if (IsLoggedIn()) echo "DoClickNavLinkWithSubmenu('admin')"; ?>">Administration</a>
			<ul style="display:<?php if (isLoggedIn()) echo DoShowHideSubmenu("admin"); else echo "none"; ?>;" id="admin">
				<li class="submenu_item"><a href="../admin/edit_groups.php"><b>Add &amp; Edit Groups</b></a></li>
				<li class="submenu_item">
				<a href="../admin/approve_sponsorship.php"><b>Approve a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="../admin/renew_sponsorship.php"><b>Renew a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="../admin/friday_feast_menu.php"><b>Update Friday feast menu</b></a></li>
				<li class="submenu_item"><a href="../admin/governance.php"><b>Upload governance documents</b></a></li>
				<li class="submenu_item">
				<a href="../governance/forms/forms.php"><b>Blank Forms</b></a></li>
				<li class="submenu_item"><a href="../admin/web_diagnostics.php"><b>Website diagnostics</b></a></li>
				<li class="submenu_item">
				<a href="../admin/html_4_beginners.php"><b>HTML 4 Beginners</b></a></li>
				<li class="submenu_item"><a href="../admin/css_4_beginners.php"><b>CSS 4 Beginners</b></a></li>
				<li class="submenu_item">
				<a href="../admin/javascript_4_beginners.php"><b>JavaScript 4 Beginners</b></a></li>
				<li class="submenu_item">
				<a href="../admin/expression_web_4_beginners.php"><b>Expression Web 4 Beginners</b></a></li>
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
	**** This PHP code generates the group submenu link in the navigation menu. Please leave it alone.
	****
	****
	****************************************************************************************************************
	****************************************************************************************************************
	****************************************************************************************************************
	****************************************************************************************************************
*/
	echo DoGenerateGroupHyperlinks(); 
												
?>


<p>On their specific group pages, group leaders can login and add new events or edit existing events. 
They can set a date for a future or previous event, and edit a description for the event. An event 
description is a requirement. Uploading a single photo of the event is optional, and photos must be 
no larger than 500kB in size. They can replace the photo for an existing event, when they edit it, 
if they wish. Any changes will be immediately visible.</p>

<p>Vistors can keep track of all the ongoing events of the various groups from here. Just click 
on the group links on the navigation submenu to the left. The group leaders' names and contact 
details are displayed for each group.</p>

<form method="post" target="_self">
	<input type="submit" name="reset_session" value="DEBUG - reset $_SESSION" onclick="DoClickResetSessionVars()" />
</form><br/><br/>

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
	DoDisplayGroupDivs($_SESSION["current_div"]);
	
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

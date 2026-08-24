<?php

	require_once "../captcha/captcha.php";
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** DATABASE SECURITY
	//** 
	//******************************************************************************
	//******************************************************************************
			
	function DoCheckValidSessionPassword()
	{
		$bResult = false;
		global $g_dbMillhouse;
		
		if (!DoFindQuery1($g_dbMillhouse, "groups", "name", "admin", "password", $_SESSION["admin_password"]))
			DoFlagMessage("SESSION stored admin password ('" . $_SESSION["admin_password"] . "') does not match the admin password!", true);
		else
			$bResult = true;
			
		return $bResult;
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** LOGIN FORM FUNCTIONS
	//**
	//******************************************************************************
	//******************************************************************************
	
	function DoDisplayChangeAdminPasswordForm()
	{
		echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"login_form_group\">\n";
		echo "    <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:center;\" colspan=\"2\"><h1>CHANGE PASSWORD</h1><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\" style=\"text-align:center;\">\n";
		echo "                	<button type=\"button\" onclick=\"DoDisplayHidePopup('div_login_form_instructions', true)\">INSTRUCTIONS</button><br/><br/>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:center;\" colspan=\"2\"><label for=\"\">You must type your new password twice, and they must match before to can submit the change...</label><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;vertical-align:top;padding-top:3px;\"><label for=\"password_login\">Password: </label></td>\n";
		echo "            <td>\n";
		echo "                <input name=\"password_login\" id=\"password_login\" type=\"password\" required autocomplete=\"on\" onkeydown=\"OnKeyPressPassword(event)\" placeholder=\"The new admin password...\" />\n";
		echo "                <br/>\n";
		echo "                <input type=\"checkbox\" id=\"toggle_password_login\" onclick=\"OnClickTogglePassword('toggle_password_login', 'password_login')\" />\n";
		echo "                <label for=\"toggle_password_login\">Show password</label>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;vertical-align:top;padding-top:3px;\"><label for=\"password_login_again\">Repeat password: </label></td>\n";
		echo "            <td>\n";
		echo "                <input id=\"password_login_again\" type=\"password\" required autocomplete=\"on\" onkeydown=\"OnKeyPressPassword(event)\" placeholder=\"Repeat the new admin password...\" onchange=\"DoCheckPasswordsMatch('password_login', 'password_login_again')\" />\n";
		echo "                <br/>\n";
		echo "                <input type=\"checkbox\" id=\"toggle_password_login_again\" onclick=\"OnClickTogglePassword('toggle_password_login_again', 'password_login_again')\" />\n";
		echo "                <label for=\"toggle_password_login_again\">Show password</label>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "                <input type=\"hidden\" name=\"username\" id=\"username\" value=\"admin\" />\n";
		echo "                <input type=\"submit\" name=\"button_change_password\" id=\"button_change_password\" disabled value=\"CHANGE PASSWORD\"/>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "    </table>\n";
		echo "</form>\n";				
	}
	
	function DoDisplayLoginForm()
	{
		global $g_strPatternPassword;
	
		echo "<form class=\"form\" target=\"_self\" method=\"post\" id=\"login_form_group\">\n";
		echo "    <table cellpadding=\"0\" cellspacing=\"5\" border=\"0\">\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:center;\" colspan=\"2\"><h1>LOGIN</h1></label><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td  style=\"text-align:center;\" colspan=\"2\">\n";
		echo "                	<button type=\"button\" onclick=\"DoDisplayHidePopup('div_login_form_instructions', true)\">INSTRUCTIONS</button><br/><br/>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;vertical-align:top;padding-top:3px;\"><label for=\"select_username\">Username: </label></td>\n";
		echo "            <td>\n";
		echo "                <select name=\"select_username\" id=\"select_username\" required autocomplete=\"on\" />\n";
		echo DoGetUsernameSelectOptions(true);
		echo "                </select>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;vertical-align:top;padding-top:3px;\"><label for=\"password_login\">Password: </label></td>\n";
		echo "            <td>\n";
		echo "                <input name=\"password_login\" id=\"password_login\" type=\"password\" required autocomplete=\"on\" onkeydown=\"OnKeyPressPassword(event)\" placeholder=\"The admin password...\" />\n";
		echo "                <br/>\n";
		echo "                <input type=\"checkbox\" id=\"toggle_password_login\" onclick=\"OnClickTogglePassword('toggle_password_login', 'password_login')\" />\n";
		echo "                <label for=\"toggle_password_login\">Show password</label>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td>\n";
		echo "                " . DoGenerateCaptcha(6) . "\n";
		echo "            </td>\n";
		echo "            <td>\n";
		echo "                <input type=\"text\" id=\"text_captcha\" name=\"text_captcha\" placeholder=\"Type the characters to the left...\" style=\"width:260px;\" \>\n";
		echo "                <input type=button value=\"New Captcha Text\" onclick=\"location.reload()\" style=\"position:relative;top:-2px;height:25px;font-size:x-small;padding: 0px 10px 0px 10px;\" \>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "                <input type=\"hidden\" name=\"username\" id=\"username\" value=\"admin\" />\n";
		echo "                <input type=\"submit\" name=\"button_admin_login\" id=\"button_admin_login\" value=\"LOGIN\"/>&nbsp;\n";
		echo "                <input type=\"submit\" name=\"forgot_password_group\" id=\"forgot_password_group\" value=\"I FORGET THE PASSWORD\" />\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "    </table>\n";
		echo "</form>\n";				
	}
	
	function DoDisplayLogoutForm()
	{
		echo "<p>&nbsp;</p>\n\n";
		echo "<form method=\"post\" target=\"_self\">\n";
		echo "	<input type=\"submit\" name=\"button_logout\" value=\"LOGOUT\" />\n";
		echo "</form>\n";
		echo "<p>&nbsp;</p>\n\n";
	}
	
	function DoDisplayLoginFormInstrunctions()
	{
		echo "<div id=\"div_login_form_instructions\" class=\"instruction_popup\">\n";
		echo "	<h1>INSTRUCTIONS FOR LOGIN FORM</h1>\n";
		echo "	<p><button type=\"button\" onclick=\"DoDisplayHidePopup('div_login_form_instructions', false)\">CLOSE</button></p>\n";
		echo "	<h2>LOGGING IN</h2>\n";
		echo "	<h3>STEP 1</h3>\n";
		echo "	<p>Select the username from the combo box.</p>\n";
		echo "	<h3>STEP 2</h3>\n";
		echo "	<p>Type your password in the password input. You can check the password you typed by clicking the 'Show Password'\n";
		echo "	check box.</p>\n";
		echo "	<h3>STEP 3</h3>\n";
		echo "	<p>Type the 'captcha' text in the text input. Thhis is necessary to thwart web bots.</p>\n";	
		echo "	<h3>STEP 4</h3>\n";	
		echo "	<p>Click the 'LOGIN' button. If you are successful the login form will be replaced with the logout form.</p>\n";	
		echo "	<p><button type=\"button\" onclick=\"DoDisplayHidePopup('div_login_form_instructions', false)\">CLOSE</button></p>\n";	
		echo "	<h2>FORGOTTEN PASSWORD</h2>\n";	
		echo "	<p>If the forget the admin password then clicking the 'I FOREGET THE PASSWORD' will result in the password being\n"; 
		echo "	emailed to manager@millhouse.org.au</p>\n";		
		echo "	<h2>cPANEL</h2>\n";	
		echo "	<p>Alternative you can login to cPanel of the web hosting account.</p>\n";	
		echo "	<h3>STEP 1</h3>\n";
		echo "	<p>\n";
		echo "		Scroll down until you locate the icon phpMyAdmin and click it.<br/><br/>\n";
		echo "		<a href=\"images/cPanel.jpg\"><img src=\"images/cPanel.jpg\" alt=\"cPanel.jpg\" height=\"200\" /></a>\n";
		echo "	</p>\n";
		echo "	<h3>STEP 2</h3>\n";
		echo "	<p>\n";
		echo "		This will open database window.<br/><br/>\n";
		echo "		<a href=\"images/phpMyAdmin.jpg\"><img src=\"images/phpMyAdmin.jpg\" alt=\"phpMyAdmin.jpg\" height=\"200\" /></a><br/><br/>\n";
		echo "	    Notice in the left hand pane 'millhos_db'. Click it.\n";
		echo "	</p>\n";	
		echo "	<h3>STEP 3</h3>\n";	
		echo "	<p>\n";
		echo "		This will reveal the database tables. Notice the one called 'groups'. Click it.<br/><br/>\n";
		echo "		<a href=\"images/phpMyAdminTables.jpg\"><img src=\"images/phpMyAdminTables.jpg\" alt=\"phpMyAdminTables.jpg\" height=\"200\" /></a><br/><br/>\n";
		echo "	</p>\n";		
		echo "	<h3>STEP 4</h3>\n";		
		echo "	<p>In the right hand pane you can see the rows of data in the 'groups' table. The first group in this table is the\n"; 
		echo "	administrator groups. Note the string value in the 'name' of 'admin', and value in the 'description',\n"; 
		echo "	'Administrators'. Then look at the value in the 'password' column. That is the current admin paswword.</p>\n";		
		echo "	<a href=\"images/phpMyAdminGroupsTable.jpg\"><img src=\"images/phpMyAdminGroupsTable.jpg\" alt=\"phpMyAdminGroupsTable.jpg\" height=\"200\" /></a><br/><br/>\n";
		echo "	<p><button type=\"button\" onclick=\"DoDisplayHidePopup('div_login_form_instructions', false)\">CLOSE</button></p>\n";	
		echo "</div>\n";
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** POST & GET DATA PROCESSING
	//** 
	//******************************************************************************
	//******************************************************************************							
	
	function DoLogin()
	{
		global $g_dbMillhouse;
		$bResult = false;
		
		if ($result = DoFindQuery2($g_dbMillhouse, "groups", "name", $_POST["select_username"], "password", $_POST["password_login"]))
		{
			if ($result->num_rows > 0)
			{
				if ($row = $result->fetch_assoc())
				{
					$_SESSION["username"] = $row["name"];
					$bResult = true;
				}
			}
		}
		return $bResult;
	}		

	//******************************************************************************
	//******************************************************************************
	//** 
	//** POST & GET DATA PROCESSING
	//** 
	//******************************************************************************
	//******************************************************************************							
		
	if (isset($_POST["button_admin_login"]))
	{
		if ($_POST["text_captcha"] != $_SESSION["strRandomCaptchaText"])
		{
			DoFlagMessage("Captcha text does not match...", true);
		}
		else if (!DoLogin())
		{
			DoFlagMessage("Password is incorrect...", true);
		}
	}
	else if (isset($_POST["button_change_password"]))
	{
		$result = DoUpdateQuery1($g_dbMillhouse, "groups", "password", $_POST["password_login"], "name", $_SESSION["username"]);
		if ($result)
		{
			DoFlagMessage("Your password has been change successfully...", true);
		}
		else
		{
			DoFlagMessage("Your password could not be changed...", true);
		}
	}
	else if (isset($_POST["logout_group"]))
	{
		unset($_SESSION["admin_password"]);
	}
	else if (isset($_POST["forgot_password_group"]))
	{
		$bResult = mail($g_strEmailManager . "," . $g_strEmailPresident, "", "From: Millhouse Website");	
		
		if ($bResult == FALSE)
		{
			$ErrorInfo = error_get_last();
			if ($ErrorInfo)
			{
				DoFlagMessage("An error occurred while sending the password (" . $ErrorInfo["message"] . ").", true);
			}
		}
		else
		{
			DoFlagMessage("The password was sent to " . $g_strEmailManager . " and " . $g_strEmailPresident . "...");
		}
	}
	else if (isset($_POST["button_logout"]))
	{
		unset($_SESSION["username"]);
	}

?>

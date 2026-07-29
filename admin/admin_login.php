<?php

	require_once "../Captcha/Captcha.php";
	
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
		
		if (!DoFindQuery1($g_dbMillhouse, "millhouse_db.groups", "name", "admin", "password", $_SESSION["admin_password"]))
			DoPrintJSAlertError("SESSION stored admin password ('" . $_SESSION["admin_password"] . "') does not match the admin password!");
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
		echo "            <td style=\"text-align:center;\" colspan=\"2\"><h3>Change administration password</h3><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:center;\" colspan=\"2\"><label for=\"\">You must type your new password twice, and they must match before to can submit the change...</label><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;vertical-align:top;padding-top:3px;\"><label for=\"password_admin_login\">Password: </label></td>\n";
		echo "            <td>\n";
		echo "                <input name=\"password_admin_login\" id=\"password_admin_login\" type=\"password\" required autocomplete=\"on\" onkeydown=\"OnKeyPressPassword(event)\" placeholder=\"The new admin password...\" />\n";
		echo "                <br/>\n";
		echo "                <input type=\"checkbox\" id=\"toggle_password_admin_login\" onclick=\"OnClickTogglePassword('toggle_password_admin_login', 'password_admin_login')\" />\n";
		echo "                <label for=\"toggle_password_admin_login\">Show password</label>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;vertical-align:top;padding-top:3px;\"><label for=\"password_admin_login_again\">Repeat password: </label></td>\n";
		echo "            <td>\n";
		echo "                <input id=\"password_admin_login_again\" type=\"password\" required autocomplete=\"on\" onkeydown=\"OnKeyPressPassword(event)\" placeholder=\"Repeat the new admin password...\" onchange=\"DoCheckPasswordsMatch('password_admin_login', 'password_admin_login_again')\" />\n";
		echo "                <br/>\n";
		echo "                <input type=\"checkbox\" id=\"toggle_password_admin_login_again\" onclick=\"OnClickTogglePassword('toggle_password_admin_login_again', 'password_admin_login_again')\" />\n";
		echo "                <label for=\"toggle_password_admin_login_again\">Show password</label>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td colspan=\"2\" style=\"text-align:right;\">\n";
		echo "                <input type=\"hidden\" name=\"username\" id=\"username\" value=\"admin\" />\n";
		echo "                <input type=\"submit\" name=\"button_admin_change_password\" id=\"button_admin_change_password\" disabled value=\"CHANGE PASSWORD\"/>\n";
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
		echo "            <td style=\"text-align:center;\" colspan=\"2\"><h3>Adminstration login</label><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:right;vertical-align:top;padding-top:3px;\"><label for=\"password_admin_login\">Password: </label></td>\n";
		echo "            <td>\n";
		echo "                <input name=\"password_admin_login\" id=\"password_admin_login\" type=\"password\" required autocomplete=\"on\" onkeydown=\"OnKeyPressPassword(event)\" placeholder=\"The admin password...\" />\n";
		echo "                <br/>\n";
		echo "                <input type=\"checkbox\" id=\"toggle_password_admin_login\" onclick=\"OnClickTogglePassword('toggle_password_admin_login', 'password_admin_login')\" />\n";
		echo "                <label for=\"toggle_password_admin_login\">Show password</label>\n";
		echo "            </td>\n";
		echo "        </tr>\n";
		echo "        <tr>\n";
		echo "            <td>\n";
		echo "                " . DoGenerateCaptcha() . "\n";
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
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** POST & GET DATA PROCESSING
	//** 
	//******************************************************************************
	//******************************************************************************							
	
	function DoAdminLogin()
	{
		global $g_dbMillhouse;
		$bResult = false;
		
		if ($result = DoFindQuery2($g_dbMillhouse, "millhouse_db.groups", "name", $_POST["username"], "password", $_POST["password_admin_login"]))
		{
			if ($result->num_rows > 0)
			{
				$_SESSION["admin_password"] = $_POST["password_admin_login"];
				$bResult = true;
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
			PrintJavascriptLine("alert('Captcha text does not match...')", 1, true);
		}
		else if (!DoAdminLogin())
		{
			PrintJavascriptLine("alert('Password is incorrect...')", 1, true);
		}
	}
	else if (isset($_POST["button_admin_change_password"]))
	{
		$result = DoUpdateQuery1($g_dbMillhouse, "groups", "password", $_POST["password_admin_login"], "username", $_POST["username"]);
		if ($result)
		{
			PrintJavascriptLine("alert('The admin password has been change successfully...');", 1, true);
		}
		else
		{
			PrintJavascriptLine("alert('The admin password could not be changed...');", 1, true);
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
				echo "<script type=\"text/javascript\">alert(\"An error occurred while sending the password (" . $ErrorInfo["message"] . ").\");</script>\n";
			}
		}
		else
		{
			echo "<script type=\"text/javascript\">alert(\"The password was sent to " . $g_strEmailManager . " and " . $g_strEmailPresident . "\");</script>\n";
		}
	}
	else if (isset($_POST["button_logout"]))
	{
		unset($_SESSION["admin_password"]);
	}

?>

<?php

	require_once "../common.php";
	
	if (isset($_POST["submit_send_request"]))
	{
    	$strHeaders .= "From: " . $_POST["text_contact_name"] . "<" . $_POST["text_email"] . ">\r\n";
    	$strHeaders .= "Reply-To: " . $_POST["text_contact_name"] . "<" . $_POST["text_email"] . ">\r\n";	

		// Message section
		$strBody = "<p><b>BUSINESS_NAME: </b>" . $_POST["text_business_name"] . "</p>";
		$strBody .= "<p><b>CONTACT NAME: </b>" . $_POST["text_contact_name"]. "</p>";
		$strBody .= "<p><b>EMAIL: </b>" . $_POST["text_email"] . "</p>";
		$strBody .= "<p><b>PHONE: </b>" . $_POST["text_phone"] . "</p>";
		$strBody .= "<p><b>WEBSITE URL: </b>" . $_POST["text_url"] . "</p>";
		$strBody .= "<p><b>LOGO URL: </b><a href=\"" . $_POST["text_url_logo"] . "\">" . $_POST["text_url_logo"] . "</a></p>";

		if (mail($g_strEmailManager, "Sponsorship request from mobile app...", $strBody, $strHeaders))
		{
			echo "OK";
		}
		else
		{
			$error = error_get_last();
			if (isset($error["message"]))
			{
        		echo "ERROR: " . htmlspecialchars($error["message"]);
        	}
        }
	}
	
?>

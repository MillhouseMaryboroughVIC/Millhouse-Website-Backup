<?php

	require_once "../common.php";
	
	function DoGetRoomOptions()
	{
		$strRoomOptions = "";
		global $g_arrayHireRoom;
		
		for ($nI = 0, $nLength = count($g_arrayHireRoom), $nLastI = $nLength - 1; $nI < $nLength; $nI++)
		{
			$strRoomOptions .= $g_arrayHireRoom[$nI]["strName"];
			if ($nI < $nLastI)
				$strRoomOptions .= ",";
		}
		return "rooms=" . $strRoomOptions;
	}
	
	function DoGetRoomDetails()
	{
		global $g_dbMillhouse;
		
		if (isset($_GET["submit_get_room"]))
		{
			$results = DoFindAllQuery($g_dbMillhouse, "rooms");
			if ($results && ($results->num_rows > 0))
			{
				while ($row = $results->fetch_assoc())
				{
				}
			}
		}
	}
	
	if (isset($_POST["submit_get_room_options"]))
	{
		echo DoGetRoomOptions();
	}
	else if (isset($_POST["submit_send_request"]))
	{
		if (($_POST["text_start_day"] == $_POST["text_end_day"]) && ($_POST["text_start_month"] == $_POST["text_end_month"]) &&
			($_POST["text_start_year"] == $_POST["text_end_year"]))
		{
			$strDates = $_POST["text_start_day"] . "/" . $_POST["text_start_month"] . "/" . $_POST["text_start_year"];
		}
		else
		{
			$strDates = $_POST["text_start_day"] . "/" . $_POST["text_start_month"] . "/" . $_POST["text_start_year"];
			$strDates .= " to ";
			$strDates = $_POST["text_end_day"] . "/" . $_POST["text_end_month"] . "/" . $_POST["text_end_year"];
		}
		$strTimes = $_POST["text_start_hour"] . ":" . $_POST["text_start_minute"];
		$strTimes .= " to ";
		$strTimes .= $_POST["text_end_hour"] . ":" . $_POST["text_end_minute"];
	
		$strHeaders = "From: " . $_POST["text_given_names"] . " " . $_POST["text_surname"] . "<" . $_POST["text_email"] . ">\r\nReply-To: " . $_POST["text_given_names"] . " " . $_POST["text_surname"] . "<" . $_POST["text_email"] . ">\r\n";
		
		$strMessage = "<p><b>NAME: </b>" . $_POST["text_given_names"] . " " . $_POST["text_surname"] . "</p>";
		$strMessage .= "<p><b>EMAIL: </b>" . $_POST["text_email"] . "</p>";
		$strMessage .= "<p><b>PHONE: </b>" . $_POST["text_phone"] . "</p>";
		$strMessage .= "<p><b>DATES: </b>" .$strDates . "</p>";
		$strMessage .= "<p><b>TIME: </b>" . $strTimes . "</p>";
		
		if (mail($g_strEmailManager, "Room hire request from mobile app...", $strMessage, $strHeaders))
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
	else if (isset($_GET["submit_get_room_details"]))
	{
		$nI = (int)$_GET["text_room"];
		$dictionaryRoomDetails = $g_arrayHireRoom[$nI];
		echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
		echo "<html dir=\"ltr\" xmlns=\"http://www.w3.org/1999/xhtml\">\n";
		echo "     <head>\n";
		echo "         <title>Room Details</title>\n";
		echo "         <style type=\"text/css\">\n";
		echo "             img\n";
		echo "             {\n";
		echo "                 height: 100px;\n";
		echo "             }\n";
		echo "         </style>\n";
		echo "     </head>\n";
		echo "    <body>\n";
/*
	["strName" => "Board Room", 
		"strImageFilename1" => "boardroom.jpg", 
		"strImageFilename2" => "boardroom_cupboards.jpg", 
		"strImageFilename3" => "", 
		"strImageFilename4" => "",
		"nCostPerHour" => 40, "nCostPerDay" => 140, "nCostPerMonth" => 0, 
		"strDescription" => "A professional and flexible space suitable for meetings, staff training, workshops, presentations, planning sessions and group discussions.", 
		"strCapacity" => "20 - 24"],
*/
		echo "<p><b>COST PER HOUR: </b>" . $dictionaryRoomDetails["nCostPerHour"] . "</p>\n";
		echo "<p><b>COST PER DAY: </b>" . $dictionaryRoomDetails["nCostPerDay"] . "</p>\n";
		echo "<p><b>COST PER MONTH: </b>" . $dictionaryRoomDetails["nCostPerMonth"] . "</p>\n";
		echo "<p><b>CAPACITY: </b>" . $dictionaryRoomDetails["strCapacity"] . "</p>\n";
		echo "<p><b>DESCRIPTION:</b></p>\n";
		echo "<p>" . $dictionaryRoomDetails["strDescription"] . "</p>\n";
				
		if ($dictionaryRoomDetails["strImageFilename1"] != "")
			echo "<a href=\"../room/images/" . $dictionaryRoomDetails["strImageFilename1"] . "\"><img src=\"../room/images/" . $dictionaryRoomDetails["strImageFilename1"] . "\" alt=\"" . $dictionaryRoomDetails["strImageFilename1"] . "\" /></a>\n";
			
		if ($dictionaryRoomDetails["strImageFilename2"] != "")
			echo "&nbsp;<a href=\"../room/images/" . $dictionaryRoomDetails["strImageFilename2"] . "\"><img src=\"../room/images/" . $dictionaryRoomDetails["strImageFilename2"] . "\" alt=\"" . $dictionaryRoomDetails["strImageFilename2"] . "\" /></a>\n";
			
		if ($dictionaryRoomDetails["strImageFilename1"] != "")
			echo "&nbsp;<a href=\"../room/images/" . $dictionaryRoomDetails["strImageFilename3"] . "\"><img src=\"../room/images/" . $dictionaryRoomDetails["strImageFilename3"] . "\" alt=\"" . $dictionaryRoomDetails["strImageFilename3"] . "\" /></a>\n";
			
		if ($dictionaryRoomDetails["strImageFilename1"] != "")
			echo "&nbsp;<a href=\"../room/images/" . $dictionaryRoomDetails["strImageFilename4"] . "\"><img src=\"../room/images/" . $dictionaryRoomDetails["strImageFilename4"] . "\" alt=\"" . $dictionaryRoomDetails["strImageFilename4"] . "\" /></a>\n";
			
		echo "    </body>\n";
		echo "</html>\n";
	
	}
	else
	{
		echo "ERROR";
	}

?>

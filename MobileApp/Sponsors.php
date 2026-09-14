<?php

	require_once "../common.php";
	
	$g_dbMillhouse->set_charset("utf8mb4");
	
	if (isset($_GET["submit_save_group"]) || isset($_GET["submit_get_groups"]))
	{
		$_POST = $_GET;
	}
	if (isset($_POST["submit_get_sponsor_types"]))
	{
		$results = DoFindAllQuery($g_dbMillhouse, "sponsor_types");
		if ($results && ($results->num_rows > 0))
		{
			$arrayTypes = [];
			while ($row = $results->fetch_assoc())
			{
				$arrayTypes[] = [
									"strType" => $row["type"],
									"strDescription" => $row["description"]
								 ];
			}
			$result = json_encode($arrayTypes);
			if (!$result)
			{
				echo "Function json_encode(...) has failed.";
			}
			else
			{
				echo "OKYPES=" . $result;
			}
		}
	}
	else if (isset($_POST["submit_get_sponsors"]))
	{
		$results = DoFindAllQuery($g_dbMillhouse, "sponsors");
		if ($results && ($results->num_rows > 0))
		{
			$arraySponsors = [];
			while ($row = $results->fetch_assoc())
			{
				$arraySponsors[] = [
									"strBusinessName" => $row["business_name"],
									"nShortkey" => $row["shortkey"]
								 ];
			}
			$result = json_encode($arraySponsors);
			if (!$result)
			{
				echo "Function json_encode(...) has failed.";
			}
			else
			{
				echo "OKSPONSORS=" . $result;
			}
		}
	}
	/*
	else if (isset($_POST["submit_get_group"]))
	{
		$results = DoFindQuery1($g_dbMillhouse, "groups", "shortkey", $_POST["number_shortkey"]);
		if ($results && ($results->num_rows > 0))
		{
			if ($row = $results->fetch_assoc())
			{
				$nTime1Hour = 0;
				$nTime1Minute = 0;
				$nTime2Hour = 0;
				$nTime2Minute = 0;

				if ($row["time1"] != NULL)
				{
					$datetime = new DateTime($row["time1"]);
					$nTime1Hour = (int)$datetime->format("H");
					$nTime1Minute = (int)$datetime->format("i");
				}
				if ($row["time2"] != NULL)
				{
					$datetime = new DateTime($row["time2"]);
					$nTime2Hour = (int)$datetime->format("H");
					$nTime2Minute = (int)$datetime1->format("i");
				}
				$structGroupDetails = [
										"nShortkey" => $row["shortkey"],
										"strID" => $row["name"],
										"strName" => $row["description"],
										"strPurpose" => $row["purpose"],
										"strFacebook" => $row["facebook"],
										"strContact" => $row["contact"],
										"strEmailAddress" => $row["email"],
										"strPhoneNumber" => $row["phone"],
										"nWOM" => $row["wom"],
										"nDOW1" => $row["dow1"],
										"nDOW2" => $row["dow2"],
										"nTime1Hour" => $nTime1Hour,
										"nTime1Minute" => $nTime1Minute,
										"nTime2Hour" => $nTime2Hour,
										"nTime2Minute" => $nTime2Minute,
										"nDuration" => $row["duration"],
										"nCost" => $row["cost"],
										"bDonation" => ($row["donation"] == "1"),
										"bExcludeXmasNewYear" => ($row["exclude_xmas_new_year"] == "1"),
										"bExcluseSchoolHolidays" => ($row["exclude_school_holidays"] == "1"),
										"bExcludeEaster" => ($row["exclude_easter"] == "1")
									  ];
				echo "OKGROUP_DETAILS=" . json_encode($structGroupDetails);
			}
		}
	}
	else if (isset($_POST["submit_save_group"]))
	{
		$results = FALSE;		
		$nTime1Hour = (int)$_POST["nTime1Hour"];
		$nTime1Minute = (int)$_POST["nTime1Minute"];
		$nTime2Hour = (int)$_POST["nTime2Hour"];
		$nTime2Minute = (int)$_POST["nTime2Minute"];
		$strTime1 = "";
		$strTime2 = "";
		if (($nTime1Hour == 0) && ($nTime1Minute == 0))
		{
			$strTime1 = NULL;
		}
		else
		{
			$time = new DateTime();
			$time->setTime($nTime1Hour, $nTime1Minute);
			$time->setDate(0, 1, 1);
			$strTime1 = $time->format("Y-m-d H:i:s");
		}
		if (($nTime2Hour == 0) && ($nTime2Minute == 0))
		{
			// Do nothing.
		}
		else
		{
			$time = new DateTime();
			$time->setTime($nTime2Hour, $nTime2Minute);
			$time->setDate(0, 1, 1);
			$strTime2 = $time->format("Y-m-d H:i:s");
		}			
		if ((int)$_POST["number_shortkey"] == 0)
		{			
			$results = DoInsertQuery19($g_dbMillhouse, "groups", 
														"name", $_POST["text_id"], 
														"description", $_POST["text_name"],
														"purpose", $_POST["text_purpose"],
														"facebook", $_POST["text_facebook"],
														"password", $_POST["text_password"],
														"contact", $_POST["text_contact"],
														"email", $_POST["text_email_address"],
														"phone", $_POST["text_phone_number"],
														"wom", $_POST["number_wom"],
														"dow1", $_POST["number_dow1"],
														"dow2", $_POST["number_dow2"],
														"time1", $strTime1,
														"time2", $strTime2,
														"duration", $_POST["number_duration"],
														"cost", $_POST["number_cost"],
														"donation", ($_POST["checkbox_donation"] == "true") ? "1" : "0",
														"exclude_xmas_new_year", ($_POST["checkbox_exclude_xmas_new_year"] == "true") ? "1" : "0",
														"exclude_school_holidays", ($_POST["checkbox_exclude_school_holidays"] == "true") ? "1" : "0",
														"exclude_easter", ($_POST["checkbox_exclude_easter"] == "true") ? "1" : "0");	
		}
		else
		{
			$results = DoUpdateQuery18($g_dbMillhouse, "groups",
														"description", $_POST["text_name"],
														"purpose", $_POST["text_purpose"],
														"facebook", $_POST["text_facebook"],
														"password", $_POST["text_password"],
														"contact", $_POST["text_contact"],
														"email", $_POST["text_email_address"],
														"phone", $_POST["text_phone_number"],
														"wom", $_POST["number_wom"],
														"dow1", $_POST["number_dow1"],
														"dow2", $_POST["number_dow2"],
														"time1", $strTime1,
														"time2", $strTime2,
														"duration", $_POST["number_duration"],
														"cost", $_POST["number_cost"],
														"donation", ($_POST["checkbox_donation"] == "true") ? "1" : "0",
														"exclude_xmas_new_year", ($_POST["checkbox_exclude_xmas_new_year"] == "true") ? "1" : "0",
														"exclude_school_holidays", ($_POST["checkbox_exclude_school_holidays"] == "true") ? "1" : "0",
														"exclude_easter", ($_POST["checkbox_exclude_easter"] == "true") ? "1" : "0",
														"shortkey", $_POST["number_shortkey"]);		
		}
		if ($results)
			echo "GROUP_DETAILS_SAVED";
	}
*/













?>
<?php

	require_once "../common.php";
	
	function DoSaveLogoImage($strLogoURL, $strBusinessName, $strOverWriteFileName)
	{
		$strSponsorLogoImagePath = "../sponsors/images/";
	
		if ($strOverWriteFileName != "")
			$strSponsorLogoImagePath .= $strOverWriteFileName;
		else
			$strSponsorLogoImagePath .= preg_replace("/[^a-zA-Z0-9]/", "", $strBusinessName);
			
		// Get the image data from the URL
		$ImageData = file_get_contents($strLogoURL);
	
		if ($imageData !== false)
		{
    		file_put_contents($strSponsorLogoImagePath, $imageData);
		}
		else 
		{
    		echo "Failed to download business logo image!";
		}
	}
	
	function DoGetLogoImageFileName($nShortkey)
	{
		global $g_dbMillhouse;
		$strFilename = "";
		
		$results = DoFindQuery1($g_dbMillhouse, "sponsors", "shortkey", $nShortkey);
		
		if ($results && ($results->num_rows > 0))
		{
			if ($row = $results->fetch_assoc())
			{
				$strFilename = $row["logo_image"];
			}
		}
		return $strFilename;
	}
	
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
				echo "OKTYPES=" . $result;
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
	else if (isset($_POST["submit_save_sponsor"]))
	{
		$nShortkey = (int)$_POST["number_shortkey"];
		
		if ($nShortkey == 0)
		{
			$results = DoInsertQuery9($g_dbMillhouse, "sponsors", 
														"business_name", $_POST["text_business_name"], 
														"contact_name", $_POST["text_contact_name"],
														"email_address", $_POST["text_email_address"],
														"phone_number", $_POST["text_phone_number"],
														"website", $_POST["text_website_url"],
														"type", $_POST["text_sponsor_type"],
														"description", $_POST["text_provided"],
														"expiry_date", $_POST["date_expiry"],
														"logo_image", DoSaveLogoImage($_POST["text_logo_url"], $_POST["text_business_name"], ""));
		}
		else
		{		
			$results = DoUpdateQuery9($g_dbMillhouse, "sponsors",
														"business_name", $_POST["text_business_name"], 
														"contact_name", $_POST["text_contact_name"],
														"email_address", $_POST["text_email_address"],
														"phone_number", $_POST["text_phone_number"],
														"website", $_POST["text_website_url"],
														"type", $_POST["text_sponsor_type"],
														"description", $_POST["text_provided"],
														"expiry_date", $_POST["date_expiry"],
														"logo_image", DoSaveLogoImage($_POST["text_logo_url"], $_POST["text_business_name"], DoGetLogoImageFileName($nShortkey)),
														"shortkey", $nShortkey);
		}
	}
	else if (isset($_POST["submit_get_sponsor_rankings"]))
	{
		$results = DoFindAllQuery($g_dbMillhouse, "sponsors", "", "type, ranking");
		if ($results && ($results->num_rows > 0))
		{
			$arraySponsorRankings = [];
			while ($row = $results->fetch_assoc())
			{
				$arraySponsorRankings[] = [
									"strBusinessName" => $row["business_name"],
									"strType" => $row["type"],
									"nRanking" => (int)$row["ranking"],
									"nShortkey" => $row["shortkey"]
								 ];
			}
			$result = json_encode($arraySponsorRankings);
			if (!$result)
			{
				echo "Function json_encode(...) has failed.";
			}
			else
			{
				echo "OKRANKINGS=" . $result;
			}
		}
	}
	else if (isset($_POST["submit_save_sponsor_rankings"]))
	{
		$arraySponsorRankings = json_decode($_POST["text_sponsor_rankings"]);
		$bResults = false;
		
		for ($nI = 0; $nI < count($arraySponsorRankings); $nI++)
		{
			$bResults = DoUpdateQuery1($g_dbMillhouse, "sponsors", "ranking", $arraySponsorRankings[$nI]["nRanking"], 
										"shortkey", $arraySponsorRankings[$nI]["nShortkey"]);
			if (!$bResults)
				break;
		}
		if ($bResults)
		{
			echo "OKSAVED";
		}
	}
	else
	{
		print_r($_POST);
	}
	
?>
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
	require_once("../BrowserDetection.php");
	
	DoRecordPageHitOrBlock();

	//******************************************************************************
	//******************************************************************************
	//** 
	//** DISPLAY LOGIN FORM OR WEB DIAGNOSTICS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoDisplayWebDiagnosticsForm()
	{
		$strHourChecked = "";
		$strDayChecked = "";
		$strWeekChecked = "";
		$strFortnightChecked = "";
		$strMonthChecked = "";
		$strAllChecked = "";

		if ($_POST["radio_sort"] == "hour")
			$strHourChecked = "checked ";
		else if ($_POST["radio_sort"] == "day")
			$strDayChecked = "checked ";
		else if ($_POST["radio_sort"] == "week")
			$strWeekChecked = "checked ";
		else if ($_POST["radio_sort"] == "fortnight")
			$strFortnightChecked = "checked ";
		else if ($_POST["radio_sort"] == "month")
			$strMonthChecked = "checked ";
		else if ($_POST["radio_sort"] == "all")
			$strAllChecked = "checked ";
		
		echo "<form method=\"post\" target=\"_self\" class=\"form\" style=\"width:950px;\">\n";
		echo "	<table border=\"1\" cellpadding=\"5\" cellspacing=\"0\">\n";
		echo "      <tr><td colspan=\"6\"><h3>Sort &amp; limit page hits</h3></td></tr>\n";
		echo "		<tr>\n";
		echo "			<td style=\"width:14.28%;\"><input type=\"radio\" " . $strHourChecked . "id=\"radio_sort_hour\" value=\"hour\" name=\"radio_sort\" /><label for=\"radio_sort_hour\">Last hour</label></td>\n";
		echo "			<td style=\"width:14.28%;\"><input type=\"radio\" " . $strDayChecked . "id=\"radio_sort_day\" value=\"day\" name=\"radio_sort\" /><label for=\"radio_sort_day\">Today</label></td>\n";
		echo "			<td style=\"width:14.28%;\"><input type=\"radio\" " . $strWeekChecked . "id=\"radio_sort_week\" value=\"week\" name=\"radio_sort\" /><label for=\"radio_sort_week\">Last week</label></td>\n";
		echo "			<td style=\"width:14.28%;\"><input type=\"radio\" " . $strFortnightChecked . "id=\"radio_sort_fortnight\" value=\"fortnight\" name=\"radio_sort\" /><label for=\"radio_sort_fortnight\">Last fortnight</label></td>\n";
		echo "			<td style=\"width:14.28%;\"><input type=\"radio\" " . $strMonthChecked . "id=\"radio_sort_month\" value=\"month\" name=\"radio_sort\" /><label for=\"radio_sort_month\">Last month</label></td>\n";
		echo "			<td style=\"width:14.28%;\"><input type=\"radio\" " . $strMonthChecked . "id=\"radio_sort_year\" value=\"year\" name=\"radio_sort\" /><label for=\"radio_sort_year\">Last year</label></td>\n";
		echo "			<td style=\"width:14.28%;\"><input type=\"radio\" " . $strAllChecked . "id=\"radio_sort_all\" value=\"all\" name=\"radio_sort\" /><label for=\"radio_sort_all\">All</label></td>\n";
		echo "		</tr>\n";
		echo "		<tr>\n";
		echo "			    <td colspan=\"7\"><input type=\"submit\" value=\"SORT HITS\" id=\"button_sort\" name=\"button_sort\" /></td>\n";
		echo "		</tr>\n";
		echo "	</table>\n";
		echo "</form>\n";
	}
	
	function DoFindSuspiciousKeyword($strUserAgentString)
	{
		/*
			Mozilla/5.0 (Linux; Android 12; Pixel 6) AppleWebKit/537.36 (KHTML, like Gecko) 
				Chrome/143.0.0.0 Mobile Safari/537.36
				
			Mozilla/5.0 (X11; Linux x86_64; rv:120.0) Gecko/20100101 Firefox/120.0
			
			Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) 
				Version/16.5 Mobile/15E148 Safari/604.1	
			
			Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) 
				Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0
			
			Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:152.0) Gecko/20100101 Firefox/152.0
			
			Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) 
				Chrome/149.0.0.0 Safari/537.36 OPR/133.0.0.0
				
			Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) 
				Chrome/148.0.0.0 Safari/537.36 Vivaldi/8.4.3067.53

		*/
		global $g_dbMillhouse;
		$strKeyword = "";
		$arrayKeywords = preg_split("/[., \/;()]+/", $strUserAgentString, -1, PREG_SPLIT_NO_EMPTY);
		
		for ($nI = 0; $nI < count($arrayKeywords); $nI++)
		{
			if (!is_numeric(strtolower($arrayKeywords[$nI])))
			{
				$result = DoFindQuery1($g_dbMillhouse, "valid_useragent_keywords", "keyword", strtolower($arrayKeywords[$nI]));
				if ($result->num_rows > 0)
				{
					// Do nothing.
				}
				else
				{
					$strKeyWord = $arrayKeywords[$nI];
					break;
				}
			}
		}
		return $strKeyword;
	}
	
	function DoDisplayWebDiagnostics()
	{
		global $g_dbMillhouse;
		global $g_strQuery;
		$strCondition = "";
		$datetimeStart = new DateTime();
		$datetimeEnd = new DateTime();
		$strWebBrowser = "";	
		
		if (!isset($_POST["button_sort"]))
		{
			$_POST["radio_sort"] = "day";
		}

		if ($_POST["radio_sort"] == "all")
		{
			$datetimeStart = $datetimeEnd;
		}
		else if ($_POST["radio_sort"] == "hour")
		{
			$datetimeStart->modify("-1 hours");
		}
		else if ($_POST["radio_sort"] == "day")
		{
			$datetimeStart->modify("-24 hours");
		}
		else if ($_POST["radio_sort"] == "week")
		{
			$datetimeStart->modify("-1 week");
		}
		else if ($_POST["radio_sort"] == "fortnight")
		{
			$datetimeStart->modify("-2 weeks");
		}
		else if ($_POST["radio_sort"] == "month")
		{
			$datetimeStart->modify("-1 months");
		}
		if ($datetimeStart < $datetimeEnd)
			$strCondition = "datetime >= '" . $datetimeStart->format("Y/m/d H-i-s") . "' AND datetime <= '" . 
								$datetimeEnd->format("Y/m/d H-i-s") . "'";
			
		echo "<h1>Page Visits</h1>\n";
		DoDisplayWebDiagnosticsForm();
		echo "<table border=\"2\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%;table-layout:fixed;border-color:var(--start_color);\">\n";
		
		$resultPage = DoQuery($g_dbMillhouse, "SELECT DISTINCT page FROM page_hits");
		if ($resultPage && ($resultPage->num_rows))
		{
			while ($rowPage = $resultPage->fetch_assoc())
			{
				$resultPageHits = DoFindQuery1($g_dbMillhouse, "page_hits", "page", $rowPage["page"], $strCondition, "datetime", false);
				if ($resultPageHits && ($resultPageHits->num_rows > 0))
				{
					echo "    <tr>\n";
					echo "        <th style=\"text-align:center;width:50%;\"><b>WEB PAGE: </b>" . $rowPage["page"] . "</th><th style=\"text-align:center;width:50%;\"><b>HITS: </b>" . $resultPageHits->num_rows . "</th>\n";
					echo "    </tr>\n";		
					echo "    <tr>\n";
					echo "        <td colspan=\"2\">\n";
					echo "            <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"width:100%;\">\n";
					echo "                <tr>\n";
					echo "                    <td style=\"width:160px;\"><b>Date &amp; Time</b></td>\n" . 
												"<td style=\"width:170px;\"><b>Web Browser</b></td>\n" . 
												"<td style=\"width:140px;\"><b>OS</b></td>\n" . 
												"<td style=\"width:260px;\"><b>Device</b></td>\n" . 
												"<td style=\"width:140px;\"><b>IP Address</b></td>\n" . 											
												"<td><b>User Agent</b></td>\n";												
					echo "                </tr>\n";
					echo "                <tr>\n";
					echo "                    <td colspan=\"6\"><hr/></td>\n";
					echo "                </tr>\n";
					while ($rowPageHits = $resultPageHits->fetch_assoc())
					{
						echo "                <tr>\n";
						$dateHit = new DateTime($rowPageHits["datetime"]);
						echo "                    <td>" . $dateHit->format("d/m/y H:m:s") . "</td>\n";
						
/*
	EXAMPLE CONTENTS OF $rowPagesHits["user_agent"]
	------------------------------------------------
	
Windows 11 / 10 (Chrome): Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36

Windows 11 / 10 (Edge): Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0

Windows 8 (Chrome): Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36

Windows 7 (Firefox): Mozilla/5.0 (Windows NT 6.1; WOW64; rv:109.0) Gecko/20100101 Firefox/115.0

Android (Chrome): Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36

iPhone (Safari): (Mozilla/5.0 (iPhone; CPU iPhone OS 17_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Mobile/15E148 Safari/604.1

Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Safari/605.1.15

*/
						$Browser = new foroco\BrowserDetection();
						$mapOS = $Browser->getOS($rowPageHits["user_agent"]);
						$mapBrowser = $Browser->getBrowser($rowPageHits["user_agent"]);
						$mapDevice = $Browser->getDevice($rowPageHits["user_agent"]);
						
						$strWebBrowser = $mapBrowser["browser_title"];
						$strOS = $mapOS["os_title"];
						$strDevice = $mapDevice["device_type"];
						
						echo "                    <td>" .  $strWebBrowser . "</td>\n";
						echo "                    <td>" .  $strOS . "</td>\n";
						echo "                    <td>" .  $strDevice . "</td>\n";
						echo "                    <td>" .  $rowPageHits["visitor_ip_address"] . "</td>\n";
						echo "					  <td>\n";
						$strSuspiciousKeyword = DoFindSuspiciousKeyword($rowPageHits["user_agent"]);
						if ($strSuspiciousKeyword != "")
						{
							echo "                        <label><b>SUSPICIOUS</b></label>\n";
							echo "&nbsp;&nbsp;<button class=\"small_button\" type=\"button\" onclick=\"DoShowUserAgentPopop('" . $rowPageHits["user_agent"] . "', '" . $strSuspiciousKeyword . "')\">VIEW USER AGENT</button>\n";
						}
						else
						{
							echo "                        <label>LEGITIMATE</label>\n";
						}
						echo "                    </td>\n";
						echo "                </tr>\n";
					}
					echo "            </table>\n";
					echo "        <td>\n";
					echo "    <tr>\n";
				}
			}
		}
		else
		{
			echo "    <tr>\n";
			echo "        <td>NO HITS</td>\n";
			echo "    </tr>\n";
		}		
		echo "</table>\n";
	}
	
	function DoDisplayBanUseragentPopup()
	{
		echo "<div class=\"user_agent_popup\" id=\"div_user_agent_popup\">\n";
		echo "	<h1 id=\"user_agent_popup_heading\" class=\"event_popup_heading\">USER AGENT STRING</h1>\n";
		echo "	<p id=\"user_agent_popup_details\"></p>\n";
		echo "	<form method=\"post\" target=\"_self\">"\n";
		echo "		<table border=\"0\" cellpadding=\"5\" cellspacing=\"0\">\n";
		echo "			<tr>\n";
		echo "				<td style=\"text-align:right;\"><label for=\"\">Keyword to ban: </label></td>\n";
		echo "				<td colspan=\"2\"><input type=\"text\" id=\"text_keyword\" name=\"text_keyword\" size=\"20\" required /></td>\n";
		echo "			</tr>\n";
		echo "			<tr>\n";
		echo "				<td>\n";
		echo "					<input type=\"button\" value=\"CLOSE\" onclick=\"DoCloseUserAgentPopup()\" />\n";
		echo "				</td>\n";
		echo "				<td>\n";
		echo "					<input type=\"submit\" name=\"submit_ban_keyword\" value=\"BAN USER AGENT\"  />\n";
		echo "				</td>\n";
		echo "				<td>\n";
		echo "					<input type=\"submit\" name=\"submit_allow_keyword\" value=\"ALLOW USER AGENT\"  />\n";			
		echo "				</td>\n";
		echo "			</tr>\n";
		echo "		</table>\n";
		echo "	</form>\n";
		echo "</div>\n";
	}
	
	function DoDisplayForm()
	{
		if (IsLoggedIn())
		{
			//DoDisplayLogoutForm();
			
			echo "<h1>What devices?</h1>\n";						
			echo "<div id=\"div_device\" style=\"width:100%;max-width:100%;\"></div>\n";
			echo "<h1>What operating systems?</h1>\n";						
			echo "<div id=\"div_os\" style=\"width:100%;max-width:100%;\"></div>\n";
			echo "<h1>What web browsers?</h1>\n";					
			echo "<div id=\"div_browser\" style=\"width:100%;max-width:100%;\"></div>\n";
			echo "<h1>Which pages were most visited?</h1>\n";					
			echo "<div id=\"div_hits\" style=\"width:100%;max-width:100%;\"></div>\n";
			
			DoDisplayWebDiagnostics();
			DoDisplayBanUseragentPopup();	
		}
		else
		{
			DoDisplayLoginForm();
		}
		DoDisplayLoginFormInstrunctions();
	}
	
	function DoGetNumHits($strNeedle)
	{
		/*
			EXAMPLE CONTENTS OF $rowPagesHits["user_agent"]
			------------------------------------------------
			
			Windows 11 / 10 (Chrome): Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36
			
			Windows 11 / 10 (Edge): Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0
			
			Windows 8 (Chrome): Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36
			
			Windows 7 (Firefox): Mozilla/5.0 (Windows NT 6.1; WOW64; rv:109.0) Gecko/20100101 Firefox/115.0
			
			Android (Chrome): Mozilla/5.0 (Linux; Android 14; SM-S918B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36
			
			iPhone (Safari): (Mozilla/5.0 (iPhone; CPU iPhone OS 17_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Mobile/15E148 Safari/604.1
			
			Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Safari/605.1.15
		
			DoGetNumHits("Firefox");
			DoGetNumHits("Safari");
			DoGetNumHits("Edg");
			DoGetNumHits("OPR");
			DoGetNumHits("other");
				  
			DoGetNumHits("Windows");
			DoGetNumHits("Linux");
			DoGetNumHits("iPhone");
			DoGetNumHits("Macintosh");
		
		*/
		global $g_dbMillhouse;
		$strQuery = "";
		
		if (str_contains($strNeedle, ".php"))
			$strQuery = "SELECT * FROM page_hits WHERE page = '" . $strNeedle . "'";
		else if ($strNeedle == "bots")
			$strQuery = "SELECT * FROM page_hits WHERE (LOWER(user_agent) LIKE '%compatible%') OR " . 
						"(LOWER(user_agent) LIKE '%crawler%') OR (LOWER(user_agent) LIKE '%bot%')";
		else if ($strNeedle == "other")
			$strQuery = "SELECT * FROM page_hits WHERE (LOWER(user_agent) NOT LIKE '%chrome%') AND " . 
						"(LOWER(user_agent) NOT LIKE '%safari%') AND (LOWER(user_agent) NOT LIKE '%firefox%') AND " . 
						"(LOWER(user_agent) NOT LIKE '%edg%') AND (LOWER(user_agent) NOT LIKE '%opr%') AND " . 
						"(LOWER(user_agent) NOT LIKE '%compatible%') AND (LOWER(user_agent) NOT LIKE '%crawler%') AND " . 
						"(LOWER(user_agent) NOT LIKE '%bot%')";
		else if ($strNeedle == "chrome")
			$strQuery = "SELECT * FROM page_hits WHERE (LOWER(user_agent) LIKE '%chrome%') AND " . 
						"(LOWER(user_agent) LIKE '%safari%')";
		else if ($strNeedle == "safari")
			$strQuery = "SELECT * FROM page_hits WHERE (LOWER(user_agent) LIKE '%safari%') AND " . 
						"(LOWER(user_agent) NOT LIKE '%chrome%')";
		else if ($strNeedle == "opera")
			$strQuery = "SELECT * FROM page_hits WHERE (LOWER(user_agent) LIKE '%opr%')"; 
		else if ($strNeedle == "edge")
			$strQuery = "SELECT * FROM page_hits WHERE (LOWER(user_agent) LIKE '%edg%')"; 
		else
			$strQuery = "SELECT * FROM page_hits WHERE user_agent LIKE '%" . $strNeedle . "%'";
		
		$result = DoQuery($g_dbMillhouse, $strQuery);
		
		if ($result)
			return $result->num_rows;
		else
			return 0;
	}
	
	function DoGetNumHits_($strName, $strType)
	{
		global $g_dbMillhouse;
		$strQuery = "";
		$Browser = new foroco\BrowserDetection();
		$result = DoFindAllQuery($g_dbMillhouse, "page_hits");
		$nNumHits = 0;
		if ($result)
		{
			while ($row = $result->fetch_assoc())
			{
				if ($strType == "OS")
				{
					/* 
						Array 
						( 
							[os_type] => desktop 
							[os_family] => windows 
							[os_name] => Windows 
							[os_version] => 10 
							[os_title] => Windows 10 
							[64bits_mode] => 1 
						)
						Array
						( 
							[os_type] => mobile 
							[os_family] => macintosh 
							[os_name] => iOS 
							[os_version] => 6 
							[os_title] => iOS 6 
							[64bits_mode] => 0 
						) 
						Array 
						( 
						    [os_type] => mobile
						    [os_family] => blackberry
						    [os_name] => BlackBerry
						    [os_version] => 0
						    [os_title] => BlackBerry
						    [64bits_mode] => 0
						) 
						Array 
						( 
						    [os_type] => mobile
						    [os_family] => android
						    [os_name] => Android
						    [os_version] => 6
						    [os_title] => Android 6
						    [64bits_mode] => 0
						)
						Array
						(
						    [os_type] => desktop
						    [os_family] => linux
						    [os_name] => Chrome OS
						    [os_version] => 0
						    [os_title] => Chrome OS
						    [64bits_mode] => 1
						)
					*/
					$mapResult = $Browser->getOS($row["user_agent"]);
					if (strtoLower($strName) == strtoLower($mapResult["os_family"]))
						$nNumHits++;
				}
				else if ($strType == "BROWSER")
				{
					/*
						Array
						(
						    [browser_name] => Chrome
						    [browser_version] => 148
						    [browser_title] => Chrome 148
						    [browser_chrome_original] => 1
						    [browser_firefox_original] => 0
						    [browser_safari_original] => 0
						    [browser_chromium_version] => 148
						    [browser_gecko_version] => 0
						    [browser_webkit_version] => 0
						    [browser_android_webview] => 0
						    [browser_ios_webview] => 0
						    [browser_desktop_mode] => 0
						)
					
						Array
						(
						    [browser_name] => Firefox
						    [browser_version] => 70
						    [browser_title] => Firefox 70
						    [browser_chrome_original] => 0
						    [browser_firefox_original] => 1
						    [browser_safari_original] => 0
						    [browser_chromium_version] => 0
						    [browser_gecko_version] => 70
						    [browser_webkit_version] => 0
						    [browser_android_webview] => 0
						    [browser_ios_webview] => 0
						    [browser_desktop_mode] => 0
						)

						Array
						(
						    [browser_name] => Internet Explorer
						    [browser_version] => 11
						    [browser_title] => Internet Explorer 11
						    [browser_chrome_original] => 0
						    [browser_firefox_original] => 0
						    [browser_safari_original] => 0
						    [browser_chromium_version] => 0
						    [browser_gecko_version] => 0
						    [browser_webkit_version] => 0
						    [browser_android_webview] => 0
						    [browser_ios_webview] => 0
						    [browser_desktop_mode] => 0
						)
					
						Array
						(
						    [browser_name] => Edge
						    [browser_version] => 148
						    [browser_title] => Edge 148
						    [browser_chrome_original] => 0
						    [browser_firefox_original] => 0
						    [browser_safari_original] => 0
						    [browser_chromium_version] => 148
						    [browser_gecko_version] => 0
						    [browser_webkit_version] => 0
						    [browser_android_webview] => 0
						    [browser_ios_webview] => 0
						    [browser_desktop_mode] => 0
						)

						Array
						(
						    [browser_name] => Opera
						    [browser_version] => 65
						    [browser_title] => Opera 65
						    [browser_chrome_original] => 0
						    [browser_firefox_original] => 0
						    [browser_safari_original] => 0
						    [browser_chromium_version] => 148
						    [browser_gecko_version] => 0
						    [browser_webkit_version] => 0
						    [browser_android_webview] => 0
						    [browser_ios_webview] => 0
						    [browser_desktop_mode] => 0
						)
						
						Array
						(
						    [browser_name] => Safari Mobile
						    [browser_version] => 13
						    [browser_title] => Safari Mobile 13
						    [browser_chrome_original] => 0
						    [browser_firefox_original] => 0
						    [browser_safari_original] => 1
						    [browser_chromium_version] => 0
						    [browser_gecko_version] => 0
						    [browser_webkit_version] => 605.1
						    [browser_android_webview] => 0
						    [browser_ios_webview] => 0
						    [browser_desktop_mode] => 0
						)

						Array
						(
						    [browser_name] => UC Browser
						    [browser_version] => 12.11
						    [browser_title] => UC Browser 12.11
						    [browser_chrome_original] => 0
						    [browser_firefox_original] => 0
						    [browser_safari_original] => 0
						    [browser_chromium_version] => 148
						    [browser_gecko_version] => 0
						    [browser_webkit_version] => 0
						    [browser_android_webview] => 1
						    [browser_ios_webview] => 0
						    [browser_desktop_mode] => 0
						)
					*/
					$mapResult = $Browser->getBrowser($row["user_agent"]);
						
					if (str_contains(strtolower($mapResult["browser_name"]), strtolower($strName)))
						$nNumHits++;
				}
				else if ($strType == "DEVICE")
				{
					/*
						Array
						(
						    [device_type] => Android Mobile or Tablet
							[device_type] => Apple iPhone
							[device_type] => Apple iPad
							[device_type] => Blackberry Mobile or Tablet
							[device_type] => Apple Desktop or Laptop or Tablet
							[device_type] => Windows Mobile or Tablet
							[device_type] => Windows Desktop or Laptop
							[device_type] => Linux Desktop or Laptop
						)
						*/
					$mapResult = $Browser->getDevice($row["user_agent"]);
					if (str_contains(strtolower($mapResult["device_type"]), strtolower($strName)))
						 $nNumHits++;
				}
			}
		}

		
		return $nNumHits;
	}
	
	if (isset($_POST["submit_ban_keyword"]))
	{
		$strRobotsFileName = DoGetParentOrCurrentDir() . "robots.txt";
		$arrayLines = [];
		
		try
		{
			$arrayLines = file($strRobotsFileName, FILE_SKIP_EMPTY_LINES);
			array_unshift($arrayLines, "User-agent: " . $_POST["text_keyword"] . PHP_EOL);
			$strFileContents = implode("", $arrayLines);
			file_put_contents($strRobotsFileName, $strFileContents);
			DoFlagMessage("The keyword '" . $_POST["text_keyword"] . "' was successfully added to 'robots.txt'...", true);
		}
		catch (Exception $e)
		{
			DoFlagMessage($e->getMessage());
		}
	}
	else if (isset($_POST["submit_allow_keyword"]))
	{
		if (DoInsertQuery($g_dbMillhouse, "valid_useragent_keywords", "keyword", $_POST["text_keyword"]))
		{
			DoFlagMessage("'" . $_POST["text_keyword"] . "' was successfully added to the database...");
		}
		else
		{
			DoFlagMessage("'" . $_POST["text_keyword"] . "' could not be added to the database...", true);
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
		<title>Web Diagnostics</title>			
		<style type="text/css">






































































			.content td
			{
				font-size: small;
			}
			
			.form td
			{
				width: 16.67%;
			}
			
			.google-visualization-tooltip
			{
				background-color: color-mix(in srgb, var(--end_color), white 40%)!important; /* Popup background color */
				border: 3px solid var(--start_color)!important; /* Popup border color */
				border-radius: var(--border_radius)!important; /* Rounded corners */
				padding: 0px!important;
			}
			
			div.google-visualization-tooltip > ul > li > span 
			{
  				color: var(--start_color)!important; /	`* Replace with your desired hex color */
			}
			
			.user_agent_popup
			{
				display: none;
				position: fixed; /* Positions the element relative to the browser window */
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%); /* Centers the popup */
				z-index: 1000; /* Ensures it is above other elements */
			
				background-color: color-mix(in srgb, var(--end_color), white 40%);
				border-style: solid;
				border-width: medium;
				border-color: var(--start_color);
				border-radius: var(--border_radius);
				padding: 10px;
				width: 550px;
				max-height: 400px;
				overflow: auto;
			}
			
			.user_agent_popup p
			{
				font-family: "Playwrite GB J", cursive;
				font-optical-sizing: auto;
				font-weight: 300;/*100 - 900*/;
				font-style: normal;
				font-size: small;
		
			}
				
			.user_agent_popup
			{
				text-decoration-color: var(--start_color);
			}

		</style>
		<script type="text/javascript" src="admin_login.js" />
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		
			let g_strOrange = DoGetCSSRootColor("--end_color"),
				g_strMagenta = DoGetCSSRootColor("--start_color");
			
			function DoOnPageLoadComplete()
			{
			}
									
			function DoShowUserAgentPopop(strUserAgentString, strSuspiciousKeyword)
			{
				let divUserAgentPopup = document.getElementById("div_user_agent_popup"),
					pUserAgentPopup = document.getElementById("user_agent_popup_details"),
					textKeyword = document.getElementById("text_keyword");
										
				if (divUserAgentPopup && pUserAgentPopup && textKeyword)
				{
					textKeyword = strSuspiciousKeyword;
					pUserAgentPopup.innerText = strUserAgentString;
					divUserAgentPopup.style.display = "block";
				}
			}
			
			function DoCloseUserAgentPopup()
			{
				let divUserAgentPopup = document.getElementById("div_user_agent_popup");
				
				if (divUserAgentPopup)
				{
					divUserAgentPopup.style.display = "none";
				}
			}
						
			function DoDrawChartDevice()
			{
			/*
				Array
				(
				    [device_type] => Android Mobile or Tablet
				)
					[device_type] => Apple iPhone
					[device_type] => Apple iPad
					[device_type] => Blackberry Mobile or Tablet
					[device_type] => Apple Desktop or Laptop or Tablet
					[device_type] => Windows Mobile or Tablet
					[device_type] => Windows Desktop or Laptop
					[device_type] => Linux Desktop or Laptop
				)
				*/
				// Set Data
				const data = google.visualization.arrayToDataTable([
																	["Device", "Hits", {role: "style"}],
																    ["iPhone", <?php echo DoGetNumHits_("iPhone", "DEVICE"); ?>, "color:" + g_strOrange],
																    ["iPad", <?php echo DoGetNumHits_("iPad", "DEVICE"); ?>, "color:" + g_strOrange],
																    ["Android Device", <?php echo DoGetNumHits_("Android", "DEVICE"); ?>, "color:" + g_strOrange],																    
																    ["Linux PC", <?php echo DoGetNumHits_("Linux", "DEVICE"); ?>, "color:" + g_strOrange],																    
																    ["Macintosh PC", <?php echo DoGetNumHits_("Macintosh", "DEVICE"); ?>, "color:" + g_strOrange],
																    ["Windows PC", <?php echo DoGetNumHits_("Windows", "DEVICE"); ?>, "color:" + g_strOrange],
																    ["Blackberry Device", <?php echo DoGetNumHits_("Blackberry", "DEVICE"); ?>, "color:" + g_strOrange],
																    ["Web Bots", <?php echo DoGetNumHits_("Bot", "DEVICE"); ?>, "color:" + g_strOrange]
																]);
				// Set Options
				const options = {
									title: "ANALYSIS OF THE VISITOR'S DEVICE",
									titleTextStyle: {color: g_strMagenta, bold: true},
									
									hAxis: 
									{
										format: '#,###', 
										title: "HITS",
										titleTextStyle: {color: g_strMagenta, bold: true},
										textStyle: {color: g_strOrange, fontSize: "12"},
										gridlines: {count: -1}, 
	 									gridlines: {color: g_strMagenta},
	    								minorGridlines: {count:0, color: g_strMagenta},
	    								baselineColor: g_strMagenta
									},
									
									vAxis: 
									{
										title: "OS/DEVICE",
										titleTextStyle: {color: g_strMagenta, bold: true}, 
	 									gridlines: {color: g_strMagenta},
										textStyle: {color: g_strOrange, fontSize: "12"},
	 									gridlines: {color: g_strMagenta},
									},
									
									legend:
									{
										textStyle: {color: g_strMagenta, bold: true, fontSize: 12},
									},
									
									colors: [g_strOrange],
								  								
    								height: 400,
    								
    								tooltip: {isHtml: true}
								};
				
				// Draw Chart
				const chart = new google.visualization.BarChart(document.getElementById("div_device"));
				chart.draw(data, options);
			  
			}

			function DoDrawChartOS()
			{
				// Set Data
				const data = google.visualization.arrayToDataTable([
																	["OS", "Hits", {role: "style"}],
																    ["MS Windows", <?php echo DoGetNumHits_("Windows", "OS"); ?>, "color:" + g_strOrange],
																    ["Linux", <?php echo (DoGetNumHits_("Linux", "OS") - DoGetNumHits_("Linux", "OS")); ?>, "color:" + g_strOrange],
																    ["Adroid", <?php echo DoGetNumHits_("Android", "OS"); ?>, "color:" + g_strOrange],																    
																    ["Macintosh OS", <?php echo DoGetNumHits_("Macintosh", "OS"); ?>, "color:" + g_strOrange],
																    ["Blackberry OS", <?php echo DoGetNumHits_("Blackberry", "OS"); ?>, "color:" + g_strOrange]
																]);
				// Set Options
				const options = {
									title: "ANALYSIS OF THE VISITOR'S OS",
									titleTextStyle: {color: g_strMagenta, bold: true},
									
									hAxis: 
									{
										format: '#,###', 
										title: "HITS",
										titleTextStyle: {color: g_strMagenta, bold: true},
										textStyle: {color: g_strOrange, fontSize: "12"},
										gridlines: {count: -1}, 
	 									gridlines: {color: g_strMagenta},
	    								minorGridlines: {count:0, color: g_strMagenta},
	    								baselineColor: g_strMagenta
									},
									
									vAxis: 
									{
										title: "OS/DEVICE",
										titleTextStyle: {color: g_strMagenta, bold: true}, 
	 									gridlines: {color: g_strMagenta},
										textStyle: {color: g_strOrange, fontSize: "12"},
	 									gridlines: {color: g_strMagenta},
									},
									
									legend:
									{
										textStyle: {color: g_strMagenta, bold: true, fontSize: 12},
									},
									
									colors: [g_strOrange],
									    								
    								height: 280,

    								tooltip: {isHtml: true}
								};
				
				// Draw Chart
				const chart = new google.visualization.BarChart(document.getElementById("div_os"));
				chart.draw(data, options);
			}

			function DoDrawChartBrowser()
			{					
				// Set Data
				const data = google.visualization.arrayToDataTable([
				// , "color:" 
				// {role: "style"}
																	["Web Browser", "Hits", {role: "style"}],
																    ["Google Chrome", <?php echo DoGetNumHits_("chrome", "BROWSER"); ?>, "color:" + g_strOrange],
																    ["Mozilla Firefox", <?php echo DoGetNumHits_("firefox", "BROWSER"); ?>, "color:" + g_strOrange],
																    ["Apple Safari", <?php echo DoGetNumHits_("Safari", "BROWSER"); ?>, "color:" + g_strOrange],
																    ["MS Edge", <?php echo DoGetNumHits_("edge", "BROWSER"); ?>, "color:" + g_strOrange],
																    ["Opera", <?php echo DoGetNumHits_("opera", "BROWSER"); ?>, "color:" + g_strOrange],
																    ["UC Browser", <?php echo DoGetNumHits_("UC", "BROWSER"); ?>, "color:" + g_strOrange]
																]);
				// Set Options
				const options = {
									title: "ANALYSIS OF THE VISITOR'S WEB BROWSER",
									titleTextStyle: {color: g_strMagenta, bold: true},
									
									hAxis: 
									{
										format: '#,###', 
										title: "HITS",
										titleTextStyle: {color: g_strMagenta, bold: true},
										textStyle: {color: g_strOrange, fontSize: "12"},
										gridlines: {count: -1}, 
	 									gridlines: {color: g_strMagenta},
	    								minorGridlines: {count:0, color: g_strMagenta},
	    								baselineColor: g_strMagenta
									},
									
									vAxis: 
									{
										title: "WEB BROWSER",
										titleTextStyle: {color: g_strMagenta, bold: true}, 
	 									gridlines: {color: g_strMagenta},
										textStyle: {color: g_strOrange, fontSize: "12"},
	 									gridlines: {color: g_strMagenta},
									},
									
									legend:
									{
										textStyle: {color: g_strMagenta, bold: true, fontSize: 12},
									},
									
									colors: [g_strOrange],
									    								
									height: 450,

    								tooltip: {isHtml: true}
								};
				
				// Draw Chart
				const chart = new google.visualization.BarChart(document.getElementById("div_browser"));
				chart.draw(data, options);
			  
			}		

			function DoDrawChartHits()
			{
				// Set Data
				const data = google.visualization.arrayToDataTable([
																	["Web Page", "Hits", {role: "style"}],
																    ["index.php", <?php echo DoGetNumHits("index.php"); ?>, "color:" + g_strOrange],
																    ["calendar.php", <?php echo DoGetNumHits("calendar.php"); ?>, "color:" + g_strOrange],
																    ["contact.php", <?php echo DoGetNumHits("contact.php"); ?>, "color:" + g_strOrange],
																    ["cool_space.php", <?php echo DoGetNumHits("cool_space.php"); ?>, "color:" + g_strOrange],
																    ["donation.php", <?php echo DoGetNumHits("donation.php"); ?>, "color:" + g_strOrange],
																    ["forms.php", <?php echo DoGetNumHits("forms.php"); ?>, "color:" + g_strOrange],
																    ["governance.php", <?php echo DoGetNumHits("governance.php"); ?>, "color:" + g_strOrange],
																    ["groups.php", <?php echo DoGetNumHits("groups.php"); ?>, "color:" + g_strOrange],
																    ["join.php", <?php echo DoGetNumHits("join.php"); ?>, "color:" + g_strOrange],
																    ["milestones.php", <?php echo DoGetNumHits("milestones.php"); ?>, "color:" + g_strOrange],
																    ["people.php", <?php echo DoGetNumHits("people.php"); ?>, "color:" + g_strOrange],
																    ["plan.php", <?php echo DoGetNumHits("plan.php"); ?>, "color:" + g_strOrange],
																    ["polices.php", <?php echo DoGetNumHits("policies.php"); ?>, "color:" + g_strOrange],
																    ["reports.php", <?php echo DoGetNumHits("reports.php"); ?>, "color:" + g_strOrange],
																    ["request_sponsorship.php", <?php echo DoGetNumHits("request_sponsorship.php"); ?>, "color:" + g_strOrange],
																    ["room.php", <?php echo DoGetNumHits("room.php"); ?>, "color:" + g_strOrange],
																    ["rules.php", <?php echo DoGetNumHits("rules.php"); ?>, "color:" + g_strOrange],
																    ["site_history.php", <?php echo DoGetNumHits("site_history.php"); ?>, "color:" + g_strOrange],
																    ["sponsors.php", <?php echo DoGetNumHits("sponsors.php"); ?>, "color:" + g_strOrange],
																    ["volunteering.php", <?php echo DoGetNumHits("volunteering.php"); ?>, "color:" + g_strOrange],
																    ["web_diagnostics.php", <?php echo DoGetNumHits("web_diagnistics.php"); ?>, "color:" + g_strOrange],
																]);
				// Set Options
				const options = {
									title: "ANALYSIS OF WHICH PAGES WERE VISITIED",
									titleTextStyle: {color: g_strMagenta, bold: true},
									
									hAxis: 
									{
										format: '#,###', 
										title: "HITS",
										titleTextStyle: {color: g_strMagenta, bold: true},
										textStyle: {color: g_strOrange, fontSize: "12"},
										gridlines: {count: -1}, 
	 									gridlines: {color: g_strMagenta},
	    								minorGridlines: {count:0, color: g_strMagenta},
	    								baselineColor: g_strMagenta
									},
									
									vAxis: 
									{
										title: "WEB PAGE",
										titleTextStyle: {color: g_strMagenta, bold: true}, 
	 									gridlines: {color: g_strMagenta},
										textStyle: {color: g_strOrange, fontSize: "12"},
	 									gridlines: {color: g_strMagenta},
									},
									
									legend:
									{
										textStyle: {color: g_strMagenta, bold: true, fontSize: 12},
									},
									
									colors: [g_strOrange],
									    								
									chartArea: {top: '5%', bottom: '5%'},
									
									height: 1000,

    								tooltip: {isHtml: true}
								};
				
				// Draw Chart
				const chart = new google.visualization.BarChart(document.getElementById("div_hits"));
				chart.draw(data, options);
			  
			}		

			function DoDrawCharts()
			{
				DoDrawChartDevice();
				DoDrawChartOS();
				DoDrawChartBrowser();
				DoDrawChartHits();
			}
			
			// Load the API
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(DoDrawCharts);
			
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
						<td class="masthead_cell_image_right2">
							<a href="../images/MillHouseNeighborhoodHouse2.jpg">
							<img src="../images/MillHouseNeighborhoodHouse2.jpg" alt="MillHouseNeighborhoodHouse.jpg" class="masthead_image" /></a>
						</td>
						<td class="masthead_cell_sponsors">
<div class="sponsors_container">	
	<?php DoGenerateSponsors(); ?>				
</div>
						</td>
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
		<li>
		<a href="../index.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Home</a></li>
		<li>
		<a href="../about/about.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">About Mill House</a></li>
		<li>
		<a href="../calendar/calendar.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Events Calendar</a></li>
		<li>
		<a href="../room/room.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Hire a room</a></li>
		<li>
		<a href="../sponsors/sponsors.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Our Collaborators</a></li>
		<li>
			<a href="../contribute/contribute.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item">
				<a href="../contribute/join.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a member</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/volunteering.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a volunteer</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/request_sponsorship.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/donation.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Make a donation</b></a></li>
			</ul>
		</li>
		<!--<li><a href="people/people.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Mill House People</a></li>-->
		<!--<li><a href="milestones/milestones.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Milestones</a></li>-->
		<li>
		<a href="../contact/contact.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Contact</a></li>
		<li>
		<a href="../site_history/site_history.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Site History</a></li>
		<li>
			<a href="../governance/governance.php" onclick="DoClickNavLinkWithSubmenu('governance')" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Governance</a> 
			<ul style="display:<?php echo DoShowHideSubmenu("governance"); ?>;" id="governance">
				<li class="submenu_item"><a href="https://www.acnc.gov.au/charity/charities/a49d2dd7-2daf-e811-a960-000d3ad24282/profile" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>ACNC Listing</b></a></li>
				<li class="submenu_item">
				<a href="../governance/rules/rules.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Rules</b></a></li>
				<li class="submenu_item">
				<a href="../governance/reports/reports.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Annual Reports</b></a></li>
				<li class="submenu_item">
				<a href="../governance/policies/policies.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Policies</b></a></li>
				<li class="submenu_item">
				<a href="../governance/plan/plan.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Strategic Plan</b></a></li>
			</ul>
		</li>
		<li>
		<a href="../group_events/group_events.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Group Events</a></li>
		<li>
			<a href="administration.php" onclick="DoClickNavLinkWithSubmenu('administration')" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Administration</a>
			<ul style="display:<?php echo DoShowHideSubmenu("administration"); ?>;" id="administration">
			
			<?php DoDisplayAdministrationSubmenu(); ?>
			
			</ul>
		</li>
	</ul>
</div>
										</td>
										<td>
<div id="div_navigation_arrow" class="navigation_arrow" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="DoOpenCloseMenu(true)" onkeyup="DoKeyPress(event)">
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
								
								<form id="form_voice_assist" class="form form_voice_assist">
									<table border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td style="text-align:right;">
												<label for="checkbox_audio_assist"><b>AUDIO ASSIST ON/OFF</b></label>
											</td>
											<td>
												<input type="checkbox" id="checkbox_audio_assist" tabindex="0" onclick="DoClickAudioAssistCheckbox(this)" />
											</td>
										</tr>
										<tr>
											<td style="text-align:right;">
											    <label for="select_voice">Choose Voice:</label>
											</td>
											<td>
											    <select id="select_voice">
											    </select>
											</td>
										</tr>
										<tr>
											<td style="text-align:right;">
												<label for="text_to_speak">Text to speak</label>
											</td>
											<td>
												<input type="text" id="text_to_speak" size="100%" maxlength="50" value="Hello world!"/>
											</td>
										</tr>
										<tr>
											<td style="text-align:center;">
												<button type="button" onclick="DoTestVoice('text_to_speak')">TEST</button>
											</td>
											<td style="text-align:center;">
												<button type="button" onclick="DoDisplayHidePopup('form_voice_assist', false)">CLOSE</button>
											</td>
										</tr>
										<tr>
											<td>
											</td>
											<td>
											</td>
										</tr>
									</table>
								</form>
								
								<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td>
											<div class="page_heading" id="div_page_heading" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><u><script type="text/javascript">document.write(document.title);</script></u></div>
										</td>
										<td style="text-align:right;">
											<?php
											
												if (isLoggedIn())
													echo "<button class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";
													
											?>
										</td>
									</tr>
								</table>			
								<form class="form_voice_assist_button"><button type="button" onclick="DoDisplayHidePopup('form_voice_assist', true)">VOICE ASSIST</button></form>

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
	
	<p>ALL the contents of this page are automatically generated by either PHP code or Google cloud services. So 
	you can ignore this page entirely.</p>
	
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
			<div class="footer">
				<table border="0" cellpadding="0" cellspacing="0" class="footer_table">
					<tr>
						<td class="footer_table_cell footer_left_cell">&copy;Mill House, Maryborough, VIC</td>
						
						<td class="footer_table_cell footer_middle_cell">COME ALONG AND JOIN THE MILL HOUSE COMMUNITY <h2 style="display:inline;">&#128522;</h2></td>
						
						<td class="footer_table_cell footer_right_cell">Web site by: Gregary Boyles 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)</td>
					</tr>
				</table>
			</div>
			<!-- End Footer --></div>
		<!-- End Container -->
	</body>
	
	<script type="text/javascript">
	
		DoSetAudioAssistCheckbox();
		
		let selectVoices = document.getElementById("select_voice");
		if (selectVoices)
		{
			selectVoices.innerHTML = g_strVoiceOptions;
		}
		
		DoAllAttachListeners("div_content");
		
		if (JSON.parse(sessionStorage.getItem("bAudioAssistOn")))
		{
			alert("The audio assist feature requires user interaction to 'activate'.\n\nYou will need to click a blank part of the page after you close this message box.\n\nIt is annoying, but it is web browser requirement.");
		}
		
	</script>
	
</html>
<!-- #BeginEditable "End" -->

<?php DoShowMessage(); ?>

<!-- #EndEditable -->

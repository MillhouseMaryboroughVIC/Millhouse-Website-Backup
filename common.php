<?php
	session_start();
	$g_strEmailManager = "manager&millhouse.org.au";
	$g_strEmailPresident = "president&millhouse.org.au";	
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** AI & OTHER MALICIOUS WEB CRAWLERS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoParseRobotsTxt()
	{
		$fileRobots = fopen(DoGetParentOrCurrentDir() . "robots.txt", "r");
		$arrayBannedUserAgents = [];
		$nI = 0;
		
		if ($fileRobots)
		{
			while (($strLine = fgets($fileRobots)) !== false)
			{
				if (str_contains($strLine, "User-agent"))
				{
					$strLine = str_replace("User-agent: ", "", $strLine);
					$strLine = str_replace("\r", "", $strLine);
					$strLine = str_replace("\n", "", $strLine);
					$arrayBannedUserAgents[$nI++] = $strLine;
				}
			}
		}
		return $arrayBannedUserAgents;
	}
	
	function DoDenyAccess()
	{
		header("HTTP/1.1 403 Forbidden");
		
		// Provide a message or custom error page (optional)
		echo "Access Denied: You do not have permission to view this resource.";
		
		// Stop execution so no other code runs
		exit();
	}
	
	function DoRecordPageHit()
	{
		global $g_dbMillhouse;

		// The request is for a top-level web page (HTML, PHP, ASP)
		$strPageFilename = DoGetPageFilename();
	
		if (IsRequestFromLocalNetwork())
		{
			PrintJavascriptLine("console.log('Request is from local network...');", 1, true);
		}
		else if (IsAdminPage($strPageFilename))
		{
			PrintJavascriptLine("console.log('Requested page is an admin page...');", 1, true);
		}
		else if (!DoCheckTableExists("page_hits"))
		{
			PrintJavascriptLine("console.log(\"'page_hits' table does not exist...\");", 1, true);
		}
		else
		{
			$dateNow = new DateTime();
			
			$result = DoInsertQuery4($g_dbMillhouse, "page_hits", "page", $strPageFilename, "datetime", $dateNow->format("Y-m-d H:m:s"), "user_agent", $_SERVER["HTTP_USER_AGENT"], "visitor_ip_address", $_SERVER["REMOTE_ADDR"]);
			if ($result)
				PrintJavascriptLine("console.log('Page hit added to database...');", 1, true);
			else
				PrintJavascriptLine("console.log('Page hit could not be added to database...');", 1, true);
		}
	}
	
	function IsInRobotsDotText($strUserAgent)
	{
		static $arrayBannedUserAgents = NULL;
		static $nArraySize = 0;
		
		if ($arrayBannedUserAgents === null) 
		{
        	$arrayBannedUserAgents = DoParseRobotsTxt();
        	$nArraySize = count($arrayBannedUserAgents);
        }
		// 1. Convert the array into a single regex string
		// preg_quote ensures characters like '.', '/', or '?' don't break the regex
		$regexPattern = "#" . implode("|", array_map("preg_quote", $arrayBannedUserAgents)) . "#i";
		
		// 2. Perform a single match check
		// This is more efficient that looping through the array and doing string comparisons.
		if (preg_match($regexPattern, $_SERVER["HTTP_USER_AGENT"]))
			return true;
	
		return false;
	}
	
	function DoRecordPageHitOrBlock()
	{
		//if (!isset($_SESSION["bBlock"]))
			$_SESSION["bBlock"] = false;
					
		if (($_SERVER["HTTP_ACCEPT"] == "") || ($_SERVER["HTTP_ACCEPT_LANGUAGE"] == "") ||
			($_SESSION["bBlock"] ? $_SESSION["bBlock"] : IsInRobotsDotText($_SERVER["HTTP_USER_AGENT"])))
		{
			DoDenyAccess();
			$_SESSION["bBlock"] = true;
		}
		else
		{
			DoRecordPageHit();
		}
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** PATTERN MATCHING REGULAR EXPRESSIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	$g_strPatternPassword = "(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}";
	$g_strPatternPhoneNumber = "(?:(?:\+?61|0)[2-478](?:[ -]?[0-9]){8}|(?:1300|1800|1900|1902)[ -]?[0-9]{3}[ -]?[0-9]{3})";
	$g_strPatternEmail = "[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}";
	$g_strPatternURL = "https?:\/\/([\w-]+\.)+[\w-]+(\/[\w .\/-]*)?";
	$g_strPatternPersonName = "[a-zA-Z-'() ]{4,24}";
	$g_strPatternGroupName = "[a-zA-Z0-9_]{4,24}";
	$g_strPatternGroupDesc = "[a-zA-Z'() -]{4,24}";
	$g_strPatternComment = "(?!.*<script)(?!.*<\/script>).*";
	$g_strPatternCurrency = "\d+\.\d{2}";
	$g_strPatternPostcode = "^\d{4}$";	

	//******************************************************************************
	//******************************************************************************
	//** 
	//** DEBUGGING FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************

	function DoDisplayTop($bIsJavascript)
	{
		if ($bIsJavascript)
		{
			echo "/*\n";
		}
		else
		{
			echo "<!--\n";
		}
		for ($nI = 0; $nI < 4; $nI++)
			echo "################################################################################\n";
		echo "\n";
	}
	
	function DoDisplayBottom($bIsJavascript)
	{
		echo "\n";
		for ($nI = 0; $nI < 4; $nI++)
			echo "################################################################################\n";
		if ($bIsJavascript)
		{
			echo "*/\n";
		}
		else
		{
			echo "-->\n";
		}
	}
	
	function DumpBoolVar($strVarName, $bVar, $bNewLine = false, $bIsJavascript = true, $bDisplayTop = false, $bDisplayBottom = false)
	{
		$strValue = "XXXXX";
		
		if ($bDisplayTop)
		{
			DoDisplayTop($bIsJavascript);
		}
		echo $strVarName . " = ";
		if ($bVar)
			$strValue = "TRUE";
		else
			$strValue = "FALSE";
		echo "boolean(" . $strValue . ")\n";
		if ($bDisplayBottom)
		{
			DoDisplayBottom($bIsJavascript);
		}
	}
	
	function DumpVar($strVarName, $var, $bNewLine = false, $bIsJavascript = true, $bDisplayTop = false, $bDisplayBottom = false)
	{
		if ($bDisplayTop)
		{
			DoDisplayTop($bIsJavascript);
		}
		echo $strVarName . " = ";
		var_dump($var);
		if ($bNewLine)
			echo "\n";
		if ($bDisplayBottom)
		{
			DoDisplayBottom($bIsDoGenerateJavascriptAdvertSlots);
		}
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** GENERATE JAVASCRIPT ERROR FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoPrintJSAlertError($strError, $bJSTags = true)
	{
		if ($bJSTags)
			echo "<script type=\"text/javascript\">\n";
		echo "    alert(\"" . $strError . "\");\n";
		if ($bJSTags)
			echo "</script>\n";
	}
	
	function DoPrintJSAlertPasswordError($strPassword, $bJSTags = true)
	{
		$strError = "The password '" . $strPassword . "' is incorrect!";
		DoPrintJSAlertError($strError, $bJSTags);
	}


	//******************************************************************************
	//******************************************************************************
	//** 
	//** MISCELLANEOUS USEFUL FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoCompareSQLTimeNow($strDatetime)
	{
		$nResult = 0;
		
		$time = new DateTime(is_null($strDatetime) ? "" : $strDatetime);
		$strTime = $time->format("H:i");
		
		$timeNow = new DateTime();
		$strTimeNow = $timeNow->format("H:i");
		
		if ($strTime == $strTimeNow)
			$nResult = 0;
		else if ($strTime > $strTimeNow)
			$nResult = 10;
		else if ($strTime < $strTimeNow)
			$nResult = -10;
		
		return $nResult;
	}
	
	function SQLTimeGreaterNow($strDatetime)
	{
		return DoCompareSQLTimeNow($strDatetime) > 0;
	}
	
	function SQLTimeLessNow($strDatetime)
	{
		return DoCompareSQLTimeNow($strDatetime) < 0;
	}
	
	function SQLTimeGreaterEqualNow($strDatetime)
	{
		return DoCompareSQLTimeNow($strDatetime) >= 0;
	}
	
	function SQLTimeLessEqualNow($strDatetime)
	{
		return DoCompareSQLTimeNow($strDatetime) <= 0;
	}
	
	function SQLTimeEqualNow($strDatetime)
	{
		return DoCompareSQLTimeNow($strDatetime) == 0;
	}
	
	function DoRemoveScriptTags($strAdvertHTML)
	{
		$nPos1 = strpos($strAdvertHTML, "<script");
		if (nPos1 >= 0)
		{
			$nPos2 = strpos($strAdvertHTML, "</script>");
			$strBefore = substr($strAdvertHTML, 0, $nPos1);
			$strAfter = substr($strAdvertHTML, $nPos2 + 9);
			
			$strAdvertHTML = $strBefore + $strAfter;
		}
		return $strAdvertHTML;
	}
	
	function DoGetPageFilename()
	{
		$nPos1 = strrpos($_SERVER["PHP_SELF"], "/") + 1;
		$nPos2 = strrpos($_SERVER["PHP_SELF"], ".php") + 3;
		$strPageFilename = substr($_SERVER["PHP_SELF"], $nPos1, $nPos2 - $nPos1 + 1);
		
		return $strPageFilename;
	}
	
	function IsAdminPage($strPageFilename)
	{
		
		return (($strPageFilename == "approve_sponsorship.php") || ($strPageFilename == "renew_sponsorship.php") || 
				($strPageFilename == "web_diagnostics.php") || ($strPageFilename == "administration.php") || 
				($strPageFilename == "edit_groups.php") || ($strPageFilename == "friday_feast_menu.php") || 
				($strPageFilename == "governance.php") || ($strPageFilename == "css_4_beginners.php") || 
				($strPageFilename == "html_4_beginners.php") || ($strPageFilename == "javascript_4_beginners.php") || 
				($strPageFilename == "expression_web_4_beginners.php"));
		
		//return false;
	}
		
	function IsRequestFromLocalNetwork()
	{
		$bResult = true;
		
	    // 1. Get the client's IP address
	    $strClientIP = $_SERVER['REMOTE_ADDR'] ?? '';
	
	    // 2. Immediately validate IP presence
	    if (empty($strClientIP)) 
	    {
	        $bResult = false;
	    }
	    // 3. Handle local loopbacks (same physical machine)
	    else if (($strClientIP === "127.0.0.1") || ($strClientIP === "::1"))
	    {
	        $bResult = true;
	    }
	    else
	    {
		    // 4. Use native PHP filters to check if the IP is NOT global (public)
		    // This flags private ranges (RFC 1918) and reserved link-local ranges
		    $bResult = filter_var(
									$strClientIP, 
									FILTER_VALIDATE_IP, 
									FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
								) === false;
		}
	    return $bResult;
	}
	
	function DoGetParentOrCurrentDir()
	{
		$strCWD = "";
		
		// E.G. index.php or millhouse/index.php or about/about.php or millhouse/about/about.php or 
		if (stripos($_SERVER["REQUEST_URI"], "millhouse") !== false)
		{
			$strCWD = str_replace("/millhouse/", "", strtolower($_SERVER["REQUEST_URI"]));
		}
		else
		{
			$strCWD = substr($_SERVER["REQUEST_URI"], 1);
		}
		// E.G. index.php or index.php or about/about.php or about/about.php or 
		// governance/rules/rules.php
		$nCount = substr_count($strCWD, "/");
		$strCWD = "";
		
		for ($nI = 0; $nI < $nCount; $nI++)
		{
			$strCWD .= "../";
		}
		// E.G. "" or "" or "../" or ".." or "../../"
		return $strCWD;
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** SUBMENU HTML GENERATION FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoShowHideSubmenu($strSubmenuName)
	{	
		$strDisplay = "none";
				
		if (str_contains($_SERVER["REQUEST_URI"], $strSubmenuName . "/"))
			$strDisplay = "block";
		
		return $strDisplay;
	}
	
	function DoGetDontationHTML()
	{
		$strHTML = "";
		$strURI = strtolower($_SERVER["REQUEST_URI"]);

		if (!str_contains($strURI, "donation"))
		{
			$strHTML = "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%;max-width:100%;margin-left:5px;margin-bottom:20px;margin-top:20px;\">\n" .
					  "    <tr>\n" . 
					  "        <td>\n" .
					  "            <img src=\"" . DoGetParentOrCurrentDir() . "images/donate1.png\" alt=\"donate1.png\" class=\"donate_image\" />&nbsp;&nbsp;&nbsp;&nbsp;\n" . 
					  "            <img src=\"" . DoGetParentOrCurrentDir() . "images/donate2.png\" alt=\"donate2.png\" class=\"donate_image\" />\n" . 
					  "        </td>\n" .
					  "    <tr>\n" . 
					  "    <tr>\n" . 
					  "        <td style=\"padding-left:10px;vertical-align:middle;overflow-wrap:word-wrap;white-space:normal;\">\n" . 
					  "            <span class=\"donation_span\">\n" . 
					  "                Click <a href=\"" . DoGetParentOrCurrentDir() . "contribute/why_donate.php\" class=\"blink\">here</a>" . 
					  "                to learn why Millhouse is a worthy cause.\n" . 
					  "            </span>\n" .
					  "        </td>\n" . 
					  "    </tr>\n" .
					  "</table>\n";
		}
		else
		{
			$strHTML = "<p>&nbsp;</p>";
		}
		return $strHTML;
	}
	
	function DoGetDayName($nDOW)
	{
		$strDayName = "";
		
		switch ($nDOW)
		{
			case 1: $strDayName = "Sunday"; break;
			case 2: $strDayName = "Monday"; break;
			case 3: $strDayName = "Tuesday"; break;
			case 4: $strDayName = "Wednesday"; break;
			case 5: $strDayName = "Thursday"; break;
			case 6: $strDayName = "Friday"; break;
			case 7: $strDayName = "Saturday"; break;
		}
		return $strDayName;
	}
														
	//******************************************************************************
	//******************************************************************************
	//** 
	//** XMAS, NEW YEAR & SCHOOLHOIDAYS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function IsXmasNewYear($dateNow = new DateTime())
	{
		$dateNow = $dateNow->format("m/d");
		
		$dateStartXmas = new DateTime("2026-12-25 00:00:00");
		$dateStartXmas = $dateStartXmas->format("m/d");

		$dateEndXmas = new DateTime("2026-12-31 00:00:00");
		$dateEndXmas = $dateEndXmas->format("m/d");

		$dateNewYearsDay = new DateTime("2026-01-01 00:00:00");
		$dateNewYearsDay = $dateNewYearsDay->format("m/d");
		
		return ((($dateNow >= $dateStartXmas) && ($dateNow <= $dateEndXmas)) || ($dateNow == $dateNewYearsDay));
	}
	
	function IsEaster($dateNow = new DateTime())
	{
		$dateNow = new DateTime();		
		$dateNow = $dateNow->format("m/d");
		
		$dateStartEaster = new DateTime();
		$dateStartEaster->setTimestamp(easter_date());

		$dateEndEaster = $dateStartEaster;
		$dateEndEaster->modify('+2 days');
		$dateStartEaster = $dateStartEaster->format("m/d");
		$dateEndEaster = $dateEndEaster->format("m/d");
		
		return (($dateNow >= $dateStartEaster) && ($dateNow <= $dateEndEaster));
	}
	
	function IsSchoolHoliday($dateNow = new DateTime())
	{
		$dateNow = new DateTime();
		$dateNow = $dateNow->format("m/d");
		
		$dateStartAutumn = new DateTime("2026-04-03 00:00:00");
		$dateStartAutumn = $dateStartAutumn->format("m/d");
		$dateEndAutumn = new DateTime("2026-04-19 00:00:00");
		$dateEndAutumn = $dateEndAutumn->format("m/d");
		
		$dateStartWinter = new DateTime("2026-06-27 00:00:00");
		$dateStartWinter = $dateStartWinter->format("m/d");
		$dateEndWinter = new DateTime("2026-07-12 00:00:00");
		$dateEndWinter = $dateEndWinter->format("m/d");

		$dateStartSpring = new DateTime("2026-09-19 00:00:00");
		$dateStartSpring = $dateStartSpring->format("m/d");
		$dateEndSpring = new DateTime("2026-10-04 00:00:00");
		$dateEndSpring = $dateEndSpring->format("m/d");

		$dateStartSummer = new DateTime("2026-12-19 00:00:00");
		$dateStartSummer = $dateStartSummer->format("m/d");
		$dateEndSummer = new DateTime("2026-01-28 00:00:00");
		$dateEndSummer = $dateEndSummer->format("m/d");
		
		return (($dateNow >= $dateStartAutumn) && ($dateNow <= $dateEndAutumn)) || 
				(($dateNow >= $dateStartWinter) && ($dateNow <= $dateEndWinter)) ||
				(($dateNow >= $dateStartSpring) && ($dateNow <= $dateEndSpring)) || 
				(($dateNow >= $dateStartSummer) && ($dateNow <= $dateEndSummer));
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** LOGIN FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function IsLoggedIn()
	{
		return isset($_SESSION["admin_password"]);
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** GENERAL QUERY FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function ConnectToDatabase()
	{
		$dbFindATradie = null;
		global $g_strEmailPresident;
		
		try
		{		
			$dbFindATradie = new mysqli("127.0.0.1", "root", "qDHt7vvFvsOvUPG5", "millhouse_db");
		}
		catch(Exception $e)
		{
			$strMsg = $e->getMessage();
			$strMsg = str_replace("\"", "'", $strMsg);
			PrintJavascriptLine("alert(\"'" . $strMsg . "'\");", 2, true);
			//echo "ERROR: '". $e->getMessage() . "'<br/><br/>Trying to connect to database 'find_a_tradie'.<br/><br/>" . $g_strEmailPresident;
		}
		return $dbFindATradie;
	}
	$g_dbMillhouse = ConnectToDatabase();
	$g_strQuery = "";
	
	function DoCheckTableExists($strTableName)
	{
		global $g_dbMillhouse;
		$bTableExists = false;
		
		$results = DoQuery($g_dbMillhouse, "SHOW TABLES LIKE '" . $strTableName . "'");
		if ($results && ($results->num_rows > 0))
		{
			$bTableExists = true;
		}
		return $bTableExists;
	}
	
	function DoQuery($dbConnection, $strQuery)
	{
		global $g_strEmailPresident;
		$result = NULL;

		try
		{	
			$result = $dbConnection->query($strQuery);		
		}
		catch(Exception $e) 
		{
			PrintJavascriptLine("alert(\"'" . $e->getMessage() . "' with query '" . $strQuery . "'\");", 2, true);
  			//echo "ERROR: '". $e->getMessage() . "'<br><br>With query '" . $strQuery . "'.<br><br>" . $g_strEmailPresident;
		}		
		return $result;
	}

	function DoFindAllQuery($dbConnection, $strTableName, $strCondition = "", $strOrderBy = "", $bAscending = true)
	{
		global $g_strQuery;
		$g_strQuery = "SELECT * FROM " . $strTableName;
		
		if (strcmp($strCondition, "") != 0)
			$g_strQuery = $g_strQuery . " WHERE " . $strCondition;
			
		if (strcmp($strOrderBy, "") != 0)
		{
			$g_strQuery = $g_strQuery . " ORDER BY " . $strOrderBy;
			if ($bAscending)
				$g_strQuery = $g_strQuery . " ASC";
			else
				$g_strQuery = $g_strQuery . " DESC";
		}		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoFindQuery0($dbConnection, $strTableName, $strCondition = "", $strOrderBy = "", $bAscending = true)
	{
		global $g_strQuery;
		$g_strQuery = "SELECT * FROM " . $strTableName;

		if (strlen($strCondition) > 0)
			$g_strQuery = $g_strQuery . " WHERE " . $strCondition;
		if (strlen($strOrderBy) > 0)
		{
			$g_strQuery = $g_strQuery . " ORDER BY " . $strOrderBy;
			if ($bAscending)
			{
				$g_strQuery = $g_strQuery . " ASC";
			}
			else
			{
				$g_strQuery = $g_strQuery . " DESC";
			}
		}
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoFindQuery1($dbConnection, $strTableName, $strColumnName, $strColumnValue, $strCondition = "", $strOrderBy = "", $bAscending = true)
	{
		global $g_strQuery;
		$g_strQuery = "SELECT * FROM " . $strTableName . " WHERE " . $strColumnName . "='" . EscapeSingleQuote($strColumnValue) . "'";

		if (strlen($strCondition) > 0)
			$g_strQuery = $g_strQuery . " AND " . $strCondition;
		if (strlen($strOrderBy) > 0)
		{
			$g_strQuery = $g_strQuery . " ORDER BY " . $strOrderBy;
			if ($bAscending)
			{
				$g_strQuery = $g_strQuery . " ASC";
			}
			else
			{
				$g_strQuery = $g_strQuery . " DESC";
			}
		}
		return DoQuery($dbConnection, $g_strQuery);
	}	
	
	function DoFindQuery2($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strCondition = "", $strOrderBy = "", $bAscending = true)
	{	
		global $g_strQuery;
		$g_strQuery = "SELECT * FROM " . $strTableName . " WHERE " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "' AND " . $strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "'";
	
		if (strlen($strCondition) > 0)
			$g_strQuery = $g_strQuery . " AND " . $strCondition;
		if (strlen($strOrderBy) > 0)
		{
			$g_strQuery = $g_strQuery . " ORDER BY " . $strOrderBy;
			if ($bAscending)
			{
				$g_strQuery = $g_strQuery . " ASC";
			}
			else
			{
				$g_strQuery = $g_strQuery . " DESC";
			}
		}
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoFindQuery3($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strCondition = "", $strOrderBy = "", $bAscending = true)
	{	
		global $g_strQuery;
		$g_strQuery = "SELECT * FROM " . $strTableName . " WHERE " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "' AND " . $strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "' AND " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "'";		
	
		if (strlen($strCondition) > 0)
			$g_strQuery = $g_strQuery . " AND " . $strCondition;
		if (strlen($strOrderBy) > 0)
		{
			$g_strQuery = $g_strQuery . " ORDER BY " . $strOrderBy;
			if ($bAscending)
			{
				$g_strQuery = $g_strQuery . " ASC";
			}
			else
			{
				$g_strQuery = $g_strQuery . " DESC";
			}
		}
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoFindQuery4($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strCondition = "", $strOrderBy = "", $bAscending = true)
	{	
		global $g_strQuery;
		$g_strQuery = "SELECT * FROM " . $strTableName . " WHERE " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "' AND " . $strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "' AND " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "' AND " . $strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "'";		
	
		if (strlen($strCondition) > 0)
			$g_strQuery = $g_strQuery . " AND " . $strCondition;
		if (strlen($strOrderBy) > 0)
		{
			$g_strQuery = $g_strQuery . " ORDER BY " . $strOrderBy;
			if ($bAscending)
			{
				$g_strQuery = $g_strQuery . " ASC";
			}
			else
			{
				$g_strQuery = $g_strQuery . " DESC";
			}
		}
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoFindQuery5($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strCondition = "", $strOrderBy = "", $bAscending = true)
	{	
		global $g_strQuery;
		$g_strQuery = "SELECT * FROM " . $strTableName . " WHERE " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "' AND " . $strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "' AND " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "' AND " . $strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "' AND " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "'";		
	
		if (strlen($strCondition) > 0)
			$g_strQuery = $g_strQuery . " AND " . $strCondition;
		if (strlen($strOrderBy) > 0)
		{
			$g_strQuery = $g_strQuery . " ORDER BY " . $strOrderBy;
			if ($bAscending)
			{
				$g_strQuery = $g_strQuery . " ASC";
			}
			else
			{
				$g_strQuery = $g_strQuery . " DESC";
			}
		}
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoFindQuery6($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strCondition = "", $strOrderBy = "", $bAscending = true)
	{	
		global $g_strQuery;
		$g_strQuery = "SELECT * FROM " . $strTableName . " WHERE " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "' AND " . $strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "' AND " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "' AND " . $strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "' AND " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "' AND " . $strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "'";		
	
		if (strlen($strCondition) > 0)
			$g_strQuery = $g_strQuery . " AND " . $strCondition;
		if (strlen($strOrderBy) > 0)
		{
			$g_strQuery = $g_strQuery . " ORDER BY " . $strOrderBy;
			if ($bAscending)
			{
				$g_strQuery = $g_strQuery . " ASC";
			}
			else
			{
				$g_strQuery = $g_strQuery . " DESC";
			}
		}
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoFindQuery7($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strCondition = "", $strOrderBy = "", $bAscending = true)
	{	
		global $g_strQuery;
		$g_strQuery = "SELECT * FROM " . $strTableName . " WHERE " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "' AND " . $strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "' AND " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "' AND " . $strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "' AND " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "' AND " . $strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "' AND " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "'";		
	
		if (strlen($strCondition) > 0)
			$g_strQuery = $g_strQuery . " AND " . $strCondition;
		if (strlen($strOrderBy) > 0)
		{
			$g_strQuery = $g_strQuery . " ORDER BY " . $strOrderBy;
			if ($bAscending)
			{
				$g_strQuery = $g_strQuery . " ASC";
			}
			else
			{
				$g_strQuery = $g_strQuery . " DESC";
			}
		}
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoFindQuery8($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strCondition = "", $strOrderBy = "", $bAscending = true)
	{	
		global $g_strQuery;
		$g_strQuery = "SELECT * FROM " . $strTableName . " WHERE " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "' AND " . $strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "' AND " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "' AND " . $strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "' AND " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "' AND " . $strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "' AND " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "' AND " . $strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "'";		
	
		if (strlen($strCondition) > 0)
			$g_strQuery = $g_strQuery . " AND " . $strCondition;
		if (strlen($strOrderBy) > 0)
		{
			$g_strQuery = $g_strQuery . " ORDER BY " . $strOrderBy;
			if ($bAscending)
			{
				$g_strQuery = $g_strQuery . " ASC";
			}
			else
			{
				$g_strQuery = $g_strQuery . " DESC";
			}
		}
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertFindQuery1($dbConnection, $strQuery, $strTableName, $strColumnName, $strColumnValue)
	{
		$result = DoFindQuery1($dbConnection, $strTableName, $strColumnName, $strColumnValue);
		if ($result->num_rows == 0)
			$result = $dbConnection->query($strQuery);	
		
		return $result;
	}

	function DoInsertFindQuery2($dbConnection, $strQuery, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2)
	{
		$result = DoFindQuery($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2);
		if ($result->num_rows == 0)
			$result = $dbConnection->query($strQuery);
		
		return $result;
	}

	function DoInsertFindQuery3($dbConnection, $strQuery, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3)
	{		
		$result = DoFindQuery($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3);
		if ($result->num_rows == 0)
			$result = $dbConnection->query($strQuery);
		
		return $result;
	}
	
	function DoUpdateQuery1($dbConnection, $strTableName, $strColumnName, $strColumnValue, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName . "='" . EscapeSingleQuote($strColumnValue) . "' WHERE " . 
			$strFindColumnName . "='" . $strFindColumnValue . "'";
	
		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery2($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "'," . 
			$strColumnName2 . "='" .  $strColumnValue2 . "' WHERE " . 
			$strFindColumnName . "='" . EscapeSingleQuote($strFindColumnValue) . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery3($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "'," . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "'," . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoUpdateQuery4($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "'," . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "'," . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "'," .
			$strColumnName4 . "='" .  $strColumnValue4 . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoUpdateQuery5($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery6($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . 
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) .
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoUpdateQuery7($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) .
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoUpdateQuery8($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . 
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " .
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoUpdateQuery9($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "', " .
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " . $strColumnName9 . "='" . EscapeSingleQuote($strColumnValue9) . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoUpdateQuery10($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "', " .
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " . $strColumnName9 . "='" . EscapeSingleQuote($strColumnValue9) . "', " .
			$strColumnName10 . "='" . EscapeSingleQuote($strColumnValue10) . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery11($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "', " .
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " . $strColumnName9 . "='" . EscapeSingleQuote($strColumnValue9) . "', " .
			$strColumnName10 . "='" . EscapeSingleQuote($strColumnValue10) . "', " . $strColumnName11 . "='" . EscapeSingleQuote($strColumnValue11) .
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery12($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "', " .
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " . $strColumnName9 . "='" . EscapeSingleQuote($strColumnValue9) . "', " .
			$strColumnName10 . "='" . EscapeSingleQuote($strColumnValue10) . "', " . $strColumnName11 . "='" . EscapeSingleQuote($strColumnValue11) .
			$strColumnName12 . "='" . EscapeSingleQuote($strColumnValue12) .
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery13($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "', " .
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " . $strColumnName9 . "='" . EscapeSingleQuote($strColumnValue9) . "', " .
			$strColumnName10 . "='" . EscapeSingleQuote($strColumnValue10) . "', " . $strColumnName11 . "='" . EscapeSingleQuote($strColumnValue11) . "', " .
			$strColumnName12 . "='" . EscapeSingleQuote($strColumnValue12) . $strColumnName13 . "='" . EscapeSingleQuote($strColumnValue13) . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery14($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "', " .
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " . $strColumnName9 . "='" . EscapeSingleQuote($strColumnValue9) . "', " .
			$strColumnName10 . "='" . EscapeSingleQuote($strColumnValue10) . "', " . $strColumnName11 . "='" . EscapeSingleQuote($strColumnValue11) . "', " .
			$strColumnName12 . "='" . EscapeSingleQuote($strColumnValue12) . $strColumnName13 . "='" . EscapeSingleQuote($strColumnValue13) . 
			$strColumnName14 . "='" . EscapeSingleQuote($strColumnValue14) . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery15($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14, $strColumnName15, $strColumnValue15, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;

		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "', " .
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " . $strColumnName9 . "='" . EscapeSingleQuote($strColumnValue9) . "', " .
			$strColumnName10 . "='" . EscapeSingleQuote($strColumnValue10) . "', " . $strColumnName11 . "='" . EscapeSingleQuote($strColumnValue11) . "', " .
			$strColumnName12 . "='" . EscapeSingleQuote($strColumnValue12) . "', " . $strColumnName13 . "='" . EscapeSingleQuote($strColumnValue13) . "', " .
			$strColumnName14 . "='" . EscapeSingleQuote($strColumnValue14) . "', " . $strColumnName15 . "='" . EscapeSingleQuote($strColumnValue15) . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery16($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14, $strColumnName15, $strColumnValue15, $strColumnName16, $strColumnValue16, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;

		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "', " .
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " . $strColumnName9 . "='" . EscapeSingleQuote($strColumnValue9) . "', " .
			$strColumnName10 . "='" . EscapeSingleQuote($strColumnValue10) . "', " . $strColumnName11 . "='" . EscapeSingleQuote($strColumnValue11) . "', " .
			$strColumnName12 . "='" . EscapeSingleQuote($strColumnValue12) . "', " . $strColumnName13 . "='" . EscapeSingleQuote($strColumnValue13) . "', " .
			$strColumnName14 . "='" . EscapeSingleQuote($strColumnValue14) . "', " . $strColumnName15 . "='" . EscapeSingleQuote($strColumnValue15) . "', " . 
			$strColumnName16 . "='" . EscapeSingleQuote($strColumnValue16) . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery17($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14, $strColumnName15, $strColumnValue15, $strColumnName16, $strColumnValue16, $strColumnName17, $strColumnValue17, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;

		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "', " .
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " . $strColumnName9 . "='" . EscapeSingleQuote($strColumnValue9) . "', " .
			$strColumnName10 . "='" . EscapeSingleQuote($strColumnValue10) . "', " . $strColumnName11 . "='" . EscapeSingleQuote($strColumnValue11) . "', " .
			$strColumnName12 . "='" . EscapeSingleQuote($strColumnValue12) . "', " . $strColumnName13 . "='" . EscapeSingleQuote($strColumnValue13) . "', " .
			$strColumnName14 . "='" . EscapeSingleQuote($strColumnValue14) . "', " . $strColumnName15 . "='" . EscapeSingleQuote($strColumnValue15) . "', " . 
			$strColumnName16 . "='" . EscapeSingleQuote($strColumnValue16) . "', " . $strColumnName17 . "='" . EscapeSingleQuote($strColumnValue17) . "', " . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery18($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14, $strColumnName15, $strColumnValue15, $strColumnName16, $strColumnValue16, $strColumnName17, $strColumnValue17, $strColumnName18, $strColumnValue18, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;

		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "', " .
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " . $strColumnName9 . "='" . EscapeSingleQuote($strColumnValue9) . "', " .
			$strColumnName10 . "='" . EscapeSingleQuote($strColumnValue10) . "', " . $strColumnName11 . "='" . EscapeSingleQuote($strColumnValue11) . "', " .
			$strColumnName12 . "='" . EscapeSingleQuote($strColumnValue12) . "', " . $strColumnName13 . "='" . EscapeSingleQuote($strColumnValue13) . "', " .
			$strColumnName14 . "='" . EscapeSingleQuote($strColumnValue14) . "', " . $strColumnName15 . "='" . EscapeSingleQuote($strColumnValue15) . "', " . 
			$strColumnName16 . "='" . EscapeSingleQuote($strColumnValue16) . "', " . $strColumnName17 . "='" . EscapeSingleQuote($strColumnValue17) . "', " . 
			$strColumnName18 . "='" . EscapeSingleQuote($strColumnValue18) . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoUpdateQuery19($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14, $strColumnName15, $strColumnValue15, $strColumnName16, $strColumnValue16, $strColumnName17, $strColumnValue17, $strColumnName18, $strColumnValue18, $strColumnName19, $strColumnValue19, $strFindColumnName, $strFindColumnValue)
	{
		global $g_strQuery;

		$g_strQuery = "UPDATE " . $strTableName . " SET " . $strColumnName1 . "='" . EscapeSingleQuote($strColumnValue1) . "', " . 
			$strColumnName2 . "='" . EscapeSingleQuote($strColumnValue2) . "', " . $strColumnName3 . "='" . EscapeSingleQuote($strColumnValue3) . "', " .
			$strColumnName4 . "='" . EscapeSingleQuote($strColumnValue4) . "', " . $strColumnName5 . "='" . EscapeSingleQuote($strColumnValue5) . "', " .
			$strColumnName6 . "='" . EscapeSingleQuote($strColumnValue6) . "', " . $strColumnName7 . "='" . EscapeSingleQuote($strColumnValue7) . "', " .
			$strColumnName8 . "='" . EscapeSingleQuote($strColumnValue8) . "', " . $strColumnName9 . "='" . EscapeSingleQuote($strColumnValue9) . "', " .
			$strColumnName10 . "='" . EscapeSingleQuote($strColumnValue10) . "', " . $strColumnName11 . "='" . EscapeSingleQuote($strColumnValue11) . "', " .
			$strColumnName12 . "='" . EscapeSingleQuote($strColumnValue12) . "', " . $strColumnName13 . "='" . EscapeSingleQuote($strColumnValue13) . "', " .
			$strColumnName14 . "='" . EscapeSingleQuote($strColumnValue14) . "', " . $strColumnName15 . "='" . EscapeSingleQuote($strColumnValue15) . "', " . 
			$strColumnName16 . "='" . EscapeSingleQuote($strColumnValue16) . "', " . $strColumnName17 . "='" . EscapeSingleQuote($strColumnValue17) . "', " . 
			$strColumnName18 . "='" . EscapeSingleQuote($strColumnValue18) . "', " . $strColumnName19 . "='" . EscapeSingleQuote($strColumnValue19) . "', " . 
			"' WHERE " . $strFindColumnName . "='" . $strFindColumnValue . "'";

		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoDeleteQuery($dbConnection, $strTableName, $strColumnName, $strColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "DELETE FROM " . $strTableName . " WHERE " . $strColumnName . "='" . EscapeSingleQuote($strColumnValue) . "'";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery1($dbConnection, $strTableName, $strColumnName, $strColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName . ") VALUES('" . 
						EscapeSingleQuote($strColumnValue) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoInsertQuery2($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . ") VALUES('" . 
						EscapeSingleQuote($strColumnValue1) . "','" . EscapeSingleQuote($strColumnValue2) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}

	function DoInsertQuery3($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . ") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery4($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . ") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "','" . 
						EscapeSingleQuote($strColumnValue4) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery5($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . ") VALUES('" . 
						EscapeSingleQuote($strColumnValue1) . "','" . EscapeSingleQuote($strColumnValue2) . "','" . 
						EscapeSingleQuote($strColumnValue3) . "','" . EscapeSingleQuote($strColumnValue4) . "','" . 
						EscapeSingleQuote($strColumnValue5) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery6($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . 
						") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . EscapeSingleQuote($strColumnValue2) . "','" . 
						EscapeSingleQuote($strColumnValue3) . "','" . EscapeSingleQuote($strColumnValue4) . "','" . 
						EscapeSingleQuote($strColumnValue5) . "','" . EscapeSingleQuote($strColumnValue6) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery7($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . ") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "','" . 
						EscapeSingleQuote($strColumnValue4) . "','" . EscapeSingleQuote($strColumnValue5) . "','" . 
						EscapeSingleQuote($strColumnValue6) . "','" . EscapeSingleQuote($strColumnValue7) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery8($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . ") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "','" . 
						EscapeSingleQuote($strColumnValue4) . "','" . EscapeSingleQuote($strColumnValue5) . "','" . 
						EscapeSingleQuote($strColumnValue6) . "','" . EscapeSingleQuote($strColumnValue7) . "','" . 
						EscapeSingleQuote($strColumnValue8) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery9($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . "," . $strColumnName9 . ") VALUES('" . 
						EscapeSingleQuote($strColumnValue1) . "','" . EscapeSingleQuote($strColumnValue2) . "','" . 
						EscapeSingleQuote($strColumnValue3) . "','" . EscapeSingleQuote($strColumnValue4) . "','" . 
						EscapeSingleQuote($strColumnValue5) . "','" . EscapeSingleQuote($strColumnValue6) . "','" . 
						EscapeSingleQuote($strColumnValue7) . "','" . EscapeSingleQuote($strColumnValue8) . "','" . 
						EscapeSingleQuote($strColumnValue9) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery10($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . "," . $strColumnName9 . "," . $strColumnName10 . 
						") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . EscapeSingleQuote($strColumnValue2) . "','" . 
						EscapeSingleQuote($strColumnValue3) . "','" . EscapeSingleQuote($strColumnValue4) . "','" . 
						EscapeSingleQuote($strColumnValue5) . "','" . EscapeSingleQuote($strColumnValue6) . "','" . 
						EscapeSingleQuote($strColumnValue7) . "','" . EscapeSingleQuote($strColumnValue8) . "','" . 
						EscapeSingleQuote($strColumnValue9)  . "','" . EscapeSingleQuote($strColumnValue10) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery11($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . "," . $strColumnName9 . "," . $strColumnName10 . "," . 
						$strColumnName11 . ") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "','" . 
						EscapeSingleQuote($strColumnValue4) . "','" . EscapeSingleQuote($strColumnValue5) . "','" . 
						EscapeSingleQuote($strColumnValue6) . "','" . EscapeSingleQuote($strColumnValue7) . "','" . 
						EscapeSingleQuote($strColumnValue8) . "','" . EscapeSingleQuote($strColumnValue9)  . "','" . 
						EscapeSingleQuote($strColumnValue10) . "','" . EscapeSingleQuote($strColumnValue11) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery12($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnName12, $strColumnValue12)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . "," . $strColumnName9 . "," . $strColumnName10 . "," . 
						$strColumnName11 . "," . $strColumnName12 . ") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "','" . 
						EscapeSingleQuote($strColumnValue4) . "','" . EscapeSingleQuote($strColumnValue5) . "','" . 
						EscapeSingleQuote($strColumnValue6) . "','" . EscapeSingleQuote($strColumnValue7) . "','" . 
						EscapeSingleQuote($strColumnValue8) . "','" . EscapeSingleQuote($strColumnValue9)  . "','" . 
						EscapeSingleQuote($strColumnValue10) . "','" . EscapeSingleQuote($strColumnValue11) . "','" . 
						EscapeSingleQuote($strColumnValue12) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery13($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . "," . $strColumnName9 . "," . $strColumnName10 . "," . 
						$strColumnName11 . "," . $strColumnName12 . "," . $strColumnName13. ") VALUES('" . 
						EscapeSingleQuote($strColumnValue1) . "','" . EscapeSingleQuote($strColumnValue2) . "','" . 
						EscapeSingleQuote($strColumnValue3) . "','" . EscapeSingleQuote($strColumnValue4) . "','" . 
						EscapeSingleQuote($strColumnValue5) . "','" . EscapeSingleQuote($strColumnValue6) . "','" . 
						EscapeSingleQuote($strColumnValue7) . "','" . EscapeSingleQuote($strColumnValue8) . "','" . 
						EscapeSingleQuote($strColumnValue9)  . "','" . EscapeSingleQuote($strColumnValue10) . "','" . 
						EscapeSingleQuote($strColumnValue11) . "','" . EscapeSingleQuote($strColumnValue12) . "','" . 
						EscapeSingleQuote($strColumnValue13) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery14($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . "," . $strColumnName9 . "," . $strColumnName10 . "," . 
						$strColumnName11 . "," . $strColumnName12 . "," . $strColumnName13 . "," . $strColumnName14 . 
						") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "','" . 
						EscapeSingleQuote($strColumnValue4) . "','" . EscapeSingleQuote($strColumnValue5) . "','" . 
						EscapeSingleQuote($strColumnValue6) . "','" . EscapeSingleQuote($strColumnValue7) . "','" . 
						EscapeSingleQuote($strColumnValue8) . "','" . EscapeSingleQuote($strColumnValue9)  . "','" . 
						EscapeSingleQuote($strColumnValue10) . "','" . EscapeSingleQuote($strColumnValue11) . "','" . 
						EscapeSingleQuote($strColumnValue12) . "','" . EscapeSingleQuote($strColumnValue13) . "','" . 
						EscapeSingleQuote($strColumnValue14) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery15($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14, $strColumnName15, $strColumnValue15)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . "," . $strColumnName9 . "," . $strColumnName10 . "," . 
						$strColumnName11 . "," . $strColumnName12 . "," . $strColumnName13 . "," . $strColumnName14 . "," . 
						$strColumnName15 . ") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "','" . 
						EscapeSingleQuote($strColumnValue4) . "','" . EscapeSingleQuote($strColumnValue5) . "','" . 
						EscapeSingleQuote($strColumnValue6) . "','" . EscapeSingleQuote($strColumnValue7) . "','" . 
						EscapeSingleQuote($strColumnValue8) . "','" . EscapeSingleQuote($strColumnValue9)  . "','" . 
						EscapeSingleQuote($strColumnValue10) . "','" . EscapeSingleQuote($strColumnValue11) . "','" . 
						EscapeSingleQuote($strColumnValue12) . "','" . EscapeSingleQuote($strColumnValue13) . "','" . 
						EscapeSingleQuote($strColumnValue14) . "','" . EscapeSingleQuote($strColumnValue15) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery16($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14, $strColumnName15, $strColumnValue15, $strColumnName16, $strColumnValue16)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . "," . $strColumnName9 . "," . $strColumnName10 . "," . 
						$strColumnName11 . "," . $strColumnName12 . "," . $strColumnName13 . "," . $strColumnName14 . "," . 
						$strColumnName15 . "," . $strColumnName16 . ") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "','" . 
						EscapeSingleQuote($strColumnValue4) . "','" . EscapeSingleQuote($strColumnValue5) . "','" . 
						EscapeSingleQuote($strColumnValue6) . "','" . EscapeSingleQuote($strColumnValue7) . "','" . 
						EscapeSingleQuote($strColumnValue8) . "','" . EscapeSingleQuote($strColumnValue9)  . "','" . 
						EscapeSingleQuote($strColumnValue10) . "','" . EscapeSingleQuote($strColumnValue11) . "','" . 
						EscapeSingleQuote($strColumnValue12) . "','" . EscapeSingleQuote($strColumnValue13) . "','" . 
						EscapeSingleQuote($strColumnValue14) . "','" . EscapeSingleQuote($strColumnValue15) . "','" . 
						EscapeSingleQuote($strColumnValue16) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery17($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14, $strColumnName15, $strColumnValue15, $strColumnName16, $strColumnValue16, $strColumnName17, $strColumnValue17)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . "," . $strColumnName9 . "," . $strColumnName10 . "," . 
						$strColumnName11 . "," . $strColumnName12 . "," . $strColumnName13 . "," . $strColumnName14 . "," . 
						$strColumnName15 . "," . $strColumnName16. "," . $strColumnName17 . 
						") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "','" . 
						EscapeSingleQuote($strColumnValue4) . "','" . EscapeSingleQuote($strColumnValue5) . "','" . 
						EscapeSingleQuote($strColumnValue6) . "','" . EscapeSingleQuote($strColumnValue7) . "','" . 
						EscapeSingleQuote($strColumnValue8) . "','" . EscapeSingleQuote($strColumnValue9)  . "','" . 
						EscapeSingleQuote($strColumnValue10) . "','" . EscapeSingleQuote($strColumnValue11) . "','" . 
						EscapeSingleQuote($strColumnValue12) . "','" . EscapeSingleQuote($strColumnValue13) . "','" . 
						EscapeSingleQuote($strColumnValue14) . "','" . EscapeSingleQuote($strColumnValue15) . "','" . 
						EscapeSingleQuote($strColumnValue16) . "','" . EscapeSingleQuote($strColumnValue17) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery18($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14, $strColumnName15, $strColumnValue15, $strColumnName16, $strColumnValue16, $strColumnName17, $strColumnValue17, $strColumnName18, $strColumnValue18)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . "," . $strColumnName9 . "," . $strColumnName10 . "," . 
						$strColumnName11 . "," . $strColumnName12 . "," . $strColumnName13 . "," . $strColumnName14 . "," . 
						$strColumnName15 . "," . $strColumnName16 . "," . $strColumnName17. "," . $strColumnName18 . 
						") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "','" . 
						EscapeSingleQuote($strColumnValue4) . "','" . EscapeSingleQuote($strColumnValue5) . "','" . 
						EscapeSingleQuote($strColumnValue6) . "','" . EscapeSingleQuote($strColumnValue7) . "','" . 
						EscapeSingleQuote($strColumnValue8) . "','" . EscapeSingleQuote($strColumnValue9)  . "','" . 
						EscapeSingleQuote($strColumnValue10) . "','" . EscapeSingleQuote($strColumnValue11) . "','" . 
						EscapeSingleQuote($strColumnValue12) . "','" . EscapeSingleQuote($strColumnValue13) . "','" . 
						EscapeSingleQuote($strColumnValue14) . "','" . EscapeSingleQuote($strColumnValue15) . "','" . 
						EscapeSingleQuote($strColumnValue16) . "','" . EscapeSingleQuote($strColumnValue17) . "','" . 
						EscapeSingleQuote($strColumnValue18) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoInsertQuery19($dbConnection, $strTableName, $strColumnName1, $strColumnValue1, $strColumnName2, $strColumnValue2, $strColumnName3, $strColumnValue3, $strColumnName4, $strColumnValue4, $strColumnName5, $strColumnValue5, $strColumnName6, $strColumnValue6, $strColumnName7, $strColumnValue7, $strColumnName8, $strColumnValue8, $strColumnName9, $strColumnValue9, $strColumnName10, $strColumnValue10, $strColumnName11, $strColumnValue11, $strColumnName12, $strColumnValue12, $strColumnName13, $strColumnValue13, $strColumnName14, $strColumnValue14, $strColumnName15, $strColumnValue15, $strColumnName16, $strColumnValue16, $strColumnName17, $strColumnValue17, $strColumnName18, $strColumnValue18, $strColumnName19, $strColumnValue19)
	{
		global $g_strQuery;
		$g_strQuery = "INSERT INTO " . $strTableName . "(" . $strColumnName1 . "," . $strColumnName2 . "," . 
						$strColumnName3 . "," . $strColumnName4 . "," . $strColumnName5 . "," . $strColumnName6 . "," . 
						$strColumnName7 . "," . $strColumnName8 . "," . $strColumnName9 . "," . $strColumnName10 . "," . 
						$strColumnName11 . "," . $strColumnName12 . "," . $strColumnName13 . "," . $strColumnName14 . "," . 
						$strColumnName15 . "," . $strColumnName16. "," . $strColumnName17. "," . $strColumnName18. "," . 
						$strColumnName19 . ") VALUES('" . EscapeSingleQuote($strColumnValue1) . "','" . 
						EscapeSingleQuote($strColumnValue2) . "','" . EscapeSingleQuote($strColumnValue3) . "','" . 
						EscapeSingleQuote($strColumnValue4) . "','" . EscapeSingleQuote($strColumnValue5) . "','" . 
						EscapeSingleQuote($strColumnValue6) . "','" . EscapeSingleQuote($strColumnValue7) . "','" . 
						EscapeSingleQuote($strColumnValue8) . "','" . EscapeSingleQuote($strColumnValue9)  . "','" . 
						EscapeSingleQuote($strColumnValue10) . "','" . EscapeSingleQuote($strColumnValue11) . "','" . 
						EscapeSingleQuote($strColumnValue12) . "','" . EscapeSingleQuote($strColumnValue13) . "','" . 
						EscapeSingleQuote($strColumnValue14) . "','" . EscapeSingleQuote($strColumnValue15) . "','" . 
						EscapeSingleQuote($strColumnValue16) . "','" . EscapeSingleQuote($strColumnValue17) . "','" . 
						EscapeSingleQuote($strColumnValue18) . "','" . EscapeSingleQuote($strColumnValue19) . "')";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoDeleteQuery1($dbConnection, $strTableName, $strColumnName, $strColumnValue)
	{
		global $g_strQuery;
		$g_strQuery = "DELETE FROM " . $strTableName . " WHERE " . $strColumnName . "='" . EscapeSingleQuote($strColumnValue) . "'";
		
		return DoQuery($dbConnection, $g_strQuery);
	}
	
	function DoGetLastInserted($strTable, $strPrimaryKey)
	{
		global $g_dbMillhouse;
		global $g_strQuery;
		$row = NULL;
		
		$g_strQuery = "SELECT * FROM " . $strTable . " ORDER BY shortkey DESC";
		$results = DoQuery($g_dbMillhouse, $g_strQuery);
		if ($results && ($results->num_rows > 0))
		{
			$row = $results->fetch_assoc();
		}
		return $row;
	}
	
	//******************************************************************************
	//******************************************************************************
	//** 
	//** FORMATING FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
		
	function PrintIndents($nNum)
	{
		for ($nI = 0; $nI < $nNum; $nI++)
			echo "\t";
	}
	
	function PrintJavascriptLine($strCode, $nNumIndents, $bScriptTags)
	{
		if ($bScriptTags)
		{
			PrintIndents($nNumIndents);
			echo "<script type=\"text/javascript\">\n";
			PrintIndents($nNumIndents + 1);
			echo $strCode . "\n";
			PrintIndents($nNumIndents);
			echo "</script>\n";
		}
		else
		{
			PrintIndents($nNumIndents);
			echo $strCode . "\n";
		}
	}

	function EscapeSingleQuote($strText)
	{
		return str_replace("'", "''", $strText);
	}

	function EscapeDoubbleQuote($strText)
	{
		return str_replace("\"", "\\\"", $strText);
	}

	//******************************************************************************
	//******************************************************************************
	//** 
	//** SPONSOR MARQUEE FUNCTIONS
	//** 
	//******************************************************************************
	//******************************************************************************
	
	function DoDisplaySponsorMarquee()
	{
		$strPage = strtolower($_SERVER["REQUEST_URI"]);
		
		if (($strPage == "/") || ($strPage == "/millhouse/") || 
			str_contains($strPage, "index"))
		{
			echo "<hr/>\n";
			echo "<h1>Our Sponsors</h1>\n";
			echo "<p>Our activitiess & programs are generously funded by the following sponsors.</p>\n";				
			echo "<div id=\"advert_marquee\" class=\"advert_marquee\">\n";
			echo DoGenerateAdvertSlotHTML();
			echo "</div>\n";
			echo "<hr/>\n";
		}
	}
	
	function DoGetAdvertSlotName()
	{
		$strAdvertSlotName = basename($_SERVER['PHP_SELF']);
		$nPos = strpos($strAdvertSlotName, ".");
		
		if ($nPos !== FALSE)
		{
			$strAdvertSlotName = substr($strAdvertSlotName, 0, $nPos);
		}
		return $strAdvertSlotName;
	}
	
	function DoGenerateAdvertSlotHTML()
	{
		global $g_dbMillhouse;
		$strHTML = "";
		$strAdvertHTML = "";
		$strAdvertSlotName = DoGetAdvertSlotName();
		$strAdvertExpires = "";
		$resultsAdvertSlots = NULL;
		$resultsAdverts = NULL;
				
		if (DoCheckTableExists("adverts") && DoCheckTableExists("advert_slots"))
		{		
			$resultsAdvertSlots = DoQuery($g_dbMillhouse, "SELECT * FROM advert_slots WHERE id LIKE '" . $strAdvertSlotName . "%';");
			if ($resultsAdvertSlots && ($resultsAdvertSlots->num_rows > 0))
			{
				while ($rowAdvertSlot = $resultsAdvertSlots->fetch_assoc())
				{
					$resultsAdverts = DoFindQuery1($g_dbMillhouse, "adverts", "advert_slot_id", $rowAdvertSlot["id"]);
					
					if ($resultsAdverts && ($resultsAdverts->num_rows > 0))
					{
						$dateNow = new DateTime();
						$dateExpiry = NULL;
					
						while ($rowAdvert = $resultsAdverts->fetch_assoc())
						{
							if ($rowAdvert["expiry_date"] !== NULL)
								$dateExpiry = new DateTime($rowAdvert["expiry_date"]);
							else
								$dateExpiry = new DateTime("2050-01-01");
							
							if ($dateExpiry > $dateNow)
							{
$strAdvertHTML = "<a href=\"\" onclick=\"DoClickAdvert('" . 
					$rowAdvert["website"] . "', '" . $rowAdvert["advert_slot_id"] . "')\">" . 
					"<img class=\"advert_image\" src=\"" . DoGetParentOrCurrentDir() . "sponsors/images/" . $rowAdvert["logo_image"] . "\" alt=\"" . $rowAdvert["logo_image"] . "\" \></a>" . 
					"<div class=\"advert_expires\" id=\"advert_expires_" . 
					$rowAdvert["advert_slot_id"] . "\" onmouseleave=\"DoMouseLeaveExpiresDiv(this)\"\">Sponsorship valid until" . 
					$dateExpiry->format("l jS F Y") . "<br/>Clicks: " . (int)$rowAdvert["clicks"] . "</div>\n";
							}
						}
					}
					else
					{
						$strAdvertHTML = "    <button type=\"button\" onclick=\"DoClickRequestAdvert('" . $strAdvertSlotName . "', '" . $rowAdvertSlot["id"] . "')\" class=\"advert_button\">\n" . 
										"            <img class=\"advert_button_image\" src=\"" . DoGetParentOrCurrentDir() . "images/sponsor.png\" alt=\"sponsor.png\" />\n" . 
										"        </button>\n";
						$strAdvertExpires = "";
					}
					$strHTML .= "<div class=\"advert_slot\" id=\"advert_slot_" . $rowAdvertSlot["id"] . "\" " . 
					
					/*"onmouseenter=\"DoMouseEnterAdvertSlot('advert_expires_" . $rowAdvertSlot["id"] . "')\" " . 
					"onmouseleave=\"DoMouseLeaveAdvertSlot('advert_expires_" . $rowAdvertSlot["id"] . "')\">\n" . "    " . */
					$strAdvertHTML . "</div>\n";
				}
			}
		}
		return $strHTML;
	}
	
	function DoGetAdvertSlotOptions($strAdvertSlotID)
	{
		global $g_dbMillhouse;
		$strHTML = "";
		$bAdvertSlotTableExists = DoCheckTableExists("advert_slots");
		$bAdvertTableExists = DoCheckTableExists("adverts");
		$strCurrentAdvertSlotID = "";
		$strDisabled = "";
		$strDisabledText = "";
		$strSelected = "";
		
		if ($bAdvertSlotTableExists && $bAdvertTableExists)
		{
			$results = DoFindAllQuery($g_dbMillhouse, "advert_slots");

			if ($results && ($results->num_rows > 0))
			{
				while ($row = $results->fetch_assoc())
				{
					if ($strAdvertSlotID === $row["id"])
						$strSelected = "selected";
					else
						$strSelected = "";
					
					$strDateExpiry = "";
					if (IsAdvertSlotTaken($row["id"], $strDateExpiry))
					{
						$strDisabled = "disabled";
						$strDisabledText = "(taken until " . $strDateExpiry . ")";
					}
					else
					{
						$strDisabled = "";
						$strDisabledText = "";
					}
					$strHTML .= "    <option value=\"" .  $row["id"] . "\" " . $strSelected . " " . $strDisabled . ">" . $row["desc"]  . " " . $strDisabledText . "</option>\n";
				}
			}
		}
		return $strHTML;
	}
		
	function IsAdvertSlotTaken($strAdvertSlotID, &$stExpiryDate)
	{
		$bTaken = false;
		global $g_dbMillhouse;

		$results = DoFindQuery1($g_dbMillhouse, "adverts", "advert_slot_id", $strAdvertSlotID);
		if ($results && ($results->num_rows > 0))
		{
			$dateNow = new DateTime();
			
			while ($row = $results->fetch_assoc())
			{
				$dateExpiry = new DateTime($row["expiry_date"]);
				if ($dateExpiry > $dateNow)
				{
					$stExpiryDate = $dateExpiry->format("d/m/Y");					
					$bTaken = true;
					break;
				}
			}
		}
		return $bTaken;
	}
	
?>

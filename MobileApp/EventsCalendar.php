<?php

	require_once "../common.php";
	
	function DoGetEvents()
	{
		global $g_dbMillhouse;
		
		if (isset($_GET["submit_get_events"]))
		{
			$dateEvents = DoGetMelbourneTimeNow();
			$dateEvents->setDate((int)$_GET["text_year"], (int)$_GET["text_month"], (int)$_GET["text_day"]);
			$nDOW = (int)$dateEvents->format("N");
			
			$results = DoFindAllQuery($g_dbMillhouse, "groups");
			if ($results && ($results->num_rows > 0))
			{
				echo "<ul>\n";
				while ($row = $results->fetch_assoc())
				{
					if (($row["dow1"] == $nDOW) || ($row["dow2"] == $nDOW) || 
						(($row["dow1"] == 0) && ($nDOW != 1) && ($nDOW != 7)))
					{
						$strTime1 = DoGetStartTime($row["time1"]) . " to " . DoGetEndTime($row["time1"], $row["duration"], false);
						$strTime2 = DoGetStartTime($row["time2"]) . " to " . DoGetEndTime($row["time2"], $row["duration"], false);
						 
/* function DoClickEvent(event, strGroupName, strTime1, strTime2, strDuration, strCost, strDonation, strFacebook, 
						strContact, strEmail, strPhone, strPurpose, strImageFilename)
*/
						echo "<li><a href=\"#\" onclick=\"try{DoClickEvent(event, '" . $row["description"] . "', " . 
								"'" . $strTime1 . "', '" . $strTime2 . "', " . 
								"'" . (int)$row["duration"] . "', '$" . number_format((float)$row["cost"], 2) . "', " . 
								"'" . (($row["donation"] == 1) ? "true" : "false") . "', '" . $row["facebook"] . "', " . 
								"'" . $row["contact"] . "', '" . $row["email"] . "', '" . $row["phone"] . "', " . 
								"'" . $row["purpose"] . "', '" . DoGetPhotoFilename($row["name"]) . "');}catch (error){window.AppInventor.setWebViewString(error.message);}\">" . $row["description"] . "</a></li><br/>";
					}
				}
				echo "</ul>\n";
			}
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<link id="style_sheet" href="../styles/event_popup.css" rel="stylesheet" type="text/css" />
		<link rel="icon" sizes="128x128" href="../favicon.jpg" />
		<script type="text/javascript">
			
			<?php require "../common.js"; ?>
			
		</script>
		<title>Events For Date</title>
		<style type="text/css">
		
			a
			{
				color: rgba(205,26,120,1);
				font-size: large;
			};
			
			ul li::marker
			{
				color: /*rgba(249,139,11,1)*/blue;
			}
			
			a:hover,
			a:active
			{
				color: rgba(249,139,11,1);
			}
			
			.event_popup_container
			{
				display: none;
				position: fixed; /* Positions the element relative to the browser window */
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%); /* Centers the popup */
				z-index: 1000; /* Ensures it is above other elements */
			
				background-color: color-mix(in srgb, rgba(249,139,11,1), white 40%);
				border-style: solid;
				border-width: medium;
				border-color: rgba(205,26,120,1);
				border-radius: 5px;
				padding: 10px;
				width: 320px;
				max-height: 460px;
				overflow: auto;
			};
			
			.event_popup_container p
			{
				font-size: small;
			}
				
			.event_popup_heading
			{
				font-size: 18px;
				color: rgba(205,26,120,1);
				text-decoration-color: rgba(205,26,120,1);
			}
			
		</style>
	</head>
	
	<body>
	
		<?php 
		
			require "../calendar/event_popup.html";
			DoGetEvents(); 
		
		?>
	
	</body>
	
</html>

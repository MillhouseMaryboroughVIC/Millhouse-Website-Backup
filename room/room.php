<?php

	/****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************
	 **** SARAH PLEASE NOTE
	 **** 
	 **** Don't change this PHP code. It is responsible for processing the book a room form.
	 ****
	 ****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************/

	require_once "../common.php";

	DoRecordPageHitOrBlock();

	function DoProcessFormData()
	{
		$strText = "";						
		
		if (isset($_POST["button_submit"]))
		{
			if (mail($g_strEmailManager, "I'd like to book a room please...", "ROOM: " . $_POST["select_room"] . 
					"\nDATE: " . $_POST["date_start"] . " for " .  $_POST["text_number_days"] . " days" . 
					"\TIME: " . $_POST["time_start"] . " for " . $_POST["text_number_hours"] . " hours" .
					"\nONGOING: " . $_POST["select_ongoing"] .
					"\nNAME: " . $_POST["text_name"] . "\nEMAIL ADDRESS: " . $_POST["text_email"] . 
					"\nPHONE NUMBER: " . $_POST["text_phone"], 
					"From: <" . $_POST["text_name"] . ">" . $_POST["text_email"]))
			{
				$strText = "Email was sent...";
			}
			else
			{
			}
		}
		else if (isset($_POST["button_submit1"]))
		{
		/*
			[time_start] => 03:27 
			[radio_dow] => 0 
			[text_name1] => Gregary John Boyles 
			[text_email1] => gregplants@bigpond.com 
			[text_phone1] => 0455328886 
			[hidden_room_list] => Board Room, Sunday 2/8/2026 03:27#
									Board Room, Sunday 6/9/2026 03:27#
									Board Room, Sunday 4/10/2026 03:27#
									Board Room, Sunday 1/11/2026 03:27#
									Board Room, Sunday 6/12/2026 03:27 
			[button_submit1] => Send email
		*/	
			if (mail($g_strEmailManager, "I'd like to book a room please...", 
					"NAME: " . $_POST["text_name1"] . "\nEMAIL ADDRESS: " . $_POST["text_email1"] . 
					"\nPHONE NUMBER: " . $_POST["text_phone1"] . "\nROOMS & TIMES\n" . 
					 $_POST["hidden_room_list"], 
					"From: <" . $_POST["text_name1"] . ">" . $_POST["text_email1"]))
			{
				$strText = "Email was sent...";
			}
			else
			{
			}
		}
		return $strText;
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
		<title>Hire a room</title>
		
		<style type="text/css">





















			.select_short
			{
				box-sizing: border-box;
				max-width: 180px;
			}
			.select_long
			{
				box-sizing: border-box;
				width: 30ch!important;
			}
			.img
			{
				width: 400px;
			}
			.select_img
			{
				display:inline-block;
				height: 100px;
			}
			
			.rooms_4_hire li,
			.rooms_4_hire b
			{
				font-size: small;
			}
			
			.form td
			{
				padding:10px;
			}
						
		</style>
		<script type="text/javascript">
		
			function DoOnPageLoadComplete()
			{
			}
			
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

		<div class="image_popup" id="div_image_popup">
			<div class="image_popup_scroll">
				<img src="" alt="" id="img_in_popup" />
			</div>
			<p><button type="button" onclick="DoDisplayHidePopup('div_image_popup', false)">CLOSE</button></p>		
		</div>
		
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
<script type="text/javascript">

	DoDisplayMastheadEnd(`<?php echo DoGenerateSponsors(true); ?>`, "<?php echo DoGetParentOrCurrentDir(); ?>");
	
</script>
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
		<li><a href="../index.php">Home</a></li>
		<li><a href="../about/about.php">About Mill House</a></li>
		<li><a href="../calendar/calendar.php">Events Calendar</a></li>
		<li><a href="room.php">Hire a room</a></li>
		<li><a href="../sponsors/sponsors.php">Our Collaborators</a></li>
		<li>
			<a href="../contribute/contribute.php" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item"><a href="../contribute/join.php"><b>Become a member</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/volunteering.php"><b>Become a volunteer</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/request_sponsorship.php"><b>Become a sponsor</b></a></li>
				<li class="submenu_item"><a href="../contribute/donation.php"><b>Make a donation</b></a></li>
			</ul>
		</li>
		<!--<li><a href="people/people.php">Mill House People</a></li>-->
		<!--<li><a href="milestones/milestones.php">Milestones</a></li>-->
		<li><a href="../contact/contact.php">Contact</a></li>
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
		<!--<li><a href="group_events/group_events.php">Group Events</a></li>-->
		<li>
			<a href="../administration/administration.php" onclick="DoClickNavLinkWithSubmenu('administration')">Administration</a>
			<ul style="display:<?php echo DoShowHideSubmenu("administration"); ?>;" id="administration">
			
			<?php DoDisplayAdministrationSubmenu(); ?>
			
			</ul>
		</li>
	</ul>
	<p>&nbsp;</p>
</div>
										</td>
										<td>
<div id="div_navigation_arrow" class="navigation_arrow" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onmouseleave="DoStopSpeaking()" onclick="DoOpenCloseMenu(true)" onkeyup="DoKeyPress(event)">
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
								
								<?php require_once DoGetParentOrCurrentDir() . "VoiceAssistForm.html"; ?>
								
								<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td>
											<div class="page_heading" id="div_page_heading" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onmouseleave="DoStopSpeaking()"><u><script type="text/javascript">document.write(document.title);</script></u></div>
										</td>
										<td style="text-align:right;">
											<?php
											
												if (isLoggedIn())
												{
													echo "<button aria-label=\"Page editing instructions.\" class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";

													if (basename($_SERVER["PHP_SELF"]) == "index.php")
													{
														echo "<button aria-label=\"Website and app source code.\" class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_source_code', true)\">SOURCE CODE</button>\n";
													}
												}

											?>
										</td>
									</tr>
								</table>			
								<form class="form_voice_assist_button"><button type="button" aria-label="Show the voice assist settings." onclick="DoDisplayHidePopup('form_voice_assist', true)">
									<img src="../images/LoudSpeaker.png" alt="LoudSpeaker.png" height="70" /></button></form>

								<!-- #BeginEditable "CustomContent" -->
								
<script type="text/javascript">

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//* SARAH PLEASE NOTE
//* 
//* Any changes to hire room names and costs need to be done in this JavaScript data structure, and not in the HTML for the room details.
//* 
//* Both the HTML room details and the room hire form use this data structure to 'populate' the room names and the hire costs.
//* 
//* This avoid having to edit them in multiple locations on this page and risking having mismatches.
//* 
//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**************************************************************************************************************************************************

var g_arrayHireRoom = [
<?php
	
	for ($nI = 0, $nLength = count($g_arrayHireRoom), $nLastI = $nLength - 1; $nI < count($g_arrayHireRoom); $nI++)
	{
		echo "{";
		
		foreach ($g_arrayHireRoom[$nI] as $strKey => $strValue)
		{
			if (is_int($strValue) || is_float($strValue))
			{
				echo $strKey . ": " . $strValue;
			}
			else if (is_string($strValue))
			{
				echo $strKey . ": '" . $strValue . "'";
			}
			else if (is_bool($strValue))
			{
				if ($strValue == "1")
					echo $strKey . ": true";
				else if ($strValue == "0")
					echo $strKey . ": false";
			}
			if ($strKey != "strCapacity")
				echo ", ";
		}
		echo "}";
		
		if ($nI < ($nLastI))
			echo ",";
		echo "\n";
	}
?>
					  ];

	function DoLoadRoomSelectOptions(strSelectID)
	{
		let selectRoom = document.getElementById(strSelectID);
		
		if (selectRoom)
		{
			for (let nI = 0; nI < g_arrayHireRoom.length; nI++)
			{
				const optionNew = new Option(g_arrayHireRoom[nI].strName, g_arrayHireRoom[nI].strName);
				selectRoom.add(optionNew);
  			}
  			selectRoom.selectedIndex = 0;
		}
	}
	
	function DoChangeRoom(strSelectID, strImgID)
	{
		let selectRoom = document.getElementById(strSelectID);
		let imgRoom = document.getElementById(strImgID);
						
		if (selectRoom && imgRoom)
		{
			imgRoom.src = "images/" + g_arrayHireRoom[selectRoom.selectedIndex].strImageFilename1;
			imgRoom.alt = g_arrayHireRoom[selectRoom.selectedIndex].strImageFilename1;
		}
	}
	
	function DoChangeWhat()
	{
		let textNumber = document.getElementById("text_number"),
			selectWhat = document.getElementById("select_what");
		
		if (textNumber && selectWhat)
		{
			if (selectWhat.selectedIndex == 0/*hours*/)
			{
				textNumber.max = 23;
			}
			else if (selectWhat.selectedIndex == 1/*days*/)
			{
				textNumber.max = 30;
			}
			else if (selectWhat.selectedIndex == 2/*weeks*/)
			{
				textNumber.max = 3;
			}
			else if (selectWhat.selectedIndex == 3/*months*/)
			{
			}
		}
	}

	function DoGetDayOfWeekName(nDOW)
	{
		let strDay = "";
	
		switch (nDOW)
		{
			case 0:
				strDay = "Sunday";
				break;
			case 1:
				strDay = "Monday";
				break;
			case 2:
				strDay = "Tuesday";
				break;
			case 3:
				strDay = "Wednesday";
				break;
			case 4:
				strDay = "Thursday";
				break;
			case 5:
				strDay = "Friday";
				break;
			case 6:
				strDay = "Saturday";
				break;
		}
		return strDay;
	}
	
	function DoSubmitForm(strFormID, strHiddenRoomListID, strSelectRoomListID)
	{
		let hiddenRoomList = document.getElementById(strHiddenRoomListID),
			selectRoomList = document.getElementById(strSelectRoomListID),
			formHireRooms = document.getElementById(strFormID);
			strRoomList = "";
		
		if (formHireRooms && hiddenRoomList && selectRoomList)
		{
			for (let nI = 0; nI < selectRoomList.length; nI++)
			{
				strRoomList += selectRoomList.options[nI].value;
				if (nI < (selectRoomList.length - 1))
					strRoomList += "\n";
			}
			hiddenRoomList.value = strRoomList;
			formHireRooms.submit();
		}
	}
	
	function DoAddAndSortSelectOptions(strSelectID, strNewItem)
	{
		let selectInput = document.getElementById(strSelectID);
		
		if (selectInput)
		{
			const optionNew = new Option(strNewItem, strNewItem);
			selectInput.add(optionNew);

			let arrayptions = Array.from(selectInput.options);
			selectInput.options.length = 0;
			arrayptions.sort((option1, option2) => option1.text.localeCompare(option2.text));
			arrayptions.forEach(option => selectInput.add(option));
			if (selectInput.selectedIndex == -1)
				selectInput.selectedIndex = 0;
		}
	}
	
	function DoFormatItem(datetimeStart, strRoom)
	{
		let strItem = strRoom + ", " + DoGetDayOfWeekName(datetimeStart.getDay()) + " " + 
						datetimeStart.getDate() + "/" + (datetimeStart.getMonth() + 1) + "/" + 
						datetimeStart.getFullYear() + " " + datetimeStart.getHours().toString().padStart(2, "0") + ":" + 
						datetimeStart.getMinutes().toString().padStart(2, "0");
		
		return strItem;
	}
	
	function DoAddSpecificDate()
	{
		let timeStart = document.getElementById("time_start1"),
			dateStart = document.getElementById("date_start1"),
			buttonDelete = document.getElementById("button_delete"),
			selectDateTimes = document.getElementById("select_dates_times"),
			selectRoom = document.getElementById("select_room1");
		
		if (timeStart && dateStart && buttonDelete && selectDateTimes && selectRoom)
		{
			let datetimeNew = new Date(dateStart.value + "T" + timeStart.value + ":00"),
				strItem = DoFormatItem(datetimeNew, selectRoom.options[selectRoom.selectedIndex].value);
			
			DoAddAndSortSelectOptions("select_dates_times", strItem);
			buttonDelete.disabled = false;
		}
	}
	
	function DoAddConsecutiveDates()
	{
		let timeStart = document.getElementById("time_start1"),
			dateStart = document.getElementById("date_start1"),
			buttonDelete = document.getElementById("button_delete"),
			selectDateTimes = document.getElementById("select_dates_times"),
			textNumberDays = document.getElementById("text_number_days1"),
			selectRoom = document.getElementById("select_room1");

		if (timeStart && dateStart && buttonDelete && selectDateTimes && textNumberDays && selectRoom)
		{
			let datetimeNew = new Date(dateStart.value + "T" + timeStart.value + ":00"),
				nNumberDays = Number(textNumberDays.value),
				strItem = "";
				
			for (let nI = 0; nI < nNumberDays; nI++)
			{
				strItem = DoFormatItem(datetimeNew, selectRoom.options[selectRoom.selectedIndex].value);
				DoAddAndSortSelectOptions("select_dates_times", strItem);
				datetimeNew.setDate(datetimeNew.getDate() + 1);
			}
			buttonDelete.disabled = false;
		}
	}
	
	function DoAddWeeklyDates()
	{
		let timeStart = document.getElementById("time_start1"),
			dateStart = document.getElementById("date_start1"),
			buttonDelete = document.getElementById("button_delete"),
			selectDateTimes = document.getElementById("select_dates_times"),
			checkboxSunday = document.getElementById("checkbox_sunday"),
			checkboxMonday = document.getElementById("checkbox_monday"),
			checkboxTuesday = document.getElementById("checkbox_tuesday"),
			checkboxWednesday = document.getElementById("checkbox_wednesday"),
			checkboxThursday = document.getElementById("checkbox_thursday"),
			checkboxFriday = document.getElementById("checkbox_friday"),
			checkboxSaturday = document.getElementById("checkbox_saturday"),
			textNumberWeeks = document.getElementById("text_number_weeks"),
			selectRoom = document.getElementById("select_room1");
		
		if (timeStart && dateStart && buttonDelete && selectDateTimes && checkboxSunday && checkboxMonday && checkboxTuesday && 
			checkboxWednesday && checkboxThursday && checkboxFriday && checkboxSaturday && textNumberWeeks && selectRoom)
		{
			let datetimeStart = new Date(dateStart.value + "T" + timeStart.value + ":00"),
				nNumWeeks = Number(textNumberWeeks.value), 
				strItem = "";
			
			while (datetimeStart.getDay() > 0)
			{
				datetimeStart.setDate(datetimeStart.getDate() + 1);
			}
			for (let nWeek = 0; nWeek < nNumWeeks; nWeek++)
			{
				for (let nDOW = 0; nDOW < 7; nDOW++)
				{
					if ((checkboxSunday.checked && (datetimeStart.getDay() == 0)) ||
						(checkboxMonday.checked && (datetimeStart.getDay() == 1)) ||
						(checkboxTuesday.checked && (datetimeStart.getDay() == 2)) ||
						(checkboxWednesday.checked && (datetimeStart.getDay() == 3)) ||
						(checkboxThursday.checked && (datetimeStart.getDay() == 4)) ||
						(checkboxFriday.checked && (datetimeStart.getDay() == 5)) ||
						(checkboxSaturday.checked && (datetimeStart.getDay() == 6)))
					{
						strItem = DoFormatItem(datetimeStart, selectRoom.options[selectRoom.selectedIndex].value);
						DoAddAndSortSelectOptions("select_dates_times", strItem);
						buttonDelete.disabled = false;
					}
					datetimeStart.setDate(datetimeStart.getDate() + 1);
				}
			}
		}
	}
			
	function DoAddMonthlyDates()
	{
		let timeStart = document.getElementById("time_start1"),
			dateStart = document.getElementById("date_start1"),
			buttonDelete = document.getElementById("button_delete"),
			selectDateTimes = document.getElementById("select_dates_times"),
			selectedRadio = document.querySelector('input[name="radio_dow"]:checked');
			selectMonthly = document.getElementById("select_monthly"),
			selectRoom = document.getElementById("select_room1");

		if (timeStart && dateStart && buttonDelete && selectDateTimes && selectedRadio && selectMonthly && selectRoom)
		{
			let datetimeStart = new Date(dateStart.value + "T" + timeStart.value + ":00"),
				nTargetOccurenceNum = Number(selectMonthly.options[selectMonthly.selectedIndex].value),
				strItem = "",
				nYear = datetimeStart.getFullYear(),
				nOccurenceNum = 0;
				
			while (nYear == datetimeStart.getFullYear())
			{
				if (Number(selectedRadio.value) == datetimeStart.getDay())
				{
					nOccurenceNum = Math.ceil(datetimeStart.getDate() / 7);
 					if (nOccurenceNum == nTargetOccurenceNum)
 					{
						strItem = DoFormatItem(datetimeStart, selectRoom.options[selectRoom.selectedIndex].value);
						DoAddAndSortSelectOptions("select_dates_times", strItem);
						buttonDelete.disabled = false;
 					}
				}
				datetimeStart.setDate(datetimeStart.getDate() + 1);
			}
		}	
	}
	
	function DoDeleteListItem()
	{
		let selectDateTimes = document.getElementById("select_dates_times"),
			buttonDelete = document.getElementById("button_delete");
		
		if (selectDateTimes && buttonDelete)
		{
			if (selectDateTimes.selectedIndex >= 0)
			{
				selectDateTimes.remove(selectDateTimes.selectedIndex);
				if (selectDateTimes.options.length > 0)
					selectDateTimes.selectedIndex = 0;
				buttonDelete.disabled = selectDateTimes.options.length == 0;
			}
		}
	}
	
	function DoSwapForms(strIDFormToShow, strIDFormToHide)
	{
		document.getElementById(strIDFormToShow).style.display = "block";
		document.getElementById(strIDFormToHide).style.display = "none";
	}

</script>
								
<p>Find the right space for your meeting, program, activity or business at Mill House</p>

<p>Mill House offers a range of affordable and welcoming rooms for meetings, training sessions, workshops, community programs, appointments and 
business use.</p>

<p>Our rooms are available for casual hire, full-day bookings and ongoing business or corporate rental. Cleaning and Wi-Fi are included, with 
access to a printer and scanner also available. Catering can be arranged upon request.</p>

<h2>Community Group Hire</h2>

<p>Community groups can hire Mill House rooms free of charge. Donations towards tea and coffee are always greatly appreciated.</p>

<h2>Make a Booking</h2>

<p>Use the form below to request a booking for one of our rooms, in which case the Mill House manager will contact you to discuss availability, to 
arrange specific requirements and to organise payment.</p>

<p>Or contact the manager to arrange a tour of Mill House to see which of our rooms best suit your needs.</p>

<div class="rooms_4_hire">
	<script type="text/javascript">
		
		// var g_arrayHireRoom = [{strName: "Board Room", strImageFilename1: "boardroom.jpg", strImageFilename1: "boardroom_cupboards.jpg", 
		// nCostPerHour: 40, nCostPerDay: 140, nCostPerMonth: 0},
		for (let nI = 0; nI < g_arrayHireRoom.length; nI++)
		{
			document.write("<h1>" + g_arrayHireRoom[nI].strName + "</h1>\n");
			document.write("<p>" + g_arrayHireRoom[nI].strDescription + "</p>\n");
			document.write("<p>Capacity: " + g_arrayHireRoom[nI].strCapacity + "</p>\n");
			document.write("<p>Cost</p>\n");
			document.write("<ul>\n");
			document.write("<li><b>Per hour: </b>$" + g_arrayHireRoom[nI].nCostPerHour.toFixed(2) + "</li>\n");
			document.write("<li><b>Per day: </b>$" + g_arrayHireRoom[nI].nCostPerDay.toFixed(2) + "</li>\n");
			if (g_arrayHireRoom[nI].nCostPerMonth > 0)
				document.write("<li><b>Per month: </b>$" + g_arrayHireRoom[nI].nCostPerMonth.toFixed(2) + "</li>\n");
			document.write("</ul>\n");
			document.write("<p>\n");
			document.write("    <a href=\"images/" + g_arrayHireRoom[nI].strImageFilename1 + "\"><img class=\"img\" src=\"images/" + g_arrayHireRoom[nI].strImageFilename1 + "\" alt=\"" + g_arrayHireRoom[nI].strImageFilename1 + "\" /></a>&nbsp;\n");
			if (g_arrayHireRoom[nI].strImageFilename2 != "")
				document.write("    <a href=\"images/" + g_arrayHireRoom[nI].strImageFilename2 + "\"><img class=\"img\" src=\"images/" + g_arrayHireRoom[nI].strImageFilename2 + "\" alt=\"" + g_arrayHireRoom[nI].strImageFilename2 + "\" /></a>;\n");
			document.write("<p>\n");
			document.write("<p>\n");
			if (g_arrayHireRoom[nI].strImageFilename3 != "")
				document.write("    <a href=\"images/" + g_arrayHireRoom[nI].strImageFilename3 + "\"><img class=\"img\" src=\"images/" + g_arrayHireRoom[nI].strImageFilename3 + "\" alt=\"" + g_arrayHireRoom[nI].strImageFilename3 + "\" /></a>&nbsp;\n");
			if (g_arrayHireRoom[nI].strImageFilename4 != "")
				document.write("    <a href=\"images/" + g_arrayHireRoom[nI].strImageFilename4 + "\"><img class=\"img\" src=\"images/" + g_arrayHireRoom[nI].strImageFilename4 + "\" alt=\"" + g_arrayHireRoom[nI].strImageFilename4 + "\" /></a>&nbsp;\n");
			document.write("</p>\n");
		}
		
	</script>
</div>

<h1>Book a Room</h1>	
<form target="_self" method="post" class="form" id="form_simple" style="width:530px;">
	
	<p>The Mill House manager will contact you to confirm availability and arrange payment.</p>

	<table border="0" cellpadding="0" cellspacing="5">
		<tr>
			<td style="text-align:right;width:120px;"><label for="select_room">Preferred space:</label></td>
			<td>
				<select class="select_short" id="select_room" name="select_room" onchange="DoChangeRoom('select_room', 'img_room')" required>
				</select>
			</td>
			<td style="vertical-align:middle;text-align:left;">
				<img class="select_img"src="images/kitchen2.jpg" alt="kitchen2.jpg" id="img_room" />
			</td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="date_start">Date:</label></td>
			<td colspan="2"><input type="date" id="date_start" name="date_start" required /></td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="text_number_days">Number of days:</label></td>
			<td colspan="2">
				<input type="number" value="1" min="1" max="365" value="1" size="5" maxlength="4" id="text_number_days" name="text_number_days" onkeypress="OnKeyPressDigitsSpaceOnly(event)" />
			</td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="time_start">From time:</label></td>
			<td colspan="2"><input type="time" id="time_start" name="time_start" step="60" required/></td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="text_number_hours">Number of hours:</label></td>
			<td colspan="2">
				<input type="number" min="1" max="24" value="1" size="5" maxlength="4" id="text_number_hours" name="text_number_hours" onkeypress="OnKeyPressDigitsSpaceOnly(event)" />
			</td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="text_number_hours">Ongoing:</label></td>
			<td colspan="2">
				<select id="select_ongoing" name="select_ongoing" required>
					<option selected value="NO">No</option>
					<option value="YES">Yes</option>
				</select>
			</td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="text_name">Name:</label></td>
			<td colspan="2"><input type="text" id="text_name" name="text_name" onkeypress="OnKeyPressName(event)" required /></td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="text_email">Email address:</label></td>
			<td colspan="2"><input type="text" id="text_email" name="text_email" onkeypress="OnKeyPressEmailAddress(event)" required /></td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="text_phone">Phone number:</label></td>
			<td colspan="2"><input type="text" id="text_phone" name="text_phone" onkeypress="OnKeyPressPhone(event)" required /></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align:right;">
				<input type="submit" name="button_submit" value="Send email" style="width:100px;"/>
			</td>
		</tr>
		<tr>
			<td colspan="3"><h3><?php echo DoProcessFormData(); ?></h3></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align:right;">
				<input type="button" id="button_submit" value="Use sophisticated form" onclick="DoSwapForms('form_sophisticated', 'form_simple')"/>
			</td>
		</tr>
	</table>
</form>

<!--

	THIS OPTION FORM GENERATES EMAILS WITH BODIES CONTATING THE FOLLOIWNG EXAMPLES
	
	NAME: Gregary John Boyles 
	EMAIL ADDRESS: gregplants@bigpond.com 
	PHONE NUMBER: 0455328886 
	ROOMS & TIMES 
	Board Room, Saturday 18/7/2026 10:28
	
	---------------------------------------------------------------------------------------------
	
	NAME: Gregary John Boyles 
	EMAIL ADDRESS: gregplants@bigpond.com 
	PHONE NUMBER: 0455328886 
	ROOMS & TIMES 
	Board Room, Sunday 15/11/2026 10:28 
	Board Room, Sunday 16/8/2026 10:28 
	Board Room, Sunday 18/10/2026 10:28 
	Board Room, Sunday 19/7/2026 10:28 
	Board Room, Sunday 20/12/2026 10:28 
	Board Room, Sunday 20/9/2026 10:28

	---------------------------------------------------------------------------------------------
	
	NAME: Gregary John Boyles 
	EMAIL ADDRESS: gregplants@bigpond.com 
	PHONE NUMBER: 0455328886 
	ROOMS & TIMES 
	Board Room, Tuesday 10/11/2026 10:31 
	Board Room, Tuesday 11/8/2026 10:31 
	Board Room, Tuesday 13/10/2026 10:31 
	Board Room, Tuesday 8/12/2026 10:31 
	Board Room, Tuesday 8/9/2026 10:31 
	Personal Meeting Room, Monday 27/7/2026 03:31 
	Personal Meeting Room, Saturday 25/7/2026 03:31 
	Personal Meeting Room, Sunday 26/7/2026 03:31
	
-->
<form target="_self" method="post" class="form" id="form_sophisticated" style="width:680px;display:none;">
	
	<p>The Mill House manager will contact you to confirm availability and arrange payment.</p>

	<table border="0" cellpadding="0" cellspacing="5">
		<tr style="border:thin black solid;">
			<td style="text-align:right;width:120px;"><label for="select_room1">Preferred space:</label></td>
			<td>
				<select class="select_short" id="select_room1" onchange="DoChangeRoom('select_room1', 'img_room1')" required>
				</select>
			</td>
			<td style="vertical-align:middle;text-align:left;">
				<img class="select_img"src="images/kitchen2.jpg" alt="kitchen2.jpg" id="img_room1" />
			</td>
		</tr>
		<tr style="border:thin black solid;">
			<td colspan="2">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td style="text-align:right;"><label for="time_start1">From time:</label></td>
						<td><input type="time" id="time_start1" name="time_start" step="60" required/></td>
					</tr>
					<tr>
						<td style="text-align:right;width:120px;"><label for="date_start1">Start date:</label></td>
						<td><input type="date" id="date_start1" /></td>
					</tr>
				</table>
			</td>
			<td><button type="button" id="button_add_specific_date" onclick="DoAddSpecificDate()">ADD SPECIFIC DATE &amp; TIME</button></td>
		</tr>
		<tr style="border:thin black solid;">
			<td style="text-align:right;"><label for="text_number_days">Number of days:</label></td>
			<td>
				<input type="number" value="1" min="1" max="365" value="1" size="5" maxlength="4" id="text_number_days1" onkeypress="OnKeyPressDigitsSpaceOnly(event)" /><br/>
				<label>From the start date...</label>
			</td>
			<td><button type="button" id="button_add_consective_days" onclick="DoAddConsecutiveDates()">ADD CONSECUTIVE DATES &amp; TIMES</button></td>
		</tr>
		<tr style="border:thin black solid;">
			<td colspan="2">
				<label>Weekly for </label>
				<input type="number" value="1" min="1" max="52" value="1" size="5" maxlength="4" id="text_number_weeks" onkeypress="OnKeyPressDigitsSpaceOnly(event)" />
				<label> week(s) starting next week...</label><br/><br/>
				<input type="checkbox" id="checkbox_sunday" /><label for="checkbox_sunday">Sunday</label><br/>
				<input type="checkbox" id="checkbox_monday" /><label for="checkbox_sunday">Monday</label><br/>
				<input type="checkbox" id="checkbox_tuesday" /><label for="checkbox_sunday">Tuesday</label><br/>
				<input type="checkbox" id="checkbox_wednesday" /><label for="checkbox_sunday">Wednesday</label><br/>
				<input type="checkbox" id="checkbox_thursday" /><label for="checkbox_sunday">Thursdau</label><br/>
				<input type="checkbox" id="checkbox_friday" /><label for="checkbox_sunday">Friday</label><br/>
				<input type="checkbox" id="checkbox_saturday" /><label for="checkbox_sunday">Saturday</label>
			</td>
			<td>
				<button type="button" id="button_add_days" onclick="DoAddWeeklyDates()">ADD WEEKLY DATES &amp; TIMES</button>
			</td>
		</tr>
		<tr style="border:thin black solid;">
			<td colspan="2">
				<label>Monthly...</label>
				<select id="select_monthly" style="width:100px;">
					<option value="1">First week</option>
					<option value="2">Second week</option>
					<option value="3">Third week</option>
					<option value="4">Fourth week</option>
				</select>
				<label> starting next week...</label><br/><br/>
				<input type="radio" name="radio_dow" id="radio_sunday" checked value="0" /><label for="radio_sunday">Sunday</label><br/>
				<input type="radio" name="radio_dow" id="radio_monday" value="1" /><label for="radio_sunday">Monday</label><br/>
				<input type="radio" name="radio_dow" id="radio_tuesday" value="2" /><label for="radio_sunday">Tuesday</label><br/>
				<input type="radio" name="radio_dow" id="radio_wednesday" value="3" /><label for="radio_sunday">Wednesday</label><br/>
				<input type="radio" name="radio_dow" id="radio_thursday" value="4" /><label for="radio_sunday">Thursdau</label><br/>
				<input type="radio" name="radio_dow" id="radio_friday" value="5" /><label for="radio_sunday">Friday</label><br/>
				<input type="radio" name="radio_dow" id="radio_saturday" value="6" /><label for="radio_sunday">Saturday</label>
				
			</td>
			<td><button type="button" id="button_add_monthly" onclick="DoAddMonthlyDates()">ADD MONTHLY DATES &amp; TIMES</button></td>
		</tr>
		<tr style="border:thin black solid;">
			<td colspan="2">
				<label for="select_dates_times">List of dates &amp; times</label><br/>
				<select class="select_long" id="select_dates_times" required size="10">
				</select>
			</td>
			<td>
				<button type="button" id="button_delete" disabled onclick="DoDeleteListItem()">DELETE SELECTED ITEM</button>
			</td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="text_name1">Name:</label></td>
			<td colspan="2"><input type="text" id="text_name1" name="text_name1" onkeypress="OnKeyPressName(event)" required /></td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="text_email1">Email address:</label></td>
			<td colspan="2"><input type="text" id="text_email1" name="text_email1" onkeypress="OnKeyPressEmailAddress(event)" required /></td>
		</tr>
		<tr>
			<td style="text-align:right;"><label for="text_phone1">Phone number:</label></td>
			<td colspan="2"><input type="text" id="text_phone1" name="text_phone1" onkeypress="OnKeyPressPhone(event)" required /></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align:right;">
				<input type="hidden" id="hidden_room_list" name="hidden_room_list" />
				<input type="hidden" name="button_submit1" value="Send email" />
				<button type="button" value="Send email" onclick="DoSubmitForm('form_hire_room1', 'hidden_room_list', 'select_dates_times')" style="width:100px;">SUBMIT</button>
			</td>
		</tr>
		<tr>
			<td colspan="3"><h3><?php echo DoProcessFormData(); ?></h3></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align:right;">
				<input type="button" id="button_submit0" value="Use simple form" onclick="DoSwapForms('form_simple', 'form_sophisticated')"/>
			</td>
		</tr>
	</table>
</form>

<script type="text/javascript">
	DoLoadRoomSelectOptions("select_room");
	DoChangeRoom("select_room", "img_room");
	document.getElementById("date_start").value = new Date().toISOString().substring(0,10);
	document.getElementById("time_start").value = new Date().toISOString().slice(11, 16);
	
	DoLoadRoomSelectOptions("select_room1");
	DoChangeRoom("select_room1", "img_room1");
	document.getElementById("date_start1").value = new Date().toISOString().substring(0,10);
	document.getElementById("time_start1").value = new Date().toISOString().slice(11, 16);
</script>

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>The contents of this page, the depicts the hire room details, are generated by JavaScript code. And it also 
	includes HTML forms. Please do not edit the contents of this page unless you are an expert.</p>
	
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
			<div class="footer" id="div_footer">
				<table border="0" cellpadding="0" cellspacing="0" class="footer_table">
					<tr>
						<td class="footer_table_cell footer_left_cell" aria-label="Copy right Mill House Maryburrough Victoria">&copy;Mill House, Maryborough, VIC</td>
						
						<td class="footer_table_cell footer_middle_cell">COME ALONG AND JOIN THE MILL HOUSE COMMUNITY <h2 style="display:inline;">&#128522;</h2></td>
						
						<td class="footer_table_cell footer_right_cell" aria-label="Web site by: Gregry Boyles 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)">Web site by: Gregary Boyles 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)</td>
					</tr>
				</table>
			</div>
			<!-- End Footer --></div>
		<!-- End Container -->
	</body>
	
	<script type="text/javascript">
	
		DoSetAudioAssistCheckbox();
		DoSetVoiceAssistInputs();
		DoAllAttachListeners("div_content");
		DoAllAttachListeners("div_navigation_menu");
		DoAllAttachListeners("div_footer");
		DoAllAttachListeners("div_masthead");
		DoAttachClickListenersToImageLinks();
		
		if (JSON.parse(sessionStorage.getItem("bAudioAssistOn")))
		{
			alert("The audio assist feature requires user interaction to 'activate'.\n\nYou will need to click a blank part of the page after you close this message box.\n\nIt is annoying, but it is web browser requirement.");
		}
		
	</script>
	
</html>
<!-- #BeginEditable "End" -->

<?php DoShowMessage(); ?>

<!-- #EndEditable -->

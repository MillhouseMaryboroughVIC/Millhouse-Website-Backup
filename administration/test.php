<?php

	/****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************
	 **** SARAH PLEASE NOTE
	 **** 
	 **** Don't change this PHP code. It is responsible for generating the list of events on today from 
	 **** the 'groups' table in the MySQL database in your web hosting account.
	 ****
	 ****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************
	 ****************************************************************************************************/
	 
	require_once "../common.php";
	require_once "admin_login.php";
	
	DoRecordPageHitOrBlock();
	
	if (isset($_POST["hidden_areas_html"]))
	{
		try
		{
			$results = DoQuery($g_dbMillhouse, "TRUNCATE TABLE group_photo_areas");

			$nPos1 = 0;
			$nPos2 = 0;
			do
			{
				$nPos2 = strPos($_POST["hidden_areas_html"], "####", $nPos1);
				if ($nPos2 > -1)
				{
					$strAreaTag = substr($_POST["hidden_areas_html"], $nPos1, $nPos2 - $nPos1);
					$results = DoInsertQuery2($g_dbMillhouse, "group_photo_areas", "area_tag", $strAreaTag, 
												"image_height", $_POST["number_height"]);
					
					$nPos1 = $nPos2 + 4;
				}
			}
			while ($nPos2 > -1);
			DoSaveFile("file_photo", "../images/", "MillHouseTeam.jpg");
		}
		catch (mysqli_sql_exception $error)
		{
			DoPrintJSAlertError($error->getMessage(), true);
		}
	}	

	function DoDisplayGroupPhotoForm()
	{
		echo "<form class=\"form\" style=\"width:1200px!important;\" id=\"form_group_photo\" method=\"post\" target=\"_self\" action=\"group_photo.php\" onmousedown=\"DoOnMouseDown(event)\" onmouseup=\"DoOnMouseUp(event)\" onmousemove=\"DoOnMouseMove(event)\">\n";
		echo "	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
		echo "        <tr>\n";
		echo "            <td style=\"text-align:center;\" colspan=\"2\"><h1>NEW GROUP PHOTO</h1></label><br/><br/></td>\n";
		echo "        </tr>\n";
		echo "       <tr>\n";
		echo "           <td  style=\"text-align:center;\" colspan=\"2\">\n";
		echo "               <button type=\"button\" onclick=\"DoDisplayHidePopup('div_group_photo_form_instructions', true)\">INSTRUCTIONS</button><br/><br/>\n";
		echo "           </td>\n";
		echo "      </tr>\n";
		echo "		<tr>\n";
		echo "			<td style=\"text-align:right;\">\n";
		echo "				<label for=\"file_photo\">GROUP PHOTO</label>\n";
		echo "			</td>\n";
		echo "			<td>\n";
		echo "				<input type=\"file\" id=\"file_photo\" name=\"file_photo\" required accept=\".png, .jpg, .jpeg\" placeholder=\"Select a photo...\" onchange=\"OnChangePhoto(event)\"/>\n";
		echo "			</td>\n";
		echo "		</tr>\n";
		echo "		<tr>\n";
		echo "			<td colspan=\"2\" style=\"text-align:center;position:relative;\">\n";
		echo "				<p id=\"p_instructions\" class=\"blink_faster\" style=\"display:none;color:red;\"><b>Move the red square over a face, re-size it by dragging the edges and then click \n";
		echo "				the 'ADD IMAGE AREA' button.</b></p>\n";
		echo "				<img id=\"img_group_photo\" class=\"img_group_photo\" src=\"\" height=\"250\" style=\"display:none;position:relative;\" ondragstart=\"event.preventDefault()\"/>\n";
		echo "				<br/>\n";
		echo "			</td>\n";
		echo "		</tr>\n";
		echo "		<tr>\n";
		echo "			<td style=\"text-align:right;\">\n";
		echo "				<label for=\"number_height\">IMAGE HEIGHT</label>\n";
		echo "			</td>\n";
		echo "			<td>\n";
		echo "				<input type=\"number\" id=\"number_height\" name=\"number_height\" disabled size=\"10\" min=\"200\" max=\"500\" value=\"250\" />&nbsp;\n";
		echo "				<button type=\"button\" id=\"button_change_image_size\" disabled onclick=\"DoChangeImageSize()\">CHANGE IMMAGE SIZE</button>\n";
		echo "			</td>\n";
		echo "		</tr>\n";
		echo "		<tr>\n";
		echo "			<td style=\"text-align:right;\">\n";
		echo "				<label for=\"select_image_areas\">LIST OF IMAGE AREAS</label>\n";
		echo "			</td>\n";
		echo "			<td>\n";
		echo "				<select style=\"width:1000px\" id=\"select_image_areas\" name=\"select_image_areas\" size=\"10\" onchange=\"DoChangeSelectedImageAreas()\">\n";
		echo "				</select>\n";
		echo "			</td>\n";
		echo "		</tr>\n";
		echo "		<tr>\n";
		echo "			<td colspan=\"2\" style=\"text-align:center;\">\n";
		echo "				<button type=\"button\" id=\"button_new_area_square\" disabled onclick=\"DoAddAreaSquare()\">NEW AREA SQUARE</button>&nbsp;\n";
		echo "				<button type=\"button\" id=\"button_add_image_area\" disabled onclick=\"DoAddImageArea()\">ADD IMAGE AREA</button>&nbsp;\n";
		echo "				<button type=\"button\" id=\"button_edit_name\" disabled onclick=\"DoEditName()\">EDIT NAME</button>&nbsp;\n";
		echo "				<button type=\"button\" id=\"button_delete_image_areas\" disabled onclick=\"DoDeleteImageArea()\">DELETE IMAGE AREA</button>\n";
		echo "			</td>\n";
		echo "		</tr>\n";
		echo "		<tr>\n";
		echo "			<td colspan=\"2\" style=\"text-align:center;\">\n";
		echo "				<button type=\"button\" id=\"button_create_image_map\" name=\"button_create_image_map\" disabled onclick=\"DoSubmitForm()\">CREATE NEW CLICKABLE IMAGE</button>\n";
		echo "				<input type=\"hidden\" id=\"hidden_areas_html\" name=\"hidden_areas_html\" value=\"\" />\n";
		echo "			</td>\n";
		echo "		</tr>\n";
		echo "	</table>\n";
		echo "</form>\n";
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
		<title>New Clickable Group Photo</title>
		<style type="text/css">



































































		
			.div_dynamic
			{
				display: block;
				position: absolute;
				border: 3px red solid;
				z-index: 10;
				background-color: transparent;
				touch-action: none; /* Crucial: Prevents mobile scrolling while dragging */
				user-select: none;  /* Prevents accidental text highlighting while dragging */
			}
			
			.img_group_photo
			{
				user-select: none;
				-webkit-user-select: none; /* Safari */
				-webkit-user-drag: none; 
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
		<li><a href="../room/room.php">Hire a room</a></li>
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
			<a href="administration.php" onclick="DoClickNavLinkWithSubmenu('administration')">Administration</a>
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
													echo "<button title=\"Page editing instructions.\" class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";

													if (basename($_SERVER["PHP_SELF"]) == "index.php")
													{
														echo "<button title=\"Website and app source code.\" class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_source_code', true)\">SOURCE CODE</button>\n";
													}
												}

											?>
										</td>
									</tr>
								</table>			
								<form class="form_voice_assist_button"><button type="button" title="Show the voice assist settings." onclick="DoDisplayHidePopup('form_voice_assist', true)">
									<img src="../images/LoudSpeaker.png" alt="LoudSpeaker.png" height="70" /></button></form>

								<!-- #BeginEditable "CustomContent" -->

<script type="text/javascript">

	function DoChangeImageSize()
	{
		let img = document.getElementById("img_group_photo"),
			numberHeight = document.getElementById("number_height");
		
		if (img && numberHeight)
		{
			img.style.height = numberHeight.value + "px";
		}
	}
	
	function DoChangeSelectedImageAreas()
	{
		let selectImageAreas = document.getElementById("select_image_areas"),
			buttonDeletemageArea = document.getElementById("button_delete_image_areas"),
			buttonEditName = document.getElementById("button_edit_name"),
			buttonCreateNewImageMap = document.getElementById("button_create_image_map");
		
		if (selectImageAreas && buttonDeletemageArea && buttonEditName && buttonCreateNewImageMap)
		{
			buttonDeletemageArea.disabled = selectImageAreas.selectedIndex == -1;
			buttonEditName.disabled = selectImageAreas.selectedIndex == -1;
			buttonCreateNewImageMap = selectImageAreas.selectedIndex == -1;
		}
	}
	
	function OnChangePhoto(Event)
	{
		let img = document.getElementById("img_group_photo"),
			buttonAddImageArea = document.getElementById("button_new_area_square"),
			buttonChangeImageHeight = document.getElementById("button_change_image_size"),
			numberHeight = document.getElementById("number_height");
		
		if (Event.target.files[0] && img && buttonAddImageArea && buttonChangeImageHeight && numberHeight)
		{
			// Generate a temporary URL for the image file
			const objectUrl = URL.createObjectURL(Event.target.files[0]); 

			img.src = objectUrl;
			img.style.display = "block";
			img.style.marginLeft = "auto";
			img.style.marginRight = "auto";
			
			buttonAddImageArea.disabled = false;
			buttonChangeImageHeight.disabled = false;
			numberHeight.disabled = false	

			// Optional: Free up memory when the image loads
			img.onload = () => {
							       URL.revokeObjectURL(objectUrl);
							   };
    	}
	}
		
	let g_arrayDynamicDivs = [],
		g_nSelectedDivIndex = -1,
		g_strGrabbedBorder = "",
		g_nEdgeOffset = 4;
		
	function DoDeleteImageArea()
	{
		let selectImageAreas = document.getElementById("select_image_areas"),
			buttonCreateNewImageMap = document.getElementById("button_create_image_map");
		
		if (selectImageAreas && buttonCreateNewImageMap)
		{
			g_arrayDynamicDivs.splice(selectImageAreas.options[selectImageAreas.selectedIndex].value, 1);
			selectImageAreas.remove(selectImageAreas.selectedIndex);
			buttonCreateNewImageMap.disabled = selectImageAreas.options.length == 0;
		}
	}
		
	function DoAddAreaSquare()
	{
		let imgGroupPhoto = document.getElementById("img_group_photo"),
			pInstruction = document.getElementById("p_instructions"),
			buttonNewAreaSquare = document.getElementById("button_new_area_square"),
			buttonAddImageArea = document.getElementById("button_add_image_area"),
			pInstructions = document.getElementById("p_instructions"),
			divContent = document.getElementById("div_content");
	
		if (imgGroupPhoto && pInstruction && buttonAddImageArea && buttonNewAreaSquare && pInstructions && divContent)
		{
			pInstruction.style.display = "block";
			buttonAddImageArea.disabled = false;
			buttonNewAreaSquare.disabled = true;
			pInstructions.disabled = false;
			
			// 1. Create the new div element
			const divSelect = document.createElement("div");
			
			// 2. Add a CSS class to style it
			divSelect.classList.add("div_dynamic");
			
			// 3. Move the div top left to the mouse cursor
			divSelect.style.left = (imgGroupPhoto.offsetLeft - 60) + "px";
			divSelect.style.top = imgGroupPhoto.offsetTop + "px";
			divSelect.style.width = "50px";
			divSelect.style.height = "50px";
			
			// 4. Append the new div to our container
			imgGroupPhoto.parentElement.appendChild(divSelect);
		
			g_arrayDynamicDivs.push(divSelect);
			divContent.scrollTo({top: 0, behavior: "smooth"});
		}
	}
	
	function ContainsMousePointer(Event, divDynamic)
	{
		let bContainsMouse = false;
		const rectClient = divDynamic.getBoundingClientRect();
		
		// Check if mouse X and Y are within the element's bounding box
		bContainsMouse = (Event.clientX >= rectClient.left) && (Event.clientX <= rectClient.right) &&
							(Event.clientY >= rectClient.top) && (Event.clientY <= rectClient.bottom);
		
		return bContainsMouse;
	}
	
	function MouseOnLeftEdge(Event, divDynamic)
	{
		let bOnEdge = false;
		const rectClient = divDynamic.getBoundingClientRect();
		
		bOnEdge = (Event.clientX >= rectClient.left) && (Event.clientX <= (rectClient.left + g_nEdgeOffset)) && 
					(Event.clientY >= rectClient.top) && (Event.clientY <= rectClient.bottom);
		
		return bOnEdge;
	}
	
	function MouseOnRightEdge(Event, divDynamic)
	{
		let bOnEdge = false;
		const rectClient = divDynamic.getBoundingClientRect();
		
		bOnEdge = (Event.clientX >= (rectClient.right - g_nEdgeOffset)) && (Event.clientX <= rectClient.right) && 
					(Event.clientY >= rectClient.top) && (Event.clientY <= rectClient.bottom);
		
		return bOnEdge;
	}
	
	function MouseOnTopEdge(Event, divDynamic)
	{
		let bOnEdge = false;
		const rectClient = divDynamic.getBoundingClientRect();
		
		bOnEdge = (Event.clientY >= rectClient.top) && (Event.clientY <= (rectClient.top + g_nEdgeOffset)) && 
					(Event.clientX >= rectClient.left) && (Event.clientX <= rectClient.right);
		
		return bOnEdge;
	}
	
	function MouseOnBottomEdge(Event, divDynamic)
	{
		let bOnEdge = false;
		const rectClient = divDynamic.getBoundingClientRect();

		bOnEdge = (Event.clientY >= (rectClient.bottom - g_nEdgeOffset)) && (Event.clientY <= rectClient.bottom) && 
					(Event.clientX >= rectClient.left) && (Event.clientX <= rectClient.right);
		
		return bOnEdge;
	}
	
	function DoOnMouseDown(Event)
	{
		if (Event.buttons === 1 /* Left mouse button */)
		{			
			for (let nI = 0; nI < g_arrayDynamicDivs.length; nI++)
			{			
				if (MouseOnLeftEdge(Event, g_arrayDynamicDivs[nI]))
				{
					g_nSelectedDivIndex = nI;
					g_strGrabbedBorder = "left";
					g_arrayDynamicDivs[nI].style.cursor = "ew-resize"
				}
				else if (MouseOnRightEdge(Event, g_arrayDynamicDivs[nI]))
				{
					g_nSelectedDivIndex = nI;
					g_strGrabbedBorder = "right";
					g_arrayDynamicDivs[nI].style.cursor = "ew-resize"
				}
				else if (MouseOnTopEdge(Event, g_arrayDynamicDivs[nI]))
				{
					g_nSelectedDivIndex = nI;
					g_strGrabbedBorder = "top";
					g_arrayDynamicDivs[nI].style.cursor = "ns-resize"
				}
				else if (MouseOnBottomEdge(Event, g_arrayDynamicDivs[nI]))
				{
					g_nSelectedDivIndex = nI;
					g_strGrabbedBorder = "bottom";
					g_arrayDynamicDivs[nI].style.cursor = "ns-resize"
				}
				else if (ContainsMousePointer(Event, g_arrayDynamicDivs[nI]))
				{
					g_nSelectedDivIndex = nI;
					g_strGrabbedBorder = "";
					g_arrayDynamicDivs[nI].style.cursor = "grabbing";
				}
			}
		}
	}
	
	function DoOnMouseUp(Event)
	{
	/*
		if (g_nSelectedDivIndex > -1)
		{
			g_arrayDynamicDivs[g_nSelectedDivIndex].style.cursor = "default";
			g_nSelectedDivIndex = -1;
		}
	*/
	}
		
	function DoOnMouseMove(Event)
	{		
		if (Event.buttons === 1 /* Left mouse button */)
		{
			if (g_nSelectedDivIndex > -1)
			{
				const nCurrentLeft = parseInt(g_arrayDynamicDivs[g_nSelectedDivIndex].style.left) || 0,
						nCurrentRight = parseInt(g_arrayDynamicDivs[g_nSelectedDivIndex].style.right) || 0
						nCurrentTop = parseInt(g_arrayDynamicDivs[g_nSelectedDivIndex].style.top) || 0,
						nCurrentBottom = parseInt(g_arrayDynamicDivs[g_nSelectedDivIndex].style.bottom) || 0,
						nCurrentWidth = parseInt(g_arrayDynamicDivs[g_nSelectedDivIndex].style.width) || 0,
						nCurrentHeight = parseInt(g_arrayDynamicDivs[g_nSelectedDivIndex].style.height) || 0;
	  			
	  			if (g_strGrabbedBorder == "")
	  			{
					g_arrayDynamicDivs[g_nSelectedDivIndex].style.left = (nCurrentLeft + Event.movementX) + "px";
					g_arrayDynamicDivs[g_nSelectedDivIndex].style.top = (nCurrentTop + Event.movementY) + "px";
				}
				else if (g_strGrabbedBorder == "left")
				{
					let nNewLeft = nCurrentLeft + Event.movementX,
						nNewWidth = nCurrentWidth - Event.movementX;
					
					g_arrayDynamicDivs[g_nSelectedDivIndex].style.left = nNewLeft + "px";
					g_arrayDynamicDivs[g_nSelectedDivIndex].style.width = nNewWidth + "px";
				}
				else if (g_strGrabbedBorder == "right")
				{
					let nNewRight = nCurrentRight + Event.movementX,
						nNewWidth = nCurrentWidth + Event.movementX;
					
					g_arrayDynamicDivs[g_nSelectedDivIndex].style.right = nCurrentRight + "px";
					g_arrayDynamicDivs[g_nSelectedDivIndex].style.width = nNewWidth + "px";
				}
				else if (g_strGrabbedBorder == "top")
				{
					let nNewTop = nCurrentTop + Event.movementY,
						nNewHeight = nCurrentHeight - Event.movementY;
					
					g_arrayDynamicDivs[g_nSelectedDivIndex].style.top = nNewTop + "px";
					g_arrayDynamicDivs[g_nSelectedDivIndex].style.height = nNewHeight + "px";
				}
				else if (g_strGrabbedBorder == "bottom")
				{
					let nNewBottom = nCurrentBottom + Event.movementY,
						nNewHeight = nCurrentHeight + Event.movementY;
					
					g_arrayDynamicDivs[g_nSelectedDivIndex].style.bottom = nCurrentBottom + "px";
					g_arrayDynamicDivs[g_nSelectedDivIndex].style.height = nNewHeight + "px";
				}
				Event.preventDefault();
			}
		}
		else
		{
			for (let nI = 0; nI < g_arrayDynamicDivs.length; nI++)
			{
				if (MouseOnLeftEdge(Event, g_arrayDynamicDivs[nI]))
				{
					g_arrayDynamicDivs[nI].style.cursor = "ew-resize";
					break;
				}
				else if (MouseOnRightEdge(Event, g_arrayDynamicDivs[nI]))
				{
					g_arrayDynamicDivs[nI].style.cursor = "ew-resize";
					break;
				}
				else if (MouseOnTopEdge(Event, g_arrayDynamicDivs[nI]))
				{
					g_arrayDynamicDivs[nI].style.cursor = "ns-resize";
					break;
				}
				else if (MouseOnBottomEdge(Event, g_arrayDynamicDivs[nI]))
				{
					g_arrayDynamicDivs[nI].style.cursor = "ns-resize";
					break;
				}
				else if (ContainsMousePointer(Event, g_arrayDynamicDivs[nI]))
				{
					g_arrayDynamicDivs[nI].style.cursor = "grab";;
					break;
				}
			}
		}
	}
	
	function DoGetCoords(imgGroupPhoto, divDynamic)
	{
		let rectCoords = new DOMRect(0, 0, 0, 0);
		
		if (imgGroupPhoto && divDynamic)
		{
			let rectClientImage = imgGroupPhoto.getBoundingClientRect(),
				rectDynamicDiv = divDynamic.getBoundingClientRect();
				
			/*
				rectClientImage
				{
				    "x": 496.828125,
				    "y": -246.125,
				    "width": 333.328125,
				    "height": 250,
				    "top": -246.125,
				    "right": 830.15625,
				    "bottom": 3.875,
				    "left": 496.828125
				}
				
				rectDynamicDiv
				{
				    "x": 731,
				    "y": -179.125,
				    "width": 56,
				    "height": 56,
				    "top": -179.125,
				    "right": 787,
				    "bottom": -123.125,
				    "left": 731
				}		
			*/
			rectCoords.x = Math.floor(Math.abs(rectDynamicDiv.x - rectClientImage.x));
			rectCoords.left = Math.floor(Math.abs(rectDynamicDiv.left - rectClientImage.left));
			
			rectCoords.y = Math.floor(Math.abs(rectDynamicDiv.y - rectClientImage.y));
			rectCoords.top = Math.floor(Math.abs(rectDynamicDiv.top - rectClientImage.top));
			
			rectCoords.right = Math.floor(rectCoords.x + rectDynamicDiv.width);
			rectCoords.bottom = Math.floor(rectCoords.y + rectDynamicDiv.wheight);
			
			rectCoords.width = Math.floor(rectDynamicDiv.width);
			rectCoords.height = Math.floor(rectDynamicDiv.height);
		}
		return rectCoords;
	}
	
	function DoAddImageArea()
	{
		let selectImageAreas = document.getElementById("select_image_areas"),
			imgGroupPhoto = document.getElementById("img_group_photo")
			textName = document.getElementById("text_name"),
			buttonNewAreaSquare = document.getElementById("button_new_area_square"),
			buttonAddImageArea = document.getElementById("button_add_image_area"),
			buttonCreateNewImageMap = document.getElementById("button_create_image_map"),
			pInstructions = document.getElementById("p_instructions"),
			strAreaHTML = "", strCoords = "", rectCoords = null;
		
		if (selectImageAreas && imgGroupPhoto && buttonNewAreaSquare && buttonAddImageArea && pInstructions)
		{
			let rect = g_arrayDynamicDivs[g_nSelectedDivIndex].getBoundingClientRect(),
				strName = prompt("What is the name and position of this person, e.g. Joe Bloggs (Volunteer)");
			
			buttonNewAreaSquare.disabled = false;
			buttonAddImageArea.disabled = true;
			buttonCreateNewImageMap.disabled = false;
			pInstructions.disabled = true;
			
			rectCoords = DoGetCoords(imgGroupPhoto, g_arrayDynamicDivs[g_nSelectedDivIndex]);
			strCoords = rectCoords.left.toFixed(0) + "," + rectCoords.top.toFixed(0) + "," + 
						(rectCoords.left + rectCoords.width).toFixed(0) + "," + 
						(rectCoords.top + rectCoords.height).toFixed(0);
			
			// <area shape="rect" coords="89,93,121,139" alt="Rayne Canning - Vice president of the management committee)" 
			// href="#" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" 
			// onclick="alert('Reyne Canning (Vice president of the management committee)')" />
			strAreaHTML = "<area shape=\"rect\" coords=\"" + strCoords + "\" " + 
							"alt=\"" + strName + "\" href=\"#\" " + 
							"onfocus=\"DoSpeakElement(this)\" onmouseenter=\"DoSpeakElement(this)\" " + 
							"onclick=\"alert('" + strName + "')\" />";
			
			const optionNew = new Option(strAreaHTML, g_nSelectedDivIndex);
			selectImageAreas.add(optionNew);
			g_nSelectedDivIndex = -1;
		}
	}
	
	function DoEditName()
	{
		let selectImageAreas = document.getElementById("select_image_areas"),
			strName = "", strNewName = "", strOption = "", strOptionText = "", nPos = 0;
		
		if (selectImageAreas)
		{
			strOption = selectImageAreas.options[selectImageAreas.selectedIndex];
			strOptionText = strOption.text;
			
			nPos = strOptionText.indexOf("alt=\"") + 5;
			strName = strOptionText.substring(nPos, strOptionText.indexOf("\"", nPos));
			strNewName = prompt("What is the name and position of this person, e.g. Joe Bloggs (Volunteer)", strName);
			
			if (strNewName !== null)
			{
				strOptionText = strOptionText.replace("alt=\"" + strName + "\"", "alt=\"" + strNewName + "\"");
				strOptionText = strOptionText.replace("alert=\"" + strName + "\"", "alert=\"" + strNewName + "\"");
			
				selectImageAreas.options[selectImageAreas.selectedIndex].text = strOptionText;
			}
		}
	}
	
	function DoSubmitForm()
	{
		let formGroupPhoto = document.getElementById("form_group_photo"),
			buttonCreateNewImageMap = document.getElementById("button_create_image_map"),
			selectImageAreas = document.getElementById("select_image_areas"),
			hiddenAreasHTML = document.getElementById("hidden_areas_html");
		
		if (formGroupPhoto && buttonCreateNewImageMap && selectImageAreas && hiddenAreasHTML)
		{
			let strAreaTagList = "";
			for (let nI = 0; nI < selectImageAreas.options.length; nI++)
			{
				strAreaTagList += selectImageAreas.options[nI].text + "####";
			}
			strAreaTagList = strAreaTagList.replaceAll("\"", "'");
			hiddenAreasHTML.value = strAreaTagList;
			//formGroupPhoto.submit();
			alert("FORM SUBMIT DISABLED FOR TESTING");
		}
	}
	
</script>

<?php

	DoDisplayGroupPhotoForm();
	
?>

<div id="div_group_photo_form_instructions" class="instruction_popup">

	<h1>INSTRUCTIONS FOR THE NEW GROUP PHOTO FORM</h1>
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_group_photo_form_instructions', false)">CLOSE</button></p>
	
	<p>The purpose of this page at present is to allow admin staff to add a new Mill House group photo, with clickable 
	areas, to the home page. Although the clickable image map is just simple HTML code, it is not easy for a novice 
	administrator to get it to work properly. Therefore is as been automated via this form.</p>
	
	<p><img src="images/ClickableGroupPhoto.jpg" alt="ClickableGroupPhoto.jpg" height="250"/></p>
	
	<p>The image and the image map HTML code are generated via PHP code using map elements stored in the 'group_image_areas' 
	table in the database. You use this form to 'populate' that table. The steps are as follows:</p>
	
	<ol>
		<li>Select a new group photo - this is required.</li>
		<li>Once an image file is slected, it will be dsiplayed and nd the 'NEW AREA SQUARE' button will be enabled.</li>
		<li>
			You can change the size of the image by editing the number is the 'IMAGE HEIGHT' input:
			<ul>
				<li>The preview image will change its size.</li>
				<li>The image on the home page will look the same as the oreview image.</li>
			</ul>
		</li>
		<li>
			Next click the 'NEW AREA SQUARE' button. Three things will happen:
			<ul>
				<li>A red square will appear to the left of the new group photo.</li>
				<li>The 'NEW AREA SQUARE' button is disabled</li>
				<li>The 'ADD IMAGE AREA' button is enabled</li>
			</ul>
		</li>
		<li>
			Hover the mouse over the edges and middle of the red square - the mouse cursor will change.
			<ul>
				<li>
					Hovering the mouse over the middle of the red square will show the 'hand' cursor - click and hold the 
					left mouse button to grab the red square a drag it over the top of one of the faces in the group photo 
					and then release the left mouse button to drop the red square in that position.
				</li>
				<li>
					Hovering the mouse over the left or right edges of the red square will show the horizontal double arrow 
					cursor - click and hold the left mouse button to grab either edge and drag it left or right.
				</li>
				<li>
					Hovering the mouse over the top or bottom edges of the red square will show the vertical double arrow 
					cursor - click and hold the left mouse button to grab either edge and drag it up or down.
				</li>
			</ul>
		</li>
		<li>
			Once you are happy with the position and size of the red square scroll down and click the 'ADD IMAGE AREA' 
			button. The following things will happen:
			<ul>
				<li>The HTML code for the required &lt;area ...&gt; will be added to the list box.</li>
				<li>
					You will be prompted to type the name and position of this person:
					<ul>
						<li>This will appear in a popup message box if that area on the image is clicked.</li>
						<li>
							It will be read out aloud if 'VOICE ASSIST' is enabled and the mouse cursor hovers inside 
							this areas.
						</li>
						<li>It will be read out aloud if the vistor tabs to that area using the keyboard.</li>
					</ul>
				</li>
				<li>
					The coordinates of the square, relative to the top left corner of the group photo, are automatically 
					calculated - this is the hard part of creating clickable images.
				</li>
				<li>The 'NEW AREA SQUARE' button is enabled.</li>
				<li>'NEW AREA SQUARE' button is disabled.</li>
			</ul>
		</li>
		<li>Next click the 'NEW AREA SQUARE' button again.</li>
		<li>Repeat the process as many times as required by the faces in the group photo.</li>
		<li>
			If you make a selection in the list box then two things will happen:
			<ul>
				<li>
					The 'EDIT NAME' button is enabled - click it and you can change the name and position of the person in 
					that list item.
				</li>
				<li>The 'DELETE IMAGE AREA' is enabled - click it and that list item will be permanently deleted.</li>
			</ul>
		</li>
		<li>As soon as you add an item to the list box the 'CREATE NEW CLICKABLE IMAGE' button is enabled.</li>
		<li>If you delete all the items from the list box then the 'CREATE NEW CLICKABLE IMAGE' button is disabled.</li>
		<li>
			Once you are happy with the areas, and their details, click the 'CREATE NEW CLICKABLE IMAGE' button.
		</li>
		<li>
			The list is sent to the web server where it is used to replace the contents of the 
			'group_image_areas' table in the database.
		</li>
	</ol>
	
	<p><button type="button" onclick="DoDisplayHidePopup('div_group_photo_form_instructions', false)">CLOSE</button></p>

</div>

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>The form in contents of this page are automatically generated by PHP code and the onlu purpose of this page is 
	to provide you with access to the database. So you can ignore this page entirely.</p>
	
	<p>The ste</p>	
	
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
		DoSetVoiceAssistInputs();
		DoAllAttachListeners("div_content");
		DoAllAttachListeners("div_navigation_menu");
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

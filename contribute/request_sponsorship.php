<?php 

	require_once "../common.php"; 
	
	DoRecordPageHitOrBlock();
		
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
		<title>Sponsorship Request</title>
		<style type="text/css">





























































































































			.form textarea
			{
				width: 70ch;
				font-family: Arial, Helvetica, sans-serif;
			}
			
			pre
			{
				display: inline;
			}
			
			.heading
			{
				display: inline;
				font-family: Arial, Helvetica, sans-serif!important;
				color: black!important;
			}
			
			.form
			{
				width: 750px;
			}		
			.form table
			{
			}
			
			.form td
			{
				padding: 0px!important;
			}
			
			.form button
			{
				height: 40px;
				width: auto!important;
				font-size: small;
				font-family: Arial, Helvetica, sans-serif;
				font-weight: normal;
				font-style: normal;
				font-size: small;
				padding: 0px 10px 0px 10px;
				color: black;
			}
			
			.advert_preview
			{
				font-family: Arial, Helvetica, sans-serif!important;
				font-size: small;
				border-style: solid;
				border-color: black;
				border-width: thin;
				vertical-align: top;
				text-align: left;
				width: var(--advert_slot_width);
				height: var(--advert_slot_height);
				padding: var(--advert_slot_padding);
				border-radius: var(--advert_slot_border_radius);
				background-color: white;
				overflow: hidden;
			}
			
			.div_list_items
			{
				font-family: Arial, Helvetica, sans-serif!important;
				font-size: small;
				border-style:solid;
				border-color:black;
				border-width:thin;
				vertical-align:top;
				text-align: left;
				padding: var(--advert_slot_padding);
				border-radius: var(--advert_slot_border_radius);
				background-color: white;
				overflow: auto;
				height: 100px;
				text-align: left;
				vertical-align: top;
				padding: var(--advert_slot_padding)!important;
			}
			
			.div_list_items li,
			.advert_preview li,
			.div_list_items ul,
			.advert_preview ul,
			.div_list_items ol,
			.advert_preview ol
			{
				font-family: Arial, Helvetica, sans-serif!important;
				font-size: small;
			}
			
			.textarea_design
			{
				font-size: x-small;
				overflow: auto;
			}
			
			.form p, .form li
			{
				font-size: small;
			}
			
		</style>
		<script type="text/javascript">
		
			function DoOnPageLoadComplete()
			{
				let divMarquee = document.getElementById("advert_marquee");
				
				if (divMarquee)
					divMarquee.style.display = "none";
			}
			
			function OnChangeAdvertHTML()
			{
				let textareaAdvert = document.getElementById("textarea_design"),
					tdAdvertPreview = document.getElementById("advert_preview");
					
				if (textareaAdvert && tdAdvertPreview)
				{
					tdAdvertPreview.innerHTML = textareaAdvert.value;
				}
			}
			
			function OnClickBold()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, "<b>" + strSelectedText + "</b>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<b></b>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickUnderline()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, "<u>" + strSelectedText + "</u>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<u></u>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickItalic()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, "<i>" + strSelectedText + "</i>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<i></i>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
			}
			function OnClickStrikeThrough()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, "<s>" + strSelectedText + "</s>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<s></s>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickSuperscript()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, "<sup>" + strSelectedText + "</sup>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<sup></sup>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickSubscript()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, "<sub>" + strSelectedText + "</sub>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<sub></sub>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickAddListItem()
			{
				let textAreaDesign = document.getElementById("textarea_design"), 
					textNewListItem = document.getElementById("text_new_list_item"),
					tdListItems = document.getElementById("div_list_items");
					
				if (textAreaDesign && textNewListItem && tdListItems)
				{
					if (textNewListItem != "")
						tdListItems.innerText += textNewListItem.value + "\n";
				}
			}
			
			g_bOrderedList = false;
			
			function OnClickAddList()
			{
				let tableList = document.getElementById("table_list"),
					tdListItems = document.getElementById("div_list_items"),
					textAreaDesign = document.getElementById("textarea_design"),
					selectNumberStyle = document.getElementById("select_number"),
					selectBulletStyle = document.getElementById("select_bullet"),
					colorText = document.getElementById("color_list_text"),
					colorBullet = document.getElementById("color_list_bullet"),
					colorBorder = document.getElementById("color_list_border"),
					selectListBorderStyle = document.getElementById("select_list_border_style"),
					selectListBorderWidth = document.getElementById("select_list_border_width"),
					textPadding = document.getElementById("number_list_padding"),
					textMargin = document.getElementById("number_list_margin"),
					strListHTML = "", strListItems = "", strNextItem = "", 
					nPos = 0, nI = 1, strPrefix = "", strBulletOrNumber = "";
	
				if (tableList && tdListItems && textAreaDesign && selectBulletStyle && selectNumberStyle && 
					colorText && colorBullet && colorBorder && selectListBorderStyle && selectListBorderWidth && 
					textPadding && textMargin)
				{
					strListItems = tdListItems.innerText;
					strListHTML += "<div style=\"display:inline-block;font-size:small;vertical-align:top;border:" + 
									selectListBorderWidth.options[selectListBorderWidth.selectedIndex].value + " " + 
									colorBorder.value + " " + 
									selectListBorderStyle.options[selectListBorderStyle.selectedIndex].value + 
									";padding:" + textPadding.value + "px;margin:" + textMargin.value + "px;\">\n";
					while (strListItems.length > 0)
					{
						if (g_bOrderedList)
						{
							strPrefix = selectNumberStyle.options[selectNumberStyle.selectedIndex].value;
							strPrefix = strPrefix.replace("X", nI.toString());
						}
						else
						{
							strPrefix = selectBulletStyle.options[selectBulletStyle.selectedIndex].value;
						}
						nI++;
							
						nPos = strListItems.indexOf("\n");
						strNextItem = strListItems.slice(0, nPos);
						strListItems = strListItems.slice(nPos + 1);
						strListHTML += "    <span style=\"color:" + colorBullet.value + ";\">" + strPrefix  + "</span><span style=\"color:" + colorText.value + "\">" + strNextItem + "</span>\n";
					}
					strListHTML += "</div>\n";
					textAreaDesign.value = textAreaDesign.value.slice(0, textAreaDesign.selectionStart) + strListHTML + 
											textAreaDesign.value.slice(textAreaDesign.selectionStart);
					tableList.style.display = "none";
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickOrderedList()
			{
				let tableList = document.getElementById("table_list");
				
				if (tableList)
				{
					tableList.style.display = "block";
					document.getElementById("tr_number_label").style.display = "block";
					document.getElementById("tr_number_select").style.display = "block";
					document.getElementById("tr_bullet_label").style.display = "none";
					document.getElementById("tr_bullet_select").style.display = "none";
				}
				g_bOrderedList = true;
			}
			
			function OnClickUnorderedList()
			{
				let tableList = document.getElementById("table_list");
				
				if (tableList)
				{
					tableList.style.display = "block";
					document.getElementById("tr_number_label").style.display = "none";
					document.getElementById("tr_number_select").style.display = "none";
					document.getElementById("tr_bullet_label").style.display = "block";
					document.getElementById("tr_bullet_select").style.display = "block";
				}
				g_bOrderedList = false;
			}
			
			function OnClickInsertImage()
			{
				let textAreaDesign = document.getElementById("textarea_design"),
					tableImage = document.getElementById("table_image"),
					textImageURL = document.getElementById("text_image_url"),
					textImageWidth = document.getElementById("text_image_width"),
					textImageHeight = document.getElementById("text_image_height");
				
				if (textAreaDesign && tableImage && textImageURL && textImageWidth && textImageHeight)
				{
					textAreaDesign.value = textAreaDesign.value.split(0, textAreaDesign.selectionStart) + 
											"<img src='" + textImageURL.value + "' alt='" + textImageURL.value + 
											"' style='width:" + textImageWidth.value + "mm;height:" + 
											textImageHeight.value + "mm;' />" +
					 						textAreaDesign.value.split(textAreaDesign.selectionStart)
					tableImage.style.display = "none";
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickImage()
			{
				let tableImage = document.getElementById("table_image");
				
				if (tableImage)
					tableImage.style.display = "block";
			}
			
			function OnClickInsertHyperlink()
			{
				let tableHyperlink = document.getElementById("table_hyperlink"),
					textAreaDesign = document.getElementById("textarea_design")
					textLinkURL = document.getElementById("text_link_url"),
					textLinkString = document.getElementById("text_link_string");
							
				if (tableHyperlink && textAreaDesign && textLinkURL && textLinkString)
				{	
					textAreaDesign.value = textAreaDesign.value.split(0, textAreaDesign.selectionStart) +
										"<a href='" + textLinkURL.value + "'>" + textLinkString.value + "</a>" + 
										textAreaDesign.value.split(textAreaDesign.selectionStart)
					tableHyperlink.style.display = "none";
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickHyperlink()
			{
				let tableHyperlink = document.getElementById("table_hyperlink");
				
				if (tableHyperlink)
					tableHyperlink.style.display = "block";
			}
			
			function OnClickFont()
			{
				let tableFont = document.getElementById("table_font");
				
				if (tableFont)
					tableFont.style.display = "block";
			}
			
			function OnChangeSelectFont()
			{
				let selectFont = document.getElementById("select_font"),
					spanSampleText = document.getElementById("span_sample_text");
					
				if (selectFont && spanSampleText)
				{
					spanSampleText.style.fontFamily = selectFont.options[selectFont.selectedIndex].value;
				}
			}
			
			function OnChangeTextColor()
			{
				let colorText = document.getElementById("color_text"),
					spanSampleText = document.getElementById("span_sample_text");
					
				if (colorText && spanSampleText)
				{
					spanSampleText.style.color = colorText.value;
				}
			}
			
			function OnChangeBackgroundColor()
			{
				let colorBackground = document.getElementById("color_background"),
					spanSampleText = document.getElementById("span_sample_text");
					
				if (colorBackground && spanSampleText)
				{
					spanSampleText.style.backgroundColor = colorBackground.value;
				}
			}
			
			function OnChangeSelectFontSize()
			{
				let selectFontSize = document.getElementById("select_font_size"),
					spanSampleText = document.getElementById("span_sample_text");
					
				if (selectFontSize && spanSampleText)
				{
					spanSampleText.style.fontSize = selectFontSize.options[selectFontSize.selectedIndex].value;
				}
			}
			
			function OnClickAddFont()
			{
				let textAreaDesign = document.getElementById("textarea_design"),
					spanSampleText = document.getElementById("span_sample_text");
				
				if (textAreaDesign && spanSampleText)
				{
					const nStartPos = textAreaDesign.selectionStart,
							nEndPos = textAreaDesign.selectionEnd;
					let strSampleTextHTML = spanSampleText.outerHTML;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);

						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + 
												strSampleTextHTML.replace("Sample Text", strSelectedText) + 
												textAreaDesign.value.slice(nEndPos);						
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) +
												strSampleTextHTML.replace("Sample Text", "") + 
												textAreaDesign.value.slice(nEndPos);
					}
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickHeading1()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, " style='display:inline;'>" + strSelectedText + "</h1>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<h1 style='display:inline;'></h1>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickHeading2()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, "<h2 style='display:inline;'>" + strSelectedText + "</h2>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<h2 style='display:inline;'></h2>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickHeading3()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, "<h3 style='display:inline;'>" + strSelectedText + "</h3>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<h3 style='display:inline;'></h3>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickHeading4()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, "<h4 style='display:inline;'>" + strSelectedText + "</h4>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<h4 style='display:inline;'></h4>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickHeading5()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, "<h5 style='display:inline;'>" + strSelectedText + "</h5>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<h5 style='display:inline;'></h5>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
			}
			
			function OnClickHeading6()
			{
				let textAreaDesign = document.getElementById("textarea_design");
				
				if (textAreaDesign)
				{
					const nStartPos = textAreaDesign.selectionStart;
					const nEndPos = textAreaDesign.selectionEnd;
					
					if (nStartPos != nEndPos)
					{
						let strSelectedText = textAreaDesign.value.substring(nStartPos, nEndPos);
						textAreaDesign.value = textAreaDesign.value.replace(strSelectedText, "<h6 style='display:inline;'>" + strSelectedText + "</h6>");
					}
					else
					{
						textAreaDesign.value = textAreaDesign.value.slice(0, nStartPos) + "<h6 style='display:inline;'></h6>" + textAreaDesign.value.slice(nStartPos);
					}
					OnChangeAdvertHTML();
				}
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
						<td>
							<span class="masthead_hamburger">≡</span>
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
			<a href="contribute.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item">
				<a href="join.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a member</b></a></li>
				<li class="submenu_item">
				<a href="volunteering.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a volunteer</b></a></li>
				<li class="submenu_item">
				<a href="request_sponsorship.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Become a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="donation.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)"><b>Make a donation</b></a></li>
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
		<!--<li><a href="group_events/group_events.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Group Events</a></li>-->
		<li>
			<a href="../administration/administration.php" onclick="DoClickNavLinkWithSubmenu('administration')" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Administration</a>
			<ul style="display:<?php echo DoShowHideSubmenu("administration"); ?>;" id="administration">
			
			<?php DoDisplayAdministrationSubmenu(); ?>
			
			</ul>
		</li>
	</ul>
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
													echo "<button class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";
													
											?>
										</td>
									</tr>
								</table>			
								<form class="form_voice_assist_button"><button type="button" onclick="DoDisplayHidePopup('form_voice_assist', true)">
									<img src="../images/LoudSpeaker.png" alt="LoudSpeaker.png" height="70" /></button></form>

								<!-- #BeginEditable "CustomContent" -->



<?php
	$strAdvertSlotID = "";
	
	if (!isset($_SESSION["text_business_name"]))
		$_SESSION["text_business_name"] = "";
	if (!isset($_SESSION["text_website"]))
		$_SESSION["text_website"] = "";
	if (!isset($_SESSION["text_logo"]))
		$_SESSION["text_logo"] = "";
	if (!isset($_SESSION["text_your_name"]))
		$_SESSION["text_your_name"] = "";
	if (!isset($_SESSION["text_phone"]))
		$_SESSION["text_phone"] = "";
	if (!isset($_SESSION["text_email"]))
		$_SESSION["text_email"] = "";
	if (!isset($_SESSION["select_advert_slot"]))
		$_SESSION["select_advert_slot"] = "";
	if (!isset($_SESSION["select_number_months"]))
		$_SESSION["select_number_months"] = "";
	if (!isset($_SESSION["text_cost_per_month"]))
		$_SESSION["text_cost_per_month"] = "";
	if (!isset($_SESSION["textarea_design"]))
		$_SESSION["textarea_design"] = "";
		
	if (isset($_GET["advert_slot_id"]))
		$strAdvertSlotID = $_GET["advert_slot_id"];
	else
		$strAdvertSlotID = $_SESSION["select_advert_slot"];
			
	function DoGetSelectedOrNot($nSelectedIndex, $nOptionIndex)
	{
		if ($nSelectedIndex == $nOptionIndex)
			return "selected";
		else
			return "";
	}

?>
<p>&nbsp;</p>
<form class="form" id="edit_sponsor_form" method="post" target="_self" action="sponsorship_request_sent.php">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<h2>SPONSORSHIP DETAILS</h2>
				<h4>NOTE: ...</h4>
				<ul>
					<li>You sponsorship request will need to be approved by the committee.</li>
					<li>Once approved you will need to pay for your sponsorship.</li>
					<li>Your whole sponsorship contents will be a hyperlink to your business website.</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td style=" "><label for="text_business_name">Your business name</label></td>
		</tr>
		<tr>
			<td><input type="text" id="text_business_name" name="text_business_name" value="<?php echo $_SESSION["text_business_name"]; ?>" onkeypress="OnKeyPressComment(event)" /><br/><br/></td>
		</tr>
		<tr>
			<td style=" "><label for="text_contact_name">Your name</label></td>
		</tr>
		<tr>
			<td><input type="text" id="text_your_name" name="text_your_name" value="<?php echo $_SESSION["text_your_name"]; ?>" onkeypress="OnKeyPressName(event)" /><br/><br/></td>
		</tr>
		<tr>
			<td style=" "><label for="text_email">Your email address</label></td>
		</tr>
		<tr>
			<td><input type="text" id="text_email" name="text_email" value="<?php echo $_SESSION["text_email"]; ?>" onkeypress="OnKeyPressEmailAddress(event)" /><br/><br/></td>
		</tr>
		<tr>
			<td style=" "><label for="text_phone">Your phone number</label></td>
		</tr>
		<tr>
			<td><input type="text" id="text_phone" name="text_phone" value="<?php echo $_SESSION["text_phone"]; ?>" onkeypress="OnKeyPressPhone(event)" /><br/><br/></td>
		</tr>
		<tr>
			<td style=" "><label for="text_website">Your website URL</label></td>
		</tr>
		<tr>
			<td><input type="text" id="text_website" name="text_website" value="<?php echo $_SESSION["text_website"]; ?>" onkeypress="OnKeyPressURL(event)" /><br/><br/></td>
		</tr>
		<tr>
			<td style=" "><label for="text_logo_url">Your company logo URL</label></td>
		</tr>
		<tr>
			<td><input type="text" id="text_logo_url" name="text_logo_url" value="<?php echo $_SESSION["text_logo"]; ?>" onkeypress="OnKeyPressURL(event)" /><br/><br/></td>
		</tr>
		
<!--
		<tr>
			<td style=" "><label for="textarea_design">Design your advert</label></td>
		</tr>
		<tr>
			<td>
				<br/>
				<p>NOTE: If you know how to edit HTML and CSS code then you can do so directly here. Or you can edit it in an external 
				editor and paste it in here. If you want to learn how to edit HTML and CSS code then there are beginners guides in this 
				website:</p>
				<ul>
					<li><a href="admin/html_4_beginners.php">Beginners guide to HTML</a></li>
					<li><a href="admin/css_4_beginners.php">Beginners guide to CSS</a></li>
				</ul>
				<textarea id="textarea_design" name="textarea_design" class="textarea_design" rows="10" value="<?php echo $_SESSION["textarea_design"]; ?>" onkeypress="OnChangeAdvertHTML()" onkeydown="OnChangeAdvertHTML()" onkeyup="OnChangeAdvertHTML()"></textarea><br/><br/>
			</td>
		</tr>
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td><button type="button" onclick="OnClickBold()"><b>B</b></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickUnderline()"><u>U</u></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickItalic()"><i>I</i></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickStrikeThrough()"><s>S</s></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickSuperscript()">X<sup>2</sup></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickSubscript()">X<sub>2</sub></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickOrderedList()" style="width:10ch!important;">1. LIST</button>&nbsp;</td>
						<td><button type="button" onclick="OnClickUnorderedList()" style="width:10ch!important;">● LIST</button>&nbsp;</td>
						<td><button type="button" onclick="OnClickImage()"><img src="images/picture.jpg" alt="picture.jpg" height="20"/></button>&nbsp;</td>
						<!--<td><button type="button" onclick="OnClickHyperlink()"><img src="images/link.png" alt="link.png" height="20"/></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickFont()"><span style="font-family:Arial, Helvetica, sans-serif";color:red;>A</span><span style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif";background-color:yellow;>A</span></button>&nbsp;</td>

						<td><button type="button" onclick="OnClickHeading1()"><h1 class="heading">H1</h1></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickHeading2()"><h2 class="heading">H2</h2></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickHeading3()"><h3 class="heading">H3</h3></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickHeading4()"><h4 class="heading">H4</h4></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickHeading5()"><h5 class="heading">H5</h5></button>&nbsp;</td>
						<td><button type="button" onclick="OnClickHeading6()"><h6 class="heading">H6</h6></button>&nbsp;</td>
					</tr>
				</table>
				<hr/>
				<table border="0" cellpadding="0" cellspacing="0" style="display:none;" id="table_font">
					<tr>
						<td><h3>FONT, TEXT COLOR &amp; BACKGROUND COLOR</h3><br/><br/></td>
					</tr>
					<tr>
						<td><span id="span_sample_text">Sample Text</span><br/><br/></td>
					</tr>
					<tr>
						<td><label for="select_font">Select the font</label></td>
					</tr>
					<tr>
						<td>
							<select id="select_font" onchange="OnChangeSelectFont()">
								<option selected value="Arial"><span style="font-family:Arial, sans-serif;">Arial</span> (sans-serif)</option>
								<option value="Verdana"><span style="font-family:Verdana, sans-serif;">Verdana</span> (sans-serif)</option>
								<option value="Tahoma"><span style="font-family:Tahoma, sans-serif;">Tahoma</span> (sans-serif)</option>
								<option value="Trebuchet MS"><span style="font-family:Trebuchet MS, sans-serif;">Trebuchet MS</span> (sans-serif)</option>
								<option value="Times New Roman"><span style="font-family:Times New Roman, serif;">Times New Roman</span> (serif)</option>
								<option value="Georgia"><span style="font-family:Georgia, serif;">Georgia</span> (serif)</option>
								<option value="Garamond"><span style="font-family:Garamond, serif;">Garamond</span> (serif)</option>
								<option value="Courier New"><span style="font-family:Courier New, monospace;">Courier New</span> (monospace)</option>
								<option value="Brush Script MT"><span style="font-family:Brush Script MT, cursive;">Brush Script MT</span> (cursive)</option>
							</select><br/><br/>
						</td>
					</tr>
					<tr>
						<td><label for="color_text">Text color</label></td>
					</tr>
					<tr>
						<td>
							<input type="color" id="color_text" onchange="OnChangeTextColor()" /><br/><br/>
						</td>
					</tr>
					<tr>
						<td><label for="color_background"></label></td>
					</tr>
					<tr>
						<td>
							<input type="color" id="color_background" onchange="OnChangeBackgroundColor()" /><br/><br/>
						</td>
					</tr>
					<tr>
						<td><label for="select_font_size">Select font size</label></td>
					</tr>
					<tr>
						<td>
							<select id="select_font_size" onchange="OnChangeSelectFontSize()">
								<option selected value="xxx-small"><span style="font-size:xxx-small;">XXX Small</span></option>
								<option value="xx-small"><span style="font-size:xx-small;">XX Small</span></option>
								<option value="x-small"><span style="font-size:x-small;">X Small</span></option>
								<option value="small"><span style="font-size:small;">Small</span></option>
								<option value="medium"><span style="font-size:medium;">Medium</span></option>
								<option value="large"><span style="font-size:large;">Large</span></option>
								<option value="x-large"><span style="font-size:x-large;">X Large</span></option>
								<option value="xx-large"><span style="font-size:xx-large;">XX Large</span></option>
								<option value="xxx-large"><span style="font-size:xxx-large">XXX Large</span></option>
							</select><br/><br/>
						</td>
					</tr>
					<tr>
						<td><button type="button" onclick="OnClickAddFont()">ADD FONT</button></td>
					</tr>
				</table>
				
				<table border="0" cellpadding="0" cellspacing="0" style="display:none;" id="table_image">
					<tr>
						<td><h3><u>IMAGE DETAILS</u></h3><br/><br/></td>
					</tr>
					<tr>
						<td><label for="text_image_url">URL of your image</label></td>
					</tr>
					<tr>
						<td><input type="text" id="text_image_url" onkeypress="OnKeyPressURL(event)" /><br/><br/></td>
					</tr>
					<tr>
						<td><label for="text_image_width">Image width in millimeters</label></td>
					</tr>
					<tr>
						<td><input type="text" id="text_image_width" onkeypress="OnKeyPressDigitsOnly(event)" /><br/><br/></td>
					</tr>
					<tr>
						<td><label for="text_image_height">Image height in millimeters</label></td>
					</tr>
					<tr>
						<td><input type="text" id="text_image_height" onkeypress="OnKeyPressDigitsOnly(event)" /><br/><br/></td>
					</tr>
					<tr>
						<td><button type="button" onclick="OnClickInsertImage()"><b>ADD</b></button><br/><br/></td>
					</tr>
				</table>
				
				<table border="0" cellpadding="0" cellspacing="0" style="display:none;" id="table_hyperlink">
					<tr>
						<td><h3><u>HYPERLINK DETAILS</u></h3><br/><br/></td>
					</tr>
					<tr>
						<td><label for="text_link_url">URL of your hyperlink</label></td>
					</tr>
					<tr>
						<td><input type="text" id="text_link_url" onkeypress="OnKeyPressURL(event)" /><br/><br/></td>
					</tr>
					<tr>
						<td><label for="text_link_string">Descriptive text for the hyperlink</label></td>
					</tr>
					<tr>
						<td><input type="text" id="text_link_string" onkeypress="OnKeyPressComment(event)" /><br/><br/></td>
					</tr>
					<tr>
						<td><button type="button" onclick="OnClickInsertHyperlink()"><b>ADD</b></button><br/><br/></td>
					</tr>
				</table>
				
				<table border="0" cellpadding="0" cellspacing="0" style="display:none;" id="table_list">
					<tr>
						<td><h3><u>LIST DETAILS</u></h3><br/><br/></td>
					</tr>
					<tr>
						<td><label for="select_list_border_style" id="">Border style</label></td>
					</tr>
					<tr>
						<td>
							<select id="select_list_border_style">
								<option selected value="solid">Solid</option>
								<option value="dotted">Dotted</option>
								<option value="dashed">Dashed</option>
								<option value="double">Double</option>
								<option value="none">None</option>
							</select><br/><br/>
						</td>
					</tr>
					<tr>
						<td><label for="select_list_border_width" id="">Border width</label></td>
					</tr>
					<tr>
						<td>
							<select id="select_list_border_width">
								<option selected value="thin">Thin</option>
								<option value="medium">Medium</option>
								<option value="thick">Thick</option>
							</select><br/><br/>
						</td>
					</tr>
					<tr>
						<td><label for="number_list_margin">Margins</label></td>
					</tr>
					<tr>
						<td>
							<input type="number" id="number_list_margin" value="2" min="0" max="10" maxlength="2" onkeypress="OnKeyPressDigitsOnly(event)"/> pixels<br/><br/>
						</td>
					</tr>

					<tr>
						<td><label for="number_list_padding">Padding</label></td>
					</tr>
					<tr>
						<td>
							<input type="number" id="number_list_padding" value="2" min="0" max="10" maxlength="2" onkeypress="OnKeyPressDigitsOnly(event)"/> pixels<br/><br/>
						</td>
					</tr>
					<tr>
						<td><label for="color_list_border">Border color</label></td>
					</tr>
					<tr>
						<td>
							<input type="color" id="color_list_border" /><br/><br/>
						</td>
					</tr>
					<tr>
						<td><label for="color_list_text">Text color</label></td>
					</tr>
					<tr>
						<td>
							<input type="color" id="color_list_text" /><br/><br/>
						</td>
					</tr>
					<tr>
						<td><label for="color_list_bullet">Bullet or number color</label></td>
					</tr>
					<tr>
						<td>
							<input type="color" id="color_list_bullet" /><br/><br/>
						</td>
					</tr>
					<tr id="tr_bullet_label">
						<td><label for="select_bullet" id="">Select bullet style</label></td>
					</tr>
					<tr id="tr_bullet_select">
						<td>
							<select id="select_bullet">
								<option selected value="■ ">■</option>
								<option value="□ ">□</option>
								<option value="▪ ">▪</option>
								<option value="▫ ">▫</option>
								<option value="● ">●</option>
								<option value="○ ">○</option>
								<option value="◦ ">◦</option>
								<option value="♦ ">♦</option>
								<option value="◊ ">◊</option>
								<option value="◊ ">◊</option>
								<option value="► ">►</option>
								<option value="- ">-</option>
								<option value="* ">*</option>
							</select><br/><br/>
						</td>
					</tr>
					<tr id="tr_number_label">
						<td><label for="select_bullet" id="">Select bullet style</label></td>
					</tr>
					<tr id="tr_number_select">
						<td>
							<select id="select_number">
								<option selected value=". ">1. XXX</option>
								<option value="X) ">1) XXX</option>
								<option value="X - ">1 - XXX</option>
								<option value="[X] ">[1] XXX</option>
								<option value="(X) ">(1) XXX</option>
								<option value="<X> ">&lt;1&gt; XXX</option>								
							</select><br/><br/>
						</td>
					</tr>
					<tr>
						<td><label for="text_new_list_item">New list item</label></td>
					</tr>
					<tr>
						<td><input type="text" id="text_new_list_item" onkeypress="OnKeyPressComment(event)" /><br/><br/></td>
					</tr>
					<tr>
						<td><button type="button" onclick="OnClickAddListItem()">ADD ITEM</button><br/><br/></td>
					</tr>
					<tr>
						<td><label for="">LIST ITEMS</label></td>
					</tr>
					<tr>
						<td><div id="div_list_items" class="div_list_items"></div></td>
					</tr>
					<tr>
						<td><br/><br/><button type="button" onclick="OnClickAddList()">ADD LIST</button></td>
					</tr>
				</table>
				<hr/>
			</td>
		</tr>
		<tr>
			<td><label for="advert_preview"><h3>Advert preview</h3></label></td>
		</tr>
		<tr>
			<td><div id="advert_preview" class="advert_preview"></div><br/><br/></td>
		</tr>
-->
		<tr>
			<td><button type="submit" name="button_request_c">SEND REQUEST</button></td>
		</tr>
	</table>
</form>

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>ALL the contents of this page is just plain HTML and CSS, except for some PHP code that maniplates input contents 
	in the form. But please do not edit the contents of this page unless you are an expert.</p>
	
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
		
		if (JSON.parse(sessionStorage.getItem("bAudioAssistOn")))
		{
			alert("The audio assist feature requires user interaction to 'activate'.\n\nYou will need to click a blank part of the page after you close this message box.\n\nIt is annoying, but it is web browser requirement.");
		}
		
	</script>
	
</html>
<!-- #BeginEditable "End" -->

<?php DoShowMessage(); ?>

<!-- #EndEditable -->

//******************************************************************************
//******************************************************************************
//** 
//** AUDIO ASSIST FUNCTIONS
//** 
//******************************************************************************
//******************************************************************************

let g_strVoiceOptions = "",
	g_arrayVoices = [];
	
if (localStorage.getItem("range_volume") === null)
	localStorage.setItem("range_volume", 100);
	
if (localStorage.getItem("range_speed") === null)
	localStorage.setItem("range_speed", 100);
	
if (localStorage.getItem("range_pitch") === null)
	localStorage.setItem("range_pitch", 100);
	
	
function DoGetVoiceOptions()
{
	let option = null;	

	// Fetch g_arrayVoices from the browser's audio engine.
	g_arrayVoices = window.speechSynthesis.getVoices();
	
	g_strVoiceOptions = "";
	
	// Loop through g_arrayVoices and add them to the dropdown list
	for (let nI = 0; nI < g_arrayVoices.length; nI++)
	{
		strSelected = "";
		if (parseInt(localStorage.getItem("nIndexSelectedVoice")) == nI)
			strSelected = " selected";
		g_strVoiceOptions += "<option value=\"" + nI.toString() + "\"" + strSelected + ">" + g_arrayVoices[nI].name +  
				"</option>\n";		
	}
}

if ((typeof window.speechSynthesis !== "undefined") && (g_strVoiceOptions.length == 0))
{
	window.speechSynthesis.onvoiceschanged = DoGetVoiceOptions;
	DoGetVoiceOptions(); 
}

function DoStopSpeaking()
{
	window.speechSynthesis.cancel();
}

function DoSpeakText(strText)
{
	let nIndex = parseInt(localStorage.getItem("nIndexSelectedVoice"));
	
	if (strText != "")
	{
    	// 1. Create a new SpeechSynthesisUtterance object
    	let utterance = new SpeechSynthesisUtterance(strText),
	    	nVolume = Number(localStorage.getItem("range_volume")) / 100,
	    	nSpeed = Number(localStorage.getItem("range_speed")) / 100,
	    	nPitch = Number(localStorage.getItem("range_pitch")) / 100;

	    // 2. (Optional) Customize the voice parameters
	    utterance.rate = nSpeed;  // Speed (0.1 to 10)
	    utterance.pitch = nPitch; // Pitch (0 to 2)
	    utterance.volume = nVolume; // Volume (0 to 1)
	    utterance.voice = g_arrayVoices[parseInt(localStorage.getItem("nIndexSelectedVoice"))];
		
	    // 3. Pass the utterance to the speechSynthesis API to speak it aloud
	    window.speechSynthesis.cancel();
	    window.speechSynthesis.speak(utterance);
	}
}

function DoSpeakElement(Element, strText = "")
{
	if (JSON.parse(localStorage.getItem("bAudioAssistOn")))
	{
		if (strText.length > 0)
		{
			// Do nothing...
		}
		else
		{
			if (Element)
			{
				let strTagName = Element.tagName.toLowerCase();
				
				if ((strTagName == "p") || (strTagName == "a") || (strTagName == "li") || (strTagName == "h1") || 
						 (strTagName == "h2") || (strTagName == "h3") || (strTagName == "h4") || (strTagName == "h5") || 
						 (strTagName == "h6"))	
				{
					strText = Element.innerText;
				}
				else if (strTagName == "a")
				{
					if ((Element.alt !== null) && (Element.alt !== ""))
						strText = Element.alt;
					else
						strText = Element.innerText;
				}
				else if (strTagName == "img")
				{
					strText = Element.title;
				}
				else if (strTagName == "area")
				{
					strText = Element.alt;
				}
				else if ((strTagName == "div") || (strTagName == "span"))
				{
					if (Element.id == "div_navigation_arrow")
					{
						if (JSON.parse(sessionStorage.getItem("menu_open")))
							strText = "Close the main menu";
						else
							strText = "Open the main menu";
					}
					else if (Element.id == "div_page_heading")
					{
						strText = Element.innerText;
					}
				}
				else if (strTagName == "select")
				{
					if (Element.size > 0)
						strText = "List box - select and item in the list box if any are available.";
					else
						strText = "Combo select box: click the button at the end and select an item, if available, from the popup list.";
				}
				else if (strTagName == "button")
				{
					if (Element.innerText !== "")
					{
						strText = "Click this button to  " + Element.innerText.toLowerCase() + ".";
					}
					else if (Element.title !== "")
					{
						strText =  "Click this button to " + Element.title + ".";
					}	
					else if (Element.type == "submit")
					{
						strText = "Click this button to submit the form.";
					}
					else if (Element.type == "reset")
					{
						strText = "Click this button to reset all the inputs.";
					}
					else if (Element.type == "button")
					{
						strText = "Click this button";
					}
				}
				else if (strTagName == "label")
				{
					strText = Element.innerText;
				}
				else if (strTagName == "input")
				{
					if (Element.type.toLowerCase() == "button")
					{
						strText = "Click this button to " + Element.value + ".";
					}
					else if (Element.type.toLowerCase() == "checkbox")
					{
						strText = "Check box - click to toggle it.";
					}
					else if (Element.type.toLowerCase() == "color")
					{
						strText = "Color selector - click and select a color from the color popup.";
					}
					else if (Element.type.toLowerCase() == "date")
					{
						strText = "Date selector - type numeric values for day of the month, month and year. Or click button at the end to select them from the popup calendar.";
					}
					else if (Element.type.toLowerCase() == "datetime-local")
					{
						"Local date/time selector - type numeric values for day of the month, month, year, hour, minutes and seconds. Or click to select them from the popup calendar.";
					}
					else if (Element.type.toLowerCase() == "email")
					{
						strText = "Email text edit - type a valid email address.";
					}
					else if (Element.type.toLowerCase() == "file")
					{
						strText = "File selector - click the button and select a file from the file browser popup.";
					}
					else if (Element.type.toLowerCase() == "month")
					{
						strText = "Month selector - type a full month name or click the button at the end to select it from the calendar popup.";
					}
					else if (Element.type.toLowerCase() == "number")
					{
						strText = "Number text edit - type some digits or else use the up and down buttons at the end to increment and decrement the number.";
					}
					else if (Element.type.toLowerCase() == "password")
					{
						strText = "Password text edit - type your password.";
					}
					else if (Element.type.toLowerCase() == "radio")
					{
						strText = "Radio button - click to check this radio button and uncheck any currently checked button. ";
					}
					else if (Element.type.toLowerCase() == "range")
					{
						strText = "Slider - move the tab left and right to set a value between " + Element.min + " and " +Element.max + ".";
					}
					else if (Element.type.toLowerCase() == "reset")
					{
						strText = "Clear all the inputs in the form.";
					}
					else if ((Element.type.toLowerCase() == "submit") || (Element.type.toLowerCase() == "image"))
					{
						strText = "Submit the form to the website server.";
					}
					else if (Element.type.toLowerCase() == "tel")
					{
						strText = "Type a valid landline or mobile telephone number.";
					}
					else if (Element.type.toLowerCase() == "text")
					{
						strText = "Type your text.";
					}
					else if (Element.type.toLowerCase() == "time")
					{
						strText = "Type numeric values for hour, minutes and seconds. Or click the button at the end to select them from the popup clock.";
					}
					else if (Element.type.toLowerCase() == "url")
					{
						strText = "Type valid URL.";
					}
					else if (Element.type.toLowerCase() == "week")
					{
						strText = "Type numeric values for the week in the year and the year. Or click the button at the end to select them from the popup calendar.";
					}
				}
			}
		}
		DoSpeakText(strText);
	}
}

function DoTestVoice(strTextInputID)
{
	let textToSpeak = document.getElementById(strTextInputID),
		selectVoice = document.getElementById("select_voice");
	
	if (textToSpeak && selectVoice)
	{
		localStorage.setItem("nIndexSelectedVoice", selectVoice.selectedIndex.toString());
		DoSpeakText(textToSpeak.value);
	}
}

if (localStorage.getItem("bAudioAssistOn") === null)
	localStorage.setItem("bAudioAssistOn", "false");

function DoSetRange(strIDRange)
{
	let slider = document.getElementById(strIDRange);
	if (slider)
	{
		slider.value = localStorage.getItem(strIDRange);
	}
}

function DoSetVoiceAssistInputs()
{
	let selectVoices = document.getElementById("select_voice");
	if (selectVoices)
	{
		selectVoices.innerHTML = g_strVoiceOptions;
	}
	DoSetRange("range_volume");
	DoSetRange("range_speed");
	DoSetRange("range_pitch");
}

function DoChangeRange(strRangeID)
{
	let slider = document.getElementById(strRangeID);
	
	if (slider)
	{
		localStorage.setItem(strRangeID, slider.value);
	}
}

function DoSetAudioAssist()
{
	let checkboxAudioAssist = document.getElementById("checkbox_audio_assist");
	
	if (checkboxAudioAssist)
		checkboxAudioAssist.checked = JSON.parse(localStorage.getItem("menu_open"));
}

function DoClickAudioAssistCheckbox(checkboxAudioAssist)
{
	let strChecked = checkboxAudioAssist.checked ? "true" : "false";
	
	localStorage.setItem("bAudioAssistOn", strChecked);
}

function DoSetAudioAssistCheckbox()
{
	let checkboxAudioAssist = document.getElementById("checkbox_audio_assist");
	
	if (checkboxAudioAssist)
	{
		checkboxAudioAssist.checked = JSON.parse(localStorage.getItem("bAudioAssistOn"));
	}
}

function DoAttachListeners(arrayElements)
{
	for (let nI = 0; nI < arrayElements.length; nI++)
	{
		arrayElements[nI].addEventListener('mouseleave', function() {DoStopSpeaking()});
		arrayElements[nI].addEventListener('mouseenter', function() {DoSpeakElement(this)});
		arrayElements[nI].addEventListener('focus', function() {DoSpeakElement(this)});
		arrayElements[nI].tabIndex = 0;
	}
}

function DoAllAttachListeners(strElementID)
{
	let Element = document.getElementById(strElementID);
	
	if (Element)
	{
		DoAttachListeners(Element.querySelectorAll("p"));
		DoAttachListeners(Element.querySelectorAll("a"));
		DoAttachListeners(Element.querySelectorAll("li"));
		DoAttachListeners(Element.querySelectorAll("h1"));
		DoAttachListeners(Element.querySelectorAll("h2"));
		DoAttachListeners(Element.querySelectorAll("li"));
		DoAttachListeners(Element.querySelectorAll("h3"));
		DoAttachListeners(Element.querySelectorAll("h4"));
		DoAttachListeners(Element.querySelectorAll("h5"));
		DoAttachListeners(Element.querySelectorAll("h6"));
		DoAttachListeners(Element.querySelectorAll("img"));
		
		DoAttachListeners(Element.querySelectorAll("button"));
		DoAttachListeners(Element.querySelectorAll("select"));
		DoAttachListeners(Element.querySelectorAll("input"));
		DoAttachListeners(Element.querySelectorAll("label"));
	}
}

//******************************************************************************
//******************************************************************************
//** 
//** MISCELLANEOUS FUNCTIONS
//** 
//******************************************************************************
//******************************************************************************

function DoDisplayMastheadEnd(strSponsorHTML, strPath)
{
	if (!g_bIsMobileDevice)
	{
		document.write("				<td class=\"masthead_cell_image_right2\">\n");
		document.write("					<a href=\"" + strPath + "images/MillHouseNeighborhoodHouse2.jpg\"><img src=\"" + strPath + "images/MillHouseNeighborhoodHouse2.jpg\" alt=\"MillHouseNeighborhoodHouse2.jpg\" class=\"masthead_image\" /></a>\n");
		document.write("				</td>\n");

		document.write("				<td>\n");
		document.write("					<div class=\"sponsors_container\">" + strSponsorHTML + "</div>\n");
		document.write("				</td>\n");
	}
	else
	{
		document.write("				<td>\n");
		document.write("					<span id=\"span_hamburger\" class=\"masthead_hamburger\" tabindex=\"0\" onfocus=\"DoSpeakElement(this)\" onmouseenter=\"DoSpeakElement(this)\" onclick=\"DoClickHamburger()\">≡</span>\n");
		document.write("				</td>\n");
	}
}

function DoDisplayHidePopup(strDivID, bShow)
{
	let divInstructions = document.getElementById(strDivID);
	
	if (divInstructions)
	{
		divInstructions.style.display = bShow ? "block" : "none";
	}
	else
	{
		alert("Working on it...");
	}
}
			
function DoClickEvent(event, strGroupName, strTime1, strTime2, strDuration, strCost, strDonation, strFacebook, 
						strContact, strEmail, strPhone, strPurpose, strImageFilename)
{
	event.preventDefault();
	let bDonation = Boolean(strDonation),
		strTimes ="";
	
	if (bDonation)
		strDonation = "yes (optional)";
	else
		strDonation = "no";
	
	let strMessage = "<table border='0' cellpadding='2' cellspacing='0'>";
	strMessage += "<tr><td class='heading_cell'><b>CONTACT:</b></td><td>" + strContact + "</td></tr>";
	if (strPhone != "")
		strMessage += "<tr><td class='heading_cell'><b>PHONE:</b></td><td>" + strPhone + "</td></tr>";
	if (strEmail != "")
		strMessage += "<tr><td class='heading_cell'><b>EMAIL:</b></td><td>" + strEmail + "</td></tr>";
	if (strFacebook != "")
		strMessage += "<tr><td class='heading_cell'><b>FACEBOOK:</b></td><td>" + strFacebook + "</td></tr>";
	
	if (strDuration.includes("hrs"))
		strDuration = strDuration.replace("hrs", "");
	else if (strDuration.includes("hr"))
		strDuration = strDuration.replace("hr", "");	
			
	strTimes = DoGetStartTime(strTime1) + " to " + DoGetEndTime(strTime1, strDuration);

	if (strTime2 != "")
	{
		strTimes += " and " + DoGetStartTime(strTime2) + " to " + DoGetEndTime(strTime2, strDuration);
	}
	strMessage += "<tr><td class='heading_cell'><b>TIME(S):</b></td><td>" + strTimes + "</td></tr>";
	
	if (strCost != "$0.00")
	{
		if (strDonation == "yes")
			strMessage += "<tr><td class='heading_cell'><b>DONATION:</b></td><td>" + strCost + "</td></tr>";
		else
			strMessage += "<tr><td class='heading_cell'><b>COST:</b></td><td>" + strCost + "</td></tr>";
	}
	strMessage += "<tr><td class='heading_cell'><b>DESCRIPTION</b>:</td><td>" + strPurpose + "</td></tr>";
	strMessage += "<tr><td colspan='2' style='text-align:center;'><a href='..about/" + strImageFilename + 
				"'><img src='../about/" + strImageFilename + "' alt='IMAGE NEEDED' height='200' />" + 
				"</a></td></tr>";

	const p_details = document.getElementById("event_details_element");
	const h1_heading = document.getElementById("event_popup_heading");
	
	if (p_details)
  		p_details.innerHTML = strMessage;
  		
  	if ( h1_heading)
  		h1_heading.innerHTML = strGroupName;
  	
  	DoDisplayHidePopup('div_event_popup_container', true);
}
	
function DoGetCSSVarValStr(strCSSVarName)
{
	// 1. Get the root element html
	const rootElement = document.documentElement;
	
	// 2. Get all computed styles for the element
	const rootStyles = window.getComputedStyle(rootElement);
	
	// 3. Read the exact CSS variable name (include the double dashes)
	let strCSSVarVal = rootStyles.getPropertyValue(strCSSVarName).trim();
		
	return strCSSVarVal;
}

function DoGetCSSVarValInt(strCSSVarName)
{
	let strCSSVarVal = DoGetCSSVarValStr(strCSSVarName),
		nPos = strCSSVarVal.search(/[^0-9.-]/);

	strCSSVarVal = strCSSVarVal.substring(0, nPos);
	
	return Number(strCSSVarVal);
}

function OnResize()
{
}	

window.onresize = OnResize;

var g_bIsMobileDevice = false;

function DoDetectDevice(strPath)
{
	// mozilla/5.0 (windows nt 10.0; win64; x64) applewebkit/537.36 (khtml, like gecko) chrome/147.0.0.0 safari/537.36
	// Mozilla/5.0 (iPhone; CPU iPhone OS 17_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Mobile/15E148 Safari/604.1
	// Mozilla/5.0 (iPod; CPU iPhone OS 17_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Mobile/15E148 Safari/604.1
	// Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Safari/605.1.15
	// Mozilla/5.0 (Linux; Android 13; SM-S901B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36
	// Mozilla/5.0 (Linux; Android 13; SM-X906B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 (Note the absence of the "Mobile" tag)
	// Mozilla/5.0 (Linux; Android 13; SM-S901B Build/TP1A.220624.014; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/110.0.5481.153 Mobile Safari/537.36
	if (navigator.userAgent.includes("iPhone") ||
		navigator.userAgent.includes("iPod") ||
		navigator.userAgent.includes("Android"))
	{
		document.getElementById("style_sheet").setAttribute("href", strPath + "styles/style4Mobile.css");
		g_bIsMobileDevice = true;
	}
}

function DoGetElementWidth(Element)
{
	let nWidth = 0, divElement = null, rectClient = null;
	
	if (typeof Element == "string")
	{
		divElement = document.getElementById(Element);
		
		if (!divElement)
			alert("element with id '" + strElementID + "' was not found!");
	}
	else if (typeof Element == "object")
	{
		divElement = Element;
	}
	if (divElement)
	{
		rectClient = divElement.getBoundingClientRect();
		nWidth = rectClient.width;
	}
	return nWidth;
}

function DoGetEndTime(strTime, strDuration)
{
	let dateEnd = new Date(),
		nPos = strTime.indexOf(":"),
		strHour = strTime.substring(0, nPos),
		strMinute = strTime.substring(nPos + 1),
		nMillis = parseFloat(strDuration) * 60 * 60 * 1000;

	dateEnd.setHours(parseInt(strHour), parseInt(strMinute));
	dateEnd.setTime(dateEnd.getTime() + nMillis);
	
	return dateEnd.toLocaleTimeString("en-US", {hour: "numeric", minute: "2-digit", hour12: true});
}

function DoGetStartTime(Time)
{
	let strTime = "";
	
	if (Time instanceof Date && !isNaN(strTime))
	{
		strTime = Time.getHours().toString().padStart(2, "0") + ":" + Time.getMinutes().toString().padStart(2, "0");
	}
	else if (typeof Time == "string")
	{
		strTime = Time;
	}
	return DoGetEndTime(strTime, 0);
}

function DoGetCSSRootColor(strVarName)
{
	const rootStyles = window.getComputedStyle(document.documentElement);
	let strBarColor = rootStyles.getPropertyValue(strVarName).trim(),
		nPos = 0, strRedVal = "", strGreenVal = "", strBlueVal = "";
	
	nPos = strBarColor.indexOf("(");
	strBarColor = strBarColor.substring(nPos + 1);
	nPos = strBarColor.indexOf(",");
	strRedVal = strBarColor.substring(0, nPos).trim();
	strBarColor = strBarColor.substring(nPos + 1);
	nPos = strBarColor.indexOf(",");
	strGreenVal = strBarColor.substring(0, nPos).trim();
	strBarColor = strBarColor.substring(nPos + 1);
	nPos = strBarColor.indexOf(",");
	strBlueVal = strBarColor.substring(0, nPos).trim();
	

	return "#" + parseInt(strRedVal, 10).toString(16).padStart(2, "0").toUpperCase() +  
				parseInt(strGreenVal, 10).toString(16).padStart(2, "0").toUpperCase() +  
				parseInt(strBlueVal, 10).toString(16).padStart(2, "0").toUpperCase();
}

function IsMouseIn(Element)
{
	let nMouseX = event.clientX + document.body.scrollLeft,
        nMouseY = event.clientY + document.body.scrollTop,
        bIsIn = false
        rectBounding = Element.getBoundingClientRect();
        
    if ((nMouseX >= Element.offsetLeft) && (nMouseX <= Element.offsetLeft + rectBounding.width) && 
        (nMouseY >= Element.offsetTop) && (nMouseY <= Element.offsetTop + rectBounding.height))
    {
        bIsIn = true;
    }
    return bIsIn;
}

function DoGetParentOrCurrentDir()
{
	// E.G. index.php or millhouse/index.php or about/about.php or millhouse/about/about.php or 
	// millhouse/governance/rules/rules.php
	let strCWD = window.location.pathname.substring(1),
		nPos = -1, nCount = -1;
	
	// Remove the home holder from the path.
	strCWD = strCWD.replace(localStorage["g_strHomeFoldeMH"] + "/", "");
	
	// E.G. index.php or index.php or about/about.php or about/about.php or 
	// governance/rules/rules.php
	nCount = strCWD.split("/").length - 1;
	strCWD = "";
	
	for (let nI = 0; nI < nCount; nI++)
	{
		strCWD += "../";
	}
	// E.G. "" or "" or "../" or ".." or "../../"
	return strCWD;
}

function DoGetDontationHTML()
{
	let strHTML = "";
	
	if (!window.location.href.includes("about"))
	{
		strHTML = "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%;max-width:100%;margin-left:5px;margin-bottom:20px;margin-top:20px;\">" + 
				  "<tr><td style=\"width:fit-content;\">" + 
				  "<img src=\"" + DoGetParentOrCurrentDir() + "images/donate.png\" alt=\"donate.png\" class=\"donate_image\" /></td>" + 
				  "<td style=\"padding-left:10px;vertical-align:middle;overflow-wrap:word-wrap;white-space:normal;\"><span class=\"donation_span\">Click " + 
				  "<a href=\"" + DoGetParentOrCurrentDir() + "about/about.php\" class=\"blink\">here</a>" + 
				  " to learn why Millhouse is a worthy cause.</span>" + 
				  "</td></tr></table>";
	}
	return strHTML;
}

//******************************************************************************
//******************************************************************************
//** 
//** MENU SHOW & HIDE FUNCTIONS
//** 
//******************************************************************************
//******************************************************************************

if (sessionStorage.getItem("menu_open") === null)
{
	sessionStorage.setItem("menu_open", JSON.stringify(false));
}

function DoHideAllSubmenus()
{
	let ulSubmenu = document.getElementById("admin");
	
	if (ulSubmenu)
		ulSubmenu.style.display = "none";
		
	ulSubmenu = document.getElementById("governance");
	if (ulSubmenu)
		ulSubmenu.style.display = "none";

	ulSubmenu = document.getElementById("governance");
	if (ulSubmenu)
		ulSubmenu.style.display = "none";
}

function DoClickNavLinkWithSubmenu(strSubmenuID)
{
	let ulSubmenu = document.getElementById(strSubmenuID);
	
	if (ulSubmenu)
	{
		DoHideAllSubmenus();
		ulSubmenu.style.display = "block";
	}
}

function DoKeyPress(Event)
{
	if (Event.key === "Enter")
	{
		// Trigger the onclick handler
		Event.target.click();
	}
}

function DoGetMainMenuState()
{
	let bOpen = JSON.parse(sessionStorage.getItem("menu_open"));
	
	return bOpen;
}

function DoSetMenuState(bOpen)
{
	sessionStorage.setItem("menu_open", JSON.stringify(bOpen))
}

function DoClickHamburger()
{
	let spanHamburger = document.getElementById("span_hamburger"),
		divContent = document.getElementById("div_content"),
		divContainer = document.getElementById("div_container"),
		bOpen = false;
	
	DoOpenCloseMenu(true);
	bOpen = DoGetMainMenuState();
	
	if (spanHamburger)
	{	
		if (bOpen)
			spanHamburger.innerText = "X";
		else
			spanHamburger.innerText = "≡";
	}
}

function DoOpenCloseMenu(bDoToggle)
{
	let spanMenuText = document.getElementById("span_menu_text"),
		divNav = document.getElementById("div_navigation"),
		divNavMenu = document.getElementById("div_navigation_menu"),
		strMenuText = "◄ MAIN MENU ◄",
		bOpen = DoGetMainMenuState();
	
	if (spanMenuText && divNav && divNavMenu)
	{
		if (bDoToggle)
		{
			DoSetMenuState(!bOpen);
			bOpen = !bOpen ;
		}					
		if (bOpen)
		{
			spanMenuText.innerHTML = strMenuText.replaceAll("≡", "X");
			divNavMenu.style.display = "inline-block";
			divNav.style.width = "var(--nav_width)";
			divNavMenu.style.width = "var(--nav_menu_width)";
		}
		else
		{
			spanMenuText.innerHTML = strMenuText.replaceAll("◄", "►");
			divNav.style.width = "var(--nav_menu_arrow_width)";
			divNavMenu.style.width = "0px";
		}
		// For some reason ontransitionend handler is called only for the transition from full width to zero width!
		// But not in the other direction. So use setTimeout instead - it is reliable!
		let nTransition = DoGetCSSVarValInt("--transition");
		setTimeout(DoOnNavMenuTransitioned, nTransition);
	}
}

function DoOnNavMenuTransitioned()
{
	let divNavMenu = document.getElementById("div_navigation_menu"),
		divContent = document.getElementById("div_content"),
		bOpen = JSON.parse(sessionStorage.getItem("menu_open")),
		nContentWidthCorrection = 0,
		nDivBelowMastheadWidth = DoGetElementWidth("div_below_masthead"),
		nDivNavMenuArrowWidth = DoGetElementWidth("div_navigation_arrow"),
		nDivNavMenuWidth = DoGetElementWidth(divNavMenu);
	
	if (divNavMenu && divContent)
	{
		if (divNavMenu.style.width == "0px")
		{
			divNavMenu.style.display = "none";
		}
		if (!g_bIsMobileDevice)
		{
			if (bOpen)
				divContent.style.width = (nDivBelowMastheadWidth - nDivNavMenuArrowWidth - nDivNavMenuWidth - 26).toString() + "px";
			else
				divContent.style.width = (nDivBelowMastheadWidth - nDivNavMenuArrowWidth - nDivNavMenuWidth - 30).toString() + "px";
		}
		else
		{
			let nContentWidth = nDivBelowMastheadWidth - nDivNavMenuArrowWidth - 28;
					
			if (bOpen)
			 	nContentWidth -= nDivNavMenuWidth;

			divContent.style.minWidth = nContentWidth.toString() + "px";
			divContent.style.maxWidth = nContentWidth.toString() + "px";
		}
	}
}




//******************************************************************************
//******************************************************************************
//** 
//** ADVERT FUNCTIONS
//** 
//******************************************************************************
//******************************************************************************

let g_arraySponsorBookmarks = [];

function DoClickSponsor(strPath, strSponsorBookmarksList)
{
	let img = null,
		fOpacity = 0
		nPos = 0,
		strBookmark = "";
		
	if (g_arraySponsorBookmarks.length == 0)
	{
		while (strSponsorBookmarksList.length > 0)
		{
			nPos = strSponsorBookmarksList.indexOf("#");
			strBookmark = strSponsorBookmarksList.substring(0, nPos);
			g_arraySponsorBookmarks.push(strBookmark);
			strSponsorBookmarksList = strSponsorBookmarksList.substring(nPos + 1);
		}
	}
	for (let nI = 0; nI < g_arraySponsorBookmarks.length; nI++)
	{
		img = document.getElementById("img_" + g_arraySponsorBookmarks[nI]);
		if (img)
		{
			fOpacity  = window.getComputedStyle(img).getPropertyValue("opacity");
			if (fOpacity > 0)
				window.open(strPath + "sponsors/sponsors.php#" + g_arraySponsorBookmarks[nI], "_self");
		}
	}
}

function DoClickRequestAdvert(strAdvertSlotName, strAdvertSlotID)
{
	let strHREF = DoGetParentOrCurrentDir() + "request_sponsorship.php?advert_slot_id=" + strAdvertSlotID + "&advert_slot_name=" + strAdvertSlotName;
	window.open(strHREF, "_self");
}

function DoGetAdvertSlotID(strAdvertExpiresID)
{
	return strAdvertExpiresID.replace("expires", "slot");
}

function DoMouseEnterAdvertSlot(strDivExpiryID)
{
	let divExpires = document.getElementById(strDivExpiryID),
		divAdvertSlot = null,
		strAdvertSlotID = DoGetAdvertSlotID(strDivExpiryID);

	if (divExpires)
	{
		divExpires.style.display = "block";
		divAdvertSlot = document.getElementById(strAdvertSlotID);
		
		if (divAdvertSlot)
		{
			const rectAdvertSlot = divAdvertSlot.getBoundingClientRect();
			divExpires.style.top = rectAdvertSlot.top.toString() + "px";
			divExpires.style.left = rectAdvertSlot.left.toString() + "px";
		}
	}
}

function DoMouseLeaveExpiresDiv(divExpires)
{
	if (divExpires)
		divExpires.style.display = "none";
}

function DoMouseLeaveAdvertSlot(strAdvertSlotExpiresID)
{
	let divAdvertSlotExpires = document.getElementById(strAdvertSlotExpiresID);
	
	if (divAdvertSlotExpires)
	{
		divAdvertSlotExpires.style.display = "none";
	}
}

function DoClickAdvert(strWebsite, strAdvertID)
{
	let strHREF = DoGetParentOrCurrentDir() + "click_advert.php?advert_id=" + strAdvertID + "&website=" + strWebsite;
	window.open(strHREF);
}

var g_nScrollBy = 1;
var g_divMarquee = null;

function DoScrollAdverts()
{
	if (!g_divMarquee)
		g_divMarquee = document.getElementById("advert_marquee");
		
	if (g_divMarquee)
	{
		g_divMarquee.scrollBy(g_nScrollBy, 0);
		
		if ((g_divMarquee.scrollLeft >= (g_divMarquee.scrollWidth - g_divMarquee.clientWidth)) || 
			(g_divMarquee.scrollLeft <= 0))
			g_nScrollBy = -g_nScrollBy;			
	}
}
let g_nAdvertScrollTimerID = -1;
if (g_nAdvertScrollTimerID === -1)
{
	g_nAdvertScrollTimerID = setInterval(DoScrollAdverts, 50);
}

//******************************************************************************
//******************************************************************************
//** 
//** TEXT KEY RESTRICTION FUNCTIONS
//** 
//******************************************************************************
//******************************************************************************

function OnKeyPressDigitsSpaceOnly(eventKey)
{
	if (((eventKey.key < '0') || (eventKey.key > '9')) && (eventKey.key.charCodeAt(0) != 8) && (eventKey.key != ' '))
	{
		eventKey.preventDefault();
	}
}

function OnKeyPressDigitsOnly(eventKey)
{
	if (((eventKey.key < '0') || (eventKey.key > '9')) && (eventKey.key.charCodeAt(0) != 8))
	{
		eventKey.preventDefault();
	}
}

function OnKeyPressAlphaNumericSpaceOnly(eventKey)
{
	if (((eventKey.key >= '0') && (eventKey.key <= '9')) || ((eventKey.key >= 'A') && (eventKey.key <= 'Z')) || 
		((eventKey.key >= 'a') && (eventKey.key <= 'z')) || (eventKey.key.charCodeAt(0) == 8) || 
		(eventKey.key == ' '))
	{
	}
	else
	{
		eventKey.preventDefault();
	}
}

function OnKeyPressAlphaSpaceOnly(eventKey)
{
	if (((eventKey.key >= 'A') && (eventKey.key <= 'Z')) || ((eventKey.key >= 'a') && (eventKey.key <= 'z')) || 
		(eventKey.key.charCodeAt(0) == 8) || (eventKey.key == ' '))
	{
	}
	else
	{
		eventKey.preventDefault();
	}
}

function OnKeyPressUsername(eventKey)
{
	if (((eventKey.key >= '0') && (eventKey.key <= '9')) || ((eventKey.key >= 'A') && (eventKey.key <= 'Z')) || 
		((eventKey.key >= 'a') && (eventKey.key <= 'z')) || (eventKey.key.charCodeAt(0) == 8) || (eventKey.key == '_'))
	{
	}
	else
	{
		eventKey.preventDefault();
	}
}

function OnKeyPressPassword(eventKey)
{
	if ((eventKey.key == '\'') || (eventKey.key == '\"'))
	{
		eventKey.preventDefault();
	}
}

function OnKeyPressEmailAddress(eventKey)
{
	if (((eventKey.key >= '0') && (eventKey.key <= '9')) || ((eventKey.key >= 'A') && (eventKey.key <= 'Z')) || 
		((eventKey.key >= 'a') && (eventKey.key <= 'z')) ||(eventKey.key.charCodeAt(0) == 8) || (eventKey.key == ' ') ||
		(eventKey.key == '@') || (eventKey.key == 64) || (eventKey.key == 45) || (eventKey.key == 46) || (eventKey.key == '_'))
	{
	}
	else
	{
		eventKey.preventDefault();
	}
}

function OnKeyPressName(eventKey)
{
	if (((eventKey.key >= '0') && (eventKey.key <= '9')) || ((eventKey.key >= 'A') && (eventKey.key <= 'Z')) || 
		((eventKey.key >= 'a') && (eventKey.key <= 'z')) ||(eventKey.key.charCodeAt(0) == 8) || (eventKey.key == ' ') ||
		(eventKey.key == 45) || (eventKey.key == 39))
	{
	}
	else
	{
		eventKey.preventDefault();
	}
}

function OnKeyPressPhone(eventKey)
{
	if (((eventKey.key < '0') || (eventKey.key > '9')) && (eventKey.key.charCodeAt(0) != 8) && (eventKey.key != ' ') && (eventKey.key != ')') && (eventKey.key != '('))
	{
		eventKey.preventDefault();
	}
}

function OnKeyPressComment(eventKey)
{
	if (((eventKey.key >= '0') && (eventKey.key <= '9')) || ((eventKey.key >= 'A') && (eventKey.key <= 'Z')) || 
		((eventKey.key >= 'a') && (eventKey.key <= 'z')) ||(eventKey.key.charCodeAt(0) == 8) || 
		((eventKey.key >= ' ') && (eventKey.key <= '/')) || (eventKey.key.charCodeAt(0) == '?') || 
		(eventKey.key.charCodeAt(0) == '='))
	{
	}
	else
	{
		eventKey.preventDefault();
	}
}

function OnKeyPressURL(eventKey)
{
	if (((eventKey.key >= '0') && (eventKey.key <= '9')) || ((eventKey.key >= 'A') && (eventKey.key <= 'Z')) || 
		((eventKey.key >= 'a') && (eventKey.key <= 'z')) ||(eventKey.key.charCodeAt(0) == 8) || (eventKey.key == ' ') ||
		(eventKey.key == '/') || (eventKey.key == ':') || (eventKey.key == '.') || (eventKey.key == '_'))
	{
	}
	else
	{
		eventKey.preventDefault();
	}
}





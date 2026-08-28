//******************************************************************************
//******************************************************************************
//** 
//** MISCELLANEOUS FUNCTIONS
//** 
//******************************************************************************
//******************************************************************************

if (sessionStorage.getItem("bAudioAssistOn") === null)
	sessionStorage.setItem("bAudioAssistOn", "false");

function DoSetAudioAssist()
{
	let checkboxAudioAssist = document.getElementById("checkbox_audio_assist");
	
	if (checkboxAudioAssist)
		checkboxAudioAssist.checked = sessionStorage.getItem("bAudioAssistOn") == "true";
}

function DoClickAudioAssist(checkboxAudioAssist)
{
	let strChecked = checkboxAudioAssist.checked ? "true" : "false";
	
	sessionStorage.setItem("bAudioAssistOn", strChecked);
}

function DoPlayAudio(strAudioID)
{
	if (sessionStorage.getItem("bAudioAssistOn") == "true")
	{
		let audio = document.getElementById(strAudioID);
	
		if (audio)
		{
			audio.pause();
			audio.currentTime = 0;
			audio.play();
		}
	}
/*
	if (g_utterance !== null)
	{
		if ("speechSynthesis" in window) 
		{		
			// Create a new utterance instance			
			if (Element.innerText !== null)
				g_utterance = new SpeechSynthesisUtterance(Element.placeholder);
			else if ((Element.placeholder !== null) && (Element.placeholder !== ""))
				g_utterance = new SpeechSynthesisUtterance(Element.placeholder);
			else
				g_utterance = new SpeechSynthesisUtterance("Element '" + Element.id + "' has neither innerText nor a 'placeholder' property set!");
			
			// Optional: Set properties like pitch, rate, or volume
			g_utterance.pitch = 1.0; // Range: 0 to 2
			g_utterance.rate = 1.0;  // Range: 0.1 to 10
			g_utterance.volume = 1.0; // Range: 0 to 1
			g_utterance.lang = "en-US";
			g_utterance.voice = arrayVoices[0];
		
			// Stop any ongoing speech
	    	window.speechSynthesis.cancel();
			// Speak the text
			window.speechSynthesis.speak(g_utterance);
		}
	    else
	    {
	    	console.warn("Speech synthesis is not supported...");
	    }
	}
*/
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

function DoChangeHamburgerFontSizeSmall(bMakeSmall)
{
	// Select all elements with the class "myClass"
	let elements = document.querySelectorAll(".hamburger");
	
	// Loop through the NodeList and change the font size
	for (let nI = 0; nI < elements.length; nI++)
	{
	    if (bMakeSmall)
	    	elements[nI].style.fontSize = "large"; // Set the new font size
	    else
	    	elements[nI].style.fontSize = "x-large"; // Set the new font size
	}
}

function DoOnNavMenuTransitioned()
{
	let divNavMenu = document.getElementById("div_navigation_menu"),
		divContent = document.getElementById("div_content"),
		bOpen = JSON.parse(sessionStorage.getItem("menu_open")),
		nContentWidthCorrection = 0;
	
	if (divNavMenu && divContent)
	{
		if (divNavMenu.style.width == "0px")
		{
			divNavMenu.style.display = "none";
			nContentWidthCorrection = DoGetCSSVarValInt("--content_width_adjust_decreasing");
		}
		else
		{
			nContentWidthCorrection = DoGetCSSVarValInt("--content_width_adjust_increasing");
		}
		if (!g_bIsMobileDevice)
		{
			let nDivBelowMastheadWidth = DoGetElementWidth("div_below_masthead"),
				nDivNavMenuArrow = DoGetElementWidth("div_navigation_arrow"),
				nDivNavMenu = DoGetElementWidth(divNavMenu);
	
			divContent.style.width = (nDivBelowMastheadWidth - nDivNavMenuArrow - nDivNavMenu - 
										nContentWidthCorrection).toString() + "px";
		}
		else
		{
			if (bOpen)
			{
				divContent.style.minWidth = "var(--content_width_nav_menu_open)";
				divContent.style.maxWidth = "var(--content_width_nav_menu_open)";
			}
			else
			{
				divContent.style.minWidth = "var(--content_width_nav_menu_closed)";
				divContent.style.maxWidth = "var(--content_width_nav_menu_closed)";
			}
		}
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

function DoOpenCloseMenu(bDoToggle)
{
	let spanMenuText = document.getElementById("span_menu_text"),
		divNav = document.getElementById("div_navigation"),
		divNavMenu = document.getElementById("div_navigation_menu"),
		strMenuText = "◄ <span class=hamburger>≡</span> MAIN MENU ◄",
		bOpen = JSON.parse(sessionStorage.getItem("menu_open"));
		
	if (spanMenuText && divNav && divNavMenu)
	{
		if (bDoToggle)
		{
			sessionStorage.setItem("menu_open", JSON.stringify(!bOpen));
			bOpen = JSON.parse(sessionStorage.getItem("menu_open"));
		}					
		if (bOpen)
		{
			spanMenuText.innerHTML = strMenuText.replaceAll("≡", "X");
			divNavMenu.style.display = "inline-block";
			divNav.style.width = "var(--nav_width)";
			//DoChangeHamburgerFontSizeSmall(true);
			divNavMenu.style.width = "var(--nav_menu_width)";
		}
		else
		{
			spanMenuText.innerHTML = strMenuText.replaceAll("◄", "►");
			divNav.style.width = "var(--nav_menu_arrow_width)";
			//DoChangeHamburgerFontSizeSmall(false);
			divNavMenu.style.width = "0px";
		}
		// For some reason ontransitionend handler is called only for the transition from full width to zero width!
		// But not in the other direction. So use setTimeout instead - it is reliable!
		let nTransition = DoGetCSSVarValInt("--transition");
		setTimeout(DoOnNavMenuTransitioned, nTransition);
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

function DoPopupName(strPopupID, strName)
{
	let pName = document.getElementById(strPopupID);
	
	if (pName)
	{		
		pName.innerText = " " + strName + " ";
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





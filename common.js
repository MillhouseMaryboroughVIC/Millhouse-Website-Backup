function DoClickSponsor(strPath)
{
	let arraySponsorLogoImageIDs = ["NHHV", "VSG", "CGSC", "FRRR", "JWR", "WOS", "FB", "FS", "ALDI", "PVB", "MFC", "SS", "GSAB"],
		imgCurrent = null;
									
	for (let nI = 0; nI < arraySponsorLogoImageIDs.length; nI++)
	{
		imgCurrent = document.getElementById("img_" + arraySponsorLogoImageIDs[nI]);
		if (imgCurrent)
		{
			if (window.getComputedStyle(imgCurrent).opacity > 0)
				window.open(strPath + "sponsors/sponsors.php#" + arraySponsorLogoImageIDs[nI], "_self");
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

//******************************************************************************
//******************************************************************************
//** 
//** EXPLICITLY SET FAVICON.ICO
//** 
//******************************************************************************
//******************************************************************************

function DoSetFavicon(strURL)
{
	// Find the existing favicon link element
	let linkIcon = document.querySelector("link[rel*='icon']");
	
	// If no link element exists, create a new one
	if (!linkIcon) 
	{
		linkIcon = document.createElement('link');
		linkIcon.rel = 'icon';
		document.head.appendChild(linkIcon);
	}
	// Update the href attribute with your new .ico or .png path
	linkIcon.href = strURL;
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

function DoResizePageContent()
{
	let divNav = document.getElementById("navigation"),
		divNavArrow = document.getElementById("navigation_arrow"),
		divNavMenu = document.getElementById("navigation_menu"),
		divContent = document.getElementById("content"),
		divContainer = document.getElementById("container"),
		rectContainer, rectNavMenu, rectNavArrow,
		bOpen = JSON.parse(sessionStorage.getItem("menu_open"));
	
	if (divNav && divNavArrow && divContent && divContainer && divNavMenu)
	{
		rectContainer = divContainer.getBoundingClientRect();
		rectNavArrow = divNavArrow.getBoundingClientRect();
		rectNavMenu = divNavMenu.getBoundingClientRect();
		
		if (bOpen)
			divContent.style.width = (rectContainer.width - rectNavMenu.width - rectNavArrow.width - 37) + "px";
		else
			divContent.style.width = (rectContainer.width - rectNavMenu.width - rectNavArrow.width - 35) + "px";
	}
}

function DoOnNavMenuTransitioned()
{
	let divNavMenu = document.getElementById("navigation_menu"),
	    divNavArrow = document.getElementById("navigation_arrow"),
		divContent = document.getElementById("content"),
		divContainer = document.getElementById("container"),
		rectContainer, rectNav, rectNavArrow,
		bOpen = JSON.parse(sessionStorage.getItem("menu_open"));;
	
	if (divNavMenu && divNavArrow && divContent && divContainer)
	{
		if (divNavMenu.style.width == "0px")
		{
			//divNavArrow.style.left = "0px";
			//divNavArrow.style.top = "0px";
			divNavMenu.style.display = "none";
			DoResizePageContent();
		}
	}
}

function DoOpenCloseMenu(bDoToggle)
{
	let spanMenuText = document.getElementById("span_menu_text"),
		divNav = document.getElementById("navigation"),
		divNavMenu = document.getElementById("navigation_menu"),
		divNavArrow = document.getElementById("navigation_arrow"),
		divContent = document.getElementById("content"),
		divContainer = document.getElementById("container"),
		strMenuText = "◄ <span class=hamburger>≡</span> MENU ◄",
		bOpen = JSON.parse(sessionStorage.getItem("menu_open"));
		
	if (spanMenuText && divNav && divNavMenu && divNavArrow)
	{
		if (bDoToggle)
		{
			sessionStorage.setItem("menu_open", JSON.stringify(!bOpen));
			bOpen = JSON.parse(sessionStorage.getItem("menu_open"));
		}					
		if (bOpen)
		{
			spanMenuText.innerHTML = strMenuText.replaceAll("≡", "X");
			divNav.style.width = "calc(var(--nav_width) - 3px)";
			DoChangeHamburgerFontSizeSmall(true);
			divNavMenu.style.display = "inline-block";
			divNavMenu.style.width = "var(--nav_menu_width)";
		}
		else
		{
			spanMenuText.innerHTML = strMenuText.replaceAll("◄", "►");
			divNav.style.width = "var(--nav_menu_arrow_width)";
			DoChangeHamburgerFontSizeSmall(false);
			divNavMenu.style.width = "0px";
		}
		DoResizePageContent();
	}
}




//******************************************************************************
//******************************************************************************
//** 
//** MISCELLANEOUS FUNCTIONS
//** 
//******************************************************************************
//******************************************************************************

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
//** ADVERT FUNCTIONS
//** 
//******************************************************************************
//******************************************************************************

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





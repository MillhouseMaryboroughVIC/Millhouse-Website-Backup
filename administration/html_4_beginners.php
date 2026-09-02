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
		<title>HTML for Beginners</title>
		
		<style type="text/css">
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
								
								<form id="form_voice_assist" class="form form_voice_assist">
									<h1 style="font-weight:800;">VOICE ASSIST SETTINGS</h1>
									<hr/>
									<p class="sight_impaired" >
										The voice assist feature works on Android mobile devices if you hold your finger down on a parapgraph or 
										heading etc. This is the Android equivalent of hovering your PC mouse cursor over them. But it seems as 
										though there is no way to make this feature work on iPhones or iPads unfortunately.
									</p>
									<hr/><br/>
									<table border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td style="text-align:right;">
												<label class="sight_impaired" for="checkbox_audio_assist"><b>AUDIO ASSIST ON/OFF</b></label>
											</td>
											<td>
												<input class="sight_impaired" type="checkbox" id="checkbox_audio_assist" tabindex="0" onclick="DoClickAudioAssistCheckbox(this)" />
											</td>
										</tr>
										<tr>
											<td style="text-align:right;">
											    <label class="sight_impaired" for="select_voice">Choose Voice:</label>
											</td>
											<td>
											    <select class="sight_impaired" id="select_voice">
											    </select>
											</td>
										</tr>
										<tr>
											<td style="text-align:right;">
											    <label class="sight_impaired" for="select_voice">Set volume:</label>
											</td>
											<td>
											    <input type="range" id="range_volume" min="0" max="100" value="100" style="width:470px;" />											</td>
										</tr>
										<tr>
											<td style="text-align:right;">
												<label class="sight_impaired" for="text_to_speak">Text to speak</label>
											</td>
											<td>
												<input class="sight_impaired" type="text" id="text_to_speak" size="100%" maxlength="50" value="Hello world!"/>
											</td>
										</tr>
										<tr>
											<td style="text-align:center;">
												<button class="sight_impaired" type="button" onclick="DoTestVoice('text_to_speak')">TEST</button>
											</td>
											<td style="text-align:center;">
												<button class="sight_impaired" type="button" onclick="DoDisplayHidePopup('form_voice_assist', false)">CLOSE</button>
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
								<form class="form_voice_assist_button"><button type="button" class="sight_impaired" onclick="DoDisplayHidePopup('form_voice_assist', true)">VOICE ASSIST</button></form>

								<!-- #BeginEditable "CustomContent" -->

<p>
	You find this concept very intuitive in everyday life, even if you are not familiar with this programming 
	terminology. Consider the concept of a 'car'. There are many different types of cars but we always 
	characterise them as a car.  
</p>
<table border="1" cellspacing="0" cellpadding="10">
	<tr>
		<td colspan="7" style="text-align:center;">CAR</td>
	</tr>
	<tr>
		<td>SUV</td>
		<td>SEDAN</td>
		<td>UTE</td>
		<td>PANEL VAN</td>
		<td>VAN</td>
		<td>STATION WAGON</td>
		<td>HATCH BACK</td>
	</tr>
</table>
<p>All these automobiles have the common characteristics of a 'car', in addition to their own individual 
characteristics. You can say the 'car' is the 'parent' of all those automobiles, while each individual type 
of automobile is a child of the parent 'car'</p>
<p>So in a similar way &lt;div&gt; and &lt;span&gt; are the parent tags in HTML. All the tags described below 
are children of one of these two parent tags. Another way of stating it is that all the other tags described on 
this page are 'derived' from either &lt;div&gt; or &lt;span&gt;. As with the different types of cars above, all 
the HTML tags 'derived' from &lt;div&gt; 'inherit' its particular way of arranging itself on the screen when 
combined with other &lt;div&gt;s, but each derived tag adds a bunch of other unique characteristics to the mix. 
Just like a 'sedan' adds a bunch of unique characteristics to the common charactersistics of a car.
</p>

<p>Please note that there are dozens more HTML tags available to you, but you have little hope in remembering the details 
of all them. I only ever use and remeber a small subset of them, most of them i have never had a reason to use them in a 
web page. But if you want to view the full list of HTML tags then click on this link 
<a href="https://www.w3schools.com/TAGS/default.asp">W3Schools HTML Tag Reference</a>.The small subset listed on this 
page are the most frequently used tags in this web site and are worth while getting to know.</p>

<table border="1" cellpadding="5" cellspacing="0">
	<caption>Family tree for &lt;div&gt; derived HTML tags</caption>
	<tr><td colspan="12" style="text-align:center;"><p>&lt;div&gt;(parent tag)</p></td></tr>
	<tr>
		<td>&lt;h1&gt;</td>
		<td>&lt;h2&gt;</td>
		<td>&lt;h3&gt;</td>
		<td>&lt;h4&gt;</td>
		<td>&lt;h5&gt;</td>
		<td>&lt;h6&gt;</td>
		<td>&lt;hr&gt;</td>
		<td>&lt;ol&gt;</td>
		<td>&lt;p&gt;</td>
		<td>&lt;table&gt;</td>
		<td>&lt;tr&gt;</td>
		<td>&lt;ul&gt;</td>
	</tr>
</table>
<p>&nbsp;</p>
<table border="1" cellpadding="5" cellspacing="0">
	<caption>Family tree for &lt;span&gt; derived HTML tags</caption>
	<tr><td colspan="9" style="text-align:center;"><p>&lt;span&gt;(parent tag)</p></td></tr>
	<tr>
		<td>&lt;b&gt;</td>
		<td>&lt;i&gt;</td>
		<td>&lt;u&gt;</td>
		<td>&lt;s&gt;</td>
		<td>&lt;pre&gt;</td>
		<td>&lt;a&gt;</td>
		<td>&lt;img&gt;</td>
		<td>&lt;li&gt;</td>
		<td>&lt;td&gt;</td>
	</tr>
</table>

<p>So what is the difference between &lt;div&gt; and &lt;span&gt; tags? The difference is in how they arrange themselves on a screen.</p>

<h1>&lt;div&gt;s</h1>
<p>&lt;div&gt; elements (by default) arrange themselves the second below the first, and the third below the 
second etc. With &lt;div&gt; elements you can also set an explicit height and width as in the following example.</p>
<div style="background-color:blue;width:100px;height:100px;">FIRST DIV</div>
<div style="background-color:green;width:100px;height:100px;">SECOND DIV</div>

<p>A different way to visualise it:<br/>
	<img src="images/CubeOnCube.jpg" width="200"/></p>

 
<p>If you don't explicitly set a width and height for your divs then they look like following. The content of 
the div determines its height of your divs, while they 'inherit' with width of their parent element.</p>

<div style="background-color:blue;">FIRST DIV</div>
<div style="background-color:green;">SECOND DIV</div>

<h1>Parent &amp; child HTML elements</h1>
<p>There is also the concept of parent HTML elements containing child HTML elements, demonstrated in the following 
example. Note how I have used code indenting to show you the heirarchy of the divs in the HTML code. Using code 
indenting is VERY important in order to make your code easily comprehensible for the next person, or even yourself 
in 12 months time.</p>
<pre>
&lt;div style="width:400px;height:400;background-color:blue;"&gt;
	This is the parent div.
	&lt;div style="width:200px;height:200px;background-color:green;top:50px;left:20px;"&gt;
		This is the child div and it is contained inside the parent div.<br/>
	&lt;/div&gt;<br/>
&lt;/div&gt;
</pre>
<div style="width:400px;height:400px;background-color:blue;">
This is the parent div.
	<div style="width:200px;height:200px;background-color:green;position:relative;top:50px;left:20px;">
		This is the child div and it is contained inside the parent div.
	</div>
</div>

<p>A different way to visualise it:<br/>
	<img src="images/CubeInCube.jpg" alt="CubeInCube.jpg" width="200"/></p>

<p>Here the same example as above but showing you more explicitly that the child div is contained within the parent div.</p>
<div style="width:400px;height:400px;background-color:blue;overflow:hidden;">
This is the parent div.
	<div style="width:200px;height:200px;background-color:green;position:relative;top:50px;left:250px;">
		This is the child div and it is contained inside the parent div.
	</div>
</div>

<p>A different way to visualise it:<br/>
	<img src="images/CubeHalfInCube.jpg" alt="CubeHalfInCube.jpg" width="200"/></p>

<p>In this example width of the outer or parent div (blue) has been set a width of 100% of ITS parent.</p>
<div style="width:100%;height:400px;background-color:blue;overflow:hidden;">
This is the parent div.
	<div style="width:200px;height:200px;background-color:green;position:relative;top:50px;left:10px;">
		This is the child div and it is contained inside the parent div.
	</div>
</div>

<p>You have to imagine that the browser window itself...<br/>
<img src="images/BrowserWindow.jpg" alt="BrowserWindow.jpg" width="400"/><br/>
is also a &lt;div&gt; and it is the great great great great grandparent of every HTML element that makes up the web page.</p>

<p>A different way to visualise it, with the purple cube being representing the web browser window.<br/>
	<img src="images/BrowserWindowBoxWidth.jpg" alt="BrowserWindowBoxWidth.jpg" width="200"/><br/>
	So if you tell the blue &lt;div&gt; to be 100% of its parent's width then it will inherit the width of the purple 
	&lt;div&gt; that represents the web browser window.</p>
	
<p>In this example width of the inner or child div (green) has been set a width of 100% of ITS parent.</p>
<div style="width:400px;height:400px;background-color:blue;overflow:hidden;">
This is the parent div.
	<div style="width:100%;height:200px;background-color:green;position:relative;top:50px;">
		This is the child div and it is contained inside the parent div.
	</div>
</div>

<p>A different way to visualise it:<br/>
	<img src="images/CubeInCubeWidth.jpg" alt="CubeInCubeWidth.jpg" width="200"/>
</p>

<h1>&lt;span&gt;s</h1>
<p>&lt;span&gt; elements (by default) display side by side, until they run out of horizontal space, and then 
they wrap to the next line. &lt;span&gt; ignores explicitly set width and height - its dimensions are determined 
soley by its contents.</p>

<span style="background-color:blue">XXXX SPAN 1 XXXX</span>
<span style="background-color:green">XXXX SPAN 2 XXXX</span>
<span style="background-color:yellow">XXXX SPAN 3 XXXX</span>
<span style="background-color:red">XXXX SPAN 4 XXXX</span>
<span style="background-color:cyan">XXXX SPAN 5 XXXX</span>
<span style="background-color:orange">XXXX SPAN 6 XXXX</span>
<span style="background-color:navy">XXXX SPAN 7 XXXX</span>
<span style="background-color:teal">XXXX SPAN 8 XXXX</span>
<span style="background-color:maroon">XXXX SPAN 9 XXXX</span>
<span style="background-color:purple">XXXX SPAN 10 XXXX</span>
<span style="background-color:silver">XXXX SPAN 11 XXXX</span>
<span style="background-color:olive">XXXX SPAN 12 XXXX</span>
<span style="background-color:Honeydew">XXXX SPAN 13 XXXX</span>
<span style="background-color:CornflowerBlue">XXXX SPAN 14 XXXX</span>
<span style="background-color:DarkOrchid">XXXX SPAN 15 XXXX</span>
<span style="background-color:Chocolate">XXXX SPAN 16 XXXX</span>

<p>A different way to visualise it:<br/>
	<img src="images/SpansInDiv.jpg" alt="SpansInDiv.jpg" width="200"/>
</p>

<h1>&lt;span&gt;s as child elements of a &lt;div&gt;</h1>
<p>In this example I have made all the above span elements a child of the blue div element. Again, please note how I have 
used code indenting to make the parent/child heirarchy of these tags clear in the HTML code.</p>

<pre>
&lt;div style="width:400px;height:400px;background-color:BurlyWood;"&gt;<br/>
	This is the parent div. And all these span elements are its children.<br/>
	&lt;span style="background-color:blue"&gt;XXXX SPAN 1 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:green"&gt;XXXX SPAN 2 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:yellow"&gt;XXXX SPAN 3 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:red"&gt;XXXX SPAN 4 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:cyan"&gt;XXXX SPAN 5 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:orange"&gt;XXXX SPAN 6 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:navy"&gt;XXXX SPAN 7 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:teal"&gt;XXXX SPAN 8 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:maroon"&gt;XXXX SPAN 9 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:purple"&gt;XXXX SPAN 10 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:silver"&gt;XXXX SPAN 11 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:olive"&gt;XXXX SPAN 12 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:Honeydew"&gt;XXXX SPAN 13 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:CornflowerBlue"&gt;XXXX SPAN 14 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:DarkOrchid"&gt;XXXX SPAN 15 XXXX&lt;/span&gt;<br/>
	&lt;span style="background-color:Chocolate"&gt;XXXX SPAN 16 XXXX&lt;/span&gt;<br/>
&lt;/div&gt;<br/>
</pre>

<div style="width:400px;height:400px;background-color:BurlyWood;">
	This is the parent div. And all these span elements are its children.
	<span style="background-color:blue">XXXX SPAN 1 XXXX</span>
	<span style="background-color:green">XXXX SPAN 2 XXXX</span>
	<span style="background-color:yellow">XXXX SPAN 3 XXXX</span>
	<span style="background-color:red">XXXX SPAN 4 XXXX</span>
	<span style="background-color:cyan">XXXX SPAN 5 XXXX</span>
	<span style="background-color:orange">XXXX SPAN 6 XXXX</span>
	<span style="background-color:navy">XXXX SPAN 7 XXXX</span>
	<span style="background-color:teal">XXXX SPAN 8 XXXX</span>
	<span style="background-color:maroon">XXXX SPAN 9 XXXX</span>
	<span style="background-color:purple">XXXX SPAN 10 XXXX</span>
	<span style="background-color:silver">XXXX SPAN 11 XXXX</span>
	<span style="background-color:olive">XXXX SPAN 12 XXXX</span>
	<span style="background-color:Honeydew">XXXX SPAN 13 XXXX</span>
	<span style="background-color:CornflowerBlue">XXXX SPAN 14 XXXX</span>
	<span style="background-color:DarkOrchid">XXXX SPAN 15 XXXX</span>
	<span style="background-color:Chocolate">XXXX SPAN 16 XXXX</span>
</div>

<h1 id="structure">Minimum structure of a HTML document</h1>
<p>
	In MS Expression Web you can create a new HTML document or web page by clicking the following:<br/>
	<img src="images/NewHTML.jpg" alt="NewHTML.jpg" width="300" /><br/>
	And you will get a new text file containing the following:
</p>
<pre>
&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"&gt;
&lt;html xmlns="http://www.w3.org/1999/xhtml"&gt;

&lt;head&gt;
&lt;meta content="text/html; charset=utf-8" http-equiv="Content-Type" /&gt;
&lt;title&gt;Untitled 1&lt;/title&gt;
&lt;/head&gt;

&lt;body&gt;

&lt;/body&gt;

&lt;/html&gt;
</pre>

<p>Notice how it is done a poor job of code indenting. There is a heirarchy of HTML tags here but you would be hard 
pressed to discern it from this. So lets fix the indenting and the HTML tag heirarchy will reveal itself.</p>
<pre>
&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"&gt;
&lt;html xmlns="http://www.w3.org/1999/xhtml"&gt;

	&lt;head&gt;
		&lt;meta content="text/html; charset=utf-8" http-equiv="Content-Type" /&gt;
		&lt;title&gt;Untitled 1&lt;/title&gt;
	&lt;/head&gt;

	&lt;body&gt;
		
	&lt;/body&gt;

&lt;/html&gt;
</pre>
<p>Now you should be able to see that the &lt;html ...&gt; and &lt;/html&gt; tags are the 'granparent' tags. All the other 
tags or between those to tags or 'inside' that 'html' element. Then there are 2 child tags:</p>
<ul>
	<li>&lt;head ...&gt; ... &lt;/head&gt;</li>
	<li>&lt;body ...&gt; ... &lt;/body&gt;</li>
</ul>
<p>In turn the &lt;head ...&gt; ... &lt;/head&gt; tags also contains 2 child tags:</p>
<ul>
	<li>&lt;meta .... / &gt;</li>
	<li>&lt;title&gt; ... &lt;/title&gt;</li>
</ul>

<p>This page structure emulates that of a MS Word document and you can go as far as the following if you wish.</p>

<pre>
&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"&gt;
&lt;html xmlns="http://www.w3.org/1999/xhtml"&gt;

	&lt;head&gt;
		&lt;meta content="text/html; charset=utf-8" http-equiv="Content-Type" /&gt;
		&lt;title&gt;Untitled 1&lt;/title&gt;
		&lt;style&gt;
			...
		&lt;style&gt;
		&lt;link href="styles/style4PC.css" rel="stylesheet" type="text/css" /&gt;
	&lt;/head&gt;

	&lt;header&gt;
		
	&lt;/header&gt;

	&lt;body&gt;
	
	&lt;/body&gt;
	
	&lt;footer&gt;
	
	&lt;/footer&gt;

&lt;/html&gt;
</pre>
<p>Make sure you use indenting like this in your HTML code to show the tag heirarchy and make your code more easily readable 
by those who come after you. Or even yourself when you return to your HTML code after 12 months or whatever.</p>

<p>Details of these HTML tags are as follows:</p>
<ul>
	<li>
		<b>&lt;!DOCTYPE ...&gt;: </b>You can learn more about this tag by clicking 
		<a href="https://www.w3schools.com/tags/tag_doctype.ASP">here</a>.<br/><br/>
		<b>REQUIRED</b><br/><br/>

		MS Expression Web generates this line every time you create a new HTML document. You don't necessarily need to 
		understand fully what it does - just accept it or copy and paste if needed. Without this tag at the top of your 
		HTML document you can run into problems with the way web browsers render your web page.
	</li>
	<li>
		<b>&lt;html&gt;: </b>
		You can learn more about this tag by clicking 
		<a href="https://www.w3schools.com/tags/tag_html.asp">here</a>.<br/><br/>
		<b>REQUIRED</b><br/><br/>

		MS Expression Web generates the 'html' tags every time you create a new HTML document. You don't necessarily 
		need to understand fully what it does - just accept it or copy and paste if needed. In short it lets a web 
		browser know what version of the HTML standard the web pages uses.
	</li>
	<li>
		<b>&lt;head&gt;: </b> You can learn more abut this tag by clicking 
		<a href="https://www.w3schools.com/tags/tag_head.asp">here</a>.<br/><br/>
		<b>REQUIRED</b><br/><br/>
		The idea is put all those HTML tags that DO NOT form part of your visible page content between these tags. 
		Including:
		<ul>
			<li>
				<b>&lt;title&gt;Untitled 1&lt;/title&gt;: </b>the text between these tags is the title of your web page. 
				Note that the document title IS NOT part of your visible page content. The page title ('Untitled 1' in this 
				case) appears as the name of the page tab in your web browser! You can learn more 
				about this HTML tag by clicking <a href="https://www.w3schools.com/tags/tag_title.asp">here</a>. MS Expression 
				Web generates the 'title' tags every time you create a new HTML document.
			</li>
			<li>
				<b>&lt;style&gt;...&lt;/style&gt;: </b> you place all page specific CSS styling between these tags. MS 
				Expression Web will enforce correct CSS syntax for amything your type between these tags. You can learn 
				more about thos tag by clicking <a href="https://www.w3schools.com/tags/tag_style.asp">here</a>. MS 
				Expression Web does not generate the 'style' tags when you create a new HTML document.
			</li>
			<li>
				<b>&lt;link ... /&gt;: </b>you also place any 'link' tags in between your 'head' tags. You use 'link' 
				tags  to 'link' external resources into your HTML document so you can use them in your HTML code. In this 
				example the style.css (containing global CSS styling) into the HTML document. Yo can also use 'link' tags to 
				link in google fonts, icons, multi-language support and many other types of web resources. You can learn 
				more about this HTML tag by clicking <a href="https://www.w3schools.com/tags/tag_link.asp">here</a>. MS 
				Expression Web generates a 'link' tag for the file 'style.css' every time you create a new HTML document.
			</li>
		</ul>
	</li>
	<li>&lt;header&gt;<br/><br/>
		<b>OPTIONAL</b><br/><br/>
		You could use this tag to 'house' any of your visible page content that is common across all your web pages. The 
		idea is similar to the 'header' section of a MS Word document. You can learn more about this tag by clicking 
		<a href="https://www.w3schools.com/tags/tag_header.asp">here</a>. MS Expression Web does not generate the 'header' 
		tags when you create a new HTML document.
	</li>
	<li>&lt;body&gt;<br/><br/>
		<b>REQUIRED</b><br/><br/>
		Generally you put all your page specific content bewteen these tags. You can learn more about this tag by 
		clicking <a href="https://www.w3schools.com/tags/tag_body.asp">here</a>. MS Expression Web generates the 'body' tags 
		every time you create a new HTML document.
	</li>
	<li>&lt;footer&gt;<br/><br/>
		<b>OPTIONAL</b><br/><br/>
		You could use this tag to 'house', for example, any of hyperlinks to Facebook and Twitter pages that is common 
		across all your web pages. The idea is similar to the 'footer' section of a MS Word document. You can learn more 
		about this tag by clicking <a href="https://www.w3schools.com/tags/tag_footer.asp">here</a>. MS Expression Web 
		does not generate the 'footer' tags when you create a new HTML document.
	
	</li>
</ul> 

<h1>Simple tags</h1>
<h2>Text styles</h2>
<p>The parent tag for all these is &lt;span&gt;</p>
<pre>
&lt;b&gt;<b>BOLD</b>&lt;/b&gt;

&lt;i&gt;<i>ITALIC</i>&lt;/i&gt;

&lt;u&gt;<u>UNDERLINE</u>&lt;/u&gt;

&lt;s&gt;<s>STRIKE THROUGH</s>&lt;/s&gt;
</pre>
<h2>Headings</h2>
<p>The parent tag for all these is &lt;div&gt;</p>
<pre>
<h1>&lt;h1&gt;HEADING LEVEL 1&lt;/h1&gt;</h1>
<h2>&lt;h2&gt;HEADING LEVEL 2&lt;/h2&gt;</h2>
<h3>&lt;h3&gt;HEADING LEVEL 3&lt;/h3&gt;</h3>
<h4>&lt;h4&gt;HEADING LEVEL 4&lt;/h4&gt;</h4>
<h5>&lt;h5&gt;HEADING LEVEL 5&lt;/h5&gt;</h5>
<h6>&lt;h6&gt;HEADING LEVEL 6&lt;/h6&gt;</h6>
</pre>

<h2>Horizontal line</h2>
<pre>
&lt;hr/&gt;(shorthand)<br/>
&lt;hr&gt;&lt;/hr&gt;(longhand)<br/>
</pre>
<hr/>

<h2>Spaces</h2>
<p>
	You get one space character for free by simply hitting the space bar on the keyboard.<br/>
	But of you want more than one space character then you will need to type &amp;nbsp; as<br/>
	as many times as needed.<br/>
	E.G. #one space# or #five&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;spaces# (#five	&nbsp;spaces#)
</p>
<h2>Line breaks</h2>
<p>
	You need to type &lt;br/&gt; to get one.<br/>
	E.G. No line break:<br/>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sodales justo et ipsum tincidunt porttitor.<br/><br/>
	One line break:<br/>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br/>Fusce sodales justo et ipsum tincidunt porttitor.
</p>
<h1>Compound tags</h1>
<h2>Paragraphs</h2>
<p>The parent tag is &lt;div&gt;</p>
<p>Here is the same example as above except using paragrapgh tags instead of a line break.</p>
<pre>
&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/p&gt;
&lt;p&gt;Fusce sodales justo et ipsum tincidunt porttitor&lt;/p&gt;
</pre>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
<p>Fusce sodales justo et ipsum tincidunt porttitor.</p>

<h2>Unordered lists</h2>
<p>The parent tag is &lt;div&gt;</p>
<pre>
&lt;ul&gt;<br/>
	&lt;li&gt;First item&lt;/li&gt;<br/>
	&lt;li&gt;Second item&lt;/li&gt;<br/>
	&lt;li&gt;Third item&lt;/li&gt;<br/>
	&lt;li&gt;Fourth item&lt;/li&gt;<br/>
	&lt;li&gt;...&lt;/li&gt;<br/>
&lt;/ul&gt;
</pre>
<ul>
	<li>First item</li>
	<li>Second item</li>
	<li>Third item</li>
	<li>Fourth item</li>
	<li>...</li>
</ul>

<h2>Ordered lists</h2>
<p>The parent tag is &lt;div&gt;</p>
<pre>
&lt;ol&gt;<br/>
	&lt;li&gt;First item&lt;/li&gt;<br/>
	&lt;li&gt;Second item&lt;/li&gt;<br/>
	&lt;li&gt;Third item&lt;/li&gt;<br/>
	&lt;li&gt;Fourth item&lt;/li&gt;<br/>
	&lt;li&gt;...&lt;/li&gt;<br/>
&lt;/ol&gt;
</pre>
<ol>
	<li>First item</li>
	<li>Second item</li>
	<li>Third item</li>
	<li>Fourth item</li>
	<li>...</li>
</ol>

<h2>Images</h2>
<p>The parent tag is &lt;span&gt;</p>
<pre>
&lt;img src="..." alt="..." width="integer" height="integer" /&gt; (shorthand)<br/>
&lt;img src="..." alt="..." /&gt;&lt;/img&gt; (longhand)<br/><br/>
</pre>
<p>
	<b>src: </b>This can be the path for an image file within the web site.<br/>
	e.g. src="images/image_filename.jpg" or it can be an image file at an external<br/>
	URL e.g. src="https://google.com/images/image_filename.jpg"<br/><br/>
	
	<b>alt: </b>This is alternative text to display if the image file is not found.<br/>
	Commonly it is just the name of the image file e.g. alt="image_filename.jpg"<br/><br/>
	
	<b>width &amp; height: </b>These should be integers commonly between 20 and 500, to create<br/>
	a small to moderately large image on the page. If you specify EITHER a width OR a height<br/>
	then the image will resize while maintaining its aspect ratio. If you specify BOTH a width<br/>
	AND a height then the image may appear distorted on the page.<br/><br/>
</p>
<pre>
E.G. width="..." only
	&lt;img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Information_icon.svg/960px-Information_icon.svg.png?_=20260201131748" alt="Google commons image" width="100" /&gt;<br/>
</pre>
<p>
	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Information_icon.svg/960px-Information_icon.svg.png?_=20260201131748" alt="Google commons image" width="100" />
</p>
<pre>
E.G. height="..." only
	&lt;img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Information_icon.svg/960px-Information_icon.svg.png?_=20260201131748" alt="Google commons image" height="100" /&gt;<br/>
</pre>
<p>
	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Information_icon.svg/960px-Information_icon.svg.png?_=20260201131748" alt="Google commons image" height="100" />
</p>
<pre>
E.G. width="..." and height="..."
	&lt;img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Information_icon.svg/960px-Information_icon.svg.png?_=20260201131748" alt="Google commons image" width="200" height="50" /&gt;
</pre>
<p>
	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Information_icon.svg/960px-Information_icon.svg.png?_=20260201131748" alt="Google commons image" width="200" height="50" />
</p>

<h2>Hyperlinks</h2>
<p>The parent tag is &lt;span&gt;</p>
<p>
	&lt;a href="..." /&gt;&lt;Text to display&lt;/a&gt;<br/><br/>
	
	<b>href: </b>This can be the path for type of file within the web site.<br/>
	e.g. href="join/join.html", it can be an external URL href="https://google.com" or<br/>
	or it can be a bookmark within the currently loaded page e.g. href=#bookmark_name.<br/>
	Some where on the page you must have a HTML tag with an id property containing the<br/>
	bookmark name. e.g. &lt;h1 id="bookmark_name"&gt;HEADING NAME&lt;/h1&gt;. Commonly<br/>
	headings are used as bookmarks, however you can also have book marks on tables, <br/>
	paragraphs and images etc.
</p>
<pre>
E.G. &lt;a href="https://google.com"&gt;Click here for google&lt;/a&gt;
</pre>
<p>
	<a href="https://google.com">Click here for google</a>
</p>
<h1>An image as a hyperlink</h1>
<pre>
&lt;a href="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Information_icon.svg/960px-Information_icon.svg.png?_=20260201131748" /&gt;&lt;&lt;img src="image_filename.jpg" alt="Google commons image" width="30" /&gt;&lt;/a&gt;<br/><br/>
</pre>
<p>
	In this example the hyperlink is to the image that is being	used as the clickable page element. Clicking it<br/>
	will result in the image being opened in the web browser in its own right.<br/><br/>
	E.G. &lt;a href="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Information_icon.svg/960px-Information_icon.svg.png?_=20260201131748"&gt;&lt;img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Information_icon.svg/960px-Information_icon.svg.png?_=20260201131748" alt="Google commons image" width="100" /&gt;&lt;/a&gt;<br/>
	<a href="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Information_icon.svg/960px-Information_icon.svg.png?_=20260201131748"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Information_icon.svg/960px-Information_icon.svg.png?_=20260201131748" alt="Google commons image" width="100" /></a>							
</p>
<h1>Tables</h1>
<p>The parent tag is &lt;div&gt;</p>
<p>Apart from using HTML tables for conventional purposes, you can also use them th structure web pages. If you 
use &lt;div&gt;s to structure your web pages then they have the unfortunate disadvantage of re-arranging themselves, 
in ways you as the web page designer do not anticipate, when the viewer re-sizes their web browser window. This can 
completely muck up the lay out of your web page. But if you structure your web page via a table then your web page 
is 'fixed in stone' and its structure cannot be re-arranged when the viewer re-sizes their web browser window.</p>
<pre>
&lt;table border="1" cellspacing="5" cellpadding="5"&gt;<br/>
	&lt;thead&gt;&lt;!--START HEADER--&gt;<br/>
		&lt;tr&gt;&lt;!--START HEADER ROW--&gt;<br/>
			&lt;th&gt;COLUMN 1 HEADING&lt;/th&gt;<br/>
			&lt;th&gt;COLUMN 2 HEADING&lt;/th&gt;<br/>
			&lt;th&gt;COLUMN 3 HEADING&lt;/th&gt;<br/>
		&lt;/tr&gt;&lt;!--END HEADER ROW--&gt;<br/>
	&lt;/thead&gt;&lt;!--END HEADER--&gt;<br/>
	&lt;tr&gt;&lt;!--START ROW 1--&gt;<br/>
		&lt;td&gt;COLUMN 1, ROW 1&lt;/td&gt;<br/>
		&lt;td&gt;COLUMN 2, ROW 1&lt;/td&gt;<br/>
		&lt;td&gt;COLUMN 3, ROW 1&lt;/td&gt;<br/>
	&lt;/tr&gt;&lt;!--END ROW 1--&gt;<br/>
	&lt;tr&gt;&lt;!--START ROW 2--&gt;<br/>
		&lt;td&gt;COLUMN 1, ROW 2&lt;/td&gt;<br/>
		&lt;td&gt;COLUMN 2, ROW 2&lt;/td&gt;<br/>
		&lt;td&gt;COLUMN 3, ROW 2&lt;/td&gt;<br/>
	&lt;/tr&gt;&lt;!--END ROW 2--&gt;<br/>
	&lt;tr&gt;&lt;!--START ROW 3--&gt;<br/>
		&lt;td&gt;COLUMN 1, ROW 3&lt;/td&gt;<br/>
		&lt;td&gt;COLUMN 2, ROW 3&lt;/td&gt;<br/>
		&lt;td&gt;COLUMN 3, ROW 3&lt;/td&gt;<br/>
	&lt;/tr&gt;&lt;!--END ROW 3--&gt;<br/>
&lt;/table&gt;
</pre>
<h2>border="0" cellspacing="0" cellpadding="0"</h2>
<table border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th>COLUMN 1 HEADING</th>
			<th>COLUMN 2 HEADING</th>
			<th>COLUMN 3 HEADING</th>
		</tr>
	
	</thead>
	<tr>
		<td>COLUMN 1, ROW 1</td>
		<td>COLUMN 2, ROW 1</td>
		<td>COLUMN 3, ROW 1</td>
	</tr>
	<tr>
		<td>COLUMN 1, ROW 2</td>
		<td>COLUMN 2, ROW 2</td>
		<td>COLUMN 3, ROW 2</td>
	</tr>
	<tr>
		<td>COLUMN 1, ROW 3</td>
		<td>COLUMN 2, ROW 3</td>
		<td>COLUMN 3, ROW 3</td>
	</tr>							
</table><br/><br/>
	
<h2>border="1" cellspacing="0" cellpadding="0"</h2>
<table border="1" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th>COLUMN 1 HEADING</th>
			<th>COLUMN 2 HEADING</th>
			<th>COLUMN 3 HEADING</th>
		</tr>
	</thead>
	<tr>
		<td>COLUMN 1, ROW 1</td>
		<td>COLUMN 2, ROW 1</td>
		<td>COLUMN 3, ROW 1</td>
	</tr>
	<tr>
		<td>COLUMN 1, ROW 2</td>
		<td>COLUMN 2, ROW 2</td>
		<td>COLUMN 3, ROW 2</td>
	</tr>
	<tr>
		<td>COLUMN 1, ROW 3</td>
		<td>COLUMN 2, ROW 3</td>
		<td>COLUMN 3, ROW 3</td>
	</tr>
</table><br/><br/>
	
<h2>border="1" cellspacing="10" cellpadding="0"</h2>
<table border="1" cellspacing="10" cellpadding="0">
	<thead>
		<tr>
			<th>COLUMN 1 HEADING</th>
			<th>COLUMN 2 HEADING</th>
			<th>COLUMN 3 HEADING</th>
		</tr>
	</thead>
	<tr>
		<td>COLUMN 1, ROW 1</td>
		<td>COLUMN 2, ROW 1</td>
		<td>COLUMN 3, ROW 1</td>
	</tr>
	<tr>
		<td>COLUMN 1, ROW 2</td>
		<td>COLUMN 2, ROW 2</td>
		<td>COLUMN 3, ROW 2</td>
	</tr>
	<tr>
		<td>COLUMN 1, ROW 3</td>
		<td>COLUMN 2, ROW 3</td>
		<td>COLUMN 3, ROW 3</td>
	</tr>
</table><br/><br/>
	
<h2>border="1" cellspacing="0" cellpadding="10"</h2>
<table border="1" cellspacing="0" cellpadding="10">
	<thead>
		<tr>
			<th>COLUMN 1 HEADING</th>
			<th>COLUMN 2 HEADING</th>
			<th>COLUMN 3 HEADING</th>
		</tr>
	</thead>
	<tr>
		<td>COLUMN 1, ROW 1</td>
		<td>COLUMN 2, ROW 1</td>
		<td>COLUMN 3, ROW 1</td>
	</tr>
	<tr>
		<td>COLUMN 1, ROW 2</td>
		<td>COLUMN 2, ROW 2</td>
		<td>COLUMN 3, ROW 2</td>
	</tr>
	<tr>
		<td>COLUMN 1, ROW 3</td>
		<td>COLUMN 2, ROW 3</td>
		<td>COLUMN 3, ROW 3</td>
	</tr>
</table><br/><br/>
	
<h2>Using colspan to merge columns</h2>
<pre>
	&lt;table border="1" cellspacing="5" cellpadding="5"&gt;<br/>
		&lt;thead&gt;&lt;!--START HEADER--&gt;<br/>
			&lt;tr&gt;&lt;!--START HEADER ROW--&gt;<br/>
				&lt;th&gt;COLUMN 1 HEADING&lt;/th&gt;<br/>
				&lt;th&gt;COLUMN 2 HEADING&lt;/th&gt;<br/>
				&lt;th&gt;COLUMN 3 HEADING&lt;/th&gt;<br/>
			&lt;/tr&gt;&lt;!--END HEADER ROW--&gt;<br/>
		&lt;/thead&gt;&lt;!--END HEADER--&gt;<br/>
		&lt;tr&gt;&lt;!--START ROW 1--&gt;<br/>
			&lt;td <b>colspan="2"</b>&gt;COLUMN 1 &amp; 2, ROW 1&lt;/td&gt;<br/>
			<b>&lt;!-- OMITT COLUMN 2 --&gt;</b><br/>
			&lt;td&gt;COLUMN 3, ROW 1&lt;/td&gt;<br/>
		&lt;/tr&gt;&lt;!--END ROW 1--&gt;<br/>
		&lt;tr&gt;&lt;!--START ROW 2--&gt;<br/>
			&lt;td&gt;COLUMN 1, ROW 2&lt;/td&gt;<br/>
			&lt;td&gt;COLUMN 2, ROW 2&lt;/td&gt;<br/>
			&lt;td&gt;COLUMN 3, ROW 2&lt;/td&gt;<br/>
		&lt;/tr&gt;&lt;!--END ROW 2--&gt;<br/>
		&lt;tr&gt;&lt;!--START ROW 3--&gt;<br/>
			&lt;td&gt;COLUMN 1, ROW 3&lt;/td&gt;<br/>
			&lt;td&gt;COLUMN 2, ROW 3&lt;/td&gt;<br/>
			&lt;td&gt;COLUMN 3, ROW 3&lt;/td&gt;<br/>
		&lt;/tr&gt;&lt;!--END ROW 3--&gt;<br/>
	&lt;/table&gt;<br/><br/>
</pre>
<table border="1" cellspacing="0" cellpadding="10">
	<thead>
		<tr>
			<th>COLUMN 1 HEADING</th>
			<th>COLUMN 2 HEADING</th>
			<th>COLUMN 3 HEADING</th>
		</tr>
	</thead>
	<tr>
		<td colspan="2">COLUMN 1 &amp; 2, ROW 1</td>
		<td>COLUMN 2, ROW 1</td>
	</tr>
	<tr>
		<td>COLUMN 1, ROW 2</td>
		<td>COLUMN 2, ROW 2</td>
		<td>COLUMN 3, ROW 2</td>
	</tr>
	<tr>
		<td>COLUMN 1, ROW 3</td>
		<td>COLUMN 2, ROW 3</td>
		<td>COLUMN 3, ROW 3</td>
	</tr>								
</table><br/><br/>
	
<h2>Using rowspan to merge rows</h2>
<pre>
	&lt;table border="1" cellspacing="5" cellpadding="5"&gt;<br/>
		&lt;thead&gt;&lt;!--START HEADER--&gt;<br/>
			&lt;tr&gt;&lt;!--START HEADER ROW--&gt;<br/>
				&lt;th&gt;COLUMN 1 HEADING&lt;/th&gt;<br/>
				&lt;th&gt;COLUMN 2 HEADING&lt;/th&gt;<br/>
				&lt;th&gt;COLUMN 3 HEADING&lt;/th&gt;<br/>
			&lt;/tr&gt;&lt;!--END HEADER ROW--&gt;<br/>
		&lt;/thead&gt;&lt;!--END HEADER--&gt;<br/>
		&lt;tr&gt;&lt;!--START ROW 1--&gt;<br/>
			&lt;td <b>rowspan="2"</b>&gt;COLUMN 1, ROW 1 &amp; 2&lt;/td&gt;<br/>
			&lt;td&gt;COLUMN 2, ROW 1&lt;/td&gt;<br/>
			&lt;td&gt;COLUMN 2, ROW 1&lt;/td&gt;<br/>
			&lt;td&gt;COLUMN 3, ROW 1&lt;/td&gt;<br/>
		&lt;/tr&gt;&lt;!--END ROW 1--&gt;<br/>
		&lt;tr&gt;&lt;!--START ROW 2--&gt;<br/>
			<b>&lt;!-- OMITT COLUMN 1 ON ROW 2 --&gt;</b><br/>
			&lt;td&gt;COLUMN 2, ROW 2&lt;/td&gt;<br/>
			&lt;td&gt;COLUMN 3, ROW 2&lt;/td&gt;<br/>
		&lt;/tr&gt;&lt;!--END ROW 2--&gt;<br/>
		&lt;tr&gt;&lt;!--START ROW 3--&gt;<br/>
			&lt;td&gt;COLUMN 1, ROW 3&lt;/td&gt;<br/>
			&lt;td&gt;COLUMN 2, ROW 3&lt;/td&gt;<br/>
			&lt;td&gt;COLUMN 3, ROW 3&lt;/td&gt;<br/>
		&lt;/tr&gt;&lt;!--END ROW 3--&gt;<br/>
	&lt;/table&gt;<br/><br/>
</pre>
<table border="1" cellspacing="0" cellpadding="10">
	<thead>
		<tr>
			<th>COLUMN 1 HEADING</th>
			<th>COLUMN 2 HEADING</th>
			<th>COLUMN 3 HEADING</th>
		</tr>
	</thead>
	<tr>
		<td rowspan="2">COLUMN 1, ROW 1 &amp; 2</td>
		<td>COLUMN 2, ROW 1</td>
		<td>COLUMN 3, ROW 1</td>
	</tr>
	<tr>
		<td>COLUMN 2, ROW 2</td>
		<td>COLUMN 3, ROW 2</td>
	</tr>
	<tr>
		<td>COLUMN 1, ROW 3</td>
		<td>COLUMN 2, ROW 3</td>
		<td>COLUMN 3, ROW 3</td>
	</tr>								
</table>

<h1>Nesting tags</h1>
<p>You can freely nest those tags that are 'children' of or derived from &lt;span&gt;. So tags like of &lt;b&gt;, &lt;a&gt;
, &lt;u&gt; and  &lt;i&gt; etc. can be freely nested one inside another and inside another. For example these nestings are 
perfectly fine in HTML:</p>
<ul>
	<li>&lt;a href="..."&gt;&lt;img src="..." alt="..." /&gt;&lt;/a&gt;</li>
	<li>&lt;b&gt;&lt;u&gt;&lt;i&gt;XXXXXXX&lt;/i&gt;&lt;/u&gt;&lt;/b&gt;</li>
	<li>&lt;img src="..." alt="..."&gt;&lt;b&gt;XXXXXX&lt;/b&gt;&lt;/img&gt;</li>
</ul>

<p>The only thing to be mindful of is to make sure you close the opening tags in the matching sequence. Doing this, for 
example, might lead to unexpected results: &lt;b&gt;&lt;u&gt;&lt;i&gt;XXXXXXX&lt;/b&gt;&lt;/u&gt;&lt;/i&gt;</p>

<p id="illegal_nesting">You can freely nest &lt;div&gt;s (specifically) inside each other as deeply as you want. However you should not nest 
tags that are children of or derived from &lt;div&gt; inside each other.For example, do not nest a &lt;ul&gt; tag inside 
a &lt;p&gt; tag. Expression Web will tell you that you have an error in your HTML and you can get some rather mysterious 
and unpredictable results in your web page. However you can nest a &lt;p&gt; tag, for example, inside a &lt;div&gt; tag 
(spcifically).</p>

<p>Now at this point I bet you are confused as hell about what I am trying to explain to you. But there is an everyday 
analogy that can go a long way to helping you comprehend all this. Let's consider the following substitutions:</p>
<ul>
	<li>&lt;div&gt;...&lt;/div&gt; becomes &lt;mechanics_garage&gt;...&lt;/mechanics_garage&gt;</li>
	<li>&lt;ul&gt;...&lt;/ul&gt; becomes &lt;holden_body&gt;...&lt;/holden_body&gt;</li>
	<li>&lt;p&gt;...&lt;/p&gt; becomes &lt;toyota_engine&gt;...&lt;/toyota_engine&gt;</li>
</ul>

<p>Now, if you do this nesting of tags then all is as you expect it...<br/>
&lt;mechanics_garage&gt;<br/>
	&lt;holden_body&gt;...&lt;/holden_body&gt;<br/>
	&lt;toyota_engine&gt;...&lt;/toyota_engine&gt;<br/>
&lt;/mechanics_garage&gt;</p>
<p>But, if you do this nesting of tags then disaster will occur. Because you can't put a toyota engine in a holden body.<br/>
&lt;mechanics_garage&gt;<br/>
	&lt;holden_body&gt;<br/>
		&lt;toyota_engine&gt;...&lt;/toyota_engine&gt;<br/>
	&lt;/holden_body&gt;<br/>
&lt;/mechanics_garage&gt;</p>


<h1>&lt;pre&gt; &amp; &lt;p&gt; tags</h1>
&lt;pre&gt; What you type is what you get.&lt;/pre&gt;<br/>
<pre>Hello        world      &<>      !@#$%^*()_-+=:;"{',./</pre>

&lt;p&gt; What you type is mostly what you get.&lt;/p&gt;<br/>
<p>Hello        world      &<>      !@#$%^*()_-+=:;"{',./</p>
<p>In the case of &lt;p&gt; tags you get one space character for free. If you want more than that in a row then you have to 
use &amp;amp;&amp;amp;&amp;amp;&amp;amp;&amp;amp;. Or you could nest &lt;pre&gt; tags inside &lt;p&gt; tags.</p>

&lt;p&gt;&lt;pre&gt; What you type is what you get.&lt;/pre&gt;&lt;/p&gt;<br/>
<p><pre>Hello        world      &<>      !@#$%^*()_-+=:;"{',./</pre></p>

<p>Expression Web will highlight HTML errors if you type an &amp; inside &lt;pre&gt; tags, for example, but just ignore 
it. Web browsers do not have a problem with this.</p>

<h1>Try all this!</h1>
<p>While MS Expression Web makes editing web pages and entire web sites much easier. You don't actually need any special 
software to create a HTML web page. You could do ALL of this with MS Windows Notepad, available in the Accesories section 
of the start menu of any version of MS Windows. Simply copy any of this HTML code, paste it into Notepad, save the file 
as 'example.htm', use File Explorer or This Computer to browse your way to the file's folder location (likely in your 
'documents' folder) and double click on the file - it should come up in your web browser. If not then right click on 
'example.htm', select 'open with' and then select your web browser from the list of options.</p>

<h1>HTML Emojis</h1>
<p>You can insert the same emojis in your content as you can in Facebook and Facebook messengers. Here are a few of them:</p>
<ul>
	<li>&amp;&#x23;x1F600: &#x1F600;</li>
	<li>&amp;&#x23;x1F601: &#x1F601;</li>
	<li>&amp;&#x23;x1F602: &#x1F602;</li>
	<li>&amp;&#x23;x1F603: &#x1F603;</li>
	<li>&amp;&#x23;x1F604: &#x1F604;</li>
	<li>&amp;&#x23;x1F605: &#x1F605;</li>
	<li>&amp;&#x23;x1F606: &#x1F606;</li>
</ul>
<p>You can see the full list of available emojis by clicking <a href="https://www.w3schools.com/charsets/ref_emoji_smileys.asp">here</a>.</p>

<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>ALL the contents of this page are jts plain HTML and CSS so feel free to edit it if the need ever arises. But 
	confine your editing to only that HTML code that does not have a yellow background color.</p>
	
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

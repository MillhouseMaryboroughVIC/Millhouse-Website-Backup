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
		<title>CSS for Beginners</title>
		
		<style type="text/css">




























			#green_div,
			.green_div
			{
				background-color: green;
				border-style: solid;
				border-color: red;
				border-width: thick;
			}
			
			.big_white_text
			{
				color: white;
				font-size: xx-large;
			}
			.span
			{
				background-color: green;
				border-style: solid;
				border-color: red;
				border-width: thick;
				color: white;
				font-size: xx-large;
			}
			
			.div2,
			.div3,
			.div4
			{
				background-color: navy;
				visibility: visible;
				color: white;
				font-weight: bold;
				width: 100px;
				height: 100px;
			}
			.div2:hover
			{
				background-color: blue;
			}
			.div3:hover
			{
				visibility: hidden;
			}
			.div4:hover
			{
				cursor: crosshair;
			}
			li
			{
				line-height: 20px;
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
		<li><a href="../group_events/group_events.php">Group Events</a></li>
		<li>
			<a href="administration.php" onclick="DoClickNavLinkWithSubmenu('administration')">Administration</a>
			<ul style="display:<?php echo DoShowHideSubmenu("administration"); ?>;" id="administration">
			
			<?php DoDisplayAdministrationSubmenu(); ?>
			
			</ul>
		</li>
	</ul>
</div>
										</td>
										<td>
<div id="div_navigation_arrow" class="navigation_arrow">
	<span id="span_menu_text" class="span_menu_text" onclick="DoOpenCloseMenu(true)">
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
								<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td>
											<div class="page_heading"><u><script type="text/javascript">document.write(document.title);</script></u></div>
										</td>
										<td style="text-align:right;">
											<?php
											
												if (isLoggedIn())
													echo "<button class=\"instructions_button\" type=\"button\" onclick=\"DoDisplayHidePopup('div_page_edit_instructions', true)\">PAGE EDITING INSTRUCTIONS</button>\n";
													
											?>
										</td>
									</tr>
								</table>			

								<!-- #BeginEditable "CustomContent" -->


<p>CSS stands for <b>C</b>ascading <b>S</b>tyle <b>S</b>heets. CSS provides a way to apply different sets of formatting 
styles to the same HTML document. You could use them, for example, to make the text in a HTML document larger and more 
easily readable by vision impaired visitors, without effecting what vistors with normal vision see.</p>

<p> There are HUNDREDS of different CSS properties that you can change to have a wide variety of effects on the individual 
behavior and appearance of your HTML elements. There is no hope of trying to describe all of them here so we will simply 
explore a few of the most commonly used properties and selectors. For a full reference for ALL the CSS properties please 
<a href="https://www.w3schools.com/cssref/index.php">click here</a> for the excellent W3Schools CSS reference.</p>

<h1>How do you apply CSS styling?</h1>
<h2>Definitions and terminology</h2>
<ul>
	<li><b>HTML web page</b> or just <b>web page</b>
		<p>Typically they are text files that have the extension .html or .htm. The you open these file types in your 
		web browser, it reads the HTML instructions and 'renders' the web page.</p>
	</li>
</ul>
<h2>What is 'scope'</h2>

<p>Well no doubt you are familiar with the concept of scope when it comes to writing some sort of organisational report 
or proposal. For example, the scope of your report might be limited to the next 5 yeasr only or to the VIC operation but 
not the national operation. Scope in the context of CSS is somewhat similar. The scope of your CSS styling can apply:</p>
<ul>
	<li>To a single instance of a HTML tag (one off) in a particular HTML web page.</li>
	<li>A set of styles that apply to one or more HTML elements on a particular HTML web page.</li>
	<li>A 'global' set of styles that can apply to any HTML element in any HTML web page in the entire website.</li>
</ul>

<h3>Inline CSS</h3>
<p>This is used for 'one off' styling of particular HTML elements within the current web page.<br/>
	<img src="images/StyleProperty.jpg" alt="StyleProperty.jpg" height="300" /><br/>
	HTML Elements 2, 3 and 4 cannot 'see' HTML element 1's inline styles. Those inline styles are said to be 
	'out of scope' for HTML elements 2, 3 and 4.
</p>
<p>You insert your CSS styling into the 'style' property between the double quotes, e.g. 
&lt;div style="background-color:blue;"&gt;...&lt;/div&gt;. The 'style' property is one of the generic HTML tag 
properties that you can apply to ANY HTML element.</p>

<h3>&lt;style&gt; / &lt;/style&gt; tags</h3>
<p>This is used for styling of one or more elements but in the current web page only. HTML elements on other web pages 
CANNOT 'see' the CSS styles between the &lt;style&gt;...&lt;/style&gt; on other web pages.<br/>
<img src="images/StyleTags.jpg" alt="StyleTags.jpg" height="300" /><br/>
HTML Elements 2 and 3 can 'see' your styles you have put between the &lt;style&gt; tags at the top of your web page. They 
are said to be 'in scope' for HTML elements 2 and 3.
</p>

<p>However HTML elements 3 and 4 cannot 'see' the styles on HTML page 1. The styles on web page 1 are said to be 'out 
of scope' for HTML elements 3 and 4 on web page 2.</p>

<p>Remember the basic tag structure of a HTML document? Click <a href="../\html_4_beginners.html#structure">here</a> if 
you need to read it again. The style tags are typically located within the head tags, like this:</p>
<pre>
&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"&gt;
&lt;html xmlns="http://www.w3.org/1999/xhtml"&gt;

        &lt;head&gt;
                &lt;meta content="text/html; charset=utf-8" http-equiv="Content-Type" /&gt;
                &lt;title&gt;Untitled 1&lt;/title&gt;
                <b>&lt;style&gt;</b>
                        <b>...</b>
                <b>&lt;/style&gt;</b>
        &lt;/head&gt;

        &lt;body&gt;
			...
        &lt;/body&gt;

&lt;/html&gt;
</pre>

<h3>The file style.css</h3>
<p>This is used for 'global' or 'god' styling of one or more HTML elements across multiple HTML web pages. MS Expression 
web likes to use the file name 'style.css' for this but you do not have stick this this file name if you do not want to. 
You could two style sheets in principle - 'StyleVisionImpaired.css' and StyleNormalVision.css' for example. It is up to 
you what filename you give your style sheet(s). MS Expression Web also likes to store your 'style.css' file in a sub-folder 
named 'styles'. But again you can store then in any sub-folder you chose, or not store them in any sub-folder at all.</p>

<p>However every HTML web page in which you want to use your style sheet(s) MUST have this line of HTML code in them:</p>
<p>&lt;link href="styles/style4PC.css" rel="stylesheet" type="text/css" /&gt;</p>
<p>You can read all bout the HTML &lt;Link ... &gt; tag <a href="https://www.w3schools.com/tags/tag_link.asp">here</a> 
if you wish to. Or just do what i do - copy and paste the text from another HTML web page. The link tag must correctly 
tell the web browser what sub-folder (or not) where it will find your .css file, and its correct filename.</p>

<p>As long as you include an appropriate &lt;link ... &gt; tag in both web pages 1 and 2 then all the styles you put in 
your style.css then they are 'in scope' for both web pages 1 and 2, and HTML elements 1, 2, 3 and 4.<br/>
<img src="images/StyleCSS.jpg" alt="StyleCSS.jpg" height="300" /></p>


<h3>What is the purpose of this 'scoping'?</h3>

<p>The purpose of all this is to allow you you to 're-use' your CSS styling across multiple elements and multiple web 
pages, without having to tyoe the same CSS styling over and over again for individual elements and individual HTML web 
pages.</p>

<p>But the system ALSO allows you to 'compartmentalise' your CSS styling. For example, if web page 1 has CSS style that 
you don't need use in web page 2 then you put them between the &lt;style&gt; tags OF web page 1. If you have styles that 
you need to apply to a particular HTML element and other then use inline styling (style="...").</p>

<h2>Via ID selectors</h2>
<p>This method employs the use of the HTML tag property 'id' as the means of selecting those HTML elements to 
which a set of CSS styles will be applied. Remember the HTML tag property 'id' can be applied to ANY type of 
HTML element - it is generic property. E.G.</p>

<pre>
	&lt;div <b>id="green_div"</b>&gt;######&lt;/div&gt;
	&lt;div <b>id="other_div"</b>&gt;$$$$$$&lt;/div&gt;
	&lt;div <b>id="green_div</b>"&gt;@@@@@@&lt;/div&gt;
</pre>
<p>Then, either between the &lt;style"&gt;...&lt;/style&gt;vin your HTML web page or in 'style.css' you do this:</p>
<pre>
#green_div
{
		  background-color: green;
		  border-style: solid;
		  border-color: red;
		  border-width: thick;
}
</pre>
<p>And here are the results:</p>

<div id="green_div">######</div>
<div id="other_div">$$$$$$</div>
<div id="green_div0">@@@@@@</div>

<p>Notice that only the top and bottom divs (with id="green_div") have green backgrounds and thick red borders. The middle 
div (with id="other_div" and text content "$$$$$$") does not.</p>

<p>However I recomend against using this technique as it can cause problems if you use Javascript in your web page. 
Particularly with the Javascript function document.getElementById("unique_element_id"). It requires that the HTML 
element you are trying to 'get' has a unique name for its 'id' property. Using the CSS id selector requires mutiple 
HTML elements to have a shared name for their 'id' property. Hence document.getElementById("unique_element_id") simply 
will not work as you expect it to.</p>

<h2>Via class selectors</h2>
<p>This is a better way of appying CSS styles to multiple HTML elements.</p>

<pre>
&lt;div <b>class="green_div big_white_text"</b>&gt;######&lt;/div&gt;
&lt;div <b>class="other_div"</b>&gt;$$$$$$&lt;/div&gt;
&lt;div <b>class="green_div"</b>&gt;@@@@@@&lt;/div&gt;
You utilise the 'class' property instead and specify one or more a unique 'class' names. This method has a major 
advantage over the 'id' method in that you can apply multiple class names with different sets of CSS styles as in 
this example. 
</pre>
<pre>Then, either between the &lt;style"&gt;...&lt;/style&gt; in your HTML web page or in 'style.css' you do this:
.green_div
{
	background-color: green;
	border-style: solid;
	border-color: red;
	border-width: thick;
}
.big_white_text
{
	color: white;
	font-size: xx-large;
}
</pre>
<p>And here are the results:</p>
<div class="green_div big_white_text">######</div>
<div class="other_div">$$$$$$</div>
<div class="green_div">@@@@@@</div>

<h2>Via tag selectors</h2>
<p>You can also apply selectively apply CSS styles via tag selectors. You use tag selectors if you want your styles 
applied to every single isntance of any particular tag.</p>

<pre>
&lt;<b>span</b>&gt;######&lt;/span&gt;
&lt;<b>span</b>&gt;$$$$$$&lt;/span&gt;
&lt;<b>span</b>&gt;@@@@@@&lt;/span&gt;
</pre>
<p>Notice that neither the 'id' or 'class' properties are specified for these spans.</p>
<p>And between the between the &lt;style"&gt;...&lt;/style&gt; in your HTML web page or in 'style.css' you do 
the following with the tag name you want the styles applied to.</p>
<pre>
span
{
	background-color: green;
	border-style: solid;
	border-color: red;
	border-width: thick;
	color: white;
	font-size: xx-large;
}
</pre>
<p>And here are the results:</p>
<span class="span">######</span>
<span class="span">$$$$$$</span>
<span class="span">@@@@@@</span>
<p>All 3 HTML elements are spans therefore all three have green backgrounds, thick red borders and big white text.</p>

<p>And you have now learned how to use your first six CSS properties. MS Expression Web will show you a popup 
lists of CSS properties you can use, and popup lists of values you can apply to each attribute, as you type within 
style="..." and the &lt;style&gt;...&lt;/style&gt; tags.</p>

<h1>Specifying colors</h1>
<p>There are many named colors that you can apply to the 'background-color' and 'color' properties and you can read 
about them <a href="https://www.w3schools.com/tags/ref_colornames.asp">here</a>. Or you can invent your own colors via 
<a href="https://www.w3schools.com/html/html_colors_hex.asp">hex values</a>,
<a href="https://www.w3schools.com/colors/colors_rgb.asp">rgb(...) and rgba(...)</a>, 
<a href="https://www.w3schools.com/colors/colors_hsl.asp">hls(...) and hlsa(...)</a>. Simple named colours are the most 
convenient to use.</p>

<h1>Borders</h1>
<p>You have VERY fine control over borders so let's look at some quick examples. And you can read all about CSS borders by 
clicking <a href="https://www.w3schools.com/css/css_border.asp">here</a>.</p>

<h2>border-style</h2>
<pre>
	&lt;div style="<b>border-style:solid;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border-style:dotted;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border-style:dashed;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border-style:double;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border-style:inset;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border-style:outset;</b>width:100px;;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border-style:ridge;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border-style:groove;</b>width:100px;;"&gt;XXXXXXX&lt;/div&gt;
	The results are:
</pre>
<div style="border-style:solid;width:100px;">XXXXXXX</div><br/>
<div style="border-style:dotted;width:100px;">XXXXXXX</div><br/>
<div style="border-style:dashed;width:100px;">XXXXXXX</div><br/>
<div style="border-style:double;width:100px;">XXXXXXX</div><br/>
<div style="border-style:inset;width:100px;">XXXXXXX</div><br/>
<div style="border-style:outset;width:100px;">XXXXXXX</div><br/>
<div style="border-style:ridge;width:100px;">XXXXXXX</div><br/>
<div style="border-style:groove;width:100px;">XXXXXXX</div>

<p>Or...</p>
<pre>
	&lt;div style="<b>border-left-style:solid;border-top-style:dotted;border-right-style:dashed;border-bottom-style:double;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border:solid dotted dashed double;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	The results are:
</pre>
<div style="border-left-style:solid;border-top-style:dotted;border-right-style:dashed;border-bottom-style:double;width:100px;">XXXXXXX</div><br/>
<div style="border-style:solid dotted dashed double;width:100px;">;XXXXXXX</div>

<h2>border-width</h2>
<p><b>DEFAULT VALUE: </b>"thin"</p>
<pre>
	&lt;div style="border-style:solid;<b>border-width:thin;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="border-style:solid;<b>border-width:medium;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="border-style:solid;<b>border-width:thick;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="border-style:solid;<b>border-width:20px;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	The results are:
</pre>
<div style="border-style:solid;border-width:thin;width:100px;">XXXXXXX</div><br/>
<div style="border-style:solid;border-width:medium;width:100px;">XXXXXXX</div><br/>
<div style="border-style:solid;border-width:thick;width:100px;">XXXXXXX</div><br/>
<div style="border-style:solid;border-width:20px;width:100px;">XXXXXXX</div><br/>

<h2>border-color</h2>
<p><b>DEFAULT VALUE: </b>"black"</p>
<pre>
	&lt;div style="<b>border-style:solid;</b>border-width:medium;border-color:red;width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border-style:solid;</b>border-width:medium;border-color:green;width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border-style:solid;</b>border-width:medium;border-color:blue;width:100px;"&gt;XXXXXXX&lt;/div&gt;
	The results are:
</pre>
<div style="border-style:solid;border-width:medium;border-color:red;width:100px;">XXXXXXX</div><br/>
<div style="border-style:solid;border-width:medium;border-color:green;width:100px;">XXXXXXX</div><br/>
<div style="border-style:solid;border-width:medium;border-color:blue;width:100px;">XXXXXXX</div><br/>

<h2>border-radius</h2>
<p><b>DEFAULT VALUE: </b>"0px" (sharp corners)</p>
<pre>
	&lt;div style="border-style:solid;border-width:medium;border-color:red;<b>border-radius:3px;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="border-style:solid;border-width:medium;border-color:green;<b>border-radius:5px;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="border-style:solid;border-width:medium;border-color:blue;<b>border-radius:10px;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="border-style:solid;border-width:medium;border-color:blue;<b>border-radius:20px;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	The results are:
</pre>
<div style="border-style:solid;border-width:medium;border-color:red;border-radius:3px;width:100px;">XXXXXXX</div><br/>
<div style="border-style:solid;border-width:medium;border-color:green;border-radius:5px;width:100px;">XXXXXXX</div><br/>
<div style="border-style:solid;border-width:medium;border-color:blue;border-radius:10px;width:100px;">XXXXXXX</div><br/>
<div style="border-style:solid;border-width:medium;border-color:blue;border-radius:20px;width:100px;">XXXXXXX</div><br/>

<h2>Shorthand</h2>
<pre>
	&lt;div style="<b>border:solid thin red;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border:dashed thin red;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border:solid thin red;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border:solid medium red;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border:solid thin red;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="<b>border:solid thin blue;</b>width:100px;"&gt;XXXXXXX&lt;/div&gt;
	The results are:
</pre>
<div style="border:solid thin red;border-radius:3px;width:100px;">XXXXXXX</div><br/>
<div style="border:dashed thin red;width:100px;">XXXXXXX</div><br/>

<div style="border:solid thin red;border-radius:3px;width:100px;">XXXXXXX</div><br/>
<div style="border:solid medium red;width:100px;">XXXXXXX</div><br/>

<div style="border:solid thin red;border-radius:3px;width:100px;">XXXXXXX</div><br/>
<div style="border:solid thin blue;width:100px;">XXXXXXX</div><br/>

<h1>display</h1>
<p>This CSS attribute controls how an element is displayed on the web page. Note that there are many other values that 
you can apply to this CSS attribute, than those detailed here. But those other values are really only suited for 
advanced web programmers. But you can read about all of the values by 
clicking <a href="https://www.w3schools.com/cssref/pr_class_display.php">here</a> if you wish.</p>
<p><b>DEFAULT VALUE FOR DIV &amp; DIV TYPE ELEMENTS: </b>"block"<br/>
<b>DEFAULT VALUE FOR SPAN &amp; SPAN TYPE ELEMENTS: </b>"inline"</p>
<h2>"block"</h2>
<pre>
	&lt;div style="background-color:blue;width:100px;height:100px;<b>display:block;</b>"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="background-color:green;width:100px;height:100px;<b>display:block;</b>"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="background-color:red;width:100px;height:100px;<b>display:block;</b>"&gt;XXXXXXX&lt;/div&gt;
	The results are:
</pre>
<div style="background-color:blue;width:100px;height:100px;display:block;">XXXXXXX</div>
<div style="background-color:green;width:100px;height:100px;display:block;">XXXXXXX</div>
<div style="background-color:red;width:100px;height:100px;display:block;">XXXXXXX</div>

<h2>"none"</h2>
<pre>
	&lt;div style="background-color:blue;width:100px;height:100px;display:block;"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="background-color:green;width:100px;height:100px;<b>display:none;</b>"&gt;XXXXXXX&lt;/div&gt;
	&lt;div style="background-color:red;width:100px;height:100px;display:block;"&gt;XXXXXXX&lt;/div&gt;
	The results are:
</pre>
<div style="background-color:blue;width:100px;height:100px;display:block;">XXXXXXX</div>
<div style="background-color:green;width:100px;height:100px;display:none;">XXXXXXX</div>
<div style="background-color:red;width:100px;height:100px;display:block;">XXXXXXX</div>

<p>Note, that if you specify "none" for the 'display' attribute, then the element disappears entirely from the web page. 
You can use this attribute to temporarily hide an element.</p>

<h2>"inline-block"</h2>
<pre>
&lt;div style="background-color:blue;width:100px;height:100px;<b>display:inline-block;</b>"&gt;XXXXXXX&lt;/div&gt;
&lt;div style="background-color:green;width:100px;height:100px;<b>display:inline-block;</b>"&gt;XXXXXXX&lt;/div&gt;
&lt;div style="background-color:red;width:100px;height:100px;<b>display:inline-block;</b>"&gt;XXXXXXX&lt;/div&gt;
	The results are:
</pre>
<div style="background-color:blue;width:100px;height:100px;display:inline-block;">XXXXXXX</div>
<div style="background-color:green;width:100px;height:100px;display:inline-block;">XXXXXXX</div>
<div style="background-color:red;width:100px;height:100px;display:inline-block;">XXXXXXX</div>

<h2>"inline"</h2>
<pre>
&lt;div style="background-color:blue;width:100px;height:100px;<b>display:inline;</b>"&gt;XXXXXXX&lt;/div&gt;
&lt;div style="background-color:green;width:100px;height:100px;<b>display:inline;</b>"&gt;XXXXXXX&lt;/div&gt;
&lt;div style="background-color:red;width:100px;height:100px;<b>display:inline;</b>"&gt;XXXXXXX&lt;/div&gt;
The results are:
</pre>
<div style="background-color:blue;width:100px;height:100px;display:inline;">XXXXXXX</div>
<div style="background-color:green;width:100px;height:100px;display:inline;">XXXXXXX</div>
<div style="background-color:red;width:100px;height:100px;display:inline;">XXXXXXX</div>

<p>Note, that if you specify that an element should be displayed 'inline' then you can no longer control its width and 
height. They are controlled exclusively by the elements' contents.</p>

<h1>Fonts</h1>
<h2>font-family</h2>
<p>There are several generic fonts that all web browsers are likely to have 'built in'. And you can read about them and 
the 'font-family' attribute by clicking <a href="https://www.w3schools.com/cssref/pr_font_font-family.php">here</a>.</p>

<p>However there are thousands of web fonts available from Google. Click <a href="https://fonts.google.com/">here</a> 
to browse through some of them. Each one provides you with the HTML code that you need to paste into your HTML web page 
in order to use them.</p>

<pre>
&lt;p style="<b>font-family:Arial, Helvetica, sans-serif</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-family:'Courier New', Courier, monospace</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-family:Georgia, 'Times New Roman', Times, serif</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif</b>"&gt;Hello World&lt;/p&gt;
And here are the results:
</pre>

<p style="font-family:Arial, Helvetica, sans-serif">Hello World</p>
<p style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Hello World</p>
<p style="font-family:'Courier New', Courier, monospace">Hello World</p>
<p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Hello World</p>
<p style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Hello World</p>
<p style="font-family:Georgia, 'Times New Roman', Times, serif">Hello World</p>
<p style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Hello World</p>
<p style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Hello World</p>

<h2>font-weight</h2>
<p>This attribute controls how thick the text appears. You can read more about it by clicking 
<a href="https://www.w3schools.com/cssref/pr_font_weight.php">here</a>.</p>
<pre>
&lt;p style="<b>font-weight:normal</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-weight:bold</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-weight:100</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-weight:200</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-weight:300</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-weight:400</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-weight:500</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-weight:600</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-weight:700</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-weight:800</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-weight:900</b>"&gt;Hello World&lt;/p&gt;
And here are the results:
</pre>
<p style="font-weight:normal">Hello World</p>
<p style="font-weight:bold">Hello World</p>
<p style="font-weight:100">Hello World</p>
<p style="font-weight:200">Hello World</p>
<p style="font-weight:300">Hello World</p>
<p style="font-weight:400">Hello World</p>
<p style="font-weight:800">Hello World</p>
<p style="font-weight:600">Hello World</p>
<p style="font-weight:700">Hello World</p>
<p style="font-weight:800">Hello World</p>
<p style="font-weight:900">Hello World</p>

<h2>font-style</h2>
<p>This attribute controls the font style, e.g. nornal of italic. You can read more about it by clicking 
<a href="https://www.w3schools.com/cssref/pr_font_font-style.php">here</a>.</p>
<pre>
&lt;p style="<b>font-style:normal</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-style:italic</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-style:oblique</b>"&gt;Hello World&lt;/p&gt;
And here are the results:
</pre>
<p style="font-style:normal">Hello World</p>
<p style="font-style:italic">Hello World</p>
<p style="font-style:oblique">Hello World</p>

<h2>font-size</h2>
<p>This attribute controls the font size. You can read more about it by clicking 
<a href="https://www.w3schools.com/cssref/pr_font_font-size.php">here</a>.</p>
<pre>
&lt;p style="<b>font-size:xx-small;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-size:x-small;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-size:small;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-size:medium;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-size:large;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-size:x-large;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-size:xx-large;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-size:40px;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>font-size:60px;</b>"&gt;Hello World&lt;/p&gt;
And here are the results:
</pre>
<p style="font-size:xx-small;">Hello World</p>
<p style="font-size:x-small;">Hello World</p>
<p style="font-size:small;">Hello World</p>
<p style="font-size:medium;">Hello World</p>
<p style="font-size:large;">Hello World</p>
<p style="font-size:x-large;">Hello World</p>
<p style="font-size:xx-large;">Hello World</p>
<p style="font-size:40px;">Hello World</p>
<p style="font-size:60px;">Hello World</p>

<h2>color</h2>
<p>This attribute sets the text color for any HTML element. You can read more about it <a href="https://www.w3schools.com/css/css_text.asp">here</a>.</p>
<pre>
&lt;p style="<b>color:red;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>color:green;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>color:blue;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>color:cyan"</b>;&gt;Hello World&lt;/p&gt;
&lt;p style="<b>color:magenta;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>color:yellow;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>color:black;</b>"&gt;Hello World&lt;/p&gt;
&lt;p style="<b>color:grey;</b>"&gt;Hello World&lt;/p&gt;
And here are the results:
</pre>
<p style="color:red;">Hello World</p>
<p style="color:green;">Hello World</p>
<p style="color:blue;">Hello World</p>
<p style="color:cyan;">Hello World</p>
<p style="color:magenta;">Hello World</p>
<p style="color:yellow;">Hello World</p>
<p style="color:black;">Hello World</p>
<p style="color:grey;">Hello World</p>

<h2>position, left &amp; top</h2>
<p>These attributes are typically used in together to modify the position of an element on the screen. You can read more 
about this attribute by clicking <a href="https://www.w3schools.com/cssref/pr_class_position.php">here</a>. The allowed 
values are thus:</p>

<h3>static</h3>
<p>If you specify this value then any 'top' and 'left' attributes you specify will be ignored. Click 
<a href="https://www.w3schools.com/cssref/playit.php?filename=playcss_position&preval=static">here</a> to see an example.</p>

<h3>fixed</h3>
<p>If you specify this value then any 'top' and 'left' attributes you specify will be relative to the web browser window. 
Click 
<a href="https://www.w3schools.com/cssref/playit.php?filename=playcss_position&preval=static">here</a> to see an example.</p>

<h3>absolute</h3>
<p>If you specify this value then any 'top' and 'left' attributes you specify will be relative to the element's parent 
position. Click 
<a href="https://www.w3schools.com/cssref/playit.php?filename=playcss_position&preval=static">here</a> to see an example.</p>

<h3>Sticky</h3>
<p>If you specify this value then any 'top' and 'left' attributes you specify will be relative to the user's scroll 
position. Click <a href="https://www.w3schools.com/cssref/tryit.php?filename=trycss_position_sticky">here</a> to see an example.</p>

<h3>relative</h3>
<p>If you specify this value then you can specify either negative values for 'top' and 'left', which move the element up and to 
the left from its default position. Or positive values, which move the element down and to the right from its default 
position. Here is and example.</p>

<p>
	No change in default position of the second div.<br/>
	&lt;div style="background-color:green;width:100px;height:100px;"&gt;XXXXXX&lt;/div&gt;<br/>
	&lt;div style="background-color:blue;width:100px;height:100px;<b>position:relative;top:0px;left:0px;</b>"&gt;XXXXXX&lt;/div&gt;
</p>
<div style="background-color:green;width:100px;height:100px;">XXXXXX</div>
<div style="background-color:blue;width:100px;height:100px;position:relative;top:0px;left:0px;">XXXXXX</div>

<p>
	The second div is moved up and to the left by 20 pixels.<br/>
	&lt;div style="background-color:green;width:100px;height:100px;"&gt;XXXXXX&lt;/div&gt;<br/>
	&lt;div style="background-color:blue;width:100px;height:100px;<b>position:relative;top:-20px;left:-20px;</b>"&gt;XXXXXX&lt;/div&gt;
</p>
<div style="background-color:green;width:100px;height:100px;">XXXXXX</div>
<div style="background-color:blue;width:100px;height:100px;position:relative;top:-20px;left:-20px;">XXXXXX</div>

<p>
	The second div is moved down and to the right by 20 pixels.<br/>
	&lt;div style="background-color:green;width:100px;height:100px;"&gt;XXXXXX&lt;/div&gt;<br/>
	&lt;div style="background-color:blue;width:100px;height:100px;<b>position:relative;top:20px;left:20px;</b>"&gt;XXXXXX&lt;/div&gt;
</p>
<div style="background-color:green;width:100px;height:100px;">XXXXXX</div>
<div style="background-color:blue;width:100px;height:100px;position:relative;top:20px;left:20px;">XXXXXX</div>

<h1>Alignment</h1>

<h2>text-align</h2>
<p><b>DEFAULT VALUE: </b>"left"</p>

<pre>
&lt;div style="background-color:blue;color:white;margin:5px;width:200px;height:100px;"&gt;XXXXXX&lt;/div&gt;
&lt;div style="background-color:blue;color:white;margin:5px;width:200px;height:100px;<b>text-align:left;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="background-color:blue;color:white;margin:5px;width:200px;height:100px;<b>text-align:center;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="background-color:blue;color:white;margin:5px;width:200px;height:100px;<b>text-align:right;</b>"&gt;XXXXXX&lt;/div&gt;
</pre>
<div style="background-color:blue;color:white;margin:5px;width:200px;height:100px;">XXXXXX</div>
<div style="background-color:blue;color:white;margin:5px;width:200px;height:100px;text-align:left;">XXXXXX</div>
<div style="background-color:blue;color:white;margin:5px;width:200px;height:100px;text-align:center;">XXXXXX</div>
<div style="background-color:blue;color:white;margin:5px;width:200px;height:100px;text-align:right;">XXXXXX</div>

<h2>vertical-align</h2>
<p><b>DEFAULT VALUE: </b>"middle"</p>

<p>If you are trying to align plain text inside a div, as in the example below, then you must also specify a value for 
the 'height' attribute greater than the height of the text. Otherwise 'vertical-align' will have no effect on the text. 
In this example the 'height' is 100 pixels.</p>
<p>The 'verical-align' attribute has no effect at all on 'block' elements such as &lt;div&gt;. For 'inline-block' 
elements it controls the vertical alignment of the block itself, while text inside is unaffected. So I have used a table 
to demonstrate its effect. I know - it is confusing but CSS can be like hearding cats sometimes.</p>
<pre>
&lt;table border="1" cellpadding="0" cellspacing="0"&gt;
	&lt;tr&gt;
		&lt;td style="color:blue;"&gt;XXXX&lt;/td&gt;
		&lt;td style="color:blue;vertical-align:top;height:100px;"&gt;XXXX&lt;/td&gt;
		&lt;td style="color:blue;vertical-align:middle;height:100px;"&gt;XXXX&lt;/td&gt;
		&lt;td style="color:blue;vertical-align:bottom;height:100px;"&gt;XXXX&lt;/td&gt;
	&lt;/tr&gt;
&lt;/table&gt;
</pre>
<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td style="color:blue;">XXXX</td>
		<td style="color:blue;vertical-align:top;height:100px;">XXXX</td>
		<td style="color:blue;vertical-align:middle;height:100px;">XXXX</td>
		<td style="color:blue;vertical-align:bottom;height:100px;">XXXX</td>
	</tr>
</table>

<p>To force text to align inside block and inline-block elements you have to use other methods:</p>
<ul>
	<li>Insert one or more &lt;br/&gt; elements before the text.</li>
	<li>place your text inside a one line and one column table and use the 'vertical-align' property on the tabel cell.</li>
</ul>

<p>These examples represent simplest cases of using 'vertical-align', however there are other values you can use for this 
attribute. They are concerned with how text arranges itself vetically in relation to, for example, images in the middle 
of the text. You can read all about it and see other examples of its use by clicking 
<a href="https://www.w3schools.com/cssref/pr_pos_vertical-align.php">here</a>.</p>

<h1>Margins &amp; Padding</h1>

<p>Margins are the spacing between a given HTML element and those above and below, and those to the left and to the right. 
Padding is the space between the 4 margins of the HTML element and any of is contents. </p>

<p><b>DEFAULT FOR MARGINS: </b>0px(pixels).</p>
<p><b>DEFAULT FOR PADDING: </b>0px(pixels).</p>

<p>You can read more about margins by clicking <a href="https://www.w3schools.com/cssref/pr_margin.php">here</a> and 
more about padding by clicking <a href="https://www.w3schools.com/cssref/pr_padding.php">here</a>.</p>

<p>You can specify both padding and margins in 3 different ways:</p>
<ul>
	<li>SHORTHAND:<br/>
		<pre>
 margin: 10px;
 padding:10px;<br/>

 This way sets left, right, top &amp; bottom margins and left, right, top &amp; bottom padding via a single value, 
 in this case 10px(pixels).
		</pre>
	</li>
	<li>LONG HAND:<br/>
		<pre>
 margin: 10px 10px 1
 padding:10px 10px
 margin: 10px 10px 10px
 padding:10px 10px 10px
 margin: 10px 10px 10px 10px;
 padding:10px 10px 10px 10px;<br/>
 
 This way sets left, right, top &amp; bottom margins and left, right, top &amp; bottom padding via 2 to 4 values, 
 in this case 10px(pixels). The order of the individual padding and margins is as follows:<br/><br/>
 padding: top right bottom left;<br/>
 margin: top right bottom left;
		</pre>
	</li>
	<li>
		INDIDUALLY:<br/>
		<pre>
 margin-left: 10px;
 margin-right: 10px;
 margin-top: 10px;
 margin-bottom: 10px;<br/>

 And...<br/>

 padding-left: 10px;
 padding-right: 10px;
 padding-top: 10px;
 padding-bottom: 10px;
</pre>
	</li>
</ul>
<h2>No margins or padding</h2>

<pre>
&lt;div style="display:inline-block;background-color:blue;color:white;width:200px;height:100px;"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:green;color:white;width:200px;height:100px;"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:red;color:white;width:200px;height:100px;"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:cyan;color:white;width:200px;height:100px;"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:purple;color:white;width:200px;height:100px;"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:magenta;color:white;width:200px;height:100px;"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:yellow;color:white;width:200px;height:100px;"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:navy;color:white;width:200px;height:100px;"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:maroon;color:white;width:200px;height:100px;"&gt;XXXXXX&lt;/div&gt;
</pre>
<div style="display:inline-block;background-color:blue;color:white;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:green;color:white;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:red;color:white;width:200px;height:100px;">XXXXXX</div><br/>
<div style="display:inline-block;background-color:cyan;color:white;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:purple;color:white;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:magenta;color:white;width:200px;height:100px;">XXXXXX</div><br/>
<div style="display:inline-block;background-color:yellow;color:white;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:navy;color:white;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:maroon;color:white;width:200px;height:100px;">XXXXXX</div>

<h2>Margins at 40 pixels and no padding</h2>
<pre>
&lt;div style="display:inline-block;background-color:blue;color:white;width:200px;height:100px;<b>margin:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:green;color:white;width:200px;height:100px;<b>margin:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:red;color:white;width:200px;height:100px;<b>margin:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:cyan;color:white;width:200px;height:100px;<b>margin:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:purple;color:white;width:200px;height:100px;<b>margin:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:magenta;color:white;width:200px;height:100px;<b>margin:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:yellow;color:white;width:200px;height:100px;<b>margin:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:navy;color:white;width:200px;height:100px;<b>margin:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:maroon;color:white;width:200px;height:100px;<b>margin:40px;</b>"&gt;XXXXXX&lt;/div&gt;
</pre>
<div style="display:inline-block;background-color:blue;color:white;margin:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:green;color:white;margin:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:red;color:white;margin:40px;width:200px;height:100px;">XXXXXX</div><br/>
<div style="display:inline-block;background-color:cyan;color:white;margin:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:purple;color:white;margin:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:magenta;color:white;margin:40px;width:200px;height:100px;">XXXXXX</div><br/>
<div style="display:inline-block;background-color:yellow;color:white;margin:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:navy;color:white;margin:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:maroon;color:white;margin:40px;width:200px;height:100px;">XXXXXX</div>

<h2>Padding at 40 pixels and no margins</h2>
<pre>
&lt;div style="display:inline-block;background-color:blue;color:white;width:200px;height:100px;<b>padding:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:green;color:white;width:200px;height:100px;<b>padding:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:red;color:white;width:200px;height:100px;<b>padding:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:cyan;color:white;width:200px;height:100px;<b>padding:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:purple;color:white;width:200px;height:100px;<b>padding:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:magenta;color:white;width:200px;height:100px;<b>padding:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:yellow;color:white;width:200px;height:100px;<b>padding:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:navy;color:white;width:200px;height:100px;<b>padding:40px;</b>"&gt;XXXXXX&lt;/div&gt;
&lt;div style="display:inline-block;background-color:maroon;color:white;width:200px;height:100px;<b>padding:40px;</b>"&gt;XXXXXX&lt;/div&gt;
</pre>
<div style="display:inline-block;background-color:blue;color:white;padding:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:green;color:white;padding:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:red;color:white;padding:40px;width:200px;height:100px;">XXXXXX</div><br/>
<div style="display:inline-block;background-color:cyan;color:white;padding:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:purple;color:white;padding:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:magenta;color:white;padding:40px;width:200px;height:100px;">XXXXXX</div><br/>
<div style="display:inline-block;background-color:yellow;color:white;padding:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:navy;color:white;padding:40px;width:200px;height:100px;">XXXXXX</div>
<div style="display:inline-block;background-color:maroon;color:white;padding:40px;width:200px;height:100px;">XXXXXX</div>
<p>Note how the divs have been enlarged in order to accomodate the internal padding along all sides.</p>

<h1>Overflow</h1>

<p>Another important CSS attribute is 'overflow'. Or in other words, what happens to the contents of a HTML element if 
it does not fit within the boundaries of the element. You can read more about this CSS attribute by clicking <a href="">here</a>.</p>

<p><b>DEFAULT: </b>visible.</p>

<h2>overflow: visible;</h2>
<pre>
&lt;div style="display:block;background-color:black;color:white;width:400px;height:100px;<b>overflow:visible;</b>"&gt;<br/>
		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
		dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen 
		book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially 
		unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
		recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br/>
&lt;/div&gt;
</pre>
<div style="display:block;background-color:blue;color:black;width:400px;height:100px;overflow:visible;">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen 
book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially 
unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<h2>overflow: hidden;</h2>
<pre>
&lt;div style="display:block;background-color:blue;color:black;width:400px;height:100px;<b>overflow:hidden;</b>"&gt;<br/>
		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
		dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen 
		book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially 
		unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
		recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
&lt;/div&gt;
</pre>
<div style="display:block;background-color:blue;color:black;width:400px;height:100px;overflow:hidden;">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen 
book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially 
unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</div>

<h2>overflow: scroll;</h2>
<pre>
	&lt;div style="display:block;background-color:blue;color:black;width:400px;height:100px;<b>overflow:scroll;</b>"&gt;
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
			dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen 
			book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially 
			unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
	recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
&lt;/div&gt;
</pre>
<div style="display:block;background-color:blue;color:black;width:400px;height:100px;overflow:scroll;">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen 
book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially 
unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</div>

<h2>overflow: auto;</h2>
<pre>
&lt;div style="display:block;background-color:blue;color:black;width:400px;height:100px;<b>overflow:auto;</b>"&gt;
		Lorem Ipsum is simply dummy text
&lt;/div&gt;
</pre>

<div style="display:block;background-color:blue;color:black;width:400px;height:100px;overflow:auto;">
Lorem Ipsum is simply dummy text
</div>

<pre>
&lt;div style="display:block;background-color:blue;color:black;width:400px;height:100px;<b>overflow:auto;</b>"&gt;<br/>
		Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
		dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen 
		book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially 
		unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
		recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
&lt;/div&gt;
</pre>

<div>&nbsp;</div>

<div style="display:block;background-color:blue;color:black;width:400px;height:100px;overflow:auto;">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen 
book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially 
unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more 
recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</div>

Notice that, 'overflow' set on 'auto' the HTML element shows the scroll bar(s) only if the size of content exceeds the 
size of HTML element.

<h1>Action selectors</h1>
<p>These are also reffered to as 'pseudo-classes'. Don't concern yourself with what that term means, just be aware that 
it is used interchangeably with 'action selectors'. There are MANY 'action selectors' and you can read all about them 
by clicking <a href="https://www.w3schools.com/cssref/css_ref_pseudo_classes.php">here</a>. But the most frequently used 
on is the 'hover' selector. I.E. When the mouse cursor hovers within the boundaries of a HTML element. Let's explore
some examples of its use.</p>

<h2>Change background color on mouse cursor hover</h2>
<p>In this example the div element will change its back ground color when the mouse cursor hovers over the top of it.</p>
<h3>HTML</h3>
<p>&lt;div class="div2"&gt;XXXXX&lt;div"&gt;</p>

<h3>CSS between the style tags &lt;style&gt;...&lt;/style&gt;</h3>
<pre>
&lt;style&gt;
.div2
{
	background-color: navy;
	color: white;
	font-weight: bold;
}
.div2:hover
{
	background-color: blue;
	color: white;
	font-weight: bold;
}
&lt;/style&gt;
</pre>

<div class="div2">XXXXXXXXX</div>

<h2>Make an element disappear on mouse cursor hover</h2>
<p>In this example the div element will disappear when the mouse cursor hovers over the top of it.</p>
<pre>
<b>HTML code</b>
&lt;div class="div3"&gt;XXXXX&lt;div"&gt;

<b>CSS between the style tags</b>
&lt;style&gt;
	.div3
	{
	    background-color: navy;
	    color: white;
	    font-weight: bold;
	}
	.div3:hover
	{
	   /* This is a CSS comment and only HTML elements with class="div3" will disappear if the mouse cursor hovers over them. */
	   visabilty: hidden;
	}
&lt;/style&gt;
</pre>

<div class="div3">XXXXXXXXX</div>

<h2>Change the mouse cursor on hover</h2>
<p>In this example the mouse cursor changes when it hovers over the top of the div.</p>
<pre>
<b>HTML code</b>
&lt;div class="div4"&gt;XXXXX&lt;div"&gt;

<b>CSS between the style tags.</b>
&lt;style&gt;
.div4
{
	background-color: navy;
	color: white;
	font-weight: bold;
}
.div4:hover
{
   /* This is a CSS comment and the cursor will only change if the mouse cursor hovers over HTML 
      elements with class="div4". */
   cursor: crosshairs;
}
&lt;/style&gt;
</pre>

<div class="div4">XXXXXXXXX</div>

<p>The hover action selector can also be applied to:</p>
<ul>
	<li>'id' selectors, e.g. #div_name:hover (all elements with an id value of "div_name").</li>
	<li> 'tag' selectors, e.g. p:hover (all p or paragraph elements).</li>
</ul>

<h1>Further learning</h1>

<p>There are hundreds more CSS attributes than you can experiment with, and see what they do. Some attributes work on 
particular types of HTML elements but have no effect on others. The best way to learn about them is to experiment. You 
can learn about them through the <a href="https://www.w3schools.com/css/default.asp">CSS reference</a> at W3 Schools. It 
includes a bunch of tutorials you can work your way through. And plenty of 'try it yourself' spaces where you can 
experiment with different values for each CSS attribute and see exactly how they effect the way the HTML appears in a 
web browser.</p>

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
	
</html>
<!-- #BeginEditable "End" -->

<?php DoShowMessage(); ?>

<!-- #EndEditable -->

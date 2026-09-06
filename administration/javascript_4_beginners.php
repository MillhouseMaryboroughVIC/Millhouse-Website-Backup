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
		<title>JavaScript for Beginners</title>
			
		<style type="text/css">






































































































































































			.truth_table,
			.not_table
			{
				table-layout: fixed;
			}
			.truth_table
			{
				max-width: 330px;
				width: 330px;
			}
			.not_table
			{
				max-width: 180px;
				width: 180px;
			}
			.table
			{
				display: table;
				table-layout: fixed;
				width: 100%;
			}
			.variable_table
			{
				display: table;
				table-layout: fixed;
				width: 160px;
				max-width: 160px;
				margin-top: 0px;
				margin-bottom: 0px;
			}
			.maths_table
			{
				display: table;
				table-layout: fixed;
				width: 100%;
				max-width: 100%;
				margin-top: 0px;
				margin-bottom: 0px;
				text-align: left;
			}
			.table td,
			.table td,
			.table th,
			.truth_table td,
			.truth_table th,
			.not_table td,
			.not_table th
			{
				white-space: nowrap;
				text-align: center;
				font-size: small;
			}
			.table td b,
			.table td b,
			.table th b,
			.truth_table td b,
			.truth_table th b,
			.not_table td b,
			.not_table th b
			{
				font-size: small;
			}
			.table td,
			.table th
			{
				overflow: auto;
			}
			.table td,
			.maths_table td
			{
				text-align: left;
			}
			.table th,
			.truth_table th,
			.not_table th
			{
				font-weight: bold;
				background-color: silver;
			}
			.table span
			{
				font-weight: normal;
			}
			.truth_table th,
			.truth_table td
			{
				width: 90px;
			}
			.not_table th,
			.not_table td
			{
				width: 70px;
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
									<img src="../images/LoudSpeaker.png" alt="LoudSpeaker.png" height="70" aria-label="Show the voice assist settings." /></button></form>

								<!-- #BeginEditable "CustomContent" -->

<h1>Intoduction</h1>
<p>JavaScript is the programming language of the web, and is supported by all major web browsers. It can calculate, 
manipulate and validate data. And it can change both HTML and CSS, and in so doing, generate dynamic HTML content that 
is responsive to user input The syntax rules and constructs of JavaScript very closely resemble those of the programming 
language C, with minor differences.</p>

<p>This is not intended as a comprehensive tutorial on JavaScript. Rather the intention is to give you a general feel 
of the language, and detail some of its constructs. More comprehensive JavaScript tutorials are available here:</p>
<ul>
	<li>Tutroials for raw beginners, click <a href="https://learning.kidzcancode.com/course/learning-javascript-with-codeguppy/">here</a></li>
	<li>Tutorials for those with some programming knowledge, click <a href="https://www.w3schools.com/js/">here</a>.</li>
</ul>

<h1>What is programming language?</h1>
<p>A programming language occupies a niche some where between plain English and binary computer language that consists 
only of 1's and 0's. Higher level programming languages, like C and JavaScript, are closer to the English end of the 
spectrum. While assmebly language is much closer to binary computer language.</p>

<p>In the case of programming languages like C, your program must be compiled and linked into a '.exe' or executable file. 
These contain binary computer language instructions that allow the computer CPU to 'implement' your program. In the case  of 
script language like JavaScript, your program remains permanently as human readable text, and the web browser converts it, 
one line at a time, to binary computer language. And passes each set of instrictions, in turn, onto the CPU to carry out and 'implement' your 
program.</p>

<h1>Reserved words</h1>
<p>
	In JavaScript you cannot use these reserved words as variables, labels, or function names. Now this rule is VERY 
	literal! The following function declaration will cause a JavaScript syntax error in a web browser:
</p>
<pre>
	function if(arg1, arg2){...};
	
	However any of these function declarations are perfectly legal in JavaScript:
	
	function i_f(arg1, arg2){...};
	function _if(arg1, arg2){...};
	function if_(arg1, arg2){...};
	function If(arg1, arg2){...};
	function iF(arg1, arg2){...};
	function IF(arg1, arg2){...};
</pre>
<table border="0" cellspacing="0" cellpadding="10">
	<tr>
		<td>abstract</td>
		<td>arguments</td>
		<td>async</td>
		<td>await</td>
		<td>boolean</td>
		<td>break</td>
	</tr>
	<tr>
		<td>byte</td>
		<td>case</td>
		<td>catch</td>
		<td>char</td>
		<td>class</td>
		<td>const</td>
	</tr>
	<tr>
		<td>continue</td>
		<td>debugger</td>
		<td>default</td>
		<td>delete</td>
		<td>do</td>
		<td>double</td>
	</tr>
	<tr>
		<td>else</td>
		<td>enum</td>
		<td>eval</td>
		<td>export</td>
		<td>extends</td>
		<td>false</td>
	</tr>
	<tr>
		<td>final</td>
		<td>finally</td>
		<td>float</td>
		<td>for</td>
		<td>function</td>
		<td>goto</td>
	</tr>
	<tr>
		<td>if</td>
		<td>implements</td>
		<td>function</td>
		<td>import</td>
		<td>in</td>
		<td>instanceof</td>
	</tr>
	<tr>
		<td>int</td>
		<td>interface</td>
		<td>let</td>
		<td>long</td>
		<td>native</td>
		<td>new</td>
	</tr>
	<tr>
		<td>null</td>
		<td>package</td>
		<td>private</td>
		<td>protected</td>
		<td>public</td>
		<td>return</td>
	</tr>
	<tr>
		<td>short</td>
		<td>static</td>
		<td>super</td>
		<td>switch</td>
		<td>synchronized</td>
		<td>this</td>
	</tr>
	<tr>
		<td>throw</td>
		<td>throws</td>
		<td>transient</td>
		<td>true</td>
		<td>try</td>
		<td>typeof</td>
	</tr>
	<tr>
		<td>using</td>
		<td>var</td>
		<td>void</td>
		<td>volatile</td>
		<td>while</td>
		<td>with</td>
	</tr>
	<tr>
		<td>yield</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>

<h1>Data types</h1>
<p>JavaScript has the following data types:</p>

<table class="table" border="1" cellpadding="5" cellspacing="0">
	<tr>
		<th style="width:100px;">Type</th>
		<th style="width:290px;">Description</th>
		<th>Examples</th>
		<th>Using typeof</th>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_numbers.asp">number</a></td>
		<td>A whole number or a decimal number.<br/><br/>
			<b>Maximum integer: </b>9007199254740991<br/>or Number.MAX_SAFE_INTEGER<br/><br/>
			<b>Minumum integer: </b>-9007199254740991<br/>or Number.MIN_SAFE_INTEGER<br/><br/>
			<b>Maximum decimal number: <br/></b>1.7976931348623157e+308<br/>or Number.MAX_VALUE<br/><br/>
			<b>Minimum decimal number: <br/></b>5e-324 or Number.MIN_VALUE<br/><br/>
			These are in scientific notation,<br/>e.g. 1.7976931348623157e+308 means<br/>1.7976931348623157 x 10<sup>308</sup>
		</td>
		<td>10, -1, 1257, -385, 3.142, -3.142</td>
		<td>
			typeof x &amp; typeof(x) returns number
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_bigint.asp">Bigint</a></td>
		<td>A large integer exceeding<br/>9007199254740991</td>
		<td>12345678901234567890 or BigInt</td>
		<td>
			typeof x &amp; typeof(x) returns Bigint
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_booleans.asp">boolean</a></td>
		<td>A data type representing true or false</td>
		<td>Either literal value true or false</td>
		<td>
			typeof x &amp; typeof(x) returns boolean
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/typescript/typescript_null.php">Undefined</a></td>
		<td>A variable with no assigned value</td>
		<td>
			let x; /* x has no defined value. */<br/>
			let x - 10; /* x has a defined value of 10. */
		</td>
		<td class="table_cell_small_text">
			typeof x &amp; typeof(x) returns undefined
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/html/html_symbols.asp">Symbol</a></td>
		<td>Characters not on your keyboard,<br/>e.g. the British pound symbol, and emojies.</td>
		<td>COPYRIGHT / &copy;: &amp;#169; or &amp;copy</td>
		<td class="table_cell_small_text">
			typeof x &amp; typeof(x) returns symbol
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js//js_arrays.asp">Array</a></td>
		<td>You can think of these like a row of office pigeon holes for mail.</td>
		<td>
			let arrayInts = {2, 45, 23, 56, 32};
			document.write("Array element 2 contains " + arrayInts[1]); // Outputs the string "Array element 2 contains 24"<br/>
			
			let arrayInts = {2, "Helo world, true, 3.142, false};
			document.write("Array element 2 contains " + arrayInts[1]); // Outputs the string "Array element 2 contains Hello world"		</td>
		<td class="table_cell_small_text">
			typeof x &amp; typeof(x) returns Array
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_objects.asp">Object</a></td>
		<td>A collection of key-value pairs of data.</td>
		<td>
			This is a very simple example of an object:<br/><br/>
			let objectMap = {firstName:"John", lastName:"Doe", age:50, eyeColor:"blue"};
			In programming it is also called a map, and you access its contents like this:<br/><br/>
			objectMap.firstName /* Contains the string "John" */<br/>
			objectMap["firstName"] /* Contains the string "John" */<br/>
			objectMap.age /* Contains the integer 50 */<br/>
			objectMap["age"] /* Contains the integer 50 */<br/><br/>
			Objects can be huge nested data structures, for example, we could add another value pair to the above example:<br/><br/>
			let objectMap = {firstName:"John", lastName:"Doe", age:50, eyeColor:"blue", education:{.......}};
			Where 'education' is itself an object listing all the qualifications that John has.
		</td>
		<td class="table_cell_small_text">
			typeof x &amp; typeof(x) returns object
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/typescript/typescript_null.php">Null</a></td>
		<td>A value representing object absence</td>
		<td></td>
		<td class="table_cell_small_text">
			typeof x &amp; typeof(x) returns null
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_strings.asp">String</a></td>
		<td>A string of characters or text.<br/>You can enclose a string in either double<br/>quotes " or single quotes '.</td>
		<td>
			"Hello world" or 'Hello world'<br/><br/>
			You can also nest a string within a string by doing this:<br/><br/>
			"Hello 'XXXXX' world"
			or<br/>
			"Hello \"XXXXX\" world"
			or<br/>
			'Hello \'XXXXX\' world'<br/><br/>
			It might seem weird but the necessity to nest strings within strings does crop up.
		</td>
		<td class="table_cell_small_text">
			typeof x &amp; typeof(x) returns string
		</td>
	</tr>
</table>

<h1>Literal values</h1>

<p>We have seen some examples of literal values in the previous section.</p>

<p>E.G. <b>"Hello world"</b>, <b>10</b>, <b>3.142</b>, <b>true</b> and <b>false</b>.</p>


<h1>Variables explained</h1>
<p>	
	Another programming construct that needs to be explained is a 
	'variable'. You have come across this concept before when studying algebra in high school maths class, with linear 
	equations, e.g. y = 3x + 5. Choose a value for x and you can calculate a value for y, e.g. if x = 2 then 
	y = 2 * 2 + 5 = 9. The letter x is a variable and it is a place holder for some numeric value. You can think of it 
	as an empty box into which you can place a numeric value written down on a piece of paper.<br/>
	<img src="images/JavascriptVariable.jpg" alt="JavascriptVariable.jpg" width="200" /><br/>
	Assign a new value to a variable:<br/>
	<img src="images/JavascriptVariableNewValue.jpg" alt="JavascriptVariableNewValue.jpg" width="275" />
</p>
<p>
	In reality a variable is a small chunk of the computer RAM or Random Access Memory. RAM as accessed via an integer 
	address, e.g. memory slot number 1038465843. But it would be rather inconvenient to have to use variables something 
	like this:<br/>
	let '1038465843' = 20.
</p>
<p>
	Instead programing languages store '1038465843' against a variable name, nStudentNumber for example. It is so 
	much easier to remember 'nStudentNumber', in your code, than '1038465843';
</p>
<p> 
	In JavaScript you must 'declare' your variables before you can use them else where, otherwise the web browser will 
	raise a syntax erroralong the lines of 'variable was not declared'. They keyword 'let' and 'var' are used for this 
	purpose, e.g.<br/><br/>
	let x;
	var y;
</p>
<p>The 'var' keyword creates a 'God' variable that is said to have 'global' scope. You can use that variable ANYWHERE 
throughout your code and it does not matter where you declared it. The 'let' keyword on the other hand creates a limited  
variable that is said to have local scope. For example, if you creata a local variable with 'let' inside a function then 
you can only use that variable inside your function and no where else in your code. It is best practice to use 'let' 
most of the time and keep the use of 'var' to an absolute minimum, or preferably avoid uisng it at all.</p>

<p>
	You can decalre multiple variables with the same let or var statements like this:<br/><br/>
	let x, y, z;
	var x, y, z;
	In this case the value of all these variables is undefined until you explicitly put a value in them. Alternatively 
	you can initialise your variables to a known value, at the same time as declaring them, like this:<br/><br/>
	let x = 0, y = true, z = "Hello world;
	var x = 3.142, y = null, z = false;
</p>

<p>
	One other thing that is important to note is that JavaScript is not a 'typed' language - you do not declare your 
	variables with a data type. And you can do all of the following without generating any JavaScript errors.<br/><br/>
	let x = 0;
	x = "Hellow world";
	x = true;
	x = 3.142;
</p>

<p>
	The programming language 'C' is very different - it is a strictly typed language when you declare variables you must 
	specifiy their data type:<br/><br/>
	int x = 0;
	All of these assignments are 'legal':<br/><br/>
	x = 20;
	x = 101;
	x = -230;
	But any of these assignments are 'illegal' and will cause a compile error, because they are not integer values:<br/><br/>
	x = true;
	x = "Hello world";
	x = 3.142;
</p>

<h1>Statements</h1>	

<p>	In JavaScript the semi-colon (;) is like the full stop (.) in English. All JavaScript statements must end with a ; 
	or else you will get a JavaScript error. Here are some examples of statements:<br/><br/>
	let x = 10;
	x = 100;
	x += 1;
	This whole if/else construct is a compound statment:<br/>
	if (x == 10) /*then*/<br/>
			document.write("x is equal to 10!");
	else<br/>
			document.write("x is not equal to 10!");
	So is this while construct:<br/><br/>
	while (x &lt; 10)<br/>
			x = x + 1;
	The while loop statement ends at the semi colon.
</p>
<p>You can read more about JavaScript statements by clicking <a href="https://www.w3schools.com/js/js_statements.asp">here</a>.</p>

<h1>Expressions</h1>
<p>
	Expressions are used as part of statements. Here are some examples:<br/><br/>
	let x = 10;
	if (x == 10) /*then*/<br/>
			document.write("x is equal to 10!");
	else<br/>
			document.write("x is not equal to 10!");
	x = x + 1;
	(x == 10) is an expression that is testing the value of x against 10. If x contains 10 then (x == 10) evaluates to true. 
	If not then it evaluates to false. Similarly x + 1 is an expression that evaluates to 2 - x contains 1, we add 1 to 1 
	and we get 2 and then the value 2 is put back into x. If we repeat this statement (x = x + 1;) then x will contain x + 1 
	= 2 + 1 = 3
</p>
<p>
	If you put an epxression in your code like this:<br/><br/>
	let x = 0;
	x + 1;
	Then the expression x + 1 is 'hanging'. It will get evaluated but the result (1) will disappear into thin air, so to 
	speak, and have no effect what so ever on your web page. It must be part of a complete statement, as in the previous 
	examples, to be of any use to you web page.
</p>

<p>You can read more about JavaScript expressions by clicking <a href="https://www.w3schools.com/js/js_syntax.asp#:~:text=JavaScript%20Expressions">here</a>.</p>

<h1>Operators</h1>
<h2>Assignment operators</h2>
<table class="table" border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th style="width:60px;">Operator</th>
		<th style="width:220px;">Name</th>
		<th style="width:100px;">Example</th>
		<th>Results</th>
	</tr>
	<tr>
		<td>=</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_assign_simple.asp">Simple assign</a></td>
		<td>let x = 5;<br/>x = 10;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>= 5</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>5</td>
				</tr>
			</table>
			<br/>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>5</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>= 10</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>10</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>+=</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_assign_add.asp">Add &amp; assign</a></td>
		<td>x += 5</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>10</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= 10 + 5</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>15</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>-=</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_assign_subtract.asp">Subtract &amp; assign</a></td>
		<td>x -= 5</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>15</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= 15 - 5</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>10</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>*=</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_assign_multiply.asp">Multiply &amp; assign</a></td>
		<td>let x = 10;<br/>x *= 5</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>10</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= 10 x 5</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>50</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>/=</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_assign_divide.asp">Divide &amp; assign</a></td>
		<td>let x = 10;<br/>x /= 5</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>50</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= 50 / 5</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>10</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>%=</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_assign_remainder.asp">Remainder &amp; assign</a></td>
		<td>let x = 10;<br/>x %= 3</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>10</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= 10 % 3 = 3 with remainder 1</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>:</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_assign_colon.asp">Alternative simple assign</a></td>
		<td>x: 45;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>1</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>45</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>45</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<h2>Arithmetic operators</h2>

<table class="table" border="1" cellspacing="0" cellpadding="5" style="table-layout:fixed;width:800px;max-width:800px;">
	<tr>
		<th style="width:60px;">Operator</th>
		<th style="width:160px;">Name</th>
		<th style="width:100px;">Example</th>
		<th>Results</th>
	</tr>
	<tr>
		<td>+</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_addition.asp">Addition</a></td>
		<td>x = x + 2;</td>	
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>45</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= x + 2 = 45 + 2</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>47</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>-</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_subtraction.asp">Subtraction</a></td>
		<td>x = x - 2;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>47</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= x - 2 = 47 - 2</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>45</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>+</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_unary_plus.asp">Unary positive</a></td>
		<td>x= +x;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>45</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= x * +1 = 45 * +1 = 45</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>45</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>-</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_unary_negation.asp">Unary negative</a></td>
		<td>x = -x;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>45</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= =x * -1 = 45 * -1 = -45</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>-45</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>*</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_multiplication.asp">Multiplication</a></td>
		<td>x = x * 2;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>-45</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= x * 2 = -45 * 2 = -90</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>-90</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>/</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_division.asp">Division</a></td>
		<td>x = x / 2;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>-90</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= x / 2 = -90 / 2 = -45</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>-45</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>**</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_exponentiation.asp">Exponentiation</a></td>
		<td>x = x ** 3;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>-45</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= -45<sup>3</sup> = x * x * x = -45 * -45 * -45 =  -91,125</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>-91,125</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>%</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_remainder.asp">Remainder after division</a></td>
		<td>x = x % 2;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>-91,125</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td> = x / 2 = -91,125 / 2 =  -45,562 with 1 remainder</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>1</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>++</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_increment.asp">Increment</a></td>
		<td>y = x++;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>1</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>y</td>
					<td>?</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>
						y = x++, x = 1 therefore y = 1 before x is incremented
					</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>y</td>
					<td>1</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>x = x + 1 = 1 + 1 = 2</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>2</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>++</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_increment.asp">Increment</a></td>
		<td>y = ++x;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>1</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>y</td>
					<td>?</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>x = x + 1 = 1 + 1 = 2</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>2</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>x = 2 therefore y = 2 before x is incremented.</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>y</td>
					<td>2</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>x = x + 1 = 1 +  1 = 2</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>= x = 2</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>--</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_decrement.asp">Decrement</a></td>
		<td>y = x--;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>2</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>y</td>
					<td>?</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>y = x--, x = 2 therefore y = 2 before x is decremented</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>y = 2</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>x = x - 1 = 2 - 1 = 1</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>1</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>--</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_decrement.asp">Decrement</a></td>
		<td>y = --x;</td>
		<td>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>2</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>y</td>
					<td>?</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>x = x - 1 = 2 - 1 = 1</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>x</td>
					<td>1</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" class="maths_table">
				<tr>
					<td>= x = 1 therefore y = 1 after x is decremented.</td>
				</tr>
			</table>
			<table border="1" cellpadding="0" cellspacing="0" class="variable_table">
				<tr>
					<td>y</td>
					<td>1</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<h2>Comparison operators</h2>
<p>These operators are used to make comparisons between values and always return a boolean value (either true/1 or false/0).</p>
<p>From above x currently contains the value 0.</p>
<table class="table" border="1" cellpadding="5" cellspacing="0" style="table-layout:fixed;width:950px;max-width:950px;">
	<tr>
		<th style="width:60px;">Operator</th>
		<th>Name</th>
		<th style="width:200px;">Example</th>
		<th style="width:140px;">Results</th>
	</tr>
	<tr>
		<td>==</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_equal.asp">Equal to (data type of operands do not have to match)?</a></td>
		<td>x == 8,  x == 0, x == false</td>
		<td>false, true,true</td>
	</tr>
	<tr>
		<td>===</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_strict_equal.asp">Strict equal to (data type of operands must also match)?</a></td>
		<td>x === 8,  x === 0, x === false</td>
		<td>false, true, false</td>
	</tr>
	<tr>
		<td>!=</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_not_equal.asp">Not equal to (data type of operands do not have to match)?</a></td>
		<td>x != 8,  x != 0, x != false</td>
		<td>true, false, false</td>
	</tr>
	<tr>
		<td>!==</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_strict_not_equal.asp">Strict not equal to (data type of operands must also match)?</a></td>
		<td>x !== 8,  x !== 0, x !== false</td>
		<td>true, false, true</td>
	</tr>
	<tr>
		<td>&gt;</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_greater_than.asp">Greater than?</a></td>
		<td>x &gt; 8, x &gt; 0, x &gt; -1</td>
		<td>false, false, true</td>
	</tr>
	<tr>
		<td>&lt;</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_less_than.asp">Less than?</a></td>
		<td>x &lt; 8, x &lt; 0, x &lt; -1</td>
		<td>true, false, false</td>
	</tr>
	<tr>
		<td>&gt;=</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_greater_equal.asp">Greater than or equal to?</a></td>
		<td>x &gt;= 8, x &gt;= 0, x &gt;= -1</td>
		<td>false, true, false</td>
	</tr>
	<tr>
		<td>&lt;=</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_less_equal.asp">Less than or equal to?</a></td>
		<td>x &lt;= 8, x &lt;= 0, x &lt;= -1</td>
		<td>true, true, false</td>
	</tr>
</table>

<h2>Logic operators</h2>
<p>These operators are used to combine individual comparisons into a single boolean result.</p>
<p>From above x currently contains the value 0.</p>
<table class="table" border="1" cellpadding="5" cellspacing="0" style="table-layout:fixed;width:1000px;max-width:1000px;">
	<tr>
		<th style="width:60px;">Operator</th>
		<th style="width:160px;">Name</th>
		<th style="width:345px;">Examples</th>
		<th>Results</th>
	</tr>
	<tr>
		<td>&amp;&amp;</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_and.asp">AND</a></td>
		<td>(x &lt; 10) &amp;&amp; (x &gt; 1)</td>
		<td>(0 &lt; 10) &amp;&amp; (0 &gt; 1) = true &amp;&amp; false = <b>false</b></td>
	</tr>
	<tr>
		<td>||</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_or.asp">OR</a></td>
		<td>(x &lt; 10) || (x &gt; 1)</td>
		<td>(0 &lt; 10) || (0 &gt; 1) = true || false = <b>true</b></td>
	</tr>
	<tr>
		<td>!</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_not.asp">NOT</a></td>
		<td>!(x == 0), !(x &gt; 10)</td>
		<td>x = !(0 == 0) = !true = false, !(0 &gt; 10) = !false = true</td>
	</tr>
	<tr>
		<td>??</td>
		<td>
			<a href="https://www.w3schools.com/jsref/jsref_oper_nullish.asp">Nullish Coalescing</a>
		</td>
		<td>let x = 10;<br/>docummentwrite(x ?? "x is null or undefined");<br/><br/>let x;<br/>docummentwrite(x ?? "x is null or undefined");</td>
		<td>10<br/><br/>"x is null or undefined"</td>
	</tr>
</table>

<h2>Bitwise operators</h2>
<p>To understand these operators you must first understand how to count in binary or base 2. We intuitively count in 
decimal, in which there a 10 digits: 0, 1, 2, 3, 4, 5, 6, 7, 8, 9. And we structure decimal or base 10 numbers with the 
following columns, and we start off with a 0 in the units colum and proceed to increment the digits until we reach 9 in 
the units column.</p>
<table class="table" border="1" cellpadding="5" cellspacing="0" style="table-layout:fixed;width:400px;max-width:400px;">
	<tr>
		<th>1000s / 10<sup>3</sup></th>
		<th>100s / 10<sup>2</sup></th>
		<th>10s / 10<sup>1</sup></th>
		<th>1 / 10<sup>0</sup></th>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>0</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>2</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>3</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>4</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>5</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>6</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>7</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>8</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>9</td>
	</tr>
</table>

<p>Now there is no single digit that represents the value 10, so we have to represent it using the available digits. 
What we do is to change the units column back to 0 and put a 1 in the tens column.</p>

<table class="table" border="1" cellpadding="5" cellspacing="0" style="table-layout:fixed;width:400px;max-width:400px;">
	<tr>
		<th>1000s / 10<sup>3</sup></th>
		<th>100s / 10<sup>2</sup></th>
		<th>10s / 10<sup>1</sup></th>
		<th>1 / 10<sup>0</sup></th>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>0</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>2</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>3</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>4</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>5</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>6</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>7</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>8</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>9</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>1</td>
		<td>0</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>1</td>
		<td>1</td>
	</tr>
</table>
<p>And we keep following this rule with the hundreds and thousands columns, and beyond.</p>

<p>Computers are built up from a simple construct called a 
<a href="https://en.wikipedia.org/wiki/Flip-flop_(electronics)">flipflop</a>, made from 2 transtors. And a flipflop has 
only 2 possible states: on (representing the digit 1) and off (representing the digit 0). So therefore computers can 
ONLY count in binary or base 2. The rules for counting in binary are EXACTLY the same as those for counting in decimal, 
except that you have only 2 digits - 0 and 1. When a column reaches 2 we change it back to 0 and add a 1 to the column 
to the left.</p>

<table class="table" border="1" cellpadding="5" cellspacing="0" style="table-layout:fixed;width:420px;max-width:420px;">
	<tr>
		<th>16s / 2<sup>4</sup></th>
		<th>8s / 2<sup>3</sup></th>
		<th>4s / 2<sup>2</sup></th>
		<th>2s / 2<sup>1</sup></th>
		<th>1s / 2<sup>0</sup></th>
		<th style="width:70px;">DECIMAL</th>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>0</td>
		<td>0</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>1</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>0</td>
		<td>2</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>1</td>
		<td>3</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>1</td>
		<td>0</td>
		<td>0</td>
		<td>4</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>1</td>
		<td>0</td>
		<td>1</td>
		<td>5</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>1</td>
		<td>1</td>
		<td>0</td>
		<td>6</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>7</td>
	</tr>
	<tr>
		<td></td>
		<td>1</td>
		<td>0</td>
		<td>0</td>
		<td>0</td>
		<td>8</td>
	</tr>
	<tr>
		<td></td>
		<td>1</td>
		<td>0</td>
		<td>0</td>
		<td>1</td>
		<td>9</td>
	</tr>
	<tr>
		<td></td>
		<td>1</td>
		<td>0</td>
		<td>1</td>
		<td>0</td>
		<td>10</td>
	</tr>
	<tr>
		<td></td>
		<td>1</td>
		<td>0</td>
		<td>1</td>
		<td>1</td>
		<td>11</td>
	</tr>
	<tr>
		<td></td>
		<td>1</td>
		<td>1</td>
		<td>0</td>
		<td>0</td>
		<td>12</td>
	</tr>
	<tr>
		<td></td>
		<td>1</td>
		<td>1</td>
		<td>0</td>
		<td>1</td>
		<td>13</td>
	</tr>
	<tr>
		<td></td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>0</td>
		<td>14</td>
	</tr>
	<tr>
		<td></td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>1</td>
		<td>15</td>
	</tr>
</table>

<p>Binary or base 2 is not the only counting system used in computer programming. Another very common counting system 
is hexadecimal or base 16. The digits (1 to 16) are 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, A, B, C, D, E, F. And we follow the 
exact same rules but using an larger number of digits.</p>

<table class="table" border="1" cellpadding="5" cellspacing="0" style="table-layout:fixed;width:420px;max-width:420px;">
	<tr>
		<th>65536s / 16<sup>4</sup></th>
		<th>4096s / 16<sup>3</sup></th>
		<th>256s / 16<sup>2</sup></th>
		<th>16s / 16<sup>1</sup></th>
		<th>1s / 16<sup>0</sup></th>
		<th style="width:70px;">DECIMAL</th>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>0</td>
		<td>0</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>1</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>2</td>
		<td>2</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>3</td>
		<td>3</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>4</td>
		<td>4</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>5</td>
		<td>5</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>6</td>
		<td>6</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>7</td>
		<td>7</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>8</td>
		<td>8</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>9</td>
		<td>9</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>A</td>
		<td>10</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>B</td>
		<td>11</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>C</td>
		<td>12</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>D</td>
		<td>13</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>E</td>
		<td>14</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>F</td>
		<td>15</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>0</td>
		<td>16</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>1</td>
		<td>17</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>2</td>
		<td>18</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>3</td>
		<td>19</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>4</td>
		<td>20</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>5</td>
		<td>21</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>6</td>
		<td>22</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>7</td>
		<td>23</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>8</td>
		<td>24</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>9</td>
		<td>25</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>A</td>
		<td>26</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>B</td>
		<td>27</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>C</td>
		<td>28</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>D</td>
		<td>29</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>E</td>
		<td>30</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>1</td>
		<td>F</td>
		<td>31</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>5
		<td>2</td>
		<td>0</td>
		<td>32</td>
	</tr>
</table>

<p>And you will also need to get your head around the truth tables for each of these bitwise operators. Truth tables 
traditionally use 1 and 0. But 1 also means true and 0 also means false. The truth tables combine single bits via 
the operators. A single bit is either a 0 or a 1. In the binary counting table above a 'bit' is the value (either 1 or 0) 
in one single column. The unit column, or the right most bit, is said to be the least signficant bit, while the 65535s 
column, or the left most column, is be the most signficant bit.</p>

<table border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;width:1415px;max-width:1415px;">
	<tr>
		<td>
			<table class="truth_table" border="1" cellpadding="5" cellspacing="0">
				<tr><th colspan="3">&amp; / AND<br/><span>If both bits are 1 then the result is 1</span></th></tr>
				<tr>
					<th></th>
					<th>0</th>
					<th>1</th>
				</tr>
				<tr>
					<th>0</th>
					<td>0</td>
					<td>0</td>
				</tr>
				<tr>
					<th>1</th>
					<td>0</td>
					<td>1</td>
				</tr>
			</table>
		</td>
		<td>
			<table class="truth_table" border="1" cellpadding="5" cellspacing="0">
				<tr><th colspan="3">| / OR<br/><span>If either bit is 1 then the result is 1</span></th></tr>
				<tr>
					<th></th>
					<th>0</th>
					<th>1</th>
				</tr>
				<tr>
					<th>0</th>
					<td>0</td>
					<td>1</td>
				</tr>
				<tr>
					<th>1</th>
					<td>1</td>
					<td>1</td>
				</tr>
			</table>
		</td>
		<td>
			<table class="truth_table" border="1" cellpadding="5" cellspacing="0">
				<tr><th colspan="3" >^ / XOR<br/><span>If both bits are different then the result is 1</span></th></tr>
				<tr>
					<th></th>
					<th>0</th>
					<th>1</th>
				</tr>
				<tr>
					<th>0</th>
					<td>0</td>
					<td>1</td>
				</tr>
				<tr>
					<th>1</th>
					<td>1</td>
					<td>0</td>
				</tr>
			</table>
		</td>
		<td>
			<table class="not_table" border="1" cellpadding="5" cellspacing="0">
				<tr><th colspan="2">! / NOT<br/><span>!1 is 0 and !0 is 1</span></th></tr>
				<tr>
					<th>0</th>
					<th>1</th>
				</tr>
				<tr>
					<td>1</td>
					<td>0</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<p>
	Now to use these bitwise operators on numbers that have more than one bit or column you simply line them up, one 
	above the other right justified, e.g. 5 | 8
</p>
<table class="truth_table" border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse;display:block;">
	<tr>
		<th>2<sup>3</sup></th>
		<th>2<sup>2</sup></th>
		<th>2<sup>1</sup></th>
		<th>2<sup>0</sup></th>
		<th>DECIMAL</th>
	</tr>
	<tr>
		<td></td>
		<td>1</td>
		<td>0</td>
		<td>1</td>
		<td>(5)</td>
	</tr>
	<tr>
		<td>1</td>
		<td>0</td>
		<td>0</td>
		<td>0</td>
		<td>(8)</td>
	</tr>
</table>
	
<p>Any missing columns in either number you just fill in with 0s.</p>
	
<table class="truth_table" border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse;display:block;">
	<tr>
		<th>2<sup>3</sup></th>
		<th>2<sup>2</sup></th>
		<th>2<sup>1</sup></th>
		<th>2<sup>0</sup></th>
		<th>DECIMAL</th>
	</tr>
	<tr>
		<td>0</td>
		<td>1</td>
		<td>0</td>
		<td>1</td>
		<td>(5)</td>
	</tr>
	<tr>
		<td>1</td>
		<td>0</td>
		<td>0</td>
		<td>0</td>
		<td>(8)</td>
	</tr>
</table>
	
<p>Then you just use the appropriate truth table above for each pair of bits in the same column.</p>
	
<table class="truth_table" border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse;display:block;">
	<tr>
		<th></th>
		<th>2<sup>3</sup></th>
		<th>2<sup>2</sup></th>
		<th>2<sup>1</sup></th>
		<th>2<sup>0</sup></th>
		<th>DECIMAL</th>
	</tr>
	<tr>
		<td></td>
		<td>0</td>
		<td>1</td>
		<td>0</td>
		<td>1</td>
		<td>(5)</td>
	</tr>
	<tr>
		<td style="border-bottom-width:medium;border-bottom-color:black;">| OR</td>
		<td style="border-bottom-width:medium;border-bottom-color:black;">1</td>
		<td style="border-bottom-width:medium;border-bottom-color:black;">0</td>
		<td style="border-bottom-width:medium;border-bottom-color:black;">0</td>
		<td style="border-bottom-width:medium;border-bottom-color:black;">0</td>
		<td style="border-bottom-width:medium;border-bottom-color:black;">(8)</td>
	</tr>
	<tr>
		<td></td>
		<td>1</td>
		<td>1</td>
		<td>0</td>
		<td>1</td>
		<td>(13)</td>
	</tr>
</table>
<br/>
<table class="table" border="1" cellpadding="5" cellspacing="0" style="table-layout:fixed;width:800px;max-width:800px;">
	<tr>
		<th style="width:80px;">Operator</th>
		<th style="width:160px;">Name</th>
		<th style="width:80px;">Examples</th>
		<th style="width:140px;">Example as binary</th>
		<th style="width:120px;">Result in binary</th>
		<th>Result in decimal</th>
	</tr>
	<tr>
		<td>&amp;</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_bitwise_and.asp">AND</a></td>
		<td>x = 5 &amp; 1</td>
		<td>0101 &amp; 0001</td>
		<td>0001</td>
		<td>1</td>
	</tr>
	<tr>
		<td>|</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_bitwise_or.asp">OR</a></td>
		<td>x = 5 | 1</td>
		<td>0101 | 0001</td>
		<td>0101</td>
		<td>5</td>
	</tr>
	<tr>
		<td>~</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_bitwise_not.asp">NOT</a></td>
		<td>x = ~ 5</td>
		<td>~0101</td>
		<td>1010</td>
		<td>10</td>
	</tr>
	<tr>
		<td>^</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_bitwise_xor.asp">XOR</a></td>
		<td>x = 5 ^ 1</td>
		<td>0101 ^ 0001</td>
		<td>0100</td>
		<td>4</td>
	</tr>
	<tr>
		<td>&lt;&lt;</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_bitwise_left.asp">Shift bits to the left</a></td>
		<td>x = 5 &lt;&lt; 1</td>
		<td>0101 &lt;&lt; 1</td>
		<td>1010</td>
		<td>10</td>
	</tr>
	<tr>
		<td>&gt;&gt;</td>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_bitwise_right_signed.asp">Shift bits to the right</a></td>
		<td>x = 5  &gt;&gt; 1</td>
		<td>00000101 &gt;&gt; 1</td>
		<td>00000010</td>
		<td>2</td>
	</tr>
</table>

<h2>Miscellaneous operators</h2>
<table class="table" border="1" cellpadding="0" cellspacing="0">
	<tr>
		<th style="width:100px;">Operator</th>
		<th style="width:400px;">Description</th>
		<th>Examples</th>
	</tr>
	<tr>
		<td>. or period</td>
		<td>Access a member of an object.</td>
		<td>
			let objPerson = {name: "Greg", age: 60, eyes: "blue"};
			document.write(objPerson.name);
		</td>
	</tr>
	<tr>
		<td>[ ]</td>
		<td>Array indexing.</td>
		<td>
			let arrayInts = {10, 45, 345, 3, 46};
			document.write(arrayInts[0] /*The first array element*/);
			document.write(arrayInts[4] /*The last array element*/);
			Arrays are 0 based so the last element is always one less than the total number of elements.
		</td>
	</tr>
	<tr>
		<td>[ ]</td>
		<td>Map indexing.</td>
		<td>
			let objPerson = {name: "Greg", age: 60, eyes: "blue"};
			document.write(objPerson["name"]);
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_optional.asp">?.</a></td>
		<td>Optional chaining.</td>
		<td>
			// Create an object<br/>
			const car = {type:"Fiat", model:"500", color:"white"};
			// Ask for car name:<br/>
			// This would cause a JavaScript error and halt JavaScript execution, because the object 'car' does not contain a member called 'name'.<br/>
			document.getElementById("demo").innerHTML = car.name;
			//This would not cause a JavaScript error - it simply returns null or undefined and allows JavaScript execution to continue.<br/>
			document.getElementById("demo").innerHTML = car?.name;
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_spread.asp">...</a></td>
		<td>Used to append arrays or to pass array elements<br/>to a function as individual parameters.</td>
		<td>
			const arr1 = [1, 2, 3];
			const arr2 = [4, 5, 6];
			const arr3 = [...arr1, ...arr2];/* Equivalent to const arr3 = [1, 2, 3, 4, 5, 6];*/<br/><br/>
			const numbers = [23, 55, 21, 87, 56];
			let minValue = Math.min(...numbers);/* Equivalent to Math.min(23, 55, 21, 87, 56);*/
		</td>
	</tr>
	<tr>
		<td>( )</td>
		<td>Expression</td>
		<td>
			let x = 10;
			if (x &lt; 10)<br/>
					document.write("x is less than 10!");
			else<br/>
					document.write("x is not less than 10!");
		</td>
	</tr>
	<tr>
		<td>( )</td>
		<td>Function call.</td>
		<td>
			function printText(strText)<br/>
			{<br/>
					document.write(strText);
			}<br/>
			printText("Hello world");
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_arrow.asp">=&gt;</a></td>
		<td>A shorthand way of defining a function.</td>
		<td>
			const add = (a, b) =&gt; a + b;
			let result = add(1, 2);		
		</td>
	</tr>
	<tr>
		<td><a href="http://w3schools.com/js/js_object_constructors.asp">=new</a></td>
		<td>Create an instance of an object.</td>
		<td>
			let today = new Date();
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_delete.asp">delete</a></td>
		<td>Delete an instance of an object.</td>
		<td>
			let today = new Date();
			delete today;
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_relational.asp">in</a></td>
		<td>Is this data in that object?</td>
		<td>
			// Create an object<br/>
			const car = {type:"Fiat", model:"500", color:"white"};
			if ("name" in car)<br/>
				document.write("The name of the car is " + car.name + ".");
			else<br/>
				document.write("The object car does not contain a member called 'name'.);
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_instanceof.asp">instanceof</a></td>
		<td>Is this an instance of that object or data type?</td>
		<td>
			const arrayInts = [1, 2, 3];
			if (arrayInts instanceof Array)<br/>
				document.write("arrayInts is an instance of Array!");
			else<br/>
				document.write("arrayInts is not an instance of Array!");
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_typeof.asp">typeof</a></td>
		<td>Get the data type of this variable.</td>
		<td>
			const arrayInts = [1, 2, 3];
			document.write(typeof arrayInts); /* Outputs Array*/
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_void.asp">void</a></td>
		<td>A shorthand way of defining an empty function.</td>
		<td>
			&lt;input type="button" value="CLICK ME" onclick="void(0)"&gt;
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_generators.asp">yield</a></td>
		<td>Pauses execution of a loop, retains the loops current state and returns excution control to the code that 
		started the loop. The loop can then be resumed by calling the next() function</td>
		<td></td>
	</tr>
</table>

<h1>Constructs</h1>
<h2>Grouped statements</h2>
<p>You can group more than one individual statements together, so that they behave like a single statement in the 
following constructs by using {(meaning begin grouped statements) and }(meaning end grouped statements). Here is an 
example:</p>
<pre>
let x = 0;
while (x &lt; 10)
{
	document.write("x currently has the value of " + x + "&lt;br/&gt;");
	x++;/* Add 1 to x */
}
</pre>
<p>
	The loop will iterate 10 times and x will start of with the value 0 and end up with the value 9, before the loop 
	terminates. So you would see the following output:
</p>
<pre>
	x currently has the value of 0
	x currently has the value of 1
	x currently has the value of 2
	x currently has the value of 3
	x currently has the value of 4
	x currently has the value of 5
	x currently has the value of 6
	x currently has the value of 7
	x currently has the value of 8
	x currently has the value of 9
</pre>

<h2>Conditional statements</h2>
<h3>if, else if, else</h3>
<p>You can read more about if statements by clicking <a href="https://www.w3schools.com/js/js_if.asp">here</a> and 
if/else if/else statements by clicking <a href="https://www.w3schools.com/js/js_if_else.asp">here</a>.</p>

<p>The if...else if...else statement tests one or more conditons, sequentially, and only executes the statement or 
statements for the condition that evaluates to true. If none of conditions are true then it executes the statement or 
statements for else clause (if present). Here are some varied examples:</p>

<pre>
let x = 10;
if (x == 10)
	document.write("x does equal 10!");
</pre>
<pre>
let x = 10;
if (x == 10)
	document.write("x does equal 10!");
else
	document.write("x does not equal 10!");
</pre>
<pre>
let x = 10;
if (x == 10)
	document.write("x does equal 10!");
else if (x == 9)
	document.write("x equal 9!");
else if (x == 8)
	document.write("x equal 8!");
else if (x == 7)
	document.write("x equal 7!");
else if (x == 6)
	document.write("x equal 6!");
else if (x == 5)
	document.write("x equal 5!");
else if (x == 4)
	document.write("x equal 4!");
else if (x == 3)
	document.write("x equal 3!");
else if (x == 2)
	document.write("x equal 2!");
else if (x == 1)
	document.write("x equal 1!");
</pre>
<pre>
let x = 10;
if (x == 10)
	document.write("x does equal 10!");
else if (x == 9)
	document.write("x equal 9!");
else if (x == 8)
	document.write("x equal 8!");
else if (x == 7)
	document.write("x equal 7!");
else if (x == 6)
	document.write("x equal 6!");
else if (x == 5)
	document.write("x equal 5!");
else if (x == 4)
	document.write("x equal 4!");
else if (x == 3)
	document.write("x equal 3!");
else if (x == 2)
	document.write("x equal 2!");
else if (x == 1)
	document.write("x equal 1!");
else
	document.write("x does not equal 1, 2, 3, 4, 5, 6, 7, 8 or 9!");
</pre>

<h3>switch/case</h3>
<p>Switch statements are useful for testing ordinal data types, such as integers. Here is an example:</p>
<pre>
let x = 10;
switch (x)
{
	case 1:
		document.write("x is equal to 1!");
		break;
	case 2:
		document.write("x is equal to 2!");
		break;
	case 3:
		document.write("x is equal to 3!");
		break;
	case 4:
		document.write("x is equal to 4!");
		break;
	case 5:
		document.write("x is equal to 5!");
		break;
	case 6:
		document.write("x is equal to 6!");
		break;
	case 7:
		document.write("x is equal to 7!");
		break;
	case 8:
		document.write("x is equal to 8!");
		break;
	case 9:
		document.write("x is equal to 9!");
		break;
	default:
		document.write("x is not equal to 1, 2, 3, 4, 5, 6, 7, 8 or 9!");
		break;
}
</pre>

<h3>Ternary operator</h3>
<p>The ternary operator is a shorthand way of implementing simple if/else statement as an expression. Here is an 
example:</p>
<pre>
	let x = 10;
	document.write((x == 10) ? "x is equal to 10!" : "x is not equal to 10!");
</pre>

<h2>Loops</h2>
<h3>for loop</h3>
<p>You use for loops when you know what the start condition is and when the end condition will be reached. You typically 
use for loops when iterating through an array which always have a known size. Here is an example:</p>

<pre>
	let arrayInts = {12, 34, 3, 567};
	for (let nI = 0; nI &lt; arrayInts.length; nI++)
	{
		document.write("Array element number " + nI + " contains the value " + arrayInts[nI] + "!");
	}
</pre>

<h3>while loop</h3>
<p>While loops will iterate 0 or more times. You use them when you:</p>
<ul>
	<li>Don't know what the start condition is, e.g. you ask the user to enter a value between 1 and 10 for x.</li>
	<li>Don't know when the end condition will become true, e.g. when reading lines from a text file - you have no idea 
	how many lines of text the file contains and you keep reading until you hit the end of the file.</li>
</ul>
<pre>
	let x = 0;
	while (x &lt; 10)
	{
		document.write("x currently has the value of " + x + "&lt;br/&gt;");
		x++;/* Add 1 to x */
	}
</pre>
<p>
	The loop will iterate 10 times and x will start of with the value 0 and end up with the value 10, after the loop 
	terminates. So you would see the following output:
</p>
<pre>
	x currently has the value of 0
	x currently has the value of 1
	x currently has the value of 2
	x currently has the value of 3
	x currently has the value of 4
	x currently has the value of 5
	x currently has the value of 6
	x currently has the value of 7
	x currently has the value of 8
	x currently has the value of 9
</pre>

<pre>
	let x = 10;
	while (x &lt; 10)
	{
		document.write("x currently has the value of " + x + "&lt;br/&gt;");
		x++;/* Add 1 to x */
	}
</pre>
<p>
	The loop will iterate 0 times and x starts with the value 10 and ends with the value 10 after the loop terminates. So 
	you will see no output.
</p>

<pre>
	let x = 9;
	while (x &lt; 10)
	{<br/>
		document.write("x currently has the value of " + x + "&lt;br/&gt;");
		x++;/* Add 1 to x */
	}
</pre>
<p>
	The loop will iterate 1 time and x will start of with the value 9 and end up with the value 10, after the loop 
	terminates. So you would see the following output:
</p>
<p>
x currently has the value of 9<br/>
</p>

<h3>do/while loop</h3>
<p>Do while loops iterate 1 or more times. You use them when you know that the loop must iterate at least once but 
you don't know how many times. Here is an example:</p>

<pre>
	let x = 5;
	do
	{
		document.write("x currently has the value of " + x + "!");
		x++; // Increment x
	}
	while (x &lt; 10);
</pre>
<p>You will see the following output:</p>
<pre>
	x currently has the value of 5!
	x currently has the value of 6!
	x currently has the value of 5!
	x currently has the value of 7!
	x currently has the value of 8!
	x currently has the value of 9!
	x currently has the value of 10!
	
	Note that, with a do/while loop, you see x with the value of 10. Where as with the while/do loop you do not.
</pre>
<h2>Execution control</h2>
<h3>break</h3>
<p>You can read more about 'break' by clicking <a href="https://www.w3schools.com/js/js_break.asp">here</a>.</p>

<p>This is used in switch statements like this example:</p>
<pre>
let x = 10;
switch (x)
{
	case 1:
		document.write("x is equal to 1!");
		break;
	case 2:
		document.write("x is equal to 2!");
		break;
	case 3:
		document.write("x is equal to 3!");
		break;
	case 4:
		document.write("x is equal to 4!");
		break;
	case 5:
		document.write("x is equal to 5!");
		break;
	case 6:
		document.write("x is equal to 6!");
		break;
	case 7:
		document.write("x is equal to 7!");
		break;
	case 8:
		document.write("x is equal to 8!");
		break;
	case 9:
		document.write("x is equal to 9!");
		break;
	default:
		document.write("x is not equal to 1, 2, 3, 4, 5, 6, 7, 8 or 9!");
		break;
}
</pre>
<p>If you don't include them then more than the next case statement will be executed for no good reason.</p>
<p>It can also be used in loops as in this example:</p>
<pre>
	let x = 10;
	while (true) // This loop will execute forever.
	{
		if (x == 10)
				break; // But this if / break statement will terminate the loop.
		document.write("x currently has the value " + x + "!");
		x++; // Increment x
	}
</pre>

<h3>continue</h3>
<p>You can read more about 'contine' by clicking <a href="https://www.w3schools.com/js/js_continue.asp">here</a>.</p>
<p>This cause the CPU to skip back to the top of the loop without executing any of the statements below it. Here 
is an example.</p>
<p>
	let x = 0;
	while (x &lt; 10)<br/>
	{<br/>
			if (x == 5)<br/>
			{<br/>
					x++; // Increment x<br/>
					continue; // Jump back to the top of the loop and skip output<br/>
			}<br/>
			document.write("x currently has the value " + x + "!");
			x++; // Increment x<br/>
	}
</p>
<p>You will see the following output:</p>

<p>
	x currently has the value 0<br/>
	x currently has the value 1<br/>
	x currently has the value 2<br/>
	x currently has the value 3<br/>
	x currently has the value 4<br/>
	x currently has the value 6<br/>
	x currently has the value 7<br/>
	x currently has the value 8<br/>
	x currently has the value 9<br/>
</p>


<h3>return</h3>
<p>You can read more about 'return' by clicking <a href="https://www.w3schools.com/jsref/jsref_return.asp">here</a>.</p>
<p>This cause the currently executing function to terminate and return to the caller of that function. Here is an 
example:</p>

<pre>
function CalculateAverage(nVal1, nVal2, nVal3, nVal4)
{
	return (nVal1 + nVal2 + nVal3 + nVal4) / 4;
}
document.write("The average of 3, 6, 78 and 34 is " + CalculateAverage(3, 6, 78, 34));
</pre>

<p>You can use return at any point in your function and you don't have to combine it with a return value. You can just 
do return;</p>

<h3>throw &amp; catch</h3>
<p>You can read more about 'throw' by clicking <a href="https://www.w3schools.com/jsref/jsref_throw.asp">here</a>.</p>


<pre>
function myFunction()
{
	let x = document.getElementById("demo").value;
	try
	{
		if (x == "")
			throw "Contents of element with ID 'demo' is empty!";
		else if (isNaN(x))
			throw "Contents of element with ID 'demo' is not a number";
		else if (x &gt; 10)
			throw "Contents of element with ID 'demo' is too high";
		else if (x &lt; 5)
			throw "Contents of element with ID 'demo' is too low";
	}
	catch(strError)
	{
		document.write(strError);
	}
}
</pre>

<h2>Defining and calling functions</h2>

<p>
	A function is a reusable block of code designed to perform a specific task, which executes when it is "called" or 
	"invoked". It saves you having to repeat and debug that particular segment of code in 100s of places throught your 
	program. Or in simpler terms, it saves you a considerable amount of repeated typing. In JavaScript you define a 
	function like this:
</p>
<pre>
function FunctionName(&lt;Optional parameter1&gt;, &lt;Optional parameter2&gt;, ... , &lt;Optional parameterN&gt;)
{
	&lt;Statement 1&gt;
	&lt;Statement 2&gt;
	.
	.
	.
	&lt;Statement N&gt;
}
</pre>
<p>
	You can use a 'return' statement at any point in the function. This can include an optional value to return, e.g. 
	return (Optional parameter1 + Optional parameter2 + ... Optional parameterN)/ N; Here is a specific example of a 
	function that returns a value, with JavaScript comments to explain it.
</p>
<pre>
function CalculateAverage(arrayValueList)
{
	let nTotal = 0;

	if (typeof arrayValueList != Array) // Make sure the parameter is actually an array object
		return "ERROR: Parameter arrayValueList is not an array!"; // The parameter is not an array so we can't calculate an average so abort the function.
	else
	{
		for (let nI = 0; nI &lt; arrayValueList.length; nI++)
		{
			if (arrayValueList[nI].isFinite()) // Check if the next array element is a number.
				nTotal += arrayValueList[nI]; // The next array element is a number so add it to the total.
			else
				return "arrayValueList[" + nI + "] is not a number (" + arrayValueList[nI] + ")!"; // The next array element is not a number so we can't calculate an average so abort the function.
		}
	}
	return "The average is " + (nTotal / arrayValueList.length).toString(); // Return the average value of all the values in the array.
}
</pre>
<p>And you invoke and call the function like this:</p>
<pre>
let arrayValueList = {10, 34, 56, 78 , 98, 35, 54, 71, 43, 120};
alert(CalculateAverage(arrayValueList));// It will either display an error message or the average of all the values in the array.
</pre>

<p>
	Here is an example of a function that does not return an value.
</p>
<pre>
function DisplayErrorMessage(strMessage)
{
	document.write("#######################################################&lt;br/&gt;\n");
	document.write("#######################################################&lt;br/&gt;\n");
	document.write("#######################################################&lt;br/&gt;\n");
	document.write("### AN ERROR HAS OCCURED                            ###&lt;br/&gt;\n");
	document.write("###                                                 ###&lt;br/&gt;\n");
	document.write("### " + strMessage                                  ###&lt;br/&gt;\n");
	document.write("###                                                 ###&lt;br/&gt;\n");                   
	document.write("#######################################################&lt;br/&gt;\n");
	document.write("#######################################################&lt;br/&gt;\n");
	document.write("#######################################################&lt;br/&gt;\n");
}
</pre>
<p>
	And you invoke and call the function like this:
</p>
<pre>
DisplayErrorMessage("Value is not an number!");
</pre>

<p>You can read more about JavaScript functions by clicking <a href="https://www.w3schools.com/js/js_function_definition.asp">here</a>.</p>

<h2>String manipulation</h2>
<h3>Using operators</h3>
<p>You can read more about string manipulation via operators by clicking 
<a href="https://www.w3schools.com/jsref/jsref_oper_string.asp">here</a>.</p>

<p>You can use the assignment operators and the + operator on strings. All these string manipulations are permissable:</p>

<pre>
let str1 = "ABC", str2 = "DEF", str3 = "";
str3 = str1 + str2; // str3 now contains the string "ABCDEF"
str3 += str1; // str3 now contains the string "ABCDEFABC"
</pre>

<p>You can also use all the arithetic comparison operators with strings too. The comparisons are alphabetic, once 
character at a time. All these string manipulations are permissable:</p>

<pre>
let str1 = "ABC", str2 = "DEF", bResult = false;
bResult = str1 &gt; str2; // bResult contains false because "ABC" is not alphabetically greater than "DEF"
bResult = str1 &lt; str2 // bResult now contains false because "ABC" is not alphabetically less than "DEF"
bResult = str1 &gt;= str2;
bResult = str1 &lt;= str2;
bResult = str1 == str2;
</pre>

<h3>String methods</h3>
<p>You can read more about string functions by clicking 
<a href="https://www.w3schools.com/js/js_string_methods.asp">here</a>.</p>

<p>Here is the full list of available string functions availabe to you.</p>
<p><b>NOTE: </b> that none of these funcion modify the original string that they are called on.</p>

<table class="table" border="1" cellpadding="5" cellspacing="0">
	<tr>
		<th style="width:80px;">Function</th>
		<th>Usage</th>
		<th>Example</th>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_length">length</a></td>
		<td>String.length or String.length()</td>
		<td>
<pre style="width:94%;">
let x = "ABC";

x.length; // Evaluates to 3
x.length(); // Evaluates to 3
</pre style="width:94%;">
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_charat">charAt()</a></td>
		<td>String.charAt(&lt;Index of the character you want&gt;)</td>
		<td>
<pre style="width:94%;">
let x = "ABC";

x.charAt(1); // Evaluates to "B"
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_at">at()</a></td>
		<td>String.at(&lt;Index of the character you want&gt;)</td>
		<td>
<pre>
	let x = "ABC";
	x.at(1); // Evaluates to "B"
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_propertyaccess">[ ]</a></td>
		<td>String[&lt;Index of the character you want&gt;]</td>
		<td>
<pre style="width:94%;">
let x = "ABC";

x.at[1]; // Evaluates to "B"
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_charcodeat">charCodeAt()</a></td>
		<td>String.charCodeAt(&lt;Index of the character whose ASCII code you want&gt;)</td>
		<td>
<pre style="width:94%;">
let x = "ABC";
x.charCodeAt(1); // Evaluates to 66 which is the <a href="https://www.ascii-code.com/">ASCII</a> code for the character B<br/>
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_codepointat">codePointAt()</a></td>
		<td>String.codePointAt(&lt;Index of the character whose UTF-16 code you want&gt;)</td>
		<td>
<pre style="width:94%;">
let x = "ABC";
x.codePointAt(1); // Evaluates to 65 which is the  <a href="https://asecuritysite.com/coding/asc2">UTF-16</a> code for the character B
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_concat">concat()</a></td>
		<td>String.concat(&lt;The second string you want to add to the first string&gt;)</td>
		<td>	
<pre style="width:94%;">
let str1 = "ABC", str2 = "DEF";
str1.concat(str2); // Evaluates to the string "ABCDEF", the same as str1 + str2
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_slice">slice()</a></td>
		<td>String.slice(&lt;Index of the character to start at&gt;, &lt;Index of the character to end at&gt;)</td>
		<td>	
<pre style="width:94%;">
let str1 = "ABCDEF";
str1.slice(1, 4); // Evaluates to the string "BCDE"
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_substring">substring()</a></td>
		<td>String.substring(&lt;Index of the character to start at&gt;, &lt;Index of the character to end at&gt;</td>
		<td>	
<pre style="width:94%;">
let str1 = "ABCDEF";
str1.slice(1, 4); // Evaluates to the string "BCDE"
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_substr">substr()</a></td>
		<td>String.substring(&lt;Index of the character to start at&gt;, &lt;Number of character from start index&gt;</td>
		<td>	
<pre style="width:94%;">
let str1 = "ABCDEF";
str1.substr(1, 4); // Evaluates to the string "BCDEF"
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_touppercase">toUpperCase()</a></td>
		<td>String.toUpperCase()</td>
		<td>	
<pre style="width:94%;">
let str1 = "abcdef";
str1.toLowerCase(); // Evaluates to the string "ABCDEF"
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_tolowercase">toLowerCase()</a></td>
		<td>String.toLowerCase()</td>
		<td>	
<pre style="width:94%;">
let str1 = "ABCDEF";
str1.toLowerCase(); // Evaluates to the string "abcdef"
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_iswellformed">isWellFormed()</a></td>
		<td>String.isWellFormed()</td>
		<td>	
<pre style="width:94%;">
let str1 = "Hello world";
str1.isWellFormed(); // Evaluates to true - yes this string is well formed English
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_towellformed">toWellFormed()</a></td>
		<td>String.toWellFormed()</td>
		<td>	
<pre style="width:94%;">
let str1 = "Hello World \uD800";
str1.toWellFormed(); // Evaluates to the string "Hello world  " - any nonsense charaters are converted to the unicode replacement character)
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_trim">trim()</a></td>
		<td>String.trim()</td>
		<td>	
<pre> style="width:94%;"
let str1 = "   ABCDEF   ";
str1.trim(); // Evaluates to the string "ABCDEF" - any leading or trailing whitespace characters are removed.
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_trimstart">trimStart()</a></td>
		<td>String.trimStart()</td>
		<td>	
<pre style="width:94%;">
let str1 = "   ABCDEF   ";
str1.trimStart(); // Evaluates to the string "ABCDEF   " - any leading whitespace characters are removed.
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_trimend">trimEnd()</a></td>
		<td>String.trimEnd()</td>
		<td>	
<pre style="width:94%;">
let str1 = "   ABCDEF   ";
str1.trim(); // Evaluates to the string "   ABCDEF" - any trailing whitespace characters are removed.
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_padstart">padStart()</a></td>
		<td>String.padStart(&lt;Number of charatcer to pad with&gt;, &lt;The character or string to pad with&gt;)</td>
		<td>	
<pre style="width:94%;">
let str1 = "1234";
str1.padStart(4, "0"); // Evaluates to the string "00001234".
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_padend">padEnd()</a></td>
		<td>String.padEnd(&lt;Number of charatcer to pad with&gt;, &lt;The character or string to pad with&gt;)</td>
		<td>	
<pre>
let str1 = "1234";
str1.padEnd(4, "0"); // Evaluates to the string "12340000".
</pre style="width:94%;">
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_repeat">repeat()</a></td>
		<td>String.repeat(&lt;Number of times to repeat the string&gt;)</td>
		<td>	
<pre style="width:94%;">
let str1 = "1234";
str1.repeat(2); // Evaluates to the string "12341234".
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_replace">replace()</a></td>
		<td>string.replace(&lt;Substring to find&gt;, &lt;String to replace it with&gt;)</td>
		<td>	
<pre style="width:94%;">
let str1 = "Please visit W3Schools";
str1.replace("W3Schools", "Microsoft"); // Evaluates to the string "Please visit Microsoft".
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_replaceall">replaceAll()</a></td>
		<td>string.replace(&lt;Substring to find&gt;, &lt;String to replace all occurences of it with&gt;)</td>
		<td>	
<pre style="width:94%;">
let str1 = "12341234";
str1.replaceAll("1", "X"); // Evaluates to the string "X234X234".
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_string_methods.asp#mark_split">split()</a></td>
		<td>String.split(&lt;Substring or character to split the string at&gt;)</td>
		<td>	
<pre style="width:94%;">
let str1 = "Please visit W3Schools";
str1.split(" "); // Evaluates to an array containing 3 seperate strings: {"Please", "visit", "W3Schools"}.
</pre>
		</td>
	</tr>
</table>

<h1>Miscellaneous useful functions</h1>

<p>You can read more about these functions by clicking <a href="https://www.w3schools.com/jsref/jsref_obj_number.asp">here</a>. 
Only the functions you are most likely to use are listed here.</p>

<table class="table" border="1" cellpadding="0" cellspacing="0">
	<tr>
		<th style="width:100px;">Operator</th>
		<th style="width:400px;">Description</th>
		<th>Examples</th>
	</tr>
	<tr>
		<td>. or period</td>
		<td>Access a member of an object.</td>
		<td>
<pre>
	let objPerson = {name: "Greg", age: 60, eyes: "blue"};
	document.write(objPerson.name);
</pre>
		</td>
	</tr>
	<tr>
		<td>[ ]</td>
		<td>Array indexing.</td>
		<td>
<pre>
	let arrayInts = {10, 45, 345, 3, 46};
	document.write(arrayInts[0] /*The first array element*/);
	document.write(arrayInts[4] /*The last array element*/);
	Arrays are 0 based so the last element is always one less than the total number of elements.
</pre>
		</td>
	</tr>
	<tr>
		<td>[ ]</td>
		<td>Map indexing.</td>
		<td>
<pre>
	let objPerson = {name: "Greg", age: 60, eyes: "blue"};
	document.write(objPerson["name"]);
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_optional.asp">?.</a></td>
		<td>Optional chaining.</td>
		<td>
<pre>
	// Create an object<br/>
	const car = {type:"Fiat", model:"500", color:"white"};
	// Ask for car name:
	// This would cause a JavaScript error and halt JavaScript execution, because the object 'car' does not contain a member called 'name'.
	document.getElementById("demo").innerHTML = car.name;
	//This would not cause a JavaScript error - it simply returns null or undefined and allows JavaScript execution to continue.
	document.getElementById("demo").innerHTML = car?.name;
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_spread.asp">...</a></td>
		<td>Used to append arrays or to pass array elements<br/>to a function as individual parameters.</td>
		<td>
<pre>
	const arr1 = [1, 2, 3];
	const arr2 = [4, 5, 6];
	const arr3 = [...arr1, ...arr2];/* Equivalent to const arr3 = [1, 2, 3, 4, 5, 6];*/
	
	const numbers = [23, 55, 21, 87, 56];
	let minValue = Math.min(...numbers);/* Equivalent to Math.min(23, 55, 21, 87, 56);*/
</pre>
		</td>
	</tr>
	<tr>
		<td>( )</td>
		<td>Expression</td>
		<td>
<pre>
	let x = 10;
	if (x &lt; 10)
			document.write("x is less than 10!");
	else
			document.write("x is not less than 10!");
</pre>
		</td>
	</tr>
	<tr>
		<td>( )</td>
		<td>Function call.</td>
		<td>
<pre>
	function printText(strText)
	{
			document.write(strText);
	}
	printText("Hello world");
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_arrow.asp">=&gt;</a></td>
		<td>A shorthand way of defining a function.</td>
		<td>
<pre>
	const add = (a, b) =&gt; a + b;
	let result = add(1, 2);		
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="http://w3schools.com/js/js_object_constructors.asp">=new</a></td>
		<td>Create an instance of an object.</td>
		<td>
<pre>
	let today = new Date();
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_delete.asp">delete</a></td>
		<td>Delete an instance of an object.</td>
		<td>
<pre>
	let today = new Date();
	delete today;
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_relational.asp">in</a></td>
		<td>Is this data in that object?</td>
		<td>
<pre>
	// Create an object<br/>
	const car = {type:"Fiat", model:"500", color:"white"};
	if ("name" in car)<br/>
		document.write("The name of the car is " + car.name + ".");
	else<br/>
		document.write("The object car does not contain a member called 'name'.);
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_instanceof.asp">instanceof</a></td>
		<td>Is this an instance of that object or data type?</td>
		<td>
<pre>
	const arrayInts = [1, 2, 3];
	if (arrayInts instanceof Array)
		document.write("arrayInts is an instance of Array!");
	else<br/>
		document.write("arrayInts is not an instance of Array!");
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_typeof.asp">typeof</a></td>
		<td>Get the data type of this variable.</td>
		<td>
<pre>
	const arrayInts = [1, 2, 3];
	document.write(typeof arrayInts); /* Outputs Array*/
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/jsref_oper_void.asp">void</a></td>
		<td>A shorthand way of defining an empty function.</td>
		<td>
<pre>
	&lt;input type="button" value="CLICK ME" onclick="void(0)"&gt;
</pre>
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/js/js_generators.asp">yield</a></td>
		<td>Pauses execution of a loop, retains the loops current state and returns excution control to the code that 
		started the loop. The loop can then be resumed by calling the next() function</td>
		<td></td>
	</tr>
</table>

<h1>Object Orinted Programming or OOP</h1>
<p>OOP involves self contained objects that contain a set of attributes and a set of functions. You are very familiar 
with this concept even though this description might seem, at face value, to be very alien to you. And therefore this 
method of programming makes it very much easier to do.</p>

<p>Consider a person such as yourself. A 'person' is a generic object that contains a bunch of common attributes that are 
the same for all people. E.G.</p>
<ul>
	<li>Legs: 2</li>
	<li>Arms: 2</li>
	<li>Eyes: 2</li>
	<li>Fingers: 10</li>
	<li>Toes: 10</li>
</ul>
<p>A person also has a bunch of attributes that are not fixed. E.G.</p>
<ul>
	<li>Hair length: ?</li>
	<li>Hair type: ?</li>
	<li>Eye colour: ?</li>
	<li>Height: ?</li>
	<li>Weight: ?</li>
	<li>Name: ?</li>
	<li>Age: ?</li>
</ul>
<p>
	So let's convert this concept to a JavaScript 'class'. A 'class' in OOP is like a set of instructions in a Ikea flat 
	pack book shelf. The instructions are not the book shelf itself, merely describe the way you construct the book shelf. 
	In JavaScript you need to implement a special initialisation function called a 'constructor'. You can think of yourself 
	as a 'constructor' function as you read the Ikea instructions and put your bookshelf together.
</p>
<pre>
class CPerson
{
	constructor(strHairLength, strHairType, strEyeColor, nHeight, nWeight, strName, nAge)
	{
		this.m_nNumberOfLegs = 2;
		this.m_nNumberOfArms = 2;
		this.m_nNumberOfEyes = 2;
		this.m_nNumberOfArms = 2;
		this.m_nNumberOfFingers = 10;
		this.m_nNumberOfToes = 10;
		this.m_strHairLength = strHairLength;
		this.m_strHairType = strHairType;
		this.m_strEyeColour = strEyeColor;
		this.m_nHeight = nHeight;
		this.m_nWeight = nWeight;
		this.m_strName = strName;
		this.m_nAge = nAge;
	}
}
</pre>
<h1>Hungarian notation variable naming convention</h1>
<p>
	I am using a very specific naming convention here called 'Hungarian notation'. And the specific Microsoft Foundation 
	Class variant of it. Let's take 'm_nNumberOfLegs' as an example: 'm_' is short for 'member of class CPerson' (as 
	opposed to a stand alone variable that you would instead name 'nNumberOfLegs'. The 'n' is short for integer and 
	'NumberOfLegs' describes the purpose of the attribute. So briefly...
</p>	
<ul>
	<li><b>Classes: </b>prefix			 the class name with capital C, e.g. CPerson. This provides a very CLEAR way for others to 
	distinguish between your class names (CPerson or ikea instructions) and your objects (Person or physical Ikea bookshelf)</li>
	
	<li><b>Local variables:</b>
		<ul>
			<li><b>Strings or text (e.g. "Hello world"): </b>prefix			 the variable name with 'str', e.g. strStudentNumber 
			indicating to the next person that this variable will always contain string values.</li>
			
			<li><b>Integers or whole numbers (e.g. 3, -10, 203): </b>prefix			 the variable name with 'n', e.g. nStudentNumber, 
			indicating to the next person that this variable will always contain integer values.</li>
			
			<li><b>Floating point, real or decimal numbers (e.g. 3.142): </b>prefix			 the variable name with 'f', 
			indicating to the next person that this variable will always contain decimal values.</li>
		</ul>
	</li>
	<li><b>Class member variables or attributes: </b>prefix			 the variable with m_ (member of) and then follow the local 
	variable naming convention above, e.g. m_strStudentNumber.</li>
	
	<li><b>Global or 'God' variables</b>prefix			 the variable with g_ (global) and then follow the local variable 
	naming convention above, e.g. g_strStudentNumber.</li>
</ul>
<p>Data type and member indicators, i.e. str, n, f and m_ should ALWAYS be lower case. And you should capitalise the first 
letter of your variable name, and choose a name that intuitively describes the purpose of your variable. Following a 
naming convention does not really matter for a few lines of JavaScript code with a few variables. But it makes a BIG 
difference when you have hundreds of lines of JavaScript code spread across more than one file.</p>

<h1>Classes explained</h1>
<p>
	Let's also look at 'CPerson': 'C' denotes that CPerson is the 
	class definition, equivalent to the Ikea instructions. 'Person' would be an instance of class CPerson and equivalent 
	to the physical book shelf. You can read more about 'Hungarian notation by clicking 
	<a href="https://en.wikipedia.org/wiki/Hungarian_notation">here</a>.
</p>
<h1>'this' explained</h1>
<p>
	The word 'this' ia pre-defined word in JavaScript that, in this context, refers to the class CPerson. So you use it 
	to bring your class attributes or member variables into existence. Asking why you create class member variables by 
	means of 'this' and is there anything deeper to understand are pointless questions. You may as well ask why is the 
	engine of a car always at the front and why is the petrol tank spout always at the rear left of your car. The answer 
	to both questions is because that is the way the engineers arbitrarily decided to design cars! 
</p>
<p>
	And similarly for JavaScript, you use 'this' because that is the way that the inventors of JavaScript arbiitraily 
	decided to design JavaScript. Just go with it ;-)
</p>
<h1>Constructor function explained</h1>
<p>
	Notice that the constructor function has 7 parameters through which one passes in values for those class  
	attributes that have no fixed values. So, JavaScript, you would create a specific instance of a person, or a 
	person object, by doing the following<br/><br/>
	let Greg = new CPerson("short", "straight", "blue", 184, 98, "Greg", 60);
</p>
<h1>Class inherritance explained</h1>
<p>
	Now let's extend class CPerson to describe an actual person. In programing we call this 'inheritance'.
</p>
<pre>
class CPoliceOfficer extends CPerson
{
	constructor(strHairLength, strHairType, strEyeColor, nHeight, nWeight, strName, nAge, strBadgeNumber, strAssignedSataion, strTitle)
	{
		super("short", "straight", "blue", 184, 98, "Greg", 60);
		this.m_strBadgeNumber = strBadgeNumber;
		this.m_strAssignedSataion = strAssignedSataion;
		this.m_strTitle = strTitle;
	}
}
</pre>
<p>
	So you would create a specific instance of a police officer, or a police officer object, by doing the following<br/><br/>
	let PoliceOfficeGreg = new CPoliceOfficer("short", "straight", "blue", 184, 98, "Greg", 60, "098364573", "Preston", "constable");
</p>
<h1>Class methods or functions explained</h1>
<p>
	We can also define methods or functions for our classs. E.G.
</p>
<pre>
class CPerson
{
	constructor(strHairLength, strHairType, strEyeColor, nHeight, nWeight, strName, nAge)
	{
		this.m_nNumberOfLegs = 2;
		this.m_nNumberOfArms = 2;
		this.m_nNumberOfEyes = 2;
		this.m_nNumberOfArms = 2;
		this.m_nNumberOfFingers = 10;
		this.m_nNumberOfToes = 10;
		this.m_strHairLength = strHairLength;
		this.m_strHairType = strHairType;
		this.m_strEyeColour = strEyeColor;
		this.m_nHeight = nHeight;
		this.m_nWeight = nWeight;
		this.m_strName = strName;
		this.m_nAge = nAge;
	}
	
	DoWalk(nHowManyMeters, nCompasBearing)
	{
		.....
	}
	
	DoPayABill(strBillerName, nBillamount)
	{
		.....
	}
}
</pre>
<p>
	And we can invoke those methods like this:<br/><br/>
	let Greg = new CPerson("short", "straight", "blue", 184, 98, "Greg", 60);
	Greg.DoWalk(100 /*meters*/, 90 /*degrees or to the right*/);
	Greg.DoPayBill("GloBird Enery", /*$*/100)<br/><br/>
</p>
<h1>JavaScript comments</h1>
<p>
	/*meters*/ is one way you can create code plain English comments in JavaScript. Any text between the comment markers 
	is ignored by the web browser. The other way is to use:<br/><br/>
	 \\ This is a comment.<br/><br/>
	 In this case all the text to the right of the \\, up till the end of the line, will be ignored by the web browser. 
	 You can use comments to explain to other programmers how your code works and what its purpose is.
</p>

<h1>Pre-dfined JavaScript Objects</h1>
<p>There are a number of pre-defined 'objects that you have access to in JavaScript. They are vry much bigger and more 
complicated than the above very simple examples. But the general idea is the same.
</p>

<h2>window</h2>
<p>You can read about the full range of functions and attributes by clicking 
<a href="https://www.w3schools.com/jsref/obj_window.asp">here</a>.</p>

<p>The full list of methods and properties are not detailed here, just a subset that is frequently used in this website.</p>

<h3>Properties</h3>

<p>These properties are avialable to you without invoking the window object, e.g. you don't necessarily need to type 
'window.console', instead your can just type 'console'.</p>

<table class="table" border="1" cellpadding="5" cellspacing="0">
	<tr>
		<th>Property</th>
		<th>Description</th>
	</tr>
	<tr>
		<td><a href="#console">console</a></td>
		<td>
			Returns the console Object for the window.<br/>Click the console link to jump to the section about the console object. 
		</td>
	</tr>
	<tr>
		<td><a href="#document">document</a></td>
		<td>Returns the document object for the window.<br/>Click the document link to jump to the section about the document object.</td>
	</tr>
	<tr>
		<td><a href="#location">location</a></td>
		<td>Returns the location object for the window.<br/>Click the location link to jump to the section about the location object.</td>
	</tr>
	<tr>
		<td><a href="#localStorage">localStorage</a></td>
		<td>Allows to save key/value pairs in a web browser. Stores the data with no expiration date.<br/>Click the localStorage link to jump to the section about the localStorage object.</td>
	</tr>
	<tr>
		<td><a href="">screen</a></td>
		<td>Returns the screen object for the window.<br/>Click the screen link to jump to the section about the screen object.</td>
	</tr>
	<tr>
		<td><a href="#sessionStorage">sessionStorage</a></td>
		<td>Allows to save key/value pairs in a web browser. Stores the data for one session, that ends when you close the browser tab or the browser.<br/>Click the sessionStorage link to jump to the section about the sessionStorage object.</td>
	</tr>
</table>
 

<h3>Methods</h3>

<p>Again these properties are avialable to you without invoking the window object, e.g. you don't necessarily need to type 
'window.alert("Message");', instead your can just type 'alert("Message");'.</p>

<table class="table" border="1" cellpadding="5" cellspacing="0">
	<tr>
		<th>Method</th>
		<th>Description</th>
		<th>Example</th>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_win_alert.asp">alert(strMessage)</a></td>
		<td>Displays an alert box with a message and an OK button.</td>
		<td>
<pre>
alert("Hello! I am an alert box!");
</pre>
			<img src="images/alert.png" alt="alert.png" width="300" />
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_win_confirm.asp">confirm(strMessage)</a></td>
		<td>Displays a dialog box with a message and an OK and a Cancel button.</td>
		<td>
<pre>
let strResultMessage = "";

if (confirm("Press a button!\nEither OK or Cancel.") == true)
		strResultMessage = "You pressed OK!";
else
		strResultMessage = "You pressed CANCEL!";
</pre>
			<img src="images/confirm.png" alt="confirm.png" width="300" />	
  		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_win_prompt.asp">prompt(strMessage)</a></td>
		<td>Displays a dialog box that prompts the visitor for input.</td>
		<td>
<pre>
let strName = prompt("Please enter your name", "Harry Potter"/*Default name*/);
if (strName != null)
		document.getElementById("demo").innerHTML = "Hello " + strName + "! How are you today?";
</pre>	
			<img src="images/prompt.png" alt="prompt.png" width="300" />	
  		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_win_open.asp">open(strURL)</a></td>
		<td>Opens a new browser tab.</td>
		<td><pre>open("https://www.w3schools.com");</pre></td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_win_print.asp">print()</a></td>
		<td>Invokes your printer dialog box so you can prints the content of the current window.</td>
		<td><pre>print();</pre></td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_win_scrollby.asp">scrollBy(nNumPixelsHorizontal, nNumPixelsVertical)</a></td>
		<td>Scrolls the document by the specified number of pixels.</td>
		<td><pre>scrollBy(100, 0);</pre></td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_win_scrollto.asp">scrollTo(nNumPixelsHorizontalPosition, nNumPixelsVerticalPosition)</a></td>
		<td>Scrolls the document to the specified coordinates.</td>
		<td><pre>scrollTo(500, 0);</pre></td>
	</tr>
</table>

<h2 id="document">document</h2>
<p>To read more about the document object by clicking <a href="https://www.w3schools.com/js/js_htmldom_document.asp">here</a>.</p>

<p>Your entire HTML document (.html or .htm file) is read by the web browser and turned into an 'object' that you then 
have access to in JavaScript. It is called 'document' (case sensitive). So let's have a llok at some of the items you 
can find and change in the JavaScript object 'document'.</p>

<h3>Atributes or member variables</h3>
<p>This is just a few of the attributes available to you. You can learn about the many other by clicking the above link.</p>
<ul>
	<li>document.title: this gives you the text that you typed between the HTML tags &lt;title&gt;...&lt;/title&gt;</li>
	<li>document.head: this gives you the entire contents that you placed between the HTML tags &lt;head&gt;...&lt;/head&gt;</li>
	<li>document.body: this gives you the entire contents that you placed between the HTML tags &lt;body&gt;...&lt;/body&gt;</li>
	<li>document.URL: this gives you the full website URL of the web page, e.g. https://www.millhouse.org.au/index.php</li>
</ul>

<h3>Methods or member functions</h3>
<p>The 'document' object also contains a bunch of useful functions that you can use and these are the most frequently 
used ones in this website:</p>

<ul>
	<li>
		<b>let divElement = document.<a href="https://www.w3schools.com/Jsref/met_document_getelementbyid.asp">getElementById</a>("unique_id_4_div");</b><br/>
		This requires that you have a HTML element, some where in your web page, with this unique ID. For example:<br/>
<pre>&lt;div id="unique_id_4_div"&gt;Hello world!&lt;/div&gt;</pre>
		You should not use id="unique_id_4_div" for any other HTML element on your web page. You can use 
		id="other_unique_id_4_div" however. If you have more than one HTML element with the same ID, like this for 
		example:<br/>
<pre>
&lt;div id="unique_id_4_div"&gt;Hello world!&lt;/div&gt;
&lt;div id="unique_id_4_div"&gt;Hello world again!&lt;/div&gt;
</pre>
		In this example the second div is inaccessible via document.getElementById("unique_id_4_div");<br/>
		
		divElement is then a 'handle' to that particular HTML element. You can:
		<ul>
			<li><b>Interrigate or change the element's width or height: </b>alert(divElement.height); and  divElement.width = "100px";</li>
			<li><b>Interrigate or change the element's styles: </b>divElement.style.display = "none");, divElement.style.backgroundColor = "red"; and alert(divElement.style.color); /*text color*/</li>
			<li><b>Interrogate or change the element's contents as plain text: </b>alert(divElement.innerText); and divElement.innerText = "HELLO WORLD!";</li>
			<li><b>Interrogate or change the element's contents as HTML code: </b>alert(divElement.innerHTML); and divElement.innerHTML = "&lt;span style='color:red;'&gt;HELLO WORLD!&lt;/span&gt;";</li>
		</ul>
		<p>If an element with the specified id value 'unique_id_4_div' cannot be found then divElement will contain null. So you always 
		need to test for this to stop your JavaScript crashing when you try to access properties and methods in divElement. 
		You may have mispelled your id value or you may have forgotten to add an id property to your intended element.</p>
		<br/>
		Click <a href="https://www.w3schools.com/js/js_ex_dom.asp">here</a> to see a whole bunch more examples of what you 
		can access in an HTML element.
		<br/>
	</li>
	<li>
		<b>document.<a href="https://www.w3schools.com/jsref/met_doc_write.asp">write</a>("&lt;span style='color:red;&gt;HELLO WORLD!&lt;/span&gt;");</b><br/>
		This function allows you to generate dynamic web page content, e.g. based on the user's responses to questions. 
		There are example of its use in the W3Schools description of this function, accessible if you click the 
		hyperlink above.<br/>
	</li>
	<li>
	
	</li>

</ul>

<h2 id="console">console</h2>
<p>You can read more about the console object by clicking <a href="https://www.w3schools.com/jsref/prop_win_console.asp">here</a>.</p>
<p>
	The console is one of the tabs in a web browser's 'developer tools' and you can access it in Chrome by pressing 
	F12. You can use it as a debugging tool for your JavaScript code but you can also use it to find and fix JavaScript 
	syntax errors by clicking the hyperlinks in the error messages. You source code will appear with the line of code that
	caused the syntax error clearly highlighted.<br/>
	<img src="images/ChromeDeveloperToolsConsoleTabError.jpg" alt="ChromeDeveloperToolsConsoleTabError.jpg" width="800" />
</p>

<p>As for debugging these are some of the useful functions you can use to output variable values and other useful information 
that helps you to find parts of your code that are not working as you expected.</p>

<table class="table" border="1" cellpadding="5" cellspacing="0">
	<tr>
		<th>Function</th>
		<th>Description</th>
		<th>Example</th>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_console_assert.asp">assert()</a></td>
		<td>Logs a message only if the provided assertion is false. If true, nothing is outputted, which helps keep logs clean.</td>
		<td>
<pre>console.assert(false);</pre>
			<img src="images/ConsoleAssert.jpg" alt="ConsoleAssert.jpg" width="800" />
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_console_warn.asp">warn(strMessage)</a></td>
		<td>Similar to console.log(), but displays a message with a warning format (often yellow text/background) and a different log level, allowing filtering in developer tools.</td>
		<td>
<pre>console.warn("This is a warning!");</pre>
			<img src="images/ConsoleWarning.jpg" alt="ConsoleWarning.jpg" width="800" />
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_console_error.asp">error(strMessage)</a></td>
		<td>Displays an error message (often red text/background) to the console, useful for highlighting critical issues.</td>
		<td>
<pre>console.error("This is an error!");</pre>
			<img src="images/ConsoleError.jpg" alt="ConsoleError.jpg" width="800" />
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_console_info.asp">info(strInfo)</a></td>
		<td>Outputs an informational message to the console.</td>
		<td>
<pre>console.info("This is information!");</pre>
			<img src="images/ConsoleInfo.jpg" alt="ConsoleInfo.jpg" width="800" />
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_console_log.asp">log(strMessage)</a></td>
		<td>The most widely used method, it outputs a general message, variable value, or object to the console. It accepts multiple arguments, allowing you to combine text and object displays.</td>
		<td>
<pre>console.log("This is a log entry!");</pre>
			<img src="images/ConsoleLog.jpg" alt="ConsoleLog.jpg" width="800" />
		</td>
	</tr>
	<tr>
		<td><a href="https://www.w3schools.com/jsref/met_console_table.asp">table()</a></td>
		<td>Displays tabular data as a table, which is very useful for visualizing arrays of objects.</td>
		<td>
<pre>
console.table(["Audi", "Volvo", "Ford"]);
console.table({firstname:"John", lastname:"Doe"});
</pre>
			<img src="images/ConsoleTable.jpg" alt="ConsoleTable.jpg" width="800" />
		</td>
	</tr>
	<tr>
		<td>
			These functions are used in conjunction.
			<table border="0" cellpadding="0" cellspacing="0">
				<tr><td><a href="https://www.w3schools.com/jsref/met_console_group.asp">group()</a></td></tr>
				<tr><td><a href="https://www.w3schools.com/jsref/met_console_groupcollapsed.asp">groupCollapsed()</a></td></tr>
				<tr><td><a href="https://www.w3schools.com/jsref/met_console_groupend.asp">groupEnd()</a></td></tr>
			</table>
		</td>
		<td>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr><td>Creates a new inline group in the console. This indents following console messages by an additional level, until console.groupEnd() is called.</td></tr>
				<tr><td>Creates a new inline group in the console. However, the new group is created collapsed. The user will need to use the disclosure button to expand it.</td></tr>
				<tr><td>Exits the current inline group in the console.</td></tr>
			</table>
		</td>
		<td>
<pre>
console.log("Hello world!");
console.group();
console.log("Hello again, this time inside a group!");
console.groupEnd();
console.groupCollapsed();
console.log("Hello again, this time inside a collapsed group!");
console.groupEnd();
</pre>
			<img src="images/ConsoleGroup.jpg" alt="ConsoleGroup.jpg" width="800" />
		</td>
	</tr>
	<tr>
		<td><a href="">clear()</a></td>
		<td>Clears the console.</td>
		<td>
<pre>console.clear();</pre>
			<img src="images/Console.jpg" alt="Console.jpg" width="800" />
		</td>
	</tr>
</table>

<h3>Using the console tab to fix JavaScript syntax errors</h3>
<p>The web browser will step through your HTML and JavaScript code one line at a time. If it encounters an error in 
your JavaScript code then the web browser just stops rendering your web page completely. You may find parts of your 
web page hugely distorted or entirely missing. This is the tell take sign that you have an error in your JavaScript 
code. So how do you find it? In Chrome you simply hit F12 and the developer tools window will appear at the bottom 
or the right side of the web browser window. You can drag this window with the mouse cursor to re-position it and 
resize it. Notice the tabs along the top edge: 'Elements', 'Console', 'sources', 'Network',... Click the 'Console' 
tab. Any JavaScript errors will be displayed here.<br/>
<img src="images/ChromeDeveloperToolsConsoleTabError.jpg" alt="ChromeDeveloperToolsConsoleTabError.jpg" width="800" /><br/>
So it is telling you that there is an error in the currently loaded web page (JavaScript_4_beginners.html) on line number 
397. So to see that line number simply click on the underlined hyperlink in the error message:
<img src="images/ChromeDeveloperToolsSourceCode.jpg" alt="ChromeDeveloperToolsSourceCode.jpg" width="800" /><br/>
The error message tells you that nMyAge is not defined. If you look at the source code I have failed to declare nMyAge 
via a 'let statement', and to correct it I need to make following changes to the source code in MS Expression Web:
</p>
<pre>
&lt;script type="text/javascript"&gt;
        let nMyAge = 0;
        let nAge = nMyAge;
        nAge = 30;
&lt;/script&gt;        
</pre>
<p>
HOWEVER keep in mind that, if your original web page contains any PHP code, then that PHP code will have been removed by 
the web server before sending the web page to your web browser. So the line number above may not match the line number 
in your original web page in Expression Web (that DOES contain the PHP code).
</p>

<h2 id="screen">screen</h2>
<p>You can read more about the screen object by clicking 
<a href="https://www.w3schools.com/jsref/obj_screen.asp">here</a>.</p>

<table class="table" border="1" cellpadding="5" cellspacing="0">
	<tr>
		<th>Name</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>screen.width</td>
		<td>The screen.width property returns the width of the visitor's screen in pixels.</td>
	</tr>
	<tr>
		<td>screen.height</td>
		<td>The screen.height property returns the height of the visitor's screen in pixels.</td>
	</tr>
	<tr>
		<td>screen.availWidth</td>
		<td>The screen.availWidth property returns the width of the visitor's screen, in pixels, minus interface features like the Windows Taskbar.</td>
	</tr>
	<tr>
		<td>screen.availHeight</td>
		<td>The screen.availHeight property returns the height of the visitor's screen, in pixels, minus interface features like the Windows Taskbar.</td>
	</tr>
	<tr>
		<td>screen.colorDepth</td>
		<td>
			The screen.colorDepth property returns the number of bits used to display one color.<br/>
			All modern computers use 24 bit or 32 bit hardware for color resolution:
			<ul>
				<li>24 bits: 16,777,216 different "True Colors"</li>
				<li>32 bits = 4,294,967,296 different "Deep Colors"</li>
				<li>Older computers used 16 bits: 65,536 different "High Colors" resolution</li>
				<li>Very old computers, and old cell phones used 8 bits: 256 different "VGA colors"</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td>screen.pixelDepth</td>
		<td>The screen.pixelDepth property returns the pixel depth of the screen. For modern computers, Color Depth and Pixel Depth are equal.</td>
	</tr>
</table>

<h2 id="location">location</h2>
<p>You can read more about the screen object by clicking <a href="https://www.w3schools.com/js/js_window_location.asp">here</a>.</p>

<table class="table" border="0" cellpadding="5" cellspacing="0">
	<tr>
		<th>Proprty name</th>
		<th>Description</th>
		<th>Example</th>
	</tr>
	<tr>
		<td>window.location.href</td>
		<td>Returns the href (URL) of the current page. Or redirects the browser tab to a new URL.</td>
		<td>
			console.log(window.location.href); // Output will be: https://www.w3schools.com/js/tryit.asp?filename=tryjs_loc_href<br/>
			window.location.href = "https://www.millhouse.org.au"; // This web will open in the bbrowser tab.
		</td>
	</tr>
	<tr>
		<td>window.location.hostname</td>
		<td>Returns the domain name of the web host.</td>
		<td>console.log(window.location.hostname); // Output will be: www.w3schools.com</td>
	</tr>
	<tr>
		<td>window.location.pathname</td>
		<td>Returns the path and filename of the current page.</td>
		<td>console.log(window.location.pathname); // Output will be: /js/tryit.asp</td>
	</tr>
	<tr>
		<td>window.location.protocol</td>
		<td>Returns the web protocol used (http: or https:).</td>
		<td>console.log(window.location.protocol); // Output will be: https:</td>
	</tr>

</table>

<h2 id="localStorage">localStorage</h2>
<p>You can read more about the localStorage object by clicking <a href="https://www.w3schools.com/jsref/prop_win_localstorage.asp">here</a>.</p>

<p>
	This is a place you can permantently store JavaScript data that you need for your web page. The data will 
	be available for the specific web page even if the user closes the web browser and opens it and your web page 
	a few days later. You have to explicity remove any data your store in the localStorage object. You store your 
	data as key/value pairs.E.G.<br/><br/>
	localStorage.setItem("lastname", "Smith"); // Stores the key/value pair.
	console.log(localStorage.getItem("lastname")); // Output will be "Smith" or undefined if the key does not exist.
</p>
<p>Values you store in localStorage remain even if the user refreshes the web page, where as the value of all your 
global JavaScript variables will be lost.</p>

<h2 id="sessionStorage">sessionStorage</h2>
<p>You can read more about sessionStorage object by clicking 
<a href="https://www.w3schools.com/jsref/prop_win_sessionstorage.asp">here</a>.</p>

<p>
	This is a place you can temprarily store JavaScript data that you need for your web page. The data will be available 
	for the specific web page as long as the user does not close the web browser or the tab. You store your data as 
	key/value pairs.E.G.<br/><br/>
	sessionStorage.setItem("lastname", "Smith"); // Stores the key/value pair.
	console.log(sessionStorage.getItem("lastname")); // Output will be "Smith" or undefined if the key does not exist
</p>
<p>Values you store in sessionStorage remain even if the user refreshes the web page, where as the value of all your 
global JavaScript variables will be lost.</p>

<h2>Math</h2>
<p>You can read more about the Math object constant and functions by clicking 
<a href="https://www.w3schools.com/js//js_math.asp">here</a>.</p>

<h3>Constants</h3>
<table class="table" border="1" cellpadding="5" cellspacing="0">
	<tr>
		<th>Name</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>Math.E</td> 
		<td>Reurns Euler's number or 2.71828182845...</td>
	</tr>
	<tr>
		<td>Math.PI</td>
		<td>Returns PI or 3.14159265359...</td>
	</tr>
	<tr>
		<td>Math.SQRT2</td>
		<td>Returns the square root of 2 0r 0.69314...</td>
	</tr>
	<tr>
		<td>Math.SQRT1_2</td>
		<td>Returns the square root of 1/2 or 0.70710678118...</td>
	</tr>
	<tr>
		<td>Math.LN2</td>
		<td>Returns the natural logarithm of 2 or 0.69314718056...</td>
	</tr>
	<tr>
		<td>Math.LN10</td>
		<td>Returns the natural logarithm of 10 or 2.30258509299...</td>
	</tr>
	<tr>
		<td>Math.LOG2E</td>
		<td>Returns base 2 logarithm of E or 1.44269504...</td>
	</tr>
	<tr>
		<td>Math.LOG10E</td>
		<td>Returns base 10 logarithm of E or 0.434294481...</td>
	</tr>
</table>


<h3>Functions</h3>
<p>These functions return NaN (not a number) if x is not a number.</p>
<table class="table" border="1" cellpadding="5" cellspacing="0">
	<tr>
		<th>Name</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>Math.round(x)</td>
		<td>Returns x rounded to its nearest integer.</td>
	</tr>
	<tr>
		<td>Math.ceil(x)</td>
		<td>Returns x rounded up to its nearest integer.</td>
	</tr>
	<tr>
		<td>Math.floor(x)</td>
		<td>Returns x rounded down to its nearest integer.</td>
	</tr>
	<tr>
		<td>Math.trunc(x)</td>
		<td>Returns the integer part of x.</td>
	</tr>
	<tr>
		<td>Math.pow(x, y)</td>
		<td>Returns the value of x to the power of y.</td>
	</tr>
	<tr>
		<td>Math.sqrt(x)</td>
		<td>Returns the square root of x.</td>
	</tr>
	<tr>
		<td>Math.abs(x)</td>
		<td>Returns the absolute (positive) value of x.</td>
	</tr>
	<tr>
		<td>Math.sin(x)</td>
		<td>
			Returns the sine (a value between -1 and 1) of the angle x (given in radians).<br/>
			If you want to use degrees instead of radians, you have to convert degrees to radians.<br/>
			Angle in radians = Angle in degrees * PI / 180.
		</td>
	</tr>
	<tr>
		<td>Math.cos(x)</td>
		<td>
 			Returns the cosine (a value between -1 and 1) of the angle x (given in radians).<br/>
			If you want to use degrees instead of radians, you have to convert degrees to radians.<br/>
			Angle in radians = Angle in degrees x PI / 180.		
		</td>
	</tr>
	<tr>
		<td>Math.min(a, b, c, d, ...) and Math.max((a, b, c, d, ...)</td>
		<td>These return the lowest and highest value in a list of arguments.</td>
	</tr>
	<tr>
		<td>Math.random()</td>
		<td>Returns a random number between 0 (inclusive), and 1 (exclusive)</td>
	</tr>
	<tr>
		<td>Math.log(x)</td>
		<td>
			Returns the natural logarithm of x.<br/>
			The natural logarithm returns the time needed to reach a certain level of growth.		
		</td>
	</tr>
	<tr>
		<td>Math.log2(x)</td>
		<td>Returns the base 2 logarithm of x.</td>
	</tr>
	<tr>
		<td>Math.log10(x)</td>
		<td>Returns the base 10 logarithm of x.</td>
	</tr>
</table>

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

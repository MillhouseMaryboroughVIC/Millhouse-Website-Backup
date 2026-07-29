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
		<title>Expression Web 4 Beginners</title>
		
		<style type="text/css">
</style>
		<script type="text/javascript">
		
			function DoOnPageLoadComplete()
			{
			}
			
		</script>


		<!-- #EndEditable -->
		<script type="text/javascript">
			
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
				document.getElementById("style_sheet").setAttribute("href", <?php echo "\"" . DoGetParentOrCurrentDir() . "\""; ?> + "styles/style4Mobile.css");
			}
			
		</script>
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Gluten:wght@100..900&family=Permanent+Marker&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+J:ital,wght@0,100..400;1,100..400&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet" />
	</head>
	<body onload="DoOnPageLoadComplete()">

		<!-- Begin Container -->
		<div id="container">
			<!-- Begin Masthead -->
			<div class="masthead">
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
										<h1 class="gluten">Mill House</h1>
									</td>
								</tr>
								<tr>
									<td>
										<h3 class="gluten">Neighbourhood House &#128522;</h3>
									</td>
								</tr>
							</table>
						</td>
						<td class="masthead_cell_image_right">
							<a href="../images/MillHouseNeighborhoodHouse1.jpg">
							<img src="../images/MillHouseNeighborhoodHouse1.jpg" alt="MillHouseNeighborhoodHouse1.jpg" class="masthead_image" /></a>
						</td>
						<td class="masthead_cell_image_right">
							<a href="../images/MillHouseNeighborhoodHouse2.jpg">
							<img src="../images/MillHouseNeighborhoodHouse2.jpg" alt="MillHouseNeighborhoodHouse.jpg" class="masthead_image" /></a>
						</td>
						<!--
						<td class="masthead_cell_image_right">
							<a href="images/Mural.jpg.jpg"><img src="images/Mural.jpg" alt="Mural.jpg" class="masthead_image" /></a>
						</td>
						-->
						<td class="masthead_cell_sponsors">
<div class="sponsors_container">					
	<img src="../sponsors/images/NHHV.png" alt="NHHV.png" id="img_NHHV" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/VicStateGov.jpg" alt="VicStateGov.jpg" id="img_VSG" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/CentralGoldfields.png" alt="CentralGoldfields.png" id="img_CGSC" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/FRRR.png" alt="FRRR.png" id="img_FRRR" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/BendigoBank.jpg" alt="BendigoBank.jpg" id="img_BB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/JWR.png" alt="JWR.png" id="img_JWR" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/WattleOffice.jpg" alt="WattleOffice.jpg" id="img_WOS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/FoodBank.png" alt="FoodBank.png" id="img_FB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/FoodShare.png" alt="FoodShare.png" id="img_FS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/Aldi.png" alt="Aldi.png" id="img_ALD" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/ParkviewBakery.jpg" alt="ParkviewBakery.jpg" id="img_PVB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/MaryboroughFloorCoverings.jpg" alt="MaryboroughFloorCoverings.jpg" id="img_MFC" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/SilverService.png" alt="SilverService.png" id="img_SS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="../sponsors/images/GoldfieldsScreens.png" alt="GoldfieldsScreens.png" id="img_GSAB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
</div>
						</td>
					</tr>
				</table>				
			</div>
			<!-- End Masthead -->
			<div class="below_masthead">
				<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style="vertical-align:top;">
							<!-- Begin Navigation -->
							<div class="navigation" id="navigation">
							
								<table border="0" cellpadding="0" cellspacing="0" style="height:var(--nav_height);">
									<tr>
										<td>
<div id="navigation_menu" class="navigation_menu" ontransitionend="DoOnNavMenuTransitioned()">
	
	<?php echo DoGetDontationHTML(); ?>

	<ul>
		<li><a href="../index.php">Home</a></li>
		<li><a href="../about/about.php">About Mill House</a></li>
		<li><a href="../Calendar/Calendar.php">Events Calendar</a></li>
		<li><a href="../room/room.php">Hire a room</a></li>
		<li><a href="../sponsors/sponsors.php">Our Collaborators</a></li>
		<li>
			<a href="../contribute/contribute.php" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item"><a href="../contribute/join.php"><b>Become a member</b></a></li>
				<li class="submenu_item">
				<a href="../contribute/volunteering.php"><b>Become a volunteer</b></a></li>
				<li class="submenu_item"><a href="../request_sponsorship.php"><b>Become a sponsor</b></a></li>
				<li class="submenu_item"><a href="../contribute/donation.php"><b>Make a donation</b></a></li>
			</ul>
		</li>
		<!--<li><a href="people/people.php">Mill House People</a></li>-->
		<!--<li><a href="milestones/milestones.php">Milestones</a></li>-->
		<li><a href="../contact/Contact.php">Contact</a></li>
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
		<li>
			<a href="administration.php" onclick="<?php if (IsLoggedIn()) echo "DoClickNavLinkWithSubmenu('admin')"; ?>">Administration</a>
			<ul style="display:<?php if (isLoggedIn()) echo DoShowHideSubmenu("admin"); else echo "none"; ?>;" id="admin">
				<li class="submenu_item"><a href="edit_groups.php"><b>Add &amp; Edit Groups</b></a></li>
				<li class="submenu_item"><a href="approve_sponsorship.php"><b>Approve a sponsor</b></a></li>
				<li class="submenu_item"><a href="renew_sponsorship.php"><b>Renew a sponsor</b></a></li>
				<li class="submenu_item"><a href="friday_feast_menu.php"><b>Update Friday feast menu</b></a></li>
				<li class="submenu_item"><a href="governance.php"><b>Upload governance documents</b></a></li>
				<li class="submenu_item">
				<a href="../governance/forms/forms.php"><b>Blank Forms</b></a></li>
				<li class="submenu_item"><a href="web_diagnostics.php"><b>Website diagnostics</b></a></li>
				<li class="submenu_item"><a href="html_4_beginners.php"><b>HTML 4 Beginners</b></a></li>
				<li class="submenu_item"><a href="css_4_beginners.php"><b>CSS 4 Beginners</b></a></li>
				<li class="submenu_item"><a href="javascript_4_beginners.php"><b>JavaScript 4 Beginners</b></a></li>
				<li class="submenu_item">
				<a href="expression_web_4_beginners.php"><b>Expression Web 4 Beginners</b></a></li>
			</ul>
		</li>
	</ul>
</div>
										</td>
										<td>
<div id="navigation_arrow" class="navigation_arrow">
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
							<div class="content" id="content">
								<br/>						
								<div class="page_heading"><u><script type="text/javascript">document.write(document.title);</script></u></div>

								<!-- #BeginEditable "CustomContent" -->
								<h1>Introduction</h1>
								<p>It is important to know that MS Expression Web is not industry standard web editing 
								software. You could not use it to edit complex coporate web sites. However for much 
								simpler not for profit organisationsm small business and personal web sites it is STILL 
								excellent web editing software.</p>
								
								<p>Microsoft 'retired' it is about 2012 and it is now FREE to use. Itdoes use an earlier 
								verion of HTML, while modern web browsers now use the version 5 standard. However this 
								does not present a signficant problem when editing simple web pages and site, and you 
								can easily work around this limitation. And Expression Web has features, that make 
								editing an entire web site really quick and easy, that are just not available in paid 
								&amp; licensed web editing software.</p>

								<p>You can download it from <a href="https://www.majorgeeks.com/mg/getmirror/microsoft_expression_web,1.html">here</a>.</p>

								<h1><u>D</u>ynamic <u>W</u>eb <u>T</u>emplate System</h1>
								<p>The is one of the unique features of MS Expression Web that makes editing an entire 
								web so easy. The other feature is the 'site wizard' that creates an entire functioning 
								web site, based on the template you select, with a few clicks of your mouse. In the process 
								of creating your new web site MS Expression Web create a template file named 'master.dwt'. 
								Now all the other web pages in your web site are 'built' from that template file. It is a 
								similar idea to MS Word's document templates (.dot files).</p>
								
								<p>The file master.dwt sets out the editable and non-editable parts of your web pages. So, by 
								editing this one special file, you can change the colour scheme and layout of ALL the other web 
								pages. MS Expression Web will ask you if you want to update them all whenever you make changes to 
								master.dwt.</p>
								
								<p>MS Expression Web uses HTML comments &lt;!-- ... -&gt; to mark out different regions of your 
								web pages. And web browsers ignore HTML comments. So this is what master.dwt looks like when open 
								in Expression Web.<br/>
								<img src="/admin/images/ExpressionDWT.jpg" alt="ExpressionDWT.jpg" width="1000" /><br/>You can see that it 
								is fully editable like a regular text file. Note this HTML comment: 
								<span style="color:green">&lt;!-- #BeginEditable "CustomTitle" --&gt;</span>. This is how Expression 
								Web marks a region of a web page that is freely editable and not specified on the template.</p>
								
								<p>This is what a web page, that is built from master.dwt, looks like when opened in Expression Web.<br/>
								<img src="/admin/images/ExpressionWebPage.jpg" alt="ExpressionWebPage.jpg" width="1000" /><br/>
								Now notice that most of the text in this newly created web page has a yellowish background color. That 
								means 'don't change this text'. All the HTML code with the yellowish background is controlled by 
								master.dwt. If you edit any if this text and try to save the document then Expression Web will try and 
								convince to replace your changes with what is specified in master.dwt for that region of the file.</p>
								
								<p>Also notice the the bit around "Insert content here" with the white text background. That is the part of 
								the web page that master.dwt marks as editable and should contain content that is specific for this web page. 
								You can type freely in this part of the web page, save your changes and Expression Web will not complain.</p>
								
								<p>Also notice that you have a windows file explorer like construct that allows you to see and browser through 
								all the files and folders that make up the entire web site. You can also create new folders and files by right 
								clicking in here. For example, if you want to create a new web page based on master.dwt, then right click
								on that file and select 'New from Dynamic Web Template'.<br/>
								<img src="/admin/images/ExpressionNewDWT.jpg" alt="ExpressionNewDWT.jpg" width="1000" /></p>

								<h1>Editing HTML Tags</h1>
								<p>As you edit your HTML tags Expression Web will display context sensitive popup menus 
								that list all the option avilable to you. But remember that Expression Web uses an earlier 
								verion of HTML than what modern web browsers use. So these popup will not show you any options
								 that are part of HTML version 5 only. So just keep that at the back of your mind.</p>
								<h2>List of tag names</h2>
								<p>As soon as you type '&lt;' You will see this popup menu:<br/>
								<img src="/admin/images/ExpressionTagPopup.jpg" alt="ExpressionTagPopup.jpg" width="100" /><br/>
								You can scroll through this list and press ENTER when you find the tag you are looking for 
								and Expression Web will type the tag name for you.</p>
								
								<p>The type a space and you will see this popup menu:<br/>
								<img src="/admin/images/ExpressionPropertyPopup.jpg" alt="ExpressionPropertyPopup.jpg" width="100" /><br/>
								So expression web gives you a list of all the properties that are valid for that tag. Scroll 
								through the list, find the property you are looking for and press ENTER. Again Expression Web does 
								all the typing for you. Type another space and you will get the same list of valid properties
								 for that tag. This will continue until you close the tag with &gt;</p>
								 
								<p>This is a rather convenient way for you to get to know the tag names and the different properties 
								that you can apply to them.</p>

								<h1>Editing CSS</h1>
								<p>If you add a 'style' property to one of your HTML elements then Expression Web will show you 
								this popup menu. E.G. &lt;img style="|", with the cursor sitting between the double quotes.
								This also works when typing between the &lt;style&gt;...&lt;/style&gt; tags.< br/>
								<img src="/admin/images/ExpressionPropertyPopup.jpg" alt="ExpressionPropertyPopup.jpg" width="100" /><br/>
								This is a list of all the CSS attributes that you can apply to your HTML tag. If you select one then 
								press ENTER then Expression Web does the typing for you. THEN if you type a colon (:) then Expression 
								Web will show you yet another popup menu.<br/>
								<img src="/admin/images/ExpressionPropertyValuePopup.jpg" alt="ExpressionPropertyValuePopup.jpg" width="300" /><br/>
								This time containing all the valid values that you can use with this CSS property. Select a property value 
								by pressing ENTER and Expression Web does the typing for you. If you then type a semi-colon 
								Expression Web will show you the list of CSS properties again.</p>
								
								<p>Again this a is a really convenient way to get to know many of the CSS attributes you can play around 
								with, and the valid values that can be applied to them.</p>
								
								<h1>Syntax error highlighting</h1>
								<p>Another really useful feature of Expression Web is that it highlights syntax errors in 
								both your HTML tags and your CSS. For example:<br/>
								<img src="/admin/images/ExpressionTagError.jpg" alt="ExpressionTagError.jpg" width="600" /><br/>
								If you look carefully at the &lt;h1&gt; tag below the Latin filler text you shuld notice 
								that it has a red underline. If you hover your mouse over that re underlined tag you will 
								see what the problem is:<br/>
								<img src="/admin/images/ExpressionTagErrorHover.jpg" alt="ExpressionTagErrorHover.jpg" width="600" /><br/>
								'&lt;p&gt; tag cannot contain a &lt;h1&gt; tag' means that I have opened a &lt;p&gt; tag before 
								the Latin filler text, but I have failed to close the tag - the &lt;/p&gt; is missing. If I add 
								that missing tag then the red underlining of the &lt;h1&gt; tag will disappear. The error message 
								is telling you the same thing that I have explained <a href="../\html_4_beginners.html#illegal_nesting">here</a>.
								</p>
								
								<p>Now in this example I have partially closed the &lt;p&gt; tag but I have neglected to add the 
								closing angle bracket to my &lt;/p tag. Now notice the yellow text backround highlighting in two 
								places.<br/>
								<img src="/admin/images/ExpressionMissingBracket.jpg" alt="ExpressionMissingBracket.jpg" width="600" /><br/>
								Again, if you hover your mouse over the highlighted text you will get an error message:<br/>
								<img src="/admin/images/ExpressionMissingBracketHover.jpg" alt="ExpressionMissingBracketHover.jpg" width="600" /><br/>
								You also get yellow text background highlighting if you accidently duplicate tags, as in this example:<br/>
								<img src="/admin/images/ExpressionDuplicatedTags.jpg" alt="ExpressionDuplicatedTags.jpg" width="100" /><br/>
								This feature makes it particularly easy to spot common errors in your HTML code.</p>
								
								
								<h1>Code, Split &amp; Design Tabs</h1>
								<p>These are located at the bottom left of the editing window. The 'design' tab shows you a
								rough rendering of your web page as it would appear in a web browser. But it is imperfect 
								and there may be inconsistencies between how you page appears here and how it appears in your 
								web browser.<br/>
								<img src="/admin/images/ExpressionDesignTab.jpg" alt="ExpressionDesignTab.jpg" width="1000" /></p>
								
								<p>But that is not all you can do in this tab. You can actually edit the content in much the 
								same way as you edit a Word document. You can add new paragraphs, hyperlinks, page bookmarks and 
								images. Just explore the 'Insert' popup menu. And you can also change text characteristics (bold, 
								italic and underlined), create bulleted and numbered lists and change text alignment (left, center 
								and right). Just explore the toolbar at the top of the editing window.</p>
								
								<p>And then switch to the code tab to see what tags and properties have been added. 
								Again a convenient way to get to know the tags and properties. The slit view shows you 
								both the HTML code and the rendering at the same time.</p>
								
								<p>If you want to view your web page in a web browser then locate it in the file explorer on the
								 left hand side, right click, select 'Open with' and then click on your web browser in the list. 
								 Your web page will then open in the web browser.<br/>
								 <img src="/admin/images/ExpressionOpenWith.jpg" alt="ExpressionOpenWith.jpg" width="1000" /></p>
								 <h1>Renaming files and folders</h1>
								 <p>Another incredibly useful feature of Expression Web is, if you rename your HTML documents, 
								 your image file names or even your folders then Expression Web will search through ALL the HTML 
								 files, linked to master.dwt, find all the hyperlinks to them or involving them and change the 
								 values of their href properties accordingly. But you have to do this within Expression Web and not 
								 in Windows file explorer.</p>
								 <h1>Conclusion</h1>
								 <p>MS Expression Web may, deprecated software since 2012 however, with all these VERY helpful 
								 features, I have not found its match among even paid &amp; and licensed web editing software over 
								 the last 10 years or so. And it is toally FREE to use now.</p>
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
				<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr class="footer_pc_row">
						<td class="footer_table_cell">&copy;Mill House, Maryborough, VIC</td>
						
						<td class="footer_table_cell footer_middle_cell">COME ALONG AND JOIN THE MILL HOUSE COMMUNITY <h2 style="display:inline;">&#128522;</h2></td>
						
						<td class="footer_table_cell">Web site by: Gregary Boyles 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)</td>
					</tr>
					<tr class="footer_mobile_row">
						<td class="footer_table_cell">&copy;Mill House, Maryborough, VIC</td>
					</tr>
					<tr class="footer_mobile_row">
						<td class="footer_table_cell footer_web_admin" colspan="6">Web site by: Gregary Boyles, 2026 (&#x67;&#x72;&#x65;&#x67;&#x70;&#x6C;&#x61;&#x6E;&#x74;&#x73;&#x40;&#x62;&#x69;&#x67;&#x70;&#x6F;&#x6E;&#x64;&#x2E;&#x63;&#x6F;&#x6D;)</td>
					</tr>
				</table>
			</div>
			<!-- End Footer --></div>
		<!-- End Container -->
	</body>
	
</html>

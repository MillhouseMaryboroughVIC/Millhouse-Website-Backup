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
		<title>Our Collaborators</title>
		
		<style type="text/css">







			.content img
			{
				height: 150px;
			}
			
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
	<img src="images/NHHV.png" alt="NHHV.png" id="img_NHHV" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/VicStateGov.jpg" alt="VicStateGov.jpg" id="img_VSG" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/CentralGoldfields.png" alt="CentralGoldfields.png" id="img_CGSC" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/FRRR.png" alt="FRRR.png" id="img_FRRR" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/BendigoBank.jpg" alt="BendigoBank.jpg" id="img_BB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/JWR.png" alt="JWR.png" id="img_JWR" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/WattleOffice.jpg" alt="WattleOffice.jpg" id="img_WOS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/FoodBank.png" alt="FoodBank.png" id="img_FB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/FoodShare.png" alt="FoodShare.png" id="img_FS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/Aldi.png" alt="Aldi.png" id="img_ALD" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/ParkviewBakery.jpg" alt="ParkviewBakery.jpg" id="img_PVB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/MaryboroughFloorCoverings.jpg" alt="MaryboroughFloorCoverings.jpg" id="img_MFC" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/SilverService.png" alt="SilverService.png" id="img_SS" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
	<img src="images/GoldfieldsScreens.png" alt="GoldfieldsScreens.png" id="img_GSAB" onclick="DoClickSponsor('<?php echo DoGetParentOrCurrentDir(); ?>')" />
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
		<li><a href="sponsors.php">Our Collaborators</a></li>
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
			<a href="../admin/administration.php" onclick="<?php if (IsLoggedIn()) echo "DoClickNavLinkWithSubmenu('admin')"; ?>">Administration</a>
			<ul style="display:<?php if (isLoggedIn()) echo DoShowHideSubmenu("admin"); else echo "none"; ?>;" id="admin">
				<li class="submenu_item"><a href="../admin/edit_groups.php"><b>Add &amp; Edit Groups</b></a></li>
				<li class="submenu_item">
				<a href="../admin/approve_sponsorship.php"><b>Approve a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="../admin/renew_sponsorship.php"><b>Renew a sponsor</b></a></li>
				<li class="submenu_item">
				<a href="../admin/friday_feast_menu.php"><b>Update Friday feast menu</b></a></li>
				<li class="submenu_item"><a href="../admin/governance.php"><b>Upload governance documents</b></a></li>
				<li class="submenu_item">
				<a href="../governance/forms/forms.php"><b>Blank Forms</b></a></li>
				<li class="submenu_item"><a href="../admin/web_diagnostics.php"><b>Website diagnostics</b></a></li>
				<li class="submenu_item">
				<a href="../admin/html_4_beginners.php"><b>HTML 4 Beginners</b></a></li>
				<li class="submenu_item"><a href="../admin/css_4_beginners.php"><b>CSS 4 Beginners</b></a></li>
				<li class="submenu_item">
				<a href="../admin/javascript_4_beginners.php"><b>JavaScript 4 Beginners</b></a></li>
				<li class="submenu_item">
				<a href="../admin/expression_web_4_beginners.php"><b>Expression Web 4 Beginners</b></a></li>
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
								
<h1>Our Funders, Sponsors and Community Partners</h1>

<p>Mill House is proud to work alongside government agencies, community organisations, local businesses and generous 
supporters who help us deliver programs, improve our facilities and provide practical assistance to the Central 
Goldfields community.</p>

<p>Their funding, donations, food rescue partnerships, professional services and ongoing support make an important 
contribution to the work we do.</p>

<h1>Our Funders and Supporters</h1>
<h2 id="NHHV">Neighborhood Houses Victoria</h2>

<p><img src="images/NHHV.png" alt="NHHV.png" /></p>
<p>Neighbourhood Houses Victoria supports and represents Neighbourhood Houses across the state. Mill House is 
proud to be part of this wider network of community-led organisations.</p>

<p><a href="https://www.nhvic.org.au/">https://www.nhvic.org.au/</a></p>

<h2 id="VSG">Victorian State Government - Department of Families, Fairness &amp; Housing</h2>
<p><img src="images/VicStateGov.jpg" alt="VicStateGov.jpg" /></p>
<p>The Victorian Government provides essential funding to Mill House through the Neighbourhood House Coordination 
Program. This funding supports our role in bringing people together, strengthening community connections and 
responding to local needs.</p>

<p><a href="https://www.dffh.vic.gov.au/">https://www.dffh.vic.gov.au/</a></p>

<h2 id="CGSC">Central Goldfields Shire Council</h2>
<p><img src="images/CentralGoldfields.png" alt="CentralGoldfields.png" /></p>
<p>Central Goldfields Shire Council supports Mill House through community partnerships and grant opportunities. 
Recent Council funding helped us install new blinds throughout several areas of the building, improving comfort 
and energy efficiency for our visitors and program participants.</p>

<p><a href="https://www.centralgoldfields.vic.gov.au/">https://www.centralgoldfields.vic.gov.au/</a></p>

<h2 id="BB">Bendigo Bank Community Bank Maryborough</h2>
<p><img src="images/BendigoBank.jpg" alt="BendigoBank.jpg" /></p>
<p>Mill House banks with Community Bank Maryborough, which has a strong history of supporting local organisations 
and community initiatives. The bank has previously provided funding to support our community food programs.</p>

<p><a href="https://www.bendigobank.com.au/branch/vic/community-bank-maryborough/">https://www.bendigobank.com.au/branch/vic/community-bank-maryborough/</a></p>

<h2 id="FRRR">Foundation for Rural &amp; Regional Renewal</h2>
<p><img src="images/FRRR.png" alt="FRRR.png" /></p>
<p>The Foundation for Rural & Regional Renewal supports community-led projects that strengthen rural and 
regional communities. FRRR funding has helped Mill House develop the Food Shed and undertake an important 
technology and Digital Hub upgrade.</p>

<p><a href="https://frrr.org.au/">https://frrr.org.au/</a></p>

<h2 id="JWR">JWR - Accounting &amp; Advisory Service</h2>
<p><img src="images/JWR.png" alt="JWR.jpg" /></p>
<p>Joel Radlof from JWR Accounting & Advisory Service generously donated $1,000 to Mill House. This contribution 
supports programs and activities that directly benefit members of our local community.</p>

<p><a href="https://jwraccounting.com.au/">https://jwraccounting.com.au/</a></p>
										
<h2 id="SS">Silver Service</h2>
<p><img src="images/SilverService.png" alt="SilverService.png" /></p>
<p>Through the SilverChef Community Grants Program, Mill House received funding to purchase much-needed equipment 
for our commercial kitchen. This included a new bain-marie, induction cooktops, a sandwich press and stainless-steel 
benches.</p>

<p><a href="http://sshospitality.com.au">http://sshospitality.com.au</a></p>

<h1>Food Relief Partners</h1>

<h2 id="FB">Foodbank</h2>
<p><img src="images/FoodBank.png" alt=".png" /></p>
<p>Foodbank Victoria provides Mill House with access to affordable food and essential grocery items. These supplies 
are distributed through our Thursday Food Share Market and 24/7 Community Pantry or used to prepare meals through 
the Mill House Café and Friday Feast.</p>

<p><a href="https://www.foodbank.org.au/vic/">https://www.foodbank.org.au/vic/</a></p>

<h2 id="FS">Foodshare</h2>
<p><img src="images/FoodShare.png" alt=".png" /></p>
<p>Bendigo Foodshare provides affordable food items that support our food relief and community meal programs. These 
items help stock our Thursday Food Share Market and 24/7 Community Pantry and are also used in meals prepared at Mill 
House.</p>

<p><a href="https://bendigofoodshare.org.au/">https://bendigofoodshare.org.au/</a></p>

<h2 id="ALDI">Aldi Maryborough</h2>
<p><img src="images/Aldi.png" alt="Aldi.png" /></p>
<p>Through ALDI’s food rescue program, the Maryborough store provides Mill House with rescued food several times 
each week. These donations are distributed through our 24/7 Community Pantry or used in our community meals and 
café programs.</p>

<p><a href="https://www.aldi.com.au">https://www.aldi.com.au</a></p>

<h2 id="PVB">Parkview Bakery</h2>
<p><img src="images/ParkviewBakery.jpg" alt="ParkviewBakery.jpg" /></p>
<p>Parkview Bakery generously provides Mill House with fresh bread. The bread is distributed through our 24/7 
Community Pantry and used in our café and Friday Feast community meals.</p>

<p><a href="https://www.facebook.com/parkviewbakery/photos">https://www.facebook.com/parkviewbakery/photos</a></p>

<h1>Local Businesses We Work With</h1>

<h2 id="WOS">Wattle Office Supplies</h2>
<p><img src="images/WattleOffice.jpg" alt="WattleOffice.jpg" /></p>
<p>Wattle Office Supplies supplied our new computers and technology equipment and completed the installation for our 
Digital Hub upgrade. Their work has helped improve digital access and support available to the community.</p>

<p><a href="https://www.wattleoffice.com.au/">https://www.wattleoffice.com.au/</a></p>

<h2 id="MFC">Maryborough Flooring</h2>
<p><img src="images/MaryboroughFloorCoverings.jpg" alt="MaryboroughFloorCoverings.jpg" /></p>
<p>Maryborough Floor Coverings installed new vinyl flooring throughout the main areas of Mill House. The new flooring 
has improved the appearance, safety and accessibility of our community spaces.</p>

<p><a href="https://www.facebook.com/p/Maryborough-Floor-Coverings-61587302613405/">https://www.facebook.com/p/Maryborough-Floor-Coverings-61587302613405/</a></p>

<h2 id="GSAB">Goldfields Screens &amp; Blinds</h2>
<p><img src="images/GoldfieldsScreens.png" alt="GoldfieldsScreens.png" /></p>
<p>With funding received through Central Goldfields Shire Council, Simon Koopmans from Goldfields Screens &amp; Blinds 
installed new blinds in the Board Room, kitchen, hallway and front entrance.</p>

<p><a href="http://www.goldfieldsblinds.com.au/">http://www.goldfieldsblinds.com.au/</a></p>

<h1>Thank You to Our Supporters</h1>

<p>We sincerely thank every organisation, business and individual who supports Mill House. Your contributions help 
us provide welcoming spaces, community meals, food relief, social activities, digital access and practical support 
for people throughout the Central Goldfields.</p>

<p><b>Together, we are building a stronger, more connected and supported community.</b></p>
																						
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

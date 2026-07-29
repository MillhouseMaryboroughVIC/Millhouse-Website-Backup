<!--
*********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 **** SARAH PLEASE NOTE
 **** ------------------
 **** Don't change this PHP code, between the < ? php and ? > tags. 
 **** 
 ********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 -->
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
		<title>Why Donate?</title>
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
			<a href="contribute.php" onclick="DoClickNavLinkWithSubmenu('contribute')">Become a contributor</a>
			<ul style="display:<?php echo DoShowHideSubmenu("contribute"); ?>;" id="contribute">
				<li class="submenu_item"><a href="join.php"><b>Become a member</b></a></li>
				<li class="submenu_item"><a href="volunteering.php"><b>Become a volunteer</b></a></li>
				<li class="submenu_item"><a href="../request_sponsorship.php"><b>Become a sponsor</b></a></li>
				<li class="submenu_item"><a href="donation.php"><b>Make a donation</b></a></li>
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

<h1Why Donate?</h1>

<p>Across the Central Goldfields, many individuals and families experience financial hardship, social isolation and 
limited access to services and opportunities.</p>

<p>Mill House Neighbourhood House is a community-based, not-for-profit organisation governed by a volunteer Committee 
of Management and supported by dedicated staff and volunteers. We provide a welcoming place where people of all ages 
and backgrounds can connect, participate, learn new skills and access practical support.</p>

<h1>Your Donation Supports Our Community</h1>

<p>Donations help us continue offering affordable and inclusive programs such as:</p>
<ul>
    <li>Friday Feast community lunches</li>
    <li>The Mill House Café</li>
    <li>Yarn craft and creative groups</li>
    <li>Painting, drawing and scrapbooking</li>
    <li>Book clubs and social activities</li>
    <li>Playgroups and family activities</li>
    <li>Youth and community programs</li>
</ul>

<p>Donations also support services and activities that help people experiencing hardship, including:</p>
<ul>
    <li>The Thursday Food Share Market</li>
    <li>The 24/7 Community Pantry</li>
    <li>Fresh produce and grocery relief</li>
    <li>Affordable frozen meals</li>
    <li>No-interest loan information and support</li>
    <li>Programs for parents and families</li>
    <li>Opportunities for volunteering, connection and participation</li>
    <li>Access to visiting community, employment and support services</li>
</ul>
<p>For many people, Mill House is more than a community centre. It is a place where they can feel welcomed, accepted, 
supported and connected.</p>

<h1>Every Donation Makes a Difference</h1>

<p>Your donation helps us provide food relief, community meals, essential items, welcoming spaces and activities that 
reduce isolation and build stronger community connections.</p>

<p>Financial donations of any amount are greatly appreciated. We may also be able to accept suitable donations of:</p>
<ul>
    <li>Unopened, in-date food and pantry items</li>
    <li>Clean clothing in good condition</li>
    <li>Clean bedding in good condition</li>
    <li>Small, non-electrical kitchen items</li>
    <li>Unopened toiletries and bathroom products</li>
    <li>Unopened haircare and personal-care products</li>
    <li>Unopened Cleaning products</li>
</ul>

<p>Our storage space and community needs can change, so please contact the Mill House Manager before bringing in 
donated goods. For health and safety reasons, we cannot accept expired, opened, damaged or unsafe items.</p>

<p>Please consider making a donation and helping Mill House continue making a real difference in the Central 
Goldfields community.</p>

<!--
*********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 **** SARAH PLEASE NOTE
 **** ------------------
 **** Don't change this Javascript code between the <script> and </script> tags. 
 **** Nor the HTML form between the <form> and </form> tags.
 **** Forms, and accessing the form data through PHP, are one of the more harder concepts 
 **** to master in web coding.
 **** 
 ********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 ********************************************************************************************
 -->

<script type="text/javascript">

	function OnClickDonationRadio(strAmount)
	{
		let textAmount = document.getElementById("amount");
		if (textAmount)
		{
			textAmount.value = strAmount;
			textAmount.focus();
		}
	}
	
</script>
<form method="post" target="_self" class="form" action="../donation_receipt.php" style="width:850px;">

	<table border="0" cellspacing="5" cellpadding="0">
		<tr>
			<td colspan="8"><h2>DONATION FORM</h2></td>
		</tr>
		<tr>
			<td colspan="8">
				<br/><b>Please note that Millhouse will contact you via a phone call to confirm your donation &amp; 
				obtain your credit card details or provide you with Millhouse's bank account details..
				</b><br/><br/>
			</td>
		</tr>
		<tr>
			<td colspan="4"><label for="given_names">GIVEN NAMES</label></td>
			<td colspan="4"><label for="surname">SURNAME</label></td>
		</tr>
		<tr>
			<td colspan="4"><input type="text" name="given_names" id="given_names" required onkeypress="OnKeyPressName(event)"/></td>
			<td colspan="4"><input type="text" name="surname" id="surname" required onkeypress="OnKeyPressName(event)"/></td>
		</tr>
		<tr>
			<td colspan="4"><label for="email">EMAIL ADDRESS</label></td>
			<td colspan="4"><label for="phone">PHONE NUMBER</label></td>
		</tr>
		<tr>
			<td colspan="4"><input type="text" name="email" id="email" required onkeypress="OnKeyPressEmailAddress(event)"/></td>
			<td colspan="4"><input type="text" name="phone" id="phone" required onkeypress="OnKeyPressPhone(event)"/></td>
		</tr>
		<tr>
			<td colspan="8"><br/><label><b>DONATION AMOUNT</b></label></td>
		</tr>
		<tr>
			<td><input type="radio" id="Amount5" checked name="amount" onclick="OnClickDonationRadio('5')" />&nbsp;<label for="Amount5">$5</label></td>
			<td><input type="radio" id="Amount10" name="amount" onclick="OnClickDonationRadio('10')" />&nbsp;<label for="Amount5">$10</label></td>
			<td><input type="radio" id="Amount20" name="amount" onclick="OnClickDonationRadio('20')" />&nbsp;<label for="Amount5">$20</label></td>
			<td><input type="radio" id="Amount50" name="amount" onclick="OnClickDonationRadio('50')" />&nbsp;<label for="Amount5">$50</label></td>
			<td>
			<input type="radio" id="Amount1001" name="amount" onclick="OnClickDonationRadio('100')" />&nbsp;<label for="Amount5">$100</label></td>
			<td><input type="radio" id="Amount200" name="amount" onclick="OnClickDonationRadio('200')" />&nbsp;<label for="Amount5">$200</label></td>
			<td><input type="radio" id="Amount500" name="amount" onclick="OnClickDonationRadio('500')" />&nbsp;<label for="Amount5">$500</label></td>
			<td><input type="radio" id="Amount1000" name="amount" onclick="OnClickDonationRadio('')" />&nbsp;<label for="Amount5">Other</label></td>
		</tr>
		<tr>
			<td colspan="8">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<label for="amount">$&nbsp;</label>
						</td>
						<td>
							<input type="text" name="amount" id="amount" required onkeypress="OnKeyPressDigitsOnly(event)" />
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="8"><label><b>PAYMENT METHOD</b></label></td>
		</tr>
		<tr>
			<td colspan="4"><input type="radio" name="method" id="card" value="Credit card"checked /><label for="card">Credit card</label></td>
			<td colspan="4"><input type="radio" name="method" id="bank" value ="Bank transfer" /><label for="bank">Bank transfer</label></td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:right;">
				<input type="submit" name="submit" />
			</td>
		</tr>
	</table>
</form>

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

<?php 

	/*********************************************************************************************
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
	 ********************************************************************************************/
	 
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
		<title>About Mill House</title>
		
		<style type="text/css">






			.content img
			{
				height: 250px;
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
		<li>
		<a href="../index.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Home</a></li>
		<li>
		<a href="about.php" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">About Mill House</a></li>
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
			<a href="../administration/administration.php" onclick="DoClickNavLinkWithSubmenu('administration')" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)">Administration</a>
			<ul style="display:<?php echo DoShowHideSubmenu("administration"); ?>;" id="administration">
			
			<?php DoDisplayAdministrationSubmenu(); ?>
			
			</ul>
		</li>
	</ul>
</div>
										</td>
										<td>
<div id="div_navigation_arrow" class="navigation_arrow" tabindex="0" onfocus="DoSpeakElement(this)" onmouseenter="DoSpeakElement(this)" onclick="DoOpenCloseMenu(true)" onkeyup="DoKeyPress(event)">
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
									<table border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td style="text-align:right;">
												<label for="checkbox_audio_assist"><b>AUDIO ASSIST ON/OFF</b></label>
											</td>
											<td>
												<input type="checkbox" id="checkbox_audio_assist" tabindex="0" onclick="DoClickAudioAssistCheckbox(this)" />
											</td>
										</tr>
										<tr>
											<td style="text-align:right;">
											    <label for="select_voice">Choose Voice:</label>
											</td>
											<td>
											    <select id="select_voice">
											    </select>
											</td>
										</tr>
										<tr>
											<td style="text-align:right;">
												<label for="text_to_speak">Text to speak</label>
											</td>
											<td>
												<input type="text" id="text_to_speak" size="100%" maxlength="50" value="Hello world!"/>
											</td>
										</tr>
										<tr>
											<td style="text-align:center;">
												<button type="button" onclick="DoTestVoice('text_to_speak')">TEST</button>
											</td>
											<td style="text-align:center;">
												<button type="button" onclick="DoDisplayHidePopup('form_voice_assist', false)">CLOSE</button>
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
								<form><button type="button" onclick="DoDisplayHidePopup('form_voice_assist', true)" class="audio_assist_button">VOICE ASSIST</button></form>

								<!-- #BeginEditable "CustomContent" -->

<h1>Mill House Activities and Services</h1>

<p>Mill House offers a wide range of affordable activities, social groups and support services for people of all ages 
and abilities.</p>

<p>Whether you are looking for food support, a welcoming place to meet new people, help accessing services or an 
opportunity to learn something new, there is a place for you at Mill House.</p>

<h1>Helping Put Food on the Table</h1>

<h2>24/7 Community Food Pantry</h2>
<p>Our Community Food Pantry is available 24 hours a day, seven days a week. Members of the Central Goldfields 
community can access free food and essential items that have been generously donated by local businesses, 
organisations and community members.</p>

<p>We ask everyone to read the guidelines displayed on the pantry and only take what they need so there is enough 
to share with others.</p>

<p><a href="images/FoodPantry.jpg"><img src="images/FoodPantry.jpg" alt="FoodPantry.jpg" /></a></p>

<h2>Affordable Frozen Meals</h2>

<p>A changing selection of homemade frozen meals is available from reception for $3 each or two for $5.</p>

<p>Our meals are prepared using suitable surplus food supplied by our food relief partners. Depending on availability, 
meals may include soups, vegetable and pasta bakes, chicken and rice dishes, lasagne, pasta bolognese and other family 
favourites.</p>

<p>
	<a href="images/FrozenMeals1.jpg"><img src="images/FrozenMeals1.jpg" alt="FrozenMeals1.jpg" /></a>
	<a href="images/FrozenMeals2.jpg"><img src="images/FrozenMeals2.jpg" alt="FrozenMeals2.jpg" /></a>
</p>

<h2>Thursday Food Share Market</h2>

<p>Our Food Share Market is held every Thursday from 9.30 am.</p>

<p>For a $5 donation, community members can choose from available fruit, vegetables, bread and pantry items. Toiletries 
and women’s hygiene products may also be available from time to time.</p>

<p>
	<a href="images/market1.jpg"><img src="images/market1.jpg" alt="Market.jpg" /></a>
	<a href="images/Assorted.jpg"><img src="images/Assorted.jpg" alt="Assorted.jpg" /></a>
	<a href="BreakfastCereals.jpg"><img src="images/BreakfastCereals.jpg" alt="BreakfastCereals.jpg" /></a><br/>
	<a href="images/CannedFoods.jpg"><img src="images/CannedFoods.jpg" alt="CannedFoods.jpg" /></a>
	<a href="images/FreshProduce1.jpg"><img src="images/FreshProduce1.jpg" alt="FreshProduce1.jpg" /></a>
	<a href="images/FreshProduce2.jpg"><img src="images/FreshProduce2.jpg" alt="FreshProduce2.jpg" /></a><br/>
	<a href="images/FreshProduce3.jp"><img src="images/FreshProduce3.jpg" alt="FreshProduce3.jpg" /></a>
	<a href="images/Pasta.jpg"><img src="images/Pasta.jpg" alt="Pasta.jpg" /></a>
	<a href="images/Bread.jpg"><img src="images/Bread.jpg" alt="Bread.jpg" /></a><br/>
</p>

<h2>Friday Feast</h2>

<p>Join us every Friday at 12.00 pm for a welcoming two-course community lunch.</p>

<p>Friday Feast provides an affordable meal and an opportunity to meet new people and enjoy time together.</p>

<p><b>Cost: </b>$5 donation.</p>

<p>This photo is of Christmas in July Friday Feast, 2026. For this particular Friday Feast event you must book. However 
bookings are not required for regular Friday Feast events.</p>
<p>
	<a href="images/feast.jpg"><img src="images/feast.jpg" alt="feast.jpg" /></a>
</p>

<h2>Food with Friends</h2>

<p>Food with Friends is an all-abilities cooking group held every Thursday at 10.00 am.</p>

<p>Participants prepare a meal with assistance from their support workers and the Mill House team before sitting down 
to enjoy the food together.</p>

<p><b>Cost: </b>$10 per session. Bookings are preferred.</p>

<p><a href="images/food_friends.jpg"><img src="images/food_friends.jpg" alt="food_friends.jpg" /></a></p>

<h2>Mill House Café</h2>

<p>The Mill House Café is a relaxed and welcoming social café offering a small, affordable menu.</p>

<p>Most menu items are $3, with barista coffee and homemade cake available for $5.</p>

<p>Come in for something to eat, enjoy a cuppa and connect with others in the community.</p>

<p>
	<a href="../images/Cafe.jpg"><img src="../images/Cafe.jpg" alt="Cafe.jpg" /></a>
	<a href="images/cafe.jpg"><img src="images/cafe.jpg" alt="cafe.jpg" /></a>
</p>

<h1>Groups and Activities</h1>

<h2>Maker Mums</h2>

<p>A welcoming creative and social group where parents can connect, work on sewing, craft and other projects, and 
share skills in a child-friendly environment.</p>

<p><a href="images/maker_mums.jpg"><img src="images/maker_mums.jpg" alt="maker_mums.jpg" /></a></p>

<h2>Peer Collective</h2>

<p>Our Peer Collective mental health support group meets on Wednesday afternoons.</p>

<p>The group provides a safe and non-judgmental space where people with lived experience can connect, share their 
stories and offer mutual support.</p>

<p><a href="images/peer_collective.jpg"><img src="images/peer_collective.jpg" alt="peer_collective.jpg" /></a></p>

<h2>Dungeons &amp; Dragons</h2>

<p>A social tabletop role-playing group where participants can use their imagination, build characters, work as a 
team and enjoy new adventures.</p>

<p><a href="images/dungeons_dragons.jpg"><img src="images/dungeons_dragons.jpg" alt="dungeons_dragons.jpg" /></a></p>

<h2>The 'House' Youth Activity Hub</h2>

<p>A welcoming space where young people can meet, participate in activities, develop new skills and connect with 
others.</p>

<p><a href="../images/YouthHub.jpg"><img src="../images/YouthHub.jpg" alt="YouthHub.jpg" /></a></p>

<h2>Mill House Scrappers</h2>

<p>A relaxed social scrapbooking group where participants can work on creative projects, share ideas and enjoy time 
with others.</p>

<p>
	<a href="images/scrappers.jpg"><img src="images/scrappers.jpg" alt="scrappers.jpg" /></a>
	<a href="images/scrappers1.jpg"><img src="images/scrappers1.jpg" alt="scrappers1.jpg" height="100"/></a>
	<a href="images/scrappers2.jpg"><img src="images/scrappers2.jpg" alt="scrappers2.jpg" height="100"/></a>
	<a href="images/scrappers3.jpg"><img src="images/scrappers3.jpg" alt="scrappers3.jpg" height="100"/></a>
	<a href="images/scrappers4.jpg"><img src="images/scrappers4.jpg" alt="scrappers4.jpg" height="100"/></a>
</p>

<h2>Hookers Yarn Craft</h2>

<p>A friendly yarn craft group for people interested in knitting, crochet and other fibre crafts. Beginners and 
experienced crafters are welcome.</p>

<p><a href="images/yarn.jpg"><img src="images/yarn.jpg" alt="yarn.jpg" /></a></p>

<h2>Art for the Soul</h2>

<p>A supportive art group that encourages creativity, self-expression and connection through painting, drawing and 
other art activities.</p>

<p><a href="images/art4soul.jpg"><img src="images/art4soul.jpg" alt="art4soul.jpg" /></a></p>

<h2>Canasta Players</h2>

<p>Join other community members for a friendly and social game of Canasta.</p>

<p>
	<a href="../images/canasta.jpg"><img src="../images/canasta.jpg" alt="canasta.jpg" /></a>
	<a href="images/canasta.jpg"><img src="images/canasta.jpg" alt="canasta.jpg" /></a>
</p>

<h2>Level Up Youth Gaming with Lifely Chris Lakey</h2>

<p>
	A weekly after-school social and gaming group designed for kids and teens aged 9 to 17 who experience disability 
	or neuro-divergence. The program focuses on building friendships, improving focus, and boosting confidence in a 
	safe, supportive environment.
</p>

<p>
	<a href="images/gamers.jpg"><img src="images/gamers.jpg" alt="gamers.jpg" /></a>
	<a href="images/gamers.jpg"><img src="images/ChrisLakey.jpg" alt="ChrisLakey.jpg" /></a>
</p>

<h2>Playgroup</h2>

<p>Our playgroup provides a welcoming environment where children can play and learn while parents and carers connect 
with other local families.</p>

<p>
	<a href="../images/playgroup.jpg"><img src="../images/playgroup.jpg" alt="playgroup.jpg" /></a>
	<a href="images/playgroup.jpg"><img src="images/playgroup.jpg" alt="playgroup.jpg" /></a>
</p>

<h1>Community Support Services</h1>

<h2>Cool Spaces</h2>

<p>Mill House opens as a Cool Space on days when the temperature is forecast to reach more than 38°C.</p>

<p>A Cool Space is an air-conditioned indoor location where people can find relief during periods of extreme heat. 
It is particularly important for older people, young children, people living with disability or health conditions, 
and anyone without reliable access to air conditioning.</p>

<p>During hot weather, remember to check that your family, friends, neighbours and pets are keeping cool and 
hydrated.</p>

<p><a href="images/CoolSpace.png"><img src="images/CoolSpace.png" alt="CoolSpace.png" width="200" /></a></p>

<h2>Good Shepherd No Interest Loans</h2>

<p>The No Interest Loans program, commonly known as NILs, may help eligible people pay for essential goods and 
services without interest, fees or charges.</p>

<p>Contact Mill House for information about eligibility and assistance with the application process.</p>

<p><a href="../images/NILoans.png"><img src="../images/NILoans.png" alt="NILoans.png" height="200"/></a></p>

<h2>Parent Pathways</h2>

<p>Parent Pathways provides personalised support for eligible parents and carers of young children.</p>

<p>The program can help participants identify their goals, build confidence, access services and take steps towards 
education, training or future employment.</p>

<p><a href="images/parent_pathways1.jpg"><img src="images/parent_pathways1.jpg" alt="parent_pathways1.jpg" height="200"/></a></p>

<h2>are-able – Finding and Keeping a Job</h2>

<p>Mill House works with are-able to support people, including people living with disability, to develop employment 
skills and explore opportunities for finding and maintaining meaningful work.</p>

<h2>Justice of the Peace</h2>

<p>Justice of the Peace services are available at selected times for people who need documents witnessed or 
certified.</p>

<p>Please contact Mill House to confirm availability before attending.</p>

<p><a href="images/justice_peace.jpg"><img src="images/justice_peace.jpg" alt="JusticePeace.jpg" height="200"/></a></p>

<h2>Remedial Massage Therapist</h2>

<p>A remedial massage therapist provides services from Mill House. Appointments and fees are arranged directly with the 
practitioner.</p>

<p><a href="../images/massage.png"><img src="../images/massage.png" alt="massage.png" height="200"/></a></p>

<h2>Employment and Visiting Services</h2>

<p>Mill House provides private and professional spaces for employment providers, community organisations and visiting 
support services to meet with local residents.</p>

<p>Contact us to find out which services are currently available or to arrange an appointment.</p>

<?php require "../MillHouseServiceProviders.html"; ?>

<h2>University of the Third Age</h2>

<p>U3A Maryborough provides opportunities for people to continue learning, share their knowledge and connect with 
others.</p>

<p>Activities held at Mill House include:</p>
<ul>
    <li>
    	Photobooks<br/><br/>
    	<a href="images/U3A_photobooks.jpg"><img src="images/U3A_photobooks.jpg" alt="U3A_photobooks.jpg" height="100"/></a>
    </li>
    <li>
    	Book Club<br/><br/>
    	<a href="images/U3A_books.jpg"><img src="images/U3A_books.jpg" alt="U3A_books.jpg" height="100"/></a>
    </li>
    <li>
    	Writers Group<br/><br/>
    	<a href="images/U3A_writers.jpg"><img src="images/U3A_writers.jpg" alt="U3A_writers.jpg" height="100"/></a>
    </li>
</ul>

<h2>Community Meetings</h2>

<p>Mill House provides meeting space for a variety of local clubs, organisations and community groups, including:</p>
<ul>
    <li>
    	Maryborough Theatre Company<br/><br/>
    	<a href="https://www.liveup.org.au/activities/maryborough-theatre-company">
    		<img src="images/theatre.jpg" alt="theatre.jpg" height="200"/>
    	</a>
    </li>
    <li>
    	Maryborough Stamp Club<br/><br/>
    	<a href="images/stamps.jpg">
    		<img src="images/stamps.jpg" alt="stamps.jpg" height="200"/>
    	</a>
    </li>
    <li>
    	Australian Labor Party<br/><br/>
    	<a href="images/labour_party.jpg">
    		<img src="images/labour_party.jpg" alt="labour_party.jpg" height="200"/>
    	</a>
    </li>
    <li>
    	Friends of the Maryborough Town Hall<br/><br/>
    	<a href="images/fomop.jpg">
    		<img src="images/fomth.jpg" alt="fomth.jpg" height="200"/>
    	</a>
    </li>
    <li>
    	Friends of Maryborough Outdoor Pool<br/><br/>
    	<a href="images/fomop.jpg">
    		<img src="images/fomop.jpg" alt="fomop.jpg" height="200"/>
    	</a>
    </li>
</ul>

<h2>Spaces for Hire</h2>

<p>Mill House has a range of affordable rooms available for meetings, workshops, appointments, training sessions, 
programs and social gatherings.</p>

<p>From private offices and comfortable meeting rooms to creative spaces and a commercial kitchen, one of our rooms 
is sure to suit your needs.</p>

<p>Click <a href="../room/room.php">here</a> to view our rooms, hire rates and booking information.</p>


<div id="div_page_edit_instructions" class="instruction_popup">

	<?php require DoGetParentOrCurrentDir() . "administration/PageEditInstructions.html"; ?>
	
	<p>There are no parts of the content of this page that automated with PHP code. Feel free to edit the HTML of any 
	part of the page contents. Make sure you confine your editing to only that code that IS NOT highlighed by a yellow 
	background.</p>
	
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
		
	</script>
	
</html>
<!-- #BeginEditable "End" -->

<?php DoShowMessage(); ?>

<!-- #EndEditable -->

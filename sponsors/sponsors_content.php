<?php

	function DoGenerateSponsorDetails($strType)
	{
		global $g_dbMillhouse;
		global $g_strQuery;
		$datetimeNow = new DateTime();
		
		$result = DoFindQuery1($g_dbMillhouse, "sponsors", "type", $strType, "", "ranking ASC, business_name");
		
		if ($result && ($result->num_rows > 0))
		{
			while ($row = $result->fetch_assoc())
			{
				$datetimeExpiry = new DateTime($row["expiry_date"]);
				if ($datetimeExpiry >= $datetimeNow)
				{
					echo "<h2 id=\"" . DoGenerateBookmark($row["business_name"]) . "\">" . $row["business_name"] . "</h2>\n";
					echo "<p><img src=\"images/" . $row["logo_image"] . "\" alt=\"" . $row["logo_image"] . "\" class=\"content_img\" /></p>\n";
					echo "<p>" . $row["description"] . "</p>\n";
					$nDonation = (int)$row["amount_paid"];
				}
			}
		}
	}
	
?>
							
<h1>Our Funders, Sponsors and Community Partners</h1>

<p>Mill House is proud to work alongside government agencies, community organisations, local businesses and generous 
supporters who help us deliver programs, improve our facilities and provide practical assistance to the Central 
Goldfields community.</p>

<p>Their funding, donations, food rescue partnerships, professional services and ongoing support make an important 
contribution to the work we do.</p>

<h1>Our Funders and Supporters</h1>

<?php DoGenerateSponsorDetails("funding"); ?>

<h1>Food Relief Partners</h1>

<?php DoGenerateSponsorDetails("food"); ?>

<h1>Local Businesses We Work With</h1>

<?php DoGenerateSponsorDetails("service"); ?>

<h1>Thank You to Our Supporters</h1>

<p>We sincerely thank every organisation, business and individual who supports Mill House. Your contributions help 
us provide welcoming spaces, community meals, food relief, social activities, digital access and practical support 
for people throughout the Central Goldfields.</p>

<p><b>Together, we are building a stronger, more connected and supported community.</b></p>
																						

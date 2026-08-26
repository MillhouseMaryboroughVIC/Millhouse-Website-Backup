<?php

	require_once "../common.php";

	/*
	DoInsertQuery5($g_dbMillhouse, "millhouse_db.donations", "given_names", $_POST["text_given_names"], 
					"surname", $_POST["text_surname"], "email", $_POST["text_email"], 
					"phone", $_POST["text_phone"], "amount", $_POST["text_amount"]);
	*/				
	function is_localhost() 
	{
		$whitelist = ['127.0.0.1', '::1'];
		return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
	}
	
	if (isset($_GET["submit_app"]))
	{
		$_POST["text_given_names"] = $_GET["text_given_names"];
		unset($_GET["text_given_names"]);
		$_POST["text_surname"] = $_GET["text_surname"];
		unset($_GET["text_surname"]);
		$_POST["text_email"] = $_GET["text_email"];
		unset($_GET["text_email"]);
		$_POST["text_phone"] = $_GET["text_phone"];
		unset($_GET["text_phone"]);
		$_POST["text_amount"] = $_GET["text_amount"];
		unset($_GET["text_amount"]);
		$_POST["radio_method"] = $_GET["radio_method"];
		unset($_GET["radio_method"]);
	}		
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<title>Receipt</title>
		<style>
			@media print 
			{
        		#do_not_print
        		{
            		display: none; /* Hides the button when printing */
        		}

   			}

			h1,h2,h3,h4,h5,h6
			{
				font-family: Arial, Helvetica, sans-serif;
			  	font-weight: bold;
				color: black;
			}
			p
			{
				font-family: Arial, Helvetica, sans-serif;
				color: black;
				font-size: large;
			}
			h1
			{
				font-size: xx-large;
			}
			h2
			{
				font-size: x-large;
			}
			h3
			{
				font-size: large;
			}
			h4
			{
				font-size: medium;
			}
			h5
			{
				font-size: x-small;
			}
			h6
			{
				font-size: xx-small;
			}

		</style>
	</head>
	
	<body>
	
		
		<img alt="Logo.jpg" src="../images/Logo.jpg" width="400" />
	
		<h1>DONATION RECEIPT</h1>
	
		<p><b>Date:</b> <?php echo date("l j F Y"); ?></p>
		<p><b>Organization Name:</b> Millhouse – Neighborhood House</p>
		<p><b>Street Address:</b> 88-90 Burke Street</p>
		<p><b>City:</b> Maryborough</p>
		<p><b>State:</b> VIC</p>
		<p><b>Postcode:</b> 3465</p>
		<p><b>ABN:</b> 59 149 634 975</p>
		<p><b>Payment method:</b> <?php echo $_POST["radio_method"]; ?></p>
		<p><b><u>DONOR DETAILS</u></b></p>
		<p><b>Name: </b><?php echo $_POST["text_given_names"] . " " . $_POST["text_surname"]; ?></p>
		<p><b>Email: </b><?php echo $_POST["text_email"]; ?></p>
		<p><b>Phone: </b><?php echo $_POST["text_phone"]; ?></p>

		<?php

			$strMsg = "";
			if (strcmp($_POST["radio_method"], "Credit card") == 0)
			{
				$strMsg = "Please ring me for my credit card details.";
			}
			else if (strcmp($_POST["radio_method"], "Bank transfer") == 0)
			{
				$strMsg = "Please ring me and provide me with your bank account details.";
			}
			else if (strcmp($_POST["radio_method"], "Cash") == 0)
			{
				$strMsg = "I will bring the cash donation to the reception desk.";
			}
			if (is_localhost())
			{
				PrintJavascriptLine("alert(\"Emails can't be sent from localhost...\\n\\n" . 
					 "SEND TO: " . $g_strEmailManager . "\\nSUBJECT: Donation to Millhouse\\n" . 
					"NAME: " . $_POST["text_given_names"] . " " . $_POST["text_surname"] . "\\nPHONE: " . 
					$_POST["text_phone"] . "\\nEMAIL: " . $_POST["text_email"] . "\\nAMOUNT: " . $_POST["text_amount"] . 
					"\\nPAYMENT METHOD: " . $_POST["radio_method"] .
					"\\n\\n" . $strMsg . "\")", 1, true);

			}
			else
			{
			/*
				mail($g_strEmailManager, "Donation to Millhouse", 
						"I would like to make a donation to Millhouse...\n\nNAME: " . $_POST["text_given_names"] . " " . 
						$_POST["text_surname"] . "\nPHONE: " . $_POST["text_phone"] . "\nEMAIL: " . $_POST["text_email"] . 
						"\nAMOUNT: " . $_POST["text_amount"] . "\nPAYMENT METHOD: " . $_POST["radio_method"] . "\n\n" . 
						$strMsg . ".");
			*/
			}		
			function DoGetAmountInWords($fAmount)
			{
				$formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
				return $formatter->format($fAmount);
			}
			
		?>
		<hr/>
		<p style="font-size:large;">
			Thank you <?php echo $_POST["text_given_names"] . " " . $_POST["text_surname"]; ?> so much for your generous 
			contribution of 
			<?php echo DoGetAmountInWords($_POST["text_amount"]); ?> dollars ($<?php echo $_POST["text_amount"]; ?>) to 
			Millhouse. We are very grateful for your support.
		</p>
		<p>
			Your contribution will help us to build a supportive community of towns in the central goldields region of 
			Victoria. And to provide a place for people to meet, share interests, share a meal, make friends and get 
			help.
		</p>
		<hr/>
		<p id="do_not_print">Millhouse will contact you via phone to confirm your donation and obtain your credit card details or provide you 
		with bank account details.</p>
		
		<p><input type="button" value="PRINT" id="do_not_print" onclick="window.print()" /></p>
		
	</body>

</html>

<?php
	
	require_once "../common.php";
	
	if (isset($_POST["submit_upload"]))
	{
		$strMenu = "<table border=\"1\" cellspacing=\"0\" cellpadding=\"5\">\n";
		
		if ($_POST["text_appetiser"] != "")
			$strMenu .= "<tr><td><b>APPETISER</b></td><td>" . $_POST["text_appetiser"] . "</td></tr>\n";
		if ($_POST["text_main"] != "")
			$strMenu .= "<tr><td><b>MAIN</b></td><td>" . $_POST["text_main"] . "</td></tr>\n";
		if ($_POST["text_dessert"] != "")
			$strMenu .= "<tr><td><b>DESSERT</b></td><td>" . $_POST["text_dessert"] . "</td></tr>\n";
			
		$strMenu .= "</table>\n";
	
		if ($result = DoFindUpdateQuery($g_dbMillhouse, "groups", "comment", $strMenu, "name", "admin"))
		{
			echo "OK";
		}
	}
	
?>
<?php

	require "common.php";

	if (isset($_GET["advert_id"]) && isset($_GET["website"]))
	{
		$results = DoQuery($g_dbMillhouse, "UPDATE adverts SET clicks = clicks + 1 WHERE advert_slot_id = '" . $_GET["advert_id"] . "'");
		if ($results)
		{
			echo "<script type=\"text/javascript\">\n";
			echo "window.open(\"" .  $_GET["website"] . "\", \"_self\");\n";
			echo "</script>\n";
		}
	}
?>
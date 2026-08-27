<?php

	require_once "../common.php";

	if (isset($_POST["submit_login"]))
	{
		$results = DoFindQuery2($g_dbMillhouse, "groups", "name", "admin", "password", $_POST["text_password"]);
		if ($results && ($results->num_rows == 1))
		{
			echo "OK";
		}
		else
		{
			echo "Administration password '" . $_POST["text_password"] . "' is incorrect!";
		}
	}











?>

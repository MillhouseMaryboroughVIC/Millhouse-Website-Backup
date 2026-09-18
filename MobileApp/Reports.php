<?php

	require_once "../common.php";
	
	$g_dbMillhouse->set_charset("utf8mb4");
	
	if (isset($_POST["submit_get_documents"]))
	{
		$strFindPath = "../governance/reports/";
		
		// Find all .pdf files in the specified folder
		$ReportFileList = glob($strFindPath . "FinancialStatements*.pdf");

		if ($ReportFileList === false)
		{
		    echo "Annual report files were not found!";
		}
		else
		{
			$strReportFileList = "";
			
			foreach ($ReportFileList as $file) 
			{
				$strReportFileList .= basename($file) . ",";
			}
			$strReportFileList = substr($strReportFileList, 0, strlen($strReportFileList) - 1);
			echo "OKDOCUMENTS=" . $strReportFileList;
		}
	}
	else
	{
		print_r($_POST);
	}
	
?>
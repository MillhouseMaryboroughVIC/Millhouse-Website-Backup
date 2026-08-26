<?php
	
	require_once "../common.php";
	
	if (isset($_POST["submit_get_events"]))
	{
		$datetimeNow = DoGetMelbourneTimeNow();
		$nDOW = (int)$datetimeNow->format("N");
		$arrayEventsToday = [];

					
		if ($result = DoFindAllQuery($g_dbMillhouse, "groups", "", "description"))
		{
			while ($row = $result->fetch_assoc())
			{
				$strTimes = "";
				$bGo = true;
				
				if (($nDOW == (int)$row["dow1"]) && ((int)$row["dow2"] == -1))
				{
					$strTimes = DoGetStartTime($row["time1"]) . " to ";
					$strTimes .= DoGetEndTime($row["time1"], $row["duration"]);

					if ($row["time2"] !== NULL)
					{
						$strTimes .= " and " . DoGetStartTime($row["time2"]) . " to ";
						$strTimes .= DoGetEndTime($row["time1"], $row["duration"]);
					}
				}
				else if ($nDOW == (int)$row["dow2"])
				{
					$strTimes = DoGetStartTime($row["time2"]) . " to ";
					$strTimes .= DoGetEndTime($row["time2"], $row["duration"]);	
				}
				else if (((int)$row["dow1"] == 0) && ($nDOW != 0) && ($nDOW != 6))
				{				
					$strTimes = DoGetStartTime($row["time1"]) . " to ";
					$strTimes .= DoGetEndTime($row["time1"], $row["duration"]);
				}
				else
					$bGo = false;
				
				if ($bGo)	
					$arrayEventsToday[] = ["strGroupName"=> $row["description"], "strTimes"=>$strTimes];
			}
		}
		echo json_encode($arrayEventsToday);
	}
	
?>
function OnClickTogglePassword(strTogglePasswordID, strPasswordID)
{
	var checkboxTogglePassword = document.getElementById(strTogglePasswordID),
		textPassword = document.getElementById(strPasswordID);

	if (checkboxTogglePassword && textPassword)
	{
		if (checkboxTogglePassword.checked)
			textPassword.type = "text";
		else
			textPassword.type = "password";
	}
}

function DoCheckPasswordsMatch(strFirstPasswordID, strSecondPasswordID)
{
	let passwordFirst = document.getElementById(strFirstPasswordID),
		passwordSecond = document.getElementById(strSecondPasswordID),
		buttonSubmit = document.getElementById("button_admin_change_password");
		
	if (buttonSubmit && passwordFirst && passwordSecond)
	{
		if (passwordFirst.value != passwordSecond.value)
		{
			alert("Your passwords do not match!");
			buttonSubmit.disabled = true;
		}
		else
		{
			buttonSubmit.disabled = false;
		}
	}
}



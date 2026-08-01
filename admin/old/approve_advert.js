function DoOnChangeAdvertSlot()
{
	let selectAdvertSlot = document.getElementById("select_advert_slot"),
		textCostPerMonth = document.getElementById("text_cost_per_month"),
		textNumberMonths = document.getElementById("text_number_months"),
		textPaymentAmount = document.getElementById("text_payment_amount");
		
	if (selectAdvertSlot && textCostPerMonth && textNumberMonths && textPaymentAmount)
	{
		textCostPerMonth.value = g_arrayAdvertSlots[selectAdvertSlot.options[selectAdvertSlot.selectedIndex].value].replace("$", "");
		if (textPaymentAmount.value !== "")
		{
			let nNumberMonths = Number(textPaymentAmount.value) / Number(textCostPerMonth.value);
			textNumberMonths.value = nNumberMonths.toString();
		}
	}
}

function OnChangeTextPaymentAmount()
{
	DoOnChangeAdvertSlot();
}


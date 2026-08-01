function DoGetAdvertTableIndex(nAdvertShortkey)
{
	let nIndex = 0;
	
	for (let nI = 0; nI < g_arrayAdvertsTable.length; nI++)
	{
		if (nAdvertShortkey === g_arrayAdvertsTable[nI]["shortkey"])
		{
			nIndex = nI;
			break;
		}
	}
	return nIndex;
}

function DoOnChangeActivedAdvertSlot()
{
	let selectActiveAdverts = document.getElementById("select_active_advert"),
		textBusinessName = document.getElementById("text_extend_business_name"),
		textContactName = document.getElementById("text_extend_contact_name"),
		textContactPhone = document.getElementById("text_extend_contact_phone"),
		textContactEmail = document.getElementById("text_extend_contact_email"),
		textContactWebsite = document.getElementById("text_extend_website"),
		textContactAdvertHTML = document.getElementById("textarea_extend_advert_html"),
		textContactCostPerMonth = document.getElementById("text_extend_cost_per_month"),
		textExpiryDate = document.getElementById("text_extend_expiry_date");
		hiddenAdvertSlotID = document.getElementById("hidden_advert_slot_id"),
		dateExpiry = new Date();

	if (selectActiveAdverts && textBusinessName && textContactName && textContactPhone && textContactEmail && 
		textContactWebsite && textContactAdvertHTML && textContactCostPerMonth && textExpiryDate && 
		hiddenAdvertSlotID)
	{
		let nI = DoGetAdvertTableIndex(selectActiveAdverts.options[selectActiveAdverts.selectedIndex].value);
		textBusinessName.value = g_arrayAdvertsTable[nI]["business_name"];
		textContactName.value = g_arrayAdvertsTable[nI]["contact_name"];
		textContactPhone.value = g_arrayAdvertsTable[nI]["phone_number"];
		textContactEmail.value = g_arrayAdvertsTable[nI]["email_address"];
		textContactWebsite.value = g_arrayAdvertsTable[nI]["website"];
		textContactAdvertHTML.value = g_arrayAdvertsTable[nI]["advert_html"];
		textContactCostPerMonth.value = g_arrayAdvertsTable[nI][""];
		dateExpiry = new Date(g_arrayAdvertsTable[nI]["expiry_date"]);
		textExpiryDate.value = dateExpiry.toISOString().slice(0, 19).replace('T', ' ').replace(" 00:00:00", "");
		hiddenAdvertSlotID.value = g_arrayAdvertsTable[nI]["advert_slot_id"];
		textContactCostPerMonth.value = g_arrayAdvertSlots[g_arrayAdvertsTable[nI]["advert_slot_id"]];
	}
}

function DoChangeSort()
{
	let selectAdvertSlot = document.getElementById("select_active_advert"),
		radioSortyByAll = document.getElementById("radio_sortby_all"),
		radioSortyByExpiresIn = document.getElementById("radio_sortby_expires_in"),
		radioSortyByExpiredBy = document.getElementById("radio_sortby_expired_by"),
		radioSortyByBusinessName = document.getElementById("radio_sortby_business_name"),
		textDays = document.getElementById("text_days");
		textBusiness = document.getElementById("text_sort_business_name");
	
	if (textDays && textBusiness && radioSortyByAll && radioSortyByExpiresIn && radioSortyByExpiredBy && 
		radioSortyByBusinessName && selectAdvertSlot)
	{
		selectAdvertSlot.options.length = 0;
		let dateNow = new Date(),
			dateExpiry = new Date(),
			dateAdvertExpiry = new Date();
		
		if (radioSortyByAll.checked)
		{
			let objectSelectOption = null;
			for (let nI = 0; nI < g_arrayAdvertsTable.length; nI++)
			{
				objectSelectOption = new Option(g_arrayAdvertsTable[nI]["advert_slot_desc"], g_arrayAdvertsTable[nI]["advert_slot_id"]);
				selectAdvertSlot.add(objectSelectOption);
			}
		}
		else if (radioSortyByExpiresIn.checked)
		{
			dateNow = new Date();
			dateExpiry = dateNow;
			dateExpiry.setDate(dateExpiry.getDate() + parseInt(textDays.value, 10));
			for (let nI = 0; nI < g_arrayAdvertsTable.length; nI++)
			{
				dateAdvertExpiry = new Date(g_arrayAdvertsTable[nI]["expiry_date"]);
				if ((dateAdvertExpiry >= dateNow) && (dateAdvertExpiry <= dateExpiry))
				{
					objectSelectOption = new Option(g_arrayAdvertsTable[nI]["advert_slot_desc"], g_arrayAdvertsTable[nI]["advert_slot_id"]);
					selectAdvertSlot.add(objectSelectOption);
				}
			}
		}
		else if (radioSortyByExpiredBy.checked)
		{
			dateNow = new Date();
			dateExpiry = dateNow;
			dateExpiry.setDate(dateExpiry.getDate() - parseInt(textDays.value, 10));
			for (let nI = 0; nI < g_arrayAdvertsTable.length; nI++)
			{
				dateAdvertExpiry = new Date(g_arrayAdvertsTable[nI]["expiry_date"]);
				if ((dateAdvertExpiry >= dateExpiry) && (dateAdvertExpiry <= dateNow))
				{
					objectSelectOption = new Option(g_arrayAdvertsTable[nI]["advert_slot_desc"], g_arrayAdvertsTable[nI]["advert_slot_id"]);
					selectAdvertSlot.add(objectSelectOption);
				}
			}
		}
		else if (radioSortyByBusinessName.checked)
		{
			for (let nI = 0; nI < g_arrayAdvertsTable.length; nI++)
			{
				if (textBusiness.value === g_arrayAdvertsTable[nI]["business_name"])
				{
					objectSelectOption = new Option(g_arrayAdvertsTable[nI]["advert_slot_desc"], g_arrayAdvertsTable[nI]["advert_slot_id"]);
					selectAdvertSlot.add(objectSelectOption);
				}
			}
		}
		selectAdvertSlot.selectedIndex = 0;
	}
}

function OnChangeTextPaymentAmount()
{
	let textCostPerMonth = document.getElementById("text_extend_cost_per_month"),
		textPaymentAmount =	document.getElementById("text_extend_payment_amount"),
		textNumberOfMonths = document.getElementById("text_extend_number_months"),
		dateNewExpiryDate = document.getElementById("text_new_expiry_date"),
		dateExpiryDate = document.getElementById("text_extend_expiry_date");
					
	if (textCostPerMonth && textPaymentAmount && textNumberOfMonths && dateNewExpiryDate && dateExpiryDate)
	{
		textNumberOfMonths.value = Math.trunc(Number(textPaymentAmount.value) / Number(textCostPerMonth.value));

		let dateExpiry = new Date(dateExpiryDate.value),
			dateNewExpiry = dateExpiry;
					
		dateNewExpiry.setMonth(dateNewExpiry.getMonth() + 1 + Number(textNumberOfMonths.value));
		dateNewExpiryDate.value = String(dateNewExpiry.getFullYear()) + "-" + 
									String(dateNewExpiry.getMonth()).padStart(2, "0") + "-" + 
									String(dateNewExpiry.getDate()).padStart(2, "0");
	}
}


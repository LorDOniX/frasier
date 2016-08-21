function kontrola_1 ()
{
	hodnota_1 = document.login.login.value;
	hodnota_2 = document.login.heslo.value;
	if (hodnota_1 == "" || hodnota_2 == "")
	{
	 window.alert('Musíte zadat login a heslo !');
	 return false;
  }
	else
	{
	 return true;
	}
}
function kontrola_2 ()
{
	hodnota_1 = document.registrace.login.value;
	hodnota_2 = document.registrace.heslo.value;
	if (hodnota_1 == "" || hodnota_2 == "")
	{
	 window.alert('Musíte zadat login a heslo !');
	 return false;
  }
	else
	{
	 return true;
	}
}
function kontrola_3 ()
{
	hodnota_1 = document.forum.jmeno.value;
	hodnota_2 = document.forum.zprava.value;
	hodnota_3 = document.forum.kod.value;
	if (hodnota_1 == "" || hodnota_2 == "" || hodnota_3 == "")
	{
	 window.alert('Musíte zadat jméno, zprávu a kód !');
	 return false;
  }
	else
	{
	 return true;
	}
}
function kontrola_4 ()
{
	hodnota_1 = document.hledani.vyraz.value;
	if (hodnota_1 == "")
	{
	 window.alert('Musíte zadat hledaný výraz !');
	 return false;
  }
	else
	{
	 return true;
	}
}
function vloz_smajlika(smajlik)
{
  var text = document.forum.zprava.value;
  text = text + smajlik;
  document.forum.zprava.value = text;
  document.forum.zprava.focus();
	return;
}

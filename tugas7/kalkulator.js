function tambah()
{
	var bil1 = parseFloat(document.kalkulator.a.value);
	var bil2 = parseFloat(document.kalkulator.b.value);
	var hasil = bil1 + bil2;
	document.kalkulator.hasil.value = hasil;
	if(!bil1 && !bil2)
	{
		alert('Tidak Ada Bilangan Dimasukkan!');
		return false;
	}
	else if(!bil1)
	{
		alert('Bilangan 1 Tidak Dimasukkan!');
		return false;
	}
	else if(!bil2)
	{
		alert('Bilangan 2 Tidak Dimasukkan!');
		return false;
	}
	else
	{
		return true;
	}
}

function kurang()
{
	var bil1 = parseFloat(document.kalkulator.a.value);
	var bil2 = parseFloat(document.kalkulator.b.value);
	var hasil = bil1 - bil2;
	document.kalkulator.hasil.value = hasil;
	if(!bil1 && !bil2)
	{
		alert('Tidak Ada Bilangan Dimasukkan!');
		return false;
	}
	else if(!bil1)
	{
		alert('Bilangan 1 Tidak Dimasukkan!');
		return false;
	}
	else if(!bil2)
	{
		alert('Bilangan 2 Tidak Dimasukkan!');
		return false;
	}
	else
	{
		return true;
	}
}

function bagi()
{
	var bil1 = parseFloat(document.kalkulator.a.value);
	var bil2 = parseFloat(document.kalkulator.b.value);
	var hasil = bil1 / bil2;
	document.kalkulator.hasil.value = hasil;
	if(!bil1 && !bil2)
	{
		alert('Tidak Ada Bilangan Dimasukkan!');
		return false;
	}
	else if(!bil1)
	{
		alert('Bilangan 1 Tidak Dimasukkan!');
		return false;
	}
	else if(!bil2)
	{
		alert('Bilangan 2 Tidak Dimasukkan!');
		return false;
	}
	else
	{
		return true;
	}
}

function kali()
{
	var bil1 = parseFloat(document.kalkulator.a.value);
	var bil2 = parseFloat(document.kalkulator.b.value);
	var hasil = bil1 * bil2;
	document.kalkulator.hasil.value = hasil;
	if(!bil1 && !bil2)
	{
		alert('Tidak Ada Bilangan Dimasukkan!');
		return false;
	}
	else if(!bil1)
	{
		alert('Bilangan 1 Tidak Dimasukkan!');
		return false;
	}
	else if(!bil2)
	{
		alert('Bilangan 2 Tidak Dimasukkan!');
		return false;
	}
	else
	{
		return true;
	}
}

function ver1()
{
	alert('Kalkulator versi 1 yang saya buat hanya dapat melakukan perhitungan dengan 2 bilangan saja');
	return true;
}

function ver2()
{
	alert('Kalkulator versi 2 yang saya buat dapat melakukan perhitungan dengan lebih dari 2 bilangan');
	return true;
}


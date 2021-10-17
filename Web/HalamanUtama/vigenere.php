<?php

// fungsi untuk mengubah (enkripsi,dekripsi)text yg diinput
function encrypt($pswd, $text)
{
	// ubah jadi hruf kecil smua
	$pswd = strtolower($pswd);
	
	// deklarasi variabel
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	

	for ($i = 0; $i < $length; $i++)
	{
		// jika text sudah bentuk alpabet maka enkripsi dilakukan
		if (ctype_alpha($text[$i]))
		{
			// hruf besar
			if (ctype_upper($text[$i]))
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
			}
			
			// hruf kecil
			else
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
			}
			
			// update the index of key
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// return kode enkripsi
	return $text;
}

// fungsi ntuk mengubah kembali text yg dienkripsi
function decrypt($pswd, $text)
{
	// ubah jadi text kecil biar mudah
	$pswd = strtolower($pswd);
	
	// buat variable
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	
	// menggunakan perulangan
	for ($i = 0; $i < $length; $i++)
	{
		// jika text alpabhet maka dekripsi dilakukan
		if (ctype_alpha($text[$i]))
		{
			// huruf besar
			if (ctype_upper($text[$i]))
			{
				$x = (ord($text[$i]) - ord("A")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("A");
				
				$text[$i] = chr($x);
			}
			
			// huruf kecil
			else
			{
				$x = (ord($text[$i]) - ord("a")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("a");
				
				$text[$i] = chr($x);
			}
			
			// update the index of key
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// return dekripsi text
	return $text;
}

?>
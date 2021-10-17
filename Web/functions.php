<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$conn = mysqli_connect('localhost', 'root', '', 'presensi');
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
	
}


function registrasi($data)
{

    global $conn;
    $username = strtolower($data["username"]); 
	    $nomer= mysqli_escape_string($conn, $data['nomor']); 

    $password =mysqli_escape_string($conn, $data["password"]);
    $password2 = mysqli_escape_string($conn, $data['password2']);
	$email = strtolower($data["email"]); 
	
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // invalid emailaddress
}

    $result = mysqli_query($conn, "SELECT username FROM data WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)) {
        echo "
            <script>
            alert('Username sudah terdaftar');
            </script>
        ";

        return false;
    }
    
 
    
    $domain = substr($email, strpos($email, '@') + 1);
if  (checkdnsrr($domain) !== FALSE) {
    echo "
            <script>
            alert('Email is valid');
            </script>
        ";
    
   }else{
            echo "
            <script>
            alert('Email is invalid');
            </script>
        ";
        
      return false;
   }
   
 $domain = substr($email, strpos($email, '@') + 1);
if  (checkdnsrr($domain) !== FALSE) {
    echo "
            <script>
            alert('Domain is valid');
            </script>
        ";
    
   }else{
            echo "
            <script>
            alert('Domain is invalid');
            </script>
        ";
        
      return false;
   }

    if($password!=$password2){
        echo "
        <script>
        alert('Password tidak sama');
        </script>
    ";

    return false;
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
	
       
		$status = 'Belum verifikasi';
       $code = rand(999999, 111111);
		
		
		
        $add = mysqli_query($conn, "INSERT INTO data VALUES('', '$username', '$password', '$email', '', '','$nomer', '$code','$status')")or die(mysqli_error($conn) );
        ini_set('smtp','smtp.gmail.com');
		
	 $mail = new PHPMailer(true);
    $mail->IsSMTP(); 
	    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->SMTPAuth 	= true; 
    $mail->Host 		= "smtp.gmail.com";
    $mail->Port 		= 465;
    $mail->SMTPSecure 	= "ssl";
    $mail->Username 	= "dhdanielhabib@gmail.com"; //username SMTP
    $mail->Password 	= "D4nielhabib123";   //password SMTP
	$mail->From    		= "dhdanielhabib@gmail.com"; //sender email
	
	$mail->FromName 	= "DHgames";      //sender name
	$mail->AddAddress("$email", "$username");//recipient: email and name
	$mail->Subject  	=  "Email Verifikasi";
	$mail->Body     	=  "Berikut adalah code verifikasi anda $code, jangan menerima kode ini dari yang lain selain dari email resmi.";
	
    
	if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}
        return mysqli_affected_rows($conn);
    }

}



?>
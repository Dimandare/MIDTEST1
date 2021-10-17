<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: .../HalamanUtama/HalamanUtama.php");
    exit;
}
require '../functions.php';
$conn = mysqli_connect('localhost', 'root', '', 'presensi');
if (isset($_POST["submit"])) {
	
	$sudah = 'sudah verifikasi';
	
	$code = $_POST["code"];
	
     $hasil = mysqli_query($conn, "SELECT * FROM data WHERE code = '$code'");
	 while ($baris = mysqli_fetch_assoc($hasil)){
	$ya = $baris['username'];
	
}
	
	if(mysqli_num_rows($hasil)>=1){
		$sql = mysqli_query($conn,"UPDATE data SET status='$sudah' WHERE code='$code'") or die(mysqli_error($conn));
	
           ob_start();
echo "<script>alert('Selamat Datang di System Presensi Daniel!Silahkan Login kembali!');</script>";
header("Location:../index.php");
         ob_end_flush();
          
            exit;
	}else{
		 echo "<script>alert('Mohon maap ni kodenya salah!');</script>";
		 header("Location: Verif.php");
		 
	}
}

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="Logo1.png" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DH Games</title>
    <link rel="stylesheet" href="../style3.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
  
    <div class="bg-img">
      <div class="content">
        <header>Verify Account</header>
   <form action="" method="post" style="padding-top: 80px; padding-bottom:50px;">
   <h3 style="color: white; margin-top: -50px;font-family: 'Montserrat',sans-serif;">"Fill up code that we sent!" </h3>
   <br>
   <br>
   <br>
   <br>
   <br>
  
          <div class="field">
            <span class="fa fa-user"></span>
                            <input type="number" class="form-control" required id="code" name="code" autofocus placeholder="Masukan code">
          </div>
		  
          
		 
          <div class="pass">
            
          </div>
		  <br>
   <br>
          <div class="field">
                <input type="submit" class="btn btn-primary" name="submit" id="submit" ></input>
          </div>
		  
   </form>
		 
        
        <div class="signup">Already have account?
          <a href="../index.php">Login Now</a>
        </div>
      </div>
    </div>
	
<div class="mark">
	<br>
	            <div class="Logo">
				
				</div>
			    <b><h3>DH Games</h3><b>
				<br><h6>@2021 DH Games,INC.DH Game, Any Associated Logo Are Trademark registered ADHGames.Inc</h6>
			 </div>
   


  </body>
</html>

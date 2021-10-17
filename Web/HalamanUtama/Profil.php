<?php

	require '../functions.php'; 
	
 session_start();

 if (!isset($_SESSION['username'])) {
   header("Location: ../index.php");
}
 $ya = $_SESSION['username'];

/*Ambil Data dari data dengan username =  $ya */
$customer = mysqli_query($conn,"SELECT * FROM data WHERE username = '$ya'");
 $doto = mysqli_num_rows($customer);
while ($urutan = mysqli_fetch_array($customer)){
	$user  = $urutan['username'];
	$email = $urutan['email'];
	$alamat = $urutan['alamatrumah'];
	if (empty($urutan['alamatrumah'])) { 
	 echo "<script>
	                 alert('Your Profile Pic is Empty, Please Fill Up!');
	                 window.location.href='diedit.php';
	                 </script>";
	}else{
		$alamatrumah = base64_decode($alamat);
	}
	$Image = $urutan['img'];
}
	
	?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		 <meta name="viewport" content="width=device-width initial-scale=1.0" >
		<title>DH Games</title>
		 <link rel="shortcut icon" type="image/x-icon" href="../Logo1.png" />
		<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
		<link rel="stylesheet" href="button.css">
		<link rel="stylesheet" href="../../loading.css">
        
	
	</head>
	<body><a href="HalamanUtama.php">
<button type="submit" class="btn btn3"name="back" id="tombol" style="margin-top: 100px; left:20%;">Kembali?</button></a>
		
			
		<center>
			  <div class="main">
			      <br>
			      <br><br>
			   <?php echo '<img class="img-circle" id="profile_picture" height="128" data-holder-rendered="true" style=" border-radius: 50%; width: 140px; height: 140px;" src="data:image/jpeg;base64,'.base64_encode( $Image ).'">'?>
			   <h1 style="color: #6944ff;font-weight: bold;margin: 0;font-size: 30px;text-align:center;"id="user"><?php echo $user;?></h1>
			   <div class="text" id="Alamat"style="color: #324e63;margin:: 0;font-size: 15px;text-align: center;"> <?php echo $alamatrumah;?><strong> <?php echo $alamatrumah;?></strong></div>
			   <p style="color: #324e63;height:auto;width: 450px;padding-top: 20px;margin: 0 auto;" id="email"><?php echo $email;?></p>
			   
			   <a href="diedit.php">
			   <button type="submit" class="btn btn2"name="submit" id="tombol" style="margin-top: 100px">UBAH DATA?</button>
			   </a>
	
			   
			   </div>
		
		   </center>
			  
			  
			  
       

		<script type="text/javascript">
		$(document).ready(function(){
			$(".sidebar-btn").click(function(){
				$(".wrapper").toggleClass("collapse");
			});
		});
		</script>
     
	 <!--CSSloading-->
	 <link rel="stylesheet" href="CSS/loading.css">
	<div class="loader-wrapper">
	<span class="loader"><span class="loader-inner"></span></span>
	</div>
	
	<script>
	$(window).on("load",function(){
	$(".loader-wrapper").fadeOut(1000);
	});
	</script></link>
	</body>
</html>

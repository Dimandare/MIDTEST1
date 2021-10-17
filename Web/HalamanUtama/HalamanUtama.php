<?php

	

session_start();

require '../functions.php'; 






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
	$alamatrumah = $urutan['alamatrumah'];
	$Image = $urutan['img'];
	
	if (empty($urutan['img'])) { 
	                 echo "<script>
	                 alert('Your Profile Pic is Empty, Please Fill Up!');
	                 window.location.href='Profil.php';
	                 </script>";
	                 

    
    
} 
	
}
	



	?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset='UTF-8'>
		<title>DH Games</title>
		<link rel="shortcut icon" type="image/x-icon" href="Logo1.png" />
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
		<link rel="stylesheet" href="loading.css">
		

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	
	</head>
	<body>

		<!--wrapper start-->
		<div class="wrapper">
			<!--header menu start-->
			<div class="header">
				<div class="header-menu">
					<div class="title">SYSTEM ABSENSI<span></span></div>
					
					<ul>
						
						<li><a href="logout.php"><i class="fas fa-power-off"></i></a></li>
					</ul>
				</div>
			</div>
			<!--header menu end-->
			<!--sidebar start-->
			

			<div class="sidebar">
				<div class="sidebar-menu">
				    <div class="sidebar-btn">
					<div class="slide">	<i class="fas fa-expand-alt" aria-hidden="true"></i></div>
					</div>
					<center class="profile">
				<a href="Profil.php" ><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $Image ).'"/>'; ?></a>
						<p class="nama" id="nama" ><?php echo $user;?></p><!--Variblephp-->
					</center>
					<li class="item">
						<a href="#" class="menu-btn">
							<i class="fas fa-desktop"></i><span>Absensi</span>
						</a>
					</li>
					
					<li class="item">
						<a href="jadwal/jadwal.php" class="menu-btn">
							<i class="fas fa-info-circle"></i><span>Jadwal</span>
						</a>
					</li>
				</div>
			  </div>
			  <table>
       
	
			  </div>
			 
    
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->		  

			   
          <div class="main"id="play">
  <iframe src="https://ocw.uns.ac.id/" style="border: 0; width: 100%; height: 100%">
</div> 
	<div id="mydiv3" style="display:none">
	<audio id="beep-one" controls="controls" preload="auto">
				<source src="Portalsf.mp3"></source>
			    <source src="Portalsf.ogg"></source>
				Your browser isn't invited for super fun time.
			</audio></center></div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

  <script>var beepOne = $("#beep-one")[0];
$("#play")
	.mouseenter(function() {
		beepOne.play();
		loop = true;
	});
	
$("#play")
	.mouseleave(function() {
		beepOne.pause();
	});</script>

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

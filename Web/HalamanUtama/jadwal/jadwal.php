<?php

	require '../../functions.php'; 
 session_start();
 if (!isset($_SESSION['username'])) {
   header("Location: ../../index.php");
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
}
	

 


$sql = 'SELECT id, matkul, jam, dosen, PJ, Assisten, no, media, link, presensi
		FROM jadwal';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

	
	

	?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
	  
		<meta charset="UTF-8">
     	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>DH Games</title>
		<link rel="shortcut icon" type="image/x-icon" href="Logo1.png" />
		<link rel="stylesheet" href="style.css">
				<link rel="stylesheet" href="button.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>  
		
		 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	    <link rel="stylesheet" href="../../../loading.css">
	</head>
	<body>

		<!--wrapper start-->
		<div class="wrapper">
			<!--header menu start-->
			<div class="header">
				<div class="header-menu">
					<div class="title"><i class="fas fa-book"></i>Jadwal<span></span></div>
					
					<ul>
						
						<li><a href="../../logout.php"><i class="fas fa-power-off"></i></a></li>
					</ul>
				</div>
			</div>
			<!--header menu end-->
		
			<!----------------------------------------------------------------------------------------------------------------------------------------------->  
		
<div class="limiter">
<div class="container-table100">
<div class="wrap-table100">
<div class="table100">
			 <section class="konten">
			 <center><div class="container">
			 <h1><strong>Jadwal Matkul Hari Ini</strong></h1>
			 <hr>
			 <table class="table table-bordered">
			    <thead>
				<tr class="table100-head">
					   <th>Id</th>
					   <th>Mata Kuliah</th>
					   <th>Jam</th>
					   <th>Dosen Pengampu</th>
					   <th>PJ Kuliah</th>
					   <th>Assisten</th>
					    <th>No.Dosen</th>
						 <th>Media Kuliah</th>
						 <th>Link Kelas</th>
						 <th>Presensi</th>
					</tr>  
				</thead>
				<tbody>
				<?php 
				while ($row = mysqli_fetch_array($query))
{   ?>
				   <tr>
					     <td><?php echo $row['id'] ?></td>
						<td ><?php echo $row['matkul'] ?></td>
						<td><?php echo $row['jam'] ?></td>
						<td><?php echo $row['dosen'] ?></td>
						<td><?php echo $row['PJ'] ?></td>
						<td><?php echo $row['Assisten'] ?></td>
						<td><?php echo $row['no'] ?></td>
						<td><?php echo $row['media'] ?></td>
						<td><a href="<?php echo $row['link'] ?>"><?php echo $row['link'] ?></a></td>
						<td><?php echo $row['presensi'] ?></td>
					</tr>
<?php }
mysqli_free_result($query);

mysqli_close($conn);
?>
				</tbody></table>
				
		<div class="total">
		    <table>
		        <th>	<center class="profile">
				<a href="../../Profile/Profil.php" >		<?php echo '<img class="img-circle" id="profile_picture" height="128" data-holder-rendered="true" style=" border-radius: 50%; width: 140px; height: 140px;" src="data:image/jpeg;base64,'.base64_encode( $Image ).'">'?></a>
					</center></th>
		    <th>
			<h3><input type="text" id="input" disabled value="<?php echo $user; ?>"/></h3>
			</th>
			<th>
			Semester 3
			</th>
			<th>
		<h3><input type="text" id="input" disabled value="<?php echo $email; ?>"/></h3>
			</th>
			<th>
			    Mahasiswa Aktif
			</th>
			<th></th>
			</table>
		</div></center>
			
			</section>
			  </div>
			  
			  </div>
			  
			 <div class="back"> <a href="../HalamanUtama.php"><button type="text" class="btn btn2"name="submit" id="tombol" style="margin-top: 100px">Back?</button></a>
		
				 
				
	

<!--
	<div class="img"><?php /*echo '<img src="data:image/jpeg;base64,'.base64_encode( $nup ).*/'"/>'; ?></div>
	-->
	              </div>
	             </div>
			  </div>
			  </div>
			</div>
            <!-----------------------------------------------------------------------------------------------------------------------------------------------> 



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

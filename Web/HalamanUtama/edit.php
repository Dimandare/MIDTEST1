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
while ($urutan = mysqli_fetch_assoc($customer)){
	$user  = $urutan['username'];
	$email = $urutan['email'];
	$alamatrumah = $urutan['alamatrumah'];
	$no = $urutan['nomor'];
	$Image = $urutan['img'];
}
if(isset($_POST['submit'])){
	    
	
      
       $work = strtolower($_POST["pekerjaan"]); 
	   $alamat = strtolower($_POST["alamat"]); 
		$email = strtolower($_POST["email"]); 
        $img 		= mysqli_real_escape_string($conn,file_get_contents($_FILES["gambar"]["tmp_name"]));
        $imagetype	= mysqli_real_escape_string($conn, $_FILES["gambar"]["type"]);
   		if(substr($imagetype,0,5)== "image"){
			
		   			$sql = mysqli_query($conn,"UPDATE data SET email='$email', alamatrumah='$alamat', nomor='$no', img='$img' WHERE username='$ya'") or die(mysqli_error($conn));
if (($sql) === TRUE) {
    echo "<script>alert('New Record Succesfull!');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
		   echo "<script>alert('Update Success!, Please Reload');</script>";
        }
        else
        { 
		  echo "<script>alert('Image are allowed!');</script>";
		}
		
	
	
}
        	

  
	
	?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		 <meta name="viewport" content="width=device-width initial-scale=1.0" >
		<title>DH Games</title>
		<link rel="shortcut icon" type="image/x-icon" href="../Logo1.png" />
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
		<link rel="stylesheet" href="button.css">
		<link rel="stylesheet" href="../../loading.css">
	</head>
	<body>

		
			 <br>
			  <br>
			  <br>
			  <br>
			  <center>
			  <div class="main">
			 
			   <img class="img-circle" id="output" height="128" data-holder-rendered="true" style="margin: 0 auto; border-radius: 50%; width: 140px; height: 140px;" src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $Image ).''; ?>">
			  <script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
				
			    <form method="post" name="image" action="" enctype="multipart/form-data">
			        
				<table>
				    <tr>
				        <td>
				            <p style="color: white;font-family: "Lucida Console", "Courier New", monospace;"/> Make sure to upload images according to JPG/JPEG format (max100kb)
				        </td>
				    </tr>
			<tr>
				<td>
			   <nbsp><nbsp><input type="file" name="gambar" onchange="loadFile(event)"/>
			   </td>
			</tr>
            <tr>
			   <td>			
			   <input type="text" disabled class="form-control" id="username" name="username" autofocus placeholder="Username" value="<?php echo $user;?>">
			   </td>
			</tr>
			<tr>
			   <td>
			   <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" autofocus placeholder="Pekerjaan" value="<?php echo $pekerjaan;?>"><input type="text" class="form-control" id="alamat" name="alamat" autofocus placeholder="Alamat" value="<?php echo $alamatrumah;?>">
			   </td>
			</tr>
			<tr>
			   <td>
			   <input type="text" class="form-control" id="email" name="email" autofocus placeholder="Email" value="<?php echo $email;?>">
			   </td>
			</tr>
			<tr>
			   <td>
			     </td>
			</tr>
			
			  
		
		      </table>
			 
			  <button type="submit" class="btn btn2"name="submit" id="tombol" style="margin-top: 100px">SUBMIT</button>
			   </form>
			  
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

<?php
require 'functions.php';
if (isset($_POST["submit"])) {
	
	
	
function verify($cover)
{
	global $conn;
    $name = strtolower($cover["nomor"]); 
	
	
     $hasil = mysqli_query($conn, "SELECT username FROM data WHERE username = '$name'");
	 
	 if(mysqli_fetch_assoc($hasil)) {
        echo "
            <script>
            alert('Change your password here  $name');
			document.location.href='Recovery.php?user=$name';
            </script>
        ";

        return false;
    }
	else {
        
        echo "
            <script>
            alert('Username are in database');
            </script>
        ";
		   
        return mysqli_affected_rows($conn);
    }
}

    if (recovery($_POST) > 0) {

        echo "
         <script>
            alert('Change your password here $name');
			document.location.href='Recovery.php?user=$name';
        </script>
        ";
    } else {
        echo "
        <script>
           document.location.href='Recovery1.php';
       </script>
       ";
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
   <h3 style="color: white; margin-top: -50px;font-family: 'Montserrat',sans-serif;">"Fiil up your Username!" </h3>
   <br>
   <br>
   <br>
   <br>
   <br>
  
          <div class="field">
            <span class="fa fa-user"></span>
                            <input type="text" class="form-control" id="username" name="username" autofocus placeholder="Username">
          </div>
		  
          
		 
          <div class="pass">
            <nbsp>ha
          </div>
		  <br>
   <br>
          <div class="field">
                <input type="submit" class="btn btn-primary" name="submit" id="submit" ></input>
          </div>
		  
   </form>
		 
        
        <div class="signup">Already have account?
          <a href="login.php">Login Now</a>
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

<?php
require 'functions.php';
if (isset($_POST["submit"])) {
$username= $_GET ["user"];
	$pass = $_POST["password"];
    $pass2 = $_POST['password2'];
	 
    
	 if($pass!=$pass2){
        echo "
        <script>
        alert('Password doesnt match');
		javascript:history.go(-1);
        </script>
    ";

    return false;
    } else{
		    $pass= password_hash($pass, PASSWORD_DEFAULT);
			$sql = mysqli_query($conn,"UPDATE data SET password='$pass' WHERE username='$username'") or die(mysqli_error($conn));
          echo "
            <script>
            alert('Thankyou your account has been update!');
			document.location.href='login.php';
            </script>
        ";
	}
	

}
    

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="shortcut icon" type="image/x-icon" href="Logo1.png" />

    <title>DH Games</title>
    <link rel="stylesheet" href="style3.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
  
    <div class="bg-img">
      <div class="content">
        <header>Recovery Account</header>
   <form action="" method="post" style="padding-top: 80px; padding-bottom:50px;">
   <h3 style="color: white; margin-top: -50px;font-family: 'Montserrat',sans-serif;">"Change your password!" </h3>
   <br>
   <br>
   <br>
   <br>
   <br>
  
         
		  <div class="field space">
            <span class="fa fa-lock"></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <span class="show">SHOW</span>
          </div>
		  <div class="field space">
            <span class="fa fa-lock"></span>
                        <input type="password" class="form-control" id="password2" name="password2" required placeholder="Confirm password">
            <span class="show">SHOW</span>
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

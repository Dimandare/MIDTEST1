<?php

session_start();




	//check if can login again
	if(isset($_SESSION['attempt_again'])){
		$now = time();
		if($now >= $_SESSION['attempt_again']){
			unset($_SESSION['attempt']);
			unset($_SESSION['attempt_again']);
		}
	}
	

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DH Games</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
            <link rel="shortcut icon" type="image/x-icon" href="Logo1.png" />
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style3.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
  
    <div class="bg-img">
      <div class="content">
        <header>Login </header>
		
		
  <form method="POST" action="attempt.php">
          <div class="field">
            <span class="fa fa-user"></span>
                            <input type="text" class="form-control" id="username" name="username" autofocus placeholder="Username">
          </div>
          <div class="field space">
            <span class="fa fa-lock"></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <span class="show">SHOW</span>
          </div>
          <div class="pass">
            <a href="Recovery1.php">Forgot Password?</a>
          </div>
          <div class="field">
                <input type="submit" class="btn btn-primary" name="submit" id="submit" ></input>
          </div>
		   
   </form>
		  <div class="field">
       <?php
				if(isset($_SESSION['error'])){
					?>
					<div class="alert alert-danger text-center" style="margin-top:20px;">
						<?php echo $_SESSION['error']; ?>
					</div>
					<?php

					unset($_SESSION['error']);
				}

				if(isset($_SESSION['success'])){
					?>
					<div class="alert alert-success text-center" style="margin-top:20px;">
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php

					unset($_SESSION['success']);
				}
			?>
        </div>
        <div class="signup">Don't have account?
          <a href="registrasi.php">Signup Now</a>
        </div>
      </div>
    </div>

   
<div class="mark">
	<br>
	            <div class="Logo">
				
				</div>
			    <b><h3>DH Games</h3><b>
				<br><h6>@2021 DH Games,INC.DH Game, Any Associated Logo Are Trademark registered DHGames.Inc</h6>
			 </div>


  </body>

  </body>
</html>

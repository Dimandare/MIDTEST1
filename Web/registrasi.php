<?php
require 'functions.php';
if (isset($_POST["submit"])) {

    if (registrasi($_POST) > 0) {

        echo "
         <script>
            alert('Registrasi Success, Please Login!');
            document.location.href='verif/Verif.php';
        </script>
        ";
    } else {
        echo "
        <script>
           alert('Registration Failed');
           document.location.href='registrasi.php';
       </script>
       ";
    }
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="Logo1.png" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DH Games</title>
    <link rel="stylesheet" href="style3.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
  
    <div class="bg-img">
      <div class="content">
        <header>Registration</header>
   <form action="" method="post" style="padding-top: 80px; padding-bottom:50px;">
          <div class="field">
            <span class="fa fa-user"></span>
                            <input type="text" class="form-control" id="username" name="username" required autofocus placeholder="Username"></input>
          <button type="button"  id="1" class="addService">Next</button></div>
          <script>
          
        $(document).on('click', '.addService', function(){
	var html = '<div class="field space"><span class="fa fa-phone"></span><input type="number" required lass="form-control" id="nomor" name="nomor" autofocus placeholder="+62"></input><button type="button" id="2" class="addService1">Next</button></div>';

  $(".field").parent().append(html);
  
    $("#1").remove();


});</script>
          <script>
          
        $(document).on('click', '.addService', function(){
	var html = '<div class="field space"><span class="fa fa-envelope"></span><input type="text" required class="form-control" id="email" name="email" autofocus placeholder="Email"></input><button type="button" id="3" class="addService1">Next</button></div>';

  $(".field").parent().append(html);
  
    $("#2").remove();


});</script>
<script>
          
        $(document).on('click', '.addService1', function(){
	var html = '<div class="field space"><span class="fa fa-lock"></span><input type="password" required class="form-control" id="password" name="password" placeholder="Password"></input><span class="show">SHOW</span></div><div class="field space"><span class="fa fa-lock"></span><input type="password" class="form-control" id="password2" name="password2" placeholder="Password"></input><span class="show">SHOW</span><button type="button" id="4" class="addService2">Next</button></div>';
 $(".field").parent().append(html);
  $("#3").remove();
});</script>
<script>
          
        $(document).on('click', '.addService2', function(){
	var html = '<div class="field space"><input type="submit" class="btn btn-primary" name="submit" id="submit" ></input></div>';
 $(".field").parent().append(html);
  $("#4").remove();
});</script>
		  
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

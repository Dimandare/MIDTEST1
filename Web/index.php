<?php
	session_start();
	if (isset($_SESSION["login"])) {
    header("Location: HalamanUtama/HalamanUtama.php");
    exit;
}
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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>by. DH Games</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
            <link rel="shortcut icon" type="image/x-icon" href="Logo1.png" />
			<link rel="stylesheet" href="button.css">
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style3.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	
</head>
<body>
<div class="bg-img">
      <div class="content">
        <header>Presensi Online </header>
		<h2>by dhgames</h2>
		<span >Kunjungi:<a href="https://www.dhgames.store">DHGames.store</a></span>
	
		<div class="col-sm-4 col-sm-offset-4 panel panel-default" style="padding:20px;">
			<form method="POST" action="login.php">
			
				
				<div class="field">
                 <span class="fa fa-user"></span>
					<input type="text" name="username" id="username" class="form-control" placeholder="username">
				</div>
				<div class="field space">
               <span class="fa fa-lock"></span>
					<input type="password" name="password" id="password" class="form-control" placeholder="password">
				</div>
				<div class="space">
				<button type="submit" name="login" class="btn btn2"><span class="glyphicon glyphicon-log-in"></span> Login</button>
			    </div>
			</form>
			<?php
				if(isset($_SESSION['error'])){
					?>
					<div class="alert alert-danger text-center" style="margin-top:20px;">
						<?php echo $_SESSION['error']; ?>
						
					</div>
					<?php

					unset($_SESSION['error']);
				}
                  if(isset($_SESSION['belum'])){
					?>
					<div class="alert alert-danger text-center" style="margin-top:20px;">
						<?php echo $_SESSION['belum']; ?>
						
					</div>
					<?php

					unset($_SESSION['belum']);
				}
				
			?>
		</div><div class="signup">Don't have account?
          <a href="registrasi.php">Signup Now</a>
        </div>
	</div>
</div>
</body>
</html>
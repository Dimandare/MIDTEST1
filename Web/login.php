<?php
	session_start();

	if(isset($_POST['login'])){
		
		$conn = new mysqli('localhost', 'root', '', 'presensi');

		
		if(!isset($_SESSION['attempt'])){
			$_SESSION['attempt'] = 0;
		}

		
		if($_SESSION['attempt'] == 3){
			$_SESSION['error'] = 'Attempt limit reach';
		}
		else{
			
			$sql = "SELECT * FROM data WHERE username = '".$_POST['username']."'";
			
			$query = $conn->query($sql);
			if($query->num_rows > 0){
				$row = $query->fetch_assoc();
				
				if(password_verify($_POST['password'], $row['password'])){
					
					
                 $_SESSION["login"] = true;
            $_SESSION["username"] = $_POST['username'];
           
            header("Location: HalamanUtama/HalamanUtama.php");
					
					unset($_SESSION['attempt']);
				}
				else{
					$_SESSION['error'] = 'Password incorrect';
					
					$_SESSION['attempt'] += 1;
					
					if($_SESSION['attempt'] == 3){
						$_SESSION['attempt_again'] = time() + (1*60);
						
					}
				}
			}
			else{
				$_SESSION['error'] = 'No account with that username';
			}

		}

	}
	else{
		$_SESSION['error'] = 'Fill up login form first';
	}

	header('location: index.php');

?>
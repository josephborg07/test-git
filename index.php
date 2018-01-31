<html>
	<head>
		<!--<link rel="stylesheet" type="text/css" href="css/styles.css" />-->
		<title>Test</title>
	</head>
	<body>
		<?php
		#Getting the mysql connection from mysql_connection.php file
		include 'mysql_connection.php';	 	
		
	 	if(isset($_POST["username"])&&isset($_POST["password"])){
	 			$username=$_POST["username"];
	 			$password=$_POST["password"];

	 			if(!empty($username)&&!empty($password)){ #check if credential fields are empty
					$cred_query="SELECT username, password FROM `users` WHERE username='".$username."'AND password='".$password."'";
	 				$mysqli_exec=mysqli_query($conn,$cred_query);
	 				if(mysqli_num_rows($mysqli_exec)>0){ #check if mysql query returned any results (if result > 0 query was successful)
						include 'cookie.php';
					}
					else{
						echo "Username and password incorrect";
					}
				}
				else{
					echo "Please enter username and password";
				}
	 		}
		
		
		?>
		<div class="main_container">
			<div class="login_area">
				<form method="post" action="">
					<div class="form_fields">
						<label>Username</label><input type="text" name="username" />
						<label>Password</label><input type="password" name="password" />
					</div>
					<input type="submit" value="submit">
				</form>
				
			</div>
		</div>
	</body>
</html>
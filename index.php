<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<title>Test</title>
	</head>
	<body>
		<?php
		#Getting the mysql connection from mysql_connection.php file
		include 'mysql_connection.php';	 	
		#include 'login.php';
		$c_user="joseph";
		$c_pass="password";
		
	 	if(isset($_POST["username"])&&isset($_POST["password"])){
	 			$username=$_POST["username"];
	 			$password=$_POST["password"];

	 			if(!empty($username)&&!empty($password)){ #check if credential fields are empty
					$cred_query="SELECT username, password FROM `users` WHERE username='".$username."'AND password='".$password."'";
					#cred_query="SELECT username, password FROM `users` WHERE username='joseph'AND password='password'";
	 				$mysqli_exec=mysqli_query($conn,$cred_query);
	 				if(mysqli_num_rows($mysqli_exec)>0){
						echo "username and password correct";
					}
					else{
						echo "Username and password incorrect";
					}
	 				/*if(mysqli_error($mysqli_exec)){
						echo "Invalid query ".mysql_error();
					}
					else{
						echo "query executed";
					}
					if(($username==$c_user)&&($password==$c_pass)){
						echo "username and password correct";
					}
					else{
						echo "Incorrect username or password";
					}*/
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
						<label>Password</label><input type="text" name="password" />
					</div>
					<input type="submit" value="submit">
				</form>
				<?php include 'cookie.php';?>
			</div>
		</div>
	</body>
</html>
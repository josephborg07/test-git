<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<title>Test</title>
	</head>
	<body>
		<?php
		#Getting the mysql connection from mysql_connection.php file
		include 'mysql_connection.php';	 	
		#Logic for login. First check if form fields are set, then check if empty
	 	if(isset($_POST["username"])&&isset($_POST["password"])){
	 			$username=$_POST["username"];
	 			$password=$_POST["password"];

	 			if(!empty($username)&&!empty($password)){ #check if credential fields are empty
					#$cred_query="SELECT username, password FROM `credentials` WHERE username='".$username."'AND password='".$password."'";
					$cred_query="SELECT users.cred_id, users.first_name, users.surname, credentials.id, credentials.username FROM users, credentials WHERE credentials.username='".$username."'";
	 				$mysqli_exec=mysqli_query($conn,$cred_query);
	 				if($conn->query($cred_query)){ 
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
			<div class="menu-area">
				<div><a href="insert.php">Insert Patient</a></div>
				<div><a href="patients.php">Patients list</a></div>	
			</div>
			
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
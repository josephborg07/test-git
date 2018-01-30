<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<title>Test</title>
	</head>
	<body>
		<?php
		#Getting the mysql connection from mysql_connection.php file
		include 'mysql_connection.php';	 	
		include 'login.php';
	 	/*if(isset($_POST["username"])&&isset($_POST["password"])){
	 			$username=$_POST["username"];
	 			$password=$_POST["password"];
	 		}*/
		
		
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
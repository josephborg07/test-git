<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<title>Test</title>
	</head>
	<body>
		<?php
		#Getting the mysql connection from mysql_connection.php file
        include 'functions.php';	 	
		#Logic for login. First check if form fields are set, then check if empty
	 	if(isset($_POST["username"])&&isset($_POST["password"])){
	 			$username=$_POST["username"];
	 			$password=$_POST["password"];

	 			if(!empty($username)&&!empty($password)){ #check if credential fields are empty
                    $conn=new DB_ops; #Initiate a new object based on the class DB_ops from functions.php
                    $test=$conn->checkLogin($username,$password);
                    if(mysqli_num_rows($test)>0){
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
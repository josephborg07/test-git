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
					$check_login=$conn->checkLogin($username,$password);
					if($check_login>0){
						$user_id=$check_login;
						$check_user_perm=$conn->checkUserPerm($user_id);
						echo $check_user_perm['role_name'];
						/*session_start();
						$_SESSION['user_id'] = $check_login['id'];
						$_SESSION['first_name'] = $check_login['first_name'];
						$_SESSION['surname']= $check_login['surname'];
						$_SESSION['role_name'] = $check_login['role_name'];*/
					}
					else{
						echo "Incorrect username or password";
					}
					
				}
		}
		else{
			echo "Please enter username and password";
		}		
		?>

		<div class="main_container">
			<div class="menu-area">
				<div><a href="insert_patient.php">Insert Patient</a></div>
				<div><a href="patients.php">Patients list</a></div>	
				<div><a href="InsertUSer.php">Insert User</a></div>
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
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
						
						session_start();
						session_id();
						$_SESSION['user_id']=$check_user_perm['id'];
						$_SESSION['first_name']=$check_user_perm['first_name'];
						$_SESSION['surname']=$check_user_perm['surname'];
						$_SESSION['role_name']=$check_user_perm['role_name'];
						$_SESSION['logged_in']='TRUE';
						
						header('Location: loggedin.php');
					}
					else{
						echo "Incorrect username or password";
					}
				}
				}else{
					echo "Please enter username and password";
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
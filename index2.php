<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<title>Test</title>
	</head>
	<body>
		<?php
		#Getting the mysql connection from mysql_connection.php file
        include 'functions.php';	 	
		
		
		
		
		if(isset($_POST['username'])&&isset($_POST['password'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			if(!empty($username)&&!empty($password)){
				$options = array(
					'cost' => 20,
				  );
				ECHO $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
			}


			/*$obj=new DB_ops;
			$obj->checkLogin($username,$password)	;*/
		}
		?>
			
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
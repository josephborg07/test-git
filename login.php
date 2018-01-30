<html>
	<head>
		<title>Test</title>
	</head>
	<body>
		<?php
			
			include 'mysql_connection.php';
		 	#Varaiables for form-Checking if the variable is set and empty before echoing anything in order to avoid undefined variables error
	 		if(isset($_POST["username"])&&isset($_POST["password"])){
		 		$username=$_POST["username"];
				$password=$_POST["password"];
				if(!empty($username)&&!empty($password)){
					$check_credentials = "SELECT username, password from users where user=$username AND password=$password";
					$query_exec=mysqli_query($conn, $check_credentials);
					if(mysql_num_rows($query_exec)> 0 )
						{
							echo "row is not empty";
							$row=mysqli_fetch_assoc($query_exec);
							echo $row;
						}
						
				}
				else{
					echo "Kindly input username and password";
				}
			}
		
		mysqli_close($conn);
		?>
	</body>
</html>
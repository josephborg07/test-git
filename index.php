<html>
	<head>
		<title>Test</title>
	</head>
	<body>
		<?php
		#Getting the mysql connection from mysql_connection.php file
		include 'mysql_connection.php';
			 	
	 	#Varaiables for form-Checking if the variable is set and empty before echoing anything in order to avoid undefined variables error	 	
	 	if(isset($_POST["first_name"])&&isset($_POST['surname'])){
	 		$person_firstname=$_POST["first_name"];
			$person_surname=$_POST["surname"];
			if(!empty($person_firstname)&&!empty($person_surname)){
				$mysql_insert="INSERT INTO people(first_name,last_name)VALUES(
				'$person_firstname','$person_surname'
				)";
				mysqli_query($conn, $mysql_insert);
				if(mysqli_affected_rows($conn)>0){
					echo $person_firstname." ".$person_surname." was added to the DB";
				}
			}
		}
		mysqli_close($conn);
		?>
		
		<form method="post" action="">
			<label> First Name</label><input type="text" name="first_name" /><br />
			<label>Surname</label><input type="text" name="surname" /><br />
			<input type="submit" value="submit">
		</form>
	</body>
</html>
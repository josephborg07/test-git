<html>
	<head>
		<title>Test</title>
	</head>
	<body>
		<?php
		include 'mysql_connection.php';
	 	
	 	#Varaiables for form
	 	
	 	if(isset($_POST["first_name"])&&isset($_POST['surname'])){
	 		$person_firstname=$_POST["first_name"];
			$person_surname=$_POST["surname"];
			if(!empty($person_firstname)&&!empty($person_surname)){
				echo "Person's name is: ".$person_firstname."<br />";
				echo "Person's surname is: ".$person_surname;
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
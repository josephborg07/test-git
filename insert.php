	<html>
	<head>
		
	</head>
	<body>
		<?php
		include 'functions2.php';
		$variables=get_sexual_orientation();;
		extract($variables);
		?>
		
		<form action="" method="POST">
			<label>ID Card Number</label><input type="text" name="id_card_number"><br />
			<label>First Name</label><input type="text" name="first_name"><br />
			<label>Surname</label><input type="text" name="surname"><br />
			<label>email</label><input type="text" name="email"><br />
			<label>Mobile Number</label><input type="text" name="mobile_number"><br />
			<label>Landline Number</label><input type="text" name="landline_phone"><br />
			<label>dob</label><input type="date" name="dob"><br />
			<label>Occupation</label><input type="text" name="occupation"><br />
			<label>Sexual Orientation</label>
			<select name="sexual_orientation">
				<option value="<?php echo "$sex_ori_id0"?>"><?php echo $sex_ori_name0 ?></option>
				<option value="<?php echo "$sex_ori_id1"?>"><?php echo $sex_ori_name1 ?></option>
				<option value="<?php echo "$sex_ori_id2"?>"><?php echo $sex_ori_name2 ?></option>
				<option value="<?php echo "$sex_ori_id3"?>"><?php echo $sex_ori_name3 ?></option>
				<option value="<?php echo "$sex_ori_id4"?>"><?php echo $sex_ori_name4 ?></option>
			</select><br />
			<input type="submit" value="submit">
		</form>
		
		<?php 
			if(isset($_POST['id_card_number'])&&isset($_POST['first_name'])&&isset($_POST['surname'])&&isset($_POST['email'])&&isset($_POST['mobile_number'])&&isset($_POST['landline_phone'])&&isset($_POST['dob'])&&isset($_POST['sexual_orientation'])){
				$id_card_number=$_POST['id_card_number'];
				$first_name=$_POST['first_name'];
				$surname=$_POST['surname'];
				$email=$_POST['email'];
				$mobile_number=$_POST['mobile_number'];
				$landline_phone=$_POST['landline_phone'];
				$dob=$_POST['dob'];
				$occupation=$_POST['occupation'];
				$sexual_orientation=$_POST['sexual_orientation'];
				if(!empty($id_card_number)&&!empty($first_name)&&!empty($surname)&&!empty($email)&&!empty($mobile_number)&&!empty($landline_phone)&&!empty($dob)&&!empty($occupation)&&!empty($sexual_orientation)){
					echo "id is: ".$id_card_number."<br />";
					echo "first name is: ".$first_name."<br />";
					echo "surname is: ".$surname."<br />";
					echo "email is: ".$email."<br />";
					echo "mobile number is: ".$mobile_number."<br />";
					echo "landline is: ".$landline_phone."<br />";
					echo "dob: ".$dob."<br />";
					echo "occupation: ".$occupation."<br />";
					echo "sexual orientation id: ".$sexual_orientation."<br />";
				}
				else{
					echo "fields were empty";
					}
			}
			else{
				echo "variables not set";
			}
		?>
	</body>
	</html>
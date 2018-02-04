	<html>
	<head>
		<link href="css/styles.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<?php
		include 'functions.php';
		$variables=get_sexual_orientation();;
		extract($variables);		
		?>
		
		<form action="" method="POST">
			<label>ID Card Number</label>
			<input type="text" name="id_card_number"><br />
			
			<label>First Name</label>
			<input type="text" name="first_name"><br />
			
			<label>Surname</label>
			<input type="text" name="surname"><br />
			
			<label>email</label>
			<input type="text" name="email"><br />
			
			<label>Mobile Number</label>
			<input type="text" name="mobile_number"><br />
			
			<label>Landline Number</label>
			<input type="text" name="landline_phone"><br />
			
			<label>dob</label>
			<input type="text" name="dob"><br />
			
			<label>Occupation</label>
			<input type="text" name="occupation"><br />
			
			<label>Maritial status</label>
			<input type="text" name="maritial_status"><br />
			
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
			insert_new_patient();
		?>
	</body>
	</html>
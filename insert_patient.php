	<html>
	<head>
		<link href="css/styles.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<?php
		include 'functions.php';
		$variables=get_sexual_orientation();;
		extract($variables);
		$obj= new DB_ops;
		$query=$obj->dbc->query("SELECT id, first_name,surname,email from users");
		//$result = $query->get_result();
		$row = $query->fetch_all(MYSQLI_ASSOC);
		$row_count=sizeof($row);
		$a=0;
		while($a<=$row_count){
			//echo $i['id']." ".$i['first_name']." ".$i['surname']." ".$i['email']."<br />";
			foreach($row as $i){
			${"id".$a}=$i['id'];
			${"first_name".$a}=$i['first_name'];
			${"surname".$a}=$i['surname'];
			${"email".$a}=$i['email'];
			$a++;
			}
		}
		//var_dump($row);
		?>
		<div class="registration_area">
    		<div class="reg_form_area">
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
						<option value="<?php echo "$sex_ori_id1"?>"><?php echo $sex_ori_name1 ?></option>
						<option value="<?php echo "$sex_ori_id2"?>"><?php echo $sex_ori_name2 ?></option>
						<option value="<?php echo "$sex_ori_id3"?>"><?php echo $sex_ori_name3 ?></option>
						<option value="<?php echo "$sex_ori_id4"?>"><?php echo $sex_ori_name4 ?></option>
						<option value="<?php echo "$sex_ori_id5"?>"><?php echo $sex_ori_name5 ?></option>
					</select><br />
					<label>Consultant</label>
					<select name="consultant">
						<!--Logic to insert a select field for every consultant-->
						<?php
						$obj= new DB_ops;
						$query=$obj->dbc->query("SELECT id, first_name,surname,email from users");
						$row = $query->fetch_all(MYSQLI_ASSOC);
						$row_count=sizeof($row);
						$a=1;
							foreach($row as $i){
								echo"<option value=".$i['id'].">".$i['first_name']." ".$i['surname']."</option>";
							$a++;
							}
						?>
					</select>
					<input type="submit" value="submit">
				</form>
			</div>
		</div>
		<?php

			$obj=new InsertOps;
			$obj->insert_new_patient();

		?>
	</body>
	</html>
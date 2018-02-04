<?php
function get_sexual_orientation(){
		include 'mysql_connection.php';
		$query="SELECT * FROM sexual_orientation";
		$exec=mysqli_query($conn, $query);
		$i=0;
		if(mysqli_num_rows($exec)>0){
			while($result=mysqli_fetch_assoc($exec)){#This while script stores the query result values to variables.
				$variables["sex_ori_name".$i] = $result['sex_ori_name'];
				$variables["sex_ori_id".$i] = $result['id'];
				$i++;
			}
			
		}
		return $variables;
}

function insert_new_patient(){
	if(isset($_POST['id_card_number'])&&isset($_POST['first_name'])&&isset($_POST['surname'])&&isset($_POST['email'])&&isset($_POST['mobile_number'])&&isset($_POST['landline_phone'])&&isset($_POST['dob'])&&isset($_POST['maritial_status'])&&isset($_POST['sexual_orientation'])){
				$id_card_number=$_POST['id_card_number'];
				$first_name=$_POST['first_name'];
				$surname=$_POST['surname'];
				$email=$_POST['email'];
				$mobile_number=$_POST['mobile_number'];
				$landline_phone=$_POST['landline_phone'];
				$dob=$_POST['dob'];
				$occupation=$_POST['occupation'];
				$maritial_status=$_POST['maritial_status'];
				$sexual_orientation=$_POST['sexual_orientation'];
				
				if(!empty($id_card_number)&&!empty($first_name)&&!empty($surname)&&!empty($email)&&!empty($mobile_number)&&!empty($landline_phone)&&!empty($dob)&&!empty($occupation)&&!empty($maritial_status)&&!empty($sexual_orientation)){
					include 'mysql_connection.php';
					$query="INSERT INTO patients (first_name,surname,email,mobile_number,landline_phone,dob,occupation,sexual_orientation,maritial_status,id_card_number)VALUES('$first_name','$surname','$email','$mobile_number','$landline_phone','$dob','$occupation','$maritial_status','$sexual_orientation','$id_card_number')";
					if ($conn->query($query) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $query . "<br>" . $conn->error;
						}
					}
				else{
					echo "fields were empty";
				}
			}
			else{
				echo "variables not set";
			}
}
?>
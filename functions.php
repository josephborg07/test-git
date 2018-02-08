<?php
class DB_ops{
	public $db_server="localhost";
	public $db_user="root";
	public $db_pass="";
	public $db_name="test";

	public function __construct(){
		$conn=new mysqli($this->db_server,$this->db_user,$this->db_pass,$this->db_name);
		$this->dbc=$conn;
		if(mysqli_connect_errno()){
			echo"mysql connection failed ".mysqli_connect_error();
		}
	}

	public function checkLogin($username,$password){//function complete
		$sql_login=$this->dbc->prepare("SELECT username, password FROM credentials WHERE username=?"); #Prepare a mysql statement stored in $sql_query. Returns a handle for further processing with the same process.
		$sql_login->bind_param("s",$username); #Binding parameters to the prepare SQL statement in $sql_login;
		$sql_login->execute(); #Execute the sql statement in $sql_login. Returns boolean: TRUE on success or FALSE on failure.
		$result = $sql_login->get_result();
		$row = $result->fetch_assoc();
		$hashed_password=$row['password'];
		if(password_verify($password,$hashed_password)==TRUE){
			return $_SESSION['username']=$username;
		}else{
			return FALSE;
		}
	}
	public function insertNewUser($fname,$surname,$contact_number,$id_card_number,$email,$str_address,$locality,$postcode,$dob,$password_hash){
		$stmt1=$this->dbc->prepare("INSERT INTO users(first_name, surname, contact_number, id_card_number, email, street_address, locality, post_code, dob) VALUES (?,?,?,?,?,?,?,?,?)");
		$stmt1->bind_Param('ssdssssss', $fname, $surname,$contact_number,$id_card_number,$email,$str_address,$locality,$postcode,$dob);
		$stmt1->execute();
		$stmt1_id=mysqli_insert_id($this->dbc);

		//$password_hash = password_hash($password, PASSWORD_BCRYPT);
		$stmt2=$this->dbc->prepare("INSERT INTO credentials (username, password)VALUES(?,?)");
		$stmt2->bind_param("ss",$email,$password_hash);
		$stmt2->execute();
		$stmt2_id=mysqli_insert_id($this->dbc)."<br />";

		$stmt3=$this->dbc->prepare("INSERT INTO user_cred(user_id, cred_id) VALUES(?,?)");
		$stmt3->bind_param("ii",$stmt1_id,$stmt2_id);
		$stmt3->execute();
	}

	public function getRole($userid){
		$sql2="SELECT users.id, users.first_name,users.surname, credentials.username, credentials.password
		FROM users
		JOIN user_cred
		ON users.id = user_cred.user_id
		JOIN credentials
		ON user_cred.cred_id = credentials.id
		WHERE users.id=1";
	}

}

class userId extends DB_ops{

	public function getUserId(){
		$userID=array();
		$sql="SELECT id, first_name, surname, role_name from users JOIN user_role on users.id = user_role.user_id JOIN roles on user_role.role_id = roles.role_id WHERE users.id=1";
		if((mysqli_query($this->dbc,$sql))==TRUE){
			echo "select completed";
		}
		else{
			echo "select not completed";
		}
		#$exec=$this->sql->prepare();
		#$this->sql->prepare($sql);
	}
}

class sexualOrientation extends DB_ops{

	public function getSexualOrientation(){
		$sql="SELECT * FROM sexual_orientation";
		$test_query=$this->dbc->query($sql);
		
		if($test_query == TRUE){
			echo "SQL was true<br />";
		}
		else{
			echo "SQL Failed.<br />";
		}
		
		/*$assoc=$resultSelect->fetch_assoc();
		foreach($assoc as $a){
			echo $a."<br />";
		}*/
	}

}

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
					echo "Kindly input all fields";
				}
			}
			else{
				//do nothing
			}
}
/*class ListConsultants extends DB_ops{
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
}*/
?>
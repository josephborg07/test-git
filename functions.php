<?php

class page_fundementals{

	public function __construct(){
		echo '<div class="menu-area">
                <div><a href="insert_patient.php">Insert Patient</a></div>
                <div><a href="list_patients.php">Patients list</a></div>	
                <div><a href="InsertUSer.php">Insert User</a></div>
                <div><a href="logout.php">LogOut</a></div>
            </div>';   
	}
}

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

		$sql_login=$this->dbc->prepare("SELECT users.id, credentials.username, credentials.password FROM users JOIN user_cred ON users.id = user_cred.user_id JOIN credentials on user_cred.cred_id = credentials.id WHERE credentials.username=?;");
		$sql_login->bind_param("s",$username); #Binding parameters to the prepare SQL statement in $sql_login;
		$sql_login->execute(); #Execute the sql statement in $sql_login. Returns boolean: TRUE on success or FALSE on failure.
		$result = $sql_login->get_result();
		$row = $result->fetch_assoc();
		$hashed_password=$row['password'];
		if(password_verify($password,$hashed_password)==TRUE){
			$user_id=$row['id'];
			return $user_id;
		}else{
			return FALSE;
		}
	}

	public function checkUserPerm($user_id){
			$login_perm=$this->dbc->prepare("SELECT users.id, users.first_name, users.surname, roles.role_name FROM users JOIN user_role ON users.id = user_role.user_id JOIN roles ON user_role.role_id=roles.role_id WHERE users.id=?;");			
			$login_perm->bind_param("i",$user_id);
			$login_perm->execute();
			$login_perm_result=$login_perm->get_result();
			$login_perm_row=$login_perm_result->fetch_assoc();
			return $login_perm_row;
	}
} #Ends DB_ops class

class InsertOps extends DB_ops{
	public function insertNewUser($fname,$surname,$contact_number,$id_card_number,$email,$str_address,$locality,$postcode,$dob,$password_hash){
		$stmt1=$this->dbc->prepare("INSERT INTO users(first_name, surname, contact_number, id_card_number, email, street_address, locality, post_code, dob) VALUES (?,?,?,?,?,?,?,?,?)");
		$stmt1->bind_Param('ssdssssss', $fname, $surname,$contact_number,$id_card_number,$email,$str_address,$locality,$postcode,$dob);
		$stmt1->execute();
		$stmt1_id=mysqli_insert_id($this->dbc);

		$stmt2=$this->dbc->prepare("INSERT INTO credentials (username, password)VALUES(?,?)");
		$stmt2->bind_param("ss",$email,$password_hash);
		$stmt2->execute();
		$stmt2_id=mysqli_insert_id($this->dbc)."<br />";

		$stmt3=$this->dbc->prepare("INSERT INTO user_cred(user_id, cred_id) VALUES(?,?)");
		$stmt3->bind_param("ii",$stmt1_id,$stmt2_id);
		$stmt3->execute();
		
	}
	public function insert_new_patient(){
		if(isset($_POST['id_card_number'])&&isset($_POST['first_name'])&&isset($_POST['surname'])&&isset($_POST['email'])&&isset($_POST['mobile_number'])&&isset($_POST['landline_phone'])&&isset($_POST['dob'])&&isset($_POST['maritial_status'])&&isset($_POST['sexual_orientation'])&&isset($_POST['consultant'])){
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
			$consultant=$_POST['consultant'];
			
			if(!empty($first_name)&&!empty($surname)&&!empty($email)&&!empty($mobile_number)&&!empty($landline_phone)&&!empty($dob)&&!empty($occupation)&&!empty($maritial_status)&&!empty($sexual_orientation)&&!empty($id_card_number)&&!empty($consultant)){
				$stmt1=$this->dbc->prepare("INSERT INTO patients(first_name,surname,email,mobile_number,landline_phone,dob,occupation,sexual_orientation,maritial_status,id_card_number,consultant_id)VALUES(?,?,?,?,?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssddssdssd",$first_name,$surname,$email,$mobile_number,$landline_phone,$dob,$occupation,$sexual_orientation,$maritial_status,$id_card_number,$consultant);
				$stmt1->execute();
				$stmt1_id=mysqli_insert_id($this->dbc);
				
				$stmt2=$this->dbc->prepare("INSERT INTO user_patient(user_id,patient_id) VALUES(?,?)");
				$stmt2->bind_param("dd",$consultant,$stmt1_id);
				$stmt2->execute();
			}else{
				echo "Kindly input all fields";
			}
		}
		else{
			//do nothing
		}
	}
}

class userOps{
	public function footer($user_id,$user_name,$user_surname,$user_role,$logged_in){
		if($_SESSION['logged_in']==='TRUE'){
            echo'<div class="footer">
                <div>'.$user_name.' '.$user_surname.'</div>
                <div>'.$user_role.'</div>';
        }
	}
}

class consultant_ops extends DB_ops{
	public function listPatients($user_id){
		$stmt1=$this->dbc->prepare("SELECT patients.id as p_id, patients.first_name as p_fname, patients.surname as p_surname FROM users JOIN user_patient on users.id = user_patient.user_id JOIN patients on user_patient.patient_id = patients.id WHERE users.id=?");
		$stmt1->bind_param('i',$user_id);
		$stmt1->execute();
		$result=$stmt1->get_result();
		$resultset=$result->fetch_all(MYSQLI_ASSOC);
		
		foreach($resultset as $row){
			$i=0;
			$vars['p_fname'.$i]=$row['p_fname'];
			$vars['p_surname'.$i]=$row['p_surname'];
			$i++;
		}
		return $resultset;
	}

	public function get_patient_details($p_id){
		$sql="SELECT * FROM patients where patients.id=?";
		$stmt1=$this->dbc->prepare($sql);
		$stmt1->bind_param('d',$p_id);
		$stmt1->execute();
		$result=$stmt1->get_result();
		$row=$result->fetch_assoc();
		return $row;
	}
}

function get_sexual_orientation(){
		include 'mysql_connection.php';
		$query="SELECT * FROM sexual_orientation";
		$exec=mysqli_query($conn, $query);
		$i=1;
		if(mysqli_num_rows($exec)>0){
			while($result=mysqli_fetch_assoc($exec)){#This while script stores the query result values to variables.
				$variables["sex_ori_name".$i] = $result['sex_ori_name'];
				$variables["sex_ori_id".$i] = $result['id'];
				$i++;
			}
			
		}
		return $variables;
}

?>
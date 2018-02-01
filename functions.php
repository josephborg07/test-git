<?php
function get_sexual_orientation(){
		include 'mysql_connection.php';
		$query="SELECT * FROM sexual_orientation";
		$exec=mysqli_query($conn, $query);
		$i=0;
		if(mysqli_num_rows($exec)>0){
			while($result=mysqli_fetch_assoc($exec)){#This while script stores the query result values to variables.
				${"sex_ori_name".$i} = $result['sex_ori_name'];
				${"sex_ori_id".$i} = $result['id'];
				$i++;
			}
			
		}
		//echo "id is ".$sex_ori_id0." whilst the name is ".$sex_ori_name0;
		return [$sex_ori_name0, $sex_ori_id0,$sex_ori_name1, $sex_ori_id1,$sex_ori_name2, $sex_ori_id2,$sex_ori_name3, $sex_ori_id3,$sex_ori_name4, $sex_ori_id4];
}
?>
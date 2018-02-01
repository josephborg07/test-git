<html>
<head></head>
<body>
<?php
		include 'mysql_connection.php';
		$query="SELECT * FROM sexual_orientation";
		$exec=mysqli_query($conn,$query);
		if(mysqli_num_rows($exec)>0){
			while($row=mysqli_fetch_assoc($exec)){
				echo $row['sex_ori_name']."<br />";
			}
			
		}
		
?>

</body>
</html>
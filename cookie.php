<?php

function login_cookie(){
}
$cookie_name="logged_in";
$cookie_Value="True";
setcookie($cookie_name, $cookie_Value, time() + (86400 * 30), "/");
setcookie("user",$username, time() + (84600 * 30), "/");
?>
<html>
	
	<body>
		<?php
		if($_COOKIE[$cookie_name]==$cookie_Value){
			header("Location: ./loggedin.php");
		}
		else{
			echo "cookie is not set";
		}
		?>
	</body>
</html>
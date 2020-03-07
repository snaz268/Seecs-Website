<?php

	include_once("connection.php");
	session_start();
	$email = mysqli_escape_string($mysqli, $_POST['email']);
	$password = mysqli_escape_string($mysqli, $_POST['password']);

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "This email address is invalid!";
	}
	else {
		$result = mysqli_query($mysqli, "SELECT * FROM user WHERE u_email = '$email' AND u_password = '$password';");
		$res = mysqli_fetch_assoc($result);
		$data = mysqli_num_rows($result);
		if ($data == 1){
			$_SESSION['user-email'] = $email;
			$_SESSION['username'] = $res['u_name'];
			echo $_SESSION['currentpage'];
		}
		else {
			echo "Incorrect Email or Password!";
		}
	}
	$mysqli->close();
?>
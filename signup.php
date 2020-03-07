<?php

	include_once(".\config.php");
	session_start();
	$name = mysqli_escape_string($mysqli, $_POST['name']);
	$email = mysqli_escape_string($mysqli, $_POST['email']);
	$password = mysqli_escape_string($mysqli, $_POST['password']);
	$phone = mysqli_escape_string($mysqli, $_POST['phone']);

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "This email address is invalid!";
	}
	else {
		$validate = mysqli_query($mysqli, "SELECT * FROM user WHERE u_email = '$email';");
		$res = mysqli_fetch_assoc($validate);
		$data = mysqli_num_rows($validate);
		if ($data == 1){
			echo "This email already exists!";
		}
		else {
			$result = mysqli_query($mysqli, "INSERT INTO user (u_email,u_password,u_name,u_phone) VALUES ('$email', '$password', '$name', '$phone');");
			if (!$result){
				echo "Failed to store";
			}
			echo "Sign Up successful";
		}
	}
?>
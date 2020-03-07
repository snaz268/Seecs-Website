<?php

	include("connection.php");
	session_start();
	if(isset($_SESSION['username'])){
		$useremail = $_SESSION['user-email'];
		$result = mysqli_query($mysqli, "SELECT * FROM member WHERE m_email = '$useremail'");
		$res = mysqli_fetch_assoc($result);
		$data = mysqli_num_rows($result);
		if ($data == 1){
			$_SESSION['user-society'] = $res['m_society'];
		}
	}
?>
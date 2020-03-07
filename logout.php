<?php
	include_once("connection.php");
	session_start();
	session_destroy();
	echo "session destroyed";
	echo $_SESSION['username'];
	header("Location:./index.php");
?>
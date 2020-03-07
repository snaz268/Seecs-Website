<DOCTYPE html>
<?php

include('connection.php');

if(isset($_POST['save'])){
	$s_theme = mysqli_real_escape_string($mysqli, $_POST['s_theme']);
	$s_name = mysqli_real_escape_string($mysqli, $_POST['s_name']);
	$society_name = mysqli_real_escape_string($mysqli, $_POST['society_name']);
	$s_aim = mysqli_real_escape_string($mysqli, $_POST['s_aim']);
	$s_history = mysqli_real_escape_string($mysqli, $_POST['s_history']);
	
		$result = mysqli_query($mysqli, "UPDATE society SET society_name='{$society_name}',s_theme='{$s_theme}',s_aim='{$s_aim}', s_history='{$s_history}'
			WHERE s_name='{$s_name}'");
			if (!$result) {
   			printf("Error: %s\n", mysqli_error($mysqli));
    		exit();
    	}	
}
$mysqli->close();	
header("Location:". $_SERVER['HTTP_REFERER']);	
?>	
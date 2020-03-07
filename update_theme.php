<DOCTYPE html>
<?php

include('connection.php');

if(isset($_POST['apply'])){
	$s_name = mysqli_real_escape_string($mysqli, $_POST['s_name']);
	$s_theme = mysqli_real_escape_string($mysqli, $_POST['theme']);
	echo $s_theme;
	
		$result = mysqli_query($mysqli, "UPDATE society SET s_theme='{$s_theme}'
			WHERE s_name='{$s_name}'");
			if (!$result) {
   			printf("Error: %s\n", mysqli_error($mysqli));
    		exit();
    	}	
}
$mysqli->close();	
header("Location:". $_SERVER['HTTP_REFERER']);	
?>	
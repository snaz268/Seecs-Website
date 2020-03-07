<DOCTYPE html>
<?php

include('connection.php');

if(isset($_POST['update'])){
	
	$e_society = mysqli_real_escape_string($mysqli, $_POST['e_society']);
	$e_id = mysqli_real_escape_string($mysqli, $_POST['e_id']);
	$e_name = mysqli_real_escape_string($mysqli, $_POST['e_name']);
	$e_date = mysqli_real_escape_string($mysqli, $_POST['e_date']);
	$e_location = mysqli_real_escape_string($mysqli, $_POST['e_location']);
	$e_desc = mysqli_real_escape_string($mysqli, $_POST['e_desc']);
	
		$result = mysqli_query($mysqli, "UPDATE event SET e_name='{$e_name}',e_date='{$e_date}', e_location='{$e_location}', e_desc='{$e_desc}'
			WHERE e_society='{$e_society}' AND e_id = '{$e_id}'");
			if (!$result) {
   			printf("Error: %s\n", mysqli_error($mysqli));
   			$mysqli->close();	
    		exit();
    	}
}					
$mysqli->close();	
header("Location:". $_SERVER['HTTP_REFERER']);	
?>	
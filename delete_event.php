<DOCTYPE html>
<?php

include('connection.php');

if(isset($_POST['delete'])){
	$e_id = mysqli_real_escape_string($mysqli, $_POST['e_id']);
	echo $e_id;
	
		$result = mysqli_query($mysqli, "DELETE FROM event WHERE e_id='{$e_id}';");
			if (!$result) {
   			printf("Error: %s\n", mysqli_error($mysqli));
    		exit();
    	}
}
$mysqli->close();	
header("Location:". $_SERVER['HTTP_REFERER']);	
?>	
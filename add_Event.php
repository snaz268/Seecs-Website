<DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
</head>

<body>

<?php
//including the database connection file
include('connection.php');
	if(isset($_POST['add'])){
	$e_society = mysqli_real_escape_string($mysqli, $_POST['e_society']);
	$e_name = mysqli_real_escape_string($mysqli, $_POST['e_name']);
	$e_date = mysqli_real_escape_string($mysqli, $_POST['e_date']);
	$e_time = mysqli_real_escape_string($mysqli, $_POST['e_time']);
	$e_location = mysqli_real_escape_string($mysqli, $_POST['e_location']);
	$e_desc = mysqli_real_escape_string($mysqli, $_POST['e_desc']);
		
	// checking empty fields
	if(empty($e_name) || empty($e_date) || empty($e_location) || empty($e_time) || empty($e_desc)){
				
		if(empty($e_name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($e_date)) {
			echo "<font color='red'>Date field is empty.</font><br/>";
		}
		
		if(empty($e_location)) {
			echo "<font color='red'>Location field is empty.</font><br/>";
		}

		if(empty($e_time)) {
			echo "<font color='red'>Time field is empty.</font><br/>";
		}
		if(empty($e_desc)) {
			echo "<font color='red'>Time field is empty.</font><br/>";
		}
		
		//link to the previous page
		$mysqli->close();	
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}
	else{// file upload checks
		$target_dir = "./images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		if(!empty($_FILES['fileToUpload']['name'])){
			// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
			
			
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			} 
			else { // if everything is ok, try to upload file
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$target_file = mysqli_real_escape_string($mysqli, $target_file);

					$result1 = mysqli_query($mysqli, "INSERT INTO photo(p_name, p_society) VALUES('{$target_file}','{$e_society}');");
					if(!$result1){
						echo mysqli_error($mysqli);
						$mysqli->close();	
						exit;
						
					}

					$result = mysqli_query($mysqli, "INSERT INTO event(e_society ,e_name, e_date, e_time, e_location, e_desc, e_img) VALUES('$e_society','$e_name','$e_date','$e_time','$e_location','$e_desc','$target_file')");
					if(!$result){
						echo mysqli_error($mysqli);
						$mysqli->close();	
						exit;
						
					}
					echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					
					
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
		}
		else {
			$result = mysqli_query($mysqli, "INSERT INTO event(e_society ,e_name, e_date, e_time, e_location, e_desc) VALUES('$e_society','$e_name','$e_date','$e_time','$e_location','$e_desc')");
			if(!$result){
				echo mysqli_error($mysqli);
				$mysqli->close();	
				exit;				
			}
			
					
		}			
	}
}
$mysqli->close();	
header("Location:". $_SERVER['HTTP_REFERER']);
?>
</body>
</html>

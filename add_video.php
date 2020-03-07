<DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
</head>

<body>

<?php
//including the database connection file
include('connection.php');
	if(isset($_FILES["fileToUpload"])){

		$v_society = mysqli_real_escape_string($mysqli, $_POST['v_society']);
if(empty($v_society)){
				
			
			echo "<font color='red'>Name field is empty.</font><br/>";
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}else{
		$target_dir = "./videos/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		if(!empty($_FILES['fileToUpload']['name'])){
			// Check if image file is a actual image or fake image
			
			
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			
			// Allow certain file formats
			if($imageFileType != "mp4") {
				echo "Sorry, only mp4 files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			} 
			else { // if everything is ok, try to upload file
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$target_file = mysqli_real_escape_string($mysqli, $target_file);

					$result = mysqli_query($mysqli, "INSERT INTO video(v_name, v_society) VALUES('$target_file','$v_society');");
					if(!$result){
						echo mysqli_error($mysqli);
							
						exit;
						
					}
					echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
						
					header("Location:". $_SERVER['HTTP_REFERER']);
					
				} else {
						
					echo "Sorry, there was an error uploading your file.";
				}
			}
		}		
	}

}
$mysqli->close();	
header("Location:". $_SERVER['HTTP_REFERER']);
?>
</body>
</html>

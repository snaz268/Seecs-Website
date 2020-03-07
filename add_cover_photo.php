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

		$s_name = mysqli_real_escape_string($mysqli, $_POST['s_name']);
		echo $s_name;
if(empty($s_name)){
				
		
			echo "<font color='red'>Society Name not found.</font><br/>";
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}else{
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

					$result = mysqli_query($mysqli, "INSERT INTO photo(p_name, p_society) VALUES('{$target_file}','{$s_name}');");
					if(!$result){
						echo mysqli_error($mysqli);
						
						exit;
						
					}
					$result2=mysqli_query($mysqli, "UPDATE society SET s_cover_img = '{$target_file}' WHERE s_name = '{$s_name}';");
					if(!$result2){
						echo mysqli_error($mysqli);
						
						exit;
						
					}
					echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					
					
					
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

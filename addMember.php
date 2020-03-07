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
		$m_title = mysqli_real_escape_string($mysqli, $_POST['m_title']);
		$m_email = mysqli_real_escape_string($mysqli, $_POST['m_email']);
		$m_society = mysqli_real_escape_string($mysqli, $_POST['m_society']);

		// file upload checks
		$user_check = mysqli_query($mysqli, "SELECT * FROM user WHERE u_email = '$m_email';");
		if(!$user_check){
			echo mysqli_error($mysqli);exit;
		} else {
			$num = mysqli_num_rows($user_check);
			if($num == 1){ //1 = user exists, 0 = user does not exist
				$m_check = mysqli_query($mysqli, "SELECT m_email FROM member WHERE m_email = '$m_email' AND m_society = '$m_society';"); //does member already exist?
				if(!$m_check){
					echo mysqli_error($mysqli);exit;
				} else if($m_check->num_rows == 0) { //0 = member does not exist, 1 = member already exists 
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
						} else { // if everything is ok, try to upload file
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								$target_file = mysqli_real_escape_string($mysqli, $target_file);								

								$result = mysqli_query($mysqli, "INSERT INTO member(m_title, m_email, m_society, m_img) VALUES('$m_title','$m_email','$m_society','$target_file')");
								if(!$result){
									echo mysqli_error($mysqli);
									exit;
								}
								echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
								echo mysqli_error($mysqli);
								header("Location:". $_SERVER['HTTP_REFERER']);
							} else {
									echo "Sorry, there was an error uploading your file.";
							}
						}
						//if file is empty
					} else {
						$result = mysqli_query($mysqli, "INSERT INTO member(m_title, m_email, m_society) VALUES('$m_title','$m_email','$m_society')");
						if(!$result){
							echo mysqli_error($mysqli);exit;				
						}
						header("Location:". $_SERVER['HTTP_REFERER']);
					}		
				//member does not exist
				} else {
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
						} else { // if everything is ok, try to upload file
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								$target_file = mysqli_real_escape_string($mysqli, $target_file);
								$result1 = mysqli_query($mysqli, "UPDATE member SET m_title = '$m_title',  m_img = '$target_file' WHERE m_email = '$m_email'");
								if(!$result1){
									echo mysqli_error($mysqli);exit;								
								}
								echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";	
							//file not uploaded					
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
							header("Location:". $_SERVER['HTTP_REFERER']);
						}
					} else { //member exists but img file is empty
						$result2 = mysqli_query($mysqli, "UPDATE member SET m_title = '$m_title' WHERE m_email = '$m_email'");
						if(!$result2){
							echo mysqli_error($mysqli);exit;				
						}
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

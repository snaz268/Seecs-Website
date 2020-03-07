 <?php

 	include_once("connection.php");
 	$p_name = mysqli_escape_string($mysqli, $_POST['name']);
 	$r_description = mysqli_escape_string($mysqli, $_POST['description']);

 	$review = mysqli_query($mysqli,"INSERT INTO khaapa_reviews (p_name,r_description) VALUES ('$p_name', '$r_description');");

 	if(!$review){
		die("Failed to store");
	}

 	$review_food = mysqli_query($mysqli,"SELECT p_name, r_description FROM khaapa_reviews ORDER BY review_time DESC LIMIT 4;");

 	echo "<h3 class='khaapareview khaapah3'>Reviews</h3>";
    echo "<hr class=khaapahr>";
      while ($res = mysqli_fetch_array($review_food)){
        echo "<h4 style='margin-bottom: 0; margin-top: 0;'>".$res['p_name']."</h4>";
        echo "<p class=khaapap style='margin-top:0;'>".$res['r_description']."</p>";
        echo "<hr class=khaapahr>";
      } 
    $mysqli->close();
 ?>
<!DOCTYPE html>
<?php
//including the database connection file
include_once("connection.php");
include_once(".\sessions.php");
$_SESSION['currentpage'] = $_SERVER['REQUEST_URI'];

?>
<html>
<head>
<title>Photos</title>

<meta  name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href=".\css\sga.css">
</head>
<body>
<div class="topnav" id="myTopnav">
  <a class = "image left" href="index.php"><img src=".\images\logo.png" width="42px"></a>
  <a class=links href="index.php">Home</a>
  <a href="khaapa.php" class="links">Khaapa</a>
  <div class="dropdown">
    <button class="dropbtn">Societies
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <a href="acm_home.php">ACM</a>
      <a href="home.php">SGA</a>
      <a href="#">TABA</a>
      <a href="#">YES</a>
      <a href="#">IEEE</a>
      <a href="#">Gaming</a>
    </div>
  </div> 
  <a class="links activemenu" href="aboutus.php">About Us</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon links" onclick="myFunction()">&#9776;</a>

  <a id="loginbutton" href=login.html style="display: block;"><button class="loginbtn">LogIn &amp; SignUp</button></a>
  <a id="logoutbutton" href=logout.php style="display: none;"><button class="loginbtn">LogOut</button></a>
  <p id="username" style="display:none; float:right; margin:14px 4px; color:white; text-align: center;"> <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?></p>
</div>
		<div class="clear"> </div>
<div class = "acm_head">
    <div class=left><img src=".\images\acm_logo.jpg" width=48px></div>
    <menu class="left menu"><a href="acm_home.php">Home</a></menu>
    <menu class="left menu"><a href="acm_about.php">About Us</a></menu>
    <menu class="left menu"><a href="acm_events.php">Events</a></menu>
    <menu class="left menu"><a href="acm_photos.php">Photos</a></menu>
    <menu class="left menu"><a href="acm_videos.php">Videos</a></menu>
     <a style="display:none;" id=update href=acm_pic_edit.php><button class="loginbtn">Update</button></a>
    <div class=clear></div>
  </div>
</br>
    <div class="clear"> </div>

<div class="clear"> </div>

	<div class="col-12 col-m-9  w3-teal">
<h1>Photos</h1>
</div>

<div class="w3-row-padding w3-margin-top">
<?php
  $res = mysqli_query($mysqli,"SELECT p_name FROM photo  where p_society = 'acm';");
while($row = mysqli_fetch_array($res)){

  echo "<div class=\"w3-card w3-third\">";
  echo "<img style=\"width:100%\" src=". $row['p_name'].">";
  echo "<br />";
  echo"</div>";
}

    $mysqli->close();
?>

</div>
<div class="clear"> </div>
<br/>
<footer class="row clear">
  <h2>Seecs News</h2>
  <div style="border-bottom: 1px solid #949494">
  <div class="col-4 col-t-4">
    <div class=border>
    <p><a href="index.php">Home</a></p>
    <p><a href="khaapa.php">Khaapa</a></p>
    <p><a href="login.php">LogIn &amp; SignUp</a></p>
    <p><a href="aboutus.php">About Us</a></p>
    </div>
  </div>
  <div class="col-4 col-t-4">
    <div class=border>
    <p><a href="#">ACM</a></p>
    <p><a href="#">SGA</a></p>
    <p><a href="#">YES</a></p>
    <p><a href="#">CSP</a></p>
    </div>
  </div>
  <div class="col-3 col-t-3">
    <div>
    <p><a href="#">IEEE</a></p>
    <p><a href="#">Horticulture</a></p>
    <p><a href="#">TABA</a></p>
    <p><a href="#">Gaming Consortium</a></p>
    </div>
  </div>
  <div class=clear></div>
  </div>
  <div style="margin-top: 14px;">&copy; Copyright <a style="color:white;" href="index.php">Seecs News</a></div>
</footer>
<script>

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

$(document).ready(function(){

   <?php
  if(isset($_SESSION['username'])){
?>
    $('#loginbutton').hide();
    $('#logoutbutton').show();
    $('#username').show();
<?php } ?>

<?php
  if(isset($_SESSION['user-society']) && $_SESSION['user-society'] == 'acm'){
?>
    
    $('#update').show();
<?php } ?>

});

	</script>
</body>
</html>
	
	
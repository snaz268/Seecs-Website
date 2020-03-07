<?php 
  include("connection.php");
  session_start();
  $_SESSION['currentpage'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Yellowtail" rel="stylesheet">
<title>SeecsNews | About Us</title>
<link rel="stylesheet" type="text/css" href=".\css\style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<!-- Navbar -->
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


<div class=row>
  <img src=".\images\seecs.jpg" width=100%>
</div>


<div class="row">
  <h2 class=aboutush2>Meet The Team</h2>
  <div class="col-4">
    <div class="aboutuscard">
      <img src=".\images\avatar1.png" alt="avatar" class=avatar>
      <div class="aboutuscontainer">
        <h3 class=aboutush3>Maliha Sameen</h3>
        <p class="aboutustitle aboutusp">CS Student</p>
        <p class=aboutusp>msameen.bscs16seecs@seecs.edu.pk</p>
      </div>
    </div>
  </div>

  <div class="col-4">
    <div class="aboutuscard">
      <img src=".\images\avatar2.png" alt="avatar" class=avatar>
      <div class="aboutuscontainer">
        <h3 class=aboutush3>Sania Saeed</h3>
        <p class="aboutustitle aboutusp">CS Student</p>
        <p class="aboutusp">ssaeed.bscs16seecs@seecs.edu.pk</p>
      </div>
    </div>
  </div>
  <div class="col-4">
    <div class="aboutuscard">
      <img src=".\images\avatar3.png" alt="avatar" class=avatar>
      <div class="aboutuscontainer">
        <h3 class=aboutush3>Sana Naz</h3>
        <p class="aboutustitle aboutusp">CS Student</p>
        <p class=aboutusp>snaz.bscs16seecs@seecs.edu.pk</p>
      </div>
    </div>
  </div>
</div>

<div class="row aboutusaim">
  <div class="col-6 col-t-6">
    <img src=".\images\seecs.jpg" width=100% height="200px">
  </div>

  <div class="col-6 col-t-6 aboutuscontent">
    <h2 class=aboutush2>Our Work</h2>
    <p class=aboutusp><span class=aboutusspan>" </span> This website is designed to gather all societies of SEECS on a single platform and allow them to run their own customized websites under this single website.<span class=aboutusspan>"</span></p>
  </div>
</div>
<!-- Footer -->
<footer class="row clear">
  <h2>Seecs News</h2>
  <div style="border-bottom: 1px solid #949494">
  <div class="col-4 col-t-4">
    <div class=border>
    <p><a href="index.php">Home</a></p>
    <p><a href="khaapa.php">Khaapa</a></p>
    <p><a href="login.html">LogIn &amp; SignUp</a></p>
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
  <div style="margin-top: 14px;">&copy; Copyright <a style="color:white;" href="index.html">Seecs News</a></div>
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

});

</script>

</body>
</html>

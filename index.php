<?php

  include_once("connection.php");
  session_start();
  $_SESSION['currentpage'] = $_SERVER['REQUEST_URI'];
  $seecs_photos = mysqli_query($mysqli, "SELECT s_photo FROM seecs_photos LIMIT 3;");
  $upcoming_events = mysqli_query($mysqli,"SELECT e_name, e_img, DATE_FORMAT(e_date,'%D %M, %Y') as dates FROM event ORDER BY e_date DESC LIMIT 4;");
  $acm_events = mysqli_query($mysqli, "SELECT DATE_FORMAT(e_date,'%M') as months, DATE_FORMAT(e_date,'%D') as dates, e_name FROM event WHERE e_society = 'ACM' ORDER BY e_date DESC LIMIT 3;");
  $sga_events = mysqli_query($mysqli, "SELECT DATE_FORMAT(e_date,'%M') as months, DATE_FORMAT(e_date,'%D') as dates, e_name FROM event WHERE e_society = 'SGA' ORDER BY e_date DESC LIMIT 3;");
  $csp_events = mysqli_query($mysqli, "SELECT DATE_FORMAT(e_date,'%M') as months, DATE_FORMAT(e_date,'%D') as dates, e_name FROM event WHERE e_society = 'CSP' ORDER BY e_date DESC LIMIT 3;");
?>
<!DOCTYPE html>
<html>
<head>
<title>SeecsNews | Home</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<!-- Navbar -->
<div class="topnav" id="myTopnav">
  <a class = "image left" href="index.php"><img src=".\images\logo.png" width="42px"></a>
  <a class="links activemenu" href="index.php">Home</a>
  <a class=links href="khaapa.php">Khaapa</a>
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
  <a class=links href="aboutus.php">About Us</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon links" onclick="myFunction()">&#9776;</a>

  <a id="loginbutton" href=login.html style="display: block;"><button class="loginbtn">LogIn &amp; SignUp</button></a>
  <a id="logoutbutton" href=logout.php style="display: none;"><button class="loginbtn">LogOut</button></a>
  <p id="username" style="display:none; float:right; margin:14px 4px; color:white; text-align: center;"> <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?></p>
</div>

<!-- Slideshow container -->
<div class="row">
  <div class="slideshow-container">

    <!-- Full-width images -->
    <?php
    while($res = mysqli_fetch_array($seecs_photos)){
      echo "<div class='mySlides fade'>";
      echo "<img src=".$res['s_photo']." style='width:100%; height:400px'>";
      echo "</div>";
    }
    ?>
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>

  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
  </div>
</div>

<h3 class="homesection homeh3">Upcoming Events</h3>
<hr class="homesection homehr">

<div class="row">
<?php
  while($res = mysqli_fetch_array($upcoming_events)){
    echo "<div class='col-3 col-t-3'>";
    echo "<div class=homecard>";
    echo "<img src=".$res['e_img']." width=100% height=200px>";
    echo "<div class=homecontainer>";
    echo "<h4 class='orange homeh4'>".$res['dates']."</h4>";
    echo "<p class='orange homep'>".$res['e_name']."</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
?>
  <div class=clear></div>
</div>

<h3 class="homesection homeh3">Most Popular Events</h3>
<hr class="homesection homehr">
<div class="row">
  <div class="col-6 col-t-6">
    <div class=homecard>
      <img src=".\images\sports_gala.jpg" width=100% height=250px>
      <div class=homecontainer>
        <h4 class=homeh4>SPORTS GALA</h4>
      </div>
    </div>
  </div>
  <div class="col-6 col-t-6">
    <div class=homecard>
      <img src=".\images\global_village.jpg" width=100% height=250px>
      <div class=homecontainer>
        <h4 class=homeh4>GLOBAL VILLAGE</h4>
      </div>
    </div>
  </div>
</div>

<h3 class="homesection homeh3">Societies</h3>
<hr class="homesection homehr">
<div class=row>
  <div class="col-4 col-t-12">
    <div class=homecard>
      <h1 class=homeh1>ACM</h1>
      <hr class=homehr>
      <?php
      while ($res = mysqli_fetch_array($acm_events)){
        echo "<div class='societycontainer'>";
        echo "<div class='left homesubcon' width=30%>";
        echo "<h5 class=homeh5>".$res['months']."</h5>";
        echo "<h2 class=homeh2>".$res['dates']."</h2>";
        echo "</div>";
        echo "<div class='left homesubcon' width=70%>";
        echo "<p class=homep>".$res['e_name']."</p>";
        echo "</div>";
        echo "<div class=clear></div>";
        echo "</div>";
      }
      ?>
      <hr class=homehr>
      <a href=#><h4 class="orange homeh4">+ See More</h4></a>
    </div>
  </div>
  <div class="col-4 col-t-6">
    <div class=homecard>
      <h1 class=homeh1>SGA</h1>
      <hr class=homehr>
      <?php
      while ($res = mysqli_fetch_array($sga_events)){
        echo "<div class='societycontainer'>";
        echo "<div class='left homesubcon' width=30%>";
        echo "<h5 class=homeh5>".$res['months']."</h5>";
        echo "<h2 class=homeh2>".$res['dates']."</h2>";
        echo "</div>";
        echo "<div class='left homesubcon' width=70%>";
        echo "<p class=homep>".$res['e_name']."</p>";
        echo "</div>";
        echo "<div class=clear></div>";
        echo "</div>";
      }
      ?>
      <hr class=homehr>
      <a href=#><h4 class="orange homeh4">+ See More</h4></a>
    </div>
  </div>
  <div class="col-4 col-t-6">
    <div class=homecard>
      <h1 class=homeh1>CSP</h1>
      <hr class=homehr>
      <?php
      while ($res = mysqli_fetch_array($csp_events)){
        echo "<div class='societycontainer'>";
        echo "<div class='left homesubcon' width=30%>";
        echo "<h5 class=homeh5>".$res['months']."</h5>";
        echo "<h2 class=homeh2>".$res['dates']."</h2>";
        echo "</div>";
        echo "<div class='left homesubcon' width=70%>";
        echo "<p class=homep>".$res['e_name']."</p>";
        echo "</div>";
        echo "<div class=clear></div>";
        echo "</div>";
      }
      ?>
      <hr class=homehr>
      <a href=#><h4 class="orange homeh4">+ See More</h4></a>
    </div>
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
<?php
  $mysqli->close();
?>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
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

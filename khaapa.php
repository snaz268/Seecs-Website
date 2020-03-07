<?php
  include_once("connection.php");
  session_start();
  $_SESSION['currentpage'] = $_SERVER['REQUEST_URI'];
  $food_special = mysqli_query($mysqli, "SELECT item, price FROM khaapa_food WHERE category='Special'");
  $food_normal = mysqli_query($mysqli, "SELECT item, price FROM khaapa_food WHERE category='Normal'");
  $food_theme = mysqli_query($mysqli, "SELECT batch,b_desc,cover_pic FROM khaapa_theme WHERE NOW() BETWEEN duration_start and duration_end;");
  $food_photos = mysqli_query($mysqli, "SELECT photo_name FROM khaapa_photos ORDER BY photo_date DESC LIMIT 4;");
  $food_event = mysqli_query($mysqli, "SELECT DATE_FORMAT(event_date,'%M') AS months, DATE_FORMAT(event_date,'%D') AS dates, event_name FROM khaapa_events ORDER BY event_date DESC LIMIT 3;");
  $food_events = mysqli_query($mysqli, "SELECT event_photo, event_date FROM khaapa_events ORDER BY event_date DESC LIMIT 3;");
  $food_reviews = mysqli_query($mysqli, "SELECT p_name, r_description FROM khaapa_reviews ORDER BY review_time DESC LIMIT 4;")

?>
<!DOCTYPE html>
<html>
<head>
<title>SeecsNews | Khaapa</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<!-- Navbar -->
<div class="topnav" id="myTopnav">
  <a class = "image left" href="index.php"><img src=".\images\logo.png" width="42px"></a>
  <a class=links href="index.php">Home</a>
  <a href="khaapa.php" class="links activemenu">Khaapa</a>
  <div class="dropdown">
    <button class="dropbtn">Societies
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="acm_home.php">ACM</a>
      <a href="home.php">SGA</a>
      <a href="#">TABA</a>
      <a href="#">SGA</a>
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
    while($res = mysqli_fetch_array($food_events)){
      echo "<div class='mySlides fade'>";
      echo "<img src=".$res['event_photo']." style='width:100%; height:415px'>";
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

<!-- Content -->
<div class="row">
  <!-- Left Content -->
  <div class="col-3 col-t-4">
    <div class="khaapacard">
      <h3 class=khaapah3>Special Items!</h3>
      <hr class=khaapahr>
      <table style="text-align:center;" width=100%>
        <tr>
          <th width="50%">Item</th>
          <th width="50%">Price</th>
        </tr>
        <?php
          while($res = mysqli_fetch_array($food_special)){
            echo "<tr>";
            echo "<td>".$res['item']."</td>";
            echo "<td>".$res['price']."</td>";
            echo "</tr>";
          }
        ?>
      </table>
    </div>

    <div class="khaapacard">
      <h3 class=khaapah3>Today's Menu!</h3>
      <hr class=khaapahr>
      <table style="text-align:center;" width=100%>
        <tr>
          <th width="50%">Item</th>
          <th width="50%">Price</th>
        </tr>
        <?php
          while($res = mysqli_fetch_array($food_normal)){
            echo "<tr>";
            echo "<td>".$res['item']."</td>";
            echo "<td>".$res['price']."</td>";
            echo "</tr>";
          }
        ?>
      </table>
    </div>
  </div>
  <!-- Center Content -->
  <div class="col-6 col-t-8">
    <div class="khaapacard">
      <h3 class=khaapah3>About Khaapa</h3>
      <hr class=khaapahr>
      <p class=khaapap>A snack bar for NUST SEECS students and faculty, aiming to provide you with quality food and beverages.</p>
    </div>

    <h4 class="khaapasection khaapah4">Class and Theme</h4>
    <hr class="khaapasection khaapahr">
    <div class=khaapacard>
    <?php $res = mysqli_fetch_array($food_theme); ?>
      <img src=<?php echo $res['cover_pic'];?> width="100%">
      <div>
        <h3 class=khaapah3><?php echo $res['batch'];?></h3>
        <hr class=khaapahr>
        <p class=khaapap><?php echo $res['b_desc'];?></p>
      </div>
    </div>

    <h4 class="khaapasection khaapah4">Events</h4>
    <hr class="khaapasection">

    <div class=khaapacard>
      <?php
        while ($res = mysqli_fetch_array($food_event)) {
          echo "<div class='khaapacontainer'>";
          echo "<div class='left khaapasubcon' width=30%>";
          echo "<h5 class=khaapah5>".$res['months']."</h5>";
          echo "<h2 class=khaapah2>".$res['dates']."</h2>";
          echo "</div>";
          echo "<div class='left khaapasubcon' width=70%>";
          echo "<p class=khaapap>".$res['event_name']."</p>";
          echo "</div>";
          echo "<div class=clear></div>";
          echo "</div>";
        }
      ?>
    </div>

    <h4 class="khaapasection khaapah4">Photos</h4>
    <hr class="khaapasection khaapahr">
    <div>
      <div class=khaapaphotos>
      <?php
        while($res = mysqli_fetch_array($food_photos)){
          echo "<div class='left'><img src=".$res['photo_name']." width=50%></div>";
        }
      ?>
        <div class=clear></div>
      </div>
    </div>
  </div>
  <!-- Right Content -->
  <div class="col-3 col-t-12">
    <div class="khaapacard">
      <h3 class=khaapah3>Your Opinion Matters!</h3>
      <form id="reviewform" method=post action="review_file.php" onsubmit="return false;">
        <input class=khaapatextarea type="text" name="name" placeholder=" Name">
        <input type="text" style="height: 50px;" name="description" class=khaapatextarea placeholder=" Write about your experience">
        <input type="submit" id=submit name="submit" class="submitbtn" value="Submit">
      </form>
    </div>

    <div id="reviewdisplay" class="khaapacard">
      <h3 class="khaapareview khaapah3">Reviews</h3>
      <hr class=khaapahr>
      <?php
      while ($res = mysqli_fetch_array($food_reviews)){
        echo "<h4 style='margin-bottom: 0; margin-top: 0;'>".$res['p_name']."</h4>";
        echo "<p class=khaapap style='margin-top:0;'>".$res['r_description']."</p>";
        echo "<hr class=khaapahr>";
      } 
      ?>
    </div>
  </div>
  <div class=clear></div>
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

   $('#submit').on('click',function(){
      $.ajax({
        type:'POST',
        url:'review_file.php',
        data:$('#reviewform').serialize(),
        success:function(response){
          $('#reviewdisplay').html(response);
        }
      });
      $('#reviewform')[0].reset();
   });

});
</script>

</body>
</html>

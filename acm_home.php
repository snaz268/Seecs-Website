<?php

  include_once("connection.php");
  include_once("sessions.php");
  $_SESSION['currentpage'] = $_SERVER['REQUEST_URI'];
   $result = mysqli_query($mysqli, "SELECT s_cover_img FROM society  where s_name = 'acm';");
 $res=mysqli_fetch_array($result );  
  $eve = mysqli_query($mysqli, "SELECT e_link,e_img ,e_name FROM event  where e_society = 'acm';");

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>

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
<div class="clear"></div>
  <div class = "acm_head">
    <div class=left><img src=".\images\acm_logo.jpg" width=48px></div>
    <menu class="left menu"><a href="acm_home.php">Home</a></menu>
    <menu class="left menu"><a href="acm_about.php">About Us</a></menu>
    <menu class="left menu"><a href="acm_events.php">Events</a></menu>
    <menu class="left menu"><a href="acm_photos.php">Photos</a></menu>
    <menu class="left menu"><a href="acm_videos.php">Videos</a></menu>
    <a style="display:none;" id=update href=acm_home_edit.php><button class="loginbtn">Update</button></a>
    <div class=clear></div>
  </div>
    <div class="clear"></div>

<div class="col-12 col-m-9 pic">

  <?php
  echo "<img style=\"width:100% ; height:415px\" src=".$res['s_cover_img']." >";
  ?></div>
<div class="clear"> </div></br></br></br></br>
<div class="clear"> </div>
<div class="col-9 col-m-9 outcontent"> 
	<h2> Main Events</h2>
   <?php  
while( $e=mysqli_fetch_array($eve)){  
echo "<h3>".$e['e_name']."<hr/>"."</h3>";
echo "<div class=\"col-3  content\">";
echo "<a href=".$e['e_link'].">"."<img style=\"width:100% ; height:100%\" src=".$e['e_img'].">"."</a>";
echo "</div>";

echo "<div class=\"clear\">". "</div>";
}
?>
<div class="clear"> </div>
</div>

<div class="col-2 col-m-12 "> 
	<br/>
	<br/>
<h2>Contact Us</h2>
<div class="link">
	<h7>Supervisor</h7>
<ul>
 <?php
 $mem4 = mysqli_query($mysqli, "SELECT m_img,u_name,u_phone,m_email FROM member m, user u where u_email= m_email and m_society = 'acm'and m_title='supervisor';");
   $name4 = mysqli_fetch_array($mem4);
  echo "<li>".$name4['u_name']."</li>"; 
  echo "<li>".$name4['u_phone']."</li>"; 
 
 ?>

</ul>
<h7>President Events</h7>
<ul>
  <?php
   $mem1 = mysqli_query($mysqli, "SELECT m_img,u_name,u_phone,m_email FROM member m, user u where u_email= m_email and m_society = 'acm'and m_title='president events';");
   $name1 = mysqli_fetch_array($mem1);
  echo "<li>".$name1['u_name']."</li>"; 
  echo "<li>".$name1['u_phone']."</li>"; 
 

 ?>

</ul>

<br/>
<h7>General Sectretary Events</h7>
<ul>

  <?php
  $mem2 = mysqli_query($mysqli, "SELECT m_img,u_name,u_phone,m_email FROM member m, user u where u_email= m_email and m_society = 'acm'and m_title='general sectretary';");
   $name2 = mysqli_fetch_array($mem2);
  echo "<li>".$name2['u_name']."</li>"; 
  echo "<li>".$name2['u_phone']."</li>"; 
 

 ?>
 
</ul>

<br/>
<h7>Marketing agent</h7>
<ul>

  <?php
$mem5 = mysqli_query($mysqli, "SELECT m_img,u_name,u_phone,m_email FROM member m, user u where u_email= m_email and m_society = 'acm'and m_title='marketing agent';");
   $name5 = mysqli_fetch_array($mem5);
  echo "<li>".$name5['u_name']."</li>"; 
  echo "<li>".$name5['u_phone']."</li>"; 


 ?>
 
</ul>

<br/>
<h7>Manager</h7>
<ul>

  <?php
   $mem3 = mysqli_query($mysqli, "SELECT m_img,u_name,u_phone,m_email FROM member m, user u where u_email= m_email and m_society = 'acm'and m_title='manager';");
   $name3 = mysqli_fetch_array($mem3);
  echo "<li>".$name3['u_name']."</li>"; 
  echo "<li>".$name3['u_phone']."</li>"; 
 

 ?>
</ul>

<br/>
</div>
</div>

<div class="clear"> </div>
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
	
	
<!DOCTYPE html>
<?php
	include('connection.php');
	session_start();
  	$_SESSION['currentpage'] = $_SERVER['REQUEST_URI'];
	$s_name = "acm";
	$res1= mysqli_query($mysqli, "SELECT * FROM society where s_name = '$s_name'");
	$obj=mysqli_fetch_object($res1); 
	$row = array('1'=>$obj->society_name, '2'=>$obj->s_theme, '3'=>$obj->s_aim, '4'=>$obj->s_history, '5'=>$obj->s_cover_img);

	$GLOBALS['theme'] = $row[2];

	$res2= mysqli_query($mysqli, "SELECT * FROM event WHERE e_society = '$s_name' ORDER BY e_date DESC;");
	$mysqli->close();
?>
<html>
	<head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>SeecsNews | <?php echo $row[1] ?> Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/Admin_css.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body class="w3-theme-l5">

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
      <a href="#">ACM</a>
      <a href="#">CSP</a>
      <a href="#">TABA</a>
      <a href="#">SGA</a>
      <a href="#">YES</a>
      <a href="#">IEEE</a>
      <a href="#">Gaming</a>
    </div>
  </div> 
  <a class=links href="aboutus.php">About Us</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon links" onclick="myFunction()">&#9776;</a>

  <a id="logoutbutton" href=logout.php style="display: none;"><button class="loginbtn">LogOut</button></a>
  <p id="username" style="display:none; float:right; margin:14px 4px; color:white; text-align: center; font-size:17px;"> <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?></p>
</div>



<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:20px;padding-right: 0;"> 
	<div class = "right_col col-b-1 col-4 col-t-5 col-m-12">
	  <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><?php echo $row[1] ?></h4>
         <hr>
         <div>
         	
         </div>
         <form method="post" action="update_theme.php" >
         	<input type="hidden" name="s_name" value = "<?php echo $row[1] ?>">
         	<div style="width: 100%">
         		<div class="theme_divs left">
					<div id = "GreenTheme" class="theme_s">Green</div>
					</div>
				<div class="right" style="padding-top: 15px;">
					<input id = "green" type="radio" name="theme" value="green">
				</div>
         	</div>
			<br>
			<div style="width: 100%">
         		<div class="theme_divs left">
					<div id = "YellowTheme" class="theme_s" style="background-color:#FFC600"> Yellow</div>
					</div>
				<div class="right" style="padding-top: 15px;">
					<input id = "yellow" type="radio" name="theme" value="yellow">
				</div>
         	</div>
			<br>

			<div style="width: 100%">
         		<div class="theme_divs left">
					<div id = "RedTheme" class="theme_s" style="background-color:#C30202"> Red </div>
					</div>
				<div class="right" style="padding-top: 15px;">
					<input id = "red" type="radio" name="theme" value="red">
				</div>
         	</div>
		  <br>
		  <div style="width: 100%">
         		<div class="theme_divs left">
					<div id = "BlueTheme" class="theme_s" style="background-color:#010072"> Blue </div>
					</div>
				<div class="right" style="padding-top: 15px;">
					<input id = "blue" type="radio" name="theme" value="blue">
				</div>
         	</div>
			<div>
					<div style="width: 100%; padding-left:30%; padding-bottom: 10%">
						<input type="submit" class="t_btn clear" name="apply" value="Apply" style="margin: auto; float: none;">
					</div>
				</form>
			</div>
        </div>
      </div>
      <br>
		      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div id = "side_bar_div" class="w3-white">
          <a href="acm_home.php">
			  <button  class="side_bar_button">
				  <i class="fa fa-user fa-fw w3-margin-right"></i> User View
			  </button>
			</a>
			 <a href="acm_home_edit.php">
			  <button  class="side_bar_button">
				  <i class="fa fa-home fa-fw w3-margin-right"></i> Home
			  </button>
			</a>
			 <a href="acm_about_edit.php">
				 <button class="side_bar_button">
					 <i class=" fa fa-book fa-fw w3-margin-right"></i> About
				 </button>
			</a>
			<a href="acm_members_edit.php">
			<button class="side_bar_button">
				<i class="fa fa-users fa-fw w3-margin-right"></i> Members
			</button>
			</a>
			<a href="acm_mainEvents_edit.php">
          <button class="side_bar_button">
			  <i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Events
			</button>
			</a>
			<a href="acm_pic_edit.php">
          <button class="side_bar_button">
			  <i class="fa fa-photo fa-fw w3-margin-right"></i> Photos
				</button>
			</a>
			<a href="acm_vid_edit.php">
			<button class="side_bar_button">
				<i class="fa fa-film fa-fw w3-margin-right"></i> Videos
				</button>
			</a>
          <div id="Demo3" class="w3-hide">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/fjords.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>      
      </div>
      <br>
	  </div>
	 <div class="pic_div_align">
	  	<div class = "outer_pic_div_right col-b-2 col-8 col-t-7 col-m-12" style="background-image: url('<?php echo $row[5];?>');">
		<div class ="inner_pic_div" style="background-color: transparent;">
			<form method="post" action="add_cover_photo.php" enctype="multipart/form-data">
				<input type="hidden" name="s_name" value="<?php echo $s_name ?>">
				<h4>Picture<input type="file" name="fileToUpload" onchange="this.form.submit()"></h4>
			</form>
		</div>
	</div>
	  </div>
	
  <!-- The Grid -->
    <!-- Left Column -->
    
    <div class = "other_col_right col-b-2 col-8 col-t-7 col-m-12">
		  
		<div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="card w3-round w3-white">
            <div class="w3-container w3-padding">
				<h3>Create New Event</h3><hr class="up">
				<form action = "add_Event.php" method = "post" enctype="multipart/form-data">
					<input type="hidden" name = "e_society" value= "<?php echo $row[1] ?>">
					<div class="home_div">
						<div class="home_div_left">
							<h6>Event Name*:</h6>
						</div>
						<div class="home_div_right">
							<input type="text" name = "e_name">
						</div>
					</div>
					<div class="clear"></div>

					<div class="home_div">
						<div class="home_div_left">
							<h6>Event Date*:</h6>
						</div>
						<div class="home_div_right">
							<input type="text" name = "e_date">
						</div>
					</div>
					<div class="clear"></div>
					
					<div class="home_div">
						<div class="home_div_left">
							<h6>Event Time*:</h6>
						</div>
						<div class="home_div_right">
							<input type="text" name = "e_time">
						</div>
					</div>
					<div class="clear"></div>

					<div class="home_div">
						<div class="home_div_left">
							<h6>Event Location*:</h6>
						</div>
						<div class="home_div_right">
							<input type="text" name = "e_location">
						</div>
					</div>
					<div class="clear"></div>

					<div class="home_div">
						<div class="home_div_left">
							<h6>Event Description:</h6>
						</div>
						<div class="home_div_right">
							<input type="text" name = "e_desc">
						</div>
					</div>
					<div class="clear"></div>

					<div class="home_div">
						<div class="home_div_left">
							<h6>Event Poster:</h6>
						</div>
						<div class="home_div_right">
							<input type="file" name = "fileToUpload">
						</div>
					</div>
					<div class="clear"></div>

					<div class ="right">
					  <input type="submit" class="t_btn" name = "add" value = "Add">
					</div>
				</form>
          </div>
        </div>
      </div>
	</div>
	<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
			<h3 class = "inline_block"></h3> 

	<?php
			$i=0;
			while($res3 = mysqli_fetch_array($res2)) {
		?>
		
		<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
			<div style="float:right">
					
					 <div class="right">
					 	<form method="post" action="delete_event.php">
					 		<input type="hidden" name="e_id" value="<?php echo $res3['e_id']?>">
					 		 <input type="submit" class="t_btn" name = "delete" value = "Delete">
					 	</form>
					</div>

					<div class="right" style="right: 10px">
						 <input type="button" style="size:2; margin-right: 10%; width:80px;" class="t_btn" value="Edit" onclick="window.location.href='a_oneEvent.php?e_id=<?php echo $res3['e_id']?>'">
					</div>	 
		   </div>
			<h3 class = "inline_block"><?php echo $res3['e_name']?></h3> 
 <hr>
			

		   <div class = "inline_block ">
					 	<div class ="e_container"><img src=<?php echo $res3['e_img'] ?> alt="Event poster">
						 </div>
					</div>
        <div><?php echo $res3['e_desc'] ?></div>
      </div>
		<?php
			$i++;
			}
		?>			
	 
    
  <!-- End Grid -->
  
<!-- End Page Container -->
</div>
</div>
	<br>
	<!-- Footer -->
	
<footer class="row clear">
  <h2>Seecs News</h2>
  <div style="border-bottom: 1px solid #949494">
  <div class="left col_nav_bar-4 col-t_nav_bar-4">
    <div class="border">
    <p><a href="index.php">Home</a></p>
    <p><a href="khaapa.php">Khaapa</a></p>
    <p><a href="login.html">LogIn &amp; SignUp</a></p>
    <p><a href="aboutus.php">About Us</a></p>
    </div>
  </div>
  <div class="left col_nav_bar-4 col-t_nav_bar-4">
    <div class="border">
    <p><a href="acm_home.php">ACM</a></p>
    <p><a href="home.php">SGA</a></p>
    <p><a href="#">YES</a></p>
    <p><a href="#">CSP</a></p>
    </div>
  </div>
  <div class="left col_nav_bar-3 col-t_nav_bar-4">
    <div>
    <p><a href="#">IEEE</a></p>
    <p><a href="#">Horticulture</a></p>
    <p><a href="#">TABA</a></p>
    <p><a href="#">Gaming Consortium</a></p>
    </div>
  </div>
  <div class="clear"></div>
  </div>
  <div style="margin-top: 14px;">&copy; Copyright <a style="color:white;" href="index.php">Seecs News</a></div>
</footer>


<script>
	$(document).ready(function(){

		<?php
  	if(isset($_SESSION['username'])){
	?>
    $('#loginbutton').hide();
    $('#logoutbutton').show();
    $('#username').show();
	<?php } ?>

		var theme = '<?php echo $GLOBALS['theme'];?>';
	if(theme === "green"){
		 document.getElementById("green").checked = true;
		$(".t_btn").css("background-color","#118039");
		$(".btn_style").css("background-color","#118039");
		$(".edit_btn").css("background-color","#118039");
		$('.side_bar_button').addClass("side_bar_button_green");
	}
	else if(theme === "yellow"){
		 document.getElementById("yellow").checked = true;
		$(".t_btn").css("background-color","#FFC600");
		$(".btn_style").css("background-color","#FFC600");
		$(".edit_btn").css("background-color","#FFC600");
		$('.side_bar_button').addClass("side_bar_button_yellow");
	}
	else if(theme === "red"){
		 document.getElementById("red").checked = true;
		$(".t_btn").css("background-color","#C30202");
		$(".btn_style").css("background-color","#C30202");
		$(".edit_btn").css("background-color","#C30202");
		$('.side_bar_button').addClass("side_bar_button_red");
	}
	else if(theme === "blue"){
		 document.getElementById("blue").checked = true;
		$(".t_btn").css("background-color","#010072");
		$(".btn_style").css("background-color","#010072");
		$(".edit_btn").css("background-color","#010072");
		$('.side_bar_button').addClass("side_bar_button_blue");
	}

	$("#GreenTheme").click(function(){//change theme to green
		$(".t_btn").css("background-color","#118039");
		$(".btn_style").css("background-color","#118039");
		$(".edit_btn").css("background-color","#118039");
		$('.side_bar_button')
		.addClass("side_bar_button_green")
		.removeClass("side_bar_button_yellow")
		.removeClass("side_bar_button_red")
		.removeClass("side_bar_button_blue");
		document.getElementById("green").checked = true;
		});
	
	$("#YellowTheme").click(function(){//chneg theme to yellow
		$(".t_btn").css("background-color","#FFC600");
		$(".btn_style").css("background-color","#FFC600");
		$(".edit_btn").css("background-color","#FFC600");
		$('.side_bar_button')
			.addClass("side_bar_button_yellow")
			.removeClass("side_bar_button_green")
			.removeClass("side_bar_button_red")
			.removeClass("side_bar_button_blue");
		document.getElementById("yellow").checked = true;
		
	});
	
	$("#RedTheme").click(function(){//change theme to red
		$(".t_btn").css("background-color","#C30202");
		$(".btn_style").css("background-color","#C30202");
		$(".edit_btn").css("background-color","#C30202");
		$('.side_bar_button')
		.addClass("side_bar_button_red")
		.removeClass("side_bar_button_green")
		.removeClass("side_bar_button_yellow")
		.removeClass("side_bar_button_blue");
		document.getElementById("red").checked = true;
		
	});
	
	$("#BlueTheme").click(function(){//change theme to blue
		$(".t_btn").css("background-color","#010072");
		$(".btn_style").css("background-color","#010072");
		$(".edit_btn").css("background-color","#010072");
		$('.side_bar_button')
		.addClass("side_bar_button_blue")
		.removeClass("side_bar_button_green")
		.removeClass("side_bar_button_yellow")
		.removeClass("side_bar_button_red");
		document.getElementById("blue").checked = true;	
		
	});
	});
</script>
</body>
</html> 

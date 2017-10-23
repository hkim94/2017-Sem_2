<?php
session_start();
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script>
    // side nav //
    (function($){
      $(function(){
        $('.button-collapse').sideNav();
      }); // end of document ready
    })(jQuery);

    $(".button-collapse").sideNav();
    $('.button-collapse').sideNav('show');
    // Hide sideNav
    $('.button-collapse').sideNav('hide');
    // Destroy sideNav
    $('.button-collapse').sideNav('destroy');
	
	$(document).ready(function(){
		$('.modal').modal();
	});
	
	function fav_toggle() {
    	var x = document.getElementById("fav1");
		var y = document.getElementById("fav2");
    	if (x.style.display === "none") {
        x.style.display = "block";
		y.style.display = "none";
    	} else {
        x.style.display = "none";
		y.style.display = "block";
    	}
	}
  	</script>
  </head>

  <body>
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <div style="background:linear-gradient(to right, rgb(123, 193, 68), rgb(248, 151, 40)); padding-bottom:5%;">
        <ul id="slide-out" class="side-nav">
         <?php
                require('../../Model/db.php');
                
                if(isset($_SESSION['userID'])){
                    $userID = $_SESSION['userID'];
                    $result = $conn->prepare("SELECT * FROM `users` LEFT JOIN `gocard` ON `users`.`userID` = `gocard`.`userID` WHERE `users`.userID = :userID");
                    $result ->execute(array(':userID' => $userID));
                    $row = $result->fetch();
           ?>
          <li>
            <div class="user-view">
              <div class="background">
                <img src="../image/bg3.jpg">
              </div>
              <div>
              	<img class="circle" src="../image/user_icon.svg" style="display:inline-block";>
                <a href="../../Controller/pdoLogout.php" style="display:inline-block; float:right; text-decoration:none; color:black;"><i class="material-icons">exit_to_app</i></a>
              </div>
              <span class="white-text name"><?php echo $row['fname']; echo "\n\n"; echo $row['lname'];?></span>
              <span class="white-text email"><?php echo $row['email'];?></span>
            </div>
          </li>
          <li><a class="subheader">Bus</a></li>
          <li><a href="search.php"><i class="material-icons">search</i>Search</a></li>
          <li><a href="alert.php"><i class="material-icons">error_outline</i>Alert</a></li>

          <li><div class="divider"></div></li>
          <li><a class="subheader">My Page</a></li>
          <li><a href="my profile.php"><i class="material-icons">account_box</i>Profile</a></li>
          <li><a href="mybuslist.php"><i class="material-icons">directions_bus</i>My Favourite Bus</a></li>
          <li><a href="mystop.php"><i class="material-icons">nature_people</i>My Bus Stop</a></li>
          <li><a href="mygocard.php"><i class="material-icons">credit_card</i>Go Card</a></li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="small material-icons" style="color:white; margin:10px;">menu</i></a>
        <a class="modal-trigger" href="#modal5"><i class="small material-icons" style="color:white; margin:10px; float:right;">add</i></a>
      </div>
	  <?php
      	}
	  ?>
      
      <div id="modal5" class="modal modal-fixed-footer">
            <div class="modal-content">
           		<div style="width:100%; border-bottom:thin solid #CCC">
                	<h6 style="text-align:right; color:#999">ADD TO FAVOURITE</h6>
                </div>
            <?php
	  			require_once("../../Model/db.php");
	  			$result = $conn ->query('SELECT * FROM `bus`', PDO::FETCH_ASSOC);
	  			$count = 0;
	  			foreach ($result as $user){
		  		$count++;
	  		?>
            <div style="border-bottom:thin solid #CCC; ">
            	<div style="margin:5%; display:inline-block; width:30%;">
                	<img src="../image/bus_img.jpg" alt="" style="width:100%; border-radius:5px;">
                </div>
                <div style="display:inline-block; float:left; margin-top:8%; width:20%;">
                	<div onClick="fav_toggle()" id="fav1"><i class="material-icons">favorite_border</i></div>
                    <div onClick="fav_toggle()" id="fav2" style="display:none;"><i class="material-icons">favorite</i></div>
                </div>
                <div style="display:inline-block; float:left; margin-top:3%; width:40%;">
                	<h6 style="display:inline-block; font-weight:bold;">ROUTE CODE</h6><br>
					No. <?php echo $user['busno'];?>
                </div>
            </div>    
            <?php
				}
			?>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
            </div>
       </div>
      
      
      <div class="mainpage" style="background:linear-gradient(to right, rgb(123, 193, 68), rgb(248, 151, 40)); padding-bottom:5%;">
      	<div class="row">
        	<div class="col s2"></div>
            <div class="col s8">
            	<img src="../image/fav_bus.svg" alt="" style="width:100%;">
      		</div>
      		<div class="col s2"></div>
  		</div> 
     </div>
          
      <?php
	  require_once("../../Model/db.php");
	  $result = $conn ->query('SELECT * FROM `favourite_bus`', PDO::FETCH_ASSOC);
	  $count = 0;
	  foreach ($result as $user){
		  $count++;
	  ?>
      <div class="card horizontal" style="margin:5%; width:auto; height:80px;">
      	<div class="card-image" style="background-color:rgb(248, 151, 40); width:20%;">
      		<div class="center-align">
        		<i class="small material-icons" style="color:white; transform: translateY(100%);">directions_bus</i>
        	</div>
      	</div>
        <div class="card-stacked">
        	<div class="card-content" style="padding:15px;">
            	<a href="../../Controller/pdoDelete.php?f_BusID=<?php echo $user['f_BusID'];?>" onClick="Materialize.toast('I am a toast', 4000)"><i class="small material-icons" style="color:rgb(123, 193, 68); float:right;">clear</i></a>
            	<p style="font-size:11pt; font-weight:bold;">Favourite Bus #<?php echo $user['f_BusID'];?></p>
          		<p><?php echo $user['busno'];?></p>
                <p style="text-align:right; font-size:7pt;">created: <?php echo $user['add_date'];?></p>
        	</div>
      	</div>
	  </div>
	  <?php
      }
	  ?>

</body>
</html>

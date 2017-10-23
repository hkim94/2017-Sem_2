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
              <img class="circle" src="../image/user_icon.svg"></a>
              <span class="white-text name"><?php echo $row['fname']; echo "\n\n"; echo $row['lname'];?></span>
              <span class="white-text email"><?php echo $row['email'];?></span>
            </div>
          </li>
          <li><a class="subheader">Bus</a></li>
          <li><a href="search.php"><i class="material-icons">search</i>Search</a></li>
          <li><a href="alert.php"><i class="material-icons">error_outline</i>Alert</a></li>

          <li><div class="divider"></div></li>
          <li><a class="subheader">My Page</a></li>
          <li><a href="myprofile.php"><i class="material-icons">account_box</i>Profile</a></li>
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
      
      <div class="mainpage" style="background:linear-gradient(to right, rgb(123, 193, 68), rgb(248, 151, 40)); padding-bottom:5%;">
      	<div class="row">
        	<div class="col s2"></div>
            <div class="col s8">
            	<img src="../image/fav_stop.svg" alt="" style="width:100%;">
      		</div>
      		<div class="col s2"></div>
  		</div> 
     </div>
     
     <div id="modal5" class="modal modal-fixed-footer">
            <div class="modal-content">
           		<div style="width:100%; border-bottom:thin solid #CCC">
                	<h6 style="text-align:right; color:#999">ADD TO FAVOURITE</h6>
                </div>
                <div style="margin:5%;">
                	<span class="search" style="cursor:pointer;"><a class="waves-effect waves-light btn" style="background-color:rgb(123, 193, 68); width:100%;"><i class="material-icons right">location_searching</i>SEARCH STOPS</a></span>
                </div>
                <p id="mylocation">
                </p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
            </div>
       </div>
      
      <?php
	  require_once("../../Model/db.php");
	  $result = $conn ->query("SELECT * FROM `favourite_stop` LEFT JOIN `stop` ON `favourite_stop`.`stopNo` = `stop`.`stopID`", PDO::FETCH_ASSOC);
	  $count = 0;
	  foreach ($result as $user){
		  $count++;
	  ?>
      <section class="card horizontal" style="margin:5%; width:auto; height:110px;">
      	<div class="card-image" style="background-color:rgb(248, 151, 40); width:20%;">
      		<div class="center-align">
        		<i class="small material-icons" style="color:white; transform: translateY(140%);">nature</i>
        	</div>
      	</div>
        <div class="card-stacked">
        	<div class="card-content" style="padding:15px;">
            	<span class="delete" style="cursor:pointer;" id='del_<?php echo $user['f_StopID'];?>'><i class="small material-icons" style="color:rgb(123, 193, 68); float:right;">clear</i></span>
            	<p style="font-size:11pt; font-weight:bold;">Favourite Stop #<?php echo $user['f_StopID'];?></p>
                <p><strong>Street:</strong> <?php echo $user['STREET_NAME'];?></p>
                <p><strong>Suburb:</strong> <?php echo $user['SUBURB'];?></p>
                <p><strong>Detail:</strong> <?php echo $user['DESCRIPTION'];?></p>
        	</div>
      	</div>
	  </section>
	  <?php
      }
	  ?>
</body>

<script>
//Delete favrourite stop
$(document).ready(function(){
 // Delete 
	 $('.delete').click(function(){
	  var el = this;
	  var id = this.id;
	  var splitid = id.split("_");
	  // Delete id
	  var deleteid = splitid[1];
	  // AJAX Request
	  $.ajax({
	   url: '../../Controller/F_stop_Delete.php',
	   type: 'POST',
	   data: { f_StopID:deleteid },
	   success: function(response){
	
		// Removing row from HTML Table
		$(el).closest('section').css('background','rgb(248, 151, 40)');
		$(el).closest('section').fadeOut(800, function(){ 
		 $(this).remove();
		});
	   }
	  });
	 });

	$('.search').click(function(){
	  $.ajax({
	   url:'../../Controller/F_stop_Select.php',
	   type: 'GET',
	   success: function (data) {
		   alert(data);
	   } 
	  });
	});
	
 });


var x = document.getElementById("mylocation");

function getLocation(){
	if (navigator.geolocation){
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	}else{
		x.innerHTML = "Geolocation is not supported by this browser.";
	}
}

function showPosition(position){
	x.innerHTML = "Latitude: " + position.coords.latitude +
	"<br>Longitude: " + position.coords.longitude;
	var pos = {lat: position.coords.latitude, lng:position.coords.longitude};
}

function getArea(pos){
	showPosition(position);
	var pos = {lat: position.coords.latitude, lng:position.coords.longitude};
	pos[0] = [lat - 0.005, lng - 0.005];
	pos[1] = [lat - 0.005, lng + 0.005];
	pos[2] = [lat + 0.005, lng + 0.005];
	pos[3] = [lat + 0.005, lng - 0.005];
	return pos;
}

function showError(error){
	switch(error.code){
		case error.PERMISSION_DENIED:
		x.innerHTML = "User denied the request for Geolocation."
		break;
		case error.POSITION_UNAVAILABLE:
		x.innerHTML = "Location information is unavailable."
		break;
		case error.TIMEOUT:
		x.innerHTML = "The request to get user location timed out ."
		break;
		case error.UNKNOWN_ERROR:
		x.innerHTML = "An unknown error occurred."
		break;
	}
}

function showStop(){
	//ajax GET data WHERE Latitude +0.005 & -0.005 Logitude +0.005 & - 0.005
	//display in innerHTML
}



</script>

</html>

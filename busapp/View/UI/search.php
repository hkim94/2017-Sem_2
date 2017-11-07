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
    
    <style>
	#search_bar > input[type=text] {
		width: 80%;
		background-color:white;
		box-sizing: border-box;
		border-radius:10pt;
		border: 2px solid rgb(123, 193, 68);
		font-size: 16px;
		color:white;
		padding-left:10%;
	}

	input[type=text]:focus {
		border-bottom:2px solid red;
	}
	
	table{
		margin-top:10%;
		height:100%;
	}
	
	table > tbody > tr{
		height:118px;
	}
	
    table > tbody > tr:nth-child(even){
      background-image:url(../image/bus_R1.png);
	  background-repeat:no-repeat;
	  background-size: auto;
    }

    table > tbody >tr:nth-child(odd){
      background-image:url(../image/bus_L1.png);
	  background-repeat:no-repeat;
	  background-size: auto;
    }

    table > tbody > tr:first-child{
      background-image:url(../image/start.png);
	  background-repeat:no-repeat;
	  background-size:auto;
    }

    table > tbody >tr:last-child{
      background-image:url(../image/end.png);
	  background-repeat:no-repeat;
      background-size: auto;
    }
	
	td{
		text-indent:125px;
	}
	
	.tabs .tab a{
		color:rgba(123, 193, 68, 0.8);
	}
	
	.tabs .tab a:hover, .tabs .tab a.active {
		color:rgb(123, 193, 68);
	}
	.tabs .indicator{
		background-color:rgb(123, 193, 68);
	}

	</style>

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

    </script>
  </head>

  <body>
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <div style="background:linear-gradient(to right, rgb(123, 193, 68), rgb(248, 151, 40));">
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

          <li><div class="divider"></div></li>
          <li><a class="subheader">My Page</a></li>
          <li><a href="myprofile.php"><i class="material-icons">account_box</i>Profile</a></li>
          <li><a href="mybuslist.php"><i class="material-icons">directions_bus</i>My Favourite Bus</a></li>
          <li><a href="mystop.php"><i class="material-icons">nature_people</i>My Bus Stop</a></li>
          <li><a href="mygocard.php"><i class="material-icons">credit_card</i>Go Card</a></li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="small material-icons" style="color:white; margin:10px;">menu</i></a>
      </div>
      <?php
      	}
	  ?>
      
      <div class="mainpage" id="mainpage" style="background:linear-gradient(to right, rgb(123, 193, 68), rgb(248, 151, 40)); padding-bottom:5%; height:100%; padding-top:5%;">
        <div class="row">
        	<form id="busSearch">
                <div class="col s1"></div>
                <div class="col s8">
                    <div class="search">
                        <input type="text" id="busNo" name="busNo" placeholder="Search Bus Number.." style="display:inline-block; position:relative; border-bottom:thin solid white; padding-left:15px;">
                    </div>
                </div>
                <div class="col s2">
                    <input type="button" style="display:inline-block; position:absolute; margin-top:3%; padding-top:2%; padding-bottom:2%; background-color:rgb(123, 193, 68); color:white; border-radius:5px;" value="FIND" onClick="trackbus()">
                </div>
                <div class="col s1"></div>
            </form>
  		</div>
        
        <div class="row">
            <div class="col s1"></div>
            <div class="col s10" id="result"></div>
            <div class="col s1"></div>
      	</div>
        
        <div class="row">
        	<form>
            	<div class="col s1"></div>
                <div class="col s10">
                    <input type="hidden" id="LATITUDE" name="LATITUDE" >
                    <input type="hidden" id="LONGITUDE" name="LONGITUDE">
                    <input class="waves-effect waves-light btn" type="button" value="MY LOCATION" onClick="getLocation(); myLocation()" style="background-color:rgb(123, 193, 68); width:100%;">
                </div>
                <div class="col s1"></div>
            </form>
        </div>
        
        <div class="row">
            <div class="col s1"></div>
            <div class="col s10" id="result2"></div>
            <div class="col s1"></div>
      	</div>
      </div>
      
      <div class="row" style="margin-bottom:0px;" id="arrival_btn">
        <div class="col s12" style="background-color:rgb(248, 151, 40);">
            <a onClick="displayGraph(); displayRoute();" style="text-decoration:none; text-align:center; display:block; color:white; padding:3%; font-size:15pt;">PREDICT ARRIVAL TIME</a>
        </div>
      </div>
      
      <div id="graphpage" style="height:90vh; padding:10px; display:none;">
      	<div id="result3">
        </div>
      </div>
            
  </body>
</html>

<script>//
//function arrivalbtn(){
//	if ($('#result').is(':empty') | $('#result2').is(':empty')){
//		$('#arrival_btn').hide();
//	}else{
//		$('#arrival_btn').show();
//	}
//}

function displayGraph(){
	 document.getElementById("mainpage").style.display = "none";
	 document.getElementById("arrival_btn").style.display = "none";
	 document.getElementById("graphpage").style.display = "block";
}

function trackbus(){
	  $.ajax({
	   url:'../../Controller/Get_Bus_GPS.php',
	   data:{
		   busNo:$("#busNo").val()
	   },
	   datatype:"json",
	   type: 'GET',
	   success: function (data) {
		   $("#result").html(data);
	   }
	});
}

function myLocation(){
	  $.ajax({
	   url:'../../Controller/Get_MyLocation.php',
	   data:{
		   LATITUDE: $("#LATITUDE").val(),
		   LONGITUDE:$("#LONGITUDE").val()
	   },
	   type: 'POST',
	   success: function (data) {
		   $("#result2").html(data);
	   }
	});
}

function displayRoute(){
	 var formValue = $("#result1, #result2").serialize();
	$.ajax({
	   url:'../../Controller/Get_MyLocation.php',
	   data:formValue,
	   type: 'POST',
	   success: function (data) {
		   $("#result3").html(data);
	   }
	});
}

// GET Lat & Log value of current position
var x = document.getElementById("mylocation");
var y = document.getElementById("LATITUDE");
var z = document.getElementById("LONGITUDE");

function getLocation(){
	if (navigator.geolocation){
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	}else{
		x.innerHTML = "Geolocation is not supported by this browser.";
	}
}
function showPosition(position){
	y.value = position.coords.latitude;
	z.value = position.coords.longitude;
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
</script>
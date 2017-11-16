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
	
	$(document).ready(function(){
		$('.modal').modal();
	});

  </script>
  </head>

  <body>
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <div style="background-color:rgb(123, 193, 68);">
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
          <li><a class="subheader"></a></li>
          <li><a href="contact.php"><i class="material-icons">bug_report</i>Report Bug</a></li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="small material-icons" style="color:white; margin:10px;">menu</i></a>
      </div>
      <?php
      	}
	  ?>
      
      <div id="graph"></div>
      
      <div class="row">
      	<div class="col s12" style="padding:5%; color:white; background-color:rgb(123, 193, 68); position:absolute; bottom:0;">
        	Arrival Time
        </div>
      </div>
      
</body>
</html>
<script>
function showRoute(){
	  $.ajax({
	   url:'../../Controller/F_stop_Select.php',
	   data:{
		   LATITUDE: $("#LATITUDE").val(),
		   LONGITUDE:$("#LONGITUDE").val()
	   },
	   type: 'GET',
	   success: function (data) {
		   $("#graph").html(data);
	   }
	});
}
</script>
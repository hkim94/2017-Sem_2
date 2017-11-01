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
      
      <div class="mainpage" style="background:linear-gradient(to right, rgb(123, 193, 68), rgb(248, 151, 40)); padding-bottom:5%;">
      	<div class="row">
        	<div class="col s2"></div>
            <div class="col s8">
            	<h4 style="text-align:center; color:white; font-size:15pt;">SEARCH</h4>
      		</div>
      		<div class="col s2"></div>
  		</div>
        <div class="row">
        	<div class="col s1"></div>
            <div class="col s10" id="search_bar">
            	<div class="search">
            		<input type="text" name="search" placeholder="Search Bus Number.." style="display:inline-block; position:relative;">
                	<input type="button" style="display:inline-block; position:absolute; margin-top:3%; padding-top:2%; padding-bottom:2%; background-color:white;" value="SEARCH">
                </div>
                <div style="width:100%; border-top:1px solid white; padding-bottom:8%;"></div>
                <input type="text" name="search" placeholder="Search stop.." style="display:inline-block; position:relative;">
                <input type="button" style="display:inline-block; position:absolute; margin-top:3%; padding-top:2%; padding-bottom:2%; background-color:white;" value="SEARCH">
                <p style="text-align:center; color:white;">OR</p>
                <select>
                </select>
      		</div>
      		<div class="col s1"></div>
  		</div>  
      </div>
      
      <script>
	  </script>
      
</body>
</html>

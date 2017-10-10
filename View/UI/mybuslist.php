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
     <style>
    nav{
      background-color:rgba(177, 218, 143, 0.8);
    }

    .breadcrumb{
      font-size: 13pt;
    }

    .mainpage{
      margin-top:10%;
    }

    .myprofile{
      margin-top:10%;
    }

    .profile_edit{
      float: right;
      margin-right:10%;
	}
	
	.tabs{
		color:#3F8755;
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
          <li><a href="alert.php"><i class="material-icons">error_outline</i>Alert</a></li>

          <li><div class="divider"></div></li>
          <li><a class="subheader">My Page</a></li>
          <li><a href="my profile.php"><i class="material-icons">account_box</i>Profile</a></li>
          <li><a href="mybuslist.php"><i class="material-icons">directions_bus</i>My Favourite Bus</a></li>
          <li><a href="mystop.php"><i class="material-icons">nature_people</i>My Bus Stop</a></li>
          <li><a href="mygocard.php"><i class="material-icons">credit_card</i>Go Card</a></li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="small material-icons" style="color:white; margin:10px;">menu</i></a>
      </div>


      <!-- breadcrumb -->
      <nav style="background-color:rgba(177, 218, 143, 0.8);">
        <div class="nav-wrapper">
            <div class="col s12" style="margin-left:10%;">
              <a href="#!" class="breadcrumb" style="color:#3F8755;">My Page</a>
              <a href="#!" class="breadcrumb" style="color:#3F8755;">My Bus List</a>
            </div>
        </div>
      </nav>
      <?php
      	}
	  ?>

     <!-- icon & Bg -->
     <div class="row">
     <div class="col s9">
     </div>
     <div class="col s3">
     </div>
     </div>

     <!-- btns ADD & EDIT -->
     <div class="row">
        <div class="col 12">
        </div>
     </div>
     
     <!-- Favourite Bus / Stop register -->
     <div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a class="active" href="#buslist">My Bus</a></li>
            <li class="tab col s3"><a href="#stoplist">My Bus Stop</a></li>
            <li class="tab col s3"><a href="#alert">Alert</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col s1"></div>
        <div id="buslist" class="col s10">Test 1</div>
        <div id="stoplist" class="col s10">Test 2</div>
        <div id="alert" class="col s10">Test 3</div>
        <div class="col s1"></div>
      </div>
 	</div>

</body>
</html>

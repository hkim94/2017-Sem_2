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
    nav{
      background-color: rgba(177, 218, 143, 0.8);
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
      </div>

      <!-- breadcrumb -->
      <nav>
        <div class="nav-wrapper">
            <div class="col s12" style="margin-left:10%;">
              <a href="#!" class="breadcrumb" style="color:#3F8755;">My Page</a>
              <a href="#!" class="breadcrumb" style="color:#3F8755;">Profile</a>
            </div>
        </div>
      </nav>
      <?php
      	}
	  ?>

      <div class="row">
        <div class="background">
          <img src="../image/pexels-photo-403575_1.jpg" alt="" style="background-size:cover; width:100%;"/>
        </div>
      </div>

      <div class="row">
	      <form action="../../Controller/pdoUpdate.php" method="post">
          <?php
                require('../../Model/db.php');
                
                if(isset($_SESSION['userID'])){
                    $userID = $_SESSION['userID'];
                    $result = $conn->prepare("SELECT * FROM `users` LEFT JOIN `gocard` ON `users`.`userID` = `gocard`.`userID` WHERE `users`.userID = :userID");
                    $result ->execute(array(':userID' => $userID));
                    $row = $result->fetch();
           ?>
           <div class="myprofile">
           <input type="hidden" name="userID" value="<?php echo $row['userID'];?>">
           <!-- Gocard -->
               <div class="row" style="margin-bottom:0px;">
                   <div class="col s1"></div>
                   <div class="input-field col s10">
                       <i class="material-icons prefix">credit_card</i>
                       <input id="gocardno" name="gocardno" value="<?php echo $row['gocardno'];?>" disabled>
                   </div>
                   <div class="col s1"></div>
               </div>
           		
               <!-- User's Name -->
               <div class="row" style="margin-bottom:0px;">
                  <div class="col s1"></div>
                  <div class="input-field col s10">
                     <i class="material-icons prefix">account_circle</i>
                     <input type="text" id="fname" name="fname" value="<?php echo $row['fname'];?>">
                  </div>
                  <div class="col s1"></div>
                </div>
                
               <div class="row" style="margin-bottom:0px;">
                  <div class="col s1"></div>
                  <div class="input-field col s10">
                     <i class="material-icons prefix">account_circle</i>
                     <input type="text" id="lname" name="lname" value="<?php echo $row['lname'];?>">
                  </div>
                  <div class="col s1"></div>
                </div>
                
                <!-- Email and Phone -->
                <div class="row" style="margin-bottom:0px;">
                    <div class="col s1"></div>
                    <div class="input-field col s10">
                        <i class="material-icons prefix">email</i>
                        <input type="text" id="email" name="email" value="<?php echo $row['email'];?>">
                    </div>
                    <div class="col s1"></div>
                 </div>
                 
                 <div class="row" style="margin-bottom:0px;">
                    <div class="col s1"></div>
                    <div class="input-field col s10">
                        <i class="material-icons prefix">phone</i>
                        <input type="text" id="mobile" name="mobile" value="<?php echo $row['mobile'];?>">
                    </div>
                    <div class="col s1"></div>
                 </div>
                 
                 <!-- button -->
                 <div class="row" style="margin-bottom:0px;">
                    <div class="profile_edit">
                    	<button type="submit" class="btn-floating btn-large waves-effect waves-light" style="background-color:rgb(123, 193, 68);"><i class="material-icons">check</i></button>
                    </div>
                 </div>
              </form>
              <?php
                }
              ?>
      	</div>
      </div>
</body>
</html>

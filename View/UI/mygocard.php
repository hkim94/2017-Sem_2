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
	
    function activateModal() {
    // initialise modal element
    var modalEl = document.createElement('div');
    modalEl.style.width = '80%';
    modalEl.style.height = 'auto';
    modalEl.style.margin = '5%; auto';
    modalEl.style.backgroundColor = '#fff';

    // show modal
    mui.overlay('on', modalEl);
    }

    $(document).ready(function() {
      $('.modal').modal();
    });

    $(document).ready(function(){
          $('.carousel').carousel();
    });

    $('.carousel.carousel-slider').carousel({fullWidth: true});
	
	$(document).ready(function() {
    $('select').material_select();
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
          <a href="#!" class="breadcrumb"  style="color:#3F8755;">My Page</a>
          <a href="#!" class="breadcrumb" style="color:#3F8755;">My Go Card</a>
        </div>
    </div>
  </nav>
  <?php
  	}
  ?>

<div class="mainpage">
  <div class="row">
   	<div class="col s2"></div>
      <div class="col s8">
  	    <img src="../image/mycard.svg" alt="" class="z-depth-5" style="border-radius:30px;">
      </div>
      <div class="col s2"></div>
  </div>

  <div class="row">
    <div class="col s2"></div>
    <div class="col s8">

      <div class="my_card_font">
      	<?php
        	require('../../Model/db.php');
            	if(isset($_SESSION['userID'])){
                    $userID = $_SESSION['userID'];
                    $result = $conn->prepare("SELECT * FROM `gocard` LEFT JOIN `users` ON `users`.`userID` = `gocard`.`userID` WHERE `users`.userID = :userID");
                    $result ->execute(array(':userID' => $userID));
                    $row = $result->fetch();
           ?>
        <div>
          Card Number: <?php echo $row['gocardno']; ?>
        </div>
        <div>
          Balance: <?php echo $row['balance']; ?>
        </div>
        <?php
			}
		?>
      </div>
    </div>
    <div class="col s2"></div>
  </div>
</div>

<div class="row">
	<div class="col s2"></div>
    
    <div class="col s4">
    <!-- Modal Trigger -->
      <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Register Concession</a>
    
      <form action="../../Controller/pdoCon.php" method="post">
          <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
              <h5>Register Concession</h5> 
                <!-- inputs -->
                <div class="row">
                    <!-- Go Card number -->
                    <div class="row">
                    <?php
        				require('../../Model/db.php');
						if(isset($_SESSION['userID'])){
							$userID = $_SESSION['userID'];
							$result = $conn->prepare("SELECT * FROM `gocard` LEFT JOIN `users` ON `users`.`userID` = `gocard`.`userID` WHERE `users`.userID = :userID");
							$result ->execute(array(':userID' => $userID));
							$row = $result->fetch();
         			 ?>
	                    <div class="input-field col s12"> <i class="material-icons prefix">credit_card</i>
                            <input name="gocardno" type="text" value="<?php echo $row['gocardno']?>" disabled>
                             <input type="hidden"name="gocardno1" value="<?php echo $row['gocardno']?>">
                            <input type="hidden" name="userID" value="<?php echo $row['userID']?>">
                            <label for="gocardno" data-error="wrong" data-success="right">Gocard Number</label>
                        </div>
                     <?php
						}
					 ?>
                        <div class="input-field col s12"> <i class="material-icons prefix">credit_card</i>
                            <input name="conID" type="text" class="validate" required>
                            <label for="conID" data-error="wrong" data-success="right">Concession ID</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12"> <i class="material-icons prefix">view_list</i>
                        	<select name="conType">
                                <option value="" disabled selected>Choose your option</option>
                            	<option value="student">Student</option>
                                <option value="senior">Senior</option>
                                <option value="adult">Adult</option>
                                <option value="child">Child</option>
                            </select> 
                            <label>Concession Type</label>
                        </div>
                        <div class="input-field col s12"> <i class="material-icons prefix">work</i>
                            <input name="organisation" type="text" class="validate" required>
                            <label for="organisation" data-error="wrong" data-success="right">Organisation</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12"> <i class="material-icons prefix">date_range</i>
                            <input name="DOB" type="date" class="validate" title="Date of Birth" required>
                            <label for="DOB" data-error="wrong" data-success="right"></label>
                        </div>
                    </div>            
            </div>
          </div>
          <div class="modal-footer">
	            <input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" name="btnCon" value="Submit">
          </div>
       </form>
	</div>
    
    <div class="col s4">
    <!-- Modal Trigger -->
      <a class="waves-effect waves-light btn modal-trigger" href="#modal2">View Applied Concession</a>
    
      <!-- Modal Structure -->
          <div id="modal2" class="modal modal-fixed-footer">
            <div class="modal-content">
              <h4>Applied Concession</h4>
              <p>
              </p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
            </div>
          </div>
	</div>
    
    <div class="col s2"></div>
</div>
</body>
</html>

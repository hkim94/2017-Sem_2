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

	//Modal trigger and content//
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

	//select input
	$(document).ready(function() {
		$('select').material_select();
	});
    </script>

  </head>

  <body onLoad="concess()">
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
  	    <img src="../image/card_green.svg" alt="" style="width:100%;">
      </div>
      <div class="col s2"></div>
  </div>
</div>

<div class="row">
    <div class="col s1"></div>
    <div class="col s10">

      <div class="my_card_font" style="margin-top:5%;">
      	<?php
        	require('../../Model/db.php');
            	if(isset($_SESSION['userID'])){
                    $userID = $_SESSION['userID'];
                    $result = $conn->prepare("SELECT * FROM `gocard` LEFT JOIN `users` ON `users`.`userID` = `gocard`.`userID` WHERE `users`.userID = :userID");
                    $result ->execute(array(':userID' => $userID));
                    $row = $result->fetch();
           ?>
        <div style="border:1px solid #CCC; padding:5px; margin-bottom:10%;">
          <h6 style="font-weight:bold;">Card Number</h6>
          <p style="text-align:right; margin:0px;"><?php echo $row['gocardno']; ?></p>
        </div>
        <div style="border:1px solid #CCC; padding:5px; margin-bottom:10%;">
          <h6 style="font-weight:bold;">Balance</h6>
		  <p style="text-align:right; margin:0px;">$ <?php echo $row['balance']; ?></p>
        </div>
        <div style="border:1px solid #CCC; padding:5px; margin-bottom:10%;">
          <h6 style="font-weight:bold;">Concession</h6>
		  <p style="text-align:right; margin:0px;"><?php echo $row['conID'];?></p>
        </div>
        <?php
			}
		?>
      </div>
    </div>
    <div class="col s1"></div>
  </div>


<div class="row" style="background-color:#E5E5E5; padding:6%; margin:0px;" id="applybtn">
	<div class="col s1"></div>

    <div class="col s10 center-align">
    <!-- Modal Trigger -->
      <a class="waves-effect waves-light btn modal-trigger" style="background-color:rgb(248, 151, 40);" href="#modal1">Register Concession</a>

      <form action="../../Controller/pdoCon.php" method="post">
          <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
            	<div style="width:100%; border-bottom:thin solid #CCC; margin-bottom:5%;">
                	<h6 style="text-align:right; color:#999">REGISTER CONCESSION</h6>
                </div>
                <!-- inputs -->
                <div class="row">
                    <!-- Go Card number -->
                    <?php
        				require('../../Model/db.php');
						if(isset($_SESSION['userID'])){
							$userID = $_SESSION['userID'];
							$result = $conn->prepare("SELECT * FROM `gocard` LEFT JOIN `users` ON `users`.`userID` = `gocard`.`userID` WHERE `users`.userID = :userID");
							$result ->execute(array(':userID' => $userID));
							$row = $result->fetch();
         			 ?>
	                    <div class="input-field col s12">
                            <input name="gocardno" type="text" value="<?php echo $row['gocardno']?>" disabled>
                            <input type="hidden"name="gocardno1" value="<?php echo $row['gocardno']?>">
                            <input type="hidden" name="userID" value="<?php echo $row['userID']?>">
                            <label for="gocardno" data-error="wrong" data-success="right">Gocard Number</label>
                        </div>
                     <?php
						}
					 ?>
                        <div class="input-field col s12">
                            <input name="conID" type="text" class="validate" pattern="[0-9]{17}">
                            <label for="conID" data-error="wrong" data-success="right">Concession ID</label>
                        </div>
                        <div class="input-field col s12">
                        	<select name="conType" required>
                                <option value="" disabled selected>Choose your option</option>
                            	<option value="student">Student</option>
                                <option value="senior">Senior</option>
                                <option value="adult">Adult</option>
                                <option value="child">Child</option>
                            </select>
                            <label>Concession Type</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="organisation" type="text" class="validate" pattern="[Aa-Zz]{2,50}">
                            <label for="organisation" data-error="wrong" data-success="right">Organisation</label>
                        </div>
                        <div class="input-field col s12">
                            <input name="DOB" type="date" class="validate" title="Date of Birth" required>
                            <label for="DOB" data-error="wrong" data-success="right"></label>
                        </div>
            </div>
          </div>
          <div class="modal-footer">
	            <input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" name="btnCon" value="Submit">
          </div>
       </form>
	</div>
    <div class="col s1"></div>
	</div>
</div>
<div class="row" style="background-color:#E5E5E5; padding:6%; margin:0px;" id="viewbtn">
	<div class="col s1"></div>
	<div class="col s10 center-align">
    <!-- Modal Trigger -->
    <a class="waves-effect waves-light btn modal-trigger" style="background-color:rgb(248, 151, 40);" href="#modal2">View Concession</a>

      <!-- Modal Structure -->
          <div id="modal2" class="modal modal-fixed-footer">
            <div class="modal-content">
            <?php
            	require('../../Model/db.php');
					if(isset($_SESSION['userID'])){
						$userID = $_SESSION['userID'];
							$result = $conn->prepare("SELECT * FROM `gocard` LEFT JOIN `users` ON `users`.`userID` = `gocard`.`userID` WHERE `users`.userID = :userID");
							$result ->execute(array(':userID' => $userID));
							$row = $result->fetch();
             ?>
             	<div style="width:100%; border-bottom:thin solid #CCC">
                	<h6 style="text-align:right;">Applied Concession</h6>
                </div>
                <div style="margin-top:5%; border:1px solid #CCC; padding:5px;">
                	<p style="font-weight:100; margin:0px;">CONCESSION ID</p>
                    <p style="margin:0px; color:rgb(123, 193, 68);"><?php echo $row['conID'];?></p>
                </div>
                <div style="margin-top:5%; border:1px solid #CCC; padding:5px;">
                	<p style="font-weight:100; margin:0px;">CONCESSION TYPE</p>
                	<p style="margin:0px; color:rgb(123, 193, 68);"><?php echo $row['conType'];?></p>
                </div>
                <div style="margin-top:5%; border:1px solid #CCC; padding:5px;">
                	<p style="font-weight:100; margin:0px;">ORGANISATION</p>
                	<p style="margin:0px; color:rgb(123, 193, 68);"><?php echo $row['organisation'];?></p>
                </div>
                <div style="margin-top:5%; border:1px solid #CCC; padding:5px;">
	                <p style="font-weight:100; margin:0px;">DATE OF BIRTH</p>
                	<p style="margin:0px; color:rgb(123, 193, 68);"><?php echo $row['DOB'];?></p>
                </div>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
            </div>
          </div>
          <?php
		   }
		   ?>
	</div>
    <div class="col s1"></div>
    </div>

    <script  type="text/javascript">
		function concess(){
			var conID ='<?php echo $row['conID'];?>';
			if (conID !=""){
				document.getElementById("applybtn").style.display="none";
				document.getElementById("viewbtn").style.display="block";
			}else{
				document.getElementById("applybtn").style.display="block";
				document.getElementById("viewbtn").style.display="none";
			}
		};
	</script>

  </body>
</html>

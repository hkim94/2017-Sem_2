<?php
session_start();

if (!isset($_SESSION['userID'])){
	header("location:../../index.php");
	exit();
}
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
        
        <p style="color:white; font-size:13pt;  text-align:center; background:linear-gradient(to right, rgb(123, 193, 68), rgb(248, 151, 40));">Report Bug</p>
        
        <p style="text-align:center; color:white; padding:5%; font-size:9pt;">
        	You can help us to improve by reporting issues in the page.</br>
        	Please take screen shot and upload it to us.
      	</p>
      </div>

  <?php
  	}
  ?>
      <div class="col s12" style="margin:5%; padding-bottom:5%;">
          <form enctype="multipart/form-data" action="../../Controller/upload_file.php" method="post" id="file_input" runat="server">
            <input type="file" name="uploaded_file" id="uploaded_file" style="border:1px solid rgb(248, 151, 40); margin:10px;" required>
            <input type="submit" value="Upload" id="uploadbtn" style="background-color:rgb(248, 151, 40); color:white; padding:5px; border:none; float:right;">
          </form>
      </div>
      
      <div style="margin:5%;">
      	<img id="prev" src="#" alt="Preview for Image" style="width:100%;"/> 
      </div>
      
      <div style="bottom:0; position:absolute; padding:10px; background-color:rgb(123, 193, 68); width:100%; color:white; text-align:center;">
      	<p style="margin:0px;">Need help? Technical Issues? Contact Us</p>
        <p>admin@go.com.au</p>
      </div>
  </body>
</html>

<script>
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#prev').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}

$("#uploaded_file").change(function() {
	readURL(this);
});
</script>
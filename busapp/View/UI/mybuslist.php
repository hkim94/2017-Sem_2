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
	
	function delete_row(f_BusID){
		$.ajax({
			type:'post',
  			url:'../../Controller/pdoDelete.php',
			data:{
				delete_row:'delete_row',
   				row_id:f_BusID,
				},
				success:function(response) {
					if(response=="success"){
						var row=document.getElementById("row"+id);
						row.parentNode.removeChild(row);
						}
						}
						});
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
            <form action="../../Controller/F_bus_Insert.php" method="post" style="border-bottom:1px solid #D4D4D4;">
            	<label style="font-size:14px; font-weight:bold;">ROUTE CODE</label><br>
                <input type="text" value="<?php echo $user['busno'];?>" disabled style="border:none; width:auto; margin:0px;"> 
            	<input type="hidden" name="busno" value="<?php echo $user['busno'];?>" >
                <input type="hidden" name="userID" value="<?php echo $_SESSION['userID'];?>">
                <button type="submit" style="margin-bottom:3%; border:none; background-color:white; float:right;">
                	<i class="material-icons">favorite_border</i>
                </button>
            </form>
           
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
      <section class="card horizontal" style="margin:5%; width:auto; height:80px;">
      	<div class="card-image" style="background-color:rgb(248, 151, 40); width:20%;">
      		<div class="center-align">
        		<i class="small material-icons" style="color:white; transform: translateY(100%);">directions_bus</i>
        	</div>
      	</div>
        <div class="card-stacked">
        	<div class="card-content" style="padding:15px;">
                <span class="delete" style="cursor:pointer;" id='del_<?php echo $user['f_BusID'];?>'><i class="small material-icons" style="color:rgb(123, 193, 68); float:right;">clear</i></span>
            	<p style="font-size:11pt; font-weight:bold;">Favourite Bus #<?php echo $user['f_BusID'];?></p>
          		<p><?php echo $user['busno'];?></p>
        	</div>
      	</div>
	  </section>
	  <?php
      }
	  ?>
</body>
</html>
<script>
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
   url: '../../Controller/F_bus_Delete.php',
   type: 'POST',
   data: { f_BusID:deleteid },
   success: function(response){

    // Removing row from HTML Table
    $(el).closest('section').css('background','rgb(248, 151, 40)');
    $(el).closest('section').fadeOut(800, function(){ 
     $(this).remove();
    });
   }
  });
 });
});
</script>
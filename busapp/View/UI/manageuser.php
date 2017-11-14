<?php
session_start();
<<<<<<< HEAD

if (!isset($_SESSION['userID'])){
	header("location:../../index.php");
	exit();
}
=======
>>>>>>> 4849ff1d7660638a7b88c1657fa9dc3d8b6a34bd
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<?php
require('../../Model/db.php');
<<<<<<< HEAD
$sql = "SELECT * FROM `login` WHERE `login`.`userID` NOT IN (39)";
=======
$sql = "SELECT * FROM `users` LEFT JOIN `login` ON `users`.`userID` = `login`.`userID`";
>>>>>>> 4849ff1d7660638a7b88c1657fa9dc3d8b6a34bd
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = 0;
?>
<?php
	foreach ($data as $row){
		$count++;
?>
<<<<<<< HEAD
    <div style="margin:10%;">
        <table style="text-align:center;">
            <tr>
                <td>
                    <p style="font-size:10pt; background-color:rgb(123, 193, 68); color:white; padding:5px;">UserID</p>
                    <?php echo $row['userID'];?>
                </td>
                <td>
                    <p style="font-size:10pt; background-color:rgb(123, 193, 68); color:white; padding:5px;">Username</p>
                    <?php echo $row['username'];?>
                </td>
                <td>
                    <span class="delete" style="cursor:pointer;" id='del_<?php echo $row['userID'];?>'><i class="small material-icons" style="color:rgb(123, 193, 68); float:right;">clear</i></span>
                </td>
            </tr>
        </table>
    </div>
    <?php
        }
    ?>
    
    <div style="margin:5%;">
        <a href="../../Controller/pdoLogout.php" style="display:inline-block; float:right; text-decoration:none; color:black;"><i class="material-icons">exit_to_app</i></a>
    </div>
=======
<div style="margin:10%;">
    <table>
        <tr>
            <td>
                <p style="font-size:10pt;">UserID</p>
                <?php echo $row['userID'];?>
            </td>
            <td>
                <p style="font-size:10pt;">F_name</p>
                <?php echo $row['fname'];?>
            </td>
            <td>
                <p style="font-size:10pt;">L_name</p>
                <?php echo $row['lname'];?>
            </td>
            <td>
                <p style="font-size:10pt;">Username</p>
                <?php echo $row['username'];?>
            </td>
            <td>
                <span class="delete" style="cursor:pointer;" id='del_<?php echo $row['userID'];?>'><i class="small material-icons" style="color:rgb(123, 193, 68); float:right;">clear</i></span>
            </td>
        </tr>
    </table>
</div>
<?php
	}
?>

>>>>>>> 4849ff1d7660638a7b88c1657fa9dc3d8b6a34bd
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
  $.ajax({
   url: '../../Controller/Delete_user.php',
   type: 'POST',
   data: { userID:deleteid},
   success: function(response){

    // Removing row from HTML Table
    $(el).closest('tr');
    $(el).closest('tr').fadeOut(800, function(){ 
     $(this).remove();
    });
   }
  });
 });
});
</script>
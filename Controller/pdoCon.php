<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");
?>

<?php
$gocardno = !empty($_POST['gocardno1'])? test_user_input(($_POST['gocardno1'])):null;
$conID = !empty($_POST['conID'])? test_user_input(($_POST['conID'])):null;
$conType = !empty($_POST['conType'])? test_user_input(($_POST['conType'])):null;
$organisation = !empty($_POST['organisation'])? test_user_input(($_POST['organisation'])):null;
$DOB = !empty($_POST['DOB'])? test_user_input(($_POST['DOB'])):null;

try{
	  $query = "update bus.gocard set `conID`= '$conID',`conType`='$conType',`organisation`='$organisation',`DOB`='$DOB' where `gocardno`= '$gocardno'";

	  $stmt = $conn->prepare($query);
	  $stmt->execute();

   	  
	  $URL="http://localhost/busapp/View/UI/mygocard.php";
	  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
	  echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
	 catch(PDOException $e)
	 {
		$error_message = $e->getMessage();	
		?>
		<h1>Rollback ...</h1>
		<p>There was an error in the transaction execution .</p>
		<!-- display the error message -->
		<p>Error message: <?php echo $error_message; ?></p>		
    	<?php
		exit();		
	}
?>

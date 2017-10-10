<?php
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$fname = !empty($_POST['fname'])? test_user_input(($_POST['fname'])):null;
	$lname = !empty($_POST['lname'])? test_user_input(($_POST['lname'])):null;
	$mobile = !empty($_POST['mobile'])? test_user_input(($_POST['mobile'])):null; 
	$email = !empty($_POST['email'])? test_user_input(($_POST['email'])):null;
	$userID = !empty($_POST['userID'])? test_user_input(($_POST['userID'])):null;
	try {
		
		$query = $conn->prepare("UPDATE `users` SET `users`.`fname` = :fname, `users`.`lname` = :lname, `users`.`mobile` = :mobile, `users`.`email` = :email WHERE `users`.`userID` =:userID");
		
		$query->bindParam(':fname', $fname);
		$query->bindParam(':lname', $lname);
		$query->bindParam(':mobile', $mobile);
		$query->bindParam(':email', $email);
		$query->bindParam(':userID', $userID);
		$query->execute();
		
		$URL="http://localhost/busapp/View/UI/myprofile.php";
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
}
?>

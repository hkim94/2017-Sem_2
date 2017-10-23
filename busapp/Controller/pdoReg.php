<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");
?>

<?php
$userID = !empty($_POST['userID'])? test_user_input(($_POST['userID'])):null;
$fname = !empty($_POST['fname'])? test_user_input(($_POST['fname'])):null;
$lname = !empty($_POST['lname'])? test_user_input(($_POST['lname'])):null;
$mobile = !empty($_POST['mobile'])? test_user_input(($_POST['mobile'])):null; 
$email = !empty($_POST['email'])? test_user_input(($_POST['email'])):null;
$gocardno = !empty($_POST['gocardno'])? test_user_input(($_POST['gocardno'])):null;
$username =!empty($_POST['username'])? test_user_input(($_POST['username'])):null;
$password = !empty($_POST['password'])? test_user_input(($_POST['password'])):null;
$password_hash = base64_encode(hash('sha512', $password, '#$^!@WQASDASsdas53'));

try {	  
 	  $conn->beginTransaction();
	  $query = $conn->prepare("INSERT INTO users (fname, lname, mobile, email) VALUES (:fname, :lname, :mobile, :email)");
	  $query->bindParam(':fname', $fname);
	  $query->bindParam(':lname', $lname);
	  $query->bindParam(':mobile', $mobile);
	  $query->bindParam(':email', $email);
	  $query->execute();
	  
	  $userID= $conn->lastInsertId();
	  $query = $conn->prepare("INSERT INTO gocard (gocardno, userID) VALUES (:gocardno, :userID)");
	  $query->bindParam(':gocardno', $gocardno);
	  $query->bindParam(':userID', $userID);
	  $query->execute();
	  
	  $query = $conn->prepare("INSERT INTO login (username, password, userID) VALUES (:username, :password, :userID)");
	  $query->bindParam(':username', $username);
	  $query->bindParam(':password', $password_hash);
	  $query->bindParam(':userID', $userID);
	  $query->execute();
	  $conn->commit();
	  $URL="http://localhost/busapp/index.php";
		echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	}
	 catch(PDOException $e)
	 {
		$conn->rollBack();	
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

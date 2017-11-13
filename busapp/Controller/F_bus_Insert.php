 <?php
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

$busno = !empty($_POST['busno'])? test_user_input(($_POST['busno'])):null;
$userID = !empty($_POST['userID'])? test_user_input(($_POST['userID'])):null;

$query = $conn->prepare("INSERT INTO favourite_bus (busno, userID) VALUES (:busno, :userID)");
$query->bindParam(':busno', $busno);
$query->bindParam(':userID', $userID);
$query->execute();
$URL="../View/UI/mybuslist.php";
		echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
?>
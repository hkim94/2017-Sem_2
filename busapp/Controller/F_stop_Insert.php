 <?php
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

$stopID = !empty($_POST['stopID'])? test_user_input(($_POST['stopID'])):null;
$STREET_NAME = !empty($_POST['STREET_NAME'])? test_user_input(($_POST['STREET_NAME'])):null;
$SUBURB = !empty($_POST['SUBURB'])? test_user_input(($_POST['SUBURB'])):null;
$DESCRIPTION = !empty($_POST['DESCRIPTION'])? test_user_input(($_POST['DESCRIPTION'])):null;

$query = $conn->prepare("INSERT INTO favourite_bus (busno, userID) VALUES (:busno, :userID)");
$query->bindParam(':stopID', $stopID);
$query->bindParam(':STREET_NAME', $STREET_NAME);
$query->bindParam(':SUBURB', $SUBURB);
$query->bindParam(':DESCRIPTION', $DESCRIPTION);
$query->execute();
$URL="http://localhost/busapp/View/UI/mystop.php";
		echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
?>
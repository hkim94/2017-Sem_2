 <?php
require_once("../Model/db.php");
$sql = "SELECT `SUBURB` FROM `stop` WHERE  `stopID` ='22'";
$query = $conn->prepare($sql);
?>
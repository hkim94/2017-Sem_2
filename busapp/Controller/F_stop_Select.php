 <?php
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

$LATITUDE = !empty($_POST['LATITUDE'])? test_user_input(($_POST['LATITUDE'])):null;
$LONGITUDE = !empty($_POST['LONGITUDE'])? test_user_input(($_POST['LONGITUDE'])):null;
echo $LATITUDE;
echo $LONGITUDE;

$sql = "SELECT * FROM `stop` WHERE `stopID` = 2";
$sth = $conn->prepare($sql);
$result= $sth->execute();
$result = $sth->fetchAll();
var_dump($result);
?>
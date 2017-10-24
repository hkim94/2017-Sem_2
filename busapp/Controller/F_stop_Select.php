 <?php
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

$LATITUDE = !empty($_POST['LATITUDE'])? test_user_input(($_POST['LATITUDE'])):null;
$LONGITUDE = !empty($_POST['LONGITUDE'])? test_user_input(($_POST['LONGITUDE'])):null;

$sql = "SELECT * FROM `stop` WHERE `stopID` = '22'";
foreach ($conn->query($sql) as $row){
	print $row['stopID'];
	print $row['SUBURB'];
}
/* GET lat and log value
	compare with lat and log from database
	select all stops that meet condition
*/
?>

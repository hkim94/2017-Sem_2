<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

$LATITUDE = !empty($_POST['LATITUDE'])? test_user_input(($_POST['LATITUDE'])):null;
$LONGITUDE = !empty($_POST['LONGITUDE'])? test_user_input(($_POST['LONGITUDE'])):null;

$sql = "SELECT * FROM `stop` WHERE LATITUDE - $LATITUDE <= 0.000005 AND LONGITUDE - $LONGITUDE <= 0.000005 LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
	foreach ($data as $val){
?>
	<div style="width:100%;">
		<div style="padding:3%;">
            <p style="color:white; margin:0px; padding:0px;">CURRENT LOCATION OF BUS</p>
<<<<<<< HEAD
            <input type="hidden" name="stopID1" value="<?php echo $val['stopID'];?>" id="stopID1">
=======
            <input type="hidden" name="stopID" value="<?php echo $val['stopID'];?>" id="stop1">
>>>>>>> abf4e5091ffdb369ff77912717d8806ae28d2035
            <label style="color:black;">Street</label>
            <input type="text" value="<?php echo $val['STREET_NAME'];?>" style="color:#E3E1E1;" disabled>
            <label style="color:black;">Suburb:</label>
            <input type="text" value="<?php echo $val['SUBURB'];?>" style="color:#E3E1E1;" disabled>
            <label style="color:black;">Description:</label>
            <input type="text" value="<?php echo $val['DESCRIPTION'];?>" style="color:#E3E1E1;" disabled>
        </div>
	</div>
<?php
	}
?>

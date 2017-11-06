<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

$busNo = !empty($_POST['busNo'])? test_user_input(($_POST['busNo'])):null;
$sql = "SELECT LATITUDE, LONGITUDE FROM `location_bus` WHERE busNo=$busNo IN (SELECT * FROM `stop` WHERE LATITUDE - LATITUDE <= 0.00005 AND LONGITUDE - LONGITUDE <= 0.00005 LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
	foreach ($data as $val){
?>    
<div style="border:2px groove white; padding:10px;">
	<p style="color:white; margin:0px; padding:0px;">CURRENT LOCATION OF BUS</p>
    <div>
        <p><?php echo $val['STREET_NAME']?></p>
        <p><?php echo $val['SUBURB'];?></p>
        <p><?php echo $val['DESCRIPTION'];?></p>
    </div>
</div>

<?php
	}
?>
</form>
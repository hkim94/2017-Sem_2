<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

$busNo = !empty($_GET['busNo'])? test_user_input(($_GET['busNo'])):null;
$sql = "SELECT LATITUDE, LONGITUDE FROM `location_bus` WHERE busNo=$busNo";
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
        <p><?php echo $val['LATITUDE']?></p>
        <p><?php echo $val['LONGITUDE'];?></p>
    </div>
</div>

<?php
	}
?>
</form>
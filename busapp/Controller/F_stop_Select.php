<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

$LATITUDE = !empty($_POST['LATITUDE'])? test_user_input(($_POST['LATITUDE'])):null;
$LONGITUDE = !empty($_POST['LONGITUDE'])? test_user_input(($_POST['LONGITUDE'])):null;

$sql = "SELECT * FROM `stop` WHERE LATITUDE - $LATITUDE <= 0.00000005 AND LONGITUDE - $LONGITUDE <= 0.00000005";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
	foreach ($data as $val){
?>
<form method="post" action="../../Controller/F_stop_Insert.php">
	<div style="width:100%; background-color:rgb(248, 151, 40); border-bottom:4px solid white;">
		<div style="padding:3%;">
        <input type="hidden" name="userID" id="userID" value="<?php echo $_SESSION['userID'];?>">
        <input type="text" name="stopID" id="stopID" value="<?php echo $val['stopID'];?>" disabled>
        <input type="hidden" name="stopID" id="stopID" value="<?php echo $val['stopID'];?>">
        <label style="color:black;">Street</label>
        <input type="text" value="<?php echo $val['STREET_NAME'];?>" style="color:#E3E1E1;" disabled>
        <input type="hidden" name="STREET_NAME" value="<?php echo $val['STREET_NAME'];?>">
        <label style="color:black;">Suburb:</label>
        <input type="text" value="<?php echo $val['SUBURB'];?>" style="color:#E3E1E1;" disabled>
        <input type="hidden" name="SUBURB" value="<?php echo $val['SUBURB'];?>">
        <label style="color:black;">Description:</label>
        <input type="text" value="<?php echo $val['DESCRIPTION'];?>" style="color:#E3E1E1;" disabled>		
        <input type="hidden" name="DESCRIPTION" value="<?php echo $val['DESCRIPTION'];?>">
        <input type="hidden" name="insert">
        <input type="submit" class="waves-effect waves-light btn" value="Add to list" style="color:black; width:100%; background-color:white;">
        </div>
	</div>
</form>
<?php
	}
?>
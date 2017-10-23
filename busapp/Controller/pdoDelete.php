<?php
require_once("../Model/db.php");
?>

<?php
if(isset($_REQUEST['f_BusID'])){
    $f_BusID = $_REQUEST['f_BusID'];
    $sql = "DELETE FROM `favourite_bus` WHERE `f_BusID` = :f_BusID";
    $query = $conn->prepare($sql);
    $query->execute(array(":f_BusID" => $f_BusID));
}

if(isset($_REQUEST['delete_stopid'])){
    $BookID = $_REQUEST['delete_stopid'];
    $sql = "DELETE FROM `favourite_stop` WHERE `f_StopID` = :f_StopID";
    $query = $conn->prepare($sql);
    $query->execute(array(":f_StopID" => $f_StopID));
	header("location:http://localhost/busapp/View/UI/mystoplist.php");
}

if(isset($_REQUEST['delete_alertid'])){
    $BookID = $_REQUEST['delete_alertid'];
    $sql = "DELETE FROM `alert` WHERE `alertID` = :alertID";
    $query = $conn->prepare($sql);
    $query->execute(array(":alertID" => $alertID));
	header("location:http://localhost/busapp/View/UI/alert.php");
}

?>
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
?>
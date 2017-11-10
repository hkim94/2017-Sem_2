 <?php
require_once("../Model/db.php");
?>

<?php
    $f_BusID = $_POST['f_BusID'];
    $sql = "DELETE FROM `favourite_bus` WHERE `f_BusID` = :f_BusID";
    $query = $conn->prepare($sql);
    $query->execute(array(":f_BusID" => $f_BusID));
?>
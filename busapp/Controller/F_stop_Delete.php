 <?php
require_once("../Model/db.php");
?>

<?php
    $f_StopID = $_POST['f_StopID'];
    $sql = "DELETE FROM `favourite_stop` WHERE `f_StopID` = :f_StopID";
    $query = $conn->prepare($sql);
    $query->execute(array(":f_StopID" => $f_StopID));
?>
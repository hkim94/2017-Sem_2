 <?php
require_once("../Model/db.php");
?>

<?php
    $userID = $_POST['userID'];
    $sql = "DELETE FROM `login` WHERE `userID` = :userID"; 
    $query = $conn->prepare($sql);
    $query->execute(array(":userID" => $userID));
?>
 <?php
require_once("../Model/db.php");
?>

<?php
    $userID = $_POST['userID'];
<<<<<<< HEAD
    $sql = "DELETE FROM `login` WHERE `userID` = :userID"; 
=======
    $sql = "DELETE FROM `users` WHERE `userID` = :userID";
>>>>>>> 4849ff1d7660638a7b88c1657fa9dc3d8b6a34bd
    $query = $conn->prepare($sql);
    $query->execute(array(":userID" => $userID));
?>
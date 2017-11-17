 <?php
require_once("../Model/db.php");
?>

<?php
     $userID = $_POST['userID'];
	  $sql = "DELETE `login`, `users` FROM `login` INNER JOIN `users` ON `login`.`userID` = `users`.`userID` WHERE `login`.`userID`= $userID AND `users`.`userID`= $userID";
	  $query = $conn->prepare($sql);
	  $query->execute();
?>
<?php
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");
if(isset($_POST['insert'])){
	$stopID = !empty($_POST['stopID'])? test_user_input(($_POST['stopID'])):null;
	$userID = !empty($_POST['userID'])? test_user_input(($_POST['userID'])):null;
	
	$query = $conn->prepare("INSERT INTO favourite_stop (stopID, userID) VALUES ($stopID, $userID)");
	$query->execute();
	$URL="../View/UI/mystop.php";
			echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
			echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
?>
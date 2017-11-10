<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

$stopID1 = !empty($_POST['stopID1'])? test_user_input(($_POST['stopID1'])):null;
$stopID2 = !empty($_POST['stopID2'])? test_user_input(($_POST['stopID2'])):null;

$sql = "SELECT SUM(`duration`) AS total FROM `schedule` WHERE `stopID` BETWEEN $stopID1 AND $stopID2 LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$result = $data[0];
echo $result['total'];
echo " Mins";
?>

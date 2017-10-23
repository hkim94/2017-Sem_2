<?php
include("../Model/db.php");

$f_BusID = $_POST['f_BusID'];

// Delete record
$query = "DELETE FROM favourite_bus WHERE f_BusID".$f_BusID;
mysql_query($query);

echo 1;
?>

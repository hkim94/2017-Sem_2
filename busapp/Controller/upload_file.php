<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php

  if(!empty($_FILES['uploaded_file'])){
	$path = "uploads/";
	$path_upload = $path. basename($_FILES["uploaded_file"]["name"]);
	
		if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path_upload)) {
			echo "<div style=\"text-align:center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding:10px; width:90%; border:4px double rgb(122, 193, 67); font-size:12pt;\">
			The file ". basename($_FILES['uploaded_file']['name'])." has been uploaded</div>";
			echo '<meta http-equiv="refresh" content="3; URL=../View/UI/contact.php">';
			
		} else {
			echo "<div style=\"text-align:center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding:10px; width:90%; border:4px double rgb(122, 193, 67); font-size:12pt;\">
			There was an error uploading the file, please try again!</div>";
			echo '<meta http-equiv="refresh" content="3; URL=../View/UI/contact.php">';
		}
  }
?>
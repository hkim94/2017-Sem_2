<?php
	session_unset();
	session_destroy();
	header("location:http://localhost/busapp/index.php");
	exit;
?>
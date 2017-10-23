<?php
	session_start();
	session_unset();
	session_destroy();
	$URL="http://localhost/busapp/index.php";
		echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		exit;
?>
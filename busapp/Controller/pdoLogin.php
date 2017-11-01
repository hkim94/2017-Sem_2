<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");
?>


<?php

if(isset($_POST['login'])){
	$username = !empty($_POST['username'])? test_user_input(($_POST['username'])):null;
	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])):null;
	$password_hash = base64_encode(hash('sha512', $password, '#$^!@WQASDASsdas53'));
	
	$stmt = $conn->prepare('SELECT userID, username, password FROM login WHERE username = :username');
	$stmt-> execute(array(":username" => $username));
	$results = $stmt->fetch(PDO::FETCH_ASSOC);
	$_SESSION['userID'] = $results['userID'];
	
	if ($password_hash != $results['password']){
		?>
		echo "Error: Your Password is incorrect.<br>";
        <?php
	}
	else if($username != $results['username']){
		echo "Error: Your Username is incorrect.<br>";
	}else{
		$URL="http://localhost/busapp/View/UI/myprofile.php";
		echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		exit;
		}
	}	
?>
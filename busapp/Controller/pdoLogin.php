<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
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
		echo "<div style=\"text-align:center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding:10px; width:90%; border:4px double rgb(122, 193, 67);\">Error: Please check your input</div>";
		echo '<meta http-equiv="refresh" content="3; URL=../index.php">';
	}
	
	else if($username != $results['username']){
		echo "<div style=\"text-align:center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding:10px; width:90%; border:4px double rgb(122, 193, 67);\">Error: Please check your input<br></div>";
		echo '<meta http-equiv="refresh" content="3; URL=../index.php">';
	
	}else{
		$URL="../View/UI/myprofile.php";
		echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		exit;
	}
}	
?>
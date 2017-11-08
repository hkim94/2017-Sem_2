<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

$busNo = !empty($_GET['busNo'])? test_user_input(($_GET['busNo'])):null;

if(!isset($busNo)){
		echo "Please provide bus number!";
}else{

$sql = "SELECT * FROM `location_bus` WHERE busNo=$busNo";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
	foreach ($data as $val){
?>    
<div style="border:2px groove white; padding:10px;" id="data_stop">
	<form>
    	<input type="hidden" id="LATITUDE" name="LATITUDE" value="<?php echo $val['LATITUDE']?>">
        <input type="hidden" id="LONGITUDE" name="LONGITUDE" value="<?php echo $val['LONGITUDE'];?>">
        <p style="color:white; text-align:center;">Bus <?php echo $val['busNo'];?> has been tracked successfully!</p>
    	<input type="button" style="margin-top:3%; padding-top:2%; padding-bottom:2%; background-color:rgb(123, 193, 68); color:white; border-radius:5px; width:100%;" value="VIEW DETAIL" onClick="findStop_bus()">
    </form>
	
</div>

<?php
	}
}
?>

<script>
function findStop_bus(){
	  $.ajax({
	   url:'../../Controller/Find_Stop_close.php',
	   data:{
		   LATITUDE: $("#LATITUDE").val(),
		   LONGITUDE:$("#LONGITUDE").val()
	   },
	   type: 'POST',
	   success: function (data) {
		   $("#data_stop").html(data);
	   }
	});
}
</script>
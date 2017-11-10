<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

<<<<<<< HEAD:busapp/Controller/track_Select.php
$busNo = !empty($_POST['busNo'])? test_user_input(($_POST['busNo'])):null;
$sql = "SELECT * FROM `bus` WHERE busNo=$busNo";
=======
$stopID = !empty($_POST['stopID'])? test_user_input(($_POST['stopID'])):null;
$sql = "SELECT SUM(`duration`) FROM `schedule` WHERE `stopID` BETWEEN '2' AND '395'";
>>>>>>> abf4e5091ffdb369ff77912717d8806ae28d2035:busapp/Controller/Get_route.php
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $val){
    $routeNo = $val['routeNo'];
}

$sql2 = "SELECT `stop`.`stopID`, `stop`.`STREET_NAME`, `stop`.`SUBURB`, `stop`.`DESCRIPTION` FROM `stop` LEFT JOIN `schedule` ON `stop`.`stopID` = `schedule`.`stopID`
WHERE `schedule`.`routeNo` = $routeNo";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

	foreach ($data2 as $val){
?>
<<<<<<< HEAD:busapp/Controller/track_Select.php
	<div class="row" style="margin-bottom:0px; margin-top:2%; padding-bottom:50px;">
    <div class="col s1"></div>
    <div class="col s2">
       <div style="background-color:rgb(248,151,40); color:white; text-align:center;">
         <?php echo $val['stopID'];?>
       </div>
    </div>
    <div class="col s1">
      <div style="width:10px; height:10px; border-radius:100%; border:2px solid rgb(248,151,40);">
      </div>
    </div>
    <div class="col s7" style="font-size:9pt;">
      <div style="margin-bottom:3px;">
        <p style="color:rgb(248,151,40); margin-top:0px; margin-bottom:0px;">STREET:</p> <?php echo $val['STREET_NAME'];?>
      </div>
      <div style="margin-bottom:3px;">
        <p style="color:rgb(248,151,40); margin-top:0px; margin-bottom:0px;">SUBURB:</p> <?php echo $val['SUBURB'];?>
      </div style="margin-bottom:3px;">
      <div>
        <p style="color:rgb(248,151,40); margin-top:0px; margin-bottom:0px;">DETAIL:</p> <?php echo $val['DESCRIPTION'];?>
      </div>
=======
<?php
	foreach ($data as $val){
?>
	<div class="row">
    	<div class="col s1"></div>
          <div class="col s10">
              <table>
                <tr>
                    <td>
                        <?php echo $val['duration'];?>
                    </td>
                </tr>
              </table>
          </div>
          <div class="col s1"></div>
>>>>>>> abf4e5091ffdb369ff77912717d8806ae28d2035:busapp/Controller/Get_route.php
    </div>
    <div class="col s1"></div>
  </div>
<?php
	}
?>

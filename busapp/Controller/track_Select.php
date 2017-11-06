<?php
session_start();
require_once("../Model/db.php");
require_once("../Model/pdoFunction.php");

$LATITUDE = !empty($_POST['LATITUDE'])? test_user_input(($_POST['LATITUDE'])):null;
$LONGITUDE = !empty($_POST['LONGITUDE'])? test_user_input(($_POST['LONGITUDE'])):null;

$sql = "SELECT * FROM `stop` WHERE LATITUDE - $LATITUDE <= 0.00001 AND LONGITUDE - $LONGITUDE <= 0.00001";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
	foreach ($data as $val){
?>
	<div class="row">
    	<div class="col s1"></div>
          <div class="col s10">
              <table>
                <tr>
                    <td>
                        <?php echo $val[''];?>
                    </td>
                </tr>
              </table>
          </div>
          <div class="col s1"></div>
    </div>
		
<?php
	}
?>
</form>
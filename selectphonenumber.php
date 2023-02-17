<?php
require "connect.php";

if (isset($_GET["Phone_Number"]))
{
    $strPhone_Number= $_GET["Phone_Number"];
require "connect.php";
$sql = "SELECT * FROM customer where Phone_Number = ?";
$params = array($strPhone_Number);
$stmt = $conn->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<table width="300" border="1">
  <tr>
  <th width="325">รหัสลูกค้าสมาชิก</th>
    <td width="240"><?php echo $result["Customer_ID"]; ?></td>
  </tr>
  <tr>
  <th width="130">ชื่่อ</th>
    <td><?php echo $result["First_Name"]; ?></td>
  </tr>
  <tr>
  <th width="130">นามสกุล</th>
    <td><?php echo $result["Last_Name"]; ?></td>
  </tr>
  <tr>
  <th width="130">เบอร์โทร</th>
    <td><?php echo $result["Phone_Number"]; ?></td>
  </tr>
  </table>
<?php
$conn = null;
}
?>

<html> <head>
    <title> Display Selected Customer Information</title>
</head>
<body>

<?php
if (isset($_GET["Menu_ID"]))
{
    $strFood_ID= $_GET["Menu_ID"];
}
require "connect.php";
$sql = "SELECT * FROM food,menu where Menu_ID = ?";
$params = array($strMenu_ID);
$stmt = $conn->prepare($sql);
$stmt->execute($params);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<table width="300" border="1">
  <tr>
    <th width="325">รหัสลูกค้า</th>
    <td width="240"><?php echo $result["Food_Name"]; ?></td>
  </tr>

  <tr>
    <th width="130">รายละเอียด</th>
    <td><?php echo $result["Food_Description"]; ?></td>
  </tr>
 

  <tr>
    <th width="130">เมนู</th>
    <td><?php echo $result["Menu_ID"]; ?></td>
  </tr>


  <tr>
    <th width="130">ราคา</th>
    <td><?php echo $result["Food_Price"]; ?></td>
  </tr>

 
  </table>
<?php
$conn = null;
?>
</body>
</html>
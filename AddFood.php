<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food</title>
</head>
<body>
    <h1>Add Food</h1>
    <form action="AddFood.php" method="POST">
        <input type="text" placeholder="กรุณาใส่รหัสอาหาร" name="Food_ID"/>
        <br><br>
        <input type="text" placeholder="กรุณาใส่ชื่อรายการอาหาร" name="Food_Name"/>
        <br><br>
        <input type="text" placeholder="กรุณาใส่ราคา" name="Food_Price"/>
        <br><br>
        <textarea name="Food_Description" rows="4" cols="50" placeholder="กรุณาใส่รายละเอียดรายการอาหาร"></textarea>
        <br><br>
        <input type="text" placeholder="กรุณาใส่เมนูประเภทอาหาร" name="Menu_ID"/>
        <br><br>
        <input type="submit">
    </form>
</body>
</html>

<?php
if(!empty($_POST['Food_ID']) && !empty($_POST['Food_Name']) && !empty($_POST['Food_Price']) && !empty($_POST['Food_Description']) && !empty($_POST['Menu_ID'])):
    require 'connect.php';
    $sql_insert ="insert into food values(:Food_ID, :Food_Name, :Food_Description, :Food_Price, :Menu_ID)";

    $stmt = $conn->prepare($sql_insert);
    $stmt->bindParam(':Food_ID',$_POST['Food_ID']);
    $stmt->bindParam(':Food_Name',$_POST['Food_Name']);
    $stmt->bindParam(':Food_Description',$_POST['Food_Description']);
     $stmt->bindParam(':Food_Price',$_POST['Food_Price']);
    $stmt->bindParam(':Menu_ID',$_POST['Menu_ID']);

    if($stmt->execute()):
        $message ='Suscessfully add new food';
    else:
        $message ='Fail to add new food';
    endif;
    echo $message;
    $conn = null;
    endif;
?>
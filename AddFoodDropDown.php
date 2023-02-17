<?php
$sql_select="select"
<body>
    <h1>Add Food</h1>
    <form action="AddFoodDropDown.php" method="POST">
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
        <label>Select a Food</label>
        <select name="Food_ID">
            <?php
            while ($cc =$stmt s->fetch(PDO-FETCH_ASSOC)):
                ?>
                <option value="<
        <input type="submit">
    </form>
</body>
</html>

<?php
if(!isset($_POST['Food_ID']) && !isset($_POST['Food_Name']) && !isset($_POST['Food_Price']) && !isset($_POST['Food_Description']) && !isset($_POST['Menu_ID'])):
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
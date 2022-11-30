<?php

require('dbconnect.php');

$name = $_POST["Name"];
$roomnum = $_POST["Room_No"];

$sql = "DELETE FROM customer WHERE Name='$name'";
$result = mysqli_query($connect,$sql);
if($result){
    echo "<br/>";
    echo "ล้างข้อมูลลูกค้าเรียบร้อย";
    echo "<br/>";
}else{
    echo mysqli_errors($connect);
}

$sql1 = "UPDATE room SET Avaliable_state='Y' WHERE Room_no='$roomnum'";
$result1 = mysqli_query($connect,$sql1);
if($result1){
    echo "<br/>";
    echo "อัปเดตสถานะห้องว่างเรียบร้อย สามารถกดออกจากหน้านี้ได้เลย";
    echo "<br/>";
}else{
    echo mysqli_errors($connect);
}

?>
<?php

require('dbconnect.php');

$name = $_POST["Name"];
$tel = $_POST["Tel"];
$email = $_POST["Email"];
$idpp = $_POST["IDPP"];
$checkindate = $_POST["CheckInDate"];
$checkoutdate = $_POST["CheckOutDate"];
$roomnum = $_POST["Room_No"];

$sql = "INSERT INTO customer(Name,Tel,Email,IDPP) VALUES('$name','$tel','$email','$idpp')";
$result = mysqli_query($connect,$sql);
if($result){
    echo "<br/>";
    echo "บันทึกข้อมูลลูกค้าเรียบร้อย";
    echo "<br/>";
}else{
    echo mysqli_errors($connect);
}

$sql2 = "INSERT INTO customer_timeline(Room_no,IDPP,RID,CheckIn_date,CheckOut_date,rCheckIn_date) VALUES('$roomnum','$idpp',NULL,NULL,'$checkoutdate','$checkindate')";
$result2 = mysqli_query($connect,$sql2);
if($result2){
    echo "<br/>";
    echo "บันทึกข้อมูลการจองห้องเรียบร้อย";
    echo "<br/>";
}else{
    echo mysqli_errors($connect);
}

$sql3 = "UPDATE room SET Avaliable_state='R' WHERE Room_no='$roomnum'";
$result3 = mysqli_query($connect,$sql3);
if($result3){
    echo "<br/>";
    echo "อัปเดตสถานะการจองห้องเรียบร้อย สามารถกดออกจากหน้านี้ได้เลย";
}else{
    echo mysqli_errors($connect);
}

?>
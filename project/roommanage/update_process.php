<?php
include('../connecthotel.php');
print_r($_POST);
$bed = "T$_POST[t]Q$_POST[q]";
echo $bed."<br>";
$sql = "UPDATE Room_Description SET Price = $_POST[price], Room_cap =$_POST[cap],Bed_type = '$bed', Bathroom = '$_POST[br]',Ventilation ='$_POST[ven]',TV = '$_POST[tv]',Fridge = '$_POST[frid]' WHERE Description_no = '$_POST[dno]'";
echo $sql;
$conn->query($sql);
header('location:room_manage.php');
?>
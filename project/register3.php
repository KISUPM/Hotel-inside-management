<?php
include('connecthotel.php');
session_start();
echo "<p>check ID of new employee</p>";

if ($_SESSION['reg']['netype']=="I"){
    $idpp = $_SESSION['reg']['neID'];
}else{
    $idpp = $_SESSION['reg']['nePP'];
}

$sql = "SELECT * FROM Employee WHERE ID ='$idpp' OR Passport = '$idpp'";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($query);
echo $idpp;
if (empty($result)){
    echo "<p style='color:green'>IDPP not found in database, Can register new employee</p>";
    header("location:summaryinfo.php");
}else{
    $_SESSION['reg']['error']= "ID/Passport ได้ลงทะเบียนแล้ว, ไม่สามารถลงทะเบียนซ้ำได้";
    header("location:register1.php");
}

?>
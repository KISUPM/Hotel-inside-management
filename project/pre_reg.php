<?php
include('connecthotel.php');
session_start();
$_SESSION['people']=null;
if (!empty($_SESSION['username'])){
    $sql = "SELECT Level FROM Employee NATURAL JOIN Account WHERE Username = '{$_SESSION['account']['username']}' ";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_row($query);
    $lv = $result[0];

    if ($lv>=2){
        // session_destroy();
        header('location:register1.php');
    }
    else{
        $_SESSION['res'] = 'ไม่สามารถลงทะเบียนได้เนื่องจากระดับพนักงานไม่สูงพอ';
        header('location:memp.php');
    }
}
header("location:register1.php");
?>
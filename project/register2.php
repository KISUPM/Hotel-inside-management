<?php
include('connecthotel.php');
session_start();

$_SESSION['reg']['nename'] = $_POST['nename'];
$_SESSION['reg']['netel'] = $_POST['netel'];
$_SESSION['reg']['neemail'] = $_POST['neemail'];
$_SESSION['reg']['nebod'] = $_POST['nebod'];
if ($_POST['ne-id-type']==="I"){
    $_SESSION['reg']['neID'] = $_POST['neID'];
    $_SESSION['reg']['nePP'] = NULL;
}else{    
    $_SESSION['reg']['nePP'] = $_POST['nePP'];
    $_SESSION['reg']['neID'] = NULL;
}
$_SESSION['reg']['netype'] =$_POST['ne-id-type'];

$_SESSION['reg']['neAddress'] = $_POST['neAddress'];
$_SESSION['reg']['nelevel'] = $_POST['nelevel'];
$_SESSION['reg']['rename'] = $_POST['rename'];
$_SESSION['reg']['retel'] = $_POST['retel'];
$_SESSION['reg']['reemail'] = $_POST['reemail'];
$_SESSION['reg']['retype'] = $_POST['re-id-type'];
$_SESSION['reg']['reAddress'] = $_POST['reAddress'];
// print_r($_POST);
$sql="SELECT Level FROM Employee NATURAL JOIN Account WHERE Username = '{$_SESSION['account']['username']}' ";
echo $sql;
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_row($query);
$reg = $result[0];

if ($reg > $_SESSION['reg']['nelevel']){
    header('location:register3.php');
    $_SESSION['reg']['error'] =  "";
    echo "higher level = can register";
}
else{
    $_SESSION['reg']['error'] =  "สามารถลงทะเบียนให้ได้เฉพาะพนักงานระดับต่ำกว่า";
    echo "lower level = can't register";
    header('location:register1.php');
}
?>
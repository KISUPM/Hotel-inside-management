<?php
session_start();
include('connecthotel.php');
$email = $_SESSION['email'];
$idpp = $_SESSION['idpp'];
if(!empty($_POST['pw1'])){
    $pw = md5($_POST['pw1']);
    $sql = "UPDATE Account SET `Password` = '$pw' WHERE idpp = '$idpp'";
}elseif(!empty($_POST['pin1'])){
    $pin = $_POST['pin1'];
    $sql = "UPDATE Account SET PIN = '$pin' WHERE idpp = '$idpp'";
}
if($conn->query($sql)==true){
    header('location:repw5.php');
}else{
    $_SESSION['error']="unknow error occur";
    // header('location:repw1.php');
}
?>
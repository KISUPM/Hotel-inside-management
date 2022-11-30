<?php
include('connecthotel.php');
session_start();
$sql = "SELECT Level FROM Employee Natural Join Account WHERE Username = '{$_SESSION['account']['username']}' ";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($query);

$index = $_SESSION['index'] = $_POST['index'];
$person = $_SESSION['people'][$index];
echo "index = ".$index . "<br>";
echo print_r($person) . "<br>";
if(empty($result) || $result['Level']<= $person[5]){
    $_SESSION['res'] = 'can\'t delete employee : ต้องมีระดับสูงกว่าจึงจะสามารถลบชื่อพนักงานได้';
    print_r($result);
    echo "can't delete";
    header('location:memp.php');
}else{
    $sql = "DELETE FROM Employee WHERE EID = '{$_SESSION['people'][$index][0]}'";
    echo $sql;
    $_SESSION['res'] = "$person[1] ถูกลบแล้ว";
    echo "delete success";
    if($conn->query($sql)===true){
        header("location:memp.php");
    }else{
        echo "ERROR!";
    }   
}
?>
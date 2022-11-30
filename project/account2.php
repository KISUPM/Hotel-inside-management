<?php
include('connecthotel.php');
session_start();
$_SESSION['reg']['username'] = $_POST['username'];
$_SESSION['reg']['pw'] = $_POST['pw'];
$_SESSION['reg']['pin'] = $_POST['pin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM Account WHERE Username = '{$_SESSION['reg']['username']}'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);
    if(!empty($result)){
        echo "username นี้มีผู้ใช้แล้ว";
        $_SESSION['reg']['error'] = "username นี้มีผู้ใช้แล้ว";
        print_r($result);
        header('location:account1.php');
    }
    else{
        // print_r($_SESSION['reg']);
        $eid = $_SESSION['reg']['eid'];
        $neid = $_SESSION['reg']['neID'];
        $nepp = $_SESSION['reg']['nePP'];
        $netype = $_SESSION['reg']['netype'];
        $nename = $_SESSION['reg']['nename'];
        $netel = $_SESSION['reg']['netel'];
        $neemail = $_SESSION['reg']['neemail'];
        $level = $_SESSION['reg']['nelevel'];
        $address = $_SESSION['reg']['neAddress'];
        $dob = $_SESSION['reg']['nebod'];

        $rename = $_SESSION['reg']['rename'];
        $retel = $_SESSION['reg']['retel'];
        $reemail = $_SESSION['reg']['reemail'];
        $readdress = $_SESSION['reg']['reAddress'];

        $username = $_SESSION['reg']['username'];
        $pw = md5($_SESSION['reg']['pw']);
        $pin = $_SESSION['reg']['pin'];

        // insert to employee
        $sql = "INSERT INTO EMPLOYEE VALUES('$eid','$neid','$nepp','$netype','$nename','$netel','$neemail','$level','$address','$dob');";
        // echo "<br>". $sql . "<br>";
        if ($conn->query($sql)==false){
            $_SESSION['reg']['error'] = 'ลงทะเบียนไม่สำเร็จ';
            header('location:register1.php');
        }else{
            $p1 = 1;
        }
        // insert to account
        $sql = "INSERT INTO Account VALUES('$eid','$username','$pw','$pin');";
        // echo $sql . "<br>";
        if ($conn->query($sql)==false){
            $_SESSION['reg']['error'] = 'ลงทะเบียนไม่สำเร็จ';
            header('location:register1.php');
        }else{
            $p2 = 1;
        }
        
        // insert to reference
        $sql = "INSERT INTO Reference VALUES('$rename','$retel','$reemail','$readdress','$eid');";
        // echo $sql . "<br>";
        if ($conn->query($sql)==false){
            $_SESSION['reg']['error'] = 'ลงทะเบียนไม่สำเร็จ';
            header('location:register1.php');
        }else{
            $p3 = 1;
        }

        if ($p1 === $p2 && $p2 == $p3){
            $_SESSION['reg']['success'] = 'success';
            header('location:account3.php');
        }
    }
    ?>
</body>
</html>

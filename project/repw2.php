<?php
session_start();
if(empty($_POST)){header('location:repw1.php');}
include('connecthotel.php');
$email = strtoupper($_POST['email']);
$sql = "SELECT * FROM Employee WHERE email = '$email'";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($query);
if(empty($result)){
    $_SESSION['error'] = 'Email not Found';
    header('location:repw1.php');
}else{
    $_SESSION['email'] = $email;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password/PIN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="repw.css">
    <link rel="stylesheet" href="repw2.css">
</head>
<body>
    <h2>Reset Password/PIN</h2>
    <form action="repw3.php" method="post" autocomplete="off">
        <p>กรุณากรอก<b>หมายเลขบัตรประชาชน</b> หรือ <b>passport</b> เพื่อทำการตรวจสอบข้อมูล</p>
        <div id="block-outer">
            <div id="block-inner">
                <label>ID/Passport</label>
                <input name="idpp" id="idpp" type="text" maxlength="13" required>
                <button>Check</button>
            </div>
        </div>
    </form>
</body>
</html>
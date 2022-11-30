<?php
session_start();
include('connecthotel.php');
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
</head>
<body>
    <h2>Reset Password/PIN</h2>
    <?php
    if(!empty($_SESSION['error'])){
        $error = $_SESSION['error'];
        echo "<p style='color:red'>$error</p>";
    }
    session_destroy();
    ?>
    <form action="repw2.php" method="post" autocomplete="off">
        <p>กรุณากรอก <b>Email</b> เพื่อทำการตรวจสอบข้อมูล</p>
        <div id="block-outer">
            <div id="block-inner">
                <label><b>Email</b></label>
                <input name="email" id="email" type="Email" required>
                <button type="submit">Check</button>
            </div>
        </div>    
    </form>
</body>
</html>
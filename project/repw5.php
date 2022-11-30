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
    <title>change successfully</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="repw5.css">
</head>
<body>
    <?php if(empty($_SESSION['idpp'])){header("location:login.php");} ?>
    <h1 style="color:green">Change Password/PIN Successfully</h1>
    <form action="login.php">
        <button>กลับสู่หน้า Login</button>
    </form>
    
</body>
</html>
<?php
// session_destroy();
?>
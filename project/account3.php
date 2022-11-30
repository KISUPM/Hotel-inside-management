<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="account3.css">
</head>
<body>
    <?php
    session_start();
    // print_r($_SESSION);
    if(empty($_SESSION['reg']['success'])){
        header('location:login.php');
        session_destroy();
    }else{
        $_SESSION['reg']=null;
        header('location:memp.php');
    }
    ?>
</body>
</html>
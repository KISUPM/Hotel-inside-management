<?php
    include('connecthotel.php');
    session_start();
    $username =  $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM account WHERE username='$username'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    if (!empty($result)){
        // print_r($result);
        $pw = $result['Password'];
        if($pw===$password)
        {
            echo "Login successfully<br>";
            $_SESSION['account']['username'] = $username;
            // print_r($result);
            header('location:index.php');
        }
        else{
            $_SESSION['fail']="Password are not match";
            header('location:login.php');
        }
    }
    else{
        $_SESSION['fail']="Username are not match";
        header('location:login.php');
    }
?>
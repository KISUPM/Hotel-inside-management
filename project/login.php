<?php
    session_start();
    if(!empty($_SESSION['account']['username'])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <h1>Login</h1>
    <main>
        <?php
        // show error
            if(!empty($_SESSION['fail'])){
                echo "<p class='error' style='color:red;text-align:center;'>{$_SESSION['fail']}</p>";
                session_destroy();
            }
        ?>
        <form action="login_process.php" method="post" autocomplete="off">
            <label class="head" for="username">Username</label>
            <input name="username" id="username" type="text" required>
    
            <label class="head" for="password">Password</label>
            <input name="password" id="password" type="password" required>
            <button type="submit">Login</button>
        </form>
        <div class="box">
            <p>Forget password? <a href="repw1.php">Reset</a></p>
        </div>
    </main>
</body>
</html>
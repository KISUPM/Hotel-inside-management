<?php
include('connecthotel.php');
session_start();

$eid = $_SESSION['reg']['nelevel']*100000 + (date("Y")+543-2500)*1000;
do {
    $eid+=1;
    $sql = "SELECT * FROM Employee WHERE EID = '$eid'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_row($query);
} while(!empty($result));
$_SESSION['reg']['eid']=$eid;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/account.css">
    <script type="text/javascript" src="reg.js"></script>
</head>
<style>
    input.pw{
    -webkit-text-security: disc;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    label,input,p{
        display:block;
    }
</style>
<script>
    function check(){
        let pw1 = document.getElementById('pw').value;
        let pw2 = document.getElementById('cpw').value;
        let show = document.getElementById('show-match');
        let btn = document.getElementById('btn');
        if (pw1===pw2){
            show.innerHTML = "Passwords are match";
            show.style.color = 'green';
            btn.removeAttribute('disabled');
        }
        else{
            show.innerHTML = "Passwords not match!";
            show.style.color = 'red';
            btn.setAttribute('disabled','true');
        }
    }

    function check_pin(){
        let p = document.getElementById('pin').value;
        let show = document.getElementById('pin-res');
        let btn = document.getElementById('btn');
        if (p.length==6){
            show.innerHTML = "";
            show.style.color = "green";
            btn.removeAttribute('disabled');
        }else{
            show.innerHTML = "PIN must be 6 digit!";
            show.style.color = "red";
            btn.setAttribute('disabled','true');
        }
    }
</script>
<body>
    <main>
        <h1>ลงทะเบียนบัญชีการใช้งาน</h1>
        <form action="account2.php" method="post" autocomplete="off" id="main">
            <?php
            if(!empty($_SESSION['reg']['error'])){
                echo "<p style='color:red;'>{$_SESSION['reg']['error']}</p>";
                $_SESSION['reg']['error'] = '';
            }
            ?>
            <label>Username</label>
            <input type="text" minlength="8" name="username" id="username" required>

            <label>Password</label>
            <input class="pw"type="text" minlength="8" name="pw" id="pw" onchange="check()" required>

            <label>Confirmed-Password</label>
            <input class="pw"type="text" minlength="8" name="cpw" id="cpw" onchange="check()" required>
            <p id="show-match">Please enter password</p>
            
            <label>PIN</label>
            <input class="" type="number" maxlength="6" name="pin" id="pin" required onchange="check_pin()">
            <p id="pin-res">Enter PIN</p>
            <button id='btn' type="submit">ถัดไป</button>
        </form>
        <form action="cancel.php" style="width:100% !important;border:none;">
                <button type="submit" id="cancel">ยกเลิก</button>
        </form>
    </main>
</body>
</html>
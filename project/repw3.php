<?php
session_start();
include('connecthotel.php');
$idpp = $_POST['idpp'];
$email = $_SESSION['email'];
$_SESSION['idpp'] = $idpp;
$sql = "SELECT * FROM Employee NATURAL JOIN Account WHERE IDPP = '$idpp' and email = '$email'";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($query);
if(empty($result)){
    $_SESSION['error'] = 'ID/Passport not found';
    header('location:repw1.php');
}else{
    $_SESSION['error'] = '';
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
    <link rel="stylesheet" href="repw3.css">
</head>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    label{
        display:block;
    }
    form > div{
        border:1px solid black;
        padding: 5px;
    }
    input:invalid{
        border:2px solid red;
    }
    input.hide-text {
    -webkit-text-security: disc;
    }
</style>
<script>
    function selected_pin(){
        document.getElementById('pw').style.display = "none";
        document.getElementById('pin').style.display = "block";
        document.getElementById('pw-form').reset();
        document.getElementById('res-pw').innerHTML = "Enter new Password";
        document.getElementById('res-pw').style.color = "black";
        document.getElementById('btn-pw').removeAttribute('disabled');
    }
    
    function selected_pw(){
        document.getElementById('pw').style.display = "block";
        document.getElementById('pin').style.display = "none";
        document.getElementById('pin-form').reset();
        document.getElementById('res-pin').innerHTML = "Enter new PIN";
        document.getElementById('res-pin').style.color = "black";
        document.getElementById('btn-pin').removeAttribute('disabled');
    }

    function pw_match(){
        let pw1 = document.getElementById('pw1').value;
        let pw2 = document.getElementById('pw2').value;
        var res = document.getElementById('res-pw');
        var btn = document.getElementById('btn-pw');
        if (pw1===pw2){
            res.innerHTML = 'New Passwords are Match';
            res.style.color = "green";
            btn.removeAttribute('disabled');
        }else{
            res.innerHTML = 'New Passwords Not match!';
            res.style.color = "red";
            btn.setAttribute('disabled','true');
        }
    }

    function pin_match(){
        var pin1 = document.getElementById('pin1').value;
        var pin2 = document.getElementById('pin2').value;
        var res = document.getElementById('res-pin');
        var btn = document.getElementById('btn-pin');
        if (pin1===pin2){
            if(pin1.length == 6){
                res.innerHTML = 'New Passwords are Match';
                res.style.color = "green";
                btn.removeAttribute('disabled');
            }else{
                res.innerHTML = 'New PIN must be 6 digit!';
                res.style.color = "red";
                btn.setAttribute('disabled','true');
            }
        }else{
            res.innerHTML = 'New PIN Not match!';
            res.style.color = "red";
            btn.setAttribute('disabled','true');
        }
    }
</script>
<body>
    <main>
        <h2>เปลี่ยน Password/PIN</h2>
        <div id="choice">
            <p>เลือกรหัสที่ต้องการจะเปลี่ยน</p>
            <label><input id="change" name="change" type="radio" value="change" onclick="selected_pw()">Password</label>
            <label><input id="change" name="change" type="radio" value="pin" onclick="selected_pin()">PIN</label>
        </div>
        
        <div id="pw" style="display:none;">
            <form action="repw4.php" method="post" id="pw-form" autocomplete="off">
                <label>New Password</label>
                <input class="hide-text" name="pw1" id="pw1" type="text" minlength="8" required onchange="pw_match()">
                
                <label>Confirmed New Password</label>
                <input class="hide-text" name="pw2" id="pw2" type="text" minlength="8" required onchange="pw_match()">

                <p id="res-pw" style="font-size:12px">Enter new Password</p>
                
                <button id="btn-pw" type="submit">Change</button>
            </form>
        </div>
        
        <div id="pin" style="display:none;">
            <form action="repw4.php" method="post" id="pin-form" autocomplete="off">
                <label>New PIN</label>
                <input class="hide-text" name="pin1" id="pin1" type="number" maxlength="6" required onchange="pin_match()">
                <label>Confirmed New PIN</label>
                <input class="hide-text" name="pin2" id="pin2" type="number" maxlength="6" required onchange="pin_match()">
                <p id="res-pin" style="font-size:12px">Enter new PIN</p>

                <button id="btn-pin" type="submit">Change</button>
            </form>
        </div>
    </main>
</body>
</html>
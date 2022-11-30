<?php
    if (!empty($_SESSION['register_error'])){
        session_start();
        echo "<p style='color:red'>{$_SESSION['register_error']}</p>";
    }
    session_start();
    if (empty($_SESSION['reg'])){
        $_SESSION['reg']['nename'] = 
        $_SESSION['reg']['netel'] = 
        $_SESSION['reg']['neemail'] = 
        $_SESSION['reg']['nebod'] = 
        $_SESSION['reg']['neID'] = 
        $_SESSION['reg']['nePP'] = 
        $_SESSION['reg']['neAddress'] = 
        $_SESSION['reg']['nelevel'] = 
        $_SESSION['reg']['rename'] = 
        $_SESSION['reg']['retel'] = 
        $_SESSION['reg']['reemail'] = 
        $_SESSION['reg']['reID'] = 
        $_SESSION['reg']['rePP'] = 
        $_SESSION['reg']['reAddress'] = '';
    }
    if(empty($_SESSION['reg']['hlv_error']))$_SESSION['reg']['hlv_error'] = '';
    // print_r($_SESSION['reg']);
    ?>
<!-- register new employee -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/reg1st.css">
    <script type="text/javascript" src="reg.js"></script>
</head>
<style>
#neID[value=''],#nePP[value=''],#reID[value=''],#rePP[value='']{
    display:none;
}
</style>
<body>
    <h2>Register</h2>
    <form action="register2.php" method="post" name="newEmployee" autocomplete="off" autocapitalize="on" id="main">
        <section>
            <div class="zone">
                <h3>พนักงานใหม่</h3>

                <label>ชื่อ</label>
                <input type="text" id="nename" name="nename" onchange="namevalid('nename')"required autofocus placeholder="ชื่อ (ชื่อกลาง) นามสกุล" value="<?php echo $_SESSION['reg']['nename'];?>">
                <p id="nename-validation"></p>

                <label>เบอร์โทรติดต่อ</label>
                <input type="tel" id="netel" name="netel" required minlength="10" maxlength="10" placeholder="0123456789"
                value="<?php echo $_SESSION['reg']['netel'];?>">
                
                <label>Email</label>
                <input type="email" id="neemail" name="neemail" valid onchange="emailvalid('neemail')" required placeholder="example@email.com" value="<?php echo $_SESSION['reg']['neemail'];?>">
                <p id="neemail-validation"></p>

                <label>วันเกิด</label>
                <input type="date" id="nebod" name="nebod" required value="<?php echo $_SESSION['reg']['nebod'];?>">

                <label>ID/passport</label>
                <label class="id-type"><input class='input-id-type' name="ne-id-type" type="radio" onclick="close_nepp()" value="I">ID</label><br>
                <label class="id-type"><input class='input-id-type' name="ne-id-type" type="radio" onclick="close_neid()" value="P">Passport</label>
                <input type="text" id="neID" name="neID" minlength="13" maxlength="13" onchange="idvalid('neID')" required placeholder="1234567890123" value="<?php echo $_SESSION['reg']['neID'];?>">
                <input type="text" id="nePP" name="nePP" maxlength="9" onchange="idvalid('nePP')" required placeholder="A123456" value="<?php echo $_SESSION['reg']['nePP'];?>">
                <p id="neID-validation"></p>

                <label>ที่อยู่</label>
                <input type="text" id="neAddress" name="neAddress" required placeholder="บ้านเลขที่ ต. อ. จ." value="<?php echo $_SESSION['reg']['neAddress'];?>">

                <h5 style="color:red">กรุณาตรวจสอบการเลือกระดับพนักงานให้ถูกต้อง</h5>
                <label>ระดับพนักงาน</label>
                <select name="nelevel">
                    <option value="1" selected>Level 1 (Common employee)</option>
                    <option value="2">Level 2 (Chief employee)</option>
                    <option value="3">Level 3 (Manager)</option>
                </select>
            </div>
            
            <!-- re = referee of employee  -->
            <!-- example: rename = referee(of employee) name -->
            <div class="zone">
                <h3>บุคคลอ้างอิง</h3>
                <label>ชื่อ</label>
                <input type="text" id="rename" name="rename" onchange="namevalid('rename')" required placeholder="ชื่อ (ชื่อกลาง) นามสกุล" value="<?php echo $_SESSION['reg']['rename']; ?>">
                <p id="rename-validation"></p>
                
                <label>เบอร์โทรติดต่อ</label>
                <input type="tel" id="retel" name="retel" required placeholder="0123456789" maxlength="10" value="<?php echo $_SESSION['reg']['retel'];?>">
                
                <label>Email</label>
                <input type="email" id="reemail" name="reemail" onchange="emailvalid('reemail')" required placeholder="example@email.com" value="<?php echo $_SESSION['reg']['reemail'];?>">
                <p id="reemail-validation"></p>

                <label>ที่อยู่</label>
                <input type="text" id="reAddress" name="reAddress" required placeholder="บ้านเลขที่ ต. อ. จ." value="<?php echo $_SESSION['reg']['reAddress']; ?>">
            </div>
        </section>
        <?php
        if(!empty($_SESSION['reg']['error'])){
            echo "<p style='text-align:center;color:red'>" . $_SESSION['reg']['error'] ."</p>" ;
        }
        ?>
        <button type="submit" id="submit">ถัดไป</button>
    </form>
    <a href="cancel.php">
        <button type="submit" id="cancel">ยกเลิก</button>
    </a>
</body>
<script>
    // if (document.getElementById('neID').value == null){}
    // if (document.getElementById('nePP').value == null){}
    // if (document.getElementById('reID').value == null){}
    // if (document.getElementById('rePP').value == null){}
</script>
</html>
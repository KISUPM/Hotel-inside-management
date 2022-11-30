<?php
session_start();

$lv = $_SESSION['reg']['nelevel'];

switch($lv){
    case 1:
        $lv = "Level 1 (Common employee)";
        break;
    case 2:
        $lv = "Level 2 (Chief employee)";
        break;
    case 3:
        $lv = "Level 3 (Manager)";
        break;
    default:
        break;
}
// print_r($_SESSION['reg']);
// echo "<br>";
// print_r($_POST);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/sum.css">
    <script type="text/javascript" src="reg.js"></script>
</head>
<style>

</style>
<body>
    <h1>สรุปข้อมูล</h1>
    <section>
        <div class="zone">
            <h3>ข้อมูลพนักงานใหม่</h3>
            <div>
                <p class="head">ชื่อ: <span class="remain-info"><?php echo $_SESSION['reg']['nename']; ?></span></p>
                <p class="head">เบอร์โทร: <span class="remain-info"><?php echo $_SESSION['reg']['netel']; ?></span></p>
                <p class="head">Email: <span class="remain-info"><?php echo $_SESSION['reg']['neemail']; ?></span></p>
                <p class="head">ID/Passport: <span class="remain-info"><?php echo $_SESSION['reg']['neID'] . $_SESSION['reg']['nePP']; ?></span></p>
                <p class="head">วันเกิด: <span class="remain-info"><?php echo $_SESSION['reg']['nebod']; ?></span></p>
                <p class="head">ที่อยู่: <span class="remain-info"><?php echo $_SESSION['reg']['neAddress']; ?></span></p>
                <p class="head">ระดับพนักงาน: <span class="remain-info"><?php echo $lv; ?></span></p>
            </div>
        </div>
        <div class="zone">
            <h3>ข้อมูลผู้อ้างอิง</h3>
            <div>                
                <p class="head">ชื่อ: <span class="remain-info"><?php echo $_SESSION['reg']['rename'] ?></span></p>
                <p class="head">เบอร์โทร: <span class="remain-info"><?php echo $_SESSION['reg']['retel'] ?></span></p>
                <p class="head">Email: <span class="remain-info"><?php echo $_SESSION['reg']['reemail'] ?></span></p>
                <p class="head">ที่อยู่: <span class="remain-info"><?php echo $_SESSION['reg']['reAddress'] ?></span></p>
            </div>
        </div>
        <div class="btn">
            <form action="register1.php"id="edit"><button  type="submit">แก้ไข</button></form>
            <form action="account1.php" id="confirmed"><button  type="submit">ยืนยัน</button></form>
        </div>
        <form action="cancel.php">
            <button type="submit" id="cancel">ยกเลิก</button>
        </form>
    </section>
</body>
</html>
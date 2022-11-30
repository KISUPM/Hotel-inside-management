<?php
session_start();
$index = $_SESSION['index'] = $_POST['index'];
$person = $_SESSION['people'][$index];
print_r($person);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link href="manage2.css" rel="stylesheet">
</head>
<body>
    <h1>จัดการข้อมูล</h1>
    <table>
            <tr>
                <th>ชื่อ</th>
                <th>ID/passport</th>
                <th>เบอร์โทรติดต่อ</th>
                <th>Email</th>
                <th>EID</th>
                <th>Level</th>
                <th>ที่อยู่</th>
                <th>Bod</th>
            </tr>
            <tr>
                <?php
                    foreach($person as $x){
                        echo "<td style='text-align:center'>$x</td>";
                    }
                ?>
            </tr>
    </table>
    <div id="btn-group">
        <form action="editdetail.php"><button id="edit">แก้ไขข้อมูล</button></form>
        <form action="deleteemp.php"><button id="delete">ลบพนักงาน</button></form>
    </div>
</body>
</html>
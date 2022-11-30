<?php
session_start();
print_r($_SESSION['people'][$_SESSION['index']]);
$person = $_SESSION['people'][$_SESSION['index']];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูล</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link href="manage3.css" rel="stylesheet">
</head>
<body>
    <h1>แก้ไขข้อมูล</h1>
    <form>
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
                    <td><input value="<?php echo $person['1']; ?>"name="name" type="text" required></td>
                    <td><input value="<?php echo $person['0']; ?>"name="idpp" type="text" required readonly></td>
                    <td><input value="<?php echo $person['2']; ?>"name="tel" type="tel" required></td>
                    <td><input value="<?php echo $person['3']; ?>"name="email" type="email" required></td>
                    <td><input value="<?php echo $person['4']; ?>"name="eid" type="text" required readonly></td>
                    <td><input value="<?php echo $person['5']; ?>"name="elv" type="number" required readonly></td>
                    <td><input value="<?php echo $person['6']; ?>"name="address" style='height:50px;' type="text" required></td>
                    <td><input value="<?php echo $person['7']; ?>"name="bod" type="date" required></td>
                </tr>
        </table>
    </form>
</body>
</html>
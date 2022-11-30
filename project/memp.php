<?php
session_start();
$data = array();
include('connecthotel.php');
$sql = "SELECT Level From Employee NATURAL JOIN Account WHERE Username = {$_SESSION['account']['username']}";
// print_r($_SESSION);
// echo $sql;
// $sql = "SELECT * FROM `Employee` ORDER BY `Level` DESC";
$sql = "
(SELECT eid,Name,id as `ID/PP`,tel,email,level,dob FROM `Employee` where ID <> '') UNION 
(Select eid,Name,passport as `ID/PP`,tel,email,level,dob from employee where Passport <> '') ORDER BY `Level` DESC;";
$query = mysqli_query($conn,$sql);
// print_r(mysqli_fetch_assoc($query));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-control" content="no-cache">
    <title>Manage Employee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link href="./css/showemp.css" rel="stylesheet">
    <link href="./css/template.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/201523416b.js" crossorigin="anonymous"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<style>
        *{
            font-family: 'Sarabun', sans-serif;
        }

        a,a:visited{
            color:blue !important;
            text-decoration: none;
        }
    </style>
<body>
    <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><span style='font-weight:bold'>User: </span><?php echo $_SESSION['account']['username'] ?></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="./index.php">Homepage</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="./check-in/checkin.php">Check-In</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="./check-out/check-out.php">Check-Out</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="./bookingNcancel/newbooking.php">Booking/Reserve</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="./bookingNcancel/newcancel.php">Cancel Room</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="./roommanage/room_manage.php">Room Manage</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="./memp.php">Employee Manage</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="./logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log out</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <h1 style="text-align:center;">Manage Employee</h1>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                <p id="res" style="margin:5px;color:red;">
                <?php 
                if(!empty($_SESSION['res'])){
                    echo $_SESSION['res'];
                    $_SESSION['res'] = null;
                }
                ?>
            </p>
                <table>
                <tr>
                    <th>รหัสพนักงาน</th>
                    <th>ชื่อ</th>
                    <th>ID/passport</th>
                    <th>เบอร์โทรติดต่อ</th>
                    <th>Email</th>
                    <th style='text-align:center'>Level</th>
                    <th>Bod</th>
                    <th>จัดการ</th>
                </tr>
                <?php
                    $j = 0;
                    while($record=mysqli_fetch_row($query)){
                        $people = array();
        
                        $eid = $record['0'];
                        $name = $record['1'];
                        $idpp = $record['2'];
                        $tel = $record['3'];
                        $email = $record['4'];
                        $elv = $record['5'];
                        $bod = $record['6'];
        
                        for($i=0;$i<6;$i++){
                            $people[$i] = $record[$i];
                        }
                        $data[$j] = $people;
                        $tr = "
                        <td>$eid</td>
                        <td>$name</td>
                        <td>$idpp</td>
                        <td>$tel</td>
                        <td>$email</td>
                        <td style='text-align:center !important'>$elv</td>
                        <td>$bod</td>
        
                        <td style='text-align:center''>
                            <form action='deleteemp.php' method='post'  onsubmit=\"return confirm('Ensure To Delete This Employee?')\">
                                <input name='index' value='$j' style='display:none;'>
                                <button type='submit' style='cursor: pointer;background:red;color:white'>ลบ</button>
                            </form>
                        </td>";
                        echo "<tr>$tr</tr>";
                        $j++;
                    }
                ?>
                <tr>
                    <td colspan="9">
                        <a href="pre_reg.php" class="list-group-item reg"> + ลงทะเบียนพนักงานเพิ่ม</a>
                    </td>
                </tr>
            </table>
                </div>
            </div>
        </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
<?php
$_SESSION['people'] = $data;
?>
<form>

</form>
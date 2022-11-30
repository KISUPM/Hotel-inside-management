<?php
include('../connecthotel.php');
    session_start();
    if(empty($_SESSION['account']['username'])){
        header('location:login.php');
        session_destroy();
    }
$d = date('d');
$m = date('m');
$y = date('Y');
$date = $y."-".$m."-".$d;
// echo $date ."<br>";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Check-In</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="./css/mainpage.css"> -->
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/201523416b.js" crossorigin="anonymous"></script>
    </head>
    <style>
        *{
            font-family: 'Sarabun', sans-serif;
        }

        a,a:visited{
            color:blue !important;
            text-decoration: none;
        }
        form{
            /* border:1px solid black; */
            border-radius: 15px;
            padding:10px;
        }
        form{
            width:50%;
            margin:5px auto;
        }
        .group{
            /* border:1px solid red; */
            width:fit-content;
            margin:5px auto;
        }
    </style>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><span style='font-weight:bold'>User: </span><?php echo $_SESSION['account']['username'] ?></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../index.php">Homepage</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../check-in/checkin.php">Check-In</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../check-out/check-out.php">Check-Out</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../bookingNcancel/newbooking.php">Booking/Reserve</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../bookingNcancel/newcancel.php">Cancel Room</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../roommanage/room_manage.php">Room Manage</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../memp.php">Employee Manage</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log out</a>
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
                            <h1 style="text-align:center;">Booking/Reserve</h1>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <div class="container-fluid" style="margin-top:10px;">
                    <h1 style="text-align:center">แบบฟอร์มทำเรื่องการจอง</h1>
                    <form action="newbooking.php" method="post">
                        <div class="mb-3">
                            <label for="Name">ชื่อ-นามสกุลลูกค้า</label>
                            <input type="text" name="Name" id="" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="Tel">เบอร์โทรลูกค้า</label>
                            <input type="text" name="Tel" id="" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="Email">อีเมลโทรลูกค้า</label>
                            <input type="email" name="Email" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="IDPP">เลขบัตรประชาชน/พาสปอร์ตลูกค้า</label>
                            <input type="text" name="IDPP" id="" placeholder="เลขบัตรประชาชน 13 หลัก หรือ หมายเลขพาสปอร์ตที่เป็นตัวอักษร 2 ตัวกับเลข 6 หลัก" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="CheckInDate">วันที่ลูกค้าเช็คอิน</label>
                            <input type="date" name="CheckInDate" id="" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="CheckOutDate">วันที่ลูกค้าเช็คเอาท์</label>
                            <input type="date" name="CheckOutDate" id="" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="Room_No">ห้องที่ลูกค้าต้องการจอง</label>
                            <input type="text" name="Room_No" id="" class="form-control" required>
                        </div class="mb-3">
                        <section class='group'>
                            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
                            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
                        </section>
                    </form>
                </div>
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>

<?php
include('../connecthotel.php');
    session_start();
    if(empty($_SESSION['account']['username'])){
        header('location:login.php');
        session_destroy();
    }
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
            border:1px solid black;
            padding:5px;
            margin:5px;
            border-radius: 15px;
        }
        form > input{
            width: 30% !important;
            margin: 5px auto;
        }
        .group{
            /* border:1px solid black; */
            width:fit-content;
            margin:5px auto;
        }
    </style>
    <body >
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
                            <h1 style="text-align:center;">Check-Out</h1>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <!-- Page content-->
                <div class="container-fluid">
                    <form>
                        <h4 style="text-align:center;">หมายเลขห้องพักที่ต้องการเช็คเอาท์</h4>
                        <input type="number" min=0 name="Room_No" id="" class="form-control" style="border:1px solid black;" required>
                        <section class='group'>
                            <!-- <button class='btn btn-primary' type="">ตรวจสอบห้องพัก</button> -->
                            <button class='btn btn-danger' type="">Check Out</button>
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

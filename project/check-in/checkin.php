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
        .btn-submit{
            width:fit-content;
            margin:20px auto;
            display: block;
        }

        form>div>input{
            width:30% !important;
        }

        form{
            border:1px solid black;
            border-radius: 5px;
            margin:20px auto !important;
        }
        .base-info{
            /* border:1px solid black; */
            display:inline;
            width:25%;
        }
        .base-info > input{
            width:80% !important;
        }

        .date-input{
            display:inline;
            width:25%;
            /* border:1px solid green; */
        }
        .date-input > input{
            width:80% !important;
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
                            <h1 style="text-align:center;">Check-In</h1>
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
                    <h1 style='text-align:center'>Check In</h1>

                    <form class="row g-3 needs-validation" novalidate autocomplete="off">
                        <div class='base-info'>
                            <label for="validationCustom01" class="form-label ">
                            <h4>ชื่อ - นามสกุล</h4>
                            </label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="กรุณากรอกชื่อ-นามสกุล" required>
                        </div>

                        <div class='base-info'>
                            <label for="validationCustom02" class="form-label ">
                            <h4>ID / Passport</h4>
                            </label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="กรุณากรอก ID/Passport" required>
                        </div>

                        <div class='base-info'>
                            <label for="validationCustom03" class="form-label ">
                            <h4>Email</h4>
                            </label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="กรุณากรอก email" required>
                        </div>
                        
                        <div class='base-info'>
                            <label for="validationCustom02" class="form-label">
                            <h4>เบอร์โทรติดต่อ</h4>
                            </label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="กรุณากรอกเบอร์โทร" required>
                        </div>

                        <br style='border:50px solid red !important;display:block !important;'>
                        <br style='border:50px solid red !important;display:block !important;'>

                        <div class='date-input'>
                            <label for="validationCustom03" class="form-label">
                            <h4>Check-In</h4>
                            </label>
                            <input type="date" class="form-control" id="validationCustom03" value='<?php echo $date ?>' readonly required>
                        </div>

                        <div class='date-input'>
                            <label for="validationCustom03" class="form-label">
                            <h4>Check-Out</h4>
                            </label>
                            <input type="date" class="form-control" id="validationCustom03" min='<?php echo $date ?>' required>
                        </div>

                        <div>
                            <label for="validationCustom02" class="form-label">
                            <h4>หมายเลขห้องพัก</h4>
                            </label><br>
                            <select>
                                <option selected disabled>กรุณาเลือกห้องพัก</option>
                                <?php
                                    $sql = "SELECT Room_no FROM room";
                                    $query = mysqli_query($conn,$sql);
                                    while($room = mysqli_fetch_row($query)){
                                        echo "<option>".$room[0] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="submit" value="&nbsp;&nbsp;Submit check in&nbsp;&nbsp;" class="btn btn-primary btn-submit">
                    </div>
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

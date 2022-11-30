<?php
include('connecthotel.php');
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
        <title>Index Page</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="./css/mainpage.css"> -->
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/201523416b.js" crossorigin="anonymous"></script>
    </head>
    <style>
        *{
            font-family: 'Sarabun', sans-serif;
        }
        .table-head > th ,.table-head > td{
            border:1px solid black !important;
        }
        a,a:visited{
            color:blue !important;
            text-decoration: none;
        }
    </style>
    <body >
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
                            <h1 style="text-align:center;">Homepage</h1>
                        </div>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h1 style='text-align:center' >Room Status Detail</h1>
                    <table style="width:100%;margin:20px auto;border:1px solid black !important" >
                        <tr class='table-head' style="background:lightsteelblue;text-align:center">
                            <th rowspan="2">Room</th>
                            <th rowspan="2">Price</th>
                            <th colspan="5">Facilities</th>
                        </tr>
                        <tr class='table-head' style="background:lightsteelblue">
                            <td style="text-align:center;font-weight:bold">Bed_type</td>
                            <td style="text-align:center;font-weight:bold">Bathroom</td>
                            <td style="text-align:center;font-weight:bold">Fridge</td>
                            <td style="text-align:center;font-weight:bold">Ventilation</td>
                            <td style="text-align:center;font-weight:bold">TV</td>
                        </tr>
                        <?php
                            $sql = "SELECT Room_no,Price,Bed_type,Bathroom,Fridge,TV,Ventilation FROM Room NATURAL JOIN room_description where room.Dno = room_description.Description_no ";
                            $query = mysqli_query($conn,$sql);
                            while ($row=mysqli_fetch_row($query)){
                                // echo print_r($row)."<br>";
                                $rno = $row[0];
                                $Price = $row[1];
                                
                                $td = "
                                <td style='text-align:center;border-right:1px solid black !important;'>$rno</td>
                                <td style='border-right:1px solid black !important;'>$Price</td>
                                <td style='text-align:center;border-right:1px solid black !important;'>$row[2]</td>
                                <td style='text-align:center;border-right:1px solid black !important;'>$row[3]</td>
                                <td style='text-align:center;border-right:1px solid black !important;'>$row[4]</td>
                                <td style='text-align:center;border-right:1px solid black !important;'>$row[5]</td>
                                <td style='text-align:center;border-right:1px solid black !important;'>$row[6]</td>
                                ";
                                echo "<tr style='text-align:center'>$td</tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="./js/scripts.js"></script>
</html>

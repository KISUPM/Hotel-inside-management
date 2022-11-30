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
        <title>Room Manage</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="./css/mainpage.css"> -->
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
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
        .group{
            width:fit-content;
            /* border:1px solid black; */
            padding:0;
            margin:5px auto;
            margin-top: 30px;
        }
        .room-class{
            /* border:1px solid black; */
            /* width: 20%; */
            margin: 5px 20px;
        }
        .room-detail{
            border:1px solid black;
            border-radius: 10px;
            margin:10px auto;
            padding:20px;
            width:fit-content;
        }
        h3{
            font-weight: bold;
        }
    </style>

    <style>
        thead tr th,td{
            border:1px solid lightgray;
        }
        th,td{
            padding:5px;
        }
        td{text-align: center;}
        table{
            width:fit-content;
        }
        h5{
            font-weight: bold;
        }
    </style>
    <style>
        .update{
            margin: 10px auto;
            margin-bottom: 0;
            width: fit-content;
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="./room_manage.php">Room Manage</a>
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
                            <h1 style="text-align:center;">Room Manage</h1>
                        </div>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h2 style='text-align:center'>Room Type</h2>
                    <div class='group'>
                        <button class='btn-primary room-class' onclick='hideall(),show(1)' >Standard-1</button>
                        <button class='btn-primary room-class' onclick='hideall(),show(2)' >Standard-2</button>
                        <button class='btn-primary room-class' onclick='hideall(),show(3)' >Superior</button>
                        <button class='btn-primary room-class' onclick='hideall(),show(4)' >Deluxe</button>
                        <button class='btn-primary room-class' onclick='hideall(),show(5)' >Suite</button>
                        <button class='btn-success room-class' onclick='show(6)' >Show All</button>
                    </div>

                    <div class='room-detail' id='standard1'>
                        <h3>Standard-1</h3>
                        <h5>Room Detail</h5>
                        <div>
                            <table>
                                <thead><tr><th>Description No.</th><th>Price</th><th>Room capacity</th><th>Bed type</th><th>Bathroom</th><th>Ventilation</th><th>TV</th><th>Fridge</th></tr></thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM Room_description WHERE Description_no = 1";
                                        $query = mysqli_query($conn,$sql);
                                        $result = mysqli_fetch_row($query);
                                        // print_r($result);  
                                        $tr = "
                                        <tr>
                                            <td>$result[0]</td>
                                            <td style='text-align:right'>$result[1]</td>
                                            <td>$result[2]</td>
                                            <td>$result[3]</td>
                                            <td>$result[4]</td>
                                            <td>$result[5]</td>
                                            <td>$result[6]</td>
                                            <td>$result[7]</td>
                                        </tr>
                                        ";
                                        echo $tr;
                                    ?>
                                </tbody>
                            </table>
                            <div class='update'>
                                <form action='./update.php' method="post">
                                    <input type="number" name="dno" id='dno' value='1' style='display:none' readonly>
                                    <button class='btn btn-outline-info'>Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class='room-detail' id='standard2'>
                        <h3>Standard-2</h3>
                        <h5>Room Detail</h5>
                        <div>
                        <table>
                            <thead><tr><th>Description No.</th><th>Price</th><th>Room capacity</th><th>Bed type</th><th>Bathroom</th><th>Ventilation</th><th>TV</th><th>Fridge</th></tr></thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM Room_description WHERE Description_no = 2";
                                        $query = mysqli_query($conn,$sql);
                                        $result = mysqli_fetch_row($query);
                                        // print_r($result);  
                                        $tr = "
                                        <tr>
                                            <td>$result[0]</td>
                                            <td style='text-align:right'>$result[1]</td>
                                            <td>$result[2]</td>
                                            <td>$result[3]</td>
                                            <td>$result[4]</td>
                                            <td>$result[5]</td>
                                            <td>$result[6]</td>
                                            <td>$result[7]</td>
                                        </tr>
                                        ";
                                        echo $tr;
                                    ?>
                                </tbody>
                            </table>
                            <div class='update'>
                                <form action='./update.php' method="post">
                                    <input type="number" name="dno" id='dno' value='2' style='display:none' readonly>
                                    <button class='btn btn-outline-info'>Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class='room-detail' id='Superior'>
                        <h3>Superior</h3>
                        <h5>Room Detail</h5>
                        <div>
                            <table>
                                <thead><tr><th>Description No.</th><th>Price</th><th>Room capacity</th><th>Bed type</th><th>Bathroom</th><th>Ventilation</th><th>TV</th><th>Fridge</th></tr></thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM Room_description WHERE Description_no = 3";
                                        $query = mysqli_query($conn,$sql);
                                        $result = mysqli_fetch_row($query);
                                        // print_r($result);  
                                        $tr = "
                                        <tr>
                                            <td>$result[0]</td>
                                            <td style='text-align:right'>$result[1]</td>
                                            <td>$result[2]</td>
                                            <td>$result[3]</td>
                                            <td>$result[4]</td>
                                            <td>$result[5]</td>
                                            <td>$result[6]</td>
                                            <td>$result[7]</td>
                                        </tr>
                                        ";
                                        echo $tr;
                                    ?>
                                </tbody>
                            </table>
                            <div class='update'>
                                <form action='./update.php' method="post">
                                    <input type="number" name="dno" id='dno' value='3' style='display:none' readonly>
                                    <button class='btn btn-outline-info'>Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class='room-detail' id='Deluxe'>
                        <h3>Deluxe</h3>
                        <h5>Room Detail</h5>
                        <div>
                            <table>
                                <thead><tr><th>Description No.</th><th>Price</th><th>Room capacity</th><th>Bed type</th><th>Bathroom</th><th>Ventilation</th><th>TV</th><th>Fridge</th></tr></thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM Room_description WHERE Description_no = 4";
                                        $query = mysqli_query($conn,$sql);
                                        $result = mysqli_fetch_row($query);
                                        // print_r($result);  
                                        $tr = "
                                        <tr>
                                            <td>$result[0]</td>
                                            <td style='text-align:right'>$result[1]</td>
                                            <td>$result[2]</td>
                                            <td>$result[3]</td>
                                            <td>$result[4]</td>
                                            <td>$result[5]</td>
                                            <td>$result[6]</td>
                                            <td>$result[7]</td>
                                        </tr>
                                        ";
                                        echo $tr;
                                    ?>
                                </tbody>
                            </table>
                            <div class='update'>
                                <form action='./update.php' method="post">
                                    <input type="number" name="dno" id='dno' value='4' style='display:none' readonly>
                                    <button class='btn btn-outline-info'>Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class='room-detail' id='Suite'>
                        <h3>Suite</h3>
                        <h5>Room Detail</h5>
                        <div>
                            <table>
                                <thead><tr><th>Description No.</th><th>Price</th><th>Room capacity</th><th>Bed type</th><th>Bathroom</th><th>Ventilation</th><th>TV</th><th>Fridge</th></tr></thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM Room_description WHERE Description_no = 5";
                                        $query = mysqli_query($conn,$sql);
                                        $result = mysqli_fetch_row($query);
                                        // print_r($result);  
                                        $tr = "
                                        <tr>
                                            <td>$result[0]</td>
                                            <td style='text-align:right'>$result[1]</td>
                                            <td>$result[2]</td>
                                            <td>$result[3]</td>
                                            <td>$result[4]</td>
                                            <td>$result[5]</td>
                                            <td>$result[6]</td>
                                            <td>$result[7]</td>
                                        </tr>
                                        ";
                                        echo $tr;
                                    ?>
                                </tbody>
                            </table>
                            <div class='update'>
                                <form action='./update.php' method="post">
                                    <input type="number" name="dno" id='dno' value='5' style='display:none' readonly>
                                    <button class='btn btn-outline-info'>Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>

    <script>
        function hideall(){
            document.getElementById('standard1').style.display = 'none';
            document.getElementById('standard2').style.display = 'none';
            document.getElementById('Superior').style.display = 'none';
            document.getElementById('Deluxe').style.display = 'none';
            document.getElementById('Suite').style.display = 'none';
        }
        function showall(){
            document.getElementById('standard1').style.display = 'block';
            document.getElementById('standard2').style.display = 'block';
            document.getElementById('Superior').style.display = 'block';
            document.getElementById('Deluxe').style.display = 'block';
            document.getElementById('Suite').style.display = 'block';
        }
        // hideall();
        function show(x){
            let show ='';
            if (x==1)show='standard1';
            else if (x==2)show='standard2';
            else if (x==3)show='Superior';
            else if (x==4)show='Deluxe';
            else if (x==5)show='Suite';
            else if (x==6)showall();

            if (x<6)document.getElementById(show).style.display = 'block';
        }
    </script>

</html>

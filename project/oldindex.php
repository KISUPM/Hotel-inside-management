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
    <link rel="stylesheet" href="./css/mainpage.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <section id="header">
        <h1>Welcome <span style="color:green;text-decoration: underline;"><?php echo $_SESSION['account']['username'];?></span></h1>
    </section>
    <main>
        <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">User:<?php echo $_SESSION['account']['username'] ?></div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Check-In</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Check-Out</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Booking/Reserve</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Cancel Room</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Room Manage</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="memp.php">See employee</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Log Out</a>
            </div>
        </div>
        <section id="content">
            <!-- <table style="width:100%">
                <tr style="background:lightsteelblue">
                    <th rowspan="2">Room</th>
                    <th rowspan="2">Status</th>
                    <th rowspan="2">Price</th>
                    <th colspan="5">Facilities</th>
                </tr>
                <tr style="background:lightsteelblue">
                    <td style="text-align:center;font-weight:bold">Bed_type</td>
                    <td style="text-align:center;font-weight:bold">Bathroom</td>
                    <td style="text-align:center;font-weight:bold">Fridge</td>
                    <td style="text-align:center;font-weight:bold">TV</td>
                    <td style="text-align:center;font-weight:bold">Ventilation</td>
                </tr>
                <?php
                    $sql = "SELECT Room_no,Avaliable_state,Price,Bed_type,Bathroom,Fridge,TV,Ventilation FROM Room NATURAL JOIN room_description ";
                    $query = mysqli_query($conn,$sql);
                    while ($row=mysqli_fetch_row($query)){
                        $rno = $row[0];
                        $st = $row[1];
                        $Price = $row[2];
                        if($st=="Y"){
                            $bg = ";background:limegreen'";
                        }elseif ($st=="N"){
                            $bg = ";background:tomato'";
                        }elseif ($st=="R"){
                            $bg = ";background:yellow'";
                        }
                        
                        $td = "
                        <td style='text-align:center$bg'>$rno</td>
                        <td style='text-align:center'>$st</td>
                        <td>$Price</td>
                        <td style='text-align:center'>$row[3]</td>
                        <td style='text-align:center'>$row[4]</td>
                        <td style='text-align:center'>$row[5]</td>
                        <td style='text-align:center'>$row[6]</td>
                        <td style='text-align:center'>$row[7]</td>
                        ";

                        echo "<tr $bg>$td</tr>";
                    }
                ?>
            </table> -->
        </section>
    </main>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
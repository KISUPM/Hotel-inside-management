<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มทำเรื่องการจอง</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style>
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        .row.content {
            height: 863px;
        }

        .sidenav {
            padding-top: 10px;
            background-color: #4c95da;
            height: 100%;
        }

        footer {
            background-color: rgb(113, 117, 113);
            color: white;
            padding: 8px;
        }

        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 30px;
            }

            .row.content {
                height: auto;
            }
        }

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #ffffff;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: #444;
        }

        .sidenav a,
        .dropdown-btn {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #ffffff;
            display: block;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }

        /* On mouse-over */
        .sidenav a:hover,
        .dropdown-btn:hover {
            color: #f1f1f1;
        }

        /* Main content */
        .main {
            margin-left: 200px;
            /* Same as the width of the sidenav */
            font-size: 20px;
            /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        /* Add an active class to the active dropdown button */
        .active {
            background-color: rgb(113, 117, 113);
            color: white;
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: none;
            background-color: #262626;
            padding-left: 8px;
        }

        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: right;
            padding-right: 8px;
        }

        #main {
            transition: margin-left 0.5s;
            padding: 16px;
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }
    </style>

</head>

<body>
    <!-- Hambergure -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <button class="openbtn" onclick="openNav()">&nbsp;&nbsp;☰&nbsp;&nbsp; </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <a class="navbar-brand" href="../UI_main.php">&nbsp;&nbsp;HOTEL</a>
                    <li><a href="#">History</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../Payment/Payment_status.php">Main</a></li>
                    <li><a href="../Payment/insert_receipt.html">Insert</a></li>
                    <li><a href="../Payment/Payment_Method.html">Payment Method</a></li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="../Login/mempwb.php">Manage Employee</a>
        <br />
        <a href="../Check-in/Check-in.php">Check-in</a>
        <br />
        <a href="../Check-out/UI_Checkout.html">Check-out</a>
        <br />
        <a href="../Booking/booking.php">Booking/Reserve</a>
        <br />
        <a href="../Booking/cancel.php">Cancel room</a>
        <br />
        <button class="dropdown-btn">
            &nbsp;&nbsp;&nbsp;Room manage<i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="../Update/UI_UP_Basic.php">Basic</a>
            <a href="../Update/UI_UP_Standard.php">Standard</a>
            <a href="../Update/UI_UP_superior.php">Superior</a>
            <a href="../Update/UI_UP_Deluxe.php">Deluxe</a>
            <a href="../Update/UI_UP_Suite.php">Suite</a>
        </div>
    </div>

    <!-- Content -->
    <div class="container-fluid text-center">
        <div class="row content">
            <!-- <div class="col-sm-2 sidenav">
                    <br>
                    <br>
                    <a href="UI_Checkout.html"><button type="button" class="btn btn-success btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;Check out&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                    <br>
                    <br>
                    <br>
                    <button type="button" class="btn btn-success btn-lg">&nbsp&nbsp&nbspUpdate room&nbsp&nbsp&nbsp</button>
                    <br>
                    <br>
                    <br>
                    <button type="button" class="btn btn-success btn-lg">&nbspRoom canceling&nbsp</button>
                    <br>
                    <br>
                    <br>
                    <button type="button" class="btn btn-success btn-lg">&nbsp&nbspRoom booking&nbsp&nbsp</button>
                    <br>
                    <br>
                    <br>
                    <button type="button" class="btn btn-success btn-lg">&nbsp&nbspPayment room&nbsp&nbsp</button>
                    
        
                </div> -->



            <div class="container my-3">
                <h2 class="text-center">แบบฟอร์มทำเรื่องการจอง</h2>
                <form action="insertBooking.php" method="post">
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
                    <br>
                    <br>
                    <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
                    <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">

                </form>
            </div>



        </div>
    </div>


    <footer class="container-fluid text-center">
        <p>Hotel_inside_management</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="../js/checkIn.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>

</body>

</html>
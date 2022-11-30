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
    body{
        padding:20px;
    }
    label,input{
        display:block;
    }
    span > input{
        width:30px;
    }
    form{
        border:1px solid lightgray;
        border-radius: 10px;
        width:fit-content;
        margin:10px auto;
        padding:20px;
    }
    h2,h5{
        text-align: center;
        font-weight: bold;;
    }
    .boxbtn{
        width:fit-content;
        margin:30px auto;
        margin-bottom: 0;
    }
    span > input{
        margin-left: 5px;
        width:50px;
    }
</style>
<body>
    <?php
        $sql = "SELECT * FROM Room_description WHERE Description_no = '{$_POST['dno']}'";
        $query = mysqli_query($conn,$sql);
        $result = mysqli_fetch_row($query);
        // print_r($result);
    ?>
    <h2>Update Detail</h2>

    <form action="update_process.php" method="post">
        <h5>Details</h5>
        <label>Description no</label>
        <input name="dno" type="text" value='<?php echo $result[0] ?>' readonly required>

        <label>Price</label>
        <input name="price" type="text" value='<?php echo $result[1] ?>'required>

        <label>Room Capacity</label>
        <input name="cap" type="text" value='<?php echo $result[2] ?>'required>

        <label>Bed Type</label>
        <p>
            <span>T<input name="t" type="number" style="display:inline !important" value="<?php echo $result[3][1] ?>"></span>
            <span>Q<input name="q" type="number" style="display:inline !important" value="<?php echo $result[3][3] ?>"></span>
        </p>

        <label>Bathroom</label>
        <input name="br" type="text" value='<?php echo $result[4] ?>'required>

        <label>Ventilation</label>
        <input name="ven" type="text" value='<?php echo $result[5] ?>'required>

        <label>TV</label>
        <input name="tv" type="text" value='<?php echo $result[6] ?>'required>

        <label>Fridge</label>
        <input name="frid" type="text" value='<?php echo $result[7] ?>'required>

        <div class='boxbtn'><button class="btn btn-danger">Update</button></div>
    </form>
    <div class="boxbtn">
        <a href="room_manage.php">Cancel</a>
    </div>
</body>
</html>
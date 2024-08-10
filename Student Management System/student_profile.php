<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolmanagementproject";

$data = mysqli_connect($host, $user, $password, $db);
$name = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$name'";
$result = mysqli_query($data, $sql);

$info = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>

    <?php include 'student_css.php'; ?>

    <style>
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg {
            background-color: skyblue;
            width: 600px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
        .info_field {
            text-align: left;
            padding-left: 15px;
        }
    </style>
</head>
<body>
    <?php include 'student_sidebar.php'; ?>
   
    <center>  
        <div class="containt">
            <h1>Student Profile</h1>
            <br><br>
            <div class="div_deg">
                <div>
                    <label>Name:</label>
                    <span class="info_field"><?php echo $info['username']; ?></span>
                </div>

                <div>
                    <label>Email:</label>
                    <span class="info_field"><?php echo $info['email']; ?></span>
                </div>

                <div>
                    <label>Phone:</label>
                    <span class="info_field"><?php echo $info['phone']; ?></span>
                </div>

                <div>
                    <label>Password:</label>
                    <span class="info_field"><?php echo $info['password']; ?></span>
                </div>
            </div>
        </div>
    </center>
</body>
</html>

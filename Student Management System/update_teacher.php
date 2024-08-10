<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolmanagementproject";

$data = mysqli_connect($host, $user, $password, $db);

$id = $_GET['teacher_id']; // Changed from 'student_id' to 'teacher_id'
$sql = "SELECT * FROM teacher WHERE id='$id'"; // Changed table to 'teacher'
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['username']; // Assuming the teacher's name is stored in 'username'
    $description = $_POST['description'];

    $query = "UPDATE teacher SET name='$name', description='$description' WHERE id='$id'"; // Updated fields to match 'teacher' table

    $result2 = mysqli_query($data, $query);

    if ($result2) {
        header("location:view_teacher.php"); // Redirect to a page for viewing teachers
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <?php

include 'admin_css.php';
?>

<style>
  label{
    display: inline-block;
    width: 100px;
    text-align: right;
    padding-top: 10px;
    padding-bottom: 10px;

  }
  .div_deg{
    background-color: skyblue;
    width: 400px;
     padding-top: 70px;
     padding-bottom: 70px;
    /* margin-right: 140px; */
    
  }
</style>
    
</head>
<body>
     
   <?php

include 'admin_sidebar.php';
?>

     <div class=".div_deg">
         <center>
         <h1>Update Student</h1>
             <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo" {$info['name']}"; ?>">
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description" value="<?php echo" {$info['description']}"; ?>"></textarea>
                </div>
               

                <div>
                    <input type="submit" class="btn btn-success"
                    name="update" value="Update Student">
                </div>
            </form>
         </div>
             </center>


     </div>
</body>
</html>

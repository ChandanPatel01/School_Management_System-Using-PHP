<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");

    }
    elseif($_SESSION['usertype']=='student'){
        header("location:login.php");
    }
   
    $host="localhost";
    $user="root";
    $password= "";
    $db="schoolmanagementproject";

    $data=mysqli_connect($host,$user,$password,$db);
    
    if(isset($_POST['add_teacher']))
    {
        $t_name=$_POST['name'];
        $t_description=$_POST['description'];
        $file=$_FILES['image']['name'];

        $dest="./image/".$file;
        $dest_db="image/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'], $dest);

        $sql = "INSERT INTO teacher (name, description, image) VALUES ('$t_name', '$t_description', '$dest_db')";

        $result=mysqli_query($data,$sql);

        if($result){
            header('location:add_teacher.php');
        }

    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php

include 'admin_css.php';
?>

<style>
    label{
            display:inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
            /* padding-left:5px ; */
        }
        .div_deg{
                background-color: skyblue;
                width: 400px;
                padding-top: 70px;
                padding-bottom: 70px;
                margin-right: 148px;

        }
</style>
    
</head>
<body>
     
   <?php

include 'admin_sidebar.php';
?>

     <div class="containt">
     <center>

         <h1>Add Teacher</h1>
         <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Teacher Name:</label>
                    <input type="text" name="name">
                 </div>

                 <div>
                    <label>Description:</label>
                    <textarea name="description"></textarea>
                 </div>

                 <div>
                    <label>Image</label>
                    <input type="file" name="image">
                 </div>

                

                 <div>
                    <input   style="margin: 20px;" type="submit" class="btn btn-primary"
                    name="add_teacher" value="Add Teacher">
                </div>
            </form>
         </div>

         </center>
     </div>
</body>
</html>
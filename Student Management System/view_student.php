<?php
    //error_reporting(0);
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
    $sql = "SELECT * FROM user where usertype='student' ";
    $result = mysqli_query($data,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    
    <?php

     include 'admin_css.php';
?>
    <style>
     .table_td{
            background-color:antiquewhite;
     }
     .table_th{
            background-color:skyblue;
     }
    </style>

    
</head>
<body>

   <?php

   include 'admin_sidebar.php';
   ?>

<div class="containt" >
      <center>

         <h1> View Student</h1>

         <?php

         if(isset($_SESSION['message']))
         {
            echo $_SESSION['message'];
         }

         unset($_SESSION['message']);
         ?>

         <table border="1px">
            <tr>
                <th  class="table_th" style="padding:20px; font-size:15px;">Username</th>
                <th  class="table_th" style="padding:20px; font-size:15px;">Email</th>
                <th  class="table_th" style="padding:20px; font-size:15px;">Phone</th>
                <th  class="table_th" style="padding:20px; font-size:15px;">Usertype</th>
                <th  class="table_th" style="padding:20px; font-size:15px;">Password</th>
                <th  class="table_th" style="padding:20px; font-size:15px;">Delete</th>
                <th  class="table_th" style="padding:20px; font-size:15px;">Update</th>
            </tr>

            <?php
                 while($info=$result->fetch_assoc())
                 {

                
            ?>

            <tr>
                <td class="table_td" style="padding: 20px;">
                    <?php echo"{$info['username']}";?>
                </td>
                <td class="table_td" style="padding: 20px;">
                <?php echo"{$info['email']}";?>
                </td>
                <td class="table_td" style="padding: 20px;">
                <?php echo"{$info['phone']}";?>
                </td>
                <td class="table_td" style="padding: 20px;">
                <?php echo"{$info['usertype']}";?>
                </td>
                <td class="table_td" style="padding: 20px;">
                <?php echo"{$info['password']}";?>
                </td>


                <td class="table_td" style="padding: 20px;">

                <?php 
                echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are You Sure to Delete this')\" href='delete.php?student_id={$info['id']}
                '>Delete </a>";
                ?>
                </td>

                <td class="table_td" style="padding: 20px;">
                <?php echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}
                '>Update </a>";
                ?>
                </td>
                
               
            </tr>

            <?php
                 }
            ?>

         </table>
         </center>

     </div>
</body>
</html>
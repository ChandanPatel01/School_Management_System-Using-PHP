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
    $sql = "SELECT * FROM admission";
    $result = mysqli_query($data,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission</title>
    
    <?php

     include 'admin_css.php';
?>
<style>
    .table_td{
        background-color:antiquewhite;
    }
    .table_th{
        background-color: skyblue;
    }
</style>

    
</head>
<body>

   <?php

   include 'admin_sidebar.php';
   ?>

<div class="containt">
      <center>

         <h1> Applied For Admission</h1>

         <table border="1px">
            <tr>
                <th class="table_th" style="padding:20px; font-size:15px;">Name</th>
                <th class="table_th" style="padding:20px; font-size:15px;">Email</th>
                <th class="table_th" style="padding:20px; font-size:15px;">Phone</th>
                <th class="table_th" style="padding:20px; font-size:15px;">Message</th>
            </tr>

            <?php
                 while($info=$result->fetch_assoc())
                 {

                
            ?>

            <tr>
                <td class="table_td" style="padding: 20px;">
                    <?php echo"{$info['name']}";?>
                </td>
                <td class="table_td" style="padding: 20px;">
                <?php echo"{$info['email']}";?>
                </td>
                <td class="table_td" style="padding: 20px;">
                <?php echo"{$info['phone']}";?>
                </td>
                <td class="table_td" style="padding: 20px;">
                <?php echo"{$info['message']}";?>
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
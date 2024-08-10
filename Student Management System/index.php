<?php
    
error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
{
    $message=$_SESSION['message'];

    echo "<script type='text/javascript'>
      
    alert('$message');
    
    </script>";
}

$host="localhost";
$user="root";
$password="";
$db="schoolmanagementproject";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM teacher ";

$result=mysqli_query($data,$sql);



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W-Schools</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <label style=" color:darkred;"class="logo">W-Schools</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <label class="img_text">We Teach Students With Care</label>
        <img clas="main_img" src="https://d1jnzwil5g8le2.cloudfront.net/content/images/thumbs/0001321_computers-in-the-classroom_800.jpeg" height="300px" width="100%" alt="">
      
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
               <img class="welcome_img" src="https://www.imgacademy.com/sites/default/files/styles/scale_1700w/public/2022-12/img-academy-admissions-tuition.jpg?itok=5ivz6zf9" alt="">
            </div>
            <div class="col-md-8">
                 <h1>WelCome W-Schools</h1>
                 <p>Our School Management System (SMS) is a comprehensive solution designed to streamline the administrative and academic processes of educational institutions. It enhances efficiency, reduces manual workloads, and fosters effective communication between teachers, students, parents, and administrators. The system features robust student information management, allowing schools to maintain detailed records of students, track attendance, and manage grades seamlessly. Teachers and staff benefit from profile management, attendance tracking, and efficient leave management. Additionally, the system simplifies timetable creation and scheduling, ensuring optimal resource utilization and smooth exam planning. Overall, our SMS provides a unified platform that supports the smooth operation of educational institutions, enabling them to focus on delivering quality education.</p>
            </div>
        </div>
    
    </div>

    <center>
        <h1>Our Teachers</h1>
    </center>

    <div class="container">
        <div class="row">

        <?php
            while($info=$result->fetch_assoc())
           {

           

        ?>
            <div class="col-md-4">
              <img  class="teacher" src=" <?php   echo "{$info['image']}" ?>" alt="">
              <h3> <?php   echo "{$info['name']}" ?></h3>

              <h5> <?php   echo "{$info['description']}" ?></h5>
            </div>

           <?php
           }
           ?>

            

        </div>

    </div>

    <!-- second -->

    <center>
        <h1>Our Courses</h1>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
              <img  class="teacher" src="https://infidata.in/assets/img/courses/web-development-training-in-bangalore.jpg" alt="">
              <h3>Web Development</h3>
            </div>
            

            <div class="col-md-4">
              <img class="teacher" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp7fJWCsHehELVDodP1RaKU-j2H2jzmcQq2Q&s" alt="">
              <h3>App Development</h3>
            </div>

            <div class="col-md-4">
                 <img class="teacher" src="https://www.simplilearn.com/ice9/free_resources_article_thumb/What_is_digital_marketing.jpg" alt="">
                   <h3>Digital Marketing</h3>
            </div>

        </div>

    </div>
    <center>
        <h1 class="adm">Admission Form</h1>
    </center>
    <div align="center" class="admission_form">

        <form action="data_check.php" method="POST">

            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_dag" type="text" name="name">
            </div>

            <div  class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_dag" type="text" name="email" >
            </div>

            <div  class="adm_int">
            <label class="label_text">Phone</label>
            <input class="input_dag" type="text" name="phone" >
            </div>

            <div class="adm_int">
                <label class="label_text">Message</label>
                 <textarea class="input_text" name="message"></textarea>
            </div>

            <div  class="adm_int">
                <label class="label_text"></label>
                <input  class="btn btn-primary" id="submit" type="submit"  value="Apply" name="apply">
            </div>
        </form>
        

    </div>

     <footer>
        <h3 class="footer_text" >All @Copyright reserved by Chandan</h3>
     </footer>
</body>
</html>
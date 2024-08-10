<?php
session_start();
$host="localhost";
$username="root";
$password= "";
$db="schoolmanagementproject";


$data=mysqli_connect($host,$username,$password,$db);
if ($_GET['student_id'])
{
    $user_id=$_GET['student_id'];
    $sql="DELETE FROM user WHERE id='$user_id'";

   $result=mysqli_query($data,$sql);

   if($result)
   {
    $_SESSION['message']='Delete Student Successfully';
     header("location:view_student.php");

   }


}

if ($_GET['teacher_id'])
{
    $user_id=$_GET['teacher_id'];
    $sql="DELETE FROM teacher WHERE id='$user_id'";

   $result=mysqli_query($data,$sql);

   if($result)
   {
    $_SESSION['message']='Delete Student Successfully';
     header("location:view_teacher.php");

   }


}

?>
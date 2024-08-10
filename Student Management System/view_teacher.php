<?php
    // error_reporting(0);
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location:login.php");
        exit();
    } elseif ($_SESSION['usertype'] == 'student') { // Assuming students shouldn't access this page
        header("location:login.php");
        exit();
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolmanagementproject";

    $data = mysqli_connect($host, $user, $password, $db);

    // Adjusted query to select from the 'teacher' table
    $sql = "SELECT * FROM teacher";
    $result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Teacher</title>
    
    <?php include 'admin_css.php'; ?>
    
    <style>
        .table_td {
            background-color: antiquewhite;
        }
        .table_th {
            background-color: skyblue;
        }
    </style>
</head>
<body>

    <?php include 'admin_sidebar.php'; ?>

    <div class="containt">
        <center>
            <h1>View Teacher</h1>

            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
            unset($_SESSION['message']);
            ?>

            <table border="1px">
                <tr>
                    <th class="table_th" style="padding:20px; font-size:15px;">Teacher Name</th>
                    <th class="table_th" style="padding:20px; font-size:15px;">Description</th>
                    <th class="table_th" style="padding:20px; font-size:15px;">Image</th>
                    <th class="table_th" style="padding:20px; font-size:15px;">Delete</th>
                    <th class="table_th" style="padding:20px; font-size:15px;">Update</th>
                </tr>

                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td class="table_td" style="padding: 20px;">
                            <?php echo $info['name']; ?>
                        </td>
                        <td class="table_td" style="padding: 20px;">
                            <?php echo $info['description']; ?>
                        </td>
                        <td class="table_td" style="padding: 20px;">
                            <img src="<?php echo $info['image']; ?>" alt="Teacher Image" style="width:100px; height:100px;">
                        </td>
                        <td class="table_td" style="padding: 20px;">
                            <?php 
                            echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are You Sure to Delete this')\" href='delete.php?teacher_id={$info['id']}'>Delete</a>"; 
                            ?>
                        </td>
                        <td class="table_td" style="padding: 20px;">
                            <?php 
                            echo "<a class='btn btn-primary' href='update_teacher.php?teacher_id={$info['id']}'>Update</a>"; 
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

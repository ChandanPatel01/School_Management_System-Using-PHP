<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body background="https://cdn.britannica.com/35/230835-050-3D93A72A/School-children-wearing-school-uniforms.jpg" class="body_deg">
    <center>

    <div class="form_deg">

    <center style
    ="color:black;"class="title">
       Login Form

       <h4>
        <?php
        error_reporting(0);
        session_start();
        session_destroy();
           echo $_SESSION['loginMessage'];
              
        ?>
       </h4>
    </center>

    <form action="login_check.php" method="POST" class="login_form">
    <div>
        <label style="color:azure;"class="label_deg">Username</label>
        <input type="text" name="username">
    </div>

    <div>
        <label  style="color:azure;" class="label_deg">Password</label>
        <input type="Password" name="password">
    </div>

    <div>
        <input class="btn btn-primary" type="submit" name="submit" value="Login">
    </div>
    


    </form>
    <div>
        
        <a style="padding:10px; margin:10px" class="btn btn-success" href="index.php">Home Page</a>
    </div>
    </div>
    </center>
</body>
</html>
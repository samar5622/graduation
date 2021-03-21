<?php
session_start();
include "login_functions/database.php";


$db = mysqli_connect('localhost', 'root', '', 'jobs');

if (isset($_POST['login'])) {
    $email = $_POST['your_email'];
     $pass=$_POST['your_pass'];
     $query = "INSERT INTO logtwo (email,password) VALUES ('$email', '$pass')";
     db_connect($query);
/*$sql = "SELECT email,password FROM log";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["email"]. " - Name: " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}*/
    
     $sql_u = "SELECT * FROM logintwo WHERE email='$email' AND password='$pass' ";
    $res_u = mysqli_query($db, $sql_u);
    if (mysqli_num_rows($res_u) > 0) {
        $_SESSION["logged_in"] = true;

       $_SESSION["email"] = $email;
        header( "refresh:2;url=../index2.php" );
       // include '../profile.php';
    }else{
        echo "<script>"."alert('Please Check Your Information');" . "</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        .signin-form{
            padding: 50px;
            margin: 10px
        }
        .button{
            margin-top: 50px;
            margin-left: 100px
        }
        .form-title{
           font-size: 40px;
            margin-left: 100px
        }

    </style>
</head>
<body>

<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="signup2.php" class="signup-image-link">Create an account</a>

                </div>
                <div class="signin-form">
                    <h2 class="form-title">Login</h2>
                    <form action ="login2.php" method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="your_email" id="your_name" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                        </div>
                       <!-- <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div> -->
                        <div class="button">
                            <input type="submit" name="login" id="signin" class="form-submit" value="login"/>
                        </div>
                    </form>
                    <!--<div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

</div>


<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
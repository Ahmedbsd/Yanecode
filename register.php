<?php
require 'connect.php';
if(isset($_POST["submit"])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pass = md5($_POST["pass"]);
    $confirmpass = md5($_POST["confirmpass"]);

    $duplicate = mysqli_query($conn,"SELECT * FROM `user` WHERE EMAIL_AD = '$email'");
    if(mysqli_num_rows($duplicate)>0){
      $message[]='Email already used';
    }else{
      if($pass == $confirmpass){

        $query="INSERT INTO `user` ( `F_NAME`, `L_NAME`, `EMAIL_AD`, `PASSW`, `USRTYPE`)
         VALUES ('$fname', '$lname', '$email', '$pass', 'User')";
        
        mysqli_query($conn,$query);
        header('location:Login.php');
      
      }else $message[] ='Password not matched';
    }
}
?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fontslog/icomoon/style.css">

    <link rel="stylesheet" href="csslog/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="csslog/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="csslog/style.css">

    <title>Login #2</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/pic.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Register in <strong>CineLibro</strong></h3>
            <form action="#" method="Post">
            <?php
                    if(isset($message)){
                        echo '<div class="alert alert-danger" role="alert" >';
                        foreach($message as $message){
                        echo '<div>'.$message.'</div>';
                        echo '</div>';
                        }
                    }
                    ?>
              <div class="form-group first">
                <label for="username">First name</label>
                <input type="text" name="fname" class="form-control" placeholder="enter your first name" id="username" Required>
              </div>
              <div class="form-group ">
                <label for="username">Last name</label>
                <input type="text" name="lname" class="form-control" placeholder="enter your last name" id="username" required>
              </div>
              <div class="form-group ">
                <label for="username">Email</label>
                <input type="text" name="email" class="form-control" placeholder="your-email@gmail.com" id="username" required>
              </div>
              <div class="form-group ">
                <label for="password">Password</label>
                <input type="password" name="pass" class="form-control" placeholder="Your Password" id="password" required>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Confirm Password</label>
                <input type="password" name="confirmpass" class="form-control" placeholder="Your Password" id="password" required>
              </div>

              <input type="submit" name="submit" value="Register" class="btn btn-block btn-primary">

              <span class="ml-auto"><a href="Login.php" class="forgot-pass">Already registered? Login now</a></span> 

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="jslog/jquery-3.3.1.min.js"></script>
    <script src="jslog/popper.min.js"></script>
    <script src="jslog/bootstrap.min.js"></script>
    <script src="jslog/main.js"></script>
  </body>
</html>
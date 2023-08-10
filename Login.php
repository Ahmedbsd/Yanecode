<?php

include 'connect.php';
session_start();

if(isset($_POST['submit'])){
  
   $email =  $_POST['email'];
   $pass =  md5($_POST['pass']);

   $select = mysqli_query($conn, "SELECT * FROM `user` WHERE EMAIL_AD = '$email' and PASSW = '$pass'") or die('query failed');
   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['U_ID'] = $row['USER_ID'];
      if($row['USRTYPE']=='Admin'){
        header('location:Admin/cinelibro.php');
      }else header('location:User/cinelibro.php');
      
   }else{
      $message[] = 'incorrect email or password!';
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
            <h3>Login to <strong>CineLibro</strong></h3>
            <form action="#" method="post">
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
                <label for="username">Username</label>
                <input type="text" name="email" class="form-control" placeholder="your-email@gmail.com" id="username" required>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" name="pass" class="form-control" placeholder="Your Password" id="password" required>
              </div>

              <input type="submit" name="submit" value="Log In" class="btn btn-block btn-primary">

              <span class="ml-auto"><a href="register.php" class="forgot-pass">D'ont have an account?Register now</a></span> 

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
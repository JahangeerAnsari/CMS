<?php
ob_start();
session_start();
require_once('../inc/db.php');

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con,strtolower(trim($_POST['username'])));
    $password = mysqli_real_escape_string($con, trim($_POST['password']));
    
    $check_username_query = "SELECT * FROM users WHERE username = '$username'";
    $check_username_run = mysqli_query($con, $check_username_query);
    if(mysqli_num_rows($check_username_run) > 0){
        $row = mysqli_fetch_array($check_username_run);
        $db_username = $row['username'];
        $db_password = $row['password'];
        $db_role = $row['role'];
        $db_auhtor_image = $row['image'];
        if($username == $db_username && $password == $db_password){
            header('Location: index.php');
            
           $_SESSION['username'] = $db_username;
            $_SESSION['role'] = $db_role;
           $_SESSION['author_image'] = $db_auhtor_image;
        }
        else{
             $error = "wrong Username or Password";
        }
        
    }
    else{
        $error = "wrong Username or Password";
    }
}
    
    ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/fixed.css">
    <link rel="stylesheet" href="bootstrap/css/animated.css">
    <link rel="stylesheet" href="bootstrap/css/login.css">
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <!----Script Source Files-->
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <title>LOGIN ADMIN</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
     <link href="/css/animated.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
      <link rel="icon" href="img/b.PNG">
    <!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin animated shake" action="" method="post">
        <h2 class="form-signin-heading">LOGIN HERE..</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
          <?php
              if(isset($error)){
                  echo "$error";
              }
              ?>
          </label>
        </div>
        <input type="submit" name="submit" value="LOGIN" class="btn btn-lg btn-primary btn-block">
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php
      require_once'./dbcon.php';
      session_start();

      if (isset($_SESSION['user_login'])) {
          header('location: index.php');
}

      if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username_check = mysqli_query($link,"SELECT * FROM `users` WHERE `username` = '$username';");
        if (mysqli_num_rows($username_check) > 0) {
          $row = mysqli_fetch_assoc($username_check);

          if ($row['password'] == ($password)) {

            $_SESSION['user_login']=$username;
              header('location: index.php');
          } else{

            $wrong_password = "Incorrect Password";
        }
          
          
        } else {
          $username_not_found = "This username not found";
        }
      
    }
?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet"  href="">

    <title>Student Management System</title>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Student Management System</h1>
      <br />
      <div class="row">
        <div class="col-md-4 offset-md-4">

          <h2 class="text-center">Admin Login Form</h2>

          <form action="login.php" method="POST">

            <div>
  <input type="text" placeholder="Username" name="username" required="" class="form-control" value="<?php if(isset($username)){echo $username;}?>" />
            </div>

            <div>
<input type="password" placeholder="Password" name="password" required="" class="form-control" value="<?php if(isset($password)){echo $password;}?>" />
            </div>
            <br />

            <div>
              <input type="submit" value="Login" name="login" class="btn btn-info float-right" />
            </div>
            

          </form>   
        </div>
      </div>
      <br />
      <?php if (isset($username_not_found)){echo '<div class="alert alert-danger col-md-4 offset-md-4">'."$username_not_found".'</div>';}?>
      <?php if (isset($wrong_password)){echo '<div class="alert alert-danger col-md-4 offset-md-4">'."$wrong_password".'</div>';}?>
      <br />
      <p class="col-md-4 offset-md-4">Don't have a account? Then please <a href="registration.php">Sign Up</a> </p>
      
    </div>

    
  </body>
</html>
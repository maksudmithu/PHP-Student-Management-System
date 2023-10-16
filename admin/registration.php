<?php
      require_once'./dbcon.php';
      session_start();

    if (isset($_POST['registration'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $c_password = $_POST['c_password'];
      $photo = explode('.', $_FILES['photo']['name']);
      $photo = end($photo);
      $photo_name = $username.'.'.$photo;

      
      $input_error = array();


      if (empty($name)) {
        $input_error['name']="The Name Field is Required";
      }
      if (empty($email)) {
        $input_error['email']="The Email Field is Required";
      }
      if (empty($username)) {
        $input_error['username']="The Username Field is Required";
      }
      if (empty($password)) {
        $input_error['password']="The Password Field is Required";
      }
      if (empty($c_password)) {
        $input_error['c_password']="The Confirm Password Field is Required";
      }  
      if (count($input_error)==0) {
        $email_check = mysqli_query($link,"SELECT * FROM `users` WHERE `email` = '$email';");
        if (mysqli_num_rows($email_check)==0) {
          $username_check = mysqli_query($link,"SELECT * FROM `users` WHERE `username` = '$username';");
          if (mysqli_num_rows($username_check)==0){
            if (strlen($username) > 4) {
              if (strlen($password) > 6) {
                if ($password == $c_password) {
                  
                    $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";

                    $result = mysqli_query($link,$query);

                    if ($result) {
                      $_SESSION['data_insert_success'] = "Data Insert Successful";
                      move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
                      header('location: registration.php');


                    } else{
                      $_SESSION['data_insert_error'] = "Data Insert Error";

                    }



                } else {
                  $password_not_match = "Confirm Password Doesn't Match";
                }
                
              } else {
                $password_size = "Password Must Be More Than 6 Character";

              }
            } else{
              $username_size = "Username Must Be More Than 4 Character";

            }

          } else{
            $username_error = "This Username Already Exists.";
          }
        }
        else {
         $email_error = "This Email Address Already Exists.";
        }
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>User Registration Form</title>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">User Registration Form</h1>
      <?php if (isset($_SESSION['data_insert_success'])) { echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} ?>
      <?php if (isset($_SESSION['data_insert_error'])) { echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';} ?>
      
      


      <hr />
      <div class="row">
        <div class="col-md-12">
          <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-4">
                  <input class="form-control" id="name" type="text" name="name" placeholder="Enter Your Name..." value="<?php if (isset($name)) {echo($name);} ?>" />
                  <label class="error">
                    <?php if (isset($input_error['name'])) { echo $input_error['name'];} ?>
                  </label>
                </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                  <input class="form-control" id="email" type="email" name="email" placeholder="Enter Your Email..." value="<?php if (isset($email)) {echo($email);} ?>" />
                    <label class="error"><?php if (isset($input_error['email'])) { echo $input_error['email'];} ?></label>
                    <label class="error"><?php if (isset($email_error)) { echo $email_error;} ?></label>
                </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-4">
                  <input class="form-control" id="username" type="text" name="username" placeholder="Enter Your Username..." value="<?php if (isset($username)) {echo($username);} ?>" />
              <label class="error"><?php if (isset($input_error['username'])) { echo $input_error['username'];} ?></label>
              <label class="error"><?php if (isset($username_error)) { echo $username_error;} ?></label>
              <label class="error"><?php if (isset($username_size)) { echo $username_size;} ?></label>
                </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-4">
                  <input class="form-control" id="password" type="password" name="password" placeholder="Enter Your Password..." value="<?php if (isset($password)) {echo($password);} ?>" />
              <label class="error"><?php if (isset($input_error['password'])) { echo $input_error['password'];} ?></label>
              <label class="error"><?php if (isset($password_size)) { echo $password_size;} ?></label>
                </div>
            </div>
            <div class="form-group row">
              <label for="c_password" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-4">
                  <input class="form-control" id="c_password" type="password" name="c_password" placeholder="Enter Your Confirm Password..." <?php if (isset($c_password)) {echo($c_password);} ?> />
          <label class="error"><?php if (isset($input_error['c_password'])) { echo $input_error['c_password'];} ?></label>
          <label class="error"><?php if (isset($password_not_match)) { echo $password_not_match;} ?></label>
                </div>
            </div>
            <div class="form-group row">
              <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-4">
                  <input class="form-control" id="photo" type="file" name="photo" placeholder="" />
                </div>
            </div>
            <div class="col-sm-6">
              <input type="submit" value="Registration" name="registration" class="btn btn-primary float-right" />
            </div>
          </form>
        </div>
      </div>
      <br />
      <p>If you have an account? Then please <a href="login.php">Login</a> </p>
      <hr />
      <footer>
        <p>Copyright &copy; <?php echo date('Y') ?> All Rights Reserved </p>
      </footer>
    </div>
  </body>
</html>
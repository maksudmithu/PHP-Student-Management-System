<?php
session_start();
Require_once './dbcon.php';

if (!isset($_SESSION['user_login'])) {
	header('location: login.php');
}



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Student Management System</title>

    <script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>


  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Student Management System</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto"> </ul>
        <a class="nav-link" href="index.php"><i class="fa fa-user"></i> Welcome: Aronno Mithu</a>
        <a class="nav-link" href="registration.php"><i class="fa fa-user-plus"></i> Add User</a>
        <a class="nav-link" href="index.php?page=user-profile"><i class="fa fa-user"></i> Profile</a>
        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
    </div>
    </nav>
    <br/>
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3">
          <ul class="list-group">
           <a href="index.php?page=dashboard"><li class="list-group-item active"><i class="fa fa-dashboard"></i> Dashboard</li></a> 
            <a href="index.php?page=add-student"><li class="list-group-item"><i class="fa fa-user-plus"></i> Add Student</li></a>
            <a href="index.php?page=all-students"><li class="list-group-item"><i class="fa fa-users"></i> All Students</li></a>
            <a href="index.php?page=all-users"><li class="list-group-item"><i class="fa fa-users"></i> All Users</li></a>
          </ul>
        </div>
        <div class="col-sm-9">
          
            <?php
            
            
            if (isset($_GET['page'])) {
                $page = $_GET['page'].'.php';
            } else{
              $page = "dashboard.php";
            }

            

            if (file_exists($page)) {
              Require_once $page;
            } else {
              Require_once '404.php';
            }

            ?>



          </div>
        </div>
         
      </div>


      
    </div>
    <footer class="footer-area">
      <p>Copyright Student Management System</p>
    </footer>
  </body>
</html>
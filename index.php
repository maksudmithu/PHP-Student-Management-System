<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="admin/style.css">

    <title>Students Management System</title>
  </head>      
  <body>

    <div class="container">
      <br />
          <a class="btn btn-primary float-right" href="admin/login.php">Login</a>
          <br />
          <br />
          <h1 class="text-center">Welcome to Students Management System</h1>
          <br />


          <div class="row">
            <div class="col-sm-6 offset-sm-3">
              <form action="" method="POST">
            <table class="table table-bordered">
              <tr>
                <td colspan="2" class="text-center"><label>Student Information</label></td>
              </tr>
              <tr>
                <td><label for="Choose">Choose Class</label></td>
                <td>
                  <select class="form-control" id="choose" name="choose">
                    <option value="">Select</option>
                    <option value="One">One</option>
                    <option value="2nd">Two</option>
                    <option value="Three">Three</option>
                    <option value="Four">Four</option>
                    <option value="Five">Five</option>
                    <option value="Six">Six</option>
                    <option value="Seven">Seven</option>
                    <option value="Eight">Eight</option>
                    <option value="Nine">Nine</option>
                    <option value="Ten">Ten</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><label for="roll">Roll</label></td>
                <td><input class="form-control" type="text" name="roll" placeholder="Enter Roll" pattern="[0-9]{6}"></td>
              </tr>
              <tr>
                <td colspan="2" class="text-center"><input class="btn btn-primary" type="submit" value="Show Info" name="show_info"></td>
              </tr>
            </table>
          </form>
            </div>
          </div>
          <br />
          <br />

          <?php
          Require_once './admin/dbcon.php';
          	if (isset($_POST['show_info'])) {
          		$choose = $_POST['choose'];
          		$roll = $_POST['roll'];
          		$result = mysqli_query($link, "SELECT * FROM `student_info` WHERE `class` = '$choose' AND `roll` = '$roll'");
          		

          		if (mysqli_num_rows($result) == 1) {
          			$row = mysqli_fetch_assoc($result);

          ?>

          <div class="row">
		          	<div class="col-sm-6 offset-sm-3">
		          		<table class="table table-bordered">
		          			<tr>
		          				<td rowspan="5">
		          					<img src="admin/student_images/<?php echo $row['photo'];?>" class="img-thumbnail" style="width: 150px">
		          				</td>
		          				<td>Name</td>
		          				<td><?php echo ucwords($row['name']); ?></td>
		          				
		          				
		          			</tr>
		          			<tr>
		          				<td>Roll</td>
		          				<td><?php echo ucwords($row['roll']); ?></td>
		          				
		          			</tr>
		          			<tr>
		          				<td>Class</td>
		          				<td><?php echo ucwords($row['class']); ?></td>
		          				
		          			</tr>
		          			<tr>
		          				<td>City</td>
		          				<td><?php echo ucwords($row['city']); ?></td>
		          				
		          			</tr>
		          			<tr>
		          				<td>Parent Contact Number</td>
		          				<td><?php echo ucwords($row['pcontact']); ?></td>
		          				
		          			</tr>
		          		</table>
		          		
		          	</div>
		          </div>		


          <?php
          		} else {
          			?>

          			<script type="text/javascript">
          				alert('Data Not Found');
          			</script>



          <?php } } ?>

    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
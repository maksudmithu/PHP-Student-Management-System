

<h1 class="text-primary"><i class="fa fa-pencil-square"></i> Update Student <small>Update Student</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item"><a href="index.php?page=all-students"><i class="fa fa-users"></i> All Students</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-pencil-square"></i> Update Student</li>
  </ol>
</nav>

<?php

$id 		= base64_decode($_GET['id']);
$db_data 	= mysqli_query($link, "SELECT * FROM `student_info` WHERE id='$id'");
$db_row 	= mysqli_fetch_assoc($db_data);



if (isset($_POST['update-student'])) {
		$name 	  =     $_POST['name'];
		$roll     = 	$_POST['roll'];
		$city     = 	$_POST['city'];
		$pcontact = 	$_POST['pcontact'];
		$class    = 	$_POST['class'];

		
		$query = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE `id`= '$id'";
		$result = mysqli_query($link, $query);

		if ($result) {
			header('location: index.php?page=all-students');
		}
		
	} 



?>

	







<div class="row">
	
	<div class="col-sm-6">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required="" value="<?php echo($db_row['name']); ?>">
			</div>
			<div class="form-group">
				<label for="roll">Student Roll</label>
				<input type="text" name="roll" placeholder="Student Roll" id="roll" class="form-control" required="" pattern="[0-9]{6}" value="<?php echo($db_row['roll']); ?>">
			</div>
			<div class="form-group">
				<label for="city">Student City</label>
				<input type="text" name="city" placeholder="Student City" id="city" class="form-control" required="" value="<?php echo($db_row['city']); ?>">
			</div>
			<div class="form-group">
				<label for="pcontact">Parent Contact No</label>
				<input type="text" name="pcontact" placeholder="01*********" id="pcontact" class="form-control" required="" pattern="01[3|4|5|6|7|8|9][0-9]{8}" value="<?php echo($db_row['pcontact']); ?>">
			</div>
			<div class="form-group">
				<label for="class">Student Class</label>
				<select id="class" class="form-control" name="class" required="">
					<option value="">Select</option>
					<option <?php echo $db_row['class']=='One'?'selected=""':''; ?> value="One">One</option>
					<option <?php echo $db_row['class']=='Two'?'selected=""':''; ?> value="Two">Two</option>
					<option <?php echo $db_row['class']=='Three'?'selected=""':''; ?> value="Three">Three</option>
					<option <?php echo $db_row['class']=='Four'?'selected=""':''; ?> value="Four">Four</option>
					<option <?php echo $db_row['class']=='Five'?'selected=""':''; ?> value="Five">Five</option>
					<option <?php echo $db_row['class']=='Six'?'selected=""':''; ?> value="Six">Six</option>
					<option <?php echo $db_row['class']=='Seven'?'selected=""':''; ?> value="Seven">Seven</option>
					<option <?php echo $db_row['class']=='Eight'?'selected=""':''; ?> value="Eight">Eight</option>
					<option <?php echo $db_row['class']=='Nine'?'selected=""':''; ?> value="Nine">Nine</option>
					<option <?php echo $db_row['class']=='Ten'?'selected=""':''; ?> value="Ten">Ten</option>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" value="Update Student" name="update-student" class="btn btn-primary float-right" required="">
			</div>
		
		</form>	

		
	</div>
	


</div>
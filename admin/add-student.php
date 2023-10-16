

<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small>Add New Student</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i> Add Student</li>
  </ol>
</nav>

	<?php 
	if (isset($_POST['add-student'])) {
		$name 	  =     $_POST['name'];
		$roll     = 	$_POST['roll'];
		$city     = 	$_POST['city'];
		$pcontact = 	$_POST['pcontact'];
		$class    = 	$_POST['class'];

		$picture = explode('.', $_FILES['picture']['name']);

		$picture_extension = end($picture);
		$picture_name = $roll.'.'.$picture_extension;
		
		$query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$picture_name')";

		$result = mysqli_query($link, $query);

		if ($result) {
			$success = "Data Insert Success";
			move_uploaded_file($_FILES['picture']['tmp_name'], 'student_images/'.$picture_name);
		} else {
			$error = "Wrong";
		} 
	} 


	?>




<div class="row">
	<?php if (isset($success)) { echo '<p class="alert alert-success col-sm-6">'.$success.'</p>'; } ?>
	<?php if (isset($error)) { echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>'; } ?>
</div>


<div class="row">
	
	<div class="col-sm-6">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="roll">Student Roll</label>
				<input type="text" name="roll" placeholder="Student Roll" id="roll" class="form-control" required="" pattern="[0-9]{6}">
			</div>
			<div class="form-group">
				<label for="city">Student City</label>
				<input type="text" name="city" placeholder="Student City" id="city" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="pcontact">Parent Contact No</label>
				<input type="text" name="pcontact" placeholder="01*********" id="pcontact" class="form-control" required="" pattern="01[3|4|5|6|7|8|9][0-9]{8}">
			</div>
			<div class="form-group">
				<label for="class">Student Class</label>
				<select id="class" class="form-control" name="class" required="">
					<option value="">Select</option>
					<option value="One">One</option>
					<option value="Two">Two</option>
					<option value="Three">Three</option>
					<option value="Four">Four</option>
					<option value="Five">Five</option>
					<option value="Six">Six</option>
					<option value="Seven">Seven</option>
					<option value="Eight">Eight</option>
					<option value="Nine">Nine</option>
					<option value="Ten">Ten</option>
				</select>
			</div>
			<div class="form-group">
				<label for="picture">Picture</label>
				<input type="file" name="picture" id="picture" required="">
			</div>
			<div class="form-group">
				<input type="submit" value="Add Student" name="add-student" class="btn btn-primary float-right" required="">
			</div>
		
		</form>	

		
	</div>
	


</div>
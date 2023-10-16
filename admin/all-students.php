

<h1 class="text-primary"><i class="fa fa-users"></i> All Students <small>All Students</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"></i> All Students</li>
  </ol>
</nav>



<div class="table-responsive">
              <table id="data" class="table table-hover table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Class</th>
                    <th>City</th>
                    <th>Contact</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 

                  $db_stu_info =  mysqli_query($link,"SELECT * FROM `student_info`");
                  while ($row = mysqli_fetch_assoc($db_stu_info)){ ?>

                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo ucwords($row['name']); ?></td>
                  <td><?php echo $row['roll']; ?></td>
                  <td><?php echo $row['class']; ?></td>
                  <td><?php echo ucwords($row['city']); ?></td>
                  <td><?php echo $row['pcontact']; ?></td>
                  
                  <td><img style="width: 100px" src="student_images/<?php echo $row['photo'];?>"></td>
                  <td>
                    <a href="index.php?page=update-student&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                  
                    <a href="delete-student.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>

                <?php 
                    
                    }

                  ?>
              </tbody>
              </table>
              </div>
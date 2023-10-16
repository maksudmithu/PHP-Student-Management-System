

<h1 class="text-primary"><i class="fa fa-users"></i> All Users <small>All Users</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"></i> All Users</li>
  </ol>
</nav>



<div class="table-responsive">
              <table id="data" class="table table-hover table-bordered table-striped">
                <thead>
                  <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Photo</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 

                  $db_stu_info =  mysqli_query($link,"SELECT * FROM `users`");
                  while ($row = mysqli_fetch_assoc($db_stu_info)){ ?>

                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo ucwords($row['name']); ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['username']; ?></td>                  
                  <td><img style="width: 100px" src="images/<?php echo $row['photo'];?>"></td>
                </tr>

                <?php 
                    
                    }

                  ?>
              </tbody>
              </table>
              </div>
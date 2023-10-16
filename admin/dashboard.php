
            <h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small>Statistics Overview</small></h1>
              <ol class="breadcrumb">
                <li class="active" aria-current="page"><i class="fa fa-dashboard"></i> Dashboard</li>
              </ol>

              <?php
              $count_student = mysqli_query($link, "SELECT * FROM `student_info`");
              $total_student = mysqli_num_rows($count_student);

              $count_users = mysqli_query($link, "SELECT * FROM `users`");
              $total_users = mysqli_num_rows($count_users);

              

              ?>

              <div class="row">
                <div class="col-sm-4">
                  <div class="bg-">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-xs-3">
                          <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                          <div class="float-right" style="font-size: 45px"><?php echo $total_student; ?></div>
                          <div class="clearfix"></div>
                          <div class="float-right">All Students</div>
                        </div>
                      </div>
                    </div>
                    <a href="index.php?page=all-students">
                      <div class="card-footer">
                      <span class="float-left">All Students</span>
                      <span class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                    </a>

                  </div>

                </div>
                <div class="col-sm-4">
                  <div class="bg-">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-xs-3">
                          <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9">
                          <div class="float-right" style="font-size: 45px"><?php echo $total_users; ?></div>
                          <div class="clearfix"></div>
                          <div class="float-right">All Users</div>
                        </div>
                      </div>
                    </div>
                    <a href="index.php?page=all-users">
                      <div class="card-footer">
                      <span class="float-left">All Users</span>
                      <span class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                    </a>

                  </div>
                  
                </div>

              </div>
              <hr />
              <h3>New Student</h3>
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
                </tr>

                <?php 
                    
                    }

                  ?>
              </tbody>
              </table>
              </div>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>

<!-- /.row -->
      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Congratulations, you are logged in.</h4>
                <label>Total No of Users : <?php echo $user_count; ?></label>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>User</th>
                      <th>Mobile No.</th>
                      <th>User last login</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $this->session->userdata('name'); ?></td>
                      <td><?php echo $this->session->userdata('email'); ?></td>
                      <td><?php echo $this->session->userdata('mobile_no'); ?></td>
                      <td><?php echo $last_user_login; ?></td>
                    </tr>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
       </div> 

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-8">
<?php
    
    // Add a link to logout
    echo '<br /><a href="home/do_logout">Logout</a>';
       
    // Add a link to reports
    echo "   | <a href=".base_url() . "index.php/report/>Reports Page</a>"; 


?>
</div>
</div>

</body>
</html>



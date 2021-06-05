<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
 
<body>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-8">
<?php
    // Add a link to logout
    echo "<br /><a href=".base_url() . "index.php/home/do_logout". ">Logout</a>";

     // Add a link to logout
     echo " | <a href=".base_url() . "index.php/report". ">Go to Report Page</a>";
?>
</div>
</div>


<div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">User Logs</h4>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th>Sr No</th>
                    <th>Email Id</th>
                    <th>login On</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php
                        $i=1;
                        foreach($user_data as $row)
                        {
                        echo "<tr>";
                        echo "<td>".$i. "</td>";
                        echo "<td>".$row->email."</td>";
                        echo "<td>".$row->last_login."</td>";
                        echo "</tr>";
                        $i++;
                        }
                    ?>
                    
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
       </div> 

      





</body>
</html>
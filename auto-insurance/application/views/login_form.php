<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/adminlte.min.css">
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/all.min.css">

</head>
<body>

<div class="col-md-2"></div>
<div class="col-md-4">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Login Form</h3>
            </div>
         
            <form class="form-horizontal" action="<?php echo base_url('index.php/login/process'); ?>" method='post' name='process'>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value=""  placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" id="password" name="password" class="form-control"  placeholder="Password">
                  </div>
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
				<a class="text-center" href="<?php echo base_url(); ?>"> Register Here</a>
                <button type="submit" name="submit" class="btn btn-info pull-right">Sign in</button>
				
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
       
         
          
        </div>



	</body>
</html>
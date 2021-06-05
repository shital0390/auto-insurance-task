
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/adminlte.min.css">
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/all.min.css">

<!-- captcha refresh code -->
<script>
$(document).ready(function(){
    $('.refreshCaptcha').on('click', function(){
        $.get('<?php echo base_url().'index.php/registration/index/refresh'; ?>', function(data){
            $('#captImg').html(data);
        });
    });
});
</script>
</head>

<body>

<div class="col-md-2"></div>

    <div class="col-md-8" style="margin-top:20px">
	    <?php
		
		   echo form_open_multipart('registration/index');
		   echo validation_errors();
		   if (isset($success))
		   echo '<p>'.$success.'</p>';
	    ?>
	</div>
<div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registration Form</h3>
            </div>
			
            <form enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url('index.php/login/process'); ?>" method='post' name='process'>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3"  class="col-sm-4 control-label">Full Name</label>

                  <div class="col-sm-8">
                    <input type="text" style="margin-to:20px;" class="form-control" id="name" name="name" value=""  placeholder="Name">
                  </div>
                </div>

				<div class="form-group">
                  <label for="inputEmail3" style="margin-top:20px" class="col-sm-4 control-label">Mobile No.</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" style="margin-top:20px;" id="mobile_no" name="mobile_no" value=""  placeholder="Mobile No.">
                  </div>
                </div>

				<div class="form-group">
                  <label for="inputEmail3" style="margin-top:20px" class="col-sm-4 control-label">Email</label>

                  <div class="col-sm-8">
                    <input type="text" style="margin-top:20px" class="form-control" id="email" name="email" value=""  placeholder="Email Id">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" style="margin-top:20px" class="col-sm-4 control-label">Password</label>

                  <div class="col-sm-8">
                    <input type="password" style="margin-top:20px" id="password" name="password" class="form-control"  placeholder="Password">
                  </div>
                </div>

				<!--<div class="form-group">
                  <label for="image" style="margin-top:20px" class="col-sm-4 control-label">User Image</label>

                  <div class="col-sm-8">
                    <input type="file" style="margin-top:20px" id="user_img" name="user_img" class="form-control"  placeholder="user image">
                  </div>
                </div>-->

				<!--<div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label"></label>

                  <div class="col-sm-8">
				  <p id="captImg"><?php echo $captchaImg; ?></p>
					<p>Can't read the image? click <a href="javascript:void(0);" class="refreshCaptcha">here</a> to refresh.</p>
                  </div>
                </div>-->

				<?php /*
				<div class="form-group">
					
					
					<!--<form method="post">-->
					<label for="image" class="col-sm-4 control-label">Enter the code</label>
					<div class="col-sm-8">
						<input class="form-control"  type="text" name="captcha" value=""/>
						<!--<input type="submit" name="submit" value="SUBMIT"/>-->
					<!--</form>-->
					</div>

               
              	</div>
				  */ ?>
             
              <div class="box-footer">
               
			
                

				<button type="submit" style="margin-top:20px" name="submit" class="btn btn-info pull-right">Register</button>
				<p style="margin-top:20px">Already have account? click <a class="text-center" href="<?php echo base_url('index.php/login/'); ?>" >here</a> to login.</p>
				
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
       
         
          
        </div>



	</body>
</html>
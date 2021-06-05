<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-md-2"></div>

<div class="col-md-5" id='edit_form' style="margin-top:20px">



<form action="<?php echo base_url() ?>index.php/report/update_data" method="post">

<?php foreach($e_data as $key){ ?>

<input type="hidden" name="id" value="<?php echo $key->id ;?>">

<div class="form-group">
<label>Name</label>
<input type="text" name="name" value="<?php echo $key->name; ?>" class="form-control" placeholder="Enter Your Name" required>
</div>

<div class="form-group">
<label>Email</label>
<input type="text" name="email" value="<?php echo $key->email; ?>" class="form-control" placeholder="Enter Your email" required>
</div>

<?php } ?>
<input type="submit" name="submit" value="Update" class="btn btn-success form-group">
</form>





</body>
</html>



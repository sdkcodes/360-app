<!DOCTYPE html>
<html lang="en">
<head>
	<title>360degreeemn-Login to Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link  href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
	<link  href="<?php echo base_url('assets/css/main.css') ?>" rel="stylesheet"/>
	<link  href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet"/>
</head>
<body>
<div class="main">
	<div class="pannel">
		<div class="panel panel-default" >
			<div class="panel-heading">
			</div>
			<div class="panel-body">
				<br />
				<div class="panel-title">
					<img src="<?php echo base_url('assets/img/LOGO.png') ?>">
				</div>
				<br />
					<form role="form" class="form-horizontal bs-example bs-example-form" action="<?php echo site_url('auth/register') ?>" method="post">
						<br />
                        <?php echo validation_errors() ?>
						<div class="input-group">
             				<span class="input-group-addon">
              					<span class="glyphicon glyphicon-user"></span>
             				</span>
             				<input name="username" type="text" class="form-control" placeholder="Username" >
        				 </div>
        				 <br />
        				 <div class="input-group">
             				<span class="input-group-addon">
              					<span class="glyphicon glyphicon-user"></span>
             				</span>
             				<input type="text" class="form-control" placeholder="Name" name="name" >
        				 </div>
        				 <br />
        				 	<div class="input-group">
             				<span class="input-group-addon">
              					<span class="glyphicon glyphicon-envelope"></span>
             				</span>
             				<input type="text" class="form-control" name="email" placeholder="E-mail" >
        				 </div>
        				 <br />
        				 <div class="input-group">
             				<span class="input-group-addon">
              					<span class="glyphicon glyphicon-lock"></span>
             				</span>
             				<input type="password" class="form-control" name="password" placeholder="Password" >
             				<input type="password" class="form-control" name="confpassword" placeholder="Re-enter Password" >
        				 </div>
        				 <br />
        				 <button type="submit" class="btn btn-default btn-md summit">Register</button>
        				 <br />
        				 <br />
					</form>
			</div>
		</div>
	</div>
</div><!--main-->
<footer>
</footer>
<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
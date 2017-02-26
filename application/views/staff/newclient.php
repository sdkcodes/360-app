<div class="main col-sm-offset-3 col-sm-6">
    <?php echoBootstrapAlert() ?>
  <div class="pannel">
    <div class="panel panel-default" >
      <div class="panel-heading">
        <h2><center>Add New Client</center></h2>
      </div>
      <div class="panel-body">
        <br />
        
          <form role="form" class="form-horizontal bs-example bs-example-form" action="<?php echo site_url('staff/addclient') ?>" method="post">
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
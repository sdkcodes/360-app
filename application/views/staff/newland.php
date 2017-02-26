
<div class="main col-sm-offset-3 col-sm-6">
  <?php echoBootstrapAlert() ?>
	<div class="pannel row">
		<div class="panel panel-default" >
			<div class="panel-heading">
                <h2><center>Add New Land</center></h2>
			</div>
			<div class="panel-body">
				
				<br />
					<form role="form" class="form-horizontal bs-example bs-example-form" action="<?php echo site_url('staff/addland') ?>" method="post">
						<br />
                        <?php echo validation_errors() ?>
						<div class="input-group">
             				<span class="input-group-addon">
              					<span class="glyphicon glyphicon-map-marker"></span>
             				</span>
             				<input name="location" type="text" class="form-control" placeholder="Location" >
        				 </div>
        				 <br />
                 <input type="hidden" name="client-id" value="<?php echo $clientId ?>">
        				 <div class="input-group">
             				<span class="input-group-addon">
              					<span class="">₦</span>
             				</span>
             				<input type="number" class="form-control" placeholder="Price" name="price" >
        				 </div>
        				 <br />
        				 	<div class="input-group">
             				<span class="input-group-addon">
              					<span class="glyphicon glyphicon-paperclip"></span>
             				</span>
             				<input type="number" class="form-control" placeholder="Size" id="size" >
                            <input type="hidden" name="dimension" class="form-control" placeholder="Dimension"  id="dimension" >
                            <select name="unit" class="form-control" id="unit">
                                <option value="">Select Units</option>
                                <option value="plot">Plot</option>
                                <option value="acre">Acre</option>
                                <option value="hectare">Hectare</option>
                            </select>
        				 </div>
        				 <br />
        				 
        				 <br />
        				 <button type="submit" class="btn btn-success btn-md summit">Add Land</button>
        				 <br />
        				 <br />
					</form>
			</div>
		</div>
	</div>
</div><!--main-->
<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script>
    // if ($("#size").val() == ""){
    //     $("#unit").hide();
    // }
    if ($("#size").val() == ""){
        $("#unit").hide();
    }
    $("#size").focus(function(){
        $("#unit").show();
    })
    $("#unit").change(function(){
        var unit = $(this).val();
        
        $("#dimension").val($("#size").val() + " " + unit);
        
    })
</script>
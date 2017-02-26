
<div class="main" style="padding-top: 10%">
  
  <div class="pannel row">
    <div class="panel panel-default col-sm-6 col-sm-offset-3" >
    <?php echoBootstrapAlert() ?>
      <div class="panel-heading">
                <center><h2>Add New Payment</h2></center >
      </div>
      <div class="panel-body">
        
        <br />
          <form role="form" class="form-horizontal bs-example bs-example-form" action="<?php echo site_url('staff/addpayment') ?>" method="post">
            
                <?php echo validation_errors() ?>
                <br/>
                <div class="input-group">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-map-marker"></span>
                  </span>
                  <select name="land" class="form-control" id="land">
                    <option value="">Payment For</option>
                    <?php foreach ($lands as $land): ?>
                      <option value="<?php echo $land->uniqueId ?>"><?php echo $land->quantity . " " . $land->location ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <br />
                        
            <div class="input-group">
              <span class="input-group-addon">
                  <span class="">₦</span>
              </span>
              <input type="hidden" name="client-id" value="<?php echo $clientId ?>">
              <input name="amount" type="text" class="form-control" placeholder="Amount Paid" >
           </div>
           <br/>
           
           <br/>
                <div class="radio">
                  <label><input type="radio" name="status" class="radio-inline" value="1">Complete</label>
                  <label><input type="radio" name="status" class="form-inline" value="2">Ongoing</label>
                </div>
                 <br />
                 <span class="h3 text-primary">Amount Paid: <span id="amount-paid"></span></span>
                 <br/>
                 <span class="h3 text-primary">Total Price: <span id="total-price"></span></span>
                 <br>
                 <span class="h3 text-warning">To be balanced: <span id="price-difference"></span></span>
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
        
    });
</script>
<script>
  $(document).ready(function(){
    $("#land").change(function(){
      var load_url = "<?php echo site_url('/staff/getlandpayment_ajax') ?>";
    $.post(load_url, {land_id: $("#land").val()}, function(data, status){
      console.log(data);
      var data = JSON.parse(data);
      $("#amount-paid").text("₦" + data.amount_paid);
      $("#total-price").text("₦" + data.price);
      $("#price-difference").text("₦" + data.price_difference);
    });
    })
     
  }
   
    );
</script>
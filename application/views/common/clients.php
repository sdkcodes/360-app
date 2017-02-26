<div id="page-wrapper">
	<div class="main">
		<div class="row">
		    <div class="col-lg-11">
		        <?php echoBootstrapAlert() ?>
		        <!-- /.panel -->
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                <i class="fa fa-bar-chart-o fa-fw"></i>Current Client Statistics <span id="timespan"></span>
		                <div class="pull-right">
		                    <div class="btn-group">
		                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
		                            Last 7 Days
		                            <span class="caret"></span>
		                        </button>
		                        <ul class="dropdown-menu pull-right" role="menu">
		                            <li><a href="#" class="client-link" data-client-range="7">Last 7 Days</a>
		                            </li>
		                            <li><a href="#" class="client-link" data-client-range="30">Last 30 Days</a>
		                            </li>
		                            <li><a href="#" class="client-link" data-client-range="180">Last 6 Months</a>
		                            </li>
		                            <li class="divider"></li>
		                            <li><a href="#" class="client-link" data-client-range="365">Last 12 Months</a>
		                            </li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		            <!-- /.panel-heading -->
		            <div class="panel-body" >
		                <div class="row" >
		                    <div class="col-lg-12">
		                        <div class="table-responsive">
		                            <table class="table table-bordered table-hover table-striped">
		                                <thead>
		                                    <tr>
		                                    	<th>S/N</th>
		                                       <th>Client ID</th>
		                                        <th>Created on</th>
		                                        <th>Name</th>
		                                        <th>Email</th> 
		                                        <?php if (is_staff()): ?>
			                                        <th></th>
			                                        <th></th>
			                                        <th></th>
			                                        <th></th>
			                                    <?php endif; ?>
			                                    <?php if (is_admin()): ?>
			                                    	<th>Added By</th>
			                                    <?php endif; ?>
		                                    </tr>
		                                </thead>
		                                <tbody class="client-table">
		                                	<?php $serialCounter = 1; ?>
		                                   <!-- populated using javascript (jquery) ?> -->
		                                   <?php if (isset($clients) AND !empty($clients)): ?>
		                                   		<?php foreach ($clients as $client): ?>
		                                   			<tr>
		                                   				<td><?php echo $serialCounter ?></td>
		                                   				<td><?php echo $client->uniqueId ?></td>
		                                   				<td><?php echo $client->created_at ?></td>
		                                   				<td><?php echo $client->name ?></td>
		                                   				<td><?php echo $client->email ?></td>
		                                   				<?php if (is_staff()): ?>
		                                   					<td><a href="<?php echo site_url('staff/newland/' . $client->uniqueId) ?>" class="btn btn-link">Add Land</a></td>

			                                   				<td><a href="<?php echo site_url('staff/newpayment/' . $client->uniqueId) ?>" class="btn btn-link">Add Payment</a></td>
			                                   				<td><a href="<?php echo site_url('staff/uploaddoc/' . $client->uniqueId) ?>">Upload Doc</a></td>
			                                   				<td><a href="<?php echo site_url('client/viewdocs/' . $client->uniqueId) ?>">View Docs</a></td>
			                                   			<?php endif; ?>
			                                   			<?php if (is_admin()): ?>
			                                   				<td>
			                                   				<?php $staff = get_user_by_id($client->uniqueId); ?>
			                                   				<?php echo $staff->name ?>
			                                   				</td>
			                                   			<?php endif; ?>
		                                   			</tr>
		                                   		<?php endforeach; ?>
		                                   <?php endif; ?>
		                                </tbody>
		                            </table>
		                        </div>
		                    </div>
		                </div>
		            </div><!-- /.panel-body -->
		       </div><!-- /.panel panel-default -->
		    </div><!-- / .col -->
		</div><!-- /.row -->
	</div>
</div>
<script src="<?php echo base_url('assets/vendor/jquery/jquery.j') ?>"></script>
<script>
    $(document).ready(
        function(){var load_url = "<?php echo site_url('staff/getclients') ?>";
                $.get(load_url, function(data, status){
                    console.log(data);
                    //data = JSON.parse(data);

                    $(".client-table").html(data);
                })}
    );

    $(document).ready(function(){
        $(".client-link").click(function(){
            
            var load_url = "<?php echo site_url('staff/getclients') ?>";
            var days = $(this).data("client-range");
            
            $.post(load_url, {days: days}, function(data, status){

                $("#timespan").text(" for " + $(".client-link").html());
                $(".client-table").html(data);
            });
        })
    });
</script>
<script>
    function populateTable(records){
        var table = "";
        for(var i = 0; i <= records.length; i++){

            table += "<tr>";
            table += "<td>" + records[i].uniqueId + "</td>";
            table += "<td>" + records[i].created_at + "</td>";
            table += "<td>" + records[i].name + "</td>";
            table += "<td>" + records[i].email + "</td>";
            table += "</tr>";
            return table;
        }
    };
</script>
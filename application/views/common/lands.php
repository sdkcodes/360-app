<div id="page-wrapper">
	<div class="main">
		<div class="row">
		    <div class="col-lg-8">
		        
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
		                                       <th>Client ID</th>
		                                        <th>Date</th>
		                                        <th>Name</th>
		                                        <th>Email</th> 
		                                    </tr>
		                                </thead>
		                                <tbody class="client-table">
		                                   <!-- populated using javascript (jquery) ?> -->
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
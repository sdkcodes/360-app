        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php echoBootstrapAlert() ?>
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $clientsCount ?></div>
                                    <div>Clients</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('clients/staff') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">See Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $landsCount ?></div>
                                    <div>Lands Allocated</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">See Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $ongoingPaymentsCount ?></div>
                                    <div>Ongoing Payments</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('payments/ongoing/staff') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">See Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $completedPaymentsCount ?></div>
                                    <div>Completed Payments</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('payments/completed/staff') ?>">
                            <div class="panel-footer">
                                <span class="pull-left">See Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
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
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<script src="<?php echo base_url('assets/vendor/jquery/jquery.js') ?>"></script>
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
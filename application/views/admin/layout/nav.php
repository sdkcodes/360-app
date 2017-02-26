
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img id="logo" src="<?php echo base_url('assets/img/LOGO.png') ?>"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    
                </li>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('auth/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Client Statistcs<span class="fa arrow"></span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                           
                                <li>
                                    <a href="<?php echo site_url('clients') ?>">Clients</a>
                                </li>
                             
                        </li>
                         <li>
                            <a href="#">Payments</a>
                        </li>
                        <li>
                            <li>
                                <a href="<?php echo site_url('payments/completed') ?>">Completed Payments</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('payments/ongoing') ?>">Ongoing Payments</a>
                            </li>
                        </li>
                        <!-- <li> -->
                            <!-- <a href="#"><i class="fa fa-table fa-fw"></i>Land Statistics<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level"> -->
                                
                                <!-- <li>
                                    <a href="#">Available Land</a>
                                </li> -->
                                <!--
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>-->
                                 <!-- <li>
                                    <a href="#">Land Being Bought<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Bought Lands</a>
                                        </li>
                                        
                                    </ul> -->
                                    <!-- /.nav-third-level -->
                                <!-- </li>
                            </ul> -->
                        <!-- </li> -->
                        <li>
                            <a href="#"><i class="fa fa-user"></i> Admin Control<span class="fa arrow"></span></a>
                            
                                 <li>
                                    <a href="#">Accounts<span class="fa arrow"></span></a>
                                    
                                    <!-- /.nav-third-level -->
                                </li>
                            
                        </li>
                        <li>
                            <li>
                                <a href="<?php echo site_url('admin/newstaff') ?>">Add Staff</a>
                            </li>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
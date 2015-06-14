<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Parser - Administration panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>public/ng/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>public/ng/admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url(); ?>public/ng/admin/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>public/ng/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>public/ng/admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>public/ng/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
    
    <!--<link href="<?php echo base_url(); ?>public/ng/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css">-->
    <!--<link href="<?php echo base_url(); ?>public/ng/admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css">-->
    
    
    <script src="<?php echo base_url(); ?>public/ng/admin/js/filesaver.min.js"></script>
        <!-- AngularJS JavaScript -->
    <script src="<?php echo base_url(); ?>public/ng/admin/js/angular.min.js"></script>
    <script src="<?php echo base_url(); ?>public/ng/admin/js/angular-route.js"></script>
    <script src="<?php echo base_url(); ?>public/ng/admin/myscripts/app.js"></script>
    <script src="<?php echo base_url(); ?>public/ng/admin/myscripts/userctrl.js"></script>
    <script src="<?php echo base_url(); ?>public/ng/admin/myscripts/menuctrl.js"></script>
    <script src="<?php echo base_url(); ?>public/ng/admin/myscripts/newsctrl.js"></script>
    <script src="<?php echo base_url(); ?>public/ng/admin/myscripts/automatectrl.js"></script>
    <script src="<?php echo base_url(); ?>public/ng/admin/myscripts/reportctrl.js"></script>
    
</head>

<body ng-app="adminApp" ng-controller="mainCtrl">

    <div id="wrapper" >
        <div ng-if="is_loggedin">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#/">Web Parser - Administration Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <i class="fa fa-user fa-fw"></i>  Welcome, {{username}}
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
                
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="#/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#/listusers"><i class="fa fa-bars fa-fw"></i> List Users</a>
                                </li>
                                <li>
                                    <a href="#/adduser"><i class="fa fa-plus-square fa-fw"></i> Add User</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bookmark fa-fw"></i> Menu<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#/listmenuitems"><i class="fa fa-bars fa-fw"></i> List Menu Items</a>
                                </li>
                                <li>
                                    <a href="#/addmenuitem"><i class="fa fa-plus-square fa-fw"></i> Add Menu Item</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-bookmark fa-fw"></i> News<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#/listnews"><i class="fa fa-bars fa-fw"></i> List News</a>
                                </li>
                                <li>
                                    <a href="#/addnews"><i class="fa fa-plus-square fa-fw"></i> Add News</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-bookmark fa-fw"></i> Scrapping<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#/automate"><i class="fa fa-bars fa-fw"></i> Automate</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-bookmark fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#/simplereport"><i class="fa fa-bars fa-fw"></i> Simple Report</a>
                                </li>
                                 <li>
                                    <a href="#/simplereport"><i class="fa fa-bars fa-fw"></i> Most Viewed Report</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        </div>
        <div ng-view>
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>public/ng/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>public/ng/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>public/ng/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>public/ng/admin/bower_components/raphael/raphael-min.js"></script>
    <!--<script src="<?php echo base_url(); ?>public/ng/admin/bower_components/morrisjs/morris.min.js"></script>-->
    <!--<script src="<?php echo base_url(); ?>public/ng/admin/js/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>public/ng/admin/dist/js/sb-admin-2.js"></script>
    
    
     <!--Metis Menu Plugin JavaScript--> 
    <!--<script src="<?php echo base_url(); ?>public/ng/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>-->

 <!--DataTables JavaScript--> 
    <!--<script src="<?php echo base_url(); ?>public/ng/admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>-->
    <!--<script src="<?php echo base_url(); ?>public/ng/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>-->



</body>

</html>

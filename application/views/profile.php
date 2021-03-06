
﻿<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title> user profile </title>
    <!-- BOOTSTRAP STYLE SHEET -->
    <link href="<?php echo base_url(); ?>public/ng/css/bootstrap.min.css" rel="stylesheet" />
    <!-- FONT-AWESOME STYLE SHEET FOR BEAUTIFUL ICONS -->
    <link href="<?php echo base_url(); ?>public/ng/css/font-awesome.css" rel="stylesheet" />
     <!-- CUSTOM STYLE CSS -->
    <style type="text/css">
               .btn-social {
            color: white;
            opacity: 0.8;
        }

            .btn-social:hover {
                color: white;
                opacity: 1;
                text-decoration: none;
            }

        .btn-facebook {
            background-color: #3b5998;
        }

        .btn-twitter {
            background-color: #00aced;
        }

        .btn-linkedin {
            background-color: #0e76a8;
        }

        .btn-google {
            background-color: #c32f10;
        }
    </style>
</head>
<body>
   


    <div class="container">
        <section style="padding-bottom: 50px; padding-top: 50px;">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url(); ?>public/ng/img/user.jpeg" class="img-rounded img-responsive" />
                    <br />
                    <br />
                    <label>Registered UserName</label>
                    <input type="text" class="form-control" placeholder="Enter user name">
                    <label>Registered Name</label>
                    <input type="text" class="form-control" placeholder="Enter your name">
                    <label>Registered Email</label>
                    <input type="text" class="form-control" placeholder="Enter your email">
                    <br>
                    <label>Registered Address</label>
                    <input type="text" class="form-control" placeholder="Enter your address">
                    <br>
                    <label>Registered Phone</label>
                    <input type="text" class="form-control" placeholder="Enter your phone">
                    <br>
                    <label>Registered BirthDate</label>
                    <input type="text" class="form-control" placeholder="Enter your birth date">
                    <br>
                    <a href="#" class="btn btn-success">Update Details</a>
                    <br /><br/>
                </div>
                <div class="col-md-8">
                    <div class="alert alert-info">
                        <h2>User Profile  : </h2>
                       
                    </div>
                    <div >
                        <a href="#" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="#" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google</a>
                        <a href="#" class="btn btn-social btn-twitter">
                            <i class="fa fa-twitter"></i>&nbsp; Twitter </a>
                        <a href="#" class="btn btn-social btn-linkedin">
                            <i class="fa fa-linkedin"></i>&nbsp; Linkedin </a>
                    </div>
                    <div class="form-group col-md-8">
                        <h3>Change Your Password</h3>
                        <br />
                        <label>Enter Old Password</label>
                        <input type="password" class="form-control">
                        <label>Enter New Password</label>
                        <input type="password" class="form-control">
                        <label>Confirm New Password</label>
                        <input type="password" class="form-control" />
                        <br>
                        <a href="#" class="btn btn-warning">Change Password</a>
                    </div>
                </div>
            </div>
            <!-- ROW END -->


        </section>
        <!-- SECTION END -->
    </div>
    <!-- CONATINER END -->

    <!-- REQUIRED SCRIPTS FILES -->
    <!-- CORE JQUERY FILE -->
    <script src="<?php echo base_url(); ?>public/ng/js/jquery-1.11.1.js"></script>
    <!-- REQUIRED BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url(); ?>public/ng/js/bootstrap.min.js"></script>
</body>

</html>

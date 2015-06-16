<!--
﻿<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    [if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]
    <title> user profile </title>
     BOOTSTRAP STYLE SHEET 
    <link href="public/ng/css/bootstrap.css" rel="stylesheet" />
     FONT-AWESOME STYLE SHEET FOR BEAUTIFUL ICONS 
    <link href="public/ng/css/font-awesome.css" rel="stylesheet" />
      CUSTOM STYLE CSS 
-->    <style type="text/css">
        input[type="text"], input[type="password"]{
            height: 50px;
        }
        
         a.btn-social {
            color: white;
            opacity: 0.8;
        }

            a.btn-social:hover {
                color: white;
                opacity: 1;
                text-decoration: none;
            }

        a.btn-facebook {
            background-color: #3b5998;
        }

        a.btn-twitter {
            background-color: #00aced;
        }

        a.btn-linkedin {
            background-color: #0e76a8;
        }

        a.btn-google {
            background-color: #c32f10;
        }
    </style><!--
</head>
<body>
   -->


   <div class="container" >
        <section style="padding-bottom: 50px; padding-top: 50px;">
            
            <div class="alert alert-success" ng-if="message">
                {{ message }}
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="public/ng/img/user.jpeg" class="img-rounded img-responsive" />
                    <br />
                    <br />
                    <label>Registered UserName</label>
                    <input type="text" class="form-control " placeholder="Enter user name" ng-model="formData.name">
<!--                    <label>Registered Name</label>
                    <input type="text" class="form-control" placeholder="Enter your name">-->
                    <label>Registered Email</label>
                    <input type="text" class="form-control" placeholder="Enter your email" ng-model="formData.email">
                   
                    <br>
                    <a  class="btn btn-success submit" ng-click="updateUser()">Update Details</a>
                    &nbsp;&nbsp;&nbsp;
                        <a href="#/changepass" class="external btn " <h3>Change Your Password</h3></a>
                       
               
                    <br /><br/>
                </div>
                <div class="col-md-8">
<!--                    <div class="alert alert-info">
                        <h4>User Profile  : </h4>
                       
                    </div>
                    
                    <div >
                        <a href="https://www.facebook.com" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="https://plus.google.com" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google</a>
                        <a href="https://twitter.com" class="btn btn-social btn-twitter">
                            <i class="fa fa-twitter"></i>&nbsp; Twitter </a>
                        <a href="http://www.linkedin.com" class="btn btn-social btn-linkedin">
                            <i class="fa fa-linkedin"></i>&nbsp; Linkedin </a>
                    </div>-->
                   
                    
            </div>
            <!-- ROW END -->


        </section>
        <!-- SECTION END -->
    </div>
    <!-- CONATINER END -->

    <!-- REQUIRED SCRIPTS FILES -->
    <!-- CORE JQUERY FILE -->
    <!--<script src="public/ng/js/jquery-1.11.1.js"></script>-->
    <!-- REQUIRED BOOTSTRAP SCRIPTS -->
    <!--<script src="public/ng/js/bootstrap.js"></script>-->
<!--</body>

</html>-->

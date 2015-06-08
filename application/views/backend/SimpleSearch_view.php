<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrap.min.css">
    <style type="text/css">
        .bs-example{
            margin: 20px;
        }
        /* Fix alignment issue of label on extra small devices in Bootstrap 3.2 */
        .form-horizontal .control-label{
            padding-top: 7px;
        }
    </style>
</head>
<body>
    
    
    
<?php echo validation_errors(); ?>


    
    
    <div class="container">
        <br><br>
        <div class="col-md-4"> </div>
<div class="col-md-4">
    
    <form class="form-inline" action="" method="post">
        <div class="form-group">
          
            <div class="col-xs-10">
                <input required="required" type="text" class="form-control" id="keyword" name="keyword" placeholder="enter keyword to search">
            </div>
        </div>


   
              <input type="submit" value="serarch" name="sub" class="btn btn-primary">
           
       
    </form>
</div>
    <div class="col-md-6"> </div>
    <br> <br>
    </div>

    
    <?PHP ?>
    <script language="JavaScript" src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
    <script language="JavaScript" src="<?php echo asset_url(); ?>js/jquery.js"></script>
</body>
</html>
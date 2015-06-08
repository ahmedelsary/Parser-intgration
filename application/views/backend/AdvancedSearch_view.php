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
<div class="bs-example">


    <form class="form-inline" method="post">

        <div class="form-group">

            <select class="form-control" name="mark" id="mark">
                <option value="">Select Car Mark</option>
             <?php 
        $query = $this->db->query("select distinct producer from cars where producer is not null and producer !=' ' ");

        

        foreach ($query->result_array() as $row)
        {
            echo "<option value=".$row['producer']. ">".$row['producer']. "</option>";
        }

             ?>
            </select>
        </div>
        
        <div class="form-group">
            
            <select class="form-control" name="model" id="model">
               <option value="">Select Model</option>           
            </select>
            

        </div>

        <div class="form-group">

            <label class="sr-only" for="minyear">year from</label>

            <input type="text" name="minyear" class="form-control" id="minyear" placeholder="year from">

        </div>
        <div class="form-group">

            <label class="sr-only" for="maxyear">year to</label>

            <input type="text" name="maxyear" class="form-control" id="maxyear" placeholder="year to">

        </div>
        
        <div class="form-group">

            <label class="sr-only" for="minprice">price from</label>

            <input type="text" name="minprice" class="form-control" id="minprice" placeholder="price from">

        </div>
        <div class="form-group">

            <label class="sr-only" for="maxprice">price to</label>

            <input type="text" name="maxprice" class="form-control" id="maxprice" placeholder="price to">

        </div>
        
         <div class="form-group">

            <label class="sr-only" for="mincapacity">capacity from</label>

            <input type="text" name="mincapacity" class="form-control" id="mincapacity" placeholder="capacity from">

        </div>
        <div class="form-group">

            <label class="sr-only" for="maxcapacity">capacity to</label>

            <input type="text" name="maxcapacity" class="form-control" id="maxcapacity" placeholder="capacity to">

        </div>



        <input type="submit" value="serarch" name="sub" class="btn btn-primary">

    </form>


</div>
    <script language="JavaScript" src="<?php echo asset_url(); ?>js/jquery.js"></script>
   <script language="JavaScript" src="<?php echo asset_url(); ?>js/script.js"></script>
    <script language="JavaScript" src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
</body>
</html>

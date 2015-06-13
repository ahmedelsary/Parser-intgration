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
        .form-horizontal .control-label{
            padding-top: 7px;
        }
    </style>
</head>
<body>
<div class="col-md-4"></div>
<div class="bs-example col-md-4">
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label for="number" class="control-label col-xs-6">Parse Time</label>
            <div class="col-xs-6">
                <?php $time= array_map( 'strval',explode(' ',$content[0])); ?>
                 <select name="minute" class="form-control" id="number" placeholder="minutes">
                    <?php  for($i=-1;$i<60;$i++){  ?>
                    <option value="<?php echo $i; ?>" <?php if(($time[0]=="*" && $i==-1) or ($time[0]=="$i")){echo "selected";} ?>> at minute <?php echo $i==-1 ?'all': $i ; ?>  </option>
                    <?php } ?>
                </select> <br />
                <select name="hour" class="form-control" placeholder="hours">
                    <?php for($i=-1;$i<24;$i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if(($time[1]=='*' && $i==-1) or ($time[1]=="$i")){echo "selected";} ?>> at hour <?php echo $i==-1 ?'all': $i ; ?>  </option>
                    <?php } ?>
                </select> <br />
                <select name="day" class="form-control" placeholder="days">
                    <?php for($i=-1;$i<32;$i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if(($time[2]=='*' && $i==-1) or ($time[2]=="$i")){echo "selected";} ?>> at day <?php echo $i==-1 ?'all': $i ; ?>   </option>
                    <?php } ?>
                </select> <br />
                <select name="month" class="form-control" placeholder="months">
                    <?php for($i=-1;$i<13;$i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if(($time[3]=='*' && $i==-1) or ($time[3]=="$i")){echo "selected";} ?>> at month <?php echo $i==-1 ?'all': $i ; ?>  </option>
                    <?php } ?>
                </select><br />
                <select name="day_of_week" class="form-control" placeholder="days_of_week">
                    <?php for($i=-1;$i<8;$i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if(($time[4]=='*' && $i==-1) or ($time[4]=="$i")){echo "selected";} ?>> at day_of_week <?php echo $i==-1 ?'all': $i ; ?>  </option>
                    <?php } ?>
                </select> <br />

        </div>
        </div>

        <div class="form-group">
            <label for="website" class="control-label col-xs-6">Websites</label>
            <div class="col-xs-6">
                <input type="checkbox" name="car100100" class="" id="website" <?php echo $content[1]=='1' ? 'checked': '' ; ?>>&nbsp; car100100<br>
                <input type="checkbox" name="contactcars" class="" id="contactcars" <?php echo $content[2]=='1' ? 'checked': '' ; ?>> &nbsp; contactcars<br>
                <input type="checkbox" name="dubizzle" class="" id="dubizzle" <?php echo $content[3]=='1' ? 'checked': '' ; ?>> &nbsp; dubizzle<br>
            </div>
        </div>

        <div class="form-group">
            <label for="website" class="control-label col-xs-6">start cron job</label>
            <div class="col-xs-6">
                <input type="checkbox" name="cron" class="" id="cron" <?php echo $content[4]=='on' ? 'checked': '' ; ?>> &nbsp;<br>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
            <input type="submit" value=" save " class="form-control btn btn-info" name="sub" />
            </div>
        </div>
    </form>
</div>

<div class="col-md-4"></div>



    <script language="JavaScript" src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
    <script language="JavaScript" src="<?php echo asset_url(); ?>js/jquery.js"></script>
</body>
</html>
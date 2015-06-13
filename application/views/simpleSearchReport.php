<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        
	<form class="form-horizontal" method="post">
		
			    	<label for="website" class="control-label ">search Report</label><br>
			    		<input type="radio" name="type" value="Top" checked>Top 20 search
					<br>
					<input type="radio" name="type" value="Dayly">Dayly
					<br>
					<input type="radio" name="type" value="Weekly">Weekly
					<br>
					<input type="radio" name="type" value="Monthly">Monthly
					<br>
					<input type="radio" name="type" value="Yearly">Yearly
			     
		<div class="form-group">
		    <div class="col-xs-offset-2 col-xs-10">
		    <input type="submit" value=" save " class="form-control btn btn-info" name="sub" />
		    </div>
		</div>

        
	</form>            
</div>
            <script language="JavaScript" src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
            <script language="JavaScript" src="<?php echo asset_url(); ?>js/jquery.js"></script>
    </body>
    </html>


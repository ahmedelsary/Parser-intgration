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
        


                <table class="table">
                    <th>Keyword</th>
                    <th>Times of search</th>
                    
		    <?php
			if (isset($response)) {

			for ($i = 0; $i < count($response);$i++) {
		    ?>
                    <tr>

                        <td><?php echo $response[$i]['keyword'];?></td>
                        <td><?php echo $response[$i]['COUNT(*)'];?></td>
			
                    </tr>
               
            
        

        
            <?php


            }

	    ?>
		<form class="form-horizontal" method="post" action="printpdf">
<?php
for ($i = 0; $i < count($response);$i++) {

			echo "<input type='hidden' name='keyword[]' value='".$response[$i]['keyword']."'>";
			echo "<input type='hidden' name='count[]' value='".$response[$i]['COUNT(*)']."'>";
}

?>
			<input type="submit" value=" PDF " class="form-control btn btn-info" name="pdf" />
			
		</form>
		
		<form class="form-horizontal" method="post" action="printcsv">
<?php
for ($i = 0; $i < count($response);$i++) {

			echo "<input type='hidden' name='keyword[]' value='".$response[$i]['keyword']."'>";
			echo "<input type='hidden' name='count[]' value='".$response[$i]['COUNT(*)']."'>";
}

?>



			<input type='hidden' name='array' value="<?php $response ?>">
			<input type="submit" value=" CSV " class="form-control btn btn-info" name="csv" />
		</form>
	
	    <?php
            }
            else
            {


            ?>



	</table>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Error</h3>
                </div>
                <div class="panel-body">
                    go to home page!
                </div>
                <?php

                }
                ?>


            </div>


            <script language="JavaScript" src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
            <script language="JavaScript" src="<?php echo asset_url(); ?>js/jquery.js"></script>
    </body>
    </html>


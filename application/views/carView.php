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
        <?php
        if (isset($response)) {
?>
<div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $response[0]['producer'] . ' - ' . $response[0]['model']; ?></h3>
            </div>
            <div class="panel-body">
             

                <div class="col-md-12">
                    <a href="<?php echo $response[0]['carlink']; ?>" class="thumbnail">
                        <img class="img-responsive" src="<?php echo $response[0]['img']; ?>" alt="<?php echo $response[0]['producer'] . '-' . $response[0]['model']; ?>"
                             style="width:400px;height:400px">
                    </a>

                </div>
               
                <table class="table">
			<tr>
		            <th>Price</th>
			    <td><?php echo $response[0]['price'];?></td>
			</tr>
			<tr>
		            <th>Year</th>
			    <td><?php echo $response[0]['year'];?></td>
			</tr>
			<tr>
		            <th>Type</th>
		            <td><?php echo $response[0]['type'];?></td>
		        </tr>
			<tr>
		            <th>Gearbox</th>
		            <td><?php echo $response[0]['gearbox'];?></td>
		        </tr>

                    <?php
			if ($response[0]['type'] == 'used')
			{
		    ?>	
				<tr>
				    <th>Owner</th>
				    <td><?php echo $response[0]['owner'];?></td>
				</tr>
				<tr>
				    <th>Contact</th>
				    <td><?php echo $response[0]['contact'];?></td>
				</tr>
				<tr>
				    <th>Date of view</th>
				    <td><?php echo $response[0]['date'];?></td>
				</tr>
				<tr>
				    <th>Notes</th>
				    <td><?php echo $response[0]['notes'];?></td>
				</tr>
		    <?php
			}
		    ?>    
                        

                        

                    
                </table>
            </div>
            </div>
</div>
        

        
            <?php


            
            }
            else
            {


            ?>




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

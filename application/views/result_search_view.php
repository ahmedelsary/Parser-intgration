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

        for ($i = 0; $i < count($response);$i++) {
        ?>

<div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $response[$i]['producer'] . ' - ' . $response[$i]['model']; ?></h3>
            </div>
            <div class="panel-body">
             

                <div class="col-md-12">
                    <a href="<?php echo base_url(); ?>index.php/Car/ViewCar?id=<?php echo $response[$i]['id']; ?>" class="thumbnail">
                        <img class="img-responsive" src="<?php echo $response[$i]['img']; ?>" alt="<?php echo $response[$i]['producer'] . '-' . $response[$i]['model']; ?>"
                             style="width:150px;height:150px">
                    </a>

                </div>
               
                <table class="table">
                    <th>Price</th>
                    <th>Year</th>
                    <th>Type</th>
                
                    <tr>

                        <td><?php echo $response[$i]['price'];?></td>
                        <td><?php echo $response[$i]['year'];?></td>

                        <td><?php echo $response[$i]['type'];?></td>

                    </tr>
                </table>
            </div>
            </div>
</div>
        

        
            <?php


            }
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


<?php
/*
// Encode data
if(isset($response)) {

for($i=0 ; $i<count($response);$i++) {

    echo $response[$i]->id."<br>";
    echo $response[$i]->model."<br>";
    echo $response[$i]->producer."<br>";
    echo $response[$i]->year."<br>";
    echo $response[$i]->price."<br>";
    echo $response[$i]->km."<br>";
    echo $response[$i]->gearbox."<br>";
    echo $response[$i]->ac;
    echo $response[$i]->power;
    echo $response[$i]->ecapacity;
    echo $response[$i]->glass;
    echo $response[$i]->centerlock;
    echo $response[$i]->floor;
    echo $response[$i]->emirror;
    echo $response[$i]->bags;
    echo $response[$i]->doorn;
    echo $response[$i]->abs;
    echo $response[$i]->speed;
    echo $response[$i]->gps;
    echo '<img src='.$response[$i]->img."><br>";
    echo $response[$i]->carlink;
    echo $response[$i]->ref;
    echo $response[$i]->owner;
    echo $response[$i]->contact;
    echo $response[$i]->notes;
    echo $response[$i]->date;
    echo $response[$i]->type;
    echo"*******************************************************";
    echo "<hr>";


}
}




else
    echo "erro!";

if (isset($response)) {

    for ($i = 0; $i < count($response); $i++) {

        echo $response[$i]->id . "<br>";
        echo $response[$i]->model . "<br>";
        echo $response[$i]->producer . "<br>";
        echo $response[$i]->year . "<br>";
        echo $response[$i]->price . "<br>";
        echo $response[$i]->km . "<br>";
        echo $response[$i]->gearbox . "<br>";
        echo $response[$i]->ac;
        echo $response[$i]->power;
        echo $response[$i]->ecapacity;
        echo $response[$i]->glass;
        echo $response[$i]->centerlock;
        echo $response[$i]->floor;
        echo $response[$i]->emirror;
        echo $response[$i]->bags;
        echo $response[$i]->doorn;
        echo $response[$i]->abs;
        echo $response[$i]->speed;
        echo $response[$i]->gps;
        echo "
    <img src='{$response[$i]->img}'/>
    ";
        echo $response[$i]->carlink;
        echo $response[$i]->ref;
        echo $response[$i]->owner;
        echo $response[$i]->contact;
        echo $response[$i]->notes;
        echo $response[$i]->date;
        echo $response[$i]->type;
        echo "*******************************************************";


    }
} else
    echo "erro!";
*/


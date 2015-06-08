<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 27/05/15
 * Time: 02:26 م
 */


header('Content-type: application/json');

// Encode data
if(isset($response)) {
    echo json_encode($response);
}
else
    echo json_encode(array('error' => true));
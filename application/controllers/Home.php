<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function index()
    {

        $fpath = "assets/config/config";
        $con = file_get_contents($fpath);
        $content = explode("\n", $con);


        $this->Home_model->truncate();

        if ($content[1] == '1') {
            car100100_new();
            car100100_used();

        }
        if ($content[2] == '1') {
            contactcars_new();
            contactcars_used();

        }

        if ($content[3] == '1') {
            dubizzle();

        }

    }


   
}

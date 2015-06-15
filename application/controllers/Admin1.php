<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin1 extends CI_Controller
{
    public function index()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
//        if($this->aauth->is_loggedin())
//        {
//            if($this->aauth->is_member('Admin',FALSE))
//            {
                $fpath = "assets/config/config";
                $cron = "assets/config/cron";
                if ($this->input->post()) {
                    
                    $result['posss'] = "test";
                    
                    $minute = $this->input->post('minute');
                    $hour = $this->input->post('hour');
                    $day = $this->input->post('day');
                    $month = $this->input->post('month');
                    $day_of_week = $this->input->post('day_of_week');
                    $dub = $this->input->post('dubizzle');
                    $car100 = $this->input->post('car100100');
                    $ccars = $this->input->post('contactcars');
                    $cr = $this->input->post('cron');

                    if ($dub == "true") {
                        $dub = 1;
                    } else {
                        $dub = 0;
                    }
                    if ($car100 == "true") {
                        $car100 = 1;
                    } else {
                        $car100 = 0;
                    }
                    if ($ccars == "true") {
                        $ccars = 1;
                    } else {
                        $ccars = 0;
                    }
                    if ($cr == "true") {
                        $cr = 1;
                    } else {
                        $cr = 0;
                    }



                    echo exec('crontab -r');
                    exec("pkill -f Home");
                    write_file($cron, '', 'w+');

                    if ($cr==1) {
                        $project=getProjectName();
                        $parse =$minute ." ".$hour." ".$day." ".$month." ".$day_of_week." /etc/alternatives/php "."/var/www/html/".$project."/index.php Home";
                        $output = shell_exec('crontab -l');
                        file_put_contents($cron, $output . $parse . PHP_EOL);
                        echo exec("crontab $cron");
                    }
                    $time=$minute ." ".$hour." ".$day." ".$month." ".$day_of_week;
                    $data = $time . "\n" . $car100 . "\n" . $ccars . "\n" . $dub . "\n" . $cr;
                    write_file($fpath, $data, 'w+');


                }


                $con = file_get_contents($fpath);
                $content = explode("\n", $con);
                $result['items'] = $content;
                $result['post'] = $this->input->post();
                echo json_encode($result); 
            }


}


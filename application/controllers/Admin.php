<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $result = new ArrayObject();
        header('Content-Type: application/json');
        if($this->aauth->is_loggedin())
        {
            if($this->aauth->is_member('Admin',FALSE))
            {
                $fpath = "assets/config/config";
                $cron = "assets/config/cron";
                if ($this->input->post('sub')) {
                    $minute = $this->input->post('minute');
                    $hour = $this->input->post('hour');
                    $day = $this->input->post('day');
                    $month = $this->input->post('month');
                    $day_of_week = $this->input->post('day_of_week');
                    $dub = $this->input->post('dubizzle');
                    $car100 = $this->input->post('car100100');
                    $ccars = $this->input->post('contactcars');
                    $cr = $this->input->post('cron');

                    if ($dub) {
                        $dub = 1;
                    } else {
                        $dub = 0;
                    }
                    if ($car100) {
                        $car100 = 1;
                    } else {
                        $car100 = 0;
                    }
                    if ($ccars) {
                        $ccars = 1;
                    } else {
                        $ccars = 0;
                    }


                    if ($minute=='-1') {
                        $minute = '*';
                    }
                    if ($hour=='-1') {
                        $hour = '*';
                    }
                    if ($day=='-1') {
                        $day = '*';
                    }
                    if ($month=='-1') {
                        $month = '*';
                    }
                    if ($day_of_week=='-1') {
                        $day_of_week = '*';
                    }

                    echo exec('crontab -r');
                    exec("pkill -f /var/www/html/parser/index.php");
                    write_file($cron, '', 'w+');

                    if ($cr) {
                        $parse =$minute ." ".$hour." ".$day." ".$month." ".$day_of_week." /usr/bin/php /var/www/html/parser/index.php Home";
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
                echo json_encode($result); 
            }
        }


    }

}


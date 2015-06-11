<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    private $counts = 1;


    public function index()
    {
//        set_time_limit(10);

        $fpath = "assets/config/config";
        $con = file_get_contents($fpath);
        $content = explode("\n", $con);


        $this->Home_model->truncate();

        if ($content[1] == '1') {
            Home::car100100_new();
            Home::car100100_used();




        }
        if ($content[2] == '1') {
            Home::contactcars_new();
            Home::contactcars_used();

        }

        if ($content[3] == '1') {
            Home::dubizzle();

        }

    }


    public function car100100_new()
    {
        $car_data = array();
        $html = new simple_html_dom();
        $html->load_file('http://www.car100100.com/new_cars_prices_Egypt');
        $result = $html->find('table');
        for ($i = 0; $i < count($result); $i++) {

            $html2 = new simple_html_dom();
            $html2->load_file($result[$i]->children(0)->children(0)->children(0)->href);
            $result2 = $html2->find('table');
            for ($j = 1; $j < count($result2); $j++) {

                $html3 = new simple_html_dom();
                $html3->load_file($result2[$j]->children(0)->children(0)->children(0)->href);
                $result3 = $html3->find('div.used-car-details-list table tr td[2]');
                $result4 = $html3->find('div.used-car-images-list div img');
                $car_data['producer'] = getMark(trim($result3[0]->innertext));
                if ($car_data['producer'] != 'Bikes') {
                    $car_data['model'] = getModel(trim($result3[1]->innertext));

                    $car_data['year'] = (int)$result3[2]->innertext;
                    $car_data['price'] = (int)$result3[3]->innertext;
                    $car_data['ecapacity'] = (int)$result3[4]->innertext;
                    $car_data['gearbox'] = $result3[5]->innertext;
                    $car_data['ac'] = $result3[14]->innertext;
                    $car_data['power'] = $result3[13]->innertext;
                    $car_data['glass'] = $result3[15]->innertext;
                    $car_data['centerlock'] = $result3[16]->innertext;
                    $car_data['floor'] = $result3[20]->innertext;
                    $car_data['emirror'] = $result3[17]->innertext;
                    $car_data['bags'] = $result3[9]->innertext;
                    $car_data['abs'] = $result3[8]->innertext;
                    $car_data['gps'] = $result3[21]->innertext;
                    $car_data['img'] = $result4[0]->src;
                    $car_data['type'] = 'new';
                    $car_data['carlink'] = $result2[$j]->children(0)->children(0)->children(0)->href;
                    $car_data['ref'] = 'www.car100100.com';
                    $this->Home_model->addNewCar($car_data);
                }


            }
        }
    }

    public function car100100_used()
    {
        $html5 = new simple_html_dom();
        $html5->load_file('http://www.car100100.com/used_cars_prices_Egypt');
        $result5 = $html5->find('table');
        for ($q = 1; $q < count($result5); $q++) {
            $car_data_u = array();
            $html6 = new simple_html_dom();
            $html6->load_file('http://www.car100100.com/' . $result5[$q]->children(0)->children(0)->children(0)->href);
            $result6 = $html6->find('div.pageNumberCell');
            for ($w = 0; $w < count($result6); $w++) {
                $html7 = new simple_html_dom();
                $html7->load_file($result6[$w]->children(0)->href);
                $result7 = $html7->find('a.makecars_images-href');
                for ($r = 0; $r < count($result7); $r++) {
                    $html8 = new simple_html_dom();
                    $html8->load_file($result7[$r]->href);
                    $result8 = $html8->find('div.used-car-details-list table tr td[2]');
                    $result9 = $html8->find('div.used-car-images-list div a img');
                    $car_data_u['producer'] = getMark(trim($result8[2]->innertext));
                    if ($car_data_u['producer'] != 'موتوسيكلات') {
                        $car_data_u['model'] = getModel(trim($result8[3]->innertext));
                        $car_data_u['year'] = (int)$result8[4]->innertext;
                        $car_data_u['owner'] = $result8[0]->innertext;
                        $car_data_u['contact'] = $result8[1]->innertext;
                        $car_data_u['date'] = $result8[7]->innertext;
                        $car_data_u['km'] = $result8[10]->innertext;
                        $car_data_u['gearbox'] = $result8[11]->innertext;
                        $car_data_u['alarm'] = $result8[18]->innertext;
                        $car_data_u['notes'] = $result8[20]->innertext;
                        $car_data_u['price'] = (int)$result8[6]->innertext;
                        $car_data_u['ac'] = $result8[12]->innertext;
                        $car_data_u['power'] = $result8[13]->innertext;
                        $car_data_u['ecapacity'] = (int)$result8[8]->innertext;
                        $car_data_u['glass'] = $result8[15]->innertext;
                        $car_data_u['centerlock'] = $result8[17]->innertext;
                        $car_data_u['floor'] = $result8[19]->innertext;
                        $car_data_u['emirror'] = $result8[14]->innertext;
                        $car_data_u['img'] = $result9[0]->src;
                        $car_data_u['type'] = 'used';
                        $car_data_u['carlink'] = $result7[$r]->href;
                        $car_data_u['ref'] = 'www.car100100.com';
                        $this->Home_model->addNewCar($car_data_u);
                    }


                }
            }
        }
    }

    public function contactcars_used()
    {
        $html = new simple_html_dom ();
        $html->load_file('http://www.contactcars.com/usedcars/makes');
        $result = $html->find('.list_2 a');
        for ($i = 0; $i < count($result); $i++) {
            $makeUrl = "http://www.contactcars.com" . $result [$i]->href;
            $html1 = new simple_html_dom ();
            $html1->load_file($makeUrl);
            $result1 = $html1->find('.custom_p_2 a[1]');
            for ($j = 0; $j < count($result1); $j++) {
                $data = array();
                $carUrl = "http://www.contactcars.com" . $result1 [$j]->href;
                $html2 = new simple_html_dom ();
                $html2->load_file($carUrl);

                $result2 = $html2->find('.clearfix p');
                $result22 = $html2->find('.clearfix span');
                $result23 = $html2->find('#sync2 .item img');
                $result24 = $html2->find('p[itemprop=description]');
                $result25 = $html2->find('div[class=large-12 columns line] span');
                $result26 = $html2->find('ul li[class=third-link] a[class=breadC-link] text[itemprop=name]');
                $data ['model'] = getModel($result26 [0]->innertext);
                $data['producer'] = getMark(trim($result2[0]->innertext));

                $result21 = $html2->find('table tr td[2]');
                $data['year'] = (int)$result21 [0]->innertext;
                $data['km'] = $result21 [2]->innertext;
                $data['gearbox'] = $result21 [12]->innertext;
                $data['ac'] = $result21 [15]->innertext;
                $data['power'] = $result21 [14]->innertext;
                $data['ecapacity'] = (int)$result21 [1]->innertext;
                $data['glass'] = $result21 [9]->innertext;
                $data['centerlock'] = $result21 [13]->innertext;
                $data['alarm'] = $result21 [8]->innertext;
                $data['floor'] = $result21 [5]->innertext;
                $data['bags'] = $result21 [4]->innertext;
                $data['doorn'] = $result21 [3]->innertext;
                $data['speed'] = $result21 [1]->innertext;
                preg_match_all('!\d+!', $result22 [0]->innertext, $matches);
                $iprice = implode('', $matches[0]);
                $data['price'] = (int)$iprice;
                $data['notes'] = $result24[0]->innertext;
                if (empty($result23[0]->src)) {
                    $data['img'] = asset_url() . "img/123.jpg";
                } else {
                    $data['img'] = $result23[0]->src;
                }
                $data['type'] = "used";
                $data['carlink'] = $carUrl;
                $data['ref'] = "http://www.contactcars.com";
                $data['owner'] = $result25 [0]->innertext;
                $this->Home_model->addNewCar($data);
            }
        }
    }

    public function contactcars_new()
    {
        $html = new simple_html_dom ();
        $html->load_file('http://www.contactcars.com/newcars/makes');
        $result = $html->find('.list_2 a');
        for ($i = 0; $i < count($result); $i++) {
            $makeUrl = "http://www.contactcars.com" . $result [$i]->href;
            $html1 = new simple_html_dom ();
            $html1->load_file($makeUrl);
            $result1 = $html1->find('.list_3 a');
            for ($j = 0; $j < count($result1); $j++) {
                $modelUrl = "http://www.contactcars.com" . $result1 [$j]->href;
                $html2 = new simple_html_dom ();
                $html2->load_file($modelUrl);
                $result2 = $html2->find('table tr td[1]');
                for ($e = 0; $e < count($result2); $e++) {
                    $data = array();
                    $carUrl = "http://www.contactcars.com" . $result2 [$e]->children(0)->href;
                    $html3 = new simple_html_dom ();
                    $html3->load_file($carUrl);
                    $result3 = $html3->find('‪#‎cardetails‬ table tr td[2]');
                    $result31 = $html3->find('#sync2 .item img');
                    $result32 = $html3->find('.clearfix p');
                    $result33 = $html3->find('.clearfix span');
                    $result34 = $html3->find('ul li[class=second-link] a[class=breadC-link] text[itemprop=name]');
                    $data['producer'] = getMark(trim($result34[0]->innertext));
                    $data['model'] = getModel(trim($result32 [0]->innertext));
                    $data['year'] = (int)$result32 [1]->innertext;
                    $data['gearbox'] = $result3[3]->innertext;
                    $data['ac'] = $result3[81]->innertext;
                    $data['ecapacity'] = (int)$result3[2]->innertext;
                    $data['glass'] = $result3[51]->innertext;
                    $data['centerlock'] = $result3[73]->innertext;
                    $data['floor'] = $result3[58]->innertext;
                    $data['abs'] = $result3[23]->innertext;
                    $data['emirror'] = $result3[34]->innertext;
                    $data['bags'] = $result3[20]->innertext;
                    $data['doorn'] = $result3[14]->innertext;
                    preg_match_all('!\d+!', $result33[0]->innertext, $matches);
                    $iprice = implode('', $matches[0]);
                    $data['price'] = (int)$iprice;
                    $data['img'] = $result31 [0]->src;
                    $data['type'] = "new";
                    $data['carlink'] = $carUrl;
                    $data['ref'] = "http://www.contactcars.com";
                    $this->Home_model->addNewCar($data);
                }
            }
        }
    }

    public function dubizzle()
    {
        $html = new simple_html_dom();
        $page = 0;
        while (true) {
            $html->load_file("https://egypt.dubizzle.com/en/cars/search/?pages=$page");
            $result = $html->find('.d-listing__item');
            if (count($result) < 1) {
                break;
            }
            for ($i = 0; $i < count($result); $i++) {
                
                $carUrl = $result[$i]->children(0)->children(0)->children(0)->href;
                @$carType = $result[$i]->children(1)->children(0)->children(0)->children(1)->children(2)->innertext;
                if (isset($carType)) {
                    $carImg = $result[$i]->children(0)->children(0)->children(0)->children(0)->src;
                    $html1 = new simple_html_dom();
                    $html1->load_file("https://egypt.dubizzle.com.$carUrl");
                    $result1 = $html1->find('.u-ml__val');
                    $producer = $html1->find('.u-breadcrumb')[0]->children(2)->children(0)->innertext;
                    $contact = $html1->find('.contact-number')[0]->innertext;
                    $notes = $html1->find('.d-details__description-head')[0]->nextSibling()->innertext;
                    $data['date'] = $result1[0]->innertext;
                    $data['year'] = (int)$result1[1]->innertext;
                    $data['km'] = $result1[2]->innertext;
                    $data['price'] = (int)strstr(str_replace(",", "", $result1[4]->innertext),' ');
                    $data['producer'] = getMark(trim($producer));
                    $model = strtr($result1[5]->innertext, array($producer => ''));
                    if (trim($model) == '') {
                        $model = $producer;
                    }
                    $data['model'] = getModel(trim($model));
                    $data['ecapacity'] = (int)$result1[6]->innertext;
                    $data['gearbox'] = $result1[7]->innertext;
                    $data['doorn'] = $result1[9]->innertext;
                    $data['type'] = 'used';
                    $data['ref'] = 'https://egypt.dubizzle.com';
                    $data['carlink'] = $data['ref'] . $carUrl;
                    $data['img'] = $carImg;
                    $data['contact'] = $contact;
                    $data['notes'] = $notes;
                    $this->Home_model->addNewCar($data);
                }
            }
            $page++;
        }
    }
}


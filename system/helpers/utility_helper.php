<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    CodeIgniter
 * @author    EllisLab Dev Team
 * @copyright    Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright    Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license    http://opensource.org/licenses/MIT	MIT License
 * @link    http://codeigniter.com
 * @since    Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Directory Helpers
 *
 * @package        CodeIgniter
 * @subpackage    Helpers
 * @category    Helpers
 * @author        EllisLab Dev Team
 * @link        http://codeigniter.com/user_guide/helpers/directory_helper.html
 */

// ------------------------------------------------------------------------

if (!function_exists('asset_url')) {

    function asset_url()
    {
        return base_url() . 'assets/';
    }

}


$CI = get_instance();
$CI->load->model('Home_model');

    

        
function car100100_new($cache=1,$keyword='',$arrLeng=1000) {

    $arr = array();
    $data = array();
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
            $data['producer'] = getMark(trim($result3[0]->innertext));
            if ($data['producer'] != 'Bikes') {
                $data['model'] = getModel(trim($result3[1]->innertext));

                $data['year'] = (int)$result3[2]->innertext;
                $data['price'] = (int)$result3[3]->innertext;
                $data['ecapacity'] = (int)$result3[4]->innertext;
                $data['gearbox'] = $result3[5]->innertext;
                $data['ac'] = $result3[14]->innertext;
                $data['power'] = $result3[13]->innertext;
                $data['glass'] = $result3[15]->innertext;
                $data['centerlock'] = $result3[16]->innertext;
                $data['floor'] = $result3[20]->innertext;
                $data['emirror'] = $result3[17]->innertext;
                $data['bags'] = $result3[9]->innertext;
                $data['abs'] = $result3[8]->innertext;
                $data['gps'] = $result3[21]->innertext;
                $data['img'] = $result4[0]->src;
                $data['type'] = 'new';
                $data['carlink'] = $result2[$j]->children(0)->children(0)->children(0)->href;
                $data['ref'] = 'www.car100100.com';
                if($cache){
                    $GLOBALS['CI']->Home_model->addNewCar($data);
                }
                else{
                    if((strpos($data['model'],$keyword) !== false) || (strpos($data['producer'],$keyword) !== false)){
                        if(count($arr) <= $arrLeng ){
                            $arr[]= $data;

                        }else{
                            return $arr;
                        }
                    }
                }
            }
        }
    }

}


    
    
function car100100_used($cache=1,$keyword='',$arrLeng=1000)
    {
        $arr=array();
        $html5 = new simple_html_dom();
        $html5->load_file('http://www.car100100.com/used_cars_prices_Egypt');
        $result5 = $html5->find('table');
        for ($q = 1; $q < count($result5); $q++) {
            $data = array();
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
                    $data['producer'] = getMark(trim($result8[2]->innertext));
                    if ($data['producer'] != 'موتوسيكلات') {
                        $data['model'] = getModel(trim($result8[3]->innertext));
                        $data['year'] = (int)$result8[4]->innertext;
                        $data['owner'] = $result8[0]->innertext;
                        $data['contact'] = $result8[1]->innertext;
                        $data['date'] = $result8[7]->innertext;
                        $data['km'] = $result8[10]->innertext;
                        $data['gearbox'] = $result8[11]->innertext;
                        $data['alarm'] = $result8[18]->innertext;
                        $data['notes'] = $result8[20]->innertext;
                        $data['price'] = (int)$result8[6]->innertext;
                        $data['ac'] = $result8[12]->innertext;
                        $data['power'] = $result8[13]->innertext;
                        $data['ecapacity'] = (int)$result8[8]->innertext;
                        $data['glass'] = $result8[15]->innertext;
                        $data['centerlock'] = $result8[17]->innertext;
                        $data['floor'] = $result8[19]->innertext;
                        $data['emirror'] = $result8[14]->innertext;
                        $data['img'] = $result9[0]->src;
                        $data['type'] = 'used';
                        $data['carlink'] = $result7[$r]->href;
                        $data['ref'] = 'www.car100100.com';

                        if($cache){
                            $GLOBALS['CI']->Home_model->addNewCar($data);
                        }
                        else{
                            if((strpos($data['model'],$keyword) !== false) || (strpos($data['producer'],$keyword) !== false)){
                                if(count($arr) < $arrLeng ){
                                    $arr[]= $data;

                                }else{
                                    return $arr;
                                }
                            }
                        }
                    }

                }
            }
        }
    }

function contactcars_used($cache=1,$keyword='',$arrLeng=1000)
    {
        $arr=array();
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

                if($cache){
                    $GLOBALS['CI']->Home_model->addNewCar($data);
                }
                else{
                    if((strpos($data['model'],$keyword) !== false) || (strpos($data['producer'],$keyword) !== false)){
                        if(count($arr) < $arrLeng ){
                            $arr[]= $data;

                        }else{
                            return $arr;
                        }
                    }
                }
            }
        }
    }

function contactcars_new($cache=1,$keyword='',$arrLeng=1000)
    {
        $arr=array();
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
                    if($cache){
                        $GLOBALS['CI']->Home_model->addNewCar($data);
                    }
                    else{
                        if((strpos($data['model'],$keyword) !== false) || (strpos($data['producer'],$keyword) !== false)){
                            if(count($arr) < $arrLeng ){
                                $arr[]= $data;

                            }else{
                                return $arr;
                            }
                        }
                    }
                }
            }
        }
    }

function dubizzle($cache=1,$keyword='',$arrLeng=1000)
    {
        $arr=array();
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
                if ($carType) {
                    $carImg = $result[$i]->children(0)->children(0)->children(0)->children(0)->src;
                    $html1 = new simple_html_dom();
                    $html1->load_file("https://egypt.dubizzle.com.$carUrl");
                    $producer = $html1->find('.u-breadcrumb')[0]->children(2)->children(0)->innertext;
                    $contact = $html1->find('.contact-number')[0]->innertext;
                    $notes = $html1->find('.d-details__description-head')[0]->nextSibling()->innertext;
                    $result1 = $html1->find('.u-ml__val');
                    $data['date'] = $result1[0]->innertext;
                    $data['year'] = (int)$result1[1]->innertext;
                    $data['km'] = $result1[2]->innertext;
                    $data['price'] = (int)strstr(str_replace(",", "",$result1[4]->innertext),' ');
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
                    if($cache){
                        $GLOBALS['CI']->Home_model->addNewCar($data);
                    }
                    else{
                        if((strpos($data['model'],$keyword) !== false) || (strpos($data['producer'],$keyword) !== false)){
                            if(count($arr) < $arrLeng ){
                                $arr[]= $data;

                            }else{
                                return $arr;
                            }
                        }
                    }
                }
            }
            $page++;
        }
    }

if (!function_exists('get_url')) {

    function pre_url($url)
    {
        return strtoupper(str_replace('_', ' ', $url));
    }

}


if (!function_exists('getMark')) {
    function getMark($oldMark)
    {
        $alfa_romeo = array('ألفا روميو', 'الفا روميو', 'Alfa Romeo');
        $opel = array('أوبل', 'اوبل', 'Opel');
        $audi = array('أودي', 'اودى', 'Audi');
        $speranza = array('اسبيرانزا', 'اسبرانزا', 'Speranza');
        $proton = array('بروتون', 'Proton');
        $porsche = array('بورش', 'Porsche');
        $bmw = array('بي إم دبليو', 'BMW');
        $peugeot = array('بيجو', 'Peugeot');
        $toyota = array('تويوتا', 'Toyota');
        $jaguar = array('جاجوار', 'Jaguar');
        $daihatsu = array('دايهاتسو', 'Daihatsu');
        $dodge = array('دودج', 'Dodge');
        $renault = array('رينو', 'Renault');
        $skoda = array('سكودا', 'Skoda');
        $suzuki = array('سوزوكي', 'Suzuki');
        $seat = array('سيات', 'Seat');
        $chevrolet = array('شيفورليه', 'شيفورلية', 'Chevrolet');
        $ford = array('فورد', 'Ford');
        $volvo = array('فولفو', 'Volvo');
        $volkswagen = array('فولكس فاجن', 'VW', 'Volkswagen');
        $fiat = array('فيات', 'Fiat');
        $chrysler = array('كرايسلر', 'Chrysler');
        $kia = array('كيا', 'Kia');
        $mazda = array('مازدا', 'Mazda');
        $mercedes_benz = array('Mercedes', 'مرسيدس', 'Mercedes-Benz');
        $mitsubishi = array('ميتسوبيشى', 'ميتسوبيشي', 'Mitsubishi');
        $nissan = array('نيسان', 'Nissan');
        $honda = array('هوندا', 'Honda');
        $hyundai = array('هيونداي', 'هيونداى', 'HYundai');


        if (in_array($oldMark, $hyundai)) {
            return 'HYundai';
        } else if (in_array($oldMark, $honda)) {
            return 'Honda';
        } else if (in_array($oldMark, $nissan)) {
            return 'Nissan';
        } else if (in_array($oldMark, $mitsubishi)) {
            return 'Mitsubishi';
        } else if (in_array($oldMark, $mercedes_benz)) {
            return 'Mercedes-Benz';
        } else if (in_array($oldMark, $mazda)) {
            return 'Mazda';
        } else if (in_array($oldMark, $kia)) {
            return 'Kia';
        } else if (in_array($oldMark, $chrysler)) {
            return 'Chrysler';
        } else if (in_array($oldMark, $fiat)) {
            return 'Fiat';
        } else if (in_array($oldMark, $volkswagen)) {
            return 'Volkswagen';
        } else if (in_array($oldMark, $volvo)) {
            return 'Volvo';
        } else if (in_array($oldMark, $ford)) {
            return 'Ford';
        } else if (in_array($oldMark, $chevrolet)) {
            return 'Chevrolet';
        } else if (in_array($oldMark, $seat)) {
            return 'Seat';
        } else if (in_array($oldMark, $suzuki)) {
            return 'Suzuki';
        } else if (in_array($oldMark, $skoda)) {
            return 'Skoda';
        } else if (in_array($oldMark, $renault)) {
            return 'Renault';
        } else if (in_array($oldMark, $dodge)) {
            return 'Dodge';
        } else if (in_array($oldMark, $daihatsu)) {
            return 'Daihatsu';
        } else if (in_array($oldMark, $jaguar)) {
            return 'Jaguar';
        } else if (in_array($oldMark, $toyota)) {
            return 'Toyota';
        } else if (in_array($oldMark, $peugeot)) {
            return 'Peugeot';
        } else if (in_array($oldMark, $bmw)) {
            return 'BMW';
        } else if (in_array($oldMark, $porsche)) {
            return 'Porsche';
        } else if (in_array($oldMark, $proton)) {
            return 'Proton';
        } else if (in_array($oldMark, $speranza)) {
            return 'Speranza';
        } else if (in_array($oldMark, $audi)) {
            return 'Audi';
        } else if (in_array($oldMark, $opel)) {
            return 'Opel';
        } else if (in_array($oldMark, $alfa_romeo)) {
            return 'Alfa Romeo';
        } else {
            return $oldMark;
        }


    }

}
function getProjectName(){
    require_once('url_helper.php');
    $url=explode('/',base_url());
    return $url[3];


}




if (!function_exists('getModel')) {
    function getModel($oldModel)
    {
        $astra = array('أسترا', 'استرا', 'Astra');
        $corsa = array('كورسا', 'corsa', 'Corsa');
        $a1 = array('A1');
        $a3 = array('A3');
        $a4 = array('A4');
        $a5 = array('A5');
        $a6 = array('A6');
        $q3 = array('Q3');
        $q5 = array('Q5');
        $q7 = array('Q7');
        $_911 = array('911');
        $panamera = array('Panamera', 'باناميرا');
        $boxster = array('Boxster', 'بوكستر');
        $cayman = array('Cayman', 'كايمان');
        $cayenne = array('Cayenne', 'كايين');
        $_3008 = array('3008');
        $_308 = array('308');
        $_508 = array('508');
        $_5008 = array('5008');
        $terios = array('تيريوس', 'Terios');
        $sirion = array('Sirion', 'سيريون');
        $grand_terios = array('Grand Terios', 'جراند تيريوس');
        $charger = array('Charger', 'شارجر', 'تشارجر');
        $durango = array('دورانجو', 'دورانجو', 'Durango');
        $duster = array('Duster', 'داستر');
        $sandero = array('سانديرو');
        $fluence = array('فلوانس', 'fluence');
        $logan = array('logan', 'لوجان');
        $octavia = array('Octavia', 'أوكتافيا');
        $impreza = array('Impreza', 'إمبريزا');
        $forester = array('Forester', 'فورستر');
        $alto = array('Alto', 'التو', 'ألتو');
        $aveo = array('Aveo', 'افيو', 'افيو', 'أفيو');
        $cruze = array('Cruze', 'كروز');
        $focus = array('Focus', 'فوكاس', 'فوكس', 'فوكاس');
        $ka = array('Ka', 'كا');
        $s60 = array('S60');
        $s80 = array('S80');
        $passat = array('Passat', 'باسات');
        $_300C = array('C300', '300C', '300C', '300C', '300M/300C');
        $picanto = array('Picanto', 'بيكانتو');
        $rio = array('Rio', 'ريو');
        $carnival = array('Carnival', 'كارنافال', 'كارنيفال', 'كارنيفال');
        $carens = array('Carens', 'كارينز');
        $_3 = array('3');
        $c180 = array('C180', 'c180');
        $e200 = array('E200');
        $e250 = array('E250', 'E 250');
        $pajero = array('Pajero', 'باجيرو', 'باجيرو');
        $tiida = array('Tiida', 'Tida & تيدا', 'تيدا');
        $sunny = array('Sunny', 'صنى', 'صني');
        $qashqai = array('Qashqai', 'قاشقاى', 'قاشقاي', 'Qashqai');
        $city = array('City', 'سيتى', 'سيتي');
        $civic = array('Civic', 'سيفيك');
        $i10 = array('i10', 'I10', 'I 10', 'I10');
        $i30 = array('I30', 'i30');
        $elantra = array('Elantra', 'Elentra', 'النترا', 'الانترا', 'إلانترا');


        if (in_array($oldModel, $qashqai)) {
            return 'Qashqai';
        } else if (in_array($oldModel, $sunny)) {
            return 'Sunny';
        } else if (in_array($oldModel, $tiida)) {
            return 'Tiida';
        } else if (in_array($oldModel, $pajero)) {
            return 'Pajero';
        } else if (in_array($oldModel, $e250)) {
            return 'E250';
        } else if (in_array($oldModel, $e200)) {
            return 'E200';
        } else if (in_array($oldModel, $city)) {
            return 'City';
        } else if (in_array($oldModel, $civic)) {
            return 'Civic';
        } else if (in_array($oldModel, $i10)) {
            return 'I10';
        } else if (in_array($oldModel, $i30)) {
            return 'I30';
        } else if (in_array($oldModel, $elantra)) {
            return 'Elantra';
        } else if (in_array($oldModel, $c180)) {
            return 'C180';
        } else if (in_array($oldModel, $_3)) {
            return '3';
        } else if (in_array($oldModel, $carens)) {
            return 'Carens';
        } else if (in_array($oldModel, $carnival)) {
            return 'Carnival';
        } else if (in_array($oldModel, $rio)) {
            return 'Rio';
        } else if (in_array($oldModel, $picanto)) {
            return 'Picanto';
        } else if (in_array($oldModel, $_300C)) {
            return '300C';
        } else if (in_array($oldModel, $passat)) {
            return 'Passat';
        } else if (in_array($oldModel, $s80)) {
            return 'S80';
        } else if (in_array($oldModel, $s60)) {
            return 'S60';
        } else if (in_array($oldModel, $ka)) {
            return 'Ka';
        } else if (in_array($oldModel, $focus)) {
            return 'Focus';
        } else if (in_array($oldModel, $cruze)) {
            return 'Cruze';
        } else if (in_array($oldModel, $aveo)) {
            return 'Aveo';
        } else if (in_array($oldModel, $alto)) {
            return 'Alto';
        } else if (in_array($oldModel, $forester)) {
            return 'Forester';
        } else if (in_array($oldModel, $impreza)) {
            return 'Impreza';
        } else if (in_array($oldModel, $octavia)) {
            return 'Octavia';
        } else if (in_array($oldModel, $logan)) {
            return 'Logan';
        } else if (in_array($oldModel, $fluence)) {
            return 'Fluence';
        } else if (in_array($oldModel, $sandero)) {
            return 'Sandero';
        } else if (in_array($oldModel, $duster)) {
            return 'Duster';
        } else if (in_array($oldModel, $durango)) {
            return 'Durango';
        } else if (in_array($oldModel, $charger)) {
            return 'Charger';
        } else if (in_array($oldModel, $grand_terios)) {
            return 'Grand Terios';
        } else if (in_array($oldModel, $sirion)) {
            return 'Sirion';
        } else if (in_array($oldModel, $terios)) {
            return 'Terios';
        } else if (in_array($oldModel, $_5008)) {
            return '5008';
        } else if (in_array($oldModel, $_508)) {
            return '508';
        } else if (in_array($oldModel, $_308)) {
            return '308';
        } else if (in_array($oldModel, $_3008)) {
            return '3008';
        } else if (in_array($oldModel, $cayenne)) {
            return 'Cayenne';
        } else if (in_array($oldModel, $cayman)) {
            return 'Cayman';
        } else if (in_array($oldModel, $boxster)) {
            return 'Boxster';
        } else if (in_array($oldModel, $panamera)) {
            return 'Panamera';
        } else if (in_array($oldModel, $_911)) {
            return '911';
        } else if (in_array($oldModel, $q7)) {
            return 'Q7';
        } else if (in_array($oldModel, $q5)) {
            return 'Q5';
        } else if (in_array($oldModel, $q3)) {
            return 'Q3';
        } else if (in_array($oldModel, $a6)) {
            return 'A6';
        } else if (in_array($oldModel, $a5)) {
            return 'A5';
        } else if (in_array($oldModel, $a4)) {
            return 'A4';
        } else if (in_array($oldModel, $a3)) {
            return 'A3';
        } else if (in_array($oldModel, $a1)) {
            return 'A1';
        } else if (in_array($oldModel, $corsa)) {
            return 'Corsa';
        } else if (in_array($oldModel, $astra)) {
            return 'Astra';
        } else {
            return $oldModel;
        }

    }

    if (!function_exists('clean')) {

        function clean($string)
        {
            $string = preg_replace('/[^ء-ىA-Za-z0-9\-]/', '', $string); // Removes special chars.

            return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
        }

    }

    }
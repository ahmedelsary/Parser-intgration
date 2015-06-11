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
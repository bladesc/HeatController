<?php
/**
 * Created by PhpStorm.
 * User: Damian Szczęsny
 * Date: 25.11.2018
 * Time: 17:40
 */

$tempInside = null;
$tempDesired = null;

$tempDifference = $tempInside - $tempDesired;

$difference = [];

//LINGUISTIC VARIABLE - DIFFERENCE [v.small, small, medium, big, v.big]
//array from -10 to 50, increments = 0.01 (changeable)

for ($i = -10; $i <= 50; $i++) {

    //VARIABLE - V.SMALL
    if ($i <= -10) {
        $difference['v.small'][$i] = 0;
    } elseif ($i > -10 && $i <= 0) {
        $difference['v.small'][$i] = ($i - (-10)) / (0 - (-10));
    } elseif ($i > 0 && $i < 10) {
        $difference['v.small'][$i] = (10 - $i) / (10 - 0);
    } elseif ($i >= 10) {
        $difference['v.small'][$i] = 0;
    }

    //VARIABLE - SMALL
    if ($i <= 0) {
        $difference['small'][$i] = 0;
    } elseif ($i > 0 && $i <= 10) {
        $difference['small'][$i] = ($i - 0) / (10 - 0);
    } elseif ($i > 10 && $i < 20) {
        $difference['small'][$i] = (20 - $i) / (20 - 10);
    } elseif ($i >= 20) {
        $difference['small'][$i] = 0;
    }

    //VARIABLE - MEDIUM
    if ($i <= 10) {
        $difference['medium'][$i] = 0;
    } elseif ($i > 10 && $i <= 20) {
        $difference['medium'][$i] = ($i - 10) / (20 - 10);
    } elseif ($i > 20 && $i < 30) {
        $difference['medium'][$i] = (30 - $i) / (30 - 20);
    } elseif ($i >= 30) {
        $difference['medium'][$i] = 0;
    }

    //VARIABLE - BIG
    if ($i <= 20) {
        $difference['big'][$i] = 0;
    } elseif ($i > 20 && $i <= 30) {
        $difference['big'][$i] = ($i - 20) / (30 - 20);
    } elseif ($i > 30 && $i < 40) {
        $difference['big'][$i] = (40 - $i) / (40 - 30);
    } elseif ($i >= 40) {
        $difference['big'][$i] = 0;
    }

    //VARIABLE - V.BIG
    if ($i <= 30) {
        $difference['v.big'][$i] = 0;
    } elseif ($i > 30 && $i <= 40) {
        $difference['v.big'][$i] = ($i - 30) / (40 - 30);
    } elseif ($i > 40 && $i < 50) {
        $difference['v.big'][$i] = (50 - $i) / (50 - 40);
    } elseif ($i >= 50) {
        $difference['v.big'][$i] = 0;
    }
}

echo "<pre>";
print_r($difference);
echo "</pre>";
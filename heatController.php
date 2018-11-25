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

//LINGUISTIC VARIABLE - DIFFERENCE [v.small, small, medium, big, v.big]
//array from -10 to 50, increments = 0.01 (changeable)

for ($i = -10; $i <= 50; $i = $i++) {

    //VARIABLE - V.SMALL
    if ($i <= -10) {
        $difference['v.small'] = 0;
    } elseif ($i > -10 && $i <= 0) {
        $difference['v.small'] = ($i - (-10)) / (0 - (-10));
    } elseif ($i > 0 && $i < 10) {
        $difference['v.small'] = (10 - $i) / (10 - 0);
    } elseif ($i >= 10) {
        $difference['v.small'] = 0;
    }

    //VARIABLE - SMALL
    if ($i <= 0) {
        $difference['small'] = 0;
    } elseif ($i > 0 && $i <= 10) {
        $difference['small'] = ($i - 0) / (10 - 0);
    } elseif ($i > 10 && $i < 20) {
        $difference['small'] = (20 - $i) / (20 - 10);
    } elseif ($i >= 20) {
        $difference['small'] = 0;
    }

    //VARIABLE - MEDIUM
    if ($i <= 10) {
        $difference['medium'] = 0;
    } elseif ($i > 10 && $i <= 20) {
        $difference['medium'] = ($i - 10) / (20 - 10);
    } elseif ($i > 20 && $i < 30) {
        $difference['medium'] = (30 - $i) / (30 - 20);
    } elseif ($i >= 30) {
        $difference['medium'] = 0;
    }

    //VARIABLE - BIG
    if ($i <= 20) {
        $difference['medium'] = 0;
    } elseif ($i > 20 && $i <= 30) {
        $difference['medium'] = ($i - 20) / (30 - 20);
    } elseif ($i > 30 && $i < 40) {
        $difference['medium'] = (40 - $i) / (40 - 30);
    } elseif ($i >= 40) {
        $difference['medium'] = 0;
    }

    //VARIABLE - V.BIG
    if ($i <= 30) {
        $difference['medium'] = 0;
    } elseif ($i > 30 && $i <= 40) {
        $difference['medium'] = ($i - 30) / (40 - 30);
    } elseif ($i > 40 && $i < 50) {
        $difference['medium'] = (50 - $i) / (50 - 40);
    } elseif ($i >= 50) {
        $difference['medium'] = 0;
    }

}

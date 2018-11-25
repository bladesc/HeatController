<?php
/**
 * Created by PhpStorm.
 * User: Damian Szczęsny
 * Date: 25.11.2018
 * Time: 17:40
 */

//$tempInside = $_GET["actTemp"];
//settype($tempInside, "float");

$tempInside = 19.08;
$tempDesired = 20.0;

$tempDifference = $tempDesired - $tempInside;

$difference = [];
$heating = [];

//LINGUISTIC VARIABLE - DIFFERENCE [v.small, small, medium, big, v.big]
//array from -10 to 50, increments = 0.01 (changeable)

for ($i = -10; $i <= 50; $i = $i + 0.01) {

    $i = round($i, 2);

    //VARIABLE - V.SMALL
    if ($i <= -10) {
        $difference['v.small']["$i"] = 0;
    } elseif ($i > -10 && $i <= 0) {
        $difference['v.small']["$i"] = ($i - (-10)) / (0 - (-10));
    } elseif ($i > 0 && $i < 10) {
        $difference['v.small']["$i"] = (10 - $i) / (10 - 0);
    } elseif ($i >= 10) {
        $difference['v.small']["$i"] = 0;
    }

    //VARIABLE - SMALL
    if ($i <= 0) {
        $difference['small']["$i"] = 0;
    } elseif ($i > 0 && $i <= 10) {
        $difference['small']["$i"] = ($i - 0) / (10 - 0);
    } elseif ($i > 10 && $i < 20) {
        $difference['small']["$i"] = (20 - $i) / (20 - 10);
    } elseif ($i >= 20) {
        $difference['small']["$i"] = 0;
    }

    //VARIABLE - MEDIUM
    if ($i <= 10) {
        $difference['medium']["$i"] = 0;
    } elseif ($i > 10 && $i <= 20) {
        $difference['medium']["$i"] = ($i - 10) / (20 - 10);
    } elseif ($i > 20 && $i < 30) {
        $difference['medium']["$i"] = (30 - $i) / (30 - 20);
    } elseif ($i >= 30) {
        $difference['medium']["$i"] = 0;
    }

    //VARIABLE - BIG
    if ($i <= 20) {
        $difference['big']["$i"] = 0;
    } elseif ($i > 20 && $i <= 30) {
        $difference['big']["$i"] = ($i - 20) / (30 - 20);
    } elseif ($i > 30 && $i < 40) {
        $difference['big']["$i"] = (40 - $i) / (40 - 30);
    } elseif ($i >= 40) {
        $difference['big']["$i"] = 0;
    }

    //VARIABLE - V.BIG
    if ($i <= 30) {
        $difference['v.big']["$i"] = 0;
    } elseif ($i > 30 && $i <= 40) {
        $difference['v.big']["$i"] = ($i - 30) / (40 - 30);
    } elseif ($i > 40 && $i < 50) {
        $difference['v.big']["$i"] = (50 - $i) / (50 - 40);
    } elseif ($i >= 50) {
        $difference['v.big']["$i"] = 0;
    }
}

/*
echo "<pre>";
print_r($difference);
echo "</pre>";
*/

//LINGUISTIC VARIABLE - HEATING [v.small, small, medium, big, v.big]
//array from -10 to 50, increments = 0.01 (changeable)
for ($i = -10; $i <= 50; $i++) {

    //VARIABLE - V.SMALL
    if ($i <= -10) {
        $heating['v.small'][$i] = 0;
    } elseif ($i > -10 && $i <= 0) {
        $heating['v.small'][$i] = ($i - (-10)) / (0 - (-10));
    } elseif ($i > 0 && $i < 10) {
        $heating['v.small'][$i] = (10 - $i) / (10 - 0);
    } elseif ($i >= 10) {
        $heating['v.small'][$i] = 0;
    }

    //VARIABLE - SMALL
    if ($i <= 0) {
        $heating['small'][$i] = 0;
    } elseif ($i > 0 && $i <= 10) {
        $heating['small'][$i] = ($i - 0) / (10 - 0);
    } elseif ($i > 10 && $i < 20) {
        $heating['small'][$i] = (20 - $i) / (20 - 10);
    } elseif ($i >= 20) {
        $heating['small'][$i] = 0;
    }

    //VARIABLE - MEDIUM
    if ($i <= 10) {
        $heating['medium'][$i] = 0;
    } elseif ($i > 10 && $i <= 20) {
        $heating['medium'][$i] = ($i - 10) / (20 - 10);
    } elseif ($i > 20 && $i < 30) {
        $heating['medium'][$i] = (30 - $i) / (30 - 20);
    } elseif ($i >= 30) {
        $heating['medium'][$i] = 0;
    }

    //VARIABLE - BIG
    if ($i <= 20) {
        $heating['big'][$i] = 0;
    } elseif ($i > 20 && $i <= 30) {
        $heating['big'][$i] = ($i - 20) / (30 - 20);
    } elseif ($i > 30 && $i < 40) {
        $heating['big'][$i] = (40 - $i) / (40 - 30);
    } elseif ($i >= 40) {
        $heating['big'][$i] = 0;
    }

    //VARIABLE - V.BIG
    if ($i <= 30) {
        $heating['v.big'][$i] = 0;
    } elseif ($i > 30 && $i <= 40) {
        $heating['v.big'][$i] = ($i - 30) / (40 - 30);
    } elseif ($i > 40 && $i < 50) {
        $heating['v.big'][$i] = (50 - $i) / (50 - 40);
    } elseif ($i >= 50) {
        $heating['v.big'][$i] = 0;
    }
}


$fuzzyValues = [];

foreach ($difference as $key => $value) {
    $fuzzyValues[] = [$difference[$key][$tempDifference], $key];
}

/*echo "<pre>";
print_r($fuzzyValues);
echo "</pre>";*/


$heatingAfterConc = [];

//RULE IF difference = v.small THEN heating = v.big
$min = $fuzzyValues[0][0];
$heatingAfterConc[] = getHeatingAfeterConc($min, $heating['v.small']);

//RULE IF difference = small THEN heating = big
$min = $fuzzyValues[1][0];
$heatingAfterConc[] = getHeatingAfeterConc($min, $heating['small']);

//RULE IF difference = medium THEN heating = medium
$min = $fuzzyValues[2][0];
$heatingAfterConc[] = getHeatingAfeterConc($min, $heating['medium']);

//RULE IF difference = big THEN heating = small
$min = $fuzzyValues[3][0];
$heatingAfterConc[] = getHeatingAfeterConc($min, $heating['big']);

//RULE IF difference = v.big THEN heating = v.small
$min = $fuzzyValues[4][0];
$heatingAfterConc[] = getHeatingAfeterConc($min, $heating['v.big']);

function getHeatingAfeterConc($min, array $heating): array
{
    for ($i = -10; $i <= 50; $i++) {
        if ($min < $heating[$i]) {
            $heatingAfterConcValue[$i] = $min;
        } else {
            $heatingAfterConcValue[$i] = $heating[$i];
        }
    }

    return $heatingAfterConcValue;
}

/*echo "<pre>";
print_r($heatingAfterConc);
echo "</pre>";*/


$afterAggregation = [];
for ($i = -10; $i <= 50; $i++) {

    $max = 0;
    foreach ($heatingAfterConc as $key => $value) {
        if ($value[$i] > $max) {
            $max = $value[$i];
        }
    }
    $afterAggregation[$i] = $max;
}

/*echo "<pre>";
print_r($afterAggregation);
echo "</pre>";*/


//WYOSTRZENIE
$nominator = 0;
$denominator = 0;
for ($i = -10; $i <= 50; $i++) {
    $nominator = round($nominator + ($i * $afterAggregation[$i]), 2);
    $denominator = $denominator + $afterAggregation[$i];
}

echo $sharpen_value = $nominator / $denominator;

$tempAfterHeating = round($tempInside + ($tempInside * $sharpen_value * 0.01), 2);

$data = [
    'tempAfterHeating' => $tempAfterHeating,
    'sharpenHeatingValue' => $sharpen_value
];

echo json_encode($data);
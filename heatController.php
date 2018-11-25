<?php
/**
 * Created by PhpStorm.
 * User: Damian Szczęsny
 * Date: 25.11.2018
 * Time: 17:40
 */


/**
 * 1. STARTING VARIABLES
 */

//Temperature in outside
$tempInside = $_GET["actTemp"];
settype($tempInside, "float");

//Temperature desired
$tempDesired = 21.00;


/**
 * 2. INITIATION LINGUISTIC VARIABLE - DIFFERENCE, HEATING
 */

//Temperature difference
$tempDifference = round($tempDesired - $tempInside, 2);

//Array for for linguistic variable - DIFFERANCE
$difference = [];

//Array for for linguistic variable - HEATING
$heating = [];

//LINGUISTIC VARIABLE - DIFFERENCE [v.small, small, medium, big, v.big]
//array from -10 to 50, increments = 0.01, [min differance = 0, max differance = 40]
for ($i = -10; $i <= 50; $i = $i + 0.01) {

    //Needed to precise couse it's bad rounding in further iterations (ex: $i = 0.0000001 instead 0.01)
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

/*echo "<pre>";
print_r($difference);
echo "</pre>";*/

//LINGUISTIC VARIABLE - HEATING [v.small, small, medium, big, v.big]
//array from -10 to 50, increments = 0.01, [min heating = 0, max heating = 40]
for ($i = -10; $i <= 50; $i = $i + 0.01) {

    $i = round($i, 2);

    //VARIABLE - V.SMALL
    if ($i <= -10) {
        $heating['v.small']["$i"] = 0;
    } elseif ($i > -10 && $i <= 0) {
        $heating['v.small']["$i"] = ($i - (-10)) / (0 - (-10));
    } elseif ($i > 0 && $i < 10) {
        $heating['v.small']["$i"] = (10 - $i) / (10 - 0);
    } elseif ($i >= 10) {
        $heating['v.small']["$i"] = 0;
    }

    //VARIABLE - SMALL
    if ($i <= 0) {
        $heating['small']["$i"] = 0;
    } elseif ($i > 0 && $i <= 10) {
        $heating['small']["$i"] = ($i - 0) / (10 - 0);
    } elseif ($i > 10 && $i < 20) {
        $heating['small']["$i"] = (20 - $i) / (20 - 10);
    } elseif ($i >= 20) {
        $heating['small']["$i"] = 0;
    }

    //VARIABLE - MEDIUM
    if ($i <= 10) {
        $heating['medium']["$i"] = 0;
    } elseif ($i > 10 && $i <= 20) {
        $heating['medium']["$i"] = ($i - 10) / (20 - 10);
    } elseif ($i > 20 && $i < 30) {
        $heating['medium']["$i"] = (30 - $i) / (30 - 20);
    } elseif ($i >= 30) {
        $heating['medium']["$i"] = 0;
    }

    //VARIABLE - BIG
    if ($i <= 20) {
        $heating['big']["$i"] = 0;
    } elseif ($i > 20 && $i <= 30) {
        $heating['big']["$i"] = ($i - 20) / (30 - 20);
    } elseif ($i > 30 && $i < 40) {
        $heating['big']["$i"] = (40 - $i) / (40 - 30);
    } elseif ($i >= 40) {
        $heating['big']["$i"] = 0;
    }

    //VARIABLE - V.BIG
    if ($i <= 30) {
        $heating['v.big']["$i"] = 0;
    } elseif ($i > 30 && $i <= 40) {
        $heating['v.big']["$i"] = ($i - 30) / (40 - 30);
    } elseif ($i > 40 && $i < 50) {
        $heating['v.big']["$i"] = (50 - $i) / (50 - 40);
    } elseif ($i >= 50) {
        $heating['v.big']["$i"] = 0;
    }
}

//ZMIENNA LINGWISTYCZNA - WENTYLACJA
//200 (200m3/h) odpowiednik około 2000rmp (obroty na minutę)
for ($i = -40; $i <= 200; $i++) {
    //TERM - MAŁE (WYŁĄCZ)
    if ($i <= -40 || $i >= 40) {
        $wentylacja['b_male'][$i] = 0;
    } elseif ($i > -40 && $i <= 0) {
        $wentylacja['b_male'][$i] = ($i - (-40)) / (0 - (-40));
    } elseif ($i > 0 && $i < 40) {
        $wentylacja['b_male'][$i] = (40 - $i) / (40 - 0);
    }
    //TERM - ŚREDNIE
    if ($i <= 0 || $i >= 80) {
        $wentylacja['male'][$i] = 0;
    } elseif ($i > 0 && $i <= 40) {
        $wentylacja['male'][$i] = ($i - 0) / (40 - 0);
    } elseif ($i > 40 && $i < 80) {
        $wentylacja['male'][$i] = (80 - $i) / (80 - 40);
    }
    //TERM - ŚREDNIE
    if ($i <= 40 || $i >= 120) {
        $wentylacja['srednie'][$i] = 0;
    } elseif ($i > 40 && $i <= 80) {
        $wentylacja['srednie'][$i] = ($i - 40) / (80 - 40);
    } elseif ($i > 80 && $i < 120) {
        $wentylacja['srednie'][$i] = (120 - $i) / (120 - 80);
    }
    //TERM - ŚREDNIE
    if ($i <= 80 || $i >= 160) {
        $wentylacja['duze'][$i] = 0;
    } elseif ($i > 80 && $i <= 120) {
        $wentylacja['duze'][$i] = ($i - 80) / (120 - 80);
    } elseif ($i > 120 && $i < 160) {
        $wentylacja['duze'][$i] = (160 - $i) / (160 - 120);
    }
    //TERM - ŚREDNIE
    if ($i <= 120 || $i >= 200) {
        $wentylacja['b_duze'][$i] = 0;
    } elseif ($i > 120 && $i <= 160) {
        $wentylacja['b_duze'][$i] = ($i - 120) / (160 - 120);
    } elseif ($i > 160 && $i < 200) {
        $wentylacja['b_duze'][$i] = (200 - $i) / (200 - 160);
    }
}

/**
 * 3. FUZZIFICATION
 */

//Array for all fuzzy values [v.small, small, middle, big, v.big]
$fuzzyValues = [];

//It searches value for provided difference of temperature and adds to $fuzzyArray
foreach ($difference as $key => $value) {
    $fuzzyValues[] = [$difference[$key]["$tempDifference"], $key];
}

/*echo "<pre>";
print_r($fuzzyValues);
echo "</pre>";*/


/**
 * 3. CONCLUSION
 */

//Array for CONCLUSION (function min($fuzzyValue, chosen heating array <- based on rules)
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

//It returns array after performing function min(fuzzy value, arr)
//It performs function in heating variable!
function getHeatingAfeterConc($min, array $heating): array
{
    for ($i = -10; $i <= 50; $i = $i + 0.01) {

        $i = round($i, 2);

        if ($min < $heating["$i"]) {
            $heatingAfterConcValue["$i"] = $min;
        } else {
            $heatingAfterConcValue["$i"] = $heating["$i"];
        }
    }
    return $heatingAfterConcValue;
}

/*echo "<pre>";
print_r($heatingAfterConc);
echo "</pre>";*/


/**
 * 4. AGGREGATION
 */

//Array for aggregation (function max(all terms after conclusion)
$afterAggregation = [];
for ($i = -10; $i <= 50; $i = $i + 0.01) {

    $i = round($i, 2);

    $max = 0;
    foreach ($heatingAfterConc as $key => $value) {
        if ($value["$i"] > $max) {
            $max = $value["$i"];
        }
    }
    $afterAggregation["$i"] = $max;
}
/*echo "<pre>";
print_r($afterAggregation);
echo "</pre>";*/

/**
 * 5. DEFUZZIFICATION / SHARPENING
 */

$nominator = 0;
$denominator = 0;

//It calculates sharpen value based on array for aggregation
for ($i = -10; $i <= 50; $i = $i + 0.01) {

    $i = round($i, 2);

    $nominator = round($nominator + ($i * $afterAggregation["$i"]), 2);
    $denominator = $denominator + $afterAggregation["$i"];
}

//Sharpen value
$sharpen_value = round($nominator / $denominator, 2);


//Calculating temperature gain
$tempAfterHeating = roundUp($tempInside + ($tempInside * $sharpen_value * 0.01), 2);

//It returns value round to $precision value, value is rounded up (ex. 0.021 => 0.03)
function roundUp($value, $precision)
{
    $pow = pow(10, $precision);
    return (ceil($pow * $value) + ceil($pow * $value - ceil($pow * $value))) / $pow;
}

//Data to send in json format
$data = [
    'tempAfterHeating' => $tempAfterHeating,
    'sharpenHeatingValue' => $sharpen_value
];

//printing json data
echo json_encode($data);
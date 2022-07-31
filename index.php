<?php


function apply(array $arr, string $operationName, int $index = null, $value = null): array
{
    switch ($operationName) {
        case 'reset':
            $empty = [];
            return $empty;
        case 'remove':
            unset($arr[$index]);
            return $arr;
        case 'change':
            $arr[$index] = $value;
            return $arr;
        default:
            return $arr;
    }
}


function get($array, $index, $def = null)
{
    if ((sizeof($array) - 1) < $index || $index < 0) {
        return $def;
    }
    return $array[$index];
    // return array_key_exists($index, $arr) ? $arr[$index] : $default;
}

function addPrefix($arr, $prefix)
{
    $res = [];
    for ($i = 0; $i < count($arr); $i++) {
        $res[] = $prefix . " " . $arr[$i];
    }
    return $res;
}


function swap($arr, $index)
{
    if (!array_key_exists($index + 1, $arr) || !array_key_exists($index - 1, $arr)) {
        return $arr;
    }
    for ($i = 0; $i < sizeof($arr); $i++) {
        $tmp = $arr[$index - 1];
        $arr[$index - 1] = $arr[$index + 1];
        $arr[$index + 1] = $tmp;
        return $arr;
    }
}

function isContinuousSequence($arrays)
{
    if (empty($arrays) || count($arrays) == 1) {
        return false;
    }
    $first = $arrays[0];
    // for($i=0; $i< count($arrays);$i++){
    //     if($first !== $arrays[$i])
    //         return false; 
    //     $first++;
    // }
    foreach ($arrays as $k => $v) {
        if ($first !== $v)
            return false;
        $first++;
    }
    return true;
}


function calculateAverage($arr)
{
    if (empty($arr))
        return 0;
    return array_sum($arr) / count($arr);
}


function getTotalAmount($money, $name)
{
    $res = 0;
    for ($i = 0; $i < count($money); $i++) {
        if (strpos($money[$i], $name) === 0) {
            $array[] = explode(' ', $money[$i]);;
        }
    }
    for ($i = 0; $i < count($array); $i++) {
        $res += $array[$i][1];
    }
    return $res;
}
// function getTotalAmount(array $money, string $currency): int
// {
//     $sum = 0;
//     foreach ($money as $bill) {
//         $currentCurrency = substr($bill, 0, 3);
//         if ($currentCurrency !== $currency) {
//             continue;
//         }
//         $denomination = (int) substr($bill, 4);
//         $sum += $denomination;
//     }
//     return $sum;
// }

function getSameParity($arr)
{
    if (empty($arr)) {
        return $arr;
    }
    $evenArray = [];
    $notEvenArray = [];
    foreach ($arr as $element) {
        if ($element % 2 === 0) {
            $evenArray[] = $element;
        } else {
            $notEvenArray[] = $element;
        }
    }
    return ($arr[0] % 2 === 0) ? $evenArray : $notEvenArray;
}

// function getSameParity($coll)
// {
//     if (empty($coll)) {
//         return [];
//     }
//     $result = [];
//     $remainder = $coll[0] % 2;
//     foreach ($coll as $item) {
//         if ($item % 2 === $remainder) {
//             $result[] = $item;
//         }
//     }
//     return $result;
// }



function getSuperSeriesWinner($scores)
{
    $winCan = $winUssr = 0;
    for ($i = 0; $i < count($scores); $i++) {
        $res = $scores[$i][0] - $scores[$i][1];
        if ($res < 0) {
            $winUssr += 1;
        }
        if ($res > 0) {
            $winCan += 1;
        }
    }
    if ($winCan > $winUssr) {
        return 'canada';
    }
    if ($winUssr > $winCan) {
        return 'ussr';
    }
    return null;
}

// function getSuperSeriesWinner($scores)
// {
//     $result = 0;
//     foreach ($scores as $score) {
//      // $result = $result + ($score[0] <=> $score[1]);
//         $result += $score[0] <=> $score[1];
//     }

//     if ($result > 0) {
//         return 'canada';
//     } elseif ($result < 0) {
//         return 'ussr';
//     }

//     return null;
// }


function buildDefinitionList($array)
{
    if (empty($array)) {
        return null;
    }
    $result = [];
    foreach ($array as $value) {
        $result[] = "<dt>{$value[0]}</dt><dd>{$value[1]}</dd>";
    }
    $innerValue = implode('', $result);
    return "<dl>{$innerValue}</dl>";
}

function makeCensored($text, $stop)
{
    $words = explode(' ', $text);
    for ($i = 0; $i < count($words); $i++) {
        if (in_array($words[$i], $stop)) {
            $result[] = "$#%!";
        } else {
            $result[] = "$words[$i]";
        }
    }
    return implode(' ', $result);
}
// function makeCensored(string $text, array $stopWords)
// {
//     $words = explode(' ', $text);
//     $result = [];
//     foreach ($words as $word) {
//         $result[] = in_array($word, $stopWords) ? '$#%!' : $word;
//     }

//     return implode(' ', $result);
// }

// $sentence = 'When you play the game of thrones, you win or you die';
// makeCensored($sentence, ['die', 'play']);
// // => When you $#%! the game of thrones, you win or you $#%!

// $sentence2 = 'chicken chicken? chicken! chicken';
// makeCensored($sentence2, ['?', 'chicken']);
// // => '$#%! chicken? chicken! $#%!';

function  getSameCount($arrFirst, $arrSecond)
{

    $arrResult = [];
    foreach ($arrFirst as $itemF) {
        if (in_array($itemF, $arrSecond)) {
            if (in_array($itemF, $arrResult) === false) {
                $arrResult[] = $itemF;
            }
        }
    }
    print_r(count($arrResult));
    return count($arrResult);
}
// function getSameCount($coll1, $coll2)
// {
//     $count = 0;
//     $uniqColl1 = array_unique($coll1);
//     $uniqColl2 = array_unique($coll2);
//     foreach ($uniqColl1 as $item1) {
//         foreach ($uniqColl2 as $item2) {
//             if ($item1 === $item2) {
//                 $count++;
//             }
//         }
//     }

//     return $count;
// }

function countUniqChars($text)
{
    if ($text == '') return 0;
    $arr = str_split($text);
    return count(array_unique($arr));
}
// function countUniqChars($text)
// {
//     $uniqChars = [];
//     for ($i = 0; $i < strlen($text); $i++) {
//         if (!in_array($text[$i], $uniqChars)) {
//             $uniqChars[] = $text[$i];
//         }
//     }
//     return count($uniqChars);
// }


function bubbleSort($coll)
{
    $size = count($coll);
    do {
        $swapped = false;
        for ($i = 0; $i < $size - 1; $i++) {
            if ($coll[$i] > $coll[$i + 1]) {
                $temp = $coll[$i];
                $coll[$i] = $coll[$i + 1];
                $coll[$i + 1] = $temp;
                $swapped = true;
            }
        }
        $size--;
    } while ($swapped);
    return $coll;
}

function  checkIfBalanced($str)
{
    $arrs = str_split($str);
    $res = [];
    foreach ($arrs as $arr) {
        if ($arr == "(") {
            array_push($res, '(');
        } elseif ($arr == ")") {
            if (empty($res)) {
                return false;
            }
            array_pop($res);
        }
    }
    print_r($res);
    return count($res) === 0;
}


function getIntersectionOfSortedArray($arr1, $arr2)
{
    foreach ($arr1 as $arr_1) {
        foreach ($arr2 as $arr_2) {
            if ($arr_1 == $arr_2) {
                $res[] = $arr_2;
            }
        }
    }
    return empty($res) ? [] : $res;
}

// function getIntersectionOfSortedArray($arr1, $arr2)
// {
//     $size1 = count($arr1);
//     $size2 = count($arr2);
//     $i1 = 0;
//     $i2 = 0;
//     $result = [];
//     while ($i1 < $size1 && $i2 < $size2) {
//         if ($arr1[$i1] === $arr2[$i2]) {
//             $result[] = $arr1[$i1];
//             $i1++;
//             $i2++;
//         } elseif ($arr1[$i1] > $arr2[$i2]) {
//             $i2++;
//         } else {
//             $i1++;
//         }
//     }
//     return $result;
// }

function getDistance(array $point1, array $point2)
{
    [$x1, $y1] = $point1;
    [$x2, $y2] = $point2;
    $xs = $x2 - $x1;
    $ys = $y2 - $y1;
    return sqrt($xs ** 2 + $ys ** 2);
}
function getTheNearestLocation(array $locations, array $currentPoint)
{
    if (empty($locations)) {
        return null;
    }
    [$nearestLocation] = $locations;
    [, $nearestPoint] = $nearestLocation;
    $lowestDistance = getDistance($currentPoint, $nearestPoint);
    foreach ($locations as $location) {
        [, $point] = $location;
        $distance = getDistance($currentPoint, $point);
        if ($distance < $lowestDistance) {
            $lowestDistance = $distance;
            $nearestLocation = $location;
        }
    }

    return $nearestLocation;
}



function array_flatten($array)
{
    $return = array();
    foreach ($array as $value) {
        if (is_array($value)) {
            $return = array_merge($return, array_flatten($value));
        } else {
            $return[] = $value;
        }
    }
    return $return;
}

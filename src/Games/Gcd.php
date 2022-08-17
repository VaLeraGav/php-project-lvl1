<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function runGcd()
{
    $runGame = function () {
        $first = rand(1, 100);
        $second = rand(1, 100);
        $question = "{$first} {$second}";
        $result = (string)gcd($first, $second);
        return [$question, (string)$result];
    };
    run(DESCRIPTION, $runGame);
}

function gcd(int $first, int $second)
{
    if ($first == 0 ||  $second == 0) {
        return $first + $second;
    }
    if ($first > $second) {
        return gcd($first - $second, $second);
    } else {
        return gcd($first, $second - $first);
    }
}
// function  gcd(int $first, int $second)
// {
//     if ($second === 0) {
//         return abs($first);
//     }
//     return gcd($second, $first % $second);
// }
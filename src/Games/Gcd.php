<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function runGcd()
{
    $runGame = function () {
        $first = rand(1, 100);
        $second = rand(1, 100);
        $question = "{$first} {$second}";
        $result = gcd($first, $second);
        return [$question, $result];
    };
    run(DESCRIPTION, $runGame);
}

// function gcd(int $first, int $second): string
// {
//     if ($first == 0 ||  $second == 0) {
//         return $first + $second;
//     }
//     if ($first > $second) {
//         return gcd($first - $second, $second);
//     } else {
//         return gcd($first, $second - $first);
//     }
// }

function gcd(int $first, int $second): string
{
    $result = 1;
    for ($i = 1; $i < ($first + 1); $i++) {
        if ($first % $i === 0 && $second % $i === 0) {
            $result = $i;
        }
    }
    return $result;
}

<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run()
{
    $runGame = function () {
        $first = rand(1, 100);
        $second = rand(1, 100);
        $question = "{$first} {$second}";
        $answer = gcd($first, $second);
        return [$question, $answer];
    };
    runGame(DESCRIPTION, $runGame);
}

function gcd(int $first, int $second): string
{
    if ($first == 0 ||  $second == 0) {
        return $first + $second;
    }
    return ($first > $second) ? gcd($first % $second, $second) : gcd($first, $second % $first);
}

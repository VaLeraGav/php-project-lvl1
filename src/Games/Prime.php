<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;

const DESCRIPTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

function runPrime()
{
    $runGame = function () {
        $question = rand(1, 100);
        $result = isPrime($question) ? 'yes' : 'no';
        return [$question, (string)$result];
    };
    run(DESCRIPTION, $runGame);
}

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\run;

const DESCRIPTION = "Answer 'yes' if the number is even, otherwise answer 'no'.";

function runEven()
{
    $runGame = function () {
        $number = rand(1, 100);
        $message = "Question: {$number}";
        $result = isEven($number) ? 'yes' : 'no';
        return [$message, (string) $result];
    };
    run(DESCRIPTION, $runGame);
}

function isEven(int $number)
{
    return $number % 2 === 0;
}

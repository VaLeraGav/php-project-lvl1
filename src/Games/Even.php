<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function run()
{
    $runGame = function () {
        $number = rand(1, 100);
        $message = "Question: {$number}";
        $answer = isEven($number) ? 'yes' : 'no';
        return [$message, $answer];
    };
    runGame(DESCRIPTION, $runGame);
}

function isEven(int $number)
{
    return $number % 2 === 0;
}

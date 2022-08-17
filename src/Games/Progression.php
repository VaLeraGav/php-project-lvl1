<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const DESCRIPTION = "What number is missing in the progression?";

function runProgression()
{
    $runGame = function () {
        $start = rand(1, 10);
        $step = rand(1, 5);
        $size = 10;
        $progression = generateProgression($start, $step, $size);
        $randomPosition = rand(0, $size - 1);
        $progressionWithHidden = array_replace($progression, [$randomPosition => '..']);
        $question = implode(' ', $progressionWithHidden);
        $result = $progression[$randomPosition];
        return [$question, (string) $result];
    };
    run(DESCRIPTION, $runGame);
}

function  generateProgression(int $start, int $step, int $size)
{
    $res = [];
    for ($i = 1; $i <= $size; $i += 1) {
        $res[] = $start + $i * $step;
    }
    return $res;
}

<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'What number is missing in the progression?';

function run()
{
    $runGame = function () {
        $start = rand(1, 10);
        $step = rand(1, 5);

        $size = 10;
        $progression = generateProgression($start, $step, $size);
        $randomPosition = rand(0, $size - 1);
        $answer = $progression[$randomPosition];

        $progressionWithHidden = array_replace($progression, [$randomPosition => '..']);
        $question = implode(' ', $progressionWithHidden);

        return [$question, (string) $answer];
    };
    runGame(DESCRIPTION, $runGame);
}

function generateProgression(int $start, int $step, int $size)
{
    $res = [];
    for ($i = 1; $i <= $size; $i += 1) {
        $res[] = $start + $i * $step;
    }
    return $res;
}

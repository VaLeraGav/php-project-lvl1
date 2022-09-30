<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'What is the result of the expression?';

function calculate(int $first, int $second, string $sign): string
{
    switch ($sign) {
        case '+':
            return $first + $second;
        case '-':
            return $first - $second;
        case '*':
            return $first * $second;
        default:
            throw new \Error("Incorrect sign: '{$sign}'");
    }
}

function run()
{
    $runGame = function () {
        $first = rand(1, 100);
        $second = rand(1, 100);
        $signs = ['-', '+', '*'];
        $sign = $signs[array_rand($signs)];
        $question = "{$first} {$sign} {$second}";
        $answer = calculate($first, $second, $sign);
        return [$question, $answer];
    };
    runGame(DESCRIPTION, $runGame);
}

<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

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

function runCalculator()
{
    $runGame = function () {
        $first = rand(1, 100);
        $second = rand(1, 100);
        $signs = ['-', '+', '*'];
        $sign = $signs[array_rand($signs)];
        $question = "{$first} {$sign} {$second}";
        $result = calculate($first, $second, $sign);
        return [$question, $result];
    };
    run(DESCRIPTION, $runGame);
}

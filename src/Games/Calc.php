<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

const DESCRIPTION = "What is the result of the expression?";

function runCalculator()
{
    $runGame = function () {
        $first = rand(1, 100);
        $second = rand(1, 100);
        $signs = ['-', '+', '*'];
        $sign = $signs[array_rand($signs)];
        $question = "{$first}{$sign}{$second}";
        switch ($sign) {
            case '-':
                $result = $first - $second;
                break;
            case '+':
                $result = $first + $second;
                break;
            case '*':
                $result = $first * $second;
                break;
        } 
        return [$question, (string)$result];
    };
    run(DESCRIPTION, $runGame);
}

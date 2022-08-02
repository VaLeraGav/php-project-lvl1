<?php

namespace BrainGames\Games\Calc;

use FFI\Exception;
use function BrainGames\Engine\run;

const DESCRIPTION = "What is the result of the expression?";

function calculator()
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
            default:
                throw new Exception('There is no such operator: {$sign}.');
        }
        print_r($result);
        return [$question, $result];
    };
    run(DESCRIPTION, $runGame);
}

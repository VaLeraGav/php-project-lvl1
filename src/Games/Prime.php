<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{
    $runGame = function () {
        $question = rand(1, 100);
        $answer = isPrime($question) ? 'yes' : 'no';
        return [$question, $answer];
    };
    runGame(DESCRIPTION, $runGame);
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

<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no"' . PHP_EOL);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 99);
        $message = "Question: {$number}";
        $answer = prompt($message);
        $realAnswer = isEven($number) ? 'yes' : 'no';
        if ($answer === $realAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $realAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line('Congratulations, %s!', $name);
}

function isEven(int $number)
{
    return $number % 2 === 0;
}

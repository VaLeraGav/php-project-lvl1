<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runGame(string $description, callable $runGame, int $roundsCount = 3)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    line($description);
    for ($i = 0; $i < $roundsCount; $i++) {
        [$question, $rightAnswer] = $runGame();
        line("Question: {$question}");

        $answerUser = prompt('You answer');
        if ($rightAnswer !== $answerUser) {
            line("'{$answerUser}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}

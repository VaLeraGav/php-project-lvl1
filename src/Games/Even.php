<?php

namespace BrainGames\Games\Even;

function runEven()
{
    $number = rand(1, 100);
    $message = "Question: {$number}";
    $realAnswer = isEven($number) ? 'yes' : 'no';
    return [$message, $realAnswer];
}

function isEven(int $number)
{
    return $number % 2 === 0;
}
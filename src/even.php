<?php

namespace BrainGames\Even;

use function \cli\line;
use function \cli\prompt;

define('EVENGAMESTEP', 3);

function game()
{
    $name = greeting();

    $step = 1;
    $loose = false;

    do {
        $question = generateNumber();
        $answer = request($question);
        if (rightAns($question, $answer)) {
            congratulate();
            $step++;
        } else {
            $loose = true;
        }
    } while (!($loose || $step > EVENGAMESTEP));

    if ($loose) {
        loose($name);
    } else {
        congratulateFin($name);
    }
}

function greeting() : string
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no"!');
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function request(int $num) : string
{
    line("Question: {$num}");
    $ans = prompt('Your answer? [yes / no] ');
    return $ans;
}

function generateNumber() : int
{
    return rand(0, 1000);
}

function rightAns(int $num, string $ans) : bool
{
    return ($num % 2 === 0 && $ans === 'yes') || ($num % 2 != 0 && $ans === 'no');
}

function congratulate()
{
    line("Correct!");
}

function congratulateFin(string $name)
{
    line("Congratulations, {$name}!");
}

function loose()
{
    line("Sorry, you lose...");
}

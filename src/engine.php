<?php

namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;

define('GAMESTEP', 3);

function congratulate()
{
    line("Correct!");
}

function loose(string $userAns, string $trueAns, string $name)
{
    line("'{$userAns}' is wrong answer ;(. Correct answer was '{$trueAns}'");
    line("Let's try again, {$name}!");
}

function congratulateFin(string $name)
{
    line("Congratulations, {$name}!");
}

function request(string $questText, string $ansCondition = '') : string
{
    line("Question: {$questText}");
    $ans = prompt("Your answer? {$ansCondition} ");
    return $ans;
}

function greeting(string $description) : string
{
    line('Welcome to the Brain Game!');
    line($description);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function run($generateQuestion, string $description = '', string $ansCondition = '')
{
    $name = greeting($description);

    $step = 1;
    $loose = false;

    do {
        [$question, $trueAnswer] = $generateQuestion();
        $answer = request($question, $ansCondition);
        if ($trueAnswer == $answer) {
            congratulate();
            $step++;
        } else {
            loose($answer, $trueAnswer, $name);
            $loose = true;
        }
    } while (!($loose || $step > GAMESTEP));

    if (!$loose) {
        congratulateFin($name);
    }
}

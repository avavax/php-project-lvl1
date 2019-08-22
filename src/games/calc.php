<?php

namespace BrainGames\Games\Calc;

use function \BrainGames\Engine\run;

function game()
{
    $generateQuestion = function () : array {
        $first = rand(0, 10);
        $second = rand(0, 10);
        $operation = rand(1, 3);
        switch ($operation) {
            case 1:
                $quest = "{$first} + {$second}";
                $ans = $first + $second;
                break;
            case 2:
                $quest = "{$first} - {$second}";
                $ans = $first - $second;
                break;
            case 3:
                $quest = "{$first} * {$second}";
                $ans = $first * $second;
                break;
        }
        return [$quest, $ans];
    };

    $description = 'What is the result of the expression?';

    $ansCondition = '';

    run($generateQuestion, $description, $ansCondition);
}

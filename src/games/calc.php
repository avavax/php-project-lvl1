<?php

namespace BrainGames\Games\Calc;

use function \BrainGames\Engine\run;

const DESCRIPTION = 'What is the result of the expression?';
const MIN = 0;
const MAX = 100;

/**
 * Запуск игры с настройками
 */
function game()
{
    $generateQuestion = function () : array {
        $first = rand(MIN, MAX);
        $second = rand(MIN, MAX);
        $operation = rand(1, 3);
        switch ($operation) {
            case 1:
                $question = "{$first} + {$second}";
                $answer = $first + $second;
                break;
            case 2:
                $question = "{$first} - {$second}";
                $answer = $first - $second;
                break;
            case 3:
                $question = "{$first} * {$second}";
                $answer = $first * $second;
                break;
        }
        return [$question, $answer];
    };

    run($generateQuestion, DESCRIPTION);
}

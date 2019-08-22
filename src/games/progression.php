<?php

namespace BrainGames\Games\Progression;

use function \BrainGames\Engine\run;
use function \BrainGames\Lib\Math\progression;

/**
 * Запуск игры с настройками
 */
function game()
{
    $generateQuestion = function () : array {
        $first = rand(0, 100);
        $step = rand(1, 5);
        $space = rand(1, 8);
        $quest = progression($first, $step, $space);
        $ans = $first + $step * $space;
        return [$quest, $ans];
    };

    $description = 'Find the greatest common divisor of given numbers';

    $ansCondition = '';

    run($generateQuestion, $description, $ansCondition);
}

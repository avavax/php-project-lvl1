<?php

namespace BrainGames\Games\Gcd;

use function \BrainGames\Engine\run;
use function \BrainGames\Lib\Math\gcd;

/**
 * Запуск игры с настройками
 */
function game()
{
    $generateQuestion = function () : array {
        $first = rand(0, 100);
        $second = rand(0, 100);
        $quest = "{$first} {$second}";
        $ans = gcd($first, $second);
        return [$quest, $ans];
    };

    $description = 'Find the greatest common divisor of given numbers';

    $ansCondition = '';

    run($generateQuestion, $description, $ansCondition);
}

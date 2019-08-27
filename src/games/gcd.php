<?php

namespace BrainGames\Games\Gcd;

use function \BrainGames\Engine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers';
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
        $question = "{$first} {$second}";
        $answer = gcd($first, $second);
        return [$question, $answer];
    };

    run($generateQuestion, DESCRIPTION);
}

/**
 * Наибольший общий делитель
 *
 * @param int $a
 * @param int $b
 *
 * @return int НОД
 */
function gcd(int $a, int $b) : int
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
}

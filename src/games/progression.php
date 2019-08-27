<?php

namespace BrainGames\Games\Progression;

use function \BrainGames\Engine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers';
const MIN_NUMBER = 0;
const MAX_NUMBER = 100;
const MAX_STEP = 5;
const NUMBERS_IN_ROW = 10;

/**
 * Запуск игры с настройками
 */
function game()
{
    $generateQuestion = function () : array {
        $first = rand(MIN_NUMBER, MAX_NUMBER);
        $step = rand(1, MAX_STEP);
        $space = rand(1, NUMBERS_IN_ROW - 1);
        $question = progression($first, $step, $space, NUMBERS_IN_ROW);
        $answer = $first + $step * $space;
        return [$question, $answer];
    };

    run($generateQuestion, DESCRIPTION);
}

/**
 * Получение числового ряда с пропуском в виде строки
 *
 * @param int $first начальное число
 * @param int $step  шаг
 * @param int $space место пропуска
 *
 * @return string
 */
function progression(int $first, int $step, int $space, int $numbersInRow) : string
{
    $arr = range($first, $first + $step * ($numbersInRow - 1), $step);
    $arr[$space] = '..';
    return implode(' ', $arr);
}

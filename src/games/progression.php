<?php

namespace BrainGames\Games\Progression;

use function \BrainGames\Engine\run;

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

/**
 * Получение числового ряда с пропуском в виде строки
 *
 * @param int $first начальное число
 * @param int $step  шаг
 * @param int $space место пропуска
 *
 * @return string
 */
function progression(int $first, int $step, int $space) : string
{
    $arr = range($first, $first + $step * 9, $step);
    $arr[$space] = '..';
    return implode(' ', $arr);
}

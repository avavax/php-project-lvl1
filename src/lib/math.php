<?php

namespace BrainGames\Lib\Math;

/**
 * Наибольший общий делитель
 *
 * @param int $a первое число
 * @param int $b второе число
 *
 * @return int НОД
 */
function gcd(int $a, int $b) : int
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
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

/**
 * Проверка на простое число
 *
 * @param int $num исходное число
 *
 * @return boolean
 */
function isSimple(int $num) : bool
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

<?php

namespace BrainGames\Games\Prime;

use function \BrainGames\Engine\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no"';
const ANSWER_CONDITION = '[yes / no]';
const MIN = 0;
const MAX = 100;

/**
 * Запуск игры с настройками
 */
function game()
{
    $generateQuestion = function () : array {
        $question = rand(MIN, MAX);
        $answer = isSimple($question) ? 'yes' : 'no';
        return [$question, $answer];
    };

    run($generateQuestion, DESCRIPTION, ANSWER_CONDITION);
}

/**
 * Проверка на простое число
 *
 * @param int $num
 *
 * @return boolean
 */
function isSimple(int $num) : bool
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

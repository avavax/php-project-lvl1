<?php

namespace BrainGames\Games\Even;

use function \BrainGames\Engine\run;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no"!';
const ANSWER_CONDITION = '[yes / no]';
const MIN = 0;
const MAX = 1000;

/**
 * Запуск игры с настройками
 */
function game()
{
    $generateQuestion = function () : array {
        $question = rand(MIN, MAX);
        $answer = isEven($question) ? 'yes' : 'no';
        return [$question, $answer];
    };

    run($generateQuestion, DESCRIPTION, ANSWER_CONDITION);
}

/**
 * Проверка на чётность
 *
 * @param int $number
 *
 * @return boolean
 */
function isEven(int $number) : bool
{
    return $number % 2 === 0;
}

<?php

namespace BrainGames\Engine;

use function \BrainGames\Lib\Services\congratulate;
use function \BrainGames\Lib\Services\loose;
use function \BrainGames\Lib\Services\congratulateFin;
use function \BrainGames\Lib\Services\request;
use function \BrainGames\Lib\Services\greeting;

const GAME_STEP = 3;

/**
 * Основной цикл игры
 *
 * @param function $generateQuestion функция формирующая вопрос и правильный ответ
 * @param string   $description      описание игры
 * @param string   $ansCondition     условия ответа
 */
function run($generateQuestion, string $description = '', string $ansCondition = '')
{
    $name = greeting($description);

    $step = 1;
    $loose = false;

    do {
        [$question, $trueAnswer] = $generateQuestion();
        $answer = request($question, $ansCondition);
        if ($trueAnswer == $answer) {
            congratulate();
            $step++;
        } else {
            loose($answer, $trueAnswer, $name);
            $loose = true;
        }
    } while (!($loose || $step > GAME_STEP));

    if (!$loose) {
        congratulateFin($name);
    }
}

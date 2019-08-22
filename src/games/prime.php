<?php

namespace BrainGames\Games\Prime;

use function \BrainGames\Engine\run;
use function \BrainGames\Lib\Math\isSimple;

/**
 * Запуск игры с настройками
 */
function game()
{
    $generateQuestion = function () : array {
        $quest = rand(0, 100);
        $ans = isSimple($quest) ? 'yes' : 'no';
        return [$quest, $ans];
    };

    $description = 'Answer "yes" if given number is prime. Otherwise answer "no"';

    $ansCondition = '[yes / no]';

    run($generateQuestion, $description, $ansCondition);
}

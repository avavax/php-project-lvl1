<?php

namespace BrainGames\Games\Even;

use function \BrainGames\Engine\run;

function game()
{
    $generateQuestion = function () : array {
        $quest = rand(0, 1000);
        $ans = ($quest % 2 === 0) ? 'yes' : 'no';
        return [$quest, $ans];
    };

    $description = 'Answer "yes" if number even otherwise answer "no"!';

    $ansCondition = '[yes / no]';

    run($generateQuestion, $description, $ansCondition);
}

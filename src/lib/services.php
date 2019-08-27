<?php

namespace BrainGames\Lib\Services;

use function \cli\line;
use function \cli\prompt;

/**
 * Приветствие пользователя
 */
function congratulate()
{
    line("Correct!");
}

/**
 * Вывод сообщения о проигрыше
 *
 * @param string $userAns ответ пользователя
 * @param string $trueAns правильный ответ
 * @param string $name    имя пользователя
 */
function loose(string $userAns, string $trueAns, string $name)
{
    line("'{$userAns}' is wrong answer ;(. Correct answer was '{$trueAns}'");
    line("Let's try again, {$name}!");
}

/**
 * Поздравление при правильном ответе
 *
 * @param string $name имя пользователя
  */
function congratulateFin(string $name)
{
    line("Congratulations, {$name}!");
}

/**
 * Вывод вопроса и получение ответа
 *
 * @param string $questText    текст вопроса
 * @param string $ansCondition условия ответа
 *
 * @return string              ответ пользователя
 */
function request(string $questText, string $ansCondition = '') : string
{
    line("Question: {$questText}");
    $answer = prompt("Your answer? {$ansCondition} ");
    return $answer;
}

/**
 * Вывод приветствия и условий игры, запрос имени пользователя
 *
 * @param string $description описание игры
 *
 * @return string имя пользователя
 */
function greeting(string $description) : string
{
    line('Welcome to the Brain Game!');
    line($description);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

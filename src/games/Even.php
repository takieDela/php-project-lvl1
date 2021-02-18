<?php

namespace Php\Project\Lvl1\Games\Even;

use function cli\err;
use function cli\line;
use function cli\prompt;

function isEven($number)
{
    return $number % 2 === 0;
}

function translateAnswerToBool($answer)
{
    switch ($answer) {
        case 'yes':
            return true;
            break;
        case 'no':
            return false;
            break;
        default:
            return $answer;
            break;
    }
}

function translateBoolToAnswer($answer)
{
    switch ($answer) {
        case true:
            return 'yes';
            break;
        case false:
            return 'no';
            break;
        default:
            break;
    }
}

function generateRandomNumber()
{
    return rand(1, 100);
}

function even_game()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    $wins = 0;

    while ($wins !== 3) {
        $number = generateRandomNumber();
        line("Question: {$number}");
        $answer = prompt("Your answer");
        $rightAnswer = isEven($number);

        if (translateAnswerToBool($answer) === $rightAnswer) {
            line("Correct!");
            $wins += 1;
        } else {
            $translatedAnswer = translateBoolToAnswer($rightAnswer);
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$translatedAnswer}'.");
            line("Let's try again, {$name}!");
            $wins = 0;
        }
    }
    line("Congratulations, {$name}!");
    return;
}

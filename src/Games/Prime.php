<?php

namespace Php\Project\Lvl1\Games\Prime;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\GameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($number)
{
    $middle = $number / 2;
    for ($i = 2; $i < $middle; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function generateGameData()
{
    $gameData = [];

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $number = rand(1, 100);
        $rightAnswer = isPrime($number) ? 'yes' : 'no';

        $question = "{$number}";
        $gameData[] = [$question, $rightAnswer];
    }

    return $gameData;
}

function primeGame()
{
    $gameData = generateGameData();
    startGame(DESCRIPTION, $gameData);
}

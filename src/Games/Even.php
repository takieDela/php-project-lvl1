<?php

namespace Php\Project\Lvl1\Games\Even;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\GameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($number)
{
    return $number % 2 === 0;
}

function generateGameData()
{
    $gameData = [];

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $question = rand(1, 100);
        $rightAnswer = (isEven($question)) ? 'yes' : 'no';
        $gameData[] = [$question, $rightAnswer];
    }

    return $gameData;
}

function evenGame()
{
    $gameData = generateGameData();
    startGame(DESCRIPTION, $gameData);
}

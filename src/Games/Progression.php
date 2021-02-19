<?php

namespace Php\Project\Lvl1\Games\Progression;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\GameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'What number is missing in the progression?';

function makeProgression(int $a1, int $d, int $progressionLength): array
{
    $progression = [];
    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[] = $a1 + $i * $d;
    }

    return $progression;
}

function generateGameData(): array
{
    $gameData = [];

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $a1 = rand(1, 100);
        $d = rand(1, 10);
        $progressionLength = rand(5, 10);
        $progression = makeProgression($a1, $d, $progressionLength);
        $hidePosition = rand(0, $progressionLength - 1);

        $rightAnswer = $progression[$hidePosition];
        $progression[$hidePosition] = '..';

        $question = implode(' ', $progression);
        $gameData[] = [$question, $rightAnswer];
    }

    return $gameData;
}

function progressionGame(): void
{
    $gameData = generateGameData();
    startGame(DESCRIPTION, $gameData);
    return;
}

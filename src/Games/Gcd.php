<?php

namespace Php\Project\Lvl1\Games\Gcd;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\GameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function findGcd(int $number1, int $number2): int
{
    $gcd = 1;
    $min = min($number1, $number2);

    for ($i = 1; $i <= $min; $i++) {
        if ($number1 % $i == 0 && $number2 % $i == 0) {
            $gcd = $i;
        }
    }

    return $gcd;
}

function generateGameData(): array
{
    $gameData = [];

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $rightAnswer = findGcd($number1, $number2);

        $question = "{$number1} {$number2}";
        $gameData[] = [$question, $rightAnswer];
    }

    return $gameData;
}

function gcdGame(): void
{
    $gameData = generateGameData();
    startGame(DESCRIPTION, $gameData);
    return;
}

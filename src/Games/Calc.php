<?php

namespace Php\Project\Lvl1\Games\Calc;

use function Php\Project\Lvl1\Engine\startGame;

use const Php\Project\Lvl1\GameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'What is the result of the expression?';

function generateGameData(): array
{
    $gameData = [];
    $operands = ['+', '-', '*'];

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $operand = $operands[rand(0, 2)];
        $rightAnswer = 0;

        switch ($operand) {
            case "+":
                $rightAnswer = $number1 + $number2;
                break;
            case "-":
                $rightAnswer = $number1 - $number2;
                break;
            case "*":
                $rightAnswer = $number1 * $number2;
                break;
        }

        $question = "{$number1} {$operand} {$number2}";
        $gameData[] = [$question, $rightAnswer];
    }

    return $gameData;
}

function calcGame(): void
{
    $gameData = generateGameData();
    startGame(DESCRIPTION, $gameData);
    return;
}

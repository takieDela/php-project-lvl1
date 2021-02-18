<?php

namespace Php\Project\Lvl1\Engine;

use function cli\line;
use function cli\prompt;

function startGame(string $description, array $gameData): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);

    foreach ($gameData as [$question, $rightAnswer]) {
        line("Question: {$question}");
        $answer = prompt('Your answer');

        if ($answer == $rightAnswer) {
            line('Correct!');
        } else {
            line("'{$answer} is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }

    line("Congratulations, {$name}!");
    return;
}

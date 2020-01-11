<?php

namespace BrainGames\handler;
  
use function cli\line;
use function cli\prompt;
  
const ROUNDS_COUNT = 3;

function flow($tasks, $title)
{
    line('Welcome to the Brain Game!');
    line($title);
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    foreach ($tasks as $task => $correctAnswer) {
        line('Question %s', $task);
        $answer = prompt('Your answer');
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $correctAnswer);
            line('Let\'s try again, %s', $userName);
            return;
        }
    }
    line('Congratulations, %s!', $userName);
}

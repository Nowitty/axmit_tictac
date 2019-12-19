<?php

  namespace BrainGames\handler;
  
  use function cli\line;
  use function cli\prompt;

function start($title)
{
    line('Welcome to the Brain Game!');
    line($title);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function flow($userName, $tasks)
{
    $win = 1;
    foreach ($tasks as $task => $correctAnswer) {
        line('Question %s', $task);
        $answer = prompt('Your answer');
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $correctAnswer);
            line('Let\'s try again, %s', $userName);
            $win = 0;
            break;
        }
    }
    if ($win) {
        line('Congratulations, %s!', $userName);
    }
}

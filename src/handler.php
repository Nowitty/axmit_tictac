<?php

  namespace BrainGames\handler;
  
  use function cli\line;
  use function cli\prompt;
  
  const NUMBER_OF_ROUNDS = 3;

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
    foreach ($tasks as $task => $correctAnswer) {
        line('Question %s', $task);
        $answer = prompt('Your answer');
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $correctAnswer);
            line('Let\'s try again, %s', $userName);
            return null;
        }
    }
    line('Congratulations, %s!', $userName);
}

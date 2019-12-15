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

function flow($user_name, $tasks)
{
    $win = 1;
    foreach ($tasks as $task => $correct_answer) {
        line('Question %s', $task);
        $answer = prompt('Your answer');
        if ($answer == $correct_answer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $correct_answer);
            line('Let\'s try again, %s', $user_name);
            $win = 0;
            break;
        }
    }
    if ($win) {
        line('Congratulations, %s!', $user_name);
    }
}

<?php

  namespace BrainGames\Even;
  
  use function cli\line;
  use function cli\prompt;

function even($name)
{    
    $win = 1;
    for ($i = 0; $i < 3; $i++) {
        $numb = random_int(1, 100);
        line('Question %s', $numb);
        $answer = prompt('Your answer');
        if ($numb % 2 == 0) {
            $correct_answer = 'yes';
        } else {
            $correct_answer = 'no';
        }
        if ($answer == $correct_answer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $correct_answer);
            line('Let\'s try again, %s', $name);
            $win = 0;
            break;
        }
    }
    if ($win) {
        line('Congratulations, %s!', $name);
    }
}
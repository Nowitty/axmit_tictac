<?php

  namespace BrainGames\games\gcd;

  use function BrainGames\handler\start;
  use function BrainGames\handler\flow;

  const TITLE = "Find the greatest common divisor of given numbers.";

function run()
{
    $user_name = start(TITLE);
    $tasks = getTasks();
    flow($user_name, $tasks);
}

function getTasks()
{
    $tasks = [];
    for ($i = 0; $i < 3; $i++) {
        $numb1 = random_int(1, 100);
        $numb2 = random_int(1, 100);
        $correct_asnwer = getCorrectAnswer($numb1, $numb2);
        $task_text = "$numb1 $numb2";
        $tasks[$task_text] = $correct_asnwer;
    }
    return $tasks;
}

function getCorrectAnswer($n1, $n2)
{
    $divisor = 1;
    if ($n1 > $n2) {
        $min = $n2;
    } else {
        $min = $n1;
    }
    for ($i = 1; $i <= $min; $i++) {
        if ($n1 % $i == 0 and $n2 % $i == 0) {
            $divisor = $i;
        }
    }
    return $divisor;
}

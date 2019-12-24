<?php

  namespace BrainGames\games\gcd;

  use function BrainGames\handler\start;
  use function BrainGames\handler\flow;

  use const BrainGames\handler\NUMBER_OF_ROUNDS;

  const TITLE = "Find the greatest common divisor of given numbers.";

function run()
{
    $userName = start(TITLE);
    $tasks = getTasks();
    flow($userName, $tasks);
}

function getTasks()
{
    $tasks = [];
    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $numb1 = random_int(1, 100);
        $numb2 = random_int(1, 100);
        $correctAsnwer = getCorrectAnswer($numb1, $numb2);
        $taskText = "$numb1 $numb2";
        $tasks[$taskText] = $correctAsnwer;
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

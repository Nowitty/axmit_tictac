<?php

  namespace BrainGames\games\prime;

  use function BrainGames\handler\start;
  use function BrainGames\handler\flow;

  const TITLE = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function run()
{
    $userName = start(TITLE);
    $tasks = getTasks();
    flow($userName, $tasks);
}

function getTasks()
{
    $tasks = [];
    for ($i = 0; $i < 3; $i++) {
        $numb = random_int(1, 500);
        $correctAsnwer = getCorrectAnswer($numb);
        $tasks[$numb] = $correctAsnwer;
    }
    return $tasks;
}

function getCorrectAnswer($numb)
{
    for ($i = 2; $i < ceil($numb / 2); $i++) {
        if ($numb % $i == 0) {
            return 'no';
        }
    }
    return 'yes';
}

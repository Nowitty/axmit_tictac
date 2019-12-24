<?php

  namespace BrainGames\games\even;

  use function BrainGames\handler\start;
  use function BrainGames\handler\flow;

  use const BrainGames\handler\NUMBER_OF_ROUNDS;

  const TITLE = "Answer 'yes' if the number is even, otherwise answer 'no'";

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
        $numb = random_int(1, 100);
        $tasks[$numb] = isEven($numb) ? 'yes' : 'no';
    }
    return $tasks;
}
function isEven($numb)
{
    return ($numb % 2 == 0) ? true : false;
}

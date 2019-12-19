<?php

  namespace BrainGames\games\even;

  use function BrainGames\handler\start;
  use function BrainGames\handler\flow;

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
    for ($i = 0; $i < 3; $i++) {
        $numb = random_int(1, 100);
        if ($numb % 2 == 0) {
            $tasks[$numb] = 'yes';
        } else {
            $tasks[$numb] = 'no';
        }
    }
    return $tasks;
}

<?php

namespace BrainGames\games\even;

use function BrainGames\handler\flow;

use const BrainGames\handler\ROUNDS_COUNT;

const TITLE = "Answer 'yes' if the number is even, otherwise answer 'no'";

function run()
{
    $task = getTasks();
    flow($task, TITLE);
}
function getTasks()
{
    $task = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $question = random_int(1, 100);
        $task[$question] = isEven($task) ? 'yes' : 'no';
    }
    return $task;
}
function isEven($numb)
{
    return $numb % 2 == 0;
}

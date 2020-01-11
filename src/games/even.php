<?php

namespace BrainGames\games\even;

use function BrainGames\handler\flow;

use const BrainGames\handler\ROUNDS_COUNT;

const TITLE = "Answer 'yes' if the number is even, otherwise answer 'no'";

function run()
{
    $tasks = getTasks();
    flow($tasks, TITLE);
}
function getTasks()
{
    $tasks = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $task = random_int(1, 100);
        $tasks[$task] = isEven($task) ? 'yes' : 'no';
    }
    return $tasks;
}
function isEven($numb)
{
    return $numb % 2 == 0;
}

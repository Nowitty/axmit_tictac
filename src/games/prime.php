<?php

namespace BrainGames\games\prime;

use function BrainGames\handler\flow;

use const BrainGames\handler\ROUNDS_COUNT;

const TITLE = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function run()
{
    $task = getTasks();
    flow($task, TITLE);
}

function getTasks()
{
    $task = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $question = random_int(-500, 500);
        $correctAsnwer = isPrime($question) ? 'yes' : 'no';
        $task[$question] = $correctAsnwer;
    }
    return $task;
}

function isPrime($numb)
{
    if ($numb < 2) {
        return false;
    }
    for ($i = 2; $i < ceil($numb / 2); $i++) {
        if ($numb % $i == 0) {
            return false;
        }
    }
    return true;
}

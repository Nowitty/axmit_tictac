<?php

namespace BrainGames\games\calc;

use function BrainGames\handler\flow;

use const BrainGames\handler\ROUNDS_COUNT;

const TITLE = "What is the result of the expression?";
const OPERATIONS = ['+', '-', '*'];

function run()
{
    $task = getTasks();
    flow($task, TITLE);
}

function getTasks()
{
    $task = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $numb1 = random_int(1, 100);
        $numb2 = random_int(1, 100);
        $randOperation = array_rand(OPERATIONS);
        $operation = OPERATIONS[$randOperation];
        $correctAsnwer = getCorrectAnswer($numb1, $numb2, $operation);
        $question = "$numb1 $operation $numb2";
        $task[$question] = $correctAsnwer;
    }
    return $task;
}

function getCorrectAnswer($n1, $n2, $operation)
{
    $solution = null;
    switch ($operation) {
        case '+':
            $solution = $n1 + $n2;
            break;
        case '-':
            $solution = $n1 - $n2;
            break;
        case '*':
            $solution = $n1 * $n2;
            break;
    }
    return $solution;
}

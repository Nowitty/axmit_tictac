<?php

  namespace BrainGames\games\calc;

  use function BrainGames\handler\start;
  use function BrainGames\handler\flow;


  const TITLE = "What is the result of the expression?";

function run()
{
    $user_name = start(TITLE);
    $tasks = getTasks();
    flow($user_name, $tasks);
}

function getTasks()
{
    $operations = ['+', '-', '*']; 
    $tasks = [];
    for ($i = 0; $i < 3; $i++) {
        $numb1 = random_int(1, 100);
        $numb2 = random_int(1, 100);
        $rand_operation = array_rand($operations);
        $operation = $operations[$rand_operation];
        $correct_asnwer = getCorrectAnswer($numb1, $numb2, $operation);
        $task_text = "$numb1 $operation $numb2";
        $tasks[$task_text] = $correct_asnwer;
    }
    return $tasks;
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
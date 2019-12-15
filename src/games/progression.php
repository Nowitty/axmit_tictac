<?php

  namespace BrainGames\games\progression;

  use function BrainGames\handler\start;
  use function BrainGames\handler\flow;

  const TITLE = "What number is missing in the progression?";

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
        $numb = random_int(1, 100);
        $key = random_int(1, 8);
        $array_of_numbers = getArray($numb, $key);
        $task_text = trim(implode(' ', $array_of_numbers));
        $correct_asnwer = getCorrectAnswer($array_of_numbers);
        $tasks[$task_text] = $correct_asnwer;
    }
    return $tasks;
}

function getArray($numb, $key)
{
    $result[0] = $numb;
    for ($i = 1; $i < 10; $i++)
    {
        $result[$i] = $result[$i-1] + 2;
    }
    $result[$key] = '..';
    return $result;
}

function getCorrectAnswer($arr)
{
    $answer = 0;
    for ($i = 0; $i < 9; $i++) {
        if ($arr[$i] === "..")
        {
            $answer = $arr[$i-1] + 2;
        }
    }
    return $answer;
}

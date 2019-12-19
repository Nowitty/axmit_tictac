<?php

  namespace BrainGames\games\progression;

  use function BrainGames\handler\start;
  use function BrainGames\handler\flow;

  const TITLE = "What number is missing in the progression?";

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
        $key = random_int(1, 8);
        $arrayOfNumbers = getArray($numb, $key);
        $taskText = trim(implode(' ', $arrayOfNumbers));
        $correctAsnwer = getCorrectAnswer($arrayOfNumbers);
        $tasks[$taskText] = $correctAsnwer;
    }
    return $tasks;
}

function getArray($numb, $key)
{
    $result[0] = $numb;
    for ($i = 1; $i < 10; $i++) {
        $result[$i] = $result[$i - 1] + 2;
    }
    $result[$key] = '..';
    return $result;
}

function getCorrectAnswer($arr)
{
    $answer = 0;
    for ($i = 0; $i < 9; $i++) {
        if ($arr[$i] === "..") {
            $answer = $arr[$i - 1] + 2;
        }
    }
    return $answer;
}

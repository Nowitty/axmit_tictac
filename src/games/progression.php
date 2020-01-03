<?php

  namespace BrainGames\games\progression;

  use function BrainGames\handler\start;
  use function BrainGames\handler\flow;

  use const BrainGames\handler\roundsCount;

  const TITLE = "What number is missing in the progression?";
  const LENGTH_OF_PROGRESSION = 10;

function run()
{
    $tasks = getTasks();
    flow($tasks, TITLE);
}

function getTasks()
{
    $tasks = [];
    for ($i = 0; $i < roundsCount; $i++) {
        $numb = random_int(1, 100);
        $key = random_int(1, 8);
        $numbers = getArray($numb, $key);
        $taskText = trim(implode(' ', $numbers));
        $correctAsnwer = getCorrectAnswer($numbers);
        $tasks[$taskText] = $correctAsnwer;
    }
    return $tasks;
}

function getArray($numb, $key)
{
    $result[0] = $numb;
    for ($i = 1; $i < LENGTH_OF_PROGRESSION; $i++) {
        $result[$i] = $result[$i - 1] + 2;
    }
    $result[$key] = '..';
    return $result;
}

function getCorrectAnswer($arr)
{
    $answer = 0;
    for ($i = 0; $i < LENGTH_OF_PROGRESSION - 1; $i++) {
        if ($arr[$i] === "..") {
            $answer = $arr[$i - 1] + 2;
        }
    }
    return $answer;
}

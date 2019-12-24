<?php

  namespace BrainGames\games\progression;

  use function BrainGames\handler\start;
  use function BrainGames\handler\flow;

  use const BrainGames\handler\NUMBER_OF_ROUNDS;

  const TITLE = "What number is missing in the progression?";
  const LENGTH_OF_PROGRESSION = 10;

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

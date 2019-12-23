<?php

  namespace BrainGames\games\prime;

  use function BrainGames\handler\start;
  use function BrainGames\handler\flow;
  use const BrainGames\handler\NUMBER_OF_ROUNDS;

  const TITLE = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

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
        $numb = random_int(1, 500);
        $isPrime = isPrime($numb);
        $correctAsnwer = getCorrectAnswer($isPrime);
        $tasks[$numb] = $correctAsnwer;
    }
    return $tasks;
}

function getCorrectAnswer($isPrime)
{
    return $isPrime ? 'yes' : 'no';
}

function isPrime($numb)
{
    for ($i = 2; $i < ceil($numb / 2); $i++) {
        if ($numb % $i == 0) {
            return false;
        }
    }
    return true;
}

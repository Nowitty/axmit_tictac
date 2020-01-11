<?php

namespace BrainGames\games\progression;

use function BrainGames\handler\flow;

use const BrainGames\handler\ROUNDS_COUNT;

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
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $firstTerm = random_int(1, 100);
        $missedTerm = random_int(1, 8);
        $diff = random_int(1, 10);
        $progression = getProgression($firstTerm, $missedTerm, $diff);
        $task = trim(implode(' ', $progression));
        $correctAsnwer = getCorrectAnswer($progression, $diff);
        $tasks[$task] = $correctAsnwer;
    }
    return $tasks;
}

function getProgression($firstTerm, $missedTerm, $diff)
{
    $result[0] = $firstTerm;
    for ($i = 1; $i < LENGTH_OF_PROGRESSION; $i++) {
        $result[$i] = $firstTerm + $diff * $i;
    }
    $result[$missedTerm] = '..';
    return $result;
}

function getCorrectAnswer($progression, $diff)
{
    for ($i = 0; $i < LENGTH_OF_PROGRESSION - 1; $i++) {
        if ($progression[$i] === "..") {
            $answer = $progression[$i - 1] + $diff;
        }
    }
    return $answer;
}

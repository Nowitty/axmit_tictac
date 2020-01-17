<?php

namespace BrainGames\games\progression;

use function BrainGames\handler\flow;

use const BrainGames\handler\ROUNDS_COUNT;

const TITLE = "What number is missing in the progression?";
const LENGTH_OF_PROGRESSION = 10;

function run()
{
    $task = getTasks();
    flow($task, TITLE);
}

function getTasks()
{
    $tasks = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $missedTermIndex = random_int(1, LENGTH_OF_PROGRESSION - 1);
        $diff = random_int(1, 10);
        $question = getQuestion($missedTermIndex, $diff);
        $correctAnswer = getCorrectAnswer($question[0], $missedTermIndex, $diff);
        $question = trim(implode(' ', $question));
        $task[$question] = $correctAnswer;
    }
    return $task;
}

function getQuestion($missedTermIndex, $diff)
{
    $firstTerm = random_int(1, 100);
    for ($i = 0; $i < LENGTH_OF_PROGRESSION; $i++) {
        $result[$i] = $firstTerm + $diff * $i;
    }
    $result[$missedTermIndex] = '..';
    return $result;
}

function getCorrectAnswer($firstTerm, $missedTermIndex, $diff)
{
    return $firstTerm + $diff * $missedTermIndex;
}

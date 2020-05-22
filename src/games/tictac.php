<?php

namespace BrainGames\games\tictac;

use function cli\line;
use function cli\prompt;

function run()
{
    $field = [
        1 => array_fill(1, 3, null),
        2 => array_fill(1, 3, null),
        3 => array_fill(1, 3, null)
    ];
    line('Welcome to the TicTac game');
    line('To make - enter: x y');
    while (true) {
        [$x, $y] = userMove();
        if (!isset($field[$x][$y])) {
            $field[$x][$y] = 'x';
            $table = new \cli\Table($field);
            $table->display();
            if (isWin($field)) {
                line('you win');
                return;
            } else {
                [$x, $y] = moveAI($field);
                $field[$x][$y] = 'o';
                line('My move: %s %s', $x, $y);
                $table = new \cli\Table($field);
                $table->display();
                if (isWin($field)) {
                    line('you lost');
                    return;
                }
            }
        } else {
            line("You can't do that...try again");
            continue;
        }
    }
}

function userMove()
{
    $move = prompt("Make a move");
    if (preg_match('/[1-3] [1-3]/', $move)) {
        return explode(' ', $move);
    } else {
        line('Something went wrong');
        return userMove();
    }
}

function moveAI($field)
{
    for ($i = 1; $i < 4; $i++) {
        for ($j = 1; $j < 4; $j++) {
            if (!isset($field[$i][$j])) {
                return [$i, $j];
            }
        }
    }
}

function isWin($data)
{
    for ($i = 1; $i < 4; $i++) {
        if ($data[$i][1] != null && $data[$i][1] == $data[$i][2] && $data[$i][2] == $data[$i][3]) {
            return true;
        }
        if ($data[1][$i] != null && $data[1][$i] == $data[2][$i] && $data[2][$i] == $data[3][$i]) {
            return true;
        }
    }
    if ($data[1][1] != null && $data[1][1] == $data[2][2] && $data[2][2] == $data[3][3]) {
        return true;
    }
    if ($data[1][3] != null && $data[1][3] == $data[2][2] && $data[2][2] == $data[3][1]) {
        return true;
    }
        return false;
}

<?php

namespace BrainGames\handler;
  
use function cli\line;
use function cli\prompt;

function flow()
{
    line('Welcome to the TicTac game');
    line('To make move you should type $x $y');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    //while()
    //line('Congratulations, %s!', $userName);
}

<?php

namespace Terminal\Command;

use Terminal\Command;

class UppercaseCommand implements Command
{
    public function execute($input, array $args = [])
    {
        return strtoupper($input);
    }
}

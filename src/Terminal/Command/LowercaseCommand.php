<?php

namespace Terminal\Command;

use Terminal\Command;

class LowercaseCommand implements Command
{
    public function execute($input, array $args = [])
    {
        return strtolower($input);
    }
}

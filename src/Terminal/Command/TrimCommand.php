<?php

namespace Terminal\Command;

use Terminal\Command;

class TrimCommand implements Command
{
    public function execute($input, array $args = [])
    {
        return trim($input);
    }
}

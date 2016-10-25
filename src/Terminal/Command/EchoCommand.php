<?php

namespace Terminal\Command;

use Terminal\Command;

/**
 * Class EchoCommand
 * @package Terminal\Command
 */
class EchoCommand implements Command
{
    /**
     * @param $input
     * @param array $args
     * @return mixed
     */
    public function execute($input, array $args = [])
    {
        return $input;
    }
}

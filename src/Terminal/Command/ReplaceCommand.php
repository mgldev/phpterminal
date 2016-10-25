<?php

namespace Terminal\Command;

use Terminal\Command;

/**
 * Class ReplaceCommand
 * @package Terminal\Command
 */
class ReplaceCommand implements Command
{
    const SEARCH = 0;
    const REPLACE = 1;

    /**
     * @param $input
     * @param array $args
     * @return mixed
     */
    public function execute($input, array $args = [])
    {
        if (!isset($args[self::SEARCH])) {
            throw new \InvalidArgumentException(
                'The first argument to `replace` should be the value to find'
            );
        }

        if (!isset($args[self::REPLACE])) {
            throw new \InvalidArgumentException(
                'The second argument to `replace` should be the replacement value'
            );
        }

        $search = $args[0];
        $replace = $args[1];

        return str_replace($search, $replace, $input);
    }
}

<?php

namespace Terminal;

/**
 * Interface Command
 * @package Terminal
 */
interface Command
{
    /**
     * @param $input
     * @param array $args
     * @return mixed
     */
    public function execute($input, array $args);
}
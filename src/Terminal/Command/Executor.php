<?php

namespace Terminal\Command;

use Terminal\Command;
use Terminal\Exception\CommandNotFoundException;

/**
 * Class Executor
 * @package Terminal\Command
 */
class Executor
{
    /**
     * @var array
     */
    protected $buffer = [];

    /**
     * @var Command[]
     */
    protected $commands;

    /**
     * @param Command $command
     * @param array $args
     */
    public function execute($command, $input, array $args = [])
    {
        $command = $this->getCommand($command);
        $output = $command->execute($input, $args);
        $this->buffer[] = $output;
        return $this;
    }

    /**
     * @param $command
     * @param array $args
     * @return Executor
     */
    public function pipe($command, array $args = [])
    {
        $input = end($this->buffer);
        return $this->execute($command, $input, $args);
    }

    /**
     * @param Command $command
     * @param $name
     * @return $this
     */
    public function register(Command $command, $name)
    {
        $this->commands[$name] = $command;
        return $this;
    }

    /**
     * @param $name
     * @return Command
     */
    protected function getCommand($name)
    {
        if (isset($this->commands[$name])) {
            return $this->commands[$name];
        }

        throw new CommandNotFoundException('Command not found: "' . $name . '"');
    }

    /**
     * @return string
     */
    public function getOutput()
    {
        return end($this->buffer);
    }
}

<?php

namespace Terminal;

use Terminal\Command\Executor;

/**
 * Class Terminal
 * @package Terminal
 */
class Terminal
{
    /**
     * @var Executor
     */
    protected $executor;

    /**
     * Terminal constructor.
     * @param Executor $executor
     */
    public function __construct(Executor $executor)
    {
        $this->executor = $executor;
    }

    /**
     * @param $input
     */
    public function execute($input)
    {
        $segments = explode('|', $input);

        $first = true;

        foreach ($segments as $segment) {
            $parts = explode(' ', $segment);
            foreach ($parts as $index => $part) {
                if (strlen(trim($part)) == 0) {
                    unset($parts[$index]);
                }
            }
            $command = array_shift($parts);
            $arguments = $parts;
            $matches = [];
            preg_match("/'.*?'/", $segment, $matches);

            if (count($matches)) {
                $input = str_replace("'", "", reset($matches));
                $arguments = [];
            }

            if ($first) {
                $this->getExecutor()->execute(
                    $command,
                    $input,
                    $arguments
                );
                $first = false;
            } else {
                $this->getExecutor()->pipe(
                    $command,
                    $arguments
                );
            }
        }

        return $this->getExecutor()->getOutput();
    }

    protected function getExecutor()
    {
        return $this->executor;
    }
}

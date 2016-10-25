<?php

use PHPUnit\Framework\TestCase;
use Terminal\Command\Executor;
use Terminal\Command;
use Terminal\Terminal;

/**
 * Class TerminalTest
 */
class TerminalTest extends TestCase
{
    /**
     * @var Terminal
     */
    protected $terminal;

    public function setUp()
    {
        $executor = new Executor();

        $executor->register(new Command\EchoCommand(), 'echo');
        $executor->register(new Command\TrimCommand(), 'trim');
        $executor->register(new Command\UppercaseCommand(), 'uppercase');
        $executor->register(new Command\LowercaseCommand(), 'lowercase');
        $executor->register(new Command\ReplaceCommand(), 'replace');

        $terminal = new Terminal($executor);
        $this->terminal = $terminal;
    }

    /**
     * A very basic integration test of the Terminal library
     */
    public function testBasicTerminalIntegrationTest()
    {
        $input = "echo '       starbucks coffee   ' | uppercase | trim | replace STARBUCKS NERO";
        $output = $this->terminal->execute($input);
        $this->assertEquals('NERO COFFEE', $output);
    }
}

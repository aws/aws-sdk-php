<?php

namespace AwsBuild\Command;

final class ListCommand extends AbstractCommand
{
    private array $commandMap;

    public function __construct(array $commandMap)
    {
        $this->commandMap = $commandMap;
    }

    public function getName(): string
    {
        return 'list';
    }

    public function getDescription(): string
    {
        return 'Lists all available commands with descriptions.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php list';
    }

    protected function doExecute(array $args): int
    {
        $this->output('Available commands:');
        $this->output('');

        $maxLen = 0;
        $commands = [];
        foreach ($this->commandMap as $name => $class) {
            if ($name === 'list') {
                $commands[$name] = $this->getDescription();
            } else {
                $command = new $class();
                $commands[$name] = $command->getDescription();
            }
            $maxLen = max($maxLen, strlen($name));
        }

        foreach ($commands as $name => $description) {
            $this->output(sprintf("  %-{$maxLen}s  %s", $name, $description));
        }

        return 0;
    }
}

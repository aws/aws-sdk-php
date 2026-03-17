<?php

namespace AwsBuild\Command;

abstract class AbstractCommand implements CommandInterface
{
    protected bool $verbose = false;

    public function execute(array $args): int
    {
        if (in_array('--help', $args, true) || in_array('-h', $args, true)) {
            $name = $this->getName();
            $this->output($name);
            $this->output(str_repeat('-', strlen($name)));
            $this->output($this->getDescription());
            $this->output('');
            $this->output('Usage:');
            $this->output('  ' . $this->getUsage());
            return 0;
        }

        if (in_array('--verbose', $args, true) || in_array('-v', $args, true)) {
            $this->verbose = true;
        }

        return $this->doExecute($args);
    }

    abstract protected function doExecute(array $args): int;

    protected function output(string $msg): void
    {
        fwrite(STDOUT, $msg . "\n");
    }

    protected function error(string $msg): void
    {
        fwrite(STDERR, "[ERROR] $msg\n");
    }

    protected function verbose(string $msg): void
    {
        if ($this->verbose) {
            fwrite(STDOUT, $msg . "\n");
        }
    }

    protected function parseOptions(array $shortOptions, array $longOptions = []): array
    {
        return getopt(implode('', $shortOptions), $longOptions) ?: [];
    }

    protected function getProjectRoot(): string
    {
        return dirname(__DIR__, 2);
    }

    protected function getBuildDir(): string
    {
        return dirname(__DIR__);
    }
}

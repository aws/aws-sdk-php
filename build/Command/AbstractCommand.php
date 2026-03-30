<?php

namespace AwsBuild\Command;

abstract class AbstractCommand implements CommandInterface
{
    protected bool $verbose = false;
    private ?string $projectRoot;

    public function __construct(?string $projectRoot = null)
    {
        $this->projectRoot = $projectRoot ?? dirname(__DIR__, 2);
    }

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

    protected function parseOptions(array $args): array
    {
        $options = [];
        foreach ($args as $arg) {
            if (str_starts_with($arg, '--')) {
                $arg = substr($arg, 2);
                if (str_contains($arg, '=')) {
                    [$key, $value] = explode('=', $arg, 2);
                    $options[$key] = $value;
                } else {
                    $options[$arg] = true;
                }
            }
        }
        return $options;
    }

    protected function getProjectRoot(): string
    {
        return $this->projectRoot;
    }

    protected static function getBuildDir(): string
    {
        return dirname(__DIR__);
    }
}

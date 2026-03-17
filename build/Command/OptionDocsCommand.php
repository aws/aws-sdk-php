<?php

namespace AwsBuild\Command;

class OptionDocsCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'option-docs';
    }

    public function getDescription(): string
    {
        return 'Prints docblock option documentation for a client class.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php option-docs [--class=<FQCN>] [--format=<fmt>]';
    }

    protected function doExecute(array $args): int
    {
        $options = $this->parseOptions([], ['class:', 'format:']);

        $clientName = $options['class'] ?? 'Aws\\AwsClient';
        $type = $options['format'] ?? 'docblock';

        $clientArgs = call_user_func([$clientName, 'getArguments']);
        ksort($clientArgs);

        switch ($type) {
            case 'docblock':
                $this->generateDocblock($clientArgs);
                break;
            default:
                $this->error('Unknown type: ' . $type);
                return 1;
        }

        return 0;
    }

    private function generateDocblock(array $args): void
    {
        foreach ($args as $name => $value) {
            if (!isset($value['doc']) || !empty($value['internal'])) {
                continue;
            }

            $docs = $value['doc'];
            $modifiers = [];

            if (isset($value['valid'])) {
                $modifiers[] = implode('|', $value['valid']);
            }

            if (!empty($value['required'])) {
                $modifiers[] = 'required';
            }

            if (isset($value['default']) && !is_callable($value['default'])) {
                $modifiers[] = 'default=' . \Aws\describe_type($value['default']);
            }

            if ($modifiers) {
                $docs = '(' . implode(', ', $modifiers) . ') ' . $docs;
            }

            $docs = '* - ' . $name . ': ' . $docs;
            echo wordwrap($docs, 70, "\n*   ") . "\n";
        }
    }
}

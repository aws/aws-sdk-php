<?php

namespace AwsBuild\Command;

final class BuildServiceCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'build-service';
    }

    public function getDescription(): string
    {
        return 'Generates a service client + exception class from an API model.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php build-service --namespace=<Ns> --model=<path> [--clientPath=<path>] [--exceptionPath=<path>]';
    }

    protected function doExecute(array $args): int
    {
        $options = $this->parseOptions($args);

        if (empty($options['namespace']) || empty($options['model'])) {
            $this->error(
                "You must specify a namespace (--namespace=) and path to an api model "
                . "(--model=) to build a service"
            );
            return 1;
        }

        $options['model'] = \Aws\load_compiled_json($options['model']);
        $options['namespace'] = ucfirst($options['namespace']);

        $projectRoot = $this->getProjectRoot();
        $options += [
            'clientPath' => $projectRoot
                . "/src/{$options['namespace']}/{$options['namespace']}Client.php",
            'exceptionPath' => $projectRoot
                . "/src/{$options['namespace']}/Exception/{$options['namespace']}Exception.php",
        ];

        (new \ServiceBuilder(
            $options['namespace'],
            $options['model'],
            $options['clientPath'],
            $options['exceptionPath']
        ))
            ->buildClient()
            ->buildException();

        return 0;
    }
}

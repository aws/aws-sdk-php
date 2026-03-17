<?php

namespace AwsBuild\Command;

class TestPharCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'test-phar';
    }

    public function getDescription(): string
    {
        return 'Validates the built aws.phar (clients, functions, methods).';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php test-phar';
    }

    protected function doExecute(array $args): int
    {
        require $this->getBuildDir() . '/artifacts/aws.phar';

        $conf = [
            'credentials' => ['key' => 'foo', 'secret' => 'bar'],
            'region'      => 'us-west-2',
            'version'     => 'latest'
        ];

        // Ensure that a client can be created.
        $s3 = new \Aws\S3\S3Client($conf);
        // Ensure that waiters can be found.
        $s3->getPaginator('ListObjects');

        // Legacy factory instantiation.
        \Aws\DynamoDb\DynamoDbClient::factory($conf);

        // JMESPath autoloader
        \JmesPath\search('foo', ['foo' => 'bar']);

        // Function checks
        $checks = [
            'JmesPath\\search',
            'Aws\\dir_iterator',
        ];

        foreach ($checks as $check) {
            if (!function_exists($check)) {
                $this->error($check . ' not found');
                return 1;
            }
        }

        $classMethodChecks = [
            'GuzzleHttp\\Promise\\Utils' => 'inspect',
            'GuzzleHttp\\Psr7\\Utils' => 'streamFor',
        ];

        foreach ($classMethodChecks as $class => $method) {
            if (!method_exists($class, $method)) {
                $this->error($class . '::' . $method . ' not found');
                return 1;
            }
        }

        $this->output('Version=' . \Aws\Sdk::VERSION);
        return 0;
    }
}

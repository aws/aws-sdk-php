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
        $pharPath = $this->getBuildDir() . '/artifacts/aws.phar';

        if (!file_exists($pharPath)) {
            $this->error("Phar not found: $pharPath");
            return 1;
        }

        $escapedPharPath = addslashes($pharPath);

        $script = <<<'INLINE_PHP'
            require '%PHAR_PATH%';

            $conf = [
                "credentials" => ["key" => "foo", "secret" => "bar"],
                "region"      => "us-west-2",
                "version"     => "latest"
            ];

            $s3 = new \Aws\S3\S3Client($conf);
            $s3->getPaginator("ListObjects");

            \Aws\DynamoDb\DynamoDbClient::factory($conf);

            \JmesPath\search("foo", ["foo" => "bar"]);

            $functionChecks = [
                "JmesPath\\search",
                "Aws\\dir_iterator",
            ];
            foreach ($functionChecks as $fn) {
                if (!function_exists($fn)) {
                    fwrite(STDERR, $fn . " not found\n");
                    exit(1);
                }
            }

            $classMethodChecks = [
                "GuzzleHttp\\Promise\\Utils" => "inspect",
                "GuzzleHttp\\Psr7\\Utils" => "streamFor",
            ];
            foreach ($classMethodChecks as $class => $method) {
                if (!method_exists($class, $method)) {
                    fwrite(STDERR, $class . "::" . $method . " not found\n");
                    exit(1);
                }
            }

            echo "Version=" . \Aws\Sdk::VERSION;
    INLINE_PHP;

        $script = str_replace('%PHAR_PATH%', $escapedPharPath, $script);

        $output = [];
        $exitCode = 0;
        exec('php -r ' . escapeshellarg($script) . ' 2>&1', $output, $exitCode);

        $outputStr = implode("\n", $output);

        if ($exitCode !== 0) {
            $this->error("Phar test failed (exit code $exitCode):\n$outputStr");
            return 1;
        }

        $this->output($outputStr);
        return 0;
    }
}

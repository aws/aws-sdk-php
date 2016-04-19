<?php

namespace Aws\Test;

use Aws;
use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\Result;
use Aws\S3\S3Client;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use DomainException;
use PHPUnit_Framework_Assert as Assert;
use GuzzleHttp\Psr7;

/**
 * Defines application features from the specific context.
 */
class PerformanceContext implements Context, SnippetAcceptingContext
{
    use UsesServiceTrait;

    /** @var array */
    private $resourceUsageSnapshot = [];
    /** @var string[] */
    private $serviceList = [];
    /** @var array */
    private $clients = [];
    /** @var string */
    private $tempFilePath;
    /** @var S3Client */
    private $s3Client;

    /**
     * @BeforeScenario @streaming
     *
     * @param BeforeScenarioScope $scope
     */
    public function setUp(BeforeScenarioScope $scope)
    {
        $this->s3Client = $this->getTestClient('s3');
    }

    /**
     * @AfterScenario @streaming
     *
     * @param AfterScenarioScope $scope
     */
    public function cleanUpFile(AfterScenarioScope $scope)
    {
        if ($this->tempFilePath) {
            unlink($this->tempFilePath);
        }
    }

    /**
     * @Given I have loaded my SDK and its dependencies
     */
    public function iHaveLoadedMySdkAndItsDependencies()
    {
        $this->iCreateAndDiscardClientSForEachService(1);
    }

    /**
     * @Given I take a snapshot of my resources
     */
    public function iTakeASnapshotOfMyResources()
    {
        $this->resourceUsageSnapshot = [
            'memory' => memory_get_usage(),
            'open_file_handles' => $this->getOpenFileHandleCount(),
        ];
    }

    /**
     * @Given I have a list of services
     */
    public function iHaveAListOfServices()
    {
        $this->serviceList = array_keys(Aws\manifest());
    }

    /**
     * @Given /^I have a (\d+) byte file$/
     */
    public function iHaveAByteFile($fileSize)
    {
        $path = tempnam(sys_get_temp_dir(), 'performance_test');
        $kb = ceil($fileSize / 1024);

        if (self::isRunningOnWindows()) {
            // dd is not available, so write out a file of the requisite size
            $handle = fopen($path, 'w');
            $dummyText = str_repeat('x', 1024);
            for ($i = 0; $i < $kb; $i++) {
                fwrite($handle, $dummyText);
            }
            fclose($handle);
        } else {
            shell_exec("dd if=/dev/zero of=$path bs=1024 count=$kb >& /dev/null");
        }

        $this->tempFilePath = $path;
    }

    /**
     * @When I create a client for each service
     */
    public function iCreateAClientForEachService()
    {
        foreach ($this->serviceList as $service) {
            $this->clients[$service] = $this->getTestClient($service, [
                'CloudSearchDomain' => [
                    'endpoint' => 'https://aws.amazon.com',
                ],
            ]);
        }
    }

    /**
     * @When /^I create and discard (\d+) clients for each service$/
     */
    public function iCreateAndDiscardClientSForEachService($numClients)
    {
        foreach ($this->serviceList as $service) {
            for ($i = 0; $i < $numClients; $i++) {
                $this->getTestClient($service, [
                    'CloudSearchDomain' => [
                        'endpoint' => 'https://aws.amazon.com',
                    ],
                ]);
            }
        }
    }

    /**
     * @When /^I execute (\d+) command\(s\) on each client$/
     */
    public function iExecuteCommandsOnEachClient($numCommands)
    {
        foreach ($this->serviceList as $service) {
            try {
                $operation = $this
                    ->findOperationWithNoRequiredParameters($service);
                $this->addMockResults(
                    $this->clients[$service],
                    array_fill(0, $numCommands, new Result)
                );

                for ($i = 0; $i < $numCommands; $i++) {
                    $this->clients[$service]->execute(
                        $this->clients[$service]->getCommand($operation)
                    );
                }
            } catch (DomainException $e) {
                // This step cannot be completed due to service constraints.
            }
        }
    }

    /**
     * @When I upload the file
     */
    public function iUploadTheFile()
    {
        $options = [
            'concurrency' => 5,
            'mup_threshold' => 16 * 1024 * 1024,
            'part_size' => 5 * 1024 * 1024,
        ];
        $putObject = new Result();
        $initiate = new Result(['UploadId' => 'foo']);
        $putPart = new Result(['ETag' => 'bar']);
        $complete = new Result(['Location' => 'https://s3.amazonaws.com/bucket/key']);

        $filesize = filesize($this->tempFilePath);
        if ($filesize < $options['mup_threshold']) {
            $this->addMockResults($this->s3Client, [$putObject]);
        } else {
            $parts = ceil($filesize / $options['part_size']);
            $this->addMockResults(
                $this->s3Client,
                array_merge(
                    [$initiate],
                    array_fill(0, $parts, $putPart),
                    [$complete]
                )
            );
        }

        $this->s3Client->upload(
            'bucket',
            'key',
            fopen($this->tempFilePath, 'rb'),
            'private',
            $options
        );
    }

    /**
     * @When then download the file
     */
    public function thenDownloadTheFile()
    {
        $this->addMockResults($this->s3Client, [new Result([
            'Body' => Psr7\stream_for(Psr7\try_fopen($this->tempFilePath, 'rb')),
        ])]);

        $this->s3Client->getObject([
            'Bucket' => 'bucket',
            'Key' => 'key',
        ]);
    }

    /**
     * @When I destroy all the clients
     */
    public function iDestroyAllTheClients()
    {
        $this->clients = [];
        gc_collect_cycles();
    }

    /**
     * @Then I should not have leaked any resources
     */
    public function iShouldNotHaveLeakedAnyResources()
    {
        // These should account for additional memory and files handles used to
        // load class definitions into the PHP runtime
        static $memoryFudge;
        static $handlesFudge;
        if (empty($memoryFudge)) {
            $opcacheEnabled = function_exists('opcache_get_status')
                && !empty(opcache_get_status(false)['opcache_enabled']);
            $memoryFudge = $opcacheEnabled
                ? 256 * 1024 // 256KB if OPCache is enabled
                : 5 * 1024 * 1024; // 5MB otherwise
            $handlesFudge = 5;
        }

        // Make sure you're not counting anything that's eligible for GC
        gc_collect_cycles();

        Assert::assertLessThanOrEqual(
            $this->resourceUsageSnapshot['memory'] + $memoryFudge,
            memory_get_usage()
        );
        Assert::assertLessThanOrEqual(
            $this->resourceUsageSnapshot['open_file_handles'] + $handlesFudge,
            $this->getOpenFileHandleCount()
        );
    }

    private function findOperationWithNoRequiredParameters($service)
    {
        $provider = ApiProvider::defaultProvider();
        $definition = new Service($provider('api', $service, 'latest'), $provider);

        foreach ($definition->getOperations() as $name => $operation) {
            if (empty($operation->getInput()['required'])) {
                return $name;
            }
        }

        throw new DomainException("The $service service has no operations"
            . " without required parameters");
    }

    private function getOpenFileHandleCount()
    {
        if (self::isRunningOnWindows()) {
            return 0;
        }

        return (int) shell_exec('lsof -p ' . getmypid() . ' | wc -l');
    }

    private static function isRunningOnWindows()
    {
        return 'WIN' === strtoupper(substr(PHP_OS, 0, 3));
    }
}

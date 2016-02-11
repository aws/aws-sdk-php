<?php
namespace Aws\Test\S3;

use Aws\Command;
use Aws\CommandInterface;
use Aws\S3\AccelerateMiddleware;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class AccelerateMiddlewareTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider excludedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testIgnoresExcludedCommands(CommandInterface $command)
    {
        $middleware = new AccelerateMiddleware(
            $this->handlerAssertingNoAcceleration($command),
            $applyAccelerationByDefault = true
        );

        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider includedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testAppliesAccelerateEndpointToCommands(CommandInterface $command)
    {
        $middleware = new AccelerateMiddleware(
            $this->accelerationAssertingHandler($command),
            $applyAccelerationByDefault = true
        );

        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider includedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testDoesNothingWithoutOptIn(CommandInterface $command)
    {
        $middleware = new AccelerateMiddleware(
            $this->handlerAssertingNoAcceleration($command),
            $applyAccelerationByDefault = false
        );

        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider includedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testAppliesAccelerationWithOperationLevelOptIn(CommandInterface $command)
    {
        $middleware = new AccelerateMiddleware(
            $this->accelerationAssertingHandler($command),
            $applyAccelerationByDefault = false
        );

        $command['@use_accelerate_endpoint'] = true;
        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider includedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testDoesNothingWhenAccelerationDisabledOnOperationLevel(CommandInterface $command)
    {
        $middleware = new AccelerateMiddleware(
            $this->handlerAssertingNoAcceleration($command),
            $applyAccelerationByDefault = true
        );

        $command['@use_accelerate_endpoint'] = false;
        $middleware($command, $this->getRequest($command));
    }

    public function excludedCommandProvider()
    {
        return array_map(function ($commandName) {
            return [new Command($commandName, ['Bucket' => 'bucket'])];
        }, ['ListBuckets', 'CreateBucket', 'DeleteBucket']);
    }

    public function includedCommandProvider()
    {
        $excludedOperations = array_map(function (array $args) {
            return $args[0]->getName();
        }, $this->excludedCommandProvider());
        $s3Operations = $this->getTestClient('s3')->getApi()->getOperations();
        foreach ($excludedOperations as $excludedOperation) {
            unset($s3Operations[$excludedOperation]);
        }

        return array_map(function ($commandName) {
            return [new Command($commandName, ['Bucket' => 'bucket'])];
        }, array_keys($s3Operations));
    }

    private function getRequest(CommandInterface $command)
    {
        return new Request('GET', "https://s3.amazonaws.com/{$command['Bucket']}");
    }

    private function handlerAssertingNoAcceleration(CommandInterface $command)
    {
        return function (
            CommandInterface $toHandle,
            RequestInterface $req
        ) use ($command) {
            $this->assertNotContains('accelerate', (string) $req->getUri());
            $this->assertContains($command['Bucket'], $req->getUri()->getPath());
        };
    }

    private function accelerationAssertingHandler(CommandInterface $command)
    {
        return function (
            CommandInterface $toHandle,
            RequestInterface $req
        ) use ($command) {
            $this->assertSame(
                "{$command['Bucket']}.s3-accelerate.amazonaws.com",
                $req->getUri()->getHost()
            );
            $this->assertNotContains($command['Bucket'], $req->getUri()->getPath());
        };
    }
}

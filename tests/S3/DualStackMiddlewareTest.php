<?php
namespace Aws\Test\S3;

use Aws\Command;
use Aws\CommandInterface;
use Aws\S3\DualStackMiddleware;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class DualStackMiddlewareTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testAppliesDualStackEndpointToCommand()
    {
        $command = new Command('CreateBucket', ['Bucket' => 'bucket']);
        $middleware = new DualStackMiddleware(
            $this->dualStackAssertingHandler($command),
            'my-test-region',
            $dualStackByDefault = true
        );
        $middleware($command, $this->getRequest($command));
    }

    public function testAppliesDualStackWithOperationLevelOptIn()
    {
        $command = new Command('CreateBucket', ['Bucket' => 'bucket']);
        $middleware = new DualStackMiddleware(
            $this->dualStackAssertingHandler($command),
            'my-test-region',
            $dualStackByDefault = false
        );

        $command['@use_dual_stack_endpoint'] = true;
        $middleware($command, $this->getRequest($command));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsureApplyDualStackWithoutAccelerationEndpoint()
    {
        $command = new Command(
            'DeleteBucket',
            [
                'Bucket' => 'bucket',
                '@use_accelerate_endpoint' => true,
                '@use_dual_stack_endpoint' => true,
            ]
        );
        $middleware = new DualStackMiddleware(
            $this->noDualStackAssertingHandler($command),
            'my-test-region'
        );
        $middleware($command, $this->getRequest($command));
    }

    public function testDoesNothingWithoutOptIn()
    {
        $command = new Command('DeleteBucket', [ 'Bucket' => 'bucket']);
        $middleware = new DualStackMiddleware(
            $this->noDualStackAssertingHandler($command),
            'my-test-region'
        );
        $middleware($command, $this->getRequest($command));
    }

    public function testDoesNothingWhenDualStackDisabledOnOperationLevel()
    {
        $command = new Command('CreateBucket', ['Bucket' => 'bucket']);
        $middleware = new DualStackMiddleware(
            $this->noDualStackAssertingHandler($command),
            'my-test-region',
            $dualStackByDefault = true
        );

        $command['@use_dual_stack_endpoint'] = false;
        $middleware($command, $this->getRequest($command));
    }

    private function getRequest(CommandInterface $command)
    {
        return new Request('GET', "https://s3.amazonaws.com/{$command['Bucket']}");
    }

    private function dualStackAssertingHandler(CommandInterface $command)
    {
        return function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use ($command) {
            $this->assertSame(
                "{$command['Bucket']}.s3.dualstack.my-test-region.amazonaws.com",
                $req->getUri()->getHost()
            );
            $this->assertNotContains($command['Bucket'], $req->getUri()->getPath());
        };
    }

    private function noDualStackAssertingHandler(CommandInterface $command)
    {
        return function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use ($command) {
            $this->assertNotContains('dualstack', (string) $req->getUri());
            $this->assertContains($command['Bucket'], $req->getUri()->getPath());
        };
    }
}

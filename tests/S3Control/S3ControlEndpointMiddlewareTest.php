<?php
namespace Aws\Test\S3Control;

use Aws\Command;
use Aws\CommandInterface;
use Aws\S3Control\S3ControlEndpointMiddleware;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3Control\S3ControlEndpointMiddleware
 */
class S3ControlEndpointMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    const REGION = 'us-west-2';
    const ACCOUNT_ID = '111222333444';

    public function testAppliesDualStackEndpointToCommand()
    {
        $command = new Command('GetPublicLockdown', ['AccountId' => self::ACCOUNT_ID]);
        $middleware = new S3ControlEndpointMiddleware(
            $this->dualStackAssertingHandler($command),
            self::REGION,
            [ 'dual_stack' => true, ]
        );
        $middleware($command, $this->getRequest($command));
    }

    public function testAppliesDualStackWithOperationLevelOptIn()
    {
        $command = new Command('GetPublicLockdown', ['AccountId' => self::ACCOUNT_ID]);
        $middleware = new S3ControlEndpointMiddleware(
            $this->dualStackAssertingHandler($command),
            self::REGION,
            [ 'dual_stack' => false, ]
        );

        $command['@use_dual_stack_endpoint'] = true;
        $middleware($command, $this->getRequest($command));
    }

    public function testDoesNothingForDualStackWithoutOptIn()
    {
        $command = new Command('GetPublicLockdown', [ 'AccountId' => self::ACCOUNT_ID]);
        $middleware = new S3ControlEndpointMiddleware(
            $this->noDualStackAssertingHandler($command),
            self::REGION,
            []
        );
        $middleware($command, $this->getRequest($command));
    }

    public function testDoesNothingWhenDualStackDisabledOnOperationLevel()
    {
        $command = new Command('GetPublicLockdown', ['AccountId' => self::ACCOUNT_ID]);
        $middleware = new S3ControlEndpointMiddleware(
            $this->noDualStackAssertingHandler($command),
            self::REGION,
            [ 'dual_stack' => true, ]
        );

        $command['@use_dual_stack_endpoint'] = false;
        $middleware($command, $this->getRequest($command));
    }

    public function includedCommandProvider()
    {
        $s3Operations = $this->getTestClient('s3control')->getApi()->getOperations();

        return array_map(function ($commandName) {
            return [new Command($commandName, ['AccountId' => self::ACCOUNT_ID])];
        }, array_keys($s3Operations));
    }

    private function getRequest(CommandInterface $command)
    {
        $region = self::REGION;
        return new Request('GET', "https://s3-control.{$region}.amazonaws.com/?key=query");
    }

    private function dualStackAssertingHandler(CommandInterface $command)
    {
        return function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use ($command) {
            $this->assertContains('.dualstack.', (string) $req->getUri());
            $this->assertNotContains(self::ACCOUNT_ID, $req->getUri()->getPath());
            $this->assertContains(self::ACCOUNT_ID, $req->getUri()->getHost());
            $this->assertContains('key=query', $req->getUri()->getQuery());
        };
    }

    private function noDualStackAssertingHandler(CommandInterface $command)
    {
        return function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use ($command) {
            $this->assertNotContains('.dualstack.', (string) $req->getUri());
            $this->assertNotContains(self::ACCOUNT_ID, $req->getUri()->getPath());
            $this->assertContains(self::ACCOUNT_ID, $req->getUri()->getHost());
            $this->assertContains('key=query', $req->getUri()->getQuery());
        };
    }
}

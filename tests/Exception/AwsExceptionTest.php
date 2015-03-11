<?php
namespace Aws\Test;

use Aws\Command;
use Aws\Exception\AwsException;
use GuzzleHttp\Psr7\Response;

/**
 * @covers Aws\Exception\AwsException
 */
class AwsExceptionTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testProvidesContextShortcuts()
    {
        $ctx = [
            'request_id' => '10',
            'type'       => 'mytype',
            'code'       => 'mycode'
        ];

        $command = new Command('foo');
        $e = new AwsException('Foo', $command, $ctx);
        $this->assertEquals('10', $e->getAwsRequestId());
        $this->assertEquals('mytype', $e->getAwsErrorType());
        $this->assertEquals('mycode', $e->getAwsErrorCode());
    }

    public function testReturnsStatusCode()
    {
        $ctx = ['response' => new Response(400)];
        $command = new Command('foo');
        $e = new AwsException('Foo', $command, $ctx);
        $this->assertEquals(400, $e->getStatusCode());
    }
}

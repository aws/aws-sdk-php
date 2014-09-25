<?php
namespace Aws\Test;

use Aws\Common\Exception\AwsException;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Message\Response;

/**
 * @covers Aws\Common\Exception\AwsException
 */
class AwsExceptionTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testReturnsClient()
    {
        $client = $this->getTestClient('s3');
        $trans = new CommandTransaction($client, new Command('foo'));
        $e = new AwsException('Foo', $trans);
        $this->assertSame($client, $e->getClient());
    }

    public function testProvidesContextShortcuts()
    {
        $coll = [
            'aws_error' => [
                'request_id' => '10',
                'type'       => 'mytype',
                'code'       => 'mycode'
            ]
        ];

        $client = $this->getTestClient('s3');
        $trans = new CommandTransaction($client, new Command('foo'), $coll);
        $e = new AwsException('Foo', $trans);
        $this->assertEquals('10', $e->getAwsRequestId());
        $this->assertEquals('10', $e->getRequestId());

        $this->assertEquals('mytype', $e->getAwsErrorType());
        $this->assertEquals('mytype', $e->getExceptionType());

        $this->assertEquals('mycode', $e->getAwsErrorCode());
        $this->assertEquals('mycode', $e->getExceptionCode());
    }

    public function testReturnsServiceName()
    {
        $client = $this->getTestClient('s3');
        $trans = new CommandTransaction($client, new Command('foo'));
        $e = new AwsException('Foo', $trans);
        $this->assertSame('s3', $e->getServiceName());
    }

    public function testReturnsStatusCode()
    {
        $client = $this->getTestClient('s3');
        $trans = new CommandTransaction($client, new Command('foo'));
        $trans->response = new Response(400);
        $e = new AwsException('Foo', $trans);
        $this->assertSame('400', $e->getStatusCode());
    }
}

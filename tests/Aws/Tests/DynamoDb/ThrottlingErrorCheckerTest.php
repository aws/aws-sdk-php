<?php

namespace Aws\Tests\DynamoDb;

use Aws\DynamoDb\ThrottlingErrorChecker;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;

class ThrottlingErrorCheckerTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @covers Aws\DynamoDb\ThrottlingErrorChecker
     */
    public function testOnlyListensFor400Errors()
    {
        $request = new Request('GET', 'http://example.com');
        $response = new Response(200);
        $checker = new ThrottlingErrorChecker();
        $this->assertNull($checker($request, $response));
    }

    /**
     * @covers Aws\DynamoDb\ThrottlingErrorChecker
     */
    public function testOnlyListensForCompletedRequests()
    {
        $request = new Request('GET', 'http://example.com');
        $checker = new ThrottlingErrorChecker();
        $this->assertNull($checker($request));
    }

    /**
     * @covers Aws\DynamoDb\ThrottlingErrorChecker
     */
    public function testReturnsTrueForRetryableErrors()
    {
        $request = new Request('GET', 'http://example.com');
        $response = new Response(400, array(
            'content-type' => 'application/x-amz-json-1.0'
        ), '{"__type":"com.amazonaws.dynamodb.v20111205#ProvisionedThroughputExceededException",'
            . '"message":"The level of configured provisioned throughput for the table was exceeded.'
            . 'Consider increasing your provisioning level with the UpdateTable API"}'
        );

        $checker = new ThrottlingErrorChecker();
        $this->assertTrue($checker($request, $response));
    }
}

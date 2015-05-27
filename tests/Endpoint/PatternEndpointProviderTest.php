<?php
namespace Aws\Test;

use Aws\Endpoint\EndpointProvider;
use Aws\Endpoint\PatternEndpointProvider;

/**
 * @covers Aws\Endpoint\PatternEndpointProvider
 */
class PatternEndpointProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsNullWhenUnresolved()
    {
        $e = new PatternEndpointProvider(['foo' => ['rules' => []]]);
        $this->assertNull($e(['service' => 'foo', 'region' => 'bar']));
    }

    public function endpointProvider()
    {
        return [
            [
                ['region' => 'us-east-1', 'service' => 's3'],
                ['endpoint' => 'https://s3.amazonaws.com']
            ],
            [
                ['region' => 'us-east-1', 'service' => 's3', 'scheme' => 'http'],
                ['endpoint' => 'http://s3.amazonaws.com']
            ],
            [
                ['region' => 'us-east-1', 'service' => 'sdb'],
                ['endpoint' => 'https://sdb.amazonaws.com']
            ],
            [
                ['region' => 'us-west-2', 'service' => 's3'],
                ['endpoint' => 'https://s3-us-west-2.amazonaws.com']
            ],
            [
                ['region' => 'us-east-1', 'service' => 'iam'],
                ['endpoint' => 'https://iam.amazonaws.com']
            ],
            [
                ['region' => 'bar', 'service' => 'foo'],
                ['endpoint' => 'https://foo.bar.amazonaws.com']
            ],
            [
                ['region' => 'us-gov-west-1', 'service' => 'iam'],
                ['endpoint' => 'https://iam.us-gov.amazonaws.com']
            ],
            [
                ['region' => 'us-gov-west-1', 'service' => 's3'],
                ['endpoint' => 'https://s3-us-gov-west-1.amazonaws.com']
            ],
            [
                ['region' => 'us-gov-baz', 'service' => 'foo'],
                ['endpoint' => 'https://foo.us-gov-baz.amazonaws.com']
            ],
            [
                ['region' => 'cn-north-1', 'service' => 's3'],
                [
                    'endpoint' => 'https://s3.cn-north-1.amazonaws.com.cn',
                    'signatureVersion' => 'v4'
                ]
            ],
            [
                ['region' => 'cn-north-1', 'service' => 'ec2'],
                [
                    'endpoint' => 'https://ec2.cn-north-1.amazonaws.com.cn',
                    'signatureVersion' => 'v4'
                ]
            ]
        ];
    }

    /**
     * @dataProvider endpointProvider
     */
    public function testResolvesEndpoints($input, $output)
    {
        // Use the default endpoints file
        $p = EndpointProvider::defaultProvider();
        $this->assertEquals($output, call_user_func($p, $input));
    }
}

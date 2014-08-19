<?php
namespace Aws\Test\Common;

use Aws\Common\RulesEndpointProvider;

/**
 * @covers Aws\Common\RulesEndpointProvider
 */
class RulesEndpointProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Aws\Common\Exception\UnresolvedEndpointException
     * @expectedExceptionMessage Unable to resolve an endpoint for the "foo" service based on the provided configuration values: service=foo, region=bar, scheme=https
     */
    public function testThrowsWhenEndpointIsNotResolved()
    {
        $e = new RulesEndpointProvider(['foo' => ['rules' => []]]);
        $e->getEndpoint(['service' => 'foo', 'region' => 'bar']);
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
                ['region' => 'us-gov-baz', 'service' => 'iam'],
                ['endpoint' => 'https://iam.us-gov.amazonaws.com']
            ],
            [
                ['region' => 'us-gov-baz', 'service' => 's3'],
                ['endpoint' => 'https://s3-us-gov-baz.amazonaws.com']
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
        $p = RulesEndpointProvider::fromDefaults();
        $this->assertEquals($output, $p->getEndpoint($input));
    }

    public function testCanLoadFromJson()
    {
        $f = sys_get_temp_dir() . '/test.json';
        file_put_contents($f, '[]');
        RulesEndpointProvider::fromJsonFile($f);
        unlink($f);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresJsonFileExists()
    {
        RulesEndpointProvider::fromJsonFile('/does/not/exist.json');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Requires a "service" value
     */
    public function testEnsuresService()
    {
        $p = RulesEndpointProvider::fromDefaults();
        $p->getEndpoint(['region' => 'foo']);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Requires a "region" value
     */
    public function testEnsuresVersion()
    {
        $p = RulesEndpointProvider::fromDefaults();
        $p->getEndpoint(['service' => 'foo']);
    }
}

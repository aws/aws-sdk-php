<?php
namespace Aws\Test;

use Aws\Endpoint\EndpointProvider;
use Aws\Endpoint\Partition;
use Aws\Endpoint\PartitionEndpointProvider;

/**
 * @covers \Aws\Endpoint\PartitionEndpointProvider
 */
class PartitionEndpointProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider endpointProvider
     */
    public function testResolvesEndpoints($input, $output)
    {
        // Use the default endpoints file
        $p = EndpointProvider::defaultProvider();
        $this->assertEquals($output, $p($input));
    }

    public function endpointProvider()
    {
        return [
            [
                ['region' => 'us-east-1', 'service' => 's3'],
                [
                    'endpoint' => 'https://s3.amazonaws.com',
                    'signatureVersion' => 's3v4',
                    'signingRegion' => 'us-east-1',
                    'signingName' => 's3',
                ],
            ],
            [
                ['region' => 'us-east-1', 'service' => 's3', 'scheme' => 'http'],
                [
                    'endpoint' => 'http://s3.amazonaws.com',
                    'signatureVersion' => 's3v4',
                    'signingRegion' => 'us-east-1',
                    'signingName' => 's3',
                ],
            ],
            [
                ['region' => 'us-east-1', 'service' => 'sdb'],
                [
                    'endpoint' => 'https://sdb.amazonaws.com',
                    'signatureVersion' => 'v4',
                    'signingRegion' => 'us-east-1',
                    'signingName' => 'sdb',
                ],
            ],
            [
                ['region' => 'us-west-2', 'service' => 's3'],
                [
                    'endpoint' => 'https://s3-us-west-2.amazonaws.com',
                    'signatureVersion' => 's3v4',
                    'signingRegion' => 'us-west-2',
                    'signingName' => 's3',
                ],
            ],
            [
                ['region' => 'us-east-1', 'service' => 'iam'],
                [
                    'endpoint' => 'https://iam.amazonaws.com',
                    'signatureVersion' => 'v4',
                    'signingRegion' => 'us-east-1',
                    'signingName' => 'iam',
                ],
            ],
            [
                ['region' => 'bar', 'service' => 'foo'],
                [
                    'endpoint' => 'https://foo.bar.amazonaws.com',
                    'signatureVersion' => 'v4',
                    'signingRegion' => 'bar',
                    'signingName' => 'foo',
                ],
            ],
            [
                ['region' => 'us-gov-west-1', 'service' => 'iam'],
                [
                    'endpoint' => 'https://iam.us-gov.amazonaws.com',
                    'signatureVersion' => 'v4',
                    'signingRegion' => 'us-gov-west-1',
                    'signingName' => 'iam',
                ],
            ],
            [
                ['region' => 'us-gov-west-1', 'service' => 's3'],
                [
                    'endpoint' => 'https://s3-us-gov-west-1.amazonaws.com',
                    'signatureVersion' => 's3v4',
                    'signingRegion' => 'us-gov-west-1',
                    'signingName' => 's3',
                ],
            ],
            [
                ['region' => 'us-gov-baz', 'service' => 'foo'],
                [
                    'endpoint' => 'https://foo.us-gov-baz.amazonaws.com',
                    'signatureVersion' => 'v4',
                    'signingRegion' => 'us-gov-baz',
                    'signingName' => 'foo',
                ],
            ],
            [
                ['region' => 'cn-north-1', 'service' => 's3'],
                [
                    'endpoint' => 'https://s3.cn-north-1.amazonaws.com.cn',
                    'signatureVersion' => 's3v4',
                    'signingRegion' => 'cn-north-1',
                    'signingName' => 's3',
                ],
            ],
            [
                ['region' => 'cn-north-1', 'service' => 'ec2'],
                [
                    'endpoint' => 'https://ec2.cn-north-1.amazonaws.com.cn',
                    'signatureVersion' => 'v4',
                    'signingRegion' => 'cn-north-1',
                    'signingName' => 'ec2',
                ],
            ],
            [
                ['region' => 'local', 'service' => 'dynamodb', 'scheme' => 'http'],
                [
                    'endpoint' => 'http://localhost:8000',
                    'signatureVersion' => 'v4',
                    'signingRegion' => 'us-east-1',
                    'signingName' => 'dynamodb',
                ],
            ],
            [
                ['region' => 'us-east-1', 'service' => 'iot'],
                [
                    'endpoint' => 'https://iot.us-east-1.amazonaws.com',
                    'signatureVersion' => 'v4',
                    'signingRegion' => 'us-east-1',
                    'signingName' => 'execute-api',
                ],
            ],
            [
                ['region' => 'foo', 'service' => 'bar'],
                [
                    'endpoint' => 'https://bar.foo.amazonaws.com',
                    'signatureVersion' => 'v4',
                    'signingRegion' => 'foo',
                    'signingName' => 'bar',
                ]
            ],
        ];
    }

    /**
     * @dataProvider partitionRegionProvider
     *
     * @param string $region
     * @param string $partition
     */
    public function testResolvesPartitionsByRegion($region, $partition)
    {
        // Use the default endpoints file
        $p = PartitionEndpointProvider::defaultProvider();
        $this->assertSame($partition, $p->getPartitionFromRegion($region)['partition']);
    }

    public function partitionRegionProvider()
    {
        return [
            ['us-east-1', 'aws'],
            ['eu-central-1', 'aws'],
            ['sa-east-1', 'aws'],
            ['ap-southeast-2', 'aws'],
            ['cn-north-1', 'aws-cn'],
            ['us-gov-west-1', 'aws-us-gov'],
        ];
    }

    public function testResolvesPartitionsByName()
    {
        // Use the default endpoints file
        $p = PartitionEndpointProvider::defaultProvider();
        foreach (['aws', 'aws-cn', 'aws-us-gov'] as $name) {
            $part = $p->getPartitionByName($name);
            $this->assertInstanceOf(Partition::class, $part);
            $this->assertSame($name, $part['partition']);
        }

        $unknownPartition = $p->getPartitionByName('foo');
        $this->assertNull($unknownPartition);
    }
}

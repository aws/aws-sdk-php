<?php
namespace Aws\Test\Endpoint;

use Aws\Endpoint\EndpointProvider;
use Aws\Endpoint\Partition;
use Aws\Endpoint\PartitionEndpointProvider;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Endpoint\PartitionEndpointProvider
 */
class PartitionEndpointProviderTest extends TestCase
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
                    'signatureVersion' => null,
                    'signingRegion' => 'us-east-1',
                    'signingName' => 'sdb',
                ],
            ],
            [
                ['region' => 'us-west-2', 'service' => 's3'],
                [
                    'endpoint' => 'https://s3.us-west-2.amazonaws.com',
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
                    'endpoint' => 'https://s3.us-gov-west-1.amazonaws.com',
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
     * @param string $service
     * @param string $partition
     */
    public function testResolvesPartitionsByRegion($region, $service, $partition)
    {
        // Use the default endpoints file
        $p = PartitionEndpointProvider::defaultProvider();
        $this->assertSame($partition, $p->getPartition($region, $service)->getName());
    }

    public function partitionRegionProvider()
    {
        return [
            ['us-east-1', 's3', 'aws'],
            ['eu-central-1', 's3', 'aws'],
            ['sa-east-1', 's3', 'aws'],
            ['ap-southeast-2', 's3', 'aws'],
            ['cn-north-1', 's3', 'aws-cn'],
            ['us-gov-west-1', 's3', 'aws-us-gov'],
        ];
    }

    public function testResolvesPartitionsByName()
    {
        // Use the default endpoints file
        $p = PartitionEndpointProvider::defaultProvider();
        foreach (['aws', 'aws-cn', 'aws-us-gov'] as $name) {
            $part = $p->getPartitionByName($name);
            $this->assertInstanceOf(Partition::class, $part);
            $this->assertSame($name, $part->getName());
        }

        $unknownPartition = $p->getPartitionByName('foo');
        $this->assertNull($unknownPartition);
    }

    public function testPassesOptionsToProvider()
    {
        $data = json_decode(
            file_get_contents(__DIR__ . '/fixtures/sts_regional_endpoints.json'),
            true
        );
        $provider = new PartitionEndpointProvider(
            $data['partitions'],
            'aws',
            ['sts_regional_endpoints' => 'regional']
        );
        $endpoint = $provider([
            'service' => 'sts',
            'region' => 'us-east-1',
        ]);

        $this->assertSame(
            'https://sts.us-east-1.amazonaws.com',
            $endpoint['endpoint']
        );
    }

    /**
     * @dataProvider knownEndpointProvider
     *
     * @param PartitionEndpointProvider $provider
     * @param $region
     * @param $service
     * @param $endpoint
     */
    public function testCanGenerateKnownEndpointsKnownToPatternProvider(
        PartitionEndpointProvider $provider,
        $region,
        $service,
        $endpoint
    ) {
        $data = $provider([
            'service' => $service,
            'region' => $region,
            'scheme' => 'https',
        ]);

        if (is_array($endpoint)) {
            $testArray = [];
            foreach ($endpoint as $url) {
                $testArray []= "https://{$url}";
            }
            $this->assertContains($data['endpoint'], $testArray);
        } else {
            $this->assertSame("https://$endpoint", $data['endpoint']);
        }
    }

    public function testCanMergePrefixData()
    {
        $prefixData = [
            "prefix-groups" => [
                "ec2" => ["ec2_old", "ec2_deprecated", "ec2-hyphen"],
                "s3" => ["s3_old"],
            ],
        ];

        $mergedData = PartitionEndpointProvider::mergePrefixData(
            [
                "partitions" => [
                    [
                        "services" => [
                            "ec2" => [
                                "endpoints" => [
                                    "us-east-1" => []
                                ]
                            ],
                            "s3" => [
                                "endpoints" => [
                                    "us-east-1" => [],
                                    "us-east-2" => []
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            $prefixData
        );

        foreach ($mergedData["partitions"] as $partition) {
            foreach ($prefixData['prefix-groups'] as $current => $old) {
                foreach ($old as $prefix) {
                    $this->assertArrayHasKey(
                        $prefix, $partition["services"]
                    );
                    $this->assertSame(
                        $partition["services"][$current],
                        $partition["services"][$prefix]
                    );
                }
            }
        }
    }

    public function knownEndpointProvider()
    {
        $partitions = PartitionEndpointProvider::defaultProvider();

        return [
            [$partitions, 'ap-northeast-1', 'apigateway', 'apigateway.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'appstream', 'appstream.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'autoscaling', 'autoscaling.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'cloudformation', 'cloudformation.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'cloudhsm', 'cloudhsm.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'cloudsearch', 'cloudsearch.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'cloudtrail', 'cloudtrail.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'codedeploy', 'codedeploy.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'cognito-identity', 'cognito-identity.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'cognito-sync', 'cognito-sync.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'config', 'config.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'datapipeline', 'datapipeline.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'directconnect', 'directconnect.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'ds', 'ds.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'dynamodb', 'dynamodb.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'ec2', 'ec2.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'ecs', 'ecs.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'elasticache', 'elasticache.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'elasticbeanstalk', 'elasticbeanstalk.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'elasticloadbalancing', 'elasticloadbalancing.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'elasticmapreduce', 'elasticmapreduce.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'elastictranscoder', 'elastictranscoder.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'glacier', 'glacier.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'iot', 'iot.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'kinesis', 'kinesis.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'kms', 'kms.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'lambda', 'lambda.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'logs', 'logs.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'monitoring', 'monitoring.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'rds', 'rds.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'redshift', 'redshift.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 's3', 's3.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'sdb', 'sdb.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'sns', 'sns.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'sqs', 'sqs.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'storagegateway', 'storagegateway.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'streams.dynamodb', 'streams.dynamodb.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'sts', 'sts.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'swf', 'swf.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-northeast-1', 'workspaces', 'workspaces.ap-northeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'autoscaling', 'autoscaling.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'cloudformation', 'cloudformation.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'cloudhsm', 'cloudhsm.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'cloudsearch', 'cloudsearch.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'cloudtrail', 'cloudtrail.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'config', 'config.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'directconnect', 'directconnect.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'ds', 'ds.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'dynamodb', 'dynamodb.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'ec2', 'ec2.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'elasticache', 'elasticache.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'elasticbeanstalk', 'elasticbeanstalk.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'elasticloadbalancing', 'elasticloadbalancing.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'elasticmapreduce', 'elasticmapreduce.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'elastictranscoder', 'elastictranscoder.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'kinesis', 'kinesis.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'kms', 'kms.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'logs', 'logs.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'monitoring', 'monitoring.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'rds', 'rds.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'redshift', 'redshift.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 's3', 's3.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'sdb', 'sdb.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'sns', 'sns.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'sqs', 'sqs.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'storagegateway', 'storagegateway.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'streams.dynamodb', 'streams.dynamodb.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'sts', 'sts.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'swf', 'swf.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-1', 'workspaces', 'workspaces.ap-southeast-1.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'autoscaling', 'autoscaling.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'cloudformation', 'cloudformation.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'cloudhsm', 'cloudhsm.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'cloudsearch', 'cloudsearch.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'cloudtrail', 'cloudtrail.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'codedeploy', 'codedeploy.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'config', 'config.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'datapipeline', 'datapipeline.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'directconnect', 'directconnect.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'ds', 'ds.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'dynamodb', 'dynamodb.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'ec2', 'ec2.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'ecs', 'ecs.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'elasticache', 'elasticache.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'elasticbeanstalk', 'elasticbeanstalk.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'elasticloadbalancing', 'elasticloadbalancing.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'elasticmapreduce', 'elasticmapreduce.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'glacier', 'glacier.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'kinesis', 'kinesis.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'kms', 'kms.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'logs', 'logs.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'monitoring', 'monitoring.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'rds', 'rds.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'redshift', 'redshift.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 's3', 's3.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'sdb', 'sdb.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'sns', 'sns.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'sqs', 'sqs.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'storagegateway', 'storagegateway.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'streams.dynamodb', 'streams.dynamodb.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'sts', 'sts.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'swf', 'swf.ap-southeast-2.amazonaws.com'],
            [$partitions, 'ap-southeast-2', 'workspaces', 'workspaces.ap-southeast-2.amazonaws.com'],
            [$partitions, 'aws-us-gov-global', 'iam', 'iam.us-gov.amazonaws.com'],
            [$partitions, 'cn-north-1', 'autoscaling', 'autoscaling.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'cloudformation', 'cloudformation.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'cloudtrail', 'cloudtrail.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'directconnect', 'directconnect.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'dynamodb', 'dynamodb.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'ec2', 'ec2.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'elasticache', 'elasticache.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'elasticbeanstalk', 'elasticbeanstalk.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'elasticloadbalancing', 'elasticloadbalancing.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'elasticmapreduce', 'elasticmapreduce.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'glacier', 'glacier.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'iam', 'iam.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'kinesis', 'kinesis.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'monitoring', 'monitoring.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'rds', 'rds.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 's3', 's3.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'sns', 'sns.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'sqs', 'sqs.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'storagegateway', 'storagegateway.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'streams.dynamodb', 'streams.dynamodb.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'sts', 'sts.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'cn-north-1', 'swf', 'swf.cn-north-1.amazonaws.com.cn'],
            [$partitions, 'eu-central-1', 'autoscaling', 'autoscaling.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'cloudformation', 'cloudformation.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'cloudhsm', 'cloudhsm.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'cloudsearch', 'cloudsearch.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'cloudtrail', 'cloudtrail.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'codedeploy', 'codedeploy.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'config', 'config.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'directconnect', 'directconnect.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'dynamodb', 'dynamodb.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'ec2', 'ec2.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'elasticache', 'elasticache.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'elasticbeanstalk', 'elasticbeanstalk.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'elasticloadbalancing', 'elasticloadbalancing.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'elasticmapreduce', 'elasticmapreduce.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'glacier', 'glacier.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'kinesis', 'kinesis.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'kms', 'kms.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'logs', 'logs.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'monitoring', 'monitoring.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'rds', 'rds.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'redshift', 'redshift.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 's3', 's3.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'sns', 'sns.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'sqs', 'sqs.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'storagegateway', 'storagegateway.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'streams.dynamodb', 'streams.dynamodb.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-central-1', 'sts', 'sts.amazonaws.com'],
            [$partitions, 'eu-central-1', 'swf', 'swf.eu-central-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'apigateway', 'apigateway.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'autoscaling', 'autoscaling.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'cloudformation', 'cloudformation.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'cloudhsm', 'cloudhsm.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'cloudsearch', 'cloudsearch.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'cloudtrail', 'cloudtrail.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'codedeploy', 'codedeploy.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'cognito-identity', 'cognito-identity.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'cognito-sync', 'cognito-sync.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'config', 'config.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'datapipeline', 'datapipeline.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'directconnect', 'directconnect.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'ds', 'ds.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'dynamodb', 'dynamodb.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'ec2', 'ec2.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'ecs', 'ecs.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'elasticache', 'elasticache.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'elasticbeanstalk', 'elasticbeanstalk.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'elasticloadbalancing', 'elasticloadbalancing.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'elasticmapreduce', 'elasticmapreduce.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'elastictranscoder', 'elastictranscoder.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'email', 'email.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'glacier', 'glacier.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'iot', 'iot.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'kinesis', 'kinesis.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'kms', 'kms.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'lambda', 'lambda.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'logs', 'logs.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'machinelearning', 'machinelearning.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'monitoring', 'monitoring.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'rds', 'rds.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'redshift', 'redshift.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 's3', 's3.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'sdb', 'sdb.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'sns', 'sns.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'sqs', 'sqs.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'ssm', 'ssm.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'storagegateway', 'storagegateway.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'streams.dynamodb', 'streams.dynamodb.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'sts', 'sts.amazonaws.com'],
            [$partitions, 'eu-west-1', 'swf', 'swf.eu-west-1.amazonaws.com'],
            [$partitions, 'eu-west-1', 'workspaces', 'workspaces.eu-west-1.amazonaws.com'],
            [$partitions, 'fips-us-gov-west-1', 's3', ['s3-fips-us-gov-west-1.amazonaws.com', 's3-fips.us-gov-west-1.amazonaws.com']],
            [$partitions, 'local', 'dynamodb', 'localhost:8000'],
            [$partitions, 's3-external-1', 's3', 's3-external-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'autoscaling', 'autoscaling.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'cloudformation', 'cloudformation.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'cloudsearch', 'cloudsearch.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'cloudtrail', 'cloudtrail.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'config', 'config.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'directconnect', 'directconnect.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'dynamodb', 'dynamodb.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'ec2', 'ec2.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'elasticache', 'elasticache.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'elasticbeanstalk', 'elasticbeanstalk.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'elasticloadbalancing', 'elasticloadbalancing.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'elasticmapreduce', 'elasticmapreduce.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'kms', 'kms.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'monitoring', 'monitoring.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'rds', 'rds.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 's3', 's3.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'sdb', 'sdb.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'sns', 'sns.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'sqs', 'sqs.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'storagegateway', 'storagegateway.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'streams.dynamodb', 'streams.dynamodb.sa-east-1.amazonaws.com'],
            [$partitions, 'sa-east-1', 'sts', 'sts.amazonaws.com'],
            [$partitions, 'sa-east-1', 'swf', 'swf.sa-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'apigateway', 'apigateway.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'appstream', 'appstream.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'autoscaling', 'autoscaling.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'cloudformation', 'cloudformation.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'cloudfront', 'cloudfront.amazonaws.com'],
            [$partitions, 'us-east-1', 'cloudhsm', 'cloudhsm.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'cloudsearch', 'cloudsearch.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'cloudtrail', 'cloudtrail.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'codecommit', 'codecommit.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'codedeploy', 'codedeploy.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'codepipeline', 'codepipeline.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'cognito-identity', 'cognito-identity.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'cognito-sync', 'cognito-sync.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'config', 'config.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'datapipeline', 'datapipeline.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'directconnect', 'directconnect.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'ds', 'ds.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'dynamodb', 'dynamodb.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'ec2', 'ec2.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'ecs', 'ecs.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'elasticache', 'elasticache.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'elasticbeanstalk', 'elasticbeanstalk.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'elasticloadbalancing', 'elasticloadbalancing.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'elasticmapreduce', 'elasticmapreduce.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'elastictranscoder', 'elastictranscoder.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'email', 'email.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'glacier', 'glacier.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'iam', 'iam.amazonaws.com'],
            [$partitions, 'us-east-1', 'importexport', 'importexport.amazonaws.com'],
            [$partitions, 'us-east-1', 'iot', 'iot.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'kinesis', 'kinesis.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'kms', 'kms.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'lambda', 'lambda.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'logs', 'logs.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'machinelearning', 'machinelearning.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'mobileanalytics', 'mobileanalytics.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'monitoring', 'monitoring.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'opsworks', 'opsworks.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'rds', 'rds.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'redshift', 'redshift.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'route53', 'route53.amazonaws.com'],
            [$partitions, 'us-east-1', 'route53domains', 'route53domains.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 's3', 's3.amazonaws.com'],
            [$partitions, 'us-east-1', 'sdb', 'sdb.amazonaws.com'],
            [$partitions, 'us-east-1', 'sns', 'sns.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'sqs', 'sqs.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'ssm', 'ssm.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'storagegateway', 'storagegateway.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'streams.dynamodb', 'streams.dynamodb.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'sts', 'sts.amazonaws.com'],
            [$partitions, 'us-east-1', 'support', 'support.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'swf', 'swf.us-east-1.amazonaws.com'],
            [$partitions, 'us-east-1', 'workspaces', 'workspaces.us-east-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'autoscaling', 'autoscaling.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'cloudformation', 'cloudformation.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'cloudhsm', 'cloudhsm.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'cloudtrail', 'cloudtrail.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'dynamodb', 'dynamodb.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'ec2', 'ec2.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'elasticache', 'elasticache.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'elasticloadbalancing', 'elasticloadbalancing.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'elasticmapreduce', 'elasticmapreduce.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'glacier', 'glacier.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'iam', 'iam.us-gov.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'kms', 'kms.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'monitoring', 'monitoring.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'rds', 'rds.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'redshift', 'redshift.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 's3', 's3.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'sns', 'sns.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'sqs', 'sqs.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'sts', 'sts.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-gov-west-1', 'swf', 'swf.us-gov-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'autoscaling', 'autoscaling.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'cloudformation', 'cloudformation.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'cloudsearch', 'cloudsearch.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'cloudtrail', 'cloudtrail.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'config', 'config.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'directconnect', 'directconnect.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'dynamodb', 'dynamodb.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'ec2', 'ec2.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'ecs', 'ecs.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'elasticache', 'elasticache.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'elasticbeanstalk', 'elasticbeanstalk.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'elasticloadbalancing', 'elasticloadbalancing.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'elasticmapreduce', 'elasticmapreduce.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'elastictranscoder', 'elastictranscoder.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'glacier', 'glacier.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'kinesis', 'kinesis.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'kms', 'kms.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'logs', 'logs.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'monitoring', 'monitoring.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'rds', 'rds.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 's3', 's3.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'sdb', 'sdb.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'sns', 'sns.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'sqs', 'sqs.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'storagegateway', 'storagegateway.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'streams.dynamodb', 'streams.dynamodb.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-1', 'sts', 'sts.amazonaws.com'],
            [$partitions, 'us-west-1', 'swf', 'swf.us-west-1.amazonaws.com'],
            [$partitions, 'us-west-2', 'apigateway', 'apigateway.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'autoscaling', 'autoscaling.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'cloudformation', 'cloudformation.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'cloudhsm', 'cloudhsm.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'cloudsearch', 'cloudsearch.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'cloudtrail', 'cloudtrail.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'codedeploy', 'codedeploy.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'codepipeline', 'codepipeline.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'config', 'config.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'datapipeline', 'datapipeline.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'devicefarm', 'devicefarm.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'directconnect', 'directconnect.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'ds', 'ds.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'dynamodb', 'dynamodb.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'ec2', 'ec2.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'ecs', 'ecs.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'elasticache', 'elasticache.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'elasticbeanstalk', 'elasticbeanstalk.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'elasticfilesystem', 'elasticfilesystem.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'elasticloadbalancing', 'elasticloadbalancing.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'elasticmapreduce', 'elasticmapreduce.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'elastictranscoder', 'elastictranscoder.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'email', 'email.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'glacier', 'glacier.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'iot', 'iot.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'kinesis', 'kinesis.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'kms', 'kms.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'lambda', 'lambda.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'logs', 'logs.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'monitoring', 'monitoring.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'rds', 'rds.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'redshift', 'redshift.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 's3', 's3.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'sdb', 'sdb.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'sns', 'sns.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'sqs', 'sqs.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'ssm', 'ssm.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'storagegateway', 'storagegateway.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'streams.dynamodb', 'streams.dynamodb.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'sts', 'sts.amazonaws.com'],
            [$partitions, 'us-west-2', 'swf', 'swf.us-west-2.amazonaws.com'],
            [$partitions, 'us-west-2', 'workspaces', 'workspaces.us-west-2.amazonaws.com'],
        ];
    }
}

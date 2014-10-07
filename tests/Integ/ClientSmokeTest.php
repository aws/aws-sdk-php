<?php
namespace Aws\Test\Integ;

use Aws\Common\Exception\AwsException;
use GuzzleHttp\Event\BeforeEvent;

class ClientSmokeTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    /**
     * @dataProvider provideServiceTestCases
     */
    public function testBasicOperationWorks($service, $class, $options,
        $endpoint, $operation, $params, $succeed, $value
    ) {
        // Create the client and make sure it is the right class.
        $client = $this->getSdk()->getClient($service, $options);
        $this->assertInstanceOf($class, $client);

        // Setup event to get the request's host value.
        $host = null;
        $client->getHttpClient()->getEmitter()->on(
            'before',
            function (BeforeEvent $event) use (&$host) {
                $host = $event->getRequest()->getHost();
            }
        );

        // Execute the request and check if it behaved as intended.
        try {
            // Execute the operation.
            $result = $client->execute($client->getCommand($operation, $params));
            if (!$succeed) {
                $this->fail("The {$operation} operation of the {$service} "
                    . "service was supposed to fail.");
            }

            // Examine the result.
            if ($value !== null) {
                // Ensure the presence of the specified key.
                $this->assertArrayHasKey($value, $result);
            }

        } catch (AwsException $e) {
            if ($succeed) {
                $this->fail("The {$operation} operation of the {$service} "
                    . "service was supposed to succeed.");
            }

            // The exception class should have the same namespace as the client.
            $this->assertStringStartsWith(
                substr($class, 0, strrpos($class, '\\')),
                get_class($e)
            );

            // Look at the error code first, then the root exception class, to
            // see if it matches the value.
            $error = $e;
            while ($error->getPrevious()) $error = $error->getPrevious();
            $this->assertEquals(
                $value,
                $e->getAwsErrorCode() ?: get_class($error),
                $e->getMessage()
            );
        } catch (\Exception $e) {
            // If something other than an AwsException was thrown, then
            // something really went wrong.
            $this->fail('An unexpected exception occurred: ' . get_class($e)
                . ' - ' . $e->getMessage());
        }

        // Ensure the request's host is correct no matter the outcome.
        $this->assertEquals($endpoint, $host);
    }

    public function provideServiceTestCases()
    {
        return [
            /*[
                service (client to create `Sdk::getClient()`)
                class (expected class name of instantiated client)
                options (client options; besides region, version, & credentials)
                endpoint (expected host of the request)
                operation (service operation to execute)
                params (parameters to use for the operation)
                succeeds (bool - whether or not the request should succeed)
                value (a key that should be present in the result
                       OR... the error code, in the case of failure)
            ],*/
            [
                'autoscaling',
                'Aws\\AutoScaling\\AutoScalingClient',
                [],
                'autoscaling.us-east-1.amazonaws.com',
                'DescribeAccountLimits',
                [],
                true,
                'MaxNumberOfAutoScalingGroups'
            ],
            [
                'cloudformation',
                'Aws\\CloudFormation\\CloudFormationClient',
                [],
                'cloudformation.us-east-1.amazonaws.com',
                'DescribeStacks',
                [],
                true,
                'Stacks'
            ],
            [
                'cloudfront',
                'Aws\\CloudFront\\CloudFrontClient',
                [],
                'cloudfront.amazonaws.com',
                'ListDistributions',
                [],
                true,
                'DistributionList'
            ],
            [
                'cloudsearch',
                'Aws\\CloudSearch\\CloudSearchClient',
                [],
                'cloudsearch.us-east-1.amazonaws.com',
                'DescribeDomains',
                [],
                true,
                'DomainStatusList'
            ],
            [
                'cloudsearchdomain',
                'Aws\\CloudSearchDomain\\CloudSearchDomainClient',
                ['endpoint' => 'search-foo.cloudsearch.us-east-1.amazonaws.com'],
                'search-foo.cloudsearch.us-east-1.amazonaws.com',
                'Search',
                ['query' => 'foo'],
                false,
                'GuzzleHttp\Ring\Exception\RingException'
            ],
            [
                'cloudtrail',
                'Aws\\CloudTrail\\CloudTrailClient',
                [],
                'cloudtrail.us-east-1.amazonaws.com',
                'DeleteTrail',
                ['Name' => 'foo'],
                false,
                'TrailNotFoundException'
            ],
            [
                'cloudwatch',
                'Aws\\CloudWatch\\CloudWatchClient',
                [],
                'monitoring.us-east-1.amazonaws.com',
                'DescribeAlarms',
                [],
                true,
                'MetricAlarms'
            ],
            [
                'cloudwatchlogs',
                'Aws\\CloudWatchLogs\\CloudWatchLogsClient',
                [],
                'logs.us-east-1.amazonaws.com',
                'DescribeLogGroups',
                [],
                true,
                'logGroups'
            ],
            [
                'cognitoidentity',
                'Aws\\CognitoIdentity\\CognitoIdentityClient',
                [],
                'cognito-identity.us-east-1.amazonaws.com',
                'ListIdentityPools',
                ['MaxResults' => 1],
                true,
                'IdentityPools'
            ],
            [
                'cognitosync',
                'Aws\\CognitoSync\\CognitoSyncClient',
                [],
                'cognito-sync.us-east-1.amazonaws.com',
                'ListIdentityPoolUsage',
                [],
                true,
                'IdentityPoolUsages'
            ],
            [
                'datapipeline',
                'Aws\\DataPipeline\\DataPipelineClient',
                [],
                'datapipeline.us-east-1.amazonaws.com',
                'DescribePipelines',
                ['pipelineIds' => ['foo']],
                false,
                'PipelineNotFoundException'
            ],
            [
                'directconnect',
                'Aws\\DirectConnect\\DirectConnectClient',
                [],
                'directconnect.us-east-1.amazonaws.com',
                'DescribeConnections',
                [],
                true,
                'connections'
            ],
            [
                'dynamodb',
                'Aws\\DynamoDb\\DynamoDbClient',
                [],
                'dynamodb.us-east-1.amazonaws.com',
                'ListTables',
                [],
                true,
                'TableNames'
            ],
            [
                'ec2',
                'Aws\\Ec2\\Ec2Client',
                [],
                'ec2.us-east-1.amazonaws.com',
                'DescribeInstances',
                [],
                true,
                'Reservations'
            ],
            [
                'elasticache',
                'Aws\\ElastiCache\\ElastiCacheClient',
                [],
                'elasticache.us-east-1.amazonaws.com',
                'DescribeCacheClusters',
                [],
                true,
                'CacheClusters'
            ],
            [
                'elasticbeanstalk',
                'Aws\\ElasticBeanstalk\\ElasticBeanstalkClient',
                [],
                'elasticbeanstalk.us-east-1.amazonaws.com',
                'DescribeApplications',
                [],
                true,
                'Applications'
            ],
            [
                'elastictranscoder',
                'Aws\\ElasticTranscoder\\ElasticTranscoderClient',
                [],
                'elastictranscoder.us-east-1.amazonaws.com',
                'CancelJob',
                ['Id' => '1111111111111-aaaaaa'],
                false,
                'ResourceNotFoundException'
            ],
            [
                'elb',
                'Aws\\ElasticLoadBalancing\\ElasticLoadBalancingClient',
                [],
                'elasticloadbalancing.us-east-1.amazonaws.com',
                'DescribeLoadBalancers',
                [],
                true,
                'LoadBalancerDescriptions'
            ],
            [
                'emr',
                'Aws\\Emr\\EmrClient',
                [],
                'elasticmapreduce.us-east-1.amazonaws.com',
                'ListClusters',
                [],
                true,
                'Clusters'
            ],
            [
                'glacier',
                'Aws\\Glacier\\GlacierClient',
                [],
                'glacier.us-east-1.amazonaws.com',
                'DescribeJob',
                ['vaultName' => 'foo', 'jobId' => 'bar'],
                false,
                'ResourceNotFoundException'
            ],
            [
                'iam',
                'Aws\\Iam\\IamClient',
                [],
                'iam.amazonaws.com',
                'ListGroups',
                [],
                true,
                'Groups'
            ],
            [
                'importexport',
                'Aws\\ImportExport\\ImportExportClient',
                [],
                'importexport.amazonaws.com',
                'GetStatus',
                ['JobId' => 'foo'],
                false,
                'InvalidJobIdException'
            ],
            [
                'kinesis',
                'Aws\\Kinesis\\KinesisClient',
                [],
                'kinesis.us-east-1.amazonaws.com',
                'ListStreams',
                [],
                true,
                'StreamNames'
            ],
            [
                'opsworks',
                'Aws\\OpsWorks\\OpsWorksClient',
                [],
                'opsworks.us-east-1.amazonaws.com',
                'DescribeStacks',
                [],
                true,
                'Stacks'
            ],
            [
                'rds',
                'Aws\\Rds\\RdsClient',
                [],
                'rds.us-east-1.amazonaws.com',
                'DescribeDBInstances',
                [],
                true,
                'DBInstances'
            ],
            [
                'redshift',
                'Aws\\Redshift\\RedshiftClient',
                [],
                'redshift.us-east-1.amazonaws.com',
                'DescribeClusters',
                [],
                true,
                'Clusters'
            ],
            [
                'route53',
                'Aws\\Route53\\Route53Client',
                [],
                'route53.amazonaws.com',
                'ListHostedZones',
                [],
                true,
                'HostedZones'
            ],
            [
                'route53domains',
                'Aws\\Route53Domains\\Route53DomainsClient',
                [],
                'route53domains.us-east-1.amazonaws.com',
                'ListDomains',
                [],
                true,
                'Domains'
            ],
            [
                's3',
                'Aws\\S3\\S3Client',
                [],
                't0tally-1nval1d-8uck3t-nam3.s3.amazonaws.com',
                'ListObjects',
                ['Bucket' => 't0tally-1nval1d-8uck3t-nam3'],
                false,
                'NoSuchBucket'
            ],
            [
                'sdb',
                'Aws\\SimpleDb\\SimpleDbClient',
                [],
                'sdb.amazonaws.com',
                'ListDomains',
                ['MaxNumberOfDomains' => 1],
                true,
                null
            ],
            [
                'ses',
                'Aws\\Ses\\SesClient',
                [],
                'email.us-east-1.amazonaws.com',
                'ListIdentities',
                [],
                true,
                'Identities'
            ],
            [
                'sns',
                'Aws\\Sns\\snsClient',
                [],
                'sns.us-east-1.amazonaws.com',
                'ListTopics',
                [],
                true,
                'Topics'
            ],
            [
                'sqs',
                'Aws\\Sqs\\SqsClient',
                [],
                'sqs.us-east-1.amazonaws.com',
                'ListQueues',
                [],
                true,
                'QueueUrls'
            ],
            [
                'storagegateway',
                'Aws\\StorageGateway\\StorageGatewayClient',
                [],
                'storagegateway.us-east-1.amazonaws.com',
                'DeleteVolume',
                ['VolumeARN' => 'foo'],
                false,
                'ValidationException'
            ],
            [
                'sts',
                'Aws\\Sts\\StsClient',
                [],
                'sts.amazonaws.com',
                'GetSessionToken',
                [],
                true,
                'Credentials'
            ],
            [
                'support',
                'Aws\\Support\\SupportClient',
                [],
                'support.us-east-1.amazonaws.com',
                'DescribeCases',
                [],
                false,
                'SubscriptionRequiredException'
            ],
            [
                'swf',
                'Aws\\Swf\\SwfClient',
                [],
                'swf.us-east-1.amazonaws.com',
                'DescribeDomain',
                ['name' => 'foo'],
                false,
                'UnknownResourceFault'
            ],
        ];
    }
}

<?php
namespace Aws\Test\Integ;

use Aws\Exception\AwsException;
use Aws\Middleware;
use Aws\Sdk;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class ClientSmokeTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public function testUserAgentApplied()
    {
        $guzzleVersion = class_exists('GuzzleHttp\Ring\Core') ? 5 : 6;
        $handlerClass = "Aws\\Handler\\GuzzleV{$guzzleVersion}\\GuzzleHandler";
        $handler = new $handlerClass;

        $request = new Request('GET', 'http://httpbin.org/get');
        $response = $handler($request)->wait();

        $data = json_decode($response->getBody()->getContents(), true);
        $ua = $data['headers']['User-Agent'];
        $this->assertStringStartsWith('aws-sdk-php/' . Sdk::VERSION, $ua);
    }

    /**
     * @dataProvider provideServiceTestCases
     */
    public function testBasicOperationWorks($service, $class, $options,
        $endpoint, $operation, $params, $succeed, $value
    ) {
        // Create the client and make sure it is the right class.
        $client = $this->getSdk()->createClient($service, $options);
        $this->assertInstanceOf($class, $client);

        // Setup event to get the request's host value.
        $host = null;
        $client->getHandlerList()->append(
            'sign:integ',
            Middleware::tap(function ($command, RequestInterface $request) use (&$host) {
                $host = $request->getUri()->getHost();
            }
        ));

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
                    . "service was supposed to succeed. (" . $e->getMessage() . ")");
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
                service (client to create `Sdk::createClient()`)
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
                'cloudhsm',
                'Aws\\CloudHsm\\CloudHsmClient',
                [],
                'cloudhsm.us-east-1.amazonaws.com',
                'listAvailableZones',
                [],
                true,
                'AZList'
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
                ['endpoint' => 'https://search-foo.cloudsearch.us-east-1.amazonaws.com'],
                'search-foo.cloudsearch.us-east-1.amazonaws.com',
                'Search',
                ['query' => 'foo'],
                false,
                'GuzzleHttp\Exception\ConnectException'
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
            [ // ECS Success
                'ecs',
                'Aws\\Ecs\\EcsClient',
                [],
                'ecs.us-east-1.amazonaws.com',
                'DescribeClusters',
                ['clusters' => ['foo']],
                true,
                'clusters'
            ],
            [ // ECS Failure
                'ecs',
                'Aws\\Ecs\\EcsClient',
                [],
                'ecs.us-east-1.amazonaws.com',
                'DeleteCluster',
                ['cluster' => 'foo'],
                false,
                'ClientException'
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
                'elasticloadbalancing',
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
                'kinesis',
                'Aws\\Kinesis\\KinesisClient',
                [],
                'kinesis.us-east-1.amazonaws.com',
                'ListStreams',
                [],
                true,
                'StreamNames'
            ],
            [ // KMS Success
                'kms',
                'Aws\\Kms\\KmsClient',
                [],
                'kms.us-east-1.amazonaws.com',
                'ListAliases',
                [],
                true,
                'Aliases'
            ],
            [ // KMS Failure
                'kms',
                'Aws\\Kms\\KmsClient',
                [],
                'kms.us-east-1.amazonaws.com',
                'DeleteAlias',
                ['AliasName' => 'foo'],
                false,
                'ValidationException'
            ],
            [ // Lambda Success
                'lambda',
                'Aws\\Lambda\\LambdaClient',
                [],
                'lambda.us-east-1.amazonaws.com',
                'ListFunctions',
                [],
                true,
                'Functions'
            ],
            [ // Lambda Failure
                'lambda',
                'Aws\\Lambda\\LambdaClient',
                [],
                'lambda.us-east-1.amazonaws.com',
                'DeleteFunction',
                ['FunctionName' => 'foo'],
                false,
                'ResourceNotFoundException'
            ],
            [ // MachineLearning Success
                'machinelearning',
                'Aws\\MachineLearning\\MachineLearningClient',
                [],
                'machinelearning.us-east-1.amazonaws.com',
                'DescribeDataSources',
                [],
                true,
                'Results'
            ],
            [ // MachineLearning Failure
                'machinelearning',
                'Aws\\MachineLearning\\MachineLearningClient',
                [],
                'machinelearning.us-east-1.amazonaws.com',
                'DeleteDataSource',
                ['DataSourceId' => 'foo'],
                false,
                'ResourceNotFoundException'
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
                'Aws\\Sns\\SnsClient',
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
            [ // SSM Success
                'ssm',
                'Aws\\Ssm\\SsmClient',
                [],
                'ssm.us-east-1.amazonaws.com',
                'ListDocuments',
                [],
                true,
                'DocumentIdentifiers'
            ],
            [ // SSM Failure
                'ssm',
                'Aws\\Ssm\\SsmClient',
                [],
                'ssm.us-east-1.amazonaws.com',
                'DeleteDocument',
                ['Name' => 'foo'],
                false,
                'InvalidDocument'
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
            [ // WorkSpaces Success
                'workspaces',
                'Aws\\Workspaces\\WorkspacesClient',
                [],
                'workspaces.us-east-1.amazonaws.com',
                'DescribeWorkspaces',
                [],
                true,
                'Workspaces'
            ],
            [ // WorkSpaces Failure
                'workspaces',
                'Aws\\WorkSpaces\\WorkSpacesClient',
                [],
                'workspaces.us-east-1.amazonaws.com',
                'TerminateWorkspaces',
                ['TerminateWorkspaceRequests' => [['WorkspaceId'=> 'foo']]],
                false,
                'ValidationException'
            ],
        ];
    }
}

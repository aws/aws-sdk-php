<?php
namespace Aws;

/**
 * Builds AWS clients based on configuration settings.
 *
 * @method \Aws\Acm\AcmClient createAcm(array $args = [])
 * @method \Aws\ApiGateway\ApiGatewayClient createApiGateway(array $args = [])
 * @method \Aws\AutoScaling\AutoScalingClient createAutoScaling(array $args = [])
 * @method \Aws\CloudFormation\CloudFormationClient createCloudFormation(array $args = [])
 * @method \Aws\CloudFront\CloudFrontClient createCloudFront(array $args = [])
 * @method \Aws\CloudHsm\CloudHsmClient createCloudHsm(array $args = [])
 * @method \Aws\CloudSearch\CloudSearchClient createCloudSearch(array $args = [])
 * @method \Aws\CloudSearchDomain\CloudSearchDomainClient createCloudSearchDomain(array $args = [])
 * @method \Aws\CloudTrail\CloudTrailClient createCloudTrail(array $args = [])
 * @method \Aws\CloudWatch\CloudWatchClient createCloudWatch(array $args = [])
 * @method \Aws\CloudWatchEvents\CloudWatchEventsClient createCloudWatchEvents(array $args = [])
 * @method \Aws\CloudWatchLogs\CloudWatchLogsClient createCloudWatchLogs(array $args = [])
 * @method \Aws\CodeCommit\CodeCommitClient createCodeCommit(array $args = [])
 * @method \Aws\CodeDeploy\CodeDeployClient createCodeDeploy(array $args = [])
 * @method \Aws\CodePipeline\CodePipelineClient createCodePipeline(array $args = [])
 * @method \Aws\CognitoIdentity\CognitoIdentityClient createCognitoIdentity(array $args = [])
 * @method \Aws\CognitoSync\CognitoSyncClient createCognitoSync(array $args = [])
 * @method \Aws\ConfigService\ConfigServiceClient createConfigService(array $args = [])
 * @method \Aws\DataPipeline\DataPipelineClient createDataPipeline(array $args = [])
 * @method \Aws\DeviceFarm\DeviceFarmClient createDeviceFarm(array $args = [])
 * @method \Aws\DirectConnect\DirectConnectClient createDirectConnect(array $args = [])
 * @method \Aws\DirectoryService\DirectoryServiceClient createDirectoryService(array $args = [])
 * @method \Aws\DynamoDb\DynamoDbClient createDynamoDb(array $args = [])
 * @method \Aws\DynamoDbStreams\DynamoDbStreamsClient createDynamoDbStreams(array $args = [])
 * @method \Aws\Ec2\Ec2Client createEc2(array $args = [])
 * @method \Aws\Ecr\EcrClient createEcr(array $args = [])
 * @method \Aws\Ecs\EcsClient createEcs(array $args = [])
 * @method \Aws\Efs\EfsClient createEfs(array $args = [])
 * @method \Aws\ElastiCache\ElastiCacheClient createElastiCache(array $args = [])
 * @method \Aws\ElasticBeanstalk\ElasticBeanstalkClient createElasticBeanstalk(array $args = [])
 * @method \Aws\ElasticLoadBalancing\ElasticLoadBalancingClient createElasticLoadBalancing(array $args = [])
 * @method \Aws\ElasticTranscoder\ElasticTranscoderClient createElasticTranscoder(array $args = [])
 * @method \Aws\ElasticsearchService\ElasticsearchServiceClient createElasticsearchService(array $args = [])
 * @method \Aws\Emr\EmrClient createEmr(array $args = [])
 * @method \Aws\Firehose\FirehoseClient createFirehose(array $args = [])
 * @method \Aws\Glacier\GlacierClient createGlacier(array $args = [])
 * @method \Aws\Iam\IamClient createIam(array $args = [])
 * @method \Aws\Inspector\InspectorClient createInspector(array $args = [])
 * @method \Aws\Iot\IotClient createIot(array $args = [])
 * @method \Aws\IotDataPlane\IotDataPlaneClient createIotDataPlane(array $args = [])
 * @method \Aws\Kinesis\KinesisClient createKinesis(array $args = [])
 * @method \Aws\Kms\KmsClient createKms(array $args = [])
 * @method \Aws\Lambda\LambdaClient createLambda(array $args = [])
 * @method \Aws\MachineLearning\MachineLearningClient createMachineLearning(array $args = [])
 * @method \Aws\MarketplaceCommerceAnalytics\MarketplaceCommerceAnalyticsClient createMarketplaceCommerceAnalytics(array $args = [])
 * @method \Aws\OpsWorks\OpsWorksClient createOpsWorks(array $args = [])
 * @method \Aws\Rds\RdsClient createRds(array $args = [])
 * @method \Aws\Redshift\RedshiftClient createRedshift(array $args = [])
 * @method \Aws\Route53\Route53Client createRoute53(array $args = [])
 * @method \Aws\Route53Domains\Route53DomainsClient createRoute53Domains(array $args = [])
 * @method \Aws\S3\S3Client createS3(array $args = [])
 * @method \Aws\Ses\SesClient createSes(array $args = [])
 * @method \Aws\Sns\SnsClient createSns(array $args = [])
 * @method \Aws\Sqs\SqsClient createSqs(array $args = [])
 * @method \Aws\Ssm\SsmClient createSsm(array $args = [])
 * @method \Aws\StorageGateway\StorageGatewayClient createStorageGateway(array $args = [])
 * @method \Aws\Sts\StsClient createSts(array $args = [])
 * @method \Aws\Support\SupportClient createSupport(array $args = [])
 * @method \Aws\Swf\SwfClient createSwf(array $args = [])
 * @method \Aws\Waf\WafClient createWaf(array $args = [])
 * @method \Aws\WorkSpaces\WorkSpacesClient createWorkSpaces(array $args = [])
 */
class Sdk
{
    const VERSION = '3.14.2';

    /** @var array Arguments for creating clients */
    private $args;

    /**
     * Constructs a new SDK object with an associative array of default
     * client settings.
     *
     * @param array $args
     *
     * @throws \InvalidArgumentException
     * @see Aws\Sdk::getClient for a list of available options.
     */
    public function __construct(array $args = [])
    {
        $this->args = $args;

        if (!isset($args['handler']) && !isset($args['http_handler'])) {
            $this->args['http_handler'] = default_http_handler();
        }
    }

    public function __call($name, array $args)
    {
        if (strpos($name, 'create') === 0) {
            return $this->createClient(
                substr($name, 6),
                isset($args[0]) ? $args[0] : []
            );
        }

        throw new \BadMethodCallException("Unknown method: {$name}.");
    }

    /**
     * Get a client by name using an array of constructor options.
     *
     * @param string $name Service name or namespace (e.g., DynamoDb, s3).
     * @param array  $args Arguments to configure the client.
     *
     * @return AwsClientInterface
     * @throws \InvalidArgumentException if any required options are missing or
     *                                   the service is not supported.
     * @see Aws\AwsClient::__construct for a list of available options for args.
     */
    public function createClient($name, array $args = [])
    {
        // Get information about the service from the manifest file.
        $service = manifest($name);
        $namespace = $service['namespace'];

        // Merge provided args with stored, service-specific args.
        if (isset($this->args[$namespace])) {
            $args += $this->args[$namespace];
        }

        // Provide the endpoint prefix in the args.
        if (!isset($args['service'])) {
            $args['service'] = $service['endpoint'];
        }

        // Instantiate the client class.
        $client = "Aws\\{$namespace}\\{$namespace}Client";
        return new $client($args + $this->args);
    }

    /**
     * Determine the endpoint prefix from a client namespace.
     *
     * @param string $name Namespace name
     *
     * @return string
     * @internal
     * @deprecated Use the `\Aws\manifest()` function instead.
     */
    public static function getEndpointPrefix($name)
    {
        return manifest($name)['endpoint'];
    }
}

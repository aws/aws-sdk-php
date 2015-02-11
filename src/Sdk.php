<?php
namespace Aws;

use GuzzleHttp\Client;

/**
 * Builds AWS clients based on configuration settings.
 *
 * @method \Aws\AutoScaling\AutoScalingClient getAutoScaling(array $args = [])
 * @method \Aws\CloudFormation\CloudFormationClient getCloudFormation(array $args = [])
 * @method \Aws\CloudFront\CloudFrontClient getCloudFront(array $args = [])
 * @method \Aws\CloudHsm\CloudHsmClient getCloudHsm(array $args = [])
 * @method \Aws\CloudSearch\CloudSearchClient getCloudSearch(array $args = [])
 * @method \Aws\CloudSearchDomain\CloudSearchDomainClient getCloudSearchDomain(array $args = [])
 * @method \Aws\CloudTrail\CloudTrailClient getCloudTrail(array $args = [])
 * @method \Aws\CloudWatch\CloudWatchClient getCloudWatch(array $args = [])
 * @method \Aws\CloudWatchLogs\CloudWatchLogsClient getCloudWatchLogs(array $args = [])
 * @method \Aws\CognitoIdentity\CognitoIdentityClient getCognitoIdentity(array $args = [])
 * @method \Aws\CognitoSync\CognitoSyncClient getCognitoSync(array $args = [])
 * @method \Aws\DataPipeline\DataPipelineClient getDataPipeline(array $args = [])
 * @method \Aws\DirectConnect\DirectConnectClient getDirectConnect(array $args = [])
 * @method \Aws\DynamoDb\DynamoDbClient getDynamoDb(array $args = [])
 * @method \Aws\Ec2\Ec2Client getEc2(array $args = [])
 * @method \Aws\Ecs\EcsClient getEcs(array $args = [])
 * @method \Aws\ElastiCache\ElastiCacheClient getElastiCache(array $args = [])
 * @method \Aws\ElasticBeanstalk\ElasticBeanstalkClient getElasticBeanstalk(array $args = [])
 * @method \Aws\ElasticLoadBalancing\ElasticLoadBalancingClient getElasticLoadBalancing(array $args = [])
 * @method \Aws\ElasticTranscoder\ElasticTranscoderClient getElasticTranscoder(array $args = [])
 * @method \Aws\Emr\EmrClient getEmr(array $args = [])
 * @method \Aws\Glacier\GlacierClient getGlacier(array $args = [])
 * @method \Aws\Iam\IamClient getIam(array $args = [])
 * @method \Aws\ImportExport\ImportExportClient getImportExport(array $args = [])
 * @method \Aws\Kinesis\KinesisClient getKinesis(array $args = [])
 * @method \Aws\OpsWorks\OpsWorksClient getOpsWorks(array $args = [])
 * @method \Aws\Rds\RdsClient getRds(array $args = [])
 * @method \Aws\Redshift\RedshiftClient getRedshift(array $args = [])
 * @method \Aws\Route53\Route53Client getRoute53(array $args = [])
 * @method \Aws\Route53Domains\Route53DomainsClient getRoute53Domains(array $args = [])
 * @method \Aws\S3\S3Client getS3(array $args = [])
 * @method \Aws\Ses\SesClient getSes(array $args = [])
 * @method \Aws\SimpleDb\SimpleDbClient getSimpleDb(array $args = [])
 * @method \Aws\Sns\SnsClient getSns(array $args = [])
 * @method \Aws\Sqs\SqsClient getSqs(array $args = [])
 * @method \Aws\StorageGateway\StorageGatewayClient getStorageGateway(array $args = [])
 * @method \Aws\Sts\StsClient getSts(array $args = [])
 * @method \Aws\Support\SupportClient getSupport(array $args = [])
 * @method \Aws\Swf\SwfClient getSwf(array $args = [])
 */
class Sdk
{
    const VERSION = '3.0.0-beta.1';

    /**
     * Map of custom lowercase names to service endpoint names of model files.
     *
     * @var array
     */
    private static $aliases = [
        'cloudwatch'      => 'monitoring',
        'cloudwatchlogs'  => 'logs',
        'cognitoidentity' => 'cognito-identity',
        'cognitosync'     => 'cognito-sync',
        'elb'             => 'elasticloadbalancing',
        'emr'             => 'elasticmapreduce',
        'simpledb'        => 'sdb',
        'ses'             => 'email',
    ];

    /**
     * Map of service lowercase names to service class names.
     *
     * @var array
     */
    private static $services = [
        'autoscaling'          => 'AutoScaling',
        'cloudformation'       => 'CloudFormation',
        'cloudfront'           => 'CloudFront',
        'cloudhsm'             => 'CloudHsm',
        'cloudsearch'          => 'CloudSearch',
        'cloudsearchdomain'    => 'CloudSearchDomain',
        'cloudtrail'           => 'CloudTrail',
        'codedeploy'           => 'CodeDeploy',
        'cognito-identity'     => 'CognitoIdentity',
        'cognito-sync'         => 'CognitoSync',
        'config'               => 'ConfigService',
        'datapipeline'         => 'DataPipeline',
        'directconnect'        => 'DirectConnect',
        'dynamodb'             => 'DynamoDb',
        'ec2'                  => 'Ec2',
        'ecs'                  => 'Ecs',
        'elasticache'          => 'ElastiCache',
        'elasticbeanstalk'     => 'ElasticBeanstalk',
        'elasticloadbalancing' => 'ElasticLoadBalancing',
        'elastictranscoder'    => 'ElasticTranscoder',
        'email'                => 'Ses',
        'elasticmapreduce'     => 'Emr',
        'glacier'              => 'Glacier',
        'iam'                  => 'Iam',
        'importexport'         => 'ImportExport',
        'kinesis'              => 'Kinesis',
        'kms'                  => 'Kms',
        'lambda'               => 'Lambda',
        'logs'                 => 'CloudWatchLogs',
        'monitoring'           => 'CloudWatch',
        'opsworks'             => 'OpsWorks',
        'rds'                  => 'Rds',
        'redshift'             => 'Redshift',
        'route53'              => 'Route53',
        'route53domains'       => 'Route53Domains',
        's3'                   => 'S3',
        'sdb'                  => 'SimpleDb',
        'sns'                  => 'Sns',
        'sqs'                  => 'Sqs',
        'storagegateway'       => 'StorageGateway',
        'sts'                  => 'Sts',
        'support'              => 'Support',
        'swf'                  => 'Swf',
    ];

    /** @var array Arguments for creating clients */
    private $args;

    /** @var callable|null Shared RingPHP handler */
    private $handler;

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
    }

    public function __call($name, array $args = [])
    {
        if (strpos($name, 'get') === 0) {
            return $this->getClient(
                substr($name, 3),
                isset($args[0]) ? $args[0] : []
            );
        }

        throw new \BadMethodCallException("Unknown method: {$name}.");
    }

    /**
     * Get the class name of a client.
     *
     * @param string $name Client name (e.g., "s3", "dynamodb").
     *
     * @return string
     */
    public static function getClientClass($name)
    {
        $name = strtolower($name);

        if (isset(self::$aliases[$name])) {
            $name = self::$aliases[$name];
        }

        return isset(self::$services[$name])
            ? "Aws\\" . self::$services[$name] . "\\"
                . self::$services[$name]
                . "Client"
            : 'Aws\AwsClient';
    }

    /**
     * Get a client by name using an array of constructor options.
     *
     * @param string $name Client name
     * @param array  $args Custom arguments to provide to the client.
     *
     * @return AwsClientInterface
     * @throws \InvalidArgumentException
     * @see Aws\AwsClient::__construct for a list of available options.
     */
    public function getClient($name, array $args = [])
    {
        $this->createSharedHandlerIfNeeded($args);
        $name = strtolower($name);

        // Resolve service aliases
        if (isset(self::$aliases[$name])) {
            $name = self::$aliases[$name];
        }

        // Merge provided args with stored args
        if (isset($this->args[$name])) {
            $args += $this->args[$name];
        }

        // Set the service name and determine if it is linked to a known class
        $args += $this->args;
        $args['service'] = $name;
        $client = 'Aws\\AwsClient';

        if (isset(self::$services[$name])) {
            $name = self::$services[$name];
            $client = "Aws\\{$name}\\{$name}Client";
        }

        return new $client($args);
    }

    private function createSharedHandlerIfNeeded(array $args)
    {
        if (!isset($this->args['ringphp_handler'])
            && !isset($args['client'])
            && !isset($args['ringphp_handler'])
        ) {
            $this->args['ringphp_handler'] = Client::getDefaultHandler();
        }
    }
}

<?php
namespace Aws;

use GuzzleHttp\Client;

/**
 * Builds AWS clients based on configuration settings.
 *
 * @method \Aws\AutoScaling\AutoScalingClient getAutoScaling(array $args = [])
 * @method \Aws\CloudFormation\CloudFormationClient getCloudFormation(array $args = [])
 * @method \Aws\CloudFront\CloudFrontClient getCloudFront(array $args = [])
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
        'cloudsearch'          => 'CloudSearch',
        'cloudsearchdomain'    => 'CloudSearchDomain',
        'cloudtrail'           => 'CloudTrail',
        'cognito-identity'     => 'CognitoIdentity',
        'cognito-sync'         => 'CognitoSync',
        'datapipeline'         => 'DataPipeline',
        'directconnect'        => 'DirectConnect',
        'dynamodb'             => 'DynamoDb',
        'ec2'                  => 'Ec2',
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
     * Get a client by name using an array of constructor options.
     *
     * - region: The region to use of the service.
     * - version: API version of the service.
     * - credentials: An {@see Aws\Common\Credentials\CredentialsInterface}
     *   object to use with each, an associative array of 'key', 'secret', and
     *   'token' key value pairs, `false` to utilize null credentials, or a
     *   callable credentials provider function to create credentials using a
     *   function. If no credentials are provided, the SDK will attempt to load
     *   them from the environment.
     * - profile: Allows you to specify which profile to use when credentials
     *   are created from the AWS credentials file in your home directory. This
     *   setting overrides the AWS_PROFILE environment variable. Specifying
     *   "profile" will cause the "credentials" key to be ignored.
     * - signature: A string representing a custom signature version to use
     *   with a service or a {@see Aws\Signture\SignatureInterface} object.
     * - retries: Configures retries for clients. The value can be true (the
     *   default setting which enables retry behavior), false to disable
     *   retries, or a number representing the maximum number of retries.
     * - retry_logger: Set to a PSR-3 Psr\Log\LoggerInterface compatible logger
     *   to log all retries.
     * - defaults: Optional associative array of command parameters to pass to
     *   each command created by the client.
     * - client: Optional {@see GuzzleHttp\ClientInterface} used to transfer
     *   requests over the wire. If not specified, the SDK will create a new
     *   client that uses a shared Ring HTTP handler with other clients.
     * - ringphp_handler: callable RingPHP handler used to transfer HTTP
     *   requests (see http://ringphp.readthedocs.org/en/latest/).
     * - api_provider: Optional service description API provider as a callable
     *   that accepts a type, service name, and version and returns an
     *   associative array of configuration data.
     * - endpoint: An optional custom endpoint to use when interacting with a
     *   service.
     * - endpoint_provider: Optional endpoint provider used when creating
     *   service endpoints.
     * - scheme: The scheme to use when interacting with a service (https or
     *   http). Defaults to https.
     *
     * @param string $name Client name
     * @param array  $args Custom arguments to provide to the client.
     *
     * @return \Aws\Common\AwsClientInterface
     * @throws \InvalidArgumentException
     */
    public function getClient($name, array $args = [])
    {
        // Normalize service name to lower case
        $name = strtolower($name);
        $this->createSharedHandlerIfNeeded($args);

        // Resolve service aliases
        if (isset(self::$aliases[$name])) {
            $name = self::$aliases[$name];
        }

        // Merge provided args with stored args
        if (isset($this->args[$name])) {
            $args += $this->args[$name];
        }
        $args += $this->args;

        // Set the service name and determine if it is linked to a known class
        $args['service'] = $name;
        $args['class_name'] = false;
        $factoryName = 'Aws\Common\ClientFactory';

        if (isset(self::$services[$name])) {
            $args['class_name'] = self::$services[$name];
            if (class_exists("Aws\\{$args['class_name']}\\{$args['class_name']}Factory")) {
                $factoryName = "Aws\\{$args['class_name']}\\{$args['class_name']}Factory";
            }
        }

        return (new $factoryName)->create($args);
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

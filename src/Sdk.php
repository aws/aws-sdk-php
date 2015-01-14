<?php
namespace Aws;

use GuzzleHttp\Client;

/**
 * Builds AWS clients based on configuration settings.
 *
 * @method \Aws\AutoScalingClient getAutoScaling(array $args = [])
 * @method \Aws\CloudFormationClient getCloudFormation(array $args = [])
 * @method \Aws\CloudFrontClient getCloudFront(array $args = [])
 * @method \Aws\CloudSearchClient getCloudSearch(array $args = [])
 * @method \Aws\CloudSearchDomainClient getCloudSearchDomain(array $args = [])
 * @method \Aws\CloudTrailClient getCloudTrail(array $args = [])
 * @method \Aws\CloudWatchClient getCloudWatch(array $args = [])
 * @method \Aws\CloudWatchLogsClient getCloudWatchLogs(array $args = [])
 * @method \Aws\CognitoIdentityClient getCognitoIdentity(array $args = [])
 * @method \Aws\CognitoSyncClient getCognitoSync(array $args = [])
 * @method \Aws\DataPipelineClient getDataPipeline(array $args = [])
 * @method \Aws\DirectConnectClient getDirectConnect(array $args = [])
 * @method \Aws\DynamoDbClient getDynamoDb(array $args = [])
 * @method \Aws\Ec2Client getEc2(array $args = [])
 * @method \Aws\EcsClient getEcs(array $args = [])
 * @method \Aws\ElastiCacheClient getElastiCache(array $args = [])
 * @method \Aws\ElasticBeanstalkClient getElasticBeanstalk(array $args = [])
 * @method \Aws\ElasticLoadBalancingClient getElasticLoadBalancing(array $args = [])
 * @method \Aws\ElasticTranscoderClient getElasticTranscoder(array $args = [])
 * @method \Aws\EmrClient getEmr(array $args = [])
 * @method \Aws\GlacierClient getGlacier(array $args = [])
 * @method \Aws\IamClient getIam(array $args = [])
 * @method \Aws\ImportExportClient getImportExport(array $args = [])
 * @method \Aws\KinesisClient getKinesis(array $args = [])
 * @method \Aws\OpsWorksClient getOpsWorks(array $args = [])
 * @method \Aws\RdsClient getRds(array $args = [])
 * @method \Aws\RedshiftClient getRedshift(array $args = [])
 * @method \Aws\Route53Client getRoute53(array $args = [])
 * @method \Aws\Route53DomainsClient getRoute53Domains(array $args = [])
 * @method \Aws\S3Client getS3(array $args = [])
 * @method \Aws\SesClient getSes(array $args = [])
 * @method \Aws\SimpleDbClient getSimpleDb(array $args = [])
 * @method \Aws\SnsClient getSns(array $args = [])
 * @method \Aws\SqsClient getSqs(array $args = [])
 * @method \Aws\StorageGatewayClient getStorageGateway(array $args = [])
 * @method \Aws\StsClient getSts(array $args = [])
 * @method \Aws\SupportClient getSupport(array $args = [])
 * @method \Aws\SwfClient getSwf(array $args = [])
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
     * Get a client by name using an array of constructor options.
     *
     * - region: The region to use of the service.
     * - version: API version of the service.
     * - credentials: An {@see Aws\Credentials\CredentialsInterface}
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
     * - client_defaults: Associative array of default Guzzle client options to
     *   apply to the client after it is constructed. See http://docs.guzzlephp.org/en/latest/clients.html#request-options
     *   for a list of request options.
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
     * @return AwsClientInterface
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
        $factoryName = 'Aws\ClientFactory';

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

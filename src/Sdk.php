<?php
namespace Aws;

use Aws\Common\ClientFactory;

/**
 * Builds AWS clients based on configuration settings.
 *
 * @method AwsClientInterface getAutoScaling(array $args = [])
 * @method AwsClientInterface getCloudFormation(array $args = [])
 * @method AwsClientInterface getCloudFront(array $args = [])
 * @method AwsClientInterface getCloudSearch(array $args = [])
 * @method AwsClientInterface getCloudTrail(array $args = [])
 * @method AwsClientInterface getCloudWatch(array $args = [])
 * @method AwsClientInterface getDataPipeline(array $args = [])
 * @method AwsClientInterface getDirectConnect(array $args = [])
 * @method AwsClientInterface getDynamoDb(array $args = [])
 * @method AwsClientInterface getEc2(array $args = [])
 * @method AwsClientInterface getElastiCache(array $args = [])
 * @method AwsClientInterface getElasticBeanstalk(array $args = [])
 * @method AwsClientInterface getElasticLoadBalancing(array $args = [])
 * @method AwsClientInterface getElasticTranscoder(array $args = [])
 * @method AwsClientInterface getEmr(array $args = [])
 * @method AwsClientInterface getGlacier(array $args = [])
 * @method AwsClientInterface getIam(array $args = [])
 * @method AwsClientInterface getImportExport(array $args = [])
 * @method AwsClientInterface getKinesis(array $args = [])
 * @method AwsClientInterface getOpsWorks(array $args = [])
 * @method AwsClientInterface getRds(array $args = [])
 * @method AwsClientInterface getRedshift(array $args = [])
 * @method AwsClientInterface getRoute53(array $args = [])
 * @method AwsClientInterface getS3(array $args = [])
 * @method AwsClientInterface getSes(array $args = [])
 * @method AwsClientInterface getSimpleDb(array $args = [])
 * @method AwsClientInterface getSns(array $args = [])
 * @method AwsClientInterface getSqs(array $args = [])
 * @method AwsClientInterface getStorageGateway(array $args = [])
 * @method AwsClientInterface getSts(array $args = [])
 * @method AwsClientInterface getSupport(array $args = [])
 * @method AwsClientInterface getSwf(array $args = [])
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
        'cloudwatch' => 'monitoring',
        'elb'        => 'elasticloadbalancing',
        'emr'        => 'elasticmapreduce',
        'simpledb'   => 'sdb',
        'ses'        => 'email',
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
        'cloudtrail'           => 'CloudTrail',
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
        'monitoring'           => 'CloudWatch',
        'opsworks'             => 'OpsWorks',
        'rds'                  => 'Rds',
        'redshift'             => 'Redshift',
        'route53'              => 'Route53',
        's3'                   => 'S3',
        'sdb'                  => 'SimpleDb',
        'sns'                  => 'Sns',
        'sqs'                  => 'Sqs',
        'storagegateway'       => 'StorageGateway',
        'sts'                  => 'Sts',
        'support'              => 'Support',
        'swf'                  => 'Swf',
    ];

    private static $factories = [
        'dynamodb' => 'Aws\DynamoDb\DynamoDbFactory',
        'glacier'  => 'Aws\Glacier\GlacierFactory',
        'route53'  => 'Aws\Route53\Route53Factory',
        'sqs'      => 'Aws\Sqs\SqsFactory',
    ];

    /** @var array Arguments for creating clients */
    private $args;

    /**
     * Constructs a new SDK object with an associative array of default
     * client settings.
     *
     * @param array $args
     *
     * @throws \InvalidArgumentException
     * @see Aws\Sdk::getClient() for a list of available options.
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
     * - region: The region to use of the service
     * - version: Optional API version of the service. If not specified, the
     *   latest version of the API will be used.
     * - credentials: An {@see Aws\Common\Credentials\CredentialsInterface} object to
     *   use with each client OR an associative array of 'key', 'secret', and
     *   'token' key value pairs. If no credentials are provided, the SDK will
     *   attempt to load them from the environment.
     * - profile: Allows you to specify which profile to use when credentials
     *   are created from the AWS credentials file in your home directory. This
     *   setting overrides the AWS_PROFILE environment variable. Specifying
     *   "profile" will cause the "credentials" key to be ignored.
     * - scheme: The scheme to use when interacting with a service (https or
     *   http). Defaults to https.
     * - endpoint: An optional custom endpoint to use when interacting with a
     *   service.
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
     *   requests over the wire. You can specify either "client" or
     *   "client_defaults", but not both.
     * - client_defaults: Optional default client options which allows you to
     *   specify things like timeouts, proxies, etc...
     * - api_provider: Optional service description provider.
     * - endpoint_provider: Optional endpoint provider used when creating
     *   service endpoints.
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
        if (isset(self::$services[$name])) {
            $args['class_name'] = self::$services[$name];
        }

        // Get the client factory for the service
        $factory = isset(self::$factories[$name])
            ? new self::$factories[$name]
            : new ClientFactory;

        return $factory->create($args);
    }
}

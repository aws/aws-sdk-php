<?php
namespace Aws;

use Aws\Api\RulesEndpointProvider;
use Aws\Api\FilesystemApiProvider;
use Aws\Service\ClientFactory;

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

    /** @var array */
    private $args;

    /**
     * Map of custom lowercase names to service endpoint names of model files.
     *
     * @var array
     */
    private $serviceNames = [
        'cloudwatch' => 'monitoring',
        'simpledb'   => 'sdb',
        'ses'        => 'email'
    ];

    /** @var array Map of service endpoint names to factory class names */
    private $customFactories = [
        'dynamodb' => 'Aws\Service\DynamoDbFactory',
        'glacier'  => 'Aws\Service\GlacierFactory',
        'sqs'      => 'Aws\Service\SqsFactory'
    ];

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
        if (!isset($args['api_provider'])) {
            $path = __DIR__ . '/../vendor/aws/aws-models';
            $args['api_provider'] = new FilesystemApiProvider($path, true);
        }

        if (!isset($args['endpoint_provider'])) {
            $path = __DIR__ . '/../vendor/aws/aws-models/endpoint-rules.json';
            $args['endpoint_provider'] = new RulesEndpointProvider(
                json_decode(file_get_contents($path), true)
            );
        }

        if (!isset($args['retries'])) {
            $args['retries'] = true;
        }

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

        throw new \BadMethodCallException('Unknown method ' . $name);
    }

    /**
     * Get a client by name using an array of constructor options.
     *
     * - region: The region to use of the service
     * - version: Optional API version of the service. If not specified, the
     *   latest version of the API will be used.
     * - credentials: An {@see Aws\Credentials\CredentialsInterface} object to
     *   use with each client OR an associative array of 'key', 'secret', and
     *   'token' key value pairs. If no credentials are provided, the SDK will
     *   attempt to load them from the environment.
     * - profile: Allows you to specify which profile to use when credentials
     *   are created from the AWS credentials file in your home directory. This
     *   setting overrides the AWS_PROFILE environment variable. "profile" and
     *   "credentials" are conflicting keys for this method and cannot both be
     *   specified.
     * - scheme: The scheme to use when interacting with a service (https or
     *   http). Defaults to https.
     * - endpoint: An optional custom endpoint to use when interacting with a
     *   service.
     * - signature: A string representing a custom signature version to use
     *   with a service or a {@see Aws\Signture\SignatureInterface} object.
     * - retries: Configures retries for clients. The value can be true (the
     *   default setting which enables retry behavior), false to disable
     *   retries, or a number representing the maximum number of retries.
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
        $name = strtolower($name);

        if (isset($this->serviceNames[$name])) {
            $name = $this->serviceNames[$name];
        }

        $args['service'] = $name;
        $args += $this->args;

        if (!isset($args['version'])) {
            $args['version'] = 'latest';
        }

        $factory = isset($this->customFactories[$name])
            ? new $this->customFactories[$name]()
            : new ClientFactory();

        return $factory->create($args);
    }
}

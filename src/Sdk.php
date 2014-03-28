<?php

namespace Aws;

use Aws\Api\RulesEndpointProvider;
use Aws\Api\FilesystemApiProvider;
use Aws\Service\DefaultFactory;

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
    /** @var array */
    private $args;

    /** @var array Map of service names to factory classes */
    private $customFactories = [];

    private $serviceNames = [
        'DynamoDb' => 'dynamodb'
    ];

    /**
     * Constructs a new SDK object with an associative array of default
     * client settings:
     *
     * - region: The default region name to use when creating clients
     * - signature: A custom signature implementation to use with all clients
     * - credentials: An {@see Aws\Credentials\CredentialsInterface} object to
     *   use with each client OR an associative array of 'key', 'secret', and
     *  'token' key value pairs.
     * - api_provider: Optional service description provider
     * - client_defaults: Optional default client options to use with each client.
     * - endpoint_provider: Optional endpoint provider used when creating
     *   service endpoints.
     * - retries: Configures retries for clients. The value can be true (the
     *   default setting which enables retry behavior), false to disable
     *   retries, or a number representing the maximum number of retries.
     *
     * @param array $args
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $args = [])
    {
        if (!isset($args['api_provider'])) {
            $path = '/Users/dowling/.aws/models/';
            $args['api_provider'] = new FilesystemApiProvider($path, true);
        }

        if (!isset($args['endpoint_provider'])) {
            $path = '/Users/dowling/.aws/models/endpoint-rules.json';
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
     * Get a client by name.
     *
     * @param string $name Client name
     * @param array  $args Custom arguments to provide to the client.
     *
     * @return AwsClientInterface
     * @throws \InvalidArgumentException
     */
    public function getClient($name, array $args = [])
    {
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
            : new DefaultFactory();

        return $factory->create($args);
    }
}
